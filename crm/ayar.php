<?php 
try {
  $connect = new PDO("mysql:host=localhost;dbname=crm", "root", "");
  $connect->exec("SET NAMES utf8");
  $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e) {
    echo 'hata: ',  $e->getMessage(), "\n";
}
?>
 