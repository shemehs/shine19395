<nav class="left-sidebar-container hidden-print affix-top" role="navigation">
    <?php
    	if(get_page_content("left_sidebar")){
    		$this->load->view(get_page_content("left_sidebar"));
    	}
    ?>       
 </nav>
          