<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="<?= base_url('admin') ?>">Semarangku</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?= base_url('admin') ?>">SMG</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="<?= $active == 'dashboard' ? 'active' : '' ?>"><a class="nav-link " href="<?= base_url('admin') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>


            <li class="menu-header">Berita</li>
            <li class="<?= $active == 'berita' ? 'active' : '' ?>"><a class="nav-link " href="<?= base_url('admin/berita') ?>"><i class="fas fa-fire"></i> <span>Berita</span></a></li>
        </ul>
    </aside>
</div>