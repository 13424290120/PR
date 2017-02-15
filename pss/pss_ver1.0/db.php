<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$db = new PDO('mysql:host=localhost;dbname=purchase;charset=gb2312', 'pss', '1qazWSX');

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db->exec('set names utf8');

?>
