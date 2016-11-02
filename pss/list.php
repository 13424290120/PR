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
    
    
    <script type = "text/javascript" language = "javascript">
       $(document).ready(function() {
          $("#searchButton").click(function(){
             var searchString = $("#searchBox").val();
             // alert (searchString);
            $("#showTable").load('ajax.php', {"prNumber":searchString} );
          });         
       }); 
    </script>   
    
    
  </head>
  <body>
      
      <?php
      
      include_once 'db.php';    

        $sqlStatus = "SELECT `id`,`statusName` FROM `prStatus`";
        $stmtStatus = $db->prepare($sqlStatus);
        $stmtStatus->execute();      
      
      //echo $_SESSION["adminUser"];
      //echo $_SESSION["username"];
      
        //判断用户是否登录
        if(isset($_SESSION["username"]) && $_SESSION["username"]){
            $requestor=$_SESSION["username"];
        }else{
            echo '<div class="error"> Sorry, please login first!<br><a href="index.php">Go Back</a></div>';  
            return false;    
        }      
      
       if($_SESSION["adminUser"]){
            $sqlList = "SELECT r.prNumber AS prNumber, r.requestor AS Requestor, r.supplierName AS supplierName, "
                    . "r.currency AS Currency, r.total AS Total, r.prDate AS prDate, r.prStatus as prStatus, a.accountNumber AS accountNumber, category.name "
                    . "AS categoryName, costcode.code AS costCode, prStatus.statusName AS statusName from request as r "
                    . "INNER JOIN account as a on ( r.accountNumber = a.id ) "
                    . "INNER JOIN category ON ( category.id = r.categoryName ) "
                    . "INNER JOIN costcode ON ( costcode.id = r.costCode ) " 
                    . "INNER JOIN prStatus ON ( prStatus.id = r.prStatus )";
       }else{
            $sqlList = "SELECT r.prNumber AS prNumber, r.requestor AS Requestor, r.supplierName AS supplierName, "
                    . "r.currency AS Currency, r.total AS Total, r.prDate AS prDate, r.prStatus as prStatus, a.accountNumber AS accountNumber, category.name "
                    . "AS categoryName, costcode.code AS costCode,  prStatus.statusName AS statusName from request as r "
                    . "INNER JOIN account as a on ( r.accountNumber = a.id ) "
                    . "INNER JOIN category ON ( category.id = r.categoryName ) "
                    . "INNER JOIN costcode ON ( costcode.id = r.costCode ) "
                    . "INNER JOIN prStatus ON ( prStatus.id = r.prStatus ) WHERE `requestor`='$requestor'";           
       }
      

        $stmtList = $db->prepare($sqlList);
        $stmtList->execute();
        
      ?>
      <div class="container" style="width:1280px;">
          <div class="page-header clearfix" style="display:inline;">
            <div style="margin:10px 0 0 0;width:100px;float:left;"><img src="img/pss-logo.png"></img></div>
            <div style="margin:10px 0px 0px 300px;width:300px;float:left;"><h3>Purchasing History</h3></div>
            <div style="margin:20px 60px 0px 0px;float:right;">
                <input id="searchBox" type="text" placeholder="PR number" class="form-control-static"> 
                <input id="searchButton" type="button" value="Search" class="btn btn-success">
                <?php
                if($_SESSION["adminUser"]){
                    echo "<span class='btn btn-success'><a style='color: #FFF;' href='export.php'>Download</a></span>";
                }                
                ?>
            </div>
          </div> 
      
        <div id="showTable">
            <table class="table table-hover">
                <tr>
                    <th>prNumber</th>
                    <th>supplierName</th>
                    <th>prDate</th>
                    <th>categoryName</th>
                    <th>costCode</th>
                    <th>accountNumber</th>                    
                    <th>requestor</th>
                    <th>Currency</th>
                    <th>total</th>
                    <th>status</th>
                </tr>
                
                <?php
                  while($rowList = $stmtList->fetch(PDO::FETCH_ASSOC)){                      
                    echo "<tr>";
                    echo "<td><a href=edit.php?id=" .$rowList["prNumber"].">".$rowList["prNumber"]."</a></td>";
                    echo "<td>".$rowList["supplierName"]."</td>";
                    echo "<td>".$rowList["prDate"]."</td>";
                    echo "<td>".$rowList["categoryName"]."</td>";
                    echo "<td>".$rowList["costCode"]."</td>";
                    echo "<td>".$rowList["accountNumber"]."</td>";
                    echo "<td>".$rowList["Requestor"]."</td>";
                    echo "<td>".$rowList["Currency"]."</td>";
                    echo "<td>".$rowList["Total"]."</td>";
                    if($_SESSION["adminUser"]){
                        echo "<td>";
//                        echo $rowList['prStatus'];
                        echo "<select id='statusSelect' class='form-control' name='status'>";
                        echo "<option value='3'>New</option>";
                        echo "<option value='4'>FA Approved</option>";
                        echo "<option value='5'>GM Approved</option>";
                        echo "</select>";
                        echo "</td>";
                    }else{
                        echo "<td>".$rowList["statusName"]."</td>";
                    }
                    echo "</tr>";                                           
                  }
                
                ?>
            </table>
        </div>
    </div>
      
      
  </body>
</html>


