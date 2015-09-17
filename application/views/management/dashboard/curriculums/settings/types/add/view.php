<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/types/add/page_content/content");
	
	$breadcrumb = array("name"=>"bdcstaddlink","text"=>'Add',"uri"=>"dashboard/curriculums/settings/types/add");
	add_breadcrumb($breadcrumb);
	set_active("bdcstaddlink",true);
	
	$this->load->view("management/dashboard/curriculums/settings/types/view");
?>