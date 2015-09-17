<?php
	$semesters = get_all_semesters();
?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Semester Code</th>
					<th>Alias</th>
					<th>Description</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($semesters && is_array($semesters) && count($semesters) > 0){
						foreach($semesters as $semi => $sem){
							?>
							<tr>
								<td><?php echo $sem->sem_code; ?></td>
								<td><?php echo $sem->sem_alias; ?></td>
								<td><?php echo $sem->sem_description; ?></td>
								<td><?php  ?></td>
								<td>
									<a href="<?php echo site_url("dashboard/curriculums/settings/semesters/".$sem->getSemesterid()."/edit"); ?>" class=" btn btn-xs btn-success">
										<span class="glyphicon glyphicon-edit"  aria-hidden="true" ></span>
										Edit 
									</a> 
									<a href="<?php echo site_url("dashboard/curriculums/settings/semesters/".$sem->getSemesterid()."/delete"); ?>" class="btn btn-xs btn-danger"> 
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
								<td colspan="3"> No Semester Found. </td>
							</tr>

						<?php
					}
					?>
				
			</tbody>
		</table>
	</div>
	<a href="<?php echo site_url("dashboard/curriculums/settings/semesters/add"); ?>">
		<span class="glyphgicon glyphgicon-plus"></span> ADD
	</a>
