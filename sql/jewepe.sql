-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 07:32 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jewepe`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id` int(11) NOT NULL,
  `npm` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id`, `npm`, `kelas`, `nama`, `username`, `password`, `role`) VALUES
(1, 54418672, '4IA07', 'Helmi', '1', '1', 'USER'),
(2, 73813132, '4IA02', 'Ihsan', '123', '123', 'USER'),
(4, 5448272, '4ia99', 'Bili', 'user', 'user', 'USER'),
(80, 80, '80', '80', '80', '80', 'ADMIN'),
(99, 99, '99', 'admin', 'admin', 'admin', 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id` int(11) NOT NULL,
  `nama_kursus` varchar(50) NOT NULL,
  `keterangan` longtext NOT NULL,
  `mulai_kursus` date NOT NULL,
  `akhir_kursus` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id`, `nama_kursus`, `keterangan`, `mulai_kursus`, `akhir_kursus`) VALUES
(1, 'Web Developer', 'Skema sertifikasi okupasi Web Programmer adalah skema sertifiikasi okupasi yang dikembangkan oleh komite skema LSP Universitas Gunadarma untuk memenuhi kebutuhan sertifikasi kompetensi kerja di LSP Universitas Gunadarma.', '2022-08-05', '2022-08-08'),
(4, 'Fundamental JavaScript', 'Pada kursus ini mempelajari dasar-dasar penggunaan JavaScript', '2022-08-07', '2022-08-31'),
(5, 'Beginner Web Programming', 'Pada kursus ini akan mempelajari bagaimana cara membuat web sederhana menggunakan HTML,CSS dan JS', '2022-08-06', '2022-09-01'),
(6, 'Deep Learning', 'Belajar membuat sign language detector menggunakan library tensorflow', '2022-08-27', '2022-08-30'),
(7, 'Fundamental Networking', 'Mempelajari jaringan menggunakan Cisco', '2022-08-26', '2022-08-31'),
(8, 'sdf', 'sdf', '2022-08-01', '2022-08-15');

-- --------------------------------------------------------

--
-- Table structure for table `peserta_kursus`
--

CREATE TABLE `peserta_kursus` (
  `id` int(11) NOT NULL,
  `data_mahasiswa_id` int(11) NOT NULL,
  `npm` int(11) DEFAULT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `nama_kursus` varchar(50) DEFAULT NULL,
  `keterangan` longtext NOT NULL,
  `mulai_kursus` date DEFAULT NULL,
  `akhir_kursus` date DEFAULT NULL,
  `krs` varchar(255) DEFAULT NULL,
  `konfirmasi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peserta_kursus`
--

INSERT INTO `peserta_kursus` (`id`, `data_mahasiswa_id`, `npm`, `nama`, `nama_kursus`, `keterangan`, `mulai_kursus`, `akhir_kursus`, `krs`, `konfirmasi`) VALUES
(13, 4, 5448272, 'Bili', 'Fundamental Networking', 'Mempelajari jaringan menggunakan Cisco', '2022-08-26', '2022-08-31', 'AverageMan _ Threadless Artist Shop.png', 'Confirmed'),
(14, 4, 5448272, 'Bili', 'Beginner Web Programming', 'Pada kursus ini akan mempelajari bagaimana cara membuat web sederhana menggunakan HTML,CSS dan JS', '2022-08-06', '2022-09-01', 'あんこ on Twitter.png', 'Tolak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta_kursus`
--
ALTER TABLE `peserta_kursus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_mahasiswa_id` (`data_mahasiswa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `peserta_kursus`
--
ALTER TABLE `peserta_kursus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
