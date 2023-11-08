<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <a href="<?= base_url("admin/pesan/kirim") ?>" class="btn btn-primary btn-block mb-3">Compose</a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Folders</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item active">
                                <a href="<?= base_url("admin/pesan") ?>" class="nav-link">
                                    <i class="fas fa-inbox"></i> Inbox
                                    <?php
                                    $pesanbaru = $this->db->query("select count(id) as jumlah from pesan where status=0")->row()->jumlah;
                                    if ($pesanbaru > 0) {
                                    ?>
                                        <span class="badge bg-primary float-right"><?= $pesanbaru; ?></span>
                                    <?php } ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url("admin/pesan/viewtrash") ?>" class="nav-link">
                                    <i class="far fa-trash-alt"></i> Trash
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <?php
                foreach ($links as $link) :
                ?>
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Baca Pesan</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5><?= $link['perihal'] ?></h5>
                                <h6>Dari: <?= $link['nama'] ?>
                                    <span class="mailbox-read-time float-right"><?= date("d M. Y H:i", strtotime($link['tanggal'])) ?></span>
                                </h6>
                            </div>
                            <div class="mailbox-controls with-border text-center">
                                <div class="btn-group">
                                    <?php
                                    if ($link['trash'] == 0) {
                                    ?>
                                        <a class="btn btn-default btn-sm" href="<?= base_url("admin/pesan/trash/" . base64_encode($link['id'])) ?>">
                                        <?php } else { ?>
                                            <a class="btn btn-default btn-sm" href="<?= base_url("admin/pesan/delete/" . base64_encode($link['id'])) ?>">
                                            <?php } ?>
                                            <i class="far fa-trash-alt"></i>
                                            </a>
                                            <?php
                                            if ($link['trash'] == 1) {
                                            ?>
                                                <a class="btn btn-default btn-sm" href="<?= base_url("admin/pesan/recovery/" . base64_encode($link['id'])) ?>">
                                                <?php } else { ?>
                                                    <a class="btn btn-default btn-sm" href="<?= base_url("admin/pesan/reply/" . base64_encode($link['id'])) ?>">
                                                    <?php } ?>
                                                    <i class="fas fa-reply"></i>
                                                    </a>
                                </div>
                            </div>
                            <div class="mailbox-read-message">
                                <p><?= $link['pesan'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
</div>