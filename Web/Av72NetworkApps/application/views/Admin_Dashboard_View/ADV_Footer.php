      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Internet Payment Beta Version </b> V 0.0.1
        </div>
        <strong>
          Copyright (c) 2018 Copyright Av72Network All Rights Reserved.
        </strong>
      </footer>
    </div> <!--Wrapper-->


    <script src="<?= base_url('assets/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jQuery/confirm/jquery-confirm.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/app.min.js'); ?>"></script>
    <script src="<?= base_url('assets/dist/js/Av72.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/fastclick/fastclick.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>

    <script src="<?= base_url('assets/plugins/datepicker/bootstrap-datepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/input-mask/inputmask.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/input-mask/inputmask.numeric.extensions.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/input-mask/jquery.inputmask.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/iCheck/icheck.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/select2/select2.full.min.js'); ?>"></script>
    <script src="<?= base_url('assets/plugins/datatables/datatables.min.js'); ?>"></script>
    <!-- <script src="<?= base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>     -->
    <script src="<?= base_url('assets/plugins/chartjs/Chart_2.4.0.js'); ?>"></script>

    <script type="text/javascript">
      var ADMINISTRATORDATA = null;
      var DEPARTMENTDATA = null;
      var EMPLOYEEDATA = null;
      var PACKAGECATEGORYDATA = null;
      var INTERNETPACKAGEDATA = null;
      var CLIENTREGISTRATIONDATA = null;

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

        if($("#departmentListTable").length > 0){
          DEPARTMENTDATA = getAllDepartmentData();
        }

        if($("#packageCategoriesListTable").length > 0){
          PACKAGECATEGORYDATA = getAllPackageCategoryData();
        }

        if($("#internetPackageListTable").length > 0){
          INTERNETPACKAGEDATA = getAllInternetPackageData();
        }

        if($("#employeeListTable").length > 0){
          EMPLOYEEDATA = getAllEmployeeData();
        }

        if($("#customerListTable").length > 0){
          CLIENTREGISTRATIONDATA = getAllClientRegistrationData();
        }

        if($("#txtEmployeeId").length > 0){
          getGenerateEmployeeCode("#txtEmployeeId");
        }

        if($("#txtClientId").length > 0){
          getGenerateCustomerCode("#txtClientId");
        }

        if($("#cmbType").length > 0){
          getAllPackageCategoryData_Select();
        }

        if($("#cmbDepartment").length > 0){
          getAllDepartmentData_Select();
        }

        if($("#cmbEmployee").length > 0){
          getAllEmployeeData_Select(true);
        }

        if($("#cmbInternetPackage").length > 0){
          getAllInternetPackageData_Select(true);
        }

        if($("#cmbRegistrationID").length > 0){
          getAllClientRegistrationData_Select(true);
        }

        if($("#txtCategoryInformation").length > 0){
          CKEDITOR.replace("txtCategoryInformation");
        }

        if($("#txtPackageInformation").length > 0){
          CKEDITOR.replace("txtPackageInformation");
        }

        if($("#txtAddress").length > 0){
          CKEDITOR.replace("txtAddress");
        }

        if($("#txtRegistrationInformation").length > 0){
          CKEDITOR.replace("txtRegistrationInformation");
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

      function resetForm(param=false){
        $(".form-control").val("");
        $("select.form-control").prop("selectedIndex",0).change();
        $("select.custom-select").val("").change();
        $(".date").datepicker("setDate", null);
        $(".profileImage").attr("src","<?= base_url('assets/images/avatar_2x.png'); ?>");
        for (instance in CKEDITOR.instances) {
          var name = CKEDITOR.instances[instance].name;
          CKEDITOR.instances[name].setData("");
        }
        var saveFunction = $("#btnAction").data("onclick");
        if(param){
          $(".date > input[class='form-control']").val("<?= date('Y-m-d'); ?>").change();
        }
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
            $(param).val(response.RESPONSE.client_registration.RESULTCODE);
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

      function previewImage(param, param2) {
        if (param.files && param.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
            $(param2).attr('src', e.target.result);
          }
          reader.readAsDataURL(param.files[0]);
        }else{
          $(param2).attr('src', "<?= base_url('assets/images/avatar_2x.png'); ?>");
        }
      }

      function uploadPhoto(param){
        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/uploadPhoto'); ?>",
          dataType : "JSON",
          contentType : false,
          processData : false,
          data : param,
          success : function(response){
            alert(response);
          },
          error : function(response){
            var data = {
              CODE : response.status,
              MESSAGE : response.statusText,
              RESPONSE : "[ "+response.status+" "+response.statusText+" ] Silahkan Hubungi Developer Program!"
            }
            alert(data);
          }
        });
      }

      function changePaymentType(param){
        var registrationId = $("#cmbRegistrationID").val();
        var paymentType = $(param).val();
        if(registrationId != null){
          if(paymentType != ""){
            switch(paymentType){
              case "REGISTRASI"                 : $("#registrationAmountWrapper").css("display","block");
                                                  $("#amountToBePaidWrapper").css("display","block");
                                                  break;

              case "INTERNET"                   : $("#paymentPeriodWrapper").css("display","block");
                                                  $("#priceWrapper").css("display","block");                 
                                                  $("#taxWrapper").css("display","block");
                                                  $("#amountToBePaidWrapper").css("display","block");
                                                  break;

              case "PERANGKAT"                  : $("#devicePriceWrapper").css("display","block");
                                                  $("#amountToBePaidWrapper").css("display","block");
                                                  break;

              case "REGISTRASI DAN PERANGKAT"   : $("#registrationAmountWrapper").css("display","block");
                                                  $("#devicePriceWrapper").css("display","block");
                                                  $("#amountToBePaidWrapper").css("display","block");
                                                  break;

              case "INTERNET DAN PERANGKAT"     : $("#paymentPeriodWrapper").css("display","block");
                                                  $("#priceWrapper").css("display","block");
                                                  $("#devicePriceWrapper").css("display","block");
                                                  $("#taxWrapper").css("display","block");
                                                  $("#amountToBePaidWrapper").css("display","block");
                                                  break;

              default                           : $("#paymentPeriodWrapper").css("display","none");
                                                  $("#registrationAmountWrapper").css("display","none");
                                                  $("#priceWrapper").css("display","none");
                                                  $("#devicePriceWrapper").css("display","none");
                                                  $("#taxWrapper").css("display","none");
                                                  $("#amountToBePaidWrapper").css("display","none");
                                                  break;
            }
          }else{
            $("#paymentPeriodWrapper").css("display","none");
            $("#registrationAmountWrapper").css("display","none");
            $("#priceWrapper").css("display","none");
            $("#devicePriceWrapper").css("display","none");
            $("#taxWrapper").css("display","none");
            $("#amountToBePaidWrapper").css("display","none");
          }
        }else{
          $(param).val("");
          $("#paymentPeriodWrapper").css("display","none");
          $("#registrationAmountWrapper").css("display","none");
          $("#priceWrapper").css("display","none");
          $("#devicePriceWrapper").css("display","none");
          $("#taxWrapper").css("display","none");
          $("#amountToBePaidWrapper").css("display","none");
          var data = {
              CODE : 400,
              MESSAGE : "Bad Request",
              RESPONSE : "Maaf, ID. Registrasi Harus Diisi Terlebih Dahulu!"
            }
            alert(data);
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

      function saveInternetPackageData(){
        var internetPackageName = $("#txtInternetPackage").val();
        var speed = $("#txtSpeed").val();
        var price = $("#txtHarga").val().replace(/,/gi,"");
        var type = $("#cmbType").val();
        var information = CKEDITOR.instances["txtPackageInformation"].getData();

        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/saveInternetPackageData'); ?>",
          dataType : "JSON",
          data : {
            INTERNETPACKAGENAME   : internetPackageName,
            SPEED                 : speed,
            PRICE                 : price,
            PACKAGECATEGORYID     : type,
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
              INTERNETPACKAGEDATA.ajax.reload(null, false);
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

      function saveEmployeeData(){
        var employeeId       = $("#txtEmployeeId").val();
        var numberId         = $("#txtNumberId").val();
        var fullName         = $("#txtFullName").val();
        var gender           = $("#cmbGender").val();
        var birthday         = $("#txtBirthday").val();
        var phoneNumber      = $("#txtPhone").val();
        var otherPhoneNumber = $("#txtOtherPhone").val();
        var email            = $("#txtEmail").val();
        var address          = CKEDITOR.instances["txtAddress"].getData();
        var photoName        = $("#filePhoto").val().replace(/.*(\/|\\)/, '').replace(/ |\/|\\/gi,"_");
        var joinDate         = $("#txtJoinDate").val();
        var department       = $("#cmbDepartment").val();

        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/saveEmployeeData'); ?>",
          dataType : "JSON",
          data : {
            EMPLOYEEID            : _encodePassword(employeeId),
            DEPARTMENTID          : department,
            NUMBERID              : numberId,
            FULLNAME              : fullName,
            GENDER                : gender,
            BIRTHDAY              : birthday,
            PHONENUMBER           : phoneNumber,
            OTHERPHONENUMBER      : otherPhoneNumber,
            ADDRESS               : address,
            EMAIL                 : email,
            JOINDATE              : joinDate,
            PICTURENAME           : photoName,
            <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
            if(result){
              if(photoName){
                var formData = new FormData();
                formData.append("FILEPHOTO",$("#filePhoto")[0].files[0]);
                formData.append("<?= $CSRF_NAME; ?>","<?= $CSRF_TOKEN; ?>");
                uploadPhoto(formData);
              }
              resetForm();
              getGenerateEmployeeCode('#txtEmployeeId');
              EMPLOYEEDATA.ajax.reload(null, false);
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

      function saveClientRegistrationData(){
        var registrationId    = $("#txtClientId").val();
        var packageId         = $("#cmbInternetPackage").val();
        var employeeId        = $("#cmbEmployee").val();
        var ispParentId       = $("#txtIspParentId").val();
        var numberId          = $("#txtNumberId").val();
        var fullName          = $("#txtFullName").val();
        var gender            = $("#cmbGender").val();
        var birthday          = $("#txtBirthday").val();
        var phoneNumber       = $("#txtTelp").val();
        var otherPhoneNumber  = $("#txtTelpLain").val();
        var email             = $("#txtEmail").val();
        var address           = CKEDITOR.instances["txtAddress"].getData();
        var price             = $("#txtPrice").val().replace(/,/g,"");
        var registrationDate  = $("#txtRegistrationDate").val();
        var registrationFee   = $("#txtRegistrationFee").val().replace(/,/g,"");
        var deviceStatus      = $("#cmbDeviceStatus").val();
        var devicePrice       = $("#txtDevicePrice").val().replace(/,/g,"");
        var registrationInfo  = CKEDITOR.instances["txtRegistrationInformation"].getData();

        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/saveClientRegistration'); ?>",
          dataType : "JSON",
          data : {
            REGISTRATIONID      : _encodePassword(registrationId),
            PACKAGEID           : packageId,
            EMPLOYEEID          : employeeId,
            ISPPARENTID         : ispParentId,
            NUMBERID            : numberId,
            FULLNAME            : fullName,
            GENDER              : gender,
            BIRTHDAY            : birthday,
            PHONENUMBER         : phoneNumber,
            OTHERPHONENUMBER    : otherPhoneNumber,
            EMAIL               : email,
            ADDRESS             : address,
            PRICE               : price,
            REGISTRATIONDATE    : registrationDate,
            REGISTRATIONFEE     : registrationFee,
            DEVICESTATUS        : deviceStatus,
            DEVICEPRICE         : devicePrice,
            REGISTRATIONINFO    : registrationInfo,
            <?= $CSRF_NAME; ?>  : "<?= $CSRF_TOKEN; ?>" 
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
            if(result){
              resetForm();
              getGenerateCustomerCode("#txtClientId");
              CLIENTREGISTRATIONDATA.ajax.reload(null, false);
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
              $("#lblWarningUconfirm").removeClass("in");
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

      function editInternetPackageData(param){
        var internetPackageName = $("#txtInternetPackage").val();
        var speed = $("#txtSpeed").val();
        var price = $("#txtHarga").val().replace(/,/gi,"");
        var type = $("#cmbType").val();
        var information = CKEDITOR.instances["txtPackageInformation"].getData();

        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/editInternetPackageData'); ?>",
          dataType : "JSON",
          data : {
            INTERNETPACKAGEID     : param,
            INTERNETPACKAGENAME   : internetPackageName,
            SPEED                 : speed,
            PRICE                 : price,
            PACKAGECATEGORYID     : type,
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
              INTERNETPACKAGEDATA.ajax.reload(null, false);
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

      function editEmployeeData(param){
        var employeeId       = $("#txtEmployeeId").val();
        var numberId         = $("#txtNumberId").val();
        var fullName         = $("#txtFullName").val();
        var gender           = $("#cmbGender").val();
        var birthday         = $("#txtBirthday").val();
        var phoneNumber      = $("#txtPhone").val();
        var otherPhoneNumber = $("#txtOtherPhone").val();
        var email            = $("#txtEmail").val();
        var address          = CKEDITOR.instances["txtAddress"].getData();
        var photoName        = $("#filePhoto").val().replace(/.*(\/|\\)/, '').replace(/ |\/|\\/gi,"_");
        var joinDate         = $("#txtJoinDate").val();
        var department       = $("#cmbDepartment").val();

        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/editEmployeeData'); ?>",
          dataType : "JSON",
          data : {
            EMPLOYEEID            : _encodePassword(employeeId),
            DEPARTMENTID          : department,
            NUMBERID              : numberId,
            FULLNAME              : fullName,
            GENDER                : gender,
            BIRTHDAY              : birthday,
            PHONENUMBER           : phoneNumber,
            OTHERPHONENUMBER      : otherPhoneNumber,
            ADDRESS               : address,
            EMAIL                 : email,
            JOINDATE              : joinDate,
            PICTURENAME           : photoName,
            <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
            if(result){
              if(photoName){
                var formData = new FormData();
                formData.append("FILEPHOTO",$("#filePhoto")[0].files[0]);
                formData.append("<?= $CSRF_NAME; ?>","<?= $CSRF_TOKEN; ?>");
                uploadPhoto(formData);
              }
              resetForm();
              getGenerateEmployeeCode('#txtEmployeeId');
              EMPLOYEEDATA.ajax.reload(null, false);
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

      function editClientRegistrationData(param){
        var packageId         = $("#cmbInternetPackage").val();
        var employeeId        = $("#cmbEmployee").val();
        var ispParentId       = $("#txtIspParentId").val();
        var numberId          = $("#txtNumberId").val();
        var fullName          = $("#txtFullName").val();
        var gender            = $("#cmbGender").val();
        var birthday          = $("#txtBirthday").val();
        var phoneNumber       = $("#txtTelp").val();
        var otherPhoneNumber  = $("#txtTelpLain").val();
        var email             = $("#txtEmail").val();
        var address           = CKEDITOR.instances["txtAddress"].getData();
        var price             = $("#txtPrice").val().replace(/,/g,"");
        var registrationDate  = $("#txtRegistrationDate").val();
        var registrationFee   = $("#txtRegistrationFee").val().replace(/,/g,"");
        var deviceStatus      = $("#cmbDeviceStatus").val();
        var devicePrice       = $("#txtDevicePrice").val().replace(/,/g,"");
        var registrationInfo  = CKEDITOR.instances["txtRegistrationInformation"].getData();

        $.ajax({
          type : "POST",
          url : "<?= base_url('_administrator/editClientRegistrationData'); ?>",
          dataType : "JSON",
          data : {
            REGISTRATIONID      : _encodePassword(param),
            PACKAGEID           : packageId,
            EMPLOYEEID          : employeeId,
            ISPPARENTID         : ispParentId,
            NUMBERID            : numberId,
            FULLNAME            : fullName,
            GENDER              : gender,
            BIRTHDAY            : birthday,
            PHONENUMBER         : phoneNumber,
            OTHERPHONENUMBER    : otherPhoneNumber,
            EMAIL               : email,
            ADDRESS             : address,
            PRICE               : price,
            REGISTRATIONDATE    : registrationDate,
            REGISTRATIONFEE     : registrationFee,
            DEVICESTATUS        : deviceStatus,
            DEVICEPRICE         : devicePrice,
            REGISTRATIONINFO    : registrationInfo,
            <?= $CSRF_NAME; ?>  : "<?= $CSRF_TOKEN; ?>" 
          },
          beforeSend : function(){
            $("#btnAction > i").css("display","none");
            $("#btnAction > img").css("display","inline-block");
          },
          success : function(response){
            var result = alert(response);
            if(result){
              resetForm();
              getGenerateCustomerCode("#txtClientId");
              CLIENTREGISTRATIONDATA.ajax.reload(null, false);
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

      function deleteInternetPackageData(param){
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
                    url : "<?= base_url('_administrator/deleteInternetPackageData'); ?>",
                    dataType : "JSON",
                    data : {
                      INTERNETPACKAGEID : param,
                      <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
                    },
                    success : function(response){
                      var result = alert(response);
                      if(result){
                        resetForm();
                        INTERNETPACKAGEDATA.ajax.reload(null, false);
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

      function deleteEmployeeData(param){
        $.confirm({
          type: "red",
          theme: "material",
          title: 'Hapus Data Pegawai?',
          content: 'Apakah Anda Yakin Ingin Menghapus Data Tersebut?',
          autoClose: 'cancelAction|10000',
          buttons: {
              deleteUser: {
                text: 'Hapus Data',
                action: function () {
                  $.ajax({
                    type : "POST",
                    url : "<?= base_url('_administrator/deleteEmployeeData'); ?>",
                    dataType : "JSON",
                    data : {
                      EMPLOYEEID : param,
                      <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
                    },
                    success : function(response){
                      var result = alert(response);
                      if(result){
                        resetForm();
                        getGenerateEmployeeCode('#txtEmployeeId');
                        EMPLOYEEDATA.ajax.reload(null, false);
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

      function deleteClientRegistrationData(param){
        $.confirm({
          type: "red",
          theme: "material",
          title: 'Hapus Data Pelanggan?',
          content: 'Apakah Anda Yakin Ingin Menghapus Data Tersebut?',
          autoClose: 'cancelAction|10000',
          buttons: {
              deleteUser: {
                text: 'Hapus Data',
                action: function () {
                  $.ajax({
                    type : "POST",
                    url : "<?= base_url('_administrator/deleteClientRegistrationData'); ?>",
                    dataType : "JSON",
                    data : {
                      REGISTRATIONID : _encodePassword(param),
                      <?= $CSRF_NAME; ?>    : "<?= $CSRF_TOKEN; ?>"
                    },
                    success : function(response){
                      var result = alert(response);
                      if(result){
                        resetForm();
                        getGenerateCustomerCode("#txtClientId");
                        CLIENTREGISTRATIONDATA.ajax.reload(null, false);
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

      function getAllDepartmentData_Select(param=false){
        if(param){
          $("#cmbDepartment").addClass("custom-select");
          $("#cmbDepartment").select2({
            placeholder : "Pilih Departemen",
            // dropdownParent: $("#modalInputRencanaKerja"),
            width : "100%",
            cache:false,
            allowClear:true,
            ajax:{
              url : "<?= base_url('_administrator/getAllDepartmentData'); ?>",
              dataType : "JSON",
              delay : 0,
              data : function(params){
                var query = {
                  SEARCH: params.term
                }
                return query;
              },
              processResults : function(response){
                return{
                  results : $.map(response.RESPONSE.department, function(item){
                    return{
                      text:item.department_id,
                      id:item.department_name
                    }
                  })
                };
              }
            }
          });
        }else{
          $.ajax({
            type : "GET",
            url : "<?= base_url('_administrator/getAllDepartmentData'); ?>",
            dataType : "JSON",
            success : function(response){
              $("#cmbDepartment").removeClass("custom-select");
              $("#cmbDepartment").empty();
              $("#cmbDepartment").append("<option>Pilih Departemen</option>");
              $.each(response.RESPONSE.department, function(AvIndex, AvValue){
                $("#cmbDepartment").append(
                  "<option value='"+AvValue.department_id+"'>"+AvValue.department_name+"</option>"
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

      function getAllPackageCategoryData_Select(param=false){
        if(param){
          $("#cmbType").addClass("custom-select");
          $("#cmbType").select2({
            placeholder : "Pilih Kategori Paket",
            // dropdownParent: $("#modalInputRencanaKerja"),
            width : "100%",
            cache:false,
            allowClear:true,
            ajax:{
              url : "<?= base_url('_administrator/getAllPackageCategoryData'); ?>",
              dataType : "JSON",
              delay : 0,
              data : function(params){
                var query = {
                  SEARCH: params.term
                }
                return query;
              },
              processResults : function(response){
                return{
                  results : $.map(response.RESPONSE.package_categories, function(item){
                    return{
                      text:item.package_categories_name,
                      id:item.package_categories_id
                    }
                  })
                };
              }
            }
          });
        }else{
          $.ajax({
            type : "GET",
            url : "<?= base_url('_administrator/getAllPackageCategoryData'); ?>",
            dataType : "JSON",
            success : function(response){
              $("#cmbType").removeClass("custom-select");
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
      }

      function getAllInternetPackageData(){
        var result = $('#internetPackageListTable').DataTable({
                      ajax: {
                        url     : "<?= base_url('_administrator/getAllInternetPackageData'); ?>",
                        dataSrc : "RESPONSE.internet_packages",
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
                        {data : "package_id", width : "25px"},
                        {data : "package_name"},
                        {data : "speed"},
                        {data : "price", width: "100px"},
                        {data : "package_categories_name"},
                        {data : "information"},
                        {data : "updated_on"},
                        {data : "package_id"}
                      ],
                      fnRowCallback: function(AvRow, AvData, AvDisplayIndex, AvFullDisplayIndex){
                        $("td:eq(0)", AvRow).text(++AvDisplayIndex);
                        $("td:eq(3)", AvRow).text("Rp. "+parseFloat(AvData["price"]).toLocaleString());
                        var buttons = "<button class='btn btn-md btn-flat btn-warning' title='Ubah Data' onclick=getDetailInternetPackageDataById('"+AvData["package_id"]+"',"+true+")><i class='fa fa-pencil'></i></button>"+
                              "<button class='btn btn-md btn-flat btn-danger' title='Hapus Data' onclick=deleteInternetPackageData('"+AvData["package_id"]+"')><i class='fa fa-trash'></i></button>";
                        $("td:eq(7)",AvRow).html(buttons);
                      }
                    });

        return result;
      }

      function getAllInternetPackageData_Select(param=false){
        if(param){
          $("#cmbInternetPackage").addClass("custom-select");
          $("#cmbInternetPackage").select2({
            placeholder : "Pilih Paket Internet",
            // dropdownParent: $("#modalInputRencanaKerja"),
            width : "100%",
            cache:false,
            allowClear:true,
            ajax:{
              url : "<?= base_url('_administrator/getAllInternetPackageData'); ?>",
              dataType : "JSON",
              delay : 0,
              data : function(params){
                var query = {
                  SEARCH: params.term
                }
                return query;
              },
              processResults : function(response){
                return{
                  results : $.map(response.RESPONSE.internet_packages, function(item){
                    return{
                      text:item.package_name+" ["+item.speed+"]",
                      id:item.package_id
                    }
                  })
                };
              }
            }
          });

          $("#cmbInternetPackage").on("select2:select", function(){
            $.ajax({
              type : "GET",
              url : "<?= base_url('_administrator/getDetailInternetPackageDataById'); ?>",
              dataType : "JSON",
              data : {
                INTERNETPACKAGEID : this.value
              },
              success : function(response){
                $.each(response.RESPONSE.internet_packages, function(AvIndex, AvValue){
                  $("#txtPrice").val(AvValue.price);
                });
              }
            });
          });

          $("#cmbInternetPackage").on("select2:unselect", function(){
            $("#txtPrice").val("");
          });
        }else{
          $.ajax({
            type : "GET",
            url : "<?= base_url('_administrator/getAllInternetPackageData'); ?>",
            dataType : "JSON",
            success : function(response){
              $("#cmbInternetPackage").removeClass("custom-select");
              $("#cmbType").empty();
              $("#cmbType").append("<option>Pilih Paket Internet</option>");
              $.each(response.RESPONSE.internet_packages, function(AvIndex, AvValue){
                $("#cmbType").append(
                  "<option value='"+AvValue.package_id+"'>"+AvValue.package_name+"</option>"
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
      }

      function getDetailInternetPackageDataById(param, param2=false){
        $.ajax({
          type : "GET",
          url : "<?= base_url('_administrator/getDetailInternetPackageDataById'); ?>",
          dataType : "JSON",
          data : {
            INTERNETPACKAGEID : param
          },
          success : function(response){
            if(param2){
              $.each(response.RESPONSE.internet_packages, function(AvIndex, AvValue){
                $("#txtInternetPackage").val(AvValue.package_name);
                $("#txtSpeed").val(AvValue.speed);
                $("#txtHarga").val(AvValue.price);
                $("#cmbType").val(AvValue.package_categories_id);
                CKEDITOR.instances["txtPackageInformation"].setData(AvValue.information);
              });
              var editFunction = "editInternetPackageData('"+param+"')";
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

      function getAllEmployeeData(){
        var result = $('#employeeListTable').DataTable({
                      scrollX: true,
                      ajax: {
                        url     : "<?= base_url('_administrator/getAllEmployeeData'); ?>",
                        dataSrc : "RESPONSE.employee",
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
                        {data : "employee_id"},
                        {data : "number_id"},
                        {data : "full_name"},
                        {data : "gender"},
                        {data : "phone_number"},
                        {data : "email"},
                        {data : "department_name"},
                        {data : "employee_id"}
                      ],
                      fnRowCallback: function(AvRow, AvData, AvDisplayIndex, AvFullDisplayIndex){
                        $("td:eq(0)",AvRow).text(_decodePassword(AvData["employee_id"]));
                        var buttons = "<button class='btn btn-md btn-flat btn-info' title='Detail Data' onclick=getDetailEmployeeDataById('"+_decodePassword(AvData["employee_id"])+"',"+false+")><i class='fa fa-info'></i></button>"+
                                      "<button class='btn btn-md btn-flat btn-warning' title='Ubah Data' onclick=getDetailEmployeeDataById('"+_decodePassword(AvData["employee_id"])+"',"+true+")><i class='fa fa-pencil'></i></button>"+
                                      "<button class='btn btn-md btn-flat btn-danger' title='Hapus Data' onclick=deleteEmployeeData('"+_decodePassword(AvData["employee_id"])+"')><i class='fa fa-trash'></i></button>";
                        $("td:eq(7)",AvRow).html(buttons);
                      }
                    });

        return result;
      }

      function getAllEmployeeData_Select(param=false){
        if(param){
          $("#cmbEmployee").addClass("custom-select");
          $("#cmbEmployee").select2({
            placeholder : "Pilih Karyawan",
            // dropdownParent: $("#modalInputRencanaKerja"),
            width : "100%",
            cache:false,
            allowClear:true,
            ajax:{
              url : "<?= base_url('_administrator/getAllEmployeeData'); ?>",
              dataType : "JSON",
              delay : 0,
              data : function(params){
                var query = {
                  SEARCH: params.term
                }
                return query;
              },
              processResults : function(response){
                return{
                  results : $.map(response.RESPONSE.employee, function(item){
                    return{
                      text:item.full_name,
                      id:item.employee_id
                    }
                  })
                };
              }
            }
          });
        }else{
          $.ajax({
            type : "GET",
            url : "<?= base_url('_administrator/getAllEmployeeData'); ?>",
            dataType : "JSON",
            success : function(response){
              $("#cmbEmployee").removeClass("custom-select");
              $("#cmbEmployee").empty();
              $("#cmbEmployee").append("<option>Pilih Paket Internet</option>");
              $.each(response.RESPONSE.employee, function(AvIndex, AvValue){
                $("#cmbEmployee").append(
                  "<option value='"+AvValue.employee_id+"'>"+AvValue.full_name+"</option>"
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
      }

      function getDetailEmployeeDataById(param, param2=false){
        $.ajax({
          type : "GET",
          url : "<?= base_url('_administrator/getDetailEmployeeDataById'); ?>",
          dataType : "JSON",
          data : {
            EMPLOYEEID : _encodePassword(param)
          },
          success : function(response){
            if(param2){
              $.each(response.RESPONSE.employee, function(AvIndex, AvValue){
                if(AvValue.picture == null){
                  var pictureUrl = "<?= base_url('assets/images/avatar_2x.png'); ?>";
                }else{
                  var pictureUrl = "<?= base_url('assets/images/upload/profile-images/'); ?>"+AvValue.picture;
                }
                $("#txtEmployeeId").val(_decodePassword(AvValue.employee_id));
                $("#txtNumberId").val(AvValue.number_id);
                $("#txtFullName").val(AvValue.full_name);
                $("#cmbGender").val(AvValue.gender);
                $("#txtBirthday").val(AvValue.birthday);
                $("#txtPhone").val(AvValue.phone_number);
                $("#txtOtherPhone").val(AvValue.other_phone_number);
                $("#txtEmail").val(AvValue.email);
                CKEDITOR.instances["txtAddress"].setData(AvValue.address);
                $("#txtJoinDate").val(AvValue.join_date);
                $("#cmbDepartment").val(AvValue.department_id);
                $("#profileImage").attr("src",pictureUrl);
              });
              var editFunction = "editEmployeeData('"+param+"')";
              $("#btnAction").attr("onclick",editFunction)
                             .html("<img src=<?= base_url('assets/images/loading_1.svg'); ?> style='display: none;' width='20px' height='20px;'>"+
                                   "<i class='fa fa-pencil' style='display: inline-block;'></i> Ubah Data");
            }else{
              $("#modalContentContainer").empty();
              $.each(response.RESPONSE.employee, function(AvIndex, AvValue){
                if(AvValue.picture == null){
                  var pictureUrl = "<?= base_url('assets/images/avatar_2x.png'); ?>";
                }else{
                  var pictureUrl = "<?= base_url('assets/images/upload/profile-images/'); ?>"+AvValue.picture;
                }
                $("#modalContentContainer").append(
                  "<div class='col-md-10'>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>ID. Pegawai</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+_decodePassword(AvValue.employee_id)+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>No. KTP</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.number_id+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Nama Lengkap</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.full_name+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Jenis Kelamin</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.gender+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Tgl.Lahir</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.formatted_birthday+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>No. Telp / Ponsel</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.phone_number+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>No. Telp. / Ponsel Lainnya</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.other_phone_number+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>E-mail</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.email+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Alamat</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.address+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Tanggal Masuk</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.formatted_join_date+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Departemen</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.department_name+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Diperbarui Pada</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.formatted_updated_on+"</div>"+
                    "</div>"+
                  "</div>"+
                    "<div class='col-md-2'>"+
                      "<div style='float:left; margin-right:10px;'>"+
                        "<img src='"+pictureUrl+"' class='img-responsive' width='138px' height='138px'>"+
                      "</div>"+
                    "</div>"
                );
              });
              $("#modalDetailData").modal("show");
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

      function getAllClientRegistrationData(){
        var result = $('#customerListTable').DataTable({
                      scrollX: true,
                      ajax: {
                        url     : "<?= base_url('_administrator/getAllClientRegistrationData'); ?>",
                        dataSrc : "RESPONSE.client_registration",
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
                        {data : "reg_id"},
                        {data : "reg_id"},
                        {data : "full_name"},
                        {data : "gender"},
                        {data : "package_name"},
                        {data : "formatted_registration_date"},
                        {data : "formatted_phone_number"},
                        {data : "registration_status"},
                        {data : "reg_id"}
                      ],
                      fnRowCallback: function(AvRow, AvData, AvDisplayIndex, AvFullDisplayIndex){
                        $("td:eq(0)",AvRow).text(++AvDisplayIndex);
                        $("td:eq(1)",AvRow).text(_decodePassword(AvData["reg_id"]));
                        var buttons = "<button class='btn btn-md btn-flat btn-info' title='Detail Data' onclick=getDetailClientRegistrationDataById('"+_decodePassword(AvData["reg_id"])+"',"+false+")><i class='fa fa-info'></i></button>"+
                                      "<button class='btn btn-md btn-flat btn-warning' title='Ubah Data' onclick=getDetailClientRegistrationDataById('"+_decodePassword(AvData["reg_id"])+"',"+true+")><i class='fa fa-pencil'></i></button>"+
                                      "<button class='btn btn-md btn-flat btn-danger' title='Hapus Data' onclick=deleteClientRegistrationData('"+_decodePassword(AvData["reg_id"])+"')><i class='fa fa-trash'></i></button>";
                        $("td:eq(8)",AvRow).html(buttons);
                      }
                    });

        return result;
      }

      function getDetailClientRegistrationDataById(param, param2=false){
        $.ajax({
          type : "GET",
          url : "<?= base_url('_administrator/getDetailClientRegistrationDataById'); ?>",
          dataType : "JSON",
          data : {
            REGISTRATIONID : _encodePassword(param)
          },
          success : function(response){
            if(param2){
              $.each(response.RESPONSE.client_registration, function(AvIndex, AvValue){
                var internetPackageData = {
                                            id: _encodePassword(AvValue.package_id), 
                                            text: AvValue.package_name+" ["+AvValue.speed+"]"
                                          };
                var internetPackageOption = new Option(internetPackageData.text, internetPackageData.id, true, true);

                var employeeData = {
                                    id: _encodePassword(AvValue.employee_id),
                                    text: AvValue.employee_name
                                   };
                var employeeOption = new Option(employeeData.text, employeeData.id, true, true);
                $("#txtClientId").val(_decodePassword(AvValue.reg_id));
                $("#cmbInternetPackage").append(internetPackageOption).trigger("change");
                $("#cmbEmployee").append(employeeOption).trigger("change");
                $("#txtIspParentId").val(AvValue.isp_parent_id);
                $("#txtNumberId").val(AvValue.number_id);
                $("#txtFullName").val(AvValue.full_name);
                $("#cmbGender").val(AvValue.gender);
                $("#txtBirthday").val(AvValue.birthday);
                $("#txtTelp").val(AvValue.phone_number);
                $("#txtTelpLain").val(AvValue.other_phone_number);
                $("#txtEmail").val(AvValue.email);
                CKEDITOR.instances["txtAddress"].setData(AvValue.address);
                $("#txtPrice").val(AvValue.monthly_payment);
                $("#txtRegistrationDate").val(AvValue.registration_date);
                $("#txtRegistrationFee").val(AvValue.registration_fee);
                $("#cmbDeviceStatus").val(AvValue.tools_status);
                $("#txtDevicePrice").val(AvValue.price_of_tools);
                CKEDITOR.instances["txtRegistrationInformation"].setData(AvValue.information);
              });
              var editFunction = "editClientRegistrationData('"+param+"')";
              $("#btnAction").attr("onclick",editFunction)
                             .html("<img src=<?= base_url('assets/images/loading_1.svg'); ?> style='display: none;' width='20px' height='20px;'>"+
                                   "<i class='fa fa-pencil' style='display: inline-block;'></i> Ubah Data");
            }else{
              $("#modalContentContainer").empty();
              $.each(response.RESPONSE.client_registration, function(AvIndex, AvValue){
                $("#modalContentContainer").append(
                  "<div class='col-md-10'>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>No. Registrasi</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+_decodePassword(AvValue.reg_id)+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>No. Id Dari Isp</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.isp_parent_id+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>No. KTP / NPWP</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.number_id+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Nama Lengkap</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.full_name+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Jenis Kelamin</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.gender+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Tgl. Lahir</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.formatted_birthday+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>No. Telp. / Ponsel</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.phone_number+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>No. Telp. / Ponsel Lain</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.other_phone_number+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>E-mail</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.email+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Alamat</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.address+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Paket Internet</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.package_name+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Harga Paket Internet</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+parseFloat(AvValue.monthly_payment).toLocaleString()+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Tanggal Registrasi</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.formatted_registration_date+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Biaya Registrasi</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+parseFloat(AvValue.registration_fee).toLocaleString()+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Kepemilikan Perangkat</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.tools_status+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Harga Perangkat</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+parseFloat(AvValue.price_of_tools).toLocaleString()+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Sales</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.employee_name+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Keterangan</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.information+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Diperbarui Oleh</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.updater_name+"</div>"+
                    "</div>"+
                    "<div class='col-md-12'>"+
                      "<div class='col-md-3'><label>Diperbarui Pada</label></div>"+
                      "<div class='col-md-1'><label>:</label></div>"+
                      "<div class='col-md-8'>"+AvValue.formatted_updated_on+"</div>"+
                    "</div>"+
                  "</div>"
                );
              });
              $("#modalDetailData").modal("show");
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

      function getAllClientRegistrationData_Select(param=false){
        if(param){
          $("#cmbRegistrationID").addClass("custom-select");
          $("#cmbRegistrationID").select2({
            placeholder : "Cari Data Pelanggan",
            // dropdownParent: $("#modalInputRencanaKerja"),
            width : "100%",
            cache:false,
            allowClear:true,
            ajax:{
              url : "<?= base_url('_administrator/getAllClientRegistrationData'); ?>",
              dataType : "JSON",
              delay : 0,
              data : function(params){
                var query = {
                  SEARCH: params.term
                }
                return query;
              },
              processResults : function(response){
                return{
                  results : $.map(response.RESPONSE.client_registration, function(item){
                    return{
                      text:"["+_decodePassword(item.reg_id)+"] "+item.full_name,
                      id:item.reg_id
                    }
                  })
                };
              }
            }
          });
        }else{
          $.ajax({
            type : "GET",
            url : "<?= base_url('_administrator/getAllClientRegistrationData'); ?>",
            dataType : "JSON",
            success : function(response){
              $("#cmbRegistrationID").removeClass("custom-select");
              $("#cmbRegistrationID").empty();
              $("#cmbRegistrationID").append("<option>Pilih Paket Internet</option>");
              $.each(response.RESPONSE.client_registration, function(AvIndex, AvValue){
                $("#cmbRegistrationID").append(
                  "<option value='"+AvValue.reg_id+"'>["+AvValue.reg_id+"] "+AvValue.full_name+"</option>"
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
      }
    </script>
    <!-- ========== GET DATA FUNCTION FINISH ========== -->
  </body>
</html>
