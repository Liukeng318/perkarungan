<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <span data-toggle="tooltip" data-placement="left" title="Tambah Data Akun">
                        <a class="btn btn-tool" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-plus" style="color:blue"></i> Tambah Slider
                        </a>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php
                    $jumlahslide = count($slider);
                    foreach ($slider as $slide) :
                    ?>
                        <div class="col-md-4">
                            <form id="profile" method="post" action="<?= base_url('admin/sliders/updateslide') ?>" enctype="multipart/form-data">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <h3 class="profile-username text-center">
                                            <input type="hidden" name="id" value="<?= $slide['id'] ?>">
                                            <input type="hidden" name="slidelama" value="<?= $slide['image'] ?>">
                                            <input class="form-control form-control-sm form-control-border text-center" type="text" name="nama" id="nama" value="<?= $slide['nama'] ?>" placeholder="Judul Slide">
                                            <br>
                                            <textarea class="form-control form-control-sm form-control-border" name="keterangan" id="keterangan" rows="9" placeholder="Informasi Gambar"><?= $slide['keterangan'] ?></textarea>
                                        </h3>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/x-png,image/gif,image/jpeg">
                                                <label class="custom-file-label" for="customFile"><?= $slide['image'] ?></label>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <img height="138" width="100%" src="<?= base_url('assets/images/sliders/' . $slide['image']) ?>" alt="<?= $slide['image'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <button class="btn btn-sm btn-info" type="submit">
                                                <i class="fas fa-save"></i> Update
                                            </button>
                                            <?php if ($jumlahslide > 5) { ?>
                                                <a class="btn btn-sm btn-danger" href="#" onclick="konfirmasi('','<?php echo $slide['id']; ?> - <?php echo $slide['nama']; ?>','<?php echo base_url('admin/sliders/delete/' . base64_encode($slide['id'])); ?>')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="profile" method="post" action="<?= base_url('admin/sliders/save') ?>" class="needs-validation" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="card card-primary card-outline mt-1">
                        <div class="card-body box-profile">
                            <h3 class="profile-username text-center">
                                <input class="form-control form-control-sm form-control-border text-center" type="text" name="nama" id="nama" placeholder="Judul Slide">
                                <br>
                                <textarea class="form-control form-control-sm form-control-border" name="keterangan" id="keterangan" rows="5" placeholder="Informasi Gambar"></textarea>
                            </h3>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/x-png,image/gif,image/jpeg" onChange="img_pathUrl(this);">
                                    <label class="custom-file-label" for="customFile">Pilih Gambar</label>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <img id="newslide" height="138" width="100%" src="#" alt="Gambar Slider">
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
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function img_pathUrl(input) {
        $('#newslide')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }
</script>