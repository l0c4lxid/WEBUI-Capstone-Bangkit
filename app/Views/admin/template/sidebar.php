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
                <a href="<?= base_url('dashboard/admin'); ?>"
                    class="nav-link <?= $subjudul == 'admin' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('dashboard/admin/users'); ?>"
                    class="nav-link <?= $subjudul == 'user' ? 'active' : '' ?>">
                    <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                    <i class=" nav-icon fas fa-users"></i>
                    <p>
                        User
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('dashboard/admin/article'); ?>"
                    class="nav-link <?= $subjudul == 'article' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-clone"></i>
                    <p>
                        Article
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('dashboard/admin/models'); ?>"
                    class="nav-link <?= $subjudul == 'models' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-briefcase"></i>
                    <p>
                        Models
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url("dashboard/admin/ml") ?>"
                    class="nav-link <?= $subjudul == 'ml' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-database"></i>
                    <p>
                        Data Ml
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->