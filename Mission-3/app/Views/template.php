<!DOCTYPE html>
<html lang="id">
<head>
    <title><?= esc($title) ?> | Website Akademik</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f4f7f6; color: #333; display: flex; flex-direction: column; min-height: 100vh; }
        .header { background: linear-gradient(90deg, #0052D4, #4364F7, #6FB1FC); color: #fff; padding: 20px; text-align: center; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .header h2 { margin: 0; font-size: 2em; }
        .menu { background-color: #fff; text-align: center; border-bottom: 1px solid #ddd; }
        .menu a { display: inline-block; padding: 15px 20px; text-decoration: none; color: #0052D4; font-weight: bold; transition: background-color 0.3s, color 0.3s; }
        .menu a:hover, .menu a.active { background-color: #0052D4; color: #fff; }
        .container { max-width: 1000px; margin: 20px auto; padding: 0 20px; flex-grow: 1; }
        .content { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); min-height: 300px; }
        .footer { background-color: #343a40; color: #fff; text-align: center; padding: 15px; margin-top: 30px; }
        .table-mahasiswa { border-collapse: collapse; width: 100%; margin-top: 20px; box-shadow: 0 2px 3px rgba(0,0,0,0.1); }
        .table-mahasiswa th, .table-mahasiswa td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .table-mahasiswa th { background-color: #4364F7; color: white; text-transform: uppercase; font-size: 0.9em; }
        .table-mahasiswa tr:nth-child(even) { background-color: #f8f9fa; }
        .table-mahasiswa tr:hover { background-color: #e9ecef; }
        .btn-detail { display: inline-block; padding: 5px 10px; font-size: 0.8em; color: #fff; background-color: #28a745; border-radius: 4px; text-decoration: none; text-align: center; }
        .btn-detail:hover { background-color: #218838; }
        .btn-kembali { display: inline-block; margin-top: 20px; padding: 10px 15px; color: #fff; background-color: #6c757d; border-radius: 5px; text-decoration: none; }
        .btn-kembali:hover { background-color: #5a6268; }
        .detail-box p { font-size: 1.1em; line-height: 1.6; border-bottom: 1px solid #eee; padding-bottom: 10px; }
        .detail-box p strong { display: inline-block; width: 80px; color: #555; }
        .alert-success { padding: 15px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: 4px; margin-bottom: 20px; text-align: center;}
        .alert-error { padding: 15px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: 4px; margin-bottom: 20px; text-align: center;}
    </style>
</head>
<body>

    <div class="header">
        <h2>Sistem Informasi Akademik</h2>
    </div>

    <div class="menu">
        <?php if (session()->get('isLoggedIn')): ?>
            <?php $role = session()->get('role'); ?>
            <a href="<?= base_url('home') ?>">Home</a>
            <?php if ($role == 'Admin'): ?>
                <a href="<?= base_url('mahasiswa') ?>">Kelola Mahasiswa</a>
                <a href="<?= base_url('course') ?>">Kelola Mata Kuliah</a> 
            <?php endif; ?>
            <?php if ($role == 'Mahasiswa'): ?>
                <a href="<?= base_url('mahasiswa/profil') ?>">Profil Saya</a>
                <a href="<?= base_url('enrollment') ?>">Ambil Mata Kuliah</a> 
            <?php endif; ?>
            <a href="<?= base_url('logout') ?>">Logout (<?= session()->get('username') ?>)</a>
        <?php else: ?>
            <a href="<?= base_url('home') ?>">Home</a>
            <a href="<?= base_url('login') ?>">Login</a>
        <?php endif; ?>
    </div>
    <div class="container">
        
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert-error">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <div class="content">
            <?= $content ?>
        </div>
    </div>
    </div>
    <div class="footer">
        <p>&copy; <?= date('Y') ?> by: Hisyam Khaeru Umam</p>
    </div>
</body>
</html>