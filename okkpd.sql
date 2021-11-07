-- --------------------------------------------------------
-- Host:                         localhost
-- Versi server:                 10.5.9-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk dishanpan_eokkpd
CREATE DATABASE IF NOT EXISTS `dishanpan_eokkpd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dishanpan_eokkpd`;

-- membuang struktur untuk table dishanpan_eokkpd.berita
CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `slug` text NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar` mediumblob DEFAULT NULL,
  `tanggal_buat` datetime DEFAULT current_timestamp(),
  `tanggal_modifikasi` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_berita`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.data_form_uji
CREATE TABLE IF NOT EXISTS `data_form_uji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(80) NOT NULL,
  `status` enum('ada','tidak') NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis` varchar(25) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `data_form_uji_ibfk_1` (`id_layanan`),
  CONSTRAINT `data_form_uji_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.data_info_layanan
CREATE TABLE IF NOT EXISTS `data_info_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `kode_layanan` varchar(15) NOT NULL,
  `jenis_info` enum('Deskripsi','Dasar Hukum','Formulir','Prosedur','Biaya') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.data_sampling_plan
CREATE TABLE IF NOT EXISTS `data_sampling_plan` (
  `id_sampling` int(11) NOT NULL AUTO_INCREMENT,
  `id_layanan` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_sampling`),
  KEY `data_sampling_plan_ibfk_1` (`id_layanan`),
  CONSTRAINT `data_sampling_plan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.detail_dokumen
CREATE TABLE IF NOT EXISTS `detail_dokumen` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `kode_layanan` varchar(15) NOT NULL,
  `kode_dokumen` int(11) NOT NULL,
  PRIMARY KEY (`uid`),
  KEY `kode_layanan` (`kode_layanan`),
  KEY `detail_dokumen_ibfk_1` (`kode_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.detail_dokumen_inspeksi
CREATE TABLE IF NOT EXISTS `detail_dokumen_inspeksi` (
  `id_dokumen` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_dokumen` varchar(50) NOT NULL,
  `dokumen` mediumblob NOT NULL,
  `tipe_dokumen` varchar(100) NOT NULL,
  `tanggal_upload` datetime NOT NULL DEFAULT current_timestamp(),
  `file` text DEFAULT NULL,
  KEY `detail_dokumen_inspeksi_ibfk_1` (`id_dokumen`),
  KEY `detail_dokumen_inspeksi_ibfk_2` (`id_layanan`),
  CONSTRAINT `detail_dokumen_inspeksi_ibfk_1` FOREIGN KEY (`id_dokumen`) REFERENCES `master_dokumen_inspeksi` (`id_dokumen`) ON DELETE CASCADE,
  CONSTRAINT `detail_dokumen_inspeksi_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.detail_identitas_ekspor
CREATE TABLE IF NOT EXISTS `detail_identitas_ekspor` (
  `nama_produk` varchar(100) NOT NULL,
  `jenis_produk` varchar(35) DEFAULT NULL,
  `nomor_hs` varchar(20) DEFAULT NULL,
  `nama_eksportir` varchar(35) DEFAULT NULL,
  `alamat_kantor` text DEFAULT NULL,
  `alamat_gudang` text DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `consignment_code` varchar(35) DEFAULT NULL,
  `jumlah_lot` decimal(6,2) DEFAULT NULL,
  `berat_lot` varchar(12) DEFAULT NULL,
  `jumlah_kemasan` decimal(6,2) DEFAULT NULL,
  `jenis_kemasan` varchar(20) DEFAULT NULL,
  `berat_kotor` varchar(12) DEFAULT NULL,
  `berat_bersih` varchar(12) DEFAULT NULL,
  `pelabuhan_berangkat` varchar(35) DEFAULT NULL,
  `identitas_transportasi` varchar(20) DEFAULT NULL,
  `pelabuhan_tujuan` varchar(35) DEFAULT NULL,
  `negara_tujuan` varchar(25) DEFAULT NULL,
  `negara_transit` varchar(25) DEFAULT NULL,
  `pelabuhan_transit` varchar(25) DEFAULT NULL,
  `transportasi_transit` varchar(20) DEFAULT NULL,
  `id_layanan` int(11) NOT NULL,
  `sertifikat` mediumblob DEFAULT NULL,
  `nomor_sertifikat` varchar(50) DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `tanggal_unggah` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detail_identitas_ekspor_ibfk_1` (`id_layanan`),
  CONSTRAINT `detail_identitas_ekspor_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.detail_identitas_produk
CREATE TABLE IF NOT EXISTS `detail_identitas_produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_layanan` int(11) NOT NULL,
  `nama_produk_pangan` varchar(50) DEFAULT NULL,
  `nama_dagang` varchar(50) DEFAULT NULL,
  `id_kemasan` int(4) DEFAULT NULL,
  `nama_kemasan` varchar(40) DEFAULT NULL,
  `netto` int(6) DEFAULT NULL,
  `id_satuan` int(4) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL,
  `sertifikat` mediumblob DEFAULT NULL,
  `nomor_sertifikat` varchar(50) DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `tanggal_unggah` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.detail_komoditas
CREATE TABLE IF NOT EXISTS `detail_komoditas` (
  `id_sektor` varchar(10) DEFAULT NULL,
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_komoditas` varchar(3) DEFAULT NULL,
  `id_kelompok` varchar(10) DEFAULT NULL,
  `luas_lahan` double(5,2) DEFAULT NULL,
  `nama_jenis_komoditas` varchar(100) DEFAULT NULL,
  `id_layanan` int(11) NOT NULL,
  `sertifikat` mediumblob DEFAULT NULL,
  `nomor_sertifikat` varchar(50) DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `tanggal_unggah` date DEFAULT NULL,
  `nama_latin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `detail_komoditas_ibfk_1` (`id_layanan`),
  CONSTRAINT `detail_komoditas_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.detail_syarat_teknis
CREATE TABLE IF NOT EXISTS `detail_syarat_teknis` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_layanan` varchar(15) NOT NULL,
  `kode_syarat_teknis` int(11) NOT NULL,
  PRIMARY KEY (`id_detail`),
  KEY `kode_syarat_teknis` (`kode_syarat_teknis`),
  KEY `id_layanan` (`id_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.dokumen_layanan
CREATE TABLE IF NOT EXISTS `dokumen_layanan` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `dokumen` mediumblob DEFAULT NULL,
  `file` text DEFAULT NULL,
  `nama_dokumen` varchar(150) NOT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  `id_layanan` int(11) NOT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `dokumen_layanan_ibfk_1` (`id_layanan`),
  CONSTRAINT `dokumen_layanan_ibfk_1` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.gambar_hasil_inspeksi
CREATE TABLE IF NOT EXISTS `gambar_hasil_inspeksi` (
  `id_hasil` int(11) NOT NULL AUTO_INCREMENT,
  `id_gambar` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `gambar` mediumblob NOT NULL,
  PRIMARY KEY (`id_hasil`),
  KEY `gambar_hasil_inspeksi_ibfk_1` (`id_gambar`),
  KEY `gambar_hasil_inspeksi_ibfk_2` (`id_layanan`),
  CONSTRAINT `gambar_hasil_inspeksi_ibfk_1` FOREIGN KEY (`id_gambar`) REFERENCES `master_nama_gambar` (`id_gambar`) ON DELETE CASCADE,
  CONSTRAINT `gambar_hasil_inspeksi_ibfk_2` FOREIGN KEY (`id_layanan`) REFERENCES `layanan` (`uid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.gambar_slider
CREATE TABLE IF NOT EXISTS `gambar_slider` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `gambar_slider` mediumblob DEFAULT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.identitas_kepala_balai
CREATE TABLE IF NOT EXISTS `identitas_kepala_balai` (
  `nip` varchar(30) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `nama_kepala_dinas` varchar(50) NOT NULL,
  `bulan_menjabat` int(11) DEFAULT NULL,
  `tahun_menjabat` int(11) NOT NULL,
  `foto` mediumblob DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.identitas_kepala_dinas
CREATE TABLE IF NOT EXISTS `identitas_kepala_dinas` (
  `nip` varchar(30) NOT NULL,
  `pangkat` varchar(30) NOT NULL,
  `nama_kepala_dinas` varchar(50) NOT NULL,
  `t_jabatan_awal` date DEFAULT NULL,
  `t_jabatan_akhir` date DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `foto` mediumblob DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.identitas_usaha
CREATE TABLE IF NOT EXISTS `identitas_usaha` (
  `id_identitas_usaha` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemohon` varchar(50) NOT NULL,
  `jabatan_pemohon` varchar(25) DEFAULT NULL,
  `no_ktp_pemohon` varchar(17) DEFAULT NULL,
  `foto_ktp` mediumblob DEFAULT NULL,
  `no_npwp` int(20) DEFAULT NULL,
  `foto_npwp` mediumblob DEFAULT NULL,
  `nama_usaha` varchar(50) NOT NULL,
  `alamat_usaha` text NOT NULL,
  `rt` int(3) DEFAULT NULL,
  `rw` int(3) DEFAULT NULL,
  `kelurahan` varchar(25) DEFAULT NULL,
  `kecamatan` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `no_hp_pemohon` varchar(14) DEFAULT NULL,
  `kop_surat` mediumblob DEFAULT NULL,
  `unit_kerja` varchar(50) DEFAULT NULL,
  `nama_pimpinan` varchar(50) DEFAULT NULL,
  `jenis_usaha` enum('Perusahaan','Kelompok','Perorangan','') DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_identitas_usaha`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.identitas_usaha_media
CREATE TABLE IF NOT EXISTS `identitas_usaha_media` (
  `id_media` int(25) NOT NULL AUTO_INCREMENT,
  `id_identitas_usaha` int(11) NOT NULL DEFAULT 0,
  `nama_media` varchar(150) NOT NULL DEFAULT '0',
  `mime_type` varchar(50) DEFAULT '0',
  `date_upload` datetime NOT NULL DEFAULT sysdate(),
  `kode_dokumen` int(11) NOT NULL,
  `visible` int(1) DEFAULT 1,
  PRIMARY KEY (`id_media`),
  KEY `identitas_usaha_media_FK` (`id_identitas_usaha`),
  KEY `identitas_usaha_media_FK_1` (`kode_dokumen`),
  CONSTRAINT `identitas_usaha_media_FK` FOREIGN KEY (`id_identitas_usaha`) REFERENCES `identitas_usaha` (`id_identitas_usaha`),
  CONSTRAINT `identitas_usaha_media_FK_1` FOREIGN KEY (`kode_dokumen`) REFERENCES `master_dokumen` (`kode_dokumen`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Untuk menampung media yang telah diunggah oleh user';

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.info_layanan
CREATE TABLE IF NOT EXISTS `info_layanan` (
  `kode_layanan` varchar(15) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `dasar_hukum` text DEFAULT NULL,
  `persyaratan` text DEFAULT NULL,
  `prosedur` text DEFAULT NULL,
  `biaya` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk view dishanpan_eokkpd.kec
-- Membuat tabel sementara untuk menangani kesalahan ketergantungan VIEW
CREATE TABLE `kec` (
	`kode_kec` VARCHAR(9) NOT NULL COLLATE 'utf8_general_ci',
	`nama_kec` VARCHAR(100) NULL COLLATE 'utf8_general_ci',
	`kode_kota` VARCHAR(6) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- membuang struktur untuk table dishanpan_eokkpd.kecamatan
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `kode_kec` varchar(9) NOT NULL,
  `nama_kec` varchar(100) DEFAULT NULL,
  `kode_kota` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`kode_kec`),
  KEY `kode_kota` (`kode_kota`),
  CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`kode_kota`) REFERENCES `kota` (`kode_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.keluhan_saran
CREATE TABLE IF NOT EXISTS `keluhan_saran` (
  `no_keluhan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `judul_keluhan` varchar(100) DEFAULT NULL,
  `pesan` text NOT NULL,
  `tanggal_keluhan` datetime NOT NULL DEFAULT current_timestamp(),
  `no_telp` varchar(17) DEFAULT NULL,
  `dokumen` text DEFAULT NULL,
  `jenis` enum('keluhan','saran') NOT NULL,
  PRIMARY KEY (`no_keluhan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.kelurahan
CREATE TABLE IF NOT EXISTS `kelurahan` (
  `kode_kel` varchar(13) NOT NULL,
  `nama_kel` varchar(50) DEFAULT NULL,
  `kode_kec` varchar(9) DEFAULT NULL,
  PRIMARY KEY (`kode_kel`),
  KEY `kode_kec` (`kode_kec`),
  CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`kode_kec`) REFERENCES `kecamatan` (`kode_kec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.komoditas_kelompok
CREATE TABLE IF NOT EXISTS `komoditas_kelompok` (
  `id_kelompok` varchar(10) NOT NULL,
  `nama_kelompok` varchar(50) NOT NULL,
  `nama_latin_kelompok` varchar(50) DEFAULT NULL,
  `id_sektor` varchar(3) NOT NULL,
  PRIMARY KEY (`id_kelompok`,`id_sektor`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.komoditas_sektor
CREATE TABLE IF NOT EXISTS `komoditas_sektor` (
  `id_sektor` varchar(3) NOT NULL,
  `nama_sektor_komoditas` varchar(50) NOT NULL,
  `nama_latin_sektor` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sektor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.kontak_kami
CREATE TABLE IF NOT EXISTS `kontak_kami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` text DEFAULT NULL,
  `nomor_telepon` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `facebook` varchar(30) DEFAULT NULL,
  `twitter` varchar(30) DEFAULT NULL,
  `instagram` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.kota
CREATE TABLE IF NOT EXISTS `kota` (
  `kode_kota` varchar(6) NOT NULL,
  `nama_kota` varchar(80) DEFAULT NULL,
  `kode_provinsi` varchar(4) DEFAULT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `nama_ketua` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_kota`),
  KEY `kode_provinsi` (`kode_provinsi`),
  CONSTRAINT `kota_ibfk_1` FOREIGN KEY (`kode_provinsi`) REFERENCES `provinsi` (`kode_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.layanan
CREATE TABLE IF NOT EXISTS `layanan` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `kode_layanan` varchar(15) NOT NULL,
  `id_identitas_usaha` int(11) NOT NULL,
  `kode_pendaftaran` varchar(25) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `level` int(2) NOT NULL DEFAULT 1,
  `tanggal_buat` datetime NOT NULL DEFAULT current_timestamp(),
  `syarat_teknis` text DEFAULT NULL,
  `manager_adm` date DEFAULT NULL,
  `w_inspeksi` date DEFAULT NULL,
  `w_ppc` date DEFAULT NULL,
  `w_hasil_mt` date DEFAULT NULL,
  `w_komtek` date DEFAULT NULL,
  `w_diterima` date DEFAULT NULL,
  `inspektor` int(11) DEFAULT NULL,
  `ppc` int(11) DEFAULT NULL,
  `pelaksana` int(11) DEFAULT NULL,
  `nama_inspektor` varchar(35) DEFAULT NULL,
  `nama_ppc` varchar(35) DEFAULT NULL,
  `nama_pelaksana` varchar(35) DEFAULT NULL,
  `tanggal_inspeksi` datetime DEFAULT NULL,
  `tanggal_pc` datetime DEFAULT NULL,
  `surat_tugas` text DEFAULT NULL,
  `tipe_surat_tugas` varchar(100) DEFAULT NULL,
  `status_ppc` int(2) NOT NULL,
  `ijin_inspektor` int(2) NOT NULL DEFAULT 0,
  `ijin_pelaksana` int(2) NOT NULL DEFAULT 0,
  `ijin_ppc` int(2) NOT NULL DEFAULT 0,
  `hasil_inspeksi` int(1) DEFAULT 0,
  `hasil_pelaksana` int(1) DEFAULT 0,
  `hasil_ppc` int(1) DEFAULT 0,
  `status_komtek` int(2) NOT NULL DEFAULT 0,
  `surat_pengantar_uji_sampel` int(2) NOT NULL DEFAULT 0,
  `laporan_hasil_uji` text DEFAULT NULL,
  `manager_tek` date DEFAULT NULL,
  `hasil_uji` mediumblob DEFAULT NULL,
  `status_hasil_uji` int(2) DEFAULT 0,
  `surat_pengantar_lab` mediumblob DEFAULT NULL,
  `tipe_surat_pengantar` varchar(100) DEFAULT NULL,
  `berita_acara` text DEFAULT NULL,
  `sertifikat` mediumblob DEFAULT NULL,
  `ditolak_oleh` int(11) DEFAULT NULL,
  `alasan_penolakan` text DEFAULT NULL,
  `tanggal_ditolak` date DEFAULT NULL,
  `form_inspeksi` mediumblob DEFAULT NULL,
  `form_ppc` mediumblob DEFAULT NULL,
  PRIMARY KEY (`uid`),
  KEY `layanan_ibfk_1` (`kode_layanan`),
  KEY `layanan_ibfk_2` (`id_identitas_usaha`),
  CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`kode_layanan`) REFERENCES `master_layanan` (`kode_layanan`) ON DELETE CASCADE,
  CONSTRAINT `layanan_ibfk_2` FOREIGN KEY (`id_identitas_usaha`) REFERENCES `identitas_usaha` (`id_identitas_usaha`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_dokumen
CREATE TABLE IF NOT EXISTS `master_dokumen` (
  `kode_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(255) DEFAULT NULL,
  `nama_dokumen` varchar(100) NOT NULL,
  `req_perorangan` int(1) DEFAULT 1,
  `req_non_perorangan` int(1) DEFAULT 1,
  PRIMARY KEY (`kode_dokumen`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_dokumen_inspeksi
CREATE TABLE IF NOT EXISTS `master_dokumen_inspeksi` (
  `id_dokumen` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dokumen` varchar(50) NOT NULL,
  `dokumen` mediumblob NOT NULL,
  `tipe_dokumen` varchar(100) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `kode_layanan` varchar(15) NOT NULL,
  `file` text DEFAULT NULL,
  PRIMARY KEY (`id_dokumen`),
  KEY `kode_layanan` (`kode_layanan`),
  CONSTRAINT `master_dokumen_inspeksi_ibfk_1` FOREIGN KEY (`kode_layanan`) REFERENCES `master_layanan` (`kode_layanan`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_form_inspeksi
CREATE TABLE IF NOT EXISTS `master_form_inspeksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text NOT NULL,
  `kode_layanan` varchar(15) DEFAULT NULL,
  `jenis` enum('inspektor','ppc') DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `dokumen` mediumblob DEFAULT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kode_layanan` (`kode_layanan`),
  KEY `parent` (`parent`),
  CONSTRAINT `master_form_inspeksi_ibfk_1` FOREIGN KEY (`kode_layanan`) REFERENCES `master_layanan` (`kode_layanan`),
  CONSTRAINT `master_form_inspeksi_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `master_form_inspeksi` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_form_uji
CREATE TABLE IF NOT EXISTS `master_form_uji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) NOT NULL,
  `kode_layanan` varchar(15) NOT NULL,
  `jenis_form` enum('ceklis','gambar') NOT NULL DEFAULT 'ceklis',
  `jenis` enum('inspeksi','ppc','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_kemasan
CREATE TABLE IF NOT EXISTS `master_kemasan` (
  `id_kemasan` int(4) NOT NULL AUTO_INCREMENT,
  `nama_kemasan` varchar(40) NOT NULL,
  PRIMARY KEY (`id_kemasan`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_komoditas
CREATE TABLE IF NOT EXISTS `master_komoditas` (
  `kode_komoditas` varchar(3) NOT NULL,
  `id_kelompok` varchar(10) NOT NULL,
  `id_sektor` varchar(10) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `nama_latin` varchar(100) DEFAULT NULL,
  `sertifikat` mediumblob DEFAULT NULL,
  `mime_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_komoditas`,`id_kelompok`,`id_sektor`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_kuesioner
CREATE TABLE IF NOT EXISTS `master_kuesioner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(300) DEFAULT NULL,
  `jenis` enum('okkpd','uji_mutu') DEFAULT NULL COMMENT 'jenis form (layanan)',
  `tipe` enum('Skor','Yes/No') DEFAULT NULL COMMENT 'tipe jawaban',
  `urutan` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_layanan
CREATE TABLE IF NOT EXISTS `master_layanan` (
  `kode_layanan` varchar(15) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `gambar` mediumblob NOT NULL,
  `status` int(1) DEFAULT 1,
  PRIMARY KEY (`kode_layanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_nama_gambar
CREATE TABLE IF NOT EXISTS `master_nama_gambar` (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gambar`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_role
CREATE TABLE IF NOT EXISTS `master_role` (
  `kode_role` varchar(10) NOT NULL,
  `nama_role` varchar(25) NOT NULL,
  PRIMARY KEY (`kode_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_satuan
CREATE TABLE IF NOT EXISTS `master_satuan` (
  `id_satuan` int(4) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_survey
CREATE TABLE IF NOT EXISTS `master_survey` (
  `id_survey` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_survey`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.master_syarat_teknis
CREATE TABLE IF NOT EXISTS `master_syarat_teknis` (
  `kode` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` varchar(100) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(35) NOT NULL,
  `slug` varchar(35) NOT NULL,
  `kode_role` varchar(10) NOT NULL,
  `parent` int(11) NOT NULL,
  `aktif` int(1) NOT NULL DEFAULT 1,
  `urutan` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `kode_role` (`kode_role`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`kode_role`) REFERENCES `master_role` (`kode_role`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `dari` int(11) NOT NULL,
  `kepada` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp(),
  `title` varchar(50) NOT NULL,
  `body` text DEFAULT NULL,
  `isread` int(1) NOT NULL DEFAULT 0,
  `id_layanan` int(11) NOT NULL,
  PRIMARY KEY (`id_notif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.panduan
CREATE TABLE IF NOT EXISTS `panduan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_panduan` varchar(50) NOT NULL,
  `panduan` mediumblob DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.pesan
CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime DEFAULT current_timestamp(),
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pesan` text DEFAULT NULL,
  `balasan` text DEFAULT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.produk_hukum
CREATE TABLE IF NOT EXISTS `produk_hukum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk_hukum` varchar(50) NOT NULL,
  `produk_hukum` mediumblob DEFAULT NULL,
  `tipe_dokumen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.provinsi
CREATE TABLE IF NOT EXISTS `provinsi` (
  `kode_provinsi` varchar(4) NOT NULL,
  `nama_provinsi` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kode_provinsi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.survey_data
CREATE TABLE IF NOT EXISTS `survey_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `no_telp` varchar(16) CHARACTER SET latin1 DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `kode_provinsi` varchar(4) CHARACTER SET latin1 DEFAULT NULL,
  `kode_kota` varchar(6) CHARACTER SET latin1 DEFAULT NULL,
  `kode_kecamatan` varchar(9) CHARACTER SET latin1 DEFAULT NULL,
  `pendidikan` enum('SD','SLTP','SLTA','Diploma','Sarjana','PascaSarjana') CHARACTER SET latin1 DEFAULT NULL,
  `pekerjaan` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `kode_layanan` varchar(15) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.survey_kuesioner
CREATE TABLE IF NOT EXISTS `survey_kuesioner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kuesioner` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `nilai` int(11) DEFAULT NULL,
  `kepentingan` int(11) DEFAULT NULL,
  `jawaban` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_survey_kuesioner_master_kuesioner` (`id_kuesioner`),
  KEY `FK_survey_kuesioner_survey_data` (`id_survey`),
  CONSTRAINT `FK_survey_kuesioner_master_kuesioner` FOREIGN KEY (`id_kuesioner`) REFERENCES `master_kuesioner` (`id`),
  CONSTRAINT `FK_survey_kuesioner_survey_data` FOREIGN KEY (`id_survey`) REFERENCES `survey_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.tautan
CREATE TABLE IF NOT EXISTS `tautan` (
  `id_tautan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tautan` varchar(50) NOT NULL,
  `alamat_tautan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tautan`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.tentang_kami
CREATE TABLE IF NOT EXISTS `tentang_kami` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visi_misi` text DEFAULT NULL,
  `struktur_organisasi` mediumblob DEFAULT NULL,
  `maklumat` text DEFAULT NULL,
  `tugas_fungsi` text DEFAULT NULL,
  `legalitas` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nip` int(25) DEFAULT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `kode_kota` varchar(6) DEFAULT NULL,
  `no_ktp` varchar(17) DEFAULT '-',
  `foto_ktp` text DEFAULT NULL,
  `siup` varchar(50) NOT NULL,
  `kode_role` varchar(10) NOT NULL,
  `foto_profil` mediumblob DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`,`kode_role`),
  UNIQUE KEY `username_2` (`username`,`no_ktp`,`siup`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk table dishanpan_eokkpd.user_survey
CREATE TABLE IF NOT EXISTS `user_survey` (
  `id_user_survey` int(11) NOT NULL AUTO_INCREMENT,
  `id_survey` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `point` int(1) NOT NULL,
  `komentar` text DEFAULT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user_survey`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Pengeluaran data tidak dipilih.

-- membuang struktur untuk trigger dishanpan_eokkpd.after_beri_tugas
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `after_beri_tugas` AFTER UPDATE ON `layanan` FOR EACH ROW begin 
 if(new.inspektor is not null and old.ijin_inspektor = 0 and new.ijin_inspektor = 1) then
 insert into notification values(null,0,new.inspektor,sysdate(),'Penugasan Inspeksi',concat("Anda ditugaskan untuk melaksanakan inspeksi kepada layanan dengan nomor pendaftaran : ",new.kode_pendaftaran),0, new.uid);
 
 elseif(new.pelaksana is not null and old.ijin_pelaksana = 0 and new.ijin_pelaksana = 1) then
 insert into notification values(null,0,new.pelaksana,sysdate(),'Penugasan Inspeksi',concat("Anda ditugaskan untuk melaksanakan inspeksi kepada layanan dengan nomor pendaftaran : ",new.kode_pendaftaran),0, new.uid);
 
 elseif(new.ppc is not null and old.ijin_ppc = 0 and new.ijin_ppc = 1) then
 insert into notification values(null,0,new.ppc,sysdate(),'Penugasan Inspeksi',concat("Anda ditugaskan untuk melaksanakan pengambilan contoh kepada layanan dengan nomor pendaftaran : ",new.kode_pendaftaran),0, new.uid);
 end if;
 end//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger dishanpan_eokkpd.after_proses_terima
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `after_proses_terima` AFTER UPDATE ON `layanan` FOR EACH ROW begin 
 if(new.manager_adm is not null and old.manager_adm is null) then
 	insert into notification values(null,0,(select id_user from identitas_usaha where id_identitas_usaha = 		new.id_identitas_usaha),sysdate(),'Informasi Layanan',concat("Layanan dengan kode pendaftaran ",new.kode_pendaftaran," diterima oleh Manager Admin"),0, new.uid);
    
    INSERT INTO notification (id_notif,dari,kepada,tanggal,title,body,isread,id_layanan)SELECT null,0,id_user,sysdate(),'Informasi Layanan',concat('Pendaftaran layanan baru masuk dengan kode pendaftaran ',new.kode_pendaftaran),0,new.uid FROM `user` WHERE kode_role= 'm_teknis';
    
 elseif (new.w_inspeksi is not null and old.w_inspeksi is null) THEN
 	insert into notification values(null,0,(select id_user from identitas_usaha where id_identitas_usaha = 		new.id_identitas_usaha),sysdate(),'Informasi Inspeksi',concat("Layanan dengan kode pendaftaran ",new.kode_pendaftaran," telah dilakukan inspeksi oleh petugas"),0, new.uid);
    
 elseif (new.w_ppc is not null and old.w_ppc is null) THEN
 	insert into notification values(null,0,(select id_user from identitas_usaha where id_identitas_usaha = 		new.id_identitas_usaha),sysdate(),'Informasi Inspeksi',concat("Layanan dengan kode pendaftaran ",new.kode_pendaftaran," telah dilakukan pengambilan contoh oleh petugas"),0, new.uid);
    
 elseif (new.w_hasil_mt is not null and old.w_hasil_mt is null) THEN
 	insert into notification values(null,0,(select id_user from identitas_usaha where id_identitas_usaha = 		new.id_identitas_usaha),sysdate(),'Informasi Layanan',concat("Layanan dengan kode pendaftaran ",new.kode_pendaftaran," telah disetujui oleh Manager Teknis"),0, new.uid);
    
 elseif (new.w_komtek is not null and old.w_komtek is null) THEN
 	insert into notification values(null,0,(select id_user from identitas_usaha where id_identitas_usaha = 		new.id_identitas_usaha),sysdate(),'Informasi Layanan',concat("Layanan dengan kode pendaftaran ",new.kode_pendaftaran," telah disetujui oleh Komisi Teknis"),0, new.uid);
    
 elseif (new.w_diterima is not null and old.w_diterima is null) THEN
 	insert into notification values(null,0,(select id_user from identitas_usaha where id_identitas_usaha = 		new.id_identitas_usaha),sysdate(),'Layanan Diterima',concat("Layanan dengan kode pendaftaran ",new.kode_pendaftaran," telah diterima"),0, new.uid);
 end if;
 end//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger dishanpan_eokkpd.after_tolak
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `after_tolak` AFTER UPDATE ON `layanan` FOR EACH ROW begin 
 if(new.alasan_penolakan is not null and old.alasan_penolakan is null) then
 insert into notification values(null,new.ditolak_oleh,(select id_user from identitas_usaha where id_identitas_usaha = 	new.id_identitas_usaha),sysdate(),'Layanan Ditolak',concat("Layanan dengan kode pendaftaran ",new.kode_pendaftaran," ditolak dengan alasan : ",new.alasan_penolakan),0, new.uid);
 end if;
 end//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk trigger dishanpan_eokkpd.after_unggah_dokumen
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `after_unggah_dokumen` AFTER UPDATE ON `layanan` FOR EACH ROW begin 
 if(old.kode_pendaftaran is null and new.kode_pendaftaran is not null) then
 	insert into notification 
    select null, (select id_user from identitas_usaha where id_identitas_usaha = new.id_identitas_usaha),id_user,sysdate(),'Pendaftaran Baru', 
    concat('Pendaftaran layanan baru masuk dengan kode pendaftaran ',new.kode_pendaftaran),0,new.uid from user where kode_role = 'm_adm';
 end if;
 end//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- membuang struktur untuk view dishanpan_eokkpd.kec
-- Menghapus tabel sementara dan menciptakan struktur VIEW terakhir
DROP TABLE IF EXISTS `kec`;
CREATE ALGORITHM=UNDEFINED DEFINER=`dishanpan`@`localhost` SQL SECURITY DEFINER VIEW `kec` AS SELECT `kecamatan`.`kode_kec` AS `kode_kec`, `kecamatan`.`nama_kec` AS `nama_kec`, `kecamatan`.`kode_kota` AS `kode_kota` FROM `kecamatan` GROUP BY `kecamatan`.`kode_kec` ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
