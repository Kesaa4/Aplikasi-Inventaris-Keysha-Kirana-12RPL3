<?= view('layout/header') ?>

<h2 class="mb-4"><?= $title ?></h2>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Kode Peminjaman</th>
                        <td><?= $peminjaman['kode_peminjaman'] ?></td>
                    </tr>
                    <tr>
                        <th>Peminjam</th>
                        <td><?= $peminjaman['peminjam'] ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= $peminjaman['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Barang</th>
                        <td><?= $peminjaman['merek_barang'] ?> - <?= $peminjaman['tipe_barang'] ?> (<?= $peminjaman['kode_barang'] ?>)</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless">
                    <tr>
                        <th width="200">Tanggal Pinjam</th>
                        <td><?= date('d/m/Y', strtotime($peminjaman['tanggal_pinjam'])) ?></td>
                    </tr>
                    <tr>
                        <th>Estimasi Tanggal Kembali</th>
                        <td><?= date('d/m/Y', strtotime($peminjaman['tanggal_kembali'])) ?></td>
                    </tr>
                    <?php if ($peminjaman['tanggal_dikembalikan']): ?>
                    <tr>
                        <th>Tanggal Dikembalikan</th>
                        <td><?= date('d/m/Y', strtotime($peminjaman['tanggal_dikembalikan'])) ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th>Status</th>
                        <td><span class="badge bg-primary"><?= ucfirst($peminjaman['status']) ?></span></td>
                    </tr>
                    <?php if ($peminjaman['nama_petugas']): ?>
                    <tr>
                        <th>Divalidasi Oleh</th>
                        <td><?= $peminjaman['nama_petugas'] ?></td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <h5>Keperluan:</h5>
                <p><?= $peminjaman['keperluan'] ?></p>
                
                <?php if ($peminjaman['catatan_petugas']): ?>
                    <h5>Catatan Petugas:</h5>
                    <p><?= $peminjaman['catatan_petugas'] ?></p>
                <?php endif; ?>
            </div>
        </div>
        <a href="/peminjaman" class="btn btn-secondary">Kembali</a>
    </div>
</div>

<?= view('layout/footer') ?>
