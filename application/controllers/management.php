<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Management extends CI_Controller {
	private $data;
	function __construct(){

		parent::__construct();
		
		$this->load->helper("user");
		$this->output->enable_profiler(false);
		
		
	}
	public function index()
	{
		
		if($this->authenticate->isLogin()){
			if($this->authenticate->isAdmin()){
				$level = $this->authenticate->getUserlevel();
				if($level){
					switch(strtolower($level)){

						case "admin":
							redirect("dashboard");
							break;
						case "planner":
							echo "Hi Planner";
							break;
						case "coordinator":
							echo "Hi Coordiantor";
							break;
						default:
							echo $level;
							break;

					}
				}else{
					$this->logout();
				}
			}else{
				show_404();
			}
		}else{
			redirect("login");
		}
		
	}
}