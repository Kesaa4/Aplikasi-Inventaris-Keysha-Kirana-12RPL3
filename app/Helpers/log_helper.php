<?php

if (!function_exists('log_aktivitas')) {
    function log_aktivitas($aksi, $modul, $keterangan = null)
    {
        $logModel = new \App\Models\LogAktivitasModel();
        return $logModel->logAktivitas($aksi, $modul, $keterangan);
    }
}
