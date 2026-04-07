<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table            = 'barang';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'kode_barang', 
        'merek_barang',
        'tipe_barang',
        'kategori_id', 
        'kondisi',
        'status',
        'lokasi', 
        'keterangan'
    ];

    public function getBarangTersedia()
    {
        return $this->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = barang.kategori_id')
            ->where('barang.status', 'tersedia')
            ->findAll();
    }

    public function getBarangWithKategoriPaginate()
    {
        return $this->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = barang.kategori_id')
            ->paginate(10, 'barang');
    }

    public function searchBarang($keyword)
    {
        return $this
        ->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = barang.kategori_id')
            ->groupStart()
                ->like('barang.kode_barang', $keyword)
                ->orLike('barang.merek_barang', $keyword)
                ->orLike('barang.tipe_barang', $keyword)
                ->orLike('barang.kondisi', $keyword)
                ->orLike('barang.status', $keyword)
                ->orLike('kategori.nama_kategori', $keyword)
            ->groupEnd();
    }

    public function searchBarangForm($keyword)
    {
        return $this
        ->select('barang.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = barang.kategori_id')
            ->where('barang.status', 'tersedia')
            ->groupStart()
                ->like('barang.kode_barang', $keyword)
                ->orLike('barang.merek_barang', $keyword)
                ->orLike('barang.tipe_barang', $keyword)
                ->orLike('kategori.nama_kategori', $keyword)
            ->groupEnd()
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
