<?php

namespace App\Models;

use CodeIgniter\Model;

class LogAktivitasModel extends Model
{
    protected $table            = 'log_aktivitas';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'user_id',
        'username',
        'aksi',
        'modul',
        'keterangan',
        'created_at'
    ];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';

    public function logAktivitas($aksi, $modul, $keterangan = null)
    {
        $session = session();
        $request = \Config\Services::request();
        
        $data = [
            'user_id'    => $session->get('user_id'),
            'username'   => $session->get('username') ?? 'Guest',
            'aksi'       => $aksi,
            'modul'      => $modul,
            'keterangan' => $keterangan,
            'created_at' => date('Y-m-d H:i:s'),
        ];
        
        return $this->insert($data);
    }

    public function getAllLogPaginate()
    {
        return $this->orderBy('created_at', 'DESC')
                    ->paginate(20, 'logs');
    }

    public function searchLogPaginate($keyword)
    {
        return $this->groupStart()
                    ->like('username', $keyword)
                    ->orLike('aksi', $keyword)
                    ->orLike('modul', $keyword)
                    ->orLike('keterangan', $keyword)
                ->groupEnd()
                ->orderBy('created_at', 'DESC')
                ->paginate(20, 'logs');
    }
}
