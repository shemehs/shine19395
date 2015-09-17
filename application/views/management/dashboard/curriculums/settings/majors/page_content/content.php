<div class="row">
	<div class="col-md-12">
		<?php 
			$majors = get_all_majors();

		 ?>
		 <div class="table-responsive">
			 <table class="table table-bordered table-hovered">
			 	<thead>
			 		<tr>
			 			<th>
			 				Major Code
			 			</th>
			 			<th>
			 				Description
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
			 			if($majors && is_array($majors) && count($majors)>0){
			 				foreach($majors as $majori => $majorinfo){
			 					?>
			 						<tr>
							 			<td>
							 				<?php echo $majorinfo->major_code; ?>
							 			</td>
							 			<td>
							 				<?php echo $majorinfo->major_description; ?>
							 			</td>
							 			<td><?php  ?></td>
										<td>
											<a href="<?php echo site_url("dashboard/curriculums/settings/majors/".$majorinfo->getMajorid()."/edit"); ?>" class=" btn btn-xs btn-success">
												<span class="glyphicon glyphicon-edit"  aria-hidden="true" ></span>
												Edit 
											</a> 
											<a href="<?php echo site_url("dashboard/curriculums/settings/majors/".$majorinfo->getMajorid()."/delete"); ?>" class="btn btn-xs btn-danger"> 
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
						 				No Majors Found.
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
				<a href="<?php echo site_url("dashboard/curriculums/settings/majors/add"); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> ADD</a>
			</div>
		</div>
	</div>
</div>