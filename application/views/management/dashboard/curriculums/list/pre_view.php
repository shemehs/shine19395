<?php
	$breadcrumb = array("name"=>"bdclistlink","text"=>'List',"uri"=>"dashboard/curriculums/list");
	add_breadcrumb($breadcrumb);
	
	set_active("bdclistlink",true);
	$this->load->view("management/dashboard/curriculums/list/view");