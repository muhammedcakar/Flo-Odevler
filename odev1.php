<?php

  function koyunyerlestirme($agilsayisi,$agilkapasite,$toplamkoyunsayisi){
    $toplamkapasite=$agilsayisi*$agilkapasite;
    echo "Toplam Ağıl        :$agilsayisi<br>";
    echo "Bir Ağıl Kapasitesi:$agilkapasite<br>";
    echo "Toplam Kapasite    :$toplamkapasite<br>";
    echo "Toplam Koyun       :$toplamkoyunsayisi<br>";
    $agildizi=array();
    for($i=$agilsayisi-1;$i>=   0;$i--){
        
        if($toplamkoyunsayisi>=$agilkapasite){
            $indis=$i+1;
            $agildizi[$i]=array("agilname"=>"$indis.Ağıl","agildakikoyun"=>$agilkapasite); 
            $toplamkoyunsayisi=$toplamkoyunsayisi-$agilkapasite;
 
        }
        else{
            $indis=$i+1;
            $agildizi[$i]=array("agilname"=>"$indis.Ağıl","agildakikoyun"=>$toplamkoyunsayisi);  
            $toplamkoyunsayisi=0;
        }
      
    }
    foreach($agildizi as $agil){
        echo $agil["agilname"].":".$agil["agildakikoyun"]." Koyun<br>";
    }
    
    echo "Kalan koyun:".$toplamkoyunsayisi." Koyun<br>";



  }
  koyunyerlestirme(5,25,150);
  echo "<hr><br>";
  koyunyerlestirme(4,30,60);
  echo "<hr><br>";
  koyunyerlestirme(2,15,100);
  echo "<hr><br>";
  koyunyerlestirme(2,30,42);
  echo "<hr><br>";




?>