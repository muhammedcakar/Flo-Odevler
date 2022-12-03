<?php 
session_start();
include ("ayar.php");


if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    
    if(isset($_REQUEST['csvbutton'])){
        include ("csv.php");
    }

    
    if(isset($_POST["savebutton"]))
    {
        
     $yükleklasor="resim/";
     $tmp_name=$_FILES['resim']['tmp_name'];
     $name=$_FILES['resim']['name'];
     $tip=$_FILES['resim']['type'];
     $uzanti=substr($name,-4,4);
     $rastgele1=rand(10000,50000);
     $rastgele2=rand(10000,50000);
     $resimad="$rastgele1.$rastgele2.$uzanti";
    if($tip =='image/jpeg' || $tip =='image/png' ){
      move_uploaded_file($tmp_name ,"$yükleklasor/$resimad");
      }else{
      echo "<script>
            alert(' Lütfen resim uzantılı bir dosya seçiniz.');
            window.location.href='save.php';
            </script>";
  exit;
  }
 
        $sorgu=$connect->prepare( "INSERT INTO customer (ad,soyad,cep,vergidairesi,vergino, adress, email,resimad) VALUES (?,?,?,?,?,?,?,?)");
        $sorgu->bindParam(1,$_POST["ad"],PDO::PARAM_STR);
        $sorgu->bindParam(2,$_POST["soyad"],PDO::PARAM_STR);
        $sorgu->bindParam(3,$_POST["cep"],PDO::PARAM_STR);
        $sorgu->bindParam(4,$_POST["vdaire"],PDO::PARAM_STR);
        $sorgu->bindParam(5,$_POST["vno"],PDO::PARAM_STR);
        $sorgu->bindParam(6,$_POST["adres"],PDO::PARAM_STR);
        $sorgu->bindParam(7,$_POST["email"],PDO::PARAM_STR);
        $sorgu->bindParam(8,$resimad,PDO::PARAM_STR);
        $sorgu->execute();
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
                    <h1 class="display-1 text-center">Yeni Kayıt</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="homepage.php" class="btn btn-outline-primary">Tüm Müşteriler</a>
                        <form method="post" action="">
                        <input type="submit" name="csvbutton" class="btn btn-primary" value="CSV Aktar">

                        </form>
                        <a href="logout.php" class="btn btn-outline-primary">Çıkış</a>

                    </div>
                </div>
            </div>
        </div>
    
    </header>
    <main>
    <div class="container">
        <form action="" method="post" class="row" enctype="multipart/form-data">
            <div class="col-6">
                <label for="ad" class="form-label">Adınız</label>
                <input type="text" class="form-control" name="ad" required>
            </div>
            <div class="col-6">
                <label for="soyad" class="form-label">Soyadınız</label>
                <input type="text" class="form-control" name="soyad" required>
            </div>
            <div class="col-6">
                <label for="cep" class="form-label">Cep No(0 ile başlayamaz)</label>
                <input type="text"  placeholder="###-###-####" class="form-control" name="cep" 
                   required>
            </div>
            <div class="col-6">
                <label for="vdaire" class="form-label">Vergi Dairesi</label>
                <input type="text" class="form-control" name="vdaire" placeholder="En az 3 karakter olmalı"
                pattern=".{5,}"  required>
            </div>
            <div class="col-6">
                <label for="vno" class="form-label">Vergi Numarası</label>
                <input type="text" class="form-control" name="vno" placeholder=" 10 haneli giriniz."
                 pattern="[1-9]{10}"  required>
            </div>
            <div class="col-6">
                <label for="adres" class="form-label">Adres</label>
                <input type="text" class="form-control" name="adres" placeholder="Sokak Cadde numaralarını yazı ile yazınız."
                  required>
            </div>
            <div class="col-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="col-6">
                <label for="logo" class="form-label">Şirket logosu yükleyin</label>
                <input type="file" class="form-control" name="resim" required><br><br>
            </div>
            <button type="submit" name="savebutton" class="btn btn-primary">Kaydet</button>
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