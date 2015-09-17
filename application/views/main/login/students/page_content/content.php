
	<?php
		
		$form_hidden = array(
					sha1("classschedulelogin")=>sha1("typestudent")
				);
		$form_attr = array("class"=>"login-form","id"=>"loginform","name"=>"loginform");
		
		echo form_open('login/student',$form_attr,$form_hidden);
		
		
			
	?>
		<div  class="panel panel-danger margin-0 rounded-corners">
			<div  id="login-form-content-conatiner" class="panel-heading">
				<p class="panel-title">
					
					<span class="text-muted margin-left-10 ">
						<strong> 
							Student	
						</strong>
					</span>
					<span class="pull-left  margin-top-n5">
						<i class='fa fa-2x fa-lock'></i>
					</span>
					<span class="text-white pull-right margin-top-n5">
						<i class='fa fa-2x fa-sign-in'></i>
					</span>
					
					
				</p>
			</div>
			<div class="panel-body" style=" padding-top:15px;">

			<div id="login-error-container" class="" >
				<?php 
					if(has_message('login')){ 
						echo get_alert_message("login");
					}
				?>
			</div>
			<div class="margin-top-5">

			<div class="row">
				<div class='col-md-10 col-md-offset-1 col-lg-8 col-lg-offset-2'>
				
					<div class="margin-bottom-0 form-group form-field-form-group <?php echo ((has_error("usernamefield"))?"has-error":((has_success("usernamefield"))?"has-success":"")); ?>" id="username-field-form-group">
						<div class="input-group">
							 <span class="input-group-btn">
								<button  id="username-field-btn" class="form-field-btn btn <?php echo ((has_error("usernamefield"))?"btn-danger":((has_success("usernamefield"))?"btn-success":"btn-default")); ?>" type="button" onclick="this.form.usernamefield.select();">
								<i class="fa fa-user"></i>
									<span class="form-field-btn-text "> Username </span>
								</button>
							  </span>
							<?php 
							$username = array(
							
								'name' => 'usernamefield',
								'value' => set_value("usernamefield"),
								'class' => 'text-center form-control',
								'placeholder' => 'Username'
							
							);
							
							
							echo form_input($username); 
							?>
							
							<span class=" input-group-btn form-field-clear-btn-group"  id="username-field-clear-btn-group" >
								<button disabled  data-target="username"  id="username-field-clear-btn"  class="form-field-clear-btn btn  btn-default" type="button">
									<i class="fa fa-times text-danger"></i> 
								</button>
							 </span>
						</div>
						<span id="usernamefield-help-block"  class="margin-bottom-0 padding-left-50 <?php echo has_message("usernamefield")?"":"sr-only"; ?> help-block"> <i class="  fa fa-exclamation-circle"></i> <span id="usernamefield-message"><?php echo (has_message("usernamefield")?get_message("usernamefield"):""); ?></span></span>
						
					</div>
					<hr class="margin-top-0 margin-left-15  margin-right-15">
					<div class="margin-bottom-0 form-group form-field-form-group  <?php echo ((has_error("passwordfield"))?"has-error":((has_success("passwordfield"))?"has-success":"")); ?>"  id="password-field-form-group">
						<div class="input-group">
							<span class="input-group-btn">
								<button id="password-field-btn"  class="form-field-btn btn  <?php echo ((has_error("passwordfield"))?"btn-danger":((has_success("passwordfield"))?"btn-success":"btn-default")); ?>" type="button" onclick="this.form.passwordfield.select();">
								<i class="fa fa-key"></i> 
								<span class="form-field-btn-text "> Password </span>
								</button>
							  </span>
							<?php
								$password = array(
							
									'name' => 'passwordfield',
									'value' => "",
									'class' => 'text-center form-control',
									'placeholder' => 'Password'
								
									
								);
								echo form_password($password); 
							?>
							<span class=" input-group-btn form-field-clear-btn-group" id="password-field-clear-btn-group" >
								<button disabled data-target="password" id="password-field-clear-btn"  class="form-field-clear-btn btn  btn-default" type="button">
									<i class="fa fa-times text-danger"></i> 
								</button>
							 </span>
						</div>
						<span id="passwordfield-help-block"  class="margin-bottom-0  padding-left-50 <?php echo has_message("passwordfield")?"":"sr-only"; ?> help-block"> <i class="  fa fa-exclamation-circle"></i> <span id="passwordfield-message"><?php echo (has_message("passwordfield")?get_message("passwordfield"):""); ?></span></span>
						
					</div>
					<hr class="margin-top-0 margin-left-15  margin-right-15">
					<div class="row margin-top-10">
						<div class="col-sm-5 col-sm-offset-1">
							<div class="form-group">
								<button  type="submit" name = "loginbtn" id="loginformsubmitbtn"  class = " btn btn-default btn-md form-control input-md">
									<i class="fa fa-sign-in"></i> Sign in
								</button>
							</div>
						</div>
						<div class="col-sm-5">
							<div class="form-group">
								<button  type="reset" name = "resetbtn" id="loginformresetbtn" class = "btn btn-default btn-md  form-control  input-md">
									<i class="fa fa-refresh"></i> Cancel
								</button>
							</div>
						</div>
					</div>
				
				</div>
				</div>
				</div>
			</div>
		</div>
	<?php

		echo form_close();

	?>
