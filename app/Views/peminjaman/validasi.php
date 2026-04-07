<?= view('layout/header') ?>

<h2 class="mb-4"><?= $title ?></h2>

<div class="card mb-3">
    <div class="card-body">
        <h5>Informasi Peminjaman</h5>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Kode:</strong> <?= $peminjaman['kode_peminjaman'] ?></p>
                <p><strong>Peminjam:</strong> <?= $peminjaman['peminjam'] ?></p>
                <p><strong>Barang:</strong> <?= $peminjaman['merek_barang'] ?> - <?= $peminjaman['tipe_barang'] ?></p>
            </div>
            <div class="col-md-6">
                <p><strong>Jumlah:</strong> 1 unit</p>
                <p><strong>Tanggal Pinjam:</strong> <?= date('d/m/Y', strtotime($peminjaman['tanggal_pinjam'])) ?></p>
                <p><strong>Estimasi Tanggal Kembali:</strong> <?= date('d/m/Y', strtotime($peminjaman['tanggal_kembali'])) ?></p>
            </div>
        </div>
        <p><strong>Keperluan:</strong> <?= $peminjaman['keperluan'] ?></p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5>Form Validasi</h5>
        <form action="/peminjaman/proses-validasi/<?= $peminjaman['id'] ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-select" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="disetujui">Disetujui</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Catatan Petugas <span class="text-danger">*</span></label>
                <textarea name="catatan_petugas" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Proses Validasi</button>
            <a href="/peminjaman" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= view('layout/footer') ?>
