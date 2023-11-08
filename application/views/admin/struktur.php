<section class="content">
    <div class="container-fluid">
        <div class="card bg-light d-flex flex-fill">
            <?php foreach ($profiles as $profile) : ?>
                <div class="card-header text-muted border-bottom-0">
                    Struktur Organisasi
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col text-center">
                            <img id="imgshow" src="<?= base_url("assets/images/" . $profile['struktur']) ?>" alt="Struktur Organisasi" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form id="profile" method="post" action="<?= base_url('admin/struktur/update') ?>" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="hidden" name="logolama" value="<?= $profile['logo'] ?>">
                                <input type="file" class="custom-file-input" id="imgload" name="logo" accept="image/x-png,image/gif,image/jpeg">
                                <label class="custom-file-label" for="customFile">Pilih Gambar Struktur Organisasi</label>
                            </div>
                        </div>
                        <div>
                            <div class="text-right">
                                <button class="btn btn-sm btn-info" type="submit">
                                    <i class="fas fa-save"></i> Update
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
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