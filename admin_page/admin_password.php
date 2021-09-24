<?php
error_reporting(0);
session_start();
include '../config/functions.php';
include 'csrf-protect.php';

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

    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../assets/css/all.min.css">

    <!-- Custom Css -->
    <link rel="stylesheet" href="../assets/css/style2.css?version=<?= filemtime('../assets/css/style2.css') ?>">

    <!-- Animate Css -->
    <link rel="stylesheet" href="../assets/css/animate.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="col-md-8 p-3 px-md-4 mr-auto offset-md-3">
        <div class="text-center">
            <h4>Form Change Password</h4>
        </div>
        <div class="form-group pt-3">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-transparent" for="ypass">
                        <i class="fas fa-key"></i>
                    </label>
                </div>
                <input type="password" id="ypass" class="bg-transparent form-control" placeholder="Your Password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-transparent" for="npass">
                        <i class="fas fa-key"></i>
                    </label>
                </div>
                <input type="password" id="npass" class="bg-transparent form-control" placeholder="New Password" required>
            </div>
        </div>
        <div class="form-group custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="showpass">
            <label class="custom-control-label" for="showpass">Show Password</label>
        </div>
        <input type="hidden" id="csrf" value="<?= csrf_token() ?>">
        <button class="btn btn-dark form-control" id="submit">Submit</button>
    </div>
    </div>

    <!-- Jquery Js -->
    <script src="../assets/js/jquery-3.6.0.js"></script>

    <!-- Bootstrap Js -->
    <script src="../assets/js/bootstrap.min.js"></script>

    <!-- Sweet2alert Js -->
    <script src="../assets/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#showpass').click(function(e) {
                if ($(this).is(':checked')) {
                    $('#ypass').attr('type', 'text');
                    $('#npass').attr('type', 'text');
                } else {
                    $('#ypass').attr('type', 'password');
                    $('#npass').attr('type', 'password');
                }
            });

            $('#submit').click(function() {
                let ypass = $('#ypass').val();
                let npass = $('#npass').val();
                let csrf = $('#csrf').val();

                if (ypass.length == '') {
                    swal.fire({
                        icon: 'warning',
                        title: 'Oops....',
                        text: 'Check Your Password dont valid'
                    });
                } else if (npass.length == '') {
                    swal.fire({
                        icon: 'warning',
                        title: 'Oops....',
                        text: 'Check Your New Password dont valid'
                    });
                } else {
                    $.ajax({
                        url: "admin_proces_password.php",
                        type: "POST",
                        data: {
                            "id": <?= $query[0]['id'] ?>,
                            "ypass": ypass,
                            "npass": npass,
                            "csrf": csrf
                        },
                        success: function(check) {
                            if (check == "success") {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Change Password Success'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else if (check == "password not same") {
                                swal.fire({
                                    icon: 'warning',
                                    title: 'Opps!',
                                    text: 'Your password is not same'
                                });
                                $('#ypass').val('');
                            }
                        },
                        error: function(check) {
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

</html>