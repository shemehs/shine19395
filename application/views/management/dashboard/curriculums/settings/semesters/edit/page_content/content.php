<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p class="panel-title">
					Edit Semester
				</p>
			</div>
			<div class="panel-body">
				<?php
					$semesterinfo = isset($semesterinfo)?$semesterinfo:false;
					$form_attr = array("class"=>"form-horizontal");
					$form_hidden = array(sha1("editsemester")=>sha1(random_string("alnum",5)));
					echo form_open("dashboard/curriculums/settings/semesters/".(($semesterinfo)?$semesterinfo->getSemesterid():0)."/edit",$form_attr,$form_hidden);
				?>
				
					<div class="form-group <?php echo (has_error("semesterCode")?"has-error":(has_success("semesterCode")?"has-success":"")); ?>">
						<label for="semesterCodeinput" class="col-sm-4 control-label">Semester Code</label>
						<div class="col-sm-8">
							<input name="semesterCode" type="text" id="semesterCodeinput" class="form-control" value="<?php echo set_value("semesterCode",(($semesterinfo)?$semesterinfo->sem_code:"")); ?>" />
							<?php echo ((has_message("semesterCode"))?'<span class="help-block">'.get_message("semesterCode").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("semesterAlias")?"has-error":(has_success("semesterAlias")?"has-success":"")); ?>">
						<label for="semesterAliasinput" class="col-sm-4 control-label">Semester Alias</label>
						<div class="col-sm-8">
							<input name="semesterAlias" type="text" id="semesterAliasinput" class="form-control" value="<?php echo set_value("semesterAlias",(($semesterinfo)?$semesterinfo->sem_alias:"")); ?>" />
							<?php echo ((has_message("semesterAlias"))?'<span class="help-block">'.get_message("semesterAlias").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("semesterDescription")?"has-error":(has_success("semesterDescription")?"has-success":"")); ?>">
						<label for="semesterDescriptioninput" class="col-sm-4 control-label">Semester Description</label>
						<div class="col-sm-8">
							<input name="semesterDescription" type="text" id="semesterDescriptioninput" class="form-control" value="<?php echo set_value("semesterDescription",(($semesterinfo)?$semesterinfo->sem_description:"")); ?>" />
							<?php echo ((has_message("semesterDescription"))?'<span class="help-block">'.get_message("semesterDescription").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button name="saveNewsemester" type="submit" class="btn btn-primary"> Save </button>
							<a href="<?php echo site_url("dashboard/curriculums/settings/semesters"); ?>" id="canceladdNewsemesters" class="btn btn-danger"> Cancel </a>
						<div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>