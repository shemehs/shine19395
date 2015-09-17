<?php

	add_page_info("title","Dashboard");
	
	add_page_content("dashboard_content",'management/dashboard/page_content/content');
	add_page_content("dashboard_content_title","Dashboard");
	set_active("collapse_side_nav_link",true);
	
	$this->load->view("management/dashboard/view");
?>