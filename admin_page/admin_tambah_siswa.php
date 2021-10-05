<?php
error_reporting(0);
session_start();

include '../config/functions.php';
include 'csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$header = query("SELECT * FROM tbpengaturan");
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

    <!-- Datepicker Css -->
    <link rel="stylesheet" href="../assets/datepicker/css/bootstrap-datepicker.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../<?= $header[0]['icon'] ?>" type="image/x-icon">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 p-3 px-md-4 offset-md-3">
                <h4 class="text-center">Form Add Siswa</h4>
            </div>
        </div>
        <div class="row px-md-5">
            <div class="col-md-9 offset-md-3">
                <div class="form-group">
                    <input class="form-control" type="text" id="nama-lengkap" placeholder="nama lengkap siswa" required>
                </div>
            </div>
            <div class="col-md-4 offset-md-3 mr-auto">
                <div class="form-group">
                    <input class="form-control" type="text" id="tempat-lahir" placeholder="tempat lahir" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input class="form-control" type="text" id="tanggal-lahir" placeholder="tanggal lahir" required>
                </div>
            </div>
            <div class="col-md-9 offset-md-3">
                <div class="form-group">
                    <input class="form-control" type="text" id="nama-orangtua" placeholder="nama orang tua" required>
                </div>
            </div>
            <div class="col-md-4 offset-md-3 mr-auto">
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
            <div class="col-md-9 offset-md-3">
                <div class="form-group">
                    <textarea class="form-control" type="text" id="alamat" placeholder="alamat" rows="4" required></textarea>
                </div>
            </div>
            <div class="col-md-3 offset-md-3">
                <div class="form-group">
                    <input class="form-control" type="text" id="kota" placeholder="kota" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" type="text" id="provinsi" placeholder="provinsi" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" type="text" id="notelp" placeholder="no telphone/hp" required>
                </div>
            </div>
            <div class="col-md-9 offset-md-3 mb-3">
                <select class="custom-select" id="status" required>
                    <option selected>Status Siswa</option>
                    <option value="belum diverifikasi">Belum Diverifikasi</option>
                    <option value="terima">Terima</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>
            <div class="col-md-3 offset-md-3">
                <div class="form-group">
                    <input class="form-control" type="text" id="nis" placeholder="NISN/NIS" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <input class="form-control" type="test" id="username" placeholder="username" required>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group is-invalid">
                        <input class="form-control" type="password" id="password" placeholder="password" required>
                        <div class="input-group-append">
                            <button class="btn fas fa-eye input-group-text bg-transparent" id="showpass"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9 offset-md-3 mb-3">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="foto-siswa">
                    <label class="custom-file-label" for="foto-siswa">Foto Siswa</label>
                </div>
            </div>
            <div class="col-md-9 offset-md-3 pb-3">
                <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
                <button class="btn btn-primary form-control" id="sub">Submit</button>
            </div>
        </div>
    </div>

    <!-- Jquery JS -->
    <script src="../assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Sweet2alert JS -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <!-- Datepicker JS -->
    <script src="../assets/datepicker/js/bootstrap-datepicker.min.js"></script>

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
                let status = $('#status').val();
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
                fd.append('status', status);
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
                        url: 'admin_proces_siswa.php',
                        type: 'POST',
                        data: fd,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(respone) {
                            if (respone == 'success') {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Siswa Berhasil Ditambahkan'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
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