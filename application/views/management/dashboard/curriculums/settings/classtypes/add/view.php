<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/classtypes/add/page_content/content");
	
	$breadcrumb = array("name"=>"bdcsctaddlink","text"=>'Add',"uri"=>"dashboard/curriculums/settings/classtypes/add");
	add_breadcrumb($breadcrumb);
	set_active("bdcsctaddlink",true);
	
	$this->load->view("management/dashboard/curriculums/settings/classtypes/view");
?>