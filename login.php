<?php
require 'config.php';

if (current_user()) {
    go(current_user()['role'] === 'admin' ? 'admin/index.php' : 'pendaftar/index.php');
}

$err = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email   = strtolower(trim($_POST['email'] ?? ''));
    $pw      = $_POST['password'] ?? '';
    $allowed = login_rate($db, $email);

    $stmt = $db->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $u = $stmt->get_result()->fetch_assoc();

    $dummy = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2uheWG/igi.';
    $valid = password_verify($pw, $u['password'] ?? $dummy);

    if (!$allowed) {
        $err = 'Terlalu banyak percobaan login. Coba lagi 15 menit.';
    } elseif (!$u || !$valid || !(int) $u['is_active']) {
        $err = 'Email atau password salah.';
        audit($db, 'login_failed', 'Percobaan login gagal');
    } else {
        session_regenerate_id(true);
        $_SESSION['user'] = [
            'id'                   => $u['id'],
            'nama'                 => $u['nama'],
            'email'                => $u['email'],
            'role'                 => $u['role'],
            'must_change_password' => $u['must_change_password']
        ];

        audit($db, 'login_success', 'Login berhasil');

        if ($u['must_change_password']) {
            go('ganti-password.php');
        }

        go($u['role'] === 'admin' ? 'admin/index.php' : 'pendaftar/index.php');
    }
}

page_start('Masuk');
?>

<section class="section" style="max-width:550px; margin:auto;">
    <h2>Masuk ke SMK Coding</h2>

    <?php if ($err): ?>
        <div class="alert error"><?= e($err) ?></div>
    <?php endif; ?>

    <form method="post">
        <?= csrf_field() ?>
        <div class="field">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>
        <div class="field">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>
        <button>Masuk</button>
    </form>

    <p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>
    <p class="muted">Akun admin awal: admin@smkcoding.test &middot; password: password (wajib diganti).</p>
</section>

<?php page_end(); ?>