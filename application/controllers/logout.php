<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
	private $data;
	private $logintype;
	function __construct(){

		parent::__construct();
		
		$this->load->helper("user");
		$this->output->enable_profiler(false);
		
		if(!$this->authenticate->isLogin()){
			
			redirect("home");
			
		}
	}
	public function index()
	{	
		$this->authenticate->logout();
		redirect("home");
	}
}