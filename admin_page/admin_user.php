<?php
include '../config/functions.php';
include 'csrf-protect.php';

$csrf           = htmlspecialchars(addslashes(trim($_POST['csrf'])));

if (isset($_POST['username'])) {
    $username   = htmlspecialchars(addslashes(trim($_POST['username'])));
    $password   = htmlspecialchars(addslashes(trim($_POST['password'])));
    $query      = "INSERT INTO tblogin VALUES (null, '$username', '$password', 'admin.jpg')";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
} else if (isset($_POST['deleteadmin'])) {
    $id         = htmlspecialchars(addslashes(trim($_POST['id'])));
    $query      = "DELETE FROM tblogin WHERE id = '$id'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}
