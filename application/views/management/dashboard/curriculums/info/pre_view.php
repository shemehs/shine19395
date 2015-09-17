<?php
	set_active("bdcinfolink",true);
	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/info/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Curriculum Information");
	add_page_content("page_action_menu","management/dashboard/curriculums/info/page_action_menu/content");

	set_hide_this("selectCurriculuminformationform",true);
	

	set_link_url("backlink",site_url("dashboard/curriculums"));
	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);
	

	$this->load->view("management/dashboard/curriculums/info/view");	