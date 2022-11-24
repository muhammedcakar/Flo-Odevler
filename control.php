<?php
 class controller{
 
   public function __construct()
   {
   }

   public function tc_control($tckim){  
    $dizi=array(0,1,2,3,4,5,6,7,8,9);
   $count=mb_strlen($tckim);
   if($count != 11)
   {
    echo "<script>
    alert('hatalı tc girişi yaptınız');
    window.location.href='form.php';
    </script>";
   }
   else if($tckim[0]==0)
   {
    echo "<script>
    alert('Tc kimlik no 0 ile başlayamaz..');
    window.location.href='form.php';
    </script>";
    return false;
   }else
    {

    for($i=0;$i<$count;$i++)
    {
        if(in_array($tckim[$i],$dizi)==false)
        {
            echo "<script>
           alert('Tc kimlik sadece rakkamlardan oluşmalıdır...');
           window.location.href='form.php';
           </script>";
          return false;
        }
    }
   
   }
     return true;
   }
   /////SAVE FONKSİYONI /////////////////////////////////////
   public function save($namesurname,$tc,$durum){

    include ("connect.php");

        try {
        $sql = $connect->prepare("INSERT INTO bilgiler(adsoyad,tckimlikno,gecerlilik) VALUES(?,?,?)");
        $sql->bindParam(1, $namesurname, PDO::PARAM_STR);
        $sql->bindParam(2, $tc, PDO::PARAM_STR);
        $sql->bindParam(3, $durum, PDO::PARAM_STR);

        

        $sql->execute();
        echo "<script>
           alert('Bilgiler Başarı ile kaydedildi...');
           window.location.href='form.php';
           </script>";

    } catch (PDOException $e) {
        echo "<script>
        alert(' Bu Tc kimlik numarası kayıtlıdır. ...');
        window.location.href='form.php';
        </script>";
    }
   }
 //-------------------------------------------------------------------
 }

   if(isset($_POST["save"]))
   {
   
       $kontroltc=$_POST["tckimlik"];
       $namesurname=$_POST["fnamesurname"];
       $nesne=new controller();
       $nesne-> tc_control($kontroltc);

       if($nesne->tc_control($kontroltc)){
        $top13579=(($kontroltc[0]+$kontroltc[2]+$kontroltc[4]+$kontroltc[6]+$kontroltc[8])*7);
        $top2468=($kontroltc[1]+$kontroltc[3]+$kontroltc[5]+$kontroltc[7]);
        $alınacakmod=(($top13579-$top2468)%10);
        $alıncakmod2=((($top13579/7)+$top2468+$kontroltc[9])%10);

        if(($alınacakmod == $kontroltc[9]) && ($alıncakmod2 == $kontroltc[10] )){
           
            $nesne -> save($namesurname,$kontroltc,"GEÇERLİ TC");
          
        }
        else {
    
            $nesne-> save($namesurname,$kontroltc,"GEÇERSİZ TC");

           }
       }
    
   }
 

?>