
	<div class="row">
	<?php
		if(get_page_content("left_sidebar")){
			?>
			<div class="col-md-3">
				<?php
					if(get_page_content("left_sidebar_container")){
						$this->load->view(get_page_content("left_sidebar_container"));
					}else{
						$this->load->view("management/template/page_content/left_sidebar/container");
					}
				?>
			</div>
			<?php
		}
		if(get_page_content("page_content")){
			if((get_page_content("left_sidebar"))&&(get_page_content("right_sidebar"))){
				?>
					<div class="col-md-6">
				<?php
			}else if((get_page_content("left_sidebar"))||(get_page_content("right_sidebar"))){
				?>
					<div class="col-md-9">
				<?php
			}else{
				?>
					<div class="col-md-12">
				<?php
			}
			?>
				<div id="page-container" class="">
					<?php
						$this->load->view(get_page_content("page_content"));
					?>
				</div>
			</div>
			<?php
		}
		if(get_page_content("right_sidebar")){
			?>
			<div class="col-md-3">
				<?php
					if(get_page_content("right_sidebar_container")){
						$this->load->view(get_page_content("right_sidebar_container"));
					}else{
						$this->load->view("management/template/page_content/right_sidebar/container");
					}
				?>
			</div>
			<?php
		}
	?>
	</div>

