<?php

namespace App\Controllers;

use App\Models\TakesModel;

class MyCourseController extends BaseController
{
    public function index()
    {
        $takesModel = new TakesModel();
        $mahasiswa_id = session()->get('user_id'); // Menggunakan user_id dari session

        $data = [
            'title'   => 'Mata Kuliah Saya',
            'content' => view('my_courses_view', [
                'enrolledCourses' => $takesModel->getEnrolledCourses($mahasiswa_id)
            ])
        ];
        
        return view('template', $data);
    }
}