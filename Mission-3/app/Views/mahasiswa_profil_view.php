<h3>Profil Saya</h3>

<?php if (!empty($mahasiswa)): ?>
    <div class="detail-box">
        <p><strong>NIM:</strong> <?= esc($mahasiswa['nim']); ?></p>
        <p><strong>Nama:</strong> <?= esc($mahasiswa['nama']); ?></p>
        <p><strong>Umur:</strong> <?= esc($mahasiswa['umur']); ?></p>
        </div>
<?php else: ?>
    <p>Data profil tidak ditemukan. Pastikan data mahasiswa Anda sudah terhubung dengan akun user Anda.</p>
<?php endif; ?>