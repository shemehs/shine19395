<?php

		add_page_info("title"," Login ");

		add_page_info("stylesheet","main","main-style");
		add_page_info("javascript","main","main-script");

		add_page_info("stylesheet","login","custom-style");
		add_page_info("javascript","login","custom-script");
		
		add_page_content("container","container");

		add_page_content("top_nav",'main/top_nav/content');
		add_page_content("user_nav",'main/login/top_nav/user_nav/content');
		add_page_content("page_header",'main/page_header/content');
		add_page_content("page_content_container",'main/login/page_content/container');
		
		

		add_page_content("page_footer",'main/page_footer/content');
		
		$this->load->view('template/frame');