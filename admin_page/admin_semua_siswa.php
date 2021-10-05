<?php
error_reporting(0);
session_start();

include '../config/functions.php';
include 'csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$query  = query('SELECT * FROM tbsiswa');
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

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="../assets/datatables/css/dataTables.bootstrap4.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../<?= $header[0]['icon'] ?>" type="image/x-icon">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 p-3 px-md-4 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Data semua siswa yang sudah mendaftar</h4>
                    </div>
                    <div class="table-responsive card-body text-center">
                        <table class="table table-bordered table-striped siswa">
                            <thead>
                                <tr>
                                    <th>Jumlah Siswa</th>
                                    <th><?= count($query) ?></th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($query as $row) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <a class="text-decoration-none" href="#" data-toggle="modal" data-target="#siswa"><?= $row['nama_siswa'] ?></a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <form id="printall" target="_blank" action="admin_proces_siswa.php" method="POST">
                            <input type="hidden" name="printall">
                            <button class="btn btn-primary form-control mt-3" onclick="document.getElementById('printall').submit();">
                                Download Semua Data Siswa
                            </button>
                        </form>
                    </div>
                    <div id="siswa" class="modal fade" tabindex="-1" aria-labelledby="siswa" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Profile Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-dark" id="siswaprint">Print Siswa</button>
                                    <button class="btn btn-primary" id="editsiswa">
                                        Edit
                                    </button>
                                    <button class="btn btn-danger" id="hapussiswa">Hapus</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="modalRel" class="modal fade" tabindex="-1" aria-labelledby="modalRel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Print Siswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="body-rel">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-md-5" id="editdata">
        </div>
        <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
    </div>

    <!-- Jquery JS -->
    <script src="../assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Sweet2alert JS -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <!-- Datepicker JS -->
    <script src="../assets/datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- DataTables Js -->
    <script src="../assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {

            $('.siswa').DataTable({
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search..."
                },
                pageLength: 5,
                lengthMenu: [
                    [5, 10, 20],
                    [5, 10, 20]
                ]
            });

            let namasiswa = $('.siswa').find('a');
            let csrf = $('#csrf').val();

            namasiswa.click(function() {
                $.ajax({
                    url: 'admin_proces_siswa.php',
                    type: 'POST',
                    data: {
                        "lihatsiswa": '',
                        "nama_lengkap": $(this).text(),
                        "csrf": csrf
                    },
                    success: function(data) {
                        $('.modal-body').html(data);
                    }
                });
            });

            $('#hapussiswa').click(function() {
                let id = $('#idsiswa').val();
                let csrf = $('#csrf').val();

                $.ajax({
                    url: 'admin_proces_siswa.php',
                    type: 'POST',
                    data: {
                        "hapussiswa": '',
                        "idsiswa": id,
                        "csrf": csrf
                    },
                    success: function(respone) {
                        if (respone == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Siswa Berhasil Di Hapus'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                    }
                });
            });

            $('#siswaprint').click(function() {
                let id = $('#idsiswa').val();

                $.ajax({
                    url: 'admin_proces_siswa.php',
                    type: 'POST',
                    data: {
                        "idsiswa": id,
                        "printsiswa": ''
                    },
                }).done(function(data) {
                    var fileName = "siswa.pdf";
                    $('#siswa').modal('hide');
                    $('#modalRel').modal('show');
                    let object = "<object data=\"{FileName}\" type=\"application/pdf\" width=\"770px\" height=\"500px\">";
                    object += "Jika Anda Tidak Bisa Melihat Filenya, Anda Bisa <a class=\"text-decoration-none\" href=\"{FileName}\" target=\"_blank\">Klick Disini</a> Untuk Melihatnya Atau Mengunduhnya";
                    object += "</object>";
                    object = object.replace(/{FileName}/g, "files/" + fileName);
                    $("#body-rel").html(object);
                })
            });

            $('#editsiswa').click(function() {
                $.ajax({
                    url: 'admin_edit_siswa.php',
                    type: 'POST',
                    data: {
                        "idsiswa": $('#idsiswa').val()
                    },
                    success: function(data) {
                        $('#editdata').html(data);
                        $('#siswa').modal('hide');

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
                            let status = $('#status').val();
                            let username = $('#username').val();
                            let password = $('#password').val();
                            let id = $('#idsiswa').val();
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
                            fd.append('no_telp', no_telp)
                            fd.append('alamat', alamat);
                            fd.append('kota', kota);
                            fd.append('provinsi', provinsi);
                            fd.append('no_telp', no_telp);
                            fd.append('status', status);
                            fd.append('username', username);
                            fd.append('password', password);
                            fd.append('editsiswa', '');
                            fd.append('csrf', csrf);


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
                                            title: 'Siswa Berhasil Di Edit'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.reload();
                                            }
                                        });
                                    }
                                }
                            });
                        });
                    }
                });
            });

        });
    </script>

</body>

</html>