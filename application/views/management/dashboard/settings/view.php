<?php

	add_page_info("title","Settings - Dashboard");
	set_active("dsettings",true);
	
	add_page_content("dashboard_header_subtitle","Settings");

	add_page_content("dashboard_content",'management/dashboard/settings/page_content/content');
	add_page_content("dashboard_content_title","Settings");
	set_active("collapse_side_nav_link",true);
	
	$breadcrumb = array("name"=>"bdsettingslink","text"=>' Settings',"uri"=>"dashboard/settings");
	add_breadcrumb($breadcrumb);

	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);

	$this->load->view("management/dashboard/view");
?>