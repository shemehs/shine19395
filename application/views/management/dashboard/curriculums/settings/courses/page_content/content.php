<div class="row">
	<div class="col-md-12">
		<?php 
			$courses = get_all_courses();

		 ?>
		 <div class="table-responsive">
			 <table class="table table-bordered table-hovered">
			 	<thead>
			 		<tr>
			 			<th>
			 				Course Code
			 			</th>
			 			<th>
			 				DEscription
			 			</th>
			 			<th>
			 				Status
			 			</th>
			 			<th>
			 				Action
			 			</th>
			 	</thead>
			 	<tbody>
			 		<?php 
			 			if($courses && is_array($courses) && count($courses)>0){
			 				foreach($courses as $coursei => $courseinfo){
			 					?>
			 						<tr>
							 			<td>
							 				<?php echo $courseinfo->course_code; ?>
							 			</td>
							 			<td>
							 				<?php echo $courseinfo->course_description; ?>
							 			</td>
							 			<td><?php  ?></td>
										<td>
											<a href="<?php echo site_url("dashboard/curriculums/settings/courses/".$courseinfo->getCourseid()."/edit"); ?>" class=" btn btn-xs btn-success">
												<span class="glyphicon glyphicon-edit"  aria-hidden="true" ></span>
												Edit 
											</a> 
											<a href="<?php echo site_url("dashboard/curriculums/settings/courses/".$courseinfo->getCourseid()."/delete"); ?>" class="btn btn-xs btn-danger"> 
												<span class="glyphicon glyphicon-remove"  aria-hidden="true" ></span>
												Delete 
											</a>
										</td>
							 		</tr>
								<?php
			 				} 
			 			}else{
			 				?>
		 						<tr>
						 			<td>
						 				No Courses Found.
						 			</td>
						 			
						 		</tr>
							<?php
			 			}
			 			
			 		?>
			 		
			 	</tbody>
			 </table>
		</div>
		<div class="row">
			<div class="col-md-12 text-right">
				<a href="<?php echo site_url("dashboard/curriculums/settings/courses/add"); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ADD</a>
			</div>
		</div>
	</div>
</div>