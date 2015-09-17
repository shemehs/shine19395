<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p class="panel-title">
					Edit curriculum type
				</p>
			</div>
			<div class="panel-body">
				<?php
					$curriculumtypeinfo = isset($curriculumtypeinfo)?$curriculumtypeinfo:false;

					$form_attr = array("class"=>"form-horizontal");
					$form_hidden = array(sha1("editcurriculumtype")=>sha1(random_string("alnum",5)));
					echo form_open("dashboard/curriculums/settings/types/".(($curriculumtypeinfo)?$curriculumtypeinfo->getCurriculumtypeid():0)."/edit",$form_attr,$form_hidden);
				?>
				
					<div class="form-group <?php echo (has_error("curriculumType")?"has-error":(has_success("curriculumType")?"has-success":"")); ?>">
						<label for="curriculumTypeinput" class="col-sm-4 control-label">Curriculum type</label>
						<div class="col-sm-8">
							<input name="curriculumType" type="text" id="curriculumTypeinput" class="form-control" value="<?php echo set_value("curriculumType",(($curriculumtypeinfo)?$curriculumtypeinfo->curriculum_type:"")); ?>" />
							<?php echo ((has_message("curriculumType"))?'<span class="help-block">'.get_message("curriculumType").'</span>':""); ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button name="saveUpdatecurriculumtype" type="submit" class="btn btn-primary"> Save </button>
							<a href="<?php echo site_url("dashboard/curriculums/settings/types"); ?>" id="cancelUpdatecurriculumtype" class="btn btn-danger rounded-corners-4px"> Cancel </a>
						<div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>