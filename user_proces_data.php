<?php
include 'config/functions.php';
include 'admin_page/csrf-protect.php';

$nis            = addslashes(htmlspecialchars(trim($_POST['nis'])));
$username       = addslashes(htmlspecialchars(trim($_POST['username'])));
$password       = addslashes(htmlspecialchars(trim($_POST['password'])));
$namalengkap    = addslashes(htmlspecialchars(trim($_POST['nama_lengkap'])));
$namaorangtua   = addslashes(htmlspecialchars(trim($_POST['nama_orangtua'])));
$status         = addslashes(htmlspecialchars(trim($_POST['status'])));
$notelp         = addslashes(htmlspecialchars(trim($_POST['no_telp'])));
$jeniskelamin   = addslashes(htmlspecialchars(trim($_POST['jenis_kelamin'])));
$tanggallahir   = addslashes(htmlspecialchars(trim($_POST['tanggal-lahir'])));
$tempatlahir    = addslashes(htmlspecialchars(trim($_POST['tempat_lahir'])));
$alamat         = addslashes(htmlspecialchars(trim($_POST['alamat'])));
$kota           = addslashes(htmlspecialchars(trim($_POST['kota'])));
$provinsi       = addslashes(htmlspecialchars(trim($_POST['provinsi'])));
$foto           = addslashes(htmlspecialchars(trim($_FILES['file']['name'])));
$csrf           = addslashes(htmlspecialchars(trim($_POST['csrf'])));
$asalsekolah    = addslashes(htmlspecialchars(trim($_POST['asal_sekolah'])));
$id             = addslashes(htmlspecialchars(trim($_POST['idsiswa'])));
$imagebefore    = htmlspecialchars(addslashes(trim($_POST['imagebefore'])));
$csrf           = htmlspecialchars(addslashes(trim($_POST['csrf'])));

// location Upload
$localtion = "assets/img/$foto";

// File Extension
$file_ext = pathinfo($localtion, PATHINFO_EXTENSION);
$file_ext = strtolower($file_ext);

// Valid Image Extension
$image_ext = array('jpg', 'jpeg', 'png');

if (isset($_POST['editprofile'])) {
    $query = "UPDATE tbsiswa SET username = '$username',password = '$password',nis = '$nis', foto = '$foto' WHERE id = '$id'";

    if (check_csrf($csrf)) {
        if (in_array($file_ext, $image_ext)) {
            if (unlink("assets/img/$imagebefore")) {
                if (move_uploaded_file($_FILES['file']['tmp_name'], $localtion)) {
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
} else if (isset($_POST['editdata'])) {
    $query  = "UPDATE tbsiswa SET
                            nis = '$nis',
                            username = '$username',
                            password = '$password',
                            nama_siswa = '$namalengkap',
                            tempat_lahir = '$tempatlahir',
                            tanggal_lahir = '$tanggallahir',
                            no_tlp = '$notelp',
                            jenis_kelamin = '$jeniskelamin',
                            sekolah = '$asalsekolah',
                            orang_tua = '$namaorangtua',
                            alamat = '$alamat',
                            kota = '$kota',
                            provinsi = '$provinsi',
                            status_siswa = '$status' WHERE id = '$id'
            ";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
}
