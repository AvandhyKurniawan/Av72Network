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
    <script src="<?php echo base_url('assets/plugins/datatables/datatables.min.js'); ?>"></script>
    <!-- <script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>     -->
    <script src="<?php echo base_url('assets/plugins/chartjs/Chart_2.4.0.js'); ?>"></script>

    <script type="text/javascript">
      var ADMINISTRATORDATA = null;
      var DEPARTMENTDATA = null;
      var EMPLOYEEDATA = null;
      var PACKAGECATEGORYDATA = null;
      var INTERNETPACKAGEDATA = null;

      $(function(e){
        $(".date").datepicker({
    			language: 'id',
    			viewMode: 'years',
    			format: 'yyyy-mm-dd',
    			autoclose: true,
    			todayHighlight: true
        });
        
        $(".currency").inputmask("decimal",{
          rightAlign: false,
          groupSeparator: ",",
          digits: 0,
          autoGroup: true
        });

        if($("#administratorListTable").length > 0){
          ADMINISTRATORDATA = getAllAdministratorData();
        }

        if($("#txtEmployeeId").length > 0){
          getGenerateEmployeeCode("#txtEmployeeId");
        }

        if($("#txtClientId").length > 0){
          getGenerateCustomerCode("#txtClientId");
        }

        if($("#departmentListTable").length > 0){
          DEPARTMENTDATA = getAllDepartmentData();
        }

        if($("#packageCategoriesListTable").length > 0){
          PACKAGECATEGORYDATA = getAllPackageCategoryData();
        }

        if($("#txtCategoryInformation").length > 0){
          CKEDITOR.replace("txtCategoryInformation");
        }

        if($("#cmbType").length > 0){
          getAllPackageCategoryData_Select();
        }

        if($("#txtPackageInformation").length > 0){
          CKEDITOR.replace("txtPackageInformation");
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
        for (instance in CKEDITOR.instances) {
          var name = CKEDITOR.instances[instance].name;
          CKEDITOR.instances[name].setData("");
        }
        var saveFunction = $("#btnAction").data("onclick");
        $("#btnAction").attr("onclick",saveFunction)
                       .html("<img src=<?= base_url('assets/images/loading_1.svg'); ?> style='display: none;' width='20px' height='20px;'>"+
                             "<i class='fa fa-plus' style='display: inline-block;'></i> Tambah Baru");
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
            OK : {
              action : function(){
                if(param.CODE == 403){
                  forceLogout();
                }else{
                  // if(param.CODE >= 200 && param.CODE < 300){

                  // }else{
                  //   location.reload();
                  // }
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

      function getGenerateEmployeeCode(param){
        $.ajax({
          type : "GET",
          url : "<?= base_url('_administrator/getGenerateEmployeeCode'); ?>",
          dataType : "JSON",
          success : function(response){
            $(param).val(response.RESPONSE.employee.RESULTCODE);
          },
          error : function(respose){
            var data = {
              CODE : response.status,
              MESSAGE : response.statusText,
              RESPONSE : "[ "+response.status+" "+response.statusText+" ] Silahkan Hubungi Developer Program!"
            }
            alert(data);
          }
        });
      }

      function getGenerateCustomerCode(param){
        $.ajax({
          type : "GET",
          url : "<?= base_url('_administrator/getGenerateCustomerCode'); ?>",
          dataType : "JSON",
          success : function(response){
            $(param).val(response.RESPONSE.registration_client.RESULTCODE);
          },
          error : function(respose){
            var data = {
              CODE : response.status,
              MESSAGE : response.statusText,
              RESPONSE : "[ "+response.status+" "+response.statusText+" ] Silahkan Hubungi Developer Program!"
            }
            alert(data);
          }
        });
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
          url         : "<?= base_url('_administrator/saveAdministratorData'); ?>",
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
              resetForm();
              ADMINISTRATORDATA.ajax.reload(null, false);
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

      function saveDepartmentData(){
        var departmentName = $("#txtDepartmentName").val();

        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/saveDepartmentData'); ?>",
          dataType : "JSON",
          data : {
            DEPARTMENTNAME : departmentName,
            <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
            if(result){
              resetForm();
              DEPARTMENTDATA.ajax.reload(null, false);
            }
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

      function savePackageCategoryData(){
        var packageCategoryName = $("#txtCategoryName").val();
        var information = CKEDITOR.instances["txtCategoryInformation"].getData();

        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/savePackageCategoryData'); ?>",
          dataType : "JSON",
          data : {
            PACKAGECATEGORYNAME   : packageCategoryName,
            INFORMATION           : information,
            <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
            if(result){
              resetForm();
              PACKAGECATEGORYDATA.ajax.reload(null, false);
            }
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
          url : "<?= base_url('_administrator/changePasswordData'); ?>",
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
            if(result){
              resetForm();
            }
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

      function editDepartmentData(param){
        var departmentName = $("#txtDepartmentName").val();
        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/editDepartmentData'); ?>",
          dataType : "JSON",
          data : {
            DEPARTMENTID          : param,
            DEPARTMENTNAME        : departmentName,
            <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
            if(result){
              resetForm();
              DEPARTMENTDATA.ajax.reload(null, false);
            }
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

      function editPackageCategoryData(param){
        var packageCategoryName = $("#txtCategoryName").val();
        var information = CKEDITOR.instances["txtCategoryInformation"].getData();
        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/editPackageCategoryData'); ?>",
          dataType : "JSON",
          data : {
            PACKAGECATEGORYID     : param,
            PACKAGECATEGORYNAME   : packageCategoryName,
            INFORMATION           : information,
            <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
            if(result){
              resetForm();
              PACKAGECATEGORYDATA.ajax.reload(null, false);
            }
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
                    url : "<?= base_url('_administrator/deleteAdministratorData'); ?>",
                    dataType : "JSON",
                    data : {
                      ADMINID : param,
                      <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
                    },
                    success : function(response){
                      var result = alert(response);
                      if(result){
                        resetForm();
                        ADMINISTRATORDATA.ajax.reload(null, false);
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
                  })
                }
              },
              cancelAction: {
                text: 'Batal'
              }
            }
        });
      }

      function deleteDepartmentData(param){
        $.confirm({
          type: "red",
          theme: "material",
          title: 'Hapus Data Departemen?',
          content: 'Apakah Anda Yakin Ingin Menghapus Data Tersebut?',
          autoClose: 'cancelAction|10000',
          buttons: {
              deleteUser: {
                text: 'Hapus Data',
                action: function () {
                  $.ajax({
                    type : "POST",
                    url : "<?= base_url('_administrator/deleteDepartmentData'); ?>",
                    dataType : "JSON",
                    data : {
                      DEPARTMENTID : param,
                      <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
                    },
                    success : function(response){
                      var result = alert(response);
                      if(result){
                        resetForm();
                        DEPARTMENTDATA.ajax.reload(null, false);
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
                  })
                }
              },
              cancelAction: {
                text: 'Batal'
              }
            }
        });
      }

      function deletePackageCategoryData(param){
        $.confirm({
          type: "red",
          theme: "material",
          title: 'Hapus Data Kategori Paket?',
          content: 'Apakah Anda Yakin Ingin Menghapus Data Tersebut?',
          autoClose: 'cancelAction|10000',
          buttons: {
              deleteUser: {
                text: 'Hapus Data',
                action: function () {
                  $.ajax({
                    type : "POST",
                    url : "<?= base_url('_administrator/deletePackageCategoryData'); ?>",
                    dataType : "JSON",
                    data : {
                      PACKAGECATEGORYID : param,
                      <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
                    },
                    success : function(response){
                      var result = alert(response);
                      if(result){
                        resetForm();
                        PACKAGECATEGORYDATA.ajax.reload(null, false);
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
        var result = $('#administratorListTable').DataTable({
                      ajax: {
                        url     : "<?= base_url('_administrator/getAllAdministratorData'); ?>",
                        dataSrc : "RESPONSE.administrator",
                        error : function(response){
                          var param = {
                            CODE : response.status,
                            MESSAGE : response.statusText,
                            RESPONSE : "Maaf, Terjadi Kesalahan Pada Server."
                          }
                          alert(param);
                        }
                      },
                      columns:[
                        {data : "admin_id"},
                        {data : "username"},
                        {data : "full_name"},
                        {data : "role"},
                        {data : "last_login"},
                        {data : "admin_id"}
                      ],
                      fnRowCallback: function(AvRow, AvData, AvDisplayIndex, AvFullDisplayIndex){
                        $("td:eq(0)",AvRow).text(++AvDisplayIndex);
                        var buttons = "<button class='btn btn-md btn-flat btn-danger' title='Hapus Data' onclick=deleteAdministratorData('"+AvData["admin_id"]+"')><i class='fa fa-trash'></i></button>";
                        $("td:eq(5)",AvRow).html(buttons);
                      }
                    });

        return result;
      }

      function getAllDepartmentData(){
        var result = $('#departmentListTable').DataTable({
                      ajax: {
                        url     : "<?= base_url('_administrator/getAllDepartmentData'); ?>",
                        dataSrc : "RESPONSE.department",
                        error : function(response){
                          var param = {
                            CODE : response.status,
                            MESSAGE : response.statusText,
                            RESPONSE : "Maaf, Terjadi Kesalahan Pada Server."
                          }
                          alert(param);
                        }
                      },
                      columns:[
                        {data : "admin_id"},
                        {data : "department_name"},
                        {data : "updated_on"},
                        {data : "department_id"}
                      ],
                      fnRowCallback: function(AvRow, AvData, AvDisplayIndex, AvFullDisplayIndex){
                        $("td:eq(0)",AvRow).text(++AvDisplayIndex);
                        var buttons = "<button class='btn btn-md btn-flat btn-warning' title='Ubah Data' onclick=getDetailDepartmentDataById('"+AvData["department_id"]+"',"+true+")><i class='fa fa-pencil'></i></button>"+
                                      "<button class='btn btn-md btn-flat btn-danger' title='Hapus Data' onclick=deleteDepartmentData('"+AvData["department_id"]+"')><i class='fa fa-trash'></i></button>";
                        $("td:eq(3)",AvRow).html(buttons);
                      }
                    });

        return result;
      }

      function getDetailDepartmentDataById(param, param2=false){
        $.ajax({
          type : "GET",
          url : "<?= base_url('_administrator/getDetailDepartmentDataById'); ?>",
          dataType : "JSON",
          data : {
            DEPARTMENTID : param
          },
          success : function(response){
            if(param2){
              $.each(response.RESPONSE.department, function(AvIndex, AvValue){
                $("#txtDepartmentName").val(AvValue.department_name);
              });
              var editFunction = "editDepartmentData('"+param+"')";
              $("#btnAction").attr("onclick",editFunction)
                             .html("<img src=<?= base_url('assets/images/loading_1.svg'); ?> style='display: none;' width='20px' height='20px;'>"+
                                   "<i class='fa fa-pencil' style='display: inline-block;'></i> Ubah Data");
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

      function getAllPackageCategoryData(){
        var result = $('#packageCategoriesListTable').DataTable({
                      ajax: {
                        url     : "<?= base_url('_administrator/getAllPackageCategoryData'); ?>",
                        dataSrc : "RESPONSE.package_categories",
                        error : function(response){
                          var param = {
                            CODE : response.status,
                            MESSAGE : response.statusText,
                            RESPONSE : "Maaf, Terjadi Kesalahan Pada Server."
                          }
                          alert(param);
                        }
                      },
                      columns:[
                        {data : "package_categories_id"},
                        {data : "package_categories_name"},
                        {data : "information"},
                        {data : "updated_on"},
                        {data : "package_categories_id"}
                      ],
                      fnRowCallback: function(AvRow, AvData, AvDisplayIndex, AvFullDisplayIndex){
                        $("td:eq(0)",AvRow).text(++AvDisplayIndex);
                        var buttons = "<button class='btn btn-md btn-flat btn-warning' title='Ubah Data' onclick=getDetailPackageCategoryDataById('"+AvData["package_categories_id"]+"',"+true+")><i class='fa fa-pencil'></i></button>"+
                              "<button class='btn btn-md btn-flat btn-danger' title='Hapus Data' onclick=deletePackageCategoryData('"+AvData["package_categories_id"]+"')><i class='fa fa-trash'></i></button>";
                        $("td:eq(4)",AvRow).html(buttons);
                      }
                    });

        return result;
      }

      function getDetailPackageCategoryDataById(param, param2=false){
        $.ajax({
          type : "GET",
          url : "<?= base_url('_administrator/getDetailPackageCategoryDataById'); ?>",
          dataType : "JSON",
          data : {
            PACKAGECATEGORYID : param
          },
          success : function(response){
            if(param2){
              $.each(response.RESPONSE.package_categories, function(AvIndex, AvValue){
                $("#txtCategoryName").val(AvValue.package_categories_name);
                CKEDITOR.instances["txtCategoryInformation"].setData(AvValue.information);
              });
              var editFunction = "editPackageCategoryData('"+param+"')";
              $("#btnAction").attr("onclick",editFunction)
                             .html("<img src=<?= base_url('assets/images/loading_1.svg'); ?> style='display: none;' width='20px' height='20px;'>"+
                                   "<i class='fa fa-pencil' style='display: inline-block;'></i> Ubah Data");
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

      function getAllPackageCategoryData_Select(){
        $.ajax({
          type : "GET",
          url : "<?= base_url('_administrator/getAllPackageCategoryData'); ?>",
          dataType : "JSON",
          success : function(response){
            $("#cmbType").empty();
            $("#cmbType").append("<option>Pilih Kategori Paket</option>");
            $.each(response.RESPONSE.package_categories, function(AvIndex, AvValue){
              $("#cmbType").append(
                "<option value='"+AvValue.package_categories_id+"'>"+AvValue.package_categories_name+"</option>"
              );
            });
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
