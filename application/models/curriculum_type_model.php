<?php
	
class Curriculum_Type_Model extends CI_Model{
	private $curriculum_type_id;

	public $curriculum_type;

	private $created_on;
	private $last_update;

	public $table_name;
	function __construct(){

		parent::__construct();
		$this->table_name = "cs_curriculum_types";

	}
	function setCurriculumtypeid($value){
		$this->curriculum_type_id = $value;
	}
	function setCurriculumtype($value){
		$this->curriculum_type = $value;
	}
	function setCreatedon($value){
		$this->created_on = $value;
	}
	function setLastupdate($value){
		$this->last_update = $value;
	}

	function getCurriculumtypeid(){
		return $this->curriculum_type_id;
	}
	function getCurriculumtype(){
		return $this->curriculum_type;
	}
	function getCreatedon(){
		return $this->created_on;
	}
	function getLastupdate(){
		return $this->last_update;
	}
	function saveAsnew(){
		if($this->curriculum_type){
			$data = array(
							"curriculum_type" => $this->curriculum_type
						);
			$this->db->insert($this->table_name,$data);
			if($this->db->insert_id() > 0){
				return true;
			}
		}
		return false;
	}
	function update(){
		if($this->curriculum_type_id && $this->curriculum_type){
			$data = array(
							"curriculum_type" => $this->curriculum_type
						);
			$where = array("curriculum_type_id"=>$this->curriculum_type_id);
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	function delete(){
		if($this->curriculum_type_id){
			$where = array("curriculum_type_id"=>$this->curriculum_type_id);
			$this->db->delete($this->table_name,$where);
			return true;
		}
		return false;
	}
}