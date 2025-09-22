<h3>Daftar Mahasiswa</h3>
<p>Berikut adalah daftar mahasiswa yang terdaftar di sistem.</p>

<?php if(session()->get('role') == 'Admin'): ?>
    <a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary" style="margin-bottom: 1rem;">+ Tambah Mahasiswa Baru</a>
<?php endif; ?>

<table class="table">
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
                        <a href="<?= base_url('mahasiswa/detail/' . $m['id']) ?>" class="btn btn-sm btn-info">Detail</a>
                        
                        <?php if(session()->get('role') == 'Admin'): ?>
                            <a href="<?= base_url('mahasiswa/edit/' . $m['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="<?= base_url('mahasiswa/delete/' . $m['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center;">Belum ada data mahasiswa</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>