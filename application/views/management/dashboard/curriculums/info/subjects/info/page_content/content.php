<?php
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	
	$curriculumsubjectinfo = isset($curriculumsubjectinfo)?$curriculumsubjectinfo:false;
	$subjectinfo = ($curriculumsubjectinfo)?$curriculumsubjectinfo->getSubjectinfo():false;
	$yearlevelinfo = ($curriculumsubjectinfo)?$curriculumsubjectinfo->getYearlevelinfo():false;
	$semesterinfo = ($curriculumsubjectinfo)?$curriculumsubjectinfo->getSemesterinfo():false;

	$curriculumsubjecttypes = ($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjecttypes():false;
	$curriculum_subjects_classtypes_count = ($curriculumsubjecttypes && is_array($curriculumsubjecttypes) && count($curriculumsubjecttypes)>0)?count($curriculumsubjecttypes):0;
	$class_types = get_all_class_types();
	$class_types_count = ($class_types && is_array($class_types) && count($class_types)>0)?count($class_types):0;
	$defaultschecked = array();
?>

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<?php
				$form_attr = array("class"=>"");
				$form_hidden = array(sha1("updateCurriculumsubjectclasstypes")=>random_string());
				$form_action = current_url();
				$posted_data = $this->input->post("curriculumSubjecttypeunit");
				
				echo form_open($form_action,$form_attr,$form_hidden);
			?>
			<fieldset>
				<legend>
					<div class="row">
						<div class="col-md-7">
							<span class=""><label class="margin-top-10">Subject Information</label></span>
						</div>
						<div class="col-md-5">
							<ul class="nav nav-pills pull-right">
								<li>
									<a id="checkAllcurriculumsubjects" class=""  title="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjectid():0)."/edit"); ?>">
									 	<small><span class="glyphicon glyphicon-edit"></span> </small>
									</a>
								</li>
								<li>
									<a id="deleteCheckedcurriculumsubjects"  class=""  title="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjectid():0)."/delete"); ?>">
									 	<small><span class="glyphicon glyphicon-trash"></span> </small>
									</a>
								</li>
								<li>
									<a class=""  title="Done" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects"); ?>">
									 	<small><span class="glyphicon glyphicon-thumbs-up"></span> </small>
									</a>
								</li>
							</ul>
						</div>
						
					</div>
				</legend>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="form-group">
							<label class="control-label ">Subject Code</label>
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<p class="text-center"><i><?php echo (($curriculumsubjectinfo && $subjectinfo)?$subjectinfo->subject_code:""); ?></i></p>
									<hr class="margin-2">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label ">Subject Description</label>
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<p class="text-center"><i><?php echo (($curriculumsubjectinfo && $subjectinfo)?$subjectinfo->subject_description:""); ?></i></p>
									<hr class="margin-2">
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label ">Subject Unit</label>
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									<p class="text-center"><i><?php echo (($curriculumsubjectinfo)?$curriculumsubjectinfo->unit:""); ?></i></p>
									<hr class="margin-2">
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>
					Subject Class 
					<div class="pull-right">
						<a targets-name="curriculum-subject-classtype" target-name="checkAllcurriculumsubjectclasstypes" target-id="check-all-curriculum-subject" id="checkAllcurriculumsubjectclasstypes-link" class="custom-link-info check-all-curriculumsubjectclasstypes-link check-all-link">
							<small><span class="glyphicon glyphicon-<?php echo (is_checked("checkAllcurriculumsubjectclasstypes",0))?"check":"unchecked"; ?>"></span> Select All </small>
						</a>
						<div class="sr-only">
							<input name="checkAllcurriculumsubjectclasstypes"  input-name="checkAllcurriculumsubjectclasstypes"  type="checkbox" id="check-all-curriculum-subject" class="check-all" value="<?php echo $class_types_count; ?>" <?php echo check_it("checkAllcurriculumsubjectclasstypes",$curriculum_subjects_classtypes_count); ?> >
						</div>
					</div>
				</legend>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">		
					
					<?php
						if($class_types && is_array($class_types) && count($class_types)>0){
							foreach($class_types as $typei => $typeinfo){
								$hasCurriculumsubjecttype = ($curriculumsubjectinfo)?$curriculumsubjectinfo->hasCurriculumsubjecttype($typeinfo->getClasstypeid()):false;
								$curriculumsubjecttypeinfo = ($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjecttype($typeinfo->getClasstypeid()):false;
								if($hasCurriculumsubjecttype){
									$defaultschecked[] = $typeinfo->getClasstypeid();
								}
					?>
						
							<div class="form-group row">
								<label class="control-label col-md-7"> 
									<a target-id="check-curriculumsubjectclasstype-<?php echo $typeinfo->class_type_code; ?>" target-name="curriculumsubjectclasstypes" class="custom-link-black check-link check-curriculumsubjectclasstype-<?php echo $typeinfo->class_type_code; ?>-link" href="#">
										<span class="glyphicon glyphicon-<?php echo (($hasCurriculumsubjecttype)?"check":"unchecked"); ?>"></span>
										<?php echo ucfirst($typeinfo->class_type_description." ( ".$typeinfo->class_type_alias." )"); ?>
									</a>
									<div class="sr-only">
										<input class="curriculum-subject-classtype check" <?php echo set_checkbox("curriculumsubjectclasstypes",$typeinfo->getClasstypeid(),(($hasCurriculumsubjecttype)?true:false)); ?> name="curriculumsubjectclasstypes[<?php echo $typeinfo->getClasstypeid(); ?>]"  input-name="curriculumsubjectclasstypes" id="check-curriculumsubjectclasstype-<?php echo $typeinfo->class_type_code; ?>" type="checkbox" value="<?php echo $typeinfo->getClasstypeid(); ?>">
									</div>
								</label>
								<div class="col-md-5">
									<div class=" row">
										<div class="col-md-4 ">
											<p class=" text-right  margin-bottom-0 margin-top-5"><i class=""> Unit </i></p>
										</div>
										<div class="col-md-8">
											<div class="input-group input-append spinner" data-trigger="spinner">
												<input target-id="check-curriculumsubjectclasstype-<?php echo $typeinfo->class_type_code; ?>" value="<?php echo ($posted_data)?$posted_data[$typeinfo->getClasstypeid()]:(($curriculumsubjecttypeinfo)?$curriculumsubjecttypeinfo->getUnit():0); ?>" type="text" class="curriculumSubjecttypeunitinput form-control" name="curriculumSubjecttypeunit[<?php echo $typeinfo->getClasstypeid(); ?>]" id="curriculumSubjecttype<?php echo $typeinfo->class_type_code; ?>unitinput"  data-max="10" data-min="0" data-step="1" data-rule="quantity" />

												<span class="input-group-addon add-on"> 
													<a target-id="curriculumSubjecttype<?php echo $typeinfo->class_type_code; ?>unitinput" href="#" class="curriculumSubjecttypeunitup spin-up" data-spin="up">
														<span class="glyphicon glyphicon-triangle-top icon-sort-up"></span>
													</a> 
													<a target-id="curriculumSubjecttype<?php echo $typeinfo->class_type_code; ?>unitinput" href="#" class="curriculumSubjecttypeunitdown spin-down" data-spin="down">
														<span class="glyphicon glyphicon-triangle-bottom icon-sort-down"></span>
													</a>
												</span>
											</div>
										</div>
									</div>
								</div>
								
							</div>
							<hr class="margin-top-0">

						
					<?php
								
							}
						}
					?>	
							<div class="-formgroup row">
								<div class="col-md-4 col-md-offset-2">
									<button type="submit" class="btn btn-sm btn-primary form-control">Save Changes</button>
								</div>
								<div class="col-md-4">
									<button link-url="<?php  echo current_url(); ?>" id="cancelCurriculumsubjectclasstypeschanges" type="reset" class="btn btn-sm btn-warning form-control button-link">Cancel</button>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
			
		</div>
	</div>
	<?php
	$js_script = '
					initializeAllcheck("curriculumsubjectclasstypes",false'.(($defaultschecked && is_array($defaultschecked) && count($defaultschecked)>0)?(",".json_encode($defaultschecked)):"").');	
				';
	add_page_script("jautoscript",$js_script);
?>