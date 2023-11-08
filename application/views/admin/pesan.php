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
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Inbox</h3>
                    </div>
                    <div class="card-body p-0">
                        <!-- <div class="mailbox-controls"></div> -->
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <?php
                                    foreach ($links as $link) :
                                    ?>
                                        <tr class="<?= $link['status'] == 0 ? "font-weight-bold" : null ?>">
                                            <td>
                                                <a href="<?= base_url("admin/pesan/baca/" . base64_encode($link['id'])) ?>" class="text-dark">
                                                    <?= $link['nama']; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="<?= base_url("admin/pesan/baca/" . base64_encode($link['id'])) ?>" class="text-dark">
                                                    <?= $link['perihal']; ?>
                                                </a>
                                            </td>
                                            <td><?= date("d-M-Y, H:i:s", strtotime($link['tanggal'])); ?></td>
                                            <td>
                                                <a href="<?= base_url("admin/pesan/trash/" . base64_encode($link['id'])) ?>" class="btn btn-sm text-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>