<h3>Ambil Mata Kuliah</h3>
<p>Silakan pilih mata kuliah yang ingin Anda ambil semester ini.</p>

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
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= esc($course['kode_mk']) ?></td>
                <td><?= esc($course['nama_mk']) ?></td>
                <td><?= esc($course['sks']) ?></td>
                <td>
                    <a href="<?= base_url('enrollment/enroll/' . $course['id']) ?>" class="btn-detail">Ambil</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>