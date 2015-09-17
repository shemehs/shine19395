<?php
	
	set_active("dashboard_curriculums_settings_majors",true);


	$breadcrumb = array("name"=>"bdcsmajorslink","text"=>'Majors',"uri"=>"dashboard/curriculums/settings/majors");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/settings/view");

?>