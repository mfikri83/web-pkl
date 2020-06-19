<?php

session_start();

if (!isset($_SESSION["login"])) {
	header("Location:login.php");
	exit;
}


require 'functions.php';

// ambil data daru URL
$id = $_GET["id"];

// query data siswa berdasarkan id
$s = query("SELECT * FROM siswa WHERE id = $id")[0];


// cek apakah tombol submit sudah di tekan apa belum
if (isset($_POST["submit"])) {

	//cek apakah data berhasil di tambahkan atau tidak 
	if (ubah($_POST) > 0) {
		echo "	
 			<script>
 					alert('data berhasil diubah');
 					document.location.href = 'index.php?page=data';
 			</script>";
	} else {
		echo "
 			<script>
 					alert('data gagal diubah');
 					document.location.href = 'index.php?page=data';
 			</script>";
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Ubah Data Siswa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/simple-sidebar.css" rel="stylesheet">
	<link href="open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
	<link href="plugin/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
	<div class="container-fluid">
		<h1 class="mt-2">Ubah Data Siswa</h1>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $s["id"] ?>">
			<input type="hidden" name="gambarLama" value="<?php echo $s["gambar"] ?>">

			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="nis">NIS </label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="nis" id="nis" required value="<?php echo $s["nis"] ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="nama">Nama </label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="nama" id="nama" required value="<?php echo $s["nama"] ?>">
				</div>
			</div>

			<div class="form-group row">
				<label for="kelas" class="col-sm-2 col-form-label">Kelas </label>
				<div class="col-sm-4">
					<select class="custom-select" name="kelas" id="kelas" required value="<?php echo $s["kelas"] ?>">
						<option value="X">X</option>
						<option value="XI">XI</option>
						<option value="XII">XII</option>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="jurusan" class="col-sm-2 col-form-label">Jurusan </label>
				<div class="col-sm-4">
					<select class="custom-select" name="jurusan" id="jurusan" required value="<?php echo $s["jurusan"] ?>">
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
					<input class="form-control" type="text" name="alamat" id="alamat" required value="<?php echo $s["alamat"] ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for="email">Email </label>
				<div class="col-sm-4">
					<input class="form-control" type="email" name="email" id="email" required value="<?php echo $s["email"] ?>">
				</div>
			</div>

			<div class="form-group row">
				<label class="col-sm-2 col-form-label" for=" gambar">Gambar </label>
				<div class="col-sm-4">
					<div class="custom-file">
						<img class=" mr-5" src="img/<?php echo $s['gambar']; ?>" width="40px">
						<input class="custom-file-label ml-5" type="file" name="gambar" id="gambar">
					</div>
				</div>
			</div>

			<button class="btn btn-info " type="submit" name="submit"><i class="oi oi-task"></i> Ubah Data Siswa</button>
		</form>
	</div>
</body>

</html>