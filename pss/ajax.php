<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


include_once 'db.php';

$id = $_REQUEST["id"];

if ( $id <> 0){
    
    $sqlInvoice = "SELECT `id`,`address` FROM `invoice` WHERE `id` =" . $id;
    $stmtInvoice = $db->prepare($sqlInvoice);
    $stmtInvoice->execute();
    $rowInvoice = $stmtInvoice->fetch(PDO::FETCH_ASSOC);
    echo $rowInvoice['address'];

}



?>