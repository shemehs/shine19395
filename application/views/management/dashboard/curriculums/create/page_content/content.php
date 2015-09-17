
<div class="row">
	<div class="col-md-12">
		<?php
			$curriculum_types = get_all_curriculum_types();
			$attr = array( "id"=>"createCurriculumform","class"=>"form-horizontal");
			$hidden = array("selectCurriculum"=>"false",sha1("createcurriculum") => random_string("alnum",5));
			echo form_open('dashboard/curriculums/create',$attr,$hidden); 
		?>
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<fieldset id="curriculumInfofields" <?php echo disable_this("curriculumInfofields"); ?> >
						<legend>
							<div id="cancelCurriculumbtncontainer" class="pull-right <?php echo hide_this("cancelCurriculumbtn"); ?> " >
					    		<a href="<?php echo site_url("dashboard/curriculums"); ?>" id="cancelCurriculumbtn"  class="custom-link text-danger "><span class="glyphicon glyphicon-remove"></span></a>
					    	</div>
							<span class="glyphicon glyphicon-info"></span> New curriculum information 
						</legend>
						<div class="row">
							<div class="col-md-12">
								<div id="curriculumformerrorcontainer" >
									<?php
										if(has_message("createCurriculumformerror")){
											echo get_alert_message("createCurriculumformerror");
											echo "<hr>";
										}
									?>
								</div>
							</div>
						</div>
						<fieldset id="curriculumTypefield" <?php echo disable_this("curriculumTypefield"); ?> >
							<div class="create-curriculum-form-group form-group <?php echo has_error("curriculumType")?"has-error":""; ?>">
								<label for="inputCurriculumtype"  class="col-sm-4 control-label"> Curriculum Type </label>
								<div class="col-sm-7">
									<?php
										if($curriculum_types && is_array($curriculum_types) && count($curriculum_types)>0){
											foreach($curriculum_types as $typei => $typeinfo){
												echo '
													<label class="radio-inline">
													 	<input type="radio" name="curriculumType" id="inputCurriculumtype'.(($typeinfo)?$typeinfo->getCurriculumtypeid():0).'" value="'.(($typeinfo)?$typeinfo->getCurriculumtypeid():0).'" '.set_radio('curriculumType', (($typeinfo)?$typeinfo->getCurriculumtypeid():0), FALSE).'> '.(($typeinfo)?$typeinfo->curriculum_type:"").'
													</label>
													';
											}
										}
									?>
							      	
									 <?php
							    		if(has_message("curriculumType")){
							    			echo '<span class="help-block">'.get_message("curriculumType").'</span>';
							    		}
							    	?>
							    </div>
							</div>
						</fieldset>
						<div class="create-curriculum-form-group form-group <?php echo has_error("curriculumCourse")?"has-error":(has_success("curriculumCourse")?"has-success":""); ?>">
						    <label for="inputCurriculumcourse" class="col-sm-4 control-label">Course</label>
						    <div class="col-sm-7">
						    	<select class="form-control" name="curriculumCourse" id="inputCurriculumcourse">
						    		<option value=""></option>
							    	<?php
							    		
							    		$courses_obj = get_all_courses();
										if($courses_obj && is_array($courses_obj) && count($courses_obj) > 0){
											foreach($courses_obj as $coursei => $courseinfo){
												echo '<option  value="'.$courseinfo->getCourseid().'" '.((has_value("curriculumCourse")&&(get_value("curriculumCourse")==$courseinfo->getCourseid()))?'selected="selected"':set_select('curriculumCourse',$courseinfo->getCourseid())).'>';
												echo $courseinfo->course_code.' ( '.$courseinfo->course_description.' ) ';
												echo '</option>';
											}
											
							    		}

							    	?>
							    </select>
						      	
						    	<?php

						    		if(has_message("curriculumCourse")){
						    			echo '<span class="help-block">'.get_message("curriculumCourse").'</span>';
						    		}
						    	?>
						    </div>
						</div>
						<div class="form-group create-curriculum-form-group  <?php echo has_error("curriculumMajor")?"has-error":""; ?>">
						    <label for="inputCurriculummajor" class="col-sm-4 control-label">Major</label>
						    <div class="col-sm-7">
						    	<select class="form-control" name="curriculumMajor" id="inputCurriculummajor">
						    		<option value=""></option>
							    	<?php
							    		$majors_obj = get_all_majors();
										if($majors_obj && is_array($majors_obj) && count($majors_obj) > 0){
											foreach($majors_obj as $majori => $majorinfo){
												echo '<option value="'.$majorinfo->getMajorid().'"   '.((has_value("curriculumMajor")&&(get_value("curriculumMajor")==$majorinfo->getMajorid()))?'selected="selected"':set_select('curriculumMajor',$majorinfo->getMajorid())).'>';
												echo $majorinfo->major_code.' ( '.$majorinfo->major_description.' ) ';
												echo '</option>';
											}
							    		}
							    	?>
							    </select>
						    	 <?php
						    		if(has_message("curriculumMajor")){
						    			echo '<span class="help-block">'.get_message("curriculumMajor").'</span>';
						    		}
						    	?>
						    </div>
						</div>
						<div class="form-group  create-curriculum-form-group  <?php echo has_error("curriculumDescription")?"has-error":""; ?>">
						    <label for="inputCurriculumdescription" class="col-sm-4 control-label">Description</label>
						    <div class="col-sm-7">

						    	 <?php
						    	 $data = array(
								      'name'        => 'curriculumDescription',
								      'class'        => 'form-control',
								      'id'          => 'inputCurriculumdescription',
								      'value'       => ((has_value("curriculumDescription"))?get_value("curriculumDescription"):set_value("curriculumDescription")),
								      'rows'  		=> '3',
								      'cols'        => '',
								    );

								echo form_textarea($data);
						    		if(has_message("curriculumDescription")){
						    			echo '<span class="help-block">'.get_message("curriculumDescription").'</span>';
						    		}
						    	?>
						    </div>
						</div>
						<div class="form-group  create-curriculum-form-group  <?php echo has_error("curriculumYear")?"has-error":""; ?>">
						    <label for="inputcurriculumYear" class="col-sm-4 control-label">Year</label>
						    <div class="col-sm-7">
						    	
						     	<?php
						    			$ystart = 1970;
						    			$now 	= mdate("%Y",now());
						    			$yend		= $now+10;
						    			
						    		?>
						     	<div class="input-group input-append spinner" data-trigger="spinner">
									<input value="<?php echo ((has_value("curriculumYear"))?get_value("curriculumYear"):set_value("curriculumYear")); ?>" type="text" class="form-control" name="curriculumYear" id="inputCurriculumyear" data-min="0" data-max="<?php echo $yend; ?>" data-step="1" data-rule="Year" />

									<span class="input-group-addon add-on"> 
										<a href="#" class="spin-up" data-spin="up">
											<span class="glyphicon glyphicon-triangle-top icon-sort-up"></span>
										</a> 
										<a href="#" class="spin-down" data-spin="down">
											<span class="glyphicon glyphicon-triangle-bottom icon-sort-down"></span>
										</a>
									</span>
								</div>
						    	 <?php
						    		if(has_message("curriculumYear")){
						    			echo '<span class="help-block">'.get_message("curriculumYear").'</span>';
						    		}
						    	?>
						    </div>
						</div>
					</fieldset>
				</div>
			</div>
			<div class="form-group">
			    <div class="text-center col-md-2 col-md-offset-5">
			      	<button id="saveCurriculumbtn" type="submit" class="btn btn-primary form-control ">Save</button>
			    </div>
			     
			    <div class="text-center col-md-2">
			    	<div id="resetCurriculumbtncontainer" class="<?php echo hide_this("resetCurriculumbtn"); ?>" >
			      		<button id="resetCurriculumbtn" type="reset" class="btn btn-warning form-control ">Reset</button>
			    	</div>
			    </div>
			 </div>
		</form>
	</div>
</div>
	