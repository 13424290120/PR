<?php

include_once 'db.php';

$ajaxFormData = $_POST; 
$prNumber = ($ajaxFormData["prNumber"]);
foreach($ajaxFormData as $key=>$value){
    if ($key ==='prNumber'){
        continue;
    }
    //To escape the dangerous and special charactor
    $sqlUpdate = "UPDATE `request` SET `$key`= :value WHERE `prNumber` = :prNumber";
    $stmtUpdate=$db->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':value', $value);
    $stmtUpdate->bindParam(':prNumber', $prNumber);
    $stmtUpdate->execute();
}
echo "<center><h2>Saved Successfully!!!</h2></center>";    
$db=null;
?>