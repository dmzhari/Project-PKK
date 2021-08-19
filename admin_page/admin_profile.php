<?php
error_reporting(0);
session_start();

include 'config/functions.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$user = $_SESSION['username'];
$query = query("SELECT * FROM tblogin WHERE username = '$user'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/style2.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/ekko-lightbox.css">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="col-md pt-3">
        <div class="d-flex justify-content-center">
            <a href="img/<?= $query[0]['image'] ?>" class="btn" data-title="Profile image" data-max-height="400" data-toggle="lightbox">
                <img src="img/<?= $query[0]['image'] ?>" class="rounded rounded-circle" width="160px">
            </a>
        </div>
        <div class="form-group">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-transparent" for="ypass">
                        Username
                    </label>
                </div>
                <input type="text" class="bg-transparent form-control" value="<?= $query[0]['username'] ?>" readonly>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-transparent" for="alamat">
                        alamat
                    </label>
                </div>
                <textarea class="bg-transparent form-control" id="alamat"><?= $query[0]['alamat'] ?></textarea>
            </div>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="myprofile" name="myimage">
            <label class="custom-file-label" for="myprofile">Chose file to change image</label>
        </div>
        <button class="btn btn-primary mt-2 form-control" id="edit">Edit data</button>
    </div>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <script src="../assets/js/ekko-lightbox.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
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
                let alamat = $('#alamat').val();
                let fd = new FormData();

                console.log(myimage);

                if (alamat.length == '') {
                    swal.fire({
                        icon: 'warning',
                        title: 'Oppsss..',
                        text: 'Please alamat dont empty'
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
                    fd.append('alamat', alamat);

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