<?php
include 'config/functions.php';

$query = query('SELECT * FROM tbdaftar');
$link = query("SELECT * FROM tbpengaturan");
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
                        <a href="about.php" role="button" class="nav-link">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" role="button" class="nav-link dropdown-toggle" id="submenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pendaftaran
                        </a>
                        <div class="dropdown-menu animate__animated" aria-labelledby="submenu">
                            <a class="dropdown-item" href="alur.php">Alur Pendaftaran</a>
                            <a class="dropdown-item" href="syarat.php">Syarat Pendaftaran</a>
                            <a class="dropdown-item" href="panduan.php">Panduan Pendaftaran</a>
                        </div>
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

    <section class="text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php foreach ($query as $row) { ?>
                        <div class="judul">
                            <h4><?= $row['jdsyarat'] ?></h4>
                        </div>
                        <div class="deskripsi">
                            <?= htmlspecialchars_decode($row['syaratdaftar']) ?>
                        </div>
                    <?php } ?>
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
                            <a href="<?= $link[0]['facebook'] ?>">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a href="<?= $link[0]['instagram'] ?>">
                                <i class="fab fa-instagram-square"></i>
                            </a>
                            <a href="<?= $link[0]['twitter'] ?>">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                            <a href="https://wa.me<?= $link[0]['whatsapp'] ?>">
                                <i class="fab fa-whatsapp-square"></i>
                            </a>
                            <a href="<?= $link[0]['youtube'] ?>">
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