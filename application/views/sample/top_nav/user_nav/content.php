
<p class="navbar-text navbar-right">
	<?php
		if(isLogin()){
			
			echo 'Hi ';
			echo '<a href="#" class="navbar-link">Mark Otto</a>';
			echo " | ";
			echo '<a href="'.site_url("logout").'" class="navbar-link">Sign out</a>';
		}else{
			echo '<span class="glyphicon glyphicon-log-in"></span> ';
			echo '<a href="'.site_url("login").'" class="navbar-link"> Sign in </a>';
		}
	?>
</p>