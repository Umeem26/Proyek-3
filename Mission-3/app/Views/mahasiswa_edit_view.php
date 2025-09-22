<h3>Edit Data Mahasiswa</h3>

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

<form action="<?= base_url('mahasiswa/update/' . $mahasiswa['id']) ?>" method="post" style="margin-top: 1.5rem;">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" name="nim" id="nim" value="<?= old('nim', $mahasiswa['nim']) ?>">
    </div>
    <div class="form-group">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" value="<?= old('nama', $mahasiswa['nama']) ?>">
    </div>
    <div class="form-group">
        <label for="umur" class="form-label">Umur</label>
        <input type="number" class="form-control" name="umur" id="umur" value="<?= old('umur', $mahasiswa['umur']) ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">Batal</a>
</form>