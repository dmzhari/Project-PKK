<nav class="navbar navbar-expand-md navbar-dark img-nav">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        Welcome <?= $_SESSION['username'] ?>
    </a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item d-sm-block d-md-none">
                <a href="<?= dirname($_SERVER['PHP_SELF']) ?>" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item dropdown d-sm-block d-md-none">
                <a class="nav-link dropdown-toggle" href="#" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    User
                </a>
                <div class="dropdown-menu animate__animated animate__fadeInRight" aria-labelledby="profile">
                    <a href="admin_profile.php" class="dropdown-item">Profile</a>
                    <a href="admin_password.php" class="dropdown-item">Setting Password</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="row" id="body-row">
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">
        <ul class="list-group">
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center">
                <small>MAIN MENU</small>
            </li>
            <a href="<?= dirname($_SERVER['PHP_SELF']) ?>" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-home fa-fw mr-3"></span>
                    <span>Dashboard</span>
                </div>
            </a>
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span>User</span>
                    <span class="fas fa-caret-down ml-auto"></span>
                </div>
            </a>
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="admin_profile.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span>Profile</span>
                </a>
                <a href="admin_password.php" class="list-group-item list-group-item-action bg-dark text-white">
                    <span>Setting Password</span>
                </a>
            </div>
            <a href="logout.php" class="bg-dark list-group-item list-group-item-action flex-column align-items-start text-danger">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fas fa-sign-out-alt fa-fw mr-3"></span>
                    <span>Logout</span>
                </div>
            </a>
        </ul>
    </div> <!-- End Sidebar -->

    <!-- MAIN -->