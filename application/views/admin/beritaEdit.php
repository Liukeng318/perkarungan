<section class="content">
    <div class="container-fluid">
        <div class="card">
            <?php
            foreach ($links as $link) :
            ?>
                <form id="profile" method="post" action="<?= base_url('admin/berita/update') ?>" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <label for="judul" class="col-sm-2 col-form-label-sm">Judul Berita</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="id" value="<?= $link['id'] ?>">
                                <input type="hidden" name="logolama" value="<?= $link['image'] ?>">
                                <input type="text" class="form-control form-control-sm" id="judul" name="judul" placeholder="Judul Berita" value="<?= $link['judul'] ?>">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="kategori" class="col-sm-2 col-form-label-sm">Kategori</label>
                            <div class="col-sm-10">
                                <select name="kategori" id="kategori" class="form-control form-control-sm">
                                    <option disabled>Pilih Kategori</option>
                                    <option value="1" <?= $link['kategori'] == 1 ? "selected" : null ?>>Berita Daerah</option>
                                    <option value="2" <?= $link['kategori'] == 2 ? "selected" : null ?>>Berita OPD</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-10">
                                <img class="img-fluid" id="imgshow" src="<?= base_url("assets/images/berita/" . $link['image']) ?>" alt="<?= $link['judul'] ?>" width="300">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="judul" class="col-sm-2 col-form-label-sm">Gambar Berita</label>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="imgload" name="logo" accept="image/*">
                                        <label class="custom-file-label" for="customFile"><?= $link['image'] ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="keterangab" class="col-sm-2 col-form-label-sm">Isi Berita</label>
                            <div class="col-sm-10">
                                <textarea id="summernote" id="keterangan" name="keterangan" placeholder="Isi Berita">
                                    <?= $link['keterangan'] ?>
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button class="btn btn-sm btn-info" type="submit">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <button class="btn btn-sm btn-warning" type="Reset">
                                <i class="fas fa-refresh"></i> Reset
                            </button>
                            <a class="btn btn-sm btn-danger" href="<?= base_url("admin/berita") ?>">
                                <i class="fas fa-cancel"></i> Batal
                            </a>
                        </div>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</section>
</div>
<script>
    const chooseFile = document.getElementById("choose-file");
    const imgPreview = document.getElementById("img-preview");

    chooseFile.addEventListener("change", function() {
        getImgData();
    });

    function getImgData() {
        const files = chooseFile.files[0];
        if (files) {
            const fileReader = new FileReader();
            fileReader.readAsDataURL(files);
            fileReader.addEventListener("load", function() {
                imgPreview.style.display = "block";
                imgPreview.innerHTML = '<img src="' + this.result + '" />';
            });
        }
    }
</script>