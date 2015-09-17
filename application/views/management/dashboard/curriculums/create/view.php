<?php 
	add_page_info("javascript","newcurriculumscript","add-curriculum-script");
	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/create/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Create Curriculum");

	set_link_url("backlink",site_url("dashboard/curriculums"));
	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);

	set_active("createlink",true);
	
	$breadcrumb = array("name"=>"bdccreatelink","text"=>' New ',"uri"=>"dashboard/curriculums/create");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/view");
?>