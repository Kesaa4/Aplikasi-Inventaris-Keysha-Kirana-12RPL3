<?= view('layout/header') ?>

<div class="row justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-body p-4">
                <h3 class="text-center mb-4">Login</h3>
                
                <?= view('layout/alert') ?>

                <form action="/login" method="post">
                    <div class="mb-3">
                        <label class="form-label">Username / Email</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                
                <div class="text-center mt-3">
                    <p>Belum punya akun? <a href="/register">Daftar</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('layout/footer') ?>
