<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once 'db.php';

//如果传入的ID， 则查询发票名称

if ( isset($_REQUEST["id"]) && $_REQUEST["id"]<> ""){
    $id = $_REQUEST["id"];
    $sqlInvoice = "SELECT `id`,`address` FROM `invoice` WHERE `id` =" . $id;
    $stmtInvoice = $db->prepare($sqlInvoice);
    $stmtInvoice->execute();
    $rowInvoice = $stmtInvoice->fetch(PDO::FETCH_ASSOC);
    echo $rowInvoice['address'];
    exit();
}

//如果传入prNumber, 则查询PR 记录
if ( isset($_REQUEST["prNumber"]) && $_REQUEST["prNumber"] <> "" ){
        $prNumber = $_REQUEST["prNumber"];
        $sqlList = "SELECT r.prNumber AS prNumber, r.requestor AS Requestor, r.supplierName AS supplierName, "
                . "r.total AS Total, r.prDate AS prDate, a.accountNumber AS accountNumber, category.name "
                . "AS categoryName, costcode.code AS costCode from request as r "
                . "INNER JOIN account as a on ( r.accountNumber = a.id ) "
                . "INNER JOIN category ON ( category.id = r.categoryName ) "
                . "INNER JOIN costcode ON ( costcode.id = r.costCode )" 
                . "WHERE r.prNumber='$prNumber'";
        $stmtList = $db->prepare($sqlList);
        $stmtList->execute();
        
        echo '<table class="table table-hover">';
        echo "<tr>";
        echo "<th>prNumber</th>";
        echo "<th>supplierName</th>";
        echo "<th>prDate</th>";
        echo "<th>categoryName</th>";
        echo "<th>costCode</th>";
        echo "<th>accountNumber</th>";                    
        echo "<th>requestor</th>";
        echo "<th>total</th>";
        echo "</tr>";
        
       
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
        echo "</table>";
        exit();    
}else{ //如果什么都没有传入， 则查询最后的PR号
        $sqlRequest = "SELECT `prNumber` FROM `request` ORDER BY `prNumber` DESC LIMIT 1";
        $stmtRequest = $db->prepare($sqlRequest);
        $stmtRequest->execute();
        $rowRequest = $stmtRequest->fetch(PDO::FETCH_ASSOC);
        if ($rowRequest){
            $lastNumber = $rowRequest['prNumber'] + 1;
        }
    echo $lastNumber;
    exit();
} 
?>