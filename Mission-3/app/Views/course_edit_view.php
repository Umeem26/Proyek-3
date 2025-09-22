<h3>Edit Data Mata Kuliah</h3>

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

<form action="<?= base_url('course/update/' . $course['id']) ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">

    <div class="mb-3">
        <label for="kode_mk" class="form-label">Kode MK</label>
        <input type="text" class="form-control" name="kode_mk" id="kode_mk" value="<?= old('kode_mk', $course['kode_mk']) ?>">
    </div>
    <div class="mb-3">
        <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
        <input type="text" class="form-control" name="nama_mk" id="nama_mk" value="<?= old('nama_mk', $course['nama_mk']) ?>">
    </div>
    <div class="mb-3">
        <label for="sks" class="form-label">SKS</label>
        <input type="number" class="form-control" name="sks" id="sks" value="<?= old('sks', $course['sks']) ?>">
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= base_url('course') ?>" class="btn btn-secondary">Batal</a>
</form>