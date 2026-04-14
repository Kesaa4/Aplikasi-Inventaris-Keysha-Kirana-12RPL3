<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LogAktivitasModel;
use App\Models\PeminjamanModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $logModel;
    protected $peminjamanModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->logModel = new LogAktivitasModel();
        $this->peminjamanModel = new PeminjamanModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        
        if ($search) {
            $users = $this->userModel->like('username', $search)
                ->orLike('nama_lengkap', $search)
                ->orLike('email', $search)
                ->paginate(10, 'users');
        } else {
            $users = $this->userModel->paginate(10, 'users');
        }
        
        $data = [
            'title' => 'Data Pengguna',
            'users' => $users,
            'pager' => $this->userModel->pager,
            'search' => $search
        ];
        return view('user/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Pengguna'];
        return view('user/create', $data);
    }

    public function store()
    {
        $username = $this->request->getPost('username');
        $email    = $this->request->getPost('email');

        $existingUser = $this->userModel
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
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status')
        ];

        if ($this->userModel->insert($data)) {
            $this->logModel->logAktivitas('Tambah', 'User', 'Menambahkan user: ' . $data['username']);
            return redirect()->to('/user')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Pengguna',
            'user' => $this->userModel->find($id)
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'username' => "required|is_unique[users.username,id,{$id}]",
            'email'    => "required|valid_email|is_unique[users.email,id,{$id}]",
            'nama_lengkap' => 'required',
            'role' => 'required',
            'status' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('error', 'Username atau email sudah ada, gunakan username atau email yang lain!');
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status')
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($this->userModel->update($id, $data)) {
            $this->logModel->logAktivitas('Update', 'User', 'Mengupdate user: ' . $data['username']);
            return redirect()->to('/user')->with('success', 'Data berhasil diupdate');
        }
        return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);

        $peminjaman = $this->peminjamanModel
            ->where('user_id', $id)
            ->countAllResults();

        if ($peminjaman > 0) {
            return redirect()->to('/user')->with('error', 'User tidak bisa dihapus karena masih memiliki data peminjaman');
        }

        $this->userModel->delete($id);

        $this->logModel->logAktivitas('Hapus', 'User', 'Menghapus user: ' . $user['username']);

        return redirect()->to('/user')->with('success', 'User berhasil dihapus');
    }
}
