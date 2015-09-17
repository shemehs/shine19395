<div id="my-navbar-collapse" class="collapse navbar-collapse ">
	<?php
		(get_page_content("user_nav"))?$this->load->view(get_page_content("user_nav")):false;
	?>
	<?php
		if(get_page_content("collapse_side_nav")){
			if(get_page_content("collapse_side_nav_container")){
				$this->load->view(get_page_content("collapse_side_nav_container"));
			}else{
				$this->load->view('template/top_nav/collapse_side_nav/container');
			}
		}
	?>
</div>