<?php
include '../config/functions.php';
include 'csrf-protect.php';

$judul          = htmlspecialchars(addslashes(trim($_POST['judul'])));
$csrf           = htmlspecialchars(addslashes(trim($_POST['csrf'])));
$editjudul      = htmlspecialchars(addslashes(trim($_POST['editjudul'])));
$showpengumuman = query("SELECT * FROM tbpengumuman WHERE judul = '$judul'");

if (isset($_POST['pengumuman'])) {
    $pengumuman = htmlspecialchars(addslashes(trim($_POST['pengumuman'])));
    $query      = "UPDATE tbpengumuman SET pengumuman = '$pengumuman', judul = '$editjudul' WHERE judul = '$judul'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $query)) {
            echo 'success';
        }
    }
} else if (isset($_POST['hapus'])) {
    $delete     = "DELETE FROM tbpengumuman WHERE judul = '$judul'";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $delete)) {
            echo 'success';
        }
    }
} else if (isset($_POST['tambahjudul'])) {
    $tambahjudul    = htmlspecialchars(addslashes(trim($_POST['tambahjudul'])));
    $dest           = htmlspecialchars(addslashes(trim($_POST['dest'])));

    $adddata        = "INSERT INTO tbpengumuman VALUES (null, '$tambahjudul', '$dest')";

    if (check_csrf($csrf)) {
        if (mysqli_query($con, $adddata)) {
            echo 'success';
        }
    }
} else if (isset($_POST['tambah'])) {
?>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control" type="text" id="tambahjudul" placeholder="masukan judul">
                <textarea class="form-control" id="area"></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="tambahdata">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    <!-- Tinymce JS -->
    <script src="../assets/tinymce/tinymce.min.js"></script>
    <script id="tinymce">
        tinymce.init({
            selector: '#area',
            height: '400',
            placeholder: 'Masukan Deskripsi',
            entity_encoding: "raw",
            plugins: [
                'advlist autolink lists image link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
<?php
} else {
?>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Pengumuman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control" type="text" id="editjudul" placeholder="masukan judul" value="<?= $judul ?>">
                <textarea class="form-control" id="area"><?= $showpengumuman[0]['pengumuman']; ?></textarea>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" id="editdata">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

    <!-- Tinymce JS -->
    <script src="../assets/tinymce/tinymce.min.js"></script>
    <script id="tinymce">
        tinymce.init({
            selector: '#area',
            height: '400',
            placeholder: 'Masukan Deskripsi',
            entity_encoding: "raw",
            plugins: [
                'advlist autolink lists image link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });
    </script>
<?php
}
