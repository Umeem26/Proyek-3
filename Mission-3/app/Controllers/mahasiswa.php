<?php

namespace App\Controllers;

use App\Models\mahasiswamodel; // Pastikan 'm' di mahasiswamodel huruf kecil sesuai nama file

class Mahasiswa extends BaseController
{
    public function index()
    {
        $model = new mahasiswamodel();

        $data = [
            'title'   => 'Daftar Mahasiswa',
            'content' => view('mahasiswaview', ['mahasiswa' => $model->getmahasiswa()])
        ];

        return view('template', $data);
    }

    public function detail($nim)
    {
        $model = new MahasiswaModel();
        $mahasiswaData = $model->getMahasiswaByNim($nim);

        $data = [
            'title'   => 'Detail Mahasiswa',
            'content' => view('mahasiswa_detail_view', ['mahasiswa' => $mahasiswaData])
        ];

        return view('template', $data);
    }

    public function create()
    {
        $data = [
            'title'   => 'Tambah Mahasiswa',
            'content' => view('mahasiswa_create_view')
        ];

        return view('template', $data);
    }

    public function store()
    {
        $model = new MahasiswaModel();
        
        $dataToSave = [
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ];

        $model->save($dataToSave);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // FUNGSI BARU: Menampilkan form untuk mengedit data
    public function edit($nim)
    {
        $model = new MahasiswaModel();
        
        $data = [
            'title'     => 'Edit Mahasiswa',
            'mahasiswa' => $model->getMahasiswaByNim($nim), // Ambil data mahasiswa spesifik
            'content'   => view('mahasiswa_edit_view')
        ];
        return view('template', $data);
    }

    // FUNGSI BARU: Memperbarui data di database
    public function update($nim)
    {
        $model = new MahasiswaModel();
        
        $dataToUpdate = [
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ];

        // Update data di database dimana nim = $nim
        $model->update($nim, $dataToUpdate);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function delete($nim)
    {
        $model = new MahasiswaModel();

        // Hapus data dari database dimana nim = $nim
        $model->delete($nim);

        // Redirect kembali ke halaman daftar mahasiswa dengan pesan sukses
        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}