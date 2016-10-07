<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="gbk">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="jackson li">
    <title>Purchase Requisition</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/order.js"></script>
    
    <script type = "text/javascript" language = "javascript">
        // To get the invoice address from database by ajax
       $(document).ready(function() {
          $("#mySelect").change(function(event){
             var invoiceId = $(this).val();
             $("#address").load('ajax.php', {"id":invoiceId} );
          });
          
            $("#printButton").click(function()
            {
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
                                            $("#simple-msg").fadeOut(5000);

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
                    window.print();

            });
          
       });
       
       // To post data to database by ajax
       
  
    </script>
    
  </head>

  <body>
      
<?php

include_once 'db.php';

//判断用户是否是从首页进入
if(!isset($_POST['lastNumber'])){    
    echo '<div class="error"> Sorry, please visit home page first!<br><a href="index.php">Go Back</a></div>';  
    return false;
}else{
        $lastPRnumber = $_POST['lastNumber'] + 1;
}

if(isset($_POST['requestor']) && $_POST['requestor']){
    $requestor=$_POST['requestor'];
}

$sqlCheckRequest = "SELECT `prNumber` FROM `request` WHERE `prNumber` = $lastPRnumber";
$stmtCheckRequest = $db->prepare($sqlCheckRequest);
$stmtCheckRequest->execute();
$rowCheckRequest = $stmtCheckRequest->fetch(PDO::FETCH_ASSOC);
if (!$rowCheckRequest){
    $sqlNewRequest = "INSERT INTO `request` (`prNumber`,`requestor`) VALUE('$lastPRnumber','$requestor');";
    $stmtNewRequest = $db->prepare($sqlNewRequest);
    $stmtNewRequest->execute();    
}else{
    echo '<div class="error">Sorry, the PR number already registered in the database, please apply a new one!<br><a href="index.php">Go Back</a></div>';
    return false;
}

//从数据库取出字典数据，生成下单清单

$currentDate = date("Y-m-d");

$sqlAccount = "SELECT `id`,`accountNumber`,`description` FROM `account`";
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
          
          PR Number: <input type="text" class="prinput" name="prNumber" value="<?php echo $lastPRnumber ?>">
          PR Date: <input type="text" class="prinput" name="prDate" value="<?php echo $currentDate ?>">
      </div>        

        <div class="row">
          <div class="col-xs-6">
              <p><span class="badge">Supplier Info</span></p>
              Order to:<input name="supplierName" class="form-control"></input>
              Contact:<input name="supplierContact" class="form-control"></input>
              Telephone:<input name="supplierPhone" class="form-control"></input>
          </div>
          <div class="col-xs-6">
              <p><span class="badge">Invoice Info</span></p>
              Invoice to:
              <select id="mySelect" class="form-control" name="invoiceTo" >
                  <option value="0" selected="selected">------------------------------</option>
                  <?php
                  while($rowInvoice = $stmtInvoice->fetch(PDO::FETCH_ASSOC)){
                      echo "<option value=".$rowInvoice['id'].">".$rowInvoice['name']."</option>";                      
                  }
                  ?> 
              </select>              
              Address:<textarea id="address" class="form-control" rows="3"></textarea>

          </div>
        </div>   
        <hr style="margin:5px; margin-bottom: 2px;"></hr>
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
        
        <div class="row">
          <div class="col-xs-4">
              Delivery Date Required:<input class="form-control"></input>
              <span class="badge" style="margin:20px;">With In Budget: <input  type="radio" name="withInBudget" value="1" checked>Yes</input>
              <input type="radio" name="withInBudget" value="0">No</input></span>              
          </div>
          <div class="col-xs-4">
              Project/Study:<input class="form-control" name="projectName"></input>
              <span class="badge" style="margin:20px;"> Recoverable: <input  type="radio" name="Recoverable" value="1">Yes</input>
              <input  type="radio" name="Recoverable" value="0" checked>No</input></span>
          </div>

          <div class="col-xs-4">
              Charge Back To:<textarea class="form-control" rows="3">Customer Code/Name:
                                                                     Charge Amount:
                             </textarea>              

          </div>            
        </div>
        
        
        <div class="row">
          <div class="col-xs-12">
              Purpose:<textarea class="form-control" rows="3" name="purpose"></textarea>
          </div>         
        </div>
        
        <hr></hr>
        
        
        <div class="row">
          <div class="col-xs-12">           

            <table id="order-table" class="table-hover">
                    <tr>
                            <th style="width:55%;">Item</th>
                            <th style="width:10%;">Currency</th>                
                            <th style="width:10%;">UnitPrice</th>		
                            <th style="width:10%;">Quantity</th>
                            <th style="width:10%;">Subtotal</th>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td class="product-title"><input type="text" class="form-control"></td>
                            <td class="equals"><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>                
                            <td><input type="text" class="price-per-pallet form-control"></input></td>
                            <td class="num-pallets">
                                    <input type="text" class="num-pallets-input form-control" id="turface-pro-league-num-pallets"></input>
                            </td>                
                            <td class="row-total">
                                    <input type="text" class="row-total-input form-control" id="turface-pro-league-row-total" disabled="disabled"></input>
                            </td>
                    </tr>
                    <tr>
                            <td>Total:</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="6" style="text-align: right;">
                                    <input type="text" class="total-box form-control" id="product-subtotal" name="total"></input>
                            </td>
                    </tr>
            </table>

          </div>         
        </div>

        <hr></hr>
        
        <div class="row">
          <div class="col-xs-12">
              <table style="width:100%;">
                  <tr>
                      <th style="width:25%;">Requstor</th>
                      <th style="width:25%;">Department Manager</th>
                      <th style="width:25%;">Finance</th>
                      <th style="width:25%;">General Manager</th>
                  </tr>                  
                  <tr>
                      <td><input type="text" class="prinput"></td>
                      <td><input type="text" class="prinput"></td>
                      <td><input type="text" class="prinput"></td>
                      <td><input type="text" class="prinput"></td>
                  </tr>
              </table>
          </div>         
        </div>
        <br></br>
        <div id="simple-msg"></div>
        <div class="row noprint">
            <center><input id="printButton" type="button" value=">>> Print This Form <<<" class="btn btn-success"></center>
            <hr>
        </div>        
        </form>
    </div>
  </body>
</html>