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


	$ajaxFormData = $_POST;      
        $prNumber = ($ajaxFormData["prNumber"]);
        foreach($ajaxFormData as $key=>$value){
            $sqlUpdate ="UPDATE `request` SET `$key` = '$value' WHERE `prNumber` = '$prNumber'";
//            echo $sqlUpdate;
            $stmtUpdate = $db->prepare($sqlUpdate);
            $stmtUpdate->execute();
        }
//        echo "<center><h2>You can click the Print Button to print the form now</h2></center>";        
?>