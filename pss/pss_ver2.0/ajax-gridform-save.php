<?php

include_once 'db.php';

//$id = $_REQUEST["id"];
//
//if ( $id <> 0){
//    
//    $sqlInvoice = "SELECT `id`,`address` FROM `invoice` WHERE `id` =" . $id;
//    $stmtInvoice = $db->prepare($sqlInvoice);
//    $stmtInvoice->execute();
//    $rowInvoice = $stmtInvoice->fetch(PDO::FETCH_ASSOC);
//    echo $rowInvoice['address'];
//
//}
        $prNumber = $_POST['prNumber'];
        $taxRate = $_POST['taxRate'];
        //echo $taxRate;
        $tax = $_POST['tax'];
        $totalWithoutTax = $_POST['totalWithoutTax'];
        $total = $_POST['total'];
        //$gridContent = htmlspecialchars(serialize($_POST), ENT_QUOTES); //convert ajax submit array data to a string.
        $gridContents = serialize($_POST);
//        $sqlUpdate = "UPDATE `request` SET `gridContents` = '$gridContent',`taxRate`='$taxRate',`tax`='$tax',`totalWithoutTax`='$totalWithoutTax',`total` = '$total' WHERE `prNumber`='$prNumber'";
//        $stmtUpdate=$db->prepare($sqlUpdate);
//        $stmtUpdate->execute();
        $sqlUpdate = "UPDATE `request` SET `gridContents` = :gridContents,`taxRate`=:taxRate,`tax`=:tax,`totalWithoutTax`=:totalWithoutTax,`total` = :total WHERE `prNumber`=:prNumber";
        $stmtUpdate=$db->prepare($sqlUpdate);
        $stmtUpdate->bindParam(':gridContents',$gridContents);
        $stmtUpdate->bindParam(':taxRate',$taxRate);
        $stmtUpdate->bindParam(':tax',$tax);
        $stmtUpdate->bindParam(':totalWithoutTax',$totalWithoutTax);
        $stmtUpdate->bindParam(':total',$total);
        $stmtUpdate->bindParam(':prNumber',$prNumber);
        $stmtUpdate->execute();
        echo "<center><h2>Saved Successfully!</h2></center>"; 
        $db=null;      
?>