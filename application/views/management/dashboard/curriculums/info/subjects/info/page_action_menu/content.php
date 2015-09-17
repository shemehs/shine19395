<?php
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$curriculumsubjectinfo = isset($curriculumsubjectinfo)?$curriculumsubjectinfo:false;
?>
<div class="pull-right ">
	<ul class="nav nav-pills">
		<li>
			<a id="checkAllcurriculumsubjects" class=""  title="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjectid():0)."/edit"); ?>">
			 	<span class="glyphicon glyphicon-edit"></span> 
			</a>
		</li>
		<li>
			<a id="deleteCheckedcurriculumsubjects"  class=""  title="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".(($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjectid():0)."/delete"); ?>">
			 	<span class="glyphicon glyphicon-trash"></span> 
			</a>
		</li>
		<li>
			<a class=""  title="Done" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects"); ?>">
			 	<span class="glyphicon glyphicon-thumbs-up"></span> 
			</a>
		</li>
	</ul>
</div>
<p class="">
	<?php
		$curriculumsubjectinfo = isset($curriculumsubjectinfo)?$curriculumsubjectinfo:false;
		$subjectinfo = $curriculumsubjectinfo->getSubjectinfo();
	?>
	<span class="margin-ri	ght-10"><?php echo ($subjectinfo)?"<label>".$subjectinfo->subject_code."</label> ( ".$subjectinfo->subject_description." ) ":""; ?> </span>
</p>