<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Settings extends CI_Controller {
	private $data;
	function __construct(){

		parent::__construct();

		$this->load->helper("curriculum");
		$this->output->enable_profiler(false);
		
		if($this->authenticate->isLogin()){
			if($this->authenticate->isAdmin()){
				if($this->authenticate->isSuperadmin()){

				}else{
					show_404();
				}
			}else{
				show_404();
			}
		}else{
			redirect("login/management");
		}
		
	}
	function index(){
		$this->load->view("management/dashboard/settings/pre_view",$this->data);
	}
}