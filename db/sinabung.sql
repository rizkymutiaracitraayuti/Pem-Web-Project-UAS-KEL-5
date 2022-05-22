-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 08:21 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinabung`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `user_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user_admin`, `nama_admin`, `pass`, `telepon`, `email`, `level`) VALUES
('1', 'admin', 'Ini Admin', '21232f297a57a5a743894a0e4a801fc3', '0895804122678', 'iniadmin@gmail.com', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id_penarikan` char(30) NOT NULL,
  `id_tabungan` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `penarikan` varchar(100) NOT NULL,
  `id_petugas` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id_penarikan`, `id_tabungan`, `tanggal`, `penarikan`, `id_petugas`) VALUES
('PTA62859C990F508', '1', '2022-05-19', '10000', '01');

--
-- Triggers `penarikan`
--
DELIMITER $$
CREATE TRIGGER `hapus_penarikan` AFTER DELETE ON `penarikan` FOR EACH ROW BEGIN
UPDATE tabungan SET saldo = saldo + old.penarikan WHERE id_tabungan = old.id_tabungan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_penarikan` AFTER INSERT ON `penarikan` FOR EACH ROW BEGIN
UPDATE tabungan SET saldo = saldo - new.penarikan WHERE id_tabungan = new.id_tabungan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` char(5) NOT NULL,
  `foto_petugas` varchar(200) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `telepon_petugas` varchar(15) NOT NULL,
  `jk_petugas` varchar(20) NOT NULL,
  `user_petugas` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL,
  `id_status` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `foto_petugas`, `nama_petugas`, `alamat_petugas`, `telepon_petugas`, `jk_petugas`, `user_petugas`, `pass`, `level`, `id_status`) VALUES
('01', 'foto/5f03ba1f68ee0Untitled.jpg', 'Halo Petugas', 'Surabaya', '087655834120', 'Laki-laki', 'petugas1', 'petugas1', 'Petugas', '1'),
('02', 'foto/5f7325dda9e81ui-divya.jpg', 'Petugas 2', 'ini alamat', '088112243567', 'Perempuan', 'petugas2', 'petugas2', 'Petugas', '2');

-- --------------------------------------------------------

--
-- Table structure for table `setoran`
--

CREATE TABLE `setoran` (
  `id_setoran` char(30) NOT NULL,
  `id_tabungan` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `setoran` varchar(100) NOT NULL,
  `id_petugas` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setoran`
--

INSERT INTO `setoran` (`id_setoran`, `id_tabungan`, `tanggal`, `setoran`, `id_petugas`) VALUES
('STA62859B2918E7D', 'TA62859B29', '2022-05-19', '50000', '01'),
('STA62859C57217C8', '1', '2022-05-19', '10000', '01');

--
-- Triggers `setoran`
--
DELIMITER $$
CREATE TRIGGER `hapus_setoran` AFTER DELETE ON `setoran` FOR EACH ROW BEGIN
UPDATE tabungan SET saldo = saldo - old.setoran WHERE id_tabungan = old.id_tabungan;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_setoran` AFTER INSERT ON `setoran` FOR EACH ROW BEGIN
UPDATE tabungan SET saldo = saldo + new.setoran WHERE id_tabungan = new.id_tabungan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(15) NOT NULL,
  `foto_siswa` varchar(200) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `alamat_siswa` text NOT NULL,
  `jk_siswa` varchar(20) NOT NULL,
  `telepon_siswa` varchar(15) NOT NULL,
  `user_siswa` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `foto_siswa`, `nama_siswa`, `alamat_siswa`, `jk_siswa`, `telepon_siswa`, `user_siswa`, `pass`, `level`) VALUES
('215', 'foto/627f103a7b9241636027148395.jpg', 'Sugeng', 'Jalan Buntu', 'Perempuan', '09832434133', 'siswa', 'bcd724d15cde8c47650fda962968f102', 'Siswa'),
('22222', 'foto/627f1924bf80bbackup.jpg', 'Adi ', 'petemon', 'Laki-laki', '009865438654', 'siswa adi ', 'c46335eb267e2e1cde5b017acb4cd799', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` char(5) NOT NULL,
  `nama_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
('1', 'Aktif'),
('2', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `id_tabungan` char(10) NOT NULL,
  `nis` char(15) NOT NULL,
  `saldo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabungan`
--

INSERT INTO `tabungan` (`id_tabungan`, `nis`, `saldo`) VALUES
('1', '215', '80');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id_penarikan`),
  ADD KEY `id_tabungan` (`id_tabungan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `petugas_ibfk_1` (`id_status`);

--
-- Indexes for table `setoran`
--
ALTER TABLE `setoran`
  ADD PRIMARY KEY (`id_setoran`),
  ADD KEY `id_tabungan` (`id_tabungan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`id_tabungan`),
  ADD KEY `nis` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
