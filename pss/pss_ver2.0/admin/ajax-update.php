<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$formData = $_POST;



foreach($formData as $key=>$account){
    foreach($account as $ikey=>$value){
        echo "<p>$value[0]</p>";
        echo "<p>$value[1]</p>";
        echo "<p>$value[2]</p>";

    }
    
}

