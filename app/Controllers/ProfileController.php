<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogAktivitasModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find(session()->get('user_id'));
        
        return view('profile/index', $data);
    }

    public function edit()
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->find(session()->get('user_id'));
        
        return view('profile/edit', $data);
    }

    public function update()
    {
        $userModel = new UserModel();
        $userId = session()->get('user_id');
        
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'email' => $this->request->getPost('email'),
            'telepon' => $this->request->getPost('telepon'),
            'alamat' => $this->request->getPost('alamat')
        ];

        // Update password jika diisi
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($userModel->update($userId, $data)) {
            // Update session nama_lengkap
            session()->set('nama_lengkap', $data['nama_lengkap']);
            
            $logModel = new LogAktivitasModel();
            $logModel->logAktivitas('Update', 'Profile', 'User mengupdate profile');
            
            return redirect()->to('/profile')->with('success', 'Profile berhasil diupdate');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal update profile');
    }
}
