<?php
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	if($curriculuminfo){
		$breadcrumb = array("name"=>"bdcieditlink","text"=>'<span class="glyphicon glyphicon-edit"></span> Edit',"url"=>"dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/edit");
		add_breadcrumb($breadcrumb);
	}
	set_active("bdcieditlink",true);
	
	add_page_info("stylesheet","spinner/bootstrap-spinner","spinner-style");
	add_page_info("javascript","spinner/jquery.spinner","spinner-script");

	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/info/edit/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Curriculum information");
	set_active("dashboard_curriculums_info",true);
	set_hide_this("selectCurriculuminformationform",true);
	
	set_has_value("page_content_heading","Curriculum Information");
	set_has_value("curriculum_info_title",((isset($curriculum_info))?$curriculum_info->getCurriculumname():"No Curriculum Selected"));

	set_link_url("backlink",site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)));
	set_hide_this("backlink",false);
	set_hide_this("refreshlink",false);
	

	$this->load->view("management/dashboard/curriculums/info/view");	