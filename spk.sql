-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 05:41 AM
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
(1, 'PT Terang Abadi', 'Jl. Cikupamas raya no.25', '022254552');

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
(25, 'PO190718', 1, 'j101', 20, 1, 250, '2019-07-18 20:07:14', 25, 2),
(26, 'PO190719', 1, 'j101', 40, 1, 2000, '2019-07-19 10:37:13', 26, 2);

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

--
-- Dumping data for table `spb`
--

INSERT INTO `spb` (`no_spb`, `kode_spb`, `id_po`, `berat`, `status`, `tanggal_kirim`) VALUES
(6, 'SPB190718', 25, 250, 1, '2019-07-19'),
(7, 'SPB190719', 26, 3000, 1, '2019-07-30');

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
(25, 'SPK190718', 25, 25545573, '2019-07-18 20:07:45', 1),
(26, 'SPK190719', 26, 25545574, '2019-07-19 10:38:45', 1);

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
(2, 'PT Jaya Abadi', 'Cikokol Tangeraang', '215150000'),
(8, 'PT. Maju Jaya', 'Kembangan Jakarta', '0221548');

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
(4, 25625, 'anto', 'FGWH', 'supervisor', 'fgwh', 'b799140e80e6c89a6ae69c64233855c7', 'admin'),
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

--
-- Dumping data for table `wirehouse_entry`
--

INSERT INTO `wirehouse_entry` (`id`, `barcode_produksi`, `spb`, `jenis`, `diameter`, `berat`, `heat_no`, `coil_no`, `qty`, `lokasi`, `tanggal_produksi`, `vihicle`, `tanggal_kirim`, `status`) VALUES
(33, 32545700, 6, 'j101', 40, 100, '20', '30/21', 1, 'produksi', '2019-07-18 20:08:28', 'B 225 A', '2019-07-19', 0),
(34, 32545701, 6, 'j101', 40, 100, '20', '30/2', 1, 'finish good', '2019-07-18 20:08:52', 'B 225 A', '2019-07-19', 0),
(35, 32545702, 7, 'j101', 40, 1500, '20', '30/2', 1, 'finish good', '2019-07-19 10:42:03', 'B. 1234 AC', '2019-07-30', 0);

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
(25545573, 'j101', 40, 250, 2, '20', '30', 1, 'incoming', 'in01', '2019-07-18 15:06:59', 1),
(25545574, 'j101', 40, 3000, 2, '20', '30', 1, 'incoming', 'pd001', '2019-07-19 05:34:35', 1);

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
(32545700, 25, 'j101', 40, 100, '20', '30/21', '42', 1, 'finish good', 'pd001', '', '2019-07-18 20:08:28', 1),
(32545701, 25, 'j101', 40, 100, '20', '30/2', '42', 1, 'finish good', 'pd001', '', '2019-07-18 20:08:52', 1),
(32545702, 26, 'j101', 40, 1500, '20', '30/2', '42', 1, 'finish good', 'pd001', '', '2019-07-19 10:42:03', 1),
(32545703, 26, 'j101', 40, 1500, '20', '30/20', '42', 1, 'produksi', 'pd001', '', '2019-07-19 10:42:24', 0),
(32545704, 26, 'j101', 40, 0, '20', '30/', '', 0, 'produksi', '', '', '2019-07-19 10:43:41', 0);

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
  MODIFY `id_po` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `spb`
--
ALTER TABLE `spb`
  MODIFY `no_spb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `spk`
--
ALTER TABLE `spk`
  MODIFY `no_spk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `wirerod`
--
ALTER TABLE `wirerod`
  MODIFY `barcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25545575;
--
-- AUTO_INCREMENT for table `wirerod_produksi`
--
ALTER TABLE `wirerod_produksi`
  MODIFY `barcode_produksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32545705;
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
