<div id="my-side-nav-menubar" role="navigation">
	<ul id="" class="nav navbar-nav" >
		<li class="<?php echo is_active("dcurriculums")?"active":""; ?>">
			<a href="<?php echo site_url("dashboard/curriculums"); ?>">
				<span class="glyphicon glyphicon-list" aria-hidden="true"></span> Curriculums 
			</a>
		</li>
		<li class="<?php echo is_active("dschedules")?"active":""; ?>">
			<a href="<?php echo site_url("dashboard/schedules"); ?>">
				<span class="glyphicon glyphicon-time" aria-hidden="true"></span> Class Schedules 	
			</a>
		</li>
		<li class="<?php echo is_active("daccounts")?"active":""; ?>">
			<a href="<?php echo site_url("dashboard/accounts"); ?>">
				<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> User Accounts 	
			</a>
		</li>
		<li class="<?php echo is_active("dinstructors")?"active":""; ?>">
			<a href="<?php echo site_url("dashboard/instructors"); ?>">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Instructors 	
			</a>
		</li>

		<li class="<?php echo is_active("dstudents")?"active":""; ?>">
			<a href="<?php echo site_url("dashboard/students"); ?>">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span> Students 	
			</a>
		</li>
		<li class="<?php echo is_active("ddepartments")?"active":""; ?>">
			<a href="<?php echo site_url("dashboard/departments"); ?>">
				<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Departments 	
			</a>
		</li>
		<li class="<?php echo is_active("dclassrooms")?"active":""; ?>">
			<a href="<?php echo site_url("dashboard/classrooms"); ?>">
				<span class="glyphicon glyphicon-home" aria-hidden="true"></span> Class Rooms 	
			</a>
		</li>
		<li class="<?php echo is_active("dsettings")?"active":""; ?>">
			<a href="<?php echo site_url("dashboard/settings"); ?>">
				<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings	
			</a>
		</li>
	</ul>
</div>