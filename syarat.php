<?php
include 'config/functions.php';
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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Kelompok 1 | Beranda</title>
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
                        <a href="#" role="button" class="nav-link">About</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" role="button" class="nav-link">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Header -->
    <div class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 animate__animated animate__fadeInDown">
                        <div class="title">
                            <h3>Syarat Pendaftaran</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="syarat text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="judul-syarat">
                        <h4>Persyaratan Yang Diperlukan</h4>
                    </div>
                    <div class="isi-persyaratan">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit impedit culpa, exercitationem veniam autem sunt iusto omnis inventore quaerat minima expedita iste nisi atque saepe explicabo natus fugiat temporibus molestiae.
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <a href="<?= $query[0]['whatsapp'] ?>">
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