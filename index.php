<?php
session_start();

if (!isset($_SESSION["login"])) {
	header("Location:login.php");
	exit;
}

?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
	<link rel="icon" href="img/smkn17.png" type="image/gif" sizes="16x16">
	<?php if (isset($_GET['dashboard'])) { ?>

	<?php } else if (isset($_GET['data'])) { ?>

	<?php } ?>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link href="bootstrap/css/simple-sidebar.css" rel="stylesheet">
	<link href="open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
	<link href="plugin/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="h-100">
	<div class="d-flex" id="wrapper">

		<!-- S I D E B A R -->
		<div class="bg-light border-right" id="sidebar-wrapper">
			<div class="sidebar-heading"> <img src="img/smkn17.png" alt="" height="70px" align="center"><br> SMKN 17 JAKARTA </div>
			<div class="list-group list-group-flush">
				<a href="index.php?page=dashboard" class="list-group-item list-group-item-action bg-light">
					<i class="oi oi-dashboard"></i> Dashboard
				</a>
				<a href="index.php?page=data" class="list-group-item list-group-item-action bg-light">
					<i class="oi oi-person"></i> Data Siswa
				</a>
				<a href="logout.php" class="list-group-item list-group-item-action bg-light">
					<i class="oi oi-account-logout"></i> Keluar
				</a>
			</div>
		</div>

		<div>
			<?php
			if (isset($_GET['page'])) {
				$page = $_GET['page'];

				switch ($page) {
					case 'dashboard':
						include "dashboard.php";
						break;
					case 'data':
						include "datasiswa.php";
						break;
					default:
						echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
						break;
				}
			} else {
				include "dashboard.php";
			}

			?>
		</div>

		<div class="bg-light fixed-bottom">
			<p class="m-2 text-center text-muted">Copyright &copy; Muhamad Fikri </p>
		</div>


		<script src="bootstrap/js/jquery-4.4.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="plugin/DataTables/js/jquery.dataTables.min.js"></script>
		<script src="plugin/DataTables/js/dataTables.bootstrap4.min.js"></script>

</body>

</html>