
<div class="row">
	<div class="col-lg-10 col-lg-offset-1">
		
		<?php
			if(get_page_content("curriculums_settings_sub_mennu")){
				$this->load->view(get_page_content("curriculums_settings_sub_mennu"));
			}
		?>
					
		<div class="row">
			<div class="col-md-12">
				<div class="margin-top-10">
					<?php
						if(get_page_content("curriculum_settings_content")){
							$this->load->view(get_page_content("curriculum_settings_content"));
						}else{
							echo "No Curriculum Settings Content Found";
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
	