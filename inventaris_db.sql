-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2026 pada 05.54
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `merek_barang` varchar(200) DEFAULT NULL,
  `tipe_barang` varchar(100) NOT NULL,
  `kategori_id` int(11) UNSIGNED NOT NULL,
  `kondisi` enum('baik','rusak') NOT NULL DEFAULT 'baik',
  `status` enum('tersedia','dipinjam','tidak tersedia') DEFAULT 'tersedia',
  `lokasi` varchar(200) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `merek_barang`, `tipe_barang`, `kategori_id`, `kondisi`, `status`, `lokasi`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'F1DN502024050206', 'Daniswara Amanah Cipta (DAC)', 'F1 DN50', 1, 'baik', 'tersedia', 'Ruang Keuangan Gedung A, lt.2', 'Intel Core i3-1215U Gen 12, RAM 8GB, SSD 256GB', '2026-03-10 10:07:45', '2026-04-05 17:45:59'),
(4, 'SE2219HX', 'LENOVO', 'ThinkCentre Neo 50a 24 Gen 5', 2, 'baik', 'tersedia', 'Ruang Informasi Gedung A, lt.1', 'ADALAH', '2026-03-10 21:24:46', '2026-04-05 18:06:12'),
(5, '11SC0050ID', 'HP', 'HP EliteBook 840 G11 Business Laptop Wolf Pro Security Edition', 1, 'baik', 'dipinjam', 'Ruang Keuangan', '14 inch', '2026-03-13 16:47:10', '2026-04-05 11:33:03'),
(10, 'FX506HC-HN011T', 'ASUS', 'TUF Gaming F15', 1, 'rusak', 'tidak tersedia', 'Ruang IT', 'i5-11400H, RTX 3050, 8GB, SSD 512GB', '2026-04-05 10:20:46', '2026-04-05 11:15:11'),
(11, 'A515-57-59KS', 'ACER', 'Aspire 5', 1, 'baik', 'tersedia', 'Ruang Admin', 'i5-1235U, 8GB, SSD 512GB', '2026-04-05 11:30:57', '2026-04-05 11:30:57'),
(12, '82KU00WVID', 'LENOVO', 'IdeaPad 3', 1, 'baik', 'tersedia', 'Ruang Informasi', 'Ryzen 5 5500U, 8GB', '2026-04-05 11:31:48', '2026-04-05 11:32:39'),
(13, '14-ec1073AU', 'HP', 'Pavilion 14', 1, 'baik', 'tersedia', 'Ruang Keuangan', 'Ryzen 5, 8GB', '2026-04-05 11:32:22', '2026-04-05 11:32:22'),
(14, 'INS14-5410', 'DELL', 'Inspiron 14', 1, 'rusak', 'tidak tersedia', 'Ruang Informasi', 'i3, 4GB', '2026-04-05 11:33:48', '2026-04-05 11:34:11'),
(15, 'M70S-11EXS00', 'LENOVO', 'ThinkCentre M70s', 2, 'baik', 'tersedia', 'Laboratorium Gedung B', 'i5-10400, 8GB', '2026-04-05 11:34:58', '2026-04-05 11:34:58'),
(16, '3090MT-210', 'DELL', 'OptiPlex 3090', 2, 'rusak', 'tidak tersedia', 'Ruang Informasi', 'i5 Gen10, 8GB', '2026-04-05 11:41:03', '2026-04-05 11:41:03'),
(17, '400G7-SFF', 'HP', 'ProDesk 400 G7', 2, 'baik', 'tersedia', 'Laboratorium Gedung B', 'i3, 8GB', '2026-04-05 11:41:38', '2026-04-05 11:41:38'),
(18, 'D500TC-310105', 'ASUS', 'ExpertCenter D5', 2, 'rusak', 'tidak tersedia', 'Ruang Informasi', 'i5, 4GB', '2026-04-05 11:42:50', '2026-04-05 11:42:50'),
(19, 'VM4660G-I585', 'ACER', 'Veriton M4660G', 2, 'baik', 'tersedia', 'Laboratorium Gedung B', 'i5, 8GB', '2026-04-05 11:44:02', '2026-04-05 11:44:02'),
(20, '24MK600M-B', 'LG', '24MK600M', 3, 'baik', 'tersedia', 'Laboratorium Gedung B', '24\" IPS FHD', '2026-04-05 11:44:44', '2026-04-05 11:44:44'),
(21, 'LF24T350FHEXXD', 'SAMSUNG', 'T350', 3, 'baik', 'tersedia', 'Laboratorium Gedung B', '24\" LED', '2026-04-05 11:45:30', '2026-04-05 11:45:30'),
(22, 'VA24EHE', 'ASUS', 'VA24EHE', 3, 'baik', 'tersedia', 'Ruang IT', 'IPS 75Hz', '2026-04-05 20:16:36', '2026-04-05 20:16:36'),
(23, 'PROMP241', 'MSI', 'Pro MP241', 3, 'baik', 'tersedia', 'Ruang IT', '23.8\"', '2026-04-05 20:18:39', '2026-04-05 20:18:39'),
(24, 'E2422H', 'DELL', 'E2422H', 3, 'rusak', 'tidak tersedia', 'Ruang Informasi', '24\"', '2026-04-05 20:19:40', '2026-04-05 20:19:40'),
(25, 'L3210', 'EPSON', 'EcoTank L3210', 4, 'baik', 'tersedia', 'Ruang Informasi', 'Print Scan Copy', '2026-04-05 20:20:32', '2026-04-05 20:20:32'),
(26, 'G3020', 'EPSON', 'PIXMA G3020	', 4, 'baik', 'tersedia', 'Ruang Informasi', 'Wireless Ink Tank', '2026-04-05 20:30:55', '2026-04-05 20:30:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', '-', '2026-03-10 09:34:00', '2026-04-05 17:47:57'),
(2, 'Personal Computer', 'Belum 1 set', '2026-03-10 09:34:00', NULL),
(3, 'Monitor', 'Untuk PC', '2026-03-10 09:34:00', NULL),
(4, 'Printer', 'Lengkap', '2026-03-10 09:44:42', '2026-03-10 10:03:22'),
(9, 'Kamera', '-', '2026-04-05 09:32:07', '2026-04-05 09:32:07'),
(10, 'Scanner', '-', '2026-04-05 09:32:19', '2026-04-05 09:32:19'),
(11, 'Handphone', '-', '2026-04-05 09:32:24', '2026-04-05 09:32:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `aksi` varchar(100) NOT NULL,
  `modul` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id`, `user_id`, `username`, `aksi`, `modul`, `keterangan`, `created_at`) VALUES
(2, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 11:24:35'),
(3, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-10 11:24:41'),
(4, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: DAC', '2026-03-10 18:26:40'),
(5, 1, 'admin', 'Update', 'User', 'Mengupdate user: keysha', '2026-03-10 18:27:08'),
(6, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: LENOVO', '2026-03-10 18:28:04'),
(7, 1, 'admin', 'Hapus', 'Barang', 'Menghapus barang: LENOVO', '2026-03-10 18:29:08'),
(8, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 18:29:28'),
(9, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-03-10 18:29:34'),
(10, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-03-10 18:29:49'),
(11, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-10 18:29:55'),
(12, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-10 18:30:00'),
(13, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-10 18:30:29'),
(14, 1, 'admin', 'Update', 'Profile', 'User mengupdate profile', '2026-03-10 19:19:03'),
(15, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 19:22:40'),
(16, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-10 19:22:50'),
(17, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260310-6121 - DAC', '2026-03-10 19:23:35'),
(18, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-10 19:23:40'),
(19, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-03-10 19:23:46'),
(20, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-03-10 19:23:57'),
(21, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-10 19:24:02'),
(22, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 19:24:07'),
(23, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-10 19:24:12'),
(24, 1, 'admin', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260310-6121 - Status: disetujui', '2026-03-10 19:24:20'),
(25, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 19:24:42'),
(26, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-10 19:24:51'),
(27, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-10 19:25:00'),
(28, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-10 19:25:09'),
(29, 1, 'admin', 'Pengembalian', 'Peminjaman', 'Mengembalikan barang: PJM-20260310-6121', '2026-03-10 19:25:27'),
(30, 1, 'admin', 'Update', 'User', 'Mengupdate user: keysha', '2026-03-10 19:26:32'),
(31, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: DAC', '2026-03-10 19:37:03'),
(32, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 19:58:36'),
(33, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-03-10 19:58:42'),
(34, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-03-10 20:08:54'),
(35, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-10 20:14:34'),
(36, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260310-4494 - DAC', '2026-03-10 20:26:47'),
(37, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-10 20:27:07'),
(38, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-03-10 20:27:13'),
(39, 2, 'petugas', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260310-4494 - Status: disetujui', '2026-03-10 20:27:27'),
(40, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-03-10 20:27:33'),
(41, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-10 20:27:40'),
(42, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260310-2052 - DAC', '2026-03-10 20:34:24'),
(43, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-10 20:34:36'),
(44, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-03-10 20:34:45'),
(45, 2, 'petugas', 'Pengembalian', 'Peminjaman', 'Mengembalikan barang: PJM-20260310-4494', '2026-03-10 20:34:52'),
(46, 2, 'petugas', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260310-2052 - Status: ditolak', '2026-03-10 20:35:06'),
(47, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-03-10 20:35:12'),
(48, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-10 20:35:20'),
(49, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260310-2962 - DAC', '2026-03-10 20:35:39'),
(50, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-10 20:36:24'),
(51, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-10 20:36:28'),
(52, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: DAC', '2026-03-10 21:17:28'),
(53, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: DAC', '2026-03-10 21:21:55'),
(54, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: DAC', '2026-03-10 21:22:22'),
(55, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: F1DN502024050206', '2026-03-10 21:23:40'),
(56, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: Lenovo', '2026-03-10 21:24:46'),
(57, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 21:33:24'),
(58, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-03-10 21:33:31'),
(59, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-03-10 21:33:49'),
(60, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-10 21:33:53'),
(61, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 21:34:06'),
(62, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-10 21:34:13'),
(63, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-10 21:56:42'),
(64, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-10 21:58:18'),
(65, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-10 22:09:44'),
(66, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-03-10 22:09:52'),
(67, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-03-10 22:10:48'),
(68, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-10 22:11:02'),
(69, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260310-4591 - SE2219HX', '2026-03-10 22:12:11'),
(70, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-10 22:12:19'),
(71, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-03-10 22:12:25'),
(72, 2, 'petugas', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260310-4591 - Status: disetujui', '2026-03-10 22:12:41'),
(73, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-11 09:40:26'),
(74, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-11 09:40:39'),
(75, NULL, 'Guest', 'Register', 'Auth', 'User baru ale berhasil registrasi', '2026-03-11 09:40:54'),
(76, 8, 'ale', 'Login', 'Auth', 'User ale berhasil login', '2026-03-11 09:40:59'),
(77, 8, 'ale', 'Logout', 'Auth', 'User ale logout', '2026-03-11 09:43:15'),
(78, NULL, 'Guest', 'Register', 'Auth', 'User baru keys berhasil registrasi', '2026-03-11 09:43:29'),
(79, 9, 'keys', 'Login', 'Auth', 'User keys berhasil login', '2026-03-11 09:43:35'),
(80, 9, 'keys', 'Logout', 'Auth', 'User keys logout', '2026-03-11 09:43:54'),
(81, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-11 10:07:12'),
(82, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-13 12:11:40'),
(83, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-13 12:11:55'),
(84, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-13 16:46:27'),
(85, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: 11SC0050ID', '2026-03-13 16:47:10'),
(86, 1, 'admin', 'Tambah', 'Kategori', 'Menambahkan kategori: Kamera', '2026-03-13 18:55:09'),
(87, 1, 'admin', 'Hapus', 'Kategori', 'Menghapus kategori: Kamera', '2026-03-13 19:02:36'),
(88, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-13 19:35:15'),
(89, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-13 19:35:21'),
(90, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260313-6006 - 11SC0050ID', '2026-03-13 19:35:54'),
(91, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-13 19:39:01'),
(92, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-13 19:39:07'),
(93, 1, 'admin', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260310-2962 - Status: ditolak', '2026-03-13 19:42:08'),
(94, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-03-13 19:44:00'),
(95, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-03-13 19:44:09'),
(96, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-03-13 19:44:26'),
(97, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-13 19:44:31'),
(98, 1, 'admin', 'Update', 'Profile', 'User mengupdate profile', '2026-03-13 19:57:29'),
(99, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-03-31 07:47:53'),
(100, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-01 08:31:03'),
(101, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-01 08:33:03'),
(102, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-01 08:33:18'),
(103, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-01 08:33:49'),
(104, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-04-01 08:33:58'),
(105, 2, 'petugas', 'Pengembalian', 'Peminjaman', 'Mengembalikan barang: PJM-20260310-4591', '2026-04-01 08:34:27'),
(106, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-04-01 08:45:14'),
(107, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-01 08:45:19'),
(108, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: 1234', '2026-04-01 08:45:58'),
(109, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: 344', '2026-04-01 08:48:56'),
(110, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-01 11:14:03'),
(111, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-01 19:22:02'),
(112, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 11SC0050ID', '2026-04-01 19:23:01'),
(113, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 11SC0050ID', '2026-04-01 19:23:10'),
(114, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: dwfeaf', '2026-04-01 19:26:05'),
(115, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-01 19:26:33'),
(116, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-01 19:26:38'),
(117, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-01 19:48:20'),
(118, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-01 19:48:25'),
(119, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: dwfeaf', '2026-04-01 19:48:35'),
(120, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 344', '2026-04-01 19:48:42'),
(121, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: asfdafe', '2026-04-01 19:51:30'),
(122, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 344', '2026-04-01 19:51:51'),
(123, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: dwfeaf', '2026-04-01 19:51:59'),
(124, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: dwfeaf', '2026-04-01 19:53:30'),
(125, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-01 19:56:41'),
(126, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-01 19:56:50'),
(127, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-01 20:00:29'),
(128, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-04-01 20:00:36'),
(129, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-04-01 20:00:52'),
(130, NULL, 'Guest', 'Register', 'Auth', 'User baru dea berhasil registrasi', '2026-04-01 20:01:16'),
(131, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-02 08:36:12'),
(132, 1, 'admin', 'Update', 'Profile', 'User mengupdate profile', '2026-04-02 08:36:24'),
(133, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-02 08:36:30'),
(134, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-02 08:36:33'),
(135, 1, 'admin', 'Tambah', 'Kategori', 'Menambahkan kategori: Kamera', '2026-04-02 08:37:44'),
(136, 1, 'admin', 'Hapus', 'Kategori', 'Menghapus kategori: Kamera', '2026-04-02 08:37:52'),
(137, 1, 'admin', 'Tambah', 'Kategori', 'Menambahkan kategori: Kamera', '2026-04-02 08:40:00'),
(138, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-02 11:27:02'),
(139, 1, 'admin', 'Update', 'User', 'Mengupdate user: pengguna', '2026-04-02 13:44:41'),
(140, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 08:32:25'),
(141, 1, 'admin', 'Hapus', 'User', 'Menghapus user: dea', '2026-04-05 08:50:27'),
(142, 1, 'admin', 'Hapus', 'User', 'Menghapus user: keysha', '2026-04-05 08:50:31'),
(143, 1, 'admin', 'Hapus', 'User', 'Menghapus user: ale', '2026-04-05 08:50:36'),
(144, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 08:56:16'),
(145, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 08:56:23'),
(146, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 08:56:31'),
(147, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 08:57:14'),
(148, 1, 'admin', 'Hapus', 'Barang', 'Menghapus barang: asfdafe', '2026-04-05 08:57:22'),
(149, 1, 'admin', 'Hapus', 'Barang', 'Menghapus barang: dwfeaf', '2026-04-05 08:57:26'),
(150, 1, 'admin', 'Hapus', 'Barang', 'Menghapus barang: 344', '2026-04-05 08:57:31'),
(151, 1, 'admin', 'Hapus', 'Barang', 'Menghapus barang: 1234', '2026-04-05 08:57:43'),
(152, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: ', '2026-04-05 09:11:36'),
(153, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 09:13:19'),
(154, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 09:15:51'),
(155, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 09:15:57'),
(156, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 09:17:32'),
(157, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 09:17:48'),
(158, 1, 'admin', 'Update', 'User', 'Mengupdate user: keys', '2026-04-05 09:22:03'),
(159, 1, 'admin', 'Tambah', 'User', 'Menambahkan user: keysha', '2026-04-05 09:22:30'),
(160, 1, 'admin', 'Update', 'User', 'Mengupdate user: admin', '2026-04-05 09:22:36'),
(161, 1, 'admin', 'Update', 'User', 'Mengupdate user: petugas', '2026-04-05 09:22:41'),
(162, 1, 'admin', 'Update', 'User', 'Mengupdate user: pengguna', '2026-04-05 09:22:45'),
(163, 1, 'admin', 'Update', 'User', 'Mengupdate user: keys', '2026-04-05 09:22:50'),
(164, 1, 'admin', 'Hapus', 'Kategori', 'Menghapus kategori: Kamera', '2026-04-05 09:29:40'),
(165, 1, 'admin', 'Hapus', 'User', 'Menghapus user: keys', '2026-04-05 09:30:27'),
(166, 1, 'admin', 'Tambah', 'Kategori', 'Menambahkan kategori: Kamera', '2026-04-05 09:32:07'),
(167, 1, 'admin', 'Tambah', 'Kategori', 'Menambahkan kategori: Scanner', '2026-04-05 09:32:19'),
(168, 1, 'admin', 'Tambah', 'Kategori', 'Menambahkan kategori: Handphone', '2026-04-05 09:32:24'),
(169, 1, 'admin', 'Update', 'Kategori', 'Mengupdate kategori: Handphone', '2026-04-05 09:32:29'),
(170, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: FX506HC-HN011T', '2026-04-05 10:20:46'),
(171, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:21:00'),
(172, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 10:21:10'),
(173, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:22:03'),
(174, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:24:18'),
(175, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:24:26'),
(176, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:27:29'),
(177, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:27:34'),
(178, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:30:43'),
(179, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:30:50'),
(180, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 10:31:02'),
(181, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 10:31:09'),
(182, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 10:31:36'),
(183, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-05 10:31:41'),
(184, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-05 10:31:55'),
(185, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 10:31:58'),
(186, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 11SC0050ID', '2026-04-05 10:33:52'),
(187, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 11SC0050ID', '2026-04-05 10:34:00'),
(188, 1, 'admin', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260313-6006 - Status: ditolak', '2026-04-05 10:34:13'),
(189, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 10:37:13'),
(190, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-05 10:37:17'),
(191, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260405-4659 - F1DN502024050206', '2026-04-05 10:37:37'),
(192, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-05 10:37:56'),
(193, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 10:38:02'),
(194, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: F1DN502024050206', '2026-04-05 10:51:31'),
(195, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: F1DN502024050206', '2026-04-05 10:51:52'),
(196, 1, 'admin', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260405-4659 - Status: ditolak', '2026-04-05 10:54:12'),
(197, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 10:54:15'),
(198, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-05 10:54:20'),
(199, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260405-1565 - 11SC0050ID', '2026-04-05 10:54:35'),
(200, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-05 10:54:37'),
(201, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 10:54:41'),
(202, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 11SC0050ID', '2026-04-05 10:55:20'),
(203, 1, 'admin', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260405-1565 - Status: ditolak', '2026-04-05 10:57:41'),
(204, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 10:57:43'),
(205, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-05 10:57:48'),
(206, 3, 'pengguna', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260405-6202 - 11SC0050ID', '2026-04-05 10:58:05'),
(207, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-05 10:58:08'),
(208, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 10:58:16'),
(209, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 11SC0050ID', '2026-04-05 10:58:45'),
(210, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 11:00:32'),
(211, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 11:00:39'),
(212, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 11:02:34'),
(213, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 11SC0050ID', '2026-04-05 11:02:39'),
(214, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 11:02:45'),
(215, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: SE2219HX', '2026-04-05 11:02:52'),
(216, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 11:03:45'),
(217, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 11:10:30'),
(218, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 11:10:41'),
(219, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 11:10:45'),
(220, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 11:15:01'),
(221, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: FX506HC-HN011T', '2026-04-05 11:15:11'),
(222, 1, 'admin', 'Tambah', 'Kategori', 'Menambahkan kategori: Kinan', '2026-04-05 11:15:28'),
(223, 1, 'admin', 'Hapus', 'Kategori', 'Menghapus kategori: Kinan', '2026-04-05 11:15:31'),
(224, 1, 'admin', 'Tambah', 'User', 'Menambahkan user: dea', '2026-04-05 11:15:53'),
(225, 1, 'admin', 'Update', 'User', 'Mengupdate user: dea', '2026-04-05 11:15:57'),
(226, 1, 'admin', 'Update', 'Profile', 'User mengupdate profile', '2026-04-05 11:16:36'),
(227, 1, 'admin', 'Tambah', 'User', 'Menambahkan user: ale', '2026-04-05 11:21:35'),
(228, 1, 'admin', 'Tambah', 'User', 'Menambahkan user: kinan', '2026-04-05 11:22:13'),
(229, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 11:22:23'),
(230, NULL, 'Guest', 'Register', 'Auth', 'User baru karina berhasil registrasi', '2026-04-05 11:22:50'),
(231, 20, 'karina', 'Login', 'Auth', 'User karina berhasil login', '2026-04-05 11:22:54'),
(232, 20, 'karina', 'Logout', 'Auth', 'User karina logout', '2026-04-05 11:22:57'),
(233, NULL, 'Guest', 'Register', 'Auth', 'User baru minjeong berhasil registrasi', '2026-04-05 11:23:57'),
(234, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 11:25:22'),
(235, 1, 'admin', 'Update', 'User', 'Mengupdate user: karina', '2026-04-05 11:25:34'),
(236, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: A515-57-59KS', '2026-04-05 11:30:57'),
(237, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: 82KU00WVID', '2026-04-05 11:31:48'),
(238, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: 14-ec1073AU', '2026-04-05 11:32:22'),
(239, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 82KU00WVID', '2026-04-05 11:32:39'),
(240, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: 11SC0050ID', '2026-04-05 11:33:03'),
(241, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: INS14-5410', '2026-04-05 11:33:48'),
(242, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: INS14-5410', '2026-04-05 11:34:11'),
(243, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: M70S-11EXS00', '2026-04-05 11:34:58'),
(244, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: 3090MT-210', '2026-04-05 11:41:03'),
(245, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: 400G7-SFF', '2026-04-05 11:41:38'),
(246, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: D500TC-310105', '2026-04-05 11:42:50'),
(247, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: VM4660G-I585', '2026-04-05 11:44:02'),
(248, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: 24MK600M-B', '2026-04-05 11:44:44'),
(249, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: LF24T350FHEXXD', '2026-04-05 11:45:30'),
(250, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 11:45:50'),
(251, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-05 11:45:58'),
(252, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-05 12:45:05'),
(253, 2, 'petugas', 'Login', 'Auth', 'User petugas berhasil login', '2026-04-05 12:45:09'),
(254, 2, 'petugas', 'Logout', 'Auth', 'User petugas logout', '2026-04-05 12:48:14'),
(255, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 12:48:18'),
(256, NULL, 'Guest', 'Logout', 'Auth', 'User  logout', '2026-04-05 17:38:45'),
(257, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 17:39:31'),
(258, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 17:40:39'),
(259, NULL, 'Guest', 'Register', 'Auth', 'User baru ning berhasil registrasi', '2026-04-05 17:42:07'),
(260, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 17:43:38'),
(261, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 17:43:53'),
(262, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 17:44:00'),
(263, 1, 'admin', 'Update', 'Barang', 'Mengupdate barang: F1DN502024050206', '2026-04-05 17:45:59'),
(264, 1, 'admin', 'Update', 'Kategori', 'Mengupdate kategori: Laptop', '2026-04-05 17:47:57'),
(265, 1, 'admin', 'Update', 'User', 'Mengupdate user: ', '2026-04-05 17:55:58'),
(266, 1, 'admin', 'Update', 'User', 'Mengupdate user: ', '2026-04-05 17:56:14'),
(267, 1, 'admin', 'Update', 'User', 'Mengupdate user: admin', '2026-04-05 17:57:16'),
(268, 1, 'admin', 'Update', 'User', 'Mengupdate user: admin', '2026-04-05 18:00:38'),
(269, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 18:01:43'),
(270, 3, 'pengguna', 'Login', 'Auth', 'User pengguna berhasil login', '2026-04-05 18:01:48'),
(271, 3, 'pengguna', 'Logout', 'Auth', 'User pengguna logout', '2026-04-05 18:02:13'),
(272, 16, 'keysha', 'Login', 'Auth', 'User keysha berhasil login', '2026-04-05 18:02:29'),
(273, 16, 'keysha', 'Logout', 'Auth', 'User keysha logout', '2026-04-05 18:02:40'),
(274, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 18:02:45'),
(275, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 18:02:57'),
(276, 18, 'ale', 'Login', 'Auth', 'User ale berhasil login', '2026-04-05 18:03:00'),
(277, 18, 'ale', 'Ajukan', 'Peminjaman', 'Mengajukan peminjaman: PJM-20260405-3534 - SE2219HX', '2026-04-05 18:03:32'),
(278, 18, 'ale', 'Logout', 'Auth', 'User ale logout', '2026-04-05 18:04:00'),
(279, 16, 'keysha', 'Login', 'Auth', 'User keysha berhasil login', '2026-04-05 18:04:04'),
(280, 16, 'keysha', 'Validasi', 'Peminjaman', 'Memvalidasi peminjaman: PJM-20260405-3534 - Status: disetujui', '2026-04-05 18:04:26'),
(281, 16, 'keysha', 'Logout', 'Auth', 'User keysha logout', '2026-04-05 18:04:58'),
(282, 18, 'ale', 'Login', 'Auth', 'User ale berhasil login', '2026-04-05 18:05:03'),
(283, 18, 'ale', 'Logout', 'Auth', 'User ale logout', '2026-04-05 18:05:17'),
(284, 16, 'keysha', 'Login', 'Auth', 'User keysha berhasil login', '2026-04-05 18:05:24'),
(285, 16, 'keysha', 'Pengembalian', 'Peminjaman', 'Mengembalikan barang: PJM-20260405-3534', '2026-04-05 18:06:12'),
(286, 16, 'keysha', 'Update', 'Profile', 'User mengupdate profile', '2026-04-05 18:09:08'),
(287, 16, 'keysha', 'Logout', 'Auth', 'User keysha logout', '2026-04-05 19:15:05'),
(288, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 20:14:54'),
(289, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: VA24EHE', '2026-04-05 20:16:36'),
(290, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: PROMP241', '2026-04-05 20:18:39'),
(291, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: E2422H', '2026-04-05 20:19:40'),
(292, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: L3210', '2026-04-05 20:20:32'),
(293, 1, 'admin', 'Tambah', 'Barang', 'Menambahkan barang: G3020', '2026-04-05 20:30:55'),
(294, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 20:31:07'),
(295, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-05 20:31:11'),
(296, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-05 20:31:32'),
(297, 1, 'admin', 'Login', 'Auth', 'User admin berhasil login', '2026-04-06 11:17:00'),
(298, 1, 'admin', 'Update', 'User', 'Mengupdate user: admin', '2026-04-06 11:18:24'),
(299, 1, 'admin', 'Logout', 'Auth', 'User admin logout', '2026-04-06 12:25:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) UNSIGNED NOT NULL,
  `kode_peminjaman` varchar(50) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `barang_id` int(11) UNSIGNED NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `tanggal_dikembalikan` date DEFAULT NULL,
  `keperluan` text NOT NULL,
  `status` enum('pending','disetujui','ditolak','dipinjam','dikembalikan') NOT NULL DEFAULT 'pending',
  `catatan_petugas` text DEFAULT NULL,
  `petugas_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_peminjaman`, `user_id`, `barang_id`, `tanggal_pinjam`, `tanggal_kembali`, `tanggal_dikembalikan`, `keperluan`, `status`, `catatan_petugas`, `petugas_id`, `created_at`, `updated_at`) VALUES
(1, 'PJM-20260310-7553', 3, 2, '2026-03-10', '2026-03-11', NULL, 'Rapat bersama perusahaan A', 'ditolak', 'Rapat dibatalkan', 2, '2026-03-10 10:08:39', '2026-03-10 10:09:13'),
(2, 'PJM-20260310-6121', 3, 2, '2026-03-10', '2026-03-11', '2026-03-10', 'Rapat bersama perusahaan A pada tanggal 11 maret', 'dikembalikan', '', 1, '2026-03-10 19:23:35', '2026-03-10 19:25:27'),
(3, 'PJM-20260310-4494', 3, 2, '2026-03-10', '2026-03-11', '2026-03-10', 'Rapat', 'dikembalikan', '-', 2, '2026-03-10 20:26:47', '2026-03-10 20:34:52'),
(4, 'PJM-20260310-2052', 3, 2, '2026-03-10', '2026-03-11', NULL, 'Ea', 'ditolak', '', 2, '2026-03-10 20:34:24', '2026-03-10 20:35:06'),
(5, 'PJM-20260310-2962', 3, 2, '2026-03-10', '2026-03-10', NULL, 'rapat', 'ditolak', 'ada', 1, '2026-03-10 20:35:39', '2026-03-13 19:42:08'),
(6, 'PJM-20260310-4591', 3, 4, '2026-03-10', '2026-03-11', '2026-04-01', 'kerja', 'dikembalikan', '', 2, '2026-03-10 22:12:11', '2026-04-01 08:34:27'),
(7, 'PJM-20260313-6006', 3, 5, '2026-03-13', '2026-03-13', NULL, '-', 'ditolak', '', 1, '2026-03-13 19:35:54', '2026-04-05 10:34:13'),
(8, 'PJM-20260405-4659', 3, 2, '2026-04-05', '2026-04-07', NULL, 'Rapat', 'ditolak', '', 1, '2026-04-05 10:37:37', '2026-04-05 10:54:12'),
(9, 'PJM-20260405-1565', 3, 5, '2026-04-05', '2026-04-06', NULL, '-', 'ditolak', '', 1, '2026-04-05 10:54:35', '2026-04-05 10:57:41'),
(10, 'PJM-20260405-6202', 3, 5, '2026-04-05', '2026-04-06', NULL, 'rapat', 'pending', NULL, NULL, '2026-04-05 10:58:05', '2026-04-05 10:58:05'),
(11, 'PJM-20260405-3534', 18, 4, '2026-04-05', '2026-04-06', '2026-04-05', 'rapat', 'dikembalikan', '', 16, '2026-04-05 18:03:32', '2026-04-05 18:06:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `role` enum('admin','petugas','pengguna') NOT NULL DEFAULT 'pengguna',
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama_lengkap`, `role`, `status`, `telepon`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@inventaris.com', '$2y$10$O.g7DccMEozWxiWbuNRGx.B3eHN6rSl.nZ1h5kjxdJjG6.npm1yze', 'Administrator Inventaris', 'admin', 'aktif', '081221200104', 'Nanjung', '2026-03-10 09:34:00', '2026-04-06 11:18:24'),
(2, 'petugas', 'petugas@inventaris.com', '$2y$10$ws.fGFZf.upjkhTA5zf1LO2cIiiYaBUzmbYj5lqw64gq.OZG6tVBG', 'Petugas Inventaris', 'petugas', 'aktif', NULL, NULL, '2026-03-10 09:34:00', '2026-04-05 09:22:41'),
(3, 'pengguna', 'pengguna@inventaris.com', '$2y$10$.ua/o3aeAmyOqPOnb2HejuT4vVyF0umlvcZ1b/zxpqMme2z.Ki87q', 'Pengguna Biasa', 'pengguna', 'aktif', NULL, NULL, '2026-03-10 09:34:00', '2026-04-05 09:22:45'),
(16, 'keysha', 'key@gmail.com', '$2y$10$7TaruQ33e5xuUPj7pblL6.BIKu18pWHeqTcdFDBAGAMLdxI0Dtutm', 'Keysha Kirana', 'petugas', 'aktif', '081221200104', '-', '2026-04-05 09:22:30', '2026-04-05 18:09:08'),
(17, 'dea', 'dea@gmail.com', '$2y$10$FsHe3LCBw/u51lELJf5rLef60JFjBhkagvdwEYg6xPfnZN3JIvtM6', 'Dea Amelia', 'pengguna', 'nonaktif', NULL, NULL, '2026-04-05 11:15:53', '2026-04-05 11:15:57'),
(18, 'ale', 'ale@gmail.com', '$2y$10$T9T2pNZn1Mt6Metvago.DuVbI5nvTjagKV4b5HBLj6ntf9YYEUNQa', 'Alescha Indah Alicia', 'pengguna', 'aktif', NULL, NULL, '2026-04-05 11:21:35', '2026-04-05 11:21:35'),
(19, 'kinan', 'kin@gmail.com', '$2y$10$qDM/rhivffAFf.X9Qa0yo.Cm4iZSXlZr648SnzuyawwzpVz/URwiG', 'Kinanti Cahya Khaerunnisa', 'pengguna', 'nonaktif', NULL, NULL, '2026-04-05 11:22:13', '2026-04-05 11:22:13'),
(20, 'karina', 'karina@gmail.com', '$2y$10$aeJAkx8GkWyRncU7me2vGOaVO8IoGZ9hOnq16NqY8q77psKNvYT0C', 'Karina ', 'pengguna', 'nonaktif', NULL, NULL, '2026-04-05 11:22:50', '2026-04-05 11:25:34'),
(21, 'minjeong', 'minjeong@gmail.com', '$2y$10$Xu7fQaMx4A6vXknDt3M9HOuO.2iDmofEqSL4p2mCfZnhuLYfpA0Ru', 'minjeong', 'pengguna', 'nonaktif', NULL, NULL, '2026-04-05 11:23:57', '2026-04-05 11:23:57'),
(22, 'ning', 'ning@gmail.com', '$2y$10$G7YBA94RQVoQiust0ZY40e5uCwS6t3v6yUphihjaNOoMOTLrcjetO', 'ningning', 'pengguna', 'nonaktif', NULL, NULL, '2026-04-05 17:42:07', '2026-04-05 17:42:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`),
  ADD KEY `barang_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `created_at` (`created_at`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_peminjaman` (`kode_peminjaman`),
  ADD KEY `peminjaman_user_id_foreign` (`user_id`),
  ADD KEY `peminjaman_barang_id_foreign` (`barang_id`),
  ADD KEY `peminjaman_petugas_id_foreign` (`petugas_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_petugas_id_foreign` FOREIGN KEY (`petugas_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  ADD CONSTRAINT `peminjaman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
