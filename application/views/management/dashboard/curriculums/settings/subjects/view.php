<?php
	
	set_active("dashboard_curriculums_settings_subjects",true);
	

	$breadcrumb = array("name"=>"bdcssubjectslink","text"=>' Subjects',"uri"=>"dashboard/curriculums/settings/subjects");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/settings/view");

?>