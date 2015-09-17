<?php
	set_active("bdccreatelink",true);
	
	add_page_info("stylesheet","spinner/bootstrap-spinner","spinner-style");
	add_page_info("javascript","spinner/jquery.spinner","spinner-script");

	$this->load->view("management/dashboard/curriculums/create/view");