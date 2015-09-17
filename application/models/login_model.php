<?php if(!defined("BASEPATH")) exit("No dirext script access allowed.");

Class Login_Model extends CI_Model{
	
	private $login_id;
	
	public $user_id;
	public $session_id;
	public $user_agent;
	public $ip_address;
	public $last_activity;
	public $last_login;
	public $status;

	private $last_update;
	public $table_name;
	
	
	function __construct(){
	
		parent::__construct();
		$this->table_name = "cs_logins";
	
	}
	function setLoginid($value){
	
		$this->login_id = $value;
	
	}
	function getLoginid(){
	
		return $this->login_id;
	
	}
	function setUserid($value){
	
		$this->user_id = $value;
	
	}
	function getUserid(){
	
		return $this->user_id;
	
	}
	function setSessionid($value){
		
		$this->session_id = $value;
	
	}
	function getSessionid(){
	
		return $this->session_id;
	
	}
	function setUseragent($value){
	
		$this->user_agent = $value;
	
	}
	function getUseragent(){
	
		return $this->user_agent;
	
	}
	function setIpaddress($value){
	
		$this->ip_address = $value;
	
	}
	function getIpaddress(){
	
		return $this->ip_address;
	
	}
	function setLastactivity($value){
	
		$this->last_activity = $value;
	
	}
	function getLastactivity(){
	
		return $this->last_activity;
	
	}
	function setLastlogin($value){
	
		$this->last_login = $value;
	
	}
	function getLastlogin(){
	
		return $this->last_login;
	
	}
	function setStatus($value){
	
		$this->status = $value;
	
	}
	function getStatus(){
	
		return $this->status;
	
	}
	
	function setLastupdate($value){
	
		$this->last_update = $value;
	
	}
	function getLastupdate(){
	
		
		return $this->last_update;
		
	}
	
	
	function updateLastactivity($now = false){
		$new_last_activity = ($now)?$now:now();
		if($this->login_id){
		
			$new_data = array(
							
							"last_activity" => $new_last_activity
				
						);
			$where = array("login_id"=>$this->login_id);
			$this->db->update($this->table_name,$new_data,$where);
		
		}
		$this->last_activity = $new_last_activity;
	
	}
	function login(){
	
		if($this->user_id && (int)$this->user_id > 0){
			$new_data = array(
								"user_id"=>$this->user_id,
								"ip_address"=>$this->session->userdata("ip_address"),
								"session_id" =>$this->session->userdata("session_id"),
								"user_agent" => $this->session->userdata("user_agent"),
								"last_activity" => now(),
								"status" => 1
							);
			
			if($this->db->insert($this->table_name,$new_data)){
				$this->login_id = $this->db->insert_id();
				$this->ip_address = $new_data["ip_address"];
				$this->session_id = $new_data["session_id"];
				$this->user_agent = $new_data["user_agent"];
				$this->last_activity = $new_data["last_activity"];
				$this->last_login = mdate( "Year: %Y-%m-%d %H:%i:%s");
				$this->status = $new_data["status"];
				return true;
			}else{
				return false;
			}
		}
		return false;
	
	}
	function updateLogindata(){
		if($this->login_id){
			$data = array(
						"session_id"=>$this->session->userdata("session_id"),
						"user_agent"=>$this->session->userdata("user_agent"),
						"ip_address"=>$this->session->userdata("ip_address")
					);
			$where = array("login_id"=>$this->login_id);
			if($this->db->update("login",$data,$where)){
				$this->ip_address = $data["ip_address"];
				$this->session_id = $data["session_id"];
				$this->user_agent = $data["user_agent"];
				return true;
			}
			
		}
		return false;
	}
	function logout(){
	
		if($this->login_id){
		
			if($this->status){
				
				$new_data = array(
								
									"status" => 0
								
								);
				$where = array("login_id"=>$this->login_id);
				if($this->db->update($this->table_name,$new_data,$where)){
					
					$this->status = false;
					return true;
				
				}
			
			}else{
				return false;
			}
		
		}
	
	}
	
	function updateSessionid($new_session_id = false){
		
		if($this->login_id){
		
			$new_data = array(
						
						"session_id" => $this->session->userdata("session_id"),
			
						);
			$where = array("login_id"=>$this->login_id);
			if($this->db->update($this->table_name,$new_data,$where)){

				$this->session_id = $new_data['session_id'];
				return true;
			}
			
		
		}
		
		return false;
			
		
		
	}
	function updateUseragent($new_user_agent = false){
	
		
		if($this->login_id){
		
			$new_data = array(
						
						"user_agent" => $this->session->userdata("user_agent"),
			
						);
			$where = array("login_id"=>$this->login_id);
			if($this->db->update($this->table_name,$new_data,$where)){
				$this->user_agent = $new_data['user_agent'];
				return true;
			}
			
		
		}
		
	}
	function updateIpaddress(){
	
		
		if($this->login_id){
			$new_data = array(
						
						"ip_address" => $this->session->userdata("ip_address"),
			
						);
			$where = array("login_id"=>$this->login_id);
			if($this->db->update($this->table_name,$new_data,$where)){
				$this->ip_address = $new_data['ip_address'];
				return true;
			}
		}
		return false;
		
		
	}
	function destroy(){

		if($this->login_id){
			$where = array("login_id"=>$this->login_id);
			if($this->db->delete($this->table_name,$where)){
				$this->ip_address = false;
				$this->session_id = false;
				$this->user_agent = false;
				$this->status = false;
				$this->last_activity = false;
				$this->last_login = false;
				$this->last_update = false;
				$this->login_id = false;
				$this->user_id = false;
				return true;
			}
		}
		return false;

	}
}