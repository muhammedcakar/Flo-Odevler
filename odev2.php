
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sipariş</title>
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

<body style="text-align:center">
   
          <table border='1' width='100%'> <tr>
          <th width='60%'>Ürün Adı</th>
          <th>Ürün Fiyatı</th>
          <th>Adet</td></th> 
  <form method="post" action="">
    <?php
    $urunler = array(
      array("productname" => "Ülker Çikolatalı gofret 40 gr.", "price" => 10),
      array("productname" => "Eti Damak Kare Çikolata 60 gr.", "price" => 20),
      array("productname" => "Nestle Bitter Çikolata 50 gr.", "price" => 15)
    );
    $count =0;
    foreach ($urunler as $urun) {
      $x = "urun_" . $count;
      echo "<tr><td align='left'>$urun[productname]</td>
                <td>$urun[price]  TL</td><td>
                <input type='text' name='$x' value='0' size='2'></td> </tr> ";
      $count=($count+1);
    }
    echo "</table>";
    echo '<input type="submit" action="odev2.php" name="ekle" value="Sepete ekle"
    style="background-color:blue ;color:white;float:right;width:16%">';
    ?>
  </form>
  <?php
    session_start();
    error_reporting(-1);
      $postlar=array();
      $geneltop=0;
    if (isset($_POST['ekle'])) {
///////-----------------
      echo "<b><p align='left'><b>Sepetiniz:</b></p>
            <table border='1' width='100%'> <tr>'
            <th width='60%' >Ürün Adı</td>
            <th>Adet</td>
            <th>Toplam</td></tr>";
      for($i=0;$i<count($urunler);$i++){
        $postname="urun_".$i;
        if(!empty($_POST[$postname])){
        $ürünadı=$urunler[$i]["productname"];
        $toplam= $urunler[$i]["price"]*$_POST[$postname];
        $postlar[]=array("productname"=>"$ürünadı","Adet"=>$_POST[$postname],"Toplam"=>$toplam);
        $geneltop=($geneltop+$toplam);
       } 
        }
        foreach($postlar as $post){
         echo "
            <td align='left'>$post[productname]</td>
            <td>$post[Adet]</td>
            <td>$post[Toplam]</td></tr>";
        }
        echo "<tr><td colspan='2' align='left'>Genel Toplam Tutar.
        <td >$geneltop TL</td></td></tr></table>";
      }
      $_SESSION["sepet"]=$postlar;
        
  ?>

</body>

</html>