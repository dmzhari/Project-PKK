<?php
session_start();
include 'config/functions.php';

$query = query("SELECT * FROM tbsiswa");

if (isset($_POST['sub'])) {
    $nis        = htmlspecialchars(addslashes(trim($_POST['nis'])));
    $password   = htmlspecialchars(addslashes(trim($_POST['pass'])));

    $login = mysqli_query($con, "SELECT * FROM tbsiswa WHERE nis = '$nis' AND password = '$password'");
    if (mysqli_num_rows($login) > 0) {
        $_SESSION['nis'] = $nis;
        echo 'success';
    } else {
        echo 'failed';
    }
}
