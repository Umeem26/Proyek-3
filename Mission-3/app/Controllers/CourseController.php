<?php

namespace App\Controllers;

use App\Models\CourseModel;

class CourseController extends BaseController
{
    // Menampilkan daftar semua mata kuliah
    public function index()
    {
        // Hanya Admin yang boleh mengakses
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/'); // Redirect ke home jika bukan admin
        }

        $model = new CourseModel();
        
        $data = [
            'title'   => 'Daftar Mata Kuliah',
            'content' => view('course_index_view', ['courses' => $model->findAll()])
        ];

        return view('template', $data);
    }

    public function new()
    {
        // Hanya Admin yang boleh mengakses
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }
        
        $data = [
            'title'   => 'Tambah Mata Kuliah',
            'content' => view('course_create_view')
        ];
        return view('template', $data);
    }

    // GANTI NAMA FUNGSI INI DARI store() MENJADI create()
    public function create()
    {
        // Hanya Admin yang boleh mengakses
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }

        // Aturan validasi
        $rules = [
            'kode_mk' => 'required|is_unique[courses.kode_mk]',
            'nama_mk' => 'required',
            'sks'     => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', 'The Kode MK field must contain a unique value.');
        }

        // Jika validasi berhasil, simpan data
        $model = new CourseModel();
        $model->save([
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'     => $this->request->getPost('sks'),
        ]);

        return redirect()->to('/course')->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit mata kuliah
    public function edit($id = null)
    {
        // Hanya Admin yang boleh mengakses
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }

        $model = new CourseModel();
        $courseData = $model->find($id);

        $data = [
            'title'   => 'Edit Mata Kuliah',
            'content' => view('course_edit_view', ['course' => $courseData])
        ];
        return view('template', $data);
    }

    // Memperbarui data mata kuliah
    public function update($id = null)
    {
        // Hanya Admin yang boleh mengakses
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }

        // Aturan validasi
        $rules = [
            'kode_mk' => 'required|is_unique[courses.kode_mk,id,' . $id . ']',
            'nama_mk' => 'required',
            'sks'     => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        // Jika validasi berhasil, lanjutkan update
        $model = new CourseModel();
        $dataToUpdate = [
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'     => $this->request->getPost('sks'),
        ];
        $model->update($id, $dataToUpdate);

        return redirect()->to('/course')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    // Menghapus data mata kuliah
    public function delete($id = null)
    {
        // Hanya Admin yang boleh mengakses
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }
        
        $model = new CourseModel();
        $model->delete($id);

        return redirect()->to('/course')->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}