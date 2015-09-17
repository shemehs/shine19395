<?php

class Profile_Model extends CI_Model
{
	/*
	* A private variable to represent each column in the database
	*/
	private $profile_id;
	private $user_id;
	
	public $first_name;
	public $last_name;
	public $school_id_no;

	private $photo_file_name;

	public $table_name;
	
	
	function __construct(){
	
		parent::__construct();
	
		$this->table_name = "cs_profiles";
		
	}
	function setProfileid($value){
		$this->profile_id = $value;
	}
	function setUserid($value){
		$this->user_id = $value;
	}

	function setSchoolidno($value){
		$this->school_id_no = $value;
	}

	function setPhotofilename($value){
		$this->photo_file_name = $value;
	}
	function setFirstname($value){
		$this->first_name = $value;
	}
	function setLastname(){
		$this->last_name = $value;
	}

	function getProfileid($value){
		return $this->profile_id;
	}
	function getUserid($value){
		return $this->user_id;
	}

	function getSchoolidno($value){
		return $this->school_id_no;
	}

	function getPhotofilename($value){
		return $this->photo_file_name;
	}
	function getFirstname($value){
		return $this->first_name;
	}
	function getLastname(){
		return $this->last_name;
	}
	
	function updatePhotofilename(){
		
		
		if ($this->user_id > 0) {
			$data = array(
			
				'photo_file_name' =>  $this->photo_file_name
			);
			$where = array("user_id" => $this->user_id);
			if ($this->db->update($this->table_name, $data,$where)) {
				if($this->db->affected_rows()>0){
					$this->photo_file_name = $data['photo_file_name'];
					return true;
				}
			}
		}
		return false;
	}