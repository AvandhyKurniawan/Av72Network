<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Model extends CI_Model{
  public function doLogin($param){
    $this->db->trans_begin();
    $username = $param["USERNAME"];
    $password = $this->encryption->Av72Net_ENC_OPEN_SSL($param["PASSWORD"]);
    $this->db->select("*");
    $this->db->from("administrator");
    $this->db->where("username",$username);
    $this->db->where("password",$password);
    $arrResultQ = $this->db->get()->result_array();
    if(count($arrResultQ) == 1){
      #======= Set Response =======#
      $result = array("CODE" => 200,
                      "ERROR" => "FALSE",
                      "MESSAGE" => "Authorized",
                      "RESPONSE" => "Login Berhasil");
      #======= Set Session Login =======#
      $dataForSession = array("Av72Net_AdminId" => encodePassword($arrResultQ[0]["admin_id"]),
                              "Av72Net_Username" => $arrResultQ[0]["username"],
                              "Av72Net_FullName" => $arrResultQ[0]["full_name"],
                              "Av72Net_Role" => $arrResultQ[0]["role"]);
      $this->session->set_userdata($dataForSession);

      #======= Update Last Login Administrator Table =======#
      $this->db->query("UPDATE administrator SET last_login = NOW() WHERE admin_id = '".$arrResultQ[0]["admin_id"]."'");
    }else{
      #======= Set Response =======#
      $result = array("CODE" => 401,
                      "ERROR" => "TRUE",
                      "MESSAGE" => "Unauthorized",
                      "RESPONSE" => "Kombinasi Nama Pengguna Dan Kata Sandi Tidak Cocok!");
    }

    if($this->db->trans_status() === FALSE){
      $this->db->trans_rollback();
      #======= Set Response =======#
      $result = array("CODE" => 500,
                      "ERROR" => "TRUE",
                      "MESSAGE" => "Internal Server Error",
                      "RESPONSE" => "Maaf, Terjadi Kesalahan Pada Server Kami");

      return json_encode($result);
    }else{
      $this->db->trans_commit();
      return json_encode($result);
    }
  }
}

?>
