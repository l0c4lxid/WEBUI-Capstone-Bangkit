<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img>
        </div>
        <div class="info">
            <a href="<?= base_url('Dashboard') ?>" class="d-block">
                <span>Welcome</span>
                <?= session('username') ?>
            </a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="<?= base_url('admin/dashboard'); ?>"
                    class="nav-link <?= $subjudul == 'admin' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/predictions'); ?>"
                    class="nav-link <?= $subjudul == 'Predictions' ? 'active' : '' ?>">
                    <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                    <i class=" nav-icon fas fa-search"></i>
                    <p>
                        Predictions
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/recomendation'); ?>"
                    class="nav-link <?= $subjudul == 'recomendation' ? 'active' : '' ?>">
                    <i class="nav-icon fab fa-slack-hash"></i>
                    <p>
                        Rekomendation
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('admin/try-predictions'); ?>"
                    class="nav-link <?= $subjudul == 'try-predictions' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-fingerprint"></i>
                    <p>
                        Try Predictions
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url("admin/try-recomendations") ?>"
                    class="nav-link <?= $subjudul == 'try-rekomendations' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-key"></i>
                    <p>
                        Try Rekomendations
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->