<?php
namespace App\Controllers;
use App\Models\CourseModel;
use App\Models\TakesModel; 

class EnrollmentController extends BaseController
{
    // Menampilkan halaman pendaftaran mata kuliah
    public function index()
    {
        $courseModel = new CourseModel();
        $takesModel = new TakesModel();
        $mahasiswa_id = session()->get('user_id');

        // Ambil ID dari semua mata kuliah yang sudah diambil oleh mahasiswa ini
        $takenCoursesRaw = $takesModel->where('mahasiswa_id', $mahasiswa_id)->findAll();
        $takenCourseIds = array_column($takenCoursesRaw, 'course_id');

        $data = [
            'title'          => 'Ambil Mata Kuliah',
            'courses'        => $courseModel->findAll(),
            'takenCourseIds' => $takenCourseIds // Kirim daftar ID ke view
        ];
        
        // Ganti view yang dipanggil agar sesuai
        return view('template', ['content' => view('enrollment_view', $data)]);
    }

    // Memproses pendaftaran
    public function enroll($course_id)
    {
        $takesModel = new TakesModel();
        $mahasiswa_id = session()->get('user_id'); 

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