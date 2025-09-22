<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?> | Sistem Informasi Akademik</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        /* --- Reset & Body --- */
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background-color: #f1f5f9; /* Warna latar belakang abu-abu muda */
            color: #334155;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* --- Header & Navigasi --- */
        .header {
            background: linear-gradient(90deg, #1e3a8a, #2563eb);
            color: #fff;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
        }
        .header h2 { margin: 0; font-weight: 700; }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .nav-container {
            width: 1100px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-list {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .nav-item a {
            display: inline-block;
            padding: 1rem 1.5rem;
            text-decoration: none;
            color: #475569;
            font-weight: 500;
            border-bottom: 3px solid transparent;
            transition: all 0.2s ease-in-out;
        }
        .nav-item a:hover {
            color: #1d4ed8;
            border-bottom-color: #1d4ed8;
        }
        .nav-item a.active {
            color: #1d4ed8;
            border-bottom-color: #1d4ed8;
            font-weight: 700;
        }
        
        /* --- Konten Utama --- */
        .container {
            max-width: 1100px;
            margin: 2rem auto;
            padding: 0 1rem;
            flex-grow: 1;
        }
        .content-card {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1);
        }

        /* --- Footer --- */
        .footer {
            background-color: #0f172a;
            color: #94a3b8;
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        /* --- Komponen (Tabel, Tombol, Form) --- */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
        }
        .table th, .table td {
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem;
            text-align: left;
            vertical-align: middle;
        }
        .table th {
            background-color: #f8fafc;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            color: #64748b;
        }
        .table tr:hover { background-color: #f8fafc; }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-weight: 500;
            border: 1px solid transparent;
            transition: all 0.2s;
            cursor: pointer;
            font-size: 0.875rem;
        }
        .btn-primary { background-color: #2563eb; color: #fff; }
        .btn-primary:hover { background-color: #1d4ed8; }
        .btn-secondary { background-color: #e2e8f0; color: #334155; }
        .btn-secondary:hover { background-color: #cbd5e1; }
        .btn-info { background-color: #0ea5e9; color: #fff; }
        .btn-warning { background-color: #f59e0b; color: #fff; }
        .btn-danger { background-color: #ef4444; color: #fff; }
        .btn-success { background-color: #16a34a; color: #fff; }
        .btn-sm { padding: 0.375rem 0.75rem; font-size: 0.8rem; }

        .form-group { margin-bottom: 1.5rem; }
        .form-label { display: block; margin-bottom: 0.5rem; font-weight: 500; }
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e1;
            border-radius: 0.375rem;
            box-sizing: border-box;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.2);
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 0.375rem;
            border: 1px solid transparent;
        }
        .alert-success { background-color: #dcfce7; color: #166534; border-color: #bbf7d0; }
        .alert-danger { background-color: #fee2e2; color: #991b1b; border-color: #fecaca; }

    </style>
</head>
<body>

    <header class="header">
        <h2>Sistem Informasi Akademik</h2>
    </header>

    <nav class="navbar">
        <div class="nav-container">
            <ul class="nav-list">
                <?php if (session()->get('isLoggedIn')): ?>
                    <?php $role = session()->get('role'); ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Home</a></li>
                    <?php if ($role == 'Admin'): ?>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('mahasiswa') ?>">Kelola Mahasiswa</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('course') ?>">Kelola Mata Kuliah</a></li>
                    <?php endif; ?>
                    <?php if ($role == 'Mahasiswa'): ?>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('mahasiswa/profil') ?>">Profil Saya</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('enrollment') ?>">Ambil Mata Kuliah</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Home</a></li>
                <?php endif; ?>
            </ul>
            <ul class="nav-list">
                <?php if (session()->get('isLoggedIn')): ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('logout') ?>">Logout (<?= session()->get('username') ?>)</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('login') ?>">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <main class="container">
        <div class="content-card">
            
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <?= $content ?>
        </div>
    </main>

    <footer class="footer">
        <p>&copy; <?= date('Y') ?> by: Hisyam Khaeru Umam</p>
    </footer>

    <script>
        // --- Skrip untuk Menu Aktif ---
        document.addEventListener("DOMContentLoaded", function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-list .nav-link');

            navLinks.forEach(link => {
                const linkPath = new URL(link.href).pathname;
                
                if (linkPath === currentPath) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>