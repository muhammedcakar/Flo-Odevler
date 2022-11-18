<?php

if(isset($_POST["save"])){
    include 'index.php';

    echo "<a href='list.php'> Liste Sayfası </a>
    <br><hr><br><br>";
    $name="";
    $surname="";
    if(!empty($_POST["fnamesurname"]) && !empty($_POST["phone"])){
        $postNameSurname=$_POST["fnamesurname"];  
        $postNumber=$_POST["phone"];
        $nameSurname=explode(" ",$postNameSurname);
        $size=count($nameSurname);
        if($size==2){
           $name=$nameSurname[0];
           $surname=$nameSurname[1];
        }
        else if($size>2){
         $surname=$nameSurname[$size-1];
         for($i=0;$i<($size-1);$i++){
            $name=$name."".$nameSurname[$i]." ";
         }
         $name=rtrim($name);
        }
        else {
            die("lütfen Ad-Soyad Bilgilerini eksiksiz giriniz.");
        }
      //--------------------------------------------------
      try {

         $connect = new PDO("mysql:host=localhost;dbname=kayit_sistemi", "root", "");
         $connect->exec("SET NAMES utf8");
         $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
         $sql = $connect->prepare("INSERT INTO kayitlar(ad, soyad, cep) VALUES(?, ?, ?)");
         $sql->bindParam(1, $name, PDO::PARAM_STR);
         $sql->bindParam(2, $surname, PDO::PARAM_STR);
         $sql->bindParam(3, $postNumber, PDO::PARAM_STR);
 
         $sql->execute();
         echo "<p>Bilgiler başarılı bir şekilde kaydedildi.</p>";
 
     } catch (PDOException $e) {
         die($e->getMessage());
     }
       $connect=null;
       //header("Location:list.php");
    }
   
 } 


?>