<?php if( ! defined('BASEPATH')) exit('No direct script access allowed.');

if(!function_exists("matchUsernameAndPassword")){
	function matchUsernameAndPassword($username,$password,$type=false,$activeonly=false){
		if($username && $password){
			$CI =& get_instance();
			$where = array(
			
				 "username" => $username,
				 "password" => sha1($password)
				 
			 );
			if($type){
				$where["type"]=$type;
			}
			if($activeonly){
				$where["status"]=1;
			}
			 $query = $CI->db->get_where("cs_users", $where);

			 if($query->num_rows() == 1)
			 {
				return $query->row()->user_id;
			 }
		 }
		return false;
	}
}
if(!function_exists("is_username_exist")){
	function is_username_exist($username,$type=false,$activeonly=false){

		if($username){
			$CI =& get_instance();
			$where = array("username" => $username);
			if($type){
				$where["type"]=$type;
			}
			if($activeonly){
				$where["status"]=1;
			}
			$query = $CI->db->get_where("cs_users",$where);
			
			if($query && $query->num_rows() == 1){
				return $query->row()->user_id;
			}
		}
		return false;
		
	}
}