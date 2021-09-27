<?php
session_start();
include 'config/functions.php';

if (!isset($_SESSION['nis']) && !isset($_SESSION['password']) && !isset($_SESSION['id'])) {
    header('location: index.php');
    exit();
}

$judul = htmlspecialchars(addslashes(trim($_POST['judul'])));
$query = query("SELECT * FROM tbpengumuman WHERE judul = '$judul'");

echo htmlspecialchars_decode($query[0]['pengumuman']);
