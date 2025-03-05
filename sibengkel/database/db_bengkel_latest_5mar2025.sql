-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6782
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pakustad_sibengkel
DROP DATABASE IF EXISTS `pakustad_sibengkel`;
CREATE DATABASE IF NOT EXISTS `pakustad_sibengkel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `pakustad_sibengkel`;

-- Dumping structure for table pakustad_sibengkel.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_adm` int(11) NOT NULL AUTO_INCREMENT,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table pakustad_sibengkel.admin: ~1 rows (approximately)
INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
	(1, 'Administrator', '08962878534', 'admin', 'admin', 'user.jpg');

-- Dumping structure for table pakustad_sibengkel.barangjasa
DROP TABLE IF EXISTS `barangjasa`;
CREATE TABLE IF NOT EXISTS `barangjasa` (
  `id_brg` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `id_adm` int(11) NOT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table pakustad_sibengkel.barangjasa: ~3 rows (approximately)
INSERT INTO `barangjasa` (`id_brg`, `nama`, `jenis`, `stok`, `harga`, `keterangan`, `id_adm`) VALUES
	(1, 'Oli Yamalube 800cc', 'barang', '11', '35000', 'Oli Yamalube 800cc', 1),
	(4, 'Paket Service Ekonomis', 'jasa', '1', '30000', 'Ekonomis', 1),
	(5, 'Suspensi Matic', 'barang', '5', '175000', 'Suspensi matic', 1);

-- Dumping structure for table pakustad_sibengkel.karyawan
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(50) NOT NULL DEFAULT '0',
  `telp_karyawan` varchar(20) NOT NULL DEFAULT '0',
  `alamat_karyawan` varchar(150) NOT NULL DEFAULT '0',
  `user_karyawan` varchar(50) NOT NULL DEFAULT '0',
  `pass_karyawan` varchar(100) NOT NULL DEFAULT '0',
  `foto_karyawan` text NOT NULL,
  `id_adm` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pakustad_sibengkel.karyawan: ~1 rows (approximately)
INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `telp_karyawan`, `alamat_karyawan`, `user_karyawan`, `pass_karyawan`, `foto_karyawan`, `id_adm`) VALUES
	(1, 'kasir 1', '081320129088', 'Jl. Kenangan no 90', 'kasir_1', 'password', '02252025090336i.png', 1);

-- Dumping structure for table pakustad_sibengkel.kasir
DROP TABLE IF EXISTS `kasir`;
CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kasir` varchar(50) NOT NULL,
  `telp_kasir` varchar(20) NOT NULL,
  `user_kasir` varchar(50) NOT NULL,
  `pass_kasir` varchar(100) NOT NULL,
  `foto_kasir` text NOT NULL,
  `id_adm` int(11) NOT NULL,
  PRIMARY KEY (`id_kasir`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table pakustad_sibengkel.kasir: ~1 rows (approximately)
INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `telp_kasir`, `user_kasir`, `pass_kasir`, `foto_kasir`, `id_adm`) VALUES
	(1, 'Test Kasir', '0210181928', 'kasir', 'password', '06062019071454r.jpg', 1);

-- Dumping structure for table pakustad_sibengkel.kendaraan
DROP TABLE IF EXISTS `kendaraan`;
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `nopol` varchar(50) NOT NULL DEFAULT '0',
  `merk` varchar(50) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `transmisi` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `ktp_pelanggan` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_kendaraan`) USING BTREE,
  UNIQUE KEY `nopol` (`nopol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pakustad_sibengkel.kendaraan: ~2 rows (approximately)
INSERT INTO `kendaraan` (`id_kendaraan`, `nopol`, `merk`, `tipe`, `transmisi`, `kapasitas`, `tahun`, `ktp_pelanggan`) VALUES
	(1, 'H2398TR', 'Honda', 'Vario', 'Matic', 125, 2019, '3374061507960009'),
	(3, 'H9023YU', 'Honda', 'Beat', 'Matic', 110, 2019, '3374061806920007');

-- Dumping structure for table pakustad_sibengkel.konsumen
DROP TABLE IF EXISTS `konsumen`;
CREATE TABLE IF NOT EXISTS `konsumen` (
  `id_kon` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kon` varchar(50) NOT NULL,
  `telp_kon` varchar(20) NOT NULL,
  `alamat_kon` text NOT NULL,
  PRIMARY KEY (`id_kon`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table pakustad_sibengkel.konsumen: ~2 rows (approximately)
INSERT INTO `konsumen` (`id_kon`, `nama_kon`, `telp_kon`, `alamat_kon`) VALUES
	(0, 'Umum', '0', '-'),
	(3, 'Test Konsumen', '012391839', 'Bekasi');

-- Dumping structure for table pakustad_sibengkel.pelanggan
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `alamat` varchar(150) NOT NULL DEFAULT '0',
  `hp` varchar(12) NOT NULL DEFAULT '0',
  `ktp` varchar(16) DEFAULT '0',
  `user_pelanggan` varchar(50) NOT NULL DEFAULT '0',
  `pass_pelanggan` varchar(100) NOT NULL DEFAULT '0',
  `foto_pelanggan` text NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table pakustad_sibengkel.pelanggan: ~2 rows (approximately)
INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `hp`, `ktp`, `user_pelanggan`, `pass_pelanggan`, `foto_pelanggan`) VALUES
	(1, 'Gita Maria', 'Jl Bulan Purnama no 9', '081325334455', '3374061507960009', 'gita', '123456', 'manglid.jpg'),
	(2, 'nayaka', 'Jl rambutan no 7', '081324782345', '3374061806920007', '0', '0', '');

-- Dumping structure for table pakustad_sibengkel.supplier
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_spl` int(11) NOT NULL AUTO_INCREMENT,
  `nama_spl` varchar(50) NOT NULL,
  `telp_spl` varchar(20) NOT NULL,
  `alamat_spl` text NOT NULL,
  PRIMARY KEY (`id_spl`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table pakustad_sibengkel.supplier: ~2 rows (approximately)
INSERT INTO `supplier` (`id_spl`, `nama_spl`, `telp_spl`, `alamat_spl`) VALUES
	(2, 'Test Supplier', '08129828919', 'Bekasi'),
	(3, 'Supplier Oli', '012123910', 'Bekasi\r\n');

-- Dumping structure for table pakustad_sibengkel.tmp_trx
DROP TABLE IF EXISTS `tmp_trx`;
CREATE TABLE IF NOT EXISTS `tmp_trx` (
  `id_tmp` int(11) NOT NULL AUTO_INCREMENT,
  `id_trx` varchar(20) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table pakustad_sibengkel.tmp_trx: ~7 rows (approximately)
INSERT INTO `tmp_trx` (`id_tmp`, `id_trx`, `id_brg`, `jml`, `id_kasir`, `status`) VALUES
	(2, '02062019094643', 4, 1, 1, 'Done'),
	(4, '02062019094643', 1, 2, 1, 'Done'),
	(7, '02062019120923', 4, 1, 1, 'Done'),
	(8, '02062019121127', 4, 1, 1, 'Done'),
	(10, '06062019094346', 1, 1, 1, 'Done'),
	(11, '06062019100803', 4, 1, 1, 'Done'),
	(12, '25022025114054', 1, 1, 1, 'Done');

-- Dumping structure for table pakustad_sibengkel.trx
DROP TABLE IF EXISTS `trx`;
CREATE TABLE IF NOT EXISTS `trx` (
  `id_trx` varchar(20) NOT NULL,
  `id_kon` int(11) NOT NULL,
  `tgl_trx` date NOT NULL,
  `total` varchar(20) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  PRIMARY KEY (`id_trx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table pakustad_sibengkel.trx: ~6 rows (approximately)
INSERT INTO `trx` (`id_trx`, `id_kon`, `tgl_trx`, `total`, `id_kasir`) VALUES
	('02062019094643', 0, '2019-06-02', '100000', 1),
	('02062019120923', 3, '2019-06-02', '30000', 1),
	('02062019121127', 0, '2019-06-02', '30000', 1),
	('06062019094346', 0, '2019-06-06', '35000', 1),
	('06062019100803', 3, '2019-06-06', '30000', 1),
	('25022025114054', 1, '2025-02-25', '35000', 1);

-- Dumping structure for table pakustad_sibengkel.trxbarang
DROP TABLE IF EXISTS `trxbarang`;
CREATE TABLE IF NOT EXISTS `trxbarang` (
  `id_trxbrg` varchar(20) NOT NULL,
  `tgl_trxbrg` date NOT NULL,
  `id_brg` int(11) NOT NULL,
  `id_spl` int(11) NOT NULL,
  `jml_brg` int(11) NOT NULL,
  `ket_trxbrg` text NOT NULL,
  PRIMARY KEY (`id_trxbrg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table pakustad_sibengkel.trxbarang: ~3 rows (approximately)
INSERT INTO `trxbarang` (`id_trxbrg`, `tgl_trxbrg`, `id_brg`, `id_spl`, `jml_brg`, `ket_trxbrg`) VALUES
	('00365602062019', '2019-06-02', 1, 3, 10, 'Oli'),
	('04184902062019', '2019-06-02', 5, 2, 5, 'suspensi'),
	('04190502062019', '2019-06-02', 1, 3, 5, 'masuk lagi');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
