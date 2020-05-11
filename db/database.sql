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

-- Membuang data untuk tabel olah_zakat.ref_arah_infaqsedeqah: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `ref_arah_infaqsedeqah` DISABLE KEYS */;
INSERT INTO `ref_arah_infaqsedeqah` (`id`, `nama_penerima`) VALUES
  (1, 'MASJID'),
  (2, 'FAKIR/MISKIN'),
  (3, 'YATIM PIATU');
/*!40000 ALTER TABLE `ref_arah_infaqsedeqah` ENABLE KEYS */;

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

-- Membuang data untuk tabel olah_zakat.tb_panitia_zis: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_panitia_zis` DISABLE KEYS */;
INSERT INTO `tb_panitia_zis` (`id`, `id_user`, `nama`, `jabatan`, `set_ttd1`, `set_ttd2`, `intensif`, `sumber_pengeluaran`, `created_at`, `updated_at`) VALUES
  (1, 1, 'Fadel Fadilah', 'KETUA PANITIA', 'YA', 'TIDAK', 120000, 'ZAKAT FITRAH UANG', '2020-05-12 01:47:16', '2020-05-12 01:47:16'),
  (4, 1, 'Drs NURSALIM M.Si', 'KOORDINATOR', 'TIDAK', 'YA', 130000, 'ZAKAT MAAL', '2020-05-12 01:58:15', '2020-05-12 01:58:15');
/*!40000 ALTER TABLE `tb_panitia_zis` ENABLE KEYS */;

-- Membuang data untuk tabel olah_zakat.tb_penerimaan_kupon: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_penerimaan_kupon` DISABLE KEYS */;
INSERT INTO `tb_penerimaan_kupon` (`id_user`, `no_kupon`) VALUES
  (1, '1'),
  (1, '2'),
  (1, '3'),
  (2, '1');
/*!40000 ALTER TABLE `tb_penerimaan_kupon` ENABLE KEYS */;

-- Membuang data untuk tabel olah_zakat.tb_penerima_zis: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_penerima_zis` DISABLE KEYS */;
INSERT INTO `tb_penerima_zis` (`id`, `id_user`, `no_kk`, `nama_penerima`, `jumlah_jiwa`, `alamat`, `letak_geografi`, `created_at`, `updated_at`) VALUES
  (2, 1, '4122492184921904829148', 'Bathul', 4, 'Jl. Mappanyukki', NULL, '2020-05-06 01:23:45', '2020-05-06 01:23:45');
/*!40000 ALTER TABLE `tb_penerima_zis` ENABLE KEYS */;

-- Membuang data untuk tabel olah_zakat.tb_pengeluaran_panitia: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_pengeluaran_panitia` DISABLE KEYS */;
INSERT INTO `tb_pengeluaran_panitia` (`id`, `id_user`, `uraian`, `tgl`, `jumlah`, `satuan`, `harga_satuan`, `tot_pengeluaran`, `sumber_pengeluaran`) VALUES
  (1, 1, 'Beli Amplop', '2020-05-12', 1, 'DOS', 100000, 100000, 'ZAKAT FITRAH UANG'),
  (3, 1, 'Beli Kantong', '2020-05-12', 1, 'DOS', 200000, 200000, 'ZAKAT MAAL'),
  (4, 1, 'Beli Spanduk', '2020-05-12', 1, 'LEMBAR', 300000, 300000, 'INFAQ/SEDEKAH (YANG KE MASJID)'),
  (5, 1, 'Beli Timbangan', '2020-05-12', 1, 'PCS', 500000, 500000, 'KAS MASJID');
/*!40000 ALTER TABLE `tb_pengeluaran_panitia` ENABLE KEYS */;

-- Membuang data untuk tabel olah_zakat.tb_profile: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_profile` DISABLE KEYS */;
INSERT INTO `tb_profile` (`id`, `tahun_masehi`, `tahun_hijriah`, `tgl_mulai_ramadhan`, `tgl_akhir_ramadhan`) VALUES
  ('1', '2020', '1441', NULL, NULL);
/*!40000 ALTER TABLE `tb_profile` ENABLE KEYS */;

-- Membuang data untuk tabel olah_zakat.tb_setoran_zis: ~101 rows (lebih kurang)
/*!40000 ALTER TABLE `tb_setoran_zis` DISABLE KEYS */;
INSERT INTO `tb_setoran_zis` (`id`, `id_user`, `tgl`, `nama_muzakki`, `alamat`, `jumlah_jiwa`, `zakat_fitrah_uang`, `zakat_fitrah_beras`, `harga_beras_dimakan`, `zakat_mal`, `infaq_sedekah`, `arah_infaqsedekah`, `fidyah`, `zakat_fitrah_uang_`, `created_at`, `updated_at`) VALUES
  (104, 1, '2020-05-12', 'isaar', 'dasf', 12, 660000, 0, 15000, 0, 0, NULL, 0, 720000, '2020-05-12 06:17:04', '2020-05-12 06:41:00'),
  (105, 1, '2020-05-12', 'isaar', 'dasf', 14, 538000, 0, 13000, 0, 0, NULL, 0, 642000, '2020-05-12 06:17:04', '2020-05-12 06:32:38'),
  (106, 1, '2020-05-12', 'isaar', 'dasf', 12, 0, 48, 13000, 0, 200000, 'YATIM PIATU', 0, 642000, '2020-05-12 06:17:04', '2020-05-12 07:03:23'),
  (107, 1, '2020-05-12', 'isaar', 'dasf', 12, 0, 48, 13000, 1200000, 2000000, 'MASJID', 0, 642000, '2020-05-12 06:17:04', '2020-05-12 06:59:10');
/*!40000 ALTER TABLE `tb_setoran_zis` ENABLE KEYS */;

-- Membuang data untuk tabel olah_zakat.users: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `nama`, `username`, `password`, `alamat`, `kota`, `titik_kordinat`, `foto`, `no_hp`, `set_fitrah_beras`, `set_fitrah_uang`, `set_beras_muzakki`, `perkiraan_penerima`, `hak_akses`, `created_at`, `updated_at`) VALUES
  (1, 'Masjid Nurul Islah', 'islah', '202cb962ac59075b964b07152d234b70', 'Btn Andi Tonro', 'Sungguminasa', NULL, NULL, '12345', 4, 100000, 4, 0, 'USER', '2020-05-04 19:58:19', '2020-05-10 04:26:31'),
  (2, 'Masjid Nurul Khaer', 'khaer', '202cb962ac59075b964b07152d234b70', 'Btn Andi Tonro', 'Sungguminasa', NULL, NULL, '12345', 4, 120000, 4, 0, 'USER', '2020-05-04 19:58:19', '2020-05-08 04:19:37'),
  (3, 'Masjid Nurul Islah', 'nurul.islah', '202cb962ac59075b964b07152d234b70', 'Btn Andi Tonro', 'Sungguminasa', NULL, NULL, '12345', 4, 100000, 4, 0, 'USER', '2020-05-04 19:58:19', '2020-05-08 04:19:37'),
  (4, 'Masjid Tauhid Mattoangin', 'tauhid.mattoangin', '202cb962ac59075b964b07152d234b70', 'Jl. Dahlia, Makassar', 'Makassar', NULL, NULL, '12345', 4, 100000, 4, 0, 'USER', '2020-05-04 19:58:19', '2020-05-08 04:19:37'),
  (5, 'Masjid Al Ikhlas', 'alikhlas.sudiang', '202cb962ac59075b964b07152d234b70', 'Bumi Permata Sudiang', 'Makassar', NULL, NULL, '12345', 4, 100000, 4, 0, 'USER', '2020-05-04 19:58:19', '2020-05-08 04:19:37'),
  (6, 'Masjid An-Nur', 'annur.alauddin', '202cb962ac59075b964b07152d234b70', 'Kompleks Gerhana Alauddin, Makassar', 'Makassar', NULL, NULL, '12345', 4, 100000, 4, 0, 'USER', '2020-05-04 19:58:19', '2020-05-08 04:19:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
