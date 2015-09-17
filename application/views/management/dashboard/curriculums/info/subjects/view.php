<?php
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	if($curriculuminfo){
		$breadcrumb = array("name"=>"bdcisubjectslink","text"=>' Subjects',"uri"=>"dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects");
		add_breadcrumb($breadcrumb);
	}
	
	set_active("dashboard_curriculums_info",true);

	$this->load->view("management/dashboard/curriculums/info/view");	
