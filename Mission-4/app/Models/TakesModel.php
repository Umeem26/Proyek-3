<?php
namespace App\Models;
use CodeIgniter\Model;

class TakesModel extends Model
{
    protected $table = 'takes';
    protected $allowedFields = ['mahasiswa_id', 'course_id'];
}