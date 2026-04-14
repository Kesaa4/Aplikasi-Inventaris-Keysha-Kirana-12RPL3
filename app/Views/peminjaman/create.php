<?= view('layout/header') ?>

<h2 class="mb-4"><?= $title ?></h2>

<?= view('layout/alert') ?>

<div class="card">
    <div class="card-body">
        <form action="/peminjaman/store" method="post">
            <div class="mb-3">
                <label class="form-label">Barang <span class="text-danger">*</span></label>
                <select name="barang_id" id="barangSelect" class="form-select" required>
                    
                </select>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Tanggal Pinjam <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_pinjam" class="form-control" value="<?= old('tanggal_pinjam') ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Estimasi Tanggal Kembali <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_kembali" class="form-control" value="<?= old('tanggal_kembali') ?>" min="<?= old('tanggal_pinjam') ?? date('Y-m-d'); ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Keperluan <span class="text-danger">*</span></label>
                <textarea name="keperluan" class="form-control" rows="3" required><?= old('keperluan') ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajukan</button>
            <a href="/peminjaman" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#barangSelect').select2({
            placeholder: "Pilih Barang",
            allowClear: true
        });
    });
</script>
<?= view('layout/footer') ?>
