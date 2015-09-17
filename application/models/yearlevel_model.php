<?php

class YearLevel_Model extends CI_Model
{	
	private $yearlevel_id;

	public $yearlevel_sequence;
	public $yearlevel_code;
	public $yearlevel_alias;
	public $yearlevel_description;

	private $created_on;
	private $last_update;
	public $table_name;
	
	function __construct(){
		parent::__construct();
		$this->table_name = "cs_yearlevels";
	}
	
	function setYearlevelid($value){
	
		$this->yearlevel_id = $value;
		
	}
	function setYearlevelsequence($value){
	
		$this->yearlevel_sequence = $value;
	
	}
	function setYearlevelcode($value){
	
		$this->yearlevel_code = $value;
	
	}
	function setYearlevelalias($value){
	
		$this->yearlevel_alias = $value;
	
	}
	function setYearleveldescription($value){
	
		$this->yearlevel_description = $value;
	
	}

	function setCreatedon($value){
	
		$this->created_on = $value;
	
	}

	function setLastupdate($value){
	
		$this->last_update = $value;
	
	}
	function getYearlevelid(){
	
		return $this->yearlevel_id;
		
	}
	function getYearlevelsequence(){
	
		return $this->yearlevel_sequence;
	
	}
	function getYearlevelcode(){
	
		return $this->yearlevel_code;
	
	}
	function getYearlevelalias(){
	
		return $this->yearlevel_alias;
	
	}
	function getYearleveldescription(){
	
		return $this->yearlevel_description;
	
	}
	function getCreatedon(){
	
		return $this->created_on;
	
	}

	function getLastupdate(){
	
		return $this->last_update;
	
	}
	function get_last_yearlevel_sequence(){
		$query = $this->db->select_max("yearlevel_sequence","max_yearlevel_sequence")->from($this->table_name)->get();
		if($query){
			return $query->row()->max_yearlevel_sequence;
		}
		return 0;
	}
	function saveAsnew(){
		if($this->yearlevel_code && $this->yearlevel_alias &&  $this->yearlevel_description){
			$data = array(
							"yearlevel_sequence" => ((int)$this->get_last_yearlevel_sequence()+1),
							"yearlevel_code" => $this->yearlevel_code,
							"yearlevel_alias" => $this->yearlevel_alias,
							"yearlevel_description" => $this->yearlevel_description
							);
			$this->db->insert($this->table_name,$data);
			if($this->db->insert_id() > 0){
				return true;
			}
		}
		return false;
	}

	function update(){
		if($this->yearlevel_id && $this->yearlevel_code && $this->yearlevel_alias &&  $this->yearlevel_description){
			$data = array(
							"yearlevel_sequence" => ((int)$this->get_last_yearlevel_sequence()+1),
							"yearlevel_code" => $this->yearlevel_code,
							"yearlevel_alias" => $this->yearlevel_alias,
							"yearlevel_description" => $this->yearlevel_description
							);
			$where = array("yearlevel_id"=>$this->yearlevel_id);
			$this->db->update($this->table_name,$data,$where);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}
	function delete(){
		if($this->yearlevel_id){
			
			$where = array("yearlevel_id"=>$this->yearlevel_id);
			$this->db->delete($this->table_name,$where);
			return true;
		
		}
		return false;
	}
	
}