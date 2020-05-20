-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 05:07 PM
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
  `anak` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nama`, `ktp`, `JK`, `tmp_lhr`, `tgl_lhr`, `tgl_masuk`, `divisi`, `jabatan`, `no_telp`, `alamat`, `suamiistri`, `anak`) VALUES
(34, 'Heri', '1234567890123456', 'Pria', 'Jakarta', '2020-05-06', '0000-00-00', 'Kredit', 'Manager', '123412313', 'rumah dapil asdddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', 'Ya', 1),
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
  `status` varchar(20) NOT NULL,
  `file_name_HR` varchar(100) DEFAULT NULL,
  `file_size_HR` int(20) DEFAULT NULL,
  `file_type_HR` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `deskripsi`, `total`, `file_hrd`, `tgl_serah`, `departemen`, `file_keuangan`, `pre_number`, `tgl_pengajuan`, `bukti_bayar`, `status`, `file_name_HR`, `file_size_HR`, `file_type_HR`) VALUES
(1, 'Gaji Karyawan', 100000000, 'logout.php', '2020-05-14', 'HRD', 'pengajuan (16).pdf', '111111111111', '2020-05-14', 'pengajuan (17).pdf', 'Pending', NULL, NULL, NULL),
(3, 'Gaji Staff', 200000000, 'Proposal Earthday.pdf', '2020-05-08', 'HRD', 'Proposal Earthday.pdf', '001', '2020-05-08', 'config.php', 'Pending', NULL, NULL, NULL),
(7, 'aaaaaaa', 112332, 'Slip Gaji.docx', '2020-05-14', 'HRD', 'pengajuan (19).pdf', 'asasasdaas', '2020-05-14', 'pengajuan (16).pdf', '', NULL, NULL, NULL),
(8, 'ada', 111111, 'Buku Panduan Final Software Development(1).pdf', '0000-00-00', 'HRD', '', '', '2020-05-14', '', '', NULL, NULL, NULL),
(9, 'aaa', 222222, 'pengajuan (15).pdf', '0000-00-00', 'HRD', '', '', '2020-05-14', '', '', NULL, NULL, NULL),
(10, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'pengajuan__23_-1.pdf', 32173, 'pdf'),
(11, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '140810170034-2.pdf', 70785, 'pdf'),
(12, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'szfsdf-1.docx', 11838, 'docx'),
(13, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'szfsdf-2.docx', 11838, 'docx'),
(14, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'szfsdf-3.docx', 11838, 'docx'),
(15, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'Data_Genap_2020.docx', 41241, 'docx'),
(16, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'Data_Genap_2020-1.docx', 41241, 'docx'),
(17, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'Data_Genap_2020-2.docx', 41241, 'docx'),
(18, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'Data_Genap_2020-3.docx', 41241, 'docx'),
(19, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'SetupProd_OffScrub.exe', 200888, 'exe'),
(20, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'SetupProd_OffScrub-1.exe', 200888, 'exe'),
(21, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'SetupProd_OffScrub-2.exe', 200888, 'exe'),
(22, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'SetupProd_OffScrub-3.exe', 200888, 'exe'),
(23, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'SetupProd_OffScrub-4.exe', 200888, 'exe'),
(24, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '140810170034-3.pdf', 70785, 'pdf'),
(25, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '140810170034-4.pdf', 70785, 'pdf'),
(26, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '140810170034-5.pdf', 70785, 'pdf'),
(27, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '140810170034-6.pdf', 70785, 'pdf'),
(28, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '140810170034-7.pdf', 70785, 'pdf'),
(29, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'szfsdf-4.docx', 11838, 'docx'),
(30, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'jadwal__1_.xlsx', 23669, 'xlsx'),
(31, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'jadwal__1_-1.xlsx', 23669, 'xlsx'),
(32, 'deskripsi', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'TEMPLATE_TULISAN_SUBMISI_AWAL_PROYEK_UAS-3.docx', 19649, 'docx'),
(33, 'deskripsi', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'pengajuan__23_-2.pdf', 32173, 'pdf'),
(34, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'TEMPLATE_TULISAN_SUBMISI_AWAL_PROYEK_UAS-3-1.docx', 19649, 'docx'),
(35, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'szfsdf-5.docx', 11838, 'docx'),
(36, '', 0, '', '0000-00-00', '', '', '', '0000-00-00', '', '', '439328_620.jpg', 80953, 'jpg');

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
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
