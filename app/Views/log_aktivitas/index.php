<?= view('layout/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><?= $title ?></h2>
</div>

<?= view('layout/alert') ?>

<div class="card mb-3">
    <div class="card-body">
        <form action="/log-aktivitas" method="get" class="row g-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan username, aksi, modul, atau keterangan..." value="<?= $search ?? '' ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
            <div class="col-md-2">
                <a href="/log-aktivitas" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="text-center table-primary">
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>Username</th>
                        <th>Aksi</th>
                        <th>Modul</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($logs)): ?>
                        <?php 
                        $no = 1 + (20 * ($pager->getCurrentPage('logs') - 1));
                        foreach ($logs as $log): 
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= date('d/m/Y H:i:s', strtotime($log['created_at'])) ?></td>
                                <td><?= esc($log['username']) ?></td>
                                <td>
                                    <span class="badge bg-<?= getBadgeClass($log['aksi']) ?>">
                                        <?= esc($log['aksi']) ?>
                                    </span>
                                </td>
                                <td><?= esc($log['modul']) ?></td>
                                <td><?= esc($log['keterangan']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada data log</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Pagination + Info -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mt-3 gap-2">

            <!-- Info Data -->
            <div class="small">
                Total Data: <b><?= $pager->getTotal('logs') ?></b> |
                Per Page: <b><?= $pager->getPerPage('logs') ?></b> |
                Page: <b><?= $pager->getCurrentPage('logs') ?></b> /
                <?= $pager->getPageCount('logs') ?>
            </div>

            <!-- Pagination -->
            <div>
                <?= $pager->links('logs', 'bootstrap') ?>
            </div>

        </div>
    </div>
</div>

<?php
function getBadgeClass($aksi) {
    $badges = [
        'Login' => 'success',
        'Logout' => 'secondary',
        'Register' => 'info',
        'Tambah' => 'primary',
        'Update' => 'warning',
        'Hapus' => 'danger',
        'Ajukan' => 'info',
        'Validasi' => 'warning',
        'Pengembalian' => 'success'
    ];
    return $badges[$aksi] ?? 'secondary';
}
?>

<?= view('layout/footer') ?>
