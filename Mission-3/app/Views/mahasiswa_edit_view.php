<h3>Tambah Data Mahasiswa Baru</h3>

<?php if(session()->has('errors')): ?>
    <div style="background-color:#f8d7da; color:#721c24; border:1px solid #f5c6cb; padding:15px; border-radius:4px; margin-bottom:15px;">
        <strong>Error Validasi:</strong>
        <ul>
            <?php foreach(session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>


<form action="<?= base_url('mahasiswa/store') ?>" method="post">
    <?= csrf_field() ?>

    <p>
        <label for="nim">NIM</label><br>
        <input type="text" name="nim" id="nim" value="<?= old('nim') ?>">
    </p>
    <p>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" value="<?= old('nama') ?>">
    </p>
    <p>
        <label for="umur">Umur</label><br>
        <input type="number" name="umur" id="umur" value="<?= old('umur') ?>">
    </p>
    <p>
        <button type="submit" class="btn-kembali" style="background-color: #007bff;">Simpan</button>
        <a href="<?= base_url('mahasiswa') ?>" class="btn-kembali">Batal</a>
    </p>
</form>

<style>
    form input { width: 50%; padding: 8px; margin-top: 5px; }
</style>