<?php
class Curriculum_Subject_Model extends CI_Model{
	private $curriculum_subject_id;

	public $curriculum_id;
	public $subject_id;
	public $yearlevel_id;
	public $sem_id;
	public $unit;
	public $class_type_id;

	private $created_on;
	private $last_update;

	public $table_name;

	function __construct($values = array()){
		parent::__construct();
		$this->load->model("Curriculum_Subject_type_Model");
		$this->table_name = "cs_curriculum_subjects";
		if (count($values) > 0)
		{
			foreach ($values as $key => $val)
			{
				$this->$key = $val;
			}
		}
	}
	function setCurriculumsubjectid($value){
		$this->curriculum_subject_id = $value;
	}
	function setCurriculumid($value){
		$this->curriculum_id = $value;
	}
	function setSubjectid($value){
		$this->subject_id = $value;
	}
	function setYearlevelid($value){
		$this->yearlevel_id = $value;
	}
	function setSemid($value){
		$this->sem_id = $value;
	}
	function setUnit($value){
		$this->unit = $value;
	}
	function setCreatedon($value){
		$this->created_on = $value;
	}
	function setLastupdate($value){
		$this->last_update = $value;
	}

	function getCurriculumsubjectid(){
		return $this->curriculum_subject_id;
	}
	function getCurriculumid(){
		return $this->curriculum_id;
	}
	function getSubjectid(){
		return $this->subject_id;
	}
	function getYearlevelid(){
		return $this->yearlevel_id;
	}
	function getSemid(){
		return $this->sem_id;
	}
	function getUnit(){
		return $this->unit;
	}
	function getCreatedon(){
		return $this->created_on;
	}
	function getLastupdate(){
		return $this->last_update;
	}
	function getSemesterinfo(){
		if($this->sem_id){
			return get_semester($this->sem_id);
		}
		return false;
	}
	function getYearlevelinfo(){
		if($this->yearlevel_id){
			return get_yearlevel($this->yearlevel_id);
		}
		return false;
	}
	function getSubjectinfo(){
		if($this->subject_id){
			return get_subject($this->subject_id);
		}
		return false;
	}
	function getCurriculumsubjecttypes(){
		if($this->curriculum_subject_id){
			return get_curriculum_subject_types($this->curriculum_subject_id);
		}
	}
	function hasCurriculumsubjecttype($class_type_id){
		if($this->curriculum_subject_id){
			return has_curriculum_subject_type(false,$this->curriculum_subject_id,$class_type_id);
		}
	}
	function getCurriculumsubjecttype($class_type_id){
		if($this->curriculum_subject_id){
			
			return get_curriculum_subject_type(false,$this->curriculum_subject_id,$class_type_id);
		}
	}

	function createCurriculumsubjecttype($class_type_id,$unit=0){
		if($this->curriculum_subject_id && (int)$class_type_id > 0 && (int)$unit > 0 ){
			$newdata = array(
						"curriculum_subject_id"=>$this->curriculum_subject_id,
						"class_type_id"=>$class_type_id,
						"unit"=>$unit
						);
			$newcurriculumsubjeecttype = new Curriculum_Subject_type_Model($newdata);
			return $newcurriculumsubjeecttype->saveasnew();
		}
		return false;
	}
	function save_as_new(){
		if($this->curriculum_id && $this->sem_id && $this->yearlevel_id && $this->subject_id && $this->unit){
			$data = array(
					"curriculum_id"=>$this->curriculum_id,
					"sem_id"=>$this->sem_id,
					"yearlevel_id"=>$this->yearlevel_id,
					"subject_id"=>$this->subject_id,
					"unit"=>$this->unit
					);
			$this->db->insert($this->table_name,$data);
			$new_curriculum_subject_id = $this->db->insert_id(); 
			if($new_curriculum_subject_id && $new_curriculum_subject_id>0){
				$this->curriculum_subject_id = $new_curriculum_subject_id;
				return $new_curriculum_subject_id;
			}
		}
		return false;
	}

	function update(){
		if($this->curriculum_subject_id && $this->curriculum_id && $this->sem_id && $this->yearlevel_id && $this->subject_id && $this->unit){
			$data = array(
					"sem_id"=> $this->sem_id,
					"yearlevel_id"=> $this->yearlevel_id,
					"subject_id"=> $this->subject_id,
					"unit"=> $this->unit
					);
			$where = array("curriculum_subject_id"=>$this->curriculum_subject_id);
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}

	function delete(){
		if($this->curriculum_subject_id){
			$where = array("curriculum_subject_id"=>$this->curriculum_subject_id);
			$this->db->delete($this->table_name,$where);
			
			return true;
			
		}
		return false;
	}
}