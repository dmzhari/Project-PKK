<?php
session_start();
include 'config/functions.php';

$query = query("SELECT * FROM tbsiswa");

if (isset($_POST['sub'])) {
    $username       = htmlspecialchars(addslashes(trim($_POST['username'])));
    $password       = htmlspecialchars(addslashes(trim($_POST['pass'])));

    $login = mysqli_query($con, "SELECT * FROM tbsiswa WHERE username = '$username' AND password = '$password'");
    if (mysqli_num_rows($login) > 0) {
        $_SESSION['username'] = $username;
        echo 'success';
    } else {
        echo 'failed';
    }
}
