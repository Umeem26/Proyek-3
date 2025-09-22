<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\TakesModel;

class EnrollmentController extends BaseController
{
    public function index()
    {
        $courseModel = new CourseModel();
        $takesModel = new TakesModel();
        $mahasiswa_id = session()->get('user_id');

        $takenCoursesRaw = $takesModel->where('mahasiswa_id', $mahasiswa_id)->findAll();
        $takenCourseIds = array_column($takenCoursesRaw, 'course_id');

        $data = [
            'title'          => 'Ambil Mata Kuliah',
            'courses'        => $courseModel->findAll(),
            'takenCourseIds' => $takenCourseIds
        ];
        
        return view('template', ['content' => view('enrollment_view', $data)]);
    }

    // FUNGSI BARU UNTUK MEMPROSES FORM
    public function processEnrollment()
    {
        $takesModel = new TakesModel();
        $mahasiswa_id = session()->get('user_id');

        // Ambil array course_id dari checkbox yang dicentang
        $selectedCourses = $this->request->getPost('courses');

        if (empty($selectedCourses)) {
            return redirect()->to('/enrollment')->with('error', 'Tidak ada mata kuliah yang dipilih.');
        }

        foreach ($selectedCourses as $course_id) {
            // Cek lagi agar tidak double enroll
            $existing = $takesModel->where(['mahasiswa_id' => $mahasiswa_id, 'course_id' => $course_id])->first();
            if (!$existing) {
                $takesModel->save([
                    'mahasiswa_id' => $mahasiswa_id,
                    'course_id'    => $course_id
                ]);
            }
        }

        return redirect()->to('/enrollment')->with('success', 'Mata kuliah pilihan berhasil didaftarkan.');
    }
}