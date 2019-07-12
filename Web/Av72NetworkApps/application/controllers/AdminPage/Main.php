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
         $this->session->userdata("Av72Net_Role") == "ROOT"
      ){
        $arrData = array("PARENT_MENU" => array(
                                              array("NAME"    => "Tambah Data Admin",
                                                    "ID"      => "MTambahDataAdmin",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "_administrator/add_new_administrator",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Data Departemen",
                                                    "ID"      => "MTambahDataDepartemen",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "_administrator/add_new_department",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Data Pegawai",
                                                    "ID"      => "MTambahDataPegawai",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "_administrator/add_new_employee",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Data Paket Internet",
                                                    "ID"      => "MDataPaketInternet",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "#",
                                                    "STATUS"  => "Multi",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 2),

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
                                                    "URL"     => "_administrator/new_registration",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Pembayaran Registrasi Baru",
                                                    "ID"      => "MPembayaranRegistrasiBaru",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "_administrator/add_new_registration_payment",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Pembayaran Internet Bulanan",
                                                    "ID"      => "MPembayaranInternetBulanan",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "_administrator/add_internet_payment",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Kategori Paket",
                                                    "ID"      => "MTambahKategoriPaket",
                                                    "ICON"    => "fa fa-plus",
                                                    "URL"     => "_administrator/add_new_package_categories",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MDataPaketInternet",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Data Paket Internet",
                                                    "ID"      => "MTambahDataPaketInternet",
                                                    "ICON"    => "fa fa-plus",
                                                    "URL"     => "_administrator/add_new_internet_package",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MDataPaketInternet",
                                                    "LEVEL"   => 1),
                                           )
                     );
      }else{
        $arrData = array("PARENT_MENU" => array(
                                              array("NAME"    => "Tambah Data Pegawai",
                                                    "ID"      => "MTambahDataPegawai",
                                                    "ICON"    => "fa fa-user-plus",
                                                    "URL"     => "_administrator/add_new_employee",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Data Paket Internet",
                                                    "ID"      => "MDataPaketInternet",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "#",
                                                    "STATUS"  => "Multi",
                                                    "PARENT"  => NULL,
                                                    "LEVEL"   => 2),

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
                                                    "URL"     => "_administrator/new_registration",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Pembayaran Registrasi Baru",
                                                    "ID"      => "MPembayaranRegistrasiBaru",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "_administrator/add_new_registration_payment",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Pembayaran Internet Bulanan",
                                                    "ID"      => "MPembayaranInternetBulanan",
                                                    "ICON"    => "fa fa-book",
                                                    "URL"     => "_administrator/add_internet_payment",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MTransaksi",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Kategori Paket",
                                                    "ID"      => "MTambahKategoriPaket",
                                                    "ICON"    => "fa fa-plus",
                                                    "URL"     => "_administrator/add_new_package_categories",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MDataPaketInternet",
                                                    "LEVEL"   => 1),

                                              array("NAME"    => "Tambah Data Paket Internet",
                                                    "ID"      => "MTambahDataPaketInternet",
                                                    "ICON"    => "fa fa-plus",
                                                    "URL"     => "_administrator/add_new_internet_package",
                                                    "STATUS"  => "Single",
                                                    "PARENT"  => "MDataPaketInternet",
                                                    "LEVEL"   => 1),
                                           )
                     );
      }
      return $arrData;
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

  public function add_new_department(){
    if(Main::isLogin()){ 
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $DATA = array("TITLE"     => "Tambah Data",
                      "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                              "Link_2" => $this->uri->rsegment(2)),
                      "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Input_Department",NULL,TRUE),
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

  public function add_new_package_categories(){
    if(Main::isLogin()){
      $DATA = array("TITLE"     => "Tambah Data",
                    "ADDRESS_PATH" => array("Link_1" => $this->uri->rsegment(1),
                                            "Link_2" => $this->uri->rsegment(2)),
                    "COMPONENT" => $this->load->view("Admin_Dashboard_View/FRM_Input_Package_Categories",NULL,TRUE),
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

  public function uploadPhoto(){
    if(Main::isLogin()){
      if(isset($_FILES["FILEPHOTO"])){
        $fileName = str_replace(array(" ","/"), "_", $_FILES["FILEPHOTO"]["name"]);
        if(!empty($fileName)){
          $configImage = array("upload_path"    => "./assets/images/upload/profile-images/",
                               "allowed_types"  => "jpg|jpeg|png|gif",
                               "overwrite"      => TRUE,
                               "max_size"       => 2048,
                               "file_name"      => $fileName);
          $this->load->library("upload", $configImage);
          $this->upload->initialize($configImage);
          if($this->upload->do_upload("FILEPHOTO")){
            $result = json_encode(array("CODE"      => 200,
                                        "MESSAGE"   => "Success",
                                        "RESPONSE"  => "Foto Anda Berhasil Di Unggah."));
          }else{
            $result = json_encode(array("CODE"      => 500,
                                        "MESSAGE"   => "Internal Server Error",
                                        "RESPONSE"  => "Maaf, Foto Anda Gagal Di Unggah."));
          }
        }else{
          $result = json_encode(array("CODE"      => 400,
                                      "MESSAGE"   => "Bad Request",
                                      "RESPONSE"  => "Maaf, Nama File Anda Tidak Sesuai!"));
        }
      }else{
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, File Gambar Tidak Boleh Kosong!"));
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
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
            $arrDataCheckUsername = array("administrator" => array("COLUMN" => "COUNT(admin_id) AS adminIdCounter",
                                                                   "WHERE" => "username LIKE '%$username%' AND 
                                                                               deleted_on IS NULL"
                                                             )
                                    );
            $arrResult = json_decode($this->Data_Access_Model->selectData($arrDataCheckUsername), TRUE);
            $adminIdCounter = $arrResult["RESPONSE"]["administrator"][0]["adminIdCounter"];
            if($adminIdCounter > 0){
              $result = json_encode(array("CODE"      => 406,
                                          "MESSAGE"   => "Not Acceptable",
                                          "RESPONSE"  => "Maaf Nama Pengguna Sudah Ada!"));
            }else{
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
        $arrData = array("administrator" => array("COLUMN" =>  encodeMysqlValue("admin_id").", 
                                                               username, 
                                                               full_name, 
                                                               role, 
                                                               DATE_FORMAT(last_login,'%d %M %Y %H:%i:%s') AS last_login",
                                                  "WHERE"  => "deleted_on IS NULL AND admin_id != '$adminId'")
                              );
        $result = $this->Data_Access_Model->selectData($arrData);
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
          $arrData = array("administrator" => array("VALUES"  => array("deleted_on" => date("Y-m-d H:i:s")),
                                                    "WHERE"   => array("admin_id" => decodePassword($adminId))
                                              )
                  );

          $result = $this->Data_Access_Model->updateData($arrData);
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
          $arrData= array("administrator" => array("VALUES" => array("password" => $this->encryption->Av72Net_ENC_OPEN_SSL($newPassword)),
                                                   "WHERE" => array("admin_id" => $adminId,
                                                                    "password" => $this->encryption->Av72Net_ENC_OPEN_SSL($oldPassword))
                                             )
                  );
          $result = $this->Data_Access_Model->changePassword($arrData);
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
      $arrData = array("employee" => array("COLUMN" => "MAX(RIGHT(employee_id,4)) AS CODE",
                                           "WHERE" => "LEFT(employee_id,4) = '$date' AND deleted_on IS NULL",
                                           "PREFIX" => $date)
                   );
      $result = $this->Data_Access_Model->selectGenerateId($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getGenerateCustomerCode(){
    if(Main::isLogin()){
      $date = date("ym");
      $arrData = array("client_registration" => array("COLUMN" => "MAX(RIGHT(reg_id,4)) AS CODE",
                                                      "WHERE" => "SUBSTR(reg_id,3,4) = '$date' AND deleted_on IS NULL",
                                                      "PREFIX" => "72".$date)
                   );
      $result = $this->Data_Access_Model->selectGenerateId($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function saveEmployeeData(){
    if(Main::isLogin()){
      $employeeId         = decodePassword($this->input->post("EMPLOYEEID"));
      $adminId            = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $departmentId       = decodePassword($this->input->post("DEPARTMENTID"));
      $numberId           = $this->input->post("NUMBERID");
      $fullName           = $this->input->post("FULLNAME");
      $gender             = $this->input->post("GENDER");
      $birthday           = $this->input->post("BIRTHDAY");
      $phoneNumber        = $this->input->post("PHONENUMBER");
      $otherPhoneNumber   = $this->input->post("OTHERPHONENUMBER");
      $address            = $this->input->post("ADDRESS");
      $email              = $this->input->post("EMAIL");
      $joinDate           = $this->input->post("JOINDATE");
      $picture            = $this->input->post("PICTURENAME");

      if(empty($employeeId) || empty($departmentId) || empty($fullName) || 
         empty($gender)     || empty($phoneNumber)  || empty($address)  || 
         empty($joinDate)
      ){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Bertanda Bintang Tidak Boleh Kosong!"));
      }else{
        $arrData = array("employee" => array("VALUES" => array(
                                                          array("employee_id"         => $employeeId,
                                                                "admin_id"            => $adminId,
                                                                "department_id"       => $departmentId,
                                                                "number_id"           => $numberId,
                                                                "full_name"           => $fullName,
                                                                "gender"              => $gender,
                                                                "birthday"            => $birthday,
                                                                "phone_number"        => $phoneNumber,
                                                                "other_phone_number"  => $otherPhoneNumber,
                                                                "address"             => $address,
                                                                "email"               => $email,
                                                                "join_date"           => $joinDate,
                                                                "picture"             => $picture)
                                                          )
                                       )
                );
        $result = $this->Data_Access_Model->insertData($arrData);
      }
      echo $result;
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
  }

  public function getAllEmployeeData(){
    if(Main::isLogin()){
      $search = $this->input->get("SEARCH");
      if(empty($search)){
        $arrData = array("employee A" => array("COLUMN" => encodeMysqlValue("A.employee_id","employee_id").",
                                                            A.number_id, 
                                                            A.full_name,
                                                            A.gender,
                                                            DATE_FORMAT(A.birthday, '%d %M %Y') AS birthday,
                                                            A.phone_number,
                                                            A.other_phone_number,
                                                            A.address,
                                                            A.email,
                                                            DATE_FORMAT(A.join_date, '%d %M %Y') AS join_date,
                                                            A.picture,
                                                            DATE_FORMAT(A.updated_on, '%d %M %T') AS updated_on,
                                                            B.department_name",
                                               "JOIN" => array(
                                                          array("department B","A.department_id = B.department_id","INNER")
                                                         ),
                                               "WHERE" => "A.deleted_on IS NULL AND B.deleted_on IS NULL"
                                         )
                        );
      }else{
        $arrData = array("employee A" => array("COLUMN" => encodeMysqlValue("A.employee_id","employee_id").",
                                                            A.number_id, 
                                                            A.full_name,
                                                            A.gender,
                                                            DATE_FORMAT(A.birthday, '%d %M %Y') AS birthday,
                                                            A.phone_number,
                                                            A.other_phone_number,
                                                            A.address,
                                                            A.email,
                                                            DATE_FORMAT(A.join_date, '%d %M %Y') AS join_date,
                                                            A.picture,
                                                            DATE_FORMAT(A.updated_on, '%d %M %T') AS updated_on,
                                                            B.department_name",
                                               "JOIN" => array(
                                                          array("department B","A.department_id = B.department_id","INNER")
                                                         ),
                                               "WHERE" => "A.deleted_on IS NULL AND 
                                                           B.deleted_on IS NULL AND 
                                                           (
                                                            A.full_name LIKE '%$search%' OR
                                                            A.employee_id LIKE '%$search%'
                                                           )"
                                              )
                        );
      }
      $result = $this->Data_Access_Model->selectData($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getDetailEmployeeDataById(){
    if(Main::isLogin()){
      $employeeId = decodePassword($this->input->get("EMPLOYEEID"));
      $arrData = array("employee A" => array("COLUMN" =>  encodeMysqlValue("A.employee_id","employee_id").",".
                                                          encodeMysqlValue("A.department_id","department_id").","."
                                                          A.number_id, 
                                                          A.full_name,
                                                          A.gender,
                                                          A.birthday,
                                                          DATE_FORMAT(A.birthday, '%d %M %Y') AS formatted_birthday,
                                                          A.phone_number,
                                                          A.other_phone_number,
                                                          A.address,
                                                          A.email,
                                                          A.join_date,
                                                          DATE_FORMAT(A.join_date, '%d %M %Y') AS formatted_join_date,
                                                          A.picture,
                                                          A.updated_on,
                                                          DATE_FORMAT(A.updated_on, '%d %M %Y %H:%i:%s') AS formatted_updated_on,
                                                          B.department_name",
                                             "JOIN" => array(
                                                        array("department B","A.department_id = B.department_id","INNER")
                                                       ),
                                             "WHERE" => "A.employee_id = '$employeeId' AND 
                                                         A.deleted_on IS NULL AND 
                                                         B.deleted_on IS NULL")
                 );
      $result = $this->Data_Access_Model->selectData($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function editEmployeeData(){
    if(Main::isLogin()){
      $employeeId         = decodePassword($this->input->post("EMPLOYEEID"));
      $adminId            = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $departmentId       = decodePassword($this->input->post("DEPARTMENTID"));
      $numberId           = $this->input->post("NUMBERID");
      $fullName           = $this->input->post("FULLNAME");
      $gender             = $this->input->post("GENDER");
      $birthday           = $this->input->post("BIRTHDAY");
      $phoneNumber        = $this->input->post("PHONENUMBER");
      $otherPhoneNumber   = $this->input->post("OTHERPHONENUMBER");
      $address            = $this->input->post("ADDRESS");
      $email              = $this->input->post("EMAIL");
      $joinDate           = $this->input->post("JOINDATE");
      $picture            = $this->input->post("PICTURENAME");

      if(empty($employeeId) || empty($departmentId) || empty($fullName) || 
         empty($gender)     || empty($phoneNumber)  || empty($address)  || 
         empty($joinDate)
      ){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Bertanda Bintang Tidak Boleh Kosong!"));
      }else{
        if(empty($picture)){
          $arrData = array("employee" => array("VALUES" => array("admin_id"            => $adminId,
                                                                 "department_id"       => $departmentId,
                                                                 "number_id"           => $numberId,
                                                                 "full_name"           => $fullName,
                                                                 "gender"              => $gender,
                                                                 "birthday"            => $birthday,
                                                                 "phone_number"        => $phoneNumber,
                                                                 "other_phone_number"  => $otherPhoneNumber,
                                                                 "address"             => $address,
                                                                 "email"               => $email,
                                                                 "join_date"           => $joinDate),
                                               "WHERE" => "employee_id = '$employeeId'"
                                         )
                     );
        }else{
          $arrData = array("employee" => array("VALUES" => array("admin_id"            => $adminId,
                                                                 "department_id"       => $departmentId,
                                                                 "number_id"           => $numberId,
                                                                 "full_name"           => $fullName,
                                                                 "gender"              => $gender,
                                                                 "birthday"            => $birthday,
                                                                 "phone_number"        => $phoneNumber,
                                                                 "other_phone_number"  => $otherPhoneNumber,
                                                                 "address"             => $address,
                                                                 "email"               => $email,
                                                                 "join_date"           => $joinDate,
                                                                 "picture"             => $picture),
                                               "WHERE" => "employee_id = '$employeeId'"
                                         )
                  );
        }
        $result = $this->Data_Access_Model->updateData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function deleteEmployeeData(){
    if(Main::isLogin()){
      $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $employeeId = decodePassword($this->input->post("EMPLOYEEID"));

      if(empty($employeeId)){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Ada Parameter Yang Tidak Sesuai. Silahkan Hubungi Developer Anda!"));
      }else{
        $arrData = array("employee" => array("VALUES" => array("deleted_on" => date("Y-m-d H:i:s"),
                                                               "admin_id"   => $adminId),
                                             "WHERE" => array("employee_id" => $employeeId)
                                    )
                );

        $result = $this->Data_Access_Model->updateData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function saveDepartmentData(){
    if(Main::isLogin()){
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
        $departmentName = $this->input->post("DEPARTMENTNAME");
        if(empty($departmentName)){
          $result = json_encode(array("CODE"      => 400,
                                      "MESSAGE"   => "Bad Request",
                                      "RESPONSE"  => "Maaf, Semua Kolom Tidak Boleh Kosong!"));
        }else{
          $arrData = array("department" => array("VALUES" => array(
                                                              array("admin_id"        => $adminId,
                                                                    "department_name" => $departmentName)
                                                             )
                                           )
                       );
          $result = $this->Data_Access_Model->insertData($arrData);
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

  public function getAllDepartmentData(){
    if(Main::isLogin()){
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $search = $this->input->get("SEARCH");
        if(empty($search)){
          $arrData = array("department" => array("COLUMN" =>  encodeMysqlValue("department_id").", 
                                                              ".encodeMysqlValue("admin_id").", 
                                                              department_name, 
                                                              DATE_FORMAT(updated_on,'%d %M %Y %H:%i:%s') AS updated_on",
                                                 "WHERE"  => "deleted_on IS NULL")
                     );
        }else{
          $arrData = array("department" => array("COLUMN" =>  encodeMysqlValue("department_id").", 
                                                              ".encodeMysqlValue("admin_id").", 
                                                              department_name, 
                                                              DATE_FORMAT(updated_on,'%d %M %Y %H:%i:%s') AS updated_on",
                                                 "WHERE"  => "deleted_on IS NULL AND department_name LIKE '%$search%'")
                     );
        }
        $result = $this->Data_Access_Model->selectData($arrData);
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

  public function deleteDepartmentData(){
    if(Main::isLogin()){
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $departmentId = $this->input->post("DEPARTMENTID");
        $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
        if(empty($departmentId)){
          $result = json_encode(array("CODE"      => 400,
                                      "MESSAGE"   => "Bad Request",
                                      "RESPONSE"  => "Maaf, Ada Parameter Yang Tidak Sesuai. Silahkan Hubungi Developer Anda!"));
        }else{
          $arrData = array("department" => array("VALUES" => array("deleted_on" => date("Y-m-d H:i:s"),
                                                                   "admin_id"   => $adminId),
                                                 "WHERE" => array("department_id" => decodePassword($departmentId))
                                        )
                  );

          $result = $this->Data_Access_Model->updateData($arrData);
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

  public function getDetailDepartmentDataById(){
    if(Main::isLogin()){
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $departmentId = decodepassword($this->input->get("DEPARTMENTID"));
        $arrData = array("department" => array("COLUMN" => encodeMysqlValue("department_id").",".
                                                           encodeMysqlValue("admin_id").",".
                                                           "department_name,
                                                            DATE_FORMAT(updated_on, '%d %M %Y %H:%i:%s') AS updated_on,
                                                            deleted_on",
                                               "WHERE" => "department_id = '$departmentId'")
                        );
        $result = $this->Data_Access_Model->selectData($arrData);                      
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

  public function editDepartmentData(){
    if(Main::isLogin()){
      if($this->session->userdata("Av72Net_Role") == "ROOT"){
        $departmentId = decodePassword($this->input->post("DEPARTMENTID"));
        $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
        $departmentName = $this->input->post("DEPARTMENTNAME");

        if(empty($departmentName)){
          $result = json_encode(array("CODE"      => 400,
                                      "MESSAGE"   => "Bad Request",
                                      "RESPONSE"  => "Maaf, Semua Kolom Tidak Boleh Kosong!"));
        }else{
          $arrData = array("department" => array("VALUES" => array("department_name" => $departmentName,
                                                                   "admin_id"        => $adminId),
                                                 "WHERE" => "department_id = '$departmentId'"
                                           )
                     );
          $result = $this->Data_Access_Model->updateData($arrData);
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

  public function savePackageCategoryData(){
    if(Main::isLogin()){
      $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $packageCategoryName = $this->input->post("PACKAGECATEGORYNAME");
      $information = $this->input->post("INFORMATION");

      if(empty($packageCategoryName)){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Tidak Boleh Kosong!"));
      }else{
        $arrData = array("package_categories" => array("VALUES" => array(
                                                                    array("admin_id"                => $adminId,
                                                                          "package_categories_name" => $packageCategoryName,
                                                                          "information"             => $information)
                                                                   )
                                                 )
                   );
        $result = $this->Data_Access_Model->insertData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getAllPackageCategoryData(){
    if(Main::isLogin()){
      $search = $this->input->get("SEARCH");
      if(empty($search)){
        $arrData = array("package_categories" => array("COLUMN" => encodeMysqlValue("package_categories_id").", 
                                                                   package_categories_name,
                                                                   information,
                                                                   DATE_FORMAT(updated_on,'%d %M %Y %H:%i:%s') AS updated_on",
                                                       "WHERE" => "deleted_on IS NULL"
                                                 )
                   );
      }else{
        $arrData = array("package_categories" => array("COLUMN" => encodeMysqlValue("package_categories_id").", 
                                                                   package_categories_name,
                                                                   information,
                                                                   DATE_FORMAT(updated_on,'%d %M %Y %H:%i:%s') AS updated_on",
                                                       "WHERE" => "deleted_on IS NULL AND package_categories_name LIKE '%$search%'"
                                                 )
                   );
      }
      $result = $this->Data_Access_Model->selectData($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getDetailPackageCategoryDataById(){
    if(Main::isLogin()){
      $packageCategoryId = decodePassword($this->input->get("PACKAGECATEGORYID"));
      $arrData = array("package_categories" => array("COLUMN" => "*",
                                                     "WHERE" => "package_categories_id = '$packageCategoryId' AND 
                                                                 deleted_on IS NULL")
                 );
      $result = $this->Data_Access_Model->selectData($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function editPackageCategoryData(){
    if(Main::isLogin()){
      $packageCategoryId = decodePassword($this->input->post("PACKAGECATEGORYID"));
      $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $packageCategoryName = $this->input->post("PACKAGECATEGORYNAME");
      $information = $this->input->post("INFORMATION");
      if(empty($packageCategoryName)){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Tidak Boleh Kosong!"));
      }else{
        $arrData = array("package_categories" => array("VALUES" => array("admin_id"                => $adminId,
                                                                         "package_categories_name" => $packageCategoryName,
                                                                         "information"             => $information),
                                                       "WHERE" => "package_categories_id = '$packageCategoryId'"
                                                 )
                   );
        $result = $this->Data_Access_Model->updateData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function deletePackageCategoryData(){
    if(Main::isLogin()){
      $packageCategoryId = decodePassword($this->input->post("PACKAGECATEGORYID"));
      $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
      if(empty($packageCategoryId)){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Ada Parameter Yang Tidak Sesuai. Silahkan Hubungi Developer Anda!"));
      }else{
        $arrData = array("package_categories" => array("VALUES" => array("deleted_on" => date("Y-m-d H:i:s"),
                                                                         "admin_id"   => $adminId),
                                                       "WHERE" => array("package_categories_id" => $packageCategoryId)
                                                 )
                   );

        $result = $this->Data_Access_Model->updateData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function saveInternetPackageData(){
    if(Main::isLogin()){
      $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $packageCategoryId = decodePassword($this->input->post("PACKAGECATEGORYID"));
      $packageName = $this->input->post("INTERNETPACKAGENAME");
      $speed = $this->input->post("SPEED");
      $price = $this->input->post("PRICE");
      $information = $this->input->post("INFORMATION");
      
      if(empty($packageCategoryId) || empty($packageName) ||
         empty($speed)             || empty($price)
      ){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Tidak Boleh Kosong!"));
      }else{
        $arrData = array("internet_packages" => array("VALUES" => array(
                                                                    array("admin_id"              => $adminId,
                                                                          "package_categories_id" => $packageCategoryId,
                                                                          "package_name"          => $packageName,
                                                                          "speed"                 => $speed,
                                                                          "price"                 => $price,
                                                                          "information"           => $information)
                                                                  )
                                                )
                   );
        $result = $this->Data_Access_Model->insertData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getAllInternetPackageData(){
    if(Main::isLogin()){
      $search = $this->input->get("SEARCH");
      if(empty($search)){
        $arrData = array("internet_packages A" => array("COLUMN" => encodeMysqlValue("A.package_id","package_id").", 
                                                                    A.package_name,
                                                                    A.speed,
                                                                    A.price,
                                                                    B.package_categories_name,
                                                                    A.information,
                                                                    DATE_FORMAT(A.updated_on,'%d %M %Y %H:%i:%s') AS updated_on",
                                                        "JOIN" => array(
                                                                    array("package_categories B","A.package_categories_id = B.package_categories_id","INNER")
                                                                  ),
                                                        "WHERE" => "A.deleted_on IS NULL AND B.deleted_on IS NULL"
                                                  )
                    );
      }else{
        $arrData = array("internet_packages A" => array("COLUMN" => encodeMysqlValue("A.package_id","package_id").", 
                                                                    A.package_name,
                                                                    A.speed,
                                                                    A.price,
                                                                    B.package_categories_name,
                                                                    A.information,
                                                                    DATE_FORMAT(A.updated_on,'%d %M %Y %H:%i:%s') AS updated_on",
                                                        "JOIN" => array(
                                                                    array("package_categories B","A.package_categories_id = B.package_categories_id","INNER")
                                                                  ),
                                                        "WHERE" => "A.deleted_on IS NULL AND 
                                                                    B.deleted_on IS NULL AND 
                                                                    (A.package_name LIKE '%$search%' OR
                                                                      A.speed LIKE '%$search%' OR
                                                                      B.package_categories_name LIKE '%$search%')"
                                                  )
                    );
      }
      $result = $this->Data_Access_Model->selectData($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getDetailInternetPackageDataById(){
    if(Main::isLogin()){
      $internetPackageId = decodePassword($this->input->get("INTERNETPACKAGEID"));
      $arrData = array("internet_packages" => array("COLUMN" => "admin_id,
                                                                 deleted_on,
                                                                 information,".
                                                                 encodeMysqlValue("package_categories_id").",
                                                                 package_id,
                                                                 package_name,
                                                                 price,
                                                                 speed,
                                                                 updated_on",
                                                    "WHERE" => "package_id = '$internetPackageId' AND 
                                                                deleted_on IS NULL")
                 );
      $result = $this->Data_Access_Model->selectData($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function editInternetPackageData(){
    if(Main::isLogin()){
      $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $internetPackageId = decodePassword($this->input->post("INTERNETPACKAGEID"));
      $packageCategoryId = decodePassword($this->input->post("PACKAGECATEGORYID"));
      $packageName = $this->input->post("INTERNETPACKAGENAME");
      $speed = $this->input->post("SPEED");
      $price = $this->input->post("PRICE");
      $information = $this->input->post("INFORMATION");

      if(empty($packageCategoryId) || empty($packageName) ||
         empty($speed)             || empty($price)
      ){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Tidak Boleh Kosong!"));
      }else{
        $arrData = array("internet_packages" => array("VALUES" => array("admin_id"                => $adminId,
                                                                        "package_name"            => $packageName,
                                                                        "speed"                   => $speed,
                                                                        "price"                   => $price,
                                                                        "information"             => $information),
                                                      "WHERE" => "package_id = '$internetPackageId'"
                                                )
                   );
        $result = $this->Data_Access_Model->updateData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function deleteInternetPackageData(){
    if(Main::isLogin()){
      $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $internetPackageId = decodePassword($this->input->post("INTERNETPACKAGEID"));

      if(empty($internetPackageId)){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Ada Parameter Yang Tidak Sesuai. Silahkan Hubungi Developer Anda!"));
      }else{
        $arrData = array("internet_packages" => array("VALUES" => array("deleted_on" => date("Y-m-d H:i:s"),
                                                                        "admin_id"   => $adminId),
                                                      "WHERE" => array("package_id" => $internetPackageId)
                                                )
                   );

        $result = $this->Data_Access_Model->updateData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function saveClientRegistration(){
    if(Main::isLogin()){
      $adminId            = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $registrationId     = decodePassword($this->input->post("REGISTRATIONID"));
      $packageId          = decodePassword($this->input->post("PACKAGEID"));
      $employeeId         = decodePassword($this->input->post("EMPLOYEEID"));
      $fullName           = $this->input->post("FULLNAME");
      $gender             = $this->input->post("GENDER");
      $birthday           = $this->input->post("BIRTHDAY");
      $phoneNumber        = $this->input->post("PHONENUMBER");
      $otherPhoneNumber   = $this->input->post("OTHERPHONENUMBER");
      $email              = $this->input->post("EMAIL");
      $address            = $this->input->post("ADDRESS");
      $price              = $this->input->post("PRICE");
      $registrationDate   = $this->input->post("REGISTRATIONDATE");
      $registrationFee    = $this->input->post("REGISTRATIONFEE");
      $registrationInfo   = $this->input->post("REGISTRATIONINFO");

      if(empty($registrationId) || empty($fullName)         || empty($gender)          ||
         empty($phoneNumber)    || empty($address)          || empty($packageId)       || 
         empty($price)          || empty($registrationDate) || empty($registrationFee) || 
         empty($employeeId)
      ){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Bertanda Bintang Tidak Boleh Kosong!"));
      }else{
        $arrData = array("client_registration" => array("VALUES" => array(
                                                                      array("reg_id"              => $registrationId,
                                                                            "admin_id"            => $adminId,
                                                                            "employee_id"         => $employeeId,
                                                                            "package_id"          => $packageId,
                                                                            "full_name"           => $fullName,
                                                                            "gender"              => $gender,
                                                                            "birthday"            => $birthday,
                                                                            "phone_number"        => $phoneNumber,
                                                                            "other_phone_number"  => $otherPhoneNumber,
                                                                            "email"               => $email,
                                                                            "address"             => $address,
                                                                            "registration_date"   => $registrationDate,
                                                                            "registration_fee"    => $registrationFee,
                                                                            "monthly_payment"     => $price,
                                                                            "information"         => $registrationInfo 
                                                                      )
                                                                    )
                                                  )
                   );
        $result = $this->Data_Access_Model->insertData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getAllClientRegistrationData(){
    if(Main::isLogin()){
      $search = $this->input->get("SEARCH");
      if(empty($search)){
        $arrData = array("client_registration A" => array("COLUMN" => "A.reg_id, 
                                                                       A.employee_id, 
                                                                       A.package_id,
                                                                       A.full_name,
                                                                       A.gender,
                                                                       A.birthday,
                                                                       CONCAT(A.phone_number,'/',A.other_phone_number) AS formatted_phone_number,
                                                                       A.phone_number,
                                                                       A.other_phone_number,
                                                                       A.email,
                                                                       A.address,
                                                                       DATE_FORMAT(A.registration_date, '%d %M %Y') AS formatted_registration_date,
                                                                       A.registration_date,
                                                                       A.registration_status,
                                                                       A.registration_fee,
                                                                       A.monthly_payment,
                                                                       A.information,
                                                                       B.package_name,
                                                                       C.full_name AS employee_name",
                                                          "JOIN" => array(
                                                                      array("internet_packages B","A.package_id = B.package_id","LEFT"),
                                                                      array("employee C","A.employee_id = C.employee_id","LEFT"),
                                                                    ),
                                                          "WHERE" => "A.deleted_on IS NULL"
                                                    )
                   );
      }else{
        $arrData = array("client_registration A" => array("COLUMN" => "A.reg_id, 
                                                                       A.employee_id, 
                                                                       A.package_id,
                                                                       A.full_name,
                                                                       A.gender,
                                                                       A.birthday,
                                                                       CONCAT(A.phone_number,'/',A.other_phone_number) AS formatted_phone_number,
                                                                       A.phone_number,
                                                                       A.other_phone_number,
                                                                       A.email,
                                                                       A.address,
                                                                       DATE_FORMAT(A.registration_date, '%d %M %Y') AS formatted_registration_date,
                                                                       A.registration_date,
                                                                       A.registration_status,
                                                                       A.registration_fee,
                                                                       A.monthly_payment,
                                                                       A.information,
                                                                       B.package_name,
                                                                       C.full_name AS employee_name",
                                                          "JOIN" => array(
                                                                array("internet_packages B","A.package_id = B.package_id","LEFT"),
                                                                array("employee C","A.employee_id = C.employee_id","LEFT"),
                                                              ),
                                                          "WHERE" => "A.deleted_on IS NULL AND 
                                                                      (
                                                                        CONCAT(A.reg_id, ' ',A.full_name) LIKE '%$search%' OR 
                                                                        CONCAT(A.full_name, ' ',A.reg_id) LIKE '%$search%'
                                                                      )"
                                                    )
                   );
      }
      $result = $this->Data_Access_Model->selectData($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function getDetailClientRegistrationDataById(){
    if(Main::isLogin()){
      $regId = decodePassword($this->input->get("REGISTRATIONID"));
      $arrData = array("client_registration A" => array("COLUMN" => "A.reg_id, 
                                                                     A.employee_id, 
                                                                     A.package_id,
                                                                     A.full_name,
                                                                     A.gender,
                                                                     A.birthday,
                                                                     CONCAT(A.phone_number,'/',A.other_phone_number) AS formatted_phone_number,
                                                                     A.phone_number,
                                                                     A.other_phone_number,
                                                                     A.email,
                                                                     A.address,
                                                                     DATE_FORMAT(A.registration_date, '%d %M %Y') AS formatted_registration_date,
                                                                     A.registration_date,
                                                                     A.registration_status,
                                                                     A.registration_fee,
                                                                     A.monthly_payment,
                                                                     A.information,
                                                                     B.package_name,
                                                                     C.full_name AS employee_name",
                                                        "JOIN" => array(
                                                                    array("internet_packages B","A.package_id = B.package_id","LEFT"),
                                                                    array("employee C","A.employee_id = C.employee_id","LEFT"),
                                                                  ),
                                                        "WHERE" => "A.deleted_on IS NULL AND A.reg_id = '$regId'"
                                                  )
                 );
      $result = $this->Data_Access_Model->selectData($arrData);
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function editClientRegistrationData(){
    if(Main::isLogin()){
      $adminId            = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $registrationId     = decodePassword($this->input->post("REGISTRATIONID"));
      $packageId          = decodePassword($this->input->post("PACKAGEID"));
      $employeeId         = decodePassword($this->input->post("EMPLOYEEID"));
      $fullName           = $this->input->post("FULLNAME");
      $gender             = $this->input->post("GENDER");
      $birthday           = $this->input->post("BIRTHDAY");
      $phoneNumber        = $this->input->post("PHONENUMBER");
      $otherPhoneNumber   = $this->input->post("OTHERPHONENUMBER");
      $email              = $this->input->post("EMAIL");
      $address            = $this->input->post("ADDRESS");
      $price              = $this->input->post("PRICE");
      $registrationDate   = $this->input->post("REGISTRATIONDATE");
      $registrationFee    = $this->input->post("REGISTRATIONFEE");
      $registrationInfo   = $this->input->post("REGISTRATIONINFO");

      if(empty($registrationId) || empty($fullName)         || empty($gender)          ||
         empty($phoneNumber)    || empty($address)          || empty($packageId)       || 
         empty($price)          || empty($registrationDate) || empty($registrationFee) || 
         empty($employeeId)
      ){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Semua Kolom Bertanda Bintang Tidak Boleh Kosong!"));
      }else{
        $arrData = array("client_registration" => array("VALUES" => array("admin_id"            => $adminId,
                                                                          "employee_id"         => $employeeId,
                                                                          "package_id"          => $packageId,
                                                                          "full_name"           => $fullName,
                                                                          "gender"              => $gender,
                                                                          "birthday"            => $birthday,
                                                                          "phone_number"        => $phoneNumber,
                                                                          "other_phone_number"  => $otherPhoneNumber,
                                                                          "email"               => $email,
                                                                          "address"             => $address,
                                                                          "registration_date"   => $registrationDate,
                                                                          "registration_fee"    => $registrationFee,
                                                                          "monthly_payment"     => $price,
                                                                          "information"         => $registrationInfo 
                                                                      ),
                                                        "WHERE" => "reg_id = '$registrationId'"
                                                  )
                   );
        $result = $this->Data_Access_Model->updateData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }

  public function deleteClientRegistrationData(){
    if(Main::isLogin()){
      $adminId = decodePassword($this->session->userdata("Av72Net_AdminId"));
      $registrationId = decodePassword($this->input->post("REGISTRATIONID"));

      if(empty($registrationId)){
        $result = json_encode(array("CODE"      => 400,
                                    "MESSAGE"   => "Bad Request",
                                    "RESPONSE"  => "Maaf, Ada Parameter Yang Tidak Sesuai. Silahkan Hubungi Developer Anda!"));
      }else{
        $arrData = array("client_registration" => array("VALUES" => array("deleted_on" => date("Y-m-d H:i:s"),
                                                                          "admin_id"   => $adminId),
                                                        "WHERE" => array("reg_id" => $registrationId)
                                                )
                   );

        $result = $this->Data_Access_Model->updateData($arrData);
      }
    }else{
      $result = json_encode(array("CODE"      => 403,
                                  "MESSAGE"   => "Forbidden",
                                  "RESPONSE"  => "Maaf, Anda Tidak Memiliki Hak Akses!"));
    }
    echo $result;
  }
}