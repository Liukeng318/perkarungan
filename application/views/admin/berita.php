<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <span data-toggle="tooltip" data-placement="left" title="Tambah Berita">
                        <a class="btn btn-tool" href="<?= base_url("admin/berita/add") ?>">
                            <i class="fas fa-plus" style="color:blue"></i> Tambah Berita
                        </a>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <table id="example3" class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">#</th>
                            <th>Judul</th>
                            <th width="15%">Kategori</th>
                            <th width="5%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($links as $link) :
                        ?>
                            <tr>
                                <td class="align-middle text-center"><?= $i++; ?></td>
                                <td class="align-middle"><?= $link['judul']; ?></td>
                                <td class="align-middle text-center"><?= $link['kategori'] == 1 ? "Berita Daerah" : "Berita OPD"; ?></td>
                                <td class="align-middle text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-default">Pilih</button>
                                        <button type="button" class="btn btn-sm btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <small>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#tambahModal<?= $link['id']; ?>">
                                                    <i class=" far fa-eye"></i> Gambar
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?= base_url("admin/berita/edit/" . base64_encode($link['id'])) ?>">
                                                    <i class="far fa-edit"></i> Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" onclick="konfirmasi('','<?= $link['id']; ?> - <?= $link['judul']; ?>','<?= base_url('admin/berita/delete/' . base64_encode($link['id'])); ?>')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </div>
                                        </small>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
</div>
<?php foreach ($links as $link) : ?>
    <div class="modal fade" id="tambahModal<?= $link['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="container-fluid">
                    <div class="card card-primary card-outline mt-1">
                        <div class="card-body box-profile">
                            <img class="img-fluid" src="<?= base_url("assets/images/berita/" . $link['image']) ?>" alt="<?= $link['judul'] ?>">
                            <small>
                                <span>
                                    <p>Nama File : <?= $link['image'] ?></p>
                                </span>
                            </small>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <button class="btn btn-sm btn-danger" data-dismiss="modal">
                                    <i class="fa-solid fa-close"></i> Tutup
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($links as $link) : ?>
    <div class="modal fade" id="editModal<?= $link['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="profile" method="post" action="<?= base_url('admin/berita/update') ?>" class="needs-validation" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="card card-primary card-outline mt-1">
                            <div class="card-body box-profile">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $link['id'] ?>">
                                    <input type="hidden" name="logolama" value="<?= $link['image'] ?>">
                                    <input type="text" class="form-control form-control-sm" id="judul" name="judul" placeholder="Judul Berita" value="<?= $link['judul'] ?>">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" rows="10" placeholder="Keterangan"><?= $link['judul'] ?></textarea>
                                </div>
                                <div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imgloads" name="lampiran" accept="image/*,application/pdf">
                                            <label class="custom-file-label" for="customFile"><?= $link['image'] ?></label>
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
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
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