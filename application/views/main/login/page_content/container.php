
<div class="login-form-container padding-0">
	<div class="row">
		<div class="col-lg-5 col-lg-offset-3 col-md-7 col-md-offset-2">
			<?php
			
				echo (get_page_content("page_content"))?$this->load->view(get_page_content("page_content")):"";
			
			?>
			
		</div>
	</div>
</div>