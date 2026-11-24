<?php
require 'config.php';
require_login();

$id = (int) ($_GET['id'] ?? 0);

$stmt = $db->prepare("SELECT c.dokumen, c.user_id FROM calon_siswa c WHERE c.id = ?");
$stmt->bind_param('i', $id);
$stmt->execute();
$c = $stmt->get_result()->fetch_assoc();

$user = current_user();
if (!$c || ($user['role'] !== 'admin' && (int) $c['user_id'] !== (int) $user['id'])) {
    http_response_code(404);
    exit('Dokumen tidak ditemukan');
}

$path = __DIR__ . '/uploads/' . $c['dokumen'];
if (!is_file($path)) {
    http_response_code(404);
    exit('File tidak tersedia');
}

$mime = (new finfo(FILEINFO_MIME_TYPE))->file($path);

header('Content-Type: ' . $mime);
header('Content-Disposition: inline; filename="dokumen-pendaftar"');
readfile($path);
exit;