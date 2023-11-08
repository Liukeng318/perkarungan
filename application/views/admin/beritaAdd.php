<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form id="profile" method="post" action="<?= base_url('admin/berita/save') ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label-sm">Judul Berita</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="judul" name="judul" placeholder="Judul Berita">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kategori" class="col-sm-2 col-form-label-sm">Kategori</label>
                        <div class="col-sm-10">
                            <select name="kategori" id="kategori" class="form-control form-control-sm">
                                <option disabled selected>Pilih Kategori</option>
                                <option value="1">Berita Daerah</option>
                                <option value="2">Berita OPD</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <div id="img-preview"></div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label-sm">Gambar Berita</label>
                        <div class="col-sm-10">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="choose-file" name="logo" accept="image/*">
                                    <label class="custom-file-label" for="customFile">Pilih Thumb</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangab" class="col-sm-2 col-form-label-sm">Isi Berita</label>
                        <div class="col-sm-10">
                            <textarea id="summernote" id="keterangan" name="keterangan" placeholder="Isi Berita"></textarea>
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