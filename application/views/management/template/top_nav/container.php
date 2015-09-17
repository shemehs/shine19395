<nav id="page-top-nav" class="navbar navbar-inverse navbar-fixed-top ">
	<div class="<?php echo (get_page_content("container")?get_page_content("container"):"container-fluid"); ?>">
		<div id="top-nav-wrapper" class="">
		<?php
			(get_page_content("top_nav"))?$this->load->view(get_page_content("top_nav")):"";
		?>
		</div>
	</div>
</nav>  