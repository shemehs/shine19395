<?php
	$curriculumtypeinfo = isset($curriculumtypeinfo)?$curriculumtypeinfo:false;
	
	$breadcrumb = array("name"=>"bdcstinfolink","text"=>ucfirst(($curriculumtypeinfo)?$curriculumtypeinfo->curriculum_type:""),"uri"=>"dashboard/curriculums/settings/types/".(($curriculumtypeinfo)?$curriculumtypeinfo->getCurriculumtypeid():0));
	add_breadcrumb($breadcrumb);
	
	$this->load->view("management/dashboard/curriculums/settings/types/view");
?>