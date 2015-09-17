<?php
	
	set_active("dashboard_curriculums_settings_classtypes",true);


	$breadcrumb = array("name"=>"bdcsclasstypeslink","text"=>'Class types',"uri"=>"dashboard/curriculums/settings/classtypes");
	add_breadcrumb($breadcrumb);

	$this->load->view("management/dashboard/curriculums/settings/view");

?>