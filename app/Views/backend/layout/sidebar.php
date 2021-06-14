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
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-briefcase"></i></i><span>Job Fair</span></a>
                <ul class="dropdown-menu">
                    <li class="<?= $active == 'event' ? 'berita' : '' ?>"><a class="nav-link" href="<?= base_url('admin/event') ?>">Event</a></li>
                </ul>
            </li>
        </ul>
    </aside>
</div>