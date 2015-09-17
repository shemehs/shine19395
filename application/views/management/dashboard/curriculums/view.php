<?php
	add_page_info("title"," Dashboard - Curriculums");
	add_page_info("javascript","dcurriculumscript","dashboard-curriculum-script");
	add_page_content("curriculum_page_sub_menu","management/dashboard/curriculums/page_sub_menu/content");

	add_page_content("dashboard_header_subtitle","Curriculums");
	
	add_page_content("page_content",'management/dashboard/curriculums/page_content/container');
	set_active("dcurriculums",true);
	
	$breadcrumb = array("name"=>"bdcurriculumslink","text"=>' Curriculums',"uri"=>"dashboard/curriculums");
	add_breadcrumb($breadcrumb);

	set_active("collapse_side_nav_link",false);
	
	set_page_links("curriculum_sub_menu_links",array(
													array(
															"name" =>"settingslink",
															"text" =>' <span class="glyphicon glyphicon-wrench"> ',
															"attributes"=> array(
																			"class"=>' btn btn-sm btn-primary '.(is_active("settingslink")?" active ":" "),
																			"title"=>'Settings'
																			),
															"uri"=> "dashboard/curriculums/settings"
														),
													array(
															"name" =>"createlink",
															"text" =>' <span class="glyphicon glyphicon-plus"> ',
															"attributes"=> array(
																			"class"=>' btn btn-sm btn-primary '.(is_active("createlink")?" active ":" "),
																			"title"=>'Create '
																			),
															"uri"=> "dashboard/curriculums/create"
														),
													array(
															"name" =>"listlink",
															"text" =>' <span class="glyphicon glyphicon-list"> ',
															"attributes"=> array(
																			"class"=>' btn btn-sm btn-primary '.(is_active("listlink")?" active ":" "),
																			"title"=>'List '
																			),
															"uri"=> "dashboard/curriculums/list"
														)

													)
				);

	$this->load->view("management/dashboard/view");

?>