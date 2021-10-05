<?php
include 'config/functions.php';
include 'admin_page/csrf-protect.php';

$link       = query("SELECT * FROM tbpengaturan");
$visimisi   = query("SELECT * FROM tbvisimisi");
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

    <!-- Datepicker Css -->
    <link rel="stylesheet" href="assets/datepicker/css/bootstrap-datepicker.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style3.css?version=<?= filemtime('assets/css/style3.css') ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $link[0]['icon'] ?>" type="image/x-icon">
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

    <!-- Main Header -->
    <div class="header">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-12 animate__animated animate__fadeInDown">
                        <div class="title">
                            <h3>Daftar PPDB</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact text-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center">Silahkan isi form dibawah ini dengan lengkap dan benar</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2 mt-3">
                    <div class="form-group">
                        <input class="form-control" type="text" id="nama-lengkap" placeholder="nama lengkap siswa" required>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="form-group">
                        <input class="form-control" type="text" id="tempat-lahir" placeholder="tempat lahir" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control" type="text" id="tanggal-lahir" placeholder="tanggal lahir" required>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                        <input class="form-control" type="text" id="nama-orangtua" placeholder="nama orang tua" required>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="form-group">
                        <input class="form-control" type="text" id="asal-sekolah" placeholder="asal sekolah" required>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <select class="custom-select" id="jenis-kelamin" required>
                        <option selected>Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="form-group">
                        <textarea class="form-control" type="text" id="alamat" placeholder="alamat" rows="4" required></textarea>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="form-group">
                        <input class="form-control" type="text" id="kota" placeholder="kota" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control" type="text" id="provinsi" placeholder="provinsi" required>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="form-group">
                        <input class="form-control" type="text" id="notelp" placeholder="no telphone/hp" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control" type="text" id="nis" placeholder="NISN/NIS" required>
                    </div>
                </div>
                <div class="col-md-4 offset-md-2">
                    <div class="form-group">
                        <input class="form-control" type="test" id="username" placeholder="username" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="input-group is-invalid">
                            <input class="form-control" type="password" id="password" placeholder="password" required>
                            <div class="input-group-append">
                                <button class="btn fas fa-eye input-group-text" id="showpass"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2 mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="foto-siswa">
                        <label class="custom-file-label" for="foto-siswa">Foto Siswa</label>
                    </div>
                </div>
                <div class="col-md-8 offset-md-2">
                    <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
                    <button class="btn btn-primary form-control" id="sub">Submit</button>
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

        <!-- Datepicker JS -->
        <script src="assets/datepicker/js/bootstrap-datepicker.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#tanggal-lahir').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose: true,
                    todayHighlight: true
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

                $(".custom-file-input").on("change", function() {
                    let fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });

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

                $('#sub').click(function() {
                    let nis = $('#nis').val();
                    let nama_lengkap = $('#nama-lengkap').val();
                    let tempat_lahir = $('#tempat-lahir').val();
                    let tanggal_lahir = $('#tanggal-lahir').val();
                    let nama_orangtua = $('#nama-orangtua').val();
                    let asal_sekolah = $('#asal-sekolah').val();
                    let jenis_kelamin = $('#jenis-kelamin').val();
                    let alamat = $('#alamat').val();
                    let kota = $('#kota').val();
                    let provinsi = $('#provinsi').val();
                    let no_telp = $('#notelp').val();
                    let username = $('#username').val();
                    let password = $('#password').val();
                    let foto = $('#foto-siswa').prop('files')[0];
                    let csrf = $('#csrf').val();

                    let fd = new FormData();
                    fd.append('nis', nis);
                    fd.append('nama_lengkap', nama_lengkap);
                    fd.append('tempat_lahir', tempat_lahir);
                    fd.append('tanggal-lahir', tanggal_lahir);
                    fd.append('nama_orangtua', nama_orangtua);
                    fd.append('asal_sekolah', asal_sekolah);
                    fd.append('jenis_kelamin', jenis_kelamin);
                    fd.append('no_telp', no_telp)
                    fd.append('alamat', alamat);
                    fd.append('kota', kota);
                    fd.append('provinsi', provinsi);
                    fd.append('no_telp', no_telp);
                    fd.append('username', username);
                    fd.append('password', password);
                    fd.append('file', foto);
                    fd.append('tambahsiswa', '');
                    fd.append('csrf', csrf);

                    if (foto == undefined) {
                        swal.fire({
                            icon: 'warning',
                            title: 'Opppss...',
                            text: 'Chose Your File!!'
                        });
                    } else {
                        $.ajax({
                            url: 'daftar_proces_siswa.php',
                            type: 'POST',
                            data: fd,
                            cache: false,
                            processData: false,
                            contentType: false,
                            success: function(respone) {
                                if (respone == 'success') {
                                    swal.fire({
                                        icon: 'success',
                                        title: 'Daftar Berhasil',
                                        text: 'Silahkan Login Dengan Username Dan Password Yang Anda Buat'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = 'index.php';
                                        }
                                    });
                                } else if (respone == 'file not jpg') {
                                    swal.fire({
                                        icon: 'warning',
                                        title: 'Oppss..',
                                        text: 'File type only jpg'
                                    });
                                }
                            }
                        });
                    }
                });
            });
        </script>
</body>

</html>