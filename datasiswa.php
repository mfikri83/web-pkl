<?php

if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    exit;
}

require 'functions.php';
$siswa = query("SELECT * FROM siswa ORDER BY nama ASC");

if (isset($_POST["cari"])) {
    $siswa = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <title>Halaman Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link href="bootstrap/css/simple-sidebar.css" rel="stylesheet">
    <link href="open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
    <link href="plugin/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body class="h-100">
    <!-- i s i -->
    <div class="container-fluid">
        <div class="jumbotron mt-3">
            <h1>Daftar Siswa</h1>
            <h3>Anda login sebagai Admin</h3>
        </div>
        <a href="tambah.php" class="btn btn-success"><i class="oi oi-plus"></i> Tambah Data Siswa</a>
        <br><br>

        <form action="" method="POST">
            <input class="w-25" type="text" name="keyword" placeholder="Search" autofocus autocomplete="off">
            <button type="submit" name="cari" class="btn btn-primary"> Cari </button>
        </form>
        <br>
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Gambar</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($siswa as $row) : ?>
                    <tr>
                        <td><?php echo ($i); ?></td>
                        <td><img src="img/<?php echo $row["gambar"]; ?>" width="50"></td>
                        <td><?php echo $row["nis"]; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["kelas"]; ?></td>
                        <td><?php echo $row["jurusan"]; ?></td>
                        <td><?php echo $row["alamat"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                            <a href="ubah.php?id=<?php echo $row["id"];     ?>" class="btn btn-sm btn-info"> <i class="oi oi-pencil"></i> Ubah</a>
                            <a href="hapus.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin?');"> <i class="oi oi-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="bootstrap/js/jquery-4.4.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugin/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="plugin/DataTables/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $('.table').DataTables();
        });
    </script>
</body>

</html>