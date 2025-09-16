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

        // Penjaga: Hanya Admin yang boleh lewat
        if (session()->get('role') !== 'Admin') {
            // Jika bukan admin, tendang ke halaman profilnya sendiri
            return redirect()->to('/mahasiswa/profil');
        }
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
        // 1. Definisikan aturan validasi
        $rules = [
            'nim'  => 'required|is_unique[mahasiswa.nim]',
            'nama' => 'required',
            'umur' => 'required|numeric'
        ];

        // 2. Jalankan validasi
        if (! $this->validate($rules)) {
            // Jika validasi gagal, kembalikan ke form dengan error dan input sebelumnya
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 3. Jika validasi berhasil, simpan data
        $model = new MahasiswaModel();
        $model->save([
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // FUNGSI BARU: Menampilkan form untuk mengedit data
    public function edit($nim)
    {
        $model = new MahasiswaModel();

        // Ambil data mahasiswa yang akan diedit dari model
        $mahasiswaData = $model->getMahasiswaByNim($nim);

        $data = [
            'title'   => 'Edit Mahasiswa',
            // KIRIM DATA MAHASISWA KE VIEW DI SINI
            'content' => view('mahasiswa_edit_view', ['mahasiswa' => $mahasiswaData])
        ];

        return view('template', $data);
    }

    public function update($id) // Menggunakan $id
    {
        // Aturan validasi
        $rules = [
            // nim harus unik, kecuali untuk dirinya sendiri
            'nim'  => 'required|is_unique[mahasiswa.nim,id,' . $id . ']',
            'nama' => 'required',
            'umur' => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Jika validasi berhasil, lanjutkan update
        $model = new MahasiswaModel();
        $dataToUpdate = [
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ];
        $model->update($id, $dataToUpdate);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    public function delete($id) // Menggunakan $id, bukan $nim
    {
        $model = new MahasiswaModel();
        $model->delete($id); // Menghapus berdasarkan id

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }

    public function profil()
    {
        $model = new MahasiswaModel();
        
        // Ambil user_id dari session yang dibuat saat login
        $userId = session()->get('user_id'); 

        $data = [
            'title'   => 'Profil Saya',
            // Kirim data mahasiswa yang ditemukan ke view
            'content' => view('mahasiswa_profil_view', ['mahasiswa' => $model->getMahasiswaByUserId($userId)])
        ];
        
        return view('template', $data);
    }
}