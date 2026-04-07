<?php

namespace App\Controllers;

use App\Models\LogAktivitasModel;

class LogAktivitasController extends BaseController
{
    protected $logModel;

    public function __construct()
    {
        $this->logModel = new LogAktivitasModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        
        if ($search) {
            $logs = $this->logModel->searchLogPaginate($search);
        } else {
            $logs = $this->logModel->getAllLogPaginate();
        }
        
        $data = [
            'title' => 'Log Aktivitas',
            'logs' => $logs,
            'pager' => $this->logModel->pager,
            'search' => $search
        ];
        return view('log_aktivitas/index', $data);
    }
}
