<?php
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$all_curriculum_subjects = ($curriculuminfo)?$curriculuminfo->getCurriculumsubjects():false;
	$all_curriculum_subjects_count = ($all_curriculum_subjects && is_array($all_curriculum_subjects))?count($all_curriculum_subjects):0;

	$curriculum_subjects = false;
	if($curriculuminfo){
		if(has_value("filtercurriculumsubjects")){
			$fsemester = has_value("fcurriculumsubjectssemester")?get_value("fcurriculumsubjectssemester"):false;
			$fyearlevel = has_value("fcurriculumsubjectsyearlevel")?get_value("fcurriculumsubjectsyearlevel"):false;
			if(has_value("searchcurriculumsubjects")){

				$searchkey = has_value("searchcurriculumsubjectskey")?get_value("searchcurriculumsubjectskey"):false;
				$curriculum_subjects = ($curriculuminfo)?$curriculuminfo->searchCurriculumsubjects($fsemester,$fyearlevel,$searchkey):false;
		
			}else{
				$curriculum_subjects = ($curriculuminfo)?$curriculuminfo->getCurriculumsubjects($fsemester,$fyearlevel):false;
			}
			
		}else if(has_value("searchcurriculumsubjects")){
			$searchkey = has_value("searchcurriculumsubjectskey")?get_value("searchcurriculumsubjectskey"):false;
			$curriculum_subjects = ($curriculuminfo)?$curriculuminfo->searchCurriculumsubjects(false,false,$searchkey):false;
		}else{
			$curriculum_subjects = ($curriculuminfo)?$curriculuminfo->getCurriculumsubjects():false;
		}

	}
	
	
	$curriculum_subjects_count = ($curriculum_subjects && is_array($curriculum_subjects))?count($curriculum_subjects):0;
	$class_types = get_all_class_types();
	$form_attr = array("id"=>"customizeCurriculumsubjectsform");
	$form_hidden = array("customizeCurriculumsubjectsaction"=>"",sha1("customizecurriculumsubjects")=>random_string("alnum",5));
	$form_action = current_url().(has_value("filtercurriculumsubjects")?("?filter=".get_value("filtercurriculumsubjects").(has_value("fcurriculumsubjectsyearlevel")?"&fyearlevel=".get_value("fcurriculumsubjectsyearlevel"):"").(has_value("fcurriculumsubjectssemester")?"&fsemester=".get_value("fcurriculumsubjectssemester"):"").(has_value("searchcurriculumsubjects")?("&search=".get_value("searchcurriculumsubjects").((has_value("searchcurriculumsubjectskey"))?("&searchkey=".get_value("searchcurriculumsubjectskey")):"")):"")):(has_value("searchcurriculumsubjects")?"?search=".get_value("searchcurriculumsubjects").((has_value("searchcurriculumsubjectskey"))?("&searchkey=".get_value("searchcurriculumsubjectskey")):""):""));
	echo form_open($form_action,$form_attr,$form_hidden);
	$table_columns = 7;
?>
	<div class="table-responsive">
		<table class="table table-bordered ">
			<thead>
				<tr>
					<th class="padding-right-0">
						<a targets-name="curriculum-subject" target-name="checkAllcurriculumsubjects" target-id="check-all-curriculum-subject" id="checkAllcurriculumsubjects-link" class="check-all-curriclumSubject-link check-all-link">
							<span class="glyphicon glyphicon-<?php echo (is_checked("checkAllcurriculumsubjects",0))?"check":"unchecked"; ?>"></span>
						</a>
						<div class="sr-only">
							<input name="checkAllcurriculumsubjects"  input-name="checkAllcurriculumsubjects"  type="checkbox" id="check-all-curriculum-subject" class="check-all" value="<?php echo $curriculum_subjects_count; ?>" <?php echo check_it("checkAllcurriculumsubjects",$curriculum_subjects_count); ?> >
						</div>
					</th>
					
					<th>Subject Code</th>
					<th>Description</th>
					<th>Unit</th>
					<?php
						if($class_types && is_array($class_types) && count($class_types)>0){
							foreach($class_types as $typei => $typeinfo){
								echo '<th>'.$typeinfo->class_type_alias.'</th>';
								$table_columns++;
							}
						}
					?>
					<th>Semester</th>
					<th>Year level</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				
					<?php
					if($curriculum_subjects && is_array($curriculum_subjects) && count($curriculum_subjects)>0){
						foreach($curriculum_subjects as $csi => $csinfo){
							echo '<tr>';

								$seminfo = $csinfo->getSemesterinfo();
								$yearlevelinfo = $csinfo->getYearlevelinfo();
								$subjectinfo = $csinfo->getSubjectinfo();
								echo '<td class="padding-right-0 "> ';
									echo '<a target-id="check-curriculum-'.$csinfo->getCurriculumid().'-subject-'.$csinfo->getCurriculumsubjectid().'" target-name="curriclumSubject" class="check-curriculum-'.$csinfo->getCurriculumid().'-subject-'.$csinfo->getCurriculumsubjectid().'-link check-link">';
										echo ' <span class="glyphicon glyphicon-'.(( (is_checked("curriclumSubject",$csinfo->getCurriculumsubjectid())) || (is_checked("checkAllcurriculumsubjects",$curriculum_subjects_count)) )?"check":"unchecked").'"></span>';
									echo' </a>';	
									echo '<div class="sr-only">';
										echo '<input name="curriclumSubject[]" input-name="curriclumSubject"  type="checkbox"  id="check-curriculum-'.$csinfo->getCurriculumid().'-subject-'.$csinfo->getCurriculumsubjectid().'" class="curriculum-subject check" value="'.$csinfo->getCurriculumsubjectid().'" '.(check_it("curriclumSubject",$csinfo->getCurriculumsubjectid(),(is_checked("checkAllcurriculumsubjects",$curriculum_subjects_count)))).'>';							
									echo '</div>';
								echo '</td>';
								echo '<td>'.(($subjectinfo)?($subjectinfo->subject_code):"").'</td>';
								echo '<td>'.(($subjectinfo)?($subjectinfo->subject_description):"").'</td>';
								echo '<td>'.(($csinfo)?($csinfo->unit):"").'</td>';
								if($class_types && is_array($class_types) && count($class_types)>0){
									foreach($class_types as $typei => $typeinfo){
										$curriculumsubjecttypeinfo = $csinfo->getCurriculumsubjecttype($typeinfo->getClasstypeid());
										echo '<td>';
										echo ($curriculumsubjecttypeinfo)?$curriculumsubjecttypeinfo->unit:"0";
										echo '</td>';
									}
								}
								echo '<td>'.(($seminfo)?ucfirst($seminfo->sem_description):"").'</td>';
								echo '<td>'.(($yearlevelinfo)?($yearlevelinfo->yearlevel_code):"").'</td>';
								echo '<td class="text-center">';
									echo '<a href="'.site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($csinfo)?$csinfo->getCurriculumsubjectid():0)."/edit").'" title="edit" class="custom-link text-success"> <span class="glyphicon glyphicon-edit"></span> </a>';
									echo '<a href="'.site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($csinfo)?$csinfo->getCurriculumsubjectid():0)."/delete").'" title="Remove" class="custom-link text-danger"> <span class="glyphicon glyphicon-remove"></span> </a>';
									echo '<a href="'.site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($csinfo)?$csinfo->getCurriculumsubjectid():0)).'" title="Customize" class="custom-link text-info"> <span class="glyphicon glyphicon-cog"></span> </a>';
								echo '</td>';
							echo '</tr>';
						}
					}
					?>
			
			</tbody>
			<tdoot>
				<tr>
					<td colspan="<?php echo $table_columns; ?>">
						<?php
							if($curriculum_subjects_count > 0){
								echo $curriculum_subjects_count." subject(s) found.";
							}else{
								echo '<p class="text-center"><label> No subjects found. </label>';
								if($all_curriculum_subjects_count <= 0){
									echo '<a href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/add"); ?>"><span class="glyphicon glyphicon-plus-sign"></span> <i>Add one now? </i></a>';
								}
								echo '</p>';
								
							}
						?>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
</form>
<?php
	$js_script = '
					initializeAllcheck("curriclumSubject",false);	
				';
	add_page_script("jautoscript",$js_script);
?>