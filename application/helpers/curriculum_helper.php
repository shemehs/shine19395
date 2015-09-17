<?php if( ! defined('BASEPATH')) exit('No direct script access allowed.');

if(!function_exists("get_curriculum")){

	function get_curriculum($curriculumid = false){
		
		$curriculum = false;
		if($curriculumid && (int)$curriculumid>0){

			$CI =& get_instance();
			$CI->load->model("curriculum_model");
			$curriculuminfo = new Curriculum_Model();

			$query = $CI->db->select("*")->from($curriculuminfo->table_name)->where(array("curriculum_id"=>$curriculumid))->get();
			
			if($query && $query->num_rows()>0){
				
				$rw = $query->row();
				
				$curriculuminfo->setCurriculumid($rw->curriculum_id);
				$curriculuminfo->setCourseid($rw->course_id);
				$curriculuminfo->setMajorid($rw->major_id);
				$curriculuminfo->setCurriculumtypeid($rw->curriculum_type_id);
				$curriculuminfo->setDescription($rw->description);
				$curriculuminfo->setYear($rw->year);
				$curriculuminfo->setSchoolyearstart($rw->schoolyear_start);
				$curriculuminfo->setCreatedon($rw->created_on);
				$curriculuminfo->setLastupdate($rw->last_update);

				$curriculum = $curriculuminfo;
				
			}
		}
		return $curriculum;
	}
}
if(!function_exists("get_all_curriculums")){

	function get_all_curriculums(){
		
		$curriculums = false;
	

		$CI =& get_instance();
		$CI->load->model("curriculum_model");
		$curriculuminfo = new Curriculum_Model();

		$query = $CI->db->select("*")->from($curriculuminfo->table_name)->get();
		
		if($query && $query->num_rows()>0){
			$curriculums = array();
			foreach($query->result() as $rwi => $rw){

				$curriculuminfo = new Curriculum_Model();
				$curriculuminfo->setCurriculumid($rw->curriculum_id);
				$curriculuminfo->setCourseid($rw->course_id);
				$curriculuminfo->setMajorid($rw->major_id);
				$curriculuminfo->setCurriculumtypeid($rw->curriculum_type_id);
				$curriculuminfo->setDescription($rw->description);
				$curriculuminfo->setYear($rw->year);
				$curriculuminfo->setSchoolyearstart($rw->schoolyear_start);
				$curriculuminfo->setCreatedon($rw->created_on);
				$curriculuminfo->setLastupdate($rw->last_update);
				
				$curriculums[] = $curriculuminfo;
			}
		}
	
		return $curriculums;
	}
}

if(!function_exists("is_curriculum_exist")){

	function is_curriculum_exist($curriculumid = false){
		
		
		if($curriculumid && (int)$curriculumid>0){

			$CI =& get_instance();
			$CI->load->model("curriculum_model");
			$curriculuminfo = new Curriculum_Model();

			$query = $CI->db->select("*")->from($curriculuminfo->table_name)->where(array("curriculum_id"=>$curriculumid))->get();
			
			if($query && $query->num_rows()>0){
				return true;
			}
		}
		return false;
	}
}
if(!function_exists("get_course")){
	function get_course($course_id=false,$course_code=false){
		$CI =& get_instance();
		$CI->load->model("Course_Model");
		$course = false;
		$courseinfo = new Course_Model();
		if($course_id){
			$query = $CI->db->select("*")->from($courseinfo->table_name)->where(array("course_id"=>$course_id))->get();
		}else if($course_code){
			$query = $CI->db->select("*")->from($courseinfo->table_name)->where(array("course_code"=>$course_code))->get();
		}else{
			$query = false;
		}
		
		if($query && $query->num_rows() >0 ){

			$rw = $query->row();
			
			$courseinfo->setCourseid($rw->course_id);
			$courseinfo->setCoursecode($rw->course_code);
			$courseinfo->setCoursedescription($rw->course_description);
			$courseinfo->setCreatedon($rw->created_on);
			$courseinfo->setLastupdate($rw->last_update);

			$course = $courseinfo;

		}
		return $course;
	}
}
if(!function_exists("get_all_courses")){
	function get_all_courses(){
		$CI =& get_instance();
		$CI->load->model("Course_Model");
		$courses = false;
						
		$courseinfo = new Course_Model();
		$query = $CI->db->select("*")->from($courseinfo->table_name)->get();
		
		if($query && $query->num_rows() > 0 ){
			$courses = array();
			foreach($query->result() as $rwi => $rw){

				$courseinfo = new Course_Model();
				$courseinfo->setCourseid($rw->course_id);
				$courseinfo->setCoursecode($rw->course_code);
				$courseinfo->setCoursedescription($rw->course_description);
				$courseinfo->setCreatedon($rw->created_on);
				$courseinfo->setLastupdate($rw->last_update);

				$courses[] = $courseinfo;
			}
			
			

		}
		return $courses;
	}
}
if(!function_exists("get_major")){
	function get_major($major_id = false,$major_code=false){
		$CI =& get_instance();
		$CI->load->model("Major_Model");
		$major = false;
		$majorinfo = new Major_Model();
		if($major_id){
			$query = $CI->db->select("*")->from($majorinfo->table_name)->where(array("major_id"=>$major_id))->get();
		}else if($major_code){
			$query = $CI->db->select("*")->from($majorinfo->table_name)->where(array("major_code"=>$major_code))->get();
		}else{
			$query = false;
		}
		
		if($query && $query->num_rows() >0 ){

			$rw = $query->row();
			
			$majorinfo->setMajorid($rw->major_id);
			$majorinfo->setMajorcode($rw->major_code);
			$majorinfo->setMajordescription($rw->major_description);
			$majorinfo->setCreatedon($rw->created_on);
			$majorinfo->setLastupdate($rw->last_update);

			$major = $majorinfo;

		}
		return $major;
	}
}
if(!function_exists("get_all_majors")){
	function get_all_majors(){

		$CI =& get_instance();
		$CI->load->model("Major_Model");
		$majors = false;
						
		$majorinfo = new Major_Model();
		$query = $CI->db->select("*")->from($majorinfo->table_name)->get();
		
		if($query && $query->num_rows() > 0 ){
			$majors = array();
			foreach($query->result() as $rwi => $rw){

				$majorinfo = new Major_Model();
				$majorinfo->setMajorid($rw->major_id);
				$majorinfo->setMajorcode($rw->major_code);
				$majorinfo->setMajordescription($rw->major_description);
				$majorinfo->setCreatedon($rw->created_on);
				$majorinfo->setLastupdate($rw->last_update);

				$majors[] = $majorinfo;
			}
		}
		return $majors;
	}
}
if(!function_exists("get_semester")){
	function get_semester($sem_id = false,$sem_code=false){
		$CI =& get_instance();
		$CI->load->model("Semester_Model");
		$semester = false;
		$semesterinfo = new Semester_Model();
		if($sem_id){
			$query = $CI->db->select("*")->from($semesterinfo->table_name)->where(array("sem_id"=>$sem_id))->get();
		}else if($sem_code){
			$query = $CI->db->select("*")->from($semesterinfo->table_name)->where(array("sem_code"=>$sem_code))->get();
		}else{
			$query = false;
		}
		
		if($query && $query->num_rows() >0 ){

			$rw = $query->row();
			
			$semesterinfo->setSemesterid($rw->sem_id);
			$semesterinfo->setSemestercode($rw->sem_code);
			$semesterinfo->setSemesteralias($rw->sem_alias);
			$semesterinfo->setSemesterdescription($rw->sem_description);
			$semesterinfo->setCreatedon($rw->created_on);
			$semesterinfo->setLastupdate($rw->last_update);

			$semester = $semesterinfo;

		}
		return $semester;
	}
}
if(!function_exists("get_all_semesters")){
	function get_all_semesters(){
		$CI =& get_instance();
		$CI->load->model("Semester_Model");
		$semesters = false;
		$semesterinfo = new Semester_Model();
		
		$query = $CI->db->select("*")->from($semesterinfo->table_name)->get();
		if($query && $query->num_rows() >0 ){
			$semesters = array();
			foreach($query->result() as $rwi => $rw){

				$semesterinfo = new Semester_Model();
				$semesterinfo->setSemesterid($rw->sem_id);
				$semesterinfo->setSemestercode($rw->sem_code);
				$semesterinfo->setSemesteralias($rw->sem_alias);
				$semesterinfo->setSemesterdescription($rw->sem_description);
				$semesterinfo->setCreatedon($rw->created_on);
				$semesterinfo->setLastupdate($rw->last_update);

				$semesters[] = $semesterinfo;
			}
		}
		return $semesters;
	}
}
if(!function_exists("get_yearlevel")){
	function get_yearlevel($yearlevel_id = false,$yearlevel_code=false){
		$CI =& get_instance();
		$CI->load->model("YearLevel_Model");
		$yearlevel = false;
		$yearlevelinfo = new YearLevel_Model();
		if($yearlevel_id){
			$query = $CI->db->select("*")->from($yearlevelinfo->table_name)->where(array("yearlevel_id"=>$yearlevel_id))->get();
		}else if($yearlevel_code){
			$query = $CI->db->select("*")->from($yearlevelinfo->table_name)->where(array("yearlevel_code"=>$yearlevel_code))->get();
		}else{
			$query = false;
		}
		
		if($query && $query->num_rows() >0 ){

			$rw = $query->row();
			
			$yearlevelinfo->setYearlevelid($rw->yearlevel_id);
			$yearlevelinfo->setYearlevelsequence($rw->yearlevel_sequence);
			$yearlevelinfo->setYearlevelcode($rw->yearlevel_code);
			$yearlevelinfo->setYearlevelalias($rw->yearlevel_alias);
			$yearlevelinfo->setYearleveldescription($rw->yearlevel_description);
			$yearlevelinfo->setCreatedon($rw->created_on);
			$yearlevelinfo->setLastupdate($rw->last_update);

			$yearlevel = $yearlevelinfo;

		}
		return $yearlevel;
	}
}
if(!function_exists("get_all_yearlevels")){
	function get_all_yearlevels($order = false){
		$CI =& get_instance();
		$CI->load->model("YearLevel_Model");
		$yearlevels = false;
		$yearlevelinfo = new YearLevel_Model();
		if($order){
			$query = $CI->db->select("*")->from($yearlevelinfo->table_name)->order_by("yearlevel_sequence","asc")->get();
		}else{
			$query = $CI->db->select("*")->from($yearlevelinfo->table_name)->get();
		}
		
		
		if($query && $query->num_rows() >0 ){
			$yearlevels = array();
			foreach($query->result() as $rwi => $rw){

				$yearlevelinfo = new YearLevel_Model();	
				$yearlevelinfo->setYearlevelid($rw->yearlevel_id);
				$yearlevelinfo->setYearlevelsequence($rw->yearlevel_sequence);
				$yearlevelinfo->setYearlevelcode($rw->yearlevel_code);
				$yearlevelinfo->setYearlevelalias($rw->yearlevel_alias);
				$yearlevelinfo->setYearleveldescription($rw->yearlevel_description);
				$yearlevelinfo->setCreatedon($rw->created_on);
				$yearlevelinfo->setLastupdate($rw->last_update);
	
				$yearlevels[] = $yearlevelinfo;
			}

		}
		return $yearlevels;
	}
}
if(!function_exists("get_subject")){
	function get_subject($subject_id = false,$subject_code=false){
		$CI =& get_instance();
		$CI->load->model("Subject_Model");
		$subject = false;
		$subjectinfo = new Subject_Model();
		if($subject_id){
			$query = $CI->db->select("*")->from($subjectinfo->table_name)->where(array("subject_id"=>$subject_id))->get();
		}else if($subject_code){
			$query = $CI->db->select("*")->from($subjectinfo->table_name)->where(array("subject_code"=>$subject_code))->get();
		}else{
			$query = false;
		}
		if($query && $query->num_rows() >0 ){

			$rw = $query->row();
			
			$subjectinfo->setSubjectid($rw->subject_id);
			$subjectinfo->setSubjectcode($rw->subject_code);
			$subjectinfo->setSubjectdescription($rw->subject_description);
			$subjectinfo->setCreatedon($rw->created_on);
			$subjectinfo->setLastupdate($rw->last_update);

			$subject = $subjectinfo;
		}
		return $subject;
	}
}

if(!function_exists("get_all_subjects")){
	function get_all_subjects(){
		$CI =& get_instance();
		$CI->load->model("Subject_Model");
		$subjects = false;
		$subjectinfo = new Subject_Model();
		
		$query = $CI->db->select("*")->from($subjectinfo->table_name)->get();
		
		if($query && $query->num_rows() >0 ){
			$subjects = array();
			foreach($query->result() as $rwi => $rw){

				$subjectinfo = new Subject_Model();
				$subjectinfo->setSubjectid($rw->subject_id);
				$subjectinfo->setSubjectcode($rw->subject_code);
				$subjectinfo->setSubjectdescription($rw->subject_description);
				$subjectinfo->setCreatedon($rw->created_on);
				$subjectinfo->setLastupdate($rw->last_update);

				$subjects[] = $subjectinfo;
			}
			
		}
		return $subjects;
	}
}
if(!function_exists("get_class_type")){
	function get_class_type($class_type_id=false,$class_type_code=false){
		$CI =& get_instance();
		$CI->load->model("Class_Type_Model");
		$class_type = false;
		$classtypeinfo = new Class_Type_Model();
		if($class_type_id){
			$query = $CI->db->select("*")->from($classtypeinfo->table_name)->where(array("class_type_id"=>$class_type_id))->get();
		}else if($class_type_code){
			$query = $CI->db->select("*")->from($classtypeinfo->table_name)->where(array("class_type_code"=>$class_type_code))->get();
		}else{
			$query = false;
		}
		if($query && $query->num_rows() >0 ){

			$rw = $query->row();
			
			$classtypeinfo->setClasstypeid($rw->class_type_id);
			$classtypeinfo->setClasstypecode($rw->class_type_code);
			$classtypeinfo->setClasstypealias($rw->class_type_alias);
			$classtypeinfo->setClasstypedescription($rw->class_type_description);
			$classtypeinfo->setCreatedon($rw->created_on);
			$classtypeinfo->setLastupdate($rw->last_update);

			$class_type = $classtypeinfo;
		}
		return $class_type;
	}
}

if(!function_exists("get_a_class_type")){
	function get_a_class_type($first=false,$last=false,$random=true){
		$CI =& get_instance();
		$CI->load->model("Class_Type_Model");
		$class_type = false;
		$classtypeinfo = new Class_Type_Model();
		$query = false;
		if($first){
			$min_class_type_id = $CI->db->select_min("class_type_id","min_class_type_id")->from($classtypeinfo->table_name)->get();
			if($min_class_type_id && $min_class_type_id->num_rows()>0){
				$query = $CI->db->select("*")->from($classtypeinfo->table_name)->where(array("class_type_id"=>$min_class_type_id->row()->min_class_type_id))->get();
			}
		}else if($last){
			$max_class_type_id = $CI->db->select_max("class_type_id","max_class_type_id")->from($classtypeinfo->table_name)->get();
			if($max_class_type_id && $max_class_type_id->num_rows()>0){
				$query = $CI->db->select("*")->from($classtypeinfo->table_name)->where(array("class_type_id"=>$max_class_type_id->row()->max_class_type_id))->get();
			}
		}else{
			$min_class_type_id = $CI->db->select_min("class_type_id","min_class_type_id")->from($classtypeinfo->table_name)->get();
			$max_class_type_id = $CI->db->select_max("class_type_id","max_class_type_id")->from($classtypeinfo->table_name)->get();
			$random_class_type_id = ($min_class_type_id && $min_class_type_id->num_rows()>0 && $max_class_type_id && $max_class_type_id->num_rows()>0)?rand($min_class_type_id->row()->min_class_type_id,$max_class_type_id->row()->max_class_type_id):false;
			if($random_class_type_id && (int)$random_class_type_id > 0){
				$query = $CI->db->select("*")->from($classtypeinfo->table_name)->where(array("class_type_id"=>$random_class_type_id))->get();
			}
		}
		if($query && $query->num_rows() >0 ){

			$rw = $query->row();
			
			$classtypeinfo->setClasstypeid($rw->class_type_id);
			$classtypeinfo->setClasstypecode($rw->class_type_code);
			$classtypeinfo->setClasstypealias($rw->class_type_alias);
			$classtypeinfo->setClasstypedescription($rw->class_type_description);
			$classtypeinfo->setCreatedon($rw->created_on);
			$classtypeinfo->setLastupdate($rw->last_update);

			$class_type = $classtypeinfo;
		}
		return $class_type;
	}
}
if(!function_exists("get_all_class_types")){
	function get_all_class_types(){
		$CI =& get_instance();
		$CI->load->model("Class_Type_Model");
		$class_types = false;
		$classtypeinfo = new Class_Type_Model();
		$query = $CI->db->select("*")->from($classtypeinfo->table_name)->get();
		if($query && $query->num_rows() >0 ){
			$class_types = array();
			foreach($query->result() as $rwi => $rw){
						$classtypeinfo = new Class_Type_Model();
						$classtypeinfo->setClasstypeid($rw->class_type_id);
						$classtypeinfo->setClasstypecode($rw->class_type_code);
						$classtypeinfo->setClasstypealias($rw->class_type_alias);
						$classtypeinfo->setClasstypedescription($rw->class_type_description);
						$classtypeinfo->setCreatedon($rw->created_on);
						$classtypeinfo->setLastupdate($rw->last_update);
			
						$class_types[] = $classtypeinfo;
					}
		}
		return $class_types;
	}
}
if(!function_exists("get_curriculum_type")){
	function get_curriculum_type($curriculum_type_id=false,$curriculum_type=false){
		$CI =& get_instance();
		$CI->load->model("Curriculum_Type_Model");
		$curriculum_type = false;
		$curriculumtypeinfo = new Curriculum_Type_Model();
		if($curriculum_type_id){
			$query = $CI->db->select("*")->from($curriculumtypeinfo->table_name)->where(array("curriculum_type_id"=>$curriculum_type_id))->get();
		}else if($curriculum_type){
			$query = $CI->db->select("*")->from($curriculumtypeinfo->table_name)->where(array("curriculum_type"=>$curriculum_type))->get();
		}else{
			$query = false;
		}
		if($query && $query->num_rows() >0 ){

			$rw = $query->row();
			
			$curriculumtypeinfo->setCurriculumtypeid($rw->curriculum_type_id);
			$curriculumtypeinfo->setCurriculumtype($rw->curriculum_type);
			$curriculumtypeinfo->setCreatedon($rw->created_on);
			$curriculumtypeinfo->setLastupdate($rw->last_update);

			$curriculum_type = $curriculumtypeinfo;
		}
		return $curriculum_type;
	}
}
if(!function_exists("get_all_curriculum_types")){
	function get_all_curriculum_types(){
		$CI =& get_instance();
		$CI->load->model("Curriculum_Type_Model");
		$curriculum_types = false;
		$curriculumtypeinfo = new Curriculum_Type_Model();
		$query = $CI->db->select("*")->from($curriculumtypeinfo->table_name)->get();
		if($query && $query->num_rows() >0 ){
			$curriculum_types = array();
			foreach($query->result() as $rwi => $rw){
						$curriculumtypeinfo = new Curriculum_Type_Model();
						$curriculumtypeinfo->setCurriculumtypeid($rw->curriculum_type_id);
						$curriculumtypeinfo->setCurriculumtype($rw->curriculum_type);
						$curriculumtypeinfo->setCreatedon($rw->created_on);
						$curriculumtypeinfo->setLastupdate($rw->last_update);

						$curriculum_types[] = $curriculumtypeinfo;
					}
		}
		return $curriculum_types;
	}
}
if(!function_exists("get_curriculum_subject")){
	function get_curriculum_subject($curriculum_subject_id=false){
		$curriculum_subject = false;
		if($curriculum_subject_id){
				$CI =& get_instance();
				$CI->load->model("Curriculum_Subject_Model");
				
				$curriculumsubjectinfo = new Curriculum_Subject_Model();
				
				$query = $CI->db->select("*")->from($curriculumsubjectinfo->table_name)->where(array("curriculum_subject_id"=>$curriculum_subject_id))->get();
		
				if($query && $query->num_rows() >0 ){
		
					$rw = $query->row();
					
					$curriculumsubjectinfo->setCurriculumsubjectid($rw->curriculum_subject_id);
					$curriculumsubjectinfo->setCurriculumid($rw->curriculum_id);
					$curriculumsubjectinfo->setSubjectid($rw->subject_id);
					$curriculumsubjectinfo->setYearlevelid($rw->yearlevel_id);
					$curriculumsubjectinfo->setSemid($rw->sem_id);
					$curriculumsubjectinfo->setUnit($rw->unit);
					
					$curriculumsubjectinfo->setCreatedon($rw->created_on);
					$curriculumsubjectinfo->setLastupdate($rw->last_update);
		
					$curriculum_subject = $curriculumsubjectinfo;
				}
			}
		return $curriculum_subject;
	}
}
if(!function_exists("get_curriculum_subjects")){
	function get_curriculum_subjects($curriculum_id=false, $sem_id=false, $yearlevel_id=false){
			
			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Model");
			$curriculum_subjects = false;
			$curriculumsubjectinfo = new Curriculum_Subject_Model();
			$query = false;

			if($curriculum_id){
				$where = array("curriculum_id"=>$curriculum_id);

				if($sem_id){

					$where["sem_id"] = $sem_id;
				}

				if($yearlevel_id){
					
					$where["yearlevel_id"] = $yearlevel_id;
				}

				$query = $CI->db->select("*")->from($curriculumsubjectinfo->table_name)->where($where)->get();
	
			}
			
			if($query && $query->num_rows() >0 ){
				$curriculum_subjects  = array();

				foreach($query->result() as $rwi => $rw){
									
					$curriculumsubjectinfo = new Curriculum_Subject_Model();
					$curriculumsubjectinfo->setCurriculumsubjectid($rw->curriculum_subject_id);
					$curriculumsubjectinfo->setCurriculumid($rw->curriculum_id);
					$curriculumsubjectinfo->setSubjectid($rw->subject_id);
					$curriculumsubjectinfo->setYearlevelid($rw->yearlevel_id);
					$curriculumsubjectinfo->setSemid($rw->sem_id);
					$curriculumsubjectinfo->setUnit($rw->unit);
					
					$curriculumsubjectinfo->setCreatedon($rw->created_on);
					$curriculumsubjectinfo->setLastupdate($rw->last_update);
		
					$curriculum_subjects[] = $curriculumsubjectinfo;
				}
			}
	
		return $curriculum_subjects;
	}
}
if(!function_exists("has_curriculum_subjects")){
	function has_curriculum_subjects($curriculum_id=false, $sem_id=false, $yearlevel_id=false){
			
			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Model");
			$curriculum_subjects = false;
			$curriculumsubjectinfo = new Curriculum_Subject_Model();
			$query = false;

			if($curriculum_id){
				$where = array("curriculum_id"=>$curriculum_id);

				if($sem_id){
					$where["sem_id"] = $sem_id;
				}

				if($yearlevel_id){
					
					$where["yearlevel_id"] = $yearlevel_id;
				}

				$query = $CI->db->select("*")->from($curriculumsubjectinfo->table_name)->where($where)->get();
	
			}
			
			if($query && $query->num_rows() >0 ){
				$curriculum_subjects  = true;
			}
	
		return $curriculum_subjects;
	}
}

if(!function_exists("has_curriculum_subject")){
	function has_curriculum_subject($curriculum_id=false, $curriculum_subject_id=false){
			
			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Model");
			$curriculum_subjects = false;
			$curriculumsubjectinfo = new Curriculum_Subject_Model();
			$query = false;

			if($curriculum_id && $curriculum_subject_id){
				$where = array("curriculum_id"=>$curriculum_id);

				
				$where["curriculum_subject_id"] = $curriculum_subject_id;
				
				$query = $CI->db->select("*")->from($curriculumsubjectinfo->table_name)->where($where)->get();
	
			}
			
			if($query && $query->num_rows() >0 ){
				$curriculum_subjects  = true;
			}
	
		return $curriculum_subjects;
	}
}
if(!function_exists("search_curriculum_subjects")){
	function search_curriculum_subjects($curriculum_id=false, $sem_id=false, $yearlevel_id=false,$searchkey){
			
			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Model");
			$curriculum_subjects  = array();


			$curriculumsubjectinfo = new Curriculum_Subject_Model();
			$subjectinfo = new Subject_Model();
			$query = false;
			
			if($searchkey && $curriculum_id){
				$where = array($curriculumsubjectinfo->table_name.".curriculum_id"=>$curriculum_id);
				$like_array = array(
						array($subjectinfo->table_name.".subject_code"=>$searchkey),
						array($subjectinfo->table_name.".subject_description"=>$searchkey)
						);
				if($sem_id){
					
					$where[$curriculumsubjectinfo->table_name.".sem_id"] = $sem_id;
				}
				
				if($yearlevel_id){
					
					$where[$curriculumsubjectinfo->table_name.".yearlevel_id"] = $yearlevel_id;
				}
				$found_already = array();
				foreach($like_array as $likei => $like){
					$query = $CI->db->select("*")->from($curriculumsubjectinfo->table_name)->where($where)->like($like)->join($subjectinfo->table_name,$subjectinfo->table_name.".subject_id = ".$curriculumsubjectinfo->table_name.".subject_id")->get();
					if($query && $query->num_rows() >0 ){
						foreach($query->result() as $rwi => $rw){
							if(!isset($found_already[$rw->curriculum_subject_id])){	
								$found_already[$rw->curriculum_subject_id] = true;		
								$curriculumsubjectinfo = new Curriculum_Subject_Model();
								$curriculumsubjectinfo->setCurriculumsubjectid($rw->curriculum_subject_id);
								$curriculumsubjectinfo->setCurriculumid($rw->curriculum_id);
								$curriculumsubjectinfo->setSubjectid($rw->subject_id);
								$curriculumsubjectinfo->setYearlevelid($rw->yearlevel_id);
								$curriculumsubjectinfo->setSemid($rw->sem_id);
								$curriculumsubjectinfo->setUnit($rw->unit);
								
								$curriculumsubjectinfo->setCreatedon($rw->created_on);
								$curriculumsubjectinfo->setLastupdate($rw->last_update);
					
								$curriculum_subjects[] = $curriculumsubjectinfo;
							}
						}
					}
				}
				
	
			}
			
			
	
		return $curriculum_subjects;
	}
}
if(!function_exists("get_curriculum_yearlevels")){
	function get_curriculum_yearlevels($curriculum_id=false,$sem_id=false){
		
			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Model");
			$curriculum_yearlevels = false;
			$curriculumsubjectinfo = new Curriculum_Subject_Model();
			$query = false;

			if($curriculum_id){
				$where = array("curriculum_id"=>$curriculum_id);
				if($sem_id){
					$where["sem_id"] = $sem_id;
				}
				$query = $CI->db->select("yearlevel_id")->from($curriculumsubjectinfo->table_name)->where($where)->group_by("yearlevel_id")->get();
	
			}
			
			if($query && $query->num_rows() >0 ){
				$curriculum_yearlevels  = array();

				foreach($query->result() as $rwi => $rw){
		
					$curriculum_yearlevels[] = get_yearlevel($rw->yearlevel_id);
				}
			}
	
		return $curriculum_yearlevels;
	}
}
if(!function_exists("get_curriculum_semesters")){
	function get_curriculum_semesters($curriculum_id=false,$yearlevel_id=false){
		
			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Model");
			$curriculum_semesters = false;
			$curriculumsubjectinfo = new Curriculum_Subject_Model();
			$query = false;

			if($curriculum_id){
				$where = array("curriculum_id"=>$curriculum_id);
				if($yearlevel_id){
					$where["yearlevel_id"] = $yearlevel_id;
				}
				$query = $CI->db->select("sem_id")->from($curriculumsubjectinfo->table_name)->where($where)->group_by("sem_id")->get();
	
			}
			
			if($query && $query->num_rows() >0 ){
				$curriculum_semesters  = array();

				foreach($query->result() as $rwi => $rw){
					$curriculum_semesters[] = get_semester($rw->sem_id);
				}
			}
	
		return $curriculum_semesters;
	}
}
if(!function_exists("get_curriculum_subject_type")){
	function get_curriculum_subject_type($curriculum_subject_type_id=false,$curriculum_subject_id=false,$class_type_id=false){
		$curriculum_subject_type = false;

		

			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Type_Model");
			
			$curriculumsubjecttypeinfo = new Curriculum_Subject_Type_Model();
			$where = false;
			if($curriculum_subject_type_id){
				$where = array("curriculum_subject_type_id"=>$curriculum_subject_type_id);
			}else{
				if($curriculum_subject_id && $class_type_id){
					$where = array(
							"curriculum_subject_id"=>$curriculum_subject_id,
							"class_type_id" => $class_type_id
							);
				}
			}
			$query = false;
			if($where){
				$query = $CI->db->select("*")->from($curriculumsubjecttypeinfo->table_name)->where($where)->get();
			}
			if($query && $query->num_rows() >0 ){
	
				$rw = $query->row();
				
				$curriculumsubjecttypeinfo->setCurriculumsubjecttypeid($rw->curriculum_subject_type_id);
				$curriculumsubjecttypeinfo->setCurriculumsubjectid($rw->curriculum_subject_id);
				$curriculumsubjecttypeinfo->setClasstypeid($rw->class_type_id);
				$curriculumsubjecttypeinfo->setUnit($rw->unit);
				
				$curriculumsubjecttypeinfo->setCreatedon($rw->created_on);
				$curriculumsubjecttypeinfo->setLastupdate($rw->last_update);
	
				$curriculum_subject_type = $curriculumsubjecttypeinfo;
			}
		
		return $curriculum_subject_type;
	}
}

if(!function_exists("has_curriculum_subject_type")){
	function has_curriculum_subject_type($curriculum_subject_type_id=false,$curriculum_subject_id=false,$class_type_id=false){
		$curriculum_subject_type = false;
		
			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Type_Model");
			
			$curriculumsubjecttypeinfo = new Curriculum_Subject_Type_Model();
			$where = false;
			if($curriculum_subject_type_id){
				$where = array("curriculum_subject_type_id"=>$curriculum_subject_type_id);
			}else{
				if($curriculum_subject_id && $class_type_id){
					$where = array(
							"curriculum_subject_id"=>$curriculum_subject_id,
							"class_type_id" => $class_type_id
							);
				}
			}
			$query = false;
			if($where){
				$query = $CI->db->select("*")->from($curriculumsubjecttypeinfo->table_name)->where($where)->get();
			}
			if($query && $query->num_rows() >0 ){
				$curriculum_subject_type =  true;
			}
		
		return $curriculum_subject_type;
	}
}
if(!function_exists("get_curriculum_subject_types")){
	function get_curriculum_subject_types($curriculum_subject_id=false){
		$curriculum_subject_types = false;
		if($curriculum_subject_id){
			$CI =& get_instance();
			$CI->load->model("Curriculum_Subject_Type_Model");
			
			$curriculumsubjecttypeinfo = new Curriculum_Subject_Type_Model();
			
			$query = $CI->db->select("*")->from($curriculumsubjecttypeinfo->table_name)->where(array("curriculum_subject_id"=>$curriculum_subject_id))->get();
	
			if($query && $query->num_rows() >0 ){
	
				$curriculum_subject_types = array();
				foreach($query->result() as $rwi => $rw){
					$curriculumsubjecttypeinfo = new Curriculum_Subject_Type_Model();
					$curriculumsubjecttypeinfo->setCurriculumsubjecttypeid($rw->curriculum_subject_type_id);
					$curriculumsubjecttypeinfo->setCurriculumsubjectid($rw->curriculum_subject_id);
					$curriculumsubjecttypeinfo->setClasstypeid($rw->class_type_id);
					$curriculumsubjecttypeinfo->setUnit($rw->unit);
					
					$curriculumsubjecttypeinfo->setCreatedon($rw->created_on);
					$curriculumsubjecttypeinfo->setLastupdate($rw->last_update);
		
					$curriculum_subject_types[] = $curriculumsubjecttypeinfo;
				}
			}
		}
		return $curriculum_subject_types;
	}
}
if(!function_exists("is_course_exist")){
	function is_course_exist($course_id=false,$course_code=false,$exceptself=false){
		$CI =& get_instance();
		$CI->load->model("Course_Model");
		$course = false;
		$courseinfo = new Course_Model();
		if($exceptself){
			if($course_id && $course_code){
				$query = $CI->db->select("*")->from($courseinfo->table_name)->where(array("course_id != "=>$course_id,"course_code"=>$course_code))->get();
			}else{
				$query = false;
			}
		}else{
			if($course_id){
				$query = $CI->db->select("*")->from($courseinfo->table_name)->where(array("course_id"=>$course_id))->get();
			}else if($course_code){
				$query = $CI->db->select("*")->from($courseinfo->table_name)->where(array("course_code"=>$course_code))->get();
			}else{
				$query = false;
			}
		}
		
		
		if($query && $query->num_rows() > 0 ){
			$course = $query->row()->course_id;
		}
		return $course;
	}
}
if(!function_exists("is_major_exist")){
	function is_major_exist($major_id=false,$major_code=false,$exceptself=false){
		$CI =& get_instance();
		$CI->load->model("Major_Model");
		$major = false;
		$majorinfo = new Major_Model();
		if($exceptself){
			if($major_id && $major_code){
				$query = $CI->db->select("*")->from($majorinfo->table_name)->where(array("major_id != "=>$major_id,"major_code"=>$major_code))->get();
			}else{
				$query = false;
			}
		}else{
			if($major_id){
				$query = $CI->db->select("*")->from($majorinfo->table_name)->where(array("major_id"=>$major_id))->get();
			}else if($major_code){
				$query = $CI->db->select("*")->from($majorinfo->table_name)->where(array("major_code"=>$major_code))->get();
			}else{
				$query = false;
			}
		}
		
		
		if($query && $query->num_rows() >0 ){
			$major = $query->row()->major_id;
		}
		return $major;
	}
}
if(!function_exists("is_yearlevel_exist")){
	function is_yearlevel_exist($yearlevel_id=false,$yearlevel_code=false , $exceptself=false){
		$CI =& get_instance();
		$CI->load->model("Yearlevel_Model");
		$yearlevel = false;
		$yearlevelinfo = new Yearlevel_Model();
		if($exceptself){
			if($yearlevel_id && $yearlevel_code){
				$query = $CI->db->select("*")->from($yearlevelinfo->table_name)->where(array("yearlevel_id != "=>$yearlevel_id,"yearlevel_code"=>$yearlevel_code))->get();
			}else{
				$query = false;
			}
		}else{
			if($yearlevel_id){
				$query = $CI->db->select("*")->from($yearlevelinfo->table_name)->where(array("yearlevel_id"=>$yearlevel_id))->get();
			}else if($yearlevel_code){
				$query = $CI->db->select("*")->from($yearlevelinfo->table_name)->where(array("yearlevel_code"=>$yearlevel_code))->get();
			}else{
				$query = false;
			}
		}
		
		
		if($query && $query->num_rows() >0 ){
			$yearlevel = $query->row()->yearlevel_id;
		}
		return $yearlevel;
	}
}
if(!function_exists("is_semester_exist")){
	function is_semester_exist($semester_id=false,$semester_code=false,$exceptself=false){
		$CI =& get_instance();
		$CI->load->model("Semester_Model");
		$semester = false;
		$semesterinfo = new Semester_Model();
		if($exceptself){
			if($semester_id && $semester_code){
				$query = $CI->db->select("*")->from($semesterinfo->table_name)->where(array("sem_id != "=>$semester_id,"sem_code"=>$semester_code))->get();
			}else{
				$query = false;
			}
		}else{
			if($semester_id){
				$query = $CI->db->select("*")->from($semesterinfo->table_name)->where(array("sem_id"=>$semester_id))->get();
			}else if($semester_code){
				$query = $CI->db->select("*")->from($semesterinfo->table_name)->where(array("sem_code"=>$semester_code))->get();
			}else{
				$query = false;
			}
		}
		
		
		if($query && $query->num_rows() >0 ){
			$semester = $query->row()->sem_id;
		}
		return $semester;
	}
}
if(!function_exists("is_subject_exist")){
	function is_subject_exist($subject_id=false,$subject_code=false,$exceptself=false){
		$CI =& get_instance();
		$CI->load->model("Subject_Model");
		$subject = false;
		$subjectinfo = new Subject_Model();
		if($exceptself){
			if($subject_id && $subject_code){
				$query = $CI->db->select("*")->from($subjectinfo->table_name)->where(array("subject_id != "=>$subject_id,"subject_code"=>$subject_code))->get();
			}else{
				$query = false;
			}
		}else{
			if($subject_id){
				$query = $CI->db->select("*")->from($subjectinfo->table_name)->where(array("subject_id"=>$subject_id))->get();
			}else if($subject_code){
				$query = $CI->db->select("*")->from($subjectinfo->table_name)->where(array("subject_code"=>$subject_code))->get();
			}else{
				$query = false;
			}
		}
		
		
		if($query && $query->num_rows() >0 ){
			$subject = $query->row()->subject_id;
		}
		return $subject;
	}
}
if(!function_exists("is_curriculum_subject_exist")){
	function is_curriculum_subject_exist($curriculum_subject_id=false,$curriculum_id=false,$subject_id=false,$exceptself=false){
		
		$CI =& get_instance();
		$CI->load->model("Curriculum_Subject_Model");
		$curriculumsubject = false;
		$curriculumsubjectinfo = new Curriculum_Subject_Model();
		if($exceptself){
			if($curriculum_subject_id && $curriculum_id && $subject_id){

					$where = array(
						"curriculum_subject_id != " => $curriculum_subject_id,
						"curriculum_id"=>$curriculum_id,
						"subject_id"=>$subject_id,
						);
				$query = $CI->db->select("*")->from($curriculumsubjectinfo->table_name)->where($where)->get();
			}else{
				$query = false;
			}
		}else{
			if($curriculum_subject_id){
				$query = $CI->db->select("*")->from($curriculumsubjectinfo->table_name)->where(array("curriculum_subject_id"=>$curriculum_subject_id))->get();
			}else if($curriculum_id&&$subject_id){
					$where = array(
						"curriculum_id"=>$curriculum_id,
						"subject_id"=>$subject_id,
						);
				$query = $CI->db->select("*")->from($curriculumsubjectinfo->table_name)->where($where)->get();
			}else{
				$query = false;
			}
		}
		
		
		if($query && $query->num_rows() > 0 ){
		
			$curriculumsubject = $query->row()->curriculum_subject_id;
		}
		return $curriculumsubject;
		
	}
}
if(!function_exists("is_curriculum_type_exist")){
	function is_curriculum_type_exist($curriculum_type_id=false,$curriculum_type=false,$exceptself = false){
		$CI =& get_instance();
		$CI->load->model("Curriculum_Type_Model");
		$curriculumtype = false;
		$curriculumtypeinfo = new Curriculum_Type_Model();
		if($exceptself){
			if($curriculum_type_id && $curriculum_type){
				$where = array(
								"curriculum_type_id != "=>$curriculum_type_id,
								"curriculum_type"=>$curriculum_type
							);
				$query = $CI->db->select("*")->from($curriculumtypeinfo->table_name)->where($where)->get();
			}else{
				$query = false;
			}
		}else{
			if($curriculum_type_id){
				$query = $CI->db->select("*")->from($curriculumtypeinfo->table_name)->where(array("curriculum_type_id"=>$curriculum_type_id))->get();
			}else if($curriculum_type){
				$query = $CI->db->select("*")->from($curriculumtypeinfo->table_name)->where(array("curriculum_type"=>$curriculum_type))->get();
			}else{
				$query = false;
			}
		}
		
		if($query && $query->num_rows() > 0 ){
			$curriculumtype = true;
		}
		return $curriculumtype;
	}
}

if(!function_exists("is_class_type_exist")){
	function is_class_type_exist($class_type_id=false,$class_type_code=false,$exceptself = false){
		$CI =& get_instance();
		$CI->load->model("Class_Type_Model");
		$class_type = false;
		$classtypeinfo = new Class_Type_Model();
		if($exceptself){
			if($class_type_id && $class_type_code){
				$where = array(
								"class_type_id != "=>$class_type_id,
								"class_type_code"=>$class_type_code
							);
				$query = $CI->db->select("*")->from($classtypeinfo->table_name)->where($where)->get();
			}else{
				$query = false;
			}
		}else{
			if($class_type_id){
				$query = $CI->db->select("*")->from($classtypeinfo->table_name)->where(array("class_type_id"=>$class_type_id))->get();
			}else if($class_type_code){
				$query = $CI->db->select("*")->from($classtypeinfo->table_name)->where(array("class_type_code"=>$class_type_code))->get();
			}else{
				$query = false;
			}
		}
		
		if($query && $query->num_rows() > 0 ){
			$class_type = true;
		}
		return $class_type;
	}
}
if(!function_exists("get_curr_subjects")){
	function get_curr_subjects($curriculum_id,$sem=false,$yl=false){
		return false;
	}
}