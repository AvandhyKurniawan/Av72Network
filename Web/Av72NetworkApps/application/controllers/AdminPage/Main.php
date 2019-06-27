<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model("Data_Access_Model");
  }

	public function index(){
    if(Main::isLogin()){
      $DATA = array("TITLE"        => "Selamat Datang ",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                    "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT"    => "",
                    "CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
      $this->load->view("Admin_Dashboard_View/ADV_Header");
      $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
      $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
      $this->load->view("Admin_Dashboard_View/ADV_Footer");
    }else{
      redirect("/","refresh");
    }
	}

  private function isLogin(){
    if(!empty($this->session->userdata("Av72Net_AdminId")) &&
       !empty($this->session->userdata("Av72Net_Username")) &&
       !empty($this->session->userdata("Av72Net_FullName")) &&
       !empty($this->session->userdata("Av72Net_Role"))
    ){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  private function listMenu(){
    if(Main::isLogin()){
      if(!empty($this->session->userdata("Av72Net_Role")) &&
         $this->session->userdata("Av72Net_Role") == "ROOT"){
        $data = array("PARENT_MENU" => array(
                                              array("NAME"    => "Tambah Data Admin",
                                                    "ID"      => "MTambahDataAdmin",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "AdminPage/main/add_new_administrator",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Data Pegawai",
                                                    "ID"      => "MTambahDataPegawai",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "AdminPage/main/add_new_employee",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Data Paket Internet",
                                                    "ID"      => "MTambahDataPaketInternet",
                                                    "ICON"    => "fa fa-plus",
                                                    "URL"     => "AdminPage/main/add_new_internet_package",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Transaksi",
                                                    "ID"      => "MTransaksi",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "#",
                                                    "STATUS"  => "Multi",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 2),

                                              array("NAME"    => "Laporan",
                                                    "ID"      => "MLaporan",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "#",
                                                    "STATUS"  => "Multi",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 2),
                                            ),

                      "CHILD_MENU" => array(
                                              array("NAME"    => "Registrasi Pelanggan Baru",
                                                    "ID"      => "MRegistrasiPelangganBaru",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "AdminPage/main/new_registration",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Pembayaran Registrasi Baru",
                                                    "ID"      => "MPembayaranRegistrasiBaru",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "AdminPage/main/add_new_registration_payment",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Pembayaran Internet Bulanan",
                                                    "ID"      => "MPembayaranInternetBulanan",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "AdminPage/main/add_internet_payment",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),
                                           )
                     );
      }else{
        $data = array("PARENT_MENU" => array(
                                              array("NAME"    => "Tambah Data Pegawai",
                                                    "ID"      => "MTambahDataPegawai",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "AdminPage/main/add_new_employee",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Data Paket Internet",
                                                    "ID"      => "MTambahDataPaketInternet",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "AdminPage/main/add_new_internet_package",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Transaksi",
                                                    "ID"      => "MTransaksi",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "#",
                                                    "STATUS"  => "Multi",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 2),

                                              array("NAME"    => "Laporan",
                                                    "ID"      => "MLaporan",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "#",
                                                    "STATUS"  => "Multi",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 2),
                                            ),

                      "CHILD_MENU" => array(
                                              array("NAME"    => "Registrasi Pelanggan Baru",
                                                    "ID"      => "MRegistrasiPelangganBaru",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "AdminPage/main/new_registration",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Pembayaran Registrasi Baru",
                                                    "ID"      => "MPembayaranRegistrasiBaru",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "AdminPage/main/add_new_registration_payment",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Pembayaran Internet Bulanan",
                                                    "ID"      => "MPembayaranInternetBulanan",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "AdminPage/main/add_internet_payment",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),
                                           )
                     );
      }
      return $data;
    }else{
      redirect("/","refresh");
    }
  }

  public function add_new_administrator(){
    if(Main::isLogin()){ 
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $DATA = array("TITLE"     => "Tambah Data",
                      "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                              "Link_2" => $this->uri->rsegment(2)),
                      "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Input_Admin",NULL,TRUE),
                      "CSRF_NAME" => $this->security->get_csrf_token_name(),
                      "CSRF_TOKEN" => $this->security->get_csrf_hash());
                  
        $this->load->view("Admin_Dashboard_View/ADV_Header");
        $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
        $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
        $this->load->view("Admin_Dashboard_View/ADV_Footer");
      }else{
        log_message("APPLICATION","ADMIN MENCOBA MASUK",FALSE);
        redirect("/","refresh");
      }
    }else{
      redirect("/","refresh");
    }

  }

  public function add_new_client(){
    if(Main::isLogin()){
      $DATA = array("TITLE"     => "Tambah Data",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                            "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Input_Client",NULL,TRUE),
                    "CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
  		$this->load->view("Admin_Dashboard_View/ADV_Header");
      $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
      $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
      $this->load->view("Admin_Dashboard_View/ADV_Footer");
    }else{
      redirect("/","refresh");
    }
  }

  public function add_new_internet_package(){
    if(Main::isLogin()){
      $DATA = array("TITLE"     => "Tambah Data",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                            "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Input_Internet_Package",NULL,TRUE),
                    "CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
  		$this->load->view("Admin_Dashboard_View/ADV_Header");
      $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
      $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
      $this->load->view("Admin_Dashboard_View/ADV_Footer");
    }else{
      redirect("/","refresh");
    }
  }

  public function new_registration(){
    if(Main::isLogin()){
      $DATA = array("TITLE"     => "Tambah Data",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                            "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Input_New_Registration",NULL,TRUE),
                    "CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
  		$this->load->view("Admin_Dashboard_View/ADV_Header");
      $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
      $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
      $this->load->view("Admin_Dashboard_View/ADV_Footer");
    }else{
      redirect("/","refresh");
    }
  }

  public function add_new_registration_payment(){
    if(Main::isLogin()){
      $DATA = array("TITLE"     => "Tambah Data",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                            "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Registration_Payment",NULL,TRUE),
                    "CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
      $this->load->view("Admin_Dashboard_View/ADV_Header");
      $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
      $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
      $this->load->view("Admin_Dashboard_View/ADV_Footer");
    }else{
      redirect("/","refresh");
    }
  }

  public function add_internet_payment(){
    if(Main::isLogin()){
      $DATA = array("TITLE"     => "Tambah Data",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                            "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Internet_Payment",NULL,TRUE),
                    "CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
      $this->load->view("Admin_Dashboard_View/ADV_Header");
      $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
      $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
      $this->load->view("Admin_Dashboard_View/ADV_Footer");
    }else{
      redirect("/","refresh");
    }
  }

  public function add_new_employee(){
    if(Main::isLogin()){
      $DATA = array("TITLE"     => "Tambah Data",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                            "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Input_Employee",NULL,TRUE),
                    "CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
      $this->load->view("Admin_Dashboard_View/ADV_Header");
      $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
      $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
      $this->load->view("Admin_Dashboard_View/ADV_Footer");
    }else{
      redirect("/","refresh");
    }
  }

  public function change_password(){
    if(Main::isLogin()){
      $DATA = array("TITLE"     => "Ubah Kata Sandi",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                            "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Change_Password",NULL,TRUE),
                    "CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
      $this->load->view("Admin_Dashboard_View/ADV_Header");
      $this->load->view("Admin_Dashboard_View/ADV_Sidebar",Main::listMenu());
      $this->load->view("Admin_Dashboard_View/ADV_Content_Wrapper",$DATA);
      $this->load->view("Admin_Dashboard_View/ADV_Footer");
    }else{
      redirect("/","refresh");
    }
  }

  public function saveAdministratorData(){
    if(Main::isLogin()){
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $fullname                = $this->input->post("FULLNAME");
        $username                = $this->input->post("USERNAME");
        $role                    = $this->input->post("ROLE");
        $password                = $this->input->post("PASSWORD");
        $passwordConfirmation    = $this->input->post("PASSWORDCONFIRMATION");
        $picture                 = $this->input->post("PICTURE");
        $key                     = $this->config->item("encryption_key");
  
        if(empty($fullname) || empty($username) || empty($role) || 
           empty($password) || empty($passwordConfirmation)
        ){
          $result = json_encode(array("CODE"      => 400,
                                      "MESSAGE"   => "Bad Request",
                                      "RESPONSE"  => "Maaf, Semua Kolom Tidak Boleh Kosong!"));
        }else{
          if($passwordConfirmation != $password){
            $result = json_encode(array("CODE"      => 401,
                                        "MESSAGE"   => "Unauthorized",
                                        "RESPONSE"  => "Password Yang Anda Masukan Tidak Sama!"));
          }else if(strlen($password) < 8){
            $result = json_encode(array("CODE"      => 406,
                                        "MESSAGE"   => "Not Acceptable",
                                        "RESPONSE"  => "Password Yang Anda Masukan Terlalu Pendek!"));
          }else{
            $password = $this->encryption->Av72Net_ENC_OPEN_SSL(decodePassword($password));
            $arrData = array("administrator" => array("VALUES" => array(
                                                                    array("username"    => $username,
                                                                          "password"    => $password,
                                                                          "full_name"   => $fullname,
                                                                          "role"        => $role
                                                                    )
                                                                  )
                                                )
                       );
  
            $result = $this->Data_Access_Model->insertData($arrData);
          }
        }
      }else{
        $result = json_encode(array("CODE"      => 405,
                                    "MESSAGE"   => "Method Not Allowed",
                                    "RESPONSE"  => "Maaf, Anda Tidak Memiliki Izin Untuk Akses Fitur Tersebut!"));
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getAllAdministratorData(){
    if(Main::isLogin()){
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
        $arrParamerter = array("administrator" => array("COLUMN" =>  encodeValueMysql("admin_id").", 
                                                                     username, 
                                                                     full_name, 
                                                                     role, 
                                                                     DATE_FORMAT(last_login,'%d-%m-%Y %H:%i:%s') AS last_login",
                                                        "WHERE"  => "deleted_on IS NULL AND admin_id != '$adminId'")
                              );
        $result = $this->Data_Access_Model->selectData($arrParamerter);
      }else{
        $result = json_encode(array("CODE"      => 405,
                                    "MESSAGE"   => "Method Not Allowed",
                                    "RESPONSE"  => "Maaf, Anda Tidak Memiliki Izin Untuk Akses Fitur Tersebut!"));
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function deleteAdministratorData(){
    if(Main::isLogin()){
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $adminId = $this->input->post("ADMINID");
        if(empty($adminId)){
          $result = json_encode(array("CODE"      => 400,
                                      "MESSAGE"   => "Bad Request",
                                      "RESPONSE"  => "Maaf, Ada Parameter Yang Tidak Sesuai. Silahkan Hubungi Developer Anda!"));
        }else{
          $data = array("administrator" => array("VALUES" => array("deleted_on" => date("Y-m-d H:i:s")),
                                                "WHERE" => array("admin_id" => decodePassword($adminId))
                                               )
                  );

          $result = $this->Data_Access_Model->updateData($data);
        }
      }else{
        $result = json_encode(array("CODE"      => 405,
                                    "MESSAGE"   => "Method Not Allowed",
                                    "RESPONSE"  => "Maaf, Anda Tidak Memiliki Izin Untuk Akses Fitur Tersebut!"));
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function changePasswordData(){
    if(Main::isLogin()){
      $adminId          = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $oldPassword      = decodePassword($this->input->post("OLDPASSWORD"));
      $newPassword      = decodePassword($this->input->post("NEWPASSWORD"));
      $confirmPassword  = decodePassword($this->input->post("CONFIRMPASSWORD"));
      if(empty($oldPassword) || empty($newPassword) || empty($confirmPassword)){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Tidak Boleh Kosong!"));
      }else{
        if($newPassword == $confirmPassword){
          $data = array("administrator" => array("VALUES" => array("password" => $this->encryption->Av72Net_ENC_OPEN_SSL($newPassword)),
                                                 "WHERE" => array("admin_id" => $adminId,
                                                                  "password" => $this->encryption->Av72Net_ENC_OPEN_SSL($oldPassword))
                                            )
                        );
          $result = $this->Data_Access_Model->changePassword($data);
        }else{
          $result = json_encode(array("CODE"      => 401,
                                      "MESSAGE"   => "Unauthorized",
                                      "RESPONSE"  => "Maaf, Kata Sandi Baru Yang Anda Masukan Tidak Cocok!"));
        }
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getGenerateEmployeeCode(){
    if(Main::isLogin()){
      $date = date("ym");
      $data = array("employee" => array("COLUMN" => "MAX(RIGHT(employee_id,4)) AS CODE",
                                        "WHERE" => "LEFT(employee_id,4) = '$date' AND deleted_on IS NULL",
                                        "PREFIX" => $date)
                   );
      $result = $this->Data_Access_Model->selectGenerateId($data);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

}
