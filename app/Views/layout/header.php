<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Inventaris' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .navbar { background-color: #127feb; }
        .navbar-brand { font-weight: bold; }
        .main-content { padding: 20px; min-height: calc(100vh - 56px); }
    </style>
</head>
<body>
    <?php if (session()->get('logged_in')): ?>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard">Sistem Inventaris</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="/dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'barang') !== false ? 'active' : '' ?>" href="/barang">Data Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'kategori') !== false ? 'active' : '' ?>" href="/kategori">Kategori</a>
                    </li>
                    <?php if (session()->get('role') == 'admin'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'user') !== false ? 'active' : '' ?>" href="/user">Manajemen User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'log-aktivitas') !== false ? 'active' : '' ?>" href="/log-aktivitas">Log Aktivitas</a>
                    </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link <?= strpos(uri_string(), 'peminjaman') !== false ? 'active' : '' ?>" href="/peminjaman">Peminjaman</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <?= session()->get('nama_lengkap') ?> (<?= ucfirst(session()->get('role')) ?>)
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profile">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php endif; ?>
    
    <main class="main-content <?= session()->get('logged_in') ? 'container-fluid' : 'container' ?>"
