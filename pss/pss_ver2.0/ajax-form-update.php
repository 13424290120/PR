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
        //print_r($ajaxFormData);
        $prNumber = ($ajaxFormData["prNumber"]);
        foreach($ajaxFormData as $key=>$value){
            if ($key ==='prNumber'){
                continue;
            }
            //To escape the dangerous and special charactor
            //$convertedValue=  htmlspecialchars($value, ENT_QUOTES);
            $quotedValue = $db->quote($value);
            $sqlUpdate = "UPDATE `request` SET `$key` = $quotedValue WHERE `prNumber` = '$prNumber'";
            $stmtUpdate=$db->prepare($sqlUpdate);            
            $stmtUpdate->execute();            
//            $sqlUpdate ="UPDATE `request` SET `$key` = '$convertedValue' WHERE `prNumber` = '$prNumber'";
//            $sqlUpdate ="UPDATE request SET ? = ? WHERE prNumber = ?";
//            echo $sqlUpdate;
//            $stmtUpdate = $db->prepare('UPDATE request SET :key = :value WHERE prNumber = :prNumber');
//            $stmtUpdate->bindParam(':key',$key);
//            $stmtUpdate->bindParam(':value',$value);
//            $stmtUpdate->bindParam(':prNumber',$prNumber);
            //$stmtUpdate->execute(array($key,$value,$prNumber));
        }
//        echo "<center><h2>You can click the Print Button to print the form now</h2></center>";    
        $db=null;
?>