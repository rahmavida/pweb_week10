<?php
require 'config.php';
require_role('pendaftar');

$uid = current_user()['id'];

$stmt = $db->prepare("
    SELECT c.*, j.nama AS jurusan, g.nama AS gelombang 
    FROM calon_siswa c 
    JOIN jurusan j ON j.id = c.jurusan_id 
    JOIN gelombang g ON g.id = c.gelombang_id 
    WHERE c.user_id = ? 
      AND c.status IN ('Menunggu Verifikasi', 'Terverifikasi', 'Diterima')
");
$stmt->bind_param('i', $uid);
$stmt->execute();
$c = $stmt->get_result()->fetch_assoc();

if (!$c) {
    http_response_code(403);
    exit('Bukti belum tersedia.');
}

page_start('Bukti Pendaftaran');
?>

<section class="section">
    <h2>Bukti Pendaftaran SMK Coding</h2>
    <p>Nomor pendaftaran: <b><?= e($c['no_pendaftaran']) ?></b></p>
    <p>Nama: <?= e($c['nama']) ?></p>
    <p>Jurusan: <?= e($c['jurusan']) ?></p>
    <p>Gelombang: <?= e($c['gelombang']) ?></p>
    <p>Status: <?= e($c['status']) ?></p>
    <button onclick="window.print()">Cetak Bukti</button>
</section>

<?php page_end(); ?>