<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$dbwf = new PDO('mysql:host=localhost;dbname=bugs_pr;charset=utf8', 'dbwf', 'eZNV9pNMAUdLfWyr');

$dbwf->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbwf->exec('set names utf8');

?>
