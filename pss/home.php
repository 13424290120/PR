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
          <span class="btn btn-success" style="float:right; margin: 20px 0 0 0;"><a style="color:#FFF;" href="logout.php"> Logout </a></span>
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
            
            $year = date("y"); //取得当前的年份
            $month = date("m"); //取得当前的月份
            if ($month>3){ //如果当前月份大于3月， 就进入新的财年
                $yearCode = $year;               
            }else{ // 如果当前月份小于或等于3月， 就还用去年的财年
                $yearCode = $year - 1;                
            }
            
            $sql = "SELECT `prNumber` FROM `request` WHERE `prNumber` LIKE '$yearCode%' ORDER BY `prNumber` DESC LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if($row){ //如果有找到当前年份的PR， 则取得最后一张PR号
                $lastNumber = $row['prNumber'] + 1;
            }else{ // 如果没有找到当前年份的PR， 则重新生成PR
                $lastNumber = $yearCode * 10000 + 1;
            }           
            $_SESSION["lastNumber"] = $lastNumber;
           
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