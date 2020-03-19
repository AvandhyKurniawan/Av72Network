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

      <script src="<?php echo base_url(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/input-mask/inputmask.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/input-mask/inputmask.numeric.extensions.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/select2/select2.full.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.fnReloadAjax.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/chartjs/Chart_2.4.0.js"></script>

<!--===============================================On Load Function (Start) ===============================================-->
      <script type="text/javascript">
        $(function () {
          $(".select2").select2();

          $('.date').datepicker({
              language: 'id',
              viewMode: 'years',
              format: 'yyyy-mm-dd',
              autoclose : true,
              todayHighlight : true
          });

          if ($("#tableOrderPerHariDK").length) {
            totalOrderPerHari("DK")
          }

          // if ($("#tableOrderPerHariLK").length) {
          //   totalOrderPerHari("LK")
          // }
          //
          // if ($("#tableOrderPerHariCBG").length) {
          //   totalOrderPerHari("CBG")
          // }
          datatableOrederPerHari()
          if($("#tableDataSales").length > 0){
            dataTableDataSales();
          }

          if($("#tableDataJenisBarang").length > 0){
            dataTableDataJenisBarang();
          }

          if($("#tableFormInputKomisi").length > 0){
            resetAllFormKomisi();
          }
          //======= Inisialisasi Komponen (Start) =======
          // $("#txt_uang_muka").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_harga").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_omset_kg").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_omset_lembar").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_potongan").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_jumlah").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_hsl_diskon").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});

          // $("#txt_uang_muka_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_harga_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_omset_kg_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_omset_lembar_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_potongan_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_jumlah_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_hsl_diskon_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});

          $("#btn-note-customer").attr("disabled","disabled");
          $("#keranjang-belanja_temp").dataTable({
            // "fixedHeader" : true,
            "searching":false,
            "scrollY" : "200px",
            "ordering" : false,
            "paging" : false
          });
          $("#keranjang-belanja").dataTable({
            // "fixedHeader" : true,
            "searching":false,
            "scrollY" : "200px",
            "ordering" : false,
            "paging" : false
          });
          $("#product_service").dataTable({
            // "fixedHeader" : true,
            "autoWidth":false,
            "ordering" : false,
            "paging" : false,
            "scrollY" : "300px"
          });
          if($("#cmb-payment-edit").length > 0){
            $("#cmb-payment-edit").trigger("change");
            $("#cmb-payment-edit").val($("#hiddenPayment").val());
          }

          $(".number").inputmask(
                                  "decimal",
                                  {
                                    rightAlign: false,
                                    radixPoint: ".",
                                    groupSeparator: ",",
                                    digits: 2,
                                    autoGroup: true
                                  }
                                );

          reloadCounterOrderDeadline();
          setTimeout(function(){
            reloadCounterOrderDeadline();
          },60000);
          //======= Inisialisasi Komponen (End) =======

          $("#cmb_customer").select2({
            placeholder : "Pilih Customer",
            ajax:{
              url : "<?php echo base_url() ?>_marketing/main/getCustomerLike",
              dataType : "json",
              delay : 250,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    return{
                      text:item.nm_perusahaan,
                      id:item.kd_cust
                    }
                  })
                };
              },
              cache : true
            }
          });

          $("#cmb_customer_history").select2({
            placeholder : "Pilih Customer",
            ajax:{
              url : "<?php echo base_url() ?>_marketing/main/getCustomerLike",
              dataType : "json",
              delay : 250,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    return{
                      text:item.nm_perusahaan,
                      id:item.kd_cust
                    }
                  })
                };
              },
              cache : true
            }
          });

          $("#cmb_ukuran").select2({
            placeholder : "Pilih Ukuran",
            allowClear : true,
            ajax:{
              url : "<?php echo base_url() ?>_marketing/main/getGudangHasilLike",
              dataType : "json",
              delay : 250,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    if(item.jenis == "MINYAK" || item.jenis == "CAT MURNI"){
                      return{
                        text:item.nm_barang +" - "+ item.warna +" - "+ item.status +" - "+ item.jenis,
                        id:item.kd_gd_bahan
                      }
                    }else if(item.status_produk == "FINISH"){
                      return{
                        text:item.kd_produk +" - "+ item.nama_produk,
                        id:item.kd_produk
                      }
                    }
                    else{
                      return{
                        text:item.ukuran +" - "+ item.warna_plastik +" - "+ item.tebal +" - "+ item.merek +" - "+ item.jns_brg,
                        id:item.kd_gd_hasil
                      }
                    }
                  })
                };
              },
              cache : true
            }
          });

          $("#cmbBarang, #cmbBarangEdit").select2({
            placeholder : "Pilih Ukuran",
            allowClear : true,
            width: 'resolve',
            ajax:{
              url : "<?php echo base_url() ?>_marketing/main/getGudangHasilLike",
              dataType : "json",
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    if(item.jenis == "MINYAK" || item.jenis == "CAT MURNI"){
                      return{
                        text:item.nm_barang +" - "+ item.warna +" - "+ item.status +" - "+ item.jenis,
                        id:item.kd_gd_bahan
                      }
                    }else{
                      return{
                        text:item.ukuran +" - "+ item.warna_plastik +" - "+ item.tebal +" - "+ item.merek +" - "+ item.jns_brg,
                        id:item.kd_gd_hasil
                      }
                    }
                  })
                };
              },
              cache : true
            }
          });

          $("#cmb_ukuran_edit").select2({
            placeholder : "Pilih Ukuran",
            ajax:{
              url : "<?php echo base_url() ?>_marketing/main/getGudangHasilLike",
              dataType : "json",
              delay : 250,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    if(item.jenis == "MINYAK" || item.jenis == "CAT MURNI"){
                      return{
                        text:item.nm_barang +" - "+ item.warna +" - "+ item.status +" - "+ item.jenis,
                        id:item.kd_gd_bahan
                      }
                    }else{
                      return{
                        text:item.ukuran +" - "+ item.warna_plastik +" - "+ item.tebal +" - "+ item.merek +" - "+ item.jns_permintaan +" - "+ item.jns_brg,
                        id:item.kd_gd_hasil
                      }
                    }
                  })
                };
              },
              cache : true
            }
          });

          $("#cmb_customer").on("select2:select",function(e){
              e.preventDefault();
              var id = $("#cmb_customer").val();
              var no_order = $("#txt_no_order").val();
              $("#pesanan-detail-tbody").load("<?php echo base_url(); ?>_marketing/main/getPesananDetailsTemp/" + no_order + "/" + id );
              $.ajax({
                type : "POST",
                url : "<?php echo base_url() ?>_marketing/main/getCustomerOrder",
                dataType : "JSON",
                data : {kd_cust : id},
                success : function(response){
                  $("#txt_kd_cust").val(response[0].kd_cust);
                  $("#txt_nm_perusahaan").val((response[0].nm_perusahaan_update =="" || response[0].nm_perusahaan_update ==null) ? response[0].nm_perusahaan : response[0].nm_perusahaan_update);
                  if(response[0].pajak == "0"){
                    $("input[name='rb_pajak'][value='FALSE']").attr("checked","checked");
                  }else{
                    $("input[name='rb_pajak'][value='TRUE']").attr("checked","checked");
                  }
                  var kdCust = response[0].kd_cust;
                  var jnsOrder = kdCust.substring(kdCust.length-2, kdCust.length);
                  if(jnsOrder != "XX"){
                    $("#cmb-jns-order").val(jnsOrder);
                  }
                  $("#btn-note-customer").attr("href","<?php echo base_url(); ?>_marketing/main/show_customer_note/"+id);
                  $("#btn-note-customer").removeAttr("disabled");
                  $("#produk-service").load("<?php echo base_url() ?>_marketing/main/show_product_service/"+id);
                }
              });
          });

          $("#cmb_customer_history").on("select2:select",function(e){
              e.preventDefault();
              var id = $("#cmb_customer_history").val();
              $("#history-table").dataTable().fnDestroy();
              $('#history-table').dataTable({
                // "fixedHeader" : true,
                "bProcessing" : true,
                "bServerSide" : true,
                "autoWidth": false,
                "responsive" : true,
                "scrollY" : "500px",
                "scrollX" : "100%",
                "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getHistoryOrderJson?kd_cust="+id,
                "columns":[
                  {"data":"tgl_pesan","name":"P.tgl_pesan"},
                  {"data":"tgl_estimasi","name":"P.tgl_estimasi"},
                  {"data":"kd_cust","name":"P.kd_cust"},
                  {"data":"nm_owner","name":"C.nm_owner"},
                  {"data":"nm_purchasing","name":"C.nm_purchasing"},
                  {"data":"jumlah","name":"PD.jumlah"},
                  {"data":"ukuran","name":"GH.ukuran"},
                  {"data":"payment_method","name":"P.payment_method"},
                  {"data":"harga","name":"PD.harga"},
                  {"data":"merek","name":"PD.merek"},
                  {"data":"warna_plastik","name":"GH.warna_plastik"},
                  {"data":"warna_cetak","name":"PD.warna_cetak"},
                  {"data":"sm","name":"PD.sm"},
                  {"data":"dll","name":"PD.dll"},
                  {"data":"kd_hrg","name":"PD.kd_hrg"},
                  {"data":"no_order","name":"PD.no_order"}
                ],
                "sPaginationType": "full_numbers",
                "iDisplayStart ": 10,
                "fnServerData": function (sSource, aoData, fnCallback){
                  $.ajax({
                           "dataType": "json",
                           "type": "POST",
                           "url": sSource,
                           "data": aoData,
                           "success": fnCallback
                       });
                },
                "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
                  var jumlah = parseFloat(AvData["jumlah"]).toLocaleString();
                  var harga = parseFloat(AvData["harga"]).toLocaleString();
                  $("td:eq(5)",AvRow).text(jumlah + " " + AvData["satuan"]);
                  $("td:eq(8)",AvRow).text(harga + " ");
                  $("td:eq(15)",AvRow).html("<button class='btn btn-md btn-flat btn-primary' onclick=modalLihatNotePesanan('"+AvData["no_order"]+"')>Lihat Note Pesanan</button>")
                }
              });

              $("#history-table-lama").dataTable().fnDestroy();
              $('#history-table-lama').dataTable({
                // "fixedHeader" : true,
                "bProcessing" : true,
                "bServerSide" : true,
                "autoWidth": false,
                "responsive" : true,
                "scrollY" : "500px",
                "scrollX" : "100%",
                "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getHistoryOrderJsonLama",
                "columns":[
                  {"data":"tgl_pesan","name":"P.tgl_pesan"},
                  {"data":"tgl_estimasi","name":"P.tgl_estimasi"},
                  {"data":"kd_customer","name":"P.kd_customer"},
                  {"data":"nm_owner","name":"C.nm_owner"},
                  {"data":"nm_purchasing","name":"C.nm_purchasing"},
                  {"data":"jumlah","name":"PD.jumlah"},
                  {"data":"ukuran","name":"GH.ukuran"},
                  {"data":"term_payment","name":"P.term_payment"},
                  {"data":"harga","name":"PD.harga"},
                  {"data":"merek","name":"PD.merek"},
                  {"data":"warna_plastik","name":"GH.warna_plastik"},
                  {"data":"cetak","name":"PD.cetak"},
                  {"data":"sm","name":"PD.sm"},
                  {"data":"dll","name":"PD.dll"},
                  {"data":"kd_harga","name":"PD.kd_harga"},
                  {"data":"no_order","name":"PD.no_order"}
                ],
                "sPaginationType": "full_numbers",
                "iDisplayStart ": 10,
                "fnServerData": function (sSource, aoData, fnCallback){
                  aoData.push({"name":"kdCust","value":id});
                  $.ajax({
                           "dataType": "json",
                           "type": "POST",
                           "url": sSource,
                           "data": aoData,
                           "success": fnCallback
                       });
                },
                "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
                  var jumlah = parseFloat(AvData["jumlah"]).toLocaleString();
                  var harga = parseFloat(AvData["harga"]).toLocaleString();
                  $("td:eq(5)",AvRow).text(jumlah + " " + AvData["satuan"]);
                  $("td:eq(8)",AvRow).text(harga + " ");
                  $("td:eq(15)",AvRow).html("<button class='btn btn-md btn-flat btn-primary' onclick=modalLihatNotePesananLama('"+AvData["no_order"]+"')>Lihat Note Pesanan</button>")
                }
              });
          });

          $(".proof").on("change",function(e){
            var proof = this.value;
            if(proof == "PERLU"){
              $("#cmb_ket_proof").removeAttr("disabled");
            }else{
              $("#cmb_ket_proof").attr("disabled","disabled");
            }
          });

          $(".proof_edit").on("change",function(e){
            var proof = this.value;
            if(proof == "PERLU"){
              $("#cmb_ket_proof_edit").removeAttr("disabled");
            }else{
              $("#cmb_ket_proof_edit").attr("disabled","disabled");
            }
          });

          $("#btn-tambah-pesanan-detail").click(function(e){
            e.preventDefault();
            var no_order1 = $("#txt_no_order").val();
            var kd_gudang1 = $("#cmb_ukuran").val();
            var jumlah1 = $("#txt_jumlah").val().replace(/,/g , "");
            var satuan1 = $("#cmb_satuan").val();
            var harga1 = $("#txt_harga").val().replace(/,/g , "");
            var mata_uang1 = $("input[name='rb_mata_uang']:checked").val();
            var warna_cetak1 = $("#txt_warna_cetak").val();
            var dll1 = $("#txt_dll").val();
            var strip1 = $("#txt_strip").val();
            var kd_harga1 = $("#txt_kd_hrg").val();
            var omset_kg1 = $("#txt_omset_kg").val().replace(/,/g , "");
            var omset_lembar1 = $("#txt_omset_lembar").val().replace(/,/g , "");
            var potongan1 = $("#txt_potongan").val().replace(/,/g , "");
            var hsl_diskon1 = $("#txt_hsl_diskon").val().replace(/,/g , "");
            var cn1 = $("#txt_cn").val();
            var merek1 = $("#txt_merek").val();
            var kd_cust1 = $("#txt_kd_cust").val();

            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/savePesananDetailTemp",
              dataType : "text",
              data : {
                      no_order      : no_order1,
                      kd_gudang     : kd_gudang1,
                      jumlah        : jumlah1,
                      satuan        : satuan1,
                      harga         : harga1,
                      mata_uang     : mata_uang1,
                      warna_cetak   : warna_cetak1,
                      dll           : dll1,
                      strip         : strip1,
                      kd_harga      : kd_harga1,
                      omset_kg      : omset_kg1,
                      omset_lembar  : omset_lembar1,
                      potongan      : potongan1,
                      hsl_diskon    : hsl_diskon1,
                      cn            : cn1,
                      merek         : merek1,
                      kd_cust       : kd_cust1
              },
              success: function(response){
                if (jQuery.trim(response) === "Berhasil"){
                  var out = "";
                  $("#notif-detail-pesanan").html("<div class='alert alert-success fade in' role='alert'><b>Item Pesanan Berhasil Ditambahkan</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                  $("#pesanan-detail-tbody").load("<?php echo base_url(); ?>_marketing/main/getPesananDetailsTemp/"+no_order1+"/"+kd_cust1+"");
                  $("#cmb_ukuran").empty().trigger("change");
                  $("#txt_jumlah").val("");
                  $("#cmb_satuan").val("");
                  $("#txt_harga").val("");
                  //$(".mata_uang").val("");;
                  $("#txt_warna_cetak").val("");
                  $("#txt_dll").val("");
                  $("#txt_strip").val("");
                  $("#txt_kd_hrg").val("");
                  $("#txt_omset_kg").val("");
                  $("#txt_omset_lembar").val("");
                  $("#txt_potongan").val("");
                  $("#txt_hsl_diskon").val("");
                  $("#txt_cn").val("");
                  $("#txt_merek").val("");
                }else{
                  $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Item Pesanan Gagal Ditambahkan !</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                  $("#pesanan-detail-tbody").load("<?php echo base_url(); ?>_marketing/main/getPesananDetailsTemp/"+no_order1+"/"+kd_cust1);
                }
              }
            });
          });

          $("#btn-checkout").click(function(e){
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
               CKEDITOR.instances[instance].updateElement();
            }
            var kd_cust = $("#txt_kd_cust").val();
            var no_order = $("#txt_no_order").val();
            var tgl_pesan = $("#txt_tgl_pesan").val();
            var tgl_estimasi = $("#txt_tgl_estimasi").val();
            var no_po = $("#txt_no_po").val();
            var nm_pemesan = $("#txt_nm_pemesan").val();
            var file_1 = $("#file_1").val().replace(/.*(\/|\\)/, '');//replace path with string null;
            var file_2 = $("#file_2").val().replace(/.*(\/|\\)/, '');
            var pajak = $(".pajak:checked").val();
            var jns_order = $("#cmb-jns-order").val();
            var kd_order = $("#txt_kd_order").val();
            var uang_muka = $("#txt_uang_muka").val();
            var mata_uang = $(".mata_uang_p:checked").val();
            var ekspedisi = $("#txt_ekspedisi").val();
            var payment = $("#cmb-payment").val();
            var proof = $(".proof:checked").val();
            var ket_proof = $("#cmb_ket_proof").val();
            var sales1 = $("#cmbSales").val();
            var note = CKEDITOR.instances['txt_note'].getData();

            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/savePesananFinal",
              dataType : "text",
              data : {
                kd_cust       : kd_cust,
                no_order      : no_order,
                tgl_pesan     : tgl_pesan,
                tgl_estimasi  : tgl_estimasi,
                no_po         : no_po,
                nm_pemesan    : nm_pemesan,
                file_1        : file_1,
                file_2        : file_2,
                pajak         : pajak,
                jns_order     : jns_order,
                kd_order      : kd_order,
                uang_muka     : uang_muka,
                mata_uang     : mata_uang,
                ekspedisi     : ekspedisi,
                payment       : payment,
                proof         : proof,
                note          : note,
                ket_proof     : ket_proof,
                sales         : sales1
              },
              success : function(response){
                if(jQuery.trim(response) === "Berhasil"){
                  var form_data = new FormData();
                  form_data.append("file", $("#file_1")[0].files[0]);
                  form_data.append("file2", $("#file_2")[0].files[0]);

                  $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>_marketing/main/uploadFoto",
                    contentType : false,
                    processData : false,
                    dataType : "text",
                    data : form_data,
                    success : function(response){
                      if (jQuery.trim(response) === "Berhasil") {
                        $("#notif-detail-pesanan").html("<div class='alert alert-success fade in' role='alert'><b>Pesanan Berhasil Ditambahkan</b></div>");
                        setTimeout(function(){
                          $(".alert").alert("close");
                        },2000);
                        location.reload();
                      }else{
                        $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Pesanan Gagal Ditambahkan!</b></div>");
                        setTimeout(function(){
                          $(".alert").alert("close");
                        },2000);
                      }
                    }
                  });
                }else if(jQuery.trim(response) === "Gagal"){
                  $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Data Gagal Masuk!</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                }else{
                  $("#notif-detail-pesanan").html("<div class='alert alert-warning fade in' role='alert'><b>Kolom Berwarna Merah Tidak Boleh Kosong!</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2500);
                }
              }
            });
          });

          $("#btn-edit-pesanan-detail-temp").click(function(e){
            e.preventDefault();
            var kd_cust1 = $("#txt_kd_cust").val();
            var no_order1 = $("#txt_no_order").val();
            var kd_gudang1 = $("#cmb_ukuran1").val();
            var jumlah1 = $("#txt_jumlah1").val().replace(/,/g , "");
            var satuan1 = $("#cmb_satuan1").val();
            var harga1 = $("#txt_harga1").val().replace(/,/g , "");
            var mata_uang1 = $("input[name='rb_mata_uang1']:checked").val();
            var id_dp1 = $("#id_dp").val();
            var warna1 = $("#txt_warna_cetak1").val();
            var dll1 = $("#txt_dll1").val();
            var strip1 = $("#txt_strip1").val();
            var kd_harga1 = $("#txt_kd_hrg1").val();
            var omset_kg1 = $("#txt_omset_kg1").val().replace(/,/g , "");
            var omset_lembar1 = $("#txt_omset_lembar1").val().replace(/,/g , "");
            var potongan1 = $("#txt_potongan1").val().replace(/,/g , "");
            var hsl_diskon1 = $("#txt_hsl_diskon1").val().replace(/,/g , "");
            var cn1 = $("#txt_cn1").val();
            var merek1 = $("#txt_merek1").val();

            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/modifyPesananDetailTemp",
              dataType : "text",
              data : {
                      id_dp         : id_dp1,
                      kd_gudang     : kd_gudang1,
                      jumlah        : jumlah1,
                      satuan        : satuan1,
                      harga         : harga1,
                      mata_uang     : mata_uang1,
                      warna         : warna1,
                      dll           : dll1,
                      strip         : strip1,
                      kd_harga      : kd_harga1,
                      omset_kg      : omset_kg1,
                      omset_lembar  : omset_lembar1,
                      potongan      : potongan1,
                      hsl_diskon    : hsl_diskon1,
                      cn            : cn1,
                      merek         : merek1
              },
              success : function(response){
                if(jQuery.trim(response) === "Berhasil"){
                  $("#edit-modal-pesanan-detail-temp").modal("hide");
                  $("#notif-detail-pesanan").html("<div class='alert alert-success fade in' role='alert'><b>Pesanan Berhasil Diubah</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                  $("#pesanan-detail-tbody").load("<?php echo base_url(); ?>_marketing/main/getPesananDetailsTemp/"+no_order1+"/"+kd_cust1+"");
                }else{
                  $("#edit-modal-pesanan-detail-temp").modal("hide");
                  $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Pesanan Gagal Diubah</b></div>");
                  //alert(response);
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                  $("#pesanan-detail-tbody").load("<?php echo base_url(); ?>_marketing/main/getPesananDetailsTemp/"+no_order1+"/"+kd_cust1+"");
                }
              }
            });
          });

          $("#table-pencarian").dataTable({
            // "fixedHeader" : true,
            "bProcessing" : true,
            "bServerSide" : true,
            "autoWidth": false,
            "responsive" : true,
            "bScrollCollapse": false,
            "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getPencarian",
            "columns":[
              {"data":"no_order","name":"P.no_order"},
              {"data":"nm_perusahaan","name":"C.nm_perusahaan"},
              {"data":"ukuran","name":"GH.ukuran"},
              {"data":"merek","name":"PD.merek","width":"30%"},
              {"data":"nm_brg","name":"GH.Merek"},
              {"data":"harga","name":"PD.harga"},
              {"data":"jumlah","name":"PD.jumlah"},
              {"data":"kd_hrg","name":"PD.kd_hrg"},
              {"data":"warna_cetak","name":"PD.warna_cetak"},
              {"data":"warna_plastik","name":"GH.warna_plastik"},
              {"data":"tgl_pesan","name":"P.tgl_pesan"},
              {"data":"sts_pesanan","name":"P.sts_pesanan"}
            ],
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 20,
            "order": [[0, "desc"]],
            "fnServerData": function (sSource, aoData, fnCallback){
              $.ajax({
                       "dataType": "json",
                       "type": "POST",
                       "url": sSource,
                       "data": aoData,
                       "success": fnCallback
                   });
            },
            "fnRowCallback":function(nRow,aData,iDisplayIndex,iDisplayIndexFull){
              $("td:eq(0)",nRow).html("<a href='#' class='btn btn-md btn-flat btn-primary' data-toggle='modal' data-target='#modal-lihat-detail-pesanan' onclick=lihatDetailPesanan('"+aData['no_order']+"')>"+aData['no_order']+"</a>");
              $("td:eq(1)",nRow).html("<a href='#' class='btn btn-md btn-flat btn-success' data-toggle='modal' data-target='#modal-detail-customer' onclick=lihatDetailCustomer('"+aData['kd_cust']+"')>"+aData['nm_perusahaan']+"</a>");
              if(aData["deleted"] == "TRUE"){
                $("td",nRow).css({"background-color":"rgba(255,0,0,0.7)","color":"#FFF"});
                $("td:eq(0)",nRow).html("<a href='#' class='btn btn-md btn-flat btn-primary' data-toggle='modal' style='color : #FFF;' data-target='#modal-lihat-detail-pesanan' onclick=lihatDetailPesanan('"+aData['no_order']+"')>"+aData['no_order']+"</a>");
                $("td:eq(1)",nRow).html("<a href='#' class='btn btn-md btn-flat btn-success' data-toggle='modal' style='color : #FFF;' data-target='#modal-detail-customer' onclick=lihatDetailCustomer('"+aData['kd_cust']+"')>"+aData['nm_perusahaan']+"</a>");
              }

              $("td:eq(6)",nRow).text(parseFloat(aData["jumlah"]).toLocaleString()+" "+aData["satuan"]);
            }
          });

//============ EDIT PESANAN DAN PESANAN DETAIL AJAX METHOD ============
          $("#produk-service-edit").load("<?php echo base_url(); ?>_marketing/main/show_product_service/"+$("#txt_kd_cust_edit").val());
          $("#btn-note-customer-edit").attr("href","<?php echo base_url(); ?>_marketing/main/show_customer_note/"+$("#txt_kd_cust_edit").val());
          $("#pesanan-detail-tbody-edit").load("<?php echo base_url(); ?>_marketing/main/getPesananDetails/" + $("#txt_no_order_edit").val());

          $("#btn-checkout-edit").click(function(e){
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
               CKEDITOR.instances[instance].updateElement();
            }
            var kd_cust = $("#txt_kd_cust_edit").val();
            var no_order = $("#txt_no_order_edit").val();
            var tgl_pesan = $("#txt_tgl_pesan_edit").val();
            var tgl_estimasi = $("#txt_tgl_estimasi_edit").val();
            var no_po = $("#txt_no_po_edit").val();
            var nm_pemesan = $("#txt_nm_pemesan_edit").val();
            var file_1 = $("#file_1_edit").val().replace(/.*(\/|\\)/, '')//replace path with string null;
            var file_2 = $("#file_2_edit").val().replace(/.*(\/|\\)/, '');
            var pajak = $(".pajak_edit:checked").val();
            var jns_order = $("#cmb-jns-order-edit").val();
            var kd_order = $("#txt_kd_order_edit").val();
            var uang_muka = $("#txt_uang_muka_edit").val();
            var mata_uang = $(".mata_uang_p_edit:checked").val();
            var ekspedisi = $("#txt_ekspedisi_edit").val();
            var payment = $("#cmb-payment-edit").val();
            var proof = $(".proof_edit:checked").val();
            var ket_proof = $("#cmb_ket_proof_edit").val();
            var note = CKEDITOR.instances['txt_note_edit'].getData();

            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/modifyPesananFinal",
              dataType : "text",
              data : {
                kd_cust       : kd_cust,
                no_order      : no_order,
                tgl_pesan     : tgl_pesan,
                tgl_estimasi  : tgl_estimasi,
                no_po         : no_po,
                nm_pemesan    : nm_pemesan,
                file_1        : file_1,
                file_2        : file_2,
                pajak         : pajak,
                jns_order     : jns_order,
                kd_order      : kd_order,
                uang_muka     : uang_muka,
                mata_uang     : mata_uang,
                ekspedisi     : ekspedisi,
                payment       : payment,
                proof         : proof,
                note          : note,
                ket_proof     : ket_proof
              },
              success : function(response){
                if(jQuery.trim(response) === "Berhasil"){
                  var form_data = new FormData();
                  form_data.append("file", $("#file_1_edit")[0].files[0]);
                  form_data.append("file2", $("#file_2_edit")[0].files[0]);

                  $.ajax({
                    type : "POST",
                    url : "<?php echo base_url(); ?>_marketing/main/uploadFoto",
                    contentType : false,
                    processData : false,
                    dataType : "text",
                    data : form_data,
                    success : function(response){
                      if (jQuery.trim(response) === "Berhasil") {
                        $("#notif-detail-pesanan").html("<div class='alert alert-success fade in' role='alert'><b>Pesanan Berhasil Diubah</b></div>");
                        setTimeout(function(){
                          $(".alert").alert("close");
                        },2000);
                        document.location = "<?php echo base_url(); ?>_marketing/main/pantau_order";
                      }else{
                        $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Pesanan Gagal Diubah!</b></div>");
                        setTimeout(function(){
                          $(".alert").alert("close");
                        },2000);
                        //alert(response);
                      }
                    }
                  });
                }else if(jQuery.trim(response) === "Gagal"){
                  $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Data Gagal Diubah!</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                }else{
                  $("#notif-detail-pesanan").html("<div class='alert alert-warning fade in' role='alert'><b>Kolom Berwarna Merah Tidak Boleh Kosong!</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2500);
                }
              }
            });
          });

          $("#btn-tambah-pesanan-detail-edit").click(function(e){
            e.preventDefault();
            var no_order1 = $("#txt_no_order_edit").val();
            var kd_gudang1 = $("#cmb_ukuran_edit").val();
            var jumlah1 = $("#txt_jumlah_edit").val().replace(/,/gi,"");
            var satuan1 = $("#cmb_satuan_edit").val();
            var harga1 = $("#txt_harga_edit").val().replace(/,/g , "");
            var mata_uang1 = $("input[name='rb_mata_uang']:checked").val();;
            var warna_cetak1 = $("#txt_warna_cetak_edit").val();
            var dll1 = $("#txt_dll_edit").val();
            var strip1 = $("#txt_strip_edit").val();
            var kd_harga1 = $("#txt_kd_hrg_edit").val();
            var omset_kg1 = $("#txt_omset_kg_edit").val().replace(/,/g , "");
            var omset_lembar1 = $("#txt_omset_lembar_edit").val().replace(/,/g , "");
            var potongan1 = $("#txt_potongan_edit").val().replace(/,/g , "");
            var hsl_diskon1 = $("#txt_hsl_diskon_edit").val().replace(/,/g , "");
            var cn1 = $("#txt_cn_edit").val();
            var merek1 = $("#txt_merek_edit").val();
            //var kd_cust1 = $("#txt_kd_cust_edit").val();

            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/savePesananDetail",
              dataType : "text",
              data : {
                      no_order      : no_order1,
                      kd_gudang     : kd_gudang1,
                      jumlah        : jumlah1,
                      satuan        : satuan1,
                      harga         : harga1,
                      mata_uang     : mata_uang1,
                      warna_cetak   : warna_cetak1,
                      dll           : dll1,
                      strip         : strip1,
                      kd_harga      : kd_harga1,
                      omset_kg      : omset_kg1,
                      omset_lembar  : omset_lembar1,
                      potongan      : potongan1,
                      hsl_diskon    : hsl_diskon1,
                      cn            : cn1,
                      merek         : merek1//,kd_cust:kd_cust1
              },
              success: function(response){
                if (jQuery.trim(response) === "Berhasil"){
                  var out = "";
                  $("#notif-detail-pesanan").html("<div class='alert alert-success fade in' role='alert'><b>Item Pesanan Berhasil Ditambahkan</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                  $("#pesanan-detail-tbody-edit").load("<?php echo base_url(); ?>_marketing/main/getPesananDetails/" + no_order1);
                  $("#cmb_ukuran_edit").val("");
                  $("#txt_jumlah_edit").val("");
                  $("#cmb_satuan_edit").val("");
                  $("#txt_harga_edit").val("");
                  $("#txt_warna_cetak_edit").val("");
                  $("#txt_dll_edit").val("");
                  $("#txt_strip_edit").val("");
                  $("#txt_kd_hrg_edit").val("");
                  $("#txt_omset_kg_edit").val("");
                  $("#txt_omset_lembar_edit").val("");
                  $("#txt_potongan_edit").val("");
                  $("#txt_hsl_diskon_edit").val("");
                  $("#txt_cn_edit").val("");
                  $("#txt_merek_edit").val("");
                }else{
                  $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Item Pesanan Gagal Ditambahkan !</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                  $("#pesanan-detail-tbody-edit").load("<?php echo base_url(); ?>_marketing/main/getPesananDetails/" + no_order1);
                }
              }
            });
          });

          $("#btn-edit-pesanan-detail").click(function(e){
            e.preventDefault();
            //var kd_cust1 = $("#txt_kd_cust").val();
            var no_order1 = $("#txt_no_order_edit").val();
            var kd_gudang1 = $("#cmb_ukuran1_edit").val();
            var jumlah1 = $("#txt_jumlah1_edit").val().replace(/,/g , "");
            var satuan1 = $("#cmb_satuan1_edit").val();
            var harga1 = $("#txt_harga1_edit").val().replace(/,/g , "");
            var mata_uang1 = $("input[name='rb_mata_uang1_edit']:checked").val();
            var id_dp1 = $("#id_dp_edit").val();
            var warna1 = $("#txt_warna_cetak1_edit").val();
            var dll1 = $("#txt_dll1_edit").val();
            var strip1 = $("#txt_strip1_edit").val();
            var kd_harga1 = $("#txt_kd_hrg1_edit").val();
            var omset_kg1 = $("#txt_omset_kg1_edit").val().replace(/,/g , "");
            var omset_lembar1 = $("#txt_omset_lembar1_edit").val().replace(/,/g , "");
            var potongan1 = $("#txt_potongan1_edit").val().replace(/,/g , "");
            var hsl_diskon1 = $("#txt_hsl_diskon1_edit").val().replace(/,/g , "");
            var cn1 = $("#txt_cn1_edit").val();
            var merek1 = $("#txt_merek1_edit").val();

            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/modifyPesananDetail",
              dataType : "text",
              data : {
                id_dp         : id_dp1,
                kd_gudang     : kd_gudang1,
                jumlah        : jumlah1,
                satuan        : satuan1,
                harga         : harga1,
                mata_uang     : mata_uang1,
                warna         : warna1,
                dll           : dll1,
                strip         : strip1,
                kd_harga      : kd_harga1,
                omset_kg      : omset_kg1,
                omset_lembar  : omset_lembar1,
                potongan      : potongan1,
                hsl_diskon    : hsl_diskon1,
                cn            : cn1,
                merek         : merek1
              },
              success : function(response){
                if(jQuery.trim(response) === "Berhasil"){
                  $("#edit-modal-pesanan-detail").modal("hide");
                  $("#notif-detail-pesanan").html("<div class='alert alert-success fade in' role='alert'><b>Pesanan Berhasil Diubah</b></div>");
                  $("#cmb_ukuran1_edit").val("");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                  $("#pesanan-detail-tbody-edit").load("<?php echo base_url(); ?>_marketing/main/getPesananDetails/"+no_order1);
                }else{
                  $("#edit-modal-pesanan-detail").modal("hide");
                  $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Pesanan Gagal Diubah</b></div>");
                  //alert(response);
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2000);
                  $("#pesanan-detail-tbody-edit").load("<?php echo base_url(); ?>_marketing/main/getPesananDetails/"+no_order1);
                }
              }
            });
          });
//============ EDIT PESANAN DAN PESANAN DETAIL AJAX METHOD ============

          $('#data-customer').dataTable({
            // "fixedHeader" : true,
            "bProcessing" : true,
            "bServerSide" : true,
            "autoWidth": false,
            "responsive" : true,
            "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getCustomerListJson",
            "columns":[
              {"data":"kd_cust","name":"C.kd_cust"},
              {"data":"nm_perusahaan","name":"C.nm_perusahaan"},
              {"data":"nm_owner","name":"C.nm_owner"},
              {"data":"nm_purchasing","name":"C.nm_purchasing"},
              {"data":"tlp_kantor","name":"C.tlp_kantor"},
              {"data":"alamat","name":"C.alamat"},
              {"data":"kota","name":"C.kota"},
              {"data":"kode_pos","name":"C.kode_pos"},
              {"data":"action","name":"C.nm_perusahaan_update"}
            ],
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 20,
            "order": [[0, "desc"]],
            "fnServerData": function (sSource, aoData, fnCallback){
              $.ajax({
                       "dataType": "json",
                       "type": "POST",
                       "url": sSource,
                       "data": aoData,
                       "success": fnCallback
                   });
            },
            "fnRowCallback":function(nRow,aData,iDisplayIndex,iDisplayIndexFull){
              if(aData['status_customer'] == "TIDAK_AKTIF" || aData['status_customer'] == null){
                $("td",nRow).css("background-color","rgba(255, 0, 0, 0.7)");
              }
              $("td:eq(0)",nRow).html(aData["kd_cust"]+"<label class='text-blue'>["+aData["no_cust"]+"]</label>");
            }
          });

          $("#btn-closed-order").click(function(e){
            e.preventDefault();
            $('#data-order').dataTable().fnDestroy();
            $('#data-order').remove();
            $('#data-order-closed').removeAttr("style");
            $('#data-order-closed').css("font-size","12px");
            $('#data-order-closed').dataTable({
              // "fixedHeader" : true,
              "bProcessing" : true,
              "bServerSide" : true,
              "autoWidth": false,
              "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getClosedOrderListJson",
              "columns":[
                {"data":"no_order","name":"no_order"},
                {"data":"kd_order","name":"kd_order","sWidth":"35px"},
                {"data":"nm_perusahaan","name":"nm_perusahaan"},
                {"data":"nm_pemesan","name":"nm_pemesan"},
                {"data":"tgl_pesan","name":"tgl_pesan","sWidth":"35px"},
                {"data":"tgl_estimasi","name":"tgl_estimasi","sWidth":"35px"},
                {"data":"sts_pesanan","name":"sts_pesanan","sWidth":"35px"},
                {"data":"approve_1","name":"nm_perusahaan_update"},
                {"data":"approve_2","name":"nm_purchasing_update"},
                {"data":"approve_3","name":"nm_owner_update"},
                // {"data":"approve_4","name":"approve_4"},
                {"data":"approve_5","name":"no_cust_update"},
                {"data":"approve_6","name":"approve_6"},
                {"data":"action","name":"no_order"}
              ],
              "sPaginationType": "full_numbers",
              "iDisplayStart ": 20,
              "fnServerData": function (sSource, aoData, fnCallback){
                $.ajax({
                         "dataType": "json",
                         "type": "POST",
                         "url": sSource,
                         "data": aoData,
                         "success": fnCallback
                     });
              },
              "order": [
                        [0, "desc"]
                      ],
              "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                $(".print-out",nRow).attr("onclick","print_out('"+aData["no_order"]+"')");
                // $(".edit-pesanan",nRow).attr("href","<?php echo base_url().'_marketing/main/ubah_order/' ?>"+aData["no_order"]);
                if(aData["sts_pesanan"] != "OPEN" ){
                  // $(".trash-pesanan",nRow).attr({"disabled":"disabled","title":"Silahkan Konfirmasi Ke PPIC Terlebih Dahulu"});
                  $(".edit-pesanan",nRow).attr({"disabled":"disabled","title":"Silahkan Konfirmasi Ke PPIC Terlebih Dahulu"});
                }else{
                  // $(".trash-pesanan",nRow).attr("onclick","trashPesanan('"+aData["no_order"]+"')");
                  $(".edit-pesanan",nRow).attr("href","<?php echo base_url().'_marketing/main/ubah_order/' ?>"+aData["no_order"]);
                }
                if(aData["sts_pesanan"]=="FINISH" && (aData["tgl_kirim"] != "null" || aData["tgl_kirim"] != "")){
                  $('td', nRow).css('background-color', 'rgba(0, 226, 89, 0.6)');
                }else{

                }
                $("td:eq(0)",nRow).html("<a href='#' data-toggle='modal' data-target='#modal-lihat-detail-pesanan' onclick=lihatDetailPesanan('"+aData['no_order']+"')>"+aData['no_order']+"</a>");
                if(aData["approve_1"] == "FALSE"){
                  $("td:eq(7)",nRow).text("");
                }else{
                  $("td:eq(7)",nRow).html("<i class='fa fa-check'></i>");
                }
                if(aData["approve_5"] == "FALSE"){
                  $("td:eq(8)",nRow).text("");
                }else{
                  $("td:eq(8)",nRow).html("<i class='fa fa-check'></i>");
                }
                if(aData["approve_3"] == "FALSE"){
                  $("td:eq(9)",nRow).text("");
                }else{
                  $("td:eq(9)",nRow).html("<i class='fa fa-check'></i>");
                }
                if(aData["approve_6"] == "FALSE"){
                  $("td:eq(10)",nRow).text("");
                }else{
                  $("td:eq(10)",nRow).html("<i class='fa fa-check'></i>");
                }
                if(aData["approve_2"] == "FALSE"){
                  $("td:eq(11)",nRow).text("");
                }else{
                  $("td:eq(11)",nRow).html("<i class='fa fa-check'></i>");
                }

                // if(aData["approve_1"] == "FALSE"){
                //   $("td:eq(7)",nRow).text("");
                // }else{
                //   $("td:eq(7)",nRow).html("<i class='fa fa-check'></i>");
                // }
                // if(aData["approve_2"] == "FALSE"){
                //   $("td:eq(8)",nRow).text("");
                // }else{
                //   $("td:eq(8)",nRow).html("<i class='fa fa-check'></i>");
                // }
                // if(aData["approve_3"] == "FALSE"){
                //   $("td:eq(9)",nRow).text("");
                // }else{
                //   $("td:eq(9)",nRow).html("<i class='fa fa-check'></i>");
                // }
                // if(aData["approve_5"] == "FALSE"){
                //   $("td:eq(10)",nRow).text("");
                // }else{
                //   $("td:eq(10)",nRow).html("<i class='fa fa-check'></i>");
                // }
                // if(aData["approve_6"] == "FALSE"){
                //   $("td:eq(11)",nRow).text("");
                // }else{
                //   $("td:eq(11)",nRow).html("<i class='fa fa-check'></i>");
                // }
                // if(aData["approve_6"] == "FALSE"){
                //   $("td:eq(12)",nRow).text("");
                // }else{
                //   $("td:eq(12)",nRow).html("<i class='fa fa-check'></i>");
                // }
              }
            });
            $("#btn-closed-order").remove();
            $("#btn-wrapper").html("<a href='<?php echo base_url(); ?>_marketing/main/pantau_order' class='btn btn-flat btn-block btn-success'>Order Aktif</a>")
          });

          $("#data-statistik-customer").dataTable({
            // "fixedHeader" : true,
            "bProcessing" : true,
            "bServerSide" : true,
            "autoWidth" : false,
            "sAjaxSource" : "<?php echo base_url(); ?>_marketing/main/getStatistikCustomerGlobalJson",
            "columns" : [
              {"data":"kd_cust","name":"C.kd_cust"},
              {"data":"nm_perusahaan","name":"C.nm_perusahaan"},
              {"data":"KG","name":"C.nm_perusahaan_update"},
              {"data":"LEMBAR","name":"C.nm_perusahaan"},
              {"data":"BAL","name":"C.nm_perusahaan"},
            ],
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 20,
            "fnServerData": function (sSource, aoData, fnCallback){
              $.ajax({
                       "dataType": "json",
                       "type": "POST",
                       "url": sSource,
                       "data": aoData,
                       "success": fnCallback
                   });
            },
            "order": [
                      [1, "ASC"]
                    ],
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
              var index = iDisplayIndex+1;
              $("td:eq(0)",nRow).text(index);
              $("td:eq(2)",nRow).text(parseFloat(aData["KG"]).toLocaleString());
              $("td:eq(3)",nRow).text(parseFloat(aData["LEMBAR"]).toLocaleString());
              $("td:eq(4)",nRow).text(parseFloat(aData["BAL"]).toLocaleString());
              $("td:eq(1)",nRow).html("<a href='<?php echo base_url(); ?>_marketing/main/detail_statistik/"+aData["kd_cust"]+"'>"+aData["nm_perusahaan"]+"</a>");
            }
          });

          $('#data-order').dataTable({
            // "fixedHeader" : true,
            "bProcessing" : true,
            "bServerSide" : true,
            // "autoWidth": false,
            "bAutoWidth": true,
            "sPaginationType": "full_numbers",
            // "sScrollX" : "100%",
            "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getOrderListJson",
            "columns":[
              {"data":"no_order","name":"no_order"},
              {"data":"kd_order","name":"kd_order","sWidth":"35px"},
              {"data":"nm_perusahaan","name":"nm_perusahaan","sWidth":"150px"},
              {"data":"nm_pemesan","name":"nm_pemesan"},
              {"data":"nm_purchasing","name":"nm_purchasing","sWidth":"100px"},
              {"data":"tgl_pesan","name":"tgl_pesan","sWidth":"35px"},
              {"data":"tgl_estimasi","name":"tgl_estimasi","sWidth":"35px"},
              {"data":"sts_pesanan","name":"sts_pesanan","sWidth":"35px"},
              {"data":"approve_1","name":"nm_perusahaan_update"},
              {"data":"approve_2","name":"nm_purchasing_update"},
              {"data":"approve_3","name":"nm_owner_update"},
              // {"data":"approve_4","name":"approve_4"},
              {"data":"approve_5","name":"no_cust_update"},
              {"data":"approve_6","name":"approve_6"},
              {"data":"action","name":"no_order"}
            ],
            "fnServerData": function (sSource, aoData, fnCallback){
              $.ajax({
                       "dataType": "json",
                       "type": "POST",
                       "url": sSource,
                       "data": aoData,
                       "success": fnCallback
                   });
            },
            "order": [
                      [0, "desc"]
                    ],
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
              $(".print-out",nRow).attr("onclick","print_out('"+aData["no_order"]+"')");
              $(".print-out-produksi",nRow).attr("onclick","print_out_produksi('"+aData["no_order"]+"')");
              // if(aData["sts_pesanan"] != "OPEN" ){
              //   $(".trash-pesanan",nRow).attr({"disabled":"disabled","title":"Silahkan Konfirmasi Ke PPIC Terlebih Dahulu"});
              //   $(".edit-pesanan",nRow).attr({"disabled":"disabled","title":"Silahkan Konfirmasi Ke PPIC Terlebih Dahulu"});
              // }else{
              //   $(".trash-pesanan",nRow).attr("onclick","trashPesanan('"+aData["no_order"]+"')");
              //   $(".edit-pesanan",nRow).attr("href","<?php echo base_url().'_marketing/main/ubah_order/' ?>"+aData["no_order"]);
              // }

              $(".trash-pesanan",nRow).attr("onclick","trashPesanan('"+aData["no_order"]+"')");
              $(".edit-pesanan",nRow).attr("href","<?php echo base_url().'_marketing/main/ubah_order/' ?>"+aData["no_order"]);

              $("td:eq(0)",nRow).html("<a href='#' data-toggle='modal' data-target='#modal-lihat-detail-pesanan' onclick=lihatDetailPesanan('"+aData['no_order']+"') class='bg-blue'>"+aData['no_order']+"</a>");
              var arrTglEstimasi = aData["tgl_estimasi"].split("-");
              var tgl_estimasi = new Date(arrTglEstimasi[2],arrTglEstimasi[1]-1,arrTglEstimasi[0]);
              var date = new Date();
              var month = date.getMonth()+1;
              var day = date.getDate();
              var tgl_sekarang_temp = (date.getFullYear()+'-'+
                                      ((''+month).length<2 ? '0' : '')+ month +'-'+
                                      ((''+day).length<2 ? '0' : ''))+ day;
              var tgl_sekarang = new Date(tgl_sekarang_temp);
              var timeDiff = Math.round(tgl_estimasi.getTime() - tgl_sekarang.getTime());
              var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
              if(diffDays <= 2 && diffDays >= 0){
                $('td', nRow).css('background-color', 'rgba(237,234,0,0.6)');
                $('td:eq(13)', nRow).css('background-color', 'transparent');
              }else if(diffDays < 0){
                $('td', nRow).css('background-color', 'rgba(255,0,0,0.6)');
                $('td:eq(13)', nRow).css('background-color', 'transparent');
                $('td', nRow).css('color', '#FFF');
              }else{

              }

              if(aData["approve_1"] == "FALSE"){
                $("td:eq(8)",nRow).text("");
              }else{
                $("td:eq(8)",nRow).html("<i class='fa fa-check'></i>");
              }
              if(aData["approve_5"] == "FALSE"){
                $("td:eq(9)",nRow).text("");
              }else{
                $("td:eq(9)",nRow).html("<i class='fa fa-check'></i>");
              }
              if(aData["approve_3"] == "FALSE"){
                $("td:eq(10)",nRow).text("");
              }else{
                $("td:eq(10)",nRow).html("<i class='fa fa-check'></i>");
              }
              if(aData["approve_6"] == "FALSE"){
                $("td:eq(11)",nRow).text("");
              }else{
                $("td:eq(11)",nRow).html("<i class='fa fa-check'></i>");
              }
              if(aData["approve_2"] == "FALSE"){
                $("td:eq(12)",nRow).text("");
              }else{
                $("td:eq(12)",nRow).html("<i class='fa fa-check'></i>");
              }
              // if(aData["approve_6"] == "FALSE"){
              //   $("td:eq(13)",nRow).text("");
              // }else{
              //   $("td:eq(13)",nRow).html("<i class='fa fa-check'></i>");
              // }
            }
          });

          function hitungJumlah(param){
            var total = 0;
            total += parseFloat(param);
            return total;
          }

          $("#table-global-stat").dataTable({
            // "fixedHeader" : true,
            "bProcessing" : true,
            "bServerSide" : true,
            "autoWidth" : false,
            "sAjaxSource" : "<?php echo base_url(); ?>_marketing/main/getDetailStatistikCustomerJson/<?php echo $this->uri->rsegment(3); ?>",
            "columns" : [
              {"data":"no_order","name":"PD.no_order","width" : "12%"},
              {"data":"tgl_pesan","name":"P.tgl_pesan","width" : "12%"},
              {"data":function(data, type,dataToSet){
                if(jQuery.trim(data.kd_gd_hasil) == "NULL" || jQuery.trim(data.kd_gd_hasil) == ""){
                  return data.kd_gd_bahan + " " + data.nm_barang;
                }else{
                  return data.kd_gd_hasil + " " + data.ukuran +" "+ data.merek + " " + " " + data.warna_plastik;
                }
              },"name" : 'GH.merek'},
              {"data":"omset_kg","name":"PD.omset_kg","width":"15%"},
              {"data":"omset_lembar","name":"PD.omset_lembar","width":"15%"},
            ],
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 20,
            "fnServerData": function (sSource, aoData, fnCallback){
              $.ajax({
                       "dataType": "json",
                       "type": "POST",
                       "url": sSource,
                       "data": aoData,
                       "success": fnCallback
                   });
            },
            "order": [
                      [1, "ASC"]
                    ],
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
              $("td:eq(3)",nRow).text(parseFloat(aData["omset_kg"]).toLocaleString());
              $("td:eq(4)",nRow).text(parseFloat(aData["omset_lembar"]).toLocaleString());
            }
          });

          if($("#table-global-stat").length > 0){
            $.ajax({
              type : "POST",
              url : "<?= base_url('_marketing/main/getDetailStatistikCustomerJson/').$this->uri->rsegment(3); ?>",
              dataType : "JSON",
              success : function(response){
                var totalBerat = 0;
                var totalLembar = 0;
                for (var i = 0; i < response.data.length; i++) {
                  totalBerat += parseFloat(response.data[i].omset_kg);
                  totalLembar += parseFloat(response.data[i].omset_lembar);
                }
                $("#total").html("Berat = "+totalBerat.toLocaleString()+
                                 "<br>"+
                                 "Lembar = "+totalLembar.toLocaleString());
              }
            });
          }

          $.ajax({
            url:"<?php echo base_url(); ?>_marketing/main/getTotalTrash",
            dataType : "JSON",
            success : function(response){
              $("#count-trash").text(response);
            }
          });

          setInterval(function(){
            $.ajax({
              url:"<?php echo base_url(); ?>_marketing/main/getTotalTrash",
              dataType : "JSON",
              success : function(response){
                $("#count-trash").text(response);
              }
            });
          },60000);

          $("#modal-trash").on("shown.bs.modal",function(e){
            $("#table-trash").dataTable().fnDestroy();
            $("#table-trash").dataTable({
              // "fixedHeader" : true,
              "bProcessing" : true,
              "bServerSide" : true,
              "autoWidth" : false,
              "sAjaxSource" : "<?php echo base_url(); ?>_marketing/main/getPesananTrash",
              "columns" : [
                {"data":"no_order","name":"P.no_order"},
                {"data":"nm_perusahaan","name":"C.nm_perusahaan"},
                {"data":"nm_pemesan","name":"P.nm_pemesan"},
                {"data":"diperbarui","name":"P.diperbarui"},
                {"data":"no_order","name":"P.no_order"}
              ],
              "sPaginationType": "full_numbers",
              "iDisplayStart ": 20,
              "fnServerData": function (sSource, aoData, fnCallback){
                $.ajax({
                         "dataType": "json",
                         "type": "POST",
                         "url": sSource,
                         "data": aoData,
                         "success": fnCallback
                     });
              },
              "order": [
                        [2, "DESC"]
                      ],
              "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                $("td:eq(4)",nRow).html('<button class="btn btn-flat btn-sm btn-success btn-restore" onclick="restorePesananTrash()" data-id="'+aData['no_order']+'">Pulihkan</button>'+
                                        '<a href="#" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modal-lihat-detail-pesanan" onclick=lihatDetailPesanan("'+aData['no_order']+'")>Lihat Detail</a>');

              }
            });
          });

//======================================== Graphing (Start) ================================
          $("#btn-lihat-stat").click(function(e){
            e.preventDefault();
            $(".chartjs-hidden-iframe").remove();
            var pilihan = $("#cmb_pilihan_statistik").val();
            var tgl_awal = $("#txt_tgl_mulai").val();
            var tgl_akhir = $("#txt_tgl_akhir").val();
            if(pilihan == "#" || tgl_awal == "" || tgl_akhir == ""){
              alert("Pilihan Dan Tanggal Tidak Boleh Kosong!");
            }else{
              if(pilihan == "L-Stat-Bulanan"){
                $('#table-global-stat_wrapper').hide();
                $(".nav-tabs-custom").removeAttr("style");
              }else if(pilihan == "L-Stat-Tanggal"){
                $('#table-global-stat_wrapper').hide();
                $(".nav-tabs-custom").removeAttr("style");
              }else if(pilihan == "R_Trans"){
                $('#table-global-stat').dataTable().fnDestroy();
                $(".nav-tabs-custom").css("display","none");
                $("#table-global-stat").dataTable({
                  // "fixedHeader" : true,
                  "bProcessing" : true,
                  "bServerSide" : true,
                  "autoWidth" : false,
                  "sAjaxSource" : "<?php echo base_url(); ?>_marketing/main/getDetailStatistikCustomerJson/<?php echo $this->uri->rsegment(3); ?>?tgl_awal="+tgl_awal+"&tgl_akhir="+tgl_akhir,
                  "columns" : [
                    {"data":"no_order","name":"PD.no_order","width" : "12%"},
                    {"data":"tgl_pesan","name":"P.tgl_pesan","width" : "12%"},
                    {"data":function(data, type,dataToSet){
                      if(jQuery.trim(data.kd_gd_hasil) == "NULL" || jQuery.trim(data.kd_gd_hasil) == ""){
                        return data.kd_gd_bahan + " " + data.nm_barang;
                      }else{
                        return data.kd_gd_hasil + " " + data.ukuran +" "+ data.merek + " " + " " + data.warna_plastik;
                      }
                    },"name" : 'GH.merek'},
                    {"data":"omset_kg","name":"PD.omset_kg","width":"15%"},
                    {"data":"omset_lembar","name":"PD.omset_lembar","width":"15%"},
                  ],
                  "sPaginationType": "full_numbers",
                  "iDisplayStart ": 20,
                  "fnServerData": function (sSource, aoData, fnCallback){
                    $.ajax({
                             "dataType": "json",
                             "type": "POST",
                             "url": sSource,
                             "data": aoData,
                             "success": fnCallback
                         });
                  },
                  "order": [
                            [1, "ASC"]
                          ],
                  "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {

                  }
                });

                $.ajax({
                  type : "POST",
                  url : "<?= base_url('_marketing/main/getDetailStatistikCustomerJson/').$this->uri->rsegment(3); ?>?tgl_awal="+tgl_awal+"&tgl_akhir="+tgl_akhir,
                  dataType : "JSON",
                  success : function(response){
                    var totalBerat = 0;
                    var totalLembar = 0;
                    for (var i = 0; i < response.data.length; i++) {
                      totalBerat += parseFloat(response.data[i].omset_kg);
                      totalLembar += parseFloat(response.data[i].omset_lembar);
                    }
                    $("#total").html("Berat = "+totalBerat.toLocaleString()+
                                     "<br>"+
                                     "Lembar = "+totalLembar.toLocaleString());
                  }
                })
              }else{

              }
            }
          });

          $("#btn-chart-kg").click(function(e){
            e.preventDefault();
            $(".chartjs-hidden-iframe").remove();
            var kd_cust1 = "<?php echo $this->uri->rsegment(3); ?>";
            var pilihan = $("#cmb_pilihan_statistik").val();
            var url1 = "";
            if(pilihan == "L-Stat-Bulanan"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOrderKg";
            }else if(pilihan == "L-Stat-Tanggal"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOrderKgPerTanggal";
            }else{
              url1 = "";
            }
            var tgl_mulai1 = $("#txt_tgl_mulai").val();
            var tgl_akhir1 = $("#txt_tgl_akhir").val();
            if(tgl_mulai1 == "" && tgl_akhir1==""){
              alert("Tanggal Awal dan Akhir Tidak Boleh Kosong!");
            }else{
              $.ajax({
                type : "POST",
                url : url1,
                dataType : "JSON",
                data : {kd_cust:kd_cust1,tgl_awal:tgl_mulai1,tgl_akhir:tgl_akhir1},
                success : function(response){
                  var Bulan = response.Bulan;
                  var Jumlah = response.Jumlah.map(Number);

                  var ctx = $("#kg-bar-chart").get(0).getContext('2d');
                  var chart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: Bulan,
                          datasets: [
                          {
                              label: "Kg",
                              backgroundColor: 'rgb(0, 255, 106)',
                              borderColor: 'rgb(0, 255, 106)',
                              data: Jumlah,
                          }
                          ]
                      },


                      // Configuration options go here
                      options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                      }
                  });

                }
              });
            }
          });

          $("#btn-chart-lembar").click(function(e){
            e.preventDefault();
            $(".chartjs-hidden-iframe").remove();
            var kd_cust1 = "<?php echo $this->uri->rsegment(3); ?>";
            var pilihan = $("#cmb_pilihan_statistik").val();
            var url1 = "";
            if(pilihan == "L-Stat-Bulanan"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOrderLembar";
            }else if(pilihan == "L-Stat-Tanggal"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOrderLembarPerTanggal";
            }else{
              url1 = "";
            }
            var tgl_mulai1 = $("#txt_tgl_mulai").val();
            var tgl_akhir1 = $("#txt_tgl_akhir").val();
            if(tgl_mulai1 == "" && tgl_akhir1==""){
              alert("Tanggal Awal dan Akhir Tidak Boleh Kosong!");
            }else{
              $.ajax({
                type : "POST",
                url : url1,
                dataType : "JSON",
                data : {kd_cust:kd_cust1,tgl_awal:tgl_mulai1,tgl_akhir:tgl_akhir1},
                success : function(response){
                  var Bulan = response.Bulan;
                  var Jumlah = response.Jumlah.map(Number);

                  var ctx = $("#lembar-bar-chart").get(0).getContext('2d');
                  var chart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: Bulan,
                          datasets: [
                          {
                              label: "Lembar",
                              backgroundColor: 'rgb(0, 255, 106)',
                              borderColor: 'rgb(0, 255, 106)',
                              data: Jumlah,
                          }
                          ]
                      },


                      // Configuration options go here
                      options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                      }
                  });

                }
              });
            }
          });

          $("#btn-chart-bal").click(function(e){
            e.preventDefault();
            $(".chartjs-hidden-iframe").remove();
            var kd_cust1 = "<?php echo $this->uri->rsegment(3); ?>";
            var tgl_mulai1 = $("#txt_tgl_mulai").val();
            var tgl_akhir1 = $("#txt_tgl_akhir").val();
            var pilihan = $("#cmb_pilihan_statistik").val();
            var url1 = "";
            if(pilihan == "L-Stat-Bulanan"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOrderBal";
            }else if(pilihan == "L-Stat-Tanggal"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOrderBalPerTanggal";
            }else{
              url1 = "";
            }
            if(tgl_mulai1 == "" && tgl_akhir1==""){
              alert("Tanggal Awal dan Akhir Tidak Boleh Kosong!");
            }else{
              $.ajax({
                type : "POST",
                url : url1,
                dataType : "JSON",
                data : {kd_cust:kd_cust1,tgl_awal:tgl_mulai1,tgl_akhir:tgl_akhir1},
                success : function(response){
                  var Bulan = response.Bulan;
                  var Jumlah = response.Jumlah.map(Number);

                  var ctx = $("#bal-bar-chart").get(0).getContext('2d');
                  var chart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: Bulan,
                          datasets: [
                          {
                              label: "BAL",
                              backgroundColor: 'rgb(0, 255, 106)',
                              borderColor: 'rgb(0, 255, 106)',
                              data: Jumlah,
                          }
                          ]
                      },


                      // Configuration options go here
                      options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                      }
                  });
                }
              });
            }
          });

          $("#btn-chart-kaleng").click(function(e){
            e.preventDefault();
            $(".chartjs-hidden-iframe").remove();
            var kd_cust1 = "<?php echo $this->uri->rsegment(3); ?>";
            var tgl_mulai1 = $("#txt_tgl_mulai").val();
            var tgl_akhir1 = $("#txt_tgl_akhir").val();
            var pilihan = $("#cmb_pilihan_statistik").val();
            var url1 = "";
            if(pilihan == "L-Stat-Bulanan"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOrderKaleng";
            }else if(pilihan == "L-Stat-Tanggal"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOrderKalengPerTanggal";
            }else{
              url1 = "";
            }
            if(tgl_mulai1 == "" && tgl_akhir1==""){
              alert("Tanggal Awal dan Akhir Tidak Boleh Kosong!");
            }else{
              $.ajax({
                type : "POST",
                url : url1,
                dataType : "JSON",
                data : {kd_cust:kd_cust1,tgl_awal:tgl_mulai1,tgl_akhir:tgl_akhir1},
                success : function(response){
                  var Bulan = response.Bulan;
                  var Jumlah = response.Jumlah.map(Number);

                  var ctx = $("#kaleng-bar-chart").get(0).getContext('2d');
                  var chart = new Chart(ctx, {
                      type: 'bar',
                      data: {
                          labels: Bulan,
                          datasets: [
                          {
                              label: "Kaleng",
                              backgroundColor: 'rgb(0, 255, 106)',
                              borderColor: 'rgb(0, 255, 106)',
                              data: Jumlah,
                          }
                          ]
                      },


                      // Configuration options go here
                      options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                      }
                  });
                }
              });
            }
          });

          $("#btn-chart-omset-kg").click(function(e){
            e.preventDefault();
            $(".chartjs-hidden-iframe").remove();
            var kd_cust1 = "<?php echo $this->uri->rsegment(3); ?>";
            var tgl_mulai1 = $("#txt_tgl_mulai").val();
            var tgl_akhir1 = $("#txt_tgl_akhir").val();
            var pilihan = $("#cmb_pilihan_statistik").val();
            var url1 = "";
            if(pilihan == "L-Stat-Bulanan"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOmsetOrderKg";
            }else if(pilihan == "L-Stat-Tanggal"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOmsetOrderKgPerTanggal";
            }else{
              url1 = "";
            }
            if(tgl_mulai1 == "" && tgl_akhir1==""){
              alert("Tanggal Awal dan Akhir Tidak Boleh Kosong!");
            }else{
              $.ajax({
                type : "POST",
                url : url1,
                dataType : "JSON",
                data : {kd_cust:kd_cust1,tgl_awal:tgl_mulai1,tgl_akhir:tgl_akhir1},
                success : function(response){
                  var Bulan = response.Bulan;
                  var Jumlah = response.Jumlah.map(Number);

                  var ctx = $("#omset-kg-line-chart").get(0).getContext('2d');
                  var chart = new Chart(ctx, {
                      type: 'line',
                      data: {
                          labels: Bulan,
                          datasets: [
                          {
                              label: "Omset Kg",
                              backgroundColor: 'rgba(255, 255, 255, 0)',
                              borderColor: 'rgb(0, 255, 106)',
                              data: Jumlah,
                          }
                          ]
                      },


                      // Configuration options go here
                      options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                      }
                  });

                }
              });
            }
          });

          $("#btn-chart-omset-lembar").click(function(e){
            e.preventDefault();
            $(".chartjs-hidden-iframe").remove();
            var kd_cust1 = "<?php echo $this->uri->rsegment(3); ?>";
            var tgl_mulai1 = $("#txt_tgl_mulai").val();
            var tgl_akhir1 = $("#txt_tgl_akhir").val();
            var pilihan = $("#cmb_pilihan_statistik").val();
            var url1 = "";
            if(pilihan == "L-Stat-Bulanan"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOmsetOrderLembar";
            }else if(pilihan == "L-Stat-Tanggal"){
              url1 = "<?php echo base_url(); ?>_marketing/main/getChartDataOmsetOrderLembarPerTanggal";
            }else{
              url1 = "";
            }
            if(tgl_mulai1 == "" && tgl_akhir1==""){
              alert("Tanggal Awal dan Akhir Tidak Boleh Kosong!");
            }else{
              $.ajax({
                type : "POST",
                url : url1,
                dataType : "JSON",
                data : {kd_cust:kd_cust1,tgl_awal:tgl_mulai1,tgl_akhir:tgl_akhir1},
                success : function(response){
                  var Bulan = response.Bulan;
                  var Jumlah = response.Jumlah.map(Number);

                  var ctx = $("#omset-lembar-line-chart").get(0).getContext('2d');
                  var chart = new Chart(ctx, {
                      type: 'line',
                      data: {
                          labels: Bulan,
                          datasets: [
                          {
                              label: "Omset Lembar",
                              backgroundColor: 'rgba(255, 255, 255, 0)',
                              borderColor: 'rgb(0, 255, 106)',
                              data: Jumlah,
                          }
                          ]
                      },


                      // Configuration options go here
                      options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                      }
                  });
                }
              });
            }
          });
//======================================== Graphing (End) ================================
        });//Tutup $(function(){}); yang pertama
          // $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          //   checkboxClass: 'icheckbox_flat-green',
          //   radioClass: 'iradio_flat-green'
          // });
          CKEDITOR.config.toolbar = [
                                     ['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
                                     ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-','Print']
                                    ];
          if($("#txt_note").length > 0 || $("#txt_note_edit").length > 0 ){
            CKEDITOR.replace("txt_note",{height:120});
            CKEDITOR.replace("txt_note_edit",{height:120});
          }
      </script>
<!--===============================================On Load Function (Finish) ===============================================-->

<!--===============================================On Load External Modal Function (Start) ===============================================-->
      <script type="text/javascript">
        $(document).ready(function() {
          $('.modal_link').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            if (url.indexOf('#') == 0) {
              $(url).modal('open');
            } else {
              $.get(url, function(data) {
                $(data).modal();
              });
            }
          });
        });

        function showImage(param){
          var url = $(param).attr("src");
          $("#imageShow").attr("src",url);
        }

        function deleteImageProductService(param){
          if(confirm("Apakah Anda Yakin Ingin menghapus Gambar Ini?")){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/removeImageProductService'); ?>",
              dataType : "TEXT",
              data : {
                id : param
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#modal-notif").addClass("modal-info");
                  $("#modalNotifContent").text("Gambar Berhasil Dihapus");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-info");
                    $("#modalNotifContent").text("");
                    location.reload();
                  },2000);
                }else{
                  $("#modal-notif").addClass("modal-danger");
                  $("#modalNotifContent").text("Gambar Gagal Dihapus");
                  $("#modal-notif").modal("show");
                  setTimeout(function(){
                    $("#modal-notif").modal("hide");
                    $("#modal-notif").removeClass("modal-danger");
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
              }
            });
          }
        }

        function verifikasiPassowordLama(param){
          setTimeout(function(){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/getVerifikasiPasswordLama'); ?>",
              dataType : "TEXT",
              data : {passwordLama:param.value},
              success : function(response){
                if($.trim(response) === "TRUE"){
                  $("#indikatorPasswordLama").removeClass("has-error").addClass("has-success");
                  $("#iconIndikatorPasswordLama").removeClass("fa-remove").addClass("fa-check");
                  $("#indikatorPasswordLama").css({"float":"left","display":"block"});
                }else if($.trim(response) === "FALSE"){
                  $("#indikatorPasswordLama").removeClass("has-success").addClass("has-error");
                  $("#iconIndikatorPasswordLama").removeClass("fa-check").addClass("fa-remove");
                  $("#indikatorPasswordLama").css({"float":"left","display":"block"});
                }else{
                  $("#indikatorPasswordLama").css({"float":"left","display":"none"});
                }
              },
              error : function(response){
                alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
              }
            });
          },1000);
        }

        function konfirmasiPassword(param){
          setTimeout(function(){
            var passwordBaru = $("#txtNewPass").val();
            if(param.value == passwordBaru){
              $("#indikatorKonfirmasiPassword").removeClass("has-error").addClass("has-success");
              $("#iconIndikatorKonfirmasiPassword").removeClass("fa-remove").addClass("fa-check");
              $("#indikatorKonfirmasiPassword").css({"float":"left","display":"block"});
            }else{
              $("#indikatorKonfirmasiPassword").removeClass("has-success").addClass("has-error");
              $("#iconIndikatorKonfirmasiPassword").removeClass("fa-check").addClass("fa-remove");
              $("#indikatorKonfirmasiPassword").css({"float":"left","display":"block"});
            }
          },1000);
        }

        function changePassword(){
          var passwordBaru = $("#txtNewPass").val();
          var konfirmasiPasswordBaru = $("#txtConfirmPass").val();
          if(passwordBaru == "" || konfirmasiPasswordBaru == ""){
            alert("Kolom Kata Sandi Baru Dan Konfirmasi Kata Sandi Tidak Boleh Kosong!");
          }else{
            if(konfirmasiPasswordBaru == passwordBaru){
              $.ajax({
                type : "POST",
                url : "<?php echo base_url('_marketing/main/changePassword'); ?>",
                dataType : "TEXT",
                data : {
                  passwordBaru : passwordBaru
                },
                success : function(response){
                  if($.trim(response) === "Berhasil"){
                    $("#alertChangePass").removeClass("alert-danger").addClass("alert-success").text("Kata Sandi Berhasil Diubah").css("display","block");
                    setTimeout(function(){
                      $("#alertChangePass").css("display","block");
                    },2000);
                    setTimeout(function(){
                      window.location = "<?php echo base_url('_main/main/logout'); ?>";
                    },1000);
                  }else{
                    $("#alertChangePass").removeClass("alert-success").addClass("alert-danger").text("Kata Sandi Gagal Diubah").css("display","block");
                    setTimeout(function(){
                      $("#alertChangePass").css("display","block");
                    },2000);
                    setTimeout(function(){
                      window.location = "<?php echo base_url('_main/main/logout'); ?>";
                    },1000);
                  }
                }
              });
            }else{

            }
          }
        }
      </script>
<!--===============================================On Load External Modal Function (Finish) ===============================================-->

<!--===============================================General Function (Start) ===============================================-->
      <script>
        function showModalNoteProductServiceJson(id){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url(); ?>_marketing/main/show_product_service_note_json/",
            dataType : "JSON",
            data : {id_sp : id},
            success : function(response){
              $("#json-wrapper").html(response[0].note);
            }
          });
        }

        function removePaymentCustom(){
          var id = $("#close").data("id");
          var idSelector = "#"+$("#close").data("id");
          $(idSelector).remove();
          $("#close").remove();
          $("#payment-wrapper").html(
          '<select class="form-control" name="cmb-payment" onchange="changePaymentCustom(this)" id="'+id+'" required style="width: 180px; float:left; margin-right:5px;">'+
            '<option value="">--Pilih Term Payment--</option>'+
            '<option value="Cash 2%">Cash 2%</option>'+
            '<option value="Cash 3%">Cash 3%</option>'+
            '<option value="Cash 4%">Cash 4%</option>'+
            '<option value="Cash 5%">Cash 5%</option>'+
            '<option value="Cash TD">Cash TD</option>'+
            '<option value="COD">COD</option>'+
            '<option value="COD + Cash 2%">COD + Cash 2%</option>'+
            '<option value="Disc 2% Tdk Tercantum">Disc 2% Tdk Tercantum</option>'+
            '<option value="Disc 2% Tdk Tercantum + KU dulu">Disc 2% Tdk Tercantum + KU dulu</option>'+
            '<option value="Disc 2% Tercantum">Disc 2% Tercantum</option>'+
            '<option value="Disc 2% Tercantum + KU dulu">Disc 2% Tercantum + KU dulu</option>'+
            '<option value="Disc 3% Tdk Tercantum">Disc 3% Tdk Tercantum</option>'+
            '<option value="Disc 3% Tdk Tercantum + KU dulu">Disc 3% Tdk Tercantum + KU dulu</option>'+
            '<option value="Disc 3% Tercantum">Disc 3% Tercantum</option>'+
            '<option value="Disc 3% Tercantum + KU dulu">Disc 3% Tercantum + KU dulu</option>'+
            '<option value="DP">DP</option>'+
            '<option value="DP + KU DULU">DP + KU DULU</option>'+
            '<option value="KU Dulu">KU Dulu</option>'+
            '<option value="Potong 1000">Potong 1000</option>'+
            '<option value="Potong 500">Potong 500</option>'+
            '<option value="Tempo 1 Bulan">Tempo 1 Bulan</option>'+
            '<option value="Tempo 14 Hari">Tempo 14 Hari</option>'+
            '<option value="Tempo 2 Minggu">Tempo 2 Minggu</option>'+
            '<option value="Tempo 40 Hari">Tempo 40 Hari</option>'+
            '<option value="Tempo 7 Hari">Tempo 7 Hari</option>'+
            '<option value="Custom">Custom</option>'+
          '</select>');
        }

        function changePaymentCustom(e){
          if(e.value == "Custom"){
            $("#"+e.id).remove();
            $("#payment-wrapper").html(
              '<div class="input-group" style="width: 200px; float:left; margin-right:5px;">'+
              '<input type="text" class="form-control" name="cmb-payment" id="'+e.id+'" style="width: 180px; float:left;">'+
              '<button type="button" class="close" id="close" aria-label="Close" data-id="'+e.id+'" onclick="removePaymentCustom()" style="margin-right:5px">'+
              '<span aria-hidden="true">&times;</span></button>'+
              '</div>'
            );
          }
        }

        function lihatDetailPesanan(param){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url(); ?>_marketing/main/getLihatPesanan",
            dataType : "JSON",
            data : {no_order : param},
            success : function(response){
              $("#td_no_order").text(response[0].no_order);
              $("#td_nm_perusahaan").text(response[0].nm_perusahaan);
              $("#td_nm_owner").text(response[0].nm_owner);
              $("#td_nm_pemesan").text(response[0].nm_pemesan);
              $("#td_nm_purchasing").text(response[0].nm_purchasing);
              $("#td_tgl_pesan").text(response[0].tgl_pesan);
              $("#td_tgl_estimasi").text(response[0].tgl_estimasi);
              $("#td_term_payment").text(response[0].payment_method);
              $("#td_proof").text(response[0].proof);
              $("#td_expedisi").text(response[0].expedisi);
              $("#paragraf-note").html(response[0].note);
              $("#last-update").text("Last Update : "+response[0].diperbarui);

              $("#tabel-lihat-pesanan-detail").dataTable().fnDestroy();
              $("#tabel-lihat-pesanan-detail").dataTable({
                // "fixedHeader" : true,
                "bProcessing" : true,
                "bServerSide" : true,
                "autoWidth" : false,
                "bScrollCollapse" : true,
                "sAjaxSource" : "<?php echo base_url(); ?>_marketing/main/getLihatPesananDetail?no_order="+param,
                "columns" : [
                  {"data":"jumlah","name":"DP.jumlah"},
                  {"data":"sisa","name":"(DP.jumlah - DP.jumlah_kirim)"},
                  {"data":"ukuran","name":"GH.ukuran"},
                  {"data":"harga","name":"DP.harga"},
                  {"data":"merek","name":"DP.merek"},
                  {"data":"warna_plastik","name":"GH.warna_plastik"},
                  {"data":"warna_cetak","name":"DP.warna_cetak"},
                  {"data":"sm","name":"DP.sm"},
                  {"data":"dll","name":"DP.dll"},
                  {"data":"kd_hrg","name":"DP.kd_hrg"},
                  {"data":"omset_kg","name":"DP.omset_kg"},
                  {"data":"omset_lembar","name":"DP.omset_lembar"},
                  {"data":"sts_pesanan","name":"DP.sts_pesanan"},
                  {"data":"sts_kirim","name":"DP.sts_kirim"}
                ],
                "sPaginationType": "full_numbers",
                "iDisplayStart ": 20,
                "fnServerData": function (sSource, aoData, fnCallback){
                  $.ajax({
                           "dataType": "json",
                           "type": "POST",
                           "url": sSource,
                           "data": aoData,
                           "success": fnCallback
                       });
                },
                "order": [
                          [0, "DESC"]
                        ],
                "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                  $("td:eq(0)",nRow).text(parseFloat(aData["jumlah"]).toLocaleString()+" "+aData["satuan"]);
                  $("td:eq(1)",nRow).text(parseFloat(aData["sisa"]).toLocaleString()+" "+aData["satuan"]);
                  $("td:eq(3)",nRow).text(aData["mata_uang"]+" "+aData["harga"]);
                  $("td:eq(10)",nRow).text(parseFloat(aData["omset_kg"]).toLocaleString());
                  $("td:eq(11)",nRow).text(parseFloat(aData["omset_lembar"]).toLocaleString());
                }
              });
            }
          });
        }

        function showModalEditPesananDetailTemp(id){
          var id_dp = id;
          $("#txt_harga1").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_omset_kg1").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_omset_lembar1").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_jumlah1").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_potongan1").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_hsl_diskon1").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#cmb_ukuran1").select2({
            placeholder : "Pilih Ukuran",
            dropdownParent: $('#edit-modal-pesanan-detail-temp'),
            width : "100%",
            allowClear : true,
            ajax:{
              url : "<?php echo base_url() ?>_marketing/main/getGudangHasilLike",
              dataType : "json",
              delay : 250,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    if(item.jenis == "MINYAK" || item.jenis == "CAT MURNI"){
                      return{
                        text:item.nm_barang +" - "+ item.warna +" - "+ item.status +" - "+ item.jenis,
                        id:item.kd_gd_bahan
                      }
                    }else{
                      return{
                        text:item.ukuran +" - "+ item.warna_plastik +" - "+ item.tebal +" - "+ item.merek +" - "+ item.jns_permintaan +" - "+ item.jns_brg,
                        id:item.kd_gd_hasil
                      }
                    }
                  })
                };
              },
              cache : true

            }
          });
          $.ajax({
            type : "POST",
            url : "<?php echo base_url(); ?>_marketing/main/getModifyPesananDetailTempModal",
            dataType : "JSON",
            data : {id_dp : id_dp},
            success : function(response){
              $("#txt_jumlah1").val(response[0].jumlah);
              $("#cmb_satuan1").val(response[0].satuan);
              $("#txt_harga1").val(response[0].harga);
              if(response[0].mata_uang == "Rp."){
                 $('#rb_1').iCheck('check');
                 $('#rb_1').attr("checked","checked");
              }else{
                $('#rb_2').iCheck('check');
                $('#rb_2').attr("checked","checked");
              }
              $("#id_dp").val(response[0].id_dp);
              $("#txt_warna_cetak1").val(response[0].warna_cetak);
              $("#txt_dll1").val(response[0].dll);
              $("#txt_strip1").val(response[0].sm);
              $("#txt_kd_hrg1").val(response[0].kd_hrg);
              $("#txt_omset_kg1").val(response[0].omset_kg);
              $("#txt_omset_lembar1").val(response[0].omset_lembar);
              $("#txt_potongan1").val(response[0].potongan);
              $("#txt_hsl_diskon1").val(response[0].diskon);
              $("#txt_cn1").val(response[0].cn);
              $("#txt_merek1").val(response[0].merek);
            }
          });
        }

        function showModalEditPesananDetail(id){
          var id_dp = id;
          $("#txt_harga1_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_omset_kg1_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_omset_lembar1_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_jumlah1_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_potongan1_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $("#txt_hsl_diskon1_edit").inputmask("decimal",{rightAlign: false,radixPoint: ".",groupSeparator: ",",digits: 2,autoGroup: true});
          $.ajax({
            type : "POST",
            url : "<?php echo base_url(); ?>_marketing/main/getModifyPesananDetailModal",
            dataType : "JSON",
            data : {id_dp : id_dp},
            success : function(response){
              $("#cmb_ukuran1_edit").select2({
                placeholder : "Pilih Ukuran",
                dropdownParent: $('#edit-modal-pesanan-detail'),
                width : "100%",
                allowClear : true,
                ajax:{
                  url : "<?php echo base_url() ?>_marketing/main/getGudangHasilLike",
                  dataType : "json",
                  delay : 250,
                  processResults: function(data){
                    return{
                      results : $.map(data, function(item){
                        if(item.jenis == "MINYAK" || item.jenis == "CAT MURNI"){
                          return{
                            text:item.nm_barang +" - "+ item.warna +" - "+ item.status +" - "+ item.jenis,
                            id:item.kd_gd_bahan
                          }
                        }else{
                          return{
                            text:item.ukuran +" - "+ item.warna_plastik +" - "+ item.tebal +" - "+ item.merek +" - "+ item.jns_permintaan +" - "+ item.jns_brg,
                            id:item.kd_gd_hasil
                          }
                        }
                      })
                    };
                  }
                },
                cache : true,
              });
              $("#txt_jumlah1_edit").val(response[0].jumlah);
              $("#cmb_satuan1_edit").val(response[0].satuan);
              $("#txt_harga1_edit").val(response[0].harga);
              if(response[0].mata_uang == "Rp."){
                 $('#rb_1_edit').iCheck('check');
                 $('#rb_1_edit').attr("checked","checked");
              }else{
                $('#rb_2_edit').iCheck('check');
                $('#rb_2_edit').attr("checked","checked");
              }
              $("#id_dp_edit").val(response[0].id_dp);
              $("#txt_warna_cetak1_edit").val(response[0].warna_cetak);
              $("#txt_dll1_edit").val(response[0].dll);
              $("#txt_strip1_edit").val(response[0].sm);
              $("#txt_kd_hrg1_edit").val(response[0].kd_hrg);
              $("#txt_omset_kg1_edit").val(response[0].omset_kg);
              $("#txt_omset_lembar1_edit").val(response[0].omset_lembar);
              $("#txt_potongan1_edit").val(response[0].potongan);
              $("#txt_hsl_diskon1_edit").val(response[0].diskon);
              $("#txt_cn1_edit").val(response[0].cn);
              $("#txt_merek1_edit").val(response[0].merek);
            }
          });
        }

        function jnsCust(){
          var jenis = document.getElementById('jenis').value;
          var kd_cust = document.getElementById('txt_no_cust').value;
          var hasil = kd_cust+jenis;
          if(kd_cust.substring(12,kd_cust.length)=="XX"){
            document.getElementById('txt_no_cust').value=kd_cust.replace("XX",jenis);
          }else{
            document.getElementById('txt_no_cust').value=kd_cust.replace(kd_cust.substring(12,kd_cust.length),jenis);
          }
        }

        function deleteProductService(id){
          if (confirm("Yakin Ingin Menghapus?")) {
            var id = id;
            var kd_cust = "<?php echo $this->uri->rsegment(3); ?>";
            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/removeProductService",
              dataType : "text",
              data : {
                id_sp   : id,
                kd_cust : kd_cust
              },
              success : function(response){
                if(jQuery.trim(response) === "Berhasil"){
                  alert("Data Berhasil Dihapus");
                  location.reload();
                }else{
                  alert("Data Gagal Dihapus");
                  location.reload();
                }
              }
            });
          }else{
            alert(id + "Tidak Terhapus");
            location.reload();
          }
        }

        function discount(h,pM,hsl){
          var HtmlHarga = "#"+h.id;
          var HtmlPm = "#"+pM;
          var HtmlHsl = "#"+hsl;
          var harga_item = $(HtmlHarga).val().replace(/,/g , "");
          var payment_method = $(HtmlPm).val();
          if(payment_method == ""){
            alert("Pilih Term Payment Terlebih Dahulu");
          }else{
            switch (payment_method) {
              case 'Cash 2%': $(HtmlHsl).val(0.02 * harga_item);break;
              case 'Cash 3%': $(HtmlHsl).val(0.03 * harga_item);break;
              case 'Cash 4%': $(HtmlHsl).val(0.04 * harga_item);break;
              case 'Cash 5%': $(HtmlHsl).val(0.05 * harga_item);break;
              case 'COD + Cash 2%': $(HtmlHsl).val(0.02 * harga_item);break;
              case 'Disc 2% Tdk Tercantum': $(HtmlHsl).val(0.02 * harga_item);break;
              case 'Disc 2% Tdk Tercantum + KU dulu': $(HtmlHsl).val(0.02 * harga_item);break;
              case 'Disc 2% Tercantum': $(HtmlHsl).val(0.02 * harga_item);break;
              case 'Disc 2% Tercantum + KU dulu': $(HtmlHsl).val(0.02 * harga_item);break;
              case 'Disc 3% Tdk Tercantum': $(HtmlHsl).val(0.03 * harga_item);break;
              case 'Disc 3% Tdk Tercantum + KU dulu': $(HtmlHsl).val(0.03 * harga_item);break;
              case 'Disc 3% Tercantum': $(HtmlHsl).val(0.03 * harga_item);break;
              case 'Disc 3% Tercantum + KU dulu': $(HtmlHsl).val(0.03 * harga_item);break;
              break;
              default:
            }
          }
        }

        function deletePesananDetailTemp(id){
          var no_order1 = $("#txt_no_order").val();
          var kd_cust = $("#txt_kd_cust").val();
          if (confirm("Yakin Ingin Menghapus?")) {
            var id = id;
            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/removePesananDetailTemp",
              dataType : "text",
              data : {id : id},
              success : function(response){
                if(jQuery.trim(response) === "Berhasil"){
                  $("#notif-detail-pesanan").html("<div class='alert alert-info fade in' role='alert'><b>Item Pesanan Berhasil Dihapus</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2500);
                  $("#pesanan-detail-tbody").load("<?php echo base_url(); ?>_marketing/main/getPesananDetailsTemp/"+no_order1+"/"+kd_cust);
                }else{
                  $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Item Pesanan Gagal Dihapus</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2500);
                  $("#pesanan-detail-tbody").load("<?php echo base_url(); ?>_marketing/main/getPesananDetailsTemp/"+no_order1+"/"+kd_cust);
                }
              }
            });
          }else{
            $("#notif-detail-pesanan").html("<div class='alert alert-info fade in' role='alert'><b>Item Pesanan Tidak Jadi Dihapus</b></div>");
            setTimeout(function(){
              $(".alert").alert("close");
            },2500);
            $("#pesanan-detail-tbody").load("<?php echo base_url(); ?>_marketing/main/getPesananDetailsTemp/"+no_order1+"/"+kd_cust);
          }
        }

        function deletePesananDetail(id){
          var no_order1 = $("#txt_no_order_edit").val();
          if (confirm("Yakin Ingin Menghapus?")) {
            var id = id;
            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/removePesananDetail",
              dataType : "text",
              data : {id : id},
              success : function(response){
                if(jQuery.trim(response) === "Berhasil"){
                  $("#notif-detail-pesanan").html("<div class='alert alert-info fade in' role='alert'><b>Item Pesanan Berhasil Dihapus</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2500);
                  $("#pesanan-detail-tbody-edit").load("<?php echo base_url(); ?>_marketing/main/getPesananDetails/" + no_order1);
                }else{
                  $("#notif-detail-pesanan").html("<div class='alert alert-danger fade in' role='alert'><b>Item Pesanan Gagal Dihapus</b></div>");
                  setTimeout(function(){
                    $(".alert").alert("close");
                  },2500);
                  $("#pesanan-detail-tbody-edit").load("<?php echo base_url(); ?>_marketing/main/getPesananDetails/" + no_order1);
                }
              }
            });
          }else{
            $("#notif-detail-pesanan").html("<div class='alert alert-info fade in' role='alert'><b>Item Pesanan Tidak Jadi Dihapus</b></div>");
            setTimeout(function(){
              $(".alert").alert("close");
            },2500);
            $("#pesanan-detail-tbody-edit").load("<?php echo base_url(); ?>_marketing/main/getPesananDetails/" + no_order1);
          }
        }

        function trashPesanan(id){
          if(confirm("Apakah Pesanan Ini Akan Dihapus?")){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/trashPesanan",
              dataType : "text",
              data : {id:id},
              success:function(response){
                if(jQuery.trim(response)==="Delete Berhasil"){
                  alert("Pesanan Terhapus");
                  location.reload();
                }else if(jQuery.trim(response)==="Gagal Delete Item Pesanan"){
                  alert("Gagal Delete Item Pesanan");
                  location.reload();
                }else{
                  alert("Gagal Delete Pesanan");
                  location.reload();
                }
              }
            });
          }else{
            location.reload();
          }
        }

        function restorePesananTrash(){
          var id = $(".btn-restore").data("id");
          if(confirm("Apakah pesanan ini akan dipulihkan?")){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url(); ?>_marketing/main/updatePulihkanPesananTrash",
              dataType : "text",
              data : {no_order:id},
              success : function(response){
                if(jQuery.trim(response) === "Pesanan Berhasil Dipulihkan"){
                  $("#table-trash").dataTable().fnDestroy();
                  $("#table-trash").dataTable({
                    // "fixedHeader" : true,
                    "bProcessing" : true,
                    "bServerSide" : true,
                    "autoWidth" : false,
                    "sAjaxSource" : "<?php echo base_url(); ?>_marketing/main/getPesananTrash",
                    "columns" : [
                      {"data":"no_order","name":"P.no_order"},
                      {"data":"nm_perusahaan","name":"C.nm_perusahaan"},
                      {"data":"nm_pemesan","name":"P.nm_pemesan"},
                      {"data":"diperbarui","name":"P.diperbarui"},
                      {"data":"no_order","name":"P.no_order"}
                    ],
                    "sPaginationType": "full_numbers",
                    "iDisplayStart ": 20,
                    "fnServerData": function (sSource, aoData, fnCallback){
                      $.ajax({
                               "dataType": "json",
                               "type": "POST",
                               "url": sSource,
                               "data": aoData,
                               "success": fnCallback
                           });
                    },
                    "order": [
                              [2, "DESC"]
                            ],
                    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                      $("td:eq(4)",nRow).html('<button class="btn btn-flat btn-sm btn-success btn-restore" onclick="restorePesananTrash()" data-id="'+aData['no_order']+'">Pulihkan</button>'+
                                              '<a href="#" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modal-lihat-detail-pesanan" onclick=lihatDetailPesanan("'+aData['no_order']+'")>Lihat Detail</a>');
                    }
                  });
                }else{
                  $("#table-trash").dataTable().fnDestroy();
                  $("#table-trash").dataTable({
                    // "fixedHeader" : true,
                    "bProcessing" : true,
                    "bServerSide" : true,
                    "autoWidth" : false,
                    "sAjaxSource" : "<?php echo base_url(); ?>_marketing/main/getPesananTrash",
                    "columns" : [
                      {"data":"no_order","name":"P.no_order"},
                      {"data":"nm_perusahaan","name":"C.nm_perusahaan"},
                      {"data":"nm_pemesan","name":"P.nm_pemesan"},
                      {"data":"diperbarui","name":"P.diperbarui"},
                      {"data":"no_order","name":"P.no_order"}
                    ],
                    "sPaginationType": "full_numbers",
                    "iDisplayStart ": 20,
                    "fnServerData": function (sSource, aoData, fnCallback){
                      $.ajax({
                               "dataType": "json",
                               "type": "POST",
                               "url": sSource,
                               "data": aoData,
                               "success": fnCallback
                           });
                    },
                    "order": [
                              [2, "DESC"]
                            ],
                    "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                      $("td:eq(4)",nRow).html('<button class="btn btn-flat btn-sm btn-success btn-restore" onclick="restorePesananTrash()" data-id="'+aData['no_order']+'">Pulihkan</button>'+
                                              '<a href="#" class="btn btn-md btn-flat btn-primary" data-toggle="modal" data-target="#modal-lihat-detail-pesanan" onclick=lihatDetailPesanan("'+aData['no_order']+'")>Lihat Detail</a>');
                    }
                  });
                }
              }
            });
          }
        }

        function print_out(no_order){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url(); ?>_marketing/main/getCheckApproveUserNoOrder",
            dataType : "JSON",
            data : {no_order : no_order},
            success : function(response){
              if(response.Approved== "TRUE"){
                $("#btn-approve").attr("disabled","disabled");
              }else{
                $("#btn-approve").removeAttr("disabled");
                $("#btn-approve").attr("onclick","approve_print_out('"+no_order+"')");
              }
              $("#btn-note").attr("href","<?php echo base_url(); ?>_marketing/main/show_customer_note/"+response.Kd_cust);
              $("#btn-produk-servis").attr("onclick","showProductServiceModal('"+response.Kd_cust+"')");
              $("#btnShowHistory").attr("onclick","showHistoryOrder('"+response.Kd_cust+"')");
            }
          });
          $("#cetakFakturLoad").removeAttr("src");
          $("#cetakFakturLoad").attr("src","<?php echo base_url(); ?>_marketing/main/cetakFakturPesanan/"+no_order);
          $("#print-out").modal("show");
        }

        function print_out_produksi(no_order){
          $("#cetakFakturLoad").removeAttr("src");
          $("#cetakFakturLoad").attr("src","<?php echo base_url(); ?>_marketing/main/cetakFakturPesananProduksi/"+no_order);
        }

        function approve_print_out(no_order){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url(); ?>_marketing/main/saveApproveUserNoOrder",
            dataType : "text",
            data : {no_order : no_order},
            success : function(response){
              if(jQuery.trim(response) == "Berhasil"){
                $("#notif").html("<div class='alert alert-success'><b>Pesanan Berhasil DiSetujui</b></div>");
                setTimeout(function(){
                  $(".alert").alert("close");
                },2500);
                location.reload();
              }else if(jQuery.trim(response) == "Gagal"){
                $("#notif").html("<div class='alert alert-warning'><b>Pesanan Gagal DiSetujui</b></div>");
                setTimeout(function(){
                  $(".alert").alert("close");
                },2500);
              }else{
                $("#notif").html("<div class='alert alert-danger'><b>Fungsi Approve Error</b></div>");
                setTimeout(function(){
                  $(".alert").alert("close");
                },2500);
                location.reload();
              }
            }
          });
        }

        function showProductServiceModal(kd_cust){
          $("#produk-service-table").load("<?php echo base_url(); ?>_marketing/main/show_product_service/"+kd_cust);
        }

        function showHistoryOrder(kd_cust){
          var id = kd_cust;
          $("#history-table").dataTable().fnDestroy();
          $('#history-table').dataTable({
            // "fixedHeader" : true,
            "bProcessing" : true,
            "bServerSide" : true,
            "autoWidth": false,
            "responsive" : true,
            // "scrollX" : "100%",
            // "scrollY" : "350px",
            "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getHistoryOrderJson?kd_cust="+id,
            "columns":[
              {"data":"tgl_pesan","name":"P.tgl_pesan"},
              {"data":"tgl_estimasi","name":"P.tgl_estimasi"},
              {"data":"kd_cust","name":"P.kd_cust"},
              {"data":"nm_owner","name":"C.nm_owner"},
              {"data":"nm_purchasing","name":"C.nm_purchasing"},
              {"data":"jumlah","name":"PD.jumlah"},
              {"data":"ukuran","name":"GH.ukuran"},
              {"data":"payment_method","name":"P.payment_method"},
              {"data":"harga","name":"PD.harga"},
              {"data":"merek","name":"PD.merek"},
              {"data":"warna_plastik","name":"GH.warna_plastik"},
              {"data":"warna_cetak","name":"PD.warna_cetak"},
              {"data":"sm","name":"PD.sm"},
              {"data":"dll","name":"PD.dll"},
              {"data":"kd_hrg","name":"PD.kd_hrg"},
              {"data":"omset_kg","name":"PD.omset_kg"},
              {"data":"omset_lembar","name":"PD.omset_lembar"},
              {"data":"no_order","name":"PD.no_order"}
            ],
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 10,
            "fnServerData": function (sSource, aoData, fnCallback){
              $.ajax({
                       "dataType": "json",
                       "type": "POST",
                       "url": sSource,
                       "data": aoData,
                       "success": fnCallback
                   });
            },
            "fnRowCallback": function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
              var jumlah = parseFloat(AvData["jumlah"]).toLocaleString();
              var harga = parseFloat(AvData["harga"]).toLocaleString();
              $("td:eq(5)",AvRow).text(jumlah + " " + AvData["satuan"]);
              $("td:eq(8)",AvRow).text(harga);
              $("td:eq(15)",AvRow).text(parseFloat(AvData["omset_kg"]).toLocaleString());
              $("td:eq(16)",AvRow).text(parseFloat(AvData["omset_lembar"]).toLocaleString());
              $("td:eq(17)",AvRow).html("<button class='btn btn-md btn-flat btn-primary' onclick=modalLihatNotePesanan('"+AvData["no_order"]+"')>Lihat Note</button>");
            }
          });

          $("#history-table-lama").dataTable().fnDestroy();
              $('#history-table-lama').dataTable({
                // "fixedHeader" : true,
                "bProcessing" : true,
                "bServerSide" : true,
                "autoWidth": false,
                "responsive" : true,
                // "scrollY" : "500px",
                // "scrollX" : "100%",
                "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getHistoryOrderJsonLama",
                "columns":[
                  {"data":"tgl_pesan","name":"P.tgl_pesan"},
                  {"data":"tgl_estimasi","name":"P.tgl_estimasi"},
                  {"data":"kd_customer","name":"P.kd_customer"},
                  {"data":"nm_owner","name":"C.nm_owner"},
                  {"data":"nm_purchasing","name":"C.nm_purchasing"},
                  {"data":"jumlah","name":"PD.jumlah"},
                  {"data":"ukuran","name":"GH.ukuran"},
                  {"data":"term_payment","name":"P.term_payment"},
                  {"data":"harga","name":"PD.harga"},
                  {"data":"merek","name":"PD.merek"},
                  {"data":"warna_plastik","name":"GH.warna_plastik"},
                  {"data":"cetak","name":"PD.cetak"},
                  {"data":"sm","name":"PD.sm"},
                  {"data":"dll","name":"PD.dll"},
                  {"data":"kd_harga","name":"PD.kd_harga"},
                  {"data":"omset","name":"PD.omset"},
                  {"data":"omset_per_lembar","name":"PD.omset_per_lembar"},
                  {"data":"no_order","name":"PD.no_order"}
                ],
                "sPaginationType": "full_numbers",
                "iDisplayStart ": 10,
                "fnServerData": function (sSource, aoData, fnCallback){
                  aoData.push({"name":"kdCust","value":id});
                  $.ajax({
                           "dataType": "json",
                           "type": "POST",
                           "url": sSource,
                           "data": aoData,
                           "success": fnCallback
                       });
                },
                "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
                  var jumlah = parseFloat(AvData["jumlah"]).toLocaleString();
                  var harga = parseFloat(AvData["harga"]).toLocaleString();
                  $("td:eq(5)",AvRow).text(jumlah + " " + AvData["satuan"]);
                  $("td:eq(8)",AvRow).text(harga + " ");
                  if(AvData["omset_per_lembar"] == ""){
                    var omsetLembar = 0;
                  }else{
                    var omsetLembar = parseFloat(AvData["omset_per_lembar"]).toLocaleString();
                  }
                  $("td:eq(15)",AvRow).text(parseFloat(AvData["omset"]).toLocaleString());
                  $("td:eq(16)",AvRow).text(omsetLembar);
                  $("td:eq(17)",AvRow).html("<button class='btn btn-md btn-flat btn-primary' onclick=modalLihatNotePesananLama('"+AvData["no_order"]+"')>Lihat Note Pesanan</button>")
                }
              });
        }

        function lihatDetailCustomer(kd_cust){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url(); ?>_marketing/main/getCustomerDetailJson",
            dataType : "JSON",
            data : {kd_cust : kd_cust},
            success : function(response){
              $("#td_kd_cust").text(response[0].kd_cust);
              $("#td_nm_perusahaan1").text(response[0].nm_perusahaan);
              $("#td_nm_owner1").text(response[0].nm_owner);
              $("#td_nm_purchasing1").text(response[0].nm_purchasing+"( "+response[0].hp_purchasing+" )");
              $("#td_no_telp").text(response[0].tlp_kantor+" / "+response[0].tlp_lainnya);
              $("#td_alamat").html(response[0].alamat+" / "+response[0].alamat_lainnya);
              $("#td_kota_prov_negara").text(response[0].kota+" / "+response[0].provinsi+" / "+response[0].negara);
              $("#td_kd_pos").text(response[0].kode_pos);
              $("#td_no_fax").text(response[0].no_fax);
              $("#td_email").text(response[0].email+" / "+response[0].email_lainnya);
              $("#td_website").text(response[0].website);
              $("#td_note").html(response[0].note);

              $("#table-product-service").dataTable().fnDestroy();
              $("#table-product-service").dataTable({
                // "fixedHeader" : true,
                "bProcessing" : true,
                "bServerSide" : true,
                "autoWidth": false,
                "responsive" : true,
                "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getProductServiceJson?kd_cust="+response[0].kd_cust,
                "columns":[
                  {"data":"servis_produk","name":"PS.servis_produk"},
                  {"data":"ukuran","name":"PS.ukuran"},
                  {"data":"harga","name":"PS.harga"},
                  {"data":"term_payment","name":"term_payment"},
                  {"data":"merek","name":"PS.merek"},
                  {"data":"foto","name":"PS.foto"},
                  {"data":"id_sp","name":"PS.id_sp"}
                ],
                "sPaginationType": "full_numbers",
                "iDisplayStart ": 20,
                "fnServerData": function (sSource, aoData, fnCallback){
                  $.ajax({
                           "dataType": "json",
                           "type": "POST",
                           "url": sSource,
                           "data": aoData,
                           "success": fnCallback
                       });
                },
                "fnRowCallback" : function (nRow,aData,iDisplayIndex,iDisplayIndexFull){
                  $("td:eq(6)",nRow).html("<button class='btn btn-sm btn-flat btn-info' onclick=lihatNoteProdukServis('"+aData['id_sp']+"') data-toggle='modal' data-target='#modal-note'><span clas='fa fa-sticky-note-o'></span> Note</button>");
                }
              });
            }
          });
        }

        function lihatNoteProdukServis(id_sp){
          $.ajax({
            type : "GET",
            url : "<?php echo base_url(); ?>_marketing/main/getProdukServisNoteJson",
            dataType : "JSON",
            data : {id_sp : id_sp},
            success : function(response){
              $("#note-wrapper").html(response[0].note);
            }
          });
        }

        function reloadCounterOrderDeadline(){
          $.ajax({
            url : "<?php echo base_url('_marketing/main/getCountOrderDeadline'); ?>",
            dataType : "JSON",
            success : function(response){
              $("#countOrder").text(parseFloat(response.Counter) + parseFloat(response.CounterBirthday));
              $("#notif-header").text("Anda memiliki total "+response.Counter+" notifikasi");
              $("#outOfDeadlineOrder").html("<i class='fa fa-warning text-red'></i> "+response.Counter+" Order Melewati Tanggal Estimasi");
              $("#birthdayNotif").html("<i class='fa fa-birthday-cake text-info'></i> "+response.CounterBirthday+" Orang berulang tahun hari ini");
            },
            error : function(response){
              alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
            }
          });
        }

        function editTglEstimasi(param){
          var tglEstimasi1 = $("#txtTglEstimasi").val();
          if(tglEstimasi1==""){
            alert("Kolom Berwarna Kuning Tidak Boleh Kosong!");
          }else{
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/editTglEstimasi'); ?>",
              dataType : "TEXT",
              data : {
                noOrder : param,
                tglEstimasi : tglEstimasi1
              },
              success : function(response){
                if($.trim(response)==="Berhasil"){
                  alert("Tanggal Estimasi Berhasil Di Ubah");
                  $(".active a[aria-controls='tableListPesananLewatTglEstimasi']").trigger("click");
                  $("#modalEditTglEstimasi").modal("hide");
                  $("input").val("");
                  $(".date").datepicker("setDate",null);
                }else if($.trim(response)=="Gagal"){
                  alert("Tanggal Estimasi Gagal Di Ubah");
                }else{
                  alert("Kolom Berwarna Kuning Tidak Boleh Kosong!");
                }
              }
            });
          }
        }
      </script>
<!--===============================================General Function (Finish) ===============================================-->
      <script type="text/javascript">
      //============ Modal Method (Start) ============//
      function modalLihatNotePesanan(param){
        $.ajax({
          type : "POST",
          url : "<?php echo base_url('_marketing/main/getNotePesanan'); ?>",
          dataType : "JSON",
          data : {
            noOrder : param
          },
          success : function(response){
            $("#textNote").html(response[0].note);
            $("#modalLihatNotePesanan").modal("show");
          },
          error : function(response){
            alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
          }
        });
      }

      function modalLihatNotePesananLama(param){
        $.ajax({
          type : "POST",
          url : "<?php echo base_url('_marketing/main/getNotePesananLama'); ?>",
          dataType : "JSON",
          data : {
            noOrder : param
          },
          success : function(response){
            $("#textNote").html(response[0].note);
            $("#modalLihatNotePesanan").modal("show");
          },
          error : function(response){
            alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
          }
        });
      }

      function modalEditTglEstimasi(param){
        $.ajax({
          type : "POST",
          url : "<?php echo base_url('_marketing/main/getTglEstimasi'); ?>",
          dataType : "JSON",
          data : {
            noOrder : param
          },
          success : function(response){
            $("#txtTglEstimasi").val(response[0].tgl_estimasi);
            $("#btnEditTanggal").attr("onclick","editTglEstimasi('"+param+"')");
            $("#modalEditTglEstimasi").modal("show");
          },
          error : function(response){
            alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
          }
        });
      }

      function modalShowOrderDeadline(){
        $("#tableListPesananLewatTglEstimasi").dataTable().fnDestroy();
        $('#tableListPesananLewatTglEstimasi').dataTable({
          // "fixedHeader" : true,
          "bProcessing" : true,
          "bServerSide" : true,
          "autoWidth": false,
          "sPaginationType": "full_numbers",
          "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getOrderDeadline",
          "columns":[
            {"data":"no_order","name":"no_order"},
            {"data":"kd_order","name":"kd_order"},
            {"data":"nm_perusahaan","name":"nm_perusahaan"},
            {"data":"nm_pemesan","name":"nm_pemesan"},
            {"data":"nm_purchasing","name":"nm_purchasing"},
            {"data":"tgl_pesan","name":"tgl_pesan"},
            {"data":"tgl_estimasi","name":"tgl_estimasi"},
            {"data":"sts_pesanan","name":"sts_pesanan"},
            {"data":"approve_1","name":"approve_1"},
            {"data":"approve_2","name":"approve_2"},
            {"data":"approve_3","name":"approve_3"},
            // {"data":"approve_4","name":"approve_4"},
            {"data":"approve_5","name":"nm_perusahaan_update"},
            {"data":"approve_6","name":"nm_purchasing_update"},
            {"data":"no_order","name":"no_order"}
          ],
          "fnServerData": function (sSource, aoData, fnCallback){
            $.ajax({
                     "dataType": "json",
                     "type": "POST",
                     "url": sSource,
                     "data": aoData,
                     "success": fnCallback
                 });
          },
          "order": [
                    [0, "desc"]
                  ],
          "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
            $("td:eq(0)",nRow).html("<a href='#' data-toggle='modal' data-target='#modal-lihat-detail-pesanan' onclick=lihatDetailPesanan('"+aData['no_order']+"') class='bg-blue'>"+aData['no_order']+"</a>");
            var arrTglEstimasi = aData["tgl_estimasi"].split("-");
            var tgl_estimasi = new Date(arrTglEstimasi[2],arrTglEstimasi[1]-1,arrTglEstimasi[0]);
            var date = new Date();
            var month = date.getMonth()+1;
            var day = date.getDate();
            var tgl_sekarang_temp = ((''+day).length<2 ? '0' : '')+ day +'-'+
                                    ((''+month).length<2 ? '0' : '')+ month +'-'+
                                    date.getFullYear();
            var tgl_sekarang = new Date(tgl_sekarang_temp);
            var timeDiff = Math.round(tgl_estimasi.getTime() - tgl_sekarang.getTime());
            var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24));
            if(diffDays <= 2 && diffDays >= 0){
              $('td', nRow).css('background-color', 'rgba(237,234,0,0.7)');
              $('td:eq(13)', nRow).css('background-color', 'transparent');
            }else if(diffDays < 0){
              $('td', nRow).css('background-color', 'rgba(255,0,0,0.7)');
              $('td:eq(13)', nRow).css('background-color', 'transparent');
              $('td', nRow).css('color', '#FFF');
            }else{

            }

            if(aData["approve_1"] == "FALSE"){
              $("td:eq(8)",nRow).text("");
            }else{
              $("td:eq(8)",nRow).html("<i class='fa fa-check'></i>");
            }
            if(aData["approve_2"] == "FALSE"){
              $("td:eq(9)",nRow).text("");
            }else{
              $("td:eq(9)",nRow).html("<i class='fa fa-check'></i>");
            }
            if(aData["approve_3"] == "FALSE"){
              $("td:eq(10)",nRow).text("");
            }else{
              $("td:eq(10)",nRow).html("<i class='fa fa-check'></i>");
            }
            if(aData["approve_5"] == "FALSE"){
              $("td:eq(11)",nRow).text("");
            }else{
              $("td:eq(11)",nRow).html("<i class='fa fa-check'></i>");
            }
            if(aData["approve_6"] == "FALSE"){
              $("td:eq(12)",nRow).text("");
            }else{
              $("td:eq(12)",nRow).html("<i class='fa fa-check'></i>");
            }
            $("td:eq(13)",nRow).html("<button class='btn btn-md btn-flat btn-warning' onclick=modalEditTglEstimasi('"+aData["no_order"]+"')>Ubah Tanggal Estimasi</button>")
            // if(aData["approve_6"] == "FALSE"){
            //   $("td:eq(13)",nRow).text("");
            // }else{
            //   $("td:eq(13)",nRow).html("<i class='fa fa-check'></i>");
            // }
          }
        });
      }

      function tableBirthdayList(){
        $("#tableBirthdayList").dataTable().fnDestroy();
        $("#tableBirthdayList").dataTable({
          "lengthMenu" : [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "pageLength" : -1,
          "ajax" : {
            url : "<?= base_url('_marketing/main/getBirthdayListToday'); ?>",
            dataSrc : "response",
          },
          columns : [
            {data : "kd_cust"},
            {data : "nm_lengkap"},
            {data : "nm_perusahaan"},
            {data : "no_hp"},
            {data : "tgl_lahir"},
            {data : "kd_cust", orderable:false}
          ],
          "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
            $("td:eq(5)", AvRow).html("<input type='checkbox' class='checkData'> &nbsp;"+
                                      "<button class='btn btn-md btn-flat btn-primary' onclick=beriUcapanKhusus('"+AvData['kd_cust']+"') disabled>Beri Ucapan Khusus</button>");
          }
        });
      }
      //============ Modal Method (Finish) ============//

      //============ Save Method (Start) ============//
        function saveCustomerBaru(){
          for (instance in CKEDITOR.instances) {
             CKEDITOR.instances[instance].updateElement();
          }
          var header = $("#header").val();
          var noCust = $("#txt_no_cust").val();
          if(header == "MODIFY"){
            var kdCust = $("#txt_kd_cust_baru").val();
            var nmPerusahaan = $("#txt_nm_perusahaan_baru").val();
            var nmOwner = $("#txt_nm_owner_baru").val();
            var nmPurchasing = $("#txt_nm_purchasing_baru").val();
          }else{
            var kdCust = $("#txt_kd_cust").val();
            var nmPerusahaan = $("#txt_nm_perusahaan").val();
            var nmOwner = $("#txt_nm_owner").val();
            var nmPurchasing = $("#txt_nm_purchasing").val();
          }
          var tglLahirOwner = $("#txt_tgl_lhr_owner").val();
          var tglLahirPurchasing = $("#txt_tgl_lhr_purchasing").val();
          var bidang = $("#cmb_bidang").val();
          var hpOwner = $("#txt_hp_own").val();
          var hpPurchasing = $("#txt_hp_purchasing").val();
          var jnsKelamin = $("input[name='rb_jenkel']:checked").val();
          var jnsKelaminOwner = $("input[name='rb_jenkelOwner']:checked").val();
          var telpPrimary = $("#txt_telp_primary").val();
          var telpSecondary = $("#txt_telp_secondary").val();
          var alamat = CKEDITOR.instances['txt_alamat'].getData();
          var alamatSecondary = CKEDITOR.instances['txt_alamat_second'].getData();
          var negara = $("#cmb_negara").val();
          var provinisi = $("#cmb_provinsi").val();
          var kota = $("#cmb_kota").val();
          var fax = $("#txt_fax").val();
          var kdPos = $("#txt_kd_pos").val();
          var email = $("#txt_email").val();
          var emailSecondary = $("#txt_email_secondary").val();
          var pajak = $("input[name='rb_pajak']:checked").val();
          var web = $("#txt_web").val();
          var note = CKEDITOR.instances['txt_note'].getData();

          if(noCust=="" || nmPerusahaan=="" || bidang=="" || nmPurchasing=="" ||
             hpPurchasing=="" || jnsKelamin=="" || telpPrimary=="" || alamat== ""
            ){
               alert('Gagal,Semua data yang berbintang tidak boleh kosong!');
          }else{
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/saveCustomer'); ?>",
              dataType : "html",
              data : {
                header                : header,
                txt_no_cust           : noCust,
                txt_kd_cust           : kdCust,
                txt_nm_perusahaan     : nmPerusahaan,
                cmb_bidang            : bidang,
                txt_nm_owner          : nmOwner,
                txt_tgl_lhr_owner     : tglLahirOwner,
                txt_tgl_lhr_purchasing: tglLahirPurchasing,
                txt_hp_own            : hpOwner,
                txt_nm_purchasing     : nmPurchasing,
                txt_hp_purchasing     : hpPurchasing,
                rb_jenkel             : jnsKelamin,
                rb_jenkel_owner       : jnsKelaminOwner,
                txt_telp_primary      : telpPrimary,
                txt_telp_secondary    : telpSecondary,
                txt_alamat            : alamat,
                txt_alamat_secondary  : alamatSecondary,
                cmb_negara            : negara,
                cmb_provinsi          : provinisi,
                cmb_kota              : kota,
                txt_fax               : fax,
                txt_kd_pos            : kdPos,
                txt_email             : email,
                txt_email_secondary   : emailSecondary,
                rb_pajak              : pajak,
                txt_web               : web,
                txt_note              : note
              },
              success : function(response){
                $("body").append(response);
                var x = response.replace(/<script>|<\/script>|alert|\(|\)|\'|\;/g,"");
                if($.trim(x) === "Selamat, Data customer baru berhasil diinput"){
                  location.reload();
                }else if($.trim(x) === "Selamat, Data customer berhasil diubah')"){
                  location.reload();
                }
              },
              error : function(response){
                alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
              }
            });
          }
        }

        function cekKodeSales(param){
          var kode = param.value;
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_marketing/main/cekKodeSales'); ?>",
            dataType : "JSON",
            data : {
              kodeSales : kode
            },
            success : function(response){
              if(parseInt(response[0].counter) > 0){
                $("#lblWarning").addClass("in");
                $("#btnSimpan").attr("disabled","disabled");
              }else{
                $("#lblWarning").removeClass("in");
                $("#btnSimpan").removeAttr("disabled");
              }
            }
          })
        }

        function cekKodeJenisBarang(param){
          var kode = param.value;
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_marketing/main/cekKodeJenisBarang'); ?>",
            dataType : "JSON",
            data : {
              kodeJenis : kode
            },
            success : function(response){
              if(parseInt(response[0].counter) > 0){
                $("#lblWarning").addClass("in");
                $("#btnSimpan").attr("disabled","disabled");
              }else{
                $("#lblWarning").removeClass("in");
                $("#btnSimpan").removeAttr("disabled");
              }
            }
          })
        }

        function saveDataSales(){
          var kodeSales = $("#txtKodeSales").val();
          var namaLengkap = $("#txtNamaLengkap").val();
          var gender = $("input[name='rbJenkel']:checked").val();
          var noTelp = $("#txtNoTelp").val();
          var alamat = $("#txtAlamat").val();
          if(kodeSales=="" || namaLengkap=="" || gender=="" || noTelp==""){
            $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
            $("#notifInput").addClass("callout-warning in");
            setTimeout(function(){
              $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
              $("#notifInputText").text("");
            }, 2500);
          }else{
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/saveDataSales'); ?>",
              dataType : "TEXT",
              data : {
                kodeSales : kodeSales,
                namaLengkap : namaLengkap,
                gender : gender,
                noTelp : noTelp,
                alamat : alamat
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Sales Berhasil Ditambahkan");
                  $("#notifInput").addClass("callout-info in");
                  resetFormSales();
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else if($.trim(response) === "Gagal"){
                  $("#notifInputText").text("Data Sales Gagal Ditambahkan");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else{
                  $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
                  $("#notifInput").addClass("callout-warning in");
                  setTimeout(function(){
                    $("#notifInput").alert('close');
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").alert('close');
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function saveDataJenisBarang(){
          var kodeJenis = $("#txtKodeJenis").val();
          var namaJenis = $("#txtNamaJenis").val();
          var keterangan = $("#txtKetJenis").val();
          if(kodeJenis=="" || namaJenis=="" || keterangan==""){
            $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
            $("#notifInput").addClass("callout-warning in");
            setTimeout(function(){
              $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
              $("#notifInputText").text("");
            }, 2500);
          }else{
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/saveDataJenisBarang'); ?>",
              dataType : "TEXT",
              data : {
                kodeJenis : kodeJenis,
                namaJenis : namaJenis,
                keterangan : keterangan
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Jenis Barang Berhasil Ditambahkan");
                  $("#notifInput").addClass("callout-info in");
                  resetFormJenis();
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else if($.trim(response) === "Gagal"){
                  $("#notifInputText").text("Data Jenis Barang Gagal Ditambahkan");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else{
                  $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
                  $("#notifInput").addClass("callout-warning in");
                  setTimeout(function(){
                    $("#notifInput").alert('close');
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").alert('close');
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function saveTransaksiKomisiSales(){
          var kodeSales = $("#cmbKodeSales").val();
          var namaSales = $("#txtNamaSales").val();
          var tglOrder = $("#txtTglOrder").val();
          var namaPelanggan = $("#txtNamaPelanggan").val();
          var kodeOrder = $("#txtKodeOrder").val();
          var kdGdHasil = $("#cmbUkuran").val();
          var jumlahKg = $("#txtJumlahKg").val().replace(/,/g,"");
          var jumlahBal = $("#txtJumlahBal").val().replace(/,/g,"");
          var idJenis = $("#cmbJenisBarang").val();
          var jenisHargaSatuan = $("#cmbJenisHargaSatuan").val();
          var harga = $("#txtHarga").val().replace(/,/g,"");
          var diskon = $("#txtDiscount").val().replace(/,/g,"");
          var hasilDiskon = $("#txtHasilDiscount").val().replace(/,/g,"");
          var potongan = $("#txtPotongan").val().replace(/,/g,"");
          var lembar8 = $("#txtLembar8").val().replace(/,/g,"");
          var lembar5 = $("#txtLembar5").val().replace(/,/g,"");
          var lembar2 = $("#txtLembar2").val().replace(/,/g,"");
          var lembar1 = $("#txtLembar1").val().replace(/,/g,"");
          var lembar05 = $("#txtLembar05").val().replace(/,/g,"");

          if(
              kodeSales == ""     || namaSales == "" || tglOrder == "" ||
              namaPelanggan == "" || kodeOrder == "" || kdGdHasil == ""
          ){
            $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
            $("#notifInput").addClass("callout-warning in");
            setTimeout(function(){
              $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
              $("#notifInputText").text("");
            }, 2500);
          }else{
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/saveTransaksiKomisiSales'); ?>",
              dataType : "TEXT",
              data : {
                idSales         : kodeSales,
                idJenis         : idJenis,
                tglOrder        : tglOrder,
                namaPelanggan   : namaPelanggan,
                kodeOrder       : kodeOrder,
                kdGdHasil       : kdGdHasil,
                jumlahBerat     : jumlahKg,
                jumlahBal       : jumlahBal,
                jenisHarga      : jenisHargaSatuan,
                jumlahHarga     : harga,
                diskonPersen    : diskon,
                hasilDiskon     : hasilDiskon,
                potonganHarga   : potongan,
                lembar8Persen   : lembar8,
                lembar5Persen   : lembar5,
                lembar2Persen   : lembar2,
                lembar1Persen   : lembar1,
                lembar05Persen  : lembar05
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Berhasil Ditambahkan");
                  $("#notifInput").addClass("callout-info in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else if($.trim(response) === "Gagal"){
                  $("#notifInputText").text("Data Gagal Ditambahkan");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else if($.trim(response) === "Lock"){
                  $("#notifInputText").text("Maaf Bulan Ini Sudah Di Kunci, Silahkan Hubungi Marketing Untuk Membuka Kunci");
                  $("#notifInput").addClass("callout-warning in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else{
                  $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
                  $("#notifInput").addClass("callout-warning in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function dataTableDataSales(){
          $("#tableDataSales").dataTable().fnDestroy();
          $("#tableDataSales").dataTable({
            "bProcessing" : true,
            "bServerSide" : true,
            "bJQueryUI" : false,
            "autoWidth" : false,
            "ordering" : false,
            "scrollY" : "400px",
            "sAjaxSource" : "<?php echo base_url('_marketing/main/getDataSales'); ?>",
            "columns" : [
              {"data": "id_sales", "name":"id_sales"},
              {"data": "kode_sales", "name":"kode_sales"},
              {"data": "nama_lengkap", "name":"nama_lengkap"},
              {"data": "gender", "name":"gender"},
              {"data": "no_telp", "name":"no_telp"},
              {"data": "alamat", "name":"alamat"},
              {"data": "id_sales", "name":"id_sales"},
            ],
            "fnServerData" : function(AvUrl, AvData, AvCallBack){
              $.ajax({
                type : "POST",
                url : AvUrl,
                dataType : "JSON",
                data : AvData,
                success : AvCallBack
              });
            },
            "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
              $("td:eq(0)",AvRow).text(++AvDisplayIndex);
              $("td:eq(6)",AvRow).html("<button class='btn btn-sm btn-flat btn-warning' onclick=getDetailSalesEdit('"+AvData["id_sales"]+"')><i class='fa fa-edit'></i> Ubah</button>"+
                                       "<button class='btn btn-sm btn-flat btn-danger' onclick=deleteAndRestoreSales('"+AvData["id_sales"]+"','TRUE')><i class='fa fa-trash'></i> Hapus</button>");
            }
          });
        }

        function dataTableDataJenisBarang(){
          $("#tableDataJenisBarang").dataTable().fnDestroy();
          $("#tableDataJenisBarang").dataTable({
            "bProcessing" : true,
            "bServerSide" : true,
            "bJQueryUI" : false,
            "autoWidth" : false,
            "ordering" : false,
            "scrollY" : "400px",
            "sAjaxSource" : "<?php echo base_url('_marketing/main/getDataJenisBarang'); ?>",
            "columns" : [
              {"data": "id_jenis", "name":"id_jenis"},
              {"data": "kode_jenis", "name":"kode_jenis"},
              {"data": "nama_jenis", "name":"nama_jenis"},
              {"data": "keterangan_jenis", "name":"keterangan_jenis"},
              {"data": "id_jenis", "name":"id_jenis"}
            ],
            "fnServerData" : function(AvUrl, AvData, AvCallBack){
              $.ajax({
                type : "POST",
                url : AvUrl,
                dataType : "JSON",
                data : AvData,
                success : AvCallBack
              });
            },
            "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
              $("td:eq(0)",AvRow).text(++AvDisplayIndex);
              $("td:eq(4)",AvRow).html("<button class='btn btn-sm btn-flat btn-warning' onclick=getDetailJenisBarangEdit('"+AvData["id_jenis"]+"')><i class='fa fa-edit'></i> Ubah</button>"+
                                       "<button class='btn btn-sm btn-flat btn-danger' onclick=deleteAndRestoreJenisBarang('"+AvData["id_jenis"]+"','TRUE')><i class='fa fa-trash'></i> Hapus</button>");
            }
          });
        }

        function dataTableDataOrderSales(){
          var idSales = $("#cmbKodeSales").val();
          $("#tableDataKomisiPending").dataTable().fnDestroy();
          $("#tableDataKomisiPending").dataTable({
            "bProcessing" : true,
            "bServerSide" : true,
            "bJQueryUI" : false,
            "autoWidth" : true,
            "ordering" : false,
            "sAjaxSource" : "<?php echo base_url('_marketing/main/getListDataOrderSalesPending'); ?>",
            "columns" : [
              {"data": "id_transaksi", "name":"TKS.id_transaksi"},
              {"data": "kode_order", "name":"TKS.kode_order"},
              {"data": "tgl_order", "name":"TKS.tgl_order"},
              {"data": "nama_pelanggan", "name":"TKS.nama_pelanggan"},
              {"data": "jumlah_berat", "name":"TKS.jumlah_berat"},
              {"data": "ukuran", "name":"GH.ukuran"},
              {"data": "merek", "name":"GH.merek"},
              {"data": "jumlah_harga", "name":"TKS.jumlah_harga"},
              {"data": "diskon_persen", "name":"TKS.diskon_persen"},
              {"data": "potongan_harga", "name":"TKS.potongan_harga"},
              {"data": "lembar_5_persen", "name":"TKS.lembar_5_persen"},
              {"data": "lembar_2_persen", "name":"TKS.lembar_2_persen"},
              {"data": "lembar_1_persen", "name":"TKS.lembar_1_persen"},
              {"data": "lembar_8_persen", "name":"TKS.lembar_8_persen"},
              {"data": "lembar_05_persen", "name":"TKS.lembar_05_persen"},
              {"data": "lembar_5_persen", "name":"TKS.lembar_5_persen"},
              {"data": "lembar_2_persen", "name":"TKS.lembar_2_persen"},
              {"data": "lembar_1_persen", "name":"TKS.lembar_1_persen"},
              {"data": "lembar_8_persen", "name":"TKS.lembar_8_persen"},
              {"data": "lembar_05_persen", "name":"TKS.lembar_05_persen"},
              {"data": "id_transaksi", "name":"TKS.id_transaksi"},
            ],
            "fnServerData" : function(AvUrl, AvData, AvCallBack){
              AvData.push({"name":"idSales","value":idSales})
              $.ajax({
                type : "POST",
                url : AvUrl,
                dataType : "JSON",
                data : AvData,
                success : AvCallBack
              });
            },
            "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
              $("td:eq(0)",AvRow).text(++AvDisplayIndex);
              $("td:eq(4)",AvRow).text(parseFloat(AvData["jumlah_berat"]).toLocaleString());
              $("td:eq(7)",AvRow).text(parseFloat(AvData["jumlah_harga"]).toLocaleString());
              $("td:eq(8)",AvRow).text(parseFloat(AvData["diskon_persen"]).toLocaleString());
              $("td:eq(9)",AvRow).text(parseFloat(AvData["potongan_harga"]).toLocaleString());
              $("td:eq(10)",AvRow).text(parseFloat(AvData["lembar_5_persen"]).toLocaleString());
              $("td:eq(11)",AvRow).text(parseFloat(AvData["lembar_2_persen"]).toLocaleString());
              $("td:eq(12)",AvRow).text(parseFloat(AvData["lembar_1_persen"]).toLocaleString());
              $("td:eq(13)",AvRow).text(parseFloat(AvData["lembar_8_persen"]).toLocaleString());
              $("td:eq(14)",AvRow).text(parseFloat(AvData["lembar_05_persen"]).toLocaleString());
              // $("td:eq(15)",AvRow).text(parseFloat(AvData["lembar_5_persen"]).toLocaleString());
              // $("td:eq(16)",AvRow).text(parseFloat(AvData["lembar_2_persen"]).toLocaleString());
              // $("td:eq(17)",AvRow).text(parseFloat(AvData["lembar_1_persen"]).toLocaleString());
              // $("td:eq(18)",AvRow).text(parseFloat(AvData["lembar_8_persen"]).toLocaleString());
              // $("td:eq(19)",AvRow).text(parseFloat(AvData["lembar_05_persen"]).toLocaleString());
              if(parseFloat(AvData["lembar_8_persen"]) > 0){
                if(AvData["jenis_harga"] == "KG"){
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }else{
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_8_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["lembar_8_persen"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }
                $("td:eq(18)", AvRow).text(jumlahHarga.toLocaleString());
              }
              if(parseFloat(AvData["lembar_5_persen"]) > 0){
                if(AvData["jenis_harga"] == "KG"){
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }else{
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_5_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["lembar_5_persen"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }
                $("td:eq(15)", AvRow).text(jumlahHarga.toLocaleString());
              }
              if(parseFloat(AvData["lembar_2_persen"]) > 0){
                if(AvData["jenis_harga"] == "KG"){
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }else{
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_2_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["lembar_2_persen"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }
                $("td:eq(16)", AvRow).text(jumlahHarga.toLocaleString());
              }
              if(parseFloat(AvData["lembar_1_persen"]) > 0){
                if(AvData["jenis_harga"] == "KG"){
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }else{
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_1_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["lembar_1_persen"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }
                $("td:eq(17)", AvRow).text(jumlahHarga.toLocaleString());
              }
              if(parseFloat(AvData["lembar_05_persen"]) > 0){
                if(AvData["jenis_harga"] == "KG"){
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }else{
                  var jumlahHarga = (
                                      ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_05_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                      -
                                      (parseFloat(AvData["lembar_05_persen"]) * parseFloat(AvData["potongan_harga"]))
                                    )
                }
                $("td:eq(18)", AvRow).text(jumlahHarga.toLocaleString());
              }
              $("td:eq(20)",AvRow).html("<button class='btn btn-sm btn-flat btn-warning' onclick=getDetailTransaksiKomisiSalesEdit('"+AvData["id_transaksi"]+"')><i class='fa fa-edit'></i> Ubah</button>"+
                                        "<button class='btn btn-sm btn-flat btn-danger' onclick=deleteAndRestoreTransaksiKomisiSales('"+AvData["id_transaksi"]+"','TRUE')><i class='fa fa-trash'></i> Hapus</button>");
            }
          });
        }

        function deleteAndRestoreSales(param, param2){
          if(confirm("Apakah Anda Yakin Ingin Menghapus Data Sales?")){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/deleteAndRestoreSales'); ?>",
              dataType : 'TEXT',
              data : {
                idSales : param,
                deleted : param2
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Sales Berhasil Dihapus");
                  $("#notifInput").addClass("callout-info in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                    resetFormSales();
                  }, 2500);
                }else{
                  $("#notifInputText").text("Data Sales Gagal Dihapus");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                    resetFormSales();
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").alert('close');
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function deleteAndRestoreJenisBarang(param, param2){
          if(confirm("Apakah Anda Yakin Ingin Menghapus Data Sales?")){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/deleteAndRestoreJenisBarang'); ?>",
              dataType : 'TEXT',
              data : {
                idJenis : param,
                deleted : param2
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Jenis Barang Berhasil Dihapus");
                  $("#notifInput").addClass("callout-info in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                    resetFormJenis();
                  }, 2500);
                }else{
                  $("#notifInputText").text("Data Jenis Barang Gagal Dihapus");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                    resetFormJenis();
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").alert('close');
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function deleteAndRestoreTransaksiKomisiSales(param, param2){
          if(confirm("Apakah Anda Yakin Ingin Menghapus Data Ini?")){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/deleteAndRestoreTransaksiKomisiSales'); ?>",
              dataType : 'TEXT',
              data : {
                idTransaksi : param,
                deleted : param2
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Transaksi Berhasil Dihapus");
                  $("#notifInput").addClass("callout-info in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                    resetFormKomisi();
                  }, 2500);
                }else{
                  $("#notifInputText").text("Data Transaksi Gagal Dihapus");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                    resetFormKomisi();
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").alert('close');
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function getDetailSalesEdit(param){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_marketing/main/getDetailSales'); ?>",
            dataType : "JSON",
            data : {
              idSales : param
            },
            success : function(response){
              $("#txtKodeSales").removeAttr("onkeyup");
              $("#txtIdSales").val(response[0].id_sales);
              $("#txtKodeSales").val(response[0].kode_sales);
              $("#txtNamaLengkap").val(response[0].nama_lengkap);
              $("#txtNoTelp").val(response[0].no_telp);
              $("#txtAlamat").val(response[0].alamat);
              $("input[value='"+response[0].gender+"']").click();
              $("#btnSimpan").attr("onclick","editDataSales()")
                             .removeClass("btn-primary")
                             .addClass("btn-warning")
                             .html("<i class='fa fa-pencil'></i> Ubah");
            },
            error : function(response){
              $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
              $("#notifInput").addClass("callout-danger in");
              setTimeout(function(){
                $("#notifInput").alert('close');
                $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                $("#notifInputText").text("");
              }, 2500);
            }
          });
        }

        function getDetailJenisBarangEdit(param){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_marketing/main/getDetailJenisBarang'); ?>",
            dataType : "JSON",
            data : {
              idJenis : param
            },
            success : function(response){
              $("#txtKodeJenis").removeAttr("onkeyup");
              $("#txtIdJenis").val(response[0].id_jenis);
              $("#txtKodeJenis").val(response[0].kode_jenis);
              $("#txtNamaJenis").val(response[0].nama_jenis );
              $("#txtKetJenis").val(response[0].keterangan_jenis);
              $("#btnSimpan").attr("onclick","editDataJenisBarang()")
                             .removeClass("btn-primary")
                             .addClass("btn-warning")
                             .html("<i class='fa fa-pencil'></i> Ubah");

            },
            error : function(response){
              $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
              $("#notifInput").addClass("callout-danger in");
              setTimeout(function(){
                $("#notifInput").alert('close');
                $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                $("#notifInputText").text("");
              }, 2500);
            }
          });
        }

        function getDetailTransaksiKomisiSalesEdit(param){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_marketing/main/getDetailTransaksiKomisiSales'); ?>",
            dataType : "JSON",
            data : {
              idTransaksi : param
            },
            success : function(response){
              $("#txtIdTransaksi").val(response[0].id_transaksi);
              $("#txtIdSales").val(response[0].id_sales);
              $("#txtIdJenis").val(response[0].id_jenis);
              $("#txtKdGdHasil").val(response[0].kd_gd_hasil);

              $("#txtTglOrder").val(response[0].tgl_order);
              $("#txtNamaPelanggan").val(response[0].nama_pelanggan);
              $("#txtKodeOrder").val(response[0].kode_order);
              $("#cmbUkuran").val(response[0].kd_gd_hasil);
              $("#txtJumlahKg").val(response[0].jumlah_berat);
              $("#txtJumlahBal").val(response[0].jumlah_bal);
              $("#cmbJenisBarang").val(response[0].id_jenis);
              $("#cmbJenisHargaSatuan").val(response[0].jenis_harga);
              $("#txtHarga").val(response[0].jumlah_harga);
              $("#txtDiscount").val(response[0].diskon_persen);
              $("#txtHasilDiscount").val(response[0].hasil_diskon);
              $("#txtPotongan").val(response[0].potongan_harga);
              $("#txtLembar8").val(response[0].lembar_8_persen);
              $("#txtLembar5").val(response[0].lembar_5_persen);
              $("#txtLembar2").val(response[0].lembar_2_persen);
              $("#txtLembar1").val(response[0].lembar_1_persen);
              $("#txtLembar05").val(response[0].lembar_05_persen);
              $("#btnSimpan").removeClass("btn-primary")
                             .addClass("btn-warning")
                             .html("<i class='fa fa-pencil'></i> Ubah")
                             .attr("onclick","editTransaksiKomisiSales()");
            },
            error : function(response){
              $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
              $("#notifInput").addClass("callout-danger in");
              setTimeout(function(){
                $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                $("#notifInputText").text("");
              }, 2500);
            }
          });
        }

        function editDataSales(){
          var idSales = $("#txtIdSales").val();
          var kodeSales = $("#txtKodeSales").val();
          var namaLengkap = $("#txtNamaLengkap").val();
          var gender = $("input[name='rbJenkel']:checked").val();
          var noTelp = $("#txtNoTelp").val();
          var alamat = $("#txtAlamat").val();
          if(kodeSales=="" || namaLengkap=="" || gender=="" || noTelp==""){
            $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
            $("#notifInput").addClass("callout-warning in");
            setTimeout(function(){
              $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
              $("#notifInputText").text("");
            }, 2500);
          }else{
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/modifyDataSales'); ?>",
              dataType : "TEXT",
              data : {
                idSales : idSales,
                kodeSales : kodeSales,
                namaLengkap : namaLengkap,
                gender : gender,
                noTelp : noTelp,
                alamat : alamat
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Sales Berhasil Diubah");
                  $("#notifInput").addClass("callout-info in");
                  resetFormSales();
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else if($.trim(response) === "Gagal"){
                  $("#notifInputText").text("Data Sales Gagal Diubah");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else{
                  $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
                  $("#notifInput").addClass("callout-warning in");
                  setTimeout(function(){
                    $("#notifInput").alert('close');
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").alert('close');
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function editDataJenisBarang(){
          var idJenis = $("#txtIdJenis").val();
          var kodeJenis = $("#txtKodeJenis").val();
          var namaJenis = $("#txtNamaJenis").val();
          var keterangan = $("#txtKetJenis").val();
          if(kodeJenis=="" || namaJenis=="" || keterangan==""){
            $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
            $("#notifInput").addClass("callout-warning in");
            setTimeout(function(){
              $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
              $("#notifInputText").text("");
            }, 2500);
          }else{
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/modifyDataJenisBarang'); ?>",
              dataType : "TEXT",
              data : {
                idJenis : idJenis,
                kodeJenis : kodeJenis,
                namaJenis : namaJenis,
                keterangan : keterangan
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Jenis Barang Berhasil Diubah");
                  $("#notifInput").addClass("callout-info in");
                  resetFormJenis();
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else if($.trim(response) === "Gagal"){
                  $("#notifInputText").text("Data Jenis Barang Gagal Diubah");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else{
                  $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
                  $("#notifInput").addClass("callout-warning in");
                  setTimeout(function(){
                    $("#notifInput").alert('close');
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").alert('close');
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function editTransaksiKomisiSales(){
          var kodeTransaksi = $("#txtIdTransaksi").val();
          var namaSales = $("#txtNamaSales").val();
          var tglOrder = $("#txtTglOrder").val();
          var namaPelanggan = $("#txtNamaPelanggan").val();
          var kodeOrder = $("#txtKodeOrder").val();
          var jumlahKg = $("#txtJumlahKg").val().replace(/,/g,"");
          var jumlahBal = $("#txtJumlahBal").val().replace(/,/g,"");
          var jenisHargaSatuan = $("#cmbJenisHargaSatuan").val();
          var harga = $("#txtHarga").val().replace(/,/g,"");
          var diskon = $("#txtDiscount").val().replace(/,/g,"");
          var hasilDiskon = $("#txtHasilDiscount").val().replace(/,/g,"");
          var potongan = $("#txtPotongan").val().replace(/,/g,"");
          var lembar8 = $("#txtLembar8").val().replace(/,/g,"");
          var lembar5 = $("#txtLembar5").val().replace(/,/g,"");
          var lembar2 = $("#txtLembar2").val().replace(/,/g,"");
          var lembar1 = $("#txtLembar1").val().replace(/,/g,"");
          var lembar05 = $("#txtLembar05").val().replace(/,/g,"");

          if($("#cmbKodeSales").val() != null){
            var kodeSales = $("#cmbKodeSales").val();
          }else{
            var kodeSales = $("#txtIdSales").val();
          }

          if($("#cmbJenisBarang").val() != null){
            var idJenis = $("#cmbJenisBarang").val();
          }else{
            var idJenis = $("#txtIdJenis").val();
          }

          if($("#cmbUkuran").val() != null){
            var kdGdHasil = $("#cmbUkuran").val();
          }else{
            var kdGdHasil = $("#txtKdGdHasil").val();
          }

          if(
              kodeSales == ""     || namaSales == "" || tglOrder == "" ||
              namaPelanggan == "" || kodeOrder == "" || kdGdHasil == ""
          ){
            $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
            $("#notifInput").addClass("callout-warning in");
            setTimeout(function(){
              $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
              $("#notifInputText").text("");
            }, 2500);
          }else{
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/editTransaksiKomisiSales'); ?>",
              dataType : "TEXT",
              data : {
                idTransaksi     : kodeTransaksi,
                idSales         : kodeSales,
                idJenis         : idJenis,
                tglOrder        : tglOrder,
                namaPelanggan   : namaPelanggan,
                kodeOrder       : kodeOrder,
                kdGdHasil       : kdGdHasil,
                jumlahBerat     : jumlahKg,
                jumlahBal       : jumlahBal,
                jenisHarga      : jenisHargaSatuan,
                jumlahHarga     : harga,
                diskonPersen    : diskon,
                hasilDiskon     : hasilDiskon,
                potonganHarga   : potongan,
                lembar8Persen   : lembar8,
                lembar5Persen   : lembar5,
                lembar2Persen   : lembar2,
                lembar1Persen   : lembar1,
                lembar05Persen  : lembar05
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  if($("#notifInputModal").length > 0){
                    $("#notifInputTextModal").text("Data Berhasil Diubah");
                    $("#notifInputModal").addClass("callout-info in");
                    setTimeout(function(){
                      $("#notifInputModal").removeClass("callout-info callout-danger callout-warning in");
                      $("#notifInputTextModal").text("");
                      resetFormKomisi();
                    }, 2500);
                  }else{
                    $("#notifInputText").text("Data Berhasil Diubah");
                    $("#notifInput").addClass("callout-info in");
                    setTimeout(function(){
                      $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                      $("#notifInputText").text("");
                      resetFormKomisi();
                    }, 2500);
                  }
                }else if($.trim(response) === "Gagal"){
                  $("#notifInputText").text("Data Gagal Diubah");
                  $("#notifInput").addClass("callout-danger in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else if($.trim(response) === "Lock"){
                  $("#notifInputText").text("Maaf Bulan Ini Sudah Di Kunci, Silahkan Hubungi Marketing Untuk Membuka Kunci");
                  $("#notifInput").addClass("callout-warning in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }else{
                  $("#notifInputText").text("Semua Kolom Berwarna Kuning Tidak Boleh Kosong!");
                  $("#notifInput").addClass("callout-warning in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function changeTitle(title) {

          var date = $("#tglTitle").text();
          $("#tglTitle").text(date);
          $("#title").text(title);

          if (title=="Dalam Kota") {
            datatableOrederPerHari("DK",date);
            totalOrderPerHari("DK", date);
          }else if (title=="Luar Kota"){
            datatableOrederPerHari("LK",date);
            totalOrderPerHari("LK", date)
          }else if (title=="Cabang"){
            datatableOrederPerHari("CBG",date);
            totalOrderPerHari("CBG", date)
          }else if (title=="Sales Kanvas"){
            datatableOrederPerHari("SKV",date);
            totalOrderPerHari("SKV", date)
          }else if (title=="Luar Negeri"){
            datatableOrederPerHari("LN",date);
            totalOrderPerHari("LN", date)
          }
        }

        function datatableOrederPerHari(jenis="",tgl=""){
          if (jenis=="") {jenis="DK"}
          $("#tableOrderPerHari"+jenis).dataTable().fnDestroy();
          $("#tableOrderPerHari"+jenis).dataTable({
            // "fixedHeader" : true,
            "autoWidth" : false,
            "ordering" : false,
            "bProcessing" : true,
            "bServerSide" : true,
            "bJQueryUI" : true,
            "sPaginationType" : "full_numbers",
            "sAjaxSource" : "<?php echo base_url(); ?>_marketing/main/getDataOrderPerHari",
            "columns" : [
              {"data" : "no_order", "name" : "P.no_order"},
              {"data" : "no_order", "name" : "P.no_order"},
              {"data" : "kd_order", "name" : "P.kd_order"},
              {"data" : "nm_perusahaan", "name" : "C.nm_perusahaan"},
              {"data" : "nm_pemesan", "name" : "P.nm_pemesan"},
              {"data" : "tgl_pesan", "name" : "P.tgl_pesan"},
              {"data" : "tgl_estimasi", "name" : "P.tgl_estimasi"},
              {"data" : "sts_pesanan", "name" : "P.sts_pesanan"},
              {"data" : "no_order", "name" : "C.nm_perusahaan_update"}
            ],
            "fnServerData" : function(sSource,aoData,fnCallback){
              aoData.push({"name":"jenis","value":jenis});
              aoData.push({"name":"tgl","value":tgl});
              $.ajax({
                "type"      : "POST",
                "dataType"  : "JSON",
                "url"       : sSource,
                "data"      : aoData,
                "success"   : fnCallback
              });
            },
            "fnRowCallback" : function(nRow,aData,iDisplayIndex,iDisplayIndexFull){
              $("td:eq(0)",nRow).text(++iDisplayIndex);
              $("td:eq(8)",nRow).html("<button class='btn btn-flat btn-primary btn-sm' data-toggle='modal' data-target='#modal-lihat-detail-pesanan' onclick=lihatDetailPesanan('"+aData['no_order']+"')>Detail</button>");
            }
          });
        }

        function totalOrderPerHari(param,param2="") {
          $.ajax({
            type : "POST",
            url  : "<?php echo site_url('_marketing/main/getTotalOrderPerHari'); ?>",
            data :{jenis:param,tgl:param2},
            dataType : "JSON",
            success:function(response){
              if (param=="DK") {
                $("#totalPerHariDK").empty();
                $.each(response,function(index, value){
                  $("#totalPerHariDK").append(
                    (parseFloat(value.jumlahLembar) > 0 ? parseFloat(value.jumlahLembar).toLocaleString() : 0) + " LEMBAR <br>"+
                    (parseFloat(value.jumlahBerat) > 0 ? parseFloat(value.jumlahBerat).toLocaleString() : 0) + " KG <br>"+
                    (parseFloat(value.jumlahBal) > 0 ? parseFloat(value.jumlahBal).toLocaleString() : 0) + " BAL <br>"
                  );
                });
              }else if (param=="LK"){
                $("#totalPerHariLK").empty();
                $.each(response,function(index, value){
                  $("#totalPerHariLK").append(
                    (parseFloat(value.jumlahLembar) > 0 ? parseFloat(value.jumlahLembar).toLocaleString() : 0) + " LEMBAR <br>"+
                    (parseFloat(value.jumlahBerat) > 0 ? parseFloat(value.jumlahBerat).toLocaleString() : 0) + " KG <br>"+
                    (parseFloat(value.jumlahBal) > 0 ? parseFloat(value.jumlahBal).toLocaleString() : 0) + " BAL <br>"
                  );
                });
              }else if (param=="CBG"){
                $("#totalPerHariCBG").empty();
                 $.each(response,function(index, value){
                  $("#totalPerHariCBG").append(value.jumlah+" "+value.satuan+"<br>");
                });
              }else if (param=="SKV"){
                $("#totalPerHariSKV").empty();
                $.each(response,function(index, value){
                  $("#totalPerHariSKV").append(
                    (parseFloat(value.jumlahLembar) > 0 ? parseFloat(value.jumlahLembar).toLocaleString() : 0) + " LEMBAR <br>"+
                    (parseFloat(value.jumlahBerat) > 0 ? parseFloat(value.jumlahBerat).toLocaleString() : 0) + " KG <br>"+
                    (parseFloat(value.jumlahBal) > 0 ? parseFloat(value.jumlahBal).toLocaleString() : 0) + " BAL <br>"
                  );
                });
              }else if (param=="LN"){
                $("#totalPerHariLN").empty();
                $.each(response,function(index, value){
                  $("#totalPerHariLN").append(
                    (parseFloat(value.jumlahLembar) > 0 ? parseFloat(value.jumlahLembar).toLocaleString() : 0) + " LEMBAR <br>"+
                    (parseFloat(value.jumlahBerat) > 0 ? parseFloat(value.jumlahBerat).toLocaleString() : 0) + " KG <br>"+
                    (parseFloat(value.jumlahBal) > 0 ? parseFloat(value.jumlahBal).toLocaleString() : 0) + " BAL <br>"
                  );
                });
              }
            }
          });
        }

        function orderPerHariByDate(){
          var date = $("#tanggal").val();
          if (!date) {
            alert("Tanggal Tidak Boleh Kosong!")
          }else{
            $("#tglTitle").text(date);
            if ($("#tableOrderPerHariDK").length) {
              $("#totalPerHariDK").empty();
              totalOrderPerHari("DK",date)
              datatableOrederPerHari("DK",date)
            }

            if ($("#tableOrderPerHariLK").length) {
              $("#totalPerHariLK").empty();
              totalOrderPerHari("LK",date)
              datatableOrederPerHari("LK",date)
            }

            if ($("#tableOrderPerHariCBG").length) {
              $("#totalPerHariCBG").empty();
              totalOrderPerHari("CBG",date)
              datatableOrederPerHari("CBG",date)
            }

            if ($("#tableOrderPerHariLN").length) {
              $("#totalPerHariLN").empty();
              totalOrderPerHari("LN",date)
              datatableOrederPerHari("LN",date)
            }
          }
        }

        function statisticChartPerHari(jenis="",tgl_awal="",tgl_akhir=""){
          $(".chartjs-hidden-iframe").remove();
          var tgl_awal  = $("#tgl_awal").val();
          var tgl_akhir = $("#tgl_akhir").val();
          var arrBulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus",
                          "September","Oktober","November","Desember"];
          var arrTglAwal = tgl_awal.split("-");
          var arrTglAkhir = tgl_akhir.split("-");
          var tglAwal = arrTglAwal[2]+" "+arrBulan[parseInt(arrTglAwal[1])-1]+" "+arrTglAwal[0];
          var tglAkhir = arrTglAkhir[2]+" "+arrBulan[parseInt(arrTglAkhir[1])-1]+" "+arrTglAkhir[0];

          $("#tglTitle").text(tglAwal+" s/d "+tglAkhir);
          $("#lblRincianStatistikDK").text("Rincian Statistik Dalam Kota ( "+tglAwal+" s/d "+tglAkhir+" )");

          $("#jenis").val("DK");
          var jns = $("#title").text();
          if (jns=="Dalam Kota") {
            var jenis = "DK";
            var canvas = "myChart1";
            var table = "#tableRincianStatistikDalamKota";
            $("#"+canvas).remove();
            $("#DK").prepend("<canvas id='myChart1'></canvas>");
          }else if(jns=="Luar Kota"){
            var jenis = "LK";
            var canvas = "myChart2";
            var table = "#tableRincianStatistikLuarKota";
            $("#"+canvas).remove();
            $("#LK").prepend("<canvas id='myChart2'></canvas>");
          }else if(jns=="Luar Negeri"){
            var jenis = "LN";
            var canvas = "myChart4";
            var table = "#tableRincianStatistikLuarNegeri";
            $("#"+canvas).remove();
            $("#LN").prepend("<canvas id='myChart4'></canvas>");
          }else{
            var jenis = 'CBG';
            var canvas = "myChart3";
            var table = "#tableRincianStatistikCabang";
            $("#"+canvas).remove();
            $("#CBG").prepend("<canvas id='myChart3'></canvas>");
          }
          if (!tgl_awal||!tgl_akhir) {
            alert("Semua kolom harus diisi!");
          }else{
            $.ajax({
            type : "POST",
            url  : "<?php echo site_url('_marketing/main/getDataChart'); ?>",
            data : {tgl_awal:tgl_awal,tgl_akhir:tgl_akhir,jenis:jenis},
            dataType : "JSON",
            success:function(response){
              var labels = response.map(function(e) {
                 return e.tgl_pesan;
              });
              var dataBal = response.map(function(e) {
                 return e.Bal;
              });
              var dataKg = response.map(function(e) {
                 return e.Kg;
              });
              var dataLembar = response.map(function(e) {
                 return e.Lembar;
              });
              var ctx = document.getElementById(canvas).getContext('2d');
              var chart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: labels,
                      datasets: [{
                          label: "Bal",
                          backgroundColor: 'rgb(0, 97, 255)',
                          borderColor: 'rgb(0, 97, 255)',
                          data: dataBal,
                      },
                      {
                          label: "Kg",
                          backgroundColor: 'rgb(0, 255, 106)',
                          borderColor: 'rgb(0, 255, 106)',
                          data: dataKg,
                      },
                      {
                          label: "Lembar",
                          backgroundColor: 'rgb(255, 99, 132)',
                          borderColor: 'rgb(255, 99, 132)',
                          data: dataLembar,
                      }
                      ]
                  },


                  // Configuration options go here
                  options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                  }
              });
              datatablesRincianStatistik(tgl_awal, tgl_akhir, jenis);
            }
          });
          }
        }

        function changeTitleChart(title) {
          var date = $("#tglTitle").text().split(" s/d ");
          var arrBulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus",
                          "September","Oktober","November","Desember"];
          var tglAwalTemp = $("#tgl_awal").val();
          var tglAkhirTemp = $("#tgl_akhir").val();
          var arrTglAwal = tglAwalTemp.split("-");
          var arrTglAkhir = tglAkhirTemp.split("-");

          var tglAwal = arrTglAwal[2]+" "+arrBulan[parseInt(arrTglAwal[1])-1]+" "+arrTglAwal[0];
          var tglAkhir = arrTglAkhir[2]+" "+arrBulan[parseInt(arrTglAkhir[1])-1]+" "+arrTglAkhir[0];

          $("#tglTitle").text(tglAwal+" s/d "+tglAkhir);
          $("#title").text(title);

          if (title=="Dalam Kota") {
            statisticChartPerHari("DK",date[0],date[1]);
            $("#jenis").val("DK");
            $("#lblRincianStatistikDK").text("Rincian Statistik Dalam Kota ( "+tglAwal+" s/d "+tglAkhir+" )");
          }else if (title=="Luar Kota"){
            statisticChartPerHari("LK",date[0],date[1]);
            $("#jenis").val("LK");
            $("#lblRincianStatistikLK").text("Rincian Statistik Luar Kota ( "+tglAwal+" s/d "+tglAkhir+" )");
          }else if (title=="Cabang"){
            statisticChartPerHari("CBG",date[0],date[1]);
            $("#jenis").val("CBG");
            $("#lblRincianStatistikCBG").text("Rincian Statistik Cabang ( "+tglAwal+" s/d "+tglAkhir+" )");
          }else if (title=="Luar Negeri"){
            statisticChartPerHari("LN",date[0],date[1]);
            $("#jenis").val("LN");
            $("#lblRincianStatistikLN").text("Rincian Statistik Luar Negeri ( "+tglAwal+" s/d "+tglAkhir+" )");
          }
        }

        function urutkanRincian(){
          var tglAwal = $("#tgl_awal").val();
          var tglAkhir = $("#tgl_akhir").val();
          var jenis = $("#jenis").val();
          var jnsQty = $("#cmbJnsQty"+jenis).val();
          var sortir = $("#cmbSort"+jenis).val();
          datatablesRincianStatistik(tglAwal,tglAkhir,jenis,jnsQty,sortir);
        }

        function datatablesRincianStatistik(param,param2,param3,param4="",param5=""){
          if(param3=="DK"){
            var table = "#tableRincianStatistikDalamKota";
          }else if(param3=="LK"){
            var table = "#tableRincianStatistikLuarKota";
          }else if(param3=="LN"){
            var table = "#tableRincianStatistikLuarNegeri";
          }else{
            var table = "#tableRincianStatistikCabang";
          }
          $(table).dataTable().fnDestroy();
          $(table).dataTable({
            // "fixedHeader" : true,
            "bProcessing" : true,
            "bServerSide" : true,
            "autoWidth": false,
            "responsive" : true,
            "scrollY" : "500px",
            "scrollX" : "100%",
            "ordering" : false,
            "sAjaxSource":"<?php echo base_url(); ?>_marketing/main/getDataRincian",
            "columns":[
              {"data":"nm_perusahaan","name":"C.nm_perusahaan"},
              {"data":"tgl_pesan","name":"P.tgl_pesan"},
              {"data":"tgl_estimasi","name":"P.tgl_estimasi"},
              {"data":"sts_pesanan","name":"P.sts_pesanan"},
              {"data":"omsetKg","name":"PD.omset_kg"},
              {"data":"omsetLembar","name":"PD.omset_lembar"},
              {"data":"jumlahBal","name":"PD.jumlah"}
            ],
            "sPaginationType": "full_numbers",
            "iDisplayStart ": 10,
            "fnServerData": function (sSource, aoData, fnCallback){
              aoData.push({"name":"tgl_awal","value":param},
                          {"name":"tgl_akhir","value":param2},
                          {"name":"jenis","value":param3},
                          {"name":"jnsQty","value":param4},
                          {"name":"sortir","value":param5});
              $.ajax({
                       "dataType": "json",
                       "type": "POST",
                       "url": sSource,
                       "data": aoData,
                       "success": fnCallback
                   });
            },
            "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
              $("td:eq(4)",AvRow).text(parseFloat(AvData["omsetKg"]).toLocaleString());
              $("td:eq(5)",AvRow).text(parseFloat(AvData["omsetLembar"]).toLocaleString());
              $("td:eq(6)",AvRow).text(parseFloat(AvData["jumlahBal"]).toLocaleString());
            }
          });

          $.ajax({
            type : "POST",
            url : "<?php echo base_url(); ?>_marketing/main/getDataRincian",
            dataType : "JSON",
            data : {
              tgl_awal  : param,
              tgl_akhir : param2,
              jenis     : param3,
              jnsQty    : param4,
              sortir    : param5
            },
            success : function(response){
              var jumlahLembar = 0;
              var jumlahBerat = 0;
              var jumlahBal = 0;

              if(param3 == "CBG"){
                var text = "";
              }else{
                var text = " (Berdasarkan Jumlah Pesanan)";
              }
              $.each(response.data, function(AvIndex, AvValue){
                jumlahLembar += parseFloat(AvValue["omsetLembar"]);
                jumlahBerat += parseFloat(AvValue["omsetKg"]);
                jumlahBal += parseFloat(AvValue["jumlahBal"]);
              });
              $("#tdLembar"+param3).text(jumlahLembar.toLocaleString());
              $("#tdBerat"+param3).text(jumlahBerat.toLocaleString()+" Kg");
              $("#tdBal"+param3).text(jumlahBal.toLocaleString()+text);
            },
            error : function(response){
              alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
            }
          });
        }

        function resetFormSales(){
          $("#txtKodeSales").attr("onkeyup","cekKodeSales(this)");
          $("input[type='text']").val("");
          $("textarea").val("");
          $("input[value='Pria']").click();
          $(".active a[aria-controls='tableDataSales']").click();
          $("#btnSimpan").attr("onclick","saveDataSales()")
                         .removeClass("btn-warning")
                         .addClass("btn-primary")
                         .html("<i class='fa fa-check'></i> Simpan");
        }

        function resetFormJenis(){
          $("input[type='text']").val("");
          $("textarea").val("");
          $(".active a[aria-controls='tableDataJenisBarang']").click();
          $("#btnSimpan").attr("onclick","saveDataJenisBarang()")
                         .removeClass("btn-warning")
                         .addClass("btn-primary")
                         .html("<i class='fa fa-check'></i> Simpan");
        }

        function resetAllFormKomisi(){
          dataTableDataOrderSales();
          $("input").val("");
          $(".date").datepicker("setDate",null);
          // $("select").val("");
          $("#cmbLembarPersen").val("0.08");
          $("#cmbJenisBarang").select2({
            placeholder : "Pilih Jenis Barang",
            width : "100%",
            allowClear : true,
            cache : false,
            ajax:{
              url : "<?php echo base_url(); ?>_marketing/main/getDataJenisBarangComboBox",
              dataType : "JSON",
              delay : 0,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    return{
                      text:item.kode_jenis +" | "+ item.nama_jenis +" | "+ item.keterangan_jenis,
                      id:item.id_jenis
                    }
                  })
                };
              }
            },
          });

          $("#cmbUkuran").select2({
            placeholder : "Pilih Ukuran",
            width : "100%",
            allowClear : true,
            cache : false,
            ajax:{
              url : "<?php echo base_url() ?>_marketing/main/getGudangHasilLike",
              dataType : "json",
              delay : 0,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    if(item.jenis == "MINYAK" || item.jenis == "CAT MURNI"){
                      return{
                        text:item.nm_barang +" - "+ item.warna +" - "+ item.status +" - "+ item.jenis,
                        id:item.kd_gd_bahan
                      }
                    }else if(item.status_produk == "FINISH"){
                      return{
                        text:item.kd_produk +" - "+ item.nama_produk,
                        id:item.kd_produk
                      }
                    }
                    else{
                      return{
                        text:item.ukuran +" - "+ item.warna_plastik +" - "+ item.tebal +" - "+ item.merek +" - "+ item.jns_brg,
                        id:item.kd_gd_hasil
                      }
                    }
                  })
                };
              },
            }
          });

          $("#cmbUkuran").on("select2:select", function(){
            var dataText = $(this).select2("data")[0]["text"];
            var arrDataText = dataText.split(" - ");
            if(arrDataText[0].indexOf("PACK") == -1){
              $("#txtMerek").val(arrDataText[3]);
            }else{
              $("#txtMerek").val(arrDataText[1]);
            }
          });

          $("#cmbUkuran").on("select2:unselect", function(){
            $("#txtMerek").val("");
          });

          $("#cmbKodeSales").select2({
            placeholder : "Pilih Sales",
            width : "100%",
            allowClear : true,
            cache : false,
            ajax:{
              url : "<?php echo base_url(); ?>_marketing/main/getDataSalesComboBox",
              dataType : "JSON",
              delay : 0,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    return{
                      text:item.kode_sales +" | "+ item.nama_lengkap,
                      id:item.id_sales
                    }
                  })
                };
              }
            },
          });

          $("#cmbKodeSales").on("select2:select", function(){
            var dataText = $(this).select2("data")[0]["text"];
            var arrDataText = dataText.split(" | ");
            $("#txtNamaSales").val(arrDataText[1]);
            dataTableDataOrderSales();
          });

          $("#cmbKodeSales").on("select2:unselect", function(){
            $("#txtNamaSales").val("");
          });
        }

        function resetFormKomisi(){
          $("input[type='hidden']").val("");
          $("#txtNamaPelanggan").val("");
          $("#txtKodeOrder").val("");
          $("#cmbUkuran").val("").trigger("change");
          $("#txtJumlahKg").val("");
          $("#txtJumlahBal").val("");
          $("#cmbJenisBarang").val("").trigger("change");
          $("#cmbJenisHargaSatuan").val("KG").trigger("change");
          $("#txtHarga").val("");
          $("#txtDiscount").val("");
          $("#txtHasilDiscount").val("");
          $("#txtPotongan").val("");
          $("#txtLembar8").val("");
          $("#txtLembar5").val("");
          $("#txtLembar2").val("");
          $("#txtLembar1").val("");
          $("#txtLembar05").val("");
          dataTableDataOrderSales();
          $("#btnSimpan").removeClass("btn-warning")
                         .addClass("btn-primary")
                         .attr("onclick","saveTransaksiKomisiSales()")
                         .html("<i class='fa fa-check'></i> Simpan");
          if($("#btnCari").length > 0){
            $("#btnCari").click();
          }

          if($("#modalEditLaporan").length > 0){
            $("#modalEditLaporan").modal("hide");
          }
        }

        function selesaiInputTransaksiKomisiSales(){
          var kodeSales = $("#cmbKodeSales").val();
          var statusTransaksi = "PROGRESS";
          if(confirm("Apakah Anda Yakin Sudah Tidak Ada Yang Salah?")){
            $.ajax({
              type : "POST",
              url : "<?php echo base_url('_marketing/main/selesaiInputTransaksiKomisiSales'); ?>",
              dataType : "TEXT",
              data : {
                idSales : kodeSales,
                statusTransaksi : statusTransaksi
              },
              success : function(response){
                if($.trim(response) === "Berhasil"){
                  $("#notifInputText").text("Data Berhasil Simpan Untuk Pengecekan");
                  $("#notifInput").addClass("callout-info in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                    resetFormKomisi();
                  }, 2500);
                }else{
                  $("#notifInputText").text("Data Gagal Simpan Untuk Pengecekan");
                  $("#notifInput").addClass("callout-info in");
                  setTimeout(function(){
                    $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                    $("#notifInputText").text("");
                  }, 2500);
                }
              },
              error : function(response){
                $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").alert('close');
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            });
          }
        }

        function modalSearchLaporanKomisi(){
          $("#cmbSales").select2({
            placeholder : "Pilih Sales",
            dropdownParent : $("#modalSearchLaporanKomisi"),
            width : "100%",
            allowClear : true,
            cache : false,
            ajax:{
              url : "<?php echo base_url(); ?>_marketing/main/getDataSalesComboBox",
              dataType : "JSON",
              delay : 0,
              processResults: function(data){
                return{
                  results : $.map(data, function(item){
                    return{
                      text:item.kode_sales +" | "+ item.nama_lengkap,
                      id:item.id_sales
                    }
                  })
                };
              }
            },
          });
        }

        function cariLaporanKomisiSales(){
          var idSales = $("#cmbSales").val();
          var tglAwal = $("#txtTglAwal").val();
          var tglAkhir = $("#txtTglAkhir").val();
          tableLaporanDataOrderSales(idSales, tglAwal, tglAkhir);
          var dataText = $("#cmbSales").select2("data")[0]["text"];
          var arrDataText = dataText.split(" | ");
          var tglAwalTemp = tglAwal.split("-");
          var tglAwalView = tglAwalTemp[2]+"-"+tglAwalTemp[1]+"-"+tglAwalTemp[0];
          var tglAkhirTemp = tglAkhir.split("-");
          var tglAkhirView = tglAkhirTemp[2]+"-"+tglAkhirTemp[1]+"-"+tglAkhirTemp[0];

          $("#tdKodeSales").text(arrDataText[0]);
          $("#tdNamaSales").text(arrDataText[1]);
          $("#tdPeriode").text(tglAwalView +" / "+ tglAkhirView);

          $("#modalSearchLaporanKomisi").modal("hide");
          $("#laporan").show();
        }

        function modalEditLaporan(param){
          getDetailTransaksiKomisiSalesEdit(param);
          $("#modalEditLaporan").modal({
            backdrop : "static"
          });
        }
      //============ Save Method (Finish) ============//

      //============ Calculation Method (Start) ============//
      function hitungHargaDiskon(){
        var jenisHarga = $("#cmbJenisHargaSatuan").val();
        var hargaSatuan = $("#txtHarga").val().replace(/,/g,"");
        var diskon = $("#txtDiscount").val().replace(/,/g,"");
        var potonganTemp = $("#txtPotongan").val().replace(/,/g,"");

        if(jenisHarga == "KG"){
          var jumlah = $("#txtJumlahKg").val().replace(/,/g,"");
        }else{
          if($("#txtLembar5").val() != ""){
            var jumlah = $("#txtLembar5").val().replace(/,/g,"");
          }else if($("#txtLembar2").val() != ""){
            var jumlah = $("#txtLembar2").val().replace(/,/g,"");
          }else if($("#txtLembar1").val() != ""){
            var jumlah = $("#txtLembar1").val().replace(/,/g,"");
          }else if($("#txtLembar8").val() != ""){
            var jumlah = $("#txtLembar8").val().replace(/,/g,"");
          }else if($("#txtLembar05").val() != ""){
            var jumlah = $("#txtLembar05").val().replace(/,/g,"");
          }
        }

        if(potonganTemp == null || potonganTemp == ""){
          var potongan = 0;
        }else{
          var potongan = potonganTemp;
        }
        var hasilDiskon = ((parseFloat(hargaSatuan) - parseFloat(potongan)) * (parseFloat(diskon) / 100)) * parseFloat(jumlah);
        $("#txtHasilDiscount").val(hasilDiskon);
      }

      function gantiJenisHarga(){
        var jenis = $("#cmbJenisHargaSatuan").val();
        $("#spanHarga").text(jenis);
      }

      function dataTableLaporanDataOrderSales(param, param2, param3){
        $("#tableLaporanDataKomisi").dataTable().fnDestroy();
        $("#tableLaporanDataKomisi").dataTable({
          "bProcessing" : true,
          "bServerSide" : true,
          "bJQueryUI" : false,
          "autoWidth" : true,
          "ordering" : false,
          "sAjaxSource" : "<?php echo base_url('_marketing/main/getLaporanDataOrderSales'); ?>",
          "columns" : [
            {"data": "id_transaksi", "name":"TKS.id_transaksi"},
            {"data": "kode_order", "name":"TKS.kode_order"},
            {"data": "tgl_order", "name":"TKS.tgl_order"},
            {"data": "nama_pelanggan", "name":"TKS.nama_pelanggan"},
            {"data": "jumlah_berat", "name":"TKS.jumlah_berat"},
            {"data": "ukuran", "name":"GH.ukuran"},
            {"data": "merek", "name":"GH.merek"},
            {"data": "jumlah_harga", "name":"TKS.jumlah_harga"},
            {"data": "diskon_persen", "name":"TKS.diskon_persen"},
            {"data": "potongan_harga", "name":"TKS.potongan_harga"},
            {"data": "lembar_8_persen", "name":"TKS.lembar_8_persen"},
            {"data": "lembar_5_persen", "name":"TKS.lembar_5_persen"},
            {"data": "lembar_2_persen", "name":"TKS.lembar_2_persen"},
            {"data": "lembar_1_persen", "name":"TKS.lembar_1_persen"},
            {"data": "lembar_05_persen", "name":"TKS.lembar_05_persen"},
            {"data": "lembar_5_persen", "name":"TKS.lembar_5_persen"},
            {"data": "lembar_2_persen", "name":"TKS.lembar_2_persen"},
            {"data": "lembar_1_persen", "name":"TKS.lembar_1_persen"},
            {"data": "lembar_8_persen", "name":"TKS.lembar_8_persen"},
            {"data": "lembar_05_persen", "name":"TKS.lembar_05_persen"}
          ],
          "fnServerData" : function(AvUrl, AvData, AvCallBack){
            AvData.push({"name":"idSales","value":param3},
                        {"name":"tglAwal","value":param},
                        {"name":"tglAkhir","value":param2});
            $.ajax({
              type : "POST",
              url : AvUrl,
              dataType : "JSON",
              data : AvData,
              success : AvCallBack
            });
          },
          "fnRowCallback" : function(AvRow, AvData, AvDisplayIndex, AvDisplayIndexFull){
            $("td:eq(0)",AvRow).text(++AvDisplayIndex);
            $("td:eq(4)",AvRow).text(parseFloat(AvData["jumlah_berat"]).toLocaleString());
            $("td:eq(7)",AvRow).text(parseFloat(AvData["jumlah_harga"]).toLocaleString());
            $("td:eq(8)",AvRow).text(parseFloat(AvData["diskon_persen"]).toLocaleString());
            $("td:eq(9)",AvRow).text(parseFloat(AvData["potongan_harga"]).toLocaleString());
            $("td:eq(10)",AvRow).text(parseFloat(AvData["lembar_8_persen"]).toLocaleString());
            $("td:eq(11)",AvRow).text(parseFloat(AvData["lembar_5_persen"]).toLocaleString());
            $("td:eq(12)",AvRow).text(parseFloat(AvData["lembar_2_persen"]).toLocaleString());
            $("td:eq(13)",AvRow).text(parseFloat(AvData["lembar_1_persen"]).toLocaleString());
            $("td:eq(14)",AvRow).text(parseFloat(AvData["lembar_05_persen"]).toLocaleString());
            $("td:eq(15)",AvRow).text(parseFloat(AvData["lembar_8_persen"]).toLocaleString());
            $("td:eq(16)",AvRow).text(parseFloat(AvData["lembar_5_persen"]).toLocaleString());
            $("td:eq(17)",AvRow).text(parseFloat(AvData["lembar_2_persen"]).toLocaleString());
            $("td:eq(18)",AvRow).text(parseFloat(AvData["lembar_1_persen"]).toLocaleString());
            $("td:eq(19)",AvRow).text(parseFloat(AvData["lembar_05_persen"]).toLocaleString());
            if(parseFloat(AvData["lembar_8_persen"]) > 0){
              if(AvData["jenis_harga"] == "KG"){
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }else{
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_8_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["lembar_8_persen"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }
              $("td:eq(15)", AvRow).text(jumlahHarga.toLocaleString());
            }
            if(parseFloat(AvData["lembar_5_persen"]) > 0){
              if(AvData["jenis_harga"] == "KG"){
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }else{
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_5_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["lembar_5_persen"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }
              $("td:eq(16)", AvRow).text(jumlahHarga.toLocaleString());
            }
            if(parseFloat(AvData["lembar_2_persen"]) > 0){
              if(AvData["jenis_harga"] == "KG"){
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }else{
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_2_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["lembar_2_persen"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }
              $("td:eq(17)", AvRow).text(jumlahHarga.toLocaleString());
            }
            if(parseFloat(AvData["lembar_1_persen"]) > 0){
              if(AvData["jenis_harga"] == "KG"){
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }else{
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_1_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["lembar_1_persen"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }
              $("td:eq(18)", AvRow).text(jumlahHarga.toLocaleString());
            }
            if(parseFloat(AvData["lembar_05_persen"]) > 0){
              if(AvData["jenis_harga"] == "KG"){
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["jumlah_berat"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["jumlah_berat"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }else{
                var jumlahHarga = (
                                    ((parseFloat(AvData["jumlah_harga"]) * parseFloat(AvData["lembar_05_persen"])) - parseFloat(AvData["hasil_diskon"]))
                                    -
                                    (parseFloat(AvData["lembar_05_persen"]) * parseFloat(AvData["potongan_harga"]))
                                  )
              }
              $("td:eq(19)", AvRow).text(jumlahHarga.toLocaleString());
            }
          }
        });
      }

      function tableLaporanDataOrderSales(param, param2, param3){
        $.ajax({
          type : "POST",
          url : "<?php echo base_url('_marketing/main/getLaporanDataOrderSales2'); ?>",
          dataType : "JSON",
          data : {
            idSales : param,
            tglAwal : param2,
            tglAkhir : param3
          },
          success : function(response){
            $("#tableLaporanDataKomisi > tbody").empty();
            var totalJumlahBerat = 0;

            var totalLembar8Persen = 0;
            var totalLembar5Persen = 0;
            var totalLembar2Persen = 0;
            var totalLembar1Persen = 0;
            var totalLembar05Persen = 0;

            var totalJumlahLembar8 = 0;
            var totalJumlahLembar5 = 0;
            var totalJumlahLembar2 = 0;
            var totalJumlahLembar1 = 0;
            var totalJumlahLembar05 = 0;

            var sId = "<?php echo $this->session->userdata('fabricationStatus'); ?>";
            var sGroup = "<?php echo $this->session->userdata('fabricationGroup'); ?>";
            $.each(response.data, function(AvIndex, AvValue){
              var totalLembar8 = 0;
              var totalLembar5 = 0;
              var totalLembar2 = 0;
              var totalLembar1 = 0;
              var totalLembar05 = 0;
              var arrTglTemp = AvValue.tgl_order.split("-");
              var tanggal = arrTglTemp[2]+"-"+arrTglTemp[1]+"-"+arrTglTemp[0];

              var jumlahHarga = 0;
              if(parseFloat(AvValue.lembar_8_persen) > 0){
                if(AvValue.jenis_harga == "KG"){
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.jumlah_berat)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.jumlah_berat) * parseFloat(AvValue.potongan_harga))
                                    )
                }else{
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.lembar_8_persen)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.lembar_8_persen) * parseFloat(AvValue.potongan_harga))
                                    )
                }
                totalLembar8 = jumlahHarga;
              }else if(parseFloat(AvValue.lembar_5_persen) > 0){
                if(AvValue.jenis_harga == "KG"){
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.jumlah_berat)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.jumlah_berat) * parseFloat(AvValue.potongan_harga))
                                    )
                }else{
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.lembar_5_persen)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.lembar_5_persen) * parseFloat(AvValue.potongan_harga))
                                    )
                }
                totalLembar5 = jumlahHarga;
              }else if(parseFloat(AvValue.lembar_2_persen) > 0){
                if(AvValue.jenis_harga == "KG"){
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.jumlah_berat)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.jumlah_berat) * parseFloat(AvValue.potongan_harga))
                                    )
                }else{
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.lembar_2_persen)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.lembar_2_persen) * parseFloat(AvValue.potongan_harga))
                                    )
                }
                totalLembar2 = jumlahHarga;
              }else if(parseFloat(AvValue.lembar_1_persen) > 0){
                if(AvValue.jenis_harga == "KG"){
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.jumlah_berat)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.jumlah_berat) * parseFloat(AvValue.potongan_harga))
                                    )
                }else{
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.lembar_1_persen)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.lembar_1_persen) * parseFloat(AvValue.potongan_harga))
                                    )
                }
                totalLembar1 = jumlahHarga;
              }else if(parseFloat(AvValue.lembar_05_persen) > 0){
                if(AvValue.jenis_harga == "KG"){
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.jumlah_berat)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.jumlah_berat) * parseFloat(AvValue.potongan_harga))
                                    )
                }else{
                  jumlahHarga = (
                                      ((parseFloat(AvValue.jumlah_harga) * parseFloat(AvValue.lembar_05_persen)) - parseFloat(AvValue.hasil_diskon))
                                      -
                                      (parseFloat(AvValue.lembar_05_persen) * parseFloat(AvValue.potongan_harga))
                                    )
                }
                totalLembar05 = jumlahHarga;
              }

              totalJumlahLembar5 += totalLembar5;
              totalJumlahLembar2 += totalLembar2;
              totalJumlahLembar1 += totalLembar1;
              totalJumlahLembar8 += totalLembar8;
              totalJumlahLembar05 += totalLembar05;

              totalLembar5Persen += parseFloat(AvValue.lembar_5_persen);
              totalLembar2Persen += parseFloat(AvValue.lembar_2_persen);
              totalLembar1Persen += parseFloat(AvValue.lembar_1_persen);
              totalLembar8Persen += parseFloat(AvValue.lembar_8_persen);
              totalLembar05Persen += parseFloat(AvValue.lembar_05_persen);

              totalJumlahBerat += parseFloat(AvValue.jumlah_berat);

              if(sId=="3" || sGroup=="it_department"){
                if(response.marking == "FALSE"){
                  var action = "<button class='btn btn-md btn-flat btn-warning' onclick=modalEditLaporan('"+AvValue.id_transaksi+"')><i class='fa fa-pencil'></i> Ubah</button>"+
                               "<button class='btn btn-md btn-flat btn-danger' onclick=deleteAndRestoreTransaksiKomisiSales('"+AvValue.id_transaksi+"','TRUE')><i class='fa fa-trash'></i> Hapus</button>";
                }else{
                  var action = "<button class='btn btn-md btn-flat btn-default'>Data Sudah Dikunci, Silahkan Hubungi Marketing Untuk Membuka</button>";
                }
              }else{
                var action = "";
              }
              $("#tableLaporanDataKomisi > tbody:last-child").append(
                "<tr>"+
                  "<td nowrap>"+AvValue.id_transaksi+"</td>"+
                  "<td nowrap>"+AvValue.kode_order+"</td>"+
                  "<td nowrap>"+tanggal+"</td>"+
                  "<td nowrap>"+AvValue.nama_pelanggan+"</td>"+
                  "<td nowrap>"+parseFloat(AvValue.jumlah_berat).toLocaleString()+"</td>"+
                  "<td nowrap>"+AvValue.ukuran+"</td>"+
                  "<td nowrap>"+AvValue.merek+"</td>"+
                  "<td nowrap>"+parseFloat(AvValue.jumlah_harga).toLocaleString()+"</td>"+
                  "<td nowrap>"+totalLembar5.toLocaleString()+"</td>"+
                  "<td nowrap>"+totalLembar2.toLocaleString()+"</td>"+
                  "<td nowrap>"+totalLembar1.toLocaleString()+"</td>"+
                  "<td nowrap>"+totalLembar8.toLocaleString()+"</td>"+
                  "<td nowrap>"+totalLembar05.toLocaleString()+"</td>"+
                  "<td nowrap>"+parseFloat(AvValue.potongan_harga).toLocaleString()+"</td>"+
                  "<td nowrap>"+parseFloat(AvValue.diskon_persen).toLocaleString()+" % </td>"+
                  "<td nowrap>"+parseFloat(AvValue.lembar_5_persen).toLocaleString()+"</td>"+
                  "<td nowrap>"+parseFloat(AvValue.lembar_2_persen).toLocaleString()+"</td>"+
                  "<td nowrap>"+parseFloat(AvValue.lembar_1_persen).toLocaleString()+"</td>"+
                  "<td nowrap>"+parseFloat(AvValue.lembar_8_persen).toLocaleString()+"</td>"+
                  "<td nowrap>"+parseFloat(AvValue.lembar_05_persen).toLocaleString()+"</td>"+
                  "<td>"+action+"</td>"+
                "</tr>"
              );
            });

            $("#tableLaporanDataKomisi > tbody:last-child").append(
              "<tr>"+
                "<td></td>"+
                "<td></td>"+
                "<td></td>"+
                "<td><strong>Total</strong></td>"+
                "<td><strong>"+totalJumlahBerat.toLocaleString()+"</strong></td>"+
                "<td></td>"+
                "<td></td>"+
                "<td></td>"+
                "<td><strong>"+totalJumlahLembar5.toLocaleString()+"</strong></td>"+
                "<td><strong>"+totalJumlahLembar2.toLocaleString()+"</strong></td>"+
                "<td><strong>"+totalJumlahLembar1.toLocaleString()+"</strong></td>"+
                "<td><strong>"+totalJumlahLembar8.toLocaleString()+"</strong></td>"+
                "<td><strong>"+totalJumlahLembar05.toLocaleString()+"</td>"+
                "<td></td>"+
                "<td></td>"+
                "<td><strong>"+totalLembar5Persen.toLocaleString()+"</strong></td>"+
                "<td><strong>"+totalLembar2Persen.toLocaleString()+"</strong></td>"+
                "<td><strong>"+totalLembar1Persen.toLocaleString()+"</strong></td>"+
                "<td><strong>"+totalLembar8Persen.toLocaleString()+"</strong></td>"+
                "<td><strong>"+totalLembar05Persen.toLocaleString()+"</strong></td>"+
                "<td></td>"+
              "</tr>"
            );

            $("#colWrapper").empty();
            $.each(response.TotalPerJenis, function(AvIndex, AvValue){
              $("#colWrapper").append(
                "<div class='col-md-2'>"+
                  "<table class='table'>"+
                    "<tr>"+
                      "<td width='10%'>"+AvValue.nama_jenis+"</td>"+
                      "<td width='1%'>:</td>"+
                      "<td id='td"+AvValue.nama_jenis+"'>"+parseFloat(AvValue.Jumlah).toLocaleString()+"</td>"+
                    "</tr>"+
                  "</table>"+
                "</div>"
              );
            });
            if(response.marking == "FALSE"){
              $("#btnPrint").attr("disabled","disabled").removeAttr("href");
              $("#btnExport").attr("disabled","disabled").removeAttr("href");
              $("#btnApprove").attr("onclick","setujuiKomisiSales('"+param+"','"+param2+"','"+param3+"','FINISH')")
                              .removeClass("btn-warning")
                              .addClass("btn-danger")
                              .html("<i class='fa fa-check'></i> Setujui");
            }else{
              $("#btnPrint").attr("href","<?php echo base_url('_marketing/main/printLaporanDataOrderSales/'); ?>"+param+"/"+param2+"/"+param3)
                            .removeAttr("disabled");
              $("#btnExport").attr("href","<?php echo base_url('_marketing/main/exportLaporanDataOrderSales/'); ?>"+param+"/"+param2+"/"+param3)
                            .removeAttr("disabled");
              $("#btnApprove").attr("onclick","setujuiKomisiSales('"+param+"','"+param2+"','"+param3+"','PROGRESS')")
                              .removeClass("btn-danger")
                              .addClass("btn-warning")
                              .html("<i class='fa fa-refresh'></i> Revisi");
            }
          },
          error : function(response){
            $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
            $("#notifInput").addClass("callout-danger in");
            setTimeout(function(){
              $("#notifInput").alert('close');
              $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
              $("#notifInputText").text("");
            }, 2500);
          }
        });
      }

      function setujuiKomisiSales(param, param2, param3, param4){
        if(param4 == "FINISH"){
          var confirmText = "Apakah Anda Yakin Sudah Tidak Ada Yang Salah?";
        }else{
          var confirmText = "Apakah Anda Yakin Akan Merevisi Laporan Ini?";
        }

        if(confirm(confirmText)){
          $.ajax({
            type : "POST",
            url : "<?php echo base_url('_marketing/main/approveLaporanTransaksiKomisiSales') ?>",
            dataType : "TEXT",
            data : {
              idSales : param,
              tglAwal : param2,
              tglAkhir : param3,
              statusTransaksi : param4
            },
            success : function(response){
              if($.trim(response) === "Berhasil"){
                $("#notifInputText").text("Berhasil");
                $("#notifInput").addClass("callout-info in");
                resetFormKomisi();
                setTimeout(function(){
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }else{
                $("#notifInputText").text("Gagal");
                $("#notifInput").addClass("callout-danger in");
                setTimeout(function(){
                  $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                  $("#notifInputText").text("");
                }, 2500);
              }
            },
            error : function(response){
              $("#notifInputText").text("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
              $("#notifInput").addClass("callout-danger in");
              setTimeout(function(){
                $("#notifInput").alert('close');
                $("#notifInput").removeClass("callout-info callout-danger callout-warning in");
                $("#notifInputText").text("");
              }, 2500);
            }
          });
        }
      }

      $('table').on('scroll', function () {
          $("#"+this.id+" > *").width($(this).width() + $(this).scrollLeft());
      });
      //============ Calculation Method (Finish) ============//
      </script>
      <script type="text/javascript">
      // console.log(
      //       kodeProduk + ' ' +
      //       kdBarang + ' ' +
      //       jumlah + ' ' +
      //       satuan + ' ' +
      //       harga + ' ' +
      //       mataUang + ' ' +
      //       warnaCetak + ' ' +
      //       dll + ' ' +
      //       strip + ' ' +
      //       kdHarga + ' ' +
      //       omsetKg + ' ' +
      //       omsetLembar + ' ' +
      //       potongan + ' ' +
      //       diskon + ' ' +
      //       cn + ' ' +
      //       merek
      //     );
        function tambahBarangBaru(){
          var kodeProduk = $("#txtKdProduk").val();
          var kdBarang = $("#cmbBarangPack").val();
          var jumlah = $("#txtJumlah").val();
          var satuan = $("#cmbSatuan").val();
          var warnaCetak = $("#txtWarnaCetak").val();
          var dll = $("#txtDll").val();
          var strip = $("#txtStrip").val();
          var merek = $("#txtMerek").val();
          var omsetLembar = $("#txtOmsetLembar").val().replace(/,/gi,'');
          var omsetKg = $("#txtOmsetKg").val().replace(/,/gi,'');
          $.ajax({
            url: "<?=base_url('_marketing/main/tambahItemAneka');?>",
            method:"POST",
            dataType:"JSON",
            data: {
              kodeProduk:kodeProduk,
              kdBarang:kdBarang,
              jumlah:jumlah,
              satuan:satuan,
              warnaCetak:warnaCetak,
              dll:dll,
              strip:strip,
              omsetLembar:omsetLembar,
              omsetKg:omsetKg,
              merek:merek
            },
            success: function(response){
              if(response.Code == 200){
                  alert(response.Text);
                  tabelDaftarBarangAnekaPlastik();
                  $("input:required, textarea:required").val('');
                  $("#cmbBarang").empty();
                }else if(response.Code == 400){
                  alert(response.Text);
                }else{
                  alert(response.Text);
                }
            }
          });
        }

        function perbaruiKodeBarang(target){
          $.ajax({
            url : "<?= base_url('_marketing/main/perbaruiKodeBarang') ?>",
            dataType : "JSON",
            success : function(response){
              $(target).val(response.KodeBarang);
            }
          });
        }

        function simpanBarangBaru(){
          var kodeBarang = $("#txtKodeBarang").val();
          var namaBarang = $("#txtNamaBarang").val();
          var keterangan = $("#txtKeterangan").val();
          if(kodeBarang=="" || namaBarang==""){
            alert("Semua Kolom Tidak Boleh Kosong!");
          }else{
            $.ajax({
              type : "POST",
              url : "<?= base_url('_marketing/main/simpanBarangBaru'); ?>",
              dataType : "JSON",
              data : {
                kodeBarang : kodeBarang,
                namaBarang : namaBarang,
                keterangan : keterangan
              },
              success : function(response){
                if(response.Code == 200){
                  alert(response.Text);
                  $("a[href='#tab2']").show().click();
                  $("#txtKdProduk").val(kodeBarang);
                }else if(response.Code == 400){
                  alert(response.Text);
                }else{
                  alert(response.Text);
                }
              },
              error : function(response){
                alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
              }
            });
          }
        }

        function tabelDaftarBarangAnekaPlastik(){
          var kodeBarang = $("#txtKdProduk").val();
          $("[id=tableProdukAnekaItem] > tbody:last-child").empty();
          $.get("<?= base_url('_marketing/main/getDaftarBarangAnekaPlastik'); ?>",
          {kodeBarang : kodeBarang},
          function(response){
            var no = 1;
            $.each(response, function(AvIndex, AvValue){
              $("[id=tableProdukAnekaItem] > tbody:last-child").append(
                "<tr>"+
                  "<td>"+ no++ +"</td>"+
                  "<td>"+ AvValue.ukuran +' '+ AvValue.warna_plastik + ' ' + AvValue.nama_produk +"</td>"+
                  "<td>"+ AvValue.merek +"</td>"+
                  "<td>"+ parseFloat(AvValue.jumlah).toLocaleString()+" "+AvValue.satuan +"</td>"+
                  "<td>"+ AvValue.warna_cetak +"</td>"+
                  "<td>"+ AvValue.dll +"</td>"+
                  "<td>"+ AvValue.strip +"</td>"+
                  "<td>"+ AvValue.omset_kg+"</td>"+
                  "<td>"+ AvValue.omset_lembar+"</td>"+
                  "<td><button class='btn btn-danger' onclick=hapusAnekaItem('"+AvValue.id+"','"+kodeBarang+"')><i class='fa fa-trash'></i></button></td>"+
                  "<td><button class='btn btn-info' data-dismiss='modal' onclick='editAnekaItem("+AvValue.id+")'><i class='fa fa-pencil'></i></button></td>"+
                "</tr>"
              );
            });
          }, "JSON").error(function(){
            alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
          });
        }

        function tabelDaftarBarangAnekaPlastikModal(kd){
          if(typeof kd === 'undefined'){
            var kodeBarang = $("#txtKdProduk").val();
          } else {
            var kodeBarang = kd;
            $("#formWrapper").fadeOut();
          }

          $("[id=tableProdukAnekaItemModal] > tbody:last-child").empty();
          $.get("<?= base_url('_marketing/main/getDaftarBarangAnekaPlastik'); ?>",
          {kodeBarang : kodeBarang},
          function(response){
            var no = 1;
            $.each(response, function(AvIndex, AvValue){
              $("[id=tableProdukAnekaItemModal] > tbody:last-child").append(
                "<tr>"+
                  "<td>"+ no++ +"</td>"+
                  "<td>"+ AvValue.ukuran + " " + AvValue.nama_produk + " " + AvValue.warna_plastik +"</td>"+
                  "<td>"+ AvValue.merek +"</td>"+
                  "<td>"+ parseFloat(AvValue.jumlah).toLocaleString()+" "+AvValue.satuan +"</td>"+
                  "<td>"+ AvValue.warna_cetak +"</td>"+
                  "<td>"+ AvValue.dll +"</td>"+
                  "<td>"+ AvValue.strip +"</td>"+
                  "<td>"+ AvValue.omset_kg +"</td>"+
                  "<td>"+ AvValue.omset_lembar +"</td>"+
                  "<td><button class='btn btn-danger' onclick=hapusAnekaItem('"+AvValue.id+"','"+kodeBarang+"')><i class='fa fa-trash'></i></button></td>"+
                  "<td><button class='btn btn-info' data-dismiss='modal' onclick='editAnekaItem("+AvValue.id+")'><i class='fa fa-pencil'></i></button></td>"+
                "</tr>"
              );
            });
          }, "JSON").error(function(){
            alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
          });
        }

        function cekDaftarProdukAnekaPlastik(){
          var kodeProduk = $("#txtKodeBarang").val();
          if(kodeProduk != ""){
            $("#txtKdProduk").val(kodeProduk);
            tabelDaftarBarangAnekaPlastik();
          }
        }

        function hapusAnekaItem(id, kd){
          if (confirm('Kamu akan menghapus barang tersebut ?')) {
            $.get("<?=base_url('_marketing/main/hapusAnekaItem')?>",
              {itemId: id}, function(response){
                if(response.Code == 200){
                  alert(response.Text);
                  tabelDaftarBarangAnekaPlastik(kd);
                  tabelDaftarBarangAnekaPlastikModal(kd);
                }else if(response.Code == 400){
                  alert(response.Text);
                }else{
                  alert(response.Text);
                }
              }, "JSON").error(function(){
                alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
              });
          }
        }
        $("#btnTambahBarang").on('click', function(){
          $("#formWrapper").fadeIn();
        });
        function editAnekaItem(id){
          $.get("<?=base_url('_marketing/main/getAnekaItem')?>", {itemId:id}, function(response){
            $("#modalEditAnekaItem").modal()
            $.each(response, function(key, value){
              $("#txtJumlahEdit").val(value.jumlah);
              $("#cmbSatuanEdit").val(value.satuan);
              $("#txtWarnaCetakEdit").val(value.warna_cetak);
              $("#txtDllEdit").val(value.dll);
              $("#txtStripEdit").val(value.strip);
              $("#txtMerekEdit").val(value.merek);
              $("#txtOmsetKgEdit").val(value.omset_kg);
              $("#txtOmsetLembarEdit").val(value.omset_lembar);
              $("#txtIdEdit").val(value.id);
            });
          }, "JSON").error(function(){
            alert("Server Fault Error Code ( "+response.status+" ) "+response.statusText);
          });
        }
          if($("#tableMasterBarangAnekaPlastik").length > 0) {
            getDaftarBarangMaster();
          }
          function getDaftarBarangMaster(){
            $("#tableMasterBarangAnekaPlastik > tbody:last-child").empty();
            $.get("<?=base_url('_marketing/main/getDaftarBarang')?>", function(response){
              var no=1;
              $.each(response, function(key, value){
                $("#tableMasterBarangAnekaPlastik > tbody:last-child").append(
                  "<tr>"+
                    "<td>"+ no++ +"</td>"+
                    "<td>"+ value.nama_produk +"</td>"+
                    "<td>"+ value.keterangan +"</td>"+
                    "<td><button class='btn btn-danger' onclick=hapusBarang('"+value.kd_produk+"')><i class='fa fa-trash'></i></button>"+
                    "<button class='btn btn-info' onclick=editBarang('"+value.kd_produk+"')><i class='fa fa-pencil'></i></button>"+
                    "<button class='btn btn-warning' data-toggle='modal' data-target='#daftarAnekaItem' onclick=tabelDaftarBarangAnekaPlastikModal('"+value.kd_produk+"');><i class='fa fa-list'></i></button></td>"+
                  "</tr>"
                );
              });
              console.log(response);
            }, 'JSON');
          }
          function editBarang(kd){
            $.get("<?=base_url('_marketing/main/getSingleBarang');?>", {kd_produk:kd}, function(response){
              $("#modalEditMasterBarang").modal();
              $.each(response, function(key, value){
                $("#txtKodeProdukEdit").val(value.kd_produk);
                $("#txtNamaBarangEdit").val(value.nama_produk);
                $("#txtKeteranganEdit").val(value.keterangan);
              })
            }, "JSON");
          }
          function selesaiBarangBaru(){
            var kodeProduk = $("#txtKodeBarang").val();
            $.post("<?=base_url('_marketing/main/selesaiBarangBaru')?>",{kd_produk:kodeProduk}, function(response){
              if(response.Code == 200){
                  alert(response.Text);
                  window.location.reload();
                }else if(response.Code == 400){
                  alert(response.Text);
                }else{
                  alert(response.Text);
                }
            }, "JSON");
          }
          function selesaiEditBarang(){
            var kd_produk = $("#txtKodeProdukEdit").val();
            var nama_barang = $("#txtNamaBarangEdit").val();
            var keterangan = $("#txtKeteranganEdit").val();
            if(kd_produk != '' || nama_barang != '' ){
              $.post("<?=base_url('_marketing/main/selesaiEditBarang');?>",
              {
                kd_produk:kd_produk,
                nama_barang:nama_barang,
                keterangan:keterangan
              }, function(response){
                  if(response.Code == 200){
                    alert(response.Text);
                    $("#modalEditMasterBarang").modal('hide');
                    getDaftarBarangMaster();
                  }else if(response.Code == 400){
                    alert(response.Text);
                  }else{
                    alert(response.Text);
                }
              }, "JSON");
            } else {
              alert('Dilarang kosong!');
            }
          }
          function hapusBarang(kd_produk){
            if(confirm("Apakah anda yakin akan menghapus barang ?")){
                $.get("<?=base_url('_marketing/main/hapusBarang')?>", {kd_produk:kd_produk}, function(response){
                if(response.Code == 200){
                  alert(response.Text);
                  $("#modalEditAnekaItem").modal("hide");
                  getDaftarBarangMaster();
                } else if(response.Code == 400){
                  alert(response.Text);
                } else {
                  alert(response.Text);
                }
              }, "JSON");
            }
          }

          function selesaiEditItem(){
            var kdBarang = $("#cmbBarangEdit").val();
            var jumlah = $("#txtJumlahEdit").val().replace(/,/gi,''); //
            var satuan = $("#cmbSatuanEdit").val();
            var warna_cetak = $("#txtWarnaCetakEdit").val();
            var dll = $("#txtDllEdit").val();
            var strip = $("#txtStripEdit").val();
            var merek = $("#txtMerekEdit").val();
            var omset_kg = $("#txtOmsetKgEdit").val();
            var omset_lembar = $("#txtOmsetLembarEdit").val();
            var id = $("#txtIdEdit").val();
              $.post("<?=base_url('_marketing/main/selesaiEditItem');?>",
                {
                  kdBarang:kdBarang,
                  jumlah:jumlah,
                  satuan:satuan,
                  warna_cetak:warna_cetak,
                  dll:dll,
                  strip:strip,
                  merek:merek,
                  omset_kg:omset_kg,
                  omset_lembar:omset_lembar,
                  id:id

                }, function(response){
                  if(response.Code == 200){
                      alert(response.Text);
                      getDaftarBarangMaster();
                    } else if(response.Code == 400){
                      alert(response.Text);
                    } else {
                      alert(response.Text);
                    }
                }, "JSON");
            }

            $(function(){
              $("#cmbBarangPack").select2({
                placeholder : "Pilih Ukuran",
                width : "100%",
                allowClear : true,
                cache : false,
                ajax:{
                  url : "<?php echo base_url() ?>_marketing/main/getGudangHasilLike",
                  dataType : "json",
                  delay : 0,
                  processResults: function(data){
                    return{
                      results : $.map(data, function(item){
                        if(item.jenis == "MINYAK" || item.jenis == "CAT MURNI"){
                          return{
                            text:item.nm_barang +" - "+ item.warna +" - "+ item.status +" - "+ item.jenis,
                            id:item.kd_gd_bahan
                          }
                        }else{
                            return{
                              text:item.ukuran +" - "+ item.warna_plastik +" - "+ item.tebal +" - "+ item.merek +" - "+ item.jns_brg,
                              id:item.kd_gd_hasil
                            }
                        }
                      })
                    };
                  },
                }
              });
            });
      </script>

      <script type="text/javascript">
        function checkAllData(param){
          if($("#checkAllData").is(":checked")){
            $(".checkData").prop("checked",true);

          }else{
            $(".checkData").prop("checked",false);
          }
        }
      </script>
    </body>
</html>
