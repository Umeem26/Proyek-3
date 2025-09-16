<?php
namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController
{
    // Menampilkan halaman login
    public function index()
    {
        return view('login_view');
    }

    // Memproses data dari form login
    public function process()
    {
        $userModel = new UserModel();
        $session = session();

        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // Cari user di database berdasarkan username
        $user = $userModel->getUserByUsername($username);

        // Cek apakah user ada dan passwordnya cocok
        if ($user && password_verify($password, $user['password'])) {
            // Jika berhasil, simpan data user ke session
            $sessionData = [
            'user_id'    => $user['id'],
            'username'   => $user['username'],
            'full_name'  => $user['full_name'],
            'role'       => $user['role'],
            'isLoggedIn' => TRUE
            ];
            $session->set($sessionData);
            // Arahkan pengguna berdasarkan rolenya
            if ($session->get('role') == 'Mahasiswa') {
                return redirect()->to('/mahasiswa/profil');
            } else {
                return redirect()->to('/mahasiswa');
            }
        } else {
            // Jika gagal
            $session->setFlashdata('msg', 'Username atau Password salah.');
            return redirect()->to('/login');
        }
    }
    // Fungsi untuk logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}