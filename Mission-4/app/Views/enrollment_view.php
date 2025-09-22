<h3 class="mb-3">Ambil Mata Kuliah</h3>
<p>Silakan pilih mata kuliah yang ingin Anda ambil semester ini.</p>

<form action="<?= base_url('enrollment/process') ?>" method="post">
    <?= csrf_field() ?>

    <table class="table">
        <thead>
            <tr>
                <th>Ambil</th>
                <th>Kode MK</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td>
                        <?php if (in_array($course['id'], $takenCourseIds)): ?>
                            <span class="badge bg-success">✔</span>
                        <?php else: ?>
                            <input class="form-check-input course-checkbox" type="checkbox" name="courses[]" 
                                   value="<?= $course['id'] ?>" 
                                   data-sks="<?= $course['sks'] ?>">
                        <?php endif; ?>
                    </td>
                    <td><?= esc($course['kode_mk']) ?></td>
                    <td><?= esc($course['nama_mk']) ?></td>
                    <td><?= esc($course['sks']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="mt-4 d-flex justify-content-between align-items-center">
        <h4>Total SKS Dipilih: <strong id="total-sks" class="text-primary">0</strong></h4>
        <button type="submit" class="btn btn-primary btn-lg">Daftarkan Mata Kuliah</button>
    </div>
</form>

<script>
    // Pilih semua checkbox mata kuliah
    const checkboxes = document.querySelectorAll('.course-checkbox');
    // Pilih elemen untuk menampilkan total SKS
    const totalSksElement = document.getElementById('total-sks');

    function calculateTotalSks() {
        let totalSks = 0;
        checkboxes.forEach(checkbox => {
            // Jika checkbox tercentang
            if (checkbox.checked) {
                // Tambahkan nilai SKS-nya ke total
                totalSks += parseInt(checkbox.dataset.sks, 10);
            }
        });
        // Update tampilan total SKS
        totalSksElement.textContent = totalSks;
    }

    // Tambahkan event listener ke setiap checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', calculateTotalSks);
    });
</script>