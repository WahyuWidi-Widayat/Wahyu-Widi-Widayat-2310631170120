-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2025 at 04:57 AM
-- Server version: 8.4.3
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pemrograman_web_contoh`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `ID` int NOT NULL,
  `Judul` varchar(255) DEFAULT NULL,
  `Penulis` varchar(255) DEFAULT NULL,
  `Tahun_Terbit` int DEFAULT NULL,
  `Harga` decimal(10,2) DEFAULT NULL,
  `stok` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`ID`, `Judul`, `Penulis`, `Tahun_Terbit`, `Harga`, `stok`) VALUES
(8, 'jaringan komputer', 'alif', 2023, 200000.00, 85),
(10, 'python', 'kiki', 2021, 200000.00, 88);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `Pesanan_ID` int NOT NULL,
  `Buku_ID` int NOT NULL,
  `Kuantitas` int DEFAULT NULL,
  `Harga_Per_Satuan` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`Pesanan_ID`, `Buku_ID`, `Kuantitas`, `Harga_Per_Satuan`) VALUES
(5, 8, 3, 200000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ID` int NOT NULL,
  `Nama` varchar(255) DEFAULT NULL,
  `Alamat` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Telepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ID`, `Nama`, `Alamat`, `Email`, `Telepon`) VALUES
(11, 'iqbal', NULL, NULL, NULL),
(18, 'alif', 'griya', 'alif@gmail.com', '082111462562');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `ID` int NOT NULL,
  `Tanggal_Pesanan` date DEFAULT NULL,
  `Pelanggan_ID` int DEFAULT NULL,
  `Total_Harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`ID`, `Tanggal_Pesanan`, `Pelanggan_ID`, `Total_Harga`) VALUES
(1, '2025-06-03', 11, 750000.00),
(2, '2025-06-04', 11, 400000.00),
(3, '2025-06-04', 11, 900000.00),
(4, '2025-06-04', 11, 1500000.00),
(5, '2025-06-08', 18, 600000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`Pesanan_ID`,`Buku_ID`),
  ADD KEY `fk_buku` (`Buku_ID`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nama` (`Nama`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pelanggan_ID` (`Pelanggan_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `fk_buku` FOREIGN KEY (`Buku_ID`) REFERENCES `buku` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`Pelanggan_ID`) REFERENCES `pelanggan` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
