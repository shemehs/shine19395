<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/semesters/page_content/content");
	
	set_active("bdcssemesterslink",true);
	
	$this->load->view("management/dashboard/curriculums/settings/semesters/view");