<?php
	
	set_active("dashboard_curriculums_settings_yearlevels",true);


	$breadcrumb = array("name"=>"bdcsyearlevelslink","text"=>'Year levels',"uri"=>"dashboard/curriculums/settings/yearlevels");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/settings/view");

?>