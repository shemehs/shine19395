<?php 
	$curriculuminfo = isset($curriculuminfo)?$curriculuminfo:false;
	$curiculum_yearlevels = ($curriculuminfo)?$curriculuminfo->getCurriculumyearlevels():false;
	$curiculum_semesters = ($curriculuminfo)?$curriculuminfo->getCurriculumsemesters():false;
?>
<div class = "row">
	<div class = "col-md-8">
		<div class="">
			<?php
				$form_attr = array("class"=>"form-inline  pull-left margin-left-5  margin-right-5 margin-top-5  margin-bottom-5");
				$form_action = current_url().((has_value("searchcurriculumsubjects"))?("?search=".get_value("searchcurriculumsubjects")).((has_value("searchcurriculumsubjectskey"))?("&searchkey=".get_value("searchcurriculumsubjectskey")):""):"");
				$Form_hidden = array(sha1("filtercurriculumsubjects") => random_string("alnum",5));
				echo form_open($form_action,$form_attr,$Form_hidden);
			?>
				<div class="form-group">
				    <label for="fSemesterinput"  class="sr-only">Filter</label>
					<select name="fcurriculumsubjectssemester" id="fSemesterinput"  class="form-control">
						<option> - Semester - </option>
						<?php 
							if($curiculum_semesters && is_array($curiculum_semesters) && count($curiculum_semesters)>0){
								foreach($curiculum_semesters as $csemi => $cseminfo){
									echo '<option value="'.$cseminfo->getSemesterid().'" '.((has_value("filtercurriculumsubjects") && has_value("fcurriculumsubjectssemester") && (get_value("fcurriculumsubjectssemester") == $cseminfo->getSemesterid()))?' selected = "selected" ':"").'>'.$cseminfo->sem_description.'</option>';
								}
							}
						?>
					</select>
				</div>

				<div class="form-group">
				    <label for="fYearlevelinput" class="sr-only">Search2</label>
					<select name="fcurriculumsubjectsyearlevel" id="fYearlevelinput"  class="form-control">
						<option>- Yearlevel -</option>
						<?php 
							if($curiculum_yearlevels && is_array($curiculum_yearlevels) && count($curiculum_yearlevels)>0){
								foreach($curiculum_yearlevels as $yli => $ylinfo){
									echo '<option value="'.$ylinfo->getYearlevelid().'" '.((has_value("filtercurriculumsubjects") && has_value("fcurriculumsubjectsyearlevel") && (get_value("fcurriculumsubjectsyearlevel") == $ylinfo->getYearlevelid()))?' selected = "selected" ':" ").'>'.$ylinfo->yearlevel_description.'</option>';
								}
							}
						?>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Filter</button>
				</div>
			</form>
			<?php
				$form_attr = array("class"=>"form-inline pull-left margin-left-5 margin-right-5  margin-top-5  margin-bottom-5");
				$form_action = current_url().(has_value("filtercurriculumsubjects")?("?filter=".get_value("filtercurriculumsubjects").(has_value("fcurriculumsubjectsyearlevel")?("&fyearlevel=".get_value("fcurriculumsubjectsyearlevel")):"").(has_value("fcurriculumsubjectssemester")?("&fsemester=".get_value("fcurriculumsubjectssemester")):"")):"");
				$Form_hidden = array(sha1("searchcurriculumsubjects")=>random_string("alnum",5));
				echo form_open($form_action,$form_attr,$Form_hidden);
			?>
			  	<div class="form-group">
			    	<label for="searchKeyinput" class="sr-only"> Search </label>
					<input type="Text" name="searchcurriculumsubjectskey" id="searchKeyinput" class="form-control" placeholder="Subject Code or description" value="<?php echo set_value("searchcurriculumsubjectskey",((has_value("searchcurriculumsubjects") && has_value("searchcurriculumsubjectskey"))?get_value("searchcurriculumsubjectskey"):"")); ?>" />
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">search</button>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-4">
		<div class="pull-right ">
			<ul class="nav nav-pills">
				<li>
					<a id="checkAllcurriculumsubjects" class=""  title="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/selectsall"); ?>">
					 	<span class="glyphicon glyphicon-check"></span> 
					</a>
				</li>
				<li>
					<a id="deleteCheckedcurriculumsubjects"  class=""  title="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/delete"); ?>">
					 	<span class="glyphicon glyphicon-trash"></span> 
					</a>
				</li>
				<li>
					<a class=""  title="" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/add"); ?>">
					 	<span class="glyphicon glyphicon-plus-sign"></span> 
					</a>
				</li>

				<li>
					<a class=""  title="Done" href="<?php echo site_url("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)); ?>">
					 	<span class="glyphicon glyphicon-thumbs-up"></span> 
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
	<?php
		$js_fscript = '
						function deleteAllcheckedcuriculumsubjects(){
							var customizeCurriculumsubjectsformobj = $("form#customizeCurriculumsubjectsform");
							if(customizeCurriculumsubjectsformobj){
								var actionInputobj = customizeCurriculumsubjectsformobj.find("input[name = '."'customizeCurriculumsubjectsaction'".']");
								if(actionInputobj){
									actionInputobj.val("deleteallselected");
									customizeCurriculumsubjectsformobj.submit();
								}
							}
						}
						

					';
		add_page_script("jscriptfunction",$js_fscript);
		$js_script = '
					$("a#checkAllcurriculumsubjects").on("click",function(){

						
						checkAll("curriclumSubject");
						return false;

					});
					$("a#deleteCheckedcurriculumsubjects").on("click",function(){

						
						if(countAllchecked("curriclumSubject") > 0){
							if(confirm("Are you sure to delete selected curriculum subjects?")){
								deleteAllcheckedcuriculumsubjects();
							}
						}else{
							alert("No Curriculum Subject Selected!");
						}
						return false;

					});
						
					';
		add_page_script("jautoscript",$js_script);

	?>