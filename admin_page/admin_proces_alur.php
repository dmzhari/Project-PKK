<?php
include '../config/functions.php';
error_reporting(0);

if (isset($_POST['judul'])) {
    $judul  = htmlspecialchars(addslashes($_POST['judul']));
    $dest   = htmlspecialchars(addslashes($_POST['description']));

    $query = "UPDATE tbdaftar SET jdalur = '$judul',alurdaftar = '$dest'";

    if (mysqli_query($con, $query)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}
