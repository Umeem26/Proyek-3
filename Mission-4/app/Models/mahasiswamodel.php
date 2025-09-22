<?php
namespace App\Models;
use CodeIgniter\Model;

class mahasiswamodel extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nim', 'nama', 'umur', 'user_id'];

    public function getmahasiswa()
    {
        return $this->findAll();
    }

    public function getMahasiswaByNim($nim)
    {
        return $this->where(['nim' => $nim])->first();
    }

    public function getMahasiswaByUserId($userId)
    {
        // Cari data di tabel mahasiswa 
        return $this->where(['user_id' => $userId])->first();
    }
}