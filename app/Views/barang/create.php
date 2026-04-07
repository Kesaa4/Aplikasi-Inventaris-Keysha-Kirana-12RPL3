<?= view('layout/header') ?>

<h2 class="mb-4"><?= $title ?></h2>

<?= view('layout/alert') ?>

<div class="card">
    <div class="card-body">
        <form action="/barang/store" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kode Barang <span class="text-danger">*</span></label>
                    <input type="text" name="kode_barang" class="form-control" value="<?= old('kode_barang') ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Merek Barang <span class="text-danger">*</span></label>
                    <input type="text" name="merek_barang" class="form-control" value="<?= old('merek_barang') ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipe Barang <span class="text-danger">*</span></label>
                    <input type="text" name="tipe_barang" class="form-control" value="<?= old('tipe_barang') ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori_id" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $kat): ?>
                            <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kondisi <span class="text-danger">*</span></label>
                    <select name="kondisi" class="form-select" required>
                        <option value="">-- Pilih Kondisi --</option>
                        <option value="baik">Baik</option>
                        <option value="rusak">Rusak</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="<?= old('lokasi') ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Spesifikasi</label>
                <textarea name="keterangan" class="form-control" rows="3"><?= old('keterangan') ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/barang" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= view('layout/footer') ?>
