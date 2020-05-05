-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 06:21 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simpeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `tmp_lhr` varchar(25) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `suamiistri` varchar(10) NOT NULL,
  `anak` int(10) NOT NULL,
  `pajak` int(12) NOT NULL,
  `bpjs` int(12) NOT NULL,
  `denda` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `JK`, `tmp_lhr`, `tgl_lhr`, `jabatan`, `no_telp`, `alamat`, `suamiistri`, `anak`, `pajak`, `bpjs`, `denda`) VALUES
(28, 'Harjo', 'Pria', 'sukawening', '2020-04-03', 'Marketing', '012351231', 'Sayang 23', 'Ya', 1, 100000, 20000, 30000),
(29, 'Budi', 'Pria', 'rosario', '2020-04-02', 'Manager', '123123', 'Test Halaman', 'Ya', 4, 1000, 1000, 1000),
(30, 'Dapil', 'Pria', 'solo', '2020-04-04', 'Manager', '123', 'rumah dapil', 'Ya', 1, 1000000, 100000, 200000),
(31, 'sumi', 'Wanita', 'sapporo', '2020-04-02', 'Keuangan', '564543', 'tokyo', 'Tidak', 0, 200000, 300000, 100000),
(32, 'boruto', 'Pria', 'konoha', '2020-04-09', 'Tech', '09876', 'konoha', 'Tidak', 0, 150000, 230000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `userhrd`
--

CREATE TABLE `userhrd` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userhrd`
--

INSERT INTO `userhrd` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(0, '1234', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
