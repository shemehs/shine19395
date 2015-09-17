<?php
	add_page_content("curriculum_settings_content","management/dashboard/curriculums/settings/classtypes/info/edit/page_content/content");
	$classtypeinfo = isset($classtypeinfo)?$classtypeinfo:false;
	
	$breadcrumb = array("name"=>"bdcsctieditlink","text"=>"Edit","uri"=>"dashboard/curriculums/settings/classtypes/".(($classtypeinfo)?$classtypeinfo->getClasstypeid():0)."/edit");
	add_breadcrumb($breadcrumb);
	set_active("bdcsctieditlink",true);
	$this->load->view("management/dashboard/curriculums/settings/classtypes/info/view");
?>