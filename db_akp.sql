-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.8-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_akp
DROP DATABASE IF EXISTS `db_akp`;
CREATE DATABASE IF NOT EXISTS `db_akp` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_akp`;

-- Dumping structure for table db_akp.dosen
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE IF NOT EXISTS `dosen` (
  `nidn` char(20) NOT NULL,
  `nama_dosen` char(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `alamat` char(100) DEFAULT NULL,
  PRIMARY KEY (`nidn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_akp.jadwal
DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE IF NOT EXISTS `jadwal` (
  `kd_jadwal` char(20) NOT NULL,
  `kd_matkul` char(20) DEFAULT NULL,
  `nidn` char(20) DEFAULT NULL,
  `hari` char(10) DEFAULT NULL,
  `ruangan` char(50) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `semester` char(10) DEFAULT NULL,
  `tahun_akademik` char(10) DEFAULT NULL,
  PRIMARY KEY (`kd_jadwal`),
  KEY `kd_matkul` (`kd_matkul`),
  KEY `nidn` (`nidn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_akp.kps_detail
DROP TABLE IF EXISTS `kps_detail`;
CREATE TABLE IF NOT EXISTS `kps_detail` (
  `no_kps` char(20) DEFAULT NULL,
  `kd_jadwal` char(20) DEFAULT NULL,
  `kd_matkul` char(20) DEFAULT NULL,
  KEY `no_kps` (`no_kps`),
  KEY `kd_jadwal` (`kd_jadwal`),
  KEY `kd_matkul` (`kd_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_akp.kps_header
DROP TABLE IF EXISTS `kps_header`;
CREATE TABLE IF NOT EXISTS `kps_header` (
  `no_kps` char(20) NOT NULL,
  `nim` char(20) DEFAULT NULL,
  `tahun_akademik` char(10) DEFAULT NULL,
  `semester` char(10) DEFAULT NULL,
  PRIMARY KEY (`no_kps`),
  KEY `nim` (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_akp.mahasiswa
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `nim` char(20) NOT NULL,
  `nama_mahasiswa` char(50) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `angkatan_tahun` char(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `semester` char(5) DEFAULT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_akp.matkul
DROP TABLE IF EXISTS `matkul`;
CREATE TABLE IF NOT EXISTS `matkul` (
  `kd_matkul` char(20) NOT NULL,
  `matakuliah` char(30) DEFAULT NULL,
  `sks` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_matkul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_akp.pembayaran
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `kode_pembayaran` char(20) NOT NULL,
  `nim` char(20) DEFAULT NULL,
  `no_kps` char(20) DEFAULT NULL,
  `semester` char(10) DEFAULT NULL,
  `tahun_akademik` char(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `sumbangan_pendidikan` int(11) DEFAULT NULL,
  `biaya_kuliah_semester` int(11) DEFAULT NULL,
  `biaya_seragam_perlengkapan` int(11) DEFAULT NULL,
  `biaya_pengenalan_akademik` int(11) DEFAULT NULL,
  `biaya_capping_day` int(11) DEFAULT NULL,
  `biaya_kkn` int(11) DEFAULT NULL,
  `biaya_ujian_akhir` int(11) DEFAULT NULL,
  `biaya_wisuda` int(11) DEFAULT NULL,
  `biaya_IKM` int(11) DEFAULT NULL,
  `biaya_formulir` int(11) DEFAULT NULL,
  `biaya_test_kesehatan` int(11) DEFAULT NULL,
  `biaya_lain` int(11) DEFAULT NULL,
  `jumlah_disetor` int(11) DEFAULT NULL,
  PRIMARY KEY (`kode_pembayaran`),
  KEY `nim` (`nim`),
  KEY `no_kps` (`no_kps`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table db_akp.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` char(20) NOT NULL,
  `userAlias` char(20) DEFAULT NULL,
  `userType` enum('Mahasiswa','Akademik','Keuangan','PA','Admin') DEFAULT NULL,
  `username` char(50) DEFAULT NULL,
  `password` char(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
