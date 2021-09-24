<?php
include '../config/functions.php';
include 'csrf-protect.php';

error_reporting(0);

if (isset($_POST['fb'])) {
    $fb     = htmlspecialchars(addslashes(trim($_POST['fb'])));
    $yt     = htmlspecialchars(addslashes(trim($_POST['yt'])));
    $twitt  = htmlspecialchars(addslashes(trim($_POST['twitt'])));
    $inst   = htmlspecialchars(addslashes(trim($_POST['inst'])));
    $wa     = htmlspecialchars(addslashes(trim($_POST['wa'])));
    $email  = htmlspecialchars(addslashes(trim($_POST['email'])));
    $csrf   = htmlspecialchars(addslashes(trim($_POST['csrf'])));

    $query = "UPDATE tbpengaturan SET 
                    youtube = '$yt',
                    facebook = '$fb',
                    twitter = '$twitt',
                    whatsapp = '$wa',
                    instagram = '$inst',
                    email = '$email'
    ";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}
