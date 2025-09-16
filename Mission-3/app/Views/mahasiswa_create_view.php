<h3>Tambah Data Mahasiswa Baru</h3>

<form action="<?= base_url('mahasiswa/store') ?>" method="post">
    <?= csrf_field() ?> <p>
        <label for="nim">NIM</label><br>
        <input type="text" name="nim" id="nim" required>
    </p>
    <p>
        <label for="nama">Nama</label><br>
        <input type="text" name="nama" id="nama" required>
    </p>
    <p>
        <label for="umur">Umur</label><br>
        <input type="number" name="umur" id="umur" required>
    </p>
    <p>
        <button type="submit" class="btn-kembali" style="background-color: #007bff;">Simpan</button>
        <a href="<?= base_url('mahasiswa') ?>" class="btn-kembali">Batal</a>
    </p>
</form>

<style>
    /* Style sederhana untuk form */
    form input { width: 50%; padding: 8px; margin-top: 5px; }
</style>