<?php 
session_start();
include ("ayar.php");

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
     $gelenid=$_GET['updateid'];
    
    try {
        $sql ="SELECT * FROM customer WHERE `customer`.`id` = $gelenid";
        $sorgu = $connect->prepare($sql);
        $sorgu->execute();
        $satir = $sorgu->fetch(PDO::FETCH_ASSOC);
    
       }
        catch (Exception $e){
            echo '<script>alert("bgghdh.'.$e->getMessage().'")</script>';
        }
       
   
   
    if(isset($_POST['guncelle'])){
       
        $sql = "UPDATE `customer` 
            SET `ad` =  '$_POST[ad]', 
                `soyad` ='$_POST[soyad] ', 
                `cep` = '$_POST[cep]', 
                `vergidairesi` = '$_POST[vdaire]', 
                `vergino` =  '$_POST[vno]',
                `adress` = '$_POST[adres]', 
                `email` = '$_POST[email]' WHERE `id` =$gelenid";
       
        $sorgu = $connect->prepare($sql);
        try {
            $sorgu->execute($dizi);
           }
            catch (Exception $e){
                echo "<script>alert('.$e->getMessage().');
                window.location.href='update.php';  
                </script>";
                exit;
            }
        header("Location:homepage.php");
    }
  
      
    ?>
  <!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>
<body>
    
    <header>
        <div class="container">
            <div class="row">
                <div class="col">
                <h1 class="display-1 text-center">Kayıt Güncelle</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="homepage.php" class="btn btn-outline-primary">Tüm Öğrenciler</a>
                        <a href="save.php" class="btn btn-outline-primary">Müşteri Ekle</a>
                        <a href="logout.php" class="btn btn-outline-primary">Çıkış</a>
                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <main>
    <div class="container">
        <form action="" method="post" class="row ">
            <div class="col-6">
                <label for="ad" class="form-label">Adınız</label>
                <input type="text" class="form-control" name="ad" value="<?=$satir['ad'] ?> " 
                required>
            </div>
            <div class="col-6">
                <label for="soyad" class="form-label">Soyadınız</label>
                <input type="text" class="form-control" name="soyad" value="<?=$satir['soyad']?>" 
                required>
            </div>
            <div class="col-6">
                <label for="cep" class="form-label">Cep No(0 ile başlayamaz)</label>
                <input type="text" class="form-control" name="cep" value="<?=$satir['cep']?>" 
                pattern="[1-9]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}" placeholder="###-###-####" required>
            </div>
            <div class="col-6">
                <label for="vdaire" class="form-label">Vergi Dairesi</label>
                <input type="text" class="form-control" name="vdaire" value="<?=$satir['vergidairesi']?>" 
                placeholder="En az 5 karakter olmalı"  pattern=".{5,}"  required>
            </div>
            <div class="col-6">
                <label for="vno" class="form-label">Vergi Numarası</label>
                <input type="text" class="form-control" name="vno" value="<?=$satir['vergino']?>" 
                 placeholder=" 10 haneli giriniz."   pattern="[1-9]{1}[0-9]{9}"  required>
            </div>
            <div class="col-6">
                <label for="adres" class="form-label">Adres</label>
                <input type="text" class="form-control" name="adres" value="<?=$satir['adress']?>" 
                placeholder="Sokak Cadde numaralarını yazı ile yazınız."  required>
            </div>
            <div class="col-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" value="<?=$satir['email']?>" 
                required>
            </div>
            
   
            <button type="submit" name="guncelle" class="btn btn-primary">Güncelle</button>
        </form>
    </div>
    </main>
    <footer></footer>
</body>
</html>
    <?php
  
}else{
     header("Location: index.php");
     exit();
}
 ?>