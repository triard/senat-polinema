-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1

-- Generation Time: 07 Jul 2021 pada 13.49

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
  `email` varchar(35) NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `civitas_akademi`
--

CREATE TABLE `civitas_akademi` (
  `id` int(11) NOT NULL,
  `nomor_induk` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `civitas_akademi`
--

INSERT INTO `civitas_akademi` (`id`, `nomor_induk`, `nama`, `email`, `jabatan`) VALUES
(1, '196201051990031002', 'Budi Harijanto, ST., MMKom', '196201051990031002@polinema.ac.id', 'Dosen'),
(2, '1831710093', 'M. Yuki Miftakhurrizqi', '1831710093@polinema.ac.id', 'Mahasiswa'),
(3, '1831710143', 'Tri Ardiansyah', '1831710143@polinema.ac.id', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id_dokumentasi` bigint(20) NOT NULL,
  `id_kegiatan` bigint(20) DEFAULT NULL,
  `nama_dokumentasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `vote_status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Nonaktif',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` bigint(20) NOT NULL,
  `user` varchar(30) NOT NULL,
  `text` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_penjadwalan` bigint(20) NOT NULL,
  `id_kegiatan` bigint(20) NOT NULL,
  `id_dokumentasi` bigint(20) NOT NULL,
  `id_laporan` bigint(20) NOT NULL,
  `id_berita` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `user`, `text`, `time`, `id_user`, `id_penjadwalan`, `id_kegiatan`, `id_dokumentasi`, `id_laporan`, `id_berita`) VALUES
(3, 'Ketua Komisi 1', 'Melakukan penjadwalan Rapat Komisi', '2021-04-19 00:25:05', 6, 33, 0, 0, 0, 0),
(5, 'Ketua Komisi 1', 'Menambahkan Kegiatan Rapat Komisi', '2021-04-19 00:40:50', 6, 0, 24, 0, 0, 0),
(9, 'Ketua Komisi 1', 'Mengunggah laporan kegiatan Rapat Komisi', '2021-04-19 01:16:29', 6, 0, 0, 0, 10, 0),
(11, 'Admin', 'Menambahkan berita dengan judul Benchmarking BLU, Senat Polmed Melakukan Kunjungan Kerja Ke Polinema', '2021-04-19 01:41:57', 1, 0, 0, 0, 0, 9),
(12, 'Sekretaris', 'Melakukan penjadwalan Sidang Pleno', '2021-04-19 13:40:33', 3, 34, 0, 0, 0, 0),
(13, 'Sekretaris', 'Menambahkan kegiatan Sidang Pleno', '2021-04-19 13:43:55', 3, 0, 25, 0, 0, 0),
(14, 'Sekretaris', 'Mengunggah laporan kegiatan Sidang Pleno', '2021-04-19 13:51:01', 3, 0, 0, 0, 11, 0),
(19, 'Sekretaris', 'Melakukan penjadwalan Rapat Pertimbangan', '2021-04-20 15:28:41', 3, 36, 0, 0, 0, 0),
(20, 'Sekretaris', 'Menambahkan kegiatan Rapat Pertimbangan', '2021-04-20 15:33:09', 3, 0, 26, 0, 0, 0),
(21, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Sidang Pleno', '2021-04-29 11:32:30', 3, 0, 0, 14, 0, 0),
(23, 'Ketua Komisi 1', 'Mengunggah dokumentasi kegiatan Rapat Komisi', '2021-04-29 11:39:17', 6, 0, 0, 16, 0, 0);


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

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `image` varchar(50) DEFAULT 'image.png',
  `status_notifikasi` enum('Unread','Read') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `NIP`, `jabatan`, `keterangan`, `image`, `status_notifikasi`) VALUES
(1, 'admin', '123456789765456789', 'admin', 'admin', '1.png', 'Read'),
(2, 'Ketua Senat', '123456789765456789', 'Ketua Senat', 'lorem ipsum', 'image.png', 'Unread'),
(3, 'Sekretaris', '123456789765456789', 'Sekretaris', 'Sekretaris', 'image.png', 'Unread'),
(6, 'Ketua Komisi 1', '123456789765456789', 'Ketua Komisi 1', '', 'image.png', 'Read'),
(7, 'Ketua Komisi 2', '123456789765456789', 'Ketua Komisi 2', '', 'image.png', 'Unread'),
(8, 'Ketua Komisi 3', '123456789765456789', 'Ketua Komisi 3', '', 'image.png', 'Unread'),
(9, 'Ketua Komisi 4', '123456789765456789', 'Ketua Komisi 4', '', 'image.png', 'Unread'),
(10, 'Anggota Komisi 1', '123456789765456789', 'Anggota Komisi 1', '', 'image.png', 'Unread'),
(11, 'Anggota Komisi 2', '123456789765456789', 'Anggota Komisi 2', '', 'image.png', 'Unread'),
(12, 'Anggota Komisi 3', '123456789765456789', 'Anggota Komisi 3', '', 'image.png', 'Unread'),
(13, 'Anggota Komisi 4', '123456789765456789', 'Anggota Komisi 4', '', 'image.png', 'Unread');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` bigint(20) NOT NULL,
  `nama_pengusul` varchar(100) NOT NULL,
  `email` varchar(35) NOT NULL,
  `NIP` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `dokumen_pendukung` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `civitas_akademi`
--
ALTER TABLE `civitas_akademi`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

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
  MODIFY `id_berita` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `civitas_akademi`
--
ALTER TABLE `civitas_akademi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_penjadwalan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
