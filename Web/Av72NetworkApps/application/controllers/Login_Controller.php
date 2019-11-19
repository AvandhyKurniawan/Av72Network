<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model("Login_Model");
  }

	public function index(){
		Login_Controller::isLogin();
	}

  private function isLogin(){
    if(!empty($this->session->userdata("Av72Net_AdminId")) &&
       !empty($this->session->userdata("Av72Net_Username")) &&
       !empty($this->session->userdata("Av72Net_FullName")) &&
       !empty($this->session->userdata("Av72Net_Role"))
    ){
      redirect("_administrator","refresh");
    }else{
      $DATA = array("CSRF_NAME" => $this->security->get_csrf_token_name(),
                    "CSRF_TOKEN" => $this->security->get_csrf_hash());
      $this->load->view('Login_View/Login_Form',$DATA);
    }
  }

  public function login(){
    $username = $this->input->post("uname");
    $password = $this->input->post("upass");
    if(empty($username) || empty($password)){
      $result = array("CODE" => 401,
                      "MESSAGE" => "Unauthorized",
                      "RESPONSE" => "Nama pengguna dan kata sandi tidak boleh kosong!");
      echo json_encode($result);
    }else{
      $data = array("USERNAME" => $this->security->xss_clean($username),
                    "PASSWORD" => $this->security->xss_clean(decodePassword($password))
                   );
      $result = $this->Login_Model->doLogin($data);
      echo $result;
    }
  }

  public function logout(){
    $this->session->unset_userdata("fabricationIdUser");
		$this->session->unset_userdata("fabricationUsername");
		$this->session->unset_userdata("fabricationStatus");
		$this->session->unset_userdata("fabricationGroup");
		$this->session->unset_userdata("fabricationIpAddress");
		$this->session->sess_destroy();
    redirect("/","refresh");
  }

  public function pageNotFound(){
    $data["heading"] = "404 Page Not Found";
    $data["message"] = "The page you requested was not found ";
    $this->load->view('error',$data);
  }  
}
