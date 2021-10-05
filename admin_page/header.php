<!-- Navbar -->
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0 shadow img-nav">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Hello <?= $_SESSION['username'] ?></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="logout.php">Sign out</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="sidebar-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= dirname($_SERVER['PHP_SELF']) ?>">
                            <span class="fas fa-home fa-fw mr-2"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_pengumuman.php">
                            <span class="fas fa-bullhorn fa-fw mr-2"></span>
                            Pengumuman
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#datasiswa" data-toggle="collapse" aria-expanded="false">
                            <span class="fas fa-user-graduate fa-fw mr-2"></span>
                            Data Siswa <span class="fas fa-caret-down fa-fw ml-auto"></span>
                        </a>
                        <div id="datasiswa" class="collapse submenu">
                            <ul>
                                <li class="mt-2">
                                    <a href="admin_tambah_siswa.php">Tambah Siswa</a>
                                </li>
                                <li class="mt-2">
                                    <a href="admin_semua_siswa.php">Semua Siswa</a>
                                </li>
                                <li class="mt-2">
                                    <a href="admin_foto_siswa.php">Foto Siswa</a>
                                </li>
                                <li class="mt-2">
                                    <a href="admin_terima_siswa.php">Diterima</a>
                                </li>
                                <li class="mt-2">
                                    <a href="admin_tolak_siswa.php">Ditolak</a>
                                </li>
                                <li class="mt-2 mb-2">
                                    <a href="admin_verifikasi_siswa.php">Belum Diverifikasi</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#submenu" data-toggle="collapse" aria-expanded="false">
                            <span class="fa fa-user fa-fw mr-2"></span>
                            User <span class="fas fa-caret-down fa-fw ml-auto"></span>
                        </a>
                        <div id='submenu' class="collapse submenu">
                            <ul>
                                <li class="mt-2">
                                    <a href="admin_profile.php">
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li class="mt-2 mb-2">
                                    <a href="admin_password.php">
                                        <span>Setting Password</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin_pengaturan.php">
                            <span class="fas fa-wrench fa-fw mr-2"></span>
                            <span>Website</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Sidebar -->

<!-- MAIN -->