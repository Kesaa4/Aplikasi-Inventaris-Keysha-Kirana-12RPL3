<?= view('layout/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><?= $title ?></h2>
    <?php if (session()->get('role') == 'admin'): ?>
    <a href="/barang/create" class="btn btn-primary">Tambah Barang</a>
    <?php endif; ?>
</div>

<?= view('layout/alert') ?>

<div class="card mb-3">
    <div class="card-body">
        <form action="/barang" method="get" class="row g-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan kode, merek, tipe, kategori, atau kondisi..." value="<?= $search ?? '' ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
            <div class="col-md-2">
                <a href="/barang" class="btn btn-secondary w-100">Reset</a>
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
                        <th class="text-nowrap">Kode</th>
                        <th class="text-nowrap">Merek</th>
                        <th class="text-nowrap">Tipe</th>
                        <th>Kategori</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th>Lokasi</th>
                        <th class="text-nowrap">Spesifikasi</th>
                        <?php if (session()->get('role') == 'admin'): ?>
                        <th>Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($barang)): ?>
                        <tr><td colspan="11" class="text-center">Tidak ada data</td></tr>
                    <?php else: ?>
                        <?php 
                        $no = 1 + (10 * ($pager->getCurrentPage('barang') - 1));
                        foreach ($barang as $item): 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="text-nowrap"><?= $item['kode_barang'] ?></td>
                            <td class="text-nowrap"><?= $item['merek_barang'] ?></td>
                            <td class="text-nowrap"><?= $item['tipe_barang'] ?></td>
                            <td class="text-nowrap"><?= $item['nama_kategori'] ?></td>
                            <td><span class="badge bg-<?= $item['kondisi'] == 'baik' ? 'success' : 'danger' ?>"><?= ucfirst($item['kondisi']) ?></span></td>
                            <td><span class="badge bg-<?= $item['status'] == 'tersedia' ? 'success' : ($item['status'] == 'dipinjam' ? 'warning' : 'danger') ?>"><?= ucfirst($item['status']) ?></span></td>
                            <td class="text-nowrap"><?= $item['lokasi'] ?></td>
                            <td class="text-nowrap"><?= $item['keterangan'] ?: '-' ?></td>
                            <?php if (session()->get('role') == 'admin'): ?>
                            <td class="text-nowrap">
                                <a href="/barang/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/barang/delete/<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                            </td>
                            <?php endif; ?>
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
                Total Data: <b><?= $pager->getTotal('barang') ?></b> |
                Per Page: <b><?= $pager->getPerPage('barang') ?></b> |
                Page: <b><?= $pager->getCurrentPage('barang') ?></b> /
                <?= $pager->getPageCount('barang') ?>
            </div>

            <!-- Pagination -->
            <div>
                <?= $pager->links('barang', 'bootstrap') ?>
            </div>

        </div>
    </div>
</div>

<?= view('layout/footer') ?>
