<?php 
	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/settings/page_content/container");
	add_page_content("dashboard_curriculums_content_title","Curriculum Settings");

	add_page_content("curriculums_settings_sub_mennu","management/dashboard/curriculums/settings/page_sub_menu/content");

	
	set_link_url("backlink",site_url("dashboard/curriculums"));
	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);

	set_active("settingslink",true);
	
	$breadcrumb = array("name"=>"bdcsettingslink","text"=>'Settings',"uri"=>"dashboard/curriculums/settings");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/view");
?>