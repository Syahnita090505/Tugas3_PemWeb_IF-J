-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2025 pada 14.00
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
-- Database: `bimbel babarsari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `fasilitas` text DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `metode_pembayaran` varchar(50) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `price1` int(11) DEFAULT NULL,
  `price2` int(11) DEFAULT NULL,
  `price3` int(11) DEFAULT NULL,
  `price4` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `taxes` int(11) DEFAULT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `nama`, `email`, `paket`, `fasilitas`, `lokasi`, `metode_pembayaran`, `catatan`, `price1`, `price2`, `price3`, `price4`, `tax`, `taxes`, `total_biaya`, `tanggal_daftar`) VALUES
(18, 'nita', 'nitagemes@gmail.com', 'Paket Intensif SBMPTN', 'Modul PDF', 'Makassar', 'E-Wallet', 'nih versi pakai semuaanya', 500000, 115000, 25000, 0, 64000, NULL, 706000, '2025-11-01 19:57:13'),
(19, 'liu', 'liujelekbanber@gmail.com', 'Undefined', '', 'Jakarta Pusat', 'Transfer Bank', 'nihh versii ga pakee paket bimbingan dan fasilitas tambahan', 0, 100000, 0, 0, 0, NULL, 103000, '2025-11-01 19:58:35'),
(20, 'syahnita', 'syahnita2006@gmail.com', 'Paket Regular', 'Modul Cetak Lengkap, Modul PDF, Video Rekaman Kelas, Grup Diskusi Telegram', 'Aceh', 'E-Wallet', 'nih versi pakaii semuaa dan fasilitas tambahannya lengkapp', 750000, 120000, 190000, 0, 106000, NULL, 1168000, '2025-11-01 20:00:33');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
