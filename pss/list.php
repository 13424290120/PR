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
  </head>
  <body>
      
      <?php
      
      include_once 'db.php';
        $sqlList = "SELECT r.prNumber AS prNumber, r.requestor AS Requestor, r.supplierName AS supplierName, "
                . "r.total AS Total, r.prDate AS prDate, a.accountNumber AS accountNumber, category.name "
                . "AS categoryName, costcode.code AS costCode from request as r "
                . "INNER JOIN account as a on ( r.accountNumber = a.id ) "
                . "INNER JOIN category ON ( category.id = r.categoryName ) "
                . "INNER JOIN costcode ON ( costcode.id = r.costCode )";
        $stmtList = $db->prepare($sqlList);
        $stmtList->execute();
        
      ?>
      <div class="container" style="width:1280px;">
      <div class="page-header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation"><a href="mailto:jackson.li@premiumsoundsolutions.com">Contact Support</a></li>
          </ul>
        </nav>
          <div style="margin:10px;width:100px;float:left;"><img src="img/pss-logo.png"></img></div>
          <div style="margin:10px;width:400px;float:right;"></div>
      </div> 
      
        <div>
            <table class="table table-hover">
                <tr>
                    <th>prNumber</th>
                    <th>supplierName</th>
                    <th>prDate</th>
                    <th>categoryName</th>
                    <th>costCode</th>
                    <th>accountNumber</th>                    
                    <th>requestor</th>
                    <th>total</th>
                </tr>
                
                <?php
                  while($rowList = $stmtList->fetch(PDO::FETCH_ASSOC)){                      
                    echo "<tr>";
                    echo "<td>".$rowList["prNumber"]."</td>";
                    echo "<td>".$rowList["supplierName"]."</td>";
                    echo "<td>".$rowList["prDate"]."</td>";
                    echo "<td>".$rowList["categoryName"]."</td>";
                    echo "<td>".$rowList["costCode"]."</td>";
                    echo "<td>".$rowList["accountNumber"]."</td>";
                    echo "<td>".$rowList["Requestor"]."</td>";
                    echo "<td>".$rowList["Total"]."</td>";
                    echo "</tr>";                                           
                  }
                
                ?>
                

            </table>
        </div>
    </div>
      
      
  </body>
</html>


