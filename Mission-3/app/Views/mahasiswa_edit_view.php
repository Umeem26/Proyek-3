<h3>Edit Data Mahasiswa</h3>

<form action="<?= base_url('mahasiswa/update/' . $mahasiswa['nim']) ?>" method="post">
    <?= csrf_field() ?>

    <p>
        <label for="nim">NIM</label><br>
        <input type="text" name="nim" id="nim" value="<?= esc($mahasiswa['nim']) ?>" readonly style="background:#eee;">
    </p>
    <p>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" value="<?= esc($mahasiswa['nama']) ?>" required>
    </p>
    <p>
        <label for="umur">Umur</label><br>
        <input type="number" name="umur" id="umur" value="<?= esc($mahasiswa['umur']) ?>" required>
    </p>
    <p>
        <button type="submit" class="btn-kembali" style="background-color: #007bff;">Update</button>
        <a href="<?= base_url('mahasiswa') ?>" class="btn-kembali">Batal</a>
    </p>
</form>

<style>
    form input { width: 50%; padding: 8px; margin-top: 5px; }
</style>