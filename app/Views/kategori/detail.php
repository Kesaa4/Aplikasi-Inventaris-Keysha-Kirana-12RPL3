<?= view('layout/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><?= $title ?></h2>
    <a href="/kategori" class="btn btn-secondary">Kembali</a>
</div>

<div class="card mb-3">
    <div class="card-body">
        <h5>Informasi Kategori</h5>
        <p><strong>Nama:</strong> <?= $kategori['nama_kategori'] ?></p>
        <p><strong>Keterangan:</strong> <?= $kategori['keterangan'] ?: '-' ?></p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="mb-3">Daftar Barang</h5>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Merek</th>
                        <th>Tipe</th>
                        <th>Kondisi</th>
                        <th>Lokasi</th>
                        <th>Spesifikasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($barang)): ?>
                        <tr><td colspan="7" class="text-center">Tidak ada barang dalam kategori ini</td></tr>
                    <?php else: ?>
                        <?php foreach ($barang as $key => $item): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item['kode_barang'] ?></td>
                            <td><?= $item['merek_barang'] ?></td>
                            <td><?= $item['tipe_barang'] ?></td>
                            <td><span class="badge bg-<?= $item['kondisi'] == 'baik' ? 'success' : 'danger' ?>"><?= ucfirst($item['kondisi']) ?></span></td>
                            <td><?= $item['lokasi'] ?></td>
                            <td><?= $item['keterangan'] ?: '-' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
