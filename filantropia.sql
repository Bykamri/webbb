CREATE DATABASE IF NOT EXISTS `filantropia` 
USE `filantropia`;

CREATE TABLE IF NOT EXISTS `donasi` (
  `donasi_id` int NOT NULL AUTO_INCREMENT,
  `donatur_id` int DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  `jumlah_donasi` decimal(15,2) DEFAULT NULL,
  `metode_pembayaran` enum('Transfer Bank','Kartu Kredit','E-Wallet') DEFAULT NULL,
  `status_donasi` enum('Menunggu','Sukses','Gagal') DEFAULT NULL,
  `tanggal_donasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`donasi_id`),
  KEY `donatur_id` (`donatur_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`donatur_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) DEFAULT NULL,
  `deskripsi` text,
  `target_donasi` decimal(15,2) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_berakhir` date DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `admin_id` int DEFAULT NULL,
  `gambar_utama` varchar(255) DEFAULT NULL,
  `gambar_tambahan_1` varchar(255) DEFAULT NULL,
  `gambar_tambahan_2` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`event_id`),
  KEY `admin_id` (`admin_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `notifikasi_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `pesan` text,
  `jenis` enum('Donasi','Event','Permintaan Bantuan') DEFAULT NULL,
  `status_baca` tinyint(1) DEFAULT '0',
  `tanggal_kirim` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`notifikasi_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `permintaan_bantuan` (
  `permintaan_id` int NOT NULL AUTO_INCREMENT,
  `penerima_id` int DEFAULT NULL,
  `deskripsi_kebutuhan` text,
  `jumlah_dibutuhkan` decimal(15,2) DEFAULT NULL,
  `status` enum('Baru','Diproses','Diterima','Ditolak') DEFAULT NULL,
  `tanggal_pengajuan` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`permintaan_id`),
  KEY `penerima_id` (`penerima_id`),
  CONSTRAINT `permintaan_bantuan_ibfk_1` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `pesan` (
  `pesan_id` int NOT NULL AUTO_INCREMENT,
  `pengirim_id` int DEFAULT NULL,
  `penerima_id` int DEFAULT NULL,
  `konten` text,
  `status_baca` tinyint(1) DEFAULT '0',
  `tanggal_kirim` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pesan_id`),
  KEY `pengirim_id` (`pengirim_id`),
  KEY `penerima_id` (`penerima_id`),
  CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`pengirim_id`) REFERENCES `users` (`user_id`),
  CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`penerima_id`) REFERENCES `users` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `nomor_telepon` varchar(20) DEFAULT NULL,
  `alamat` text,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','CS','Donatur','Penerima_Donasi') DEFAULT NULL,
  `preferensi_donasi` text,
  `status` enum('Aktif','Nonaktif') DEFAULT 'Aktif',
  `foto_profil` varchar(255) DEFAULT NULL,
  `foto_ktp` varchar(255) DEFAULT NULL,
  `tanggal_registrasi` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
