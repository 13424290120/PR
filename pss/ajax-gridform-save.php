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
        $total = $_POST['total'];
        
        $gridContent = serialize($_POST); //convert ajax submit array data to a string.
        
        //echo $str;        
        
	//$ajaxFormData = unserialize($gridContent); //convert string to array
        
        $sqlUpdate = "UPDATE `request` SET `gridContents` = '$gridContent',`total` = '$total' WHERE `prNumber`='$prNumber'";
        $stmtUpdate=$db->prepare($sqlUpdate);
        $stmtUpdate->execute();
        echo "<center><h2>Saved Successfully!</h2></center>"; 
        $db=null;
        
        
        
//        foreach($ajaxFormData as $key=>$value){
//            $sqlUpdate ="UPDATE `request` SET `$key` = '$value' WHERE `prNumber` = '$prNumber'";
//
//            $stmtUpdate = $db->prepare($sqlUpdate);
//            $stmtUpdate->execute();
//        }
//        echo "<center><h2>You can click the Print Button to print the form now</h2></center>";        
?>