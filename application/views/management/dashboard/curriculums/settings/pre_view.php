<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/page_content/content");
	set_active("dashboard_curriculums_settings_home",true);

	set_active("bdcsettingslink",true);
	

	$this->load->view("management/dashboard/curriculums/settings/view");

?>