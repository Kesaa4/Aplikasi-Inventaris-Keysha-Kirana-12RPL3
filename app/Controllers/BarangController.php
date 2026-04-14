<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\LogAktivitasModel;

class BarangController extends BaseController
{
    protected $barangModel;
    protected $kategoriModel;
    protected $logModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        
        if ($search) {
            $barang = $this->barangModel->searchBarang($search)->paginate(10, 'barang');
        } else {
            $barang = $this->barangModel->getBarangWithKategoriPaginate();
        }
        
        $data = [
            'title' => 'Data Barang',
            'barang' => $barang,
            'pager' => $this->barangModel->pager,
            'search' => $search
        ];
        return view('barang/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Barang',
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('barang/create', $data);
    }

    public function store()
    {
        $existingBarang = $this->barangModel
            ->where('kode_barang', $this->request->getPost('kode_barang'))
            ->first();

        if ($existingBarang) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Barang dengan kode barang tersebut sudah ada, silahkan cek!');
        }

        $kondisi = $this->request->getPost('kondisi');

        if ($kondisi == 'rusak') {
            $status = 'tidak tersedia';
        } elseif ($kondisi == 'dipinjam') {
            $status = 'dipinjam';
        } else {
            $status = 'tersedia';
        }

        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'merek_barang' => $this->request->getPost('merek_barang'),
            'tipe_barang' => $this->request->getPost('tipe_barang'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'kondisi' => $kondisi,
            'status' => $status,        
            'lokasi' => $this->request->getPost('lokasi'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if ($this->barangModel->insert($data)) {
            $this->logModel->logAktivitas('Tambah', 'Barang', 'Menambahkan barang: ' . $data['kode_barang']);
            return redirect()->to('/barang')->with('success', 'Data berhasil ditambahkan');
        }
        return redirect()->back()->withInput()->with('errors', $this->barangModel->errors());
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Barang',
            'barang' => $this->barangModel->find($id),
            'kategori' => $this->kategoriModel->findAll()
        ];
        return view('barang/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'kode_barang' => "required|is_unique[barang.kode_barang,id,$id]",
            'merek_barang' => 'required|min_length[2]',
            'tipe_barang' => 'required',
            'kategori_id' => 'required|numeric',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $kondisi = $this->request->getPost('kondisi');
        $barangLama = $this->barangModel->find($id);

        if ($barangLama['status'] == 'dipinjam' && $kondisi == 'rusak') {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Barang sedang dipinjam, tidak bisa diubah menjadi rusak!');
        }

        if ($kondisi == 'rusak') {
            $status = 'tidak tersedia';

        } elseif ($barangLama['status'] == 'dipinjam') {
            // kalau masih dipinjam = tetap dipinjam
            $status = 'dipinjam';

        } else {
            // selain itu = tersedia
            $status = 'tersedia';
        }

        $data = [
            'kode_barang' => $this->request->getPost('kode_barang'),
            'merek_barang' => $this->request->getPost('merek_barang'),
            'tipe_barang' => $this->request->getPost('tipe_barang'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'kondisi' => $kondisi,
            'status' => $status, 
            'lokasi' => $this->request->getPost('lokasi'),
            'keterangan' => $this->request->getPost('keterangan')
        ];

        if ($this->barangModel->update($id, $data)) {
            $this->logModel->logAktivitas('Update', 'Barang', 'Mengupdate barang: ' . $data['kode_barang']);
            return redirect()->to('/barang')->with('success', 'Data berhasil diupdate');
        }
        return redirect()->back()->withInput()->with('error', 'Gagal mengupdate data');
    }

    public function delete($id)
    {
        $barang = $this->barangModel->find($id);

        if ($barang['status'] === 'dipinjam') {
            return redirect()->back()->with('error', 'Barang sedang dipinjam, tidak bisa dihapus!');
        }

        if ($this->barangModel->delete($id)) {
            $this->logModel->logAktivitas('Hapus', 'Barang', 'Menghapus barang: ' . $barang['kode_barang']);
            return redirect()->to('/barang')->with('success', 'Data berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data');
    }

    // AJAX SECTION
    public function search()
    {
        $keyword = $this->request->getGet('q');
        $data = $this->barangModel->searchBarangForm($keyword);

        $result = [];

        foreach ($data as $item) {
            $result[] = [
                'id' => $item['id'],
                'text' => $item['merek_barang'] . ' - ' . $item['tipe_barang'] . ' (' . $item['nama_kategori'] . ')'
            ];
        }

        return $this->response->setJSON($result);
    }
}