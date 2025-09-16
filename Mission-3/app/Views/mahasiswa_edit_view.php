<h3>Edit Data Mahasiswa</h3>

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

<form action="<?= base_url('mahasiswa/update/' . $mahasiswa['id']) ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">

    <p>
        <label for="nim">NIM</label><br>
        <input type="text" name="nim" id="nim" value="<?= old('nim', $mahasiswa['nim']) ?>" required>
    </p>
    <p>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" value="<?= old('nama', $mahasiswa['nama']) ?>" required>
    </p>
    <p>
        <label for="umur">Umur</label><br>
        <input type="number" name="umur" id="umur" value="<?= old('umur', $mahasiswa['umur']) ?>" required>
    </p>
    <p>
        <button type="submit" class="btn-kembali" style="background-color: #007bff;">Update</button>
        <a href="<?= base_url('mahasiswa') ?>" class="btn-kembali">Batal</a>
    </p>
</form>

<style>
    form input { width: 50%; padding: 8px; margin-top: 5px; }
</style>