<h3>Tambah Data Mahasiswa Baru</h3>

<?php if(session()->has('errors')): ?>
    <div class="alert alert-danger">
        <strong>Error Validasi:</strong>
        <ul>
            <?php foreach(session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>

<form action="<?= base_url('mahasiswa/store') ?>" method="post" style="margin-top: 1.5rem;">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" name="nim" id="nim" value="<?= old('nim') ?>">
    </div>
    <div class="form-group">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?= old('nama') ?>">
    </div>
    <div class="form-group">
        <label for="umur" class="form-label">Umur</label>
        <input type="number" class="form-control" name="umur" id="umur" value="<?= old('umur') ?>">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Batal</a>
</form>
<script>
    // Pilih form yang akan divalidasi
    const form = document.querySelector('form');

    form.addEventListener('submit', function(event) {
        // Hentikan pengiriman form untuk sementara
        event.preventDefault();

        let isValid = true;
        
        // Hapus semua pesan error yang mungkin sudah ada
        document.querySelectorAll('.form-error-message').forEach(el => el.remove());
        document.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));

        // Dapatkan semua input di dalam form
        const inputs = form.querySelectorAll('.form-control');

        inputs.forEach(input => {
            // Jika input kosong
            if (input.value.trim() === '') {
                isValid = false;

                // Tambahkan border merah
                input.classList.add('is-invalid');

                // Buat dan tampilkan pesan error
                const errorMessage = document.createElement('div');
                errorMessage.className = 'form-error-message';
                errorMessage.textContent = 'Field ini tidak boleh kosong.';
                input.parentNode.appendChild(errorMessage);
            }
        });

        // Jika semua input sudah terisi, kirim form
        if (isValid) {
            form.submit();
        }
    });
</script>