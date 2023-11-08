<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url("assets/images/" . $this->db->get("profile")->row()->logo) ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Selamat Datang, Admin </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url("assets/images/users/" . $this->db->get_where("auth", array("user" => $this->session->userdata("user")))->row()->foto) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata("nama"); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?= $pages == 'dashboard' ? 'active' : null ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?= ($pages == 'settingapps' || $pages == 'slider' || $pages == 'link' || $pages == 'user') ? 'menu-open' : null ?>">
                    <a href="#" class="nav-link <?= ($pages == 'settingapps' || $pages == 'slider' || $pages == 'link' || $pages == 'user') ? 'active' : null ?>">
                        <i class="nav-icon fa-solid fa-screwdriver-wrench"></i>
                        <p>
                            Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/apps') ?>" class="nav-link  <?= $pages == 'settingapps' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Apps</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/sliders') ?>" class="nav-link <?= $pages == 'slider' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Slider Frontend</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/link') ?>" class="nav-link <?= $pages == 'link' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Link Terkait</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url("admin/user") ?>" class="nav-link <?= $pages == 'user' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($pages == 'sejarah' || $pages == 'visi' || $pages == 'lambang' || $pages == 'struktur' || $pages == 'opd') ? 'menu-open' : null ?>">
                    <a href="#" class="nav-link <?= ($pages == 'sejarah' || $pages == 'visi' || $pages == 'lambang' || $pages == 'struktur' || $pages == 'opd') ? 'active' : null ?>">
                        <i class="nav-icon fas fa-university"></i>
                        <p>
                            Profil
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/sejarah') ?>" class="nav-link  <?= $pages == 'sejarah' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Sejarah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/visi') ?>" class="nav-link <?= $pages == 'visi' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Visi dan Misi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/lambang') ?>" class="nav-link <?= $pages == 'lambang' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Lambang Lembaga</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/struktur') ?>" class="nav-link <?= $pages == 'struktur' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Struktur Organisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/opd') ?>" class="nav-link <?= $pages == 'opd' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;OPD</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($pages == 'berita' || $pages == 'pengumuman' || $pages == 'agenda' || $pages == 'galeri') ? 'menu-open' : null ?>">
                    <a href="#" class="nav-link <?= ($pages == 'berita' || $pages == 'pengumuman' || $pages == 'agenda' || $pages == 'galeri') ? 'active' : null ?>">
                        <i class="nav-icon fas fa-blog"></i>
                        <p>
                            Publikasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('admin/berita') ?>" class="nav-link  <?= $pages == 'berita' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/pengumuman') ?>" class="nav-link <?= $pages == 'pengumuman' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Pengumuman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/agenda') ?>" class="nav-link <?= $pages == 'agenda' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Agenda UKM SAR UNIMAL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/galeri') ?>" class="nav-link <?= $pages == 'galeri' ? 'active' : null ?>">
                                <i class="fa-solid fa-caret-right"></i>
                                <p>&nbsp;&nbsp;Gallery</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('admin/pesan') ?>" class="nav-link <?= $pages == 'pesan' ? 'active' : null ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Pesan
                            <?php
                            $pesanbaru = $this->db->query("select count(id) as jumlah from pesan where status=0")->row()->jumlah;
                            if ($pesanbaru > 0) {
                            ?>
                                <span class="badge badge-info right"><?= $pesanbaru; ?></span>
                            <?php } ?>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>