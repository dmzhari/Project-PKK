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

    <!-- Main -->
    <section class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4 animate__animated animate__fadeInDown">
                        <div class="title">
                            <h3>Syarat Pendaftaran</h3>
                        </div>
                        <div class="card card-body description">
                            <h4>Syarat Untuk Para Peserta Pendaftaran PPDB</h4>
                            <a href="syarat.php">Lihat Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-md-4 animate__animated animate__fadeInDown">
                        <div class="title">
                            <h3>Alur Pendaftaran</h3>
                        </div>
                        <div class="card card-body description">
                            <h4>Informasi Alur Pendaftaran PPDB</h4>
                            <a href="alur.php">Lihat Selengkapnya</a>
                        </div>
                    </div>
                    <div class="col-md-4" data-aos="fade-down" data-aos-duration="1000">
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

    <!-- Contact -->
    <div class="contact">
        <div class="container">
            <div class="row" data-aos="fade-down" data-aos-duration="2000">
                <div class="card col-md-8 offset-md-2">
                    <div class="card-header text-center">
                        <h2>Kontak Kami</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" placeholder="nama">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="email">
                        </div>
                        <div class="form-group">
                            <input type="tel" class="form-control" id="telp" placeholder="nomor telp">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="pesan" placeholder="masukan pesan"></textarea>
                        </div>
                        <button class="btn btn-primary form-control" id="submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login PPDB
    <section class="login">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <div class="card">
                        <div class="card-header text-center">
                            <p>Login PPDB</p>
                        </div>
                        <div class="card-body">
                            <div class="login-form">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="username">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

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

            $('#submit').click(function() {
                let nama = $('#nama').val();
                let email = $('#email').val();
                let telp = $('#telp').val();
                let pesan = $('#pesan').val();

                if (nama && email && telp && pesan !== '') {
                    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                        $.ajax({
                            url: "user_kontak.php",
                            type: 'POST',
                            data: {
                                "nama": nama,
                                "email": email,
                                "telp": telp,
                                "pesan": pesan,
                                "sub": 'submit'
                            },
                            success: function(respone) {
                                if (respone == 'success') {
                                    swal.fire({
                                        icon: 'success',
                                        title: 'Email Terkirim',
                                        text: 'Terima Kasih Telah Kontak Kami'
                                    });
                                } else {
                                    swal.fire({
                                        icon: 'warning',
                                        title: 'Email Gagal Terkirim'
                                    });
                                }

                                console.log(respone);
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
                            title: 'Email No Valid',
                            text: 'Masukan email dengan benar!'
                        });
                    }
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