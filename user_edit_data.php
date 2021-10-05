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

    <!-- Datepicker Css -->
    <link rel="stylesheet" href="assets/datepicker/css/bootstrap-datepicker.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $header[0]['icon'] ?>" type="image/x-icon">
    <title>User Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>
    <!-- MAIN -->
    <div class="container">
        <div class="row">
            <div class="col-md-9 p-3 px-md-4 offset-md-3">
                <div class="card">
                    <h5 class="text-center card-header">Form Edit Data</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <input class="form-control" type="text" id="nama-lengkap" placeholder="nama lengkap siswa" value="<?= $query[0]['nama_siswa'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="tempat-lahir" placeholder="tempat lahir" value="<?= $query[0]['tempat_lahir'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="tanggal-lahir" placeholder="tanggal lahir" value="<?= $query[0]['tanggal_lahir'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="nama-orangtua" placeholder="nama orang tua" value="<?= $query[0]['orang_tua'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="asal-sekolah" placeholder="asal sekolah" value="<?= $query[0]['sekolah'] ?>">
                        </div>
                        <select class="custom-select mb-3" id="jenis-kelamin" required>
                            <option value="">Jenis Kelamin</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                        <div class="form-group">
                            <textarea class="form-control" type="text" id="alamat" placeholder="alamat" rows="4"><?= $query[0]['alamat'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="provinsi" placeholder="provinsi" value="<?= $query[0]['provinsi'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="kota" placeholder="kota" value="<?= $query[0]['kota'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="notelp" placeholder="no telphone/hp" value="<?= $query[0]['no_tlp'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" id="nis" placeholder="NISN/NIS" value="<?= $query[0]['nis'] ?>">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="test" id="username" placeholder="username" value="<?= $query[0]['username'] ?>">
                        </div>
                        <div class="form-group">
                            <div class="input-group is-invalid">
                                <input class="form-control" type="password" id="password" placeholder="password" value="<?= $query[0]['password'] ?>">
                                <div class="input-group-append">
                                    <button class="btn fas fa-eye input-group-text bg-transparent" id="showpass"></i></button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="idsiswa" value="<?= $query[0]['id'] ?>">
                        <input type="hidden" id="status" value="<?= $query[0]['status_siswa'] ?>">
                        <button class="btn btn-primary form-control" id="sub">Submit</button>
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
                let id = $('#idsiswa').val();
                let status = $('#status').val();
                let csrf = $('#csrf').val();

                let fd = new FormData();
                fd.append('nis', nis);
                fd.append('idsiswa', id);
                fd.append('nama_lengkap', nama_lengkap);
                fd.append('tempat_lahir', tempat_lahir);
                fd.append('tanggal-lahir', tanggal_lahir);
                fd.append('nama_orangtua', nama_orangtua);
                fd.append('asal_sekolah', asal_sekolah);
                fd.append('jenis_kelamin', jenis_kelamin);
                fd.append('no_telp', no_telp);
                fd.append('status', status);
                fd.append('alamat', alamat);
                fd.append('kota', kota);
                fd.append('provinsi', provinsi);
                fd.append('no_telp', no_telp);
                fd.append('username', username);
                fd.append('password', password);
                fd.append('editdata', '');
                fd.append('csrf', csrf);


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
                                title: 'Data Berhasil Di Edit'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>