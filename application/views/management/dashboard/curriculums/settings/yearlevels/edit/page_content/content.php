<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p class="panel-title">
					Edit Year level
				</p>
			</div>
			<div class="panel-body">
				<?php
					$yearlevelinfo = isset($yearlevelinfo)?$yearlevelinfo:false;
					$form_attr = array("class"=>"form-horizontal");
					$form_hidden = array(sha1("edityearlevel")=>sha1(random_string("alnum",5)));
					echo form_open("dashboard/curriculums/settings/yearlevels/".(($yearlevelinfo)?$yearlevelinfo->getYearlevelid():0)."/edit",$form_attr,$form_hidden);
				?>
				
					<div class="form-group <?php echo (has_error("yearlevelCode")?"has-error":(has_success("yearlevelCode")?"has-success":"")); ?>">
						<label for="yearlevelCodeinput" class="col-sm-4 control-label">Year level Code</label>
						<div class="col-sm-8">
							<input name="yearlevelCode" type="text" id="yearlevelCodeinput" class="form-control" value="<?php echo set_value("yearlevelCode",(($yearlevelinfo)?$yearlevelinfo->yearlevel_code:"")); ?>" />
							<?php echo ((has_message("yearlevelCode"))?'<span class="help-block">'.get_message("yearlevelCode").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("yearlevelAlias")?"has-error":(has_success("yearlevelAlias")?"has-success":"")); ?>">
						<label for="yearlevelAliasinput" class="col-sm-4 control-label">Year Alias</label>
						<div class="col-sm-8">
							<input name="yearlevelAlias" type="text" id="yearlevelAliasinput" class="form-control" value="<?php echo set_value("yearlevelAlias",(($yearlevelinfo)?$yearlevelinfo->yearlevel_alias:"")); ?>" />
							<?php echo ((has_message("yearlevelAlias"))?'<span class="help-block">'.get_message("yearlevelAlias").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("yearlevelDescription")?"has-error":(has_success("yearlevelDescription")?"has-success":"")); ?>">
						<label for="yearlevelDescriptioninput" class="col-sm-4 control-label">Year level Description</label>
						<div class="col-sm-8">
							<input name="yearlevelDescription" type="text" id="yearlevelDescriptioninput" class="form-control" value="<?php echo set_value("yearlevelDescription",(($yearlevelinfo)?$yearlevelinfo->yearlevel_description:"")); ?>" />
							<?php echo ((has_message("yearlevelDescription"))?'<span class="help-block">'.get_message("yearlevelDescription").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button name="saveUpdateyearlevel" type="submit" class="btn btn-primary"> Save </button>
							<a href="<?php echo site_url("dashboard/curriculums/settings/yearlevels"); ?>" id="cancelUpdateyearelevel" class="btn btn-danger"> Cancel </a>
						<div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>