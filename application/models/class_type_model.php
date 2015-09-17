<?php
	
class Class_Type_Model extends CI_Model{
	private $class_type_id;

	public $class_type_code;
	public $class_type_alias;
	public $class_type_description;

	private $created_on;
	private $last_update;

	public $table_name;
	function __construct(){

		parent::__construct();
		$this->table_name = "cs_class_types";

	}
	function setClasstypeid($value){
		$this->class_type_id = $value;
	}
	function setClasstypecode($value){
		$this->class_type_code = $value;
	}
	function setClasstypealias($value){
		$this->class_type_alias = $value;
	}
	function setClasstypedescription($value){
		$this->class_type_description = $value;
	}
	function setCreatedon($value){
		$this->created_on = $value;
	}
	function setLastupdate($value){
		$this->last_update = $value;
	}

	function getClasstypeid(){
		return $this->class_type_id;
	}
	function getClasstypecode(){
		return $this->class_type_code;
	}
	function getClasstypealias(){
		return $this->class_type_alias;
	}
	function getClasstypedescription(){
		return $this->class_type_description;
	}
	function getCreatedon(){
		return $this->created_on;
	}
	function getLastupdate(){
		return $this->last_update;
	}
	function saveAsnew(){
		if($this->class_type_code && $this->class_type_alias &&  $this->class_type_description){
			$data = array(
							"class_type_code" => $this->class_type_code,
							"class_type_alias" => $this->class_type_alias,
							"class_type_description" => $this->class_type_description
							);
			$this->db->insert($this->table_name,$data);
			if($this->db->insert_id() > 0){
				return true;
			}
		}
		return false;
	}
	function update(){
		if($this->class_type_id && $this->class_type_code && $this->class_type_alias &&  $this->class_type_description){
			$data = array(
							"class_type_code" => $this->class_type_code,
							"class_type_alias" => $this->class_type_alias,
							"class_type_description" => $this->class_type_description
							);
			$where = array("class_type_id"=>$this->class_type_id);
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	function delete(){
		if($this->class_type_id){
			$where = array("class_type_id"=>$this->class_type_id);
			$this->db->delete($this->table_name,$where);
			return true;
		}
		return false;
	}
}