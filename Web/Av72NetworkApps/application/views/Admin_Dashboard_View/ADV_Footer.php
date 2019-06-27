      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Internet Payment Beta Version </b> V 0.0.1
        </div>
        <strong>
          Copyright (c) 2018 Copyright Av72Network All Rights Reserved.
        </strong>
      </footer>
    </div> <!--Wrapper-->


    <script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jQuery/confirm/jquery-confirm.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/app.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/dist/js/Av72.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/input-mask/inputmask.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/input-mask/inputmask.numeric.extensions.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>    
    <script src="<?php echo base_url('assets/plugins/chartjs/Chart_2.4.0.js'); ?>"></script>

    <script type="text/javascript">
      $(function(e){
        $(".date").datepicker({
    			language: 'id',
    			viewMode: 'years',
    			format: 'yyyy-mm-dd',
    			autoclose: true,
    			todayHighlight: true
    		});
        if($("#administratorListTable").length > 0){
          getAllAdministratorData();
        }
      });
    </script>

    <script type="text/javascript">
      function logout(){
        $.confirm({
          type : "orange",
          theme : "material",
          title : "Question",
          icon : "fa fa-question",
          content : "Apakah Anda Yakin Ingin Keluar?",
          animation : "top",
          closeAnimation : "bottom",
          animationSpeed : 500,
          animationBounce : 2,
          buttons: {
            IYA: function () {
              $.get("<?= base_url('Login_Controller/logout'); ?>", function(){
                close : true
                setTimeout(function(){
                  location.reload();
                },500);
              });
            },
            TIDAK: function () {
              close : true
            }
          }
        });
      }

      function forceLogout(){
        $.get("<?= base_url('Login_Controller/logout'); ?>", function(){
          close : true
          setTimeout(function(){
            location.reload();
          },500);
        });
      }

      function resetForm(){
        $(".form-control").val("");
        $("select.form-control").prop("selectedIndex",0);
        $(".date").datepicker("setDate", null);
        var saveFunction = $("#btnAction").data("onclick");
        
      }

      function alert(param){
        if(param.CODE >= 400 && param.CODE < 500 && param.CODE != 403){
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
          var alertAutoClose = false;
          var alertTitle = param.MESSAGE;
          var alertContent = param.RESPONSE;
        }else if(param.CODE == 403){
          var alertType = "red";
          var alertIcon = "fa fa-ban";
          var alertAutoClose = false;
          var alertTitle = param.MESSAGE;
          var alertContent = param.RESPONSE;
        }else{
          var alertType = "red";
          var alertIcon = "fa fa-warning";
          var alertAutoClose = false;
          var alertTitle = "Unidentified Error";
          var alertContent = "Error Tidak Terdefinisi, Silahkan Hubungi IT!";
        }

        $.alert({
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
            ok : {
              action : function(){
                if(param.CODE == 403){
                  forceLogout();
                }else{
                  location.reload();
                }
              }
            }
          }
        });

        if(param.CODE == 200){
          return true;
        }
      }

      function checkLengthPassword(param){
        var flags = _checkLengthPassword(param.id);
        if(flags){
          $("#lblWarningUpass").removeClass("in");
          $("#txtConfirmPassword").prop("disabled",false);
        }else{
          $("#lblWarningUpass").addClass("in");
          $("#txtConfirmPassword").prop("disabled",true);
        }
        comparePassword('txtPassword','txtConfirmPassword');
      }

      function comparePassword(param, param2){
        var result = _comparePassword(param, param2);
        if(typeof result === "boolean"){
          if(result){
            if(param2.indexOf('#') == -1){
                param2 = "#"+param2;
              }
            var length = $(param2).val().length;
            if(length > 0){
              $("#lblWarningUconfirm").html("<i class='fa fa-check'></i>")
                                    .addClass("in")
                                    .removeClass("text-red")
                                    .addClass("text-green");
            }else{
              $("#lblWarningUconfirm").removeClass("in");
            }
          }else{
            if(param2.indexOf('#') == -1){
                param2 = "#"+param2;
              }
            var length = $(param2).val().length;
            if(length > 0){
              $("#lblWarningUconfirm").html("<i class='fa fa-remove'></i>")
                                    .addClass("in")
                                    .removeClass("text-green")
                                    .addClass("text-red");
            }else{
              $("#lblWarningUconfirm").removeClass("in");
            }
            
          }
        }else{
          console.log(result);
        }
      }
    </script>

    <!-- ========== SAVE FUNCTION START ========== -->
    <script type="text/javascript">
      function saveAdministratorData(){
        var fullName          = $("#txtFullName").val();
        var username          = $("#txtUsername").val();
        var role              = $("#cmbRole").val();
        var password          = $("#txtPassword").val();
        var confirmPassword   = $("#txtConfirmPassword").val();

        $.ajax({
          type        : "POST",
          url         : "<?= base_url('AdminPage/main/saveAdministratorData'); ?>",
          dataType    : "JSON",
          data        : {
            FULLNAME              : fullName,
            USERNAME              : username,
            ROLE                  : role,
            PASSWORD              : _encodePassword(password),
            PASSWORDCONFIRMATION  : _encodePassword(confirmPassword),
            <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
          },
          beforeSend  : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success     : function(response){
            var result = alert(response);
            if(result){
              getAllAdministratorData();
            }
          },
          error       : function(response){
            var data = {
              CODE : response.status,
              MESSAGE : response.statusText,
              RESPONSE : "[ "+response.status+" "+response.statusText+" ] Silahkan Hubungi Developer Program!"
            }
            alert(data);
          },
          complete    : function(){
            $("#btnAction > i").css("display","inline-block");
            $("#btnAction > img").css("display","none");
          }
        });
      }
    </script>
    <!-- ========== SAVE FUNCTION FINISH ========== -->
<!-- ============================================================================================================================== -->
    <!-- ========== EDIT FUNCTION START ========== -->
    <script type="text/javascript">
      function changePasswordData(){
        var oldPassword = $("#txtOldPassword").val();
        var newPassword = $("#txtPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();

        $.ajax({
          type : "POST",
          url : "<?= base_url('AdminPage/main/changePasswordData'); ?>",
          dataType : "JSON",
          data : {
            OLDPASSWORD : _encodePassword(oldPassword),
            NEWPASSWORD : _encodePassword(newPassword),
            CONFIRMPASSWORD : _encodePassword(confirmPassword),
            <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
          },
          error : function(response){
            var data = {
              CODE : response.status,
              MESSAGE : response.statusText,
              RESPONSE : "[ "+response.status+" "+response.statusText+" ] Silahkan Hubungi Developer Program!"
            }
            alert(data);
          },
          complete : function(){
            $("#btnAction > i").css("display","inline-block");
            $("#btnAction > img").css("display","none");
          }
        });
      }
    </script>
    <!-- ========== EDIT FUNCTION FINISH ========== -->
<!-- ============================================================================================================================== -->
    <!-- ========== DELETE FUNCTION START ========== -->
    <script type="text/javascript">
      function deleteAdministratorData(param){
        $.confirm({
          type: "red",
          theme: "material",
          title: 'Hapus Administrator?',
          content: 'Apakah Anda Yakin Ingin Menghapus Data Tersebut?',
          autoClose: 'cancelAction|10000',
          buttons: {
              deleteUser: {
                text: 'Hapus Data',
                action: function () {
                  $.ajax({
                    type : "POST",
                    url : "<?= base_url('AdminPage/main/deleteAdministratorData'); ?>",
                    dataType : "JSON",
                    data : {
                      ADMINID : param,
                      <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
                    },
                    success : function(response){
                      alert(response);
                    },
                    error : function(response){
                      var param = {
                        CODE : response.status,
                        MESSAGE : response.statusText,
                        RESPONSE : "Maaf, Terjadi Kesalahan Pada Server."
                      }
                      alert(param);
                    }
                  })
                }
              },
              cancelAction: {
                text: 'Batal'
              }
            }
        });
      }
    </script>
    <!-- ========== DELETE FUNCTION FINISH ========== -->
<!-- ============================================================================================================================== -->
    <!-- ========== GET DATA FUNCTION START ========== -->
    <script type="text/javascript">
      function getAllAdministratorData(){
        $.ajax({
          url : "<?= base_url('AdminPage/main/getAllAdministratorData'); ?>",
          dataType : "JSON",
          success : function(response){
            if(response.CODE == 200){
              $("#administratorListTable > tbody").empty();
              $.each(response.RESPONSE.administrator, function(AvIndex, AvValue){
                var buttons = "<button class='btn btn-md btn-flat btn-danger' title='Hapus Data' onclick=deleteAdministratorData('"+AvValue.admin_id+"')><i class='fa fa-trash'></i></button>";
                $("#administratorListTable > tbody:last-child").append(
                  "<tr>"+
                    "<td>"+ ++AvIndex +"</td>"+
                    "<td>"+ AvValue.username +"</td>"+
                    "<td>"+ AvValue.full_name +"</td>"+
                    "<td>"+ AvValue.last_login +"</td>"+
                    "<td>"+ buttons +"</td>"+
                  "</tr>"
                );
              });
            }else{
              alert(response);
            }
          },
          error : function(response){
            var param = {
              CODE : response.status,
              MESSAGE : response.statusText,
              RESPONSE : "Maaf, Terjadi Kesalahan Pada Server."
            }
            alert(param);
          }
        });
      }
    </script>
    <!-- ========== GET DATA FUNCTION FINISH ========== -->
  </body>
</html>
