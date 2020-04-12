-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2020 pada 08.56
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayanan_masyarakat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dukungan`
--

CREATE TABLE `dukungan` (
  `id_dukung` int(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `status` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dukungan`
--

INSERT INTO `dukungan` (`id_dukung`, `nik`, `id_pengaduan`, `status`) VALUES
(187, '091929818212321', 12, 'disable'),
(188, '091929818212321', 11, 'disable'),
(189, '545454545454545', 13, 'disable'),
(190, '545454545454545', 12, 'disable'),
(191, '091929818212321', 23, 'disable'),
(192, '092123212312312', 28, 'disable');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `id` varchar(20) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`, `id`, `is_active`) VALUES
('091929818212321', 'Nori Duantara', 'nori', '$2y$10$MtDyPfpICgJEHjt8iH/L4.BslGs8J/md.wQhe21Wq1m0ik9lI89xq', '09131323', '091929818212321', 1),
('092123212312312', 'M Ismoyo Setyonowidagdo', 'ismoyo23', '$2y$10$2af6lsmH/oKRZZytW.C5vemhSRKHtVQ3cLIE4zMM.dk9Ie.7t6uvK', '0912312321', '092123212312312', 1),
('109881212321232', 'sembarang', 'mbarang', '$2y$10$w9mJtU0MqWAuHR/F/edcG.Oy6uTDrlDzFZ6U9G5/cgKivFzNQruE6', '099877', '109881212321232', 1),
('545454545454545', 'ismoyo', 'setya', '$2y$10$dlhGYv5mSzkmHvNt18Xc1u0kSSK5pBBjsYYMS6gOawO7bsCxjvLXO', '345345345', '545454545454545', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(18) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `isi_laporan` text NOT NULL,
  `nik` varchar(17) NOT NULL,
  `subjek` varchar(90) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `foto`, `isi_laporan`, `nik`, `subjek`, `status`) VALUES
(28, '2020-04-09', 'images(5).jpg', 'laporan ke satu', '092123212312312', 'Penyakit Menular', 'terverifikasi'),
(30, '2020-04-09', 'corona virus.png', 'laporan 3', '092123212312312', 'Jalanan Rusak', 'selesai'),
(31, '2020-04-11', 'terbobol.png', 'bencana alam melanda', '092123212312312', 'Bencana Alam', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(100) NOT NULL,
  `nm_petugas` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tlp` int(11) NOT NULL,
  `level` enum('admin','petugas','','') NOT NULL,
  `id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nm_petugas`, `username`, `password`, `tlp`, `level`, `id`) VALUES
('098382832123232', 'M Ismoyo', 'admin23', '$2y$10$m2y9z7.Ap9WMrzNsGzeYMe82u0SHRE0/5ehNhsht6O4Xl3C9x1kMK', 9890980, 'admin', '098382832123232'),
('1', 'admin ismoyo', 'admin', '$2y$10$QirXPXgng/BUksPPPn.fBO0xBgA0q1lZtUNxOCi2BsoxFv4amnPqi', 912131, 'admin', '1'),
('27', 'petugas1', 'petugas', '$2y$10$UwiOIAp8Ue4VlE7vCROle.d9fhJL7XG75SiaIUL/CbIhHIcY9cBn.', 78989, 'petugas', '0'),
('28', 'petugas', 'petugas', '$2y$10$jtoz1C3Bc8hXmFM/7ic7dOE4gkV52rvPUop1f/AtZOL52ch9s7EEi', 890980980, 'petugas', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(20) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` varchar(50) NOT NULL,
  `read` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`, `read`) VALUES
(89, 28, '2020-04-09', 'siap', '26', 0),
(90, 28, '2020-04-09', 'siap siap', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dukungan`
--
ALTER TABLE `dukungan`
  ADD PRIMARY KEY (`id_dukung`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dukungan`
--
ALTER TABLE `dukungan`
  MODIFY `id_dukung` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
