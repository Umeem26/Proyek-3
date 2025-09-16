<?php
namespace App\Controllers;
use App\Models\mahasiswamodel; 

class Mahasiswa extends BaseController
{
    //Menampilkan daftar semua mahasiswa.
    public function index()
    {
        // Hanya Admin yang boleh lewat
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/mahasiswa/profil');
        }

        $model = new mahasiswamodel();

        $data = [
            'title'   => 'Daftar Mahasiswa',
            'content' => view('mahasiswaview', ['mahasiswa' => $model->getmahasiswa()])
        ];

        return view('template', $data);
    }

    //Menampilkan detail satu mahasiswa.
    public function detail($id)
    {
        $model = new MahasiswaModel();
        
        $data = [
            'title'   => 'Detail Mahasiswa',
            'content' => view('mahasiswa_detail_view', ['mahasiswa' => $model->find($id)])
        ];
        return view('template', $data);
    }

    //Menampilkan halaman profil mahasiswa yang sedang login.
    public function profil()
    {
        $model = new MahasiswaModel();
        $userId = session()->get('user_id'); 

        $data = [
            'title'   => 'Profil Saya',
            'content' => view('mahasiswa_profil_view', ['mahasiswa' => $model->getMahasiswaByUserId($userId)])
        ];
        
        return view('template', $data);
    }

    //Menampilkan form untuk menambah mahasiswa baru.
    public function create()
    {
        $data = [
            'title'   => 'Tambah Mahasiswa',
            'content' => view('mahasiswa_create_view')
        ];
        return view('template', $data);
    }

    //Menyimpan data mahasiswa baru ke database.
    public function store()
    {
        // Aturan validasi
        $rules = [
            'nim'  => 'required|is_unique[mahasiswa.nim]',
            'nama' => 'required',
            'umur' => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new MahasiswaModel();
        $model->save([
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ]);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    //Menampilkan form untuk mengedit data mahasiswa.
    public function edit($id)
    {
        $model = new MahasiswaModel();
        $mahasiswaData = $model->find($id);

        $data = [
            'title'   => 'Edit Mahasiswa',
            'content' => view('mahasiswa_edit_view', ['mahasiswa' => $mahasiswaData])
        ];

        return view('template', $data);
    }

    //Memperbarui data mahasiswa di database.
    public function update($id)
    {
        // Aturan validasi
        $rules = [
            'nim'  => 'required|is_unique[mahasiswa.nim,id,' . $id . ']',
            'nama' => 'required',
            'umur' => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $model = new MahasiswaModel();
        $dataToUpdate = [
            'nim'  => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'umur' => $this->request->getPost('umur'),
        ];
        $model->update($id, $dataToUpdate);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }

    //Menghapus data mahasiswa.
    public function delete($id)
    {
        $model = new MahasiswaModel();
        $model->delete($id);

        return redirect()->to('/mahasiswa')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}