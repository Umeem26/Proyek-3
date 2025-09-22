<h3>Daftar Mata Kuliah</h3>
<p>Berikut adalah daftar mata kuliah yang tersedia.</p>

<a href="<?= base_url('course/new') ?>" class="btn btn-primary" style="margin-bottom: 1rem;">+ Tambah Mata Kuliah Baru</a>

<table class="table">
    <thead>
        <tr>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($courses)): ?>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= esc($course['kode_mk']) ?></td>
                    <td><?= esc($course['nama_mk']) ?></td>
                    <td><?= esc($course['sks']) ?></td>
                    <td>
                        <a href="<?= base_url('course/edit/' . $course['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= base_url('course/delete/' . $course['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" style="text-align: center;">Belum ada data mata kuliah</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>