<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo ">
                    <a href="<?= base_url('admin') ?>"><img style="width: 8vh; height: 10vh;" src="<?= base_url('assets/logo-no-bg.png') ?>" alt="Logo" srcset=""></a>
                </div>
                <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                    <div class="form-check form-switch fs-6">
                        <input class="form-check-input  me-0" type="hidden" id="toggle-dark">
                        <label class="form-check-label"></label>
                    </div>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="dropdown">
                        <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-menu d-flex">
                                <div class="user-name text-end me-3">
                                    <h6 class="mb-0 text-gray-600">John Ducky</h6>
                                    <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                </div>
                                <div class="user-img d-flex align-items-center">
                                    <div class="avatar avatar-md">
                                        <img src="assets/images/faces/1.jpg">
                                    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                            <li>
                                <h6 class="dropdown-header">Hello, John!</h6>
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                    Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                    Settings</a></li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                    Wallet</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item <?= $title == 'Admin' || $title == 'Operator' || $title == 'Staff' ? 'active' : '' ?> ">
                    <a href="<?= base_url('admin') ?>" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>Home</span>
                    </a>
                </li>
                <?php if (session()->get('level') == 'admin') { ?>
                    <li class="sidebar-item <?= $title == 'User' ? 'active' : '' ?>">
                        <a href="<?= base_url('user') ?>" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Kelola User</span>
                        </a>
                    </li>
                <?php } elseif (session()->get('level') == 'staff') { ?>
                    <li class="sidebar-item <?= $title == 'Data Sampah' ? 'active' : '' ?>">
                        <a href="<?= base_url('sampah') ?>" class='sidebar-link'>
                            <i class="bi bi-patch-check-fill"></i>
                            <span>Verifikasi Data Sampah</span>
                        </a>
                    </li>
                    <li class="sidebar-item <?= $title == 'Kelola Sampah' ? 'active' : '' ?>">
                        <a href="<?= base_url('kelola_sampah') ?>" class='sidebar-link'>
                            <i class="bi bi-kanban-fill"></i>
                            <span>Kelola Data Sampah</span>
                        </a>
                    </li>
                <?php } else { ?>
                    <li class="sidebar-item <?= $title == 'Input Sampah' ? 'active' : '' ?>">
                        <a href="<?= base_url('input_sampah') ?>" class='sidebar-link'>
                            <i class="bi bi-recycle"></i>
                            <span>Input Sampah</span>
                        </a>
                    </li>
                <?php } ?>
                <li class="sidebar-item <?= $title == 'Print Sampah' ? 'active' : '' ?>">
                    <a href="<?= base_url('print_sampah') ?>" class='sidebar-link'>
                        <i class="bi bi-printer-fill"></i>
                        <span>Print Data Sampah</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div id="main" class='layout-navbar'>
    <header class='mb-3 bg-white'>
        <nav class="navbar navbar-expand fixed navbar-light navbar-top">
            <div class="container-fluid">
                <a href="#" class="burger-btn d-block">
                    <i class="bi bi-justify fs-3"></i>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                    </ul>
                    <div class="dropdown">
                        <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="text">
                                <h6 class="user-dropdown-name"><?= session()->get('nama') ?></h6>
                                <p class="user-dropdown-status text-sm text-muted"><?= session()->get('level') ?></p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                            <li>
                                <b class="ms-4">Hello, <?= session()->get('nama') ?></b>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>