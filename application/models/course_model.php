<?php

class Course_Model extends CI_Model
{	
	public $course_id;

	public $course_code;
	public $course_description;

	private $created_on;
	private $last_update;

	
	function __construct(){
		parent::__construct();
		$this->table_name = "cs_courses";
	}
	function setCourseid($value){
	
		$this->course_id = $value;

	}
	function setCoursecode($value){
	
		$this->course_code = $value;
	
	}
	function setCoursedescription($value){
	
		$this->course_description = $value;
	
	}
	function setCreatedon($value){
	
		$this->created_on = $value;
	
	}
	function setLastupdate($value){
	
		$this->last_update = $value;
	
	}
	function getCourseid(){
	
		return $this->course_id;
	
	}
	function getCoursecode(){
	
		return $this->course_code;
	
	}
	function getCoursedescription(){
	
		return $this->course_description;
	
	}
	function getCreatedon(){
	
		return $this->created_on;
	
	}
	function getLastupdate(){
	
		return $this->last_update;
	
	}
	function saveAsnew(){
		if($this->course_code && $this->course_description){
			$data = array(
							"course_code" => $this->course_code,
							"course_description" => $this->course_description
							);
			$this->db->insert($this->table_name,$data);
			if($this->db->insert_id() > 0){
				return true;
			}
		}
		return false;
	}
	function update(){
		if($this->course_id && $this->course_code && $this->course_description){
			$data = array(
						"course_code" => $this->course_code,
						"course_description" => $this->course_description
						);
			$where = array("course_id"=>$this->course_id);
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	function delete(){
		if($this->course_id){
			$where = array("course_id"=>$this->course_id);
			$this->db->delete($this->table_name,$where);
			return true;
		}
		return false;
	}
}