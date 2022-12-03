<?php 
session_start();
include ("ayar.php");

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
   
    if(isset($_GET['savebutton'])){
        include ("csv.php");
    }
   
    $sql ="SELECT * FROM customer";
    $sorgu = $connect->prepare($sql);
    $sorgu->execute();
    
   
    if(isset($_GET['sil'])){
        $sqlsil="DELETE FROM `customer` WHERE `customer`.`id` = ?";
        $sorgusil=$connect->prepare($sqlsil);
        $sorgusil->execute([
            $_GET['sil']
        ]);
     
        header('Location:homepage.php');
     
    }
     if(!empty($_GET['aranan'])){
        
        $sql = "SELECT * FROM `customer` WHERE `ad` LIKE :query";
        $sorgu = $connect->prepare($sql);
        $sorgu->execute([
            'query' => $_GET['aranan']
        ]);
 
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
                    <h1 class="display-1 text-center">Müşteri Yönetim Sistemi</h1>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="btn-group">
                        <a href="homepage.php" class="btn btn-outline-primary">Tüm Müşteriler</a>
                        <a href="save.php" class="btn btn-outline-primary">Müşteri Ekle</a>
                        <form method="get" action="homepage.php">
                         <input type="search" placeholder="Search.." name="aranan">
                         <input type="submit" name="savebutton" class="btn btn-primary" value="CSV Aktar">
                         <a href="logout.php" class="btn btn-outline-primary">Çıkış</a>
                                                 </form>
                    </div>
                    
                   
                    
                </div>
            </div>
        </div>
       
    </header>
    <main>
        <div class="container">
            <div class="row mt-4">
                <div class="col">
                    <table class="table table-hover table-dark table-striped">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Ad </th>
                            <th>Soyad </th>
                            <th>Cep </th>
                            <th>Vergi Dairesi</th>
                            <th>Vergi No </th>
                            <th>Adres</th>
                            <th>E-mail</th>
                            <th>Şirket Logosu</th>
                            <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)) { 
                               

                            
                            ?>
                            <tr>
                                <td><?=$satir['id']?></td>
                                <td><?=$satir['ad']?></td>
                                <td><?=$satir['soyad']?></td>
                                <td><?=$satir['cep']?></td>
                                <td><?=$satir['vergidairesi']?></td>
                                <td><?=$satir['vergino']?></td>
                                <td><?=$satir['adress']?></td>
                                <td><?=$satir['email']?></td>
                                <td>
               <img style ="wiwth:50px;height:50px "src="resim/<?php echo $satir['resimad'];?>">
                               </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="update.php?updateid=<?=$satir['id']?>" class="btn btn-secondary">Güncelle</a>
                                        <a href="?sil=<?=$satir['id']?>" onclick="return confirm('Silinsin mi?')" class="btn btn-danger">Kaldır</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
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