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
    <div class="col-md-3 mb-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5 class="card-title">Total Barang</h5>
                <h2><?= $total_barang ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5 class="card-title">Total Peminjaman</h5>
                <h2><?= $total_peminjaman ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5 class="card-title">Pending</h5>
                <h2><?= $peminjaman_pending ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5 class="card-title">Dipinjam</h5>
                <h2><?= $peminjaman_dipinjam ?></h2>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
