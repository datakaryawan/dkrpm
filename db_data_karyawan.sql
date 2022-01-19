-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2020 at 05:43 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_data_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
CREATE DATABASE db_data_karyawan;
USE db_data_karyawan;
CREATE TABLE `tb_karyawan` (
  `no` INT(5) NOT NULL,
  `nik` VARCHAR(50) DEFAULT NULL,
  `nama_karyawan` VARCHAR(100) DEFAULT NULL,
  `jabatan` VARCHAR(100) DEFAULT NULL,
  `tgl_masuk` DATE DEFAULT NULL,
  `divisi` VARCHAR(100) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`no`, `nik`, `nama_karyawan`, `jabatan`, `tgl_masuk`, `divisi`) VALUES
(1, '17300002', 'Hafif', 'Technical Support', '2019-06-07', 'Umum'),
(2, '17300003', 'Mas Untoro', 'Technical Support', '2019-06-11', 'Staff'),
(3, '17300001', 'Untoro R', 'Technical Support', '2019-06-10', 'Staff'),
(4, '17300004', 'Husna Hulzanah', 'Accounting', '2019-04-01', 'Staff'),
(5, '17300007', 'Adistty R', 'Manager', '2020-03-11', 'Pesonalia'),
(6, '17300006', 'Adistty', 'Finance', '2020-03-12', 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `no` INT(5) NOT NULL,
  `nik` VARCHAR(50) DEFAULT NULL,
  `nama_karyawan` VARCHAR(100) DEFAULT NULL,
  `level` ENUM('admin','user','superuser') DEFAULT NULL,
  `password` VARCHAR(100) DEFAULT NULL
) ENGINE=INNODB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`no`, `nik`, `nama_karyawan`, `level`, `password`) VALUES
(1, '18313061', 'adika', 'admin', '123456'),
(2, '18313018', 'amdi', 'admin', '123456'),
(3, '18313043', 'imam', 'user', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `no` INT(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `no` INT(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
