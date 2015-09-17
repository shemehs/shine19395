<?php
	set_active("loginasadmin",true);
	add_page_content("page_content",'main/login/management/page_content/content');
				
	$this->load->view("main/login/view");