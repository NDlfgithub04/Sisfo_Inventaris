-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2021 at 11:02 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_persediaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kode_barang` varchar(6) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `kode_kategori` int(11) NOT NULL,
  `spesifikasi` varchar(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `lokasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kode_barang`, `nama_barang`, `kode_kategori`, `spesifikasi`, `stok`, `lokasi`) VALUES
('BRG001', 'AC', 1, 'LG', 1, 'Perpustakaan'),
('BRG002', 'Lemari', 3, 'Kaca', 1, 'Perpustakaan'),
('BRG003', 'Komputer', 1, 'Lenovo', 2, 'Perpustakaan'),
('BRG004', 'Rak Buku', 3, 'Kayu', 4, 'Perpustakaan'),
('BRG005', 'Loker 5 Pintu', 3, 'Besi', 1, 'Perpustakaan'),
('BRG006', 'Bolpoin', 2, 'MyGel Hitam', 12, 'Ruang Perlengkapan'),
('BRG007', 'Kertas HVS', 2, 'A4', 5, 'Ruang Perlengkapan'),
('BRG008', 'Pensil 2B', 2, 'Greebel', 50, 'Ruang Perlengkapan'),
('BRG009', 'Tempat Sampah', 5, 'Plastik', 8, 'Ruang Perlengkapan'),
('BRG010', 'Tisu', 5, 'Paseo', 30, 'Ruang Perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `tbdepartement`
--

CREATE TABLE `tbdepartement` (
  `kode_departement` varchar(6) NOT NULL,
  `nama_departement` varchar(30) NOT NULL,
  `ext` varchar(3) NOT NULL,
  `nama_kasi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdepartement`
--

INSERT INTO `tbdepartement` (`kode_departement`, `nama_departement`, `ext`, `nama_kasi`) VALUES
('DEP001', 'Tata Usaha', '105', 'Erni Sulastri'),
('DEP002', 'Statistik Sosial', '106', 'Ismail'),
('DEP003', 'Statistik Produksi', '107', 'Hella Citra'),
('DEP004', 'Statistik Distribusi', '108', 'Erman'),
('DEP005', 'Nerwilis', '109', 'Yufri Anda'),
('DEP006', 'IPDS', '110', 'Afrizal');

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_penerimaan`
--

CREATE TABLE `tbdetail_penerimaan` (
  `id` int(11) NOT NULL,
  `kode_terima` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_penerimaan`
--

INSERT INTO `tbdetail_penerimaan` (`id`, `kode_terima`, `kode_barang`, `jumlah_barang`) VALUES
(15, 'K202012090001', 'BRG003', 2),
(18, 'T202012090002', 'BRG001', 2),
(19, 'T202012090002', 'BRG003', 2),
(20, 'T202012100001', 'BRG006', 5),
(21, 'T202012100002', 'BRG004', 2),
(22, 'T202012100002', 'BRG001', 1),
(23, 'T202012100002', 'BRG006', 5),
(24, 'T202012100003', 'BRG007', 2),
(25, 'T202012100003', 'BRG006', 3),
(26, 'T202012100003', 'BRG001', 1),
(27, 'T202012100003', 'BRG003', 2),
(31, 'T202012100004', 'BRG007', 2),
(32, 'T202012100004', 'BRG008', 5),
(33, 'T202012100004', 'BRG006', 5),
(34, 'T202012100004', 'BRG009', 1),
(35, 'T202012100005', 'BRG010', 2),
(37, 'K202012110001', 'BRG010', 7),
(38, 'T202102060001', 'BRG009', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbdetail_pengeluaran`
--

CREATE TABLE `tbdetail_pengeluaran` (
  `id` int(11) NOT NULL,
  `kode_keluar` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbdetail_pengeluaran`
--

INSERT INTO `tbdetail_pengeluaran` (`id`, `kode_keluar`, `kode_barang`, `jumlah_barang`) VALUES
(15, 'T202012090002', 'BRG006', 5),
(16, 'K202012090001', 'BRG001', 2),
(17, 'K202012090001', 'BRG004', 1),
(18, 'K202012100001', 'BRG006', 3),
(19, 'K202012100001', 'BRG004', 1),
(21, 'K202012100002', 'BRG003', 1),
(22, 'K202102060001', 'BRG010', 3),
(23, 'K202102060001', 'BRG007', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbgabung_transaksi`
--

CREATE TABLE `tbgabung_transaksi` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `ket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbgabung_transaksi`
--

INSERT INTO `tbgabung_transaksi` (`id`, `kode`, `tanggal`, `kode_barang`, `jumlah_barang`, `ket`) VALUES
(1, 'K202012090001', '2020-12-09', 'BRG003', 2, 'MASUK'),
(2, 'T202012090001', '2020-12-09', 'BRG006', 3, 'MASUK'),
(4, 'K202012090001', '2020-12-09', 'BRG003', 0, 'KELUAR'),
(5, 'T202012090001', '2020-12-09', 'BRG006', 0, 'KELUAR'),
(7, 'K202012090001', '2020-12-09', 'BRG001', 2, 'KELUAR'),
(8, 'K202012090001', '2020-12-09', 'BRG004', 1, 'KELUAR'),
(10, 'K202012090001', '2020-12-09', 'BRG001', 0, 'MASUK'),
(11, 'K202012090001', '2020-12-09', 'BRG004', 0, 'MASUK'),
(13, 'T202012090002', '2020-12-09', 'BRG001', 2, 'MASUK'),
(14, 'T202012090002', '2020-12-09', 'BRG003', 2, 'MASUK'),
(16, 'T202012090002', '2020-12-09', 'BRG001', 0, 'KELUAR'),
(17, 'T202012090002', '2020-12-09', 'BRG003', 0, 'KELUAR'),
(18, 'K202012100001', '2020-12-10', 'BRG006', 3, 'KELUAR'),
(19, 'K202012100001', '2020-12-10', 'BRG004', 1, 'KELUAR'),
(21, 'K202012100001', '2020-12-10', 'BRG006', 0, 'MASUK'),
(22, 'K202012100001', '2020-12-10', 'BRG004', 0, 'MASUK'),
(24, 'K202012100002', '2020-12-10', 'BRG003', 1, 'KELUAR'),
(25, 'K202012100002', '2020-12-10', 'BRG003', 0, 'MASUK'),
(26, 'T202012100001', '2020-12-10', 'BRG006', 5, 'MASUK'),
(27, 'T202012100001', '2020-12-10', 'BRG006', 0, 'KELUAR'),
(28, 'T202012100002', '2020-12-10', 'BRG004', 2, 'MASUK'),
(29, 'T202012100002', '2020-12-10', 'BRG001', 1, 'MASUK'),
(30, 'T202012100002', '2020-12-10', 'BRG006', 5, 'MASUK'),
(31, 'T202012100002', '2020-12-10', 'BRG004', 0, 'KELUAR'),
(32, 'T202012100002', '2020-12-10', 'BRG001', 0, 'KELUAR'),
(33, 'T202012100002', '2020-12-10', 'BRG006', 0, 'KELUAR'),
(34, 'T202012100003', '2020-12-10', 'BRG007', 2, 'MASUK'),
(35, 'T202012100003', '2020-12-10', 'BRG006', 3, 'MASUK'),
(36, 'T202012100003', '2020-12-10', 'BRG001', 1, 'MASUK'),
(37, 'T202012100003', '2020-12-10', 'BRG003', 2, 'MASUK'),
(41, 'T202012100003', '2020-12-10', 'BRG007', 0, 'KELUAR'),
(42, 'T202012100003', '2020-12-10', 'BRG006', 0, 'KELUAR'),
(43, 'T202012100003', '2020-12-10', 'BRG001', 0, 'KELUAR'),
(44, 'T202012100003', '2020-12-10', 'BRG003', 0, 'KELUAR'),
(48, 'T202012100004', '2020-12-10', 'BRG007', 2, 'MASUK'),
(49, 'T202012100004', '2020-12-10', 'BRG008', 5, 'MASUK'),
(50, 'T202012100004', '2020-12-10', 'BRG006', 5, 'MASUK'),
(51, 'T202012100004', '2020-12-10', 'BRG009', 1, 'MASUK'),
(55, 'T202012100004', '2020-12-10', 'BRG007', 0, 'KELUAR'),
(56, 'T202012100004', '2020-12-10', 'BRG008', 0, 'KELUAR'),
(57, 'T202012100004', '2020-12-10', 'BRG006', 0, 'KELUAR'),
(58, 'T202012100004', '2020-12-10', 'BRG009', 0, 'KELUAR'),
(59, 'T202012100005', '2020-12-10', 'BRG010', 2, 'MASUK'),
(60, 'T202012100005', '2020-12-10', 'BRG010', 0, 'KELUAR'),
(61, 'T202012110001', '2020-12-11', 'BRG010', 20, 'MASUK'),
(62, 'T202012110001', '2020-12-11', 'BRG010', 0, 'KELUAR'),
(63, 'K202012110001', '2020-12-15', 'BRG010', 7, 'MASUK'),
(64, 'T202012150001', '2020-12-15', 'BRG007', 5, 'MASUK'),
(65, 'T202012150001', '2020-12-15', 'BRG006', 2, 'MASUK'),
(66, 'K202012110001', '2020-12-15', 'BRG010', 0, 'KELUAR'),
(67, 'T202012150001', '2020-12-15', 'BRG007', 0, 'KELUAR'),
(68, 'T202012150001', '2020-12-15', 'BRG006', 0, 'KELUAR'),
(69, 'K202102060001', '2021-02-06', 'BRG010', 3, 'KELUAR'),
(70, 'K202102060001', '2021-02-06', 'BRG007', 1, 'KELUAR'),
(72, 'K202102060001', '2021-02-06', 'BRG010', 0, 'MASUK'),
(73, 'K202102060001', '2021-02-06', 'BRG007', 0, 'MASUK'),
(75, 'T202102060001', '2021-02-06', 'BRG009', 5, 'MASUK'),
(76, 'T202102060001', '2021-02-06', 'BRG009', 0, 'KELUAR');

-- --------------------------------------------------------

--
-- Table structure for table `tbkategori`
--

CREATE TABLE `tbkategori` (
  `kode_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkategori`
--

INSERT INTO `tbkategori` (`kode_kategori`, `nama_kategori`) VALUES
(1, 'Elektronik'),
(2, 'ATK'),
(3, 'Perabotan'),
(5, 'Perlengkapan');

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `id_login` varchar(6) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `status_admin` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`id_login`, `username`, `password`, `nama_admin`, `status_admin`) VALUES
('ADM001', 'admin', 'admin', 'Erni Sulastri', '1'),
('ADM002', 'admin2', '12345', 'Nurmayanti', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbpenerimaan`
--

CREATE TABLE `tbpenerimaan` (
  `kode_terima` varchar(20) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `kode_departement` varchar(6) NOT NULL,
  `id_login` varchar(6) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpenerimaan`
--

INSERT INTO `tbpenerimaan` (`kode_terima`, `tanggal_terima`, `jumlah_item`, `kode_departement`, `id_login`, `keterangan`) VALUES
('T202012090002', '2020-12-09', 2, 'DEP005', 'ADM001', 'PO 13446'),
('T202012100001', '2020-12-10', 1, 'DEP001', 'ADM001', 'PO 13448'),
('T202012100002', '2020-12-10', 3, 'DEP003', 'ADM001', 'PO 17654'),
('T202012100003', '2020-12-10', 4, 'DEP004', 'ADM001', 'PO 17655'),
('T202012100004', '2020-12-10', 4, 'DEP006', 'ADM001', 'PO 17656'),
('T202012100005', '2020-12-10', 1, 'DEP003', 'ADM001', 'PO 13449'),
('T202102060001', '2021-02-06', 1, '', 'ADM001', 'PO 13450');

-- --------------------------------------------------------

--
-- Table structure for table `tbpengeluaran`
--

CREATE TABLE `tbpengeluaran` (
  `kode_keluar` varchar(20) NOT NULL,
  `tanggal_keluar` date NOT NULL,
  `jumlah_item` int(11) NOT NULL,
  `kode_departement` varchar(20) NOT NULL,
  `id_login` varchar(60) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengeluaran`
--

INSERT INTO `tbpengeluaran` (`kode_keluar`, `tanggal_keluar`, `jumlah_item`, `kode_departement`, `id_login`, `keterangan`) VALUES
('K202012090001', '2020-12-09', 2, 'DEP003', 'ADM001', 'PO 245467'),
('K202012100001', '2020-12-10', 2, 'DEP002', 'ADM001', 'PO 1257'),
('K202012100002', '2020-12-10', 1, 'DEP001', 'ADM001', 'PO 13446'),
('K202102060001', '2021-02-06', 2, 'DEP005', 'ADM001', 'PO 1267');

-- --------------------------------------------------------

--
-- Table structure for table `tbsementara`
--

CREATE TABLE `tbsementara` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `kode_barang` varchar(6) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `tbdepartement`
--
ALTER TABLE `tbdepartement`
  ADD PRIMARY KEY (`kode_departement`);

--
-- Indexes for table `tbdetail_penerimaan`
--
ALTER TABLE `tbdetail_penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbdetail_pengeluaran`
--
ALTER TABLE `tbdetail_pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbgabung_transaksi`
--
ALTER TABLE `tbgabung_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbkategori`
--
ALTER TABLE `tbkategori`
  ADD PRIMARY KEY (`kode_kategori`);

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tbpenerimaan`
--
ALTER TABLE `tbpenerimaan`
  ADD PRIMARY KEY (`kode_terima`);

--
-- Indexes for table `tbpengeluaran`
--
ALTER TABLE `tbpengeluaran`
  ADD PRIMARY KEY (`kode_keluar`);

--
-- Indexes for table `tbsementara`
--
ALTER TABLE `tbsementara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbdetail_penerimaan`
--
ALTER TABLE `tbdetail_penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbdetail_pengeluaran`
--
ALTER TABLE `tbdetail_pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbgabung_transaksi`
--
ALTER TABLE `tbgabung_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tbkategori`
--
ALTER TABLE `tbkategori`
  MODIFY `kode_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbsementara`
--
ALTER TABLE `tbsementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
