<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="gbk">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="jackson li">
    <title>Purchasing Request</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">    
    <script type="text/javascript" src="../js/jquery.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="page-header clearfix row">
          <div style="margin:0px;width:100px;float:left;"><img src="../img/pss-logo.png"></img></div>
          <span style="float:right; margin: 20px 0 0 0;"><a href="mailto:jackson.li@premiumsoundsolutions.com"> Contact Support </a></span>
      </div>
        <div>
            <?php
            include_once '../db.php';
            $sqlAccount = "SELECT `id`,`accountNumber`,`description`,`active` FROM `account` ORDER BY `accountNumber`";
            $stmtAccount = $db->prepare($sqlAccount);
            $stmtAccount->execute();
            ?>
            <form class="form-group" method="post" action="ajax-update.php">
                <table class="table table-striped">
                    <tr>
                        <th>Account Number</th>
                        <th>Description</th>
                        <th>Enable</th>
                        <th>Disable</th>
                    </tr>
                    <tbody>
                          <?php
                          $i=0;
                          while($rowAccount = $stmtAccount->fetch(PDO::FETCH_ASSOC)){                                                
                                  echo "<tr>";
                                  echo "<td><input type='text' class='form-control' name='account[$i][0]' value=".$rowAccount['accountNumber']."></td>";
                                  echo "<td><input type='text' class='form-control' name='account[$i][1]' value=".$rowAccount['description']."></td>";                                  
                                  if ($rowAccount['active'] === '1'){
                                      echo "<td><input type='radio' class='form-control'  name='account[$i][2]' value='1' checked='checked'></td>";
                                      echo "<td><input type='radio' class='form-control' name='account[$i][2]' value='0' ></td>";
                                  }else{
                                      echo "<td><input type='radio' class='form-control'  name='account[$i][2]' value='1' ></td>";
                                      echo "<td><input type='radio' class='form-control' name='account[$i][2]' value='0' checked='checked'></td>";                                      
                                  }
                                  echo "<input type='hidden' value=".$rowAccount['id'].">";
                                  echo "</tr>";
                                  $i=$i+1;
                          }
                           ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-xs-4">
                        
                    </div>
                    <div class="col-xs-4">
                        <input type="submit" value="Submit" class="form-control">
                    </div>
                    <div class="col-xs-4">
                        
                    </div>                    
                </div>
                
            </form>
        </div>
    </div>
      
  </body>
</html>