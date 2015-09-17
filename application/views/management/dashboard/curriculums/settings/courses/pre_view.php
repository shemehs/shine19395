<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/courses/page_content/content");
	
	set_active("bdcscourseslink",true);
	
	$this->load->view("management/dashboard/curriculums/settings/courses/view");
?>