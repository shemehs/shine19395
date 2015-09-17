<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
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
	public function index()
	{
		
		$this->load->view("management/dashboard/pre_view",$this->data);
		
	}
	private function dashboard_view(){
		$this->index();
	}
	public function curriculums(){

		echo "You are on the wrong side!";
	
	}
	public function schedules(){
		$breadcrumb = array("name"=>'<span class="glyphicon glyphicon-time"></span> Class Schedules',"url"=>"dashboard/schedules","status"=>true);
		add_breadcrumb($breadcrumb);
		set_active("dschedules",true);
		$this->dashboard_view();
	}
	public function accounts(){
		set_active("daccounts",true);
		$this->dashboard_view();
	}
	public function instructors(){
		set_active("dinstructors",true);
		$this->dashboard_view();
	}
	public function students(){
		set_active("dstudents",true);
		$this->dashboard_view();
	}
	public function departments(){
		set_active("ddepartments",true);
		$this->dashboard_view();
	}
	public function classrooms(){
		set_active("dclassrooms",true);
		$this->dashboard_view();
	}

}