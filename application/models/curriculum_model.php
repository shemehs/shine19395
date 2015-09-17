<?php

class Curriculum_Model extends CI_Model
{	
	private $curriculum_id;

	public $course_id;
	public $major_id;
	public $curriculum_type_id;
	public $description;
	public $year;
	public $schoolyear_start;

	private  $created_on;
	private  $last_update;
	public $table_name;

	public $courseinfo;
	public $majorinfo;
	public $curriculumtypeinfo;
	
	
	function __construct(){
		parent::__construct();
		$this->load->model("Curriculum_Subject_Model");
		$this->load->model("Curriculum_Subject_Type_Model");
		$this->table_name = "cs_curriculums";
	}
	
	function setCurriculumid($value){
	
		return $this->curriculum_id = $value;
		
	}
	function setCourseid($value){
	
		return $this->course_id = $value;
	
	}
	function setMajorid($value){
	
		return $this->major_id = $value;
	
	}
	function setCurriculumtypeid($value){
	
		return $this->curriculum_type_id = $value;
	
	}
	function setDescription($value){
	
		return $this->description = $value;
	
	}
	function setYear($value){
	
		return $this->year = $value;
	
	}
	function setSchoolyearstart($value){
	
		return $this->schoolyear_start = $value;
	
	}

	function setCreatedon($value){
	
		$this->created_on = $value;
	
	}

	function setLastupdate($value){
	
		$this->last_update = $value;
	
	}
	function getCurriculumid( ){
	
		return $this->curriculum_id  ;
		
	}
	function getCourseid( ){
	
		return $this->course_id;
	
	}
	function getMajorid( ){
	
		return $this->major_id;
	
	}
	function getCurriculumtypeid( ){
	
		return $this->curriculum_type_id;
	
	}
	function getDescription( ){
	
		return $this->description;
	
	}
	function getYear( ){
		return $this->year;
	}
	function getSchoolyearstart( ){
	
		return $this->schoolyear_start ;
	
	}

	function getCreatedon($intimestamp = true){
		if($intimestamp){
			return strtotime($this->created_on);
		}else{
			return $this->created_on;
		}
		
	
	}

	function getLastupdate($intimestamp = true){
		if($intimestamp){
			return strtotime($this->last_update);
		}else{
			return $this->last_update;
		}
	
	}
	function getCurriculumname(){
		$this->setCourseinfo();
		$this->setMajorinfo();
		$this->setCurriculumtypeinfo();
		if($this->curriculumtypeinfo){
			$curriculum_type=$this->curriculumtypeinfo->curriculum_type;
			switch(strtolower(trim($curriculum_type))){
				case "new":
					return (($this->year&&(int)$this->year > 0)?$this->year." ":"").(($this->courseinfo)?$this->courseinfo->getCoursedescription()." (".$this->courseinfo->getCoursecode().") ":" ")."Curriculum ".(($this->major_id && $this->majorinfo )?"( ".$this->majorinfo->getMajordescription()." ) ":" ").(($this->description)?"( ".$this->description." ) ":" ");

					break;
				default:
					return ucfirst($curriculum_type)." ".(($this->year&&(int)$this->year > 0)?$this->year." ":"").(($this->courseinfo)?$this->courseinfo->getCoursedescription()." (".$this->courseinfo->getCoursecode().") ":" ")."Curriculum ".(($this->major_id && $this->majorinfo )?"( ".$this->majorinfo->getMajordescription()." ) ":" ").(($this->description)?"( ".$this->description." ) ":" ");

					break;
			}
		}
	}
	function getCoursedefination(){
		$this->setCourseinfo();
		$this->setMajorinfo();
		$this->setCurriculumtypeinfo();
		return (($this->courseinfo)?$this->courseinfo->getCoursedescription()." ":" ").(($this->major_id && $this->majorinfo )?" major in ".$this->majorinfo->getMajordescription().""." ":" ");


	}
	function setCourseinfo(){
	
		if($this->course_id){
		 	$this->courseinfo = get_course($this->course_id);
		}
		return $this->courseinfo;
	
	}
	function getCourseinfo(){
	
		if(!$this->courseinfo){
			$this->SetCourseinfo();
		}
		return $this->courseinfo;
	
	}

	function setMajorinfo(){
	
		if($this->major_id){
		 	$this->majorinfo = get_major($this->major_id);
		}
		return $this->majorinfo;
	
	}
	function getMajorinfo(){
	
		if(!$this->majorinfo){
			$this->SetMajorinfo();
		}
		return $this->majorinfo;
	
	}

	function setCurriculumtypeinfo(){
	
		if($this->curriculum_type_id){
		 	$this->curriculumtypeinfo = get_curriculum_type($this->curriculum_type_id);
		}
		return $this->curriculumtypeinfo;
	
	}
	function getCurriculumtypeinfo(){
	
		if(!$this->curriculumtypeinfo){
			$this->setCurriculumtypeinfo();
		}
		return $this->curriculumtypeinfo;
	
	}
	function hasCurriculumsubjects($sem=false, $yl=false){
		if($this->curriculum_id){
		
			return has_curriculum_subjects($this->curriculum_id,$sem,$yl);
		
		}
		return false;
	}

	function hasCurriculumsubject($curriculum_subject_id){
		if($this->curriculum_id){
		
			return has_curriculum_subject($this->curriculum_id,$curriculum_subject_id);
		
		}
		return false;
	}
	function getCurriculumsubjects($sem=false, $yl=false){
		if($this->curriculum_id){
		
			return get_curriculum_subjects($this->curriculum_id,$sem,$yl);
		
		}
		return false;
	}
	function searchCurriculumsubjects($sem=false, $yl=false,$searchkey=false){
		if($this->curriculum_id){
		
			return search_curriculum_subjects($this->curriculum_id,$sem,$yl,$searchkey);
		
		}
		return false;
	}
	function getCurriculumyearlevels($sem=false){
		if($this->curriculum_id){
		
			return get_curriculum_yearlevels($this->curriculum_id,$sem);
		
		}
		return false;
	}
	function getCurriculumsemesters($yearlevel= false){
		if($this->curriculum_id){
		
			return get_curriculum_semesters($this->curriculum_id,$yearlevel);
		
		}
		return false;
	}
	function saveAsnew(){
		if($this->curriculum_type_id && $this->course_id){
			$data = array(
							"curriculum_type_id" => $this->curriculum_type_id,
							"course_id" => $this->course_id
							);
			if($this->year){
				$data["year"] = $this->year;
			}
			if($this->description){
				$data["description"] = $this->description;
			}
			if($this->major_id){
				$data["major_id"] = $this->major_id;
			}
			$this->db->insert($this->table_name,$data);
			
			return $this->db->insert_id();
			
		}
		return false;
	}

	function update(){

		if($this->curriculum_id && $this->curriculum_type_id && $this->course_id){
			$data = array(
							"curriculum_type_id" => $this->curriculum_type_id,
							"course_id" => $this->course_id
							);
			$where = array("curriculum_id"=>$this->curriculum_id);
			if($this->year){
				$data["year"] = $this->year;
			}else{
				$data["year"] = NULL;
			}
			if($this->description){
				$data["description"] = $this->description;
			}else{
				$data["description"] = NULL;
			}
			if($this->major_id){
				$data["major_id"] = $this->major_id;
			}else{
				$data["major_id"] = NULL;
			}
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	function updateLastupdate($timestamp=false){
		if($this->curriculum_id){
			$timestamp = ($timestamp)?$timestamp:now();
			$data = array(
							"last_update" => mdate("%Y-%m-%d %G:%i:%s",strtotime("now"))
							);
			$where = array("curriculum_id"=>$this->curriculum_id);
			
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	function delete(){

		if($this->curriculum_id){
			$where["curriculum_id"] = $this->curriculum_id;
			$this->db->delete($this->table_name,$where);
		
			return true;
		}
		return false;		
	}
	function add_subject($sem_id,$yearlevel_id,$subject_id,$unit,$default_type=false){
		$new_curriculum_subject_id = false;
		if($this->curriculum_id && $sem_id && $yearlevel_id && $subject_id && $unit){
			$data = array(
					"curriculum_id" => $this->curriculum_id,
					"sem_id" => $sem_id,
					"yearlevel_id" => $yearlevel_id,
					"subject_id" => $subject_id,
					"unit" => $unit
					);
			$curriculum_subject_info = new Curriculum_Subject_Model($data);
			if($new_curriculum_subject_id = $curriculum_subject_info->save_as_new()){
				if($default_type){
					$default_class_type = get_a_class_type(true);
					if($default_class_type){
						$new_curriculum_subject_type = array(
													"curriculum_subject_id"=>$new_curriculum_subject_id,
													"class_type_id"=>$default_class_type->getClasstypeid(),
													"unit"=>$data["unit"],
												);
						$curriculum_subject_type = new Curriculum_Subject_Type_Model($new_curriculum_subject_type);
						$curriculum_subject_type->saveasnew();
					
					}
				}
				return $new_curriculum_subject_id;
			}
		}
		return false;
	}
}