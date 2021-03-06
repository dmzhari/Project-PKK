<?php
error_reporting(0);
session_start();

include '../config/functions.php';
include 'csrf-protect.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$user   = $_SESSION['username'];
$query  = query("SELECT * FROM tblogin WHERE username = '$user'");
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

    <!-- Favicon -->
    <link rel="shortcut icon" href="../<?= $header[0]['icon'] ?>" type="image/x-icon">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8 p-3 px-md-4 mr-auto offset-md-3">
                <div class="d-flex justify-content-center">
                    <a href="img/<?= $query[0]['image'] ?>" class="btn" data-title="Profile image" data-max-height="400" data-toggle="lightbox">
                        <img src="img/<?= $query[0]['image'] ?>" class="rounded rounded-circle" width="160px">
                    </a>
                </div>
                <div class="form-group">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-transparent" for="username">
                                Username
                            </label>
                        </div>
                        <input type="text" class="bg-transparent form-control" id="username" value="<?= $query[0]['username'] ?>">
                    </div>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="myprofile" name="myimage">
                    <label class="custom-file-label" for="myprofile">Chose file to change image</label>
                </div>
                <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
                <button class="btn btn-primary mt-2 form-control" id="edit">Edit data</button>
            </div>
        </div>
    </div>

    <!-- Jquery -->
    <script src="../assets/js/jquery-3.6.0.js"></script>

    <!-- Bootrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Sweet2Alert Js -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <!-- Lighbox Js -->
    <script src="../assets/js/ekko-lightbox.min.js"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true,
                showArrows: false,
                wrapping: false
            });
        });

        $(".custom-file-input").on("change", function() {
            let fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $(document).ready(function() {
            $('#edit').click(function() {
                let myimage = $('#myprofile').prop('files')[0];
                let username = $('#username').val();
                let csrf = $('#csrf').val();
                let fd = new FormData();

                if (username.length == '') {
                    swal.fire({
                        icon: 'warning',
                        title: 'Oppsss..',
                        text: 'Please username dont empty'
                    });
                } else if (myimage == undefined) {
                    swal.fire({
                        icon: 'warning',
                        title: 'Opppss...',
                        text: 'Chose Your File!!'
                    });
                } else {
                    fd.append('file', myimage);
                    fd.append('id', <?= $query[0]['id'] ?>);
                    fd.append('username', username);
                    fd.append('csrf', csrf);

                    $.ajax({
                        type: 'POST',
                        url: "admin_proces_profile.php",
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
                        },
                        error: function(m) {
                            swal.fire({
                                icon: 'error',
                                title: 'Opps!',
                                text: 'Server Error'
                            });
                        }
                    });
                }
            });
        });
    </script>
</body>