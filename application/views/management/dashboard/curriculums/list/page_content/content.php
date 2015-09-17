<div class="margin-top-10">
	<?php
		$curriculums = get_all_curriculums();
		if($curriculums && is_array($curriculums) && count($curriculums)>0){
			?>
				<ul class="list-group">
			<?php
			foreach($curriculums as $curri => $curr){
				$courseinfo = $curr->getCourseinfo();
				$majorinfo = $curr->getMajorinfo();
				?>
					<li  class="list-group-item">
						<div class="row">
							<div class="col-md-9">
								<a href="<?php echo site_url("dashboard/curriculums/".$curr->getCurriculumid()); ?>" class="custom-link-black margin-right-10" >
									<span>
										<small> 
											<span class="glyphicon glyphicon-pushpin"></span>
										</small> 

										<strong><?php echo $curr->getCoursedefination(); ?> </strong>
										<br />
										<small>
											Date created: <i>July 23, 2015 04:00 Pm </i> 
											Last update : <i>July 23, 2015 04:00 Pm</i>
										</small>
									</span>
								</a>
							</div>
							<div class="col-md-3 ">
								<span class="pull-right margin-top-10">
									<a href="<?php echo site_url("dashboard/curriculums/".$curr->getCurriculumid()."/edit"); ?>" class="custom-link margin-left-5 margin-right-5 text-success" >
											<span class="glyphicon glyphicon-edit"></span>
									</a>
									<a href="<?php echo site_url("dashboard/curriculums/".$curr->getCurriculumid()); ?>" class="custom-link margin-left-5 margin-right-5 text-info" >
											<span class="glyphicon glyphicon-info-sign"></span>
									</a>
									<a href="<?php echo site_url("dashboard/curriculums/".$curr->getCurriculumid()."/delete"); ?>" class="custom-link margin-left-5 margin-right-5 text-danger" >
											<span class="glyphicon glyphicon-trash"></span>
									</a>
									<a href="<?php echo site_url("dashboard/curriculums/".$curr->getCurriculumid()."/subjects"); ?>" class="custom-link margin-left-5 margin-right-5 text-warning" >
											<span class="glyphicon glyphicon-cog"></span>
									</a>
								</span>
							</div>
						</div>
						
					</li>
				<?php
			}
			?>
				</ul>
			<?php
		}else{
			?>
			<p class="text-center"><label>No Curriculum(s) Yet. </label> <a href="<?php echo site_url("dashboard/curriculums/create"); ?>"><span class="glyphicon glyphicon-plus-sign"></span> <i>Create one now? </i></a></p>
			<?php
		}
	?>	
</div>