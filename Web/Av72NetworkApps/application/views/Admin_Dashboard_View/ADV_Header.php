<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title><?= $this->session->userdata("Av72Net_Username"); ?> | Dashboard</title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/bootstrap/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/iCheck/all.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/select2/select2.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/datatables/datatables.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/fixedheader/css/fixedHeader.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/plugins/jQuery/confirm/jquery-confirm.min.css'); ?>">

    <script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js') ?>"></script>
    <script src="<?= base_url('assets/plugins/ckeditor/config.js') ?>"></script>
  </head>
  <body class="hold-transition skin-black">
    <div class="wrapper">
      <header class="main-header">
        <a href="#" class="logo" style="background-color:#FFF;">
          <span class="logo-mini"><img class="user-image" src="<?= base_url('assets/images/avatar_2x.png'); ?>" width="45px" height="45px"></span>
          <span class="logo-lg"><img class="user-image" src="<?= base_url('assets/images/Logo_Av-72_Network2.png'); ?>" width="200px" height="30px" style="margin-top:10px;"></span>
        </a>
        <nav class="navbar navbar-static-top">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url('assets/images/avatar_2x.png'); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= $this->session->userdata("Av72Net_FullName"); ?></span>
                  <span class="ion-arrow-down-b"></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?= base_url('assets/images/avatar_2x.png'); ?>" class="img-circle" alt="User Image">
                    <p>
                      <?= $this->session->userdata("Av72Net_FullName"); ?> - <?= $this->session->userdata("Av72Net_Role"); ?>
                      <!-- <small>Member since Nov. 2012</small> -->
                    </p>
                  </li>
                  <li class="user-body">
                    <div class="row">
                      <div class="col-xs-6 text-center">
                        <a href="#"><i class="fa fa-user"></i> Profil</a>
                      </div>
                      <div class="col-xs-6 text-center">
                        <a href="<?= base_url('_administrator/change_password'); ?>"><i class="fa fa-cog"></i> Ubah Kata Sandi</a>
                      </div>
                    </div>
                  </li>
                  <li class="user-footer">
                    <div class="pull-right">
                      <a onclick="logout()" class="btn btn-md btn-flat btn-default"><i class="fa fa-sign-out"></i> Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>