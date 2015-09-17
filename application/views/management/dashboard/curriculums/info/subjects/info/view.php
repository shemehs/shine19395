<?php
	
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$curriculumsubjectinfo = isset($curriculumsubjectinfo)?$curriculumsubjectinfo:false;
	$subjectinfo = ($curriculumsubjectinfo)?$curriculumsubjectinfo->getSubjectinfo():false;
	if($curriculuminfo){
		$breadcrumb = array("name"=>"bdcisclasstypeslink","text"=>(($subjectinfo)?$subjectinfo->subject_code:""),"uri"=>"dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjectid():""));
		add_breadcrumb($breadcrumb);
	}

	$this->load->view("management/dashboard/curriculums/info/subjects/view");	
