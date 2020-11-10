-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 02:05 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `gaji_pokok` varchar(120) NOT NULL,
  `uang_transport` varchar(120) NOT NULL,
  `uang_makan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `uang_transport`, `uang_makan`) VALUES
(1, 'General Affair', '3500000', '700000', '500000'),
(2, 'Manager', '15000000', '1000000', '500000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kehadiran`
--

CREATE TABLE `tbl_kehadiran` (
  `id_kehadiran` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_pegawai` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nama_jabatan` varchar(120) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `alpha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kehadiran`
--

INSERT INTO `tbl_kehadiran` (`id_kehadiran`, `bulan`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `hadir`, `sakit`, `alpha`) VALUES
(1, '082020', '63001', 'Taufiqurrohman', 'Laki-laki', 'Manager', 1, 2, 1),
(2, '082020', '63002', 'Febnita Kurniyanti', 'Perempuan', 'General Affair', 18, 0, 0),
(3, '092020', '63002', 'Febnita Kurniyanti', 'Perempuan', 'General Affair', 2, 2, 2),
(4, '092020', '63001', 'Taufiqurrohman', 'Laki-laki', 'Manager', 2, 2, 2),
(7, '102020', '63002', 'Febnita Kurniyanti', 'Perempuan', 'General Affair', 20, 1, 3),
(8, '102020', '63001', 'Taufiqurrohman', 'Laki-laki', 'Manager', 15, 1, 1),
(9, '112020', '63002', 'Febnita Kurniyanti', 'Perempuan', 'General Affair', 20, 1, 2),
(10, '112020', '63001', 'Taufiqurrohman', 'Laki-laki', 'Manager', 20, 1, 0),
(11, '112020', '63003', 'Fitri', 'Perempuan', 'General Affair', 19, 0, 2),
(12, '102020', '63003', 'Fitri', 'Perempuan', 'General Affair', 20, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_pegawai` varchar(120) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nik`, `nama_pegawai`, `jenis_kelamin`, `nama_jabatan`, `tanggal_masuk`, `status`, `password`, `role_id`, `foto`) VALUES
(20, '63002', 'Febnita Kurniyanti', 'Perempuan', 'General Affair', '2020-10-15', 'Pegawai Tetap', 'e10adc3949ba59abbe56e057f20f883e', 2, 'teamwork.png'),
(21, '63001', 'Taufiqurrohman', 'Laki-laki', 'Manager', '2020-10-15', 'Pegawai Tetap', 'e10adc3949ba59abbe56e057f20f883e', 2, 'PicsArt_06-30-08_11_59.jpg'),
(22, '63003', 'Fitri', 'Perempuan', 'General Affair', '2020-11-05', 'Pegawai Tetap', 'e10adc3949ba59abbe56e057f20f883e', 2, 'fitri.jpg'),
(23, 'admin', 'admin', 'Laki-laki', 'Web Developer', '2020-11-02', 'Owner', '21232f297a57a5a743894a0e4a801fc3', 1, 'PicsArt_06-30-08_11_59.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_potongan_gaji`
--

CREATE TABLE `tbl_potongan_gaji` (
  `id_potongan_gaji` int(11) NOT NULL,
  `jenis_potongan` varchar(120) NOT NULL,
  `jumlah_potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_potongan_gaji`
--

INSERT INTO `tbl_potongan_gaji` (`id_potongan_gaji`, `jenis_potongan`, `jumlah_potongan`) VALUES
(1, 'Alpha', 100000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_potongan_gaji`
--
ALTER TABLE `tbl_potongan_gaji`
  ADD PRIMARY KEY (`id_potongan_gaji`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kehadiran`
--
ALTER TABLE `tbl_kehadiran`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_potongan_gaji`
--
ALTER TABLE `tbl_potongan_gaji`
  MODIFY `id_potongan_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
