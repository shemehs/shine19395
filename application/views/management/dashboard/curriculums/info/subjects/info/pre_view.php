<?php
	add_page_info("stylesheet","spinner/bootstrap-spinner","spinner-style");
	add_page_info("javascript","spinner/jquery.spinner","spinner-script");

	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$curriculumsubjectinfo = isset($curriculumsubjectinfo)?$curriculumsubjectinfo:false;

	set_active("bdcisclasstypeslink",true);

	set_link_url("backlink",site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjectid():0)));
	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);
	
	add_page_info("javascript","select-all-checkbox","select-all-checkbox-script");
	
	//add_page_content("page_action_menu","management/dashboard/curriculums/info/subjects/info/page_action_menu/content");


	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/info/subjects/info/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Curriculum subject information");
	
	$this->load->view("management/dashboard/curriculums/info/subjects/info/view");