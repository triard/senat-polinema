-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12 Apr 2021 pada 11.18
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `level` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`username`, `password`, `level`, `email`, `id_user`) VALUES
('admin', '$2y$10$s231vmVHG0fJkuLL8.2qBueFj2gl9ZLxOFJ5IvecQdFIuasVfVte.', 'Admin', 'admin@senat', 1),
('anggota_komisi_1', '$2y$10$dBjAxhByhkUE4KEgNoxri.bZc2VGDn5/cT2DgY6HnUSQivgOKsJyW', 'Anggota Komisi 1', 'anggotakomisi1@polinema.ac.id', 10),
('anggota_komisi_2', '$2y$10$y142txCt.rwuf7ice5bsT.esJpoyklujazyOMWAscrxPVQcI8x2M6', 'Anggota Komisi 2', 'anggotakomisi2@polinema.ac.id', 11),
('anggota_komisi_3', '$2y$10$2tmZ7mDlOjvJW5LLNGg48udVx52mLEM3v/nQ5U6u30nV/cQauwRxq', 'Anggota Komisi 3', 'anggotakomisi3@polinema.ac.id', 12),
('anggota_komisi_4', '$2y$10$5KiAKvrBFtR3EPwla77rNu/fspxBU7u78FddGGJLe5OPIJl5dPM7C', 'Anggota Komisi 4', 'anggotakomisi4@polinema.ac.id', 13),
('ketua_komisi_1', '$2y$10$pd/z6vSf3X3aabQJ9bm0hO5OKd.m0DA.8QoLPq5Exd6sMBve0fdcG', 'Ketua Komisi 1', 'ketuakomisi1@polinema.ac.id', 6),
('ketua_komisi_2', '$2y$10$qTmPh9T3BjLY9v/FijMpYegmoPORwsKyRtvVEDyb9.0cmie9HT2LG', 'Ketua Komisi 2', 'ketuakomisi2@polinema.ac.id', 7),
('ketua_komisi_3', '$2y$10$hOQAEf5UbJCiYXBy231Qyug3dMRs.Vum7bYravBjhqHJqxGdwB/uC', 'Ketua Komisi 3', 'ketuakomisi3@polinema.ac.id', 8),
('ketua_komisi_4', '$2y$10$Uhy1hRXT4i9mQaVcme3qiuj72kjBdZgjyrGM.FIHy8Rq5BlQX6i6K', 'Ketua Komisi 4', 'ketuakomisi4@polinema.ac.id', 9),
('ketua_senat', '$2y$10$3UKMNi9c8sxz5SfATYBQXeILaQFqy1wCTOUDEA2suwc/X9hFfbnJC', 'Ketua Senat', 'ketuasenat@polinema.ac.id', 2),
('sekretaris', '$2y$10$4e2nGIXj2lOYSfjcYyYfHOf1..FyymypjT0meph4r7Y.z6Dt6gbJ2', 'Sekretaris', 'sekretaris@polinema.ac.id', 3);

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
(2, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema ke-38 Seca', '<p>lorem ipsum 1001lorem ipsum 1001 lorem ipsum 1001lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001 lorem ipsum 1001<br></p>', 'lorem_ipsum_1001.png', '2021-04-29 11:00:00', 2, 1),
(3, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema ke-38 Seca', '<p>lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002lorem ipsum 1002 lorem ipsum 1002 lorem ipsum 1002<br></p>', 'lorem_ipsum_1002.png', '2021-03-23 11:00:00', 0, 1),
(4, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema 4', '<p>lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003v v lorem ipsum 1003 lorem ipsum 1003 lorem ipsum 1003lorem ipsum 1003<br></p>', 'lorem_ipsum_1003.png', '2021-03-25 11:23:00', 0, 1),
(5, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema 3', '<p>lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004vlorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004 lorem ipsum 1004vvlorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004lorem ipsum 1004<br></p>', 'lorem_ipsum_1004.png', '2021-03-27 11:24:00', 1, 1),
(6, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema 2', '<p>lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005v lorem ipsum 1005</p><p>lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005 lorem ipsum 1005<br></p>', 'lorem_ipsum_1005.jpg', '2021-03-26 11:24:00', 1, 1),
(7, 'Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema 1', '<h5 style="font-family: Nunito, " segoe="" ui",="" arial;"=""><a href="http://localhost/senat-polinema/homepage/home" text-decoration:none""="" style="">Orasi Ilmiah Dies Natalis Polinema ke-38 Secara Daring Orasi Ilmiah Dies Natalis Polinema ke-38 Seca</a>&nbsp;</h5><p style="font-family: Nunito, " segoe="" ui",="" arial;="" color:="" rgb(108,="" 117,="" 125);"=""><br></p>', 'Orasi_Ilmiah_Dies_Natalis_Polinema_ke-38_Secara_Daring_Orasi_Ilmiah_Dies_Natalis_Polinema_ke-38.png', '2021-03-19 11:35:00', 2, 1);

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
(10, 15, 'dokumentasi-kegiatan-39f691986d74e213.jpg');

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
  `notula` text,
  `status` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_penjadwalan`, `agenda`, `pembahasan`, `waktu_mulai`, `waktu_selesai`, `tempat`, `jenis_rapat`, `link`, `password`, `tujuan`, `notula`, `status`, `id_user`) VALUES
(13, 9, 'Rapat Komisi', '<p>Kenaikan jabatan</p>', '2021-04-10 15:00:00', '17:00:00', 'Gedung AA lt. 2', 'Luring', '', '', '<p>Menaikkan jabatan salah satu staff pegawai polinema</p>', 'akan diputuskan berdasarkan hasil sidang tindak lanjut', 'Perlu Tindak Lanjut - Sidang Pleno', 7),
(15, 11, 'Sidang Pleno', '<p>Kenaikan jabatan</p>', '2021-04-10 07:00:00', '18:10:00', 'Zoom Meeting', 'Daring', 'zoom.com/123', 'senat', '<p>mempertimbangkan kenaikan jabatan</p>', 'dari hasil sidang diputuskan naik jabatan', 'Selesai', 3),
(17, NULL, 'Dadakan check', '<p>Dadakan</p>', '2021-04-12 16:00:00', '16:30:00', 'Gedung AA lt. 2', 'Luring', '', '', '<p>Dadakan        </p>', 'Dadakan', 'Selesai', 3),
(18, 21, 'Rapat Komisi', '<p>Kenaikan Pangkat Dosen Kimia</p>', '2021-04-12 15:00:00', '16:00:00', 'Gedung AA lt.2', 'Luring', '', '', '<p>kenaikan pangkat</p>', 'naik pangkat bro', 'Selesai', 6);

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
(6, 15, 'Laporan Sidang Pleno 10 April 2021', 'laporan-kegiatan-9a8b45b7d2922f57.pdf', 'Disetujui'),
(7, 3, 'dffsfsd', 'laporan-kegiatan-9a8b45b7d2922f57.pdf', 'Disetujui'),
(8, 15, 'berita acara', 'laporan-kegiatan-69909c0d2161bc4a.pdf', 'Diajukan');

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
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjadwalan`
--

INSERT INTO `penjadwalan` (`id_penjadwalan`, `id_user`, `id_usulan`, `agenda`, `pembahasan`, `waktu_mulai`, `waktu_selesai`, `jenis_rapat`, `tempat`, `link`, `password`, `status`) VALUES
(9, 7, 18, 'Rapat Komisi', '<p>Kenaikan jabatan</p>', '2021-04-10 15:00:00', '17:00:00', 'Luring', 'Gedung AA lt. 2', '', '', 'Selesai'),
(11, 3, 18, 'Sidang Pleno', '<p>Kenaikan jabatan</p>', '2021-04-15 18:00:00', '20:00:00', 'Daring', 'Zoom Meeting', 'zoom.com/123', 'senat', 'Selesai'),
(12, 3, 18, 'Rapat Pertimbangan', '<p>Kenaikan jabatan</p>', '2021-04-08 02:34:00', '02:34:00', 'Luring', 'rt 1', '', '', ''),
(19, 3, NULL, 'Rapat Pengawasan', '<p>Penyelewengan Staff Pudir 4</p>', '2021-04-15 15:00:00', '17:00:00', 'Luring', 'Gedung AA lt.2', '', '', 'Dijadwalkan - Sekretaris'),
(21, 6, 20, 'Rapat Komisi', '<p>Kenaikan Pangkat Dosen Kimia</p>', '2021-04-12 15:00:00', '16:00:00', 'Luring', 'Gedung AA lt.2', '', '', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` bigint(20) NOT NULL,
  `id_penjadwalan` bigint(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `voting` varchar(15) DEFAULT NULL,
  `absen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_penjadwalan`, `id_user`, `voting`, `absen`) VALUES
(4, 11, 3, 'Tidak Setuju', 'assets/signature-image/60711fd830c9f.png'),
(5, 9, 10, '', NULL),
(6, 11, 2, '', ''),
(7, 12, 3, '', ''),
(8, 11, 10, 'Setuju', 'assets/signature-image/60712c385f81d.png'),
(9, 11, 6, '', ''),
(10, 11, 12, '', ''),
(11, 12, 8, 'Setuju', NULL),
(16, 19, 2, NULL, NULL),
(17, 19, 3, NULL, NULL),
(18, 19, 10, NULL, NULL),
(19, 19, 6, NULL, NULL),
(22, 21, 10, NULL, NULL),
(23, 21, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `image` varchar(50) DEFAULT 'image.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `jabatan`, `keterangan`, `image`) VALUES
(1, 'admin', 'admin', 'admin', '1.png'),
(2, 'Ketua Senat', 'Ketua Senat', 'lorem ipsum', 'image.png'),
(3, 'Sekretaris', 'Sekretaris', 'Sekretaris', 'image.png'),
(4, 'Ketua Komisi 1', 'Ketua Komisi 1', 'lorem ipsum', 'image.png'),
(5, 'Anggota', 'Anggota Komisi I', 'Wakil Dosen JTI', 'image.png'),
(6, 'Ketua Komisi 1', 'Ketua Komisi 1', '', 'image.png'),
(7, 'Ketua Komisi 2', 'Ketua Komisi 2', '', 'image.png'),
(8, 'Ketua Komisi 3', 'Ketua Komisi 3', '', 'image.png'),
(9, 'Ketua Komisi 4', 'Ketua Komisi 4', '', 'image.png'),
(10, 'Anggota Komisi 1', 'Anggota Komisi 1', '', 'image.png'),
(11, 'Anggota Komisi 2', 'Anggota Komisi 2', '', 'image.png'),
(12, 'Anggota Komisi 3', 'Anggota Komisi 3', '', 'image.png'),
(13, 'Anggota Komisi 4', 'Anggota Komisi 4', '', 'image.png');

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
  `status` varchar(50) NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `nama_pengusul`, `email`, `jenis`, `keterangan`, `dokumen_pendukung`, `status`, `id_user`) VALUES
(18, 'ketua_komisi_1', 'ketuakomisi1@polinema.ac.id', 'Pertimbangan', '<p>Kenaikan jabatan</p>', 'dokumen-pendukung-ee19efde034db9df.pdf', 'Selesai', 6),
(19, 'admin', 'admin@senat', 'Pengawasan', '<p>Penyelewengan pudir 3</p>', 'dokumen-pendukung-7e1e5da4bef5166c.pdf', 'Diajukan - Sekretaris', 1),
(20, 'sekretaris', 'sekretaris@polinema.ac.id', 'Pertimbangan', '<p>Kenaikan Pangkat Dosen Kimia</p>', 'dokumen-pendukung-b3378437ccdf1e20.docx', 'Perlu Tindak Lanjut - Sidang Pleno', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id_dokumentasi`),
  ADD KEY `id_kegiatan` (`id_kegiatan`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`),
  ADD KEY `id_penjadwalan` (`id_penjadwalan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD KEY `id_kegiatan` (`id_kegiatan`),
  ADD KEY `id_kegiatan_2` (`id_kegiatan`);

--
-- Indexes for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  ADD PRIMARY KEY (`id_penjadwalan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_usulan` (`id_usulan`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `FK_peserta_penjadwalan` (`id_penjadwalan`),
  ADD KEY `FK_peserta_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_penjadwalan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
