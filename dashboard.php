    <?php


    require 'functions.php';


    ?>


    <!DOCTYPE html>
    <html lang="en" lang="en" class="h-100">

    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
        <link href="bootstrap/css/simple-sidebar.css" rel="stylesheet">
        <link href="open-iconic/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">
        <link href="plugin/DataTables/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>

    <body class="h-100">
        <div class="container-fluid h-100">
            <div class="jumbotron mt-3">
                <h1>Selamat Datang Di </h1>
                <h1 class="display-4">Website SMKN 17 JAKARTA</h1>
                <h3>Anda login sebagai Administrator</h3>
            </div>
            <hr>

            <?php
            $jml_siswa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM siswa"));
            ?>

            <div class="row mb-3 pb-3">
                <div class="col-sm-6 mb-3">
                    <ul class="list-group">
                        <li class="list-group-item text-danger">
                            <i class="oi oi-person display-3"></i>
                            <span class="display-3 float-right">
                                <?php
                                echo $jml_siswa;
                                ?>
                            </span>
                        </li>
                        <li class="list-group-item text-danger">
                            <a href="index.php?page=data" class="nav-link text-dark"> Jumlah Siswa</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 mb-3">
                <ul class="list-group">
                    <li class="list-group-item text-success">
                        <i class="oi oi-person display-3"></i>
                        <span class="display-3 float-right">
                            <?php
                            echo $jml_siswa;
                            ?>
                        </span>
                    </li>
                    <li class="list-group-item text-danger">
                        <a href="index.php?page=data" class="nav-link text-dark"> Jumlah Siswa</a>
                    </li>
                </ul>
            </div>
        </div>

        <script src="bootstrap/js/jquery-4.4.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="plugin/DataTables/js/jquery.dataTables.min.js"></script>
        <script src="plugin/DataTables/js/dataTables.bootstrap4.min.js"></script>

    </body>

    </html>