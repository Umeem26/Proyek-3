<h3>Tambah Data Mata Kuliah Baru</h3>

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

<form action="<?= base_url('course/create') ?>" method="post" style="margin-top: 1.5rem;">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="kode_mk" class="form-label">Kode MK</label>
        <input type="text" class="form-control" name="kode_mk" id="kode_mk" value="<?= old('kode_mk') ?>">
    </div>
    <div class="form-group">
        <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
        <input type="text" class="form-control" name="nama_mk" id="nama_mk" value="<?= old('nama_mk') ?>">
    </div>
    <div class="form-group">
        <label for="sks" class="form-label">SKS</label>
        <input type="number" class="form-control" name="sks" id="sks" value="<?= old('sks') ?>">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="<?= base_url('course') ?>" class="btn btn-secondary">Batal</a>
</form>