<?php
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$courseinfo = $curriculuminfo->getCourseinfo();
	$majorinfo = $curriculuminfo->getMajorinfo();
?>
<div class="" id="curriculuminfo<?php echo ($curriculuminfo)?$curriculuminfo->getCurriculumid():0; ?>">
	<ul class="list-group">
		<li class="list-group-item">
			<strong>Course </strong>: <i> <?php echo ($courseinfo)?$courseinfo->course_description:"None"; ?></i>
		</li>
		<li class="list-group-item">
			<strong>Major </strong>: <i> <?php echo ($majorinfo)?$majorinfo->major_description:"None"; ?></i>
		</li>
		<li class="list-group-item">
			<strong>Description </strong>: <i> <?php echo ($curriculuminfo->description)?$curriculuminfo->description:"None"; ?></i>
		</li>
		<li class="list-group-item">
			<strong>Year </strong>: <i> <?php echo ($curriculuminfo->year)?$curriculuminfo->year:"None"; ?></i>
		</li>
		<li class="list-group-item">
			<?php 
				$this->load->view("management/dashboard/curriculums/info/page_content/curriculum_subjects");
			?>
		</li>
		<li class="list-group-item">
			<div class="row">			
				<div class="col-md-6">			
					<small>
						<span class=""><strong>Date created: </strong><i><?php echo ($curriculuminfo && (int)$curriculuminfo->getCreatedon() > 0)?mdate("%F %d,%Y %h:%i %a",$curriculuminfo->getCreatedon()):"Not Available"; ?> </i> </span>
					</small>
				</div>
				<div class="col-md-6">			
					<small>
						<span class=""><strong>Last update : </strong><i><?php echo ($curriculuminfo && (int)$curriculuminfo->getLastupdate() > 0)?mdate("%F %d,%Y %h:%i %a",$curriculuminfo->getLastupdate()):"Not Available"; ?></i></span>
					</small>
				</div>
			</div>
		</li>
	</ul>
	
</div>