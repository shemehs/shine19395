<div id="my-side-nav" class="side-nav  <?php echo (is_active("collapse_side_nav_link"))?"":"hide-side-nav"; ?> "> 

	
	<div class="user-info">
		
		<div class="user-info-container">
			<div class="row ">	
				<div class="col-xs-12 ">	

					<div class="row ">
					  <div class="col-xs-6 col-xs-offset-3  col-md-6 col-md-offset-3">
					    <span  class="thumbnail">
					      <img src="/assets/img/baby.jpg" alt="..." class="">
					    </span>
					  </div>
					</div>
					<p class="text-center ">
						<a href="#">Shine Deluna Lague</a>
					</p>
					<div class="row ">
						<div class="col-xs-12 ">
							<hr class="">
							<p class="text-center">
								 <small>
								 	You are logged in as Administrator
								 </small>
							</p>
							
							<hr class="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		(get_page_content("collapse_side_nav"))?$this->load->view(get_page_content("collapse_side_nav")):false;
	?>
		

</div>