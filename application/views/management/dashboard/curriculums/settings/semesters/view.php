<?php
	
	set_active("dashboard_curriculums_settings_semesters",true);


	$breadcrumb = array("name"=>"bdcssemesterslink","text"=>'Semesters',"uri"=>"dashboard/curriculums/settings/semseters");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/settings/view");
?>