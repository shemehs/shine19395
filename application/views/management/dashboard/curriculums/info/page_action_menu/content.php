<?php 
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$courseinfo = $curriculuminfo->getCourseinfo();
	$majorinfo = $curriculuminfo->getMajorinfo();
?>
<div class="row">
	<div class="col-md-12	">
			<p>
				<div class="pull-right">
					<a class="margin-left-5 margin-right-5 custom-link-info"  title="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/edit"); ?>">
					 	<span class="glyphicon glyphicon-pencil"></span>  Edit
					</a>
					<a class="margin-left-5 margin-right-5 custom-link-info"  title=""  href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/delete"); ?>">
					 	<span class="glyphicon glyphicon-trash"></span> Delete
					</a>
					<a class="margin-left-5 margin-right-5  custom-link-info" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects"); ?>">
						<span class="glyphicon glyphicon-cog "></span> Subjects
					</a>
					
				</div>
				<label>
					<small> 
						<span class="glyphicon glyphicon-pushpin"></span>
					</small> 
					<?php echo $curriculuminfo->getCoursedefination(); ?>
				</label>
			</p>	
	</div>
</div>