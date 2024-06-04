<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        $data = [
            'judul' => 'Login',
        ];
        $session = session();

        // Cek apakah pengguna sudah login
        if ($session->get('logged_in')) {
            return redirect()->to(base_url($session->get('dashboard_url'))); // Redirect ke dashboard yang sesuai dengan peran
        }

        if ($this->request->getMethod() === 'post') {
            // Ambil input login (username/email dan password)
            $loginInput = $this->request->getPost('login');
            $password = $this->request->getPost('password');

            // Cari pengguna berdasarkan username atau email
            $userModel = new UserModel();
            $user = $userModel->where('username', $loginInput)
                ->orWhere('email', $loginInput)
                ->first();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Cek role pengguna
                    if ($user['role'] == 3) {
                        // Role 3 tidak boleh login
                        $session->setFlashdata('error', 'Anda tidak memiliki akses.');
                        return redirect()->to('login');
                    }

                    // Login berhasil, simpan data session
                    $dashboardUrl = ($user['role'] == 1) ? 'admin/dashboard' : 'jurnalis/dashboard';
                    $sessionData = [
                        'id_user' => $user['id_user'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'logged_in' => true,
                        'dashboard_url' => $dashboardUrl,
                    ];
                    $session->set($sessionData);
                    return redirect()->to(base_url($dashboardUrl));
                } else {
                    // Password salah
                    $session->setFlashdata('error', 'Password salah.');
                }
            } else {
                // Username atau email tidak ditemukan
                $session->setFlashdata('error', 'Username/Email tidak ditemukan.');
            }
        }

        return view('login', $data);
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }
}
