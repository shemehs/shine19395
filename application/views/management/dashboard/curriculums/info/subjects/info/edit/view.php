<?php
	add_page_info("stylesheet","spinner/bootstrap-spinner","spinner-style");
	add_page_info("javascript","spinner/jquery.spinner","spinner-script");

	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$curriculumsubjectinfo = isset($curriculumsubjectinfo)?$curriculumsubjectinfo:false;

	if($curriculuminfo){
		$breadcrumb = array("name"=>"bdciseditlink","text"=>' Edit ',"uri"=>"dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjectid():0)."/edit");
		add_breadcrumb($breadcrumb);
	}
	set_active("bdciseditlink",true);
	
	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/info/subjects/info/edit/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Edit Curriculum Subject");
	
	set_link_url("backlink",site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects"));
	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);
	

	$this->load->view("management/dashboard/curriculums/info/subjects/info/view");	
