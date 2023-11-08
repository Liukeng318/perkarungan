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
                <form action="">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Balas Pesan</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            foreach ($links as $link) :
                            ?>
                                <div class="form-group">
                                    <input class="form-control" placeholder="To:" value="<?= $link['email'] ?>">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Subject:" value="Re - <?= $link['perihal'] ?>">
                                </div>
                                <div class="form-group">
                                    <textarea id="compose-textarea" class="form-control" style="height: 300px">
                                    <p>---------------------------------------------------------------------------------------------</p>
                                    <h5>Re - <?= $link['perihal'] ?></h5>
                                    <p><?= $link['pesan'] ?></p>
                                    <p>---------------------------------------------------------------------------------------------</p>
                                </textarea>
                                </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                        </div>
                        <button type="reset" class="btn btn-danger"><i class="fas fa-times"></i> Batal</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</div>