<?php
include '../config/functions.php';
include 'csrf-protect.php';

error_reporting(0);

$username   = htmlspecialchars(addslashes(trim($_POST['username'])));
$id         = htmlspecialchars(addslashes(trim($_POST['id'])));
$file       = htmlspecialchars(addslashes(trim($_FILES['file']['name'])));
$csrf       = htmlspecialchars(addslashes(trim($_POST['csrf'])));

// location Upload
$localtion = "img/$file";

// File Extension
$file_ext = pathinfo($localtion, PATHINFO_EXTENSION);
$file_ext = strtolower($file_ext);

// Valid Image Extension
$image_ext = array('jpg', 'jpeg', 'png');
if (check_csrf($csrf)) {
    if (in_array($file_ext, $image_ext)) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $localtion)) {
            $query = "UPDATE tblogin SET username = '$username', image = '$file' WHERE id = '$id'";

            mysqli_query($con, $query);
            $_SESSION['username'] = $username;

            echo 'success';
        }
    } else {
        echo 'file not jpg';
    }
}
