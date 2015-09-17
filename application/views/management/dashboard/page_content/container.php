<div id="dashboard-content-contaniner">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<p class="panel-title <?php echo (get_page_content("dashboard_page_sub_menu"))?"text-right":"" ?>   padding-0"  role="navigation">
				<?php	
					if(get_page_content("dashboard_page_sub_menu")){
						
							$this->load->view(get_page_content("dashboard_page_sub_menu"));
						
					}
				?>
				<label class="<?php echo (get_page_content("dashboard_page_sub_menu"))?"pull-left":"" ?>  margin-top-5 margin-bottom-0 strong ">
					<strong>
						<a class="<?php echo hide_this("backlink",true); ?> custom-link-white margin-left-5 margin-right-5"  title="<?php echo get_element_title("backlink","Back"); ?>" class="" href="<?php echo get_link_url("backlink"); ?>">
						 	<span class="<?php echo get_icon_class("backlink","glyphicon glyphicon-arrow-left"); ?>"></span> 
						</a>
						<a class="<?php echo hide_this("refreshlink",true); ?> custom-link-white margin-left-5 margin-right-5"  title="<?php echo get_element_title("refreshlink",current_url()); ?>" class="" href="<?php echo get_link_url("refreshlink"); ?>">
						 	<span class="<?php echo get_icon_class("backlink","glyphicon glyphicon-refresh"); ?>"></span> 
						</a>

						<?php
							if(get_page_content("dashboard_content_title")){
								echo get_page_content("dashboard_content_title");
							}
						?>
					</strong>
				</label>
			</p>
		</div>
		<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
					<?php
						if(get_page_content("dashboard_content")){
							$this->load->view(get_page_content("dashboard_content"));
						}
					?>
					</div>
				</div>
		</div>
	</div>
</div>