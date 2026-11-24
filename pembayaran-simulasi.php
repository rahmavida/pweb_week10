<?php
require 'config.php';
require_role('pendaftar');

$id  = (int) ($_GET['id'] ?? 0);
$uid = current_user()['id'];

$stmt = $db->prepare("
    SELECT p.*, c.user_id 
    FROM pembayaran p 
    JOIN calon_siswa c ON c.id = p.calon_siswa_id 
    WHERE p.id = ? AND c.user_id = ?
");
$stmt->bind_param('ii', $id, $uid);
$stmt->execute();
$p = $stmt->get_result()->fetch_assoc();

if (!$p) {
    http_response_code(404);
    exit('Tagihan tidak ditemukan');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("
        UPDATE pembayaran 
        SET status = 'settlement', payment_type = 'mock', paid_at = NOW() 
        WHERE id = ? AND status = 'pending'
    ");
    $stmt->bind_param('i', $id);
    $stmt->execute();

    $stmt = $db->prepare("
        UPDATE calon_siswa 
        SET status = 'Menunggu Verifikasi' 
        WHERE id = ? AND status = 'Menunggu Pembayaran'
    ");
    $stmt->bind_param('i', $p['calon_siswa_id']);
    $stmt->execute();

    audit($db, 'payment_mock_settlement', 'Pembayaran simulasi lunas');
    flash('success', 'Pembayaran simulasi berhasil. Status menunggu verifikasi.');
    go('pendaftar/index.php');
}

page_start('Simulasi Pembayaran');
?>

<section class="section">
    <h2>Simulasi Pembayaran</h2>
    <p>Tagihan <?= e($p['order_id']) ?> &middot; <?= rupiah($p['amount']) ?></p>
    <p>Tekan tombol di bawah untuk mensimulasikan pembayaran berhasil.</p>

    <form method="post">
        <?= csrf_field() ?>
        <button>Simulasikan Pembayaran Berhasil</button>
    </form>
</section>

<?php page_end(); ?>