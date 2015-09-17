<?php

class Major_Model extends CI_Model
{	
	private $major_id;

	public $major_code;
	public $major_description;

	private $created_on;
	private $last_update;
	public $table_name;
	
	function __construct(){
		parent::__construct();
		$this->table_name = "cs_majors";
	}
	
	function setMajorid($value){
	
		$this->major_id = $value;
		
	}
	function setMajorcode($value){
	
		$this->major_code = $value;
	
	}
	function setMajordescription($value){
	
		$this->major_description = $value;
	
	}

	function setCreatedon($value){
	
		$this->created_on = $value;
	
	}

	function setLastupdate($value){
	
		$this->last_update = $value;
	
	}
	function getMajorid(){
	
		return $this->major_id;
	
	}
	function getMajorcode(){
	
		return $this->major_code;
	
	}
	function getMajordescription(){
	
		return $this->major_description;
	
	}

	function getCreatedon(){
	
		return $this->created_on;
	
	}

	function getLastupdate(){
	
		return $this->last_update;
	
	}
	function saveAsnew(){
		if($this->major_code && $this->major_description){
			$data = array(
							"major_code" => $this->major_code,
							"major_description" => $this->major_description
							);
			$this->db->insert($this->table_name,$data);
			if($this->db->insert_id() > 0){
				return true;
			}
		}
		return false;
	}
	function update(){
		if($this->major_id && $this->major_code && $this->major_description){
			$data = array(
							"major_code" => $this->major_code,
							"major_description" => $this->major_description
							);
			$where = array("major_id"=>$this->major_id);
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	function delete(){
		if($this->major_id){
			$where = array("major_id"=>$this->major_id);
			$this->db->delete($this->table_name,$where);
		}
		return;
	}
	
}