-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2020 at 06:38 AM
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
  `anak` int(10) NOT NULL,
  `gajiperbulan` int(15) NOT NULL,
  `pajakbulanan` int(15) NOT NULL,
  `gajiakhir` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `ktp`, `JK`, `tmp_lhr`, `tgl_lhr`, `tgl_masuk`, `divisi`, `jabatan`, `no_telp`, `alamat`, `suamiistri`, `anak`, `gajiperbulan`, `pajakbulanan`, `gajiakhir`) VALUES
(34, 'Heri', '1234567890123456', 'Pria', 'Jakarta', '2020-05-13', '0000-00-00', 'Kredit', 'Manager', '123412313', 'rumah', 'Ya', 1, 25000000, 2545833, 22204167),
(36, 'Onad', '1233451235323', 'Pria', 'Depok', '2020-05-13', '0000-00-00', 'Kredit', 'Manager', '5476546', 'Bintaro', 'Ya', 1, 25000000, 2545833, 22204167),
(38, 'Gado', '1343521334', 'Pria', 'Tokyo', '2020-05-06', '0000-00-00', 'IT', 'Board of Manager', '12312323', 'ginza 12', 'Tidak', 0, 0, 0, 0),
(39, 'Giri', '18290742', 'Pria', 'Jakarta', '2020-05-14', '0000-00-00', 'IT', 'Board of Manager', '123123767', 'Test Halaman', 'Ya', 0, 0, 0, 0),
(41, 'John', '539482309', 'Pria', 'Kutai', '2020-05-04', '0000-00-00', 'Kredit', 'Manager', '08922222222', 'TKI', 'Ya', 0, 0, 0, 0),
(44, 'Kuki', '1234567890123455', 'Pria', 'Jakarta', '2020-05-06', '2020-05-04', 'IT', 'Board of Manager', '08922222222', 'rumah dapil', 'Ya', 0, 50000000, 8364583, 50000000),
(45, 'Gorila', '1234567890123455', 'Pria', 'zimbabwe', '2020-05-04', '2020-05-21', 'IT', 'Board of Manager', '123123', 'dfad', 'Ya', 1, 50000000, 8270833, 41229167);

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
(75, 'Gaji Karyawan', 123456, '2020-05-20', '0000-00-00', 'HRD', '001', '', '42-16.jpg', 441504, 'jpg', 'logo-unpad1-4.jpg', 163835, 'jpg', 'pengajuan.pdf', 1300, 'pdf'),
(76, 'Gaji Gajian', 200000000, '2020-05-20', '0000-00-00', 'HRD', '002', '', '765593_1-8.jpg', 72421, 'jpg', '', 0, '', 'pengajuan-1.pdf', 1300, 'pdf'),
(80, 'Gaji Karyawan', 100000000, '2020-05-20', '0000-00-00', 'HRD', '', '', '42-13.jpg', 441504, 'jpg', '', 0, '', '', 0, ''),
(81, 'Gaji Gajian', 100000000, '2020-05-21', '0000-00-00', 'HRD', '', '', 'tessss.pdf', 178038, 'pdf', '', 0, '', '', 0, '');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
