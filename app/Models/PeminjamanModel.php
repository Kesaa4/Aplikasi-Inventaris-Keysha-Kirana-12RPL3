<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_peminjaman', 
        'user_id', 
        'barang_id', 
        'tanggal_pinjam', 
        'tanggal_kembali', 
        'tanggal_dikembalikan', 
        'keperluan', 
        'status', 
        'catatan_petugas', 
        'petugas_id'
    ];

    public function getPeminjamanById($id)
    {
        return $this->select('peminjaman.*, barang.merek_barang, barang.tipe_barang, barang.kode_barang, users.nama_lengkap as peminjam, users.email, petugas.nama_lengkap as nama_petugas')
            ->join('barang', 'barang.id = peminjaman.barang_id')
            ->join('users', 'users.id = peminjaman.user_id')
            ->join('users as petugas', 'petugas.id = peminjaman.petugas_id', 'left')
            ->where('peminjaman.id', $id)
            ->first();
    }

    public function getPeminjamanWithDetailsPaginate()
    {
        return $this->select('peminjaman.*, barang.merek_barang, barang.tipe_barang, barang.kode_barang, users.nama_lengkap as peminjam, petugas.nama_lengkap as nama_petugas')
            ->join('barang', 'barang.id = peminjaman.barang_id')
            ->join('users', 'users.id = peminjaman.user_id')
            ->join('users as petugas', 'petugas.id = peminjaman.petugas_id', 'left')
            ->orderBy('peminjaman.created_at', 'DESC')
            ->paginate(10, 'peminjaman');
    }

    public function getPeminjamanByUserPaginate($userId)
    {
        return $this->select('peminjaman.*, barang.merek_barang, barang.tipe_barang, barang.kode_barang')
            ->join('barang', 'barang.id = peminjaman.barang_id')
            ->where('peminjaman.user_id', $userId)
            ->orderBy('peminjaman.created_at', 'DESC')
            ->paginate(10, 'peminjaman');
    }

    public function searchPeminjamanPaginate($keyword)
    {
        return $this->select('peminjaman.*, barang.merek_barang, barang.tipe_barang, barang.kode_barang, users.nama_lengkap as peminjam, petugas.nama_lengkap as nama_petugas')
            ->join('barang', 'barang.id = peminjaman.barang_id')
            ->join('users', 'users.id = peminjaman.user_id')
            ->join('users as petugas', 'petugas.id = peminjaman.petugas_id', 'left')
            ->groupStart()
                ->like('peminjaman.kode_peminjaman', $keyword)
                ->orLike('barang.merek_barang', $keyword)
                ->orLike('barang.tipe_barang', $keyword)
                ->orLike('users.nama_lengkap', $keyword)
                ->orLike('peminjaman.status', $keyword)
            ->groupEnd()
            ->orderBy('peminjaman.created_at', 'DESC')
            ->paginate(10, 'peminjaman');
    }

    public function searchPeminjamanByUserPaginate($userId, $keyword)
    {
        return $this->select('peminjaman.*, barang.merek_barang, barang.tipe_barang, barang.kode_barang')
            ->join('barang', 'barang.id = peminjaman.barang_id')
            ->where('peminjaman.user_id', $userId)
            ->groupStart()
                ->like('peminjaman.kode_peminjaman', $keyword)
                ->orLike('barang.merek_barang', $keyword)
                ->orLike('barang.tipe_barang', $keyword)
                ->orLike('peminjaman.status', $keyword)
            ->groupEnd()
            ->orderBy('peminjaman.created_at', 'DESC')
            ->paginate(10, 'peminjaman');
    }

    public function getAllPeminjamanForExport()
    {
        return $this->select('peminjaman.*, barang.merek_barang, barang.tipe_barang, barang.kode_barang, users.nama_lengkap as peminjam, users.email, petugas.nama_lengkap as nama_petugas')
            ->join('barang', 'barang.id = peminjaman.barang_id')
            ->join('users', 'users.id = peminjaman.user_id')
            ->join('users as petugas', 'petugas.id = peminjaman.petugas_id', 'left')
            ->orderBy('peminjaman.created_at', 'DESC')
            ->findAll();
    }

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
