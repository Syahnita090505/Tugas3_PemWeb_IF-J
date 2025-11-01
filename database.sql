SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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


INSERT INTO `pendaftar` (`id`, `nama`, `email`, `paket`, `fasilitas`, `lokasi`, `metode_pembayaran`, `catatan`, `price1`, `price2`, `price3`, `price4`, `tax`, `taxes`, `total_biaya`, `tanggal_daftar`) VALUES
(18, 'nita', 'nitagemes@gmail.com', 'Paket Intensif SBMPTN', 'Modul PDF', 'Makassar', 'E-Wallet', 'nih versi pakai semuaanya', 500000, 115000, 25000, 0, 64000, NULL, 706000, '2025-11-01 19:57:13'),
(19, 'liu', 'liujelekbanber@gmail.com', 'Undefined', '', 'Jakarta Pusat', 'Transfer Bank', 'nihh versii ga pakee paket bimbingan dan fasilitas tambahan', 0, 100000, 0, 0, 0, NULL, 103000, '2025-11-01 19:58:35'),
(20, 'syahnita', 'syahnita2006@gmail.com', 'Paket Regular', 'Modul Cetak Lengkap, Modul PDF, Video Rekaman Kelas, Grup Diskusi Telegram', 'Aceh', 'E-Wallet', 'nih versi pakaii semuaa dan fasilitas tambahannya lengkapp', 750000, 120000, 190000, 0, 106000, NULL, 1168000, '2025-11-01 20:00:33');


ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `pendaftar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

