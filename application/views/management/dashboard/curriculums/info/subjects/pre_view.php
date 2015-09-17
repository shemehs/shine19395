<?php
	
	set_active("bdcisubjectslink",true);
	
	add_page_content("dashboard_curriculums_content","management/dashboard/curriculums/info/subjects/page_content/content");
	add_page_content("dashboard_curriculums_content_title","Curriculum Subjects");
	add_page_content("page_action_menu","management/dashboard/curriculums/info/subjects/page_action_menu/content");

	
	add_page_info("javascript","select-all-checkbox","select-all-checkbox-script");


	set_link_url("backlink",site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)));
	set_hide_this("backlink",false);
	
	set_hide_this("refreshlink",false);
	set_link_url("refreshlink",current_url().(has_value("filtercurriculumsubjects")?("?filter=".get_value("filtercurriculumsubjects").(has_value("fcurriculumsubjectsyearlevel")?"&fyearlevel=".get_value("fcurriculumsubjectsyearlevel"):"").(has_value("fcurriculumsubjectssemester")?"&fsemester=".get_value("fcurriculumsubjectssemester"):"").(has_value("searchcurriculumsubjects")?("&search=".get_value("searchcurriculumsubjects").((has_value("searchcurriculumsubjectskey"))?("&searchkey=".get_value("searchcurriculumsubjectskey")):"")):"")):(has_value("searchcurriculumsubjects")?"?search=".get_value("searchcurriculumsubjects").((has_value("searchcurriculumsubjectskey"))?("&searchkey=".get_value("searchcurriculumsubjectskey")):""):"")));
	

	$this->load->view("management/dashboard/curriculums/info/subjects/view");	
