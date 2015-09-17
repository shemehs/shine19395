<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p class="panel-title">
					ADD Course
				</p>
			</div>
			<div class="panel-body">
				<?php
					$form_attr = array("class"=>"form-horizontal");
					$form_hidden = array(sha1("addcourse")=>sha1(random_string("alnum",5)));
					echo form_open("dashboard/curriculums/settings/courses/add",$form_attr,$form_hidden);
				?>
				
					<div class="form-group <?php echo (has_error("courseCode")?"has-error":(has_success("courseCode")?"has-success":"")); ?>">
						<label for="courseCodeinput" class="col-sm-4 control-label">Course Code</label>
						<div class="col-sm-8">
							<input name="courseCode" type="text" id="courseCodeinput" class="form-control" value="<?php echo set_value("courseCode"); ?>" />
							<?php echo ((has_message("courseCode"))?'<span class="help-block">'.get_message("courseCode").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("courseDescription")?"has-error":(has_success("courseDescription")?"has-success":"")); ?>">
						<label for="courseDescriptioninput" class="col-sm-4 control-label">Course Description</label>
						<div class="col-sm-8">
							<?php
								$courseDescriptioninput = array(
								              'name'   => 'courseDescription',
								              'class' => "form-control",
								              'id'     => 'courseDescriptioninput',
								              'value'  => set_value("courseDescription"),
								              'rows'   => '3'
								            );

								echo form_textarea($courseDescriptioninput);
							?>
							<?php echo ((has_message("courseDescription"))?'<span class="help-block">'.get_message("courseDescription").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button name="saveNewcourse" type="submit" class="btn btn-primary"> Save </button>
							<a href="<?php echo site_url("dashboard/curriculums/settings/courses"); ?>" id="canceladdNewcourse" class="btn btn-danger"> Cancel </a>
						<div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>