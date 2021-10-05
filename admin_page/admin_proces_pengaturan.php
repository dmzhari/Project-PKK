<?php
include '../config/functions.php';
include 'csrf-protect.php';

error_reporting(0);

$csrf   = htmlspecialchars(addslashes(trim($_POST['csrf'])));

if (isset($_POST['fb'])) {
    $fb     = htmlspecialchars(addslashes(trim($_POST['fb'])));
    $yt     = htmlspecialchars(addslashes(trim($_POST['yt'])));
    $twitt  = htmlspecialchars(addslashes(trim($_POST['twitt'])));
    $inst   = htmlspecialchars(addslashes(trim($_POST['inst'])));
    $wa     = htmlspecialchars(addslashes(trim($_POST['wa'])));
    $email  = htmlspecialchars(addslashes(trim($_POST['email'])));

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
} else if (isset($_POST['editheader'])) {
    $judul      = htmlspecialchars(addslashes(trim($_POST['judul_situs'])));
    $file       = htmlspecialchars(addslashes(trim($_FILES['file']['name'])));
    $beforeicon = htmlspecialchars(addslashes(trim($_POST['beforeicon'])));

    // location Upload
    $localtion = "../$file";

    // File Extension
    $file_ext = pathinfo($localtion, PATHINFO_EXTENSION);
    $file_ext = strtolower($file_ext);

    // Valid Image Extension
    $image_ext = array('jpg', 'jpeg', 'png', 'ico');

    if (check_csrf($csrf)) {
        if (in_array($file_ext, $image_ext)) {
            if (unlink("../$beforeicon")) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $localtion)) {
                    $query      = "UPDATE tbpengaturan SET judul_situs = '$judul', icon = '$file'";

                    if (mysqli_query($con, $query)) {
                        echo 'success';
                    } else {
                        echo 'failed';
                    }
                }
            }
        } else {
            echo 'file not jpg';
        }
    }
} else if (isset($_POST['editalamat'])) {
    $alamat = htmlspecialchars(addslashes(trim($_POST['alamat'])));
    $query  = "UPDATE tbpengaturan SET alamat = '$alamat'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
} else if (isset($_POST['isivisimisi'])) {
    $visimisi   = htmlspecialchars(addslashes(trim($_POST['isivisimisi'])));
    $judul      = htmlspecialchars(addslashes(trim($_POST['judul'])));
    $query      = "UPDATE tbvisimisi SET visimisi = '$visimisi' WHERE visimisi = '$judul'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
} else if (isset($_POST['tambahvisimisi'])) {
    $tambahvisimisi   = htmlspecialchars(addslashes(trim($_POST['visimisi'])));
    $query            = "INSERT INTO tbvisimisi VALUES ('', '$tambahvisimisi')";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
} else if (isset($_POST['hapusvisimisi'])) {
    $isijudul      = htmlspecialchars(addslashes(trim($_POST['isijudul'])));
    $query      = "DELETE FROM tbvisimisi WHERE visimisi = '$isijudul'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}
