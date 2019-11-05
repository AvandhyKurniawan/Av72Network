<?php
$cnFlag = 0;
$potonganFlag = 0;
foreach ($arrDataPesananDetail as $arrData) {
  if(!empty($arrData["cn"])){
    $cnFlag++;
  }
  if($arrData["potongan"]>0 || $arrData["diskon"]>0){
    $potonganFlag++;
  }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <title>Faktur Pesanan Dengan No. Order : <?php echo $this->uri->rsegment(3); ?></title>
    <style>
    body{
      font-family: Arial, Helvetica, sans-serif, Times;
      font-weight: bold;
    }
      .col-md-6{
        width: 49.99%;
        height: auto;
        float: left;
        margin: 0;
        padding: 0;
        /* border: 1px solid #000; */
      }
      .col-md-12{
        width: 100%;
        height: auto;
        float: left;
        margin: 0;
        padding: 0;
        /* border: 1px solid #000; */
      }
      .col-md-11 {
        width: 91.66666667%;
        height: auto;
        float: left;
        position: relative;
        margin: 0;
        padding: 0;
      }
      .col-md-10 {
        width: 80%;
        height: auto;
        float: left;
        position: relative;
        margin: 0;
        padding: 0;
      }
      .col-md-9{
        width: 75%;
        height: auto;
        float: left;
        position: relative;
        margin: 0;
        padding: 0;
        /* border: 1px solid #000; */
      }
      .col-md-3{
        width: 24.8%;
        height: auto;
        float: left;
        position: relative;
        margin: 0;
        padding: 0;
      }
      .col-md-4{
        width: 33.333%;
        height: auto;
        float: left;
        position: relative;
        margin: 0;
        padding: 0;
      }
      .col-md-2 {
        width: 19.666%;
        height: auto;
        float: left;
        position: relative;
        margin: 0;
        padding: 0;
      }
      .img{
        position: relative;
        top: 0;
        right: 0;
        width: 40px;
        height: 40px;
      }
      .company-name{
        position: relative;
        top: 0;
        left: 1;
        height:10px;
        font-size: 12px;
        margin-bottom: 10px;
      }
      .address{
        position: relative;
        font-size: 10px;
      }
      .text-wrapper{
        position: relative;
        float: left;
        width: 80%;
        margin-top: 10px;
      }
      .img-wrapper{
        position: relative;
        float: left;
        width: 13%;
      }
      hr{
        margin: 5px 0 5px  0;
        padding: 0;
      }
      .table-pesanan tr td, .table-pesanan tr th{
        border: 1px solid #1c1c1c;
        font-size: 11px;
        /* font-weight: bold; */
        border-collapse: collapse;
        padding-left: 3px;
      }
      .table-pesanan{
        border: 1px solid #1c1c1c;
        font-size: 11px;
        font-weight: bold;
        border-collapse: collapse;
      }
      .rounded-rect{
        border: 1px solid #000;
        border-radius: 10px;
        margin-left: 5px;
        position: relative;
        padding: 3px;
        min-height: 530px;
      }

      .content-wrapper{
        float: left;
        /* border: 1px solid #000; */
        min-height: 400px;
        /* page-break-inside:avoid !important; */
      }
      .signature-wrapper{
        float: left;
        position: relative;
        width: 100%;
        height: auto;
        border: 1px solid #000;
        border-radius: 10px;
      }
      .signature{
        padding-top: 40px;
        padding-left: 5px;
        padding-right: 5px;
        padding-bottom: 0;
        width: 100%;
        margin: 0;
        /* border: 1 solid #000; */
      }
      ul {
        margin: 12px;
        padding: 0;
        font-size: 10px;
      }
    </style>
  </head>
  <body>
    <div class="col-md-6">
      <div class="img-wrapper">
        <img src="<?= base_url('assets/images/LOGO_KLIP_PLASTIK.jpg'); ?>" class="img" alt="" width="40px" height="40px">
      </div>
      <div class="text-wrapper">
        <div class="company-name">PT. KLIP PLASTIK INDONESIA</div>
        <div class="address">
          Jl. Yos Sudarso No. 115 A (Daan Mogot Km. 19) Batu Ceper, Tangerang
          Telp.: 5518899 (Hunting), 5404656, 5404657 Fax : 5513905 <br>
          Homepage : http://www.klipplastik.co.id <br>
          Email : sales@klipplastik.co.id
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="col-md-6">
        <h5 style="border: 1px solid #000; padding:3px 5px 3px 5px; text-align:center; margin:0;">SURAT PESANAN</h5>
        <h6 style="margin:0; margin-top:3px; text-align:center;"><?php echo $arrDataPesanan[0]["no_order"]." ".$arrDataPesanan[0]["pajak"]." ".$arrDataPesanan[0]["jns_order"]; ?></h6>
      </div>
      <div class="col-md-6">
        <h6 style="margin-left:5px; margin-top:0; margin-bottom: 0;">KETERANGAN : </h6>
        <div class="address" style="margin-left:5px;">
          Setiap order selalu ada toleransi ukuran dan jumlah pesanan.<br>
          Approval : <?php echo $arrDataPesanan[0]["proof"]; ?> <?php echo "(".$arrDataPesanan[0]["ket_proof"].")"; ?>
        </div>
      </div>
    </div>
    <div class="col-md-12" style="min-height: 635px;">
      <hr style="margin: 10px 0 10px 0;">
      <div class="col-md-10">
        <div class="content-wrapper">
          <table width="100%" class="table-pesanan">
            <tr>
              <td width="18%">TANGGAL</td>
              <td width="1%"><center>:</center></td>
              <td><?php echo $arrDataPesanan[0]["tgl_pesan"]; ?></td>
              <td width="10%">No. PO</td>
              <td width="1%"><center>:</center></td>
              <td width="25%"><?php echo $arrDataPesanan[0]["no_po"]; ?></td>
            </tr>
            <tr>
              <td>NAMA PEMESAN</td>
              <td><center>:</center></td>
              <td><?php echo $arrDataPesanan[0]["nm_perusahaan"]; ?></td>
              <td>Telp.</td>
              <td><center>:</center></td>
              <td><?php echo $arrDataPesanan[0]["tlp_kantor"]; ?></td>
            </tr>
            <tr>
              <td>ALAMAT</td>
              <td><center>:</center></td>
              <td colspan="4"><?php echo $arrDataPesanan[0]["alamat"]; ?></td>
            </tr>
          </table>

          <table class="table-pesanan" style="margin-top:5px;" width="100%">
            <thead>
              <tr>
                <th rowspan="2" width="7%"><center>QTY</center></th>
                <th rowspan="2" width="8%"><center>SATUAN</center></th>
                <th rowspan="2" width="13%"><center>MEREK</center></th>
                <th rowspan="2" width="12%"><center>NAMA PRODUK</center></th>
                <th rowspan="2" width="7%"><center>HARGA <br>( <?php echo $arrDataPesanan[0]["mata_uang"]; ?> )</center></th>
                <?php
                if($cnFlag > 0){
                  echo "<th rowspan='2' ><center>CN</center></th>";
                }
                if($potonganFlag > 0){
                  echo "<th colspan='2' width='25%'><center>POTONGAN</center></th>";
                }
                ?>
                <th colspan="5"><center>ISI PRODUK</center></th>
                <th colspan="2"><center>OMSET</center></th>
              </tr>
              <tr>
                <?php
                if($potonganFlag > 0){
                  echo "<th><center>".$arrDataPesanan[0]["mata_uang"]."</center></th>
                  <th><center>Disc.</center></th>";
                }
                ?>
                <th width="10%"><center>PRODUK</center></th>
                <th width="5%"><center>LMBR</center></th>
                <th width="5%"><center>WARNA CETAK</center></th>
                <th width="5%"><center>STRIP</center></th>
                <th width="5%"><center>DLL</center></th>
                <th width="5%"><center>KG.</center></th>
                <th width="5%"><center>LMBR.</center></th>
              </tr>
            </thead>
            <tbody style="font-size:14px !important;">
              <?php
              foreach ($arrDataPesananDetail as $arrData):
              if(strpos($arrData["ukuran"],"/") !== FALSE){
                $arrUkuran = explode("/",$arrData["ukuran"]);
                $arrUkuranPrimer = explode("x",strtolower($arrUkuran[0]));
                $arrUkuranSekunder = explode("x",strtolower($arrUkuran[1]));
                $panjang = "<u>".$arrUkuranPrimer[0]."</u><br>".$arrUkuranSekunder[0];
                $lebar = "<u>".$arrUkuranPrimer[1]."</u><br>".$arrUkuranSekunder[1];
              }else{
                $arrUkuran = explode("x",strtolower($arrData["ukuran"]));
                $panjang = $arrUkuran[0];
                $lebar = $arrUkuran[1];
              }
              ?>
              <tr>
                <td>
                  <center>
                    <?php
                    if(strpos($arrData["jumlah"],'.0') !== FALSE){
                      echo substr($arrData["jumlah"],0,strlen($arrData["jumlah"])-2);
                    }else{
                      echo $arrData["jumlah"];
                    }
                    ?>
                  </center>
                </td>
                <td><center><?php echo $arrData["satuan"]; ?></center></td>
                <td><center><?php echo str_replace("\n","<br>",$arrData["merek"]); ?></center></td>
                <td>
                  <?php if(!empty($arrData["namaProduk"])):?>
                    <center>
                      <?=$arrData["namaProduk"];?>
                      <p style="color: rgba(200, 0, 0, 1);"><?php echo "(VARIASI)"; ?></p>
                    </center>
                  <?php endif;?>
                  <center>
                    <?php if(!empty($arrData["merekProduk"])): ?>
                      <?php echo $arrData["merekProduk"]; ?><br>
                      <p style="color: rgba(200, 0, 0, 1);"><?php echo "(".$arrData["jns_brg"].")"; ?></p>
                    <?php endif;?>
                  </center>
                </td>
                <td>
                  <center>
                    <?php
                    if(substr($arrData["harga"],strlen($arrData["harga"])-2, 2) == ".0"){
                      echo number_format(substr($arrData["harga"],0,strlen($arrData["harga"])-3));
                    }else{
                      echo number_format($arrData["harga"],2);
                    }
                    ?>
                  </center>
                </td>
                <?php
                if($cnFlag > 0){
                  // if(substr($arrData["cn"],strlen($arrData["cn"])-2, 2) == ".0"){
                  //   echo "<td><center>".number_format(substr($arrData["cn"],0,strlen($arrData["cn"])-3))."</center></td>";
                  // }else{
                  echo "<td><center>".$arrData["cn"]."</center></td>";
                  // }
                }
                if($potonganFlag > 0){
                  if(substr($arrData["potong"],strlen($arrData["potong"])-2, 2) == ".0" || substr($arrData["diskon"],strlen($arrData["diskon"])-2, 2) == ".0"){
                    echo "<td><center>".number_format(substr($arrData["potong"],0,strlen($arrData["potong"])-3))."</center></td>";
                    echo "<td><center>".number_format(substr($arrData["diskon"],0,strlen($arrData["diskon"])-3))."</center></td>";
                  }else{
                    echo "<td><center>".number_format($arrData["potong"],2)."</center></td>";
                    echo "<td><center>".number_format($arrData["diskon"],2)."</center></td>";
                  }
                }
                ?>

                <td>
                  <?php foreach($arrDataListItem as $listItem):?>
                    <p style="min-height: 20px; height:20px; max-height:40px;"><?=$listItem['ukuran']. ' ' . $listItem['merek'] . ' ' . $listItem['warna_plastik']?></p>
                    <hr>
                  <?php endforeach;?>
                </td>
                <td>
                  <?php foreach($arrDataListItem as $listItem):?>
                    <p style="min-height: 20px; height:20px; max-height:40px;"><?=number_format($listItem['jumlah']);?></p>
                    <hr>
                  <?php endforeach;?>
                </td>
                <td>
                  <?php foreach($arrDataListItem as $listItem):?>
                    <p style="min-height: 20px; height:20px; max-height:40px;"><?=$listItem['warna_cetak']?></p>
                    <hr>
                  <?php endforeach;?>
                </td>
                <td>
                  <?php foreach($arrDataListItem as $listItem):?>
                    <p style="min-height: 20px; height:20px; max-height:40px;"><?=$listItem['strip']?></p>
                    <hr>
                  <?php endforeach;?>
                </td>
                <td>
                  <?php foreach($arrDataListItem as $listItem):?>
                    <p style="min-height: 20px; height:20px; max-height:40px;"><?=$listItem['dll']?></p>
                    <hr>
                  <?php endforeach;?>
                </td>
                <td>
                  <?php foreach($arrDataListItem as $listItem):?>
                    <p style="min-height: 20px; height:20px; max-height:40px;"><?=$listItem['omset_kg']?></p>
                    <hr>
                  <?php endforeach;?>
                </td>
                <td>
                  <?php foreach($arrDataListItem as $listItem):?>
                    <p style="min-height: 20px; height:20px; max-height:40px;"><?=number_format($listItem['omset_lembar'])?></p>
                    <hr>
                  <?php endforeach;?>
                </td>
              </tr>
            <?php endforeach; ?>

            <tr>
              <td style="border:0" colspan="<?= ($potonganFlag > 0) ? '10' : '8'  ?>"></td>
              <td colspan="2" style="text-align:center;">Total Omset : </td>
              <td><?=$totalPesanan * $totalOmset[0]['total_omset_kg'];?></td>
              <td><?=$totalPesanan * $totalOmset[0]['total_omset_lembar'];?></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="col-md-12">
        <div class="col-md-6">
          <table width="100%" class="table-pesanan" style="border: 0;">
            <tr>
              <td style="height:20px; border:0;" width="35%">Uang Muka. </td>
              <td style="height:20px; border:0;" width="1%">:</td>
              <td style="height:20px; border:0; padding-left:5px;">
                <p><?php echo $arrDataPesanan[0]["mata_uang"]." ".$arrDataPesanan[0]["dp"]; ?></p>
              </td>
            </tr>
          </table>
          <p style="font-size:9px; width:75%; margin-top:0;">(Uang muka tidak dapat dikembalikan apabila order dibatalkan oleh pemesan).</p>
        </div>
        <div class="col-md-6">
          <table width="100%" class="table-pesanan" style="border: 0;">
            <tr>
              <td style="height:20px; border:0;" width="35%">Tgl. Penyerahan</td>
              <td style="height:20px; border:0;" width="1%">:</td>
              <td style="height:20px; border:0; padding-left:5px;">
                <p><?php echo $arrDataPesanan[0]["tgl_estimasi"]; ?></p>
              </td>
            </tr>
            <tr>
              <td style="height:20px; border:0;">Syarat Pembayaran</td>
              <td style="height:20px; border:0;">:</td>
              <td style="height:20px; border:0; padding-left:5px;">
                <p><?php echo $arrDataPesanan[0]["payment_method"]; ?></p>
              </td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-md-12">
        <div class="signature-wrapper">
          <div class="col-md-4">
            <div class="signature">
              <hr style="margin:0; padding:0; width: 95%;">
              <p style="font-size:10px; font-weight:bold; padding:0; margin:0; text-align:center;">
                <?php echo $arrDataPesanan[0]["nm_pemesan"]; ?>
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <p></p>
          </div>
          <div class="col-md-4">
            <div class="signature">
              <hr style="margin:0; padding:0; width: 95%;">
              <p style="font-size:10px; font-weight:bold; padding:0; margin:0; text-align:center;">
                Salesman ( <?php echo $arrDataPesanan[0]["sales"]; ?> )
              </p>
            </div>
          </div>
        </div>
        <p style="font-size:9px; margin:0;">Uang muka harap ditulis jika tidak ditanggung sepenuhnya oleh pemesan</p>
      </div>
    </div>
    <div class="col-md-2">
      <div class="rounded-rect">
        <p style="text-align:center; margin:0; padding:0; font-size:11px; text-decoration:underline;">Expedisi</p>
        <p style="font-size:10px; margin:0; padding:0;">
          <?php echo str_replace("\n","<br>",$arrDataPesanan[0]["expedisi"]); ?>
        </p>
        <?php
        if(empty($arrDataPesanan[0]["foto_1"]) && empty($arrDataPesanan[0]["foto_2"])){
          ?>
          <div style="width:100px; height:120px; margin-top:10px;">
            <a href="<?= base_url('assets/images/klip.jpg'); ?>" target="_blank">
              <img src="<?= base_url('assets/images/klip.jpg'); ?>" width="100px" height="120px;">
            </a>
          </div>
          <?php
        }else{
          if(!empty($arrDataPesanan[0]["foto_1"])){
            ?>
            <div style="width:100px; height:120px; margin-top:10px;">
              <a href="<?php echo base_url('assets/images/upload/'.$arrDataPesanan[0]["foto_1"]); ?>" target="_blank">
                <img src="<?php echo base_url('assets/images/upload/'.$arrDataPesanan[0]["foto_1"]); ?>" width="100px" height="120px;">
              </a>
            </div>
            <?php
          }else{
            ?>
            <div style="width:100px; height:120px; margin-top:10px;">
              <a href="<?php echo base_url('assets/images/upload/'.$arrDataPesanan[0]["foto_2"]); ?>" target="_blank">
                <img src="<?php echo base_url('assets/images/upload/'.$arrDataPesanan[0]["foto_2"]); ?>" width="100px" height="120px;">
              </a>
            </div>
            <?php
          }
        }
        ?>
        <div style="margin:0; margin-top:10px; padding:0; font-size:10px;">
          <?php echo $arrDataPesanan[0]["note"]; ?>
        </div>
      </div>
    </div>

    </div>
  </body>
</html>