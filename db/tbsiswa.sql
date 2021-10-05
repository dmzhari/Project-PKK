-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2021 pada 12.38
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbapp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbsiswa`
--

CREATE TABLE `tbsiswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `sekolah` varchar(255) NOT NULL,
  `orang_tua` varchar(255) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status_siswa` enum('belum diverifikasi','terima','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbsiswa`
--

INSERT INTO `tbsiswa` (`id`, `nis`, `username`, `password`, `nama_siswa`, `tempat_lahir`, `tanggal_lahir`, `no_tlp`, `jenis_kelamin`, `sekolah`, `orang_tua`, `alamat`, `kota`, `provinsi`, `foto`, `status_siswa`) VALUES
(1, '0012345678', 'wahyu', 'wahyu123', 'wahyu deni pratama', 'bandung', '2017-10-23', '12345678910', 'laki-laki', 'SMK Mahardhika Batujajar', 'Ya ndak tau kok tanya saya (YNTKTS)', 'Batujajar', 'bandung barat', 'jawa barat', 'Anak Rpl1 20190912_222717.jpg', 'terima'),
(3, '10391029312', 'hari', 'ecchi', 'Hari Permana Sidiq', 'Bandung', '2021-10-01', '083822080039', 'laki-laki', 'SMK Mahardhika Batujajar', 'Yaya Rahmat', 'Kp Konoha', 'Bandung', 'Jawa Barat', 'FB_IMG_15729384020860211.jpg', 'ditolak'),
(5, '12381238123', 'andreas', 'test123', 'Andreas Dimas Suryanto', 'Bandung', '2021-10-05', '0123081231318', 'laki-laki', 'SMK Mahardhika Batujajar', 'Tidak Tahu', 'Batujajar', 'bandung barat', 'Jawa Barat', 'FB_IMG_15729383862432164.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
