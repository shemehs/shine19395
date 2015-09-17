<?php 
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;

	if($curriculuminfo){
		$breadcrumb = array("name"=>"bdcinfolink","text"=> (($curriculuminfo)?$curriculuminfo->getCoursedefination():$curriculuminfo->getCurriculumid()),"uri"=>"dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0));
		add_breadcrumb($breadcrumb);
	}
	

	
	$this->load->view("management/dashboard/curriculums/view");
?>