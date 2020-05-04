-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.3.13-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk olah_zakat
CREATE DATABASE IF NOT EXISTS `olah_zakat` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `olah_zakat`;

-- membuang struktur untuk table olah_zakat.ref_arah_infaqsedeqah
CREATE TABLE IF NOT EXISTS `ref_arah_infaqsedeqah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_penerima` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='tabel ini untuk menjadi referensi bagi pengurus jika ada jemaah setor infq/sedekah mau di arafhkan ke mana masjid, yatim piatu atau fakir miskin';

-- Membuang data untuk tabel olah_zakat.ref_arah_infaqsedeqah: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `ref_arah_infaqsedeqah` DISABLE KEYS */;
INSERT INTO `ref_arah_infaqsedeqah` (`id`, `nama_penerima`) VALUES
  (1, 'MASJID'),
  (2, 'FAKIR/MISKIN'),
  (3, 'YATIM PIATU');
/*!40000 ALTER TABLE `ref_arah_infaqsedeqah` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.ref_jabatan
CREATE TABLE IF NOT EXISTS `ref_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.ref_jabatan: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `ref_jabatan` DISABLE KEYS */;
INSERT INTO `ref_jabatan` (`id`, `nama_jabatan`) VALUES
  (1, 'KETUA PANITIA'),
  (2, 'SEKERTARIS'),
  (3, 'PANITIA PENERIMA ZAKAT'),
  (4, 'PANITIA DISTRIBUTOR ZAKAT'),
  (5, 'PANITIA PENERIMA & DISTRIBUTOR ZAKAT');
/*!40000 ALTER TABLE `ref_jabatan` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.tb_panitia_zis
CREATE TABLE IF NOT EXISTS `tb_panitia_zis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `jabatan` varchar(250) DEFAULT NULL,
  `set_ttd1` char(50) DEFAULT NULL,
  `set_ttd2` char(50) DEFAULT NULL,
  `intensif` double DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `dsad` (`id_user`),
  CONSTRAINT `dsad` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.tb_panitia_zis: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_panitia_zis` DISABLE KEYS */;
INSERT INTO `tb_panitia_zis` (`id`, `id_user`, `nama`, `jabatan`, `set_ttd1`, `set_ttd2`, `intensif`, `created_at`, `updated_at`) VALUES
  (1, 1, 'Fadel Fadilah', 'SEKERTARIS', 'YA', 'TIDAK', 120000, '2020-05-05 02:14:37', '2020-05-05 02:14:37');
/*!40000 ALTER TABLE `tb_panitia_zis` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.tb_penerima_zakat
CREATE TABLE IF NOT EXISTS `tb_penerima_zakat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `no_kk` varchar(150) DEFAULT NULL,
  `nama_penerima` varchar(150) DEFAULT NULL,
  `jumlah_jiwa` int(11) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `letak_geografi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK_tb_penerima_zakat_users` (`id_user`),
  CONSTRAINT `FK_tb_penerima_zakat_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.tb_penerima_zakat: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_penerima_zakat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_penerima_zakat` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.tb_setoran_zis
CREATE TABLE IF NOT EXISTS `tb_setoran_zis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tgl` date DEFAULT NULL,
  `nama_muzakki` varchar(250) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jumlah_jiwa` int(11) DEFAULT NULL,
  `zakat_fitrah_uang` double DEFAULT NULL,
  `zakat_fitrah_beras` double DEFAULT NULL,
  `zakat_mal` double DEFAULT NULL,
  `infaq_sedakah` double DEFAULT NULL,
  `arah_infaqsedekah` varchar(150) DEFAULT NULL,
  `fidyah` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK1w` (`id_user`),
  CONSTRAINT `FK1w` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.tb_setoran_zis: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_setoran_zis` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_setoran_zis` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `titik_kordinat` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `no_hp` text DEFAULT NULL,
  `set_fitrah_beras` double DEFAULT 0,
  `set_fitrah_uang` double DEFAULT 0,
  `perkiraan_penerima` double DEFAULT 0,
  `hak_akses` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.users: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `username`, `password`, `alamat`, `titik_kordinat`, `foto`, `no_hp`, `set_fitrah_beras`, `set_fitrah_uang`, `perkiraan_penerima`, `hak_akses`, `created_at`, `updated_at`) VALUES
  (1, 'Masjid Nuru Islah', 'islah', '202cb962ac59075b964b07152d234b70', 'Btn Andi Tonro', NULL, NULL, '12345', 4, 50000, 0, 'USER', '2020-05-04 19:58:19', '2020-05-05 02:19:39');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
