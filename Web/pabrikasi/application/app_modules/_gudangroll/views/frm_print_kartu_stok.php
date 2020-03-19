<?php
$totalBeratMasuk = 0;
$totalBobinMasuk = 0;
$totalPayungMasuk = 0;
$totalPayungKuningMasuk = 0;

$totalBeratKeluar = 0;
$totalBobinKeluar = 0;
$totalPayungKeluar = 0;
$totalPayungKuningKeluar = 0;

$totalBeratKembalian = 0;
$totalBobinKembalian = 0;
$totalPayungKembalian = 0;
$totalPayungKuningKembalian = 0;

$totalSubBeratSaldo = 0;
$totalSubBobinSaldo = 0;
$totalSubPayungSaldo = 0;
$totalSubPayungKuningSaldo = 0;

$totalBeratSaldo = 0;
$totalBobinSaldo = 0;
$totalPayungSaldo = 0;
$totalPayungKuningSaldo = 0;
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kartu Stok</title>
    <style media="all">
      .text-blue {
        color: #0073b7 !important;
      }
      h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
        font-family: 'Source Sans Pro',sans-serif;
      }
      .h3, h3 {
        font-size: 24px;
        margin: 0;
      }
      .table{
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
        border-collapse: collapse;
        float: left;
      }
      .table-bordered>tbody>tr>td,
      .table-bordered>tbody>tr>th,
      .table-bordered>tfoot>tr>td,
      .table-bordered>tfoot>tr>th,
      .table-bordered>thead>tr>td,
      .table-bordered>thead>tr>th {
        border: 1px solid #000;
      }
      .table>tbody>tr>td,
      .table>tbody>tr>th,
      .table>tfoot>tr>td,
      .table>tfoot>tr>th,
      .table>thead>tr>td,
      .table>thead>tr>th {
        padding: 3px;
        line-height: 1.42857143;
        vertical-align: top;
      }
      .pull-right {
        float: right !important;
      }
      .pull-left {
        float: left !important;
      }
    </style>
  </head>
  <body>
    <div class="pull-left" style="width:90%;">
      <h3 class="text-blue">Kartu Stok</h3>
      <table class="table">
        <tr>
          <td width="20%">Nama Barang</td>
          <td> :
            <?php
            echo $dataDetailBarang[0]["ukuran"]." ".$dataDetailBarang[0]["merek"]." ".$dataDetailBarang[0]["warna_plastik"];
            ?>
          </td>
        </tr>
        <tr>
          <td>Status Barang</td>
          <td> :
            <?php
            echo $dataDetailBarang[0]["jns_brg"]." ".$dataDetailBarang[0]["jns_permintaan"];
            ?>
          </td>
        </tr>
        <tr>
          <td>Periode</td>
          <td> :
            <?php
            $arrBulan = array("Januari","Februari","Maret","April","Mei","Juni",
            "Juli","Agustus","September","Oktober","November","Desember");
            $tglAwal = $this->uri->rsegment(3);
            $tglAkhir = $this->uri->rsegment(4);

            $arrTglAwal = explode("-",$tglAwal);
            $arrTglAkhir = explode("-",$tglAkhir);

            $bulan = $arrBulan[intval($arrTglAkhir[1])-1];

            $tglAwalMod = $arrTglAwal[2]." ".$arrBulan[intval($arrTglAwal[1])-1]." ".$arrTglAwal[0];
            $tglAkhirMod = $arrTglAkhir[2]." ".$arrBulan[intval($arrTglAkhir[1])-1]." ".$arrTglAkhir[0];

            echo $tglAwalMod." - ".$tglAkhirMod;
            ?>
          </td>
        </tr>
      </table>
    </div>
    <div class="pull-left">
      <img src="<?php echo base_url('assets/images/LOGO_KLIP_PLASTIK.jpg'); ?>" class="img-logo" width="100px" height="100px">
    </div>
    <table class="table table-bordered" border="1">
      <thead>
        <tr>
          <th rowspan="2" style="vertical-align:middle;"><center>Tanggal</center></th>
          <th rowspan="2" style="vertical-align:middle;" width="20%"><center>Keterangan Transaksi</center></th>
          <th colspan="4"><center>Masuk</center></th>
          <th colspan="4"><center>Keluar</center></th>
          <th colspan="4"><center>Kembali</center></th>
          <th colspan="4"><center>Saldo</center></th>
        </tr>
        <tr>
          <th>KG</th>
          <th>B</th>
          <th>P</th>
          <th>PK</th>
          <th>KG</th>
          <th>B</th>
          <th>P</th>
          <th>PK</th>
          <th>KG</th>
          <th>B</th>
          <th>P</th>
          <th>PK</th>
          <th>KG</th>
          <th>B</th>
          <th>P</th>
          <th>PK</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($dataKartuStok["saldoAwal"] as $arrSaldoAwal){
            $totalBeratMasuk += floatval($arrSaldoAwal["saldoAwalBerat"]);
            $totalBobinMasuk += intval($arrSaldoAwal["saldoAwalBobin"]);
            $totalPayungMasuk += intval($arrSaldoAwal["saldoAwalPayung"]);
            $totalPayungKuningMasuk += intval($arrSaldoAwal["saldoAwalPayungKuning"]);

            $totalSubBeratSaldo += floatval($arrSaldoAwal["saldoAwalBerat"]);
            $totalSubBobinSaldo += intval($arrSaldoAwal["saldoAwalBobin"]);
            $totalSubPayungSaldo += intval($arrSaldoAwal["saldoAwalPayung"]);
            $totalSubPayungKuningSaldo += intval($arrSaldoAwal["saldoAwalPayungKuning"]);
        ?>
        <tr>
          <td></td>
          <td>Saldo Awal Bulan <?php echo $bulan; ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo (floatval($arrSaldoAwal["saldoAwalBerat"]) != 0) ? floatval($arrSaldoAwal["saldoAwalBerat"]) : ""; ?></td>
          <td><?php echo ($arrSaldoAwal["saldoAwalBobin"] != 0) ? $arrSaldoAwal["saldoAwalBobin"] : ""; ?></td>
          <td><?php echo ($arrSaldoAwal["saldoAwalPayung"] != 0) ? $arrSaldoAwal["saldoAwalPayung"] : ""; ?></td>
          <td><?php echo ($arrSaldoAwal["saldoAwalPayungKuning"] != 0) ? $arrSaldoAwal["saldoAwalPayungKuning"] : ""; ?></td>
        </tr>
        <?php } ?>
        <?php
          foreach ($dataKartuStok["dataTransaksi"] as $arrDataKartuStok) {
            $totalBeratMasuk += floatval($arrDataKartuStok["beratMasuk"]);
            $totalBobinMasuk += intval($arrDataKartuStok["bobinMasuk"]);
            $totalPayungMasuk += intval($arrDataKartuStok["payungMasuk"]);
            $totalPayungKuningMasuk += intval($arrDataKartuStok["payungKuningMasuk"]);

            $totalSubBeratSaldo += (
                                    (floatval($arrDataKartuStok["beratMasuk"]) + floatval($arrDataKartuStok["beratKembalian"]) + floatval($arrDataKartuStok["beratSelisihTambah"])) -
                                    (floatval($arrDataKartuStok["beratKeluar"]) + floatval($arrDataKartuStok["beratOperatorCetak"]) + floatval($arrDataKartuStok["beratSelisihKurang"]))
                                   );

            $totalSubBobinSaldo += (
                                    (intval($arrDataKartuStok["bobinMasuk"]) + intval($arrDataKartuStok["bobinKembalian"]) + intval($arrDataKartuStok["bobinSelisihTambah"])) -
                                    (intval($arrDataKartuStok["bobinKeluar"]) + intval($arrDataKartuStok["bobinOperatorCetak"]) + intval($arrDataKartuStok["bobinSelisihKurang"]))
                                   );

            $totalSubPayungSaldo += (
                                     (intval($arrDataKartuStok["payungMasuk"]) + intval($arrDataKartuStok["payungKembalian"]) + intval($arrDataKartuStok["payungSelisihTambah"])) -
                                     (intval($arrDataKartuStok["payungKeluar"]) + intval($arrDataKartuStok["payungOperatorCetak"]) + intval($arrDataKartuStok["payungSelisihKurang"]))
                                    );
            $totalSubPayungKuningSaldo += (
                                           (intval($arrDataKartuStok["payungKuningMasuk"]) + intval($arrDataKartuStok["payungKuningKembalian"]) + intval($arrDataKartuStok["payungKuningSelisihTambah"])) -
                                           (intval($arrDataKartuStok["payungKuningKeluar"]) + intval($arrDataKartuStok["payungKuningOperatorCetak"]) + intval($arrDataKartuStok["payungKuningSelisihKurang"]))
                                          );
        ?>
        <tr>
          <td><?php echo $arrDataKartuStok["tgl_transaksi"]; ?></td>
          <td></td>
          <td><?php echo (floatval($arrDataKartuStok["beratMasuk"]) != 0) ? floatval($arrDataKartuStok["beratMasuk"]) : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["bobinMasuk"] != 0) ? $arrDataKartuStok["bobinMasuk"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungMasuk"] != 0) ? $arrDataKartuStok["payungMasuk"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungKuningMasuk"] != 0) ? $arrDataKartuStok["payungKuningMasuk"] : ""; ?></td>
          <td><?php echo (floatval($arrDataKartuStok["beratKeluar"]) != 0) ? floatval($arrDataKartuStok["beratKeluar"]) : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["bobinKeluar"] != 0) ? $arrDataKartuStok["bobinKeluar"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungKeluar"] != 0) ? $arrDataKartuStok["payungKeluar"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungKuningKeluar"] != 0) ? $arrDataKartuStok["payungKuningKeluar"] : ""; ?></td>
          <td><?php echo (floatval($arrDataKartuStok["beratKembalian"]) != 0) ? floatval($arrDataKartuStok["beratKembalian"]) : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["bobinKembalian"] != 0) ? $arrDataKartuStok["bobinKembalian"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungKembalian"] != 0) ? $arrDataKartuStok["payungKembalian"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungKuningKembalian"] != 0) ? $arrDataKartuStok["payungKuningKembalian"] : ""; ?></td>
          <td><?php echo $totalSubBeratSaldo; ?></td>
          <td><?php echo $totalSubBobinSaldo; ?></td>
          <td><?php echo $totalSubPayungSaldo; ?></td>
          <td><?php echo $totalSubPayungKuningSaldo; ?></td>
        </tr>
        <?php
          if(floatval($arrDataKartuStok["beratOperatorCetak"]) != 0){
        ?>
        <tr>
          <td><?php echo $arrDataKartuStok["tgl_transaksi"]; ?></td>
          <td>OPERATOR CETAK</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo (floatval($arrDataKartuStok["beratOperatorCetak"]) != 0) ? floatval($arrDataKartuStok["beratOperatorCetak"]) : ""; ?></td>
          <td><?php echo (intval($arrDataKartuStok["bobinOperatorCetak"]) != 0) ? intval($arrDataKartuStok["bobinOperatorCetak"]) : ""; ?></td>
          <td><?php echo (intval($arrDataKartuStok["payungOperatorCetak"]) != 0) ? intval($arrDataKartuStok["payungOperatorCetak"]) : ""; ?></td>
          <td><?php echo (intval($arrDataKartuStok["payungKuningOperatorCetak"]) != 0) ? intval($arrDataKartuStok["payungKuningOperatorCetak"]) : ""; ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php
          }
        ?>
        <?php
          if($arrDataKartuStok["beratSelisihTambah"] != 0){
        ?>
        <tr>
          <td><?php echo $arrDataKartuStok["tgl_transaksi"]; ?></td>
          <td>MASUK KE GUDANG (SELISIH TAMBAH)</td>
          <td><?php echo (floatval($arrDataKartuStok["beratSelisihTambah"]) != 0) ? floatval($arrDataKartuStok["beratSelisihTambah"]) : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["bobinSelisihTambah"] != 0) ? $arrDataKartuStok["bobinSelisihTambah"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungSelisihTambah"] != 0) ? $arrDataKartuStok["payungSelisihTambah"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungKuningSelisihTambah"] != 0) ? $arrDataKartuStok["payungKuningSelisihTambah"] : ""; ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php
          }
        ?>

        <?php
          if($arrDataKartuStok["beratSelisihKurang"] != 0){
        ?>
        <tr>
          <td><?php echo $arrDataKartuStok["tgl_transaksi"]; ?></td>
          <td>MASUK KE GUDANG (SELISIH KURANG)</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td><?php echo (floatval($arrDataKartuStok["beratSelisihKurang"]) != 0) ? floatval($arrDataKartuStok["beratSelisihKurang"]) : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["bobinSelisihKurang"] != 0) ? $arrDataKartuStok["bobinSelisihKurang"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungSelisihKurang"] != 0) ? $arrDataKartuStok["payungSelisihKurang"] : ""; ?></td>
          <td><?php echo ($arrDataKartuStok["payungKuningSelisihKurang"] != 0) ? $arrDataKartuStok["payungKuningSelisihKurang"] : ""; ?></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <?php
          }
        ?>
      <?php } ?>
      <!-- <tr>
        <th></th>
        <th>Total</th>
        <th><?php # echo $totalBeratMasuk; ?></th>
        <th><?php # echo $totalBobinMasuk; ?></th>
        <th><?php # echo $totalPayungMasuk; ?></th>
        <th><?php # echo $totalPayungKuningMasuk; ?></th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
        <th>0</th>
      </tr> -->
      </tbody>
    </table>

    <script type="text/javascript">
        window.print();
        window.onafterprint = function () {  window.close(); }
    </script>
  </body>
</html>
