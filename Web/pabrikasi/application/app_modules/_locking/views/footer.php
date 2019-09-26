        <footer class="main-footer">
          <div class="pull-right hidden-xs">
              <b>Beta Version</b> V 0.0.1
          </div>
          <strong>Copyright &copy; 2017 <a href="http://www.klipplastik.co.id">Klip Plastik Indonesia</a>
        </footer>
      </div> <!--Wrapper-->
      <!-- jQuery 2.2.3 -->
      <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
      <!-- Bootstrap 3.3.6 -->
      <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="<?php echo base_url(); ?>assets/plugins/fastclick/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
      <!-- Sparkline -->
      <script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
      <!-- jvectormap -->
      <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
      <!-- SlimScroll 1.3.0 -->
      <script src="<?php echo base_url(); ?>assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
      <!-- ChartJS 1.0.1 -->
      <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart.min.js"></script>

      <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/input-mask/inputmask.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/input-mask/inputmask.numeric.extensions.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle/js/bootstrap-toggle.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/fixedheader/js/dataTables.fixedHeader.min.js"></script>

<!--===============================================On Load Method (Start) ===============================================-->
      <script type="text/javascript">
        $(function () {
          //======= Run Method Automatically (Start) =======//

          //======= Run Method Automatically (Finish) =======//
          //======= Inisialisasi Komponen (Start) =======
          $('.date').datepicker({
              language: 'id',
              viewMode: 'years',
              format: 'yyyy-mm-dd',
              autoclose : true,
              todayHighlight : true
          });
          //======= Inisialisasi Komponen (End) =======
        });//Tutup $(function(){}); yang pertama
      </script>
<!--===============================================On Load Method (Finish) ===============================================-->

<!--===============================================General Method (Start) ===============================================-->
      <script>
//================================ MODAL METHOD (START) ============================//

//================================ MODAL METHOD (FINISH) ============================//

//================================ SEARCH METHOD (START) ============================//

//================================ SEARCH METHOD (FINISH) ============================//
        function searchDataGudangHasil(param){
          var tglAwal = $("#txtTglAwal").val();
          var tglAkhir = $("#txtTglAkhir").val();
          var stsBarang = param;
          if(tglAwal == "" || tglAkhir == ""){
            $("#modal-notif").addClass("modal-warning");
						$("#modalNotifContent").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
						$("#modal-notif").modal("show");
						setTimeout(function(){
							$("#modal-notif").modal("hide");
							$("#modal-notif").removeClass("modal-warning");
							$("#modalNotifContent").text("");
						},2000);
          }else{
            tableDataMasukGudangHasil(tglAwal,tglAkhir,stsBarang);
            $("#modalCariData").modal("hide");
            $("input").val("");
            $(".date").datepicker("setDate",null);
          }
        }

        function searchListGudangRollPolos(){
          var tglAwal1 = $("#txtTglAwal").val();
          var tglAkhir1 = $("#txtTglAkhir").val();
          if(tglAwal1=="" || tglAkhir1==""){
            $("#modal-notif").addClass("modal-warning");
						$("#modalNotifContent").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
						$("#modal-notif").modal("show");
						setTimeout(function(){
							$("#modal-notif").modal("hide");
							$("#modal-notif").removeClass("modal-warning");
							$("#modalNotifContent").text("");
						},2000);
          }else{
            tableListTransaksiGudangRollPolos(tglAwal1,tglAkhir1);
            $("#btnExport").attr("href","<?php echo base_url('_locking/main/exportListTransaksiGudangRollPolos') ?>/"+tglAwal1+"/"+tglAkhir1);
            $("#modalCariData").modal("hide");
            $("input").val("");
            $(".date").datepicker("setDate",null);
          }
        }

        function searchListGudangRollCetak(){
          var tglAwal1 = $("#txtTglAwal").val();
          var tglAkhir1 = $("#txtTglAkhir").val();
          if(tglAwal1=="" || tglAkhir1==""){
            $("#modal-notif").addClass("modal-warning");
						$("#modalNotifContent").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
						$("#modal-notif").modal("show");
						setTimeout(function(){
							$("#modal-notif").modal("hide");
							$("#modal-notif").removeClass("modal-warning");
							$("#modalNotifContent").text("");
						},2000);
          }else{
            tableListTransaksiGudangRollCetak(tglAwal1,tglAkhir1);
            // $("#btnExport").attr("href","<?php echo base_url('_locking/main/exportListTransaksiGudangRollPolos') ?>/"+tglAwal1+"/"+tglAkhir1);
            $("#modalCariData").modal("hide");
            $("input").val("");
            $(".date").datepicker("setDate",null);
          }
        }

        function searchDataGudangBahan(param){
          var tglAwal1 = $("#txtTglAwal").val();
          var tglAkhir1 = $("#txtTglAkhir").val();
          if(tglAwal1=="" || tglAkhir1==""){
            $("#modal-notif").addClass("modal-warning");
						$("#modalNotifContent").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
						$("#modal-notif").modal("show");
						setTimeout(function(){
							$("#modal-notif").modal("hide");
							$("#modal-notif").removeClass("modal-warning");
							$("#modalNotifContent").text("");
						},2000);
          }else{
            datatablesListTransaksiGudangBahan(tglAwal1,tglAkhir1,param);
            // $("#btnExport").attr("href","<?php echo base_url('_locking/main/exportListTransaksiGudangRollPolos') ?>/"+tglAwal1+"/"+tglAkhir1);
            $("#modalCariData").modal("hide");
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_locking/main/counterLockTransaksiGudangBahan'); ?>",
              dataType : "TEXT",
              data : {
                tglAwal : tglAwal1,
                tglAkhir : tglAkhir1,
                jenis : param
              },
              success : function(response){
                if($.trim(response) === "TRUE"){
                  $("#btnLock").html("<i class='fa fa-unlock'></i> Buka Kunci")
                               .removeClass("btn-danger")
                               .addClass("btn-warning")
                               .attr("onclick","editLockAndUnlockGudangBahan('"+tglAwal1+"','"+tglAkhir1+"','"+param+"','FALSE')");
                }else{
                  $("#btnLock").html("<i class='fa fa-lock'></i> Kunci")
                               .removeClass("btn-warning")
                               .addClass("btn-danger")
                               .attr("onclick","editLockAndUnlockGudangBahan('"+tglAwal1+"','"+tglAkhir1+"','"+param+"','TRUE')");
                }
              }
            });

            $("#row").removeAttr("style");
            $("#footer").removeAttr("style");
          }
        }

        function searchDataGudangApal(){
          var tglAwal1 = $("#txtTglAwal").val();
          var tglAkhir1 = $("#txtTglAkhir").val();
          if(tglAwal1=="" || tglAkhir1==""){
            $("#modal-notif").addClass("modal-warning");
						$("#modalNotifContent").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
						$("#modal-notif").modal("show");
						setTimeout(function(){
							$("#modal-notif").modal("hide");
							$("#modal-notif").removeClass("modal-warning");
							$("#modalNotifContent").text("");
						},2000);
          }else{
            datatablesListTransaksiGudangApal(tglAwal1,tglAkhir1);
            // $("#btnExport").attr("href","<?php echo base_url('_locking/main/exportListTransaksiGudangRollPolos') ?>/"+tglAwal1+"/"+tglAkhir1);
            $("#modalCariData").modal("hide");
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_locking/main/counterLockTransaksiGudangApal'); ?>",
              dataType : "TEXT",
              data : {
                tglAwal : tglAwal1,
                tglAkhir : tglAkhir1
              },
              success : function(response){
                if($.trim(response) === "TRUE"){
                  $("#btnLock").html("<i class='fa fa-unlock'></i> Buka Kunci")
                               .removeClass("btn-danger")
                               .addClass("btn-warning")
                               .attr("onclick","editLockAndUnlockGudangApal('"+tglAwal1+"','"+tglAkhir1+"','FALSE')");
                }else{
                  $("#btnLock").html("<i class='fa fa-lock'></i> Kunci")
                               .removeClass("btn-warning")
                               .addClass("btn-danger")
                               .attr("onclick","editLockAndUnlockGudangApal('"+tglAwal1+"','"+tglAkhir1+"','TRUE')");
                }
              }
            });

            $("#row").removeAttr("style");
            $("#footer").removeAttr("style");
          }
        }

        function searchDataGudangSparePart(){
          var tglAwal1 = $("#txtTglAwal").val();
          var tglAkhir1 = $("#txtTglAkhir").val();
          if(tglAwal1=="" || tglAkhir1==""){
            $("#modal-notif").addClass("modal-warning");
						$("#modalNotifContent").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
						$("#modal-notif").modal("show");
						setTimeout(function(){
							$("#modal-notif").modal("hide");
							$("#modal-notif").removeClass("modal-warning");
							$("#modalNotifContent").text("");
						},2000);
          }else{
            datatablesListTransaksiGudangSparePart(tglAwal1,tglAkhir1);
            // $("#btnExport").attr("href","<?php echo base_url('_locking/main/exportListTransaksiGudangRollPolos') ?>/"+tglAwal1+"/"+tglAkhir1);
            $("#modalCariData").modal("hide");
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_locking/main/counterLockTransaksiGudangSparePart'); ?>",
              dataType : "TEXT",
              data : {
                tglAwal : tglAwal1,
                tglAkhir : tglAkhir1
              },
              success : function(response){
                if($.trim(response) === "TRUE"){
                  $("#btnLock").html("<i class='fa fa-unlock'></i> Buka Kunci")
                               .removeClass("btn-danger")
                               .addClass("btn-warning")
                               .attr("onclick","editLockAndUnlockGudangSparePart('"+tglAwal1+"','"+tglAkhir1+"','FALSE')");
                }else{
                  $("#btnLock").html("<i class='fa fa-lock'></i> Kunci")
                               .removeClass("btn-warning")
                               .addClass("btn-danger")
                               .attr("onclick","editLockAndUnlockGudangSparePart('"+tglAwal1+"','"+tglAkhir1+"','TRUE')");
                }
              }
            });

            $("#row").removeAttr("style");
            $("#footer").removeAttr("style");
          }
        }
//================================ RELOAD METHOD (START) ============================//

//================================ RELOAD METHOD (FINISH) ============================//

//================================ RESET FORM METHOD (START) ============================//

//================================ RESET FORM METHOD (FINISH) ============================//

//================================ SAVE METHOD (START) ============================//

//================================ SAVE METHOD (FINISH) ============================//

//================================ EDIT METHOD (START) ============================//
        function editLockAndUnlockGudangRoll(param, param2, param3, param4){
          if (param3=="TRUE") {
            var confirmationText = "Apakah Anda Yakin Ingin Mengunci Bulan Ini?";
          }else{
            var confirmationText = "Apakah Anda Yakin Ingin Membuka Kunci Bulan Ini?";
          }
          if(confirm(confirmationText)){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_locking/main/editLockAndUnlockGudangRoll'); ?>",
              dataType : "TEXT",
              data : {
                tglAwal       : param,
                tglAkhir      : param2,
                statusLock    : param3,
                jnsPermintaan : param4
              },
              beforeSend : function(){
                $("#modalLoading").modal({
                  backdrop : "static",
                  keyboard : false
                });
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#modal-notif").addClass("modal-info");
                  $("#modalNotifContent").text("Data Transaksi Berhasil Di Kunci");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-info");
                    $("#modalNotifContent").text("");
                    tableListTransaksiGudangRollPolos(param,param2);
                  },2000);
                }else if($.trim(response) === "Gagal"){
                  $("#modal-notif").addClass("modal-danger");
                  $("#modalNotifContent").text("Data Transaksi Gagal Di Kunci");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-danger");
                    $("#modalNotifContent").text("");
                  },2000);
                }else{
                  $("#modal-notif").addClass("modal-warning");
                  $("#modalNotifContent").text("Parameter Tidak Boleh Kosong");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-warning");
                    $("#modalNotifContent").text("");
                  },2000);
                }
              },
              error : function(response){
                $("#modal-notif").addClass("modal-danger");
                $("#modalNotifContent").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#modal-notif").modal("show");
                setTimeout(function(){
                  $("#modal-notif").modal("hide");
                  $("#modal-notif").removeClass("modal-danger");
                  $("#modalNotifContent").text("");
                },2000);
              },
              complete : function(){
                $("#modalLoading").modal("hide");
              }
            });
          }
        }

        function editLockAndUnlockGudangHasil(param, param2, param3, param4){
          if (param3=="TRUE") {
            var confirmationText = "Apakah Anda Yakin Ingin Mengunci Bulan Ini?";
            var successMessage = "Data Transaksi Berhasil Di Kunci";
            var failedMessage = "Data Transaksi Gagal Di Kunci";
          }else{
            var confirmationText = "Apakah Anda Yakin Ingin Membuka Kunci Bulan Ini?";
            var successMessage = "Data Transaksi Berhasil Di Buka";
            var failedMessage = "Data Transaksi Gagal Di Buka";
          }
          if(confirm(confirmationText)){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_locking/main/editLockAndUnlockGudangHasil'); ?>",
              dataType : "TEXT",
              data : {
                tglAwal       : param,
                tglAkhir      : param2,
                statusLock    : param3,
                stsBarang     : param4
              },
              beforeSend : function(){
                $("#modalLoading").modal({
                  backdrop : "static",
                  keyboard : false
                });
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#modal-notif").addClass("modal-info");
                  $("#modalNotifContent").text(successMessage);
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-info");
                    $("#modalNotifContent").text("");
                    tableDataMasukGudangHasil(param,param2,param4);
                  },2000);
                }else if($.trim(response) === "Gagal"){
                  $("#modal-notif").addClass("modal-danger");
                  $("#modalNotifContent").text(failedMessage);
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-danger");
                    $("#modalNotifContent").text("");
                  },2000);
                }else{
                  $("#modal-notif").addClass("modal-warning");
                  $("#modalNotifContent").text("Parameter Tidak Boleh Kosong");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-warning");
                    $("#modalNotifContent").text("");
                  },2000);
                }
              },
              error : function(response){
                $("#modal-notif").addClass("modal-danger");
                $("#modalNotifContent").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#modal-notif").modal("show");
                setTimeout(function(){
                  $("#modal-notif").modal("hide");
                  $("#modal-notif").removeClass("modal-danger");
                  $("#modalNotifContent").text("");
                },2000);
              },
              complete : function(){
                $("#modalLoading").modal("hide");
              }
            });
          }
        }

        function editLockAndUnlockGudangBahan(param, param2, param3, param4){
          if (param4=="TRUE") {
            var confirmationText = "Apakah Anda Yakin Ingin Mengunci Bulan Ini?";
            var successMessage = "Data Transaksi Berhasil Di Kunci";
            var failedMessage = "Data Transaksi Gagal Di Kunci";
          }else{
            var confirmationText = "Apakah Anda Yakin Ingin Membuka Kunci Bulan Ini?";
            var successMessage = "Data Transaksi Berhasil Di Buka";
            var failedMessage = "Data Transaksi Gagal Di Buka";
          }
          if(confirm(confirmationText)){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_locking/main/editLockAndUnlockGudangBahan'); ?>",
              dataType : "TEXT",
              data : {
                tglAwal       : param,
                tglAkhir      : param2,
                jenis         : param3,
                stsLock       : param4
              },
              beforeSend : function(){
                $("#modalLoading").modal({
                  backdrop : "static",
                  keyboard : false
                });
              },
              success : function(response){
                if($.trim(response) === "TRUE"){
                  $("#modal-notif").addClass("modal-info");
                  $("#modalNotifContent").text(successMessage);
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-info");
                    $("#modalNotifContent").text("");
                    $(".active a").click();
                    $("#btnCari").click();
                  },2000);
                }else if($.trim(response) === "FALSE"){
                  $("#modal-notif").addClass("modal-danger");
                  $("#modalNotifContent").text(failedMessage);
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-danger");
                    $("#modalNotifContent").text("");
                  },2000);
                }else{
                  $("#modal-notif").addClass("modal-warning");
                  $("#modalNotifContent").text("Parameter Tidak Boleh Kosong");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-warning");
                    $("#modalNotifContent").text("");
                  },2000);
                }
              },
              error : function(response){
                $("#modal-notif").addClass("modal-danger");
                $("#modalNotifContent").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#modal-notif").modal("show");
                setTimeout(function(){
                  $("#modal-notif").modal("hide");
                  $("#modal-notif").removeClass("modal-danger");
                  $("#modalNotifContent").text("");
                },2000);
              },
              complete : function(){
                $("#modalLoading").modal("hide");
              }
            });
          }
        }

        function editLockAndUnlockGudangApal(param, param2, param3){
          if (param3=="TRUE") {
            var confirmationText = "Apakah Anda Yakin Ingin Mengunci Bulan Ini?";
            var successMessage = "Data Transaksi Berhasil Di Kunci";
            var failedMessage = "Data Transaksi Gagal Di Kunci";
          }else{
            var confirmationText = "Apakah Anda Yakin Ingin Membuka Kunci Bulan Ini?";
            var successMessage = "Data Transaksi Berhasil Di Buka";
            var failedMessage = "Data Transaksi Gagal Di Buka";
          }
          if(confirm(confirmationText)){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_locking/main/editLockAndUnlockGudangApal'); ?>",
              dataType : "TEXT",
              data : {
                tglAwal       : param,
                tglAkhir      : param2,
                stsLock       : param3
              },
              beforeSend : function(){
                $("#modalLoading").modal({
                  backdrop : "static",
                  keyboard : false
                });
              },
              success : function(response){
                if($.trim(response) === "TRUE"){
                  $("#modal-notif").addClass("modal-info");
                  $("#modalNotifContent").text(successMessage);
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-info");
                    $("#modalNotifContent").text("");
                    $(".active a").click();
                    $("#btnCari").click();
                  },2000);
                }else if($.trim(response) === "FALSE"){
                  $("#modal-notif").addClass("modal-danger");
                  $("#modalNotifContent").text(failedMessage);
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-danger");
                    $("#modalNotifContent").text("");
                  },2000);
                }else{
                  $("#modal-notif").addClass("modal-warning");
                  $("#modalNotifContent").text("Parameter Tidak Boleh Kosong");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-warning");
                    $("#modalNotifContent").text("");
                  },2000);
                }
              },
              error : function(response){
                $("#modal-notif").addClass("modal-danger");
                $("#modalNotifContent").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#modal-notif").modal("show");
                setTimeout(function(){
                  $("#modal-notif").modal("hide");
                  $("#modal-notif").removeClass("modal-danger");
                  $("#modalNotifContent").text("");
                },2000);
              },
              complete : function(){
                $("#modalLoading").modal("hide");
              }
            });
          }
        }

        function editLockAndUnlockGudangSparePart(param, param2, param3){
          if (param3=="TRUE") {
            var confirmationText = "Apakah Anda Yakin Ingin Mengunci Bulan Ini?";
            var successMessage = "Data Transaksi Berhasil Di Kunci";
            var failedMessage = "Data Transaksi Gagal Di Kunci";
          }else{
            var confirmationText = "Apakah Anda Yakin Ingin Membuka Kunci Bulan Ini?";
            var successMessage = "Data Transaksi Berhasil Di Buka";
            var failedMessage = "Data Transaksi Gagal Di Buka";
          }
          if(confirm(confirmationText)){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_locking/main/editLockAndUnlockGudangSparePart'); ?>",
              dataType : "TEXT",
              data : {
                tglAwal       : param,
                tglAkhir      : param2,
                stsLock       : param3
              },
              beforeSend : function(){
                $("#modalLoading").modal({
                  backdrop : "static",
                  keyboard : false
                });
              },
              success : function(response){
                if($.trim(response) === "TRUE"){
                  $("#modal-notif").addClass("modal-info");
                  $("#modalNotifContent").text(successMessage);
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-info");
                    $("#modalNotifContent").text("");
                    $(".active a").click();
                    $("#btnCari").click();
                  },2000);
                }else if($.trim(response) === "FALSE"){
                  $("#modal-notif").addClass("modal-danger");
                  $("#modalNotifContent").text(failedMessage);
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-danger");
                    $("#modalNotifContent").text("");
                  },2000);
                }else{
                  $("#modal-notif").addClass("modal-warning");
                  $("#modalNotifContent").text("Parameter Tidak Boleh Kosong");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-warning");
                    $("#modalNotifContent").text("");
                  },2000);
                }
              },
              error : function(response){
                $("#modal-notif").addClass("modal-danger");
                $("#modalNotifContent").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#modal-notif").modal("show");
                setTimeout(function(){
                  $("#modal-notif").modal("hide");
                  $("#modal-notif").removeClass("modal-danger");
                  $("#modalNotifContent").text("");
                },2000);
              },
              complete : function(){
                $("#modalLoading").modal("hide");
              }
            });
          }
        }
//================================ EDIT METHOD (FINISH) ============================//

//================================ REMOVE METHOD (START) ============================//

//================================ REMOVE METHOD (FINISH) ============================//

//================================ UNSPECIFIED METHOD (START) ============================//

//================================ UNSPECIFIED METHOD (FINISH) ============================//

//================================ DATATABLE METHOD (START) ============================//
        function tableDataMasukGudangHasil(param1,param2,param3){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_locking/main/getDataMasukGudangHasil'); ?>",
            dataType : "JSON",
            data : {
              tglAwal : param1,
              tglAkhir : param2,
              stsBarang : param3
            },
            beforeSend : function(){
              $("#modalLoading").modal({
                backdrop : "static",
                keyboard : false
              });
            },
            success : function(response){
              $("#tableData > tbody > tr").empty();

              $.each(response.TransaksiGudangHasil, function(AvIndex, AvValue){
                var strJumlahBerat = "";
                var strJumlahLembar = "";

                var arrJumlahBerat = AvValue.jumlah_berat.split("|");
                var arrJumlahLembar = AvValue.jumlah_lembar.split("|");

                var j = arrJumlahBerat.length-1;
                var y = arrJumlahLembar.length-1;

                for (var i = 0; i < arrJumlahBerat.length; i++) {
                  strJumlahBerat += parseFloat(arrJumlahBerat[i]).toLocaleString();
                  if(j > 0){
                    strJumlahBerat += "|";
                  }
                  j--;
                }

                for (var x = 0; x < arrJumlahLembar.length; x++) {
                  strJumlahLembar += parseFloat(arrJumlahLembar[x]).toLocaleString();
                  if(y > 0){
                    strJumlahLembar += "|";
                  }
                  y--;
                }
                $("#tableData > tbody").append(
                  "<tr>"+
                    "<td>"+AvValue.kd_gd_hasil+"</td>"+
                    "<td>"+AvValue.customer+"</td>"+
                    "<td>"+AvValue.merek+"</td>"+
                    "<td>"+AvValue.ukuran+"</td>"+
                    "<td>"+AvValue.warna+"</td>"+
                    "<td>"+AvValue.tgl_transaksi.replace(/\|/g,'<br>')+"</td>"+
                    "<td>"+strJumlahBerat.replace(/\|/g,'<br>')+"<br><hr><b>"+parseFloat(AvValue.total_jumlah_berat).toLocaleString()+"</b></td>"+
                    "<td>"+strJumlahLembar.replace(/\|/g,'<br>')+"<br><hr><b>"+parseFloat(AvValue.total_jumlah_lembar).toLocaleString()+"</b></td>"+
                  "</tr>"
                );
              });

              var CounterLock = parseFloat(response.CounterLock[0].CounterLock);
              var CounterTotalItem = parseFloat(response.CounterTotalItem[0].CounterTotalItem);

              if(CounterLock >= CounterTotalItem){
                $("#btnLock").html("<i class='fa fa-unlock'></i> Buka Kunci")
                             .removeClass("btn-danger")
                             .addClass("btn-warning")
                             .attr("onclick","editLockAndUnlockGudangHasil('"+param1+"','"+param2+"','FALSE','"+param3+"')");
              }else{
                $("#btnLock").html("<i class='fa fa-lock'></i> Kunci")
                             .removeClass("btn-warning")
                             .addClass("btn-danger")
                             .attr("onclick","editLockAndUnlockGudangHasil('"+param1+"','"+param2+"','TRUE','"+param3+"')");
              }

              $("#row").removeAttr("style");
              $("#footer").removeAttr("style");
            },
            error : function(response){
              $("#modal-notif").addClass("modal-danger");
  						$("#modalNotifContent").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
  						$("#modal-notif").modal("show");
  						setTimeout(function(){
  							$("#modal-notif").modal("hide");
  							$("#modal-notif").removeClass("modal-danger");
  							$("#modalNotifContent").text("");
  						},2000);
            },
            complete : function(){
              $("#modalLoading").modal("hide");
            }
          });
        }

        function tableListTransaksiGudangRollPolos(param, param2){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_locking/main/getListTransaksiGudangRollPolos'); ?>",
            dataType : "JSON",
            data : {
              tglAwal : param,
              tglAkhir : param2
            },
            beforeSend : function(){
              $("#modalLoading").modal({
                backdrop : "static",
                keyboard : false
              });
            },
            success : function(response){
              $("#tableDataTransaksiGudangRollPolos > tbody > tr").empty();
              $("#tableDataTransaksiHasilExtruder > tbody > tr").empty();
              $.each(response.TransaksiGudangRoll, function(AvIndex, AvValue){
                $("#tableDataTransaksiGudangRollPolos > tbody:last-child").append(
                  "<tr>"+
                    "<td>"+AvValue.barang+"</td>"+
                    "<td>"+AvValue.tgl_transaksi+"</td>"+
                    "<td>"+AvValue.berat+"</td>"+
                    "<td>"+AvValue.bobin+"</td>"+
                    "<td>"+AvValue.payung+"</td>"+
                    "<td>"+AvValue.payung_kuning+"</td>"+
                    "<td>"+AvValue.keterangan_history+"</td>"+
                    "<td>"+AvValue.keterangan_transaksi+"</td>"+
                  "</tr>"
                );
              });

              $.each(response.TransaksiHasilExtruder, function(AvIndex, AvValue){
                $("#tableDataTransaksiHasilExtruder > tbody:last-child").append(
                  "<tr>"+
                    "<td>"+AvValue.barang+"</td>"+
                    "<td>"+AvValue.tgl_transaksi+"</td>"+
                    "<td>"+AvValue.berat+"</td>"+
                    "<td>"+AvValue.bobin+"</td>"+
                    "<td>"+AvValue.payung+"</td>"+
                    "<td>"+AvValue.payung_kuning+"</td>"+
                    "<td>"+AvValue.shift+"</td>"+
                    "<td>"+AvValue.keterangan_transaksi+"</td>"+
                    "<td>"+AvValue.keterangan_history+"</td>"+
                  "</tr>"
                );
              });

              var CounterLock = parseFloat(response.CounterLock);
              var CounterTotalItem = parseFloat(response.CounterTotalItem);

              if(CounterLock >= CounterTotalItem){
                $("#btnLock").html("<i class='fa fa-unlock'></i> Buka Kunci")
                             .removeClass("btn-danger")
                             .addClass("btn-warning")
                             .attr("onclick","editLockAndUnlockGudangRoll('"+param+"','"+param2+"','FALSE','POLOS')");
              }else{
                $("#btnLock").html("<i class='fa fa-lock'></i> Kunci")
                             .removeClass("btn-warning")
                             .addClass("btn-danger")
                             .attr("onclick","editLockAndUnlockGudangRoll('"+param+"','"+param2+"','TRUE','POLOS')");
              }

              $("#row").removeAttr("style");
              $("#footer").removeAttr("style");
            },
            complete : function(){
              $("#modalLoading").modal("hide");
            }
          });
        }

        function tableListTransaksiGudangRollCetak(param, param2){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_locking/main/getListTransaksiGudangRollCetak'); ?>",
            dataType : "JSON",
            data : {
              tglAwal : param,
              tglAkhir : param2
            },
            beforeSend : function(){
              $("#modalLoading").modal({
                backdrop : "static",
                keyboard : false
              });
            },
            success : function(response){
              $("#tableDataTransaksiGudangRollPotong_Cetak > tbody > tr").empty();
              $("#tableDataTransaksiHasilCetak > tbody > tr").empty();
              $("#tableDataTransaksiGudangRollCetak > tbody > tr").empty();
              $.each(response.TransaksiPotong, function(AvIndex, AvValue){
                $("#tableDataTransaksiGudangRollPotong_Cetak > tbody:last-child").append(
                  "<tr>"+
                    "<td>"+AvValue.barang+"</td>"+
                    "<td>"+AvValue.tgl_transaksi+"</td>"+
                    "<td>"+AvValue.berat+"</td>"+
                    "<td>"+AvValue.bobin+"</td>"+
                    "<td>"+AvValue.payung+"</td>"+
                    "<td>"+AvValue.payung_kuning+"</td>"+
                    "<td>"+AvValue.keterangan_history+"</td>"+
                    "<td>"+AvValue.keterangan_transaksi+"</td>"+
                  "</tr>"
                );
              });

              $.each(response.TransaksiHasilCetak, function(AvIndex, AvValue){
                $("#tableDataTransaksiHasilCetak > tbody:last-child").append(
                  "<tr>"+
                    "<td>"+AvValue.barang+"</td>"+
                    "<td>"+AvValue.tgl_transaksi+"</td>"+
                    "<td>"+AvValue.berat+"</td>"+
                    "<td>"+AvValue.bobin+"</td>"+
                    "<td>"+AvValue.payung+"</td>"+
                    "<td>"+AvValue.payung_kuning+"</td>"+
                    "<td>"+AvValue.keterangan_transaksi+"</td>"+
                    "<td>"+AvValue.keterangan_history+"</td>"+
                  "</tr>"
                );
              });

              $.each(response.TransaksiCetak, function(AvIndex, AvValue){
                $("#tableDataTransaksiGudangRollCetak > tbody:last-child").append(
                  "<tr>"+
                    "<td>"+AvValue.barang+"</td>"+
                    "<td>"+AvValue.tgl_transaksi+"</td>"+
                    "<td>"+AvValue.berat+"</td>"+
                    "<td>"+AvValue.bobin+"</td>"+
                    "<td>"+AvValue.payung+"</td>"+
                    "<td>"+AvValue.payung_kuning+"</td>"+
                    "<td>"+AvValue.keterangan_transaksi+"</td>"+
                    "<td>"+AvValue.keterangan_history+"</td>"+
                  "</tr>"
                );
              });

              var CounterLock = parseFloat(response.CounterLock);
              var CounterTotalItem = parseFloat(response.CounterTotalItem);

              if(CounterLock >= CounterTotalItem){
                $("#btnLock").html("<i class='fa fa-unlock'></i> Buka Kunci")
                             .removeClass("btn-danger")
                             .addClass("btn-warning")
                             .attr("onclick","editLockAndUnlockGudangRoll('"+param+"','"+param2+"','FALSE','CETAK')");
              }else{
                $("#btnLock").html("<i class='fa fa-lock'></i> Kunci")
                             .removeClass("btn-warning")
                             .addClass("btn-danger")
                             .attr("onclick","editLockAndUnlockGudangRoll('"+param+"','"+param2+"','TRUE','CETAK')");
              }

              $("#row").removeAttr("style");
              $("#footer").removeAttr("style");
            },
            complete : function(){
              $("#modalLoading").modal("hide");
            }
          });
        }

        function datatablesListTransaksiGudangBahan(param, param2, param3){
          $("#tableData").dataTable().fnDestroy();
          $("#tableData").dataTable({
            "bProcessing" : true,
            "bServerSide" : true,
            "ordering"  : false,
            "pageLength" : 100,
            "autoWidth" : false,
            "sPaginationType" : "full_numbers",
            "iDisplayStart" : 0,
            "sAjaxSource" : "<?php echo base_url('_locking/main/getListTransaksiGudangBahan') ?>",
            "columns" : [
              {"data":"tgl_permintaan","name":"TGB.tgl_permintaan"},
              {"data":"nm_barang","name":"GB.nm_barang"},
              {"data":"jumlah_permintaan","name":"TGB.jumlah_permintaan"},
              {"data":"keterangan_history","name":"TGB.keterangan_history"},
            ],
            fnServerData : function(url, data, callback){
              data.push({"name":"tglAwal","value":param},
                        {"name":"tglAkhir","value":param2},
                        {"name":"jenis","value":param3});
              $.ajax({
                type : "POST",
                url : url,
                dataType : "JSON",
                data : data,
                success : callback
              });
            },
            "fnRowCallback" : function(row, response, displayIndex, displayIndexFull){
              $("td:eq(2)", row).text(parseFloat(response["jumlah_permintaan"]).toLocaleString());
            }
          });
        }

        function datatablesListTransaksiGudangApal(param, param2){
          $("#tableData").dataTable().fnDestroy();
          $("#tableData").dataTable({
            "bProcessing" : true,
            "bServerSide" : true,
            "ordering"  : false,
            "pageLength" : 100,
            "autoWidth" : false,
            "sPaginationType" : "full_numbers",
            "iDisplayStart" : 0,
            "sAjaxSource" : "<?php echo base_url('_locking/main/getListTransaksiGudangApal') ?>",
            "columns" : [
              {"data":"tgl_transaksi","name":"tgl_transaksi"},
              {"data":"merek","name":"merek"},
              {"data":"jumlah_apal","name":"jumlah_apal"},
              {"data":"keterangan_history","name":"keterangan_history"},
            ],
            fnServerData : function(url, data, callback){
              data.push({"name":"tglAwal","value":param},
                        {"name":"tglAkhir","value":param2});
              $.ajax({
                type : "POST",
                url : url,
                dataType : "JSON",
                data : data,
                success : callback
              });
            },
            "fnRowCallback" : function(row, response, displayIndex, displayIndexFull){
              $("td:eq(2)", row).text(parseFloat(response["jumlah_apal"]).toLocaleString());
            }
          });
        }

        function datatablesListTransaksiGudangSparePart(param, param2){
          $("#tableData").dataTable().fnDestroy();
          $("#tableData").dataTable({
            "bProcessing" : true,
            "bServerSide" : true,
            "ordering"  : false,
            "pageLength" : 100,
            "autoWidth" : false,
            "sPaginationType" : "full_numbers",
            "iDisplayStart" : 0,
            "sAjaxSource" : "<?php echo base_url('_locking/main/getListTransaksiGudangSparePart') ?>",
            "columns" : [
              {"data":"tgl_transaksi","name":"TDSP.tgl_transaksi"},
              {"data":"nm_spare_part","name":"SP.nm_spare_part"},
              {"data":"jumlah","name":"TDSP.jumlah"},
              {"data":"keterangan_history","name":"TDSP.keterangan_history"},
            ],
            fnServerData : function(url, data, callback){
              data.push({"name":"tglAwal","value":param},
                        {"name":"tglAkhir","value":param2});
              $.ajax({
                type : "POST",
                url : url,
                dataType : "JSON",
                data : data,
                success : callback
              });
            },
            "fnRowCallback" : function(row, response, displayIndex, displayIndexFull){
              $("td:eq(2)", row).text(parseFloat(response["jumlah"]).toLocaleString());
            }
          });
        }
//================================ DATATABLE METHOD (FINISH) ============================//
      </script>
<!--===============================================General Method (Finish) ===============================================-->
    </body>
</html>
