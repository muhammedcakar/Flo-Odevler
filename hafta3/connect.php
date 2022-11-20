<?php 

    $connect = new PDO("mysql:host=localhost;dbname=kayit_sistemi", "root", "");
    $connect->exec("SET NAMES utf8");
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
?>