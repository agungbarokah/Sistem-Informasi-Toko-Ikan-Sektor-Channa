-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2022 at 12:01 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokoikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(255) DEFAULT NULL,
  `admin_username` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`) VALUES
(1, 'Faqih Amirudin', 'admin', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `kategori_barang` varchar(50) DEFAULT NULL,
  `stok_barang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `nama_barang`, `kategori_barang`, `stok_barang`) VALUES
(9, 'Serokan Ikan ', 'Aksesoris', '22'),
(10, 'Vitamin Ikan', 'Pakan Ikan', '56');

-- --------------------------------------------------------

--
-- Table structure for table `ikan`
--

CREATE TABLE `ikan` (
  `ikan_id` int(11) NOT NULL,
  `nama_ikan` varchar(50) DEFAULT NULL,
  `jenis_ikan` varchar(50) DEFAULT NULL,
  `ukuran_ikan` varchar(50) DEFAULT NULL,
  `stok_ikan` int(11) DEFAULT NULL,
  `harga_ikan` int(11) DEFAULT NULL,
  `gambar` varchar(200) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ikan`
--

INSERT INTO `ikan` (`ikan_id`, `nama_ikan`, `jenis_ikan`, `ukuran_ikan`, `stok_ikan`, `harga_ikan`, `gambar`, `keterangan`) VALUES
(13, 'Stewarti', 'Channa -Stewarti', 'Sedang', 16, 300000, 'Stewarti1.jpeg', NULL),
(14, 'Auranti', 'Channa -Auranti', 'Besar', 10, 1000000, 'Auranti.jpeg', NULL),
(15, 'Yellow Sentarum', 'Channa -Yellow Sentarum', 'Besar', 34, 350000, 'Yellow_Sentarum.jpeg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `pembeli_id` int(11) NOT NULL,
  `pembeli_nama` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `pembeli_alamat` text DEFAULT NULL,
  `pembeli_hp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`pembeli_id`, `pembeli_nama`, `jenis_kelamin`, `pembeli_alamat`, `pembeli_hp`) VALUES
(17, 'Faqih Amirudin', 'Laki - Laki', 'Jl Masjid Miftahul Jannah ', '085778543194'),
(18, 'Galan Abdillah Zahran', 'Laki - Laki', 'Komplek Pelni', '081808345335'),
(20, 'Andi Daffa Liefalza', 'Laki - Laki', 'Jl Raya Rawa Lumbu ', '081317767261'),
(23, 'Agung Barokah ', 'Laki - Laki', 'Jl. Danita', '089506939968');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_admin` int(11) NOT NULL DEFAULT 0,
  `transaksi_tanggal` date DEFAULT NULL,
  `transaksi_pembeli` varchar(50) DEFAULT NULL,
  `transaksi_ikan` varchar(50) DEFAULT NULL,
  `transaksi_jenisikan` varchar(50) DEFAULT NULL,
  `transaksi_jumlah` varchar(50) DEFAULT NULL,
  `transaksi_hargaikan` int(11) DEFAULT NULL,
  `transaksi_total` int(11) DEFAULT NULL,
  `transaksi_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_admin`, `transaksi_tanggal`, `transaksi_pembeli`, `transaksi_ikan`, `transaksi_jenisikan`, `transaksi_jumlah`, `transaksi_hargaikan`, `transaksi_total`, `transaksi_status`) VALUES
(33, 1, '2022-06-27', '18', '13', '12', '3', 500000, 1500000, '2'),
(34, 1, '2022-06-28', '23', '13', 'Guppy', '10', 100000, 1000000, '1'),
(35, 1, '2022-06-28', '23', '13', '13', '10', 1000, 10000, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`ikan_id`) USING BTREE;

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`pembeli_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ikan`
--
ALTER TABLE `ikan`
  MODIFY `ikan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `pembeli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
