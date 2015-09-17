<?php
	$types = get_all_curriculum_types();
?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Class Type</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($types && is_array($types) && count($types) > 0){
						foreach($types as $typei => $typeinfo){
							?>
							<tr>
								<td><?php echo $typeinfo->curriculum_type; ?></td>
								<td><?php  ?></td>
								<td>
									<a href="<?php echo site_url("dashboard/curriculums/settings/types/".$typeinfo->getCurriculumtypeid()."/edit"); ?>" class=" btn btn-xs btn-success">
										<span class="glyphicon glyphicon-edit"  aria-hidden="true" ></span>
										Edit 
									</a> 
									<a href="<?php echo site_url("dashboard/curriculums/settings/types/".$typeinfo->getCurriculumtypeid()."/delete"); ?>" class="btn btn-xs btn-danger"> 
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
								<td colspan="3"> No Curriculum type Found. </td>
							</tr>

						<?php
					}
					?>
				
			</tbody>
		</table>
	</div>
	<a href="<?php echo site_url("dashboard/curriculums/settings/types/add"); ?>">
		<span class="glyphgicon glyphgicon-plus"></span> ADD
	</a>