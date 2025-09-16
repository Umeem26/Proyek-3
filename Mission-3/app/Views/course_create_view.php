<h3>Tambah Data Mata Kuliah Baru</h3>

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

<form action="<?= base_url('course/create') ?>" method="post">
    <?= csrf_field() ?>

    <p>
        <label for="kode_mk">Kode MK</label><br>
        <input type="text" name="kode_mk" id="kode_mk" value="<?= old('kode_mk') ?>">
    </p>
    <p>
        <label for="nama_mk">Nama Mata Kuliah</label><br>
        <input type="text" name="nama_mk" id="nama_mk" value="<?= old('nama_mk') ?>">
    </p>
    <p>
        <label for="sks">SKS</label><br>
        <input type="number" name="sks" id="sks" value="<?= old('sks') ?>">
    </p>
    <p>
        <button type="submit" class="btn-kembali" style="background-color: #007bff;">Simpan</button>
        <a href="<?= base_url('course') ?>" class="btn-kembali">Batal</a>
    </p>
</form>

<style>
    form input { width: 50%; padding: 8px; margin-top: 5px; }
</style>