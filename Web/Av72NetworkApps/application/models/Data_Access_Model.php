<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Data_Access_Model extends CI_Model{
#=============== Insert Data (Start) ===============#
public function insertData($param){
  $this->db->trans_begin();
  $arrTable = array_keys($param);
  foreach ($arrTable as $table) {
    $this->db->insert_batch($table, $param[$table]["VALUES"]);
  }
  if($this->db->trans_status() === FALSE){
    $this->db->trans_rollback();
    $result = array("CODE"      => 500,
                    "MESSAGE"   => "Internal Server Error",
                    "RESPONSE"  => "Maaf, Terjadi Kesalahan Pada Database Server.");
    return json_encode($result);
  }else{
    $this->db->trans_commit();
    $result = array("CODE"      => 200,
                    "MESSAGE"   => "Success",
                    "RESPONSE"  => "Data Anda Berhasil Ditambahkan.");
    return json_encode($result);
  }
}
#=============== Insert Data (Finish) ===============#

#=============== Select Data (Start) ===============#
public function selectData($param){
  $arrTable = array_keys($param);
  $arrResult = array("CODE"      => 200,
                     "MESSAGE"   => "Success",
                     "RESPONSE"  => array_fill_keys($arrTable, array())
               );
  foreach($arrTable as $table){
    if(array_key_exists("COLUMN", $param[$table])){
      $this->db->select($param[$table]["COLUMN"]);
    }
    if(array_key_exists("JOIN", $param[$table])){
      $this->db->join($param[$table]["JOIN"]);
    }
    if(array_key_exists("WHERE", $param[$table])){
      $this->db->where($param[$table]["WHERE"]);
    }
    if(array_key_exists("GROUP BY", $param[$table])){
      $this->db->group_by($param[$table]["GROUP BY"]);
    }
    if(array_key_exists("ORDER BY", $param[$table])){
      $this->db->order_by($param[$table]["ORDER BY"]);
    }
    $result = $this->db->get($table)->result_array();
    $arrResult["RESPONSE"][$table] += $result;
  }
  return json_encode($arrResult);
}

public function selectGenerateId($param){
  $arrTable = array_keys($param);
  $arrResult = array("CODE"      => 200,
                     "MESSAGE"   => "Success",
                     "RESPONSE"  => array_fill_keys($arrTable, array())
               );
  foreach($arrTable as $table){
    if(array_key_exists("COLUMN", $param[$table])){
      $this->db->select($param[$table]["COLUMN"]);
    }
    if(array_key_exists("WHERE", $param[$table])){
      $this->db->where($param[$table]["WHERE"]);
    }
    $result = $this->db->get($table)->result_array();
    if(empty($result[0]["CODE"])){
      $tempCode = "0000";
    }
    $tempCode = "0000".(intval($result[0]["CODE"])+1);
    $finalCode = array("RESULTCODE" => $param[$table]["PREFIX"].substr($tempCode,(strlen($tempCode)-4)));
    $arrResult["RESPONSE"][$table] += $finalCode;
  }
  return json_encode($arrResult);
}
#=============== Select Data (Finish) ===============#

#=============== Update Data (Start) ===============#
public function updateData($param, $math=FALSE){
  $this->db->trans_begin();
  $arrTable = array_keys($param);
  foreach($arrTable as $table){
    if(array_key_exists("WHERE", $param[$table]) && array_key_exists("VALUES", $param[$table])){
      if($math == FALSE){
        $this->db->where($param[$table]["WHERE"]);
        $this->db->update($table, $param[$table]["VALUES"]);
      }else{
        
      }
    }else{
      $this->db->trans_rollback();
      $result = array("CODE"      => 500,
                      "MESSAGE"   => "Internal Server Error",
                      "RESPONSE"  => "Maaf, Terjadi Kesalahan Fungsi Pada Controller Program.");
      return json_encode($result);
    }
  }
  if($this->db->trans_status() === FALSE){
    $this->db->trans_rollback();
    $result = array("CODE"      => 500,
                    "MESSAGE"   => "Internal Server Error",
                    "RESPONSE"  => "Maaf, Terjadi Kesalahan Pada Database Server.");
    return json_encode($result);
  }else{
    $this->db->trans_commit();
    $result = array("CODE"      => 200,
                    "MESSAGE"   => "Success",
                    "RESPONSE"  => "Data Anda Berhasil Diperbarui.");
    return json_encode($result);
  }
}

public function changePassword($param){
  $this->db->trans_begin();
  $arrTable = array_keys($param);
  foreach($arrTable as $table){
    if(array_key_exists("WHERE", $param[$table]) && array_key_exists("VALUES", $param[$table])){
      $arrData = $this->db->get_where($table, array("admin_id"=>$param[$table]["WHERE"]["admin_id"]))->result_array();
      if($param[$table]["WHERE"]["password"] == $arrData[0]["password"]){
        $this->db->set($param[$table]["VALUES"]);
        $this->db->where($param[$table]["WHERE"]);
        $this->db->update($table);
      }else{
        $this->db->trans_rollback();
        $result = array("CODE"      => 401,
                        "MESSAGE"   => "Unauthorized",
                        "RESPONSE"  => "Maaf, Kata Sandi Lama Yang Anda Masukan Salah!");
        return json_encode($result);
      }
    }else{
      $this->db->trans_rollback();
      $result = array("CODE"      => 500,
                      "MESSAGE"   => "Internal Server Error",
                      "RESPONSE"  => "Maaf, Terjadi Kesalahan Fungsi Pada Controller Program.");
      return json_encode($result);
    }
  }
  if($this->db->trans_status() === FALSE){
    $this->db->trans_rollback();
    $result = array("CODE"      => 500,
                    "MESSAGE"   => "Internal Server Error",
                    "RESPONSE"  => "Maaf, Terjadi Kesalahan Pada Database Server.");
    return json_encode($result);
  }else{
    $this->db->trans_commit();
    $result = array("CODE"      => 200,
                    "MESSAGE"   => "Success",
                    "RESPONSE"  => "Kata Sandi Anda Telah Berhasil Diperbarui. Silahkan Keluar Terlebih Dahulu Untuk Menggunakan Kata Sandi Baru.");
    return json_encode($result);
  }
}
#=============== Update Data (Finish) ===============#
}
?>
