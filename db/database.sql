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

-- Membuang data untuk tabel olah_zakat.ref_arah_infaqsedeqah: ~3 rows (lebih kurang)
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.ref_jabatan: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `ref_jabatan` DISABLE KEYS */;
INSERT INTO `ref_jabatan` (`id`, `nama_jabatan`) VALUES
  (1, 'KETUA PANITIA'),
  (2, 'SEKERTARIS'),
  (3, 'PANITIA PENERIMA ZAKAT'),
  (4, 'PANITIA PENYALUR ZAKAT'),
  (5, 'PANITIA PENERIMA & PENYALUR ZAKAT'),
  (6, 'KOORDINATOR');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.tb_panitia_zis: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_panitia_zis` DISABLE KEYS */;
INSERT INTO `tb_panitia_zis` (`id`, `id_user`, `nama`, `jabatan`, `set_ttd1`, `set_ttd2`, `intensif`, `created_at`, `updated_at`) VALUES
  (1, 1, 'Fadel Fadilah', 'KETUA PANITIA', 'YA', 'TIDAK', 120000, '2020-05-07 00:52:08', '2020-05-07 00:52:08'),
  (4, 1, 'Drs NURSALIM M.Si', 'KOORDINATOR', 'TIDAK', 'YA', 0, '2020-05-07 00:52:38', '2020-05-07 00:52:38');
/*!40000 ALTER TABLE `tb_panitia_zis` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.tb_penerimaan_kupon
CREATE TABLE IF NOT EXISTS `tb_penerimaan_kupon` (
  `id_user` int(11) NOT NULL,
  `no_kupon` char(50) NOT NULL,
  PRIMARY KEY (`id_user`,`no_kupon`),
  CONSTRAINT `caff` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.tb_penerimaan_kupon: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_penerimaan_kupon` DISABLE KEYS */;
INSERT INTO `tb_penerimaan_kupon` (`id_user`, `no_kupon`) VALUES
  (1, '1'),
  (1, '2'),
  (1, '3');
/*!40000 ALTER TABLE `tb_penerimaan_kupon` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.tb_penerima_zis
CREATE TABLE IF NOT EXISTS `tb_penerima_zis` (
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.tb_penerima_zis: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_penerima_zis` DISABLE KEYS */;
INSERT INTO `tb_penerima_zis` (`id`, `id_user`, `no_kk`, `nama_penerima`, `jumlah_jiwa`, `alamat`, `letak_geografi`, `created_at`, `updated_at`) VALUES
  (2, 1, '4122492184921904829148', 'Bathul', 4, 'Jl. Mappanyukki', NULL, '2020-05-06 01:23:45', '2020-05-06 01:23:45');
/*!40000 ALTER TABLE `tb_penerima_zis` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.tb_profile
CREATE TABLE IF NOT EXISTS `tb_profile` (
  `id` char(50) DEFAULT NULL,
  `tahun_masehi` char(50) DEFAULT NULL,
  `tahun_hijriah` char(50) DEFAULT NULL,
  `tgl_mulai_ramadhan` date DEFAULT NULL,
  `tgl_akhir_ramadhan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.tb_profile: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_profile` DISABLE KEYS */;
INSERT INTO `tb_profile` (`id`, `tahun_masehi`, `tahun_hijriah`, `tgl_mulai_ramadhan`, `tgl_akhir_ramadhan`) VALUES
  ('1', '2020', '1441', NULL, NULL);
/*!40000 ALTER TABLE `tb_profile` ENABLE KEYS */;

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
  `harga_beras_dimakan` double DEFAULT NULL,
  `zakat_mal` double DEFAULT NULL,
  `infaq_sedekah` double DEFAULT NULL,
  `arah_infaqsedekah` varchar(150) DEFAULT NULL,
  `fidyah` double DEFAULT NULL,
  `zakat_fitrah_uang_` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `FK1w` (`id_user`),
  CONSTRAINT `FK1w` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.tb_setoran_zis: ~101 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_setoran_zis` DISABLE KEYS */;
INSERT INTO `tb_setoran_zis` (`id`, `id_user`, `tgl`, `nama_muzakki`, `alamat`, `jumlah_jiwa`, `zakat_fitrah_uang`, `zakat_fitrah_beras`, `harga_beras_dimakan`, `zakat_mal`, `infaq_sedekah`, `arah_infaqsedekah`, `fidyah`, `zakat_fitrah_uang_`, `created_at`, `updated_at`) VALUES
  (1, 1, '2020-05-07', 'Nama 1', 'alamat 1', 2, 98000, 7, 13000, 52961, 100000, 'MASJID', 100000, 98000, '2020-05-09 01:59:47', '2020-05-10 02:36:44'),
  (2, 1, '2020-05-07', 'Nama 2', 'alamat 2', 7, 343000, 24.5, 13000, 25209, 150000, 'FAKIR/MISKIN', 200000, 343000, '2020-05-09 01:59:47', '2020-05-10 02:37:02'),
  (3, 1, '2020-05-07', 'Nama 3', 'alamat 3', 8, 392000, 28, 13000, 54970, 200000, 'FAKIR/MISKIN', 400000, 392000, '2020-05-09 01:59:47', '2020-05-10 02:37:03'),
  (4, 1, '2020-05-07', 'Nama 4', 'alamat 4', 10, 490000, 35, 13000, 81258, 200000, 'FAKIR/MISKIN', 100000, 490000, '2020-05-09 01:59:47', '2020-05-10 02:37:03'),
  (5, 1, '2020-05-07', 'Nama 5', 'alamat 5', 7, 343000, 24.5, 13000, 34560, 150000, 'YATIM PIATU', 300000, 343000, '2020-05-09 01:59:47', '2020-05-10 02:37:04'),
  (6, 1, '2020-05-07', 'Nama 6', 'alamat 6', 9, 441000, 31.5, 13000, 83439, 200000, 'FAKIR/MISKIN', 700000, 441000, '2020-05-09 01:59:47', '2020-05-10 02:37:05'),
  (7, 1, '2020-05-07', 'Nama 7', 'alamat 7', 4, 196000, 14, 13000, 95163, 100000, 'MASJID', 300000, 196000, '2020-05-09 01:59:47', '2020-05-10 02:37:05'),
  (8, 1, '2020-05-07', 'Nama 8', 'alamat 8', 8, 392000, 28, 13000, 32110, 200000, 'FAKIR/MISKIN', 300000, 392000, '2020-05-09 01:59:47', '2020-05-10 02:37:06'),
  (9, 1, '2020-05-07', 'Nama 9', 'alamat 9', 2, 98000, 7, 13000, 85472, 100000, 'MASJID', 500000, 98000, '2020-05-09 01:59:47', '2020-05-10 02:37:07'),
  (10, 1, '2020-05-07', 'Nama 10', 'alamat 10', 10, 490000, 35, 13000, 99167, 200000, 'FAKIR/MISKIN', 100000, 490000, '2020-05-09 01:59:47', '2020-05-10 02:37:08'),
  (11, 1, '2020-05-07', 'Nama 11', 'alamat 11', 3, 147000, 10.5, 13000, 94611, 100000, 'MASJID', 0, 147000, '2020-05-09 01:59:47', '2020-05-10 02:37:08'),
  (12, 1, '2020-05-07', 'Nama 12', 'alamat 12', 2, 98000, 7, 13000, 71939, 100000, 'FAKIR/MISKIN', 0, 98000, '2020-05-09 01:59:47', '2020-05-10 02:37:09'),
  (13, 1, '2020-05-07', 'Nama 13', 'alamat 13', 2, 98000, 7, 13000, 18359, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:47', '2020-05-10 02:37:25'),
  (14, 1, '2020-05-07', 'Nama 14', 'alamat 14', 2, 98000, 7, 13000, 51707, 100000, 'FAKIR/MISKIN', 0, 98000, '2020-05-09 01:59:47', '2020-05-10 02:37:25'),
  (15, 1, '2020-05-07', 'Nama 15', 'alamat 15', 9, 441000, 31.5, 13000, 91022, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:48', '2020-05-10 02:37:26'),
  (16, 1, '2020-05-07', 'Nama 16', 'alamat 16', 10, 490000, 35, 13000, 48901, 200000, 'FAKIR/MISKIN', 0, 490000, '2020-05-09 01:59:48', '2020-05-10 02:37:27'),
  (17, 1, '2020-05-07', 'Nama 17', 'alamat 17', 8, 392000, 28, 13000, 99814, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:48', '2020-05-10 02:37:27'),
  (18, 1, '2020-05-07', 'Nama 18', 'alamat 18', 5, 245000, 17.5, 13000, 50155, 100000, 'FAKIR/MISKIN', 0, 245000, '2020-05-09 01:59:48', '2020-05-10 02:37:28'),
  (19, 1, '2020-05-07', 'Nama 19', 'alamat 19', 8, 392000, 28, 13000, 15163, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:48', '2020-05-10 02:37:28'),
  (20, 1, '2020-05-07', 'Nama 20', 'alamat 20', 3, 147000, 10.5, 13000, 13220, 100000, 'FAKIR/MISKIN', 0, 147000, '2020-05-09 01:59:48', '2020-05-10 02:37:28'),
  (21, 1, '2020-05-07', 'Nama 21', 'alamat 21', 8, 392000, 28, 13000, 56644, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:48', '2020-05-10 02:37:28'),
  (22, 1, '2020-05-07', 'Nama 22', 'alamat 22', 7, 343000, 24.5, 13000, 98188, 150000, 'FAKIR/MISKIN', 0, 343000, '2020-05-09 01:59:48', '2020-05-10 02:37:29'),
  (23, 1, '2020-05-07', 'Nama 23', 'alamat 23', 3, 147000, 10.5, 13000, 51126, 100000, 'MASJID', 0, 147000, '2020-05-09 01:59:48', '2020-05-10 02:37:29'),
  (24, 1, '2020-05-07', 'Nama 24', 'alamat 24', 4, 196000, 14, 13000, 73856, 100000, 'FAKIR/MISKIN', 0, 196000, '2020-05-09 01:59:48', '2020-05-10 02:37:30'),
  (25, 1, '2020-05-07', 'Nama 25', 'alamat 25', 6, 294000, 21, 13000, 51421, 150000, 'YATIM PIATU', 0, 294000, '2020-05-09 01:59:48', '2020-05-10 02:37:30'),
  (26, 1, '2020-05-07', 'Nama 26', 'alamat 26', 10, 490000, 35, 13000, 35929, 200000, 'FAKIR/MISKIN', 0, 490000, '2020-05-09 01:59:48', '2020-05-10 02:37:31'),
  (27, 1, '2020-05-07', 'Nama 27', 'alamat 27', 8, 392000, 28, 13000, 59399, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:48', '2020-05-10 02:37:32'),
  (28, 1, '2020-05-07', 'Nama 28', 'alamat 28', 2, 98000, 7, 13000, 22362, 100000, 'FAKIR/MISKIN', 0, 98000, '2020-05-09 01:59:48', '2020-05-10 02:37:32'),
  (29, 1, '2020-05-07', 'Nama 29', 'alamat 29', 3, 147000, 10.5, 13000, 37397, 100000, 'MASJID', 0, 147000, '2020-05-09 01:59:48', '2020-05-10 02:37:33'),
  (30, 1, '2020-05-07', 'Nama 30', 'alamat 30', 7, 343000, 24.5, 13000, 93761, 150000, 'FAKIR/MISKIN', 0, 343000, '2020-05-09 01:59:48', '2020-05-10 02:37:33'),
  (31, 1, '2020-05-07', 'Nama 31', 'alamat 31', 8, 392000, 28, 13000, 32901, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:48', '2020-05-10 02:37:34'),
  (32, 1, '2020-05-07', 'Nama 32', 'alamat 32', 10, 490000, 35, 13000, 54353, 200000, 'FAKIR/MISKIN', 0, 490000, '2020-05-09 01:59:48', '2020-05-10 02:37:35'),
  (33, 1, '2020-05-07', 'Nama 33', 'alamat 33', 2, 98000, 7, 13000, 15858, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:48', '2020-05-10 02:37:35'),
  (34, 1, '2020-05-07', 'Nama 34', 'alamat 34', 7, 343000, 24.5, 13000, 53229, 150000, 'FAKIR/MISKIN', 0, 343000, '2020-05-09 01:59:48', '2020-05-10 02:37:36'),
  (35, 1, '2020-05-07', 'Nama 35', 'alamat 35', 4, 196000, 14, 13000, 79317, 100000, 'MASJID', 0, 196000, '2020-05-09 01:59:48', '2020-05-10 02:37:36'),
  (36, 1, '2020-05-07', 'Nama 36', 'alamat 36', 9, 441000, 31.5, 13000, 53521, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:48', '2020-05-10 02:37:37'),
  (37, 1, '2020-05-07', 'Nama 37', 'alamat 37', 5, 245000, 17.5, 13000, 11990, 100000, 'MASJID', 0, 245000, '2020-05-09 01:59:48', '2020-05-10 02:37:37'),
  (38, 1, '2020-05-07', 'Nama 38', 'alamat 38', 3, 147000, 10.5, 13000, 73615, 100000, 'FAKIR/MISKIN', 0, 147000, '2020-05-09 01:59:48', '2020-05-10 02:37:38'),
  (39, 1, '2020-05-07', 'Nama 39', 'alamat 39', 7, 343000, 24.5, 13000, 23070, 150000, 'YATIM PIATU', 0, 343000, '2020-05-09 01:59:48', '2020-05-10 02:37:38'),
  (40, 1, '2020-05-07', 'Nama 40', 'alamat 40', 3, 147000, 10.5, 13000, 77228, 100000, 'FAKIR/MISKIN', 0, 147000, '2020-05-09 01:59:49', '2020-05-10 02:37:39'),
  (41, 1, '2020-05-07', 'Nama 41', 'alamat 41', 9, 441000, 31.5, 13000, 85058, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:49', '2020-05-10 02:37:40'),
  (42, 1, '2020-05-07', 'Nama 42', 'alamat 42', 6, 294000, 21, 13000, 24070, 150000, 'FAKIR/MISKIN', 0, 294000, '2020-05-09 01:59:49', '2020-05-10 02:37:40'),
  (43, 1, '2020-05-07', 'Nama 43', 'alamat 43', 5, 245000, 17.5, 13000, 76749, 100000, 'MASJID', 0, 245000, '2020-05-09 01:59:49', '2020-05-10 02:37:41'),
  (44, 1, '2020-05-07', 'Nama 44', 'alamat 44', 10, 490000, 35, 13000, 52054, 200000, 'FAKIR/MISKIN', 0, 490000, '2020-05-09 01:59:49', '2020-05-10 02:37:41'),
  (45, 1, '2020-05-07', 'Nama 45', 'alamat 45', 5, 245000, 17.5, 13000, 59520, 100000, 'MASJID', 0, 245000, '2020-05-09 01:59:49', '2020-05-10 02:37:42'),
  (46, 1, '2020-05-07', 'Nama 46', 'alamat 46', 5, 245000, 17.5, 13000, 61434, 100000, 'FAKIR/MISKIN', 0, 245000, '2020-05-09 01:59:49', '2020-05-10 02:37:42'),
  (47, 1, '2020-05-07', 'Nama 47', 'alamat 47', 7, 343000, 24.5, 13000, 69226, 150000, 'YATIM PIATU', 0, 343000, '2020-05-09 01:59:49', '2020-05-10 02:37:43'),
  (48, 1, '2020-05-07', 'Nama 48', 'alamat 48', 5, 245000, 17.5, 13000, 56901, 100000, 'MASJID', 0, 245000, '2020-05-09 01:59:49', '2020-05-10 02:37:43'),
  (49, 1, '2020-05-07', 'Nama 49', 'alamat 49', 10, 490000, 35, 13000, 88456, 200000, 'FAKIR/MISKIN', 0, 490000, '2020-05-09 01:59:49', '2020-05-10 02:37:44'),
  (50, 1, '2020-05-07', 'Nama 50', 'alamat 50', 4, 196000, 14, 13000, 87474, 100000, 'MASJID', 0, 196000, '2020-05-09 01:59:49', '2020-05-10 02:37:45'),
  (51, 1, '2020-05-07', 'Nama 51', 'alamat 51', 9, 441000, 31.5, 13000, 57548, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:49', '2020-05-10 02:37:45'),
  (52, 1, '2020-05-07', 'Nama 52', 'alamat 52', 8, 392000, 28, 13000, 49512, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:49', '2020-05-10 02:37:45'),
  (53, 1, '2020-05-07', 'Nama 53', 'alamat 53', 7, 343000, 24.5, 13000, 99845, 150000, 'FAKIR/MISKIN', 0, 343000, '2020-05-09 01:59:49', '2020-05-10 02:37:46'),
  (54, 1, '2020-05-07', 'Nama 54', 'alamat 54', 7, 343000, 24.5, 13000, 48166, 150000, 'YATIM PIATU', 0, 343000, '2020-05-09 01:59:49', '2020-05-10 02:37:46'),
  (55, 1, '2020-05-07', 'Nama 55', 'alamat 55', 4, 196000, 14, 13000, 84869, 100000, 'MASJID', 0, 196000, '2020-05-09 01:59:49', '2020-05-10 02:37:47'),
  (56, 1, '2020-05-07', 'Nama 56', 'alamat 56', 6, 294000, 21, 13000, 81230, 150000, 'FAKIR/MISKIN', 0, 294000, '2020-05-09 01:59:49', '2020-05-10 02:37:47'),
  (57, 1, '2020-05-07', 'Nama 57', 'alamat 57', 6, 294000, 21, 13000, 44275, 150000, 'YATIM PIATU', 0, 294000, '2020-05-09 01:59:49', '2020-05-10 02:37:48'),
  (58, 1, '2020-05-07', 'Nama 58', 'alamat 58', 4, 196000, 14, 13000, 71670, 100000, 'FAKIR/MISKIN', 0, 196000, '2020-05-09 01:59:49', '2020-05-10 02:37:48'),
  (59, 1, '2020-05-07', 'Nama 59', 'alamat 59', 2, 98000, 7, 13000, 16627, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:49', '2020-05-10 02:37:49'),
  (60, 1, '2020-05-07', 'Nama 60', 'alamat 60', 9, 441000, 31.5, 13000, 45880, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:50', '2020-05-10 02:37:49'),
  (61, 1, '2020-05-07', 'Nama 61', 'alamat 61', 8, 392000, 28, 13000, 68538, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:50', '2020-05-10 02:37:50'),
  (62, 1, '2020-05-07', 'Nama 62', 'alamat 62', 5, 245000, 17.5, 13000, 73722, 100000, 'FAKIR/MISKIN', 0, 245000, '2020-05-09 01:59:50', '2020-05-10 02:37:50'),
  (63, 1, '2020-05-07', 'Nama 63', 'alamat 63', 8, 392000, 28, 13000, 88087, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:50', '2020-05-10 02:37:51'),
  (64, 1, '2020-05-07', 'Nama 64', 'alamat 64', 8, 392000, 28, 13000, 90852, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:50', '2020-05-10 02:37:51'),
  (65, 1, '2020-05-07', 'Nama 65', 'alamat 65', 2, 98000, 7, 13000, 47733, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:50', '2020-05-10 02:37:52'),
  (66, 1, '2020-05-07', 'Nama 66', 'alamat 66', 8, 392000, 28, 13000, 83160, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:50', '2020-05-10 02:37:52'),
  (67, 1, '2020-05-07', 'Nama 67', 'alamat 67', 5, 245000, 17.5, 13000, 23731, 100000, 'MASJID', 0, 245000, '2020-05-09 01:59:50', '2020-05-10 02:37:53'),
  (68, 1, '2020-05-07', 'Nama 68', 'alamat 68', 10, 490000, 35, 13000, 14653, 200000, 'FAKIR/MISKIN', 0, 490000, '2020-05-09 01:59:50', '2020-05-10 02:37:53'),
  (69, 1, '2020-05-07', 'Nama 69', 'alamat 69', 5, 245000, 17.5, 13000, 20697, 100000, 'FAKIR/MISKIN', 0, 245000, '2020-05-09 01:59:50', '2020-05-10 02:37:54'),
  (70, 1, '2020-05-07', 'Nama 70', 'alamat 70', 2, 98000, 7, 13000, 72767, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:50', '2020-05-10 02:37:54'),
  (71, 1, '2020-05-07', 'Nama 71', 'alamat 71', 2, 98000, 7, 13000, 98717, 100000, 'FAKIR/MISKIN', 0, 98000, '2020-05-09 01:59:50', '2020-05-10 02:37:55'),
  (72, 1, '2020-05-07', 'Nama 72', 'alamat 72', 2, 98000, 7, 13000, 52107, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:50', '2020-05-10 02:37:55'),
  (73, 1, '2020-05-07', 'Nama 73', 'alamat 73', 3, 147000, 10.5, 13000, 81145, 100000, 'FAKIR/MISKIN', 0, 147000, '2020-05-09 01:59:50', '2020-05-10 02:37:55'),
  (74, 1, '2020-05-07', 'Nama 74', 'alamat 74', 3, 147000, 10.5, 13000, 83208, 100000, 'MASJID', 0, 147000, '2020-05-09 01:59:50', '2020-05-10 02:37:56'),
  (75, 1, '2020-05-07', 'Nama 75', 'alamat 75', 8, 392000, 28, 13000, 85978, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:50', '2020-05-10 02:37:56'),
  (76, 1, '2020-05-07', 'Nama 76', 'alamat 76', 2, 98000, 7, 13000, 90464, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:50', '2020-05-10 02:37:56'),
  (77, 1, '2020-05-07', 'Nama 77', 'alamat 77', 9, 441000, 31.5, 13000, 14465, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:50', '2020-05-10 02:37:56'),
  (78, 1, '2020-05-07', 'Nama 78', 'alamat 78', 2, 98000, 7, 13000, 61992, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:50', '2020-05-10 02:37:57'),
  (79, 1, '2020-05-07', 'Nama 79', 'alamat 79', 2, 98000, 7, 13000, 25255, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:50', '2020-05-10 02:37:57'),
  (80, 1, '2020-05-07', 'Nama 80', 'alamat 80', 10, 490000, 35, 13000, 72265, 200000, 'FAKIR/MISKIN', 0, 490000, '2020-05-09 01:59:50', '2020-05-10 02:37:58'),
  (81, 1, '2020-05-07', 'Nama 81', 'alamat 81', 3, 147000, 10.5, 13000, 31495, 100000, 'MASJID', 0, 147000, '2020-05-09 01:59:50', '2020-05-10 02:37:58'),
  (82, 1, '2020-05-07', 'Nama 82', 'alamat 82', 8, 392000, 28, 13000, 78197, 200000, 'FAKIR/MISKIN', 0, 392000, '2020-05-09 01:59:51', '2020-05-10 02:37:58'),
  (83, 1, '2020-05-07', 'Nama 83', 'alamat 83', 2, 98000, 7, 13000, 12344, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:51', '2020-05-10 02:37:58'),
  (84, 1, '2020-05-07', 'Nama 84', 'alamat 84', 6, 294000, 21, 13000, 45915, 150000, 'FAKIR/MISKIN', 0, 294000, '2020-05-09 01:59:51', '2020-05-10 02:37:59'),
  (85, 1, '2020-05-07', 'Nama 85', 'alamat 85', 5, 245000, 17.5, 13000, 45390, 100000, 'MASJID', 0, 245000, '2020-05-09 01:59:51', '2020-05-10 02:37:59'),
  (86, 1, '2020-05-07', 'Nama 86', 'alamat 86', 9, 441000, 31.5, 13000, 40386, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:51', '2020-05-10 02:37:59'),
  (87, 1, '2020-05-07', 'Nama 87', 'alamat 87', 2, 98000, 7, 13000, 96292, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:51', '2020-05-10 02:37:59'),
  (88, 1, '2020-05-07', 'Nama 88', 'alamat 88', 7, 343000, 24.5, 13000, 73606, 150000, 'FAKIR/MISKIN', 0, 343000, '2020-05-09 01:59:51', '2020-05-10 02:38:00'),
  (89, 1, '2020-05-07', 'Nama 89', 'alamat 89', 9, 441000, 31.5, 13000, 38686, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:51', '2020-05-10 02:38:00'),
  (90, 1, '2020-05-07', 'Nama 90', 'alamat 90', 3, 147000, 10.5, 13000, 47836, 100000, 'FAKIR/MISKIN', 0, 147000, '2020-05-09 01:59:51', '2020-05-10 02:38:00'),
  (91, 1, '2020-05-07', 'Nama 91', 'alamat 91', 2, 98000, 7, 13000, 79783, 100000, 'MASJID', 0, 98000, '2020-05-09 01:59:51', '2020-05-10 02:38:01'),
  (92, 1, '2020-05-07', 'Nama 92', 'alamat 92', 2, 98000, 7, 13000, 92843, 100000, 'FAKIR/MISKIN', 0, 98000, '2020-05-09 01:59:51', '2020-05-10 02:38:01'),
  (93, 1, '2020-05-07', 'Nama 93', 'alamat 93', 5, 245000, 17.5, 13000, 18989, 100000, 'MASJID', 0, 245000, '2020-05-09 01:59:51', '2020-05-10 02:38:01'),
  (94, 1, '2020-05-07', 'Nama 94', 'alamat 94', 4, 196000, 14, 13000, 78284, 100000, 'FAKIR/MISKIN', 0, 196000, '2020-05-09 01:59:51', '2020-05-10 02:38:01'),
  (95, 1, '2020-05-07', 'Nama 95', 'alamat 95', 3, 147000, 10.5, 13000, 25888, 100000, 'MASJID', 0, 147000, '2020-05-09 01:59:51', '2020-05-10 02:38:02'),
  (96, 1, '2020-05-07', 'Nama 96', 'alamat 96', 9, 441000, 31.5, 13000, 91334, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:51', '2020-05-10 02:38:02'),
  (97, 1, '2020-05-07', 'Nama 97', 'alamat 97', 3, 147000, 10.5, 13000, 60088, 100000, 'MASJID', 0, 147000, '2020-05-09 01:59:51', '2020-05-10 02:38:02'),
  (98, 1, '2020-05-07', 'Nama 98', 'alamat 98', 3, 147000, 10.5, 13000, 52917, 100000, 'FAKIR/MISKIN', 0, 147000, '2020-05-09 01:59:51', '2020-05-10 02:38:03'),
  (99, 1, '2020-05-07', 'Nama 99', 'alamat 99', 9, 441000, 31.5, 13000, 43638, 200000, 'FAKIR/MISKIN', 0, 441000, '2020-05-09 01:59:51', '2020-05-10 02:38:03'),
  (100, 1, '2020-05-12', 'Nama 100', 'alamat 100', 10, 52000, 0, 13000, 28857, 200000, 'FAKIR/MISKIN', 0, 52000, '2020-05-09 01:59:51', '2020-05-10 02:38:03'),
  (103, 1, '2020-05-10', 'Isra Andika', 'Jl. Mappanyukki', 2, 0, 8, 13000, 0, 0, '', 0, 104000, '2020-05-10 02:30:03', '2020-05-10 02:31:29');
/*!40000 ALTER TABLE `tb_setoran_zis` ENABLE KEYS */;

-- membuang struktur untuk table olah_zakat.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` text DEFAULT NULL,
  `titik_kordinat` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `no_hp` text DEFAULT NULL,
  `set_fitrah_beras` double DEFAULT 4,
  `set_fitrah_uang` double DEFAULT 50000,
  `set_beras_muzakki` double DEFAULT 4,
  `perkiraan_penerima` double DEFAULT 0,
  `hak_akses` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel olah_zakat.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `username`, `password`, `alamat`, `kota`, `titik_kordinat`, `foto`, `no_hp`, `set_fitrah_beras`, `set_fitrah_uang`, `set_beras_muzakki`, `perkiraan_penerima`, `hak_akses`, `created_at`, `updated_at`) VALUES
  (1, 'Masjid Nurul Islah', 'islah', '202cb962ac59075b964b07152d234b70', 'Btn Andi Tonro', 'Sungguminasa', NULL, NULL, '12345', 4, 120000, 4, 0, 'USER', '2020-05-04 19:58:19', '2020-05-08 04:19:35'),
  (2, 'Masjid Nurul Khaer', 'khaer', '202cb962ac59075b964b07152d234b70', 'Btn Andi Tonro', 'Sungguminasa', NULL, NULL, '12345', 4, 120000, 4, 0, 'USER', '2020-05-04 19:58:19', '2020-05-08 04:19:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
