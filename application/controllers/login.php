<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	private $data;
	private $logintype;
	function __construct(){

		parent::__construct();
		
		$this->load->helper("user");
		$this->output->enable_profiler(false);
		if($this->authenticate->isLogin()){
			
			redirect("home");
			
		}
	}
	public function index()
	{	
		$this->setLoginsession();
		$this->mainlogin();
		$this->load->view("main/login/pre_view");
		
	}

	public function student(){
		$this->setLoginsession("typestudent");
		$this->mainlogin();
		$this->load->view("main/login/students/view");
	}

	public function instructor(){
		$this->setLoginsession("typeinstructor");
		$this->mainlogin();
		$this->load->view("main/login/instructors/view");
	}
	public function management(){
		$this->setLoginsession("typeadmin");
		$this->mainlogin();
		$this->load->view("main/login/management/view");
	}
	private function mainlogin(){
		if($this->input->post(sha1("classschedulelogin"))){
			$logintype=$this->input->post(sha1("classschedulelogin"));
			$this->form_validation->set_rules("usernamefield","Username","trim|xss_clean|required");
			$this->form_validation->set_rules("passwordfield","Password","required|xss_clean");
	
			if($logintype == sha1("typeadmin")){
				$this->logintype = "admin";
			}else if($logintype == sha1("typeinstructor")){
				$this->logintype = "instructor";
			}else if($logintype == sha1("typestudent")){
				$this->logintype = "student";
			}else{
				$this->logintype = "false";	
			}
			if($this->loginprocess()){
				redirect("home");
			}
		}else{
			$logintype = $this->session->userdata("logintype");
			if($logintype){
				switch(strtolower($logintype)){
					case "typeadmin":
						$this->logintype = "admin";
						break;
					case "typeinstructor";
						$this->logintype = "instructor";
						break;
					case "typestudent";
						$this->logintype = "student";
						break;
					default:
						$this->setLoginsession();
						$this->logintype = "student";
						break;					}
			}else{
				$this->setLoginsession();
			}
			
			set_message_type("login","info");
			set_message_title("login","Hello Sir/Maam!");
			set_message("login","Please login first so that we will know you.");
		}
	}
	private function setLoginsession($type = false){
		$this->session->set_userdata("logintype",(($type)?$type:"typestudent"));
	}

	private function unsetLoginsession(){
		$this->session->unset_userdata("logintype");
	}
	private function loginprocess(){

		if($this->form_validation->run() == false){
		
			set_message_type("login","danger");
			set_message_title("login","Alert!");
			set_message("login",$this->lang->line("login_error_login_failed"));
			
			set_has_error("usernamefield",((form_error("usernamefield"))?true:false));
			set_has_error("passwordfield",((form_error("passwordfield"))?true:false));

			set_message("usernamefield",((form_error("usernamefield"))?form_error("usernamefield","<span>","<span>"):false));
			set_message("passwordfield",((form_error("passwordfield"))?form_error("passwordfield","<span>","<span>"):false));

			return false;

		}else{

			$login_username = $this->input->post('usernamefield');
			$login_password = $this->input->post('passwordfield');
			if(is_username_exist($login_username,$this->logintype,true)){

				if($userid = matchUsernameAndPassword($login_username,$login_password,$this->logintype,true)){

					if($this->authenticate->login((int)$userid)){
						
						set_has_success("usernamefield",true);
						set_has_success("passwordfield",true);

						set_message_type("login","success");
						set_message_title("login","Congrats!");
						set_message("login","You have successfully login.");
						
						return true;

					}else{

						set_has_success("usernamefield",true);

						set_message_type("login","danger");
						set_message_title("login","Sorry!");
						set_message("login","Something went wrong. Login Failed.");
						
					}

				}else{

					set_message_type("login","danger");
					set_message_title("login","Alert!");
					set_message("login",$this->lang->line("login_error_login_failed"));
					

					set_has_error("usernamefield",true);
					set_has_error("passwordfield",true);
					
					set_message("passwordfield","Username And Password does not match.");
					
				}

			}else{
					
					set_message_type("login","danger");
					set_message_title("login","Alert!");
					set_message("login",$this->lang->line("login_error_login_failed"));
					
					set_has_error("usernamefield",true);
					set_has_error("passwordfield",true);
					
					set_message("passwordfield","Invalid Username And Password.");
					
			}
			return false;
		}
	}
}