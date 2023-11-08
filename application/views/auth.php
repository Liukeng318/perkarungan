<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= strtoupper($title); ?> | Log in</title>

    <link href="<?= base_url('assets/images/' . $this->db->get("profile")->row()->logo) ?>" rel="icon">
    <link href="<?= base_url('assets/images/' . $this->db->get("profile")->row()->logo) ?>" rel="apple-touch-icon">

    <link href="<?= base_url("assets/vendors/fontawesome/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets/css/sb-admin-2.min.css") ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <div class="row align-items-center mt-4">
                                    <div class="container text-center text-gray-900">
                                        <img src="<?= base_url("assets/images/" . $logo) ?>" alt="<?= strtoupper($title); ?>" class="img-fluid" width="50%">
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="container text-center">
                                        <h1 class="h4 text-gray-700 font-weight-bold mt-2 mb-4"><?= strtoupper($title); ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <?= $this->session->flashdata('message'); ?>
                                    <form class="user" method="post" action="<?= base_url('auth') ?>">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="User Name" name="user" id="user" value="<?= set_value('user'); ?>">
                                            <?= form_error('user', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Sign In</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="<?= base_url("assets/vendors/jquery/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendors/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendors/jquery-easing/jquery.easing.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/sb-admin-2.min.js") ?>"></script>

</body>

</html>