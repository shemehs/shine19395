<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p class="panel-title">
					ADD Major
				</p>
			</div>
			<div class="panel-body">
				<?php
					$form_attr = array("class"=>"form-horizontal");
					$form_hidden = array(sha1("addmajor")=>sha1(random_string("alnum",5)));
					echo form_open("dashboard/curriculums/settings/majors/add",$form_attr,$form_hidden);
				?>
				
					<div class="form-group <?php echo (has_error("majorCode")?"has-error":(has_success("majorCode")?"has-success":"")); ?>">
						<label for="majorCodeinput" class="col-sm-4 control-label">major Code</label>
						<div class="col-sm-8">
							<input name="majorCode" type="text" id="majorCodeinput" class="form-control" value="<?php echo set_value("majorCode"); ?>" />
							<?php echo ((has_message("majorCode"))?'<span class="help-block">'.get_message("majorCode").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("majorDescription")?"has-error":(has_success("majorDescription")?"has-success":"")); ?>">
						<label for="majorDescriptioninput" class="col-sm-4 control-label">major Description</label>
						<div class="col-sm-8">
							<?php
								$majorDescriptioninput = array(
								              'name'   => 'majorDescription',
								              'class' => "form-control",
								              'id'     => 'majorDescriptioninput',
								              'value'  => set_value("majorDescription"),
								              'rows'   => '3'
								            );

								echo form_textarea($majorDescriptioninput);
							?>
							<?php echo ((has_message("majorDescription"))?'<span class="help-block">'.get_message("majorDescription").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button name="saveNewmajor" type="submit" class="btn btn-primary"> Save </button>
							<a href="<?php echo site_url("dashboard/curriculums/settings/majors"); ?>" id="canceladdNewmajor" class="btn btn-danger"> Cancel </a>
						<div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>