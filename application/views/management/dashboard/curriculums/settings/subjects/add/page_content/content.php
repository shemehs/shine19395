<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p class="panel-title">
					ADD Subject
				</p>
			</div>
			<div class="panel-body">
				<?php
					$form_attr = array("class"=>"form-horizontal");
					$form_hidden = array(sha1("addsubject")=>sha1(random_string("alnum",5)));
					echo form_open("dashboard/curriculums/settings/subjects/add",$form_attr,$form_hidden);
				?>
				
					<div class="form-group <?php echo (has_error("subjectCode")?"has-error":(has_success("subjectCode")?"has-success":"")); ?>">
						<label for="subjectCodeinput" class="col-sm-4 control-label">Subject Code</label>
						<div class="col-sm-8">
							<input name="subjectCode" type="text" id="subjectCodeinput" class="form-control" value="<?php echo set_value("subjectCode"); ?>" />
							<?php echo ((has_message("subjectCode"))?'<span class="help-block">'.get_message("subjectCode").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("subjectDescription")?"has-error":(has_success("subjectDescription")?"has-success":"")); ?>">
						<label for="subjectDescriptioninput" class="col-sm-4 control-label">Subject Description</label>
						<div class="col-sm-8">
							<?php
								$subjectDescriptioninput = array(
								              'name'   => 'subjectDescription',
								              'class' => "form-control",
								              'id'     => 'subjectDescriptioninput',
								              'value'  => set_value("subjectDescription"),
								              'rows'   => '3'
								            );

								echo form_textarea($subjectDescriptioninput);
							?>
							<?php echo ((has_message("subjectDescription"))?'<span class="help-block">'.get_message("subjectDescription").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button name="saveNewsubject" type="submit" class="btn btn-primary"> Save </button>
							<a href="<?php echo site_url("dashboard/curriculums/settings/subjects"); ?>" id="canceladdNewsubject" class="btn btn-danger"> Cancel </a>
						<div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>