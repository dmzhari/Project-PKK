-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2021 pada 16.27
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
-- Struktur dari tabel `tbdaftar`
--

CREATE TABLE `tbdaftar` (
  `jdalur` varchar(100) NOT NULL,
  `jdsyarat` varchar(100) NOT NULL,
  `jdpandu` varchar(100) NOT NULL,
  `alurdaftar` varchar(1000) NOT NULL,
  `syaratdaftar` varchar(1000) NOT NULL,
  `pandudaftar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbdaftar`
--

INSERT INTO `tbdaftar` (`jdalur`, `jdsyarat`, `jdpandu`, `alurdaftar`, `syaratdaftar`, `pandudaftar`) VALUES
('Alur Yang Diperlukan', 'Persyaratan Yang Diperlukan', 'Panduan Cara Pendaftaran', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat nesciunt, velit reiciendis libero iusto, voluptates quibusdam repudiandae dolores eius nemo corporis. Possimus laudantium quos quas optio dolore esse eum id!&lt;/p&gt;', '&lt;div&gt;\n&lt;div&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, in ducimus! Error et adipisci beatae natus vitae eveniet dolor. Quo enim quasi veritatis sed error iste soluta quas ullam expedita.&lt;/div&gt;\n&lt;/div&gt;', '&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic voluptatum accusamus ullam eveniet nisi et officia aut, quidem culpa laudantium. Labore nulla expedita sed dolor unde dicta, quis tempore? Odit?&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblogin`
--

CREATE TABLE `tblogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblogin`
--

INSERT INTO `tblogin` (`id`, `username`, `password`, `image`) VALUES
(1, 'admin', 'admin', 'Anak Rpl1 20190912_222717.jpg'),
(2, 'dmzhari', 'ecchi', 'ecchi.jpg'),
(3, 'andreas', 'andreas123', 'bg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengaturan`
--

CREATE TABLE `tbpengaturan` (
  `facebook` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `whatsapp` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `about` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `judul_situs` varchar(255) NOT NULL,
  `icon` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpengaturan`
--

INSERT INTO `tbpengaturan` (`facebook`, `youtube`, `twitter`, `instagram`, `whatsapp`, `email`, `about`, `alamat`, `judul_situs`, `icon`) VALUES
('https://facebook.com/dmz.hari.9', 'https://www.youtube.com/channel/UCRq0YSk2gU6YFKsk8ZdVeGQ', 'https://twitter.com/harigrimorum990', 'https://www.instagram.com/dmzhari', '083822080039', 'harigrimorum990@gmail.com', 'sekolah kami sudah berdiri sejak 1990 dan memperoleh berbagai macam penghargaan hingga sekarang', 'Jl. Raya Batujajar No.30, Giriasih, Kec. Batujajar, Kabupaten Bandung Barat, Jawa Barat 40558', 'Kelompok 1 | Beranda', 'Anak Rpl1 20190912_222717.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpengumuman`
--

CREATE TABLE `tbpengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengumuman` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpengumuman`
--

INSERT INTO `tbpengumuman` (`id`, `judul`, `pengumuman`) VALUES
(1, 'Pemberitahuan Penting', '&lt;p&gt;Untuk yang sudah daftar ppdb harap menghadiri ke sekolah kami pada jam 10.30 hingga selesai karna ada beberapa pengumuman penting yang akan kami sampaikan terhadap peserta ppdb&lt;/p&gt;'),
(2, 'Contoh Pengumuman 2', '&lt;h5&gt;Penting&lt;/h5&gt;\n&lt;p&gt;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas aspernatur, nesciunt ipsa eius, eos quam eveniet minima porro animi itaque optio. Repudiandae tenetur provident reiciendis! Expedita animi voluptate nulla iste.&lt;/p&gt;\n&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quisquam eaque doloribus quis dignissimos dolor id consectetur magni vel enim eum, sapiente, atque debitis, nisi laboriosam illo veniam fugit cum.&lt;/p&gt;\n&lt;p&gt;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas aspernatur, nesciunt ipsa eius, eos quam eveniet minima porro animi itaque optio. Repudiandae tenetur provident reiciendis! Expedita animi voluptate nulla iste.&lt;/p&gt;\n&lt;p&gt;Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas aspernatur, nesciunt ipsa eius, eos quam eveniet minima porro animi itaque optio. Repudiandae tenetur provident reiciendis! Expedita animi voluptate nulla iste.&lt;/p&gt;'),
(10, 'contoh pengumuman 3', '&lt;p&gt;Untuk Kepada Seluruh Peserta PPDB Diharapkan Sudah Di Vaksin Karna Pada Tanggal 10 Konoha Seluruh Peserta Akan Dipanggil Ke Sekolah&lt;/p&gt;');

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
(5, '12381238123', 'andreas', 'test123', 'Andreas Dimas Suryanto', 'Bandung', '2021-10-05', '0123081231318', 'laki-laki', 'SMK Mahardhika Batujajar', 'Tidak Tahu', 'Batujajar', 'bandung barat', 'Jawa Barat', 'FB_IMG_15729383862432164.jpg', 'belum diverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbvisimisi`
--

CREATE TABLE `tbvisimisi` (
  `id` int(11) NOT NULL,
  `visimisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbvisimisi`
--

INSERT INTO `tbvisimisi` (`id`, `visimisi`) VALUES
(5, 'Menjadikan teknologi sebagai sarana belajar dan mengajar'),
(7, 'Menciptakan Sumber Daya Manusia Yang Bekualitas'),
(8, 'Mendorong siswa agar selalu berinovasi dan berkreativitas'),
(9, 'Menanamkan arti ketuhanan yang maha esa kepada setiap siswa');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbpengumuman`
--
ALTER TABLE `tbpengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbvisimisi`
--
ALTER TABLE `tbvisimisi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbpengumuman`
--
ALTER TABLE `tbpengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbsiswa`
--
ALTER TABLE `tbsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbvisimisi`
--
ALTER TABLE `tbvisimisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
