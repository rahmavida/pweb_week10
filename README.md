# LAPORAN SPESIFIKASI PROYEK WEBSITE
# SMK CODING — SISTEM PENDAFTARAN SISWA BARU

## 1. Referensi Proyek

Proyek ini dikembangkan dengan mengacu pada materi **Aplikasi Pendaftaran Siswa Baru menggunakan PHP dan MySQL** dari Petani Kode.

Referensi yang digunakan:

- Tutorial: [Membuat Aplikasi CRUD – Studi Kasus Pendaftaran Siswa Baru](https://fajarbaskoro.blogspot.com/2022/11/crud-2-pendaftaran-siswa-baru.html)
- Source Code GitHub: [Petani Kode – Tutorial PHP MySQL](https://github.com/petanikode/tutorial-php-mysql)
- Referensi materi: [Petani Kode – Tutorial PHP dan MySQL](https://www.petanikode.com/tutorial-php-mysql/)

Konsep utama yang diterapkan adalah CRUD (*Create, Read, Update, Delete*) menggunakan PHP dan MySQL untuk mengelola data calon siswa. Konsep tersebut kemudian dikembangkan menjadi website sekolah yang memiliki halaman informasi, sistem pendaftaran online, dashboard admin, autentikasi pengguna, dan pengelolaan data pendaftar.

## 2. Spesifikasi Proyek Website

### A. Nama Proyek

**SMK Coding — Website Sekolah dan Sistem Penerimaan Siswa Baru**

### B. Deskripsi Proyek

SMK Coding merupakan proyek pengembangan website sekolah berbasis web yang menyediakan informasi mengenai profil sekolah, jurusan, berita, dan galeri kegiatan sekolah. Selain itu, website ini dilengkapi dengan sistem Penerimaan Siswa Baru (SPMB) secara online.

Sistem ini dirancang agar calon peserta didik dapat melakukan registrasi akun, mengisi formulir pendaftaran, mengunggah dokumen persyaratan, dan memeriksa status pendaftaran secara online.

Website juga menyediakan dashboard admin untuk membantu pengelolaan data calon peserta didik, jurusan, gelombang pendaftaran, dan pembayaran.

Proyek dikembangkan menggunakan PHP Native sebagai bahasa pemrograman Back End dan HTML, CSS, serta JavaScript sebagai teknologi Front End. MySQL digunakan sebagai sistem basis data.

### C. Tujuan Proyek

1. Membuat website sekolah sebagai media penyampaian informasi secara online.
2. Mempermudah calon peserta didik dalam melakukan pendaftaran.
3. Mengimplementasikan konsep CRUD untuk pengelolaan data siswa.
4. Menerapkan hubungan antara Front End, Back End, dan database.
5. Membuat sistem autentikasi untuk membedakan hak akses pengguna dan admin.
6. Menerapkan keamanan dasar dalam pengembangan aplikasi web.
7. Mengenalkan penggunaan API dalam pengembangan sistem, termasuk konsep integrasi Payment Gateway.

### D. Fitur Proyek

**1. Fitur Halaman Publik**
- Halaman beranda.
- Halaman profil sekolah.
- Halaman informasi jurusan.
- Halaman berita sekolah.
- Halaman galeri kegiatan.
- Informasi pendaftaran siswa baru.
- Pengecekan status pendaftaran.

**2. Fitur Calon Peserta Didik**
- Registrasi akun.
- Login dan logout.
- Pengisian formulir pendaftaran.
- Pengelolaan biodata pendaftar.
- Unggah dokumen persyaratan.
- Melihat nomor pendaftaran.
- Melihat status pendaftaran.
- Melihat dan mencetak bukti pendaftaran.
- Mengganti password.

**3. Fitur Admin**
- Login admin.
- Dashboard admin.
- Melihat data calon peserta didik.
- Mengelola data pendaftar.
- Mengelola informasi jurusan.
- Mengelola gelombang pendaftaran.
- Mengelola informasi pembayaran.
- Melihat audit log aktivitas.
- Mengekspor data pendaftar ke CSV.

### E. Rencana Implementasi

Pengembangan proyek direncanakan melalui beberapa tahap:

| Tahap | Kegiatan |
|---|---|
| 1. Analisis | Menentukan kebutuhan website sekolah dan sistem pendaftaran |
| 2. Perancangan | Membuat rancangan tampilan, struktur database, dan alur sistem |
| 3. Front End | Membuat halaman website menggunakan HTML, CSS, dan JavaScript |
| 4. Back End | Mengembangkan fungsi sistem menggunakan PHP |
| 5. Database | Membuat database MySQL dan tabel untuk menyimpan data |
| 6. Autentikasi | Mengembangkan registrasi, login, logout, dan hak akses |
| 7. Pengelolaan Data | Mengembangkan fitur CRUD untuk data pendaftar dan data pendukung |
| 8. API | Membuat endpoint API dan menyiapkan konsep integrasi Payment Gateway |
| 9. Pengujian | Menguji fungsi website, validasi data, keamanan, dan alur pendaftaran |
| 10. Publikasi | Mengunggah source code ke GitHub dan menyiapkan website untuk deployment |

## 3. Ruang Lingkup Proyek

Ruang lingkup proyek SMK Coding meliputi beberapa bagian berikut.

### A. Pengelolaan Data

Pengelolaan data merupakan bagian yang digunakan untuk menyimpan, menampilkan, mengubah, dan menghapus data yang berkaitan dengan proses pendaftaran siswa baru.

Data yang dikelola meliputi:

1. **Data Pengguna**
   - ID pengguna.
   - Nama pengguna.
   - Email.
   - Password yang telah di-hash.
   - Hak akses pengguna.

2. **Data Calon Peserta Didik**
   - Nomor pendaftaran.
   - Nama lengkap.
   - Biodata calon peserta didik.
   - Alamat.
   - Data sekolah asal.
   - Jurusan yang dipilih.
   - Status pendaftaran.

3. **Data Jurusan**
   - Nama jurusan.
   - Deskripsi jurusan.
   - Informasi jurusan.

4. **Data Gelombang Pendaftaran**
   - Nama gelombang.
   - Periode pendaftaran.
   - Kuota pendaftaran.
   - Status gelombang.

5. **Data Pembayaran**
   - Informasi pembayaran.
   - Status pembayaran.
   - Riwayat atau informasi transaksi.

6. **Data Dokumen**
   - Dokumen persyaratan.
   - File yang diunggah calon peserta didik.
   - Informasi dokumen pendaftaran.

Pengelolaan data menerapkan konsep CRUD:

- **Create:** Menambahkan data baru.
- **Read:** Menampilkan data yang tersimpan.
- **Update:** Mengubah data yang sudah ada.
- **Delete:** Menghapus data sesuai hak akses.

### B. Logika Bisnis

Logika bisnis merupakan proses yang mengatur bagaimana sistem bekerja sesuai dengan kebutuhan pendaftaran siswa baru.

Alur proses sistem:

1. Calon peserta didik membuka website SMK Coding.
2. Calon peserta didik melakukan registrasi akun.
3. Pengguna melakukan login.
4. Pengguna mengisi formulir pendaftaran.
5. Sistem melakukan validasi terhadap data yang dimasukkan.
6. Sistem menyimpan data pendaftaran ke database.
7. Sistem menghasilkan nomor pendaftaran.
8. Pengguna dapat mengunggah dokumen persyaratan.
9. Pengguna dapat melihat status pendaftaran.
10. Admin memeriksa dan mengelola data pendaftar.
11. Admin dapat memperbarui informasi atau status pendaftaran sesuai kewenangannya.

Logika bisnis juga mencakup:
- Validasi formulir pendaftaran.
- Pengecekan kelengkapan data.
- Pengaturan gelombang pendaftaran.
- Pengaturan kuota pendaftaran.
- Pengelolaan status pendaftaran.
- Pengelolaan informasi pembayaran.

### C. Autentikasi dan Security

Autentikasi digunakan untuk memastikan bahwa pengguna yang mengakses sistem merupakan pengguna yang telah terdaftar dan memiliki hak akses yang sesuai.

Fitur autentikasi:
- Registrasi akun pengguna.
- Login menggunakan email dan password.
- Logout.
- Penggantian password.
- Pembatasan akses berdasarkan peran pengguna.
- Pengelolaan sesi login.

Penerapan keamanan dasar:
- Password disimpan menggunakan metode hashing.
- Perlindungan CSRF (*Cross-Site Request Forgery*).
- Validasi input pengguna.
- Pengaturan sesi login dan batas waktu sesi tidak aktif.
- Rate limiting dasar untuk membatasi percobaan akses.
- Pengaturan keamanan header HTTP.
- Pembatasan akses terhadap halaman admin.
- Pengaturan keamanan folder upload.

Tujuan penerapan keamanan adalah menjaga kerahasiaan data pengguna, mengurangi risiko akses tidak sah, dan melindungi informasi yang tersimpan di dalam database.

### D. API (Application Programming Interface)

API merupakan antarmuka yang memungkinkan suatu bagian aplikasi berkomunikasi dengan bagian aplikasi lainnya atau dengan layanan eksternal.

Pada proyek SMK Coding, API digunakan untuk mendukung pertukaran data dan pengembangan fitur sistem.

Beberapa endpoint API yang disediakan dalam proyek:

| Endpoint | Fungsi |
|---|---|
| `api/jurusan.php` | Menyediakan informasi jurusan |
| `api/status.php` | Menyediakan informasi status pendaftaran |
| `api/pembayaran-buat.php` | Menangani proses pembuatan pembayaran |
| `api/pembayaran-notifikasi.php` | Menangani notifikasi pembayaran |

**Rencana Integrasi Payment Gateway**

Salah satu pengembangan API yang direncanakan adalah integrasi Payment Gateway, misalnya Midtrans.

Payment Gateway digunakan untuk menghubungkan sistem pendaftaran dengan layanan pembayaran online sehingga calon peserta didik dapat melakukan pembayaran secara digital.

Rencana alur integrasi:

1. Pengguna memilih metode pembayaran.
2. Sistem mengirimkan permintaan transaksi ke layanan Payment Gateway.
3. Payment Gateway menghasilkan informasi transaksi atau instruksi pembayaran.
4. Pengguna menyelesaikan pembayaran melalui layanan yang tersedia.
5. Payment Gateway mengirimkan notifikasi transaksi kepada sistem.
6. Sistem memproses notifikasi dan memperbarui status pembayaran.

**Status Implementasi API dan Payment Gateway:**

- Endpoint API dasar sudah tersedia dalam struktur proyek.
- Fitur pembayaran saat ini masih menggunakan simulasi (*mock payment*).
- Integrasi Midtrans Snap untuk transaksi pembayaran sungguhan belum diselesaikan.
- Integrasi pembayaran sungguhan memerlukan konfigurasi akun penyedia layanan, API key, URL notifikasi, dan pengujian transaksi.

Dengan demikian, API dan Payment Gateway menjadi bagian dari ruang lingkup pengembangan sistem, tetapi integrasi pembayaran produksi masih merupakan rencana pengembangan lanjutan.

## 4. Teknologi yang Digunakan

| Teknologi | Kegunaan |
|---|---|
| HTML5 | Membuat struktur halaman website |
| CSS3 | Mengatur desain dan tampilan website |
| JavaScript | Menambahkan interaksi pada halaman |
| PHP Native | Mengelola proses Back End |
| MySQL | Menyimpan data aplikasi |
| Apache | Menjalankan website pada server |
| XAMPP | Lingkungan server lokal |
| phpMyAdmin | Mengelola database MySQL |
| GitHub | Menyimpan dan mengelola source code |

## 5. Pembagian Front End dan Back End

### Front End

Front End merupakan bagian website yang berinteraksi langsung dengan pengguna.

Pada proyek SMK Coding, bagian Front End meliputi:
- Tampilan halaman utama.
- Navigasi website.
- Halaman profil sekolah.
- Halaman jurusan.
- Halaman berita dan galeri.
- Formulir registrasi dan login.
- Formulir pendaftaran.
- Dashboard pengguna.
- Tampilan dashboard admin.

Desain website menggunakan kombinasi warna maroon, krem, dan putih agar memiliki tampilan yang konsisten dan mudah digunakan.

### Back End

Back End merupakan bagian sistem yang mengelola proses dan data di sisi server.

Pada proyek SMK Coding, bagian Back End meliputi:
- Koneksi PHP dengan database MySQL.
- Proses registrasi dan login.
- Pengelolaan sesi pengguna.
- Pemrosesan formulir pendaftaran.
- Pengelolaan data menggunakan CRUD.
- Validasi data.
- Pengelolaan dokumen.
- Pengelolaan status pendaftaran.
- Pengelolaan data admin.
- Endpoint API.
- Proses simulasi pembayaran.

## 6. Cara Menjalankan Proyek

### Persyaratan

- XAMPP atau aplikasi server lokal sejenis.
- PHP.
- MySQL atau MariaDB.
- Browser.
- Git (opsional).

### Langkah Instalasi

1. Download atau clone repository proyek.
2. Ekstrak folder proyek ke direktori `htdocs` jika menggunakan XAMPP.
3. Salin `.env.example` menjadi `.env`.
4. Sesuaikan konfigurasi database pada file `.env`.
5. Jalankan Apache dan MySQL.
6. Buka phpMyAdmin.
7. Buat database sesuai nama pada konfigurasi `.env`.
8. Import file `database-baru.sql`.
9. Pastikan folder `uploads` dapat digunakan oleh aplikasi.
10. Buka website melalui browser.

Alamat lokal:

```text
http://localhost/smk-coding-terintegrasi/
```

**Catatan:** Backup database lama sebelum mengimpor `database-baru.sql`, karena file tersebut membuat ulang tabel dengan nama yang sama.

## 7. Kesimpulan

Proyek SMK Coding merupakan pengembangan aplikasi pendaftaran siswa baru berbasis web dengan menggunakan PHP Native dan MySQL. Proyek ini menerapkan konsep CRUD sebagai dasar pengelolaan data, kemudian dikembangkan dengan penambahan halaman informasi sekolah, autentikasi pengguna, dashboard admin, pengelolaan dokumen, dan API.

Melalui proyek ini, konsep pengembangan Front End dan Back End dapat diterapkan dalam satu sistem yang saling terhubung. Selain itu, proyek ini juga menerapkan keamanan dasar serta menyediakan dasar pengembangan integrasi Payment Gateway.

Sistem pembayaran yang tersedia saat ini masih berupa simulasi sehingga integrasi pembayaran sungguhan menjadi salah satu rencana pengembangan berikutnya.

## 8. Referensi

1. Petani Kode. *Tutorial PHP dan MySQL: Membuat Aplikasi CRUD (Studi Kasus Pendaftaran Siswa Baru).* https://www.petanikode.com/tutorial-php-mysql/
2. Petani Kode. *Source Code Tutorial PHP dan MySQL.* https://github.com/petanikode/tutorial-php-mysql
3. Fajar Baskoro. *Aplikasi Pendaftaran Siswa Baru.* https://fajarbaskoro.blogspot.com/2022/11/crud-2-pendaftaran-siswa-baru.html

---

**Nama Proyek:** SMK Coding  
**Jenis Proyek:** Website Sekolah dan Sistem Pendaftaran Siswa Baru  
**Bahasa Pemrograman:** PHP, HTML, CSS, JavaScript  
**Database:** MySQL  
**Platform Pengembangan:** XAMPP dan GitHub
