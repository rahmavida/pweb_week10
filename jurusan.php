<?php
require 'config.php';
page_start('Akademik', 'jurusan.php');

$r = $db->query("
    SELECT j.*, 
           (SELECT COUNT(*) FROM calon_siswa c WHERE c.jurusan_id = j.id AND c.status = 'Diterima') AS diterima 
    FROM jurusan j 
    WHERE is_active = 1 
    ORDER BY nama
");
?>

<section class="hero">
    <h1>Akademik &amp; Program Keahlian</h1>
    <p>Pilih program keahlian sesuai minat, bakat, dan rencana masa depanmu.</p>
</section>

<section class="section">
    <h2>Program Keahlian</h2>
    <div class="grid">
        <?php while ($j = $r->fetch_assoc()): ?>
            <div class="card">
                <h3><?= e($j['nama']) ?></h3>
                <p><?= e($j['kode']) ?></p>
                <p>
                    Kuota <?= e($j['kuota']) ?> siswa &middot; 
                    Sisa kursi <?= max(0, $j['kuota'] - $j['diterima']) ?>
                </p>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<section class="section">
    <h2>Program Pembelajaran</h2>
    <div class="grid">
        <div class="card">
            <h3>Project Based Learning</h3>
            <p>Belajar melalui proyek nyata dan portofolio.</p>
        </div>
        <div class="card">
            <h3>Praktik Industri</h3>
            <p>Mengenal lingkungan kerja dan kebutuhan industri.</p>
        </div>
        <div class="card">
            <h3>Sertifikasi Kompetensi</h3>
            <p>Mempersiapkan kompetensi sesuai bidang keahlian.</p>
        </div>
    </div>
</section>

<?php page_end(); ?>