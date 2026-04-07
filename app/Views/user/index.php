<?= view('layout/header') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><?= $title ?></h2>
    <a href="/user/create" class="btn btn-primary">Tambah Pengguna</a>
</div>

<?= view('layout/alert') ?>

<div class="card mb-3">
    <div class="card-body">
        <form action="/user" method="get" class="row g-3">
            <div class="col-md-8">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan username, nama, atau email..." value="<?= $search ?? '' ?>">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
            <div class="col-md-2">
                <a href="/user" class="btn btn-secondary w-100">Reset</a>
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
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($users)): ?>
                        <tr><td colspan="7" class="text-center">Tidak ada data</td></tr>
                    <?php else: ?>
                        <?php 
                        $no = 1 + (10 * ($pager->getCurrentPage('users') - 1));
                        foreach ($users as $user): 
                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['email'] ?></td>
                            <td><?= $user['nama_lengkap'] ?></td>
                            <td>
                                <span class="badge bg-<?= 
                                    $user['role'] == 'admin' ? 'primary' : 
                                    ($user['role'] == 'petugas' ? 'warning' : 'secondary') 
                                ?>">
                                    <?= ucfirst($user['role']) ?>
                                </span>
                            </td>
                            <td><span class="badge bg-<?= $user['status'] == 'aktif' ? 'success' : 'danger' ?>"><?= ucfirst($user['status']) ?></span></td>
                            <td class="text-center">
                                <a href="/user/edit/<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/user/delete/<?= $user['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
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
                Total Data: <b><?= $pager->getTotal('users') ?></b> |
                Per Page: <b><?= $pager->getPerPage('users') ?></b> |
                Page: <b><?= $pager->getCurrentPage('users') ?></b> /
                <?= $pager->getPageCount('users') ?>
            </div>

            <!-- Pagination -->
            <div>
                <?= $pager->links('users', 'bootstrap') ?>
            </div>

        </div>
    </div>
</div>

<?= view('layout/footer') ?>
