<?php
error_reporting(0);
session_start();

include '../config/functions.php';
include 'csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$query  = query('SELECT * FROM tbpengumuman');
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
            <div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
                <div class="card">
                    <h4 class="text-center card-header">Form Pengumuman</h4>
                    <div class="d-flex justify-content-between text-center pt-2 card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="pengumuman">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pengumuman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($query as $row) { ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><a href="#" class="text-decoration-none" data-modal="modal" data-target="#editpengumuman"><?= $row['judul'] ?></a></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Modal Edit Data -->
                    <div class="modal fade" id="editpengumuman" tabindex="-1" aria-labelledby="editpengumuman" aria-hidden="true">
                    </div>
                    <!-- Modal Tambah Data -->
                    <div class="modal fade" id="tambahpengumuman" tabindex="-1" aria-labelledby="tambahpengumuman" aria-hidden="true">
                    </div>
                </div>
                <button class="btn btn-primary form-control mt-2" id="tambah">Tambah Data</button>
                <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
            </div>
        </div>
    </div>

    <!-- Jquery JS -->
    <script src="../assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap JS -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Sweet2alert JS -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <!-- Tinymce JS -->
    <script src="../assets/tinymce/tinymce.min.js"></script>

    <!-- DataTables Js -->
    <script src="../assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/datatables/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            let opsi = $('#pengumuman').find('a');
            let csrf = $('#csrf').val();

            $('#pengumuman').DataTable({
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

            opsi.click(function() {
                let judul = $(this).text();

                swal.fire({
                    title: 'Pilih Opsi Yang Anda Inginkan',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Edit',
                    denyButtonText: `Hapus`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: 'admin_pengumuman_proces.php',
                            type: 'POST',
                            data: {
                                "judul": judul,
                                "csrf": csrf
                            },
                            success: function(data) {
                                $('#editjudul').val(judul);
                                $('#editpengumuman').html(data);
                                $('#editpengumuman').modal('show');

                                $("#editpengumuman").on("hidden.bs.modal", function() {
                                    $('.modal-dialog').remove();
                                    $("script[src='../assets/tinymce/tinymce.min.js']").remove();
                                    $('script#tinymce').remove();
                                });

                                $('#editdata').click(function() {
                                    let dest = tinyMCE.activeEditor.getContent();
                                    let getjudul = $('#editjudul').val();

                                    $.ajax({
                                        url: 'admin_pengumuman_proces.php',
                                        type: 'POST',
                                        data: {
                                            "pengumuman": dest,
                                            "editjudul": getjudul,
                                            "judul": judul,
                                            "csrf": csrf
                                        },
                                        success: function(e) {
                                            if (e == 'success') {
                                                swal.fire({
                                                    icon: 'success',
                                                    title: 'Data Berhasil Diedit'
                                                }).then((getresult) => {
                                                    if (getresult.isConfirmed) {
                                                        window.location.reload();
                                                    }
                                                });
                                            }
                                        }
                                    });
                                });
                            }
                        });
                    } else if (result.isDenied) {
                        $.ajax({
                            url: 'admin_pengumuman_proces.php',
                            type: 'POST',
                            data: {
                                "hapus": '',
                                "judul": judul,
                                "csrf": csrf
                            },
                            success: function(e) {
                                if (e == 'success') {
                                    swal.fire({
                                        icon: 'success',
                                        title: 'Data Berhasil Di Hapus'
                                    }).then((getresult) => {
                                        if (getresult.isConfirmed) {
                                            window.location.reload();
                                        }
                                    });
                                }
                            }
                        })
                    }
                });
            });

            $('#tambah').click(function(e) {
                e.preventDefault();
                $.ajax({
                    url: 'admin_pengumuman_proces.php',
                    type: 'POST',
                    data: {
                        "tambah": ''
                    },
                    success: function(data) {
                        $('#tambahpengumuman').html(data);
                        $('#tambahpengumuman').modal('show');

                        $("#tambahpengumuman").on("hidden.bs.modal", function() {
                            $('.modal-dialog').remove();
                            $("script[src='../assets/tinymce/tinymce.min.js']").remove();
                            $('script#tinymce').remove();
                        });

                        $('#tambahdata').click(function() {
                            let dest = tinyMCE.activeEditor.getContent();
                            let tambahjudul = $('#tambahjudul').val();

                            $.ajax({
                                url: 'admin_pengumuman_proces.php',
                                type: 'POST',
                                data: {
                                    "tambahjudul": tambahjudul,
                                    "dest": dest,
                                    "csrf": csrf
                                },
                                success: function(result) {
                                    if (result == 'success') {
                                        swal.fire({
                                            icon: 'success',
                                            title: 'Data Berhasil Ditambahkan'
                                        }).then((res) => {
                                            if (res.isConfirmed) {
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