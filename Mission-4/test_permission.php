<?php

echo '<h1>Tes Izin Penulisan Folder</h1>';

// Path lengkap ke folder writable
$writablePath = __DIR__ . '/writable';

echo '<p>Mencoba memeriksa path: <strong>' . $writablePath . '</strong></p>';

// Cek apakah folder writable ada
if (!is_dir($writablePath)) {
    echo '<p style="color: red; font-weight: bold;">ERROR: Folder writable tidak ditemukan!</p>';
    exit;
}

// Cek apakah PHP bisa menulis ke folder tersebut
if (is_writable($writablePath)) {
    echo '<p style="color: green; font-weight: bold;">SUKSES: PHP melaporkan bahwa folder writable BISA DITULISI.</p>';
} else {
    echo '<p style="color: red; font-weight: bold;">GAGAL: PHP melaporkan bahwa folder writable TIDAK BISA DITULISI.</p>';
}

// Coba buat file tes
$testFilePath = $writablePath . '/test_file.txt';
echo '<hr>';
echo '<p>Mencoba membuat file tes di: <strong>' . $testFilePath . '</strong></p>';

if (file_put_contents($testFilePath, 'PHP test was successful.')) {
    echo '<p style="color: green; font-weight: bold;">SUKSES: Berhasil membuat file tes!</p>';
    unlink($testFilePath); // Hapus file tes setelah berhasil
} else {
    echo '<p style="color: red; font-weight: bold;">GAGAL: Tidak bisa membuat file tes. Ini adalah akar masalahnya!</p>';
}