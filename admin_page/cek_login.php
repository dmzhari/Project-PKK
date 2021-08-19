<?php
include 'config/functions.php';

error_reporting(0);
session_start();
ob_start();

// Filter BUG Injection
$user = htmlspecialchars(addslashes(trim($_POST['username'])));
$pass = htmlspecialchars(addslashes(trim($_POST['password'])));

$login = mysqli_query($con, "SELECT * FROM tblogin WHERE username = '$user' AND password = '$pass'");

if (mysqli_num_rows($login) > 0) {
    $_SESSION['username'] = $user;
    echo "success";
} else {
    echo "failed";
}
