-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 09:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `foto`) VALUES
('B10001', 'Keyboard', 150000, 'penyimpanan/Keyboard.jpg'),
('B10002', 'Mouse', 85000, 'penyimpanan/Mouse.jpg'),
('B10003', 'Flashdisk', 25000, 'penyimpanan/Flashdisk.jpg'),
('B10004', 'Harddisk', 500000, 'penyimpanan/Hardisk.jpg'),
('B10005', 'Modem', 200000, 'penyimpanan/Modem.png'),
('B10006', 'Speaker', 100000, 'penyimpanan/Speaker.jpg'),
('B10007', 'Scanner', 500000, 'penyimpanan/Scanner.jpg'),
('B10008', 'Printer', 1500000, 'penyimpanan/Printer.jpg'),
('B10009', 'Charger', 150000, 'penyimpanan/Charger.jpg'),
('B10010', 'Powerbank', 125000, 'penyimpanan/Powerbank.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id_faktur` varchar(20) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faktur`
--

INSERT INTO `faktur` (`id_faktur`, `id_pelanggan`, `tanggal`) VALUES
('F11101', 'P10101', '2021-10-01'),
('F11102', 'P10103', '2021-10-02'),
('F11103', 'P10105', '2021-10-03'),
('F11104', 'P10107', '2021-10-03'),
('F11105', 'P10110', '2021-10-03');

-- --------------------------------------------------------

--
-- Table structure for table `faktur_barang`
--

CREATE TABLE `faktur_barang` (
  `id_barang` varchar(20) NOT NULL,
  `id_faktur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faktur_barang`
--

INSERT INTO `faktur_barang` (`id_barang`, `id_faktur`) VALUES
('B10001', 'F11101'),
('B10005', 'F11101'),
('B10007', 'F11101'),
('B10004', 'F11102'),
('B10008', 'F11102'),
('B10009', 'F11102'),
('B10002', 'F11103'),
('B10003', 'F11103'),
('B10008', 'F11103'),
('B10005', 'F11104'),
('B10007', 'F11104'),
('B10009', 'F11104'),
('B10004', 'F11105'),
('B10005', 'F11105'),
('B10010', 'F11105');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`) VALUES
('P10101', 'Sindi'),
('P10102', 'Rina'),
('P10103', 'Sulas'),
('P10104', 'Putri'),
('P10105', 'Dewi'),
('P10106', 'Wulan'),
('P10107', 'Salsa'),
('P10108', 'Sinta'),
('P10109', 'Fitri'),
('P10110', 'Atika');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `email`, `nama`, `password`) VALUES
(1, 'admintoko@gmail.com', 'Administrator', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id_faktur`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `faktur_barang`
--
ALTER TABLE `faktur_barang`
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_faktur` (`id_faktur`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `faktur_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faktur_barang`
--
ALTER TABLE `faktur_barang`
  ADD CONSTRAINT `faktur_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `faktur_barang_ibfk_2` FOREIGN KEY (`id_faktur`) REFERENCES `faktur` (`id_faktur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
