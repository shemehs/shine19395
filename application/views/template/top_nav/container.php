<nav id="page-top-nav" class="navbar navbar-inverse navbar-fixed-top ">
	<div class="<?php echo (get_page_content("container")?get_page_content("container"):"container-fluid"); ?>">
		<?php
			(get_page_content("top_nav"))?$this->load->view(get_page_content("top_nav")):"";
		?>
	</div>
</nav>