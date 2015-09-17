<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/yearlevels/page_content/content");
	
	set_active("bdcsyearlevelslink",true);
	
	$this->load->view("management/dashboard/curriculums/settings/yearlevels/view");