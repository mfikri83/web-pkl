<?php
require 'functions.php';

if (isset($_POST["daftar"])) {

	if (daftar($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambah')
				document.location.href = 'login.php';
			</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<title>Daftar</title>
	<style>
		label {
			display: block;
		}
	</style>
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
				<h1 class="text-center text-info pb-3 mb-3 border-bottom"> Daftar</h1>
				<form action="" method="POST">
					<input class="form-control form-control-lg mb-3" type="username" placeholder="Username" name="username">
					<input class="form-control form-control-lg mb-3" type="password" placeholder="Password" name="password">
					<input class="form-control form-control-lg mb-3" type="password" placeholder="Konfirmasi Password" name="password2">
					<button class="btn btn-info btn-lg btn-block" type="submit" name="daftar">Daftar</button>
				</form>
			</div>
		</div>
	</div>

</body>

</html>