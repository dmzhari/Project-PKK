<?php
error_reporting(0);
session_start();

include '../config/functions.php';
include 'csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$link       = query('SELECT * FROM tbpengaturan');
$visimisi   = query('SELECT * FROM tbvisimisi');

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
    <link rel="shortcut icon" href="../<?= $link[0]['icon'] ?>" type="image/x-icon">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container">

        <div class="row">
            <div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
                <div class="card">
                    <h5 class="text-center card-header">Pengaturan Header Situs</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group is-invalid">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-transparent" for="judul_situs">
                                        Judul
                                    </label>
                                </div>
                                <input type="text" id="judul_situs" class="bg-transparent form-control" placeholder="judul/title situs" value="<?= $link[0]['judul_situs'] ?>" required>
                            </div>
                        </div>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="icon">
                            <label class="custom-file-label" for="icon">Chose file icon</label>
                        </div>
                        <input type="hidden" id="beforeicon" value="<?= $link[0]['icon'] ?>">
                        <button class="btn btn-primary form-control" id="editheader">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
                <div class="card">
                    <h5 class="text-center card-header">Pengaturan Edit Pendaftaran</h5>
                    <div class="card-body">
                        <div class="d-flex justify-content-between text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped pengaturan">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Opsi</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Alur Pendaftaran</td>
                                        <td><a href="admin_alur.php">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Syarat Pendaftaran</td>
                                        <td><a href="admin_syarat.php">Edit</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Panduan Pendaftaran</td>
                                        <td><a href="admin_pandu.php">Edit</a></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
                <div class="card">
                    <h5 class="text-center card-header">Pengaturan Visi Misi</h5>
                    <div class="card-body">
                        <div class="d-flex justify-content-between text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped" id="visimisi">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Visi Misi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($visimisi as $row) { ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><a href="#" class="text-decoration-none" data-toggle="modal" data-target="#editvisimisi"><?= $row['visimisi'] ?></a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <button class="btn btn-primary form-control mt-2" data-toggle="modal" data-target="#tambahvisimisi">
                                    Tambah Visi Misi
                                </button>
                            </div>
                            <!-- Modal Edit Visi Misi -->
                            <div class="modal fade" id="editvisimisi" tabindex="-1" aria-labelledby="editvisimisi" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Visi Misi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control" type="text" id="isivisimisi" placeholder="Masukan Visi dan Misi" rows="3"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="editvisi">Submit</button>
                                            <button class="btn btn-danger" id="hapusvisi">Hapus</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Tambah Visi Misi -->
                            <div class="modal fade" id="tambahvisimisi" tabindex="-1" aria-labelledby="tambahvisimisi" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Visi Misi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <textarea class="form-control" type="text" id="tambahvisi" placeholder="Masukan Visi dan Misi" rows="3"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-primary" id="tambahdatavisi">Submit</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
                <div class="card">
                    <h5 class="text-center card-header">Pengaturan Link</h5>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group is-invalid">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-transparent" for="yt">
                                        <i class="fab fa-youtube"></i>
                                    </label>
                                </div>
                                <input type="text" id="yt" class="bg-transparent form-control" placeholder="link youtube" value="<?= $link[0]['youtube'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group is-invalid">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-transparent" for="email">
                                        <i class="fas fa-envelope"></i>
                                    </label>
                                </div>
                                <input type="text" id="email" class="bg-transparent form-control" placeholder="link twitter" value="<?= $link[0]['email'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group is-invalid">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-transparent" for="twitt">
                                        <i class="fab fa-twitter"></i>
                                    </label>
                                </div>
                                <input type="text" id="twitt" class="bg-transparent form-control" placeholder="link twitter" value="<?= $link[0]['twitter'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group is-invalid">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-transparent" for="inst">
                                        <i class="fab fa-instagram"></i>
                                    </label>
                                </div>
                                <input type="text" id="inst" class="bg-transparent form-control" placeholder="link instagram" value="<?= $link[0]['instagram'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group is-invalid">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-transparent" for="facebook">
                                        <i class="fab fa-facebook"></i>
                                    </label>
                                </div>
                                <input type="text" id="facebook" class="bg-transparent form-control" placeholder="link facebook" value="<?= $link[0]['facebook'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group is-invalid">
                                <div class="input-group-prepend">
                                    <label class="input-group-text bg-transparent" for="wa">
                                        <i class="fab fa-whatsapp"></i>
                                    </label>
                                </div>
                                <input type="telp" id="wa" class="bg-transparent form-control" placeholder="nomor whatsapp" value="<?= $link[0]['whatsapp'] ?>" required>
                            </div>
                        </div>
                        <button class="btn btn-primary form-control" id="link">Edit</button>
                    </div>
                </div>
                <div class="card mt-3">
                    <h5 class="text-center card-header">Alamat</h5>
                    <div class="card-body">
                        <div class="form-group pt-3">
                            <textarea class="form-control" rows="4" id="alamat" placeholder="alamat sekolah"><?= $link[0]['alamat'] ?></textarea>
                        </div>
                        <button class="btn btn-primary form-control" id="submitalamat">Edit</button>
                    </div>
                </div>
            </div>
            <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
        </div>

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
            let csrf = $('#csrf').val();
            let visimisi = $('#visimisi').find('a');

            $('#visimisi').DataTable({
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

            $('#editheader').click(function() {
                let titlesite = $('#judul_situs').val();
                let icon = $('#icon').prop('files')[0];
                let beforeicon = $('#beforeicon').val();

                if (icon == undefined) {
                    swal.fire({
                        icon: 'warning',
                        title: 'Opppss...',
                        text: 'Chose Your File!!'
                    });
                } else {
                    let fd = new FormData();
                    fd.append("judul_situs", titlesite);
                    fd.append("file", icon);
                    fd.append("csrf", csrf);
                    fd.append("beforeicon", beforeicon);
                    fd.append("editheader", '');

                    $.ajax({
                        url: 'admin_proces_pengaturan.php',
                        type: 'POST',
                        data: fd,
                        cache: false,
                        processData: false,
                        contentType: false,
                        success: function(respone) {
                            console.log(respone);
                            if (respone == 'success') {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Header Berhasil Di Ganti'
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

            $('#tambahdatavisi').click(function() {
                let data = $('#tambahvisi').val();

                $.ajax({
                    url: 'admin_proces_pengaturan.php',
                    type: 'POST',
                    data: {
                        "tambahvisimisi": '',
                        "visimisi": data,
                        "csrf": csrf
                    },
                    success: function(respone) {
                        if (respone == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Data Berhasil Di Tambahkan'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        }
                    }
                });
            });

            visimisi.click(function() {
                let isi = $(this).text();
                let isivisimisi = $('#isivisimisi').val(isi);

                $('#hapusvisi').click(function() {
                    $.ajax({
                        url: 'admin_proces_pengaturan.php',
                        type: 'POST',
                        data: {
                            "hapusvisimisi": '',
                            "isijudul": isi,
                            "csrf": csrf
                        },
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

                $('#editvisi').click(function() {
                    let getisi = $('#isivisimisi').val();

                    $.ajax({
                        url: 'admin_proces_pengaturan.php',
                        type: 'POST',
                        data: {
                            "judul": isi,
                            "isivisimisi": getisi,
                            "csrf": csrf
                        },
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

            $('#submitalamat').click(function() {
                let alamat = $('#alamat').val();

                $.ajax({
                    url: "admin_proces_pengaturan.php",
                    type: "POST",
                    data: {
                        "editalamat": '',
                        "alamat": alamat,
                        "csrf": csrf
                    },
                    success: function(e) {
                        if (e == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Data Success Edit'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                icon: 'warning',
                                title: 'Data Failed Edited'
                            });
                        }
                    },
                    error: function() {
                        swal.fire({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'Server Error'
                        });
                    }
                });
            });

            $('#link').click(function() {
                let yt = $('#yt').val();
                let inst = $('#inst').val();
                let twitt = $('#twitt').val();
                let wa = $('#wa').val();
                let facebook = $('#facebook').val();
                let email = $('#email').val();

                $.ajax({
                    url: "admin_proces_pengaturan.php",
                    type: "POST",
                    data: {
                        "fb": facebook,
                        "yt": yt,
                        "inst": inst,
                        "wa": wa,
                        "twitt": twitt,
                        "email": email,
                        "alamat": alamat,
                        "csrf": csrf
                    },
                    success: function(e) {
                        if (e == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Data Success Edit'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                icon: 'warning',
                                title: 'Data Failed Edited'
                            });
                        }
                    },
                    error: function() {
                        swal.fire({
                            icon: 'error',
                            title: 'Opps!',
                            text: 'Server Error'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>