<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogAktivitasModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function loginProcess()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->orWhere('email', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            if ($user['status'] == 'nonaktif') {
                return redirect()->back()->with('error', 'Akun Anda tidak aktif silahkan lakukan aktivasi terlebih daluhu kepada admin inventaris.');
            }

            session()->set([
                'user_id' => $user['id'],
                'username' => $user['username'],
                'nama_lengkap' => $user['nama_lengkap'],
                'role' => $user['role'],
                'logged_in' => true
            ]);

            $logModel = new LogAktivitasModel();
            $logModel->logAktivitas('Login', 'Auth', 'User ' . $user['username'] . ' berhasil login');

            return redirect()->to('/dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function register()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/register');
    }

    public function registerProcess()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $email    = $this->request->getPost('email');

        $existingUser = $userModel
            ->groupStart()
                ->where('username', $username)
                ->orWhere('email', $email)
            ->groupEnd()
            ->first();

        if ($existingUser) {
            if ($existingUser['username'] === $username) {
                return redirect()->back()->withInput()->with('error', 'Username sudah terdaftar!');
            }

            if ($existingUser['email'] === $email) {
                return redirect()->back()->withInput()->with('error', 'Email sudah digunakan!');
            }
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'role' => 'pengguna',
            'status' => 'nonaktif'
        ];

        if ($userModel->insert($data)) {
            $logModel = new LogAktivitasModel();
            $logModel->logAktivitas('Register', 'Auth', 'User baru ' . $data['username'] . ' berhasil registrasi');

            return redirect()->to('/login')->with('success', 'Registrasi berhasil, silakan lakukan aktivasi akun kepada admin inventaris.');
        }

        return redirect()->back()->withInput()->with('errors', $userModel->errors());
    }

    public function logout()
    {
        $logModel = new LogAktivitasModel();
        $logModel->logAktivitas('Logout', 'Auth', 'User ' . session()->get('username') . ' logout');
        
        session()->destroy();
        return redirect()->to('/login');
    }
}
