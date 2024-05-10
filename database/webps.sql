-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Bulan Mei 2024 pada 15.10
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `device`
--

CREATE TABLE `device` (
  `id_device` int(11) NOT NULL,
  `name_device` varchar(50) NOT NULL,
  `harga_perjam` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `device`
--

INSERT INTO `device` (`id_device`, `name_device`, `harga_perjam`, `jumlah`) VALUES
(16, 'PS 3', '7000', 6),
(19, 'PS 4', '12000', 5),
(20, 'PC', '8000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(11) NOT NULL,
  `name_operator` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `name_operator`) VALUES
(5, 'ilhan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tanggal_pengeluaran` varchar(255) NOT NULL,
  `nama_pengeluaran` varchar(255) NOT NULL,
  `jumlah_pengeluaran` varchar(255) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `id_sift` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sift`
--

CREATE TABLE `sift` (
  `id_sift` int(11) NOT NULL,
  `name_sift` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sift`
--

INSERT INTO `sift` (`id_sift`, `name_sift`) VALUES
(1, 'Malam'),
(3, 'Pagi'),
(4, 'Sore');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `no_tv` varchar(50) DEFAULT NULL,
  `paket` varchar(50) DEFAULT NULL,
  `id_device` int(11) NOT NULL,
  `jam_mulai` varchar(50) NOT NULL,
  `jam_selesai` varchar(50) NOT NULL,
  `tambah_waktu` varchar(50) DEFAULT NULL,
  `harga_device` varchar(50) NOT NULL,
  `minuman_3k` varchar(50) DEFAULT NULL,
  `minuman_4k` varchar(50) DEFAULT NULL,
  `harga_minum` varchar(50) DEFAULT NULL,
  `total` varchar(50) NOT NULL,
  `bayar` varchar(50) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `id_sift` int(11) NOT NULL,
  `id_operator` int(11) NOT NULL,
  `tambah_harga` varchar(50) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`id_device`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indeks untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indeks untuk tabel `sift`
--
ALTER TABLE `sift`
  ADD PRIMARY KEY (`id_sift`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `device`
--
ALTER TABLE `device`
  MODIFY `id_device` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sift`
--
ALTER TABLE `sift`
  MODIFY `id_sift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
