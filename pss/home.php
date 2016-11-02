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

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">


  </head>

  <body>
        
      
    <div class="container">
      <div class="page-header clearfix row">
          <div style="margin:0px;width:100px;float:left;"><img src="img/pss-logo.png"></img></div>
          <span style="float:right; margin: 20px 0 0 0;"><a href="mailto:jackson.li@premiumsoundsolutions.com"> Contact Support </a></span>
      </div>
      <div class="jumbotron">
      <?php
      include_once 'db.php';
            //判断用户是否登录
            if(isset($_SESSION["username"]) && $_SESSION["username"]){
                $requestor=$_SESSION["username"];
            }else{
                echo '<div class="error"> Sorry, please login first!<br><a href="index.php">Go Back</a></div>';  
                return false;    
            }        
      
            // After login, then to generate the PR Number
            $sqlRequest = "SELECT `prNumber` FROM `request` ORDER BY `prNumber` DESC LIMIT 1";
            $stmtRequest = $db->prepare($sqlRequest);
            $stmtRequest->execute();
            $rowRequest = $stmtRequest->fetch(PDO::FETCH_ASSOC);

            // To check DB is there any PR number records.
            if ($rowRequest){
            //    echo "True";
                $lastNumber = $rowRequest['prNumber'];
            //    echo $lastNumber;
            }else{
                $year = date("y");
                $month = date("m");
                if($month<4){
                    $yearCode = $year - 1;
                }else{
                    $yearCode = $year;
                }
                $lastNumber = $yearCode * 10000;
            //    echo "False";
            //    echo $lastNumber;
            }
            echo "<div class='row'>";
            echo "<div class='col-xs-4'>";
            echo "</div>";
            echo "<div class='col-xs-4'>";
            echo "<button class='btn btn-lg btn-primary btn-block' onclick=\"location.href='new.php?lastNumber=$lastNumber'\">New Purchasing Request</button>";
            echo "<button class='btn btn-lg btn-primary btn-block' onclick=\"location.href='list.php'\">Purchasing Request History</button>";                        
            echo "</div>";
            echo "<div class='col-xs-4'>";
            echo "</div>";
            echo "</div>";       
        ?>
  
      </div>        


    </div> <!-- /container -->

  </body>
</html>