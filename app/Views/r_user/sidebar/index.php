<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url($user['nama_role']); ?>/dashboard">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-copyright"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SI21A</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="<?= base_url($user['nama_role']); ?>/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Menu
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>user/topup">
            <i class="bi bi-cash-stack"></i>
            <span>Top up Saldo</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>user/kartuhilang">
            <i class="bi bi-credit-card-2-front"></i>
            <span>Kartu Hilang</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-bullhorn"></i>
            <span>Pengumuman</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>