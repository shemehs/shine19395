<?php
	$subjects = get_all_subjects();
?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th> Subject Code </th>
					<th> Description </th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($subjects && is_array($subjects) && count($subjects) > 0){
						foreach($subjects as $subi => $sub){
							?>
							<tr>
								<td><?php echo $sub->subject_code; ?></td>
								<td><?php echo $sub->subject_description; ?></td>
								<td><?php  ?></td>
								<td>
									<a href="<?php echo site_url("dashboard/curriculums/settings/subjects/".$sub->getSubjectid()."/edit"); ?>" class=" btn btn-xs btn-success">
										<span class="glyphicon glyphicon-edit"  aria-hidden="true" ></span>
										Edit 
									</a> 
									<a href="<?php echo site_url("dashboard/curriculums/settings/subjects/".$sub->getSubjectid()."/delete"); ?>" class="btn btn-xs btn-danger"> 
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
								<td colspan="3"> No subject Found. </td>
							</tr>

						<?php
					}
					?>
				
			</tbody>
		</table>
	</div>
	<a href="<?php echo site_url("dashboard/curriculums/settings/subjects/add"); ?>">
		<span class="glyphgicon glyphgicon-plus"></span> ADD
	</a>
