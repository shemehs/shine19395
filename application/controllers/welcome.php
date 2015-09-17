<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	private $data;
	function __construct(){
		parent::__construct();
		$this->output->enable_profiler(false);
	}
	public function index()
	{
		$this->page_info->add_page_info("title","welcome message");
		$this->page_info->add_page_content("top_nav",'default/top_nav');
		$this->page_info->add_page_content("page_footer",'default/page_footer');
		//$this->page_info->add_page_content("page_container",'login/page_container');
		$this->page_info->add_page_content("page_content",'welcome_message');
		
		$this->load->view('template/frame', $this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */