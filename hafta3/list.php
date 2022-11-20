<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Veri Tabanı Kayıt</title>
  <style>
  table, td, th {
  border: 1px solid;
  }  

   table {
  width: 100%;
  border-collapse: collapse;
}
</style>  
</head>
<body>
    
<?php
    include 'index.php';
    include "connect.php";
    $sorgu = $connect->query("SELECT id, ad, soyad,cep FROM kayitlar");
    
    echo "
    <table> <tr>
    <th width='60%'>Adı</th>
    <th>Soyadı</th>
    <th>Cep</th>
    <th>İşlem</th></th></tr>"; 
 
    while($cikti = $sorgu->fetch(PDO::FETCH_NUM)){
       $x=$cikti[0];
       $name=$cikti[1];
       $surName=$cikti[2];
 
       echo "<tr>
       <td width='60%'>$name</td>
       <td>$surName </td>
       <td> $cikti[3]</td>
       <td><a href='delete.php?id=$x'>Sil</a></td></tr>";
    }  
    $count=$sorgu->rowCount();
       echo "<tr><td colspan='4'>Sistemde Toplam -$count-Kayıt Var</td></tr></table>";
    $connect=null;
  
   //----------------------------------------------------
?>
</body>
</html>