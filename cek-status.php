<?php
require 'config.php';

$res = null;
$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $no  = trim($_POST['no_pendaftaran'] ?? '');
    $tgl = $_POST['tanggal_lahir'] ?? '';
    $ip  = $_SERVER['REMOTE_ADDR'] ?? '';

    if (!rate_limit($db, 'status:' . $ip, 15, 10)) {
        $err = 'Terlalu banyak permintaan. Coba lagi nanti.';
    } else {
        $stmt = $db->prepare("
            SELECT c.no_pendaftaran, c.nama, c.tanggal_lahir, c.status, c.catatan_admin, j.nama AS jurusan 
            FROM calon_siswa c 
            JOIN jurusan j ON j.id = c.jurusan_id 
            WHERE c.no_pendaftaran = ? AND c.tanggal_lahir = ?
        ");
        $stmt->bind_param('ss', $no, $tgl);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();

        if (!$res) {
            $err = 'Data tidak ditemukan. Periksa nomor pendaftaran dan tanggal lahir.';
        }
    }
}

page_start('Cek Status', 'cek-status.php');
?>

<section class="section" style="max-width:650px; margin:auto;">
    <h2>Cek Status Pendaftaran</h2>
    <p class="muted">Masukkan nomor pendaftaran dan tanggal lahir. Nama akan ditampilkan secara tersamar.</p>

    <?php if ($err): ?>
        <div class="alert error"><?= e($err) ?></div>
    <?php endif; ?>

    <form method="post">
        <?= csrf_field() ?>
        <div class="field">
            <label>Nomor pendaftaran</label>
            <input name="no_pendaftaran" required>
        </div>
        <div class="field">
            <label>Tanggal lahir</label>
            <input type="date" name="tanggal_lahir" required>
        </div>
        <button>Cek Status</button>
    </form>

    <?php if ($res): ?>
        <?php
        $parts  = explode(' ', $res['nama']);
        $masked = mb_substr($parts[0], 0, 1) . '***';
        if (count($parts) > 1) {
            $masked .= ' ' . mb_substr($parts[1], 0, 1) . '*****';
        }
        ?>
        <div class="notice">
            <p>Nama: <?= e($masked) ?></p>
            <p>Status: <b><?= e($res['status']) ?></b></p>
            <p>Jurusan: <?= e($res['jurusan']) ?></p>
            <?php if ($res['catatan_admin']): ?>
                <p>Catatan: <?= e($res['catatan_admin']) ?></p>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</section>

<?php page_end(); ?>