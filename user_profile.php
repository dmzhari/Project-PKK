<?php
session_start();
include 'config/functions.php';
include 'admin_page/csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: index.php');
    exit();
}

$username   = $_SESSION['username'];
$query      = query("SELECT * FROM tbsiswa WHERE username = '$username'");
$header     = query("SELECT * FROM tbpengaturan");
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

    <!-- Lightbox Css -->
    <link rel="stylesheet" href="assets/css/ekko-lightbox.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $header[0]['icon'] ?>" type="image/x-icon">
    <title>User Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>
    <!-- MAIN -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 p-3 px-md-4 mr-auto offset-md-3">
                <div class="card">
                    <h4 class="text-center card-header">Dashboard Profile</h4>
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <a href="assets/img/<?= $query[0]['foto'] ?>" class="btn" data-title="Profile image" data-max-height="400" data-toggle="lightbox">
                                <img src="assets/img/<?= $query[0]['foto'] ?>" class="rounded rounded-circle" width="160px">
                            </a>
                        </div>
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
                                <div class="input-group-append">
                                    <button class="btn fas fa-eye input-group-text bg-transparent" id="showpass"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="myprofile" name="myimage">
                            <label class="custom-file-label" for="myprofile">Chose file to change image</label>
                        </div>
                        <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
                        <input type="hidden" id="id" value="<?= $query[0]['id'] ?>">
                        <input type="hidden" id="imagebefore" value="<?= $query[0]['foto'] ?>">
                        <div class="form-group d-flex">
                            <button class="btn btn-primary flex-fill mr-2" id="ubah">Ubah Data</button>
                            <button class="btn btn-danger flex-fill" id="back">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 p-3 px-md-4 mr-auto offset-md-3">
                <div class="card">
                    <h4 class="text-center card-header">Edit Data</h4>
                    <div class="card-body">
                        <form action="user_edit_data.php" method="POST">
                            <input type="hidden" name="idsiswa" value="<?= $query[0]['id'] ?>">
                            <button class="btn btn-primary form-control" type="submit">Klick Disini</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Jquery Js -->
    <script src="assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Sweet2Alert Js -->
    <script src="assets/js/sweetalert2.all.min.js"></script>

    <!-- Lighbox Js -->
    <script src="assets/js/ekko-lightbox.min.js"></script>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true,
                showArrows: false,
                wrapping: false
            });
        });

        $(document).ready(function() {
            let id = $('#id').val();
            let csrf = $('#csrf').val();

            $(".custom-file-input").on("change", function() {
                let fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            $('#showpass').click(function() {
                if ($(this).hasClass('fas fa-eye')) {
                    $('#password').attr('type', 'text');
                    $(this).removeClass('fas fa-eye');
                    $(this).addClass('fas fa-eye-slash');
                } else if ($(this).hasClass('fas fa-eye-slash')) {
                    $('#password').attr('type', 'password');
                    $(this).removeClass('fas fa-eye-slash');
                    $(this).addClass('fas fa-eye')
                }
            });

            $('#back').click(function(e) {
                e.preventDefault();
                history.back(1);
            });

            $('#ubah').click(function() {
                let username = $('#username').val();
                let password = $('#password').val();
                let myimage = $('#myprofile').prop('files')[0];
                let imagebefore = $('#imagebefore').val();
                let nis = $('#nis').val();

                let fd = new FormData();
                fd.append("username", username);
                fd.append("password", password);
                fd.append("nis", nis);
                fd.append("imagebefore", imagebefore);
                fd.append("idsiswa", id);
                fd.append("file", myimage);
                fd.append("csrf", csrf);
                fd.append("editprofile", '');

                if (username == '' || password == '' || nis == '' || myimage == undefined) {
                    swal.fire({
                        icon: 'warning',
                        title: 'Data Tidak Boleh Ada Yang Kosong'
                    });
                } else {
                    $.ajax({
                        url: 'user_proces_data.php',
                        type: 'POST',
                        data: fd,
                        cache: false,
                        processData: false,
                        contentType: false,
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