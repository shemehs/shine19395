<?php 
	//add_page_info("javascript","newcurriculumscript","add-curriculum-script");
	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Active Curriculums");

	set_link_url("backlink",site_url("dashboard"));
	
	set_active("bdsettingslink",true);

	$this->load->view("management/dashboard/settings/view");
?>