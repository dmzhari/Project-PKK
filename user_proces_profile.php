<?php
include 'config/functions.php';
include 'admin_page/csrf-protect.php';

if (isset($_POST['username'])) {
    $username   = htmlspecialchars(addslashes(trim($_POST['username'])));
    $password   = htmlspecialchars(addslashes(trim($_POST['password'])));
    $nis        = htmlspecialchars(addslashes(trim($_POST['nis'])));
    $csrf       = htmlspecialchars(addslashes(trim($_POST['csrf'])));

    $query = "UPDATE tbsiswa SET username = '$username',password = '$password',nis = '$nis'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}