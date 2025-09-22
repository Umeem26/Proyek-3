<?php

namespace App\Controllers;

use App\Models\CourseModel;

class CourseController extends BaseController
{
    /**
     * Menampilkan daftar semua mata kuliah.
     */
    public function index()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }

        $model = new CourseModel();
        
        $data = [
            'title'   => 'Daftar Mata Kuliah',
            'content' => view('course_index_view', ['courses' => $model->findAll()])
        ];

        return view('template', $data);
    }

    /**
     * Menampilkan form untuk menambah mata kuliah baru.
     */
    public function new()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }
        
        $data = [
            'title'   => 'Tambah Mata Kuliah',
            // PASTIKAN VIEW MENGARAH KE 'course_create_view'
            'content' => view('course_create_view')
        ];
        return view('template', $data);
    }

    /**
     * Menyimpan data mata kuliah baru.
     */
    public function create()
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }

        $rules = [
            'kode_mk' => 'required|is_unique[courses.kode_mk]',
            'nama_mk' => 'required',
            'sks'     => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new CourseModel();
        $model->save([
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'     => $this->request->getPost('sks'),
        ]);

        return redirect()->to('/course')->with('success', 'Data mata kuliah berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit mata kuliah.
     */
    public function edit($id = null)
    {
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

    /**
     * Memperbarui data mata kuliah.
     */
    public function update($id = null)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }

        $rules = [
            'kode_mk' => 'required|is_unique[courses.kode_mk,id,' . $id . ']',
            'nama_mk' => 'required',
            'sks'     => 'required|numeric'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $model = new CourseModel();
        $dataToUpdate = [
            'kode_mk' => $this->request->getPost('kode_mk'),
            'nama_mk' => $this->request->getPost('nama_mk'),
            'sks'     => $this->request->getPost('sks'),
        ];
        $model->update($id, $dataToUpdate);

        return redirect()->to('/course')->with('success', 'Data mata kuliah berhasil diperbarui.');
    }

    /**
     * Menghapus data mata kuliah.
     */
    public function delete($id = null)
    {
        if (session()->get('role') !== 'Admin') {
            return redirect()->to('/');
        }
        
        $model = new CourseModel();
        $model->delete($id);

        return redirect()->to('/course')->with('success', 'Data mata kuliah berhasil dihapus.');
    }
}