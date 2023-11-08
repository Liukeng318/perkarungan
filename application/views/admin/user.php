<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-tools">
                    <span data-toggle="tooltip" data-placement="left" title="Tambah User">
                        <a class="btn btn-tool" data-toggle="modal" data-target="#tambahModal">
                            <i class="fas fa-plus" style="color:blue"></i> Tambah User
                        </a>
                    </span>
                </div>
            </div>
            <div class="card-body">
                <table id="example3" class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">#</th>
                            <th>Nama</th>
                            <th>User Name</th>
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
                                <td class="align-middle"><?= $link['nama']; ?></td>
                                <td class="align-middle"><?= $link['user']; ?></td>
                                <td class="align-middle text-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-default">Pilih</button>
                                        <button type="button" class="btn btn-sm btn-default dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <small>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editModal<?= $link['user']; ?>">
                                                    <i class="far fa-edit"></i> Edit
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#" onclick="konfirmasi('','<?= $link['user']; ?> - <?= $link['nama']; ?>','<?= base_url('admin/user/delete/' . base64_encode($link['user'])); ?>')">
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

<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="profile" method="post" action="<?= base_url('admin/user/save') ?>" class="needs-validation" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="card card-primary card-outline mt-1">
                        <div class="card-body box-profile">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-sm" id="user" name="user" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password">
                            </div>
                            <div>
                                <div id="img-preview"></div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="choose-file" name="logo" accept="image/*">
                                        <label class="custom-file-label" for="customFile">Foto Profil</label>
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
<?php foreach ($links as $link) : ?>
    <div class="modal fade" id="editModal<?= $link['user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="profile" method="post" action="<?= base_url('admin/user/update') ?>" class="needs-validation" enctype="multipart/form-data">
                    <div class="container-fluid">
                        <div class="card card-primary card-outline mt-1">
                            <div class="card-body box-profile">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $link['user'] ?>">
                                    <input type="hidden" name="logolama" value="<?= $link['foto'] ?>">
                                    <input type="text" class="form-control form-control-sm" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $link['nama'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm" id="user" name="user" placeholder="Username" value="<?= $link['user'] ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password" value="<?= $link['password'] ?>">
                                </div>
                                <div>
                                    <div class="mb-3">
                                        <img id="imgshow" src="<?= base_url("assets/images/users/" . $link['foto']) ?>" alt="<?= $link['nama'] ?>" width="70">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="imgload" name="foto" accept="image/*">
                                            <label class="custom-file-label" for="customFile"><?= $link['foto'] ?></label>
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