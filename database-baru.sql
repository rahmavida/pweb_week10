CREATE DATABASE IF NOT EXISTS pendaftaran_siswa 
    CHARACTER SET utf8mb4 
    COLLATE utf8mb4_unicode_ci;

USE pendaftaran_siswa;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS audit_log, pembayaran, calon_siswa, gelombang, jurusan, rate_limit_hits, users;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(190) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'pendaftar') NOT NULL DEFAULT 'pendaftar',
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    must_change_password TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE jurusan (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kode VARCHAR(10) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    kuota INT UNSIGNED NOT NULL DEFAULT 0,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE gelombang (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    tahun_ajaran VARCHAR(9) NOT NULL,
    tanggal_mulai DATE NOT NULL,
    tanggal_selesai DATE NOT NULL,
    biaya DECIMAL(12, 2) NOT NULL DEFAULT 0,
    is_active TINYINT(1) NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE calon_siswa (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL UNIQUE,
    no_pendaftaran VARCHAR(30) NOT NULL UNIQUE,
    nama VARCHAR(100) NOT NULL,
    nisn CHAR(10) NOT NULL UNIQUE,
    tempat_lahir VARCHAR(100) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    agama VARCHAR(30) NOT NULL,
    sekolah_asal VARCHAR(150) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    nama_ortu VARCHAR(100) NOT NULL,
    no_hp_ortu VARCHAR(20) NOT NULL,
    alamat TEXT NOT NULL,
    jurusan_id BIGINT UNSIGNED NOT NULL,
    gelombang_id BIGINT UNSIGNED NOT NULL,
    dokumen VARCHAR(255) NOT NULL,
    status ENUM('Menunggu Pembayaran', 'Menunggu Verifikasi', 'Terverifikasi', 'Diterima', 'Ditolak') NOT NULL DEFAULT 'Menunggu Pembayaran',
    catatan_admin TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_siswa_user FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT fk_siswa_jurusan FOREIGN KEY (jurusan_id) REFERENCES jurusan(id),
    CONSTRAINT fk_siswa_gelombang FOREIGN KEY (gelombang_id) REFERENCES gelombang(id)
) ENGINE=InnoDB;

CREATE TABLE pembayaran (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    calon_siswa_id BIGINT UNSIGNED NOT NULL,
    order_id VARCHAR(60) NOT NULL UNIQUE,
    amount DECIMAL(12, 2) NOT NULL,
    status ENUM('pending', 'settlement', 'capture', 'deny', 'cancel', 'expire', 'failure') NOT NULL DEFAULT 'pending',
    payment_type VARCHAR(50) NULL,
    raw_notification JSON NULL,
    paid_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (calon_siswa_id) REFERENCES calon_siswa(id)
) ENGINE=InnoDB;

CREATE TABLE rate_limit_hits (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    hit_key VARCHAR(190) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (hit_key, created_at)
) ENGINE=InnoDB;

CREATE TABLE audit_log (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,
    action VARCHAR(100) NOT NULL,
    detail TEXT NULL,
    ip_address VARCHAR(45),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX (created_at),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
) ENGINE=InnoDB;

INSERT INTO jurusan (kode, nama, kuota) VALUES
    ('RPL', 'Rekayasa Perangkat Lunak', 60),
    ('TKJ', 'Teknik Komputer dan Jaringan', 60),
    ('DKV', 'Desain Komunikasi Visual', 40);

INSERT INTO gelombang (nama, tahun_ajaran, tanggal_mulai, tanggal_selesai, biaya, is_active) VALUES
    ('Gelombang 1', '2026/2027', CURDATE(), DATE_ADD(CURDATE(), INTERVAL 90 DAY), 150000, 1);

INSERT INTO users (nama, email, password, role, must_change_password) VALUES
    ('Administrator', 'admin@smkcoding.test', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.', 'admin', 1);