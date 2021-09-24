<?php
session_start();
include 'config/functions.php';
include 'admin_page/csrf-protect.php';

if (!isset($_SESSION['nis']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: index.php');
    exit();
}

$query = query("SELECT * FROM tbsiswa");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/style2.css?version=<?= filemtime('assets/css/style2.css') ?>">

    <!-- Animate Css -->
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <!-- Sweet2Alert CSS -->
    <link rel="stylesheet" href="assets/css/sweetalert2.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>User Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>
    <!-- MAIN -->
    <div class="col-md-8 p-3 px-md-4 mr-auto offset-md-3">
        <h4 class="text-center">Dashboard Profile</h4>
        <div class="form-group">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-transparent" for="nis">
                        NIS
                    </label>
                </div>
                <input type="text" class="bg-transparent form-control" id="nis" value="<?= $query[0]['nis'] ?>" placeholder="Nomor Nis">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-transparent" for="username">
                        Username
                    </label>
                </div>
                <input type="text" class="bg-transparent form-control" id="username" value="<?= $query[0]['username'] ?>" placeholder="Nama Siswa">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-transparent" for="password">
                        Password
                    </label>
                </div>
                <input type="password" class="bg-transparent form-control" id="password" value="<?= $query[0]['password'] ?>">
            </div>
        </div>
        <div class="form-group custom-control custom-checkbox d-flex justify-content-end">
            <input type="checkbox" class="custom-control-input" id="showpass">
            <label class="custom-control-label" for="showpass">Show Password</label>
        </div>
        <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
        <div class="form-group d-flex">
            <button class="btn btn-primary flex-fill mr-2" id="ubah">Ubah Data</button>
            <button class="btn btn-danger flex-fill">Kembali</button>
        </div>
    </div>

    <!-- Jquery Js -->
    <script src="assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Sweet2Alert Js -->
    <script src="assets/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#showpass').click(function(e) {
                if ($(this).is(':checked')) {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }
            });

            $('#ubah').click(function() {
                let username = $('#username').val();
                let password = $('#password').val();
                let nis = $('#nis').val();
                let csrf = $('#csrf').val();

                if (username == '' || password == '' || nis == '') {
                    swal.fire({
                        icon: 'warning',
                        title: 'Data Tidak Boleh Ada Yang Kosong'
                    });
                } else {
                    $.ajax({
                        url: 'user_proces_profile.php',
                        type: 'POST',
                        data: {
                            "username": username,
                            "password": password,
                            "nis": nis,
                            "csrf": csrf
                        },
                        success: function(respone) {
                            if (respone == 'success') {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Data Berhasil Di Ubah'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Data Gagal Di Ubah'
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
                }
            });
        });
    </script>
</body>

</html>