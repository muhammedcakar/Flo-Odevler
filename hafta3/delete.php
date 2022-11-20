<?php

 include "connect.php";
 
       
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