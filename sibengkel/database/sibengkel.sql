-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for sibengkel
DROP DATABASE IF EXISTS `sibengkel`;
CREATE DATABASE IF NOT EXISTS `sibengkel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sibengkel`;

-- Dumping structure for table sibengkel.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_adm` int NOT NULL AUTO_INCREMENT,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL,
  PRIMARY KEY (`id_adm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sibengkel.admin: ~0 rows (approximately)
INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
	(1, 'Administrator', '08962878534', 'admin', 'admin', 'user.jpg');

-- Dumping structure for table sibengkel.barangjasa
DROP TABLE IF EXISTS `barangjasa`;
CREATE TABLE IF NOT EXISTS `barangjasa` (
  `id_brg` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `stok` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `id_adm` int NOT NULL,
  PRIMARY KEY (`id_brg`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table sibengkel.barangjasa: ~3 rows (approximately)
INSERT INTO `barangjasa` (`id_brg`, `nama`, `jenis`, `stok`, `harga`, `keterangan`, `id_adm`) VALUES
	(1, 'Oli Yamalube 800cc', 'barang', '11', '35000', 'Oli Yamalube 800cc', 1),
	(4, 'Paket Service Ekonomis', 'jasa', '1', '30000', 'Ekonomis', 1),
	(5, 'Suspensi Matic', 'barang', '5', '175000', 'Suspensi matic', 1);

-- Dumping structure for table sibengkel.jasa_servis
DROP TABLE IF EXISTS `jasa_servis`;
CREATE TABLE IF NOT EXISTS `jasa_servis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `harga` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sibengkel.jasa_servis: ~6 rows (approximately)
INSERT INTO `jasa_servis` (`id`, `jenis`, `harga`) VALUES
	(7, 'asd22', 123),
	(8, 'asd2', 213123);

-- Dumping structure for table sibengkel.karyawan
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` int NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `telp_karyawan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `alamat_karyawan` varchar(150) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `user_karyawan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `pass_karyawan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `foto_karyawan` text COLLATE utf8mb4_general_ci NOT NULL,
  `id_adm` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sibengkel.karyawan: ~0 rows (approximately)
INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `telp_karyawan`, `alamat_karyawan`, `user_karyawan`, `pass_karyawan`, `foto_karyawan`, `id_adm`) VALUES
	(1, 'kasir 1', '081320129088', 'Jl. Kenangan no 90', 'kasir_1', 'password', '02252025090336i.png', 1),
	(2, 'asds', '09999999', 'asdadsad', 'tet', 'apala', '03062025074521b.jpg', 1);

-- Dumping structure for table sibengkel.kasir
DROP TABLE IF EXISTS `kasir`;
CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int NOT NULL AUTO_INCREMENT,
  `nama_kasir` varchar(50) NOT NULL,
  `telp_kasir` varchar(20) NOT NULL,
  `user_kasir` varchar(50) NOT NULL,
  `pass_kasir` varchar(100) NOT NULL,
  `foto_kasir` text NOT NULL,
  `id_adm` int NOT NULL,
  PRIMARY KEY (`id_kasir`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sibengkel.kasir: ~0 rows (approximately)
INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `telp_kasir`, `user_kasir`, `pass_kasir`, `foto_kasir`, `id_adm`) VALUES
	(1, 'Test Kasir', '0210181928', 'kasir', 'password', '06062019071454r.jpg', 1);

-- Dumping structure for table sibengkel.kendaraan
DROP TABLE IF EXISTS `kendaraan`;
CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_kendaraan` int NOT NULL AUTO_INCREMENT,
  `nopol` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `merk` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tipe` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `transmisi` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `tahun` int NOT NULL,
  `ktp_pelanggan` varchar(16) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_pelanggan` int DEFAULT NULL,
  PRIMARY KEY (`id_kendaraan`) USING BTREE,
  UNIQUE KEY `nopol` (`nopol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sibengkel.kendaraan: ~2 rows (approximately)
INSERT INTO `kendaraan` (`id_kendaraan`, `nopol`, `merk`, `tipe`, `transmisi`, `kapasitas`, `tahun`, `ktp_pelanggan`, `id_pelanggan`) VALUES
	(1, 'H2398TR', 'Honda', 'Vario', 'Matic', 125, 2019, '3374061507960009', 1),
	(3, 'H9023YU', 'Honda', 'Beat', 'Matic', 110, 2019, '3374061806920007', 2),
	(4, 'DSA123', 'asd', 'asd', 'asd', 123, 123, '123', 4),
	(5, 'DSA321ASD', 'Yamaha', 'X-Max', 'Matic', 100, 2026, '123123121223', 5);

-- Dumping structure for table sibengkel.konsumen
DROP TABLE IF EXISTS `konsumen`;
CREATE TABLE IF NOT EXISTS `konsumen` (
  `id_kon` int NOT NULL AUTO_INCREMENT,
  `nama_kon` varchar(50) NOT NULL,
  `telp_kon` varchar(20) NOT NULL,
  `alamat_kon` text NOT NULL,
  PRIMARY KEY (`id_kon`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sibengkel.konsumen: ~2 rows (approximately)
INSERT INTO `konsumen` (`id_kon`, `nama_kon`, `telp_kon`, `alamat_kon`) VALUES
	(0, 'Umum', '0', '-'),
	(3, 'Test Konsumen', '012391839', 'Bekasi');

-- Dumping structure for table sibengkel.pelanggan
DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `alamat` varchar(150) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `hp` varchar(12) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `ktp` varchar(16) COLLATE utf8mb4_general_ci DEFAULT '0',
  `user_pelanggan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `pass_pelanggan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `foto_pelanggan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sibengkel.pelanggan: ~2 rows (approximately)
INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `hp`, `ktp`, `user_pelanggan`, `pass_pelanggan`, `foto_pelanggan`) VALUES
	(1, 'Gita Maria', 'Jl Bulan Purnama no 9', '081325334455', '3374061507960009', 'gita', '123456', 'manglid.jpg'),
	(2, 'nayaka', 'Jl rambutan no 7', '081324782345', '3374061806920007', '0', '0', ''),
	(4, 'asdasd', 'asdasd', '123123', '0', 'asd', 'asdasd', NULL),
	(5, 'dsa', 'dsa', '321', '0', 'dsa', 'dsadsa', NULL),
	(6, 'Ananda', 'Jl Gergaji no 9', '089145632588', '0', 'ananda', '654321', NULL),
	(7, 'vina', 'Jl Rambutan no 3', '085641098822', '-', '0', '0', NULL),
	(8, 'Loli', 'Jl. Badak no 9', '081225478899', '1234567890', 'loli', '123456', ''),
	(9, 'sss', 'sss', 'sss', '-', 'aaaa', '123456', ''),
	(10, '1asd', 'alamat', '1231231', '123123', '1asd', '1asd', NULL);

-- Dumping structure for table sibengkel.reservations
DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `keluhan` text COLLATE utf8mb4_general_ci,
  `penanganan` text COLLATE utf8mb4_general_ci,
  `catatan` text COLLATE utf8mb4_general_ci,
  `id_karyawan` int DEFAULT NULL,
  `nopol` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_jasa_servis` int DEFAULT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `status` int NOT NULL,
  `kode_sparepart` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_trx` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_reservation`) USING BTREE,
  UNIQUE KEY `kode` (`id_trx`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sibengkel.reservations: ~0 rows (approximately)
INSERT INTO `reservations` (`id_reservation`, `tanggal`, `keluhan`, `penanganan`, `catatan`, `id_karyawan`, `nopol`, `id_jasa_servis`, `id_pelanggan`, `status`, `kode_sparepart`, `id_trx`) VALUES
	(1, '2025-03-07', 'asd', 'asd', 'asd', 1, '', 8, 6, 0, 'asd', '2fc787725c');

-- Dumping structure for table sibengkel.sparepart
DROP TABLE IF EXISTS `sparepart`;
CREATE TABLE IF NOT EXISTS `sparepart` (
  `kode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` float NOT NULL DEFAULT '0',
  `harga` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode`),
  UNIQUE KEY `code` (`kode`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table sibengkel.sparepart: ~0 rows (approximately)
INSERT INTO `sparepart` (`kode`, `nama`, `jumlah`, `harga`) VALUES
	('asd', 'asd123', 123123, 123);

-- Dumping structure for table sibengkel.supplier
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id_spl` int NOT NULL AUTO_INCREMENT,
  `nama_spl` varchar(50) NOT NULL,
  `telp_spl` varchar(20) NOT NULL,
  `alamat_spl` text NOT NULL,
  PRIMARY KEY (`id_spl`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table sibengkel.supplier: ~2 rows (approximately)
INSERT INTO `supplier` (`id_spl`, `nama_spl`, `telp_spl`, `alamat_spl`) VALUES
	(2, 'Test Supplier', '08129828919', 'Bekasi'),
	(3, 'Supplier Oli', '012123910', 'Bekasi\r\n');

-- Dumping structure for table sibengkel.tmp_trx
DROP TABLE IF EXISTS `tmp_trx`;
CREATE TABLE IF NOT EXISTS `tmp_trx` (
  `id_tmp` int NOT NULL AUTO_INCREMENT,
  `id_trx` varchar(20) NOT NULL,
  `id_brg` int NOT NULL,
  `jml` int NOT NULL,
  `id_kasir` int NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tmp`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table sibengkel.tmp_trx: ~7 rows (approximately)
INSERT INTO `tmp_trx` (`id_tmp`, `id_trx`, `id_brg`, `jml`, `id_kasir`, `status`) VALUES
	(2, '02062019094643', 4, 1, 1, 'Done'),
	(4, '02062019094643', 1, 2, 1, 'Done'),
	(7, '02062019120923', 4, 1, 1, 'Done'),
	(8, '02062019121127', 4, 1, 1, 'Done'),
	(10, '06062019094346', 1, 1, 1, 'Done'),
	(11, '06062019100803', 4, 1, 1, 'Done'),
	(12, '25022025114054', 1, 1, 1, 'Done');

-- Dumping structure for table sibengkel.trx
DROP TABLE IF EXISTS `trx`;
CREATE TABLE IF NOT EXISTS `trx` (
  `id_trx` varchar(20) NOT NULL,
  `id_kon` int NOT NULL,
  `tgl_trx` date NOT NULL,
  `total` varchar(20) NOT NULL,
  `id_kasir` int NOT NULL,
  PRIMARY KEY (`id_trx`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sibengkel.trx: ~6 rows (approximately)
INSERT INTO `trx` (`id_trx`, `id_kon`, `tgl_trx`, `total`, `id_kasir`) VALUES
	('02062019094643', 0, '2019-06-02', '100000', 1),
	('02062019120923', 3, '2019-06-02', '30000', 1),
	('02062019121127', 0, '2019-06-02', '30000', 1),
	('06062019094346', 0, '2019-06-06', '35000', 1),
	('06062019100803', 3, '2019-06-06', '30000', 1),
	('25022025114054', 1, '2025-02-25', '35000', 1);

-- Dumping structure for table sibengkel.trxbarang
DROP TABLE IF EXISTS `trxbarang`;
CREATE TABLE IF NOT EXISTS `trxbarang` (
  `id_trxbrg` varchar(20) NOT NULL,
  `tgl_trxbrg` date NOT NULL,
  `id_brg` int NOT NULL,
  `id_spl` int NOT NULL,
  `jml_brg` int NOT NULL,
  `ket_trxbrg` text NOT NULL,
  PRIMARY KEY (`id_trxbrg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table sibengkel.trxbarang: ~3 rows (approximately)
INSERT INTO `trxbarang` (`id_trxbrg`, `tgl_trxbrg`, `id_brg`, `id_spl`, `jml_brg`, `ket_trxbrg`) VALUES
	('00365602062019', '2019-06-02', 1, 3, 10, 'Oli'),
	('04184902062019', '2019-06-02', 5, 2, 5, 'suspensi'),
	('04190502062019', '2019-06-02', 1, 3, 5, 'masuk lagi');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
