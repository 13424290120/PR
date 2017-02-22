<?php

include_once 'db.php';

$ajaxFormData = $_POST; 
//print_r($ajaxFormData);
$prNumber = ($ajaxFormData["prNumber"]);
foreach($ajaxFormData as $key=>$value){
    if ($key ==='prNumber'){
        continue;
    }
    //To escape the dangerous and special charactor
    $quotedValue = $db->quote($value);
    $sqlUpdate = "UPDATE `request` SET `$key` = $quotedValue WHERE `prNumber` = '$prNumber'";
    $stmtUpdate=$db->prepare($sqlUpdate);            
    $stmtUpdate->execute(); 
}
echo "<center><h2>Saved Successfully!!!</h2></center>";    
$db=null;
?>