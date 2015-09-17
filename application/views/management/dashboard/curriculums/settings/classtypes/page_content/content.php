<?php
	$classtypes = get_all_class_types(true);
?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Class Type Code</th>
					<th>Alias</th>
					<th>Description</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($classtypes && is_array($classtypes) && count($classtypes) > 0){
						foreach($classtypes as $cti => $ct){
							?>
							<tr>
								<td><?php echo $ct->class_type_code; ?></td>
								<td><?php echo $ct->class_type_alias; ?></td>
								<td><?php echo $ct->class_type_description; ?></td>
								<td><?php  ?></td>
								<td>
									<a href="<?php echo site_url("dashboard/curriculums/settings/classtypes/".$ct->getClasstypeid()."/edit"); ?>" class=" btn btn-xs btn-success">
										<span class="glyphicon glyphicon-edit"  aria-hidden="true" ></span>
										Edit 
									</a> 
									<a href="<?php echo site_url("dashboard/curriculums/settings/classtypes/".$ct->getClasstypeid()."/delete"); ?>" class="btn btn-xs btn-danger"> 
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
								<td colspan="3"> No class type Found. </td>
							</tr>

						<?php
					}
					?>
				
			</tbody>
		</table>
	</div>
	<a href="<?php echo site_url("dashboard/curriculums/settings/classtypes/add"); ?>">
		<span class="glyphgicon glyphgicon-plus"></span> ADD
	</a>