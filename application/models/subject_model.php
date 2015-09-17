<?php

class Subject_Model extends CI_Model
{	
	private $subject_id;

	public $subject_sequence;
	public $subject_description;

	private $created_on;
	private $last_update;
	public $table_name;
	
	function __construct(){
		parent::__construct();
		$this->table_name = "cs_subjects";
	}
	
	function setSubjectid($value){
	
		$this->subject_id = $value;
		
	}
	function setSubjectcode($value){
	
		$this->subject_code = $value;
	
	}
	function setSubjectdescription($value){
	
		$this->subject_description = $value;
	
	}

	function setCreatedon($value){
	
		$this->created_on = $value;
	
	}

	function setLastupdate($value){
	
		$this->last_update = $value;
	
	}
	function getSubjectid(){
	
		return $this->subject_id;
		
	}
	function getSubjectcode(){
	
		return $this->subject_code;
	
	}
	function getSubjectdescription(){
	
		return $this->subject_description;
	
	}
	function getCreatedon(){
	
		return $this->created_on;
	
	}

	function getLastupdate(){
	
		return $this->last_update;
	
	}
	function saveAsnew(){
		if($this->subject_code &&  $this->subject_description){
			$data = array(
							"subject_code" => $this->subject_code,
							"subject_description" => $this->subject_description
							);
			$this->db->insert($this->table_name,$data);
			if($this->db->insert_id() > 0){
				return true;
			}
		}
		return false;
	}

	function update(){
		if($this->subject_id && $this->subject_code &&  $this->subject_description){
			$data = array(
							"subject_code" => $this->subject_code,
							"subject_description" => $this->subject_description
							);
			$where = array("subject_id"=>$this->subject_id);
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	
	function delete(){
		if($this->subject_id){
			
			$where = array("subject_id"=>$this->subject_id);
			$this->db->delete($this->table_name,$where);
			
			return true;
			
		}
		return false;
	}
}