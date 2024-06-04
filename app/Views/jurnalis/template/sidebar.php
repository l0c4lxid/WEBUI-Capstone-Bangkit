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
                <a href="<?= base_url('jurnalis/dashboard'); ?>"
                    class="nav-link <?= $subjudul == 'jurnalis' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('jurnalis/post'); ?>" class="nav-link <?= $subjudul == 'post' ? 'active' : '' ?>">
                    <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                    <i class=" nav-icon fas fa-clone"></i>
                    <p>
                        Post
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('jurnalis/analyst'); ?>"
                    class="nav-link <?= $subjudul == 'analyst' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-paste"></i>
                    <p>
                        Analyst
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('jurnalis/setting'); ?>"
                    class="nav-link <?= $subjudul == 'setting' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Setting
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->