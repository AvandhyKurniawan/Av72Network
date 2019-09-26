<?php
class Locking_Model extends CI_Model{
  #=========================Select Function (Start)=========================#
  public function selectListGudangHasil($param){
    $Q = "SELECT TGH.kd_gd_hasil, TGH.customer, TGH.merek, TGH.ukuran, TGH.warna,
                 GROUP_CONCAT(TGH.tgl_transaksi SEPARATOR '|') AS tgl_transaksi,
                 GROUP_CONCAT(TGH.jumlah_berat SEPARATOR '|') AS jumlah_berat,
                 GROUP_CONCAT(TGH.jumlah_lembar SEPARATOR '|') AS jumlah_lembar,
                 SUM(TGH.jumlah_berat) AS total_jumlah_berat,
                 SUM(TGH.jumlah_lembar) AS total_jumlah_lembar
          FROM transaksi_gudang_hasil TGH
          INNER JOIN gudang_hasil GH ON TGH.kd_gd_hasil = GH.kd_gd_hasil
          WHERE GH.deleted='FALSE'
          AND TGH.deleted='FALSE'
          AND TGH.sts_barang='$param[stsBarang]'
          AND TGH.status_history='MASUK'
          AND TGH.status_transaksi='FINISH'
          AND TGH.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
          GROUP BY TGH.kd_gd_hasil
          ORDER BY TGH.tgl_transaksi ASC";

    $Q2 = "SELECT COUNT(TGH.id_permintaan_jadi) AS CounterLock
          FROM transaksi_gudang_hasil TGH
          INNER JOIN gudang_hasil GH ON TGH.kd_gd_hasil = GH.kd_gd_hasil
          WHERE GH.deleted='FALSE'
          AND TGH.deleted='FALSE'
          AND TGH.sts_barang='$param[stsBarang]'
          AND TGH.status_history='MASUK'
          AND TGH.status_transaksi='FINISH'
          AND TGH.status_lock = 'TRUE'
          AND TGH.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

    $Q3 = "SELECT COUNT(TGH.id_permintaan_jadi) AS CounterTotalItem
          FROM transaksi_gudang_hasil TGH
          INNER JOIN gudang_hasil GH ON TGH.kd_gd_hasil = GH.kd_gd_hasil
          WHERE GH.deleted='FALSE'
          AND TGH.deleted='FALSE'
          AND TGH.sts_barang='$param[stsBarang]'
          AND TGH.status_history='MASUK'
          AND TGH.status_transaksi='FINISH'
          AND TGH.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";
    $result = $this->db->query($Q)->result_array();
    $result2 = $this->db->query($Q2)->result_array();
    $result3 = $this->db->query($Q3)->result_array();
    $data = array("TransaksiGudangHasil" => $result,
                  "CounterLock" => $result2,
                  "CounterTotalItem" => $result3);

    return json_encode($data);
  }

  public function selectListTransaksiGudangRollPolos($param){
    $Q = "SELECT TGR.tgl_transaksi, TGR.berat, TGR.bobin, TGR.payung, TGR.payung_kuning,
                 TGR.keterangan_history, TGR.keterangan_transaksi,
                 CONCAT(GR.ukuran, ' ',GR.merek, ' ',GR.warna_plastik) AS barang
          FROM transaksi_gudang_roll TGR
          INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
          WHERE TGR.deleted='FALSE'
          AND GR.deleted='FALSE'
          AND TGR.jns_permintaan='POLOS'
          AND TGR.keterangan_transaksi NOT IN('MASUK DARI CETAK')
          AND TGR.keterangan_history NOT IN('HASIL EXTRUDER')
          AND TGR.jns_permintaan = 'POLOS'
          AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

    $Q2 = "SELECT TGR.tgl_transaksi, TGR.berat, TGR.bobin, TGR.payung, TGR.payung_kuning,
                 TGR.keterangan_history, TGR.keterangan_transaksi, TGR.shift,
                 CONCAT(GR.ukuran, ' ',GR.merek, ' ',GR.warna_plastik) AS barang
          FROM transaksi_gudang_roll TGR
          INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
          WHERE TGR.deleted='FALSE'
          AND TGR.jns_permintaan='POLOS'
          AND GR.deleted='FALSE'
          AND TGR.keterangan_history IN('HASIL EXTRUDER')
          AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

     $Q3 = "SELECT COUNT(id) AS CounterLock FROM transaksi_gudang_roll TGR
            INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
            WHERE TGR.deleted='FALSE'
            AND TGR.jns_permintaan='POLOS'
            AND GR.deleted='FALSE'
            AND TGR.status_lock = 'TRUE'
            AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

     $Q4 = "SELECT COUNT(id) AS CounterTotalItem FROM transaksi_gudang_roll TGR
            INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
            WHERE TGR.deleted='FALSE'
            AND TGR.jns_permintaan='POLOS'
            AND GR.deleted='FALSE'
            AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

    $result = $this->db->query($Q)->result_array();
    $result2 = $this->db->query($Q2)->result_array();
    $result3 = $this->db->query($Q3)->result_array();
    $result4 = $this->db->query($Q4)->result_array();

    $array = array("TransaksiGudangRoll" => $result,
                   "TransaksiHasilExtruder" => $result2,
                   "CounterLock" => $result3[0]["CounterLock"],
                   "CounterTotalItem" => $result4[0]["CounterTotalItem"]);
    return json_encode($array);
  }

  public function selectListTransaksiGudangRollCetak($param){
    $Q = "SELECT TGR.tgl_transaksi, TGR.berat, TGR.bobin, TGR.payung, TGR.payung_kuning,
                 TGR.keterangan_history, TGR.keterangan_transaksi,
                 CONCAT(GR.ukuran, ' ',GR.merek, ' ',GR.warna_plastik) AS barang
          FROM transaksi_gudang_roll TGR
          INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
          WHERE TGR.deleted='FALSE'
          AND GR.deleted='FALSE'
          AND TGR.keterangan_transaksi NOT IN('MASUK DARI CETAK')
          AND TGR.keterangan_history NOT IN('HASIL EXTRUDER')
          AND TGR.jns_permintaan = 'CETAK'
          AND TGR.bagian = 'POTONG'
          AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

    $Q2 = "SELECT TGR.tgl_transaksi, TGR.berat, TGR.bobin, TGR.payung, TGR.payung_kuning,
                 TGR.keterangan_history, TGR.keterangan_transaksi,
                 CONCAT(GR.ukuran, ' ',GR.merek, ' ',GR.warna_plastik) AS barang
          FROM transaksi_gudang_roll TGR
          INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
          WHERE TGR.deleted='FALSE'
          AND GR.deleted='FALSE'
          AND TGR.keterangan_history IN('HASIL CETAK')
          AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

    $Q3 = "SELECT TGR.tgl_transaksi, TGR.berat, TGR.bobin, TGR.payung, TGR.payung_kuning,
                 TGR.keterangan_history, TGR.keterangan_transaksi,
                 CONCAT(GR.ukuran, ' ',GR.merek, ' ',GR.warna_plastik) AS barang
          FROM transaksi_gudang_roll TGR
          INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
          WHERE TGR.deleted='FALSE'
          AND GR.deleted='FALSE'
          AND TGR.jns_permintaan = 'POLOS'
          AND TGR.bagian = 'CETAK'
          AND TGR.keterangan_history IN('OPERATOR CETAK')
          AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

    $Q4 = "SELECT COUNT(id) AS CounterLock FROM transaksi_gudang_roll TGR
           INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
           WHERE TGR.deleted='FALSE'
           AND TGR.jns_permintaan='CETAK'
           AND GR.deleted='FALSE'
           AND TGR.status_lock = 'TRUE'
           AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

    $Q5 = "SELECT COUNT(id) AS CounterTotalItem FROM transaksi_gudang_roll TGR
           INNER JOIN gudang_roll GR ON TGR.kd_gd_roll = GR.kd_gd_roll
           WHERE TGR.deleted='FALSE'
           AND TGR.jns_permintaan='CETAK'
           AND GR.deleted='FALSE'
           AND TGR.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'";

    $result = $this->db->query($Q)->result_array();
    $result2 = $this->db->query($Q2)->result_array();
    $result3 = $this->db->query($Q3)->result_array();
    $result4 = $this->db->query($Q4)->result_array();
    $result5 = $this->db->query($Q5)->result_array();

    $array = array("TransaksiPotong" => $result,
                   "TransaksiHasilCetak" => $result2,
                   "TransaksiCetak" => $result3,
                   "CounterLock" => $result4[0]["CounterLock"],
                   "CounterTotalItem" => $result5[0]["CounterTotalItem"]);
    return json_encode($array);
  }

  public function selectListTransaksiGudangBahan($param){
    $this->datatables->select("TGB.tgl_permintaan, CONCAT(GB.nm_barang,' ',GB.warna) AS nm_barang,
                               TGB.jumlah_permintaan, TGB.keterangan_history");
    $this->datatables->from("transaksi_gudang_bahan TGB");
    $this->datatables->join("gudang_bahan GB","TGB.kd_gd_bahan = GB.kd_gd_bahan","INNER");
    $this->datatables->where("TGB.tgl_permintaan BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
                              AND GB.jenis = '$param[jenis]'
                              AND GB.deleted='FALSE'
                              AND TGB.deleted='FALSE'");
    $this->db->order_by("TGB.tgl_permintaan ASC");
    return $this->datatables->generate();
  }

  public function selectCounterTransaksiGudangBahan($param){
    $Q = "SELECT COUNT(TGB.id) AS COUNTER FROM transaksi_gudang_bahan TGB
          INNER JOIN gudang_bahan GB ON TGB.kd_gd_bahan = GB.kd_gd_bahan
          WHERE TGB.tgl_permintaan BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
          AND GB.jenis = '$param[jenis]'
          AND TGB.status_lock = 'TRUE'
          AND TGB.deleted='FALSE'
          AND GB.deleted='FALSE'";

    $arrData = $this->db->query($Q)->result_array();
    if($arrData[0]["COUNTER"] > 0){
      return "TRUE";
    }else{
      return "FALSE";
    }
  }

  public function selectListTransaksiGudangApal($param){
    $this->datatables->select("tgl_transaksi, merek, jumlah_apal, CONCAT(keterangan_history,' (',bagian,')') AS keterangan_history");
    $this->datatables->from("transaksi_detail_history_apal");
    $this->datatables->where("tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
                              AND deleted='FALSE'");
    $this->db->order_by("tgl_transaksi ASC");
    return $this->datatables->generate();
  }

  public function selectCounterTransaksiGudangApal($param){
    $Q = "SELECT COUNT(TDHA.id) AS COUNTER FROM transaksi_detail_history_apal TDHA
          INNER JOIN gudang_apal GA ON TDHA.kd_gd_apal = GA.kd_gd_apal
          WHERE TDHA.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
          AND TDHA.status_lock = 'TRUE'
          AND TDHA.deleted='FALSE'
          AND GA.deleted='FALSE'";

    $arrData = $this->db->query($Q)->result_array();
    if($arrData[0]["COUNTER"] > 0){
      return "TRUE";
    }else{
      return "FALSE";
    }
  }

  public function selectListTransaksiGudangSparePart($param){
    $this->datatables->select("TDSP.tgl_transaksi, CONCAT(SP.nm_spare_part,' ',SP.ukuran) AS nm_spare_part,
                               TDSP.jumlah, TDSP.keterangan_history");
    $this->datatables->from("transaksi_detail_spare_part TDSP");
    $this->datatables->join("spare_part SP","TDSP.kd_spare_part = SP.kd_spare_part","INNER");
    $this->datatables->where("TDSP.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
                              AND TDSP.deleted='FALSE'
                              AND SP.deleted='FALSE'");
    $this->db->order_by("tgl_transaksi ASC");
    return $this->datatables->generate();
  }

  public function selectCounterTransaksiGudangSparePart($param){
    $Q = "SELECT COUNT(TDSP.id) AS COUNTER FROM transaksi_detail_spare_part TDSP
          INNER JOIN spare_part SP ON TDSP.kd_spare_part = SP.kd_spare_part
          WHERE TDSP.tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
          AND TDSP.status_lock = 'TRUE'
          AND TDSP.deleted='FALSE'
          AND SP.deleted='FALSE'";

    $arrData = $this->db->query($Q)->result_array();
    if($arrData[0]["COUNTER"] > 0){
      return "TRUE";
    }else{
      return "FALSE";
    }
  }
  #=========================Select Function (Finish)=========================#

  #=========================Update Function (Start)=========================#
  public function updateTransaksiGudangRoll($param){
    $this->db->trans_begin();
    $this->db->query("UPDATE transaksi_gudang_roll SET status_lock='$param[statusLock]'
                      WHERE jns_permintaan='$param[jnsPermintaan]'
                      AND tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'");
    if($this->db->trans_status()===FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function updateTransaksiGudangHasil($param){
    $this->db->trans_begin();
    $this->db->query("UPDATE transaksi_gudang_hasil SET status_lock='$param[statusLock]'
                      WHERE sts_barang='$param[stsBarang]'
                      AND tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'");
    if($this->db->trans_status()===FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function updateTransaksiGudangBahan($param){
    $this->db->trans_begin();
    $this->db->query("UPDATE transaksi_gudang_bahan TGB
                      INNER JOIN gudang_bahan GB ON TGB.kd_gd_bahan = GB.kd_gd_bahan
                      SET TGB.status_lock='$param[stsLock]'
                      WHERE GB.jenis='$param[jenis]'
                      AND TGB.tgl_permintaan BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
                      AND TGB.deleted='FALSE'
                      AND GB.deleted='FALSE'");
    if($this->db->trans_status()===FALSE){
      $this->db->trans_rollback();
      return "FALSE";
    }else{
      $this->db->trans_commit();
      return "TRUE";
    }
  }

  public function updateTransaksiGudangApal($param){
    $this->db->trans_begin();
    $this->db->query("UPDATE transaksi_detail_history_apal
                      SET status_lock='$param[stsLock]'
                      WHERE tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
                      AND deleted='FALSE'");
    if($this->db->trans_status()===FALSE){
      $this->db->trans_rollback();
      return "FALSE";
    }else{
      $this->db->trans_commit();
      return "TRUE";
    }
  }

  public function updateTransaksiGudangSparePart($param){
    $this->db->trans_begin();
    $this->db->query("UPDATE transaksi_detail_spare_part
                      SET status_lock='$param[stsLock]'
                      WHERE tgl_transaksi BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]'
                      AND deleted='FALSE'");
    if($this->db->trans_status()===FALSE){
      $this->db->trans_rollback();
      return "FALSE";
    }else{
      $this->db->trans_commit();
      return "TRUE";
    }
  }
  #=========================Update Function (Finish)=========================#
}
?>
