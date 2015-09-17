<nav class="right-sidebar-container hidden-print affix-top"  role="navigation">
      <?php
      if(get_page_content("right_sidebar")){
        $this->load->view(get_page_content("right_sidebar"));
      }
    ?>       
 </nav>
          