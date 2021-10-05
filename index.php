<?php
include 'config/functions.php';
include 'admin_page/csrf-protect.php';

$query = query("SELECT * FROM tbpengaturan");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="assets/css/animate.min.css">

    <!-- AOS CSS -->
    <link rel="stylesheet" href="assets/css/aos.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style3.css?version=<?= filemtime('assets/css/style3.css') ?>">

    <!-- Favicon -->
    <link rel="icon" href="<?= $query[0]['icon'] ?>" type="image/x-icon">
    <title><?= $query[0]['judul_situs'] ?></title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top header-nav">
        <div class="container">
            <a href="<?= dirname($_SERVER['PHP_SELF']) ?>" class="navbar-brand">Selamat Datang</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Menu Navigation">
                <span id="clpse-icon" class="fa fa-arrow-down fa-arrow-down-animated"></span>
            </button>
            <div id="menu" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="about.php" role="button" class="nav-link">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" role="button" class="nav-link dropdown-toggle" id="submenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pendaftaran
                        </a>
                        <div class="dropdown-menu animate__animated" aria-labelledby="submenu">
                            <a class="dropdown-item" href="daftar.php">Daftar PPDB</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="alur.php">Alur Pendaftaran</a>
                            <a class="dropdown-item" href="syarat.php">Syarat Pendaftaran</a>
                            <a class="dropdown-item" href="panduan.php">Panduan Pendaftaran</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <section class="header" id="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row text-center animate__animated animate__fadeInDown">
                    <div class="col-md-4">
                        <div class="title">
                            <h3>Syarat Pendaftaran</h3>
                        </div>
                        <div class="card card-body description">
                            <h4>Syarat Untuk Para Peserta Pendaftaran PPDB</h4>
                            <a href="syarat.php">Lihat Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="title">
                            <h3>Alur Pendaftaran</h3>
                        </div>
                        <div class="card card-body description">
                            <h4>Informasi Alur Pendaftaran PPDB</h4>
                            <a href="alur.php">Lihat Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="title">
                            <h3>Panduan Pendaftaran</h3>
                        </div>
                        <div class="card card-body description">
                            <h4>Pandunan Cara Daftar PPDB</h4>
                            <a href="panduan.php">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Login -->
    <div class="contact">
        <div class="container">
            <div class="row" data-aos="fade-down" data-aos-duration="2000">
                <div class="card col-md-6 offset-md-3">
                    <div class="card-header text-center">
                        <h2>Login PPDB</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="username" placeholder="username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pass" placeholder="password">
                        </div>
                        <div class="form-group custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="showpass">
                            <label class="custom-control-label" for="showpass">Show Password</label>
                        </div>
                        <button class="btn btn-primary form-control" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-white">
                        <h5>&copy; <?= date("Y") ?> | Built With <i class="fa fa-heart"></i>
                            By <a href="https://facebook.com/dmz.hari.9">DmzHari</a>
                        </h5>
                    </div>
                    <div class="col-md-6 text-white ico">
                        <h4>
                            <a href="<?= $query[0]['facebook'] ?>">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a href="<?= $query[0]['instagram'] ?>">
                                <i class="fab fa-instagram-square"></i>
                            </a>
                            <a href="<?= $query[0]['twitter'] ?>">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                            <a href="https://wa.me/<?= $query[0]['whatsapp'] ?>">
                                <i class="fab fa-whatsapp-square"></i>
                            </a>
                            <a href="<?= $query[0]['youtube'] ?>">
                                <i class="fab fa-youtube-square"></i>
                            </a>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Sweet2alert JS -->
    <script src="assets/js/sweetalert2.all.min.js"></script>

    <!-- AOS JS -->
    <script src="assets/js/aos.js"></script>

    <script>
        AOS.init();

        $(document).ready(function() {
            $('li.nav-item > a').hover(function() {
                $(this).addClass('nav-ac');
            }, function() {
                $(this).removeClass('nav-ac');
            });

            $('li.nav-item > a').click(function() {
                $(this).addClass('nav-ac');
            });

            $('.navbar-toggler').on('click', function() {
                $('#clpse-icon').toggleClass("fa-arrow-up-animated");
            });

            $('#showpass').click(function(e) {
                if ($(this).is(':checked')) {
                    $('#pass').attr('type', 'text');
                } else {
                    $('#pass').attr('type', 'password');
                }
            });

            $('#submit').click(function() {
                let username = $('#username').val();
                let pass = $('#pass').val();

                if (username && pass !== '') {
                    $.ajax({
                        url: "user_login.php",
                        type: 'POST',
                        data: {
                            "username": username,
                            "pass": pass,
                            "sub": 'submit'
                        },
                        success: function(respone) {
                            if (respone == 'success') {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Success Login',
                                });
                                window.location.href = 'user_dashboard.php';
                            } else {
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Gagal Login'
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
                } else {
                    swal.fire({
                        icon: 'warning',
                        title: 'Oopps...',
                        text: 'Data Tidak Boleh Ada Yang Kosong'
                    });
                }
            });

            $(window).scroll(function(e) {
                if ($(window).scrollTop() <= 10) {
                    $('.navbar').addClass('scrolled-up')
                    $('.navbar').removeClass('scrolled-down');
                } else {
                    $('.navbar').addClass('scrolled-down');
                    $('.navbar').removeClass('scrolled-up');
                }
            });
        });
    </script>
</body>

</html>