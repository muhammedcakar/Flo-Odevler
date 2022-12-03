<?php
 
    $sql ="SELECT * FROM customer";
    $sorgu = $connect->prepare($sql);
    $sorgu->execute();

    $dosya="customer.csv";
    touch($dosya);
    $dt=fopen($dosya,"wbt");
    while($satir = $sorgu->fetch(PDO::FETCH_ASSOC)){
       $dizi=array("\n$satir[id]","$satir[ad]","$satir[soyad]","$satir[cep]","$satir[vergidairesi]",
       "$satir[vergino]","$satir[adress]","$satir[email]","$satir[resimad]");
       foreach($dizi as $diz){
        fwrite($dt,"$diz;");
      
       }
    }
   fclose($dt);


?>