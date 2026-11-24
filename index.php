<?php
require 'config.php';
page_start('Beranda', 'index.php');

$j = $db->query("
    SELECT j.*, 
           (SELECT COUNT(*) FROM calon_siswa c WHERE c.jurusan_id = j.id AND c.status = 'Diterima') AS diterima 
    FROM jurusan j 
    WHERE is_active = 1
");
$wave = active_wave($db);
?>

<section class="hero">
    <p>PENERIMAAN SISWA BARU</p>
    <h1>SMK Coding</h1>
    <p>Sekolah kejuruan berbasis teknologi, kreativitas, dan keterampilan masa depan. Bangun kompetensi, wujudkan karya, raih masa depan.</p>
    <div class="actions" style="justify-content:center;">
        <a class="btn" href="register.php">Daftar Sekarang</a>
        <a class="btn btn-light" href="cek-status.php">Cek Status Pendaftaran</a>
    </div>
</section>

<section class="section">
    <h2>Selamat Datang di SMK Coding</h2>
    <p>SMK Coding merupakan sekolah dummy untuk demonstrasi sistem informasi sekolah dan penerimaan siswa baru secara daring.</p>
    <div class="grid">
        <a class="card feature" href="profil.php">
            <h3>Profil Sekolah</h3>
            <p>Kenali visi, misi, dan fasilitas sekolah.</p>
        </a>
        <a class="card feature" href="jurusan.php">
            <h3>Program Keahlian</h3>
            <p>Pilih bidang keahlian sesuai minatmu.</p>
        </a>
        <a class="card feature" href="berita.php">
            <h3>Berita Sekolah</h3>
            <p>Informasi dan kegiatan terbaru.</p>
        </a>
        <a class="card feature" href="galeri.php">
            <h3>Galeri</h3>
            <p>Dokumentasi kegiatan sekolah.</p>
        </a>
    </div>
</section>

<section class="section">
    <h2>Program Keahlian dan Kuota</h2>
    <div class="grid">
        <?php while ($x = $j->fetch_assoc()): ?>
            <div class="card">
                <h3><?= e($x['nama']) ?></h3>
                <p>Kode: <?= e($x['kode']) ?></p>
                <p>
                    Kuota: <?= e($x['kuota']) ?> &middot; 
                    Diterima: <?= e($x['diterima']) ?> &middot; 
                    Sisa: <?= max(0, $x['kuota'] - $x['diterima']) ?>
                </p>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="section">
    <h2>Informasi SPMB</h2>
    <?php if ($wave): ?>
        <p>Gelombang aktif: <b><?= e($wave['nama']) ?></b> (<?= e($wave['tahun_ajaran']) ?>), biaya <?= rupiah($wave['biaya']) ?>.</p>
    <?php else: ?>
        <p>Pendaftaran saat ini belum dibuka. Silakan cek kembali secara berkala.</p>
    <?php endif; ?>
</section>

<?php page_end(); ?>