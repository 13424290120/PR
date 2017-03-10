<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="text/html; charset=UTF-8"">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="jackson li">
    <title><?php echo base64_decode($_GET['id']) ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/order.js"></script>
    
    <script type = "text/javascript" language = "javascript">
        // To get the invoice address from database by ajax
       $(document).ready(function() {
            
            //Validate the form fields
            $("#ajaxform input").keyup(function(){
                $('span.error-keyup-2').remove();
                var inputVal = $(this).val();
                var characterReg = /^\s*[a-zA-Z0-9,\u4e00-\u9fa5,&()./\+\-,\s]+\s*$/;
                if(!characterReg.test(inputVal)) {
                    $(this).after('<span class="bg-warning error-keyup-2">WARNING: blank or illegal charactor detected! </span>');                      
                    $('.error-keyup-2').fadeOut(4800);
                    $(this).focus();
                    //alert("No special characters allowed!!!");            
                }                         
            });
            
            $("#purpose").keyup(function(){
                $('span.error-keyup-2').remove();
                var inputVal = $(this).val();
                var characterReg = /^\s*[a-zA-Z0-9,\u4e00-\u9fa5,&()./\+\-,\s]+\s*$/;
                if(!characterReg.test(inputVal)) {
                    $(this).after('<span class="bg-warning error-keyup-2">WARNING: blank or illegal charactor detected! </span>');                      
                    $('.error-keyup-2').fadeOut(4800);
                    $(this).focus();
                    //alert("No special characters allowed!!!");            
                }                         
            });          

            
            //To get the invoice address from database by ajax
            $("#mySelect").change(function(event){
               var invoiceId = $(this).val();
               $("#address").load('ajax.php', {"id":invoiceId} );
            });
           
            // Click the printButton action
            $("#printButton").click(function()
            {
                    window.print();
            });
            
            // Click the saveButton action
            $("#saveButton").click(function()
            {
                //check each input to make sure no blank one.
                $("#ajaxform input").each(function(){
                    var inputVal = $(this).val();
                    var characterReg = /^\s*[a-zA-Z0-9,\u4e00-\u9fa5,&()./\+\-,\s]+\s*$/;
                    if(!characterReg.test(inputVal))                    
                    //if ($(this).val() === "")
                    {
                        //alert ("Attention: Blank fields or illegal charactors detected, please correct it before submit!");
                        $(this).focus();
                        $(this).after('<span class="bg-warning error-keyup-2">WARNING: blank or illegal charactor detected! </span>');
                        $('.error-keyup-2').fadeOut(4800);
                        exit();
                    } ;                     
                });
                
                //check each select to make sure no blank one.
                $("#ajaxform select").each(function(){
                    var choice = $(this).children('option:selected').val();
                    if ( choice === "" || choice === "0" )
                    {
                        //alert ("Please complete the form!");
                        $(this).focus();
                        $(this).after('<span class="bg-warning error-keyup-2">WARNING: Complete the form please! </span>');
                        $('.error-keyup-2').fadeOut(4800);                        
                        exit();
                    } ;
                }) 
                
                // if taxRate is RMB, then user has to choose the taxRate.
                var currency = $("select[name='currency']").val();
                var taxRate = $("select[name='taxRate']").val();
                if (currency === "RMB" && taxRate === "0")
                {
                    alert ("Sorry, please don't forget to choose tax rate if currency is RMB!");
                    $("select[name='taxRate']").focus();
                    exit();
                }
                
                //If the PR is recoverable from customer, then the requestor must fill chargeBack fields
                var recoverable = $("input[name='recoverable']:checked").val();
                var chargeBackCustomerName = $("input[name='chargeBackCustomerName']").val();
                if (recoverable === 1 && chargeBackCustomerName ==="")
                {
                    alert ("Sorry, please don't forget to fill Charge Back Customer Name!");
                    $("input[name='chargeBackCustomerName']").focus();
                    exit();   
                }                

                
                // To submit ajaxform data by ajax.
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
                                        $("#simple-msg").html('<pre><code class="prettyprint">'+data+'</code></pre>');
                                        $("#simple-msg").fadeOut(1800);

                                },
                                error: function(jqXHR, textStatus, errorThrown) 
                                {
                                        $("#simple-msg").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
                                }
                        });
                    e.preventDefault();	//STOP default action
                    //e.unbind();
                });

                    $("#ajaxform").submit(); //SUBMIT FORM
                    
                    //To submit gridform data by ajax.
                    
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
                                            $("#simple-msg-grid").html('<pre><code class="prettyprint">'+data+'</code></pre>');
                                            $("#simple-msg-grid").fadeOut(2400);

                                    },
                                    error: function(jqXHR, textStatus, errorThrown) 
                                    {
                                            $("#simple-msg-grid").html('<pre><code class="prettyprint">AJAX Request Failed<br/> textStatus='+textStatus+', errorThrown='+errorThrown+'</code></pre>');
                                    }
                            });
                        e.preventDefault();	//STOP default action
                        //e.unbind();
                    });

                    $("#gridForm").submit(); //SUBMIT FORM
                    
                    //Refresh the page when submit is done
                    setTimeout(function() {
                        location.reload()
                    },3000);

            }); 
       }); 
    </script>
    
  </head>

  <body>
      
<?php
//初始化数据库
include_once 'db.php';

//判断用户是否登录
if(isset($_SESSION["username"]) && $_SESSION["username"]){
    $requestor=$_SESSION["username"];
}else{
    echo '<div class="error"><p><h3> Sorry, please login first!</h3></p><br><a href="index.php">Go Back</a></div>';  
    return false;    
}

//define the unit for the gridForm

$arrUnit = array('','Bag','CM','EA','Gram','Hour','KG','M','PCS','Roll','Set'); 
$arrCurrency = array('','RMB','HKD','USD','EURO','N/A');
$arrShipto = array('Shenzhen','SHAT','Shuanglin','Sunway','Other'); 

//从数据库取出字典数据，生成表单下拉清单

$currentDate = date("Y-m-d");

$sqlAccount = "SELECT `id`,`accountNumber`,`description` FROM `account` WHERE `active`=1 ORDER BY `accountNumber`";
$sqlCostCode = "SELECT `id`,`code`,`codeName` FROM `costcode` WHERE `active`=1";
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

//

$prNumber=  base64_decode($_GET['id']);

$sqlPrNumber = "SELECT * FROM `request` WHERE prNumber='$prNumber'";
$stmtPrNumber = $db->query($sqlPrNumber);
$row = $stmtPrNumber->fetch(PDO::FETCH_ASSOC);
if($row){
    $prDate=$row['prDate'];
    $supplierName=$row['supplierName'];
    $supplierContact = $row['supplierContact'];
    $supplierPhone= $row['supplierPhone'];
    $PRshipTo=$row["shipTo"];
    $projectName=$row["projectName"];
    $withinBudget=$row['withinBudget'];
    $recoverable=$row['recoverable'];
    $chargeBackCustomerName=$row['chargeBackCustomerName'];
    $chargeBackCustomerCode=$row['chargeBackCustomerCode'];
    $chargeBackAmount=$row['chargeBackAmount'];
    $chargeBackPONumber=$row['chargeBackPONumber'];
    $chargeBackCurrency=$row['chargeBackCurrency'];
    $PRcurrency=$row['currency'];
    $capexNumber=$row['capexNumber'];
    $capexBudgetNumber=$row['capexBudgetNumber'];
    $purpose=$row['purpose'];
    $deliveryDate=$row['deliveryDate'];
    $gridContents=$row['gridContents']; 
    $taxRate=$row['taxRate']; 
    $arrayGridContents = unserialize($gridContents); //将表格内容由文本序列转换成数组
}else{
    echo '<div class="error"><p><h3> Sorry, PR number is not found!</h3></p><br><a href="index.php">Go Back</a></div>';
    return false;
}
?>

    <!-- Begin page content -->
    <div id="content" class="container" style="width:1000px;">
        <form id="ajaxform" name="ajaxform" action="ajax-form-submit.php" method="post">
      <div class="page-header">
          <h1>PremiumSoundSolutions<small> Purchase Requisition</small></h1>          
          PR Number: <input type="text" class="prinput" name="prNumber" value="<?php echo $prNumber ?>">
          PR Date: <input type="text" class="prinput" name="prDate" value="<?php echo $prDate ?>">
      </div>  
            
        <div class="row">
          <div class="col-xs-6">
              <p><span class="badge">Supplier Info</span></p>
              Order to:<input name="supplierName" class="form-control" value="<?php echo $supplierName ?>">
              Contact:<input name="supplierContact" class="form-control" value="<?php echo $supplierContact ?>">
              Telephone:<input name="supplierPhone" class="form-control" value="<?php echo $supplierPhone ?>">
          </div>
          <div class="col-xs-6">
              <p><span class="badge">Invoice Info</span></p>
              Invoice to:              
              <select id="mySelect" class="form-control" name="invoiceTo" >
                  <option value="0">------------------------------</option>
                  <?php
                  while($rowInvoice = $stmtInvoice->fetch(PDO::FETCH_ASSOC)){
                      if ($row['invoiceTo']===$rowInvoice['id']){
                          echo "<option value=".$rowInvoice['id']." selected='selected'>".$rowInvoice['name']."</option>";
                      }else{
                          echo "<option value=".$rowInvoice['id'].">".$rowInvoice['name']."</option>";    
                      }
                  }
                  ?> 
              </select>              
              Address:<textarea id="address" name="invoiceAddress" class="form-control" rows="3"><?php echo $row['invoiceAddress'] ?></textarea>
          </div>
        </div>   
        <hr style="margin:5px; margin-bottom: 2px;">
        
        <!-- First Row --> 
        <div class="row">
          <div class="col-xs-4">
              Purchase Category:
              <select class="form-control" name="categoryName">
                  <option value="0">------------------------------</option>
                  <?php
                  while($rowCategory = $stmtCategory->fetch(PDO::FETCH_ASSOC)){
                      if ($rowCategory['id']===$row['categoryName']){
                          echo "<option value=".$rowCategory['id']." selected='selected'>".$rowCategory['name']."</option>";
                      }else{
                          echo "<option value=".$rowCategory['id'].">".$rowCategory['name']."</option>"; 
                      }
                                           
                  }
                  ?> 
              </select>
          </div>
          <div class="col-xs-4">
              Cost Code:
              <select class="form-control" name="costCode">
                  <option value="0">------------------------------</option>                  
                  <?php
                  while($rowCostCode = $stmtCostCode->fetch(PDO::FETCH_ASSOC)){
                      if($rowCostCode['id']===$row['costCode']){
                          echo "<option value=".$rowCostCode['id']." selected='selected'>".$rowCostCode['code']." - ".$rowCostCode['codeName']."</option>";                          
                      }else{
                          echo "<option value=".$rowCostCode['id'].">".$rowCostCode['code']." - ".$rowCostCode['codeName']."</option>"; 
                      }
                                           
                  }
                  ?> 
              </select>
          </div>
          <div class="col-xs-4">
              Account No.:
              <select class="form-control" name="accountNumber">
                  <option value="0">------------------------------</option>
                  <?php
                  while($rowAccount = $stmtAccount->fetch(PDO::FETCH_ASSOC)){
                      if($rowAccount['id']===$row['accountNumber']){
                          echo "<option value=".$rowAccount['id']." selected='selected'>".$rowAccount['accountNumber']." - ".$rowAccount['description']."</option>";
                      }else{
                          echo "<option value=".$rowAccount['id'].">".$rowAccount['accountNumber']." - ".$rowAccount['description']."</option>";
                      }
                                            
                  }
                  ?>
              </select>
          </div>            
        </div>

        <!-- Second Row -->        
        <div class="row">
            <div class="col-xs-4">
                Project Name:
                <input name="projectName" class="form-control" value="<?php echo $projectName ?>">
            </div>             
            <div class="col-xs-2">
                Currency:
                <select name="currency" class="form-control"> 
                    <?php
                      foreach ($arrCurrency as $currency) {
                          if ($PRcurrency === $currency){
                              echo "<option value='$currency' selected='selected'>$currency</option>";
                          }else{
                              echo "<option value='$currency'>$currency</option>";
                          }
                      }
                    ?>  
                </select>
            </div>
            <div class="col-xs-2">
                Ship To: 
                <select name="shipTo" class="form-control">                  
                    <?php
                      foreach ($arrShipto as $Shipto) {
                          if ($PRshipTo === $Shipto){
                              echo "<option value='$Shipto' selected='selected'>$Shipto</option>";
                          }else{
                              echo "<option value='$Shipto'>$Shipto</option>";
                          }
                      }
                    ?> 
                </select>                
            </div>
            <div class="col-xs-2">
                Within Budget: 
                <span class="form-control">
                    <input  type="radio" name="withInBudget" value="1" <?php if ($withinBudget==="1"){ echo "checked"; } ?>>Yes</input>
                    <input type="radio" name="withInBudget" value="0" <?php if ($withinBudget==="0"){ echo "checked"; } ?>>No</input>
                </span>                
            </div>            
            <div class="col-xs-2">
                Recoverable: 
                <span class="form-control">
                    <input  type="radio" name="recoverable" value="1" <?php if ($recoverable==="1"){ echo "checked"; } ?>>Yes</input>
                    <input  type="radio" name="recoverable" value="0" <?php if ($recoverable==="0"){ echo "checked"; } ?>>No</input>
                </span>                
            </div>
        </div>
        
        <!-- Third Row -->
        <div class="row">
            <div class="col-xs-3">
                Delivery Date Required:
                <input type="date" name="deliveryDate" class="form-control" value="<?php echo $deliveryDate ?>">
            </div>            
            <div class="col-xs-3">
                CAPEX/OPEX Number:
                <input name="capexNumber" class="form-control" value="<?php echo $capexNumber ?>">
            </div>
            <div class="col-xs-3">
                CAPEX Budget Number:
                <input name="capexBudgetNumber" class="form-control" value="<?php echo $capexBudgetNumber ?>">
            </div>

            <div class="col-xs-3">
                Charge Back Customer Name:
                <input name="chargeBackCustomerName" class="form-control" value="<?php echo $chargeBackCustomerName ?>">
            </div>            
        </div>
        
        <!-- Forth Row -->
        <div class="row">
            <div class="col-xs-3">
                Charge Back Customer Code:
                <input name="chargeBackCustomerCode" class="form-control" value="<?php echo $chargeBackCustomerCode ?>">
            </div>
            <div class="col-xs-3">
                Charge Back PO Number:
                <input name="chargeBackPONumber" class="form-control" value="<?php echo $chargeBackPONumber ?>">
            </div>
            <div class="col-xs-3">
                Charge Back Currency: 
                <select name="chargeBackCurrency" class="form-control">                  
                    <?php
                      foreach ($arrCurrency as $currency) {
                          if ($chargeBackCurrency === $currency){
                              echo "<option value='$currency' selected='selected'>$currency</option>";
                          }else{
                              echo "<option value='$currency'>$currency</option>";
                          }
                      }
                    ?> 
                </select>                 
            </div>  
            <div class="col-xs-3">
                Charge Back Amount:
                <input name="chargeBackAmount" class="form-control" value="<?php echo $chargeBackAmount ?>">
            </div>            
        </div>
        
        <!-- Fifth Row-->
        <div class="row">
          <div class="col-xs-12">
              Purpose/Remark:<textarea id="purpose" class="form-control" rows="3" name="purpose" placeholder="Attention : If it's project cost, please list your project name here!"><?php echo $purpose ?></textarea>
          </div>         
        </div>
    </form>

        <hr>        
        
        <div class="row">
          <div class="col-xs-12">
          <form id="gridForm" action="ajax-gridform-save.php" method="post">
              <input type="hidden" name="prNumber" value="<?php echo $prNumber ?>">  
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
                    // if the user already submit the Grid table data.
                    if($arrayGridContents != ""){
                        $i = 1; //定义行号                    
                        foreach($arrayGridContents as $gridRow){ //遍历表格内容数组 
                            if(is_array($gridRow)){ 
                                $inputName = "row".$i."[]"; // 定义输入框名称，以数组的形式存储数据
                                if($_SESSION["adminUser"]){ //if the user belong to admin group, then only allow him to view.
                                        echo "<tr>";
                                        echo "        <td class='product-title'><input name=\"$inputName\" type='text' value=\"$gridRow[0]\" maxlength='65' class='product-name form-control' readonly='readonly'></td>";
                                        echo "        <td class='product-title'><select name=\"$inputName\" class='product-unit form-control' readonly='readonly'>";
                                        foreach ($arrUnit as $unit) {
                                            if($gridRow[1]===$unit){ 
                                                echo "<option value='$unit' selected=selected>$unit</option>";                                         
                                            }else{
                                                echo "<option>$unit</option>";
                                            }
                                        } 
                                        echo "        </td>";                                    
                                        echo "        <td class='product-title'><input name=\"$inputName\" type='text' value=\"$gridRow[2]\" maxlength='6' class='project-code form-control' readonly='readonly'></td>";
                                        echo "        <td><input name=\"$inputName\" type='text'  value=\"$gridRow[3]\" class='price-per-pallet form-control' readonly='readonly'></td>";
                                        echo "        <td class='num-pallets'>";
                                        echo "                <input name=\"$inputName\" type='text' value=\"$gridRow[4]\" class='num-pallets-input form-control' id='turface-pro-league-num-pallets' readonly='readonly'>";
                                        echo "        </td>";             
                                        echo "        <td class='row-total'>";
                                        echo "                <input name=\"$inputName\" type='text' value=\"$gridRow[5]\" class='row-total-input form-control' id='turface-pro-league-row-total' readonly='readonly'>";
                                        echo "        </td>";
                                        echo "</tr>";                                 
                                }else{ //if the user is not admin group user, then he can edit his own PR form.
                                        echo "<tr>";
                                        echo "        <td class='product-title'><input name=\"$inputName\" type='text' value=\"$gridRow[0]\" maxlength='65' class='product-name form-control'></td>";
                                        echo "        <td class='product-title'><select name=\"$inputName\" class='product-unit form-control'>";
                                        foreach ($arrUnit as $unit) { //populate the unit selection list
                                            if($gridRow[1]===$unit){ 
                                                echo "<option value='$unit' selected=selected>$unit</option>";                                         
                                            }else{
                                                echo "<option>$unit</option>";
                                            }
                                        } 
                                        echo "        </td>"; 
                                        echo "        <td class='product-title'><input name=\"$inputName\" type='text' value=\"$gridRow[2]\" maxlength='6' class='project-code form-control'></td>";
                                        echo "        <td><input name=\"$inputName\" type='text'  value=\"$gridRow[3]\" class='price-per-pallet form-control'></td>";
                                        echo "        <td class='num-pallets'>";
                                        echo "                <input name=\"$inputName\" type='text' value=\"$gridRow[4]\" class='num-pallets-input form-control' id='turface-pro-league-num-pallets'>";
                                        echo "        </td>";             
                                        echo "        <td class='row-total'>";
                                        echo "                <input name=\"$inputName\" type='text' value=\"$gridRow[5]\" class='row-total-input form-control' id='turface-pro-league-row-total' readonly='readonly'>";
                                        echo "        </td>";
                                        echo "</tr>";                                 
                                }

                                $i++;
                            }
                        }
                    }else{ //if the user didn't submit any grid content, then show the blank table.
                        
                        for($i=1; $i<15; $i++){ //遍历表格内容数组 
                                $inputName = "row".$i."[]";
                                echo "<tr>";
                                echo "        <td class='product-title'><input name=\"$inputName\" type='text' maxlength='65' class='product-name form-control' ></td>";
                                echo "        <td class='product-title'><select name=\"$inputName\" class='product-unit form-control'>";
                                foreach ($arrUnit as $unit) {
                                    echo "<option value='$unit'>$unit</option>";
                                } 
                                echo "        </td>"; 
                                echo "        <td class='product-title'><input name=\"$inputName\" type='text' maxlength='6' class='project-code form-control'></td>";
                                echo "        <td><input name=\"$inputName\" type='text' class='price-per-pallet form-control'></td>";
                                echo "        <td class='num-pallets'>";
                                echo "                <input name=\"$inputName\" type='text' class='num-pallets-input form-control' id='turface-pro-league-num-pallets'>";
                                echo "        </td>";             
                                echo "        <td class='row-total'>";
                                echo "                <input name=\"$inputName\" type='text'  class='row-total-input form-control' id='turface-pro-league-row-total' readonly='readonly'>";
                                echo "        </td>";
                                echo "</tr>"; 
                        }                          
                        
                    }
                    ?>
                    <tr>
                        <td colspan="2"></td> 
                        <td colspan="3"><b>Total without VAT</b></td>
                            <td style="text-align: right;">
                                    <input type="text" class="total-box form-control" id="product-subtotal" value="<?php echo $arrayGridContents['totalWithoutTax'] ?>" name="totalWithoutTax" readonly="readonly">
                            </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>                            
                        <td><b>VAT Rate</b></td>
                            <td colspan="2">
                                <select name="taxRate" id="taxRate" class="form-control">                                    
                                        <option  <?php if($taxRate==="0.17"){ echo "selected=selected"; }?> value="0.17">17%</option>
                                        <option  <?php if($taxRate==="0.13"){ echo "selected=selected"; }?> value="0.13">13%</option>
                                        <option  <?php if($taxRate==="0.11"){ echo "selected=selected"; }?> value="0.11">11%</option>
                                        <option  <?php if($taxRate==="0.06"){ echo "selected=selected"; }?> value="0.06">6%</option>
                                        <option  <?php if($taxRate==="0.03"){ echo "selected=selected"; }?> value="0.03">3%</option>
                                        <option  <?php if($taxRate==="0"){ echo "selected=selected"; }?> value="0">0%</option>
                                </select>
                            </td>
                            
                            <td style="text-align: right;">
                                    <input type="text" class="total-box form-control" id="tax" name="tax" value="<?php echo $arrayGridContents['tax'] ?>" readonly="readonly">
                            </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td> 
                        <td colspan="3"><b>Total with VAT</b></td>
                            <td style="text-align: right;">
                                    <input type="text" class="total-box form-control" id="product-subtotal-tax" name="total" value="<?php echo $arrayGridContents['total'] ?>" readonly="readonly">
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
        <br></br>
        <div id="simple-msg"></div>
        <div id="simple-msg-grid"></div>
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