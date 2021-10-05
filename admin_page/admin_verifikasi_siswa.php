<?php
error_reporting(0);
session_start();

include '../config/functions.php';
include 'csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$query  = query('SELECT * FROM tbsiswa WHERE status_siswa = "belum diverifikasi"');
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
                        <h4 class="text-center">Data semua siswa yang belum diverifikasi</h4>
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
                    </div>
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
                            <div class="modal-body" id="data">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="editstatus">Edit Status</button>
                                <button class="btn btn-danger" id="hapussiswa">Hapus</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="statusedit" class="modal fade" tabindex="-1" aria-labelledby="editstatus" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <select class="custom-select" id="status_siswa">
                                    <option value="belum diverifikasi">Belum Diverifikasi</option>
                                    <option value="terima">Terima</option>
                                    <option value="ditolak">Ditolak</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="sub">Submit</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
    </div>

    <!-- Jquery JS -->
    <script src="../assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Sweet2alert JS -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
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
                        $('#data').html(data);
                    }
                });
            });

            $('#editstatus').click(function() {
                $('#siswa').modal('hide');
                $('#statusedit').modal('show');
            });

            $('#sub').click(function() {
                let id = $('#idsiswa').val();
                let status = $('#status_siswa').val();

                $.ajax({
                    url: 'admin_proces_siswa.php',
                    type: 'POST',
                    data: {
                        "editstatus": '',
                        "idsiswa": id,
                        "status": status,
                        "csrf": csrf
                    },
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
        });
    </script>

</body>

</html>