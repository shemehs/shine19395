<ul id="my-side-nav" class="nav navbar-nav side-nav <?php echo (is_active("collapse_side_nav_link"))?"":"hide-side-nav"; ?> ">
	<?php
		(get_page_content("collapse_side_nav"))?$this->load->view(get_page_content("collapse_side_nav")):false;
	?>
</ul>