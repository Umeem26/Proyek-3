<h3>Mata Kuliah Saya</h3>
<p>Berikut adalah daftar mata kuliah yang telah Anda ambil semester ini.</p>

<table class="table">
    <thead>
        <tr>
            <th>Kode MK</th>
            <th>Nama Mata Kuliah</th>
            <th>SKS</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($enrolledCourses)): ?>
            <?php foreach ($enrolledCourses as $course): ?>
                <tr>
                    <td><?= esc($course['kode_mk']) ?></td>
                    <td><?= esc($course['nama_mk']) ?></td>
                    <td><?= esc($course['sks']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" style="text-align: center;">Anda belum mengambil mata kuliah apa pun.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>