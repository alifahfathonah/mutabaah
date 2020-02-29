-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Sep 2018 pada 02.45
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bai_mutabaah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `idkelompok` int(11) NOT NULL,
  `kode_kelompok` varchar(45) DEFAULT NULL,
  `hari_kelompok` varchar(45) DEFAULT NULL,
  `jam_kelompok` varchar(45) DEFAULT NULL,
  `status_kelompok` enum('enabled','disabled') DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`idkelompok`, `kode_kelompok`, `hari_kelompok`, `jam_kelompok`, `status_kelompok`) VALUES
(1, 'test', 'senin', '14:00', 'enabled'),
(2, 'Aa', 'selasa', '07:00', 'enabled');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mentoring`
--

CREATE TABLE `mentoring` (
  `idmentoring` int(11) NOT NULL,
  `role_mentoring` enum('murobi','mutarobi') DEFAULT NULL,
  `Kelompok_idkelompok` int(11) NOT NULL,
  `User_iduser` int(11) NOT NULL,
  `status_mentoring` enum('enabled','disabled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mentoring`
--

INSERT INTO `mentoring` (`idmentoring`, `role_mentoring`, `Kelompok_idkelompok`, `User_iduser`, `status_mentoring`) VALUES
(1, 'mutarobi', 1, 1, 'enabled'),
(2, 'mutarobi', 1, 2, 'enabled');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutabaah`
--

CREATE TABLE `mutabaah` (
  `idmutabaah` int(11) NOT NULL,
  `terlambat` int(45) DEFAULT '0',
  `tilawah` int(45) DEFAULT '0',
  `hafalan` int(45) DEFAULT '0',
  `puasa` int(45) DEFAULT '0',
  `qiamulail` int(45) DEFAULT '0',
  `baca_buku` int(45) DEFAULT '0',
  `memberi_hadiah` int(45) DEFAULT '0',
  `sodaqoh` int(45) DEFAULT '0',
  `update_berita_islam` int(45) DEFAULT '0',
  `update_berita_nasional` int(45) DEFAULT '0',
  `update_berita_internasional` int(45) DEFAULT '0',
  `olahraga` int(45) DEFAULT '0',
  `pertemuan_idpertemuan` int(11) NOT NULL,
  `user_iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mutabaah`
--

INSERT INTO `mutabaah` (`idmutabaah`, `terlambat`, `tilawah`, `hafalan`, `puasa`, `qiamulail`, `baca_buku`, `memberi_hadiah`, `sodaqoh`, `update_berita_islam`, `update_berita_nasional`, `update_berita_internasional`, `olahraga`, `pertemuan_idpertemuan`, `user_iduser`) VALUES
(1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 2, 2),
(2, 0, 0, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertemuan`
--

CREATE TABLE `pertemuan` (
  `idpertemuan` int(11) NOT NULL,
  `waktu_pertemuan` date DEFAULT NULL,
  `mentoring_idmentoring` int(11) NOT NULL,
  `materi_pertemuan` varchar(45) DEFAULT NULL,
  `tilawah_pertemuan` varchar(45) DEFAULT NULL,
  `mc_pertemuan` varchar(45) DEFAULT NULL,
  `kultum_pertemuan` varchar(45) DEFAULT NULL,
  `infaq_pertemuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pertemuan`
--

INSERT INTO `pertemuan` (`idpertemuan`, `waktu_pertemuan`, `mentoring_idmentoring`, `materi_pertemuan`, `tilawah_pertemuan`, `mc_pertemuan`, `kultum_pertemuan`, `infaq_pertemuan`) VALUES
(2, '2018-05-20', 1, 'o', 'o', NULL, 'o', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `nim_user` varchar(255) NOT NULL DEFAULT 'XXX.20XX.XXXXX',
  `email_user` varchar(45) DEFAULT NULL,
  `password_user` varchar(45) DEFAULT NULL,
  `role_user` enum('admin','user') NOT NULL DEFAULT 'user',
  `status_user` enum('enabled','disabled') DEFAULT 'enabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`iduser`, `nama_user`, `nim_user`, `email_user`, `password_user`, `role_user`, `status_user`) VALUES
(1, 'admin', 'XXX.20XX.XXXXX', 'admin', 'bc80e925b8a6591d86934e2010761fa5', 'admin', 'enabled'),
(2, 'Kharis', 'XXX.20XX.XXXXX', 'karis@gmail.com', 'cc86330397575ee1f0076b6cfe0326138cf0ba31', 'user', 'enabled'),
(3, 'Bayu', 'XXX.20XX.XXXXX', 'bay_u', '69c5fcebaa65b560eaf06c3fbeb481ae44b8d618', 'user', 'enabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`idkelompok`);

--
-- Indexes for table `mentoring`
--
ALTER TABLE `mentoring`
  ADD PRIMARY KEY (`idmentoring`,`Kelompok_idkelompok`,`User_iduser`),
  ADD KEY `fk_mentoring_Kelompok_idx` (`Kelompok_idkelompok`),
  ADD KEY `fk_mentoring_User1_idx` (`User_iduser`);

--
-- Indexes for table `mutabaah`
--
ALTER TABLE `mutabaah`
  ADD PRIMARY KEY (`idmutabaah`,`pertemuan_idpertemuan`),
  ADD KEY `fk_mutabaah_pertemuan1_idx` (`pertemuan_idpertemuan`);

--
-- Indexes for table `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD PRIMARY KEY (`idpertemuan`,`mentoring_idmentoring`),
  ADD KEY `fk_Absensi_mentoring1_idx` (`mentoring_idmentoring`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `idkelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mentoring`
--
ALTER TABLE `mentoring`
  MODIFY `idmentoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mutabaah`
--
ALTER TABLE `mutabaah`
  MODIFY `idmutabaah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pertemuan`
--
ALTER TABLE `pertemuan`
  MODIFY `idpertemuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `mentoring`
--
ALTER TABLE `mentoring`
  ADD CONSTRAINT `fk_mentoring_Kelompok` FOREIGN KEY (`Kelompok_idkelompok`) REFERENCES `kelompok` (`idkelompok`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mentoring_User1` FOREIGN KEY (`User_iduser`) REFERENCES `user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mutabaah`
--
ALTER TABLE `mutabaah`
  ADD CONSTRAINT `fk_mutabaah_pertemuan1` FOREIGN KEY (`pertemuan_idpertemuan`) REFERENCES `pertemuan` (`idpertemuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pertemuan`
--
ALTER TABLE `pertemuan`
  ADD CONSTRAINT `fk_Absensi_mentoring1` FOREIGN KEY (`mentoring_idmentoring`) REFERENCES `mentoring` (`idmentoring`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
