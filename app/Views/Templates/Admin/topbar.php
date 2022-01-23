<nav class="sb-topnav navbar navbar-expand navbar-dark bg-pink">
    <!-- Navbar Brand-->
    <a class="navbar-brand d-flex justify-content-center align-items-center" href="/dashboard">
        <img src="<?= base_url(); ?>/img/icon2.png" alt="" style="height: 30px;" class="me-3">SIBOOK
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->

    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/settings/<?= session()->get('id'); ?>">Settings</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="/Auth/logout">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>