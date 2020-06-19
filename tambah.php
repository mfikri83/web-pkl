<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location:login.php");
	exit;
}
require 'functions.php';

// cek apakah tombol submit sudah di tekan apa belum
if (isset($_POST["submit"])) {

	//cek apakah data berhasil di tambahkan atau tidak 
	if (tambah($_POST) > 0) {
		echo "	
 			<script>
 					alert('data berhasil ditambahkan');
 					document.location.href = 'index.php?page=data';
 			</script>";
	} else {
		echo "
 			<script>
 					alert('data gagal ditambahkan');
 					document.location.href = 'index.php?page=data';
 			</script>";
	}
}

if( isset($_POST["reset"]) ) {
	header("Location:index.php?page=data");
	
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Tambah Data Siswa</title>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/simple-sidebar.css" rel="stylesheet">
	<link href="open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
	<link href="plugin/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body >
	<div class="container-fluid">
	<h1 class="mt-2">Tambah Data Siswa</h1>
	<form action="" method="POST" enctype="multipart/form-data">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="nis">NIS </label>
			<div class="col-sm-4">
				<input class=" form-control" type="text" name="nis" id="nis" autocomplete="off" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="nama">Nama </label>
			<div class="col-sm-4">
				<input class="form-control" type="text" name="nama" id="nama" autocomplete="off" required>
			</div>
		</div>

		<div class="form-group row">
			<label for="kelas" class="col-sm-2 col-form-label"> Kelas </label>
			<div class="col-sm-4">
				<select class="custom-select" name="kelas" id="kelas" required>
					<option value="">- Pilih Kelas -</option>
					<option value="X">X</option>
					<option value="XI">XI</option>
					<option value="XII">XII</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label for="jurusan" class="col-sm-2 col-form-label"> Jurusan </label>
			<div class="col-sm-4">
				<select class="custom-select" name="jurusan" id="jurusan" required>
					<option value="">- Pilih Jurusan -</option>
					<option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
					<option value="Otomatisasi dan Tata Kelola Perkantoran">Otomatisasi dan Tata Kelola Perkantoran</option>
					<option value="Akuntansi dan Keuangan Lembaga">Akuntansi dan Keuangan Lembaga</option>
					<option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
					<option value="Multimedia">Multimedia</option>
					<option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="alamat">Alamat </label>
			<div class="col-sm-4">
				<input class="form-control" type="text" name="alamat" id="alamat" autocomplete="off" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="email">Email </label>
			<div class="col-sm-4">
				<input class="form-control" type="email" name="email" id="email" autocomplete="off" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="gambar">Gambar </label>
			<div class="col-sm-4">
				<div class="custom-file">
					<label for="gambar" class="custom-file-label"></label>
					<input class="custom-file-input" type="file" name="gambar" id="gambar">
				</div>
			</div>
		</div>
		<button class="btn btn-info " type="submit" name="submit"> <i class="oi oi-task"></i> Tambah Data Siswa</button>
		<button class="btn btn-warning" type="reset" name="reset"> <i class="oi oi-circle-x"></i> Batal </button>
		
	</form>
	</div>
	<script src="bootstrap/js/jquery-4.4.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="plugin/DataTables/js/jquery.dataTables.min.js"></script>
	<script src="plugin/DataTables/js/dataTables.bootstrap4.min.js"></script>
</body>

</html>