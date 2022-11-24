 
<?php
    
    include ("connect.php");
    $sorgu = $connect->query("SELECT id, adsoyad, tckimlikno,gecerlilik FROM bilgiler");
    
    echo "
    <table> <tr>
    <th>id</th>
    <th>Adı Soyadı</th>
    <th>TC</th>
    <th>GEÇERLİLİK DURUMU</th></th></tr>"; 
 
    while($cikti = $sorgu->fetch(PDO::FETCH_NUM))
    {
       $x=$cikti[0];
       $namesurname=$cikti[1];
       $tc=$cikti[2];
       $gecerlilik=$cikti[3];

 
       echo "<tr>
       <td>$x</td>
       <td>$namesurname </td>
       <td> $tc</td>
       <td> $gecerlilik</td>
       </tr>";
    }  
       echo "</table>";
       $connect=null;
  
   //----------------------------------------------------
?>
