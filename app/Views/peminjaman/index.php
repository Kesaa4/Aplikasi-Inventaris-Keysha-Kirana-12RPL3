<?= view('layout/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><?= $title ?></h2>
    <div>
        <?php if (session()->get('role') == 'admin' || session()->get('role') == 'petugas'): ?>
            <a href="/peminjaman/export" class="btn btn-success">
                <i class="bi bi-file-earmark-excel"></i> Export Excel
            </a>
        <?php endif; ?>
        <?php if (session()->get('role') == 'pengguna'): ?>
            <a href="/peminjaman/create" class="btn btn-primary">Ajukan Peminjaman</a>
        <?php endif; ?>
    </div>
</div>

<?= view('layout/alert') ?>

<div class="card mb-3">
    <div class="card-body">
        <form action="/peminjaman" method="get" class="row g-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kode, merek, tipe, peminjam, atau status..." value="<?= $search ?? '' ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
            <div class="col-md-2">
                <a href="/peminjaman" class="btn btn-secondary w-100">Reset</a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="text-center table-primary">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <?php if (session()->get('role') != 'pengguna'): ?>
                            <th>Peminjam</th>
                        <?php endif; ?>
                        <th>Merek</th>
                        <th>Tipe</th>
                        <th>Tanggal Pinjam</th>
                        <th>Estimasi Tanggal Kembali</th>
                        <th>Status</th>
                        <th class="text-nowrap">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($peminjaman)): ?>
                        <tr><td colspan="9" class="text-center">Tidak ada data</td></tr>
                    <?php else: ?>
                        <?php 
                        $no = 1 + (10 * ($pager->getCurrentPage('peminjaman') - 1));
                        foreach ($peminjaman as $item): 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $item['kode_peminjaman'] ?></td>
                            <?php if (session()->get('role') != 'pengguna'): ?>
                                <td><?= $item['peminjam'] ?? '-' ?></td>
                            <?php endif; ?>
                            <td><?= $item['merek_barang'] ?></td>
                            <td><?= $item['tipe_barang'] ?></td>
                            <td><?= date('d/m/Y', strtotime($item['tanggal_pinjam'])) ?></td>
                            <td><?= date('d/m/Y', strtotime($item['tanggal_kembali'])) ?></td>
                            <td>
                                <?php
                                $badge = [
                                    'pending' => 'warning',
                                    'disetujui' => 'info',
                                    'ditolak' => 'danger',
                                    'dipinjam' => 'primary',
                                    'dikembalikan' => 'success'
                                ];
                                ?>
                                <span class="badge bg-<?= $badge[$item['status']] ?>"><?= ucfirst($item['status']) ?></span>
                            </td>
                            <td class="text-center text-nowrap">
                                <a href="/peminjaman/detail/<?= $item['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                <?php if ((session()->get('role') == 'admin' || session()->get('role') == 'petugas') && $item['status'] == 'pending'): ?>
                                    <a href="/peminjaman/validasi/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Validasi</a>
                                <?php endif; ?>
                                <?php if ((session()->get('role') == 'admin' || session()->get('role') == 'petugas') && $item['status'] == 'dipinjam'): ?>
                                    <a href="/peminjaman/kembalikan/<?= $item['id'] ?>" class="btn btn-sm btn-success" onclick="return confirm('Konfirmasi pengembalian?')">Kembalikan</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <!-- Pagination + Info -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mt-3 gap-2">

            <!-- Info -->
            <div class="small">
                Total Data: <b><?= $pager->getTotal('peminjaman') ?></b> |
                Per Page: <b><?= $pager->getPerPage('peminjaman') ?></b> |
                Page: <b><?= $pager->getCurrentPage('peminjaman') ?></b> /
                <?= $pager->getPageCount('peminjaman') ?>
            </div>

            <!-- Pagination -->
            <div>
                <?= $pager->links('peminjaman', 'bootstrap') ?>
            </div>

        </div>
    </div>
</div>

<?= view('layout/footer') ?>
