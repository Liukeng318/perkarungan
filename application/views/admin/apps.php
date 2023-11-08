<section class="content">
    <div class="container-fluid">
        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#profile" data-toggle="tab">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#logo" data-toggle="tab">Logo</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="profile">
                        <?php foreach ($profiles as $profile) : ?>
                            <form id="profile" method="post" action="<?= base_url('admin/apps/update') ?>">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="container-fluid">

                                            <div class="form-group row">
                                                <label for="Nama" class="col-sm-2 col-form-label-sm">Nama Lembaga</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" id="choose-file">
                                                    <input type="text" class="form-control form-control-sm text-uppercase" id="nama" name="nama" value="<?= $profile['nama'] ?>" placeholder="Nama Daerah">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="kota" class="col-sm-2 col-form-label">Universitas</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-sm text-capitalize" id="kota" name="kota" value="<?= $profile['kota'] ?>" placeholder="Nama Kota">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-sm-2 col-form-label">eMail</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-sm" id="email" name="email" value="<?= $profile['email'] ?>" placeholder="Alamat eMail">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="telp" class="col-sm-2 col-form-label">No. Tlp</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-sm" id="telp" name="telp" value="<?= $profile['telp'] ?>" placeholder="No. Telephone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-sm" id="twitter" name="twitter" value="<?= $profile['twitter'] ?>" placeholder="Link Twitter">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-sm" id="facebook" name="facebook" value="<?= $profile['facebook'] ?>" placeholder="Link Facebook">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control form-control-sm" id="instagram" name="instagram" value="<?= $profile['instagram'] ?>" placeholder="Link Instagram">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="peta" class="col-sm-2 col-form-label">Peta Lokasi Google</label>
                                                <div class="col-sm-10">
                                                    <textarea class="form-control form-control-sm" id="peta" name="peta" rows="3" placeholder="Peta Lokasi Google Map"><?= $profile['peta'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-info float-right" type="submit">
                                            <i class="fas fa-save"></i> Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </div>
                    <div class="tab-pane" id="logo">
                        <div class="container-fluid">
                            <div class="card bg-light d-flex flex-fill">
                                <?php foreach ($profiles as $profile) : ?>
                                    <div class="card-header text-muted border-bottom-0">
                                        Update Logo
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-7">
                                                <h2 class="lead"><b><?= strtoupper($profile['nama']); ?></b></h2>
                                                <p class="text-muted text-sm"><b><?= $profile['visi'] ?></b></p>
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Alamat: <?= strtoupper($profile['kota']); ?></li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: <?= strtoupper($profile['telp']); ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-5 text-center">
                                                <img src="<?= base_url("assets/images/" . $profile['logo']) ?>" alt="logo" class="img-circle img-fluid" width="30%">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <form id="profile" method="post" action="<?= base_url('admin/apps/updateLogo') ?>" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="hidden" name="logolama" value="<?= $profile['logo'] ?>">
                                                    <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/x-png,image/gif,image/jpeg">
                                                    <label class="custom-file-label" for="customFile">Pilih Logo</label>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>