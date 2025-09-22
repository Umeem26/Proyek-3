<h3>Detail Mahasiswa</h3>

<?php if (!empty($mahasiswa)): ?>
    <div style="line-height: 2;">
        <p><strong>NIM:</strong> <?= esc($mahasiswa['nim']); ?></p>
        <p><strong>Nama:</strong> <?= esc($mahasiswa['nama']); ?></p>
        <p><strong>Umur:</strong> <?= esc($mahasiswa['umur']); ?></p>
    </div>
<?php else: ?>
    <p>Data mahasiswa tidak ditemukan.</p>
<?php endif; ?>

<a href="<?= base_url('mahasiswa'); ?>" class="btn btn-secondary" style="margin-top: 1.5rem;"> &larr; Kembali ke Daftar</a>