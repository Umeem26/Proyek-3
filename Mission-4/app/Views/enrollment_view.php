<h3 class="mb-3">Ambil Mata Kuliah</h3>
<p>Silakan pilih mata kuliah yang ingin Anda ambil semester ini.</p>

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
        <?php foreach ($courses as $course): ?>
            <tr>
                <td><?= esc($course['kode_mk']) ?></td>
                <td><?= esc($course['nama_mk']) ?></td>
                <td><?= esc($course['sks']) ?></td>
                <td>
                    <?php if (in_array($course['id'], $takenCourseIds)): ?>
                        <span class="btn btn-sm btn-success" style="cursor: default;">Sudah Diambil</span>
                    <?php else: ?>
                        <a href="<?= base_url('enrollment/enroll/' . $course['id']) ?>" class="btn btn-sm btn-primary">Ambil</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>