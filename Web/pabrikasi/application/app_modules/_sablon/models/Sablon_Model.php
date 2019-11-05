<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sablon_Model extends CI_Model{

	public function getDataRencanaPIC()
	{
		$this->datatables->select("*");
		$this->datatables->from("rencana_ppic");
		$this->datatables->where("(YEAR(tgl_rencana) = YEAR(NOW()) AND MONTH(NOW())
															AND bagian = 'SABLON'
															AND sts_pengerjaan = 'PENDING'
															AND deleted='FALSE')
															OR (YEAR(tgl_rencana) = YEAR(NOW())
															AND MONTH(NOW())
															AND bagian = 'SABLON'
															AND sts_pengerjaan = 'PROGRESS'
															AND sisa >0
															AND deleted='FALSE')");
		$this->db->order_by("tgl_rencana asc");

		return $this->datatables->generate();
	}

  public function getDataSearchRencanaPIC($tgl1,$tgl2)
  {
    $this->datatables->select("*");
    $this->datatables->from("rencana_ppic");
    $this->datatables->where("tgl_rencana between '$tgl1' and '$tgl2' and bagian = 'SABLON' and sts_pengerjaan != 'FINISH' and sisa >0 AND deleted='FALSE'");
    $this->db->order_by("tgl_rencana asc");

    return $this->datatables->generate();
  }

	function getDataConversi($key)
	{
		$data = $this->db->query("select kd_ppic, ukuran, jumlah_permintaan, berat, tebal, satuan_kilo from rencana_ppic where kd_ppic = '$key'");
		return $data;
	}

	function convertKG($key,$kg)
	{
		$this->db->trans_begin();
		$this->db->set('satuan_kilo',$kg);
	  $this->db->where('kd_ppic',$key);
		$this->db->update('rencana_ppic');

	    if($this->db->trans_status() === FALSE){
	      $this->db->trans_rollback();
	      return "Gagal";
	    }else{
	      $this->db->trans_commit();
	      return "Berhasil";
	    }
	}

	function getDataRencana($key)
	{
		$data = $this->db->query("select * from rencana_ppic where kd_ppic = '$key'");
		return $data;
	}

	function codeSablon(){
    $maxCode = $this->db->query("SELECT MAX(RIGHT(kd_sablon,4)) AS kode FROM rencana_sablon");
    foreach ($maxCode->result() as $arrMaxCode) {
      if($arrMaxCode->kode == NULL){
        $tempCode = "000";
      }
      $tempCode = "000".(intval($arrMaxCode->kode)+1);
      $fixCode = "SBL".date("ymd").substr($tempCode,(strlen($tempCode)-4));
    }

    return $fixCode;
  }

	function getDataRencanaTemp($id)
	{
		$this->datatables->select("*");
    $this->datatables->from("rencana_sablon");
    $this->datatables->where("sts_pengerjaan='PENDING'");

    return $this->datatables->generate();
	}

	function insertRencana($data,$sisa)
	{
		$this->db->trans_begin();

    $this->db->set('sisa',$sisa);
    $this->db->where('kd_ppic',$data['kd_ppic']);
    $this->db->update('rencana_ppic');

		$this->db->insert('rencana_sablon',$data);
		if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Gagal";
    }else{
      $this->db->trans_commit();
      return "Berhasil";
    }
	}

  function insertRencanaSusulan($data)
  {
    $this->db->trans_begin();

    $this->db->insert('rencana_sablon',$data);
    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

	function deleteRencana($key,$sisa,$kd_ppic)
	{
		$this->db->trans_begin();

		$this->db->where('kd_sablon', $key);
    $this->db->delete('rencana_sablon');

		$this->db->set('sisa',$sisa);
    $this->db->where('kd_ppic',$kd_ppic);
    $this->db->update('rencana_ppic');

		if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Gagal";
    }else{
      $this->db->trans_commit();
      return "Berhasil";
    }
	}

	function getDataRencanaSablon($key)
	{
		$data =  $this->db->query("select * from rencana_sablon where kd_sablon = '$key'");
		return $data;
	}

	function updateRencana($kd_ppic,$kd_sablon,$data,$sisa)
	{
		$this->db->trans_begin();

		$this->db->where('kd_sablon', $kd_sablon);
    $this->db->update('rencana_sablon', $data);

		$this->db->set('sisa',$sisa);
    $this->db->where('kd_ppic',$kd_ppic);
    $this->db->update('rencana_ppic');

		if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
	}

	function saveRencana($kd_ppic)
	{
		$this->db->trans_begin();

		$this->db->set('sts_pengerjaan','PROGRESS');
    $this->db->where('sts_pengerjaan','PENDING');
    $this->db->update('rencana_sablon');

		$this->db->set('sts_pengerjaan','PROGRESS');
    $this->db->where('sts_pengerjaan','PENDING');
		$this->db->where('kd_ppic',$kd_ppic);
    $this->db->update('rencana_ppic');

		if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
	}

	function getDataRencanaMandorSablon()
	{
		$this->datatables->select(" kd_sablon, tgl_rencana, customer, merek, ukuran, warna_plastik, warna_sablon, jml_rencana, jml_sisa");
    $this->datatables->from("rencana_sablon");
    $this->datatables->where("sts_pengerjaan='PROGRESS' and jml_sisa != 0 and deleted = 'FALSE'");

    return $this->datatables->generate();
	}

	function getItemRencanaSablon($key)
	{
		$data =  $this->db->query("select * from rencana_sablon  where kd_sablon = '$key' and deleted ='FALSE'");
		return $data;
	}

	function saveHasilSablon($hasil,$cat,$minyak,$jml_sisa,$jml_hasil,$kd_ppic)
	{
		$this->db->trans_begin();
		$periodeLock = date("Y-m",strtotime($hasil["tanggal"]));
		$Q = "SELECT COUNT(id_permintaan_jadi) AS counter
					FROM transaksi_gudang_hasil
					WHERE sts_barang = 'SABLON'
					AND DATE_FORMAT(tgl_transaksi, '%Y-%m') = '$periodeLock'
					AND keterangan_history != 'DATA AWAL'
					AND status_lock = 'TRUE'
					AND deleted='FALSE'";
		$arrCounterLock = $this->db->query($Q)->result_array();
		if($arrCounterLock[0]["counter"] > 0){
			$this->db->trans_rollback();
			return "Lock";
		}else{
			$this->db->insert('transaksi_hasil_sablon',$hasil);
			$this->db->insert_batch("transaksi_penggunaan_bahan_sablon",$cat);
			$this->db->insert("transaksi_penggunaan_bahan_sablon",$minyak);

			$this->db->set('jml_sisa',$jml_sisa);
			$this->db->set('jml_hasil',$jml_hasil);
			$this->db->where('kd_sablon',$hasil['kd_sablon']);
			$this->db->update('rencana_sablon');
			if(!empty($hasil["berat_kembalian"]) || !empty($hasil["lembar_kembalian"])){
				$Q = "SELECT RS.*, GH.merek, GH.warna_plastik, GH.ukuran, GH.jns_permintaan,
							GH.jns_brg
							FROM rencana_sablon RS
							INNER JOIN gudang_hasil GH ON RS.kd_gd_buffer = GH.kd_gd_hasil
							WHERE RS.kd_sablon = '$hasil[kd_sablon]' AND RS.deleted='FALSE'";
				$arrQ = $this->db->query($Q)->result_array();
				$data = array("kd_gd_hasil" => $arrQ[0]["kd_gd_buffer"],
											"id_user" => $hasil["id_user"],
											"ukuran" => $arrQ[0]["ukuran"],
											"jumlah_berat" => $hasil["berat_kembalian"],
											"jumlah_lembar" => $hasil["lembar_kembalian"],
											"warna"	=> $arrQ[0]["warna_plastik"],
											"customer" => "SABLON",
											"bagian" => "SABLON",
											"tgl_transaksi" => $hasil["tanggal"],
											"merek" => $arrQ[0]["merek"],
											"jns_permintaan" => $arrQ[0]["jns_permintaan"],
											"sts_barang" => $arrQ[0]["jns_brg"],
											"status_history" => "MASUK",
											"status_transaksi" => "PROGRESS",
											"keterangan_history" => "PENGEMBALIAN BARANG",
											"keterangan_barang" => "PENGEMBALIAN SABLON",
											"keterangan" => "PENGEMBALIAN SABLON ($hasil[merek])");
				$this->db->insert("transaksi_gudang_hasil",$data);
			}

			$check_sisa = $this->db->query("select jml_sisa from rencana_sablon where kd_sablon = '$hasil[kd_sablon]'")->result_array();
			$check_sisa = $check_sisa[0]['jml_sisa'];
			if ($check_sisa <= 0) {
				$this->db->set('sts_pengerjaan','FINISH');
				$this->db->where('kd_sablon',$hasil['kd_sablon']);
				$this->db->update('rencana_sablon');
			}

			$sumHasil = $this->db->query("SELECT SUM(jml_hasil) as total from rencana_sablon WHERE kd_ppic = '$kd_ppic'");
			foreach ($sumHasil->result_array() as $sum) {
				$totHasil = $sum['total'];
			}

			$checkPermintaan = $this->db->query("SELECT `satuan_kilo` FROM `rencana_ppic` WHERE `kd_ppic` = '$kd_ppic'");
			foreach ($checkPermintaan->result_array() as $total) {
				$totalPermintaan = $total['satuan_kilo'];
			}

			$checkSisa = $totalPermintaan - $totHasil;

			if ($checkSisa <= 0) {
				$this->db->set('sts_pengerjaan','FINISH');
				$this->db->where('kd_ppic',$kd_ppic);
				$this->db->update('rencana_ppic');
			}

			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return "Failed";
			}else{
				$this->db->trans_commit();
				return "Success";
			}
		}
	}

	function getCat()
  {
    $data = $this->db->query("SELECT kd_gd_bahan, nm_barang, warna, status
															FROM gudang_bahan
															WHERE jenis = 'CAT MURNI' ")->result_array();
    return json_encode($data);
  }

  function searchCat($key)
  {
    $data = $this->db->query("SELECT kd_gd_bahan, nm_barang, warna, status
															FROM gudang_bahan
															WHERE jenis = 'CAT MURNI'
															AND concat(nm_barang,' ',warna) REGEXP '$key'")->result_array();
    return json_encode($data);
  }

	function getCatCampur()
	{
		$data = $this->db->query("SELECT kd_gd_bahan, nm_barang, warna, status
															FROM gudang_bahan
															WHERE jenis = 'CAT CAMPUR' ");
		return $data;
	}

	function getMinyak()
  {
    $data = $this->db->query("SELECT kd_gd_bahan, nm_barang, status
															FROM gudang_bahan
															WHERE jenis = 'MINYAK' ")->result_array();
    return json_encode($data);
  }

  function searchMinyak($key)
  {
    $data = $this->db->query("SELECT kd_gd_bahan, nm_barang, status
															FROM gudang_bahan
															WHERE jenis = 'MINYAK' AND nm_barang LIKE '%$key%'")->result_array();
    return json_encode($data);
  }

	function codeHasilSablon(){
    $maxCode = $this->db->query("SELECT MAX(RIGHT(kd_hasil_sablon,4)) AS kode FROM transaksi_hasil_sablon");
    foreach ($maxCode->result() as $arrMaxCode) {
      if($arrMaxCode->kode == NULL){
        $tempCode = "000";
      }
      $tempCode = "000".(intval($arrMaxCode->kode)+1);
      $fixCode = "HSS".date("ymd").substr($tempCode,(strlen($tempCode)-4));
    }

    return $fixCode;
	}

	function getDataHasilSablonTemp($id)
	{
		$this->datatables->select("*");
    $this->datatables->from("transaksi_hasil_sablon");
    $this->datatables->where("kd_hasil_sablon = '$id' and status='PENDING' and deleted = 'FALSE'");

    return $this->datatables->generate();
	}

	function test()
	{
		$test = $this->db->query("SELECT a.customer, a.merek, a.ukuran, a.warna_plastik, a.warna_sablon, b.hasil_lembar, b.hasil_berat, b.jns_brg, group_concat(c.jumlah_pengambilan) as jumlah_pengambilan , group_concat(c.sisa_pengambilan) as sisa_pengambilan, group_concat(d.warna) as warna, group_concat(d.nm_barang) as nm_barang FROM rencana_sablon a join transaksi_hasil_sablon b on a.kd_sablon = b.kd_sablon JOIN transaksi_penggunaan_bahan_sablon c on b.kd_hasil_sablon = c.kd_hasil_sablon JOIN gudang_bahan d on d.kd_gd_bahan = c.kd_gd_bahan");
		return $test;
	}

	function getDataHasilSablon()
	{
		$date = date("Y-m");
		$this->datatables->select("a.customer , b.*");
		$this->datatables->from("rencana_sablon a");
		$this->datatables->join("transaksi_hasil_sablon b","a.kd_sablon = b.kd_sablon");
		$this->datatables->where("DATE_FORMAT(`tanggal`, '%Y-%m')= '$date'");
	  return $this->datatables->generate();
	}

	function getHasilSablonPerTgl($tgl1,$tgl2)
	{
		$this->datatables->select("a.customer , b.*");
		$this->datatables->from("rencana_sablon a");
		$this->datatables->join("transaksi_hasil_sablon b","a.kd_sablon = b.kd_sablon");
		$this->datatables->where("b.tanggal between '$tgl1' and '$tgl2'");

	  return $this->datatables->generate();
	}

  function getBonHasilSablonPerTgl($tgl)
  {
    $this->datatables->select("a.customer , b.*");
    $this->datatables->from("rencana_sablon a");
    $this->datatables->join("transaksi_hasil_sablon b","a.kd_sablon = b.kd_sablon");
    $this->datatables->where("b.tanggal ='$tgl'");

    return $this->datatables->generate();
  }

  function getListBonHasilSablon($tgl)
  {
    $data = $this->db->query("SELECT a.customer , b.*
															 FROM rencana_sablon a
															 JOIN transaksi_hasil_sablon b
															 ON a.kd_sablon = b.kd_sablon
															 WHERE b.tanggal ='$tgl'");

    return $data;
  }

	function checkHasilSablon($tgl1,$tgl2)
	{
		$check = $this->db->query("SELECT a.customer , b.*
															 FROM rencana_sablon a
															 JOIN transaksi_hasil_sablon b
															 ON a.kd_sablon = b.kd_sablon
															 WHERE b.tanggal BETWEEN '$tgl1' AND '$tgl2'");
		return $check->num_rows();
	}

	function checkBonHasilSablon($tgl)
	{
		$check = $this->db->query("SELECT a.customer , b.*
															 FROM rencana_sablon a
															 JOIN transaksi_hasil_sablon b
															 ON a.kd_sablon = b.kd_sablon
															 WHERE b.tanggal = '$tgl'");
		return $check->num_rows();
	}

	function detail_hasil($kd_hasil_sablon)
	{
		$data = $this->db->query("SELECT * FROM transaksi_hasil_sablon WHERE kd_hasil_sablon ='$kd_hasil_sablon'");
		return $data;
	}

	function detail_bahan($kd_hasil_sablon)
	{
		$data = $this->db->query("SELECT a.*, b.nm_barang, b.jenis, b.warna
															FROM transaksi_penggunaan_bahan_sablon a
															JOIN gudang_bahan b ON a.kd_gd_bahan = b.kd_gd_bahan
															WHERE a.kd_hasil_sablon = '$kd_hasil_sablon'");
		return $data;
	}

	function getDataKirimSablon($tgl)
	{
		$data = $this->db->query("SELECT a.*, b.customer, c.jns_permintaan, c.jns_brg
															FROM transaksi_hasil_sablon a
															INNER JOIN rencana_sablon b ON a.kd_sablon = b.kd_sablon
															INNER JOIN gudang_hasil c ON a.kd_gd_hasil = c.kd_gd_hasil
															WHERE a.tanggal = '$tgl' AND a.status_bon = 'FALSE'")->result_array();
		 return json_encode($data);
	}

  function getDataPenggunaanBahanSablon($tgl)
  {
    $data = $this->db->query("SELECT a.kd_hasil_sablon, a.kd_gd_bahan, a.jumlah_pengambilan,
																		 a.sisa_pengambilan, b.id_user, b.tanggal
															FROM transaksi_penggunaan_bahan_sablon a
															JOIN transaksi_hasil_sablon b ON a.kd_hasil_sablon = b.kd_hasil_sablon
															WHERE b.status_bon = 'FALSE' AND b.tanggal = '$tgl'")->result_array();
     return json_encode($data);
  }

	function kirimHasilSablon($data,$tgl)
	{
		$this->db->trans_begin();
		$this->db->insert_batch('transaksi_gudang_hasil',$data);
    // $this->db->insert_batch('transaksi_gudang_bahan',$bahan);

    $penggunaanBahan = $this->db->query("SELECT a.kd_hasil_sablon, a.kd_gd_bahan,
																								a.jumlah_pengambilan, a.sisa_pengambilan, b.id_user, b.tanggal
																				 FROM transaksi_penggunaan_bahan_sablon a
																				 JOIN transaksi_hasil_sablon b ON a.kd_hasil_sablon = b.kd_hasil_sablon
																				 WHERE b.status_bon = 'FALSE' AND b.tanggal = '$tgl'");

    foreach ($penggunaanBahan->result_array() as $value) {
      $jummlaPenggunaan = $value["jumlah_permintaan"]-$value["sisa_pengambilan"];
      $this->db->set("stok", "`stok`-$jummlaPenggunaan",FALSE);
      $this->db->where("kd_gd_bahan",$value["kd_gd_bahan"]);
      $this->db->update("gudang_bahan_sablon");
    }

		$this->db->set('status_bon','TRUE');
    $this->db->set('status','FINISH');
    $this->db->where('tanggal',$tgl);
	  $this->db->update('transaksi_hasil_sablon');

		if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
	}

  function getBarangHD()
  {
    $data = $this->db->query("SELECT kd_gd_hasil, warna_plastik, ukuran
															FROM gudang_hasil
															WHERE merek = 'HD'")->result_array();
    return json_encode($data);
  }

  function searchBarangHD($key)
  {
    $data = $this->db->query("SELECT kd_gd_hasil, warna_plastik, ukuran
															FROM gudang_hasil
															WHERE merek ='hd'
															AND concat(ukuran,' ',warna_plastik) REGEXP '$key'")->result_array();
    return json_encode($data);
  }

  function getDetailHD($key)
  {
    $data = $this->db->query("SELECT * FROM gudang_hasil WHERE kd_gd_hasil = '$key'");
    return $data;
  }

  function addDataPengembalianHD($data)
  {
    $this->db->trans_begin();
    $this->db->insert('transaksi_gudang_hasil',$data);

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  function getDataPengembalianHD()
  {
    $this->datatables->select("tgl_transaksi, customer, id_permintaan_jadi, kd_gd_hasil, merek, ukuran, warna, jumlah_berat, jumlah_lembar");
    $this->datatables->from("transaksi_gudang_hasil");
    $this->datatables->where("keterangan_history='KEMBALIAN DARI SABLON' and sts_approve = 'FALSE' and status_transaksi = 'PENDING'");

    return $this->datatables->generate();
  }

  function deleteListKembalianHD($key)
  {
    $this->db->trans_begin();
    $this->db->query("DELETE FROM transaksi_gudang_hasil WHERE id_permintaan_jadi = '$key'");

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  function getDataPengembalianHDById($key)
  {
    $data = $this->db->query("SELECT id_permintaan_jadi, customer, kd_gd_hasil, tgl_transaksi, ukuran, warna, jumlah_berat, jumlah_lembar
															FROM transaksi_gudang_hasil
															WHERE id_permintaan_jadi = '$key'")->result_array();
    return json_encode($data);
  }

  function kirimPengembalianHD()
  {
    $this->db->trans_begin();
    $this->db->set('status_transaksi','PROGRESS');
    $this->db->where('status_transaksi','PENDING');
    $this->db->update('transaksi_gudang_hasil');

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  function getMerekSablon()
  {
    $data = $this->db->query("SELECT kd_gd_hasil, ukuran, warna_plastik, merek
															FROM gudang_hasil
															WHERE jns_brg = 'SABLON'
															AND jns_permintaan = 'CETAK'")->result_array();
    return json_encode($data);
  }

  function searchMerekSablon($key)
  {
    $data = $this->db->query("SELECT kd_gd_hasil, ukuran, warna_plastik, merek
															FROM gudang_hasil
															WHERE jns_brg = 'SABLON'
															AND jns_permintaan = 'CETAK'
															AND concat(merek,'' ,ukuran,' ', warna_plastik) REGEXP '$key'")->result_array();
    return json_encode($data);
  }

  function getUkuranSablonBuffer()
  {
    $data = $this->db->query("SELECT kd_gd_hasil, warna_plastik, ukuran, merek, sts_brg
															FROM gudang_hasil
															WHERE jns_brg = 'SABLON'
															AND jns_permintaan = 'POLOS'")->result_array();
    return json_decode($data);
  }

  function searchUkuranSablonBuffer($key)
  {
    $data = $this->db->query("SELECT kd_gd_hasil, warna_plastik, ukuran, merek, sts_brg
															FROM gudang_hasil
															WHERE jns_brg = 'SABLON'
															AND jns_permintaan = 'POLOS'
															AND CONCAT(kd_gd_hasil,' ',ukuran,' ',merek,' ',warna_plastik,' ',sts_brg) REGEXP '$key'")->result_array();
    return json_decode($data);
  }

  function updateListPengembalianHD($data)
  {
    $this->db->trans_begin();
    $this->db->set('customer',$data["customer"]);
    $this->db->set('jumlah_lembar',$data["jumlah_lembar"]);
    $this->db->set('jumlah_berat',$data["jumlah_berat"]);
    $this->db->set('tgl_transaksi', $data["tgl_transaksi"]);
    $this->db->where('id_permintaan_jadi',$data["id"]);
    $this->db->update('transaksi_gudang_hasil');

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  public function getDataPenggunaanBahanSablonById($id){
    $data = $this->db->query("SELECT a.id_penggunaan_sablon, a.kd_hasil_sablon,
																		 a.kd_gd_bahan, a.jumlah_pengambilan, a.sisa_pengambilan, b.nm_barang, b.warna, b.jenis
															FROM transaksi_penggunaan_bahan_sablon a
															JOIN gudang_bahan b ON a.kd_gd_bahan = b.kd_gd_bahan
															WHERE id_penggunaan_sablon = '$id'")->result_array();
    return json_encode($data);
  }

  function updatePenggunaanBahanSablon($data)
  {
    $this->db->trans_begin();
    $this->db->set('jumlah_pengambilan',$data["jumlah_pengambilan"]);
    $this->db->set('sisa_pengambilan',$data["sisa_pengambilan"]);
    $this->db->where('id_penggunaan_sablon',$data["id"]);
    $this->db->update('transaksi_penggunaan_bahan_sablon');

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  function getDataHasilSablonById($id)
  {
    $data = $this->db->query("SELECT kd_hasil_sablon, kd_sablon, tanggal, ukuran,
																		 merek, warna_plastik, warna_cat, hasil_lembar, hasil_berat
															FROM transaksi_hasil_sablon
															WHERE kd_hasil_sablon = '$id'")->result_array();
    return json_encode($data);
  }

  function updateDataHasilSablon($data)
  {
    $this->db->trans_begin();

    $rencana_sablon = $this->db->query("SELECT jml_sisa, jml_hasil
																				FROM rencana_sablon
																				WHERE kd_sablon = '$data[kd_sablon]'")->result_array();
    $jml_sisa = $rencana_sablon[0]['jml_sisa'];
    $jml_hasil= $rencana_sablon[0]['jml_hasil'];
    $re_hasil = $jml_hasil - $data["hasil_awal"];
    $new_hasil= $re_hasil + $data["lembar"];
    $re_sisa  = $jml_sisa + $data["hasil_awal"];
    $new_sisa = $re_sisa - $data["lembar"];

    if ($new_sisa > 0) {
      $this->db->set('jml_sisa', $new_sisa);
      $this->db->set('jml_hasil',$new_hasil);
      $this->db->set('sts_pengerjaan','PROGRESS');
      $this->db->where('kd_sablon',$data["kd_sablon"]);
      $this->db->update('rencana_sablon');
    }else{
      $this->db->set('jml_sisa', $new_sisa);
      $this->db->set('jml_hasil',$new_hasil);
      $this->db->set('sts_pengerjaan','FINISH');
      $this->db->where('kd_sablon',$data["kd_sablon"]);
      $this->db->update('rencana_sablon');
    }

    $this->db->set('hasil_lembar', $data["lembar"]);
    $this->db->set('hasil_berat',$data["berat"]);
    $this->db->where('kd_hasil_sablon',$data["kd_hasil"]);
    $this->db->update('transaksi_hasil_sablon');

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

  function deleteHasilSablon($idSablon,$idHasil)
  {
    $this->db->trans_begin();
    $hasil = $this->db->query("SELECT hasil_lembar
															 FROM transaksi_hasil_sablon
															 WHERE kd_hasil_sablon = '$idHasil'")->result_array();
    $hasil = $hasil[0]["hasil_lembar"];

    $rencana  = $this->db->query("SELECT jml_sisa, jml_hasil
															 		FROM rencana_sablon
															 		WHERE kd_sablon = '$idSablon'")->result_array();
    $jml_sisa = $rencana[0]["jml_sisa"];
    $jml_hasil= $rencana[0]["jml_hasil"];

    $re_sisa = $jml_sisa + $hasil;
    $re_hasil= $jml_hasil - $hasil;

    $this->db->set('jml_sisa',$re_sisa);
    $this->db->set('jml_hasil',$re_hasil);
    $this->db->set('sts_pengerjaan','PROGRESS');
    $this->db->where('kd_sablon',$idSablon);
    $this->db->update('rencana_sablon');

    $this->db->query("DELETE FROM transaksi_penggunaan_bahan_sablon WHERE kd_hasil_sablon = '$idHasil'");
    $this->db->query("DELETE FROM transaksi_hasil_sablon WHERE kd_hasil_sablon = '$idHasil'");

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      return "Failed";
    }else{
      $this->db->trans_commit();
      return "Success";
    }
  }

	public function selectGudangBuffer($param){
		if(empty($param["key"])){
			$Q = "SELECT * FROM gudang_hasil
						WHERE ukuran = '$param[ukuran]'
						AND warna_plastik = '$param[warna_plastik]'
						AND jns_permintaan = 'POLOS'
						AND (jns_brg = 'SABLON' OR merek='HD' OR merek LIKE '%klip%' OR jns_brg ='CAMPUR')
						AND jns_brg != 'KANVAS'
						AND deleted = 'FALSE'";
		}else{
			if(strpos($param["key"], "|") != -1){
				$arrKey = explode("|", $param["key"]);
				$Q = "SELECT * FROM gudang_hasil
							WHERE ukuran = '$param[ukuran]'
							AND warna_plastik = '$param[warna_plastik]'
							AND jns_permintaan = 'POLOS'
							AND (jns_brg = 'SABLON' OR merek='HD' OR merek LIKE '%klip%' OR jns_brg ='CAMPUR')
							AND jns_brg != 'KANVAS'
							AND deleted = 'FALSE'
							AND ukuran = '$arrKey[0]'
							AND merek = '$arrKey[1]'
							AND warna_plastik = '$arrKey[2]'";
			}else{
				$Q = "SELECT * FROM gudang_hasil
							WHERE ukuran = '$param[ukuran]'
							AND warna_plastik = '$param[warna_plastik]'
							AND jns_permintaan = 'POLOS'
							AND (jns_brg = 'SABLON' OR merek='HD' OR merek LIKE '%klip%'  OR jns_brg ='CAMPUR')
							AND jns_brg != 'KANVAS'
							AND deleted = 'FALSE'
							AND (ukuran LIKE '%$param[key]%'
							OR merek LIKE '%$param[key]%'
							OR warna_plastik LIKE '%$param[key]%')";
			}
		}
		$result = $this->db->query($Q)->result_array();
		echo json_encode($result);
	}

	public function selectPengambilanGudangBuffer($param){
		if(strpos($param["kd_gd_buffer"], "HSLC") != -1){
			$Q = "SELECT jumlah_berat, jumlah_lembar
						FROM transaksi_gudang_hasil
						WHERE (kd_gd_hasil = '$param[kd_gd_hasil]' OR kd_gd_hasil = '$param[kd_gd_buffer]')
						AND tgl_transaksi = '$param[tgl_rencana]'
						AND keterangan_history = 'PENGAMBILAN SABLON (CAMPUR)'
						AND deleted='FALSE'";
		}else{
			$Q = "SELECT jumlah_berat, jumlah_lembar
						FROM transaksi_gudang_hasil
						WHERE kd_gd_hasil = '$param[kd_gd_hasil]'
						AND kd_gd_hasil_secondary = '$param[kd_gd_buffer]'
						AND tgl_transaksi = '$param[tgl_rencana]'
						AND keterangan_history = 'PENGAMBILAN SABLON (SABLON)'
						AND deleted='FALSE'";
		}
		$result = $this->db->query($Q)->result_array();
		// echo $Q;
		return $result;
	}

	public function updateDeleteAndRestoreRencanaMandor($param){
		$this->db->trans_begin();
		if($param["deleted"] == "TRUE"){
			$Q = "SELECT kd_ppic, jml_rencana FROM rencana_sablon WHERE kd_sablon = '$param[kdSablon]'";
			$arrQ = $this->db->query($Q)->result_array();
			$kdPpic = $arrQ[0]["kd_ppic"];
			$jmlRencana = $arrQ[0]["jml_rencana"];
			$this->db->set("sisa","sisa + $jmlRencana", FALSE);
			$this->db->where("kd_ppic",$kdPpic);
			$this->db->update("rencana_ppic");
		}
		$this->db->set("deleted",$param["deleted"]);
		$this->db->where("kd_sablon",$param["kdSablon"]);
		$this->db->update("rencana_sablon");
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return "Gagal";
		}else{
			$this->db->trans_commit();
			return "Berhasil";
		}
	}

	public function selectDataHasilSablon($param){
		$Q1 = "SELECT * FROM rencana_sablon WHERE kd_sablon='$param[kdSablon]' AND deleted='FALSE'";
		$Q2 = "SELECT * FROM transaksi_hasil_sablon WHERE kd_hasil_sablon='$param[kdHasilSablon]'
					 AND deleted='FALSE'";
		$Q3 = "SELECT TPBS.*, GHS.*
					 FROM transaksi_penggunaan_bahan_sablon TPBS
					 INNER JOIN gudang_bahan_sablon GHS ON TPBS.kd_gd_bahan = GHS.kd_gd_bahan
					 WHERE TPBS.kd_hasil_sablon='$param[kdHasilSablon]'
					 AND GHS.deleted='FALSE'";

		$arrQ1 = $this->db->query($Q1)->result_array();
		$arrQ2 = $this->db->query($Q2)->result_array();
		$arrQ3 = $this->db->query($Q3)->result_array();

		$result = array("DetailRencana" => $arrQ1,
										"TransaksiHasilSablon" => $arrQ2,
										"TransaksiPenggunaanBahanSablon" => $arrQ3);
		return json_encode($result);
	}

	public function tambahBarangBaru($param){
		$this->db->trans_begin();
		$this->db->insert("transaksi_penggunaan_bahan_sablon",$param);
		$jumlahPenggunaan = $param["jumlah_pengambilan"] - $param["sisa_pengambilan"];
		$this->db->set("stok","stok - ".$jumlahPenggunaan, FALSE);
		$this->db->where("kd_gd_bahan",$param["kd_gd_bahan"]);
		$this->db->update("gudang_bahan_sablon");
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return "Gagal";
		}else{
			$this->db->trans_commit();
			return "Berhasil";
		}
	}

	public function ubahHasilSablon($param){
		$this->db->trans_begin();
		$periode = date("Y-m", $param["tanggal"]);
		$QDataHasil = "SELECT THS.*, RS.kd_gd_buffer, RS.jml_rencana
									 FROM transaksi_hasil_sablon THS
									 INNER JOIN rencana_sablon RS ON THS.kd_sablon = RS.kd_sablon
									 WHERE THS.kd_hasil_sablon='$param[kd_hasil_sablon]'
									 AND THS.deleted='FALSE'
									 AND RS.deleted='FALSE'";
		$QCheckLock = "SELECT COUNT(id_permintaan_jadi) AS counter
									 FROM transaksi_gudang_hasil
									 WHERE sts_barang='SABLON'
									 AND jns_permintaan='CETAK'
									 AND DATE_FORMAT(tgl_transaksi,'%Y-%m') = '$periode'
									 AND status_lock='TRUE'";
		$arrDataHasil = $this->db->query($QDataHasil)->result_array();
		$arrCheckLock = $this->db->query($QCheckLock)->result_array();

		if($arrCheckLock[0]["counter"] > 0){
			$this->db->trans_rollback();
			return "Lock";
		}else{
			#========== Update Data Barang Hasil Sablon (Start) ==========#
			$QDataTGH = "SELECT id_permintaan_jadi, status_transaksi FROM transaksi_gudang_hasil
									 WHERE jumlah_lembar='".$arrDataHasil[0]["hasil_lembar"]."'
									 AND jumlah_berat='".$arrDataHasil[0]["hasil_berat"]."'
									 AND kd_gd_hasil='".$arrDataHasil[0]["kd_gd_hasil"]."'
									 AND tgl_transaksi='".$arrDataHasil[0]["tanggal"]."'
									 AND keterangan_history='MASUK DARI SABLON'
									 AND deleted='FALSE'";
			$arrDataTGH = $this->db->query($QDataTGH)->result_array();
			if(count($arrDataTGH) > 0){
				if($arrDataTGH[0]["status_transaksi"] == "FINISH"){
					$selisihBerat = $param["hasil_berat"] - $arrDataHasil[0]["hasil_berat"];
					$selisihLembar = $param["hasil_lembar"] - $arrDataHasil[0]["hasil_lembar"];

					$this->db->set("stok_berat","stok_berat + ".$selisihBerat,FALSE);
					$this->db->set("stok_lembar","stok_lembar + ".$selisihLembar,FALSE);
					$this->db->where("kd_gd_hasil",$arrDataHasil[0]["kd_gd_hasil"]);
					$this->db->update("gudang_hasil");
				}

				$this->db->set("jumlah_berat",$param["hasil_berat"]);
				$this->db->set("jumlah_lembar",$param["hasil_lembar"]);
				$this->db->set("tgl_transaksi",$param["tanggal"]);
				$this->db->where("id_permintaan_jadi",$arrDataTGH[0]["id_permintaan_jadi"]);
				$this->db->update("transaksi_gudang_hasil");
			}
			#========== Update Data Barang Hasil Sablon (Finish) ==========#

			#========== Update Data Kembalian Barang Polos (Start) ==========#
			if(!empty($param["berat_kembalian"]) || !empty($param["lembar_kembalian"])){
				$QBeratKembalian = "SELECT id_permintaan_jadi, status_transaksi
														FROM transaksi_gudang_hasil
														WHERE kd_gd_hasil = '".$arrDataHasil[0]["kd_gd_buffer"]."'
														AND jumlah_berat='".$arrDataHasil[0]["berat_kembalian"]."'
														AND jumlah_lembar='".$arrDataHasil[0]["lembar_kembalian"]."'
														AND tgl_transaksi='".$arrDataHasil[0]["tanggal"]."'
														AND keterangan_history='PENGEMBALIAN BARANG'
														AND keterangan_barang='PENGEMBALIAN SABLON'
														AND deleted='FALSE'";

				$arrBeratKembalian = $this->db->query($QBeratKembalian)->result_array();
				if($arrBeratKembalian[0]["status_transaksi"] == "FINISH"){
					$selisihBeratKembalian = $param["berat_kembalian"] + $arrDataHasil[0]["berat_kembalian"];
					$selisihLembarKembalian = $param["lembar_kembalian"] + $arrDataHasil[0]["lembar_kembalian"];

					$this->db->set("stok_berat","stok_berat + ".$selisihBeratKembalian,FALSE);
					$this->db->set("stok_lembar","stok_lembar + ".$selisihLembarKembalian,FALSE);
					$this->db->where("kd_gd_hasil",$arrDataHasil[0]["kd_gd_buffer"]);
					$this->db->update("gudang_hasil");
				}

				$this->db->set("jumlah_berat",$param["berat_kembalian"]);
				$this->db->set("jumlah_lembar",$param["lembar_kembalian"]);
				$this->db->set("tgl_transaksi",$param["tanggal"]);
				$this->db->where("id_permintaan_jadi",$arrDataTGH[0]["id_permintaan_jadi"]);
				$this->db->update("transaksi_gudang_hasil");
			}
			#========== Update Data Kembalian Barang Polos (Finish) ==========#

			#========== Update Data Hasil Jadi Sablon (Start) ==========#
			$this->db->where("kd_hasil_sablon",$param["kd_hasil_sablon"]);
			$this->db->update("transaksi_hasil_sablon",$param);
			#========== Update Data Hasil Jadi Sablon (Finish) ==========#

			if($this->db->trans_status() === FALSE){
				$this->db->trans_rollback();
				return "Gagal";
			}else{
				$this->db->trans_commit();
				return "Berhasil";
			}
		}
	}

	public function ubahPemakaianBahan($param){
		$this->db->trans_begin();
		$Q = "SELECT * FROM transaksi_penggunaan_bahan_sablon WHERE id_penggunaan_sablon='$param[id_penggunaan_sablon]'";
		$arrQ = $this->db->query($Q)->result_array();
		if(empty($param["kd_gd_bahan"])){
			$jumlahPengambilanLama = $arrQ[0]["jumlah_pengambilan"];
			$sisaPengambilanLama = $arrQ[0]["sisa_pengambilan"];
			$jumlahPemakaianLama = $jumlahPengambilanLama - $sisaPengambilanLama;

			$jumlahPengambilanBaru = $param["jumlah_pengambilan"];
			$sisaPengambilanBaru = $param["sisa_pengambilan"];
			$jumlahPemakaianBaru = $jumlahPengambilanBaru - $sisaPengambilanBaru;

			$jumlahPemakaian = $jumlahPemakaianLama - $jumlahPemakaianBaru;

			$this->db->set("stok","stok + ".$jumlahPemakaian, FALSE);
			$this->db->where("kd_gd_bahan",$arrQ[0]["kd_gd_bahan"]);
			$this->db->update("gudang_bahan_sablon");

			$this->db->where("id_penggunaan_sablon",$param["id_penggunaan_sablon"]);
			$this->db->update("transaksi_penggunaan_bahan_sablon",array_diff_key($param,array_flip(array("kd_gd_bahan"))));
		}else{
			if($param["kd_gd_bahan"] != $arrQ[0]["kd_gd_bahan"]){
				$jumlahPengambilanLama = $arrQ[0]["jumlah_pengambilan"];
				$sisaPengambilanLama = $arrQ[0]["sisa_pengambilan"];
				$jumlahPemakaianLama = $jumlahPengambilanLama - $sisaPengambilanLama;
				$this->db->set("stok","stok + ".$jumlahPemakaianLama, FALSE);
				$this->db->where("kd_gd_bahan",$arrQ[0]["kd_gd_bahan"]);
				$this->db->update("gudang_bahan_sablon");

				$jumlahPengambilanBaru = $param["jumlah_pengambilan"];
				$sisaPengambilanBaru = $param["sisa_pengambilan"];
				$jumlahPemakaianBaru = $jumlahPengambilanBaru - $sisaPengambilanBaru;
				$this->db->set("stok","stok - ".$jumlahPemakaianBaru, FALSE);
				$this->db->where("kd_gd_bahan",$param["kd_gd_bahan"]);
				$this->db->update("gudang_bahan_sablon");

				$this->db->where("id_penggunaan_sablon",$param["id_penggunaan_sablon"]);
				$this->db->update("transaksi_penggunaan_bahan_sablon",$param);
			}else{
				$jumlahPengambilanLama = $arrQ[0]["jumlah_pengambilan"];
				$sisaPengambilanLama = $arrQ[0]["sisa_pengambilan"];
				$jumlahPemakaianLama = $jumlahPengambilanLama - $sisaPengambilanLama;

				$jumlahPengambilanBaru = $param["jumlah_pengambilan"];
				$sisaPengambilanBaru = $param["sisa_pengambilan"];
				$jumlahPemakaianBaru = $jumlahPengambilanBaru - $sisaPengambilanBaru;

				$jumlahPemakaian = $jumlahPemakaianLama - $jumlahPemakaianBaru;

				$this->db->set("stok","stok + ".$jumlahPemakaian, FALSE);
				$this->db->where("kd_gd_bahan",$arrQ[0]["kd_gd_bahan"]);
				$this->db->update("gudang_bahan_sablon");

				$this->db->where("id_penggunaan_sablon",$param["id_penggunaan_sablon"]);
				$this->db->update("transaksi_penggunaan_bahan_sablon",$param);
			}
		}
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return "Gagal";
		}else{
			$this->db->trans_commit();
			return "Berhasil";
		}
	}

	public function deletePenggunaanBahan($param){
		$this->db->trans_begin();
		$Q = "SELECT * FROM transaksi_penggunaan_bahan_sablon WHERE id_penggunaan_sablon = '$param'";
		$arrQ = $this->db->query($Q)->result_array();
		$jumlahPemakaian = $arrQ[0]["jumlah_pengambilan"] - $arrQ[0]["sisa_pengambilan"];

		$this->db->set("stok","stok + ".$jumlahPemakaian, FALSE);
		$this->db->where("kd_gd_bahan",$arrQ[0]["kd_gd_bahan"]);
		$this->db->update("gudang_bahan_sablon");

		$this->db->where("id_penggunaan_sablon",$param);
		$this->db->delete("transaksi_penggunaan_bahan_sablon");
		if($this->db->trans_status() === FALSE){
			$this->db->trans_rollback();
			return "Gagal";
		}else{
			$this->db->trans_commit();
			return "Berhasil";
		}
	}
}
