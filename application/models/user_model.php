<?php

class User_Model extends CI_Model
{
	/*
	* A private variable to represent each column in the database
	*/
	private $user_id;
	
	public $username;
	public $password;
	public $level;
	public $type;
	public $status;

	private $created_on;
	private $last_update;
	

	public $table_name;
	
	
	function __construct(){
	
		parent::__construct();
	
		$this->table_name = "cs_users";
		
	}
	
	function setLastupdate($value){
	
		$this->last_update = $value;
	
	}
	function getLastupdate(){
	
		
		return $this->last_update;
		
	}
	
	function getUserid(){
		return $this->user_id;
	}
	function setUserid($value){
		$this->user_id = $value;
	}
	function getUsername(){
		return $this->username;
	}
	function setUsername($value){
		$this->username = $value;
	}
	function getPassword(){
		return $this->password;
	}
	function setPassword($value){
		$this->password = $value;
	}
	function setLevel($value){
	  $this->level = $value;
	}
	function getLevel(){
		return $this->level;
	}
	
	function setType($value){
	  $this->type = $value;
	}
	function getType(){
		return $this->type;
	}
	function setCreatedon($value){

		$this->created_on = $value;
	
	}
	function getCreatedon(){
		return $this->created_on;
	}
	function getStatus(){
		
		return $this->status;
	}

	function setStatus($value){
		
		$this->status = $value;
	}
	
	function updateUseraccount(){
		
		

		if ($this->user_id > 0){
			$data = array(
				'username' =>  $this->username,
				'password' =>  sha1($this->password)
			);
			$where = array("user_id" => $this->user_id);
			if ($this->db->update($this->table_name, $data,$where)){
				
				
				$this->username = $data['username'];
				$this->password = $data['password'];
				
				return true;
			}
			
		}
		return false;
	}
	function updateUsername(){
		
		
		if ($this->user_id > 0) {
			$data = array(
			
				'username' =>  $this->username
			);
			$where = array("user_id" => $this->user_id);
			if ($this->db->update($this->table_name, $data,$where)) {
				if($this->db->affected_rows()>0){
					$this->username = $username;
					return true;
				}
			}
		}
		return false;
	}

	function updateUserlevel(){
		
		
		if ($this->user_id > 0) {
			$data = array(
			
				'level' =>  $this->level
			);
			$where = array("user_id" => $this->user_id);
			if ($this->db->update($this->table_name, $data,$where)) {
				if($this->db->affected_rows()>0){
					$this->level = $data['level'];
					return true;
				}
			}
		}
		return false;
	}

	function updateUsertype(){
		
		
		if ($this->user_id > 0) {
			$data = array(
			
				'type' =>  $this->type
			);
			$where = array("user_id" => $this->user_id);
			if ($this->db->update($this->table_name, $data,$where)) {
				if($this->db->affected_rows()>0){
					$this->type = $data['type'];
					return true;
				}
			}
		}
		return false;
	}
	function updatePassword(){
		
		
		if ($this->user_id > 0) {
			
			$data = array(
				
				'password' =>  sha1($this->password)
			);
			$where = array("user_id" => $this->user_id);
			if ($this->db->update($this->table_name, $data, $where)) {

				$this->password = $password;
				return true;
			}
			
		}
		return false;
	}
	function activate(){
		
		
		if ($this->user_id > 1) {
			
			$data = array(
				
				'status' =>  1
			);
			$where = array("user_id" => $this->user_id);
			if ($this->db->update($this->table_name, $data, $where)) {
				$this->status = 1;
				return true;
			}
			
		}
		return false;
	}
	function deactivate(){
		
		if ($this->user_id > 1) {
			
			$data = array(
				
				'status' =>  0
			);
			$where = array("user_id" => $this->user_id);
			if ($this->db->update($this->table_name, $data, $where)) {
				$this->status = 0;
				return true;
			}
			
		}
		return false;
	}
	function deleteMe(){
		if ($this->user_id > 1) {
			
			
			$where = array("user_id" => $this->user_id);
			if ($this->db->delete($this->table_name, $where)) {
				$this->user_id=false;
				$this->username=false;
				$this->password=false;
				$this->level=false;
				
				$this->created_on=false;
				$this->last_update=false;
				$this->status=false;
				return true;
			}
			
		}
	}
	function register(){
	
		$data = array(
			'username' => $this->username,
			'password' => sha1($this->password),
			'level' => $this->level,
			'status' => 1,
		);

		
		//We dont have an ID meaning it is new and not yet in the database so we need to do an insert
		if ($this->user_id > 0) {
			//We have an ID so we need to update this object because it is not new
			if ($this->db->select("*")->from($this->table_name)->where(array("user_id" => $this->user_id))->get()->num_rows>0) {
				return false;
			}
		}

		if ($this->db->insert($this->table_name, $data)) {
			
			$this->user_id= $this->db->insert_id();
			$this->username=$data['username'];
			$this->password=$data['password'];
			$this->level=$data['level'];
			$this->status= $data['status'];

			$this->created_on = now();
			$this->last_update = false;
			return true;
		}
		
		return false;
	
	}
}