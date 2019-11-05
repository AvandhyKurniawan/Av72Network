<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$NamaFile.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<h3><?php echo $NamaFile; ?></h3>
<table width="100%" border="1">
  <thead>
    <tr>
      <th rowspan="2" style="vertical-align:middle;">Tanggal</th>
      <th rowspan="2" style="vertical-align:middle;">Customer</th>
      <th rowspan="2" style="vertical-align:middle;">Ukuran</th>
      <th rowspan="2" style="vertical-align:middle;">Warna</th>
      <th rowspan="2" style="vertical-align:middle;">Merek</th>
      <th rowspan="2" style="vertical-align:middle;">Lembar</th>
      <th colspan="2"><center>Berat</center></th>
      <th rowspan="2" style="vertical-align:middle;">Berat Pengambilan</th>
      <th colspan="3"><center>Pipa</center></th>
      <th rowspan="2" style="vertical-align:middle;">Sisa</th>
      <th colspan="3"><center>Sisa Pipa</center></th>
      <th rowspan="2" style="vertical-align:middle;">Apal</th>
      <th rowspan="2" style="vertical-align:middle;">Pipa</th>
      <th rowspan="2" style="vertical-align:middle;">Plus/Minus</th>
    </tr>
    <tr>
      <th>Kotor</th>
      <th>Bersih</th>
      <th>Bobin</th>
      <th>Payung</th>
      <th>Payung Kuning</th>
      <th>Bobin</th>
      <th>Payung</th>
      <th>Payung Kuning</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Data as $arrValue): ?>
      <tr>
        <td valign="middle"><?php echo $arrValue["tgl_rencana"]; ?></td>
        <td valign="middle"><?php echo $arrValue["customer"]; ?></td>
        <td valign="middle"><?php echo $arrValue["ukuran"]; ?></td>
        <td valign="middle"><?php echo $arrValue["warna_plastik"]; ?></td>
        <td valign="middle"><?php echo $arrValue["merek"]; ?></td>
        <td valign="middle"><?php echo $arrValue["jumlah_lembar"]; ?></td>
        <td valign="middle"><?php echo number_format($arrValue["hasil_berat_kotor"],2); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["hasil_berat_bersih"],2); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["beratPengambilan"],2); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["bobinPengambilan"],0); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["payungPengambilan"],0); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["payungKuningPengambilan"],0); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["berat_sisa_hari_ini"],2); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["bobin_sisa_hari_ini"],0); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["payung_sisa_hari_ini"],0); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["payung_kuning_sisa_hari_ini"],0); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["jumlah_apal_global"],2); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["jumlah_roll_pipa"],0); ?></td>
        <td valign="middle"><?php echo number_format($arrValue["plusminus"],0); ?></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<p>Note : Untuk Ukuran Tumpuk Berat Pengambilannya Belum Terhitung (Masih Sedang Dalam Pengerjaan)</p>
