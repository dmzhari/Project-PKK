<?php
error_reporting(0);
session_start();

include '../config/functions.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: login.php');
    exit();
}

$query = query('SELECT * FROM tbdaftar');
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
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="container">
        <div class="row">
            <div class="col-md-9 p-3 px-md-4 mr-auto offset-md-3">
                <h5 class="text-center">Form Edit Syarat Daftar</h5>
                <div class="form-group pt-3">
                    <div class="input-group is-invalid">
                        <div class="input-group-prepend">
                            <label class="input-group-text bg-transparent" for="judul">
                                Judul
                            </label>
                        </div>
                        <input type="text" name="judul" id="judul" class="bg-transparent form-control" placeholder="Masukan Judul" value="<?= $query[0]['jdsyarat'] ?>" required>
                    </div>
                    <textarea class="form-control"><?= $query[0]['syaratdaftar'] ?></textarea>
                </div>
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

    <!-- Tinymce JS -->
    <script src="../assets/tinymce/tinymce.min.js"></script>

    <script>
        $(document).ready(function() {

            tinymce.init({
                selector: 'textarea',
                height: '400',
                placeholder: 'Masukan Deskripsi',
                entity_encoding: "raw",
                plugins: [
                    'advlist autolink lists image link charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });

            $('#sub').click(function() {
                let dest = tinyMCE.activeEditor.getContent();
                let judul = $('#judul').val();

                $.ajax({
                    url: "admin_proces_syarat.php",
                    type: "POST",
                    data: {
                        "judul": judul,
                        "description": dest
                    },
                    success: function(e) {
                        if (e == 'success') {
                            swal.fire({
                                icon: 'success',
                                title: 'Data Success Edited'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.reload();
                                }
                            });
                        } else {
                            swal.fire({
                                icon: 'warning',
                                title: 'Gagal Edit'
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