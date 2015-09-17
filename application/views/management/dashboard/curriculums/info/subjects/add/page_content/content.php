<?php
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
?>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<fieldset>
			<legend>Add curriculum subject <a href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects") ?>" class="pull-right custom-link text-danger"> <span class="glyphicon glyphicon-remove"></span></a></legend>
			<?php
				$form_attr = array("class"=>"form-horizontal");
				$form_hidden = array(sha1("addcurriculumsubject")=>random_string("alnum",5));
				$form_action = "dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/add";
				echo form_open($form_action,$form_attr,$form_hidden);

			?>
				<div class="alert-container">
					<?php
						if(has_message("addcurriculumsubject")){
							echo get_alert_message("addcurriculumsubject",true,true);
						}
					?>
					
				</div>
				<div class="form-group <?php echo has_error("cssemesterId","has-error",has_success("cssemesterId","has-success")); ?>">
					<label for="semesterIdinput" class=" control-label col-sm-4">Semester</label>
					<div class="col-sm-7">
						<?php
							$all_semesters = get_all_semesters();

						?>
						<select class="form-control" name="cssemesterId" id="semesterIdinput" >
							<option value=""></option>
							<?php
								if($all_semesters && is_array($all_semesters) && count($all_semesters)>0){
									foreach($all_semesters as $semi => $seminfo){
										echo '<option value="'.$seminfo->getSemesterid().'"  '.set_select("cssemesterId",$seminfo->getSemesterid()).'>';
										echo ucfirst($seminfo->sem_description." semester");
										echo '</option>';
									}
								}
							?>
						</select>
						<span class="help-block"><?php echo has_message("cssemesterId")?get_message("cssemesterId"):""; ?></span>
					</div>
				</div>
				<div class="form-group  <?php echo has_error("csyearlevelId","has-error",has_success("csyearlevelId","has-success")); ?>">
					<label for="yearlevelIdinput" class=" control-label col-sm-4">Year level</label>
					<div class="col-sm-7">
						<?php
							$all_yearlevels = get_all_yearlevels();
						?>
						<select class="form-control" name="csyearlevelId" id="yearlevelIdinput" >
							<option class=""></option>
							<?php
								if($all_yearlevels && is_array($all_yearlevels) && count($all_yearlevels)>0){
									foreach($all_yearlevels as $yearleveli => $yearlevelinfo){
										echo '<option value="'.$yearlevelinfo->getYearlevelid().'"  '.set_select("csyearlevelId",$yearlevelinfo->getYearlevelid()).'>';
										echo ucfirst($yearlevelinfo->yearlevel_description." year");
										echo '</option>';
									}
								}
							?>
						</select>
						<span class="help-block"><?php echo has_message("csyearlevelId")?get_message("csyearlevelId"):""; ?></span>
					</div>
				</div>
				<div class="form-group  <?php echo has_error("cssubjectId","has-error",has_success("cssubjectId","has-success")); ?>">
					<label for="subjectIdinput" class=" control-label col-sm-4">Subject</label>
					<div class="col-sm-7">
						<?php
							$all_subjects = get_all_subjects();
						?>
						<select class="form-control" name="cssubjectId" id="subjectIdinput" >
							<option value=""></option>
							<?php
								if($all_subjects && is_array($all_subjects) && count($all_subjects)>0){
									foreach($all_subjects as $subjecti => $subjectinfo){
										echo '<option value="'.$subjectinfo->getSubjectid().'" '.(has_value("cssubjectUnit")?((get_value("cssubjectId") == $subjectinfo->getSubjectid() )?' selected = "selected" ':""):(set_select("cssubjectId",$subjectinfo->getSubjectid()))).'>';
										echo $subjectinfo->subject_code." ( ".$subjectinfo->subject_description." )";
										echo '</option>';
									}
								}
							?>
						</select>
						<span class="help-block"><?php echo has_message("cssubjectId")?get_message("cssubjectId"):""; ?></span>
					</div>
				</div>
				
				<div class="form-group  <?php echo has_error("cssubjectUnit","has-error",has_success("cssubjectUnit","has-success")); ?>">
					<label for="subjectUnitinput" class=" control-label col-sm-4">Unit</label>
					<div class="col-sm-5">
						<div class="input-group input-append spinner" data-trigger="spinner">
							<input value="<?php echo has_value("cssubjectUnit")?get_value("cssubjectUnit"):(set_value("cssubjectUnit",0)); ?>" type="text" class="form-control" name="cssubjectUnit" id="subjectUnitinput"  data-max="10" data-min="0" data-step="1" data-rule="quantity" />

							<span class="input-group-addon add-on"> 
								<a href="#" class="spin-up" data-spin="up">
									<span class="glyphicon glyphicon-triangle-top icon-sort-up"></span>
								</a> 
								<a href="#" class="spin-down" data-spin="down">
									<span class="glyphicon glyphicon-triangle-bottom icon-sort-down"></span>
								</a>
							</span>
						</div>
						<span class="help-block"><?php echo has_message("cssubjectUnit")?get_message("cssubjectUnit"):""; ?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3 col-sm-offset-4">
						<button type="submit" class="btn btn-primary form-control"> Save  </button>
					</div>
					<div class="col-sm-3">
						<a href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/add") ?>" class="rounded-corners-4px btn btn-danger form-control"> Reset  </a>
					</div>
				</div>
			</form>
		</fieldset>
	</div>
</div>