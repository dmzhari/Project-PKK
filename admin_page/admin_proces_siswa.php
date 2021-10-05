<?php
include '../config/functions.php';
include 'csrf-protect.php';

define('_MPDF_PATH', 'mpdf/');
include(_MPDF_PATH . "mpdf.php");

$mpdf           = new mPDF('utf-8', 'A4', 10.5, 'arial');
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

// location Upload
$localtion = "../assets/img/$foto";

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
                                        '$status'
                )";
                if (mysqli_query($con, $query)) {
                    echo 'success';
                }
            }
        } else {
            echo 'file not jpg';
        }
    }
} elseif (isset($_POST['fotosiswa'])) {
    $foto   = basename(htmlspecialchars(addslashes(trim($_POST['foto']))));
    $query  = query("SELECT * FROM tbsiswa WHERE foto = '$foto'");
?>
    <input type="hidden" id="siswa" value="<?= $query[0]['id'] ?>">
    <input type="hidden" id="beforeimage" value="<?= $query[0]['foto'] ?>">
    <img class="img-fluid img-thumbnail w-75" src="../assets/img/<?= $query[0]['foto'] ?>">
    <?php
} else if (isset($_POST['editfoto'])) {
    $beforeimage    = htmlspecialchars(addslashes(trim($_POST['foto'])));
    $query          = "UPDATE tbsiswa SET foto = '$foto' WHERE id = '$id'";
    if (check_csrf($csrf)) {
        if (in_array($file_ext, $image_ext)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $localtion)) {
                if (unlink('../assets/img/' . $beforeimage)) {
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
} else if (isset($_POST['editstatus'])) {
    $query  = "UPDATE tbsiswa SET status_siswa = '$status' WHERE id = '$id'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }
} else if (isset($_POST['editsiswa'])) {
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
} else if (isset($_POST['hapussiswa'])) {
    $getfile    = query("SELECT * FROM tbsiswa WHERE id = '$id'");
    $query      = "DELETE FROM tbsiswa WHERE id = '$id'";

    if (check_csrf($csrf)) {
        if (unlink('../assets/img/' . $getfile[0]['foto'])) {
            if (mysqli_query($con, $query)) {
                echo 'success';
            } else {
                echo 'failed';
            }
        }
    }
} else if (isset($_POST['lihatsiswa'])) {
    if (check_csrf($csrf)) {
        $query = query("SELECT * FROM tbsiswa WHERE nama_siswa = '$namalengkap'");
    ?>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">

                <tr>
                    <td>NISN/NIS</td>
                    <td><?= $query[0]['nis'] ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><?= $query[0]['nama_siswa'] ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamain</td>
                    <td><?= $query[0]['jenis_kelamin'] ?></td>
                </tr>
                <tr>
                    <td>No Telp</td>
                    <td><?= $query[0]['no_tlp'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?= $query[0]['status_siswa'] ?></td>
                </tr>
            </table>
            <input type="hidden" id="idsiswa" value="<?= $query[0]['id'] ?>">
        </div>
    <?php
    }
} elseif (isset($_POST['printsiswa'])) {
    ob_start();
    $query = query("SELECT * FROM tbsiswa WHERE id = '$id'");
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex, nofollow">
        <title>Admin Dashboard</title>

        <style type="text/css">
            table {
                border: 1px solid #000;
                width: 100%;
                padding: 10px 10px;
            }

            body {
                font-size: 13px;
            }
        </style>
    </head>

    <body>
        <h2 style="text-align: center;">DATA SISWA</h2>
        <table>
            <tr>
                <td rowspan="10">
                    <img src="../assets/img/<?= $query[0]['foto'] ?>" width="100" height="120">
                </td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?= $query[0]['nama_siswa'] ?></td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>:</td>
                <td><?= $query[0]['nis'] ?></td>
            </tr>
            <tr>
                <td>Tempat Lahir</td>
                <td>:</td>
                <td><?= $query[0]['tempat_lahir'] ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?= $query[0]['tanggal_lahir'] ?></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $query[0]['alamat'] ?></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td>:</td>
                <td><?= $query[0]['no_tlp'] ?></td>
            </tr>
            <tr>
                <td>Asal Sekolah</td>
                <td>:</td>
                <td><?= $query[0]['sekolah'] ?></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><?= $query[0]['jenis_kelamin'] ?></td>
            </tr>
            <tr>
                <td>Status Siswa</td>
                <td>:</td>
                <td><?= $query[0]['status_siswa'] ?></td>
            </tr>
        </table>
    </body>

    </html>
<?php
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->setFooter('{PAGENO}');
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output("files/siswa.pdf", 'F');
    exit();
} else if (isset($_POST['printall'])) {
    ob_start();
    $query = query("SELECT * FROM tbsiswa");
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex, nofollow">
        <title>Admin Dashboard</title>

        <style type="text/css">
            table {
                border-spacing: 0;
                width: 100%;
                border: 1px solid #000;
            }

            body {
                font-size: 13px;
            }

            th,
            td {
                text-align: center;
                padding: 8px;
            }
        </style>
    </head>

    <body>
        <h2 style="text-align: center;">DATA SEMUA SISWA</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>No Telp</th>
                <th>Asal Sekolah</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
            </tr>
            <?php $i = 1 ?>
            <?php foreach ($query as $row) { ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>
                        <img src="../assets/img/<?= $row['foto'] ?>" width="100" height="100">
                    </td>
                    <td><?= $row['nama_siswa'] ?></td>
                    <td><?= $row['nis'] ?></td>
                    <td><?= $row['tempat_lahir'] ?></td>
                    <td><?= $row['tanggal_lahir'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td><?= $row['no_tlp'] ?></td>
                    <td><?= $row['sekolah'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['status_siswa'] ?></td>
                </tr>
                <?php $i++ ?>
            <?php } ?>
        </table>
    </body>

    </html>
<?php
    $html = ob_get_contents();
    ob_end_clean();
    $mpdf->setFooter('{PAGENO}');
    $mpdf->WriteHTML(utf8_encode($html));
    $mpdf->Output("files/data_siswa.pdf", 'D');
    exit();
}
