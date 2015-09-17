<div class="navbar-header">
	<?php
		if(get_page_content("user_nav")||get_page_content('collapse_side_nav')){
	?>
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#my-navbar-collapse" aria-expanded="false">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	 <?php } ?>
	<?php if(get_page_content('collapse_side_nav')){ ?>
		  <button type="button" class="my-navbar-toggle"  my-data-toggle="collapse" data-target="#my-navbar-collapse" >
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
	<?php } ?>	
	<a class="navbar-brand" href="<?php echo base_url(); ?>">
		<?php
			echo $this->asset->image("WMSU_LOGO/esulogo.png",'',array('class'=>'pic-30x30 pull-left margin-top-n5'));
		?>
		<span class="margin-left-5">WMSU MOLAVE ESU</span>
	</a>
		
</div>
	<?php
		if(get_page_content("user_nav") || get_page_content("collapse_side_nav")){
			if(get_page_content("user_nav_container")){
				$this->load->view(get_page_content("user_nav_container"));
			}else{
				$this->load->view('management/template/top_nav/user_nav/container');
			}
		}
	?>
	