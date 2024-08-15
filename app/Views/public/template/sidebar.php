<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img>
        </div>
        <div class="info">

            <span>Sanity Mate</span>


        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="<?= base_url('try-predictions'); ?>"
                    class="nav-link <?= $subjudul == 'try-predictions' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-fingerprint"></i>
                    <p>
                        Predictions
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url("try-recomendations") ?>"
                    class="nav-link <?= $subjudul == 'try-rekomendations' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-key"></i>
                    <p>
                        Rekomendations
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url("try-ai") ?>" class="nav-link <?= $subjudul == 'try-ai' ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-search"></i>
                    <p>
                        Chat AI
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->