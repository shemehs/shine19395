<?php
	
		add_page_info("stylesheet","main","main-style");
		add_page_info("javascript","main","main-script");

		add_page_content("container","container-fluid");
		add_page_content("top_nav",'management/dashboard/top_nav/content');
		add_page_content("user_nav",'management/dashboard/top_nav/user_nav/content');
		add_page_content("collapse_side_nav",'management/dashboard/top_nav/collapse_side_nav/content');
		add_page_content("page_header","management/dashboard/page_header/content");
		add_page_content("page_top_menu",'management/dashboard/page_top_menu/content');
		add_page_content("page_content",'management/dashboard/page_content/container');
		
		$breadcrumb = array("name"=>"bdashboardlink","text"=>'Dashboard',"uri"=>"dashboard");
		add_breadcrumb($breadcrumb);
		
		add_page_content("page_footer",'management/dashboard/page_footer/content');
		
		
		
		
		$this->load->view('management/template/frame');
?>