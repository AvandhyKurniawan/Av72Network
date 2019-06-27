<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Av72NetworkAppsLogin</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/iCheck/all.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/select2/select2.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/fixedheader/css/fixedHeader.bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/jQuery/confirm/jquery-confirm.min.css'); ?>">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box" style="background-color: #FFF;">
      <div class="login-logo" style="margin-bottom:0;">
        <img src="<?php echo base_url('assets/images/Logo_Av-72_Network2.png'); ?>" width="300px" style="margin-top:10px">
      </div>
      <div class="login-box-body">
        <div class="login-box-msg">
          <img src="<?php echo base_url('assets/images/avatar_2x.png'); ?>" class="img-circle" width="80px" height="80px;">
        </div>
        <form class="" action="#" method="POST">
          <div class="form-group has-feedback">
            <input type="text" id="txtUname" class="form-control" placeholder="Nama Pengguna">
            <span class="form-control-feedback fa fa-user"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="txtUpass" class="form-control" placeholder="Kata Sandi">
            <span class="form-control-feedback fa fa-key"></span>
          </div>

          <div class="row">
            <div class="col-xs-12" style="margin-bottom:10px;">
              <button type="button" id="btnLogin" class="btn btn-md btn-flat btn-block btn-primary" onclick="login()">
                <i class="fa fa-sign-in"></i> Masuk
              </button>
            </div>
          </div>
          <!-- <div class="col-md-6">
            <a href="#">Lupa Kata Sandi?</a>
          </div>
          <div class="col-md-6">
            <a href="#" class="pull-right">Belum Punya Akun?</a>
          </div> -->
        </form>
      </div>
    </div>
    <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jQuery/confirm/jquery-confirm.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/Av72.js'); ?>"></script>
    <!-- <script src="<?php #echo base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script> -->

    <!-- <script src="<?php #echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/input-mask/inputmask.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/input-mask/inputmask.numeric.extensions.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/input-mask/jquery.inputmask.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/datatables/jquery.fnReloadAjax.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/fixedheader/js/dataTables.fixedHeader.min.js'); ?>"></script> -->
    <!-- <script src="<?php #echo base_url('assets/plugins/chartjs/Chart_2.4.0.js'); ?>"></script> -->

    <script type="text/javascript">
      $(function(){
        enterKeyEvent("#txtUpass");
      });

      function login(){
        var uName = $("#txtUname").val();
        var uPass = $("#txtUpass").val();
        if(uName=="" || uName==null){
          $("#txtUname").tooltip({
            container : "body",
            placement : "top",
            title : "Nama Pengguna Tidak Boleh Kosong!",
            trigger : "manual"
          });
          $("#txtUname").tooltip("show");
          setTimeout(function(){
            $("#txtUname").tooltip("hide");
          },2000);
        }else if(uPass=="" || uPass==null){
          $("#txtUpass").tooltip({
            container : "body",
            placement : "bottom",
            title : "Kata Sandi Tidak Boleh Kosong!",
            trigger : "manual"
          });
          $("#txtUpass").tooltip("show");
          setTimeout(function(){
            $("#txtUpass").tooltip("hide");
          },2000);
        }else{
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('Login_Controller/login'); ?>",
            dataType : "JSON",
            data : {
              uname : uName,
              upass :  _encodePassword(uPass),
              <?php echo $CSRF_NAME; ?> : "<?php echo $CSRF_TOKEN; ?>"
            },
            success : function(response){
              alert(response);
            }
          });
        }
      }

      function alert(param){
        if(param.CODE >= 400 && param.CODE < 500){
          var alertType = "orange";
          var alertIcon = "fa fa-warning";
          var alertAutoClose = false;
          var alertTitle = param.MESSAGE;
          var alertContent = param.RESPONSE;
        }else if(param.CODE >= 500 && param.CODE < 600){
          var alertType = "red";
          var alertIcon = "fa fa-warning";
          var alertAutoClose = false;
          var alertTitle = param.MESSAGE;
          var alertContent = param.RESPONSE;
        }else if(param.CODE >= 200 && param.CODE < 300){
          var alertType = "green";
          var alertIcon = "fa fa-check-circle";
          var alertAutoClose = "OK|500";
          var alertTitle = param.MESSAGE;
          var alertContent = param.RESPONSE;
        }else{
          var alertType = "red";
          var alertIcon = "fa fa-warning";
          var alertAutoClose = false;
          var alertTitle = "Unidentified Error";
          var alertContent = "Error Tidak Terdefinisi, Silahkan Hubungi IT!";
        }

        $.confirm({
          type : alertType,
          theme : "material",
          title : alertTitle,
          icon : alertIcon,
          content : alertContent,
          autoClose : alertAutoClose,
          animation : "top",
          closeAnimation : "bottom",
          animationSpeed : 500,
          animationBounce : 2,
          buttons: {
            OK: {
              keys : ["enter"],
              action : function () {
                close : true
              }
            }
          },
          onClose : function(){
            setTimeout(function(){
              location.reload();
            },500);
          }
        });
      }

      function enterKeyEvent(param){
        $(param).bind("enterKey", function(e){
          login();
        });
        $(param).keyup(function(e){
          if(e.keyCode == 13){
            $(this).trigger("enterKey");
          }
        });
      }
    </script>
  </body>
</html>
