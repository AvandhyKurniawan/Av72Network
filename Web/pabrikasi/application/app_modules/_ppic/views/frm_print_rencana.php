<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Print Rencana Kerja</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/iCheck/all.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/fixedheader/css/fixedHeader.bootstrap.min.css">
  </head>
  <body>
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-blue">
          Rencana Kerja <?php echo ucfirst(strtolower($Parameter["bagian"])); ?>
          Tanggal <?php echo date("d/m/Y",strtotime($Parameter["tgl_awal"]))." - ".date("d/m/Y",strtotime($Parameter["tgl_akhir"]));?>
        </h3>
        <table class="table table-responsive table-bordered table-striped">
          <thead>
            <th>Kode SPK</th>
            <th>Tgl. Permintaan</th>
            <th>Customer</th>
            <th>Merek</th>
            <th>Permintaan</th>
            <th>Ukuran</th>
            <th>Warna Plastik</th>
            <th>Berat</th>
            <th>Tebal</th>
            <th>Jumlah Permintaan</th>
            <th>Sisa</th>
            <th>Strip</th>
            <th>Jumlah Mesin</th>
            <th>Keterangan</th>
            <th>Gambar</th>
            <th>Status Pengerjaan</th>
          </thead>
          <tbody>
            <?php foreach ($Data["data"] as $arrData) {
            ?>
            <tr>
              <td><?php echo $arrData["kd_ppic"]; ?></td>
              <td><?php echo $arrData["tgl_rencana"]; ?></td>
              <td><?php echo $arrData["nm_cust"]; ?></td>
              <td><?php echo $arrData["merek"]; ?></td>
              <td><?php echo $arrData["jns_permintaan"]; ?></td>
              <td><?php echo $arrData["ukuran"]; ?></td>
              <td><?php echo $arrData["warna_plastik"]; ?></td>
              <td><?php echo $arrData["berat"]; ?></td>
              <td><?php echo $arrData["tebal"]; ?></td>
              <td><?php echo $arrData["jumlah_permintaan"]." ".$arrData["satuan"]; ?></td>
              <td><?php echo $arrData["sisa"]; ?></td>
              <td><?php echo $arrData["strip"]; ?></td>
              <td><?php echo $arrData["permintaan_mesin"]; ?></td>
              <td><?php echo $arrData["keterangan"]; ?></td>
              <td></td>
              <td><?php echo $arrData["sts_pengerjaan"]; ?> <b>[<?php echo $arrData["prioritas"]; ?></b>]</td>
            </tr>
            <?php
            } ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
  <script type="text/javascript">
    window.print();
    window.onafterprint = function () {  window.close(); }
  </script>
</html>
