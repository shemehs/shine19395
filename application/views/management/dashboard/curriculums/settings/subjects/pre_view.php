<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/subjects/page_content/content");
	
	set_active("bdcssubjectslink",true);
	
	$this->load->view("management/dashboard/curriculums/settings/subjects/view");
?>