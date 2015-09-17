<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate{

	private $CI;
	private $csloginusersessionid;
	private $csloginid;
	private $cslogin;
	private $login_info;
	private $user_info;
	private $islogin;
	private $usertype;
	private $userlevel;

	function __construct(){
	
		$this->CI =& get_instance();

		$this->CI->load->model("login_model");

		$this->cslogin = $this->CI->session->userdata("cslogin");
		$this->csloginid = $this->CI->session->userdata("csloginid");
		$this->csloginusersessionid = $this->CI->session->userdata("csloginusersessionid");
		$this->islogin = false;

		if($this->cslogin){
			
			if(!$this->checkLoginstatus()){
				$this->logout();
			}
		}


	}
	private function checkLoginstatus(){
	
		if($this->csloginid &&  (int)$this->csloginid > 0){
				if($this->csloginusersessionid){
					$login_info = get_login_info((int)$this->csloginid);
					if($login_info && $login_info->getStatus()){

						$user_info = get_user_info($login_info->getUserid());
					
						if($user_info){

							if($this->csloginusersessionid == sha1($login_info->getLoginid().$login_info->getUserid())){
								$this->islogin = true;
								$this->login_info = $login_info;
								$this->user_info = $user_info;
								$this->usertype = $user_info->getType();
								$this->userlevel = $user_info->getLevel();
							}
						}
					}

				}
			}

			return $this->islogin;
	}
	public function login($userid){

		$this->login_info = new Login_Model();
		$this->login_info->setUserid($userid);
		if($this->login_info->login()){
			if($this->login_session()){
				return true;
			}else{
				$this->login_info->destroy();
				return false;
			}
		}

	}
	private function login_session(){
		if($this->login_info){
			$this->CI->session->set_userdata('csloginusersessionid',sha1($this->login_info->getLoginid().$this->login_info->getUserid()));
			$this->CI->session->set_userdata('csloginid',$this->login_info->getLoginid());
			$this->CI->session->set_userdata('cslogin',sha1(random_string("alpha",5)));
			return true;
		}
		return false;	
				
	}

	public function logout(){
		if($this->login_info){
			$this->login_info->logout();
		}
		return $this->logout_session();

	}
	private function logout_session(){
			$this->CI->session->unset_userdata('csloginusersessionid');
			$this->CI->session->unset_userdata('csloginid');
			$this->CI->session->unset_userdata('cslogin');
			return true;
	}
	public function isLogin(){
		return $this->islogin;
	}
	public function isAdmin(){
		if($this->islogin){
			if(strtolower($this->usertype) == "admin"){
				return true;
			}
		}
		return false;
	}
	public function isSuperadmin(){
		if($this->islogin){
			if(strtolower($this->usertype) == "admin"){
				if(strtolower($this->userlevel) == "admin"){
				return true;
				}
			}
		}
		return false;
	}
	public function getUserlevel(){
		if($this->islogin){
			return strtolower($this->userlevel);
		}
	}

	public function getUsertype(){
		if($this->islogin){
			return strtolower($this->usertype);
		}
	}
}