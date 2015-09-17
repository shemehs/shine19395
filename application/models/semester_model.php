<?php

class Semester_Model extends CI_Model
{	
	private $sem_id;

	public $sem_sequence;
	public $sem_code;
	public $sem_alias;
	public $sem_description;

	private $created_on;
	private $last_update;
	public $table_name;
	
	function __construct(){
		parent::__construct();
		$this->table_name = "cs_semesters";
	}
	
	function setSemesterid($value){
	
		$this->sem_id = $value;
		
	}
	function setSemestersequence($value){
	
		$this->sem_sequence = $value;
	
	}
	function setSemestercode($value){
	
		$this->sem_code = $value;
	
	}
	function setSemesteralias($value){
	
		$this->sem_alias = $value;
	
	}
	function setSemesterdescription($value){
	
		$this->sem_description = $value;
	
	}

	function setCreatedon($value){
	
		$this->created_on = $value;
	
	}

	function setLastupdate($value){
	
		$this->last_update = $value;
	
	}
	function getSemesterid(){
	
		return $this->sem_id;
		
	}
	function getSemestersequence(){
	
		return $this->sem_sequence;
	
	}
	function getSemestercode(){
	
		return $this->sem_code;
	
	}
	function getSemesteralias(){
	
		return $this->sem_alias;
	
	}
	function getSemesterdescription(){
	
		return $this->sem_description;
	
	}
	function getCreatedon(){
	
		return $this->created_on;
	
	}

	function getLastupdate(){
	
		return $this->last_update;
	
	}
	function saveAsnew(){
		if($this->sem_code && $this->sem_alias &&  $this->sem_description){
			$data = array(
							"sem_code" => $this->sem_code,
							"sem_alias" => $this->sem_alias,
							"sem_description" => $this->sem_description
							);
			$this->db->insert($this->table_name,$data);
			if($this->db->insert_id() > 0){
				return true;
			}
		}
		return false;
	}

	function update(){
		if($this->sem_id && $this->sem_code && $this->sem_alias &&  $this->sem_description){
			$data = array(
							"sem_code" => $this->sem_code,
							"sem_alias" => $this->sem_alias,
							"sem_description" => $this->sem_description
							);
			$where = array("sem_id"=>$this->sem_id);
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	function delete(){
		if($this->sem_id){
			
			$where = array("sem_id"=>$this->sem_id);
			$this->db->delete($this->table_name,$where);
			
		}
		return;
	}
}