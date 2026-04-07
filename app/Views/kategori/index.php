<?= view('layout/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><?= $title ?></h2>
    <?php if (session()->get('role') == 'admin'): ?>
    <a href="/kategori/create" class="btn btn-primary">Tambah Kategori</a>
    <?php endif; ?>
</div>

<?= view('layout/alert') ?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="text-center table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($kategori)): ?>
                        <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
                    <?php else: ?>
                        <?php foreach ($kategori as $key => $item): ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $item['nama_kategori'] ?></td>
                            <td><?= $item['keterangan'] ?></td>
                            <td class="text-center">
                                <a href="/kategori/detail/<?= $item['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                <?php if (session()->get('role') == 'admin'): ?>
                                <a href="/kategori/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/kategori/delete/<?= $item['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
