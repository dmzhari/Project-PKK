<?php
error_reporting(0);
include 'config/functions.php';

if (isset($_POST['sub'])) {
    $email  = htmlspecialchars($_POST['email']);
    $nama   = htmlspecialchars($_POST['nama']);
    $telp   = htmlspecialchars($_POST['telp']);
    $pesan  = htmlspecialchars($_POST['pesan']);

    $toemail = 'harigrimorum990@gmail.com';
    $emailSubject = 'Pesan website dari ' . $nama;
    $htmlContent = '<h2> via Form Kontak Website</h2>
                <h4>Nama</h4><p>' . $name . '</p>
                <h4>Email</h4><p>' . $email . '</p>
                <h4>Nomor telp</h4><p>' . $telp . '</p>
                <h4>Message</h4><p>' . $pesan . '</p>';
    $headers = "MIME-Version: 1.0" . PHP_EOL;
    $headers .= "Content-type:text/html;charset=UTF-8" . PHP_EOL;
    $headers .= 'From: ' . $name . '<' . $email . '>' . PHP_EOL;

    if (mail($toemail, $emailSubject, $htmlContent, $headers)) {
        echo 'success';
    } else {
        echo 'failed';
    }
}
