-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 02:51 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat-on`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `role` varchar(5) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `role`, `id`) VALUES
('admin', 'admin', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `foto_menu` varchar(150) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `status_menu` varchar(10) NOT NULL,
  `id_toko` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `foto_menu`, `harga_menu`, `status_menu`, `id_toko`) VALUES
(1, 'Ayam Crispy', 'ayam-crispy3.jpg', 10000, 'in stock', 1),
(2, 'Capcay', 'Capcay.jpg', 12000, 'in stock', 1),
(3, 'Kepiting Asam Manis', 'kepiting-asam-manis.jpg', 20000, 'in stock', 1),
(4, 'mie jawa', 'mie-jawa.jpg', 11000, 'in stock', 1),
(5, 'Nasi Bakar', 'nasi-bakar.jpg', 14000, 'in stock', 1),
(6, 'Pudding Lumut Manis', 'pudding-lumu-cantik.jpg', 15000, 'in stock', 4),
(7, 'Tahu Lontong Jahat', 'tahu-lontong.jpg', 13000, 'in stock', 4),
(8, 'Orak Arik Spesial', 'orak-arik.jpg', 16000, 'in stock', 4),
(9, 'Nasi Kebuli', 'nasi-kebuli.jpg', 23000, 'in stock', 4),
(10, 'Udang Asam Manis', 'udangasam-manis.jpg', 25000, 'in stock', 9),
(11, 'Sata Ayam Kampung', 'sate-ayam.jpg', 12000, 'in stock', 4),
(12, 'Ayam Kecap', 'ayam-kecap-res.jpg', 12000, 'in stock', 9),
(13, 'Nasi Gudeg', 'nasi-gudeg.jpg', 10000, 'in stock', 9),
(14, 'Ayam CrisCrispy', 'ayam-crispy4.jpg', 15000, 'in stock', 6),
(15, 'Pudding Buah Naga', 'pudding_buah_naga.jpg', 5000, 'in stock', 9),
(16, 'Mie Koba', 'mie-koba.jpg', 9000, 'in stock', 6),
(17, 'Sate Pon', 'Sate-pon.jpg', 8000, 'in stock', 9),
(18, 'Nasi Empal Muda', 'nasi-empal.jpg', 21000, 'in stock', 6),
(19, 'Nasi Jagung Manis', 'nasijagung.jpg', 8000, 'in stock', 6),
(20, 'Sate Pon', 'Sate-pon1.jpg', 14000, 'in stock', 6),
(21, 'Tahu Sumedang', 'Tahu-Sumedang.jpg', 10000, 'in stock', 8),
(22, 'Sate Landak', 'sate-landak.jpg', 16000, 'in stock', 2),
(23, 'Sayur Sop', 'Sayur-sop.png', 8000, 'in stock', 8),
(24, 'Rawon Daging Kambing', 'rawon-daging-khas-jawa-timur.jpg', 17000, 'in stock', 2),
(25, 'Sate Taichan', 'Sate-Taichan.jpg', 20000, 'in stock', 8),
(26, 'Salad Buah', 'salad-buah.jpg', 15000, 'in stock', 2),
(27, 'Mie Jawa', 'mie-jawa1.jpg', 15000, 'in stock', 8),
(28, 'Sayur Sop Kaldu Sapi', 'Sayur-sop1.png', 14000, 'in stock', 2),
(29, 'Ayam Lodho Pedas', 'ayam-lodho-pedas.jpg', 25000, 'in stock', 8),
(30, 'Onion Ring', 'Resep-Cumi-Goreng-Tepung.jpg', 22000, 'in stock', 2),
(31, 'Nasi Kebuli', 'nasi-kebuli1.jpg', 12500, 'in stock', 3),
(32, 'Opor Ayam', 'opor-ayam-LI.jpg', 15000, 'in stock', 3),
(33, 'Orak Orik', 'orak-arik1.jpg', 8000, 'in stock', 3),
(35, 'Pudding Pepaya', 'pudding-pepaya.jpg', 5000, 'in stock', 3),
(36, 'Koloke', 'Koloke.jpg', 15000, 'in stock', 3),
(37, 'Koloke', 'Koloke1.jpg', 11000, 'in stock', 5),
(38, 'Mie Tiaw', 'M_Tiaw.jpg', 12000, 'in stock', 5),
(39, 'Pudding Pepaya', 'pudding-pepaya1.jpg', 16000, 'in stock', 1),
(40, 'Kepiting Asam Manis', 'kepiting-asam-manis1.jpg', 55000, 'in stock', 5),
(41, 'Gulai Kepalas Ikan Kakap', 'gulai-kepala-ikan-kakap-50217420.jpg', 50000, 'in stock', 5),
(42, 'Bihun Goreng Pedas', 'bihun-goreng-pedas.jpg', 14000, 'in stock', 5),
(43, 'Ayam Betutu Pedas', 'ayam-betutu.jpg', 21000, 'in stock', 7),
(44, 'Ayam Geprek Cabe Cabean', 'ayam-geprek.jpg', 18000, 'in stock', 7),
(45, 'Opor Ayam Pedas', 'opor-ayam-LI1.jpg', 17000, 'in stock', 7),
(46, 'Selada Pengantin Baru', 'selada-pengantin.jpg', 15000, 'in stock', 7),
(47, 'Udang Asam Manis', 'udangasam-manis1.jpg', 33000, 'in stock', 7),
(48, 'Nasi Goreng', 'nasi-goreng1.jpg', 10000, 'in stock', 10),
(49, 'Sate Ayam', 'sate-ayam1.jpg', 15000, 'in stock', 10),
(50, 'Tahu Tek Surabaya', 'Tahu-Tek-Surabaya.jpg', 8000, 'in stock', 10),
(51, 'Pudding Pepaya', 'pudding-pepaya2.jpg', 10000, 'in stock', 10),
(52, 'Sate Taichan', 'Sate-Taichan1.jpg', 20000, 'in stock', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` bigint(20) NOT NULL,
  `nama_pesan` varchar(50) NOT NULL,
  `email_pesan` varchar(100) NOT NULL,
  `alamat_pesan` text NOT NULL,
  `telepon_pesan` varchar(15) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_kirim` date NOT NULL,
  `rincian_pesan` text NOT NULL,
  `catatan` text NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `total_harga_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama_pesan`, `email_pesan`, `alamat_pesan`, `telepon_pesan`, `tgl_pesan`, `tgl_kirim`, `rincian_pesan`, `catatan`, `jumlah_pesan`, `total_harga_pesan`) VALUES
(201802110116281, 'Helmi Zulfikar', 'helmi_suprayitno_25rpl@student.smktelkom-mlg.sch.id', 'Kunir, Wonodadi, Blitar', '082139593342', '2018-02-11', '2018-02-16', '[{"id_cart":"1","id_menu":"39","id_user":"1","id_toko":"1","qty":"4","sub_total":"64000","nama_menu":"Pudding Pepaya","foto_menu":"pudding-pepaya1.jpg","harga_menu":"16000","status_menu":"in stock","nama_toko":"Pollo Mio","deskripsi_toko":"Toko Catering yang berdiri sejak 2017","foto_toko":"3aa21059495d7c670931ac35a3ba1ae1--restaurant-logo-design-smart-design.jpg","alamat_toko":"Jl. Besar Ijen No.8A","status_toko":"aktif","id_seller":"2"},{"id_cart":"2","id_menu":"5","id_user":"1","id_toko":"1","qty":"7","sub_total":"98000","nama_menu":"Nasi Bakar","foto_menu":"nasi-bakar.jpg","harga_menu":"14000","status_menu":"in stock","nama_toko":"Pollo Mio","deskripsi_toko":"Toko Catering yang berdiri sejak 2017","foto_toko":"3aa21059495d7c670931ac35a3ba1ae1--restaurant-logo-design-smart-design.jpg","alamat_toko":"Jl. Besar Ijen No.8A","status_toko":"aktif","id_seller":"2"},{"id_cart":"3","id_menu":"3","id_user":"1","id_toko":"1","qty":"5","sub_total":"100000","nama_menu":"Kepiting Asam Manis","foto_menu":"kepiting-asam-manis.jpg","harga_menu":"20000","status_menu":"in stock","nama_toko":"Pollo Mio","deskripsi_toko":"Toko Catering yang berdiri sejak 2017","foto_toko":"3aa21059495d7c670931ac35a3ba1ae1--restaurant-logo-design-smart-design.jpg","alamat_toko":"Jl. Besar Ijen No.8A","status_toko":"aktif","id_seller":"2"},{"id_cart":"4","id_menu":"2","id_user":"1","id_toko":"1","qty":"4","sub_total":"48000","nama_menu":"Capcay","foto_menu":"Capcay.jpg","harga_menu":"12000","status_menu":"in stock","nama_toko":"Pollo Mio","deskripsi_toko":"Toko Catering yang berdiri sejak 2017","foto_toko":"3aa21059495d7c670931ac35a3ba1ae1--restaurant-logo-design-smart-design.jpg","alamat_toko":"Jl. Besar Ijen No.8A","status_toko":"aktif","id_seller":"2"}]', 'Sambal jangan pedas banget', 20, 310000),
(201802110218382, 'amar', 'muhammad_agevi_25rpl@student.smktelkom-mlg.sch.id', 'Jl. Danau Ranau no.1', '0852178621', '2018-02-11', '2018-02-13', '[{"id_cart":"6","id_menu":"49","id_user":"2","id_toko":"10","qty":"3","sub_total":"45000","nama_menu":"Sate Ayam","foto_menu":"sate-ayam1.jpg","harga_menu":"15000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"7","id_menu":"50","id_user":"2","id_toko":"10","qty":"1","sub_total":"8000","nama_menu":"Tahu Tek Surabaya","foto_menu":"Tahu-Tek-Surabaya.jpg","harga_menu":"8000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"8","id_menu":"51","id_user":"2","id_toko":"10","qty":"3","sub_total":"30000","nama_menu":"Pudding Pepaya","foto_menu":"pudding-pepaya2.jpg","harga_menu":"10000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"9","id_menu":"52","id_user":"2","id_toko":"10","qty":"1","sub_total":"20000","nama_menu":"Sate Taichan","foto_menu":"Sate-Taichan1.jpg","harga_menu":"20000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"}]', 'Sambal dari sate taichan tidak perlu\r\nPudding untuk dibungkus dengan kotak makanan', 8, 103000),
(201802110219292, 'amar', 'muhammad_agevi_25rpl@student.smktelkom-mlg.sch.id', 'Jl. Danau Ranau no.1', '0852178621', '2018-02-11', '2018-02-13', '[{"id_cart":"6","id_menu":"49","id_user":"2","id_toko":"10","qty":"3","sub_total":"45000","nama_menu":"Sate Ayam","foto_menu":"sate-ayam1.jpg","harga_menu":"15000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"7","id_menu":"50","id_user":"2","id_toko":"10","qty":"1","sub_total":"8000","nama_menu":"Tahu Tek Surabaya","foto_menu":"Tahu-Tek-Surabaya.jpg","harga_menu":"8000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"8","id_menu":"51","id_user":"2","id_toko":"10","qty":"3","sub_total":"30000","nama_menu":"Pudding Pepaya","foto_menu":"pudding-pepaya2.jpg","harga_menu":"10000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"9","id_menu":"52","id_user":"2","id_toko":"10","qty":"1","sub_total":"20000","nama_menu":"Sate Taichan","foto_menu":"Sate-Taichan1.jpg","harga_menu":"20000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"}]', 'Sambal dari sate taichan tidak perlu\r\nPudding untuk dibungkus dengan kotak makanan', 8, 103000),
(201802110221582, 'amar', 'muhammad_agevi_25rpl@student.smktelkom-mlg.sch.id', 'Jl. Danau Ranau no.1', '0852178621', '2018-02-11', '2018-02-12', '[{"id_cart":"6","id_menu":"49","id_user":"2","id_toko":"10","qty":"3","sub_total":"45000","nama_menu":"Sate Ayam","foto_menu":"sate-ayam1.jpg","harga_menu":"15000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"7","id_menu":"50","id_user":"2","id_toko":"10","qty":"1","sub_total":"8000","nama_menu":"Tahu Tek Surabaya","foto_menu":"Tahu-Tek-Surabaya.jpg","harga_menu":"8000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"8","id_menu":"51","id_user":"2","id_toko":"10","qty":"3","sub_total":"30000","nama_menu":"Pudding Pepaya","foto_menu":"pudding-pepaya2.jpg","harga_menu":"10000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"9","id_menu":"52","id_user":"2","id_toko":"10","qty":"1","sub_total":"20000","nama_menu":"Sate Taichan","foto_menu":"Sate-Taichan1.jpg","harga_menu":"20000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"}]', 'sambal dari sate taichan tidak perlu\r\npudding untuk dibunngkus dengan kotak makanan', 8, 103000),
(201802110223582, 'amar', 'muhammad_agevi_25rpl@student.smktelkom-mlg.sch.id', 'Jl. Danau Ranau no.1', '0852178621', '2018-02-11', '2018-02-12', '[{"id_cart":"6","id_menu":"49","id_user":"2","id_toko":"10","qty":"3","sub_total":"45000","nama_menu":"Sate Ayam","foto_menu":"sate-ayam1.jpg","harga_menu":"15000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"7","id_menu":"50","id_user":"2","id_toko":"10","qty":"1","sub_total":"8000","nama_menu":"Tahu Tek Surabaya","foto_menu":"Tahu-Tek-Surabaya.jpg","harga_menu":"8000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"8","id_menu":"51","id_user":"2","id_toko":"10","qty":"3","sub_total":"30000","nama_menu":"Pudding Pepaya","foto_menu":"pudding-pepaya2.jpg","harga_menu":"10000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"},{"id_cart":"9","id_menu":"52","id_user":"2","id_toko":"10","qty":"1","sub_total":"20000","nama_menu":"Sate Taichan","foto_menu":"Sate-Taichan1.jpg","harga_menu":"20000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"}]', 'sambal dari sate taichan tidak perlu\r\npudding untuk dibunngkus dengan kotak makanan', 8, 103000),
(201802110227352, 'amar', 'muhammad_agevi_25rpl@student.smktelkom-mlg.sch.id', 'Jl. Danau Ranau no.1', '0852178621', '2018-02-11', '2018-02-12', '[]', 'sambal dari sate taichan tidak perlu\r\npudding untuk dibunngkus dengan kotak makanan', 0, 0),
(201802110227402, 'amar', 'muhammad_agevi_25rpl@student.smktelkom-mlg.sch.id', 'Jl. Danau Ranau no.1', '0852178621', '2018-02-11', '2018-02-12', '[]', 'sambal dari sate taichan tidak perlu\r\npudding untuk dibunngkus dengan kotak makanan', 0, 0),
(201802110228072, 'amar', 'amarcheater87@gmail.com', 'kerinci raya, Tuban', '0852178621', '2018-02-11', '2018-02-08', '[{"id_cart":"10","id_menu":"48","id_user":"2","id_toko":"10","qty":"1","sub_total":"10000","nama_menu":"Nasi Goreng","foto_menu":"nasi-goreng1.jpg","harga_menu":"10000","status_menu":"in stock","nama_toko":"Catering Ilham","deskripsi_toko":"Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau","foto_toko":"logo.jpg","alamat_toko":"Jl. Candi 2A No.475","status_toko":"aktif","id_seller":"11"}]', 'adasd', 1, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `id_seller` int(11) NOT NULL,
  `nama_seller` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`id_seller`, `nama_seller`, `alamat`, `kota`, `email`, `no_telepon`, `username`, `password`, `role`) VALUES
(1, 'godam', 'kerinci raya', 'malang', 'gdamn81@gmail.com', '0812345678', 'godam123', 'amar3920', 'seller'),
(2, 'Chef Juna', 'Jl. Besar Ijen No.8A', 'Malang', 'juna@gmail.com', '08125235611', 'junaaa', 'juna123', 'seller'),
(3, 'Chef Dona', 'Jl. Soekarno-Hatta Kav.25', 'Malang', 'dona@gmail.com', '082678912534', 'donaaa', 'dona123', 'seller'),
(4, 'Ibu Sum', 'Jl. Bunga Coklat No.87', 'Malang', 'ibusum@gmail.com', '081678365466', 'sum123', 'sum123', 'seller'),
(5, 'Chef Cabelo', 'Jl. Pegangsaan Timur No.45', 'Malang', 'cabelo@gmail.com', '085678976543', 'cabelo123', 'cabelo123', 'seller'),
(6, 'Pak Yoyok', 'Jl. Danau Ranau No.1', 'Malang', 'yoyokcrew@gmail.com', '0854455566332', 'yoyok123', 'yoyok123', 'seller'),
(7, 'Chef Aris Budi', 'Jl. Permata Jingga No.1 A', 'Malang', 'arisbudi@gmail.com', '089765432234', 'aris123', 'aris123', 'seller'),
(8, 'Chef Lahar Ananta', 'Jl. Bandung Kav.9', 'Malang', 'laharananta12@gmail.com', '081770880990', 'laharwalker', 'lahar123', 'seller'),
(9, 'Ayat Firmansyahtullah', 'Jl. Sawojajar 2', 'Malang', 'cakayat@gmail.com', '085223456654', 'mrayat', 'ayat123', 'seller'),
(10, 'Syahrul Pangestu', 'Jl. Raya Anyer-Panarukan', 'Malang', 'syahrulunch@gmail.com', '085676545512', 'syahrul123', 'syahrul123', 'seller'),
(11, 'Muhammad Ilham Fajar', 'Jl. Candi 2A no.475', 'Malang', 'fajarmuhammadilham@gmail.com', '08125235611', 'muhilhamfajar', 'iosphone11', 'seller');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `deskripsi_toko` text NOT NULL,
  `foto_toko` varchar(150) NOT NULL,
  `alamat_toko` text NOT NULL,
  `status_toko` varchar(15) NOT NULL,
  `id_seller` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `deskripsi_toko`, `foto_toko`, `alamat_toko`, `status_toko`, `id_seller`) VALUES
(1, 'Pollo Mio', 'Toko Catering yang berdiri sejak 2017', '3aa21059495d7c670931ac35a3ba1ae1--restaurant-logo-design-smart-design.jpg', 'Jl. Besar Ijen No.8A', 'aktif', 2),
(2, 'Moustache Catering', 'Berdiri sejak tahun 2000', '800px_COLOURBOX20447902.jpg', 'Jl. Soekarno-Hatta Kav.25', 'aktif', 3),
(3, 'Mbok Sum', 'Pemilik resep ayam yang tiada tanding', 'a0696ba0faef67c004ab539afcd4fd1f.jpg', 'Jl. Bunga Coklat No.87', 'aktif', 4),
(4, 'Cabelo Arraz Restaurant', 'Tempat Catering untuk anak kos', 'Araaz-Restaurant-Banquet.png', 'Jl. Pegangsaan Timur No.45', 'aktif', 5),
(5, 'Yoyok Catering', 'Bermula dari usaha kecil di kantin sekolah dan sekarang telah memiliki catering dengan pelanggan loyal', 'restaurant-diner-vector-logo-dish-meal-food-chef-icon-happy-tray-his-hand-illustration-isolated-white-background-69995387.jpg', 'Jl. Danau Ranau No.1', 'aktif', 6),
(6, 'FoodBag Catering', 'Catering mengandalkan', 'foodbag-logo-1468262286.jpg', 'Jl. Permata Jingga No.1 A', 'aktif', 7),
(7, 'Catering Cak Lahar', 'Catering dengan menu super pedas', 'logo-italian-restaurant-cafe-spoons-forks-38311797.jpg', 'Jl. Bandung Kav.9', 'aktif', 8),
(8, 'Hmmz District Food', 'Catering dengan harga yang sangat terjangkau.', 'nhd_district_logo.jpg', 'Jl. Sawojajar 2', 'aktif', 9),
(9, 'Catering Syahrul', 'Catering yang menyajikan beragam masakan yang unik', 'sfbn.jpg', 'Jl. Anyer-Panarukan', 'aktif', 10),
(10, 'Catering Ilham', 'Toko Catering ini memiliki banyak varian menu dan harga nya terjangkau', 'logo.jpg', 'Jl. Candi 2A No.475', 'aktif', 11);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_seller` int(11) NOT NULL,
  `id_pesan` bigint(20) NOT NULL,
  `bayar` varchar(50) NOT NULL,
  `status_transaksi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_seller`, `id_pesan`, `bayar`, `status_transaksi`) VALUES
(1, 1, 2, 201802110116281, 'Bayar di Tempat', 'Lunas'),
(2, 2, 11, 201802110223582, 'Bank Transfer', 'Terkonfirmasi'),
(3, 2, 11, 201802110223582, 'Bank Transfer', 'Terkonfirmasi'),
(4, 2, 11, 201802110228072, 'Bank Transfer', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email`, `alamat`, `kota`, `no_telepon`, `username`, `password`, `role`) VALUES
(1, 'Helmi Zulfikar', 'helmi_suprayitno_25rpl@student.smktelkom-mlg.sch.id', 'Kunir, Wonodadi', 'Blitar', '082139593342', 'helmizu', 'helmizu', 'user'),
(2, 'amar', 'amarcheater87@gmail.com', 'kerinci raya', 'Tuban', '0852178621', 'amar', 'amar3920', 'user'),
(3, 'Muhammad Amar Khabiir Agevi', 'muhammad_agevi_25rpl@student.smktelkom-mlg.sch.id', 'Jl. Danau Ranau', 'Malang', '08123345678', 'amar', 'amar3920', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_toko_2` (`id_toko`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id_seller`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_seller` (`id_seller`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_seller` (`id_seller`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `id_seller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`),
  ADD CONSTRAINT `fk.id_menu` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `fk.id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk.id_toko` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`);

--
-- Constraints for table `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `fk.id_seller` FOREIGN KEY (`id_seller`) REFERENCES `seller` (`id_seller`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_seller`) REFERENCES `seller` (`id_seller`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
