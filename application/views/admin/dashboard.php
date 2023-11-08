    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shortcut Menu</h3>
                </div>
                <div class="card-body">
                    <a class="btn btn-app" href="<?= base_url("admin/apps") ?>">
                        <i class="fas fa-university"></i> Apps
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/slider") ?>">
                        <i class="fas fa-sliders"></i> Sliders
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/link") ?>">
                        <i class="fas fa-link"></i> Link Terkait
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/user") ?>">
                        <i class="fas fa-users"></i> Users
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/sejarah") ?>">
                        <i class="fas fa-building-flag"></i> Sejarah
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/visi") ?>">
                        <i class="fas fa-eye"></i> Visi dan Misi
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/lambang") ?>">
                        <i class="fas fa-building-shield"></i> Lambang Lembaga
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/struktur") ?>">
                        <i class="fas fa-sitemap"></i> Struktur Organisasi
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/opd") ?>">
                        <i class="fas fa-building"></i> OPD
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/berita") ?>">
                        <?php
                        $jumlah = $this->db->query("select count(id) as jumlah from berita")->row()->jumlah;
                        ?>
                        <span class="badge bg-danger"><?= $jumlah; ?></span>
                        <i class="fas fa-newspaper"></i> Berita
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/pengumuman") ?>">
                        <?php
                        $jumlah = $this->db->query("select count(id) as jumlah from pengumuman")->row()->jumlah;
                        ?>
                        <span class="badge bg-danger"><?= $jumlah; ?></span>
                        <i class="fas fa-bullhorn"></i> Pengumuman
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/agenda") ?>">
                        <?php
                        $jumlah = $this->db->query("select count(id) as jumlah from agenda")->row()->jumlah;
                        ?>
                        <span class="badge bg-danger"><?= $jumlah; ?></span>
                        <i class="fas fa-book"></i> Agenda
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/galeri") ?>">
                        <?php
                        $jumlah = $this->db->query("select count(no) as jumlah from gallery")->row()->jumlah;
                        ?>
                        <span class="badge bg-danger"><?= $jumlah; ?></span>
                        <i class="fas fa-images"></i> Gallery
                    </a>
                    <a class="btn btn-app" href="<?= base_url("admin/pesan") ?>">
                        <?php
                        $pesanbaru = $this->db->query("select count(id) as jumlah from pesan where status=0")->row()->jumlah;
                        if ($pesanbaru > 0) {
                        ?>
                            <span class="badge bg-danger"><?= $pesanbaru; ?></span>
                        <?php } ?>
                        <i class="fas fa-envelope"></i> Pesan
                    </a>
                </div>
            </div>
        </div>
    </section>
    </div>