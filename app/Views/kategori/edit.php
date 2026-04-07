<?= view('layout/header') ?>

<h2 class="mb-4"><?= $title ?></h2>

<?= view('layout/alert') ?>

<div class="card">
    <div class="card-body">
        <form action="/kategori/update/<?= $kategori['id'] ?>" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Kategori <span class="text-danger">*</span></label>
                <input type="text" name="nama_kategori" class="form-control" value="<?= $kategori['nama_kategori'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3"><?= $kategori['keterangan'] ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/kategori" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<?= view('layout/footer') ?>
