<?php

session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
	$id = $_COOKIE["id"];
	$key = $_COOKIE["key"];

	// ambil username berdasarkan id
	$result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id ");
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if ($key === hash('sha256', $row["username"])) {
		$_SESSION["login"] = true;
	}
}

if (isset($_SESSION["login"])) {
	header("Location:index.php");
	exit;
}



if (isset($_POST["login"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// cek username
	if (mysqli_num_rows($result) === 1) {

		// cek password 
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {

			// set session
			$_SESSION["login"] = true;


			// cek remember me 
			if (isset($_POST["remember"])) {
				// buat cookie nya
				setcookie('id', $row['id'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}

			header("Location: index.php");
			exit;
		}
	}

	$error = true;
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<link rel="icon" href="img/smkn17.png" type="image/gif" sizes="16x16">
	<title>Login Aplikasi</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link href="bootstrap/css/simple-sidebar.css" rel="stylesheet">
	<link href="open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
	<link href="plugin/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="h-100 bg-info d-flex align-items-center">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 mx-auto bg-light p-4">
				<h1 class="text-center text-info pb-3 mb-3 border-bottom">Login Aplikasi</h1>

				<?php if (isset($error)) : ?>
					<p style="color: red;">Salah</p>
				<?php endif; ?>

				<form method="POST" action="">
					<input class="form-control form-control-lg mb-3" type="text" placeholder="Username" name="username" id="username" autocomplete="none">
					<input class="form-control form-control-lg mb-3" type="password" placeholder="Password" name="password" id="password">
					<input class="form-check-label" type="checkbox" name="remember">
					<label>Remember Me</label>
					<button class="btn btn-info btn-lg btn-block" type="submit" name="login"><i class="oi oi-account-login"></i> Masuk</button>
					<a href="registrasi.php">Daftar</a>
				</form>
			</div>
		</div>
	</div>
</body>

</html>