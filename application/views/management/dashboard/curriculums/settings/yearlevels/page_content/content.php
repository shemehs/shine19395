<?php
	$yearlevels = get_all_yearlevels(true);
?>
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Yearlevel Code</th>
					<th>Alias</th>
					<th>Description</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($yearlevels && is_array($yearlevels) && count($yearlevels) > 0){
						foreach($yearlevels as $yli => $yl){
							?>
							<tr>
								<td><?php echo $yl->yearlevel_code; ?></td>
								<td><?php echo $yl->yearlevel_alias; ?></td>
								<td><?php echo $yl->yearlevel_description; ?></td>
								<td><?php  ?></td>
								<td>
									<a href="<?php echo site_url("dashboard/curriculums/settings/yearlevels/".$yl->getYearlevelid()."/edit"); ?>" class=" btn btn-xs btn-success">
										<span class="glyphicon glyphicon-edit"  aria-hidden="true" ></span>
										Edit 
									</a> 
									<a href="<?php echo site_url("dashboard/curriculums/settings/yearlevels/".$yl->getYearlevelid()."/delete"); ?>" class="btn btn-xs btn-danger"> 
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
								<td colspan="3"> No Year level Found. </td>
							</tr>

						<?php
					}
					?>
				
			</tbody>
		</table>
	</div>
	<a href="<?php echo site_url("dashboard/curriculums/settings/yearlevels/add"); ?>">
		<span class="glyphgicon glyphgicon-plus"></span> ADD
	</a>