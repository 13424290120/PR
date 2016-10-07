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
          
            $("#saveButton").click(function()
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
            });
          
       });
       
       // To post data to database by ajax
       
  
    </script>
    
  </head>

  <body>
      
<?php

include_once 'db.php';
// get the current date and time

//判断用户是否是从首页进入
//if(!isset($_POST['lastNumber'])){    
//    echo '<div class="error"> Sorry, please visit home page first!</div>';  
//    return false;
//}else{
//        $lastPRnumber = $_POST['lastNumber'] + 1;
//}
//
//if(isset($_POST['requestor']) && $_POST['requestor']){
//    $requestor=$_POST['requestor'];
//}
//
//$sqlCheckRequest = "SELECT `prNumber` FROM `request` WHERE `prNumber` = $lastPRnumber";
//$stmtCheckRequest = $db->prepare($sqlCheckRequest);
//$stmtCheckRequest->execute();
//$rowCheckRequest = $stmtCheckRequest->fetch(PDO::FETCH_ASSOC);
//if (!$rowCheckRequest){
//    $sqlNewRequest = "INSERT INTO `request` (`prNumber`,`requestor`) VALUE('$lastPRnumber','$requestor');";
//    $stmtNewRequest = $db->prepare($sqlNewRequest);
//    $stmtNewRequest->execute();    
//}else{
//    echo '<div class="error">Sorry, the PR number already registered in the database, please apply a new one!</div>';
//    return false;
//}

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
          <h2>PremiumSoundSolutions<small> Purchase Requisition</small></h2>
          
          PR Number: <input type="text" class="prinput" name="prNumber" value="<?php echo $lastPRnumber ?>">
          PR Date: <input type="text" class="prinput" name="requestDate" value="<?php echo $currentDate ?>">
      </div>        

        <div class="row">
          <div class="col-xs-6">
              <p><span class="badge">Supplier Info</span></p>
              Order to:<input name="supplierName" class="form-control"></input>
              Contact:<input name="supplierContact" class="form-control"></input>
              Telephone:<input name="supplierTelephone" class="form-control"></input>
          </div>
          <div class="col-xs-6">
              <p><span class="badge">Invoice Info</span></p>
              Invoice to:
              <select id="mySelect" class="form-control" name="invoiceName" >
                  <option value="0" selected="selected">------------------------------</option>
                  <?php
                  while($rowInvoice = $stmtInvoice->fetch(PDO::FETCH_ASSOC)){
                      echo "<option value=".$rowInvoice['id'].">".$rowInvoice['name']."</option>";                      
                  }
                  ?> 
              </select>              
              Address:<textarea id="address" class="form-control" name="invoiceAddress" rows="3"></textarea>

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
              <select class="form-control" name="accountNo">
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
              Delivery Date Required:<input class="form-control" name="deliveryDate"></input>
              <span class="badge" style="margin:20px;">With In Budget: <input  type="radio" name="withInBudget" checked>Yes</input>
              <input type="radio" name="budget">No</input></span>              
          </div>
          <div class="col-xs-4">
              Project/Study:<input class="form-control"></input>
              <span class="badge" style="margin:20px;"> Recoverable: <input  type="radio" name="Recoverable" >Yes</input>
              <input  type="radio" name="budget" checked>No</input></span>
          </div>

          <div class="col-xs-4">
              Charge Back To:<textarea class="form-control" rows="3">Customer Code/Name:
                                                                     Charge Amount:
                             </textarea>              

          </div>            
        </div>
        
        
        <div class="row">
          <div class="col-xs-12">
              Purpose:<textarea class="form-control" rows="3"></textarea>
          </div>         
        </div>
        
        <hr></hr>
        
        
        <div class="row">
          <div class="col-xs-12">
                <table class="table-hover">
                  <thead>
                    <tr>
                        <th style="width:3%;">No.</th>
                      <th style="width:40%;">Description</th>
                      <th style="width:10%;">Qty</th>
                      <th style="width:10%;">Unit</th>
                      <th style="width:10%;">Currency</th>
                      <th style="width:10%;">UnitPrice</th>
                      <th style="width:15%;">Subtotal</th>                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td>1</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>  
                    <tr>
                        <td>9</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr> 
                    <tr>
                        <td>10</td>
                        <td><input type="text" class="form-control"></td>
                        <td><input type="text" class="form-control num-pallets-input"></td>
                        <td><input type="text" class="form-control"></td>
                        <td><select class="form-control"><option></option><option>RMB</option><option>HKD</option><option>USD</option><option>EURO</option></select></td>
                        <td><input type="text" class="form-control price-per-pallet"></td>
                        <td><input type="text" class="form-control row-total-input" disabled="disabled"></td>
                    </tr>                     
                    <tr>
                        <td></td>
                        <td><h4>Total</h4></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><input type="text" class="form-control" id="product-subtotal" disabled="disabled" name="total"></td>
                    </tr>                      

                  </tbody>
                </table>              
          </div>         
        </div>

        <hr></hr>
        
        <div class="row">
          <div class="col-xs-12">
              <table>
                  <tr>
                      <th style="width:300px;">Requstor</th>
                      <th style="width:300px;">Department Manager</th>
                      <th style="width:300px;">Finance</th>
                      <th style="width:300px;">General Manager</th>
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
            <div class="col-xs-4"></div>             
            <div class="col-xs-4">
                      <input id="saveButton" type="button" value="Save" class="btn btn-success">
                      <input id="printButton" type="button" value="Print" class="btn btn-info" onclick="window.print()">
            </div>
            <div class="col-xs-4"></div>
          </div>
        </form>
        </div>
  </body>
</html>