<?php
error_reporting(0);
session_start();

include '../config/functions.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/all.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/style2.css?version=<?= filemtime('../assets/css/style2.css') ?>">

    <!-- Animate Css -->
    <link rel="stylesheet" href="../assets/css/animate.min.css">

    <!-- Lightbox Css -->
    <link rel="stylesheet" href="../assets/css/ekko-lightbox.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
                <h5 class="text-center">Pengaturan Edit Pendaftaran</h5>
                <div class="d-flex justify-content-between text-center">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Alur Pendaftaran</td>
                                <td><a href="admin_alur.php">Edit</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <script src="../assets/js/ekko-lightbox.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
</body>

</html>