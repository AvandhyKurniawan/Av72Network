<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Produksi Terintegrasi</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  </head>
  <body>
    <div id="laporan" style="display:block;">
      <div class="col-md-6">
        <table class="table table-responsive">
          <tr>
            <td width="18%">Kode Sales</td>
            <td width="1%">:</td>
            <td id="tdKodeSales"><?php echo $DetailSales[0]["kode_sales"]; ?></td>
          </tr>
          <tr>
            <td>Nama Sales</td>
            <td>:</td>
            <td id="tdNamaSales"><?php echo $DetailSales[0]["nama_lengkap"]; ?></td>
          </tr>
          <tr>
            <td>Periode</td>
            <td>:</td>
            <td id="tdPeriode">
              <?php
                $tglAwal = date("d-m-Y",strtotime($this->uri->rsegment(4)));
                $tglAkhir = date("d-m-Y",strtotime($this->uri->rsegment(5)));

                echo $tglAwal." / ".$tglAkhir;
              ?>
            </td>
          </tr>
        </table>
      </div>
      <div class="col-md-6">
        <div class="col-md-10">
          <center>
            <div style="padding:0; margin:0; width:50; float:left;">
              <img src="<?php echo base_url("assets/images/logo_plastik_black.png") ?>" class="img-responsive img-circle" width="50px" height="50px">
            </div>
            <h3 style="margin-top:13px;"><strong>PT. KLIP PLASTIK INDONESIA</strong></h3>
            <h4><strong>Laporan Perhitungan Komisi Penjualan Sales</strong></h4>
          </center>
        </div>
      </div>
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-responsive table-striped table-bordered" id="tableLaporanDataKomisi" border='1'>
            <thead>
              <th>No</th>
              <th>Kode Order</th>
              <th>Tanggal</th>
              <th>Nama Pelanggan</th>
              <th>Berat</th>
              <th>Ukuran</th>
              <th>Merek</th>
              <th>Harga</th>
              <th>Jumlah Rupiah 5%</th>
              <th>Jumlah Rupiah 2%</th>
              <th>Jumlah Rupiah 1%</th>
              <th>Jumlah Rupiah 0.8%</th>
              <th>Jumlah Rupiah 0.5%</th>
              <th>Potongan</th>
              <th>Diskon</th>
              <th>Lembar 5%</th>
              <th>Lembar 2%</th>
              <th>Lembar 1%</th>
              <th>Lembar 0.8%</th>
              <th>Lembar 0.5%</th>
            </thead>
            <tbody>
              <?php
                $no = 1;

                $totalJumlahBerat = 0;

                $totalJumlahLembar8 = 0;
                $totalJumlahLembar5 = 0;
                $totalJumlahLembar2 = 0;
                $totalJumlahLembar1 = 0;
                $totalJumlahLembar05 = 0;

                $totalJumlahHarga8 = 0;
                $totalJumlahHarga5 = 0;
                $totalJumlahHarga2 = 0;
                $totalJumlahHarga1 = 0;
                $totalJumlahHarga05 = 0;

                foreach ($ListOrder["data"] as $arrData) {
                  $jumlahHarga8 = 0;
                  $jumlahHarga5 = 0;
                  $jumlahHarga2 = 0;
                  $jumlahHarga1 = 0;
                  $jumlahHarga05 = 0;


                  $totalJumlahBerat += floatval($arrData["jumlah_berat"]);
                  $totalJumlahLembar8 += floatval($arrData["lembar_8_persen"]);
                  $totalJumlahLembar5 += floatval($arrData["lembar_5_persen"]);
                  $totalJumlahLembar2 += floatval($arrData["lembar_2_persen"]);
                  $totalJumlahLembar1 += floatval($arrData["lembar_1_persen"]);
                  $totalJumlahLembar05 += floatval($arrData["lembar_05_persen"]);

                  if(floatval($arrData["lembar_8_persen"]) > 0){
                    if($arrData["jenis_harga"] == "KG"){
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["jumlah_berat"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["jumlah_berat"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }else{
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["lembar_8_persen"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["lembar_8_persen"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }
                    $jumlahHarga8 = $jumlahHarga;
                    $totalJumlahHarga8 += $jumlahHarga8;
                  }
                  if(floatval($arrData["lembar_5_persen"]) > 0){
                    if($arrData["jenis_harga"] == "KG"){
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["jumlah_berat"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["jumlah_berat"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }else{
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["lembar_5_persen"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["lembar_5_persen"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }
                    $jumlahHarga5 = $jumlahHarga;
                    $totalJumlahHarga5 += $jumlahHarga5;
                  }
                  if(floatval($arrData["lembar_2_persen"]) > 0){
                    if($arrData["jenis_harga"] == "KG"){
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["jumlah_berat"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["jumlah_berat"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }else{
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["lembar_2_persen"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["lembar_2_persen"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }
                    $jumlahHarga2 = $jumlahHarga;
                    $totalJumlahHarga2 += $jumlahHarga2;
                  }
                  if(floatval($arrData["lembar_1_persen"]) > 0){
                    if($arrData["jenis_harga"] == "KG"){
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["jumlah_berat"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["jumlah_berat"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }else{
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["lembar_1_persen"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["lembar_1_persen"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }
                    $jumlahHarga1 = $jumlahHarga;
                    $totalJumlahHarga1 += $jumlahHarga1;
                  }
                  if(floatval($arrData["lembar_05_persen"]) > 0){
                    if($arrData["jenis_harga"] == "KG"){
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["jumlah_berat"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["jumlah_berat"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }else{
                      $jumlahHarga = (
                                          ((floatval($arrData["jumlah_harga"]) * floatval($arrData["lembar_05_persen"])) - floatval($arrData["hasil_diskon"]))
                                          -
                                          (floatval($arrData["lembar_05_persen"]) * floatval($arrData["potongan_harga"]))
                                        );
                    }
                    $jumlahHarga05 = $jumlahHarga;
                    $totalJumlahHarga05 += $jumlahHarga05;
                  }
              ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $arrData["kode_order"]; ?></td>
                  <td><?php echo date("d-m-Y",strtotime($arrData["tgl_order"])); ?></td>
                  <td><?php echo $arrData["nama_pelanggan"]; ?></td>
                  <td><?php echo number_format(floatval($arrData["jumlah_berat"]),2); ?></td>
                  <td><?php echo $arrData["ukuran"]; ?></td>
                  <td><?php echo $arrData["merek"]; ?></td>
                  <td><?php echo number_format(floatval($arrData["jumlah_harga"]),2); ?></td>
                  <td><?php echo number_format(floatval($arrData["potongan_harga"]),2); ?></td>
                  <td><?php echo number_format(floatval($jumlahHarga8)); ?></td>
                  <td><?php echo number_format(floatval($jumlahHarga5)); ?></td>
                  <td><?php echo number_format(floatval($jumlahHarga2)); ?></td>
                  <td><?php echo number_format(floatval($jumlahHarga1)); ?></td>
                  <td><?php echo number_format(floatval($jumlahHarga05)); ?></td>
                  <td><?php echo floatval($arrData["diskon_persen"])."%"; ?></td>
                  <td><?php echo number_format(floatval($arrData["lembar_5_persen"]),2); ?></td>
                  <td><?php echo number_format(floatval($arrData["lembar_2_persen"]),2); ?></td>
                  <td><?php echo number_format(floatval($arrData["lembar_1_persen"]),2); ?></td>
                  <td><?php echo number_format(floatval($arrData["lembar_8_persen"]),2); ?></td>
                  <td><?php echo number_format(floatval($arrData["lembar_05_persen"]),2); ?></td>
                </tr>
              <?php
                }
              ?>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Total</b></td>
                <td><b><?php echo number_format(floatval($totalJumlahBerat),2); ?></b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><b><?php echo number_format(floatval($totalJumlahLembar5),2); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahLembar2),2); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahLembar1),2); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahLembar8),2); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahLembar05),2); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahHarga5)); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahHarga2)); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahHarga1)); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahHarga8)); ?></b></td>
                <td><b><?php echo number_format(floatval($totalJumlahHarga05)); ?></b></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-md-12" style="margin-top: 15px;">
        <?php
          // $DL = 0;
          // $PST = 0;
          // $CST = 0;
          // $PKPS = 0;
          // $CKPS = 0;
          // $CB = 0;
          // $PLLB = 0;
          // $PLLK = 0;
          // $CLLB = 0;
          // $CLLK = 0;
          // $CABE = 0;
          // $ES = 0;
          // $HDPLOS = 0;
          // $HCT = 0;
          // $LL = 0;
          // $POND = 0;
          foreach ($TotalPerJenis as $arrTotalPerJenis) {
          //   if($arrTotalPerJenis["nama_jenis"] == "DL"){
          //     $DL = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "PST"){
          //     $PST = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "CST"){
          //     $CST = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "PKPS"){
          //     $PKPS = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "CKPS"){
          //     $CKPS = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "CB"){
          //     $CB = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "PLLB"){
          //     $PLLB = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "PLLK"){
          //     $PLLK = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "CLLB"){
          //     $CLLB = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "CLLK"){
          //     $CLLK = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "CABE"){
          //     $CABE = number_format($arrTotalPerJenis["jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "ES"){
          //     $ES = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "HDPLOS"){
          //     $HDPLOS = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "HCT"){
          //     $HCT = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "LL"){
          //     $LL = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          //   if($arrTotalPerJenis["nama_jenis"] == "POND"){
          //     $POND = number_format($arrTotalPerJenis["Jumlah"],2);
          //   }
          // }
        ?>
        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%"><?php echo $arrTotalPerJenis["nama_jenis"]; ?></td>
              <td width="1%">:</td>
              <td id="td<?php echo $arrTotalPerJenis["nama_jenis"]; ?>"><?php echo number_format($arrTotalPerJenis["Jumlah"],2); ?></td>
            </tr>
          </table>
        </div>

        <!-- <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">PST</td>
              <td width="1%">:</td>
              <td id="tdPST"><?php //echo $PST; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">CST</td>
              <td width="1%">:</td>
              <td id="tdCST"><?php //echo $CST; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">PKPS</td>
              <td width="1%">:</td>
              <td id="tdPKPS"><?php //echo $PKPS; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">CKPS</td>
              <td width="1%">:</td>
              <td id="tdCKPS"><?php //echo $CKPS; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">CB</td>
              <td width="1%">:</td>
              <td id="tdCB"><?php //echo $CB; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">PLLB</td>
              <td width="1%">:</td>
              <td id="tdPLLB"><?php //echo $PLLB; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">PLLK</td>
              <td width="1%">:</td>
              <td id="tdPLLK"><?php //echo $PLLK; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">CLLB</td>
              <td width="1%">:</td>
              <td id="tdCLLB"><?php //echo $CLLB; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">CLLK</td>
              <td width="1%">:</td>
              <td id="tdCLLK"><?php //echo $CLLK; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">CABE</td>
              <td width="1%">:</td>
              <td id="tdCABE"><?php //echo $CABE; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">ES</td>
              <td width="1%">:</td>
              <td id="tdES"><?php //echo $ES; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">HDPLOS</td>
              <td width="1%">:</td>
              <td id="tdHDPLOS"><?php //echo $HDPLOS; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">HCT</td>
              <td width="1%">:</td>
              <td id="tdHCT"><?php //echo $HCT; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">LL</td>
              <td width="1%">:</td>
              <td id="tdLL"><?php //echo $LL; ?></td>
            </tr>
          </table>
        </div>

        <div class="col-md-2">
          <table class="table">
            <tr>
              <td width="10%">POND</td>
              <td width="1%">:</td>
              <td id="tdPOND"><?php //echo $POND; ?></td>
            </tr>
          </table>
        </div> -->
      <?php } ?>
      </div>
    </div>
    <script type="text/javascript">
      window.print();
      window.onafterprint = function () {
                              window.close();
                            }
    </script>
  </body>
</html>
