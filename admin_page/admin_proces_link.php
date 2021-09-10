<?php
include '../config/functions.php';
error_reporting(0);

if (isset($_POST['fb'])) {
    $fb     = htmlspecialchars(addslashes($_POST['fb']));
    $yt     = htmlspecialchars(addslashes($_POST['yt']));
    $twitt  = htmlspecialchars(addslashes($_POST['twitt']));
    $inst   = htmlspecialchars(addslashes($_POST['inst']));
    $wa     = htmlspecialchars(addslashes($_POST['wa']));

    $query = "UPDATE tbpengaturan SET 
                    youtube = '$yt',
                    facebook = '$fb',
                    twitter = '$twitt',
                    whatsapp = '$wa',
                    instagram = '$inst'
    ";

    if (mysqli_query($con, $query)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}
