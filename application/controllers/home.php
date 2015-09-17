<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	private $data;
	private $type;
	function __construct(){
		parent::__construct();
		$this->output->enable_profiler(false);
		if($this->authenticate->isLogin()){
			$this->type = $this->authenticate->getUsertype(); 
		}
	}
	public function index()
	{
		$this->home_view();
	}
	private function home_view(){
		add_page_info("title"," Home ".(($this->type)?"- ".$this->type:""));

		add_page_info("stylesheet","main","main-style");
		add_page_info("javascript","main","main-script");

		add_page_content("container","container");
		add_page_content("top_nav",'main/top_nav/content');
		add_page_content("user_nav",'main/top_nav/user_nav/content');
		add_page_content("page_header",'main/page_header/content');
		add_page_content("page_top_menu",'main/page_top_menu/content');
		add_page_content("page_content",'main/page_content/content');
		add_page_content("left_sidebar",'main/page_content/left_sidebar/content');
		add_page_content("page_footer",'main/page_footer/content');
		
		set_active("collapse_side_nav_link",true);
		
		
		$this->load->view('template/frame', $this->data);
	}
	public function sample(){
		add_page_info("title"," Home ".(($this->type)?"- ".$this->type:""));

		add_page_info("stylesheet","main","main-style");
		add_page_info("javascript","main","main-script");

		add_page_content("container","container");
		add_page_content("top_nav",'sample/top_nav/content');
		add_page_content("user_nav",'sample/top_nav/user_nav/content');
		add_page_content("page_header",'sample/page_header/content');
		add_page_content("page_top_menu",'sample/page_top_menu/content');
		add_page_content("page_content",'sample/page_content/content');
		add_page_content("left_sidebar",'sample/page_content/left_sidebar/content');
		add_page_content("right_sidebar",'sample/page_content/right_sidebar/content');
		add_page_content("page_footer",'sample/page_footer/content');
		
		set_active("collapse_side_nav_link",true);
		
		
		$this->load->view('template/frame', $this->data);
	}
}