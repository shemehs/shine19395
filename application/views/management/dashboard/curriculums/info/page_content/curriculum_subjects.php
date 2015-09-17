<?php 
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$curiculum_yearlevels = ($curriculuminfo)?$curriculuminfo->getCurriculumyearlevels():false;
	$curiculum_semesters = ($curriculuminfo)?$curriculuminfo->getCurriculumsemesters():false;
?>

<div class="row">
	<div class="col-md-12">
		<fieldset>
			<legend>
				Subjects
				<span class="pull-right">
						<a class=""  title="" class="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects"); ?>">
						 	<span class="glyphicon glyphicon-cog"></span> 
						</a>
					</span>
			</legend>
		<?php
			if($curiculum_yearlevels && is_array($curiculum_yearlevels) && count($curiculum_yearlevels)>0){

				foreach($curiculum_yearlevels as $yearleveli => $yearlevelinfo){
					echo '<div class="row">';
						echo '<div class="col-md-12 ">';
							echo '<div class="padding-top-10 padding-bottom-10 ">';
								echo '<p class="text-center">';
									echo '<strong>';
									echo ucfirst($yearlevelinfo->yearlevel_description)." Year";
									echo '</strong>';
								echo '</p>';
								echo '<hr>';
								$semesters = $curriculuminfo->getCurriculumsemesters($yearlevelinfo->getYearlevelid());
								
									if( $semesters && is_array($semesters) && count($semesters)>0 ){
										echo '<div class="row">';
										foreach($semesters as $semesteri => $semesterinfo){
											echo '<div class="col-md-10 col-md-offset-1  col-lg-6 col-lg-offset-0  ">';
												echo '<div class="padding-top-10">';
												echo '<p>';
													echo '<strong>';
														echo ucfirst($semesterinfo->sem_description)." semster";
													echo '</strong>';
												echo '</p>';
												//echo '<hr>';
												echo '<div class="table-responsive">';
												echo '<table class="table">';
														echo '<thead>';
															echo '<tr>';
																echo '<th> Subject Code</th>';
																echo '<th> Subject Description</th>';
																echo '<th> Unit </th>';
															echo '</tr>';
														echo '</thead>';
													echo '<tbody>';
												$curriculum_subjects = $curriculuminfo->getCurriculumsubjects($semesterinfo->getSemesterid(),$yearlevelinfo->getYearlevelid());
												if($curriculum_subjects && is_array($curriculum_subjects) && count($curriculum_subjects) > 0){
													
														foreach($curriculum_subjects  as $csubjecti => $csubjectinfo){
															$subjectinfo = $csubjectinfo->getSubjectinfo();
															echo '<tr>';
																echo '<td> '.$subjectinfo->subject_code.'</td>';
																echo '<td> '.$subjectinfo->subject_description.'</td>';
																echo '<td> '.$csubjectinfo->unit.'</td>';
															echo '</tr>';
														}
														
												}else{
													echo '<tr>';
														echo '<th colspan="3"><p class="text-center"><i>No Curriculum Subject. </i></p></th>';
													echo '</tr>';
													
												}
												echo '</tbody>';
												echo '</table>';
											echo '</div>';
											echo '</div>';
											echo '</div>';
										}
										echo '</div>';
									}
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
			}
		?>
		</fieldset>
	</div>
</div>
