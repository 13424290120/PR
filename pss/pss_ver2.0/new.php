<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="gbk">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="jackson li">
    <title><?php echo $_SESSION["lastNumber"] ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/order.js"></script>  
    
    <script type = "text/javascript" language = "javascript">
        // To get the invoice address from database by ajax
       $(document).ready(function() {
           //auto fill the invoiceAddress by ajax
            $("#mySelect").change(function(event){
               var invoiceId = $(this).val();
               $("#address").load('ajax.php', {"id":invoiceId} );
            });
          
          //print the form
            $("#printButton").click(function()
            {                    
                    window.print();
            });
            
            $("#saveButton").click(function()
            {

                $("#ajaxform input").each(function(){
                    if ($(this).val() == "")
                    {
                        alert ("Please complete the form!");
                        $(this).focus();
                        exit();
                    } ;
                })
                $("#ajaxform select").each(function(){
                    var choice = $(this).children('option:selected').val();
                    if ( choice == "" || choice == "0" )
                    {
                        alert ("Please complete the form!");
                        $(this).focus();
                        exit();
                    } ;
                }) 
                // if taxRate is RMB, then user has to choose the taxRate.                
                var currency = $("select[name='currency']").val();
                var taxRate = $("select[name='taxRate']").val();
                if (currency == "RMB")
                {
                    if (taxRate == "0")
                    {
                        alert ("Sorry, please don't forget to choose tax rate if currency is RMB!");
                        $("select[name='taxRate']").focus();
                        exit();
                    }
                }

                
                //If the PR is recoverable from customer, then the requestor must fill chargeBack fields
                var recoverable = $("input[name='recoverable']:checked").val();
                var chargeBackCustomerName = $("input[name='chargeBackCustomerName']").val();
                if (recoverable == 1 && chargeBackCustomerName =="")
                {
                    alert ("Sorry, please don't forget to fill Charge Back Customer Name!");
                    $("input[name='chargeBackCustomerName']").focus();
                    exit();                    
                }                
               
                    $("#gridForm").submit(function(e)
                    {
                            $("#simple-msg").html("");
                            var postData = $(this).serializeArray();
                            var formURL = $(this).attr("action");
                            $.ajax(
                            {
                                    url : formURL,
                                    type: "POST",
                                    data : postData,
                                    success:function(data, textStatus, jqXHR) 
                                    {
                                            $("#simple-msg").html('<pre><code class="prettyprint">'+data+'</code></pre>');
                                            $("#simple-msg").fadeOut(1800);

                                    },
                                    error: function(jqXHR, textStatus, errorThrown) 
                                    {
                                            $("#simple-msg").html('<pre><code class="prettyprint">GridForm Submit Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
                                    }
                            });
                        e.preventDefault();	//STOP default action
                        //e.unbind();
                    });

                    $("#gridForm").submit(); //SUBMIT FORM
                    
                    $("#ajaxform").submit(function(e)
                    {
                        
                            $("#simple-msg").html("");
                            var postData = $(this).serializeArray();
                            var formURL = $(this).attr("action");
                            $.ajax(
                            {
                                    url : formURL,
                                    type: "POST",
                                    data : postData,
                                    success:function(data, textStatus, jqXHR) 
                                    {
                                            $("#simple-msg-ajax").html('<pre><code class="prettyprint">'+data+'</code></pre>');
                                            $("#simple-msg-ajax").fadeOut(2400);

                                    },
                                    error: function(jqXHR, textStatus, errorThrown) 
                                    {
                                            $("#simple-msg-ajax").html('<pre><code class="prettyprint">AjaxForm Submit Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
                                    }
                            });
                        e.preventDefault();	//STOP default action
                        //e.unbind();
                    });

                    $("#ajaxform").submit(); //SUBMIT FORM                    
            });  
       }); 
    </script>
    
  </head>

  <body>
      
<?php
//初始化数据库
include_once 'db.php';

//echo $_SESSION["username"];

//判断用户是否登录
if(isset($_SESSION["username"]) && $_SESSION["username"]){
    $requestor=$_SESSION["username"];
}else{
    echo '<div class="error"> Sorry, please login first!<br><a href="index.php">Go Back</a></div>';  
    return false;    
}
//
//判断用户是否是从首页进入
if(!isset($_GET['lastNumber'])){    
    echo '<div class="error"> Sorry, please visit home page first!<br><a href="home.php">Go Back</a></div>';  
    return false;
}else{
        $lastPRnumber = $_GET['lastNumber'];
}


$currentDate = date("Y-m-d");

//判断当前的PR编号是否己经存在

$sqlCheckRequest = "SELECT `prNumber` FROM `request` WHERE `prNumber` = $lastPRnumber";
$stmtCheckRequest = $db->prepare($sqlCheckRequest);
$stmtCheckRequest->execute();
$rowCheckRequest = $stmtCheckRequest->fetch(PDO::FETCH_ASSOC);
if (!$rowCheckRequest){ //如果PR单不存在，就新增该PR单
    $sqlNewRequest = "INSERT INTO `request` (`prNumber`,`requestor`,`prDate`) VALUE('$lastPRnumber','$requestor','$currentDate');";
    $stmtNewRequest = $db->prepare($sqlNewRequest);
    $stmtNewRequest->execute();    
}else{
    echo '<div class="error">Sorry, the PR number already registered in the database, please apply a new one!<br><a href="home.php">Go Back</a></div>';
    return false;
}

//define the unit for the gridForm

$arrUnit = array('','Bag','CM','EA','Gram','Hour','KG','M','PCS','Roll','Set'); 
$arrCurrency = array('','RMB','HKD','USD','EURO');
$arrShipto = array('APAC','SHAT','Shuanglin','Sunway','Other');

//从数据库取出字典数据，生成表单下拉清单
$sqlAccount = "SELECT `id`,`accountNumber`,`description` FROM `account` ORDER BY `accountNumber`";
$sqlCostCode = "SELECT `id`,`code`,`codeName` FROM `costcode`";
$sqlCategory = "SELECT `id`,`name` FROM `category`";
$sqlInvoice = "SELECT `id`,`name`,`address` FROM `invoice`";

$stmtAccount = $db->prepare($sqlAccount);
$stmtCostCode = $db->prepare($sqlCostCode);
$stmtCategory = $db->prepare($sqlCategory);
$stmtInvoice = $db->prepare($sqlInvoice);

$stmtAccount->execute();
$stmtCostCode->execute();
$stmtCategory->execute();
$stmtInvoice->execute();

?>

    <!-- Begin page content -->
    <div id="content" class="container" style="width:1000px;">
        <form id="ajaxform" name="ajaxform" action="ajax-form-submit.php" method="post">
      <div class="page-header">
          <h1>PremiumSoundSolutions<small> Purchase Requisition</small></h1>          
          PR Number: <input type="text" id="prNumber" class="prinput" name="prNumber" value="<?php echo $lastPRnumber ?>">
          PR Date: <input type="text" id="prDate" class="prinput" name="prDate" value="<?php echo $currentDate ?>">
      </div>        

        <div class="row">
          <div class="col-xs-6">
              <p><span class="badge">Supplier Info</span></p>
              Order to:<input name="supplierName" class="form-control" autofocus>
              Contact:<input name="supplierContact" class="form-control">
              Telephone:<input name="supplierPhone" class="form-control">
          </div>
          <div class="col-xs-6">
              <p><span class="badge">Invoice Info</span></p>
              Invoice to:              
              <select id="mySelect" class="form-control" name="invoiceTo">
                  <option value="0" selected="selected">------------------------------</option>
                  <?php
                  while($rowInvoice = $stmtInvoice->fetch(PDO::FETCH_ASSOC)){
                      echo "<option value=".$rowInvoice['id'].">".$rowInvoice['name']."</option>";                      
                  }
                  ?> 
              </select>              
              Address:<textarea id="address" name="invoiceAddress" class="form-control" rows="3"></textarea>

          </div>
        </div>   
        <hr style="margin:5px; margin-bottom: 2px;">
        
        <!-- first row-->
        <div class="row">
          <div class="col-xs-4">
              Purchase Category:
              <select class="form-control" name="categoryName">
                  <option value="0" selected="selected">------------------------------</option>
                  <?php
                  while($rowCategory = $stmtCategory->fetch(PDO::FETCH_ASSOC)){
                      echo "<option value=".$rowCategory['id'].">".$rowCategory['name']."</option>";                      
                  }
                  ?> 
              </select>
          </div>
          <div class="col-xs-4">
              Cost Code:
              <select class="form-control" name="costCode">
                  <option value="0" selected="selected">------------------------------</option>                  
                  <?php
                  while($rowCostCode = $stmtCostCode->fetch(PDO::FETCH_ASSOC)){
                      echo "<option value=".$rowCostCode['id'].">".$rowCostCode['code']." - ".$rowCostCode['codeName']."</option>";                      
                  }
                  ?> 
              </select>
          </div>
          <div class="col-xs-4">
              Account No.:
              <select class="form-control" name="accountNumber">
                  <option value="0" selected="selected">------------------------------</option>
                  <?php
                  while($rowAccount = $stmtAccount->fetch(PDO::FETCH_ASSOC)){
                      echo "<option value=".$rowAccount['id'].">".$rowAccount['accountNumber']." - ".$rowAccount['description']."</option>";                      
                  }
                  ?>
              </select>
          </div>            
        </div>
        
        <!-- Second row-->
        <div class="row">
            <div class="col-xs-4">
                Project Name:
                <input type="text" name="projectName" class="form-control">
            </div>
            <div class="col-xs-2">
                Currency:
                <select name="currency" class="form-control">
                    <?php
                      foreach ($arrCurrency as $currency) {
                          echo "<option value='$currency'>$currency</option>";
                      }
                    ?>
                </select>
            </div>
            <div class="col-xs-2">
                Ship To: 
                <select name="shipTo" class="form-control"> 
                    <?php
                              foreach ($arrShipto as $Shipto) {
                                  echo "<option value='$Shipto'>$Shipto</option>";
                              }
                    ?>
                </select>                 
            </div>
            <div class="col-xs-2">
                Within Budget: 
                <span class="form-control">
                    <input  type="radio" name="withInBudget" value="1" checked>Yes</input>
                    <input type="radio" name="withInBudget" value="0">No</input>                  
                </span>                
            </div> 
            <div class="col-xs-2">
                Recoverable: 
                <span class="form-control">
                    <input  type="radio" name="recoverable" value="1">Yes
                    <input  type="radio" name="recoverable" value="0" checked>No
                </span>                 
            </div>  
        </div>
        
        <!-- Third Row -->
        <div class="row">
            <div class="col-xs-3">
                Delivery Date Required:
                <input type="date" name="deliveryDate" class="form-control">
            </div>            
            <div class="col-xs-3">
                CAPEX/OPEX Number:
                <input name="capexNumber" class="form-control">
            </div>
            <div class="col-xs-3">
                CAPEX Budget Number:
                <input name="capexBudgetNumber" class="form-control">
            </div>
            <div class="col-xs-3">
                Charge Back Customer Name:
                <input name="chargeBackCustomerName" class="form-control">
            </div>            
        </div>
        
        <!-- Forth Row -->
        <div class="row">
            <div class="col-xs-3">
                Charge Back Customer Code:
                <input name="chargeBackCustomerCode" class="form-control">
            </div>
            <div class="col-xs-3">
                Charge Back Amount:
                <input name="chargeBackAmount" class="form-control">
            </div>
            <div class="col-xs-3">
                Charge Back PO Number:
                <input name="chargeBackPONumber" class="form-control">
            </div>
            <div class="col-xs-3">
                Charge Back Currency:
                <select name="chargeBackCurrency" class="form-control">
                    <?php
                      foreach ($arrCurrency as $currency) {
                          echo "<option value='$currency'>$currency</option>";
                      }
                    ?>
                </select>                
            </div>            
        </div>        

        <div class="row">
          <div class="col-xs-12">
              Purpose/Remark:<textarea class="form-control" rows="3" name="purpose" placeholder="Attention : If it's project cost, please list your project name here!"></textarea>
          </div>         
        </div>
    </form>

        <hr></hr>
        
        
        <div class="row">
          <div class="col-xs-12">
          <form id="gridForm" action="ajax-gridform-save.php" method="post">
              <input type="hidden" name="prNumber" value="<?php echo $lastPRnumber ?>">  
            <table id="order-table" class="table-hover">
                    <tr>
                            <th style="width:55%;">Item</th>
                            <th style="width:10%;">Unit</th>
                            <th style="width:10%;">Project Code</th>               
                            <th style="width:8%;">UnitPrice</th>		
                            <th style="width:5%;">Quantity</th>
                            <th style="width:10%;">Subtotal</th>
                    </tr>

                <?php
                                    
                    for($i=1; $i<15; $i++){ //遍历表格内容数组 
                            $inputName = "row".$i."[]";
                            echo "<tr>";
                            echo "        <td class='product-title'><input name=\"$inputName\" type='text' class='form-control' ></td>";
                            //echo "        <td class='product-title'><input name=\"$inputName\" type='text' class='form-control' ></td>";
                            echo "        <td class='product-title'><select name=\"$inputName\" class='form-control'>";
                            foreach ($arrUnit as $unit) {
                                echo "<option value='$unit'>$unit</option>";
                            } 
                            echo "        </td>";
                            echo "        <td class='product-title'><input name=\"$inputName\" type='text' class='form-control'></td>";
                            echo "        <td><input name=\"$inputName\" type='text' class='price-per-pallet form-control'></td>";
                            echo "        <td class='num-pallets'>";
                            echo "                <input name=\"$inputName\" type='text' class='num-pallets-input form-control' id='turface-pro-league-num-pallets'>";
                            echo "        </td>";             
                            echo "        <td class='row-total'>";
                            echo "                <input name=\"$inputName\" type='text'  class='row-total-input form-control' id='turface-pro-league-row-total' readonly='readonly'>";
                            echo "        </td>";
                            echo "</tr>"; 
                    }
                    
                    
                 ?>      
                    <tr>
                        <td colspan="2"></td> 
                        <td colspan="3"><b>Total without Tax</b></td>
                            <td style="text-align: right;">
                                    <input type="text" class="total-box form-control" id="product-subtotal" name="totalWithoutTax" readonly="readonly">
                            </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>                            
                        <td><b>Tax Rate</b></td>
                            <td colspan="2">
                                <select name="taxRate" id="taxRate" class="form-control">
                                        <option value="0">0%</option>
                                        <option value="0.17">17%</option>
                                        <option value="0.13">13%</option>
                                        <option value="0.11">11%</option>
                                        <option value="0.06">6%</option>
                                        <option value="0.03">3%</option>
                                </select>
                            </td>
                            
                            <td style="text-align: right;">
                                    <input type="text" class="total-box form-control" id="tax" name="tax" readonly="readonly">
                            </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td> 
                        <td colspan="3"><b>Total with Tax</b></td>
                            <td style="text-align: right;">
                                    <input type="text" class="total-box form-control" id="product-subtotal-tax" name="total" readonly="readonly">
                            </td>
                    </tr>
            </table>
          </form>
          </div>         
        </div>

        <hr></hr>
        
        <div class="row">
          <div class="col-xs-12">
              <table style="width:100%;">
                  <tr>
                      <th style="width:25%;">Requestor</th>
                      <th style="width:25%;">Department Manager</th>
                      <th style="width:25%;">Finance</th>
                      <th style="width:25%;">General Manager</th>
                  </tr>                  
                  <tr>
                      <td><input type="text" class="prinput" value="<?php echo $requestor ?>"></td>
                      <td><input type="text" class="prinput"></td>
                      <td><input type="text" class="prinput"></td>
                      <td><input type="text" class="prinput"></td>
                  </tr>
              </table>
          </div>         
        </div>
        <br>
        <div id="simple-msg-ajax"></div>
        <div id="simple-msg"></div>
        <div class="row noprint">
            <center>
                <input id="saveButton" type="button" value=" Save " class="btn btn-success">
                <input id="printButton" type="button" value=" Print As PDF " class="btn btn-success">
                <span class="btn btn-success"><a style="color:#FFF;" href="home.php">Home</a></span>
            </center>
            <hr>
        </div>        
    </div>
  </body>
</html>