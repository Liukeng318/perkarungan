<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= strtoupper($title); ?> | Log in</title>

    <link href="<?= base_url('assets/images/' . $this->db->get("profile")->row()->logo) ?>" rel="icon">
    <link href="<?= base_url('assets/images/' . $this->db->get("profile")->row()->logo) ?>" rel="apple-touch-icon">

    <link rel="stylesheet" href="<?= base_url("assets/vendors/fontawesome/css/all.min.css") ?>">
    <link rel=" stylesheet" href="<?= base_url("assets/vendors/icheck-bootstrap/icheck-bootstrap.min.css") ?> ">
    <link rel="stylesheet" href="<?= base_url("assets/css/adminlte.min.css") ?>">
</head>

<body class=" hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?= base_url(); ?>"><b><?= strtoupper($title); ?></a>
        </div>
        <form action="<?= base_url('auth') ?>" method="post">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="User Name" name="user" id="user" value="<?= set_value('user'); ?>">
                        <?= form_error('user', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="from-group">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="<?= base_url("assets/vendors/jquery/jquery.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendors/bootstrap/js/bootstrap.bundle.min.js") ?> "></script>
    <script src="<?= base_url("assets/js/adminlte.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/mine.js") ?>"></script>

</body>

</html>