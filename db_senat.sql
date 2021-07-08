-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Jul 2021 pada 08.59
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
('1962010519900310', '$2y$10$vm7RXbysG93gLznDnx28F.uUOOM8s.c6/8sPq1TjgSIGw5WTX0sQC', 'Anggota Komisi 1', '1962010519900310@polinema.ac.id', 41),
('1962112819881110', '$2y$10$jX9NImbzNYFl7oPZcflunOt/Yl2A7euMMkic68vTBFZ8.dUM5MAg.', 'Admin', 'deddy.kusbianto@polinema.ac.id', 34),
('1962120819901210', '$2y$10$/MQh.u6NjSBCrteQop7wjeso454WWGIeDNXwh4bet5XuoaCX3QySO', 'Anggota Komisi 1', '1962120819901210@polinema.ac.id', 37),
('1963010919940310', '$2y$10$l3TPFk9BumSarzi5XTT/xeLoV7ZQkZHNxwPsTeDiYWi0YoPCM5SAm', 'Anggota Komisi 3', '1963010919940310@polinema.ac.id', 39),
('1971060419970210', '$2y$10$ZDXeS/MEDvh03dPLxCmkHOASts2ZaDRgKiZZjTQd6OnddYi6M82M2', 'Anggota Komisi 1', '1971060419970210@polinema.ac.id', 33),
('1971111019990310', '$2y$10$iRoYbibwqZDjQ3CcH9UVnO0rqnFEfQvxrlghovlgtAm/FFEfv/6DG', 'Anggota Komisi 4', '1971111019990310@polinema.ac.id', 40),
('1972020220050110', '$2y$10$fA2Qh6ikmk3TTQgKbyV4dOb7t8UryQEikFWxKkiRXBE0MB.mUKyU2', 'Anggota Komisi 2', '1972020220050110@polinema.ac.id', 38),
('admin', '$2y$10$s231vmVHG0fJkuLL8.2qBueFj2gl9ZLxOFJ5IvecQdFIuasVfVte.', 'Admin', 'admin@polinema.ac.id', 1),
('anggota_komisi_1', '$2y$10$dBjAxhByhkUE4KEgNoxri.bZc2VGDn5/cT2DgY6HnUSQivgOKsJyW', 'Anggota Komisi 1', 'anggotakomisi1@polinema.ac.id', 10),
('anggota_komisi_2', '$2y$10$y142txCt.rwuf7ice5bsT.esJpoyklujazyOMWAscrxPVQcI8x2M6', 'Anggota Komisi 2', 'tria84838@gmail.com', 11),
('anggota_komisi_3', '$2y$10$2tmZ7mDlOjvJW5LLNGg48udVx52mLEM3v/nQ5U6u30nV/cQauwRxq', 'Anggota Komisi 3', 'anggotakomisi3@polinema.ac.id', 12),
('anggota_komisi_4', '$2y$10$5KiAKvrBFtR3EPwla77rNu/fspxBU7u78FddGGJLe5OPIJl5dPM7C', 'Anggota Komisi 4', 'myukimr@gmail.com', 13),
('ketua_komisi_1', '$2y$10$pd/z6vSf3X3aabQJ9bm0hO5OKd.m0DA.8QoLPq5Exd6sMBve0fdcG', 'Ketua Komisi 1', 'tria84838@gmail.com', 6),
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
  `judul` varchar(150) NOT NULL,
  `keterangan` text NOT NULL,
  `image` varchar(155) NOT NULL,
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
(1, '196201051990031002', 'Budi Harijanto, ST., MMKom', '1831710143@student.polinema.ac.id', 'Dosen'),
(2, '1831710093', 'M. Yuki Miftakhurrizqi', '1831710093@student.polinema.ac.id', 'Mahasiswa'),
(3, '1831710143', 'Tri Ardiansyah', '1831710143@student.polinema.ac.id', 'Mahasiswa');

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
  `pembahasan` text NOT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` time NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `jenis_rapat` varchar(15) NOT NULL,
  `link` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tujuan` text NOT NULL,
  `notula` text,
  `status` varchar(50) DEFAULT NULL,
  `vote_status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Nonaktif',
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_penjadwalan`, `agenda`, `pembahasan`, `waktu_mulai`, `waktu_selesai`, `tempat`, `jenis_rapat`, `link`, `password`, `tujuan`, `notula`, `status`, `vote_status`, `id_user`) VALUES
(56, 71, 'Rapat Komisi', '<p>Pengajuan Beasiswa</p>', '2021-07-08 13:00:00', '15:45:00', 'Gedung AA lt. 2', 'Luring', '', '', '<p>-</p>', '-', 'Rapat Sedang Berlangsung', 'Nonaktif', 9);

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
  `id_usulan` bigint(20) NOT NULL,
  `id_penjadwalan` bigint(20) NOT NULL,
  `id_kegiatan` bigint(20) NOT NULL,
  `id_dokumentasi` bigint(20) NOT NULL,
  `id_laporan` bigint(20) NOT NULL,
  `id_berita` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `user`, `text`, `time`, `id_user`, `id_usulan`, `id_penjadwalan`, `id_kegiatan`, `id_dokumentasi`, `id_laporan`, `id_berita`) VALUES
(90, 'Ketua Komisi 2', 'Melakukan penjadwalan Rapat Komisi', '2021-06-28 18:48:07', 7, 0, 57, 0, 0, 0, 0),
(91, 'Ketua Komisi 2', 'Melakukan penjadwalan Rapat Komisi', '2021-06-28 18:49:16', 7, 0, 58, 0, 0, 0, 0),
(92, 'Ketua Komisi 2', 'Menambahkan kegiatan Rapat Komisi', '2021-06-28 18:50:25', 7, 0, 0, 39, 0, 0, 0),
(93, 'Ketua Komisi 2', 'Menambahkan kegiatan Rapat Komisi', '2021-06-28 18:51:24', 7, 0, 0, 40, 0, 0, 0),
(95, 'Ketua Komisi 3', 'Mengunggah laporan kegiatan Workshop Komisi 3', '2021-06-28 19:21:19', 8, 0, 0, 0, 0, 20, 0),
(96, 'Ketua Komisi 3', 'Mengunggah dokumentasi kegiatan Workshop Komisi 3', '2021-06-28 19:21:58', 8, 0, 0, 0, 24, 0, 0),
(97, 'Ketua Komisi 2', 'Mengunggah laporan kegiatan Rapat Komisi', '2021-06-28 19:28:39', 7, 0, 0, 0, 0, 21, 0),
(98, 'Ketua Komisi 2', 'Mengunggah dokumentasi kegiatan Rapat Komisi', '2021-06-28 19:29:13', 7, 0, 0, 0, 25, 0, 0),
(99, 'Ketua Komisi 2', 'Mengunggah laporan kegiatan Rapat Komisi', '2021-06-28 19:31:49', 7, 0, 0, 0, 0, 22, 0),
(100, 'Ketua Komisi 2', 'Mengunggah dokumentasi kegiatan Rapat Komisi', '2021-06-28 19:32:47', 7, 0, 0, 0, 26, 0, 0),
(101, 'Sekretaris', 'Menambahkan kegiatan Sidang Pleno', '2021-06-28 19:44:38', 3, 0, 0, 42, 0, 0, 0),
(102, 'Sekretaris', 'Menambahkan kegiatan Rapat Pengawasan', '2021-06-28 19:46:28', 3, 0, 0, 43, 0, 0, 0),
(103, 'Sekretaris', 'Menambahkan kegiatan Rapat Pengawasan', '2021-06-28 19:47:51', 3, 0, 0, 44, 0, 0, 0),
(104, 'Sekretaris', 'Mengunggah laporan kegiatan Rapat Pengawasan', '2021-06-28 20:13:15', 3, 0, 0, 0, 0, 23, 0),
(105, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Rapat Pengawasan', '2021-06-28 20:13:47', 3, 0, 0, 0, 27, 0, 0),
(106, 'Sekretaris', 'Mengunggah laporan kegiatan Rapat Pengawasan', '2021-06-28 20:17:16', 3, 0, 0, 0, 0, 24, 0),
(107, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Rapat Pengawasan', '2021-06-28 20:17:26', 3, 0, 0, 0, 28, 0, 0),
(108, 'Sekretaris', 'Melakukan penjadwalan Sidang Pleno', '2021-06-28 20:20:10', 3, 0, 59, 0, 0, 0, 0),
(109, 'Sekretaris', 'Melakukan penjadwalan Sidang Pleno', '2021-06-28 20:20:12', 3, 0, 60, 0, 0, 0, 0),
(110, 'Sekretaris', 'Melakukan penjadwalan Rapat Pengawasan', '2021-06-28 20:23:32', 3, 0, 61, 0, 0, 0, 0),
(111, 'Sekretaris', 'Melakukan penjadwalan Rapat Pengawasan', '2021-06-28 20:24:35', 3, 0, 62, 0, 0, 0, 0),
(112, 'Sekretaris', 'Melakukan penjadwalan Rapat Pengawasan', '2021-06-28 20:25:41', 3, 0, 63, 0, 0, 0, 0),
(114, 'Sekretaris', 'Menambahkan kegiatan Sidang Pleno', '2021-06-28 20:27:51', 3, 0, 0, 45, 0, 0, 0),
(116, 'Sekretaris', 'Menambahkan kegiatan Rapat Pengawasan', '2021-06-28 20:32:39', 3, 0, 0, 47, 0, 0, 0),
(117, 'Sekretaris', 'Menambahkan kegiatan Rapat Pengawasan', '2021-06-28 20:36:37', 3, 0, 0, 48, 0, 0, 0),
(119, 'Sekretaris', 'Menambahkan kegiatan Rapat Pengawasan', '2021-06-28 20:43:20', 3, 0, 0, 50, 0, 0, 0),
(121, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Rapat Pengawasan', '2021-06-28 21:05:22', 3, 0, 0, 0, 29, 0, 0),
(122, 'Sekretaris', 'Mengunggah laporan kegiatan Rapat Pengawasan', '2021-06-28 21:05:37', 3, 0, 0, 0, 0, 25, 0),
(123, 'Sekretaris', 'Mengunggah laporan kegiatan Rapat Pengawasan', '2021-06-28 21:06:38', 3, 0, 0, 0, 0, 26, 0),
(124, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Rapat Pengawasan', '2021-06-28 21:06:53', 3, 0, 0, 0, 30, 0, 0),
(125, 'Sekretaris', 'Mengunggah laporan kegiatan Rapat Pengawasan', '2021-06-28 21:07:45', 3, 0, 0, 0, 0, 27, 0),
(126, 'Sekretaris', 'Mengunggah laporan kegiatan Rapat Pengawasan', '2021-06-28 21:09:03', 3, 0, 0, 0, 0, 28, 0),
(127, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Rapat Pengawasan', '2021-06-28 21:09:15', 3, 0, 0, 0, 31, 0, 0),
(128, 'Sekretaris', 'Mengunggah laporan kegiatan Sidang Pleno', '2021-06-28 21:10:48', 3, 0, 0, 0, 0, 29, 0),
(129, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Sidang Pleno', '2021-06-28 21:13:02', 3, 0, 0, 0, 32, 0, 0),
(130, 'Sekretaris', 'Mengunggah laporan kegiatan Sidang Pleno', '2021-06-28 21:14:54', 3, 0, 0, 0, 0, 30, 0),
(131, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Sidang Pleno', '2021-06-28 21:15:12', 3, 0, 0, 0, 33, 0, 0),
(132, 'Sekretaris', 'Mengunggah dokumentasi kegiatan Rapat Pengawasan', '2021-06-28 21:18:13', 3, 0, 0, 0, 34, 0, 0),
(133, 'Civitas Akademika', 'Mengajukan sebuah usulan', '2021-06-30 19:35:28', 0, 49, 0, 0, 0, 0, 0),
(134, 'Ketua Komisi 4', 'Melakukan penjadwalan Rapat Komisi', '2021-06-30 19:39:46', 9, 0, 65, 0, 0, 0, 0),
(135, 'Ketua Komisi 4', 'Menambahkan kegiatan Rapat Komisi', '2021-06-30 19:42:41', 9, 0, 0, 52, 0, 0, 0),
(136, 'Ketua Komisi 4', 'Mengunggah dokumentasi kegiatan Rapat Komisi', '2021-06-30 19:50:08', 9, 0, 0, 0, 35, 0, 0),
(137, 'Ketua Komisi 4', 'Mengunggah laporan kegiatan Rapat Komisi', '2021-06-30 19:50:49', 9, 0, 0, 0, 0, 31, 0),
(139, 'Civitas Akademika', 'Mengajukan sebuah usulan', '2021-07-05 15:05:10', 0, 51, 0, 0, 0, 0, 0),
(140, 'Ketua Komisi 1', 'Melakukan penjadwalan Rapat Komisi', '2021-07-05 15:09:46', 6, 0, 66, 0, 0, 0, 0),
(141, 'Ketua Komisi 1', 'Menambahkan kegiatan Rapat Komisi', '2021-07-05 15:11:19', 6, 0, 0, 53, 0, 0, 0),
(142, 'Ketua Komisi 1', 'Mengunggah dokumentasi kegiatan Rapat Komisi', '2021-07-05 15:15:43', 6, 0, 0, 0, 36, 0, 0),
(143, 'Ketua Komisi 1', 'Mengunggah laporan kegiatan Rapat Komisi', '2021-07-05 15:16:30', 6, 0, 0, 0, 0, 32, 0),
(144, 'Civitas Akademika', 'Mengajukan sebuah usulan', '2021-07-05 15:39:07', 0, 52, 0, 0, 0, 0, 0),
(145, 'Civitas Akademika', 'Mengajukan sebuah usulan', '2021-07-06 15:37:53', 0, 53, 0, 0, 0, 0, 0),
(146, 'Sekretaris', 'Melakukan penjadwalan Rapat Pengawasan', '2021-07-07 20:37:01', 3, 0, 67, 0, 0, 0, 0),
(148, 'Civitas Akademika', 'Mengajukan sebuah usulan', '2021-07-08 03:41:11', 0, 55, 0, 0, 0, 0, 0),
(150, 'Ketua Komisi 2', 'Melakukan penjadwalan Rapat Komisi', '2021-07-08 05:24:58', 7, 0, 69, 0, 0, 0, 0),
(151, 'Ketua Komisi 2', 'Menambahkan kegiatan Rapat Komisi', '2021-07-08 05:31:11', 7, 0, 0, 54, 0, 0, 0),
(152, 'Ketua Komisi 2', 'Mengunggah dokumentasi kegiatan Rapat Komisi', '2021-07-08 06:09:47', 7, 0, 0, 0, 37, 0, 0),
(153, 'Ketua Komisi 2', 'Mengunggah laporan kegiatan Rapat Komisi', '2021-07-08 06:10:37', 7, 0, 0, 0, 0, 33, 0),
(154, 'Sekretaris', 'Melakukan penjadwalan Sidang Pleno', '2021-07-08 10:57:03', 3, 0, 70, 0, 0, 0, 0),
(155, 'Sekretaris', 'Menambahkan kegiatan Sidang Pleno', '2021-07-08 11:13:26', 3, 0, 0, 55, 0, 0, 0),
(156, 'Sekretaris', 'Mengunggah laporan kegiatan Sidang Pleno', '2021-07-08 12:53:51', 3, 0, 0, 0, 0, 34, 0),
(157, 'Civitas Akademika', 'Mengajukan sebuah usulan', '2021-07-08 13:11:12', 0, 56, 0, 0, 0, 0, 0),
(158, 'Civitas Akademika', 'Mengajukan sebuah usulan', '2021-07-08 13:31:17', 0, 57, 0, 0, 0, 0, 0),
(159, 'Ketua Komisi 4', 'Melakukan penjadwalan Rapat Komisi', '2021-07-08 13:43:47', 9, 0, 71, 0, 0, 0, 0),
(160, 'Ketua Komisi 4', 'Menambahkan kegiatan Rapat Komisi', '2021-07-08 13:52:47', 9, 0, 0, 56, 0, 0, 0);

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
(71, 9, 57, 'Rapat Komisi', '<p>Pengajuan Beasiswa</p>', '2021-07-08 13:00:00', '15:45:00', 'Luring', 'Gedung AA lt. 2', '', '', 'Rapat Sedang Berlangsung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` bigint(20) NOT NULL,
  `id_penjadwalan` bigint(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `voting` varchar(15) DEFAULT NULL,
  `absen` varchar(50) DEFAULT NULL,
  `konfirmasi_kehadiran` enum('Hadir','Tidak Hadir') DEFAULT NULL,
  `keterangan_kehadiran` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id_peserta`, `id_penjadwalan`, `id_user`, `voting`, `absen`, `konfirmasi_kehadiran`, `keterangan_kehadiran`) VALUES
(328, 71, 40, NULL, NULL, NULL, NULL),
(329, 71, 13, NULL, NULL, NULL, NULL),
(330, 71, 9, NULL, 'assets/signature-image/60e6a10c3bcab.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'Fajar Bagus Gunawan', '', 'admin', 'admin', '1.jpg', 'Unread'),
(2, 'Ketua Senat', '123456789765456789', 'Ketua Senat', 'lorem ipsum', 'ae7b27487d062920.jpg', 'Unread'),
(3, 'Sekretaris', '', 'Sekretaris', 'Sekretaris', 'f6009c3a1e925a46.jpg', 'Unread'),
(6, 'Ketua Komisi 1', '123456789765456789', 'Ketua Komisi 1', '', 'image.png', 'Unread'),
(7, 'Ketua Komisi 2', '123456789765456789', 'Ketua Komisi 2', '', 'image.png', 'Unread'),
(8, 'Ketua Komisi 3', '123456789765456789', 'Ketua Komisi 3', '', 'image.png', 'Unread'),
(9, 'Ketua Komisi 4', '123456789765456789', 'Ketua Komisi 4', '', 'image.png', 'Unread'),
(10, 'Anggota Komisi 1', '123456789765456789', 'Anggota Komisi 1', '', 'image.png', 'Unread'),
(11, 'Anggota Komisi 2', '123456789765456789', 'Anggota Komisi 2', '', 'image.png', 'Unread'),
(12, 'Anggota Komisi 3', '123456789765456789', 'Anggota Komisi 3', '', 'image.png', 'Unread'),
(13, 'Anggota Komisi 4', '123456789765456789', 'Anggota Komisi 4', '', 'image.png', 'Unread'),
(33, 'Nawir Rasidi, ST., MT.,', '197106041997021002', 'Anggota Komisi 1', 'Wakil Dosen Jurusan TS', 'image.png', 'Unread'),
(34, 'Deddy Kusbianto Purwoko Aji, Ir., M.MKom', '196211281988111001', 'Anggota Komisi 4', 'Wakil Dosen Jurusan TI', 'image.png', 'Unread'),
(36, 'Deddy Kusbianto Purwoko Aji, Ir., M.MKom', '196211281988111001', 'Anggota Komisi 4', 'Dosen JTI', 'image.png', 'Unread'),
(37, 'Kun Mustain, Drs., M.Pd', '196212081990121001', 'Anggota Komisi 1', 'Wakil Dosen Jurusan AN', 'image.png', 'Unread'),
(38, 'Cahya Rahmad, ST., M.Kom., Dr. Eng', '197202022005011002', 'Anggota Komisi 2', 'Wakil Dosen Jurusan TI', 'image.png', 'Unread'),
(39, 'Joni Dwi Pribadi, Drs. MAB', '196301091994031003', 'Anggota Komisi 3', 'Ketua Jurusan AN', 'image.png', 'Unread'),
(40, 'Rudy Ariyanto, ST, M.Cs', '197111101999031002', 'Anggota Komisi 4', 'Ketua Jurusan TI', 'image.png', 'Unread'),
(41, 'Budi Harijanto, ST., MMkom', '196201051990031002', 'Anggota Komisi 1', 'Wakil Dosen Jurusan TI', 'image.png', 'Unread');

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
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `nama_pengusul`, `email`, `NIP`, `jabatan`, `jenis`, `keterangan`, `dokumen_pendukung`, `status`, `tanggal_pengajuan`, `id_user`) VALUES
(57, 'M. Yuki Miftakhurrizqi', '1831710143@student.polinema.ac.id', '1831710093', 'Mahasiswa', 'Pertimbangan', '<p>Pengajuan Beasiswa</p>', 'dokumen-pendukung-9a23e894f36a26f9.pdf', 'Rapat Sedang Berlangsung', '2021-07-08', NULL);

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
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_berita` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `civitas_akademi`
--
ALTER TABLE `civitas_akademi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id_dokumentasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_kegiatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `penjadwalan`
--
ALTER TABLE `penjadwalan`
  MODIFY `id_penjadwalan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;
--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
