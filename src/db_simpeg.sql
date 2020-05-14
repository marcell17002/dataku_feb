-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 09:30 AM
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
  `ktp` varchar(16) NOT NULL,
  `JK` varchar(10) NOT NULL,
  `tmp_lhr` varchar(25) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tgl_masuk` date NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `jabatan` varchar(25) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `suamiistri` varchar(10) NOT NULL,
  `anak` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `ktp`, `JK`, `tmp_lhr`, `tgl_lhr`, `tgl_masuk`, `divisi`, `jabatan`, `no_telp`, `alamat`, `suamiistri`, `anak`) VALUES
(34, 'Heri', '1234567890123456', 'Pria', 'Jakarta', '2020-04-07', '2020-05-06', 'Kredit', 'Manager', '123412313', 'rumah dapil ', 'Ya', 1),
(36, 'Onad', '1233451235323', 'Pria', 'Depok', '2020-05-28', '0000-00-00', 'Kredit', 'Board of Manager', '5476546', 'Bintaro', 'Ya', 1),
(37, 'Budi', '1234567890123455', 'Pria', 'Jakarta', '2020-05-18', '0000-00-00', 'Kredit', 'Manager', '08922222222', 'Menteng', 'Ya', 1),
(38, 'Gado', '1343521334', 'Pria', 'Tokyo', '2020-05-06', '0000-00-00', 'IT', 'Board of Manager', '12312323', 'ginza 12', 'Tidak', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `total` int(14) NOT NULL,
  `file_hrd` varchar(255) NOT NULL,
  `tgl_serah` date NOT NULL,
  `departemen` varchar(25) NOT NULL,
  `file_keuangan` varchar(200) NOT NULL,
  `pre_number` varchar(12) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `bukti_bayar` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `deskripsi`, `total`, `file_hrd`, `tgl_serah`, `departemen`, `file_keuangan`, `pre_number`, `tgl_pengajuan`, `bukti_bayar`, `status`) VALUES
(1, 'Gaji Karyawan', 100000000, 'Proposal Earthday.pdf', '2020-05-08', 'HRD', 'Proposal Earthday.pdf', '001', '2020-05-08', 'VictorWijaya_CV.pdf', 'Pending'),
(3, 'Gaji Staff', 200000000, 'Proposal Earthday.pdf', '2020-05-08', 'HRD', 'Proposal Earthday.pdf', '001', '2020-05-08', '', 'Pending'),
(5, 'Gaji Staff', 50000000, '', '2020-05-08', '', '', '', '0000-00-00', '', '');

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
