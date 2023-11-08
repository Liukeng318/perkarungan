<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= ucwords($this->db->get("profile")->row()->nama); ?> | <?= $pagesTitle; ?></title>

    <link href="<?= base_url('assets/images/' . $this->db->get("profile")->row()->logo) ?>" rel="icon">
    <link href="<?= base_url('assets/images/' . $this->db->get("profile")->row()->logo) ?>" rel="apple-touch-icon">

    <link rel="stylesheet" href="<?= base_url('assets/vendors/fontawesome/css/all.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/Ionicons/css/ionicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables-bs4/css/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables-responsive/css/responsive.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/datatables-buttons/css/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/select2/css/select2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/jqvmap/jqvmap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/toastr/toastr.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/ekko-lightbox/ekko-lightbox.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/overlayScrollbars/css/OverlayScrollbars.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/vendors/summernote/summernote-bs4.min.css') ?>">
    <style>
        tr.group,
        tr.group:hover {
            background-color: purple !important;
            color: white;
        }

        td.numcol {
            text-align: right;
        }

        #img-preview {
            display: none;
            width: 155px;
            border: 2px solid;
            margin-bottom: 20px;
        }

        #img-preview img {
            width: 100%;
            height: auto;
            display: block;
        }
    </style>
</head>

<body class="layout-fixed layout-navbar-fixed text-sm  sidebar-mini">
    <!-- layout-footer-fixed -->
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../assets/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <h4 class="text-muted text-uppercase"><?= $this->db->get("profile")->row()->nama; ?></h4>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <?php
                        $pesanbaru = $this->db->query("select count(id) as jumlah from pesan where status=0")->row()->jumlah;
                        if ($pesanbaru > 0) {
                        ?>
                            <span class="badge badge-danger navbar-badge"><?= $pesanbaru; ?></span>
                        <?php } ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <?php
                        $pesans = $this->db->query("select * from pesan where status=0")->result_array();
                        foreach ($pesans as $pesans) :
                        ?>
                            <a href="#" class="dropdown-item">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="dropdown-item-title text-sm fw-bold">
                                            <?= $pesans['nama']; ?>
                                        </p>
                                        <p class="text-sm text-truncate"><?= $pesans['perihal']; ?></p>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-divider"></div>
                        <?php endforeach; ?>
                        <a href="<?= base_url("admin/pesan") ?>" class="dropdown-item dropdown-footer">Lihat Semua</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>" target="_blank" role="button">
                        <!-- <i class="fas fa-th-large"></i> -->
                        <i class="fa-solid fa-rocket"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url("auth/logout") ?>">
                        <i class="fa-solid fa-power-off"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->