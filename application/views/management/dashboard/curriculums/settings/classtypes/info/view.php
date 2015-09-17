<?php
	$classtypeinfo = isset($classtypeinfo)?$classtypeinfo:false;
	
	$breadcrumb = array("name"=>"bdcsctinfolink","text"=>ucfirst(($classtypeinfo)?$classtypeinfo->class_type_code:""),"uri"=>"dashboard/curriculums/settings/classtypes/".(($classtypeinfo)?$classtypeinfo->getClasstypeid():0));
	add_breadcrumb($breadcrumb);
	
	$this->load->view("management/dashboard/curriculums/settings/classtypes/view");
?>