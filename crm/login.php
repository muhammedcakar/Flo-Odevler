<?php 
session_start(); 

	include ("ayar.php");

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: index.php?error=Kullanıcı adı gereklidir.");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Şifre gereklidir.");
	    exit();
	}else{

		$sql = $connect->query("SELECT * FROM users WHERE username='$uname' AND password='$pass'");

        $count=$sql->rowCount();
		if ($count=== 1) {
			$row = $sql->fetch(PDO::FETCH_ASSOC);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: homepage.php");
		        exit();
            }else{
				header("Location: index.php?error=Kullanıcı adı veya şifre yanlış");
		        exit();
			}
		}else{
			header("Location: index.php?error=Kullanıcı adı veya şifre yanlış");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}