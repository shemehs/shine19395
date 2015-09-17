<?php 

	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/list/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Curriculum's List");
	
	set_active("dashboard_curriculums_list",true);
	set_has_value("page_content_heading","Curriculums");

	set_active("listlink",true);

	set_link_url("backlink",site_url("dashboard"));
	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);
	
	$this->load->view("management/dashboard/curriculums/view");

?>