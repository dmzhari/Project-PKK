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
    <title>Admin Dashboard</title>
</head>

<body>
    <?php include 'header.php' ?>

    <div class="col-md pt-3">
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
                <input type="password" name="ypass" id="ypass" class="bg-transparent form-control" placeholder="Your Password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group is-invalid">
                <div class="input-group-prepend">
                    <label class="input-group-text bg-transparent" for="npass">
                        <i class="fas fa-key"></i>
                    </label>
                </div>
                <input type="password" name="npass" id="npass" class="bg-transparent form-control" placeholder="New Password" required>
            </div>
        </div>
        <button class="btn btn-dark form-control" id="submit">Submit</button>
    </div>
    </div>
    <script src="../assets/js/jquery-3.6.0.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submit').click(function() {
                let ypass = $('#ypass').val();
                let npass = $('#npass').val();

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
                            "npass": npass
                        },
                        success: function(check) {
                            if (check == "success") {
                                swal.fire({
                                    icon: 'success',
                                    title: 'Change Password Success'
                                });
                                $('#ypass').val('');
                                $('#npass').val('');
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