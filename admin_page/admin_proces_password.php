<?php
include '../config/functions.php';
include 'csrf-protect.php';

session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('Location: login.php');
}

$ypas   = htmlspecialchars(addslashes(trim($_POST['ypass'])));
$npas   = htmlspecialchars(addslashes(trim($_POST['npass'])));
$id     = htmlspecialchars(addslashes(trim($_POST['id'])));
$csrf   = htmlspecialchars(addslashes(trim($_POST['csrf'])));

$check = query("SELECT * FROM tblogin WHERE id = '$id'");

if ($ypas == $check[0]['password']) {
    if (check_csrf($csrf)) {
        $query = "UPDATE tblogin SET password = '$npas' WHERE id = '$id'";

        mysqli_query($con, $query);

        echo 'success';
    }
} else {
    echo 'password not same';
}
