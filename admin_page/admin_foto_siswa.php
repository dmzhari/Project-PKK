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
                        <h4 class="text-center">Foto Semua Siswa</h4>
                    </div>
                    <div class="table-responsive card-body text-center">
                        <table class="table table-bordered table-striped table-image siswa">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php foreach ($query as $row) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $row['nama_siswa'] ?></td>
                                        <td class="w-25">
                                            <a class="btn" data-toggle="modal" data-target="#fotosiswa">
                                                <img src="../assets/img/<?= $row['foto'] ?>" width="70" height="70">
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $i++ ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="fotosiswa" class="modal fade" tabindex="-1" aria-labelledby="#fotosiswa" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Foto Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body text-center" id="foto">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#editfoto" id="fotosiswaedit">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="editfoto" class="modal fade" tabindex="-1" aria-labelledby="#editfoto" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Foto Siswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto-siswa">
                                    <label class="custom-file-label" for="foto-siswa">Chose File</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" id="sub">
                                    Submit
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Close
                                </button>
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

            $(".custom-file-input").on("change", function() {
                let fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });

            let foto = $('.siswa').find('img');

            foto.click(function() {
                $.ajax({
                    url: 'admin_proces_siswa.php',
                    type: 'POST',
                    data: {
                        "fotosiswa": '',
                        "foto": $(this).attr('src')
                    },
                    success: function(data) {
                        $('#foto').html(data);
                        $('#fotosiswa').modal('show');

                        $('#fotosiswaedit').click(function() {
                            $('#fotosiswa').modal('hide');
                        });
                    }
                });
            });
            $('#sub').click(function() {
                let id = $('#siswa').val();
                let csrf = $('#csrf').val();
                let foto = $('#foto-siswa').prop('files')[0];
                let beforeimage = $('#beforeimage').val();

                let fd = new FormData();

                fd.append("file", foto);
                fd.append("idsiswa", id);
                fd.append("csrf", csrf);
                fd.append("foto", beforeimage)
                fd.append("editfoto", '');

                $.ajax({
                    url: 'admin_proces_siswa.php',
                    type: 'POST',
                    data: fd,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(m) {
                        if (m == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Data Success Edited'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else if (m == 'file not jpg') {
                            swal.fire({
                                icon: 'warning',
                                title: 'Oppss..',
                                text: 'File type only jpg'
                            });
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>