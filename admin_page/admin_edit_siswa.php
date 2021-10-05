<?php
include '../config/functions.php';

$id     = htmlspecialchars(addslashes(trim($_POST['idsiswa'])));
$query  = query("SELECT * FROM tbsiswa WHERE id = '$id'");
?>
<div class="col-md-9 p-3 px-md-4 offset-md-3">
    <div class="card">
        <h5 class="text-center card-header">Form Edit Siswa</h5>
        <div class="card-body">
            <div class="form-group">
                <input class="form-control" type="text" id="nama-lengkap" placeholder="nama lengkap siswa" value="<?= $query[0]['nama_siswa'] ?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="tempat-lahir" placeholder="tempat lahir" value="<?= $query[0]['tempat_lahir'] ?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="tanggal-lahir" placeholder="tanggal lahir" value="<?= $query[0]['tanggal_lahir'] ?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="nama-orangtua" placeholder="nama orang tua" value="<?= $query[0]['orang_tua'] ?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="asal-sekolah" placeholder="asal sekolah" value="<?= $query[0]['sekolah'] ?>">
            </div>
            <select class="custom-select mb-3" id="jenis-kelamin" required>
                <option selected>Jenis Kelamin</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
            <div class="form-group">
                <textarea class="form-control" type="text" id="alamat" placeholder="alamat" rows="4"><?= $query[0]['alamat'] ?></textarea>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="provinsi" placeholder="provinsi" value="<?= $query[0]['provinsi'] ?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="kota" placeholder="kota" value="<?= $query[0]['kota'] ?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="text" id="notelp" placeholder="no telphone/hp" value="<?= $query[0]['no_tlp'] ?>">
            </div>
            <select class="custom-select mb-3" id="status" required>
                <option selected>Status Siswa</option>
                <option value="belum diverifikasi">Belum Diverifikasi</option>
                <option value="terima">Terima</option>
                <option value="ditolak">Ditolak</option>
            </select>
            <div class="form-group">
                <input class="form-control" type="text" id="nis" placeholder="NISN/NIS" value="<?= $query[0]['nis'] ?>">
            </div>
            <div class="form-group">
                <input class="form-control" type="test" id="username" placeholder="username" value="<?= $query[0]['username'] ?>">
            </div>
            <div class="form-group">
                <div class="input-group is-invalid">
                    <input class="form-control" type="password" id="password" placeholder="password" value="<?= $query[0]['password'] ?>">
                    <div class="input-group-append">
                        <button class="btn fas fa-eye input-group-text bg-transparent" id="showpass"></i></button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary form-control" id="sub">Submit</button>
        </div>
    </div>
</div>