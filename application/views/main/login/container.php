<div class="login-form-container padding-0">
	<div id="login-error-container" >
		<?php 
		if(get_message('login')){ 
			echo get_alert_message("login");
		}
		?>
	</div>
	
		<?php
		
			echo (get_page_content("page_content"))?$this->load->view(get_page_content("page_content")):"";
		
		?>
	
</div>