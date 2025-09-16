<h3>Daftar Mahasiswa</h3>
<p>Berikut adalah daftar mahasiswa yang terdaftar di sistem.</p>

<?php if(session()->get('role') == 'Admin'): ?>
    <a href="<?= base_url('mahasiswa/create') ?>" class="btn-kembali" style="margin-bottom: 15px; background-color: #007bff;">+ Tambah Mahasiswa Baru</a>
<?php endif; ?>

<table class="table-mahasiswa">
    <thead>
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($mahasiswa)): ?>
            <?php foreach ($mahasiswa as $m): ?>
                <tr>
                    <td><?= esc($m['nim']) ?></td>
                    <td><?= esc($m['nama']) ?></td>
                    <td><?= esc($m['umur']) ?></td>
                    <td>
                        <a href="<?= base_url('mahasiswa/detail/' . esc($m['nim'])) ?>" class="btn-detail">Detail</a>
                    </td>
                    <td>
                        <a href="<?= base_url('mahasiswa/detail/' . esc($m['nim'])) ?>" class="btn-detail">Detail</a>
                        
                        <?php if(session()->get('role') == 'Admin'): ?>
                            <a href="<?= base_url('mahasiswa/edit/' . esc($m['nim'])) ?>" class="btn-detail" style="background-color:#ffc107;">Edit</a>
                            <a href="<?= base_url('mahasiswa/delete/' . esc($m['nim'])) ?>" class="btn-detail" style="background-color:#dc3545;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Belum ada data mahasiswa</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>