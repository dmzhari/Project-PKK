<?php
error_reporting(0);
session_start();

include '../config/functions.php';
include 'csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$link = query('SELECT * FROM tbpengaturan');
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
                        <table class="table table-bordered table-striped pengaturan">
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
                            <tr>
                                <td>2</td>
                                <td>Syarat Pendaftaran</td>
                                <td><a href="admin_syarat.php">Edit</a></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Panduan Pendaftaran</td>
                                <td><a href="admin_pandu.php">Edit</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
                <h5 class="text-center">Pengaturan Link</h5>
                <div class="form-group">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-transparent" for="yt">
                                <i class="fab fa-youtube"></i>
                            </label>
                        </div>
                        <input type="text" id="yt" class="bg-transparent form-control" placeholder="link youtube" value="<?= $link[0]['youtube'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-transparent" for="email">
                                <i class="fas fa-envelope"></i>
                            </label>
                        </div>
                        <input type="text" id="email" class="bg-transparent form-control" placeholder="link twitter" value="<?= $link[0]['email'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-transparent" for="twitt">
                                <i class="fab fa-twitter"></i>
                            </label>
                        </div>
                        <input type="text" id="twitt" class="bg-transparent form-control" placeholder="link twitter" value="<?= $link[0]['twitter'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-transparent" for="inst">
                                <i class="fab fa-instagram"></i>
                            </label>
                        </div>
                        <input type="text" id="inst" class="bg-transparent form-control" placeholder="link instagram" value="<?= $link[0]['instagram'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-transparent" for="facebook">
                                <i class="fab fa-facebook"></i>
                            </label>
                        </div>
                        <input type="text" id="facebook" class="bg-transparent form-control" placeholder="link facebook" value="<?= $link[0]['facebook'] ?>" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-transparent" for="wa">
                                <i class="fab fa-whatsapp"></i>
                            </label>
                        </div>
                        <input type="telp" id="wa" class="bg-transparent form-control" placeholder="nomor whatsapp" value="<?= $link[0]['whatsapp'] ?>" required>
                    </div>
                </div>
                <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
                <button class="btn btn-primary form-control" id="link">Edit</button>
            </div>
        </div>

    </div>

    <!-- Jquery JS -->
    <script src="../assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Sweet2alert JS -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <!-- Lighbox JS -->
    <script src="../assets/js/ekko-lightbox.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#link').click(function() {
                let yt = $('#yt').val();
                let inst = $('#inst').val();
                let twitt = $('#twitt').val();
                let wa = $('#wa').val();
                let facebook = $('#facebook').val();
                let email = $('#email').val();
                let csrf = $('#csrf').val();

                $.ajax({
                    url: "admin_proces_link.php",
                    type: "POST",
                    data: {
                        "fb": facebook,
                        "yt": yt,
                        "inst": inst,
                        "wa": wa,
                        "twitt": twitt,
                        "email": email,
                        "csrf": csrf
                    },
                    success: function(e) {
                        if (e == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Data Success Edit'
                            });
                        } else {
                            swal.fire({
                                icon: 'warning',
                                title: 'Data Failed Edited'
                            });
                        }
                    },
                    error: function() {
                        swal.fire({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'Server Error'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>