<?= view('layout/header') ?>

<h2 class="mb-4"><?= $title ?></h2>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Selamat Datang, <?= session()->get('nama_lengkap') ?>!</h5>
                <p>Anda login sebagai <strong><?= ucfirst(session()->get('role')) ?></strong></p>
                <p>Gunakan menu di atas untuk navigasi.</p>
            </div>
        </div>
    </div>
</div>

<br>

<div class="row">
    <div class="col-md-4 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title text-center">Total Barang</h5>
                <h2 class="text-center"><?= $total_barang ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-secondary text-white">
            <div class="card-body">
                <h5 class="card-title text-center">Total Kategori</h5>
                <h2 class="text-center"><?= $total_kategori ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title text-center">Total Peminjaman</h5>
                <h2 class="text-center"><?= $total_peminjaman ?></h2>
            </div>
        </div>
    </div>
    <?php if (session()->get('role') == 'admin'): ?>
    <div class="col-md-4 mb-3">
        <div class="card bg-danger text-white">
            <div class="card-body">
                <h5 class="card-title text-center">Total User</h5>
                <h2 class="text-center"><?= $total_user ?></h2>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="col-md-4 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title text-center">Pending</h5>
                <h2 class="text-center"><?= $peminjaman_pending ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title text-center">Dipinjam</h5>
                <h2 class="text-center"><?= $peminjaman_dipinjam ?></h2>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
