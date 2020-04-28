-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 22 Apr 2020 pada 17.58
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coba`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `image` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(6, 'rudy', 'rudyst63@gmail.com', 'default.jpg', '$2y$10$VvnGz8/6M..JXSJkduAwnu7yWoo8tWWZQEvyZPZDKvRE3QsHQRISi', 2, 1, 1584134257);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `nmr_peminjaman` varchar(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `koordinator` varchar(30) NOT NULL,
  `peminjam` varchar(30) NOT NULL,
  `tujuan` varchar(120) NOT NULL,
  `nama_alat` varchar(60) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`nmr_peminjaman`, `tgl_pinjam`, `tgl_kembali`, `koordinator`, `peminjam`, `tujuan`, `nama_alat`, `jumlah`, `kondisi`) VALUES
('7', '2020-04-01', '2020-04-02', 'rudy', 'Ali', 'ada', 'Sepatu Panjat', 1, 'asdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rock`
--

CREATE TABLE `rock` (
  `rock_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(60) NOT NULL,
  `description` text DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rock`
--

INSERT INTO `rock` (`rock_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(2, 'Toko B', '083746537255', 'Gresik', 'Toko Bangunan', NULL, '2020-03-03 23:48:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:admin 2:user',
  `alamat` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama`, `level`, `alamat`) VALUES
(1, 'Rudyst', '3a5e9c02ce6560ca509298b7d7e4c21d', 'Rudy', 1, 'Bojonegoro'),
(2, 'triasa', 'a1cf43fb6d14521807e177639223621e37ef8390', 'alan', 2, 'lamongan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cons`
--

CREATE TABLE `tb_cons` (
  `cons_id` int(11) NOT NULL,
  `kode_alat` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `merk` varchar(60) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `kondisi` text NOT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_cons`
--

INSERT INTO `tb_cons` (`cons_id`, `kode_alat`, `nama`, `merk`, `jumlah`, `kondisi`, `created`, `updated`) VALUES
(1, 'cs_001', 'Lup', '-', 2, 'Baik', NULL, '0000-00-00 00:00:00'),
(2, 'cs_002', 'Meteran', 'Consina', 1, 'Baik', NULL, '2020-04-22 15:28:02'),
(4, 'cs_003', 'Meteran Jahit', '-', 1, 'Baik', NULL, '0000-00-00 00:00:00'),
(5, 'cs_004', 'Teropong', '-', 2, 'Baik', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mount`
--

CREATE TABLE `tb_mount` (
  `mount_id` int(11) NOT NULL,
  `kode_alat` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `merk` varchar(60) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `kondisi` text NOT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mount`
--

INSERT INTO `tb_mount` (`mount_id`, `kode_alat`, `nama`, `merk`, `jumlah`, `kondisi`, `created`, `updated`) VALUES
(4, 'mt_001', 'Tenda', 'Lafuma', 2, 'Baik', NULL, '0000-00-00 00:00:00'),
(5, 'mt_002', 'Kompor Gas', 'Consina', 5, 'baik', NULL, '2020-04-22 17:50:10'),
(6, 'mt_003', 'Kompor Lapang', 'Consina', 3, 'Baik', NULL, '2020-04-22 17:50:32'),
(7, 'mt_004', 'Carrier', 'deuter', 1, 'Baik', NULL, '0000-00-00 00:00:00'),
(8, 'mt_005', 'Carrier', 'Consina', 1, 'baik', NULL, '0000-00-00 00:00:00'),
(9, 'mt_006', 'Matras Kecil', '-', 11, 'baik', NULL, '0000-00-00 00:00:00'),
(10, 'mt_007', 'Matras Besar', '-', 2, 'baik', NULL, '0000-00-00 00:00:00'),
(11, 'mt_008', 'Matras Aliminuim', '-', 2, 'sobek', NULL, '0000-00-00 00:00:00'),
(12, 'mt_009', 'Kompas Prisma', '-', 12, 'baik', NULL, '0000-00-00 00:00:00'),
(13, 'mt_010', 'Protaktor', '-', 2, 'baik', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `pinjam_id` int(11) NOT NULL,
  `kode_pinjam` varchar(40) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `koordinator` varchar(60) NOT NULL,
  `peminjam` varchar(120) NOT NULL,
  `no_hp` int(12) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `nama_alat` varchar(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`pinjam_id`, `kode_pinjam`, `tgl_pinjam`, `tgl_kembali`, `koordinator`, `peminjam`, `no_hp`, `tujuan`, `nama_alat`, `jumlah`, `kondisi`) VALUES
(2, 'p_001', '2020-04-08', '2020-04-11', 'rudy', 'ali', 2123456781, 'ada', 'Sepatu Panjat', 1, 'baik'),
(3, 'p_002', '2020-03-01', '2020-03-04', 'suhar', 'adam', 876548976, 'event', 'tenda', 1, 'baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rock`
--

CREATE TABLE `tb_rock` (
  `rock_id` int(11) NOT NULL,
  `kode_alat` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `merk` varchar(30) NOT NULL,
  `jumlah` int(60) NOT NULL,
  `kondisi` text NOT NULL,
  `created` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rock`
--

INSERT INTO `tb_rock` (`rock_id`, `kode_alat`, `nama`, `merk`, `jumlah`, `kondisi`, `created`, `updated`) VALUES
(1, 'rc_001', 'Carabiner oval screw', 'petzl', 2, 'baik sekali', NULL, '0000-00-00 00:00:00'),
(2, 'rc_002', 'Runner', 'Petzl', 8, 'baik', NULL, '0000-00-00 00:00:00'),
(3, 'rc_003', 'Carabiner ', 'Petzl', 1, 'baik', NULL, '2020-04-21 15:09:38'),
(5, 'rc_004', 'Carmantel Statis', '-', 1, 'Baik', NULL, '0000-00-00 00:00:00'),
(6, 'rc_005', 'Carmantel Dinamis', '-', 1, 'Baik', NULL, '0000-00-00 00:00:00'),
(7, 'rc_006', 'Carabiner Autolock', 'Petzl', 2, 'Baik', NULL, '0000-00-00 00:00:00'),
(8, 'rc_007', 'Ascender', 'Consina', 1, 'Baik', NULL, '0000-00-00 00:00:00'),
(9, 'rc_008', 'Figur Of Eight', 'Petzl', 1, 'Baik', NULL, '0000-00-00 00:00:00'),
(10, 'rc_009', 'Pulley', '-', 1, 'baik', NULL, '0000-00-00 00:00:00'),
(11, 'rc_010', 'Pulley', 'Petzl', 1, 'Rusak', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`nmr_peminjaman`);

--
-- Indeks untuk tabel `rock`
--
ALTER TABLE `rock`
  ADD PRIMARY KEY (`rock_id`);

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_cons`
--
ALTER TABLE `tb_cons`
  ADD PRIMARY KEY (`cons_id`);

--
-- Indeks untuk tabel `tb_mount`
--
ALTER TABLE `tb_mount`
  ADD PRIMARY KEY (`mount_id`);

--
-- Indeks untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- Indeks untuk tabel `tb_rock`
--
ALTER TABLE `tb_rock`
  ADD PRIMARY KEY (`rock_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rock`
--
ALTER TABLE `rock`
  MODIFY `rock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_cons`
--
ALTER TABLE `tb_cons`
  MODIFY `cons_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_mount`
--
ALTER TABLE `tb_mount`
  MODIFY `mount_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `pinjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_rock`
--
ALTER TABLE `tb_rock`
  MODIFY `rock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
