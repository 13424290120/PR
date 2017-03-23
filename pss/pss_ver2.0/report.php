<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Report</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>
      
<?php 
include_once 'db.php';

$sqlCostCode = "SELECT `id`,`code`,`codeName` FROM `costcode` WHERE `active`=1 ORDER BY `code`";

$stmtCostCode = $db->prepare($sqlCostCode);

$stmtCostCode->execute();   
    
?>
      
    <div class="container">
      <div class="page-header clearfix row">
          <div style="margin:0px;width:100px;float:left;"><img src="img/pss-logo.png"></img></div>
          <span style="float:right; margin: 20px 0 0 0;"><a href="mailto:jackson.li@premiumsoundsolutions.com"> Contact Support </a></span>
      </div>

      
      <div class="form-field">
          <form class="form-signin" method="post" action="export.php" ?>
        <input type='hidden' name='reportForm' value='1'>        
          <h2 class="form-signin-heading">Select Report Date Range</h2>
          <br>
          <label for="costcode" class="sr-only">Cost Center</label>
          <h4>Cost Center</h4>
          <select name="costCode[]" multiple="multiple" size="3" class="form-control">           
              <?php
              while($rowCostCode = $stmtCostCode->fetch(PDO::FETCH_ASSOC)){
                  echo "<option value=".$rowCostCode['id'].">".$rowCostCode['code']." - ".$rowCostCode['codeName']."</option>";                      
              }
              ?>              
          </select>
          <br>           
          <label for="startDate" class="sr-only">Start Date</label>
          <h4>Start Date:</h4>
          <input type="date" id="startDate" class="form-control" placeholder="Start Date" name="startDate" required autofocus>
          <br>        
          <label for="endDate" class="sr-only">End Date</label>
          <h4>End Date:</h4>
          <input type="date" id="endDate" class="form-control" placeholder="End Date" name="endDate" required>
          <br>
          <button class="btn btn-lg btn-primary btn-block" type="submit"> Export Report </button> 
         </form>          
      </div>

<br>
<br>


    </div> <!-- /container -->

  </body>
</html>
