<?php
	
	set_active("dashboard_curriculums_settings_types",true);


	$breadcrumb = array("name"=>"bdcstypeslink","text"=>'Types',"uri"=>"dashboard/curriculums/settings/types");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/settings/view");

?>