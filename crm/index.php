<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="login.php" method="post">
     	<h2>GİRİŞ SAYFASI</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Kullanıcı Adı</label>
     	<input type="text" name="uname" placeholder="Kullanıcı adı"><br>

     	<label>Şifre</label>
     	<input type="password" name="password" placeholder="Şifre"><br>

     	<button type="submit">Giriş Yap</button>
     </form>
</body>
</html>

    
    
    
</html>