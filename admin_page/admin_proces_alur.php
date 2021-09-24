<?php
include '../config/functions.php';
include 'csrf-protect.php';
error_reporting(0);

if (isset($_POST['judul'])) {
    $judul  = htmlspecialchars(addslashes($_POST['judul']));
    $dest   = htmlspecialchars(addslashes($_POST['description']));
    $csrf   = htmlspecialchars(addslashes(trim($_POST['csrf'])));

    $query = "UPDATE tbdaftar SET jdalur = '$judul',alurdaftar = '$dest'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}
