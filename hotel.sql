-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2022 pada 22.22
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `apartemen`
--

CREATE TABLE `apartemen` (
  `id_apartemen` int(11) NOT NULL,
  `nama_apartemen` varchar(200) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `harga` double NOT NULL,
  `harga_bulan` double NOT NULL,
  `harga_tahun` double NOT NULL,
  `foto` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `apartemen`
--

INSERT INTO `apartemen` (`id_apartemen`, `nama_apartemen`, `id_kota`, `harga`, `harga_bulan`, `harga_tahun`, `foto`) VALUES
(1, 'Apartemen Jatinangor', 1, 300000, 8900000, 107000000, '05bf8ffc651166bcccb3e4953f8319ef.jpg'),
(3, 'Melati Hotel', 1, 200000, 6000000, 71900000, '10041233-2500x1874-FIT_AND_TRIM-b14215b413174a1f160e4ec70a852356.jpeg'),
(4, 'Jember Town Square', 6, 255000, 7600000, 91000000, '186509370.jpg'),
(5, 'Novotel Lombok Resort & Villas', 7, 560000, 16500000, 200800000, '36013285.jpg'),
(6, 'Village Vibes Lombok', 7, 570000, 16800000, 204600000, '181088403.jpg'),
(8, 'The Journey Hotel', 3, 400000, 11800000, 113500000, 'journey2.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Bandung'),
(2, 'Jakarta'),
(3, 'Jogjakarta'),
(4, 'Semarang'),
(5, 'Aceh'),
(6, 'Jember\r\n'),
(7, 'Lombok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kode_booking` varchar(20) NOT NULL,
  `nomor_kamar` varchar(20) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_apartemen` int(11) NOT NULL,
  `hari` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `paket` varchar(200) NOT NULL,
  `jumlah_paket` int(11) NOT NULL,
  `total_bayar` double NOT NULL,
  `bukti_transfer` text DEFAULT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `status_pembayaran` enum('sudah_dibayar','belum_dibayar','proses_verifikasi','ditolak') NOT NULL DEFAULT 'belum_dibayar',
  `tgl_pesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `kode_booking`, `nomor_kamar`, `id_user`, `id_apartemen`, `hari`, `checkin`, `paket`, `jumlah_paket`, `total_bayar`, `bukti_transfer`, `jenis_pembayaran`, `status_pembayaran`, `tgl_pesan`) VALUES
(22, 'BK-0022', '001', 6, 6, 365, '2022-11-20', 'tahunan', 1, 204600000, NULL, 'cash', 'sudah_dibayar', '2022-11-19'),
(23, 'BK-0023', '002', 6, 3, 90, '2022-12-28', 'bulanan', 3, 18000000, 'wallhaven-zyxvqy_1280x720.png', 'transfer', 'sudah_dibayar', '2022-11-19'),
(24, 'BK-0024', '003', 6, 1, 3, '2022-11-20', 'harian', 3, 900000, NULL, 'cash', 'sudah_dibayar', '2022-11-19'),
(25, 'BK-0025', '006', 17, 1, 1, '2022-11-19', 'harian', 1, 300000, NULL, 'cash', 'sudah_dibayar', '2022-11-19'),
(26, 'BK-0026', '005', 17, 3, 60, '2022-11-19', 'bulanan', 2, 12000000, NULL, 'cash', 'sudah_dibayar', '2022-11-19'),
(27, 'BK-0027', '004', 17, 1, 730, '2022-11-19', 'tahunan', 2, 214000000, 'wallhaven-zyxvqy_1280x7201.png', 'transfer', 'sudah_dibayar', '2022-11-19'),
(28, 'BK-0028', NULL, 16, 1, 10, '2022-11-22', 'harian', 10, 3000000, NULL, 'cash', 'belum_dibayar', '2022-11-22'),
(29, 'BK-0029', '12', 18, 1, 2, '2022-11-30', 'harian', 2, 600000, 'wallhaven-9mjoy1_1280x720.png', 'transfer', 'sudah_dibayar', '2022-11-29'),
(30, 'BK-0030', NULL, 18, 1, 60, '2022-11-29', 'bulanan', 2, 17800000, NULL, 'cash', 'belum_dibayar', '2022-11-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1 = admin, 2 = tamu'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `alamat`, `no_hp`, `username`, `password`, `level`) VALUES
(1, 'administrator', 'Jember\r\n', '082216549887', 'admin', '$2y$10$jmTBdgc.N6R27h8GqaX1VuuORN3woAO863U2jYGjDmAKSPCrEUhle', 1),
(6, 'yahyasalamudin', 'semboro\r\n', '081233247969', 'yahya_salamudin', '$2y$10$bmDrBy4l5ADvXypZ90lRjeitsMz3rF.vW/hIS.YsM3m8rjeOVUXwi', 1),
(16, 'Dwi Khusnul', 'GadingRejo', '081234567890', 'dwikhusnul', '$2y$10$9xIxyhq/ojAehZWZJCEOCuDmzvPsYiYnvvIZ.MFtP3NZjeXwsQkxS', 2),
(17, 'wildan', 'Bagon', '081234567890', 'wildan', '$2y$10$ea70PZkqNdRbfBxnRd//2Otg1ir7YA1B5LoMumlYtIiKsORgKAfDy', 2),
(18, 'Rafi Maulana', 'Jalan geger', '081233247969', 'rafi', '$2y$10$ZPsqm9hp.0jfMqo8UXFXWeES4qFdHUWL/k24wxnCjqey2/mReJM7S', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `apartemen`
--
ALTER TABLE `apartemen`
  ADD PRIMARY KEY (`id_apartemen`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `apartemen`
--
ALTER TABLE `apartemen`
  MODIFY `id_apartemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
