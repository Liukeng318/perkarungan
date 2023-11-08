<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form id="profile" method="post" action="<?= base_url('admin/visi/update') ?>" enctype="multipart/form-data">
                <?php
                foreach ($profiles as $profile) :
                ?>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="visi" class="col-sm-1 col-form-label-sm">Visi</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control form-control-sm" id="visi" name="visi" placeholder="Visi" value="<?= $profile['visi'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-1 col-form-label col-form-label-sm">Misi</label>
                            <div class="col-sm-11">
                                <textarea id="summernote" id="keterangan" name="keterangan" placeholder="Misi">
                                    <?= $profile['misi']; ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button class="btn btn-sm btn-info" type="submit">
                                <i class="fas fa-save"></i> Update
                            </button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </form>
        </div>
    </div>
</section>
</div>