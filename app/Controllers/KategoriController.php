<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use App\Models\LogAktivitasModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;
    protected $logModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kategori',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('kategori/index', $data);
    }

    public function create()
    {
        $data = ['title' => 'Tambah Kategori'];
        return view('kategori/create', $data);
    }

    public function store()
    {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if ($this->kategoriModel->insert($data)) {
            $this->logModel->logAktivitas('Tambah', 'Kategori', 'Menambahkan kategori: ' . $data['nama_kategori']);
            return redirect()->to('/kategori')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect()->back()->withInput()->with('errors', $this->kategoriModel->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $this->kategoriModel->find($id)
        ];
        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nama_kategori' => $this->request->getPost('nama_kategori'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if ($this->kategoriModel->update($id, $data)) {
            $this->logModel->logAktivitas('Update', 'Kategori', 'Mengupdate kategori: ' . $data['nama_kategori']);
            return redirect()->to('/kategori')->with('success', 'Data berhasil diupdate');
        }
        return redirect()->back()->withInput()->with('errors', $this->kategoriModel->errors());
    }

    public function delete($id)
    {
        $kategori = $this->kategoriModel->find($id);
        if ($this->kategoriModel->delete($id)) {
            $this->logModel->logAktivitas('Hapus', 'Kategori', 'Menghapus kategori: ' . $kategori['nama_kategori']);
            return redirect()->to('/kategori')->with('success', 'Data berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Gagal menghapus data');
    }

    public function detail($id)
    {
        $barangModel = new \App\Models\BarangModel();
        $kategori = $this->kategoriModel->find($id);
        
        $data = [
            'title' => 'Detail Kategori: ' . $kategori['nama_kategori'],
            'kategori' => $kategori,
            'barang' => $barangModel->where('kategori_id', $id)->findAll()
        ];
        return view('kategori/detail', $data);
    }
}
