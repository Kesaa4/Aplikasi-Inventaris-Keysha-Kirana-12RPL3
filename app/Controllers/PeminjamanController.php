<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\BarangModel;
use App\Models\LogAktivitasModel;

class PeminjamanController extends BaseController
{
    protected $peminjamanModel;
    protected $barangModel;
    protected $logModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
        $this->barangModel = new BarangModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        $role = session()->get('role');
        $userId = session()->get('user_id');
        $search = $this->request->getGet('search');

        if ($role == 'pengguna') {
            if ($search) {
                $peminjaman = $this->peminjamanModel->searchPeminjamanByUserPaginate($userId, $search);
            } else {
                $peminjaman = $this->peminjamanModel->getPeminjamanByUserPaginate($userId);
            }
        } else {
            if ($search) {
                $peminjaman = $this->peminjamanModel->searchPeminjamanPaginate($search);
            } else {
                $peminjaman = $this->peminjamanModel->getPeminjamanWithDetailsPaginate();
            }
        }

        $data = [
            'title' => 'Data Peminjaman',
            'peminjaman' => $peminjaman,
            'pager' => $this->peminjamanModel->pager,
            'search' => $search
        ];
        return view('peminjaman/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Ajukan Peminjaman',
            'barang' => $this->barangModel->getBarangTersedia()
        ];
        
        if (empty($data['barang'])) {
            return redirect()->to('/peminjaman')->with('error', 'Tidak ada barang yang tersedia untuk dipinjam');
        }
        
        return view('peminjaman/create', $data);
    }

    public function store()
    {
        $barangId = $this->request->getPost('barang_id');
        $barang   = $this->barangModel->find($barangId);

        $tanggalPinjam   = $this->request->getPost('tanggal_pinjam');
        $tanggalKembali  = $this->request->getPost('tanggal_kembali');
        $keperluan       = $this->request->getPost('keperluan');

        if ($tanggalKembali < $tanggalPinjam) {
            return redirect()->back()->withInput()->with('error', 'Tanggal kembali tidak boleh sebelum tanggal pinjam');
        }
        
        $kode = 'PJM-' . date('Ymd') . '-' . rand(1000, 9999);

        $data = [
            'kode_peminjaman' => $kode,
            'user_id'         => session()->get('user_id'),
            'barang_id'       => $barangId,
            'tanggal_pinjam'  => $tanggalPinjam,
            'tanggal_kembali' => $tanggalKembali,
            'keperluan'       => $keperluan,
            'status'          => 'pending'
        ];
        
        if ($this->peminjamanModel->insert($data)) {
            $this->barangModel->update($barangId, ['status' => 'dipinjam']);

            $this->logModel->logAktivitas(
                'Ajukan',
                'Peminjaman',
                'Mengajukan peminjaman: ' . $kode . ' - ' . $barang['kode_barang']
            );

            return redirect()->to('/peminjaman')->with('success', 'Pengajuan peminjaman berhasil');
        }

        return redirect()->back()->withInput()->with('errors', $this->peminjamanModel->errors());
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Peminjaman',
            'peminjaman' => $this->peminjamanModel->getPeminjamanById($id)
        ];
        return view('peminjaman/detail', $data);
    }

    public function validasi($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);
        $data = [
            'title' => 'Validasi Peminjaman',
            'peminjaman' => $this->peminjamanModel->getPeminjamanById($id)
        ];
        return view('peminjaman/validasi', $data);
    }

    public function prosesValidasi($id)
    {
        $status = $this->request->getPost('status');
        $catatan = $this->request->getPost('catatan_petugas');
        $peminjaman = $this->peminjamanModel->find($id);
        
        $data = [
            'status' => $status == 'disetujui' ? 'dipinjam' : $status,
            'catatan_petugas' => $catatan,
            'petugas_id' => session()->get('user_id')
        ];

        if ($status == 'ditolak') {
            $this->barangModel->update($peminjaman['barang_id'], ['status' => 'tersedia']);
        }

        if ($this->peminjamanModel->update($id, $data)) {
            $this->logModel->logAktivitas('Validasi', 'Peminjaman', 'Memvalidasi peminjaman: ' . $peminjaman['kode_peminjaman'] . ' - Status: ' . $status);
            return redirect()->to('/peminjaman')->with('success', 'Validasi berhasil');
        }
        return redirect()->back()->with('error', 'Validasi gagal');
    }

    public function kembalikan($id)
    {
        $peminjaman = $this->peminjamanModel->find($id);
        
        $data = [
            'status' => 'dikembalikan',
            'tanggal_dikembalikan' => date('Y-m-d')
        ];

        if ($this->peminjamanModel->update($id, $data)) {

            $barang = $this->barangModel->find($peminjaman['barang_id']);

            if ($barang['kondisi'] != 'rusak') {
                $this->barangModel->update($peminjaman['barang_id'], ['status' => 'tersedia']);
            }

            $this->logModel->logAktivitas(
                'Pengembalian',
                'Peminjaman',
                'Mengembalikan barang: ' . $peminjaman['kode_peminjaman']
            );

            return redirect()->to('/peminjaman')->with('success', 'Barang berhasil dikembalikan');
        }

        return redirect()->back()->with('error', 'Gagal mengembalikan barang');
    }

    public function export()
    {
        $peminjaman = $this->peminjamanModel->getAllPeminjamanForExport();
        
        $filename = 'Data_Peminjaman_' . date('Y-m-d_His') . '.csv';
        
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $output = fopen('php://output', 'w');
        
        // BOM untuk Excel agar bisa baca UTF-8
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        
        // Header
        fputcsv($output, [
            'No',
            'Kode Peminjaman',
            'Peminjam',
            'Email',
            'Merek Barang',
            'Tipe Barang',
            'Kode Barang',
            'Tanggal Pinjam',
            'Estimasi Tanggal Kembali',
            'Tanggal Dikembalikan',
            'Keperluan',
            'Status',
            'Catatan Petugas',
            'Petugas'
        ]);
        
        // Data
        $no = 1;
        foreach ($peminjaman as $item) {
            fputcsv($output, [
                $no++,
                $item['kode_peminjaman'],
                $item['peminjam'],
                $item['email'],
                $item['merek_barang'],
                $item['tipe_barang'],
                $item['kode_barang'],
                date('d/m/Y', strtotime($item['tanggal_pinjam'])),
                date('d/m/Y', strtotime($item['tanggal_kembali'])),
                $item['tanggal_dikembalikan'] ? date('d/m/Y', strtotime($item['tanggal_dikembalikan'])) : '-',
                $item['keperluan'],
                ucfirst($item['status']),
                $item['catatan_petugas'] ?: '-',
                $item['nama_petugas'] ?: '-'
            ]);
        }
        
        fclose($output);
        exit;
    }
}
