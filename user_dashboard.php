<?php
session_start();
include 'config/functions.php';

if (!isset($_SESSION['username']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: index.php');
    exit();
}

$query      = query("SELECT * FROM tbsiswa");
$header     = query("SELECT * FROM tbpengaturan");
$pengumuman = query("SELECT * FROM tbpengumuman");

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

    <!-- Datatables CSS -->
    <link rel="stylesheet" href="assets/datatables/css/dataTables.bootstrap4.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $header[0]['icon'] ?>" type="image/x-icon">
    <title>User Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>
    <!-- MAIN -->
    <div class="col-md-8 p-3 px-md-4 mr-auto offset-md-3">
        <h4 class="text-center">Pemberitahuan Pengumuman</h4>
        <div class="table-responsive pt-2">
            <table class="table table-striped table-bordered text-center" id="pengumuman">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pengumuman</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ?>
                    <?php foreach ($pengumuman as $row) { ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>
                                <a href="#" class="text-decoration-none" data-toggle="modal" data-target="#showpengumuman"><?= $row['judul'] ?></a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="showpengumuman" tabindex="-1" aria-labelledby="showpengumuman" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="judul"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Js -->
    <script src="assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- DataTables Js -->
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            let pengumuman = $('#pengumuman').find('a');

            pengumuman.click(function() {
                let judul = $(this).text();
                $('#judul').text(judul);

                $.ajax({
                    url: 'user_pengumuman.php',
                    type: 'POST',
                    data: {
                        "judul": judul
                    },
                    success: function(data) {
                        $('.modal-body').html(data);
                        $('#showpengumuman').modal('show');
                    }
                });
            });
        });

        (function($) {
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
        })(jQuery);
    </script>
</body>

</html>