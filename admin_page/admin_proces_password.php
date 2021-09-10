<?php
include '../config/functions.php';
error_reporting(0);
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header('Location: login.php');
}

$ypas   = htmlspecialchars(addslashes(trim($_POST['ypass'])));
$npas   = htmlspecialchars(addslashes(trim($_POST['npass'])));
$id     = htmlspecialchars(addslashes(trim($_POST['id'])));

$check = query("SELECT * FROM tblogin WHERE id = '$id'");
if ($check[0]['password'] == $ypas) {
    $query = "UPDATE tblogin SET password = '$npas' WHERE id = '$id'";

    mysqli_query($con, $query);

    echo 'success';
} else {
    echo 'password not same';
}
