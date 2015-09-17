<?php
	add_page_info("stylesheet","spinner/bootstrap-spinner","spinner-style");
	add_page_info("javascript","spinner/jquery.spinner","spinner-script");

	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	if($curriculuminfo){
		$breadcrumb = array("name"=>"bdcisaddlink","text"=>' ADD ',"uri"=>"dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/add");
		add_breadcrumb($breadcrumb);
	}
	set_active("bdcisaddlink",true);
	
	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/info/subjects/add/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Add Curriculum Subject");
	
	set_link_url("backlink",site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)));
	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);
	

	$this->load->view("management/dashboard/curriculums/info/subjects/view");	
