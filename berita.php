<?php
require 'config.php';
page_start('Berita Sekolah', 'berita.php');

$berita = [
    [
        'judul' => 'Pembukaan Pendaftaran Siswa Baru',
        'isi'   => 'Pendaftaran siswa baru dibuka melalui sistem online. Buat akun dan lengkapi biodata untuk memulai.'
    ],
    [
        'judul' => 'Workshop Pemrograman Web',
        'isi'   => 'Siswa mengikuti praktik pembuatan website menggunakan HTML, CSS, dan PHP.'
    ],
    [
        'judul' => 'Pameran Karya Siswa',
        'isi'   => 'Karya aplikasi, desain, dan jaringan komputer ditampilkan dalam pameran proyek.'
    ]
];
?>

<section class="hero">
    <h1>Berita &amp; Pengumuman</h1>
    <p>Informasi kegiatan, agenda, dan kabar terbaru SMK Coding.</p>
</section>

<section class="section">
    <div class="news-grid">
        <?php foreach ($berita as $n): ?>
            <article class="news-card">
                <div class="news-card-body">
                    <p class="news-date"><?= date('d-m-Y') ?></p>
                    <h3><?= e($n['judul']) ?></h3>
                    <p><?= e($n['isi']) ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="section">
    <h2>Pengumuman</h2>
    <div class="notice">
        Pastikan data biodata dan dokumen yang diunggah sudah benar sebelum mengirim pendaftaran.
    </div>
    <div class="notice">
        Pantau status pendaftaran melalui dashboard atau menu Cek Status.
    </div>
</section>

<?php page_end(); ?>