-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Mar 2021 pada 17.21
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_senat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `username` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`username`, `password`, `level`, `email`, `id_user`) VALUES
('admin', '$2y$10$s231vmVHG0fJkuLL8.2qBueFj2gl9ZLxOFJ5IvecQdFIuasVfVte.', 'Admin', 'admin@senat', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` bigint(20) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah_view` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `keterangan`, `image`, `tanggal`, `jumlah_view`, `id_user`) VALUES
(2, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema ke-38 Seca', '<p>lorem ipsum 1001lorem ipsum 1001 lorem ipsum 1001lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001<br></p>', 'lorem_ipsum_1001.png', '2021-04-29 11:00:00', 0, 1),
(3, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema ke-38 Seca', '<p>lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002<br></p>', 'lorem_ipsum_1002.png', '2021-03-23 11:00:00', 0, 1),
(4, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema 4', '<p>lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003v v lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003lorem ipsum 1003<br></p>', 'lorem_ipsum_1003.png', '2021-03-25 11:23:00', 0, 1),
(5, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema 3', '<p>lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004vlorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004vvlorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004<br></p>', 'lorem_ipsum_1004.png', '2021-03-27 11:24:00', 1, 1),
(6, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema 2', '<p>lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005v lorem ipsum 1005</p><p>lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005<br></p>', 'lorem_ipsum_1005.jpg', '2021-03-26 11:24:00', 1, 1),
(7, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema 1', '<h5 style=\"font-family: Nunito, \" segoe=\"\" ui\",=\"\" arial;\"=\"\"><a href=\"http://localhost/senat-polinema/homepage/home\" text-decoration:none\"\"=\"\" style=\"\">Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema ke-38 Seca</a>&nbsp;</h5><p style=\"font-family: Nunito, \" segoe=\"\" ui\",=\"\" arial;=\"\" color:=\"\" rgb(108,=\"\" 117,=\"\" 125);\"=\"\"><br></p>', 'Orasi_Ilmiah_Dies_Natalis_Polinema_ke-38_Secara_Daring_Orasi_Ilmiah_Dies_Natalis_Polinema_ke-38.png', '2021-03-19 11:35:00', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` bigint(20) NOT NULL,
  `id_kegiatan` bigint(20) DEFAULT NULL,
  `nama_dokumentasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumentasi`
--

INSERT INTO `dokumentasi` (`id_dokumentasi`, `id_kegiatan`, `nama_dokumentasi`) VALUES
(5, 10, 'dokumentasi-kegiatan-73079c1e8709656a.jpg'),
(6, 11, 'dokumentasi-kegiatan-fc6c4a3908bd5909.png'),
(7, 11, 'dokumentasi-kegiatan-190a378d19850784.png'),
(8, 11, 'dokumentasi-kegiatan-1cdda5bb449fd5c0.png'),
(9, 11, 'dokumentasi-kegiatan-26c1a8ec81429d55.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_kegiatan` bigint(20) NOT NULL,
  `id_penjadwalan` bigint(20) DEFAULT NULL,
  `agenda` varchar(30) NOT NULL,
  `pembahasan` varchar(100) NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` time NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `jenis_rapat` varchar(15) NOT NULL,
  `link` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `notula` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_penjadwalan`, `agenda`, `pembahasan`, `waktu_mulai`, `waktu_selesai`, `tempat`, `jenis_rapat`, `link`, `password`, `tujuan`, `notula`, `id_user`) VALUES
(10, 3, 'Rapat pengawasan zz', '<p>1. Penyelewengan Pudir X </p><p>2.  coba cobazz</p>', '2021-03-23 20:00:00', '07:00:00', 'RT zz', 'Luring', '', '', 'melakukan invetigasi secara menyeluruh zz', '<p>dengan ini</p>', 1),
(11, 3, 'Rapat Terbuka', '', '0000-00-00 00:00:00', '00:00:00', '', '', '', '', '', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` bigint(20) NOT NULL,
  `id_kegiatan` bigint(20) DEFAULT NULL,
  `nama_laporan` varchar(50) NOT NULL,
  `file_laporan` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_kegiatan`, `nama_laporan`, `file_laporan`, `status`) VALUES
(2, 11, ' lorem ipsum loram ipsum kodksksa dsakjadj', 'laporan-kegiatan-32cf5c053b86ae76.pdf', 'Diajukan'),
(4, 10, 'fssdfsdf', 'laporan-kegiatan-72ca175eec5044c0.docx', 'Diajukan'),
(5, 10, 'etter', 'laporan-kegiatan-feca19d17882ff94.pdf', 'Diajukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjadwalan`
--

CREATE TABLE `penjadwalan` (
  `id_penjadwalan` bigint(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_usulan` bigint(20) DEFAULT NULL,
  `agenda` varchar(100) NOT NULL,
  `pembahasan` text NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` time NOT NULL,
  `jenis_rapat` varchar(15) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `id_user`, `id_usulan`, `agenda`, `pembahasan`, `waktu_mulai`, `waktu_selesai`, `jenis_rapat`, `tempat`, `link`, `password`, `status`) VALUES
(3, 1, 2, 'Rapat pengawasan', '<p>Penyelewengan Pudir X</p><p>coba coba</p>', '2021-03-21 23:00:00', '03:00:00', 'Daring', 'adsda', 'adsdsad', 'asdd', 'telah dilaksanakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jabatan`, `keterangan`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` bigint(20) NOT NULL,
  `nama_pengusul` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `dokumen_pendukung` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `nama_pengusul`, `email`, `jenis`, `keterangan`, `dokumen_pendukung`, `status`, `id_user`) VALUES
(2, 'admin', 'admin@senat', 'pengawasan', '<p>Penyelewengan Pudir X</p><p>coba coba</p>', 'dokumen-pendukung-753fc482837245a1.pdf', 'sedang diproses', 1),
(13, 'admin', 'admin@senat', 'pengawasan', '<p>- lorem ipsum 1</p><p>- lorem ipsum 2</p>', 'dokumen-pendukung-5c9b87100d4f9b06.rar', 'dijadwalkan rapat', 1),
(14, 'admin', 'admin@senat', 'kebijakan', '<p>sdadas</p>', 'dokumen-pendukung-b64d04a46727b9a0.docx', 'diajukan', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_penjadwalan` (`id_penjadwalan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indeks untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_penjadwalan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD CONSTRAINT `dokumentasi_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_penjadwalan`) REFERENCES `penjadwalan` (`id_penjadwalan`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `kegiatan_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`id_kegiatan`) REFERENCES `kegiatan` (`id_kegiatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD CONSTRAINT `penjadwalan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `penjadwalan_ibfk_2` FOREIGN KEY (`id_usulan`) REFERENCES `usulan` (`id_usulan`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `usulan`
--
ALTER TABLE `usulan`
  ADD CONSTRAINT `usulan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
