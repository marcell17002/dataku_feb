<?php
session_start();

if( isset($_SESSION["login"]) ){
	header("Location: ./bagian_HR/report.php");
	exit;
}

require 'config.php';
if(isset($_POST["login"]) ){
	$username = $_POST["username"];
	$password = $_POST["password"];
	if ($username =="adminHRD" && $password == "admin"){
		$_SESSION["login"] = true;
		header("Location: ./bagian_HR/report.php");
		exit;
	}else{
		if ($username =="adminKeuangan" && $password == "admin"){
			$_SESSION["login"] = true;
			header("Location: ./bagian_keuangan/pengajuan.php");
			exit;
		}else{
			if ($username =="adminManager" && $password == "admin"){
				$_SESSION["login"] = true;
				header("Location: ./manager_akuntansi/pengajuan.php");
				exit;
			}else{
				$error=true;
			}
		}
	
	}

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/slogin.css">
</head>
<body>
	<header>
	</header>
</form action="" method="POST">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-7">
				<div class = "Image">	
					<img src="../assets/img/login.jpg" style="width: 90% ; height : 80%;">				
				</div>
			</div>
		 	<div class="col-md-4">
			 <div class="row">
				<h2 style="color: #0048a6 ; text-align: left;padding-left:5%;padding-top:35%"><b>Welcome</b></h3>
				<p class="font-weight-light" style="font-size: 250%;color: #0048a6 ; text-align: left;padding-left:5%;">Log In </p>
			 </div>

			 <?php if( isset($error)) : ?>
				<p style="color: red; font-style:italic">Username/Password salah</p>
			 <?php endif; ?>
			 <div class="row">
			 <div class="login">
				<form method="post" >
					<h5>Username</h5>
					<input type="text" class="form-control" name="username" placeholder="Username" style="width: 100%;">
					<h5>Password</h5>
					<input type="password" class="form-control" name="password" placeholder="Password" style="width: 100%;">
					<div style="display:flex; justify-content:flex-end; width:100%; padding:0;">
						<button type="submit" class="btn btn-primary" name='login' id='login' style="margin-top:5%">Log in</button>
					</div>
					</form>
				</div>
				</div>
			</div>
			</div>
			<div class="col-md-1">
			</div>
		</div>
		<div class="row">
			<a href="https://www.instagram.com/arntonius/"><h5 style="color: #grey ; text-align: center;padding-top:5%;"> Copyright © 2019-2020 by Marcell Victor. All rights reserved.</h5></a>
		</div>
	</div>
</body>
</html>