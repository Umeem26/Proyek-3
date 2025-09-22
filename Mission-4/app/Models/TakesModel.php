<?php
namespace App\Models;
use CodeIgniter\Model;

class TakesModel extends Model
{
    protected $table = 'takes';
    protected $allowedFields = ['mahasiswa_id', 'course_id'];

    public function getEnrolledCourses($mahasiswa_id)
    {
        return $this->db->table('takes')
            ->join('courses', 'courses.id = takes.course_id')
            ->where('takes.mahasiswa_id', $mahasiswa_id)
            ->get()->getResultArray();
    }
}