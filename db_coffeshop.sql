-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 10:18 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_coffeshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idmenu` int(50) NOT NULL,
  `namamenu` varchar(20) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `gambar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idmenu`, `namamenu`, `harga`, `gambar`) VALUES
(21, 'Espresso', '18000', 'expreso.jpg'),
(22, 'American Black', '20000', 'american.jpg'),
(23, 'Americano Ice Black', '22000', 'americano.jpg'),
(24, 'Vanilla Latte', '25000', 'vanilla_latte.jpg'),
(25, 'Hazelnut Latte', '25000', 'hazelnut_latte.jpg'),
(26, 'Mango Ice Latte', '25000', 'mangoice.jpg'),
(27, 'Caramel Macchiato', '23000', 'caramelmachiato.jpg'),
(28, 'Frape Ice Coffee', '25000', 'frapeice.jpg'),
(29, 'Chocolate', '20000', 'chocolate.jpg'),
(30, 'Redvelvet', '20000', 'redvelvet.jpg'),
(31, 'Taro', '20000', 'taroice.jpg'),
(32, 'Matcha', '20000', 'matcha.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`) VALUES
(70, 'Fade'),
(71, 'Ferdi'),
(72, 'Puan'),
(73, 'Dean'),
(74, 'Adel'),
(75, 'Fadia'),
(76, 'Fajar'),
(77, 'Pratama'),
(78, 'Ucup'),
(79, 'Smith'),
(80, 'Hendra'),
(81, 'pika');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` varchar(20) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`) VALUES
(51, '70', '2022-12-30', '43000'),
(52, '71', '2022-12-30', '25000'),
(53, '72', '2022-12-30', '115000'),
(54, '73', '2023-01-01', '42000'),
(55, '74', '2023-01-01', '45000'),
(56, '75', '2023-01-02', '40000'),
(57, '76', '2023-01-02', '25000'),
(58, '77', '2023-01-03', '47000'),
(59, '78', '2023-01-04', '311000'),
(60, '79', '2023-01-06', '50000'),
(61, '80', '2023-01-07', '92000'),
(62, '81', '2023-01-09', '43000');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_menu`
--

CREATE TABLE `pembelian_menu` (
  `id_pembelian_menu` int(11) NOT NULL,
  `id_pembelian` varchar(5) NOT NULL,
  `id_menu` varchar(5) NOT NULL,
  `jumlah` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_menu`
--

INSERT INTO `pembelian_menu` (`id_pembelian_menu`, `id_pembelian`, `id_menu`, `jumlah`) VALUES
(68, '37', '21', '1'),
(69, '37', '22', '1'),
(70, '37', '23', '1'),
(71, '38', '21', '1'),
(72, '38', '22', '1'),
(73, '38', '23', '1'),
(74, '39', '23', '1'),
(75, '39', '32', '1'),
(76, '39', '30', '1'),
(77, '39', '26', '1'),
(78, '39', '29', '2'),
(79, '40', '25', '1'),
(80, '40', '23', '2'),
(81, '41', '21', '1'),
(82, '41', '27', '1'),
(83, '41', '29', '1'),
(84, '41', '32', '1'),
(85, '41', '28', '1'),
(86, '42', '27', '1'),
(87, '42', '22', '1'),
(88, '42', '31', '1'),
(89, '43', '32', '1'),
(90, '44', '21', '1'),
(91, '44', '25', '1'),
(92, '45', '21', '1'),
(93, '46', '22', '1'),
(94, '47', '22', '1'),
(95, '48', '23', '1'),
(96, '48', '24', '1'),
(97, '48', '26', '1'),
(98, '49', '27', '1'),
(99, '50', '31', '1'),
(100, '50', '32', '1'),
(101, '51', '21', '1'),
(102, '51', '26', '1'),
(103, '52', '25', '1'),
(104, '53', '25', '1'),
(105, '53', '24', '1'),
(106, '53', '28', '1'),
(107, '53', '29', '2'),
(108, '54', '22', '1'),
(109, '54', '23', '1'),
(110, '55', '30', '1'),
(111, '55', '24', '1'),
(112, '56', '29', '1'),
(113, '56', '32', '1'),
(114, '57', '28', '1'),
(115, '58', '25', '1'),
(116, '58', '23', '1'),
(117, '59', '21', '1'),
(118, '59', '22', '1'),
(119, '59', '23', '1'),
(120, '59', '24', '2'),
(121, '59', '25', '1'),
(122, '59', '26', '1'),
(123, '59', '27', '2'),
(124, '59', '28', '1'),
(125, '59', '29', '1'),
(126, '59', '30', '1'),
(127, '59', '31', '1'),
(128, '59', '32', '1'),
(129, '60', '26', '2'),
(130, '61', '23', '1'),
(131, '61', '29', '1'),
(132, '61', '25', '2'),
(133, '62', '21', '1'),
(134, '62', '26', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  ADD PRIMARY KEY (`id_pembelian_menu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idmenu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pembelian_menu`
--
ALTER TABLE `pembelian_menu`
  MODIFY `id_pembelian_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
