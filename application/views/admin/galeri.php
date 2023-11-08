<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <span data-toggle="tooltip" data-placement="left" title="Tambah Foto">
                                <a class="btn btn-tool" data-toggle="modal" data-target="#tambahModal">
                                    <i class="fas fa-plus" style="color:blue"></i> Tambah Foto Gallery
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="btn-group w-100 mb-2">
                                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> Semua Kategori </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="1"> Agenda </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="2"> Bakti Sosial </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="3"> Pertemuan </a>
                            </div>
                            <div class="mb-2">
                                <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                            </div>
                        </div>
                        <div>
                            <div class="filter-container p-0 row">
                                <?php
                                foreach ($links as $link) :
                                ?>
                                    <div class="filtr-item col-sm-2" data-category="<?= $link['jenis'] ?>" data-sort="black sample">
                                        <a href="<?= base_url('assets/images/gallery/' . $link['desc']) ?>" data-toggle="lightbox" data-title="<?= $link['judul'] ?>">
                                            <img src="<?= base_url('assets/images/gallery/' . $link['desc']) ?>" class="img-fluid mb-2" alt="black sample" />
                                            <a class="text-danger" id="hapus" href="#" onclick="konfirmasi('','<?= $link['no']; ?> - <?= $link['judul']; ?>','<?= base_url('admin/galeri/delete/' . base64_encode($link['no'])); ?>')">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="profile" method="post" action="<?= base_url('admin/galeri/save') ?>" class="needs-validation" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="card card-primary card-outline mt-1">
                        <div class="card-body box-profile">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="img-preview"></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="choose-file" name="lampiran" accept="image/*">
                                            <label class="custom-file-label" for="customFile">Pilih Foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" name="judul" id="keterangan" placeholder="Keterangan Foto">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select name="kategori" id="kategori" class="form-control form-control-sm">
                                            <option disabled selected>Pilih Kategori</option>
                                            <option value="1">Agenda</option>
                                            <option value="2">Bakti Sosial</option>
                                            <option value="3">Pertemuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <button class="btn btn-sm btn-info" type="submit">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <button class="btn btn-sm btn-danger" data-dismiss="modal">
                                <i class="fa-solid fa-xmark"></i> Batal
                            </button>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </form>
        </div>
    </div>
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
                imgPreview.innerHTML = '<img class="img-fluid" src="' + this.result + '" />';
            });
        }
    }
</script>