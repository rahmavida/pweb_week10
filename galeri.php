<?php
require 'config.php';
page_start('Galeri Sekolah', 'galeri.php');

$galeri = [
    'Praktik Laboratorium',
    'Karya Desain',
    'Pemrograman',
    'Praktik Jaringan',
    'Pameran Karya',
    'Kolaborasi Siswa'
];
?>

<section class="hero">
    <h1>Galeri SMK Coding</h1>
    <p>Dokumentasi kegiatan belajar, praktik, dan kreativitas siswa.</p>
</section>

<section class="section">
    <div class="gallery-grid">
        <?php foreach ($galeri as $item): ?>
            <div class="card feature">
                <h3><?= e($item) ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php page_end(); ?>