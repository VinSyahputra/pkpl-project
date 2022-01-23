<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Menu Utama</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Ruangan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <?php foreach ($ruangan as $ruangan) : ?>
                            <a class="nav-link" href="/ruangan/<?= $ruangan['nama_ruangan']; ?>"><?= ucwords($ruangan['nama_ruangan']); ?></a>
                        <?php endforeach; ?>

                    </nav>
                </div>
                <?php if (session()->get('level') == 2) : ?>
                    <div class="sb-sidenav-menu-heading">MASTER</div>
                    <a class="nav-link" href="/master">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                        Tambah Ruangan
                    </a>
                    <a class="nav-link" href="/user">
                        <div class="sb-nav-link-icon"><i class="fas fa-plus"></i></div>
                        Tambah User
                    </a>
                <?php endif; ?>
            </div>

        </div>
        <div class="sb-sidenav-footer bg-muted text-dark">
            <div class="small">Logged in as:</div>
            <b><?= strtoupper(session()->get('nama')); ?></b>
        </div>
    </nav>
</div>