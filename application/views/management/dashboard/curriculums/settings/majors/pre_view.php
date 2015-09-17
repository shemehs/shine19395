<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/majors/page_content/content");
	
	set_active("bdcsmajorslink",true);

	$this->load->view("management/dashboard/curriculums/settings/majors/view");