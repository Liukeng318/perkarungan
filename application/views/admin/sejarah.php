<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form id="profile" method="post" action="<?= base_url('admin/sejarah/update') ?>" enctype="multipart/form-data">
                <?php
                foreach ($profiles as $profile) :
                ?>
                    <div class="card-body">
                        <textarea id="summernote" id="keterangan" name="keterangan" placeholder="Sejarah Pembentukan">
                            <?= $profile['sejarah']; ?>
                        </textarea>
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