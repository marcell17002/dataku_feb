-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2020 at 01:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

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
  `anak` int(10) NOT NULL,
  `gajiperbulan` int(15) NOT NULL,
  `pajakbulanan` int(15) NOT NULL,
  `gajiakhir` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `ktp`, `JK`, `tmp_lhr`, `tgl_lhr`, `tgl_masuk`, `divisi`, `jabatan`, `no_telp`, `alamat`, `suamiistri`, `anak`, `gajiperbulan`, `pajakbulanan`, `gajiakhir`) VALUES
(46, 'Marcell Antonius', '140810170034', 'Pria', 'Bandung', '2020-05-24', '2020-05-17', 'IT', 'Staff', '082215171385', 'JL. Pasir Koja No.133 Bandung', 'Tidak', 2, 10000000, 295833, 9604167),
(48, 'Dania', '231214121', 'Wanita', 'Jakarta', '2020-05-17', '2020-05-24', 'IT', 'Manager', '111112341', 'Jl. Cibadak no 12 Bandung', 'Ya', 1, 25000000, 2545833, 22204167);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `total` int(14) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_serah` date NOT NULL,
  `departemen` varchar(25) NOT NULL,
  `pre_number` varchar(12) NOT NULL,
  `status` varchar(20) NOT NULL,
  `file_name_HR` varchar(100) NOT NULL,
  `file_size_HR` int(20) NOT NULL,
  `file_type_HR` varchar(10) NOT NULL,
  `file_name_Keuangan` varchar(100) NOT NULL,
  `file_size_Keuangan` int(20) NOT NULL,
  `file_type_Keuangan` varchar(10) NOT NULL,
  `file_name_Bayar` varchar(100) NOT NULL,
  `file_size_Bayar` int(20) NOT NULL,
  `file_type_Bayar` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `deskripsi`, `total`, `tgl_pengajuan`, `tgl_serah`, `departemen`, `pre_number`, `status`, `file_name_HR`, `file_size_HR`, `file_type_HR`, `file_name_Keuangan`, `file_size_Keuangan`, `file_type_Keuangan`, `file_name_Bayar`, `file_size_Bayar`, `file_type_Bayar`) VALUES
(82, 'aaaa', 222, '2020-05-21', '2020-05-24', 'HRD', '22222222', '', 'db_simpeg_1_.sql', 5542, 'sql', 'slip-gaji-karyawan__38_-1.pdf', 30395, 'pdf', 'db_simpeg-4.sql', 7720, 'sql'),
(84, 'asu', 9999, '2020-05-24', '2020-05-24', 'HRD', '2222', '', 'slip-gaji-karyawan__35_.pdf', 30366, 'pdf', 'slip-gaji-karyawan__36_.pdf', 30391, 'pdf', '', 0, '');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
