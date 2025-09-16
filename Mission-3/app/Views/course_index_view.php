<h3>Daftar Mata Kuliah</h3>
<p>Berikut adalah daftar mata kuliah yang tersedia.</p>

<a href="<?= base_url('course/new') ?>" class="btn-kembali" style="margin-bottom: 15px; background-color: #007bff;">+ Tambah Mata Kuliah Baru</a>

<table class="table-mahasiswa">
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
                        <a href="<?= base_url('course/edit/' . $course['id']) ?>" class="btn-detail" style="background-color:#ffc107;">Edit</a>
                        <a href="<?= base_url('course/delete/' . $course['id']) ?>" class="btn-detail" style="background-color:#dc3545;" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Belum ada data mata kuliah</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>        