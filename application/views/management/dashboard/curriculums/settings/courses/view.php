<?php
	
	set_active("dashboard_curriculums_settings_courses",true);


	$breadcrumb = array("name"=>"bdcscourseslink","text"=>'Courses',"uri"=>"dashboard/curriculums/settings/courses");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/settings/view");

?>