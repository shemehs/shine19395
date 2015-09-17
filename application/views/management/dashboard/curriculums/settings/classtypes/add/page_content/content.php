<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<p class="panel-title">
					Add class type
				</p>
			</div>
			<div class="panel-body">
				<?php
					$form_attr = array("class"=>"form-horizontal");
					$form_hidden = array(sha1("addclasstype")=>sha1(random_string("alnum",5)));
					echo form_open("dashboard/curriculums/settings/classtypes/add",$form_attr,$form_hidden);
				?>
				
					<div class="form-group <?php echo (has_error("classtypeCode")?"has-error":(has_success("classtypeCode")?"has-success":"")); ?>">
						<label for="classtypeCodeinput" class="col-sm-4 control-label">Class type Code</label>
						<div class="col-sm-8">
							<input name="classtypeCode" type="text" id="classtypeCodeinput" class="form-control" value="<?php echo set_value("classtypeCode"); ?>" />
							<?php echo ((has_message("classtypeCode"))?'<span class="help-block">'.get_message("classtypeCode").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("classtypeAlias")?"has-error":(has_success("classtypeAlias")?"has-success":"")); ?>">
						<label for="classtypeAliasinput" class="col-sm-4 control-label">Class type Alias</label>
						<div class="col-sm-8">
							<input name="classtypeAlias" type="text" id="classtypeAliasinput" class="form-control" value="<?php echo set_value("classtypeAlias"); ?>" />
							<?php echo ((has_message("classtypeAlias"))?'<span class="help-block">'.get_message("classtypeAlias").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group <?php echo (has_error("classtypeDescription")?"has-error":(has_success("classtypeDescription")?"has-success":"")); ?>">
						<label for="classtypeDescriptioninput" class="col-sm-4 control-label">Class type Description</label>
						<div class="col-sm-8">
							<input name="classtypeDescription" type="text" id="classtypeDescriptioninput" class="form-control" value="<?php echo set_value("classtypeDescription"); ?>" />
							<?php echo ((has_message("classtypeDescription"))?'<span class="help-block">'.get_message("classtypeDescription").'</span>':""); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-8 col-sm-offset-4">
							<button name="saveNewclasstype" type="submit" class="btn btn-primary"> Save </button>
							<a href="<?php echo site_url("dashboard/curriculums/settings/classtypes"); ?>" id="canceladdNewclasstype" class="btn btn-danger"> Cancel </a>
						<div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>