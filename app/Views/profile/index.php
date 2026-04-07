<?= $this->include('layout/header') ?>

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Profile Saya</h5>
                    <a href="/profile/edit" class="btn btn-primary btn-sm">Edit Profile</a>
                </div>
                <div class="card-body">
                    
                    <?= view('layout/alert') ?>

                    <table class="table table-borderless">
                        <tr>
                            <td width="200"><strong>Username</strong></td>
                            <td>: <?= esc($user['username']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Nama Lengkap</strong></td>
                            <td>: <?= esc($user['nama_lengkap']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>: <?= esc($user['email']) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Telepon</strong></td>
                            <td>: <?= esc($user['telepon'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <td><strong>Alamat</strong></td>
                            <td>: <?= esc($user['alamat'] ?? '-') ?></td>
                        </tr>
                        <tr>
                            <td><strong>Role</strong></td>
                            <td>: <?= ucfirst(esc($user['role'])) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Status</strong></td>
                            <td>: <span class="badge bg-<?= $user['status'] == 'aktif' ? 'success' : 'danger' ?>"><?= ucfirst(esc($user['status'])) ?></span></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/footer') ?>
