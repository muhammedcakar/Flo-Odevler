<?php
 
 

   
        
$connect = new PDO("mysql:host=localhost;dbname=kayit_sistemi", "root", "");
$connect->exec("SET NAMES utf8");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       
$query = $connect->prepare("DELETE FROM kayitlar WHERE id = :id");
$delete = $query->execute(array(
   'id' => $_GET['id']
));

if ($delete){
    echo "<script>
    alert('Kayıt silindi');
    window.location.href='list.php';
    </script>";
    }
    else
        echo "Kayıt siilinemedi";


?>