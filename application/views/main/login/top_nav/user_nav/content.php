
<p  class="navbar-text navbar-right">
	<?php
			echo '<span class="glyphicon glyphicon-log-in"></span> ';
			echo 'Sign in as ';
			
			echo '<a href="'.site_url("login/management").'" class="navbar-link '.((is_active("loginasadmin"))?"active":"").'">Admin</a>';
			echo " | ";
			echo '<a  href="'.site_url("login/instructor").'" class="navbar-link '.((is_active("loginasinstructor"))?"active":"").'">Instructor</a>';
			echo " | ";
			echo '<a  href="'.site_url("login/student").'" class="navbar-link '.((is_active("loginasstudent"))?"active":"").'">Student</a>';
			
		
	?>
</p>