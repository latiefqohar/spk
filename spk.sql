-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2019 at 03:21 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telpon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `telpon`) VALUES
(1, 'pt suka suka aja', 'tangerang', '02225');

-- --------------------------------------------------------

--
-- Table structure for table `po`
--

CREATE TABLE `po` (
  `id_po` int(11) NOT NULL,
  `kode_po` varchar(30) NOT NULL,
  `pelanggan` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `diameter` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `no_spk` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `po`
--

INSERT INTO `po` (`id_po`, `kode_po`, `pelanggan`, `jenis`, `diameter`, `jumlah`, `berat`, `tanggal`, `no_spk`, `status`) VALUES
(19, 'sd', 1, 'jdkck', 200, 20, 1000, '2019-06-20 00:00:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `spb`
--

CREATE TABLE `spb` (
  `no_spb` int(11) NOT NULL,
  `kode_spb` varchar(30) NOT NULL,
  `id_po` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tanggal_kirim` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE `spk` (
  `no_spk` int(11) NOT NULL,
  `kode_spk` varchar(30) NOT NULL,
  `id_po` int(11) NOT NULL,
  `barcode` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`no_spk`, `kode_spk`, `id_po`, `barcode`, `tanggal`, `status`) VALUES
(18, 'ph', 19, 25545566, '2019-06-20 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telpon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama`, `alamat`, `telpon`) VALUES
(2, 'ptt', 'jakart', '215150000'),
(8, 'Officiis earum rerum eligendi ', 'Voluptatem fugit quia eum et quam exercitationem.', '596');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `Nik` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `departemen` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `Nik`, `nama`, `departemen`, `jabatan`, `username`, `password`, `level`) VALUES
(3, 12451232, 'johan', 'PPIC', 'admin', 'ppic', '10445f9a51c9dce6a86c529d671e76a8', ''),
(4, 48, 'Nostrum soluta voluptatem beat', 'FGWH', 'supervisor', 'fgwh', 'b799140e80e6c89a6ae69c64233855c7', 'admin'),
(5, 28555, 'admin', 'marketing', 'spv', 'marketing', 'c769c2bd15500dd906102d9be97fdceb', 'admin'),
(6, 18452, 'joko', 'Produksi', 'admin', 'produksi', 'edf3017a2946290b95c783bd1a7f0ba7', 'admin'),
(7, 59626, 'superadmin', '', '', 'root', '81dc9bdb52d04dc20036dbd8313ed055', 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `wirehouse_entry`
--

CREATE TABLE `wirehouse_entry` (
  `id` int(11) NOT NULL,
  `barcode_produksi` int(11) NOT NULL,
  `spb` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `diameter` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `heat_no` varchar(30) NOT NULL,
  `coil_no` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `tanggal_produksi` datetime NOT NULL,
  `vihicle` varchar(30) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wirerod`
--

CREATE TABLE `wirerod` (
  `barcode` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `diameter` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `suplier` int(11) NOT NULL,
  `heat_no` varchar(30) NOT NULL,
  `coil_no` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `detail_lokasi` varchar(30) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wirerod`
--

INSERT INTO `wirerod` (`barcode`, `jenis`, `diameter`, `berat`, `suplier`, `heat_no`, `coil_no`, `qty`, `lokasi`, `detail_lokasi`, `tanggal_masuk`, `status`) VALUES
(25545566, 'Impedit quia omnis veritatis m', 98, 17, 2, 'Rerum ullam aspernatur eaque a', 'your.email+faker78603@gmail.co', 421, 'incoming', 'your.email+faker69286@gmail.co', '0000-00-00 00:00:00', 1),
(25545567, 'j101', 40, 100, 8, '20', '30', 1, 'incoming', 'pd001', '2019-07-15 05:56:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wirerod_produksi`
--

CREATE TABLE `wirerod_produksi` (
  `barcode_produksi` int(11) NOT NULL,
  `no_spk` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `diameter` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `heat_no` varchar(30) NOT NULL,
  `coil` varchar(30) NOT NULL,
  `no_mesin` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `lokasi` varchar(30) NOT NULL,
  `detail_lokasi` varchar(30) NOT NULL,
  `shift` varchar(30) NOT NULL,
  `tanggal_produksi` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wirerod_produksi`
--

INSERT INTO `wirerod_produksi` (`barcode_produksi`, `no_spk`, `jenis`, `diameter`, `berat`, `heat_no`, `coil`, `no_mesin`, `qty`, `lokasi`, `detail_lokasi`, `shift`, `tanggal_produksi`, `status`) VALUES
(32545688, 18, 'Impedit quia omnis veritatis m', 98, 0, 'Rerum ullam aspernatur eaque a', 'your.email+faker78603@gmail.co', '32', 1, 'produksi', 'pd001', '', '2019-07-15 08:35:05', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`id_po`),
  ADD KEY `pelanggan` (`pelanggan`);

--
-- Indexes for table `spb`
--
ALTER TABLE `spb`
  ADD PRIMARY KEY (`no_spb`),
  ADD KEY `id_po` (`id_po`);

--
-- Indexes for table `spk`
--
ALTER TABLE `spk`
  ADD PRIMARY KEY (`no_spk`),
  ADD KEY `id_po` (`id_po`),
  ADD KEY `barcode` (`barcode`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wirehouse_entry`
--
ALTER TABLE `wirehouse_entry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barcode_produksi` (`barcode_produksi`),
  ADD KEY `spb` (`spb`);

--
-- Indexes for table `wirerod`
--
ALTER TABLE `wirerod`
  ADD PRIMARY KEY (`barcode`),
  ADD KEY `suplier` (`suplier`);

--
-- Indexes for table `wirerod_produksi`
--
ALTER TABLE `wirerod_produksi`
  ADD PRIMARY KEY (`barcode_produksi`),
  ADD KEY `no_spk` (`no_spk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `po`
--
ALTER TABLE `po`
  MODIFY `id_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `spb`
--
ALTER TABLE `spb`
  MODIFY `no_spb` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `no_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `wirehouse_entry`
--
ALTER TABLE `wirehouse_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wirerod`
--
ALTER TABLE `wirerod`
  MODIFY `barcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25545568;
--
-- AUTO_INCREMENT for table `wirerod_produksi`
--
ALTER TABLE `wirerod_produksi`
  MODIFY `barcode_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32545689;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `po`
--
ALTER TABLE `po`
  ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `spb`
--
ALTER TABLE `spb`
  ADD CONSTRAINT `spb_ibfk_1` FOREIGN KEY (`id_po`) REFERENCES `po` (`id_po`);

--
-- Constraints for table `spk`
--
ALTER TABLE `spk`
  ADD CONSTRAINT `spk_ibfk_1` FOREIGN KEY (`id_po`) REFERENCES `po` (`id_po`),
  ADD CONSTRAINT `spk_ibfk_2` FOREIGN KEY (`barcode`) REFERENCES `wirerod` (`barcode`);

--
-- Constraints for table `wirehouse_entry`
--
ALTER TABLE `wirehouse_entry`
  ADD CONSTRAINT `wirehouse_entry_ibfk_1` FOREIGN KEY (`barcode_produksi`) REFERENCES `wirerod_produksi` (`barcode_produksi`),
  ADD CONSTRAINT `wirehouse_entry_ibfk_2` FOREIGN KEY (`spb`) REFERENCES `spb` (`no_spb`);

--
-- Constraints for table `wirerod`
--
ALTER TABLE `wirerod`
  ADD CONSTRAINT `wirerod_ibfk_1` FOREIGN KEY (`suplier`) REFERENCES `suplier` (`id_suplier`);

--
-- Constraints for table `wirerod_produksi`
--
ALTER TABLE `wirerod_produksi`
  ADD CONSTRAINT `wirerod_produksi_ibfk_1` FOREIGN KEY (`no_spk`) REFERENCES `spk` (`no_spk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
