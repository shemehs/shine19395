<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/types/page_content/content");
	
	set_active("bdcstypeslink",true);
	
	$this->load->view("management/dashboard/curriculums/settings/types/view");
?>