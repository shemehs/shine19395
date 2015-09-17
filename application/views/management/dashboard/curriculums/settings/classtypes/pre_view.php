<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/classtypes/page_content/content");
	
	set_active("bdcsclasstypeslink",true);
	
	$this->load->view("management/dashboard/curriculums/settings/classtypes/view");
?>