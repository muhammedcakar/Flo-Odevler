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

<body style="text-align:center">
   
           <form method="post" action="save.php">
            <b><label for="fname">Adınız Soyadınız:</label></b><br><br>
            <input type="text" name="fnamesurname" ><br><br>
            <b><label for="lname">Telefon Numaranız:</label></b><br><br>
            <input type="tel"  name="phone"  pattern="[0-9]{3} [0-9]{3} [0-9]{2} [0-9]{2}"
       required ><br><br>
           <input type="submit" name ="save" value="Bilgileri Kaydet"><br>
           </form><br><br>
           <?php
          
 //-----------------------------------------------------------

?>

</body>

</html>