<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\TakesModel; // Kita akan buat model ini selanjutnya

class EnrollmentController extends BaseController
{
    // Menampilkan halaman pendaftaran mata kuliah
    public function index()
    {
        $courseModel = new CourseModel();

        $data = [
            'title'   => 'Ambil Mata Kuliah',
            'content' => view('enrollment_view', ['courses' => $courseModel->findAll()])
        ];
        return view('template', $data);
    }

    // Memproses pendaftaran
    public function enroll($course_id)
    {
        $takesModel = new TakesModel();
        $mahasiswa_id = session()->get('user_id'); // Asumsi user_id adalah id mahasiswa

        // Cek agar tidak mendaftar dua kali
        $existing = $takesModel->where(['mahasiswa_id' => $mahasiswa_id, 'course_id' => $course_id])->first();
        if ($existing) {
            return redirect()->to('/enrollment')->with('error', 'Anda sudah mengambil mata kuliah ini.');
        }

        $takesModel->save([
            'mahasiswa_id' => $mahasiswa_id,
            'course_id'    => $course_id
        ]);

        return redirect()->to('/enrollment')->with('success', 'Berhasil mengambil mata kuliah.');
    }
}