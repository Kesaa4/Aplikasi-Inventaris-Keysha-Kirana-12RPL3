<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\PeminjamanModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\LogAktivitasModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $role = session()->get('role');
        
        $barangModel = new BarangModel();
        $peminjamanModel = new PeminjamanModel();
        $userModel = new UserModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Dashboard',
            'total_barang' => $barangModel->countAll(),
            'total_kategori' => $kategoriModel->countAll(),
            'total_user' => $userModel->countAll(),
        ];

        if ($role == 'admin' || $role == 'petugas') {
            $data['total_peminjaman'] = $peminjamanModel->countAll();
            $data['peminjaman_pending'] = $peminjamanModel->where('status', 'pending')->countAllResults();
            $data['peminjaman_dipinjam'] = $peminjamanModel->where('status', 'dipinjam')->countAllResults();
        } else {
            $userId = session()->get('user_id');
            $data['total_peminjaman'] = $peminjamanModel->where('user_id', $userId)->countAllResults();
            $data['peminjaman_pending'] = $peminjamanModel->where('user_id', $userId)->where('status', 'pending')->countAllResults();
            $data['peminjaman_dipinjam'] = $peminjamanModel->where('user_id', $userId)->where('status', 'dipinjam')->countAllResults();
        }

        return view('dashboard/index', $data);
    }
}
