<?php
	class Curriculum_Subject_Type_Model extends CI_Model{
		private $curriculum_subject_type_id;

		public $curriculum_subject_id;
		public $class_type_id;
		public $unit;

		private $created_on;
		private $last_update;

		public $table_name;
		function __construct($array_values=false){
			parent::__construct();
			if($array_values && is_array($array_values) && count($array_values)>0){
				foreach ($array_values as $key => $val)
				{
					$this->$key = $val;
				}
			}
			$this->table_name = "cs_curriculum_subject_types";
		}
		function setCurriculumsubjecttypeid($value){
			$this->curriculum_subject_type_id = $value;
		}
		function setCurriculumsubjectid($value){
			$this->curriculum_subject_id = $value;
		}
		function setClasstypeid($value){
			$this->class_type_id = $value;
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
		function getCurriculumsubjecttypeid(){
			return $this->curriculum_subject_type_id;
		}
		function getCurriculumsubjectid(){
			return $this->curriculum_subject_id;
		}
		function getClasstypeid(){
			return $this->class_type_id;
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
		function saveasnew(){
			if($this->curriculum_subject_id && $this->class_type_id){
				$newdata = array(
						"curriculum_subject_id"=>$this->curriculum_subject_id,
						"class_type_id"=>$this->class_type_id,
						"unit"=>(((int)$this->unit > 0)?(int)$this->unit:0)
						);
				$this->db->insert($this->table_name,$newdata);
				$new_curriculum_subject_type_id = $this->db->insert_id(); 
				if($new_curriculum_subject_type_id && $new_curriculum_subject_type_id > 0){
					$this->curriculum_subject_type_id = $new_curriculum_subject_type_id;
					return $new_curriculum_subject_type_id;
				}
			}
			return false;
		}

		function update(){
			if($this->curriculum_subject_type_id && $this->curriculum_subject_id && $this->class_type_id){
				$where = array("curriculum_subject_type_id"=>$this->curriculum_subject_type_id);
				$newdata = array(
						"curriculum_subject_id"=>$this->curriculum_subject_id,
						"class_type_id"=>$this->class_type_id,
						"unit"=>(((int)$this->unit > 0)?(int)$this->unit:0)
						);
				$this->db->update($this->table_name,$newdata,$where);
				if($this->db->insert_id() && $this->db->insert_id() > 0){
					return true;
				}
			}
			return false;
		}
		function delete(){
			if($this->curriculum_subject_type_id){
				$where = array("curriculum_subject_type_id"=>$this->curriculum_subject_type_id);
				
				$this->db->delete($this->table_name,$where);
				return true;
			}
			return false;
		}
	}