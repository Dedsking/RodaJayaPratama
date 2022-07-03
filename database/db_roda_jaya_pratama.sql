-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2022 at 10:04 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_roda_jaya_pratama`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_suplier` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `p_keuntungan` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `deskripsi` mediumtext DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `berat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `id_kategori`, `id_suplier`, `harga`, `p_keuntungan`, `harga_jual`, `deskripsi`, `gambar`, `stok`, `berat`) VALUES
(1, 'Madara', 3, 1, 200000, 20, 240000, 'deskripsi', 'madara.jpeg', 13, 500),
(2, 'Twins', 2, 1, 1000000, 20, 1200000, 'deskripsi twins', 'twins.jpg', 17, 1000),
(3, 'Corsa 23223', 1, 5, 100000, 20, 120000, 'Ban awet sekali', 'Final-Fantasy-Wallpapers-2.jpg', 8, 800),
(6, 'Tv Samsung', 1, 5, 200000, 20, 240000, 'dsa', 'Dragon_Nest_600_1140300.jpg', 10, 400),
(8, 'Corsa 23223', 3, 5, 200000, 20, 240000, 'ffassdasd', 'sleeping_forest.jpeg', 20, 700),
(9, 'Philiph 2001', 4, 1, 100000, 20, 120000, 'dddafs', 'ikki.jpeg', 14, 1000),
(10, 'Yuasa YTX5L-BS', 3, 6, 237000, 20, 284400, 'Yuasa YTX5L-BS, memiliki tegangan 4 Volt dan tegangan 12 V.', 'YTX5L-BS-1.jpg', 24, 2000),
(11, 'Yuasa YTZ5-S DRY', 3, 6, 169000, 20, 202800, 'Aki Yuasa YTZ5-S DRY, memiliki tegangan 3,5 Volt, dan kapasitas 12 V.', 'YTZ5-S_DRY-1.jpg', 21, 1500),
(12, 'GS Astra 12N5-3B', 3, 6, 127000, 20, 152400, 'Aki GS Astra 12N5-3B, memiliki tagangan 12 V, kapasitas 5Ah.', '12N5-3B-1.jpg', 15, 2600);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `id_barang`, `keterangan`, `foto`) VALUES
(1, 3, 'gambar 1', 'agito.jpeg'),
(2, 3, 'gambar 2', 'ikki.jpeg'),
(3, 3, 'gambar 3', 'simca.jpeg'),
(4, 3, 'gambar 4', 'ringo.jpeg'),
(5, 3, 'gambar 5', 'wow.jpeg'),
(6, 6, 'gambar 3', 'Dragon_Nest_600_11402963.jpg'),
(8, 2, 'gambar 1', 'Dragon_Nest_600_1140314.jpg'),
(9, 2, 'gambar 2', 'Pixiv_Fantasia__Sword_Regalia_600_1146061.jpg'),
(15, 6, 'gambar 1', 'Dragon_Nest_600_1140295.jpg'),
(17, 10, 'gambar 1', 'YTX5L-BS-1.jpg'),
(18, 10, 'gambar 2', 'YTX5L-BS-3.jpg'),
(19, 11, 'gambar 1', 'YTZ5-S_DRY-2.jpeg'),
(20, 12, 'gambar 1', '12N5-3B-2.jpeg'),
(21, 15, 'gambar1', 'tori.jpg'),
(22, 15, 'gambar 2', '2334886.jpg'),
(26, 15, 'gambar 3', '4811021.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Ban'),
(2, 'Aksesoris'),
(3, 'Aki'),
(4, 'Lampu'),
(7, 'Busi'),
(8, 'Oli'),
(9, 'Kampas Rem');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `no_tlp` varchar(16) DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email`, `password`, `alamat`, `no_tlp`, `foto`) VALUES
(1, 'Dedy', 'dedyr@gmail.com', '1234', 'jl anggur II', '09878876654', 'foto.jpg'),
(2, 'ica', 'ica@gmail.com', 'ica', NULL, NULL, 'ringo.JPEG'),
(3, 'agung', 'agung@gmail.com', 'agung', 'jalan senja no 89', '098788766553', '12N5-3B-1.jpg'),
(4, 'unpam', 'unpam@gmail.com', '1234', 'jl anggur', '09878876655', 'logo-unpam-500x500-1.png'),
(5, 'Syifa', 'syifa@gmail.com', '1234', NULL, NULL, NULL),
(6, 'DedyRuspandi', 'dedyruspandi@gmail.com', 'karangtula', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rinci_transaksi`
--

CREATE TABLE `rinci_transaksi` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(30) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rinci_transaksi`
--

INSERT INTO `rinci_transaksi` (`id_rinci`, `no_order`, `id_barang`, `qty`) VALUES
(1, '20210806BGS3D8PR', 12, 1),
(2, '20210806BGS3D8PR', 9, 1),
(5, 'unpam511', 10, 2),
(7, 'unpam511', 12, 1),
(8, 'unpam511', 9, 4),
(11, '20210807WX7U9I4J', 9, 4),
(12, '20210807WX7U9I4J', 10, 1),
(13, '20210807WX7U9I4J', 8, 1),
(19, '20210807OKP47BUS', 9, 1),
(20, '20210807OKP47BUS', 12, 2),
(23, '20210807OKP47BUS', 2, 2),
(24, '202108071VLIOWBX', 6, 1),
(25, '202108071VLIOWBX', 8, 1),
(26, '202108071VLIOWBX', 1, 1),
(39, '20210904CPQFYX8A', 12, 2),
(41, '20210906PUQRKIM5', 12, 1),
(45, '20220421QVFGL7M6', 12, 2),
(46, '20220421QVFGL7M6', 9, 2);

--
-- Triggers `rinci_transaksi`
--
DELIMITER $$
CREATE TRIGGER `Stock_in` AFTER INSERT ON `rinci_transaksi` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok-NEW.qty
WHERE id_barang=NEW.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stock_out` AFTER DELETE ON `rinci_transaksi` FOR EACH ROW BEGIN
UPDATE barang SET stok=stok + old.qty
WHERE id_barang=old.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(1) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `lokasi` int(11) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama_toko`, `lokasi`, `alamat_toko`, `no_tlp`) VALUES
(1, 'Bengkel Roda Jaya Pratama', 457, 'Jl.Angasana No 87', '089312415312');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(16) DEFAULT NULL,
  `alamat_suplier` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `nama_suplier`, `alamat_suplier`) VALUES
(1, 'PT. Agung', 'jl Kangen raya no 10'),
(5, 'PT.Cinta Sejati', 'Jl Kangen'),
(6, 'PT Yuasa', 'Jl Suci'),
(7, 'PT GS Astra', 'jl kenanga');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `tgl_order` datetime DEFAULT NULL,
  `nama_penerima` varchar(25) DEFAULT NULL,
  `hp_penerima` varchar(15) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(8) DEFAULT NULL,
  `expedisi` varchar(255) DEFAULT NULL,
  `paket` varchar(255) DEFAULT NULL,
  `estimasi` varchar(255) DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `berat` int(11) DEFAULT NULL,
  `grand_total` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_bayar` int(1) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(1) DEFAULT NULL,
  `no_resi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `no_order`, `tgl_daftar`, `tgl_order`, `nama_penerima`, `hp_penerima`, `provinsi`, `kota`, `alamat`, `kode_pos`, `expedisi`, `paket`, `estimasi`, `ongkir`, `berat`, `grand_total`, `total_bayar`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `no_resi`) VALUES
(29, 1, '20210806BGS3D8PR', NULL, '2021-08-06 00:00:00', 'Dedy', '09878876654', 'Banten', 'Tangerang Selatan', 'jl anggur II', '15310', 'jne', 'CTCYES', '1-1 hari', 126000, 7200, 544800, 670800, 2, 'stuk18.jpg', 'Dedy Ruspandi', 'BCA', '094455', 3, 'TNG099834423'),
(30, 4, 'unpam511', '2021-08-06', '2021-08-08 00:00:00', 'unpam', '089', NULL, NULL, 'jl kenangan', NULL, NULL, NULL, NULL, NULL, NULL, 1201200, 1251200, 2, NULL, NULL, NULL, NULL, 6, NULL),
(31, 4, '20210807WX7U9I4J', NULL, '2021-08-07 00:00:00', 'unpam', '09878876655', 'DI Yogyakarta', 'Yogyakarta', 'jl anggur', '301241', 'jne', 'OKE', '2-3 hari', 112000, 6700, 1004400, 1116400, 2, 'stuk19.jpg', 'Unpam', 'BCA', '4537521', 3, 'TGR9831423'),
(32, 4, '202108071VLIOWBX', '2021-08-07', '2021-08-20 00:00:00', 'Panji Sekarep', '089655938122', NULL, NULL, 'Jl Kecoa Hitam No.60', NULL, NULL, NULL, NULL, NULL, NULL, 1980000, 2030000, 2, NULL, NULL, NULL, NULL, 6, NULL),
(33, 4, '20210807OKP47BUS', '2021-08-07', '2021-08-09 00:00:00', 'dsadsad', '544', NULL, NULL, 'dsad', NULL, NULL, NULL, NULL, NULL, NULL, 2824800, 2874800, 2, NULL, NULL, NULL, NULL, 6, NULL),
(45, 4, '20210904CPQFYX8A', NULL, '2021-09-04 15:55:00', 'unpam', '09878876655', 'Banten', 'Tangerang Selatan', 'jl anggur', '15310', 'jne', 'CTC', '1-2 hari', 45000, 5200, 304800, 349800, 2, 'stuk110.jpg', 'Unpam', 'BCA', '4537521', 3, 'TGR9831423'),
(47, 4, '20210906PUQRKIM5', NULL, '2021-09-06 13:35:00', 'unpam', '09878876655', 'Jawa Tengah', 'Kudus', 'jl anggur', '301241', 'jne', 'OKE', '3-6 hari', 57000, 2600, 152400, 209400, 2, 'stuk111.jpg', 'Unpam', 'BCA', '4537521', 3, 'TGR983142366'),
(50, 1, '20220421QVFGL7M6', NULL, '2022-04-21 11:47:00', 'Dedy', '09878876654', 'DKI Jakarta', 'Jakarta Timur', 'jl anggur II', '55555', 'jne', 'OKE', '2-3 hari', 56000, 7200, 544800, 600800, 2, 'KTP.jpeg', 'asdsad', 'asdasd', '41213212', 3, '52343242');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `hapus_rinci` AFTER DELETE ON `transaksi` FOR EACH ROW DELETE from rinci_transaksi where old.no_order = rinci_transaksi.no_order
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `no_tlp` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `no_tlp`, `alamat`, `username`, `password`, `level_user`) VALUES
(1, 'Dedy.R', '089312415312', 'jl.kambing', 'dedy', 'ruspandi', 1),
(2, 'ica', '087256672357', 'jl. sutra', 'ica', 'ica', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rinci_transaksi`
--
ALTER TABLE `rinci_transaksi`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
