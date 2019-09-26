<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cabang_Model extends CI_Model{
  public function getMaxNoOrder(){
    $sessionId = $this->session->userdata("fabricationIdUser");
    $sessionIdLen = strlen($sessionId);
    $maxCode = $this->db->query("SELECT MAX(RIGHT(no_order,2)) AS kode
                                 FROM pesanan
                                 WHERE SUBSTRING(no_order,3,6) = DATE_FORMAT(CURDATE(),'%y%m%d')
                                 AND SUBSTRING(no_order,9,$sessionIdLen) = '$sessionId'");
    foreach ($maxCode->result() as $arrMaxCode) {
      if($arrMaxCode->kode == NULL){
        $tempCode = "0";
      }
      $tempCode = "0".($arrMaxCode->kode+1);
      $fixCode = "NO".date("ymd").$sessionId.substr($tempCode,(strlen($tempCode)-2));
    }
    return $fixCode;
  }

  public function getMaxNoPo(){
    $idUser = $this->session->userdata("fabricationIdUser");
    $subGroup = $this->session->userdata("fabricationSubGroup");
    $prefix = "";
    switch ($subGroup) {
      case 'ganefo':$prefix="GNF/";break;
      case 'semarang':$prefix="SMG/";break;
      case 'jatinegara':$prefix="JTN/";break;
      case 'brebes':$prefix="BBS/";break;
      case 'bandung':$prefix="BDG/";break;
      case 'medan':$prefix="MDN/";break;
      case 'surabaya':$prefix="SBY/";break;
      case 'brebes':$prefix="BBS/";break;
      default:$prefix="";break;
    }
    $maxCode = $this->db->query("SELECT MAX(RIGHT(no_po,3)) AS kode FROM pesanan WHERE SUBSTRING(no_po,5,4) = DATE_FORMAT(CURDATE(),'%y%m') AND SUBSTRING(no_po,1,4)='$prefix'");
    foreach ($maxCode->result() as $arrMaxCode) {
      if($arrMaxCode->kode == NULL){
        $tempCode = "00";
      }
      $tempCode = "00".($arrMaxCode->kode + 1);
      $fixCode = $prefix.date("ym").substr($tempCode,(strlen($tempCode)-3));
    }
    return $fixCode;
  }

  public function getDefaultPemesan(){
    $username = strtoupper($this->session->userdata("fabricationUsername"));
    $customer = $this->db->query("SELECT * FROM customer WHERE nm_perusahaan='$username'");
    return $customer->result_array();
  }

#======================================= SELECT FUNCTION (START) =======================================#
  public function selectGudangHasilLikeOLD($param){
    $param2 = explode('|',trim($param));

    if(strtolower($param2[0])=="cat" || strtolower($param2[0])=="minyak"){
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
                                              WHERE `status`='LOKAL' AND jenis='$jenis' ".$clause);
      $result = $arrGudangHasilLike->result_array();
      return $result;
    }else{
      if(strpos($param,"|") !== FALSE){
        $param3 = explode("|",$param);
        $arrGudangHasilLike = $this->db->query("SELECT kd_gd_hasil,ukuran,warna_plastik,tebal,merek,jns_permintaan,jns_brg
                                                FROM gudang_hasil
                                                WHERE (merek LIKE '%$param3[0]%'
                                                AND ukuran LIKE '%$param3[1]%'
                                                AND warna_plastik LIKE '%$param3[2]%'
                                                AND deleted='FALSE')
                                                AND jns_brg != 'KANVAS'
                                                AND CONCAT(jns_permintaan,' ',jns_brg) != 'POLOS SABLON'");
      }else{
        $arrGudangHasilLike = $this->db->query("SELECT kd_gd_hasil,ukuran,warna_plastik,tebal,merek,jns_permintaan,jns_brg
                                                FROM gudang_hasil
                                                WHERE ((kd_gd_hasil LIKE '%$param%' OR
                                                ukuran LIKE '%$param%' OR
                                                merek LIKE '%$param%')
                                                AND deleted='FALSE')
                                                AND jns_brg != 'KANVAS'
                                                AND CONCAT(jns_permintaan,' ',jns_brg) != 'POLOS SABLON'");
      }
      $result = $arrGudangHasilLike->result_array();
      return $result;
    }


  }

  public function selectGudangHasilLike($param){
    $param2 = explode('|',trim($param));

    if(strtolower($param2[0])=="cat" || strtolower($param2[0])=="minyak"){
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
    } elseif (strtolower($param2[0] == "packing")){
      if(!empty($param2[1])){
        $gudangPack = $this->db->query("SELECT * FROM produk_aneka_macam
        WHERE deleted='FALSE' AND status_produk='FINISH' AND
        (kd_produk LIKE '%$param2[1]%' OR
        nama_produk LIKE '%$param[1]%' OR
        keterangan LIKE '%$param[1]%')");
      } else {
        $gudangPack = $this->db->get_where("produk_aneka_macam",['deleted'=>'FALSE', 'status_produk'=>'FINISH']);
      }
      return $gudangPack->result_array();
    }else{
      if(strpos($param,"|") !== FALSE){
        $param3 = explode("|",$param);
        $arrGudangHasilLike = $this->db->query("SELECT kd_gd_hasil,ukuran,warna_plastik,tebal,merek,jns_permintaan,jns_brg
                                                FROM gudang_hasil
                                                WHERE (merek LIKE '%$param3[0]%'
                                                AND ukuran LIKE '%$param3[1]%'
                                                AND warna_plastik LIKE '%$param3[2]%'
                                                AND deleted='FALSE')
                                                AND jns_brg != 'KANVAS'
                                                AND merek NOT LIKE '%tidak dipakai%'
                                                AND CONCAT(jns_permintaan,' ',jns_brg) != 'POLOS SABLON'");
      }else{
        $arrGudangHasilLike = $this->db->query("SELECT kd_gd_hasil,ukuran,warna_plastik,tebal,merek,jns_permintaan,jns_brg
                                                FROM gudang_hasil
                                                WHERE ((kd_gd_hasil LIKE '%$param%' OR
                                                ukuran LIKE '%$param%' OR
                                                merek LIKE '%$param%')
                                                AND deleted='FALSE')
                                                AND jns_brg != 'KANVAS'
                                                AND merek NOT LIKE '%tidak dipakai%'
                                                AND CONCAT(jns_permintaan,' ',jns_brg) != 'POLOS SABLON'");
      }
      $result = $arrGudangHasilLike->result_array();
      return $result;
    }


  }

  public function selectGudangHasilLimit20(){
    $this->db->select("kd_gd_hasil,warna_plastik,tebal,merek,jns_permintaan,jns_brg,ukuran");
    $this->db->where("deleted='FALSE'");
    $this->db->where("CONCAT(jns_permintaan,' ',jns_brg) != 'POLOS SABLON' AND jns_brg != 'KANVAS ' AND merek NOT LIKE '%tidak dipakai%'");
    $this->db->limit(20);
    $arrGudangHasilLimit20 = $this->db->get("gudang_hasil");
    return $arrGudangHasilLimit20->result_array();
  }

  public function selectGudangHasilDetailId($param){
    if(substr($param,0,3)=="BHN"){
      $data = $this->db->query("SELECT nm_barang AS merek, warna AS warna_plastik FROM gudang_bahan WHERE kd_gd_bahan = '$param'");
    }elseif (substr($param,0,4)=="PACK") {
      $data = $this->db->get_where('produk_aneka_macam', ['kd_produk'=>$param, 'deleted'=>'FALSE']);
    }else{
      $data = $this->db->query("SELECT * FROM gudang_hasil WHERE kd_gd_hasil = '$param'");
    }
    return $data->result_array();
  }

  public function selectPesananDetailsTempDatatables($param,$param2){
    $this->datatables->select("DATE_FORMAT(NOW(),'%Y-%m-%d') AS tanggal, DPT.id_dp,
                               DPT.jumlah, DPT.satuan, DPT.harga, DPT.merek,
                               DPT.mata_uang, GH.ukuran, GH.warna_plastik,
                               DPT.keterangan, DPT.warna_cetak, DPT.sm,
                               DPT.dll, AM.kd_produk, AM.nama_produk, DPT.no_order, IF(DPT.kd_pack IS NULL, GH.jns_brg, 'VARIASI') as jns_brg");
    $this->datatables->from("pesanan_detail_temp DPT");
    $this->datatables->where("(DPT.kd_gd_hasil = GH.kd_gd_hasil OR
                              DPT.kd_pack = AM.kd_produk OR
                              DPT.kd_gd_bahan = GB.kd_gd_bahan) AND
                              DPT.no_order = '$param' AND
                              DPT.kd_cust =","$param2");
    $this->datatables->join("produk_aneka_macam AM","DPT.kd_pack = AM.kd_produk", "LEFT");
    $this->datatables->join("gudang_hasil GH","DPT.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","DPT.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->db->order_by("DPT.id_dp","DESC");

    return $this->datatables->generate();
  }
  public function selectPesananDetailsTemp($param,$param2){
    $Q = "SELECT DPT.id_dp, DPT.jumlah, DPT.satuan, AM.nama_produk, DPT.harga, DPT.merek, DPT.mata_uang, GH.ukuran, DPT.warna_cetak, DPT.sm, DPT.dll
          FROM pesanan_detail_temp DPT
          LEFT JOIN produk_aneka_macam AM ON DPT.kd_pack = AM.kd_produk
          LEFT JOIN gudang_hasil GH ON DPT.kd_gd_hasil = GH.kd_gd_hasil
          LEFT JOIN gudang_bahan GB ON DPT.kd_gd_bahan = GB.kd_gd_bahan
          WHERE (DPT.kd_gd_hasil = GH.kd_gd_hasil OR
                 DPT.kd_gd_bahan = GB.kd_gd_bahan OR
                 DPT.kd_pack = AM.kd_produk) AND
                 DPT.no_order = '$param' AND
                 DPT.kd_cust = '$param2'
          ORDER BY DPT.id_dp DESC ";
    $arrPesananDetailsTemp = $this->db->query($Q);
    return $arrPesananDetailsTemp->result_array();
  }
  public function selectPesananDetailsDatatables($param){
    $this->datatables->select("DP.id_dp, CONCAT(CONVERT(FORMAT(DP.jumlah,0)USING utf8),' ',DP.satuan) AS jumlah,
                               DP.mata_uang,DP.no_order,P.approve_cabang,
                               FORMAT(DP.harga,2) AS harga, DP.merek, DP.mata_uang,
                               GH.ukuran,GH.warna_plastik,IF(DP.kd_pack IS NULL, GH.jns_brg, 'VARIASI') as jns_brg,
                               DP.warna_cetak, DP.sm, DP.dll, DP.kd_hrg,DP.sts_pesanan,DP.sts_kirim,
                               DP.keterangan, DP.kd_pack");
    $this->datatables->from("pesanan_detail DP");
    $this->datatables->where("(DP.kd_gd_hasil = GH.kd_gd_hasil OR
                              DP.kd_pack = AM.kd_produk OR
                              DP.kd_gd_bahan = DP.kd_gd_bahan) AND
                              DP.no_order = '$param' AND
                              DP.deleted = 'FALSE'");
    $this->datatables->join("produk_aneka_macam AM", "DP.kd_pack = AM.kd_produk","LEFT");
    $this->datatables->join("gudang_hasil GH","DP.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","DP.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->datatables->join("pesanan P","DP.no_order = P.no_order","INNER");
    return $this->datatables->generate();
  }
  public function getItem($where = NULL){
    if(empty($where)){
      return $this->db->get('produk_aneka_macam_item')->result();
    } else {
      $this->db->select('
        GH.merek as nama_produk, AN.merek as merek, AN.jumlah, GH.ukuran, GH.warna_plastik,
        AN.warna_cetak, AN.dll, AN.strip, AN.satuan, AN.omset_kg, AN.omset_lembar, AN.id_detail_produk as id
      ');
      $this->db->from('produk_aneka_macam_item AN');
      $this->db->join('gudang_hasil GH', 'AN.kd_gd_hasil = GH.kd_gd_hasil');
      $this->db->where("AN.deleted = 'FALSE' ");
      $this->db->where($where);
      return $this->db->get()->result();
    }
  }
  public function selectPesananDetailsTrashDatatables(){
    $this->datatables->select("DP.id_dp, CONCAT(CONVERT(FORMAT(DP.jumlah,0)USING utf8),' ',DP.satuan) AS jumlah,
                               DP.mata_uang,DP.no_order,P.no_po,
                               FORMAT(DP.harga,2) AS harga, DP.merek, DP.mata_uang,
                               GH.ukuran,GH.warna_plastik,
                               DP.warna_cetak, DP.sm, DP.dll, DP.kd_hrg,DP.sts_pesanan,DP.sts_kirim,
                               DP.keterangan");
    $this->datatables->from("pesanan_detail DP");
    $this->datatables->where("(DP.kd_gd_hasil = GH.kd_gd_hasil OR
                              DP.kd_gd_bahan = DP.kd_gd_bahan) AND
                              DP.deleted = 'TRUE'");
    $this->datatables->join("gudang_hasil GH","DP.kd_gd_hasil = GH.kd_gd_hasil","LEFT");
    $this->datatables->join("gudang_bahan GB","DP.kd_gd_bahan = GB.kd_gd_bahan","LEFT");
    $this->datatables->join("pesanan P","DP.no_order = P.no_order","INNER");
    return $this->datatables->generate();
  }

  public function selectPantauOrderDatatables(){
    $group = $this->session->userdata("fabricationGroup");
    $subGroup = $this->session->userdata("fabricationSubGroup");
    $QIdUser = $this->db->query("SELECT id_user FROM users WHERE `group` = '$group' AND sub_group = '$subGroup' AND `status` = '2'")->result_array();
    $idUser = $QIdUser[0]["id_user"];

    $this->datatables->select("no_order,DATE_FORMAT(tgl_pesan,'%d-%M-%Y') AS tgl_pesan,nm_pemesan,approve_cabang,sts_pesanan,sts_print_cabang,no_po");
    $this->datatables->from("pesanan");
    $this->datatables->where("deleted='FALSE' AND id_user=",$idUser);
    $this->db->order_by("no_order","DESC");

    return $this->datatables->generate();
  }

  public function selectCariHistoryDatatables($param){
    $group = $this->session->userdata("fabricationGroup");
    $subGroup = $this->session->userdata("fabricationSubGroup");
    $QIdUser = $this->db->query("SELECT id_user FROM users WHERE `group` = '$group' AND sub_group = '$subGroup' AND `status` = '2'")->result_array();
    $idUser = $QIdUser[0]["id_user"];

    $this->datatables->select("no_order,DATE_FORMAT(tgl_pesan,'%d-%M-%Y') AS tgl_pesan,nm_pemesan,approve_cabang,sts_pesanan,sts_print,no_po");
    $this->datatables->from("pesanan");
    if($param["stsPesanan"] == "ALL"){
      $this->datatables->where("deleted='FALSE' AND tgl_pesan BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]' AND id_user=",$idUser);
    }else{
      $this->datatables->where("deleted='FALSE' AND sts_pesanan='$param[stsPesanan]' AND tgl_pesan BETWEEN '$param[tglAwal]' AND '$param[tglAkhir]' AND id_user=",$idUser);
    }
    $this->db->order_by("tgl_pesan","DESC");

    return $this->datatables->generate();
  }

  public function selectFakturPesanan($param){
    $arrFakturPesanan = $this->db->query("SELECT P.no_order,P.proof,DATE_FORMAT(P.tgl_pesan,'%d-%M-%Y') AS tgl_pesan,
                                                 DATE_FORMAT(P.tgl_estimasi,'%d-%M-%Y') AS tgl_estimasi, P.nm_pemesan,
                                                 P.no_po,P.note,P.foto_1,P.foto_2,P.expedisi,P.payment_method,P.expedisi,
                                                 IF(P.pajak='TRUE','P','N') pajak,P.jns_order,P.proof, P.mata_uang,
                                                 P.dp,C.alamat,C.tlp_kantor,C.nm_perusahaan,U.username,U.ttd
                                          FROM pesanan P
                                          INNER JOIN customer C ON P.kd_cust = C.kd_cust
                                          INNER JOIN users U ON P.id_user = U.id_user
                                          WHERE P.no_order = '$param' AND P.deleted='FALSE'");
    return $arrFakturPesanan->result_array();
  }
  public function selectFakturPesananDetailProduksiMarketing($param){
    $arrFakturPesananDetail = $this->db->query("SELECT PD.keterangan, FORMAT(PD.jumlah,1) AS jumlah,PD.satuan,
                                                       GH.ukuran,PD.merek,if(PD.kd_pack IS NULL, GH.merek, AM.nama_produk) AS nm_brg,
                                                       GH.warna_plastik,PD.warna_cetak,PD.sm,PD.dll
                                                FROM pesanan_detail PD
                                                LEFT JOIN produk_aneka_macam AM ON PD.kd_pack = AM.kd_produk
                                                LEFT JOIN gudang_hasil GH ON PD.kd_gd_hasil = GH.kd_gd_hasil
                                                LEFT JOIN gudang_bahan GB ON PD.kd_gd_bahan = GB.kd_gd_bahan
                                                WHERE PD.no_order = '$param' AND PD.deleted='FALSE'");
    return $arrFakturPesananDetail->result_array();
  }
  public function selectFakturPesananMarketing($param){
    $arrFakturPesanan = $this->db->query("SELECT P.no_order,P.proof,DATE_FORMAT(P.tgl_pesan,'%d-%M-%Y') AS tgl_pesan,
                                                 DATE_FORMAT(P.tgl_estimasi,'%d-%M-%Y') AS tgl_estimasi, P.nm_pemesan,
                                                 P.no_po,P.note,P.foto_1,P.foto_2,P.expedisi,P.payment_method,P.expedisi,
                                                 IF(P.pajak='TRUE','P','N') pajak,P.jns_order,P.ket_proof, P.mata_uang, IF(P.sales IS NULL, P.nm_pemesan, P.sales) as sales,
                                                 P.dp,C.alamat,C.tlp_kantor,
                                                 IF(C.nm_perusahaan_update IS NULL, C.nm_perusahaan, C.nm_perusahaan_update) AS nm_perusahaan,
                                                 U.username,U.ttd
                                          FROM pesanan P
                                          INNER JOIN customer C ON P.kd_cust = C.kd_cust
                                          INNER JOIN users U ON P.id_user = U.id_user
                                          WHERE P.no_order = '$param' AND P.deleted='FALSE'");
    return $arrFakturPesanan->result_array();
  }
  public function selectAllListItemAneka($param){
    if(!empty($param)){
      $this->db->select('gudang_hasil.*, produk_aneka_macam_item.merek as merek_aneka, produk_aneka_macam_item.dll, produk_aneka_macam_item.strip,
                        produk_aneka_macam_item.warna_cetak ');
      $this->db->join('gudang_hasil', 'gudang_hasil.kd_gd_hasil = produk_aneka_macam_item.kd_gd_hasil');
      $result = $this->db->get_where('produk_aneka_macam_item',['kd_produk'=>$param, 'produk_aneka_macam_item.deleted'=>'FALSE'])->result_array();
      return $result;
    } else {
      return false;
    }
  }
  public function selectPesananDetails($param){
    $Q = "SELECT DP.id_dp, DP.jumlah, DP.satuan, DP.kd_pack, DP.harga, DP.merek, DP.mata_uang, GH.ukuran, DP.warna_cetak, DP.sm, DP.dll,
                 DP.tgl_kirim_gudang, DP.sts_pesanan, AM.nama_produk
          FROM pesanan_detail DP
          LEFT JOIN produk_aneka_macam AM ON DP.kd_pack = AM.kd_produk
          LEFT JOIN gudang_hasil GH ON DP.kd_gd_hasil = GH.kd_gd_hasil
          LEFT JOIN gudang_bahan GB ON DP.kd_gd_bahan = GB.kd_gd_bahan
          WHERE (DP.kd_gd_hasil = GH.kd_gd_hasil OR
                 DP.kd_gd_bahan = DP.kd_gd_bahan OR
                 DP.kd_pack = AM.kd_produk) AND
                 DP.no_order = '$param' AND
                 DP.deleted = 'FALSE'
                 ORDER BY DP.id_dp ASC";
    $arrPesananDetails = $this->db->query($Q);
    return $arrPesananDetails->result_array();
  }
  public function selectFakturPesananDetailProduksi($param){
    $arrFakturPesananDetail = $this->db->query("SELECT CONCAT(ROUND(PD.jumlah),' ',PD.satuan) AS jumlah,
                                                       IF(PD.kd_pack IS NULL, SUBSTRING_INDEX(GH.ukuran,'x',1), '-') AS panjang,
                                                       IF(PD.kd_pack IS NULL, SUBSTRING_INDEX(GH.ukuran,'x',-1), '-') AS lebar,
                                                       IF(PD.kd_pack IS NULL, PD.merek, 'VARIASI'),IF(PD.kd_pack IS NULL, GH.merek, AM.nama_produk) AS nm_brg,
                                                       GH.warna_plastik,PD.warna_cetak,PD.sm,PD.dll
                                                FROM pesanan_detail PD
                                                LEFT JOIN produk_aneka_macam AM ON PD.kd_pack = AM.kd_produk
                                                LEFT JOIN gudang_hasil GH ON PD.kd_gd_hasil = GH.kd_gd_hasil
                                                LEFT JOIN gudang_bahan GB ON PD.kd_gd_bahan = GB.kd_gd_bahan
                                                WHERE PD.no_order = '$param' AND PD.deleted='FALSE'");
    return $arrFakturPesananDetail->result_array();
  }

  public function selectCountOrderApprove(){
    $group = $this->session->userdata("fabricationGroup");
    $subGroup = $this->session->userdata("fabricationSubGroup");
    $QIdUser = $this->db->query("SELECT id_user FROM users WHERE `group` = '$group' AND sub_group = '$subGroup' AND `status` = '2'")->result_array();
    $idUser = $QIdUser[0]["id_user"];

    $QCount = $this->db->query("SELECT COUNT(no_order) AS jumlah FROM pesanan WHERE id_user = '$idUser' AND approve_cabang='FALSE' AND deleted='FALSE'");
    return $QCount->result_array();
  }

  public function selectOrderApprove(){
    $group = $this->session->userdata("fabricationGroup");
    $subGroup = $this->session->userdata("fabricationSubGroup");
    $QIdUser = $this->db->query("SELECT id_user FROM users WHERE `group` = '$group' AND sub_group = '$subGroup' AND `status` = '2'")->result_array();
    $idUser = $QIdUser[0]["id_user"];

    $this->datatables->select("no_order,DATE_FORMAT(tgl_pesan,'%d-%M-%Y') AS tgl_pesan,nm_pemesan,approve_cabang,sts_pesanan,sts_print,no_po");
    $this->datatables->from("pesanan");
    $this->datatables->where("deleted='FALSE' AND approve_cabang='FALSE' AND id_user=",$idUser);
    $this->db->order_by("tgl_pesan","DESC");

    return $this->datatables->generate();
  }

  public function selectPesananDetailId($param){
    $result = $this->db->query("SELECT DP.merek,DP.sm,DP.jenis,DP.warna_cetak,DP.dll,DP.jumlah,DP.keterangan,DP.satuan,
                                       GH.merek,GH.ukuran,GH.warna_plastik,
                                       GB.nm_barang, GB.warna
                                FROM pesanan_detail DP
                                LEFT JOIN gudang_hasil GH ON DP.kd_gd_hasil = GH.kd_gd_hasil
                                LEFT JOIN gudang_bahan GB ON DP.kd_gd_bahan = GB.kd_gd_bahan
                                WHERE DP.id_dp='$param'");
    return json_encode($result->result_array());
  }

  public function selectCountTrash(){
    $group = $this->session->userdata("fabricationGroup");
    $subGroup = $this->session->userdata("fabricationSubGroup");
    $QIdUser = $this->db->query("SELECT id_user FROM users WHERE `group` = '$group' AND sub_group = '$subGroup' AND `status` = '2'")->result_array();
    $idUser = $QIdUser[0]["id_user"];

    $QCount = $this->db->query("SELECT COUNT(DP.no_order) AS jumlah
                                FROM pesanan_detail DP
                                INNER JOIN pesanan P ON DP.no_order = P.no_order
                                WHERE P.id_user = '$idUser' AND DP.deleted='TRUE'");
    return $QCount->result_array();
  }

  public function selectCountDetailOrderActive($param){
    $result = $this->db->query("SELECT COUNT(no_order) AS jumlah FROM pesanan_detail WHERE no_order = '$param' AND deleted='FALSE'");
    return $result->result_array();
  }

  public function selectCountDetailOrderDeactive($param){
    $result = $this->db->query("SELECT COUNT(no_order) AS jumlah FROM pesanan_detail WHERE no_order = '$param' AND deleted='TRUE'");
    return $result->result_array();
  }

#======================================= SELECT FUNCTION (FINISH) =======================================#

#======================================= INSERT FUNCTION (START) =======================================#
  public function insertPesananDetailTemp($param){
    $this->db->trans_begin();
    $this->db->insert("pesanan_detail_temp",$param);
    if($this->db->trans_status()===FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else {
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function insertPesananFinal($param){
    $this->db->trans_begin();
    $pesananDetailTemp = $this->db->select("id_dp,
                                            no_order,
                                            kd_gd_hasil,
                                            kd_gd_bahan,
                                            kd_pack,
                                            merek,
                                            jumlah,
                                            satuan,
                                            harga,
                                            mata_uang,
                                            warna_cetak,
                                            dll,
                                            sm,
                                            kd_hrg,
                                            omset_lembar,
                                            omset_kg,
                                            potongan,
                                            diskon,
                                            cn,
                                            sts_pesanan,
                                            jenis,
                                            keterangan")
                                            ->get_where("pesanan_detail_temp",array("no_order"=>$param["no_order"]))
                                            ->result_array();
    if(count($pesananDetailTemp) <= 0){
      $this->db->trans_rollback();
      return "Item Kosong";
    }else{
      $this->db->insert("pesanan",$param);
      for ($i=0; $i < count($pesananDetailTemp); $i++) {
        $this->db->insert("pesanan_detail",array_splice($pesananDetailTemp[$i],1,count($pesananDetailTemp[$i])));
        $this->db->where("id_dp",$pesananDetailTemp[$i]["id_dp"])->delete("pesanan_detail_temp");
      }

      if($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
        return "Gagal";
      }else{
        $this->db->trans_commit();
        return "Berhasil";
      }
    }
  }
#======================================= INSERT FUNCTION (FINISH) =======================================#

#======================================= UPDATE FUNCTION (START) =======================================#
  public function updatePesanan($param){
    $this->db->trans_begin();
    $this->db->where("no_order",$param["no_order"]);
    $this->db->update("pesanan",$param);
    if($this->db->trans_status() === FALSE){
        $this->db->trans_rollback();
        return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function updateDetailPesanan($param){
    $this->db->trans_begin();
    $this->db->where("id_dp",$param["id_dp"]);
    $this->db->update("pesanan_detail",$param);
    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }

  public function updateApproveOrder($param){
    $this->db->trans_begin();
    $this->db->where("no_order",$param["no_order"]);
    $this->db->update("pesanan",$param);

    $this->db->set("sts_pesanan","OPEN");
    $this->db->where("no_order",$param["no_order"]);
    $this->db->update("pesanan_detail");

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }
#======================================= UPDATE FUNCTION (FINISH) =======================================#

#======================================= DELETE FUNCTION (START) =======================================#
  public function deletePesananDetailTempId($param){
    $this->db->trans_begin();
    $this->db->delete("pesanan_detail_temp",array("id_dp"=>$param));
    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return FALSE;
    }else{
      $this->db->trans_commit();
      return TRUE;
    }
  }
#======================================= DELETE FUNCTION (FINISH) =======================================#
}
?>
