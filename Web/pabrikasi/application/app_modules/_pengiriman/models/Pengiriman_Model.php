<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pengiriman_Model extends CI_Model{
  //============ Generated Code (Start) ============//
  //============ Generated Code (Finish) ============//

  //============ Insert Function (Start) ============//
  public function kirimBarangParsial($data,$no_order)
  {
    $this->db->trans_begin();
    $this->db->insert("detail_pengiriman_lk",$data);

    $tgl_kirim = date("Y-m-d H:i:s");
    //
    // $this->db->set("jumlah_kirim","jumlah_kirim + ".$data["jumlah_kirim"], FALSE);
    // $this->db->set("tgl_kirim",$tgl_kirim);
    // $this->db->where("id_dp",$data['id_dp']);
    // $this->db->update("pesanan_detail");

    $check = $this->db->query("SELECT PD.no_order,PD.jumlah, PD.satuan,
                                     SUM(IF(DPL.deleted='FALSE',DPL.jumlah_kirim,0)) AS jumlah_terkirim
                              FROM pesanan_detail PD
                              LEFT JOIN detail_pengiriman_lk DPL ON DPL.id_dp = PD.id_dp
                              WHERE PD.id_dp = '$data[id_dp]' AND PD.deleted='FALSE'")->result_array();

    if (floatval($check[0]["jumlah"]) <= floatval($check[0]["jumlah_terkirim"])) {
      $this->db->set("sts_kirim","TERKIRIM");
      $this->db->set("tgl_kirim",$tgl_kirim);
      $this->db->set("sts_pesanan","FINISH");
      $this->db->where("id_dp",$data['id_dp']);
      $this->db->update("pesanan_detail");
    }

    $counterFinish = $this->db->query("SELECT COUNT(id_dp) AS counter
                                       FROM pesanan_detail
                                       WHERE no_order='$no_order'
                                       AND sts_kirim='TERKIRIM'
                                       AND deleted='FALSE'
                                       AND sts_pesanan='FINISH'")->result_array();

    $counterTotal = $this->db->query("SELECT COUNT(id_dp) AS counter
                                      FROM pesanan_detail
                                      WHERE no_order='$no_order'
                                      AND deleted='FALSE'")->result_array();
    if($counterFinish[0]["counter"] == $counterTotal[0]["counter"]){
      $this->db->query("UPDATE pesanan SET sts_pesanan='FINISH', tgl_kirim='$tgl_kirim'
                        WHERE no_order='$no_order'");
    }

    if ($this->db->trans_status()===FALSE) {
      $this->db->trans_rollback();
      return "Gagal";
    }else{
      $this->db->trans_commit();
      return "Berhasil";
    }
  }
  //============ Insert Function (Finish) ============//

  //============ Select Function (Start) ============//
  public function selectListDataOrderCabangSiapDikirim(){
    $this->datatables->select("P.tgl_pesan, P.tgl_estimasi, P.nm_pemesan, PD.jumlah, P.no_order,
                               PD.jumlah_kirim, (PD.jumlah - PD.jumlah_kirim) AS sisa,PD.satuan,
                               GH.ukuran, GH.warna_plastik, PD.merek, PD.sts_pesanan, PD.id_dp,
                               PD.kd_gd_hasil, PD.kd_gd_bahan, GB.warna, GB.nm_barang,
                               P.no_order,P.no_po");
    $this->datatables->from("pesanan_detail PD");
    $this->datatables->where("P.deleted='FALSE' AND
                              PD.deleted='FALSE' AND
                              GH.deleted='FALSE' AND
                              P.approve_cabang='TRUE' AND
                              PD.sts_kirim != 'TERKIRIM' AND
                              P.sts_pesanan IN ('PROGRESS','PACKING')");
    $this->datatables->join("pesanan P","PD.no_order = P.no_order","INNER");
    $this->datatables->join("gudang_hasil GH","PD.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","PD.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->db->order_by("P.tgl_pesan","DESC");

    return $this->datatables->generate();
  }

  public function selectListDataOrderMarketingSiapDikirim($param){
    if($param == "DK"){
      $clause = "P.jns_order='$param' AND";
    }else if($param == "SKV"){
      $clause = "P.jns_order IN('SKV','OL') AND";
    }else{
      $clause = "P.jns_order IN('LK','LN') AND";
    }
    $this->datatables->select("DATE_FORMAT(P.tgl_pesan,'%d-%m-%Y') AS tgl_pesan, DATE_FORMAT(P.tgl_estimasi,,'%d-%m-%Y') AS tgl_estimasi,
                               IF(C.nm_perusahaan_update IS NULL, C.nm_perusahaan, C.nm_perusahaan_update) AS nm_perusahaan,
                               PD.jumlah, P.no_order,PD.satuan, P.kd_cust,
                               PD.jumlah_kirim, (PD.jumlah - PD.jumlah_kirim) AS sisa,
                               IF(PD.kd_pack IS NULL,GH.ukuran, '-') as ukuran, IF(PD.kd_pack IS NULL, GH.warna_plastik, '-') as warna_plastik, IF(PD.kd_pack IS NULL,PD.merek, AM.nama_produk) as merek, PD.sts_pesanan, PD.id_dp,
                               PD.kd_gd_hasil, PD.kd_gd_bahan, IF(PD.kd_pack IS NULL,GB.warna,'-') as warna, GB.nm_barang, P.no_order, P.kd_order");
    $this->datatables->from("pesanan_detail PD");
    $this->datatables->join("pesanan P","PD.no_order = P.no_order","INNER");
    $this->datatables->join("customer C","P.kd_cust = C.kd_cust","INNER");
    $this->datatables->join("produk_aneka_macam AM", "PD.kd_pack = AM.kd_produk", "LEFT");
    $this->datatables->join("gudang_hasil GH","PD.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","PD.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->datatables->where("P.deleted='FALSE' AND
                              PD.deleted='FALSE' AND
                              (GH.deleted='FALSE' OR GB.deleted='FALSE' OR AM.deleted='FALSE') AND
                              P.approve_cabang='FALSE' AND
                              $clause
                              PD.sts_kirim != 'TERKIRIM' AND
                              P.sts_pesanan IN ('PROGRESS','PACKING')");
    $this->db->order_by("P.tgl_pesan","DESC");

    return $this->datatables->generate();
  }

  public function selectListOrderBaruCabang(){
    $this->datatables->select("no_order, tgl_pesan, nm_pemesan, sts_pesanan");
    $this->datatables->from("pesanan");
    $this->datatables->where("approve_cabang='TRUE' AND
                              sts_pesanan='WAITING' AND
                              deleted='FALSE'");
    $this->db->order_by("tgl_pesan","DESC");
    return $this->datatables->generate();
  }

  public function selectListPantauOrderCabangGlobal(){
    $this->datatables->select("no_order, tgl_pesan, nm_pemesan, sts_pesanan, no_po, sts_print_pengiriman");
    $this->datatables->from("pesanan");
    $this->datatables->where("approve_cabang='TRUE' AND
                              deleted='FALSE'");
    $this->db->order_by("tgl_pesan","DESC");
    return $this->datatables->generate();
  }

  public function selectListPantauOrderLuarKota(){
    $this->datatables->select("PD.id_dp, P.tgl_pesan, P.tgl_estimasi, P.nm_pemesan, PD.jumlah, PD.jumlah_kirim,
                               (PD.jumlah - PD.jumlah_kirim) AS sisa, GH.ukuran, GH.warna_plastik,
                               PD.merek, PD.dll, PD.sts_pesanan, GB.nm_barang, GB.warna,
                               PD.kd_gd_hasil, PD.kd_gd_bahan, PD.satuan, P.no_po");
    $this->datatables->from("pesanan_detail PD");
    $this->datatables->join("pesanan P","PD.no_order = P.no_order","INNER");
    $this->datatables->join("gudang_hasil GH","PD.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","PD.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->datatables->where("PD.deleted='FALSE' AND
                              P.deleted='FALSE' AND
                              PD.sts_pesanan NOT IN ('WAITING') AND
                              P.jns_order = 'LK' AND
                              P.approve_cabang='FALSE'");
    $this->db->order_by("P.tgl_pesan","DESC");

    return $this->datatables->generate();
  }

  public function selectListDetailPesanan($param){
    $this->datatables->select("GH.ukuran, PD.merek, GH.warna_plastik, PD.warna_cetak,
                               GB.warna, PD.kd_gd_hasil, PD.kd_gd_bahan, PD.sm,
                               PD.dll, PD.jumlah, PD.satuan, PD.keterangan, PD.sts_pesanan,
                               PD.id_dp");
    $this->datatables->from("pesanan_detail PD");
    $this->datatables->join("pesanan P","PD.no_order = P.no_order","INNER");
    $this->datatables->join("gudang_hasil GH","PD.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","PD.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->datatables->where("P.deleted='FALSE' AND
                              PD.deleted='FALSE' AND
                              PD.no_order = '$param'");
    $this->db->order_by("PD.id_dp","ASC");
    return $this->datatables->generate();
  }

  public function selectDetailPesanan($param){
    $result = $this->db->query("SELECT * FROM pesanan_detail WHERE id_dp='$param' AND deleted='FALSE'")->result_array();
    return json_encode($result);
  }

  public function selectGudangHasilLike($param){
    $param2 = explode('|',trim($param));

    if(strtolower($param2[0])=="cat" OR strtolower($param2[0])=="minyak"){
      if(strtolower($param2[0])=="cat"){
        $jenis = "CAT MURNI";
      }else{
        $jenis = "MINYAK";
      }
      if(!empty($param2[1])){
        $clause = "AND
        (kd_gd_bahan LIKE '%$param2[1]%' OR
        nm_barang LIKE '%$param2[1]%' OR
        warna LIKE '%$param2[1]%') AND
        deleted='FALSE'";
      }else{
        $clause = "AND deleted ='FALSE'";
      }
      $arrGudangHasilLike = $this->db->query("SELECT kd_gd_bahan, nm_barang, warna, `status`, jenis
                                              FROM gudang_bahan
                                              WHERE `status`='LOKAL' AND jenis='$jenis' $clause");
      $result = $arrGudangHasilLike->result_array();
      return $result;
    }else{
      if(strpos($param, "|") === FALSE){
        $arrGudangHasilLike = $this->db->query("SELECT kd_gd_hasil,ukuran,warna_plastik,tebal,merek,jns_permintaan,jns_brg
                                                FROM gudang_hasil
                                                WHERE kd_gd_hasil LIKE '%$param%' OR
                                                ukuran LIKE '%$param%' OR
                                                warna_plastik LIKE '%$param%' OR
                                                tebal LIKE '%$param%' OR
                                                merek LIKE '%$param%' OR
                                                jns_permintaan LIKE '%$param%' OR
                                                jns_brg LIKE '%$param%'
                                                AND deleted='FALSE'");
      }else{
        $arrKey = explode("|",$param);
        $arrGudangHasilLike = $this->db->query("SELECT kd_gd_hasil,ukuran,warna_plastik,tebal,merek,jns_permintaan,jns_brg
                                                FROM gudang_hasil
                                                WHERE ukuran LIKE '%$arrKey[0]%'
                                                AND merek LIKE '%$arrKey[1]%'
                                                AND warna_plastik LIKE '%$arrKey[2]%'
                                                AND deleted='FALSE'");
      }
      $result = $arrGudangHasilLike->result_array();
      return $result;
    }
  }

  public function selectGudangHasilLimit20(){
    $this->db->select("kd_gd_hasil,warna_plastik,tebal,merek,jns_permintaan,jns_brg,ukuran");
    $this->db->limit(20);
    $arrGudangHasilLimit20 = $this->db->get_where("gudang_hasil",array("deleted"=>"FALSE"));
    return $arrGudangHasilLimit20->result_array();
  }

  public function selectListPantauOrderCabang(){
    $this->datatables->select("PD.id_dp, P.tgl_pesan, P.nm_pemesan, PD.jumlah, PD.jumlah_kirim,
                               (PD.jumlah - PD.jumlah_kirim) AS sisa, GH.ukuran, GH.warna_plastik,
                               PD.merek, PD.dll, PD.sts_pesanan, GB.nm_barang, GB.warna,
                               PD.kd_gd_hasil, PD.kd_gd_bahan, PD.satuan, P.no_po, P.no_order");
    $this->datatables->from("pesanan_detail PD");
    $this->datatables->join("pesanan P","PD.no_order = P.no_order","INNER");
    $this->datatables->join("gudang_hasil GH","PD.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","PD.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->datatables->where("PD.deleted='FALSE' AND
                              P.deleted='FALSE' AND
                              P.approve_cabang='TRUE' AND
                              PD.sts_pesanan NOT IN ('WAITING')");
    $this->db->order_by("P.tgl_pesan","DESC");

    return $this->datatables->generate();
  }

  public function selectListPantauOrderMarketing(){
    $this->datatables->select("PD.id_dp, P.tgl_pesan,
                               IF(C.nm_perusahaan_update IS NULL, C.nm_perusahaan, C.nm_perusahaan_update) AS nm_perusahaan,
                               PD.jumlah, PD.jumlah_kirim,
                               (PD.jumlah - PD.jumlah_kirim) AS sisa, GH.ukuran, GH.warna_plastik,
                               IF(PD.kd_pack IS NULL, PD.merek, AM.nama_produk) as merek, PD.dll, PD.sts_pesanan, GB.nm_barang, GB.warna,
                               PD.kd_gd_hasil, PD.kd_gd_bahan, PD.satuan, P.no_po, P.no_order");
    $this->datatables->from("pesanan_detail PD");
    $this->datatables->join("pesanan P","PD.no_order = P.no_order","INNER");
    $this->datatables->join("customer C","P.kd_cust = C.kd_cust","INNER");
    $this->datatables->join("produk_aneka_macam AM", "PD.kd_pack = AM.kd_produk", "LEFT");
    $this->datatables->join("gudang_hasil GH","PD.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","PD.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->datatables->where("PD.deleted='FALSE' AND
                              P.deleted='FALSE' AND
                              P.approve_cabang='FALSE' AND
                              PD.sts_pesanan NOT IN ('WAITING')");
    $this->db->order_by("P.tgl_pesan","DESC");

    return $this->datatables->generate();
  }

  public function selectPesananForPrintOrder($param){
    $result = $this->db->query("SELECT P.tgl_pesan, P.nm_pemesan, C.alamat, P.no_po,
                                       C.hp_purchasing, C.tlp_kantor, C.tlp_lainnya,
                                       P.no_order
                                FROM pesanan P
                                INNER JOIN customer C ON P.kd_cust = C.kd_cust
                                WHERE P.deleted = 'FALSE'
                                AND P.no_order='$param'
                                AND C.deleted='FALSE'")->result_array();
    $result2 = $this->db->query("SELECT PD.jumlah, GH.ukuran, PD.merek, GH.warna_plastik,
                                        PD.warna_cetak, PD.sm, PD.dll, PD.keterangan, GB.warna,
                                        PD.kd_gd_hasil,PD.satuan
                                 FROM pesanan_detail PD
                                 LEFT JOIN gudang_hasil GH ON PD.kd_gd_hasil = GH.kd_gd_hasil
                                 LEFT JOIN gudang_bahan GB ON PD.kd_gd_bahan = GB.kd_gd_bahan
                                 WHERE PD.deleted='FALSE'
                                 AND PD.no_order='$param'")->result_array();
    $data = array("Pesanan" => $result,
                  "PesananDetail" => $result2);
    return $data;
  }

  public function selectListHistoryOrderCabangGlobal($param){
    $this->datatables->select("no_order, tgl_pesan, nm_pemesan, sts_pesanan, no_po");
    $this->datatables->from("pesanan");
    $this->datatables->where("approve_cabang='TRUE' AND
                              tgl_pesan BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]' AND
                              deleted='FALSE'");
    $this->db->order_by("tgl_pesan","DESC");
    return $this->datatables->generate();
  }

  public function selectCountOrderBaruCabang(){
    $result = $this->db->query("SELECT COUNT(no_order) AS counter
                                FROM pesanan
                                WHERE approve_cabang='TRUE'
                                AND sts_pesanan='WAITING'
                                AND deleted='FALSE'")->result_array();
    return json_encode($result);
  }
  public function selectCountOrderMarketingDeadline($param){
    if ($param=="CBG") {
      $Q = "SELECT COUNT(id_dp) AS Counter FROM pesanan_detail PD
           INNER JOIN pesanan P ON PD.no_order = P.no_order
           LEFT JOIN gudang_hasil GH ON PD.kd_gd_hasil = GH.kd_gd_hasil
           LEFT JOIN gudang_bahan GB ON PD.kd_gd_bahan = GB.kd_gd_bahan
           WHERE P.deleted='FALSE'
           AND PD.deleted='FALSE'
           AND GH.deleted='FALSE'
           AND P.approve_cabang='TRUE'
           AND PD.sts_kirim != 'TERKIRIM'
           AND P.sts_pesanan IN ('PROGRESS','PACKING')
           AND PD.jumlah_kirim > 0";
      $result = $this->db->query($Q)->result_array();
      $dataForReturned = array("Counter" => $result[0]["Counter"]);
      return json_encode($dataForReturned);
    }else if($param=="DK" || $param=="LK" || $param=="LN"){
      $Q = "SELECT COUNT(id_dp) AS Counter FROM pesanan_detail PD
           INNER JOIN pesanan P ON PD.no_order = P.no_order
           LEFT JOIN gudang_hasil GH ON PD.kd_gd_hasil = GH.kd_gd_hasil
           LEFT JOIN gudang_bahan GB ON PD.kd_gd_bahan = GB.kd_gd_bahan
           WHERE P.deleted='FALSE'
           AND PD.deleted='FALSE'
           AND GH.deleted='FALSE'
           AND P.approve_cabang='FALSE'
           AND P.jns_order='$param'
           AND PD.sts_kirim != 'TERKIRIM'
           AND P.tgl_estimasi < NOW()
           AND P.sts_pesanan IN ('PROGRESS','PACKING')";
      $result = $this->db->query($Q)->result_array();
      $dataForReturned = array("Counter" => $result[0]["Counter"]);
      return json_encode($dataForReturned);
    }else{
      $Q = "SELECT COUNT(id_dp) AS Counter FROM pesanan_detail PD
           INNER JOIN pesanan P ON PD.no_order = P.no_order
           LEFT JOIN gudang_hasil GH ON PD.kd_gd_hasil = GH.kd_gd_hasil
           LEFT JOIN gudang_bahan GB ON PD.kd_gd_bahan = GB.kd_gd_bahan
           WHERE P.deleted='FALSE'
           AND PD.deleted='FALSE'
           AND GH.deleted='FALSE'
           AND P.approve_cabang='FALSE'
           AND P.jns_order IN ('SKV','OL')
           AND PD.sts_kirim != 'TERKIRIM'
           AND P.tgl_estimasi < NOW()
           AND P.sts_pesanan IN ('PROGRESS','PACKING')";
      $result = $this->db->query($Q)->result_array();
      $dataForReturned = array("Counter" => $result[0]["Counter"]);
      return json_encode($dataForReturned);
    }
  }
  public function selectCountOrderMarketingDeadlineGlobal(){
   $Q = "SELECT COUNT(id_dp) AS Counter FROM pesanan_detail PD
         INNER JOIN pesanan P ON PD.no_order = P.no_order
         LEFT JOIN gudang_hasil GH ON PD.kd_gd_hasil = GH.kd_gd_hasil
         LEFT JOIN gudang_bahan GB ON PD.kd_gd_bahan = GB.kd_gd_bahan
         WHERE P.deleted='FALSE'
         AND PD.deleted='FALSE'
         AND GH.deleted='FALSE'
         AND P.approve_cabang='FALSE'
         AND PD.sts_kirim != 'TERKIRIM'
         AND P.tgl_estimasi < NOW()
         AND P.jns_order NOT IN ('LK','LN')
         AND P.sts_pesanan IN ('PROGRESS','PACKING')";

    $Q2 = "SELECT COUNT(id_dp) AS Counter FROM pesanan_detail PD
           INNER JOIN pesanan P ON PD.no_order = P.no_order
           LEFT JOIN gudang_hasil GH ON PD.kd_gd_hasil = GH.kd_gd_hasil
           LEFT JOIN gudang_bahan GB ON PD.kd_gd_bahan = GB.kd_gd_bahan
           WHERE P.deleted='FALSE'
           AND PD.deleted='FALSE'
           AND GH.deleted='FALSE'
           AND P.approve_cabang='TRUE'
           AND PD.sts_kirim != 'TERKIRIM'
           AND P.sts_pesanan IN ('PROGRESS','PACKING')
           AND PD.jumlah_kirim > 0";

   $countMarketing = $this->db->query($Q)->result_array();
   $countCabang = $this->db->query($Q2)->result_array();
   $countTotal = $countMarketing[0]["Counter"] + $countCabang[0]["Counter"];
   $dataForReturned = array("Counter" => $countTotal);
   return json_encode($dataForReturned);
  }

  public function getDetailPengirimanParsial($id_dp)
  {
    $data = $this->db->query("SELECT PD.no_order,PD.jumlah, PD.satuan,
                                     SUM(IF(DPL.deleted='FALSE',DPL.jumlah_kirim,0)) AS jumlah_terkirim
                              FROM pesanan_detail PD
                              LEFT JOIN detail_pengiriman_lk DPL ON DPL.id_dp = PD.id_dp
                              WHERE PD.id_dp = '$id_dp' AND PD.deleted='FALSE'")->result_array();
    return json_encode($data);
  }

  public function getListPengirimanParsial($id_dp)
  {
    $data = $this->db->query("SELECT * FROM detail_pengiriman_lk WHERE id_dp = '$id_dp' AND deleted='FALSE'")->result_array();
     return json_encode($data);
  }

  public function selectDetailPengirimanParsialLK($param){
    $Q = "SELECT * FROM detail_pengiriman_lk WHERE id_pengiriman='$param'";
    $result = $this->db->query($Q)->result_array();
    return json_encode($result);
  }
  //============ Select Function (Finish) ============//

  //============ Update Function (Start) ============//
  public function updatePesanan($param){
    $this->db->trans_begin();
    $this->db->where("no_order",$param["no_order"]);
    $this->db->update("pesanan", $param);
    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function updatePesananDetail($param){
    $this->db->trans_begin();
    $this->db->where("id_dp",$param["id_dp"]);
    $this->db->update("pesanan_detail", $param);
    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function updateDeleteAndRestorePesanan($param){
    $this->db->trans_begin();
    $this->db->where("id_dp",$param["id_dp"]);
    $this->db->update("pesanan_detail", $param);
    $arrCountDeleted = $this->db->query("SELECT COUNT(id_dp) AS counter
                                         FROM pesanan_detail
                                         WHERE deleted='TRUE'
                                         AND no_order='$param[no_order]'")->result_array();
    $arrCountTotalDetail = $this->db->query("SELECT COUNT(id_dp) AS counter
                                             FROM pesanan_detail
                                             WHERE no_order='$param[no_order]'")->result_array();
    if($arrCountDeleted[0]["counter"] >= $arrCountTotalDetail[0]["counter"]){
      $this->db->set("deleted","TRUE");
      $this->db->where("no_order",$param["no_order"]);
      $this->db->update("pesanan");
    }else{
      $this->db->set("deleted","FALSE");
      $this->db->where("no_order",$param["no_order"]);
      $this->db->update("pesanan");
    }
    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function saveApproveOrder($param){
    $this->db->trans_begin();
    $arrCounter = $this->db->query("SELECT COUNT(id_dp) AS counter
                                    FROM pesanan_detail
                                    WHERE deleted='FALSE'
                                    AND no_order='$param'")->result_array();
    if($arrCounter[0]["counter"] > 0){
      $this->db->set("sts_pesanan","OPEN");
      $this->db->where("no_order",$param);
      $this->db->update("pesanan");

      $this->db->set("sts_pesanan","OPEN");
      $this->db->where("no_order",$param);
      $this->db->update("pesanan_detail");

      if($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
        return "Gagal";
      }else{
        $this->db->trans_commit();
        return "Berhasil";
      }
    }else{
      return "Data Kosong";
    }
  }

  public function updateKirimPesanan($param){
    $this->db->trans_begin();
    $tglKirim = date("Y-m-d H:i:s");
    $this->db->where("id_dp",$param["id_dp"]);
    $this->db->update("pesanan_detail",$param);
    $counterFinish = $this->db->query("SELECT COUNT(id_dp) AS counter
                                       FROM pesanan_detail
                                       WHERE no_order='$param[no_order]'
                                       AND sts_kirim='TERKIRIM'
                                       AND deleted='FALSE'
                                       AND sts_pesanan='FINISH'")->result_array();
    $counterTotal = $this->db->query("SELECT COUNT(id_dp) AS counter
                                      FROM pesanan_detail
                                      WHERE no_order='$param[no_order]'
                                      AND deleted='FALSE'")->result_array();
    if($counterFinish[0]["counter"] == $counterTotal[0]["counter"]){
      $this->db->query("UPDATE pesanan SET sts_pesanan='FINISH', tgl_kirim='$tglKirim'
                        WHERE no_order='$param[no_order]'");
    }
    if($this->db->trans_status === FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function updateKirimPesananFullBatch($param){
    $this->db->trans_begin();
    for ($i=0; $i < count($param); $i++) {
      $tglKirim = date("Y-m-d H:i:s");
      $this->db->where("id_dp",$param[$i]["id_dp"]);
      $this->db->update("pesanan_detail",$param[$i]);
      $noOrder = $param[$i]["no_order"];
      $counterFinish = $this->db->query("SELECT COUNT(id_dp) AS counter
                                         FROM pesanan_detail
                                         WHERE no_order='$noOrder'
                                         AND sts_kirim='TERKIRIM'
                                         AND deleted='FALSE'
                                         AND sts_pesanan='FINISH'")->result_array();
      $counterTotal = $this->db->query("SELECT COUNT(id_dp) AS counter
                                        FROM pesanan_detail
                                        WHERE no_order='$noOrder'
                                        AND deleted='FALSE'")->result_array();
      if($counterFinish[0]["counter"] == $counterTotal[0]["counter"]){
        $this->db->query("UPDATE pesanan SET sts_pesanan='FINISH', tgl_kirim='$tglKirim'
                          WHERE no_order='$noOrder'");
      }
    }
    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function getBarang($jenis)
  {
    $data = $this->db->query("select kd_gd_hasil, warna_plastik, ukuran, merek, jns_brg, sts_brg, jns_permintaan from gudang_hasil where jns_brg = '$jenis' order by ukuran ")->result_array();
    return json_encode($data);
  }

  public function searchBarang($key,$jenis)
  {
    $data = $this->db->query("select kd_gd_hasil, warna_plastik, ukuran, merek, jns_brg, sts_brg, jns_permintaan from gudang_hasil where jns_brg = '$jenis' and concat(kd_gd_hasil,' ',ukuran,' ',merek,' ',warna_plastik,' ',jns_brg) REGEXP '$key' order by ukuran")->result_array();
    return json_encode($data);
  }

  public function addBarangRetur($data)
  {
    $this->db->trans_begin();
    $this->db->insert("transaksi_gudang_hasil",$data);
    if ($this->db->trans_status===FALSE) {
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  public function getDataBarangReturPengiriman(){
    $this->datatables->select("id_permintaan_jadi, kd_gd_hasil, ukuran, merek, warna, jumlah_berat, jumlah_lembar, tgl_transaksi, customer, sts_barang");
    $this->datatables->from("transaksi_gudang_hasil");
    $this->datatables->where("bagian='PENGIRIMAN' and status_transaksi = 'PENDING' and keterangan_history = 'PENGEMBALIAN BARANG' and deleted='FALSE'");

    return $this->datatables->generate();
  }

  public function countDataReturPending(){
    $data = $this->db->query("select id_permintaan_jadi from transaksi_gudang_hasil where bagian='PENGIRIMAN' and status_transaksi = 'PENDING' and keterangan_history = 'PENGEMBALIAN BARANG' and deleted='FALSE'");
    return $data->num_rows();
  }

  public function kirimBarangReturPengiriaman(){
    $this->db->trans_begin();
    $this->db->query("update transaksi_gudang_hasil set status_transaksi='PROGRESS' where bagian='PENGIRIMAN' and status_transaksi='PENDING' and keterangan_history='PENGEMBALIAN BARANG'");

    if ($this->db->trans_status===FALSE) {
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  public function deleteListRetur($id){
    $this->db->trans_begin();
    $this->db->query("delete from transaksi_gudang_hasil where id_permintaan_jadi = '$id'");
    if ($this->db->trans_status===FALSE) {
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  public function getListReturPerId($id){
    $data = $this->db->query("select id_permintaan_jadi, kd_gd_hasil, ukuran, merek, warna, jumlah_berat, jumlah_lembar, tgl_transaksi, customer, sts_barang, jns_permintaan from transaksi_gudang_hasil where id_permintaan_jadi='$id'")->result_array();
    return json_encode($data);
  }

  public function updateListRetur($data){
    $this->db->trans_begin();

    $this->db->set("customer",$data["customer"]);
    $this->db->set("tgl_transaksi",$data["tanggal"]);
    $this->db->set("jumlah_berat",$data["berat"]);
    $this->db->set("jumlah_lembar",$data["lembar"]);
    $this->db->update("transaksi_gudang_hasil");
    $this->db->where("id_permintaan_jadi",$data["id"]);

    if ($this->db->trans_status === FALSE) {
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  public function getHistoryListOrderLuarKota($tglAwal,$tglAkhir){
    $this->datatables->select("no_order, tgl_pesan, nm_pemesan, sts_pesanan, no_po");
    $this->datatables->from("pesanan");
    $this->datatables->where("jns_order = 'LK' AND deleted='FALSE' and tgl_pesan BETWEEN '$tglAwal' and '$tglAkhir'");
    $this->db->order_by("tgl_pesan","DESC");
    return $this->datatables->generate();
  }

  public function updateKirimBarangParsial($param){
    $this->db->trans_begin();
    $Q = "SELECT * FROM detail_pengiriman_lk WHERE id_pengiriman='$param[id_pengiriman]'";
    $result = $this->db->query($Q)->result_array();
    $jumlahLama = $result[0]["jumlah_kirim"];
    $jumlahBaru = $param["jumlah_kirim"];

    $this->db->set("tanggal_kirim", $param["tanggal_kirim"]);
    $this->db->set("jumlah_kirim", $param["jumlah_kirim"]);
    $this->db->where("id_pengiriman", $param["id_pengiriman"]);
    $this->db->update("detail_pengiriman_lk");

    $check = $this->db->query("SELECT PD.no_order,PD.jumlah, PD.satuan,
                                     SUM(IF(DPL.deleted='FALSE',DPL.jumlah_kirim,0)) AS jumlah_terkirim
                              FROM pesanan_detail PD
                              LEFT JOIN detail_pengiriman_lk DPL ON DPL.id_dp = PD.id_dp
                              WHERE PD.id_dp = '$param[id_dp]' AND PD.deleted='FALSE'")->result_array();

    if ($check[0]["jumlah"] <= $check[0]["jumlah_terkirim"]) {
      $this->db->set("sts_kirim","TERKIRIM");
      $this->db->set("tgl_kirim",$tgl_kirim);
      $this->db->set("sts_pesanan","FINISH");
      $this->db->where("id_dp",$param['id_dp']);
      $this->db->update("pesanan_detail");
    }else{
      $this->db->set("sts_kirim","BELUM TERKIRIM");
      $this->db->set("sts_pesanan","PACKING");
      $this->db->set("tgl_kirim",NULL);
      $this->db->where("id_dp",$param['id_dp']);
      $this->db->update("pesanan_detail");
    }

    if ($this->db->trans_status === FALSE) {
      $this->db->trans_rollback();
      return "Gagal";
    }else{
      $this->db->trans_commit();
      return "Berhasil";
    }
  }

  public function deletePengirimanParsial($param){
    $this->db->trans_begin();
    $Q2 = "SELECT * FROM pesanan_detail WHERE id_dp='$param[id_dp]'";
    $result2 = $this->db->query($Q2)->result_array();
    $noOrder = $result2[0]["no_order"];

    $this->db->query("UPDATE pesanan SET sts_pesanan = 'PACKING', tgl_kirim = NULL
                      WHERE no_order = '$noOrder'");

    $this->db->query("UPDATE detail_pengiriman_lk SET deleted='TRUE' WHERE id_pengiriman = '$param[id_pengiriman]'");

    $check = $this->db->query("SELECT PD.no_order,PD.jumlah, PD.satuan,
                                     SUM(IF(DPL.deleted='FALSE',DPL.jumlah_kirim,0)) AS jumlah_terkirim
                              FROM pesanan_detail PD
                              LEFT JOIN detail_pengiriman_lk DPL ON DPL.id_dp = PD.id_dp
                              WHERE PD.id_dp = '$param[id_dp]' AND PD.deleted='FALSE'")->result_array();

    if ($check[0]["jumlah"] <= $check[0]["jumlah_terkirim"]) {
      $this->db->set("sts_kirim","TERKIRIM");
      $this->db->set("tgl_kirim",$tgl_kirim);
      $this->db->set("sts_pesanan","FINISH");
      $this->db->where("id_dp",$param['id_dp']);
      $this->db->update("pesanan_detail");
    }else{
      $this->db->set("sts_kirim","BELUM TERKIRIM");
      $this->db->set("sts_pesanan","PACKING");
      $this->db->set("tgl_kirim",NULL);
      $this->db->where("id_dp",$param['id_dp']);
      $this->db->update("pesanan_detail");
    }

    if ($this->db->trans_status === FALSE) {
      $this->db->trans_rollback();
      return "Gagal";
    }else{
      $this->db->trans_commit();
      return "Berhasil";
    }
  }
  //============ Update Function (Finish) ============//

  //============ Delete Function (Start) ============//
  //============ Delete Function (Finish) ============//
}
?>
