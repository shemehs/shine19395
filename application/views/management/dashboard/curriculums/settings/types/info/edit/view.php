<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/types/info/edit/page_content/content");
	$curriculumtypeinfo = isset($curriculumtypeinfo)?$curriculumtypeinfo:false;
	
	$breadcrumb = array("name"=>"bdcstieditlink","text"=>"Edit","uri"=>"dashboard/curriculums/settings/types/".(($curriculumtypeinfo)?$curriculumtypeinfo->getCurriculumtypeid():0)."/edit");
	add_breadcrumb($breadcrumb);
	set_active("bdcstieditlink",true);
	$this->load->view("management/dashboard/curriculums/settings/types/info/view");
?>