<?php
include 'config/functions.php';
include 'admin_page/csrf-protect.php';

$nis            = addslashes(htmlspecialchars(trim($_POST['nis'])));
$username       = addslashes(htmlspecialchars(trim($_POST['username'])));
$password       = addslashes(htmlspecialchars(trim($_POST['password'])));
$namalengkap    = addslashes(htmlspecialchars(trim($_POST['nama_lengkap'])));
$namaorangtua   = addslashes(htmlspecialchars(trim($_POST['nama_orangtua'])));
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

// location Upload
$localtion = "assets/img/$foto";

// File Extension
$file_ext = pathinfo($localtion, PATHINFO_EXTENSION);
$file_ext = strtolower($file_ext);

// Valid Image Extension
$image_ext = array('jpg', 'jpeg', 'png');

if (isset($_POST['tambahsiswa'])) {
    if (check_csrf($csrf)) {
        if (in_array($file_ext, $image_ext)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $localtion)) {
                $query  = "INSERT INTO tbsiswa VALUES (null,
                                        '$nis',
                                        '$username',
                                        '$password',
                                        '$namalengkap',
                                        '$tempatlahir',
                                        '$tanggallahir',
                                        '$notelp',
                                        '$jeniskelamin',
                                        '$asalsekolah',
                                        '$namaorangtua',
                                        '$alamat',
                                        '$kota',
                                        '$provinsi',
                                        '$foto',
                                        'belum diverifikasi'
                )";
                if (mysqli_query($con, $query)) {
                    echo 'success';
                }
            }
        } else {
            echo 'file not jpg';
        }
    }
}
