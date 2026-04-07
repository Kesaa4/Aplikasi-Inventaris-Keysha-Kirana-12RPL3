<?= view('layout/header') ?>

<h2 class="mb-4"><?= $title ?></h2>

<?= view('layout/alert') ?>

<div class="card">
    <div class="card-body">
        <form action="/barang/update/<?= $barang['id'] ?>" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kode Barang <span class="text-danger">*</span></label>
                    <input type="text" name="kode_barang" class="form-control" value="<?= $barang['kode_barang'] ?>" readonly>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Merek Barang <span class="text-danger">*</span></label>
                    <input type="text" name="merek_barang" class="form-control" value="<?= $barang['merek_barang'] ?>" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipe Barang <span class="text-danger">*</span></label>
                    <input type="text" name="tipe_barang" class="form-control" value="<?= $barang['tipe_barang'] ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select name="kategori_id" class="form-select" required>
                        <?php foreach ($kategori as $kat): ?>
                            <option value="<?= $kat['id'] ?>" <?= $kat['id'] == $barang['kategori_id'] ? 'selected' : '' ?>><?= $kat['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Kondisi <span class="text-danger">*</span></label>
                    <select name="kondisi" class="form-select" required>
                        <option value="baik" <?= $barang['kondisi'] == 'baik' ? 'selected' : '' ?>>Baik</option>
                        
                        <option value="rusak" 
                            <?= $barang['kondisi'] == 'rusak' ? 'selected' : '' ?>
                            <?= $barang['status'] == 'dipinjam' ? 'disabled' : '' ?>>
                            Rusak
                        </option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" value="<?= $barang['lokasi'] ?>">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Spesifikasi</label>
                <textarea name="keterangan" class="form-control" rows="3"><?= $barang['keterangan'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/barang" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= view('layout/footer') ?>
