<?php if( ! defined('BASEPATH')) exit('No direct script access allowed.');

if(!function_exists("get_login_info")){
	function get_login_info($login_id){
		$logininfo = false;
		if($login_id && (int)$login_id>0){
			$CI =& get_instance();
			$query = $CI->db->select("*")->from("cs_logins")->where(array("login_id"=>$login_id))->get();
			if($query && $query->num_rows()==1){
				
				$CI->load->model("login_model");
				$logininfo = new Login_Model();

				$rw = $query->row();
				$logininfo->setLoginid($rw->login_id);
				$logininfo->setUserid($rw->user_id);
				$logininfo->setLastactivity($rw->last_activity);
				$logininfo->setSessionid($rw->session_id);
				$logininfo->setIpaddress($rw->ip_address);
				$logininfo->setStatus($rw->status);
				$logininfo->setLastlogin($rw->last_login);
				$logininfo->setLastupdate($rw->last_update);

			}
		}
		return $logininfo;
	}
}

if(!function_exists("get_user_info")){
	function get_user_info($user_id){
		$userinfo = false;
		if($user_id && (int)$user_id>0){
			$CI =& get_instance();
			$query = $CI->db->select("*")->from("cs_users")->where(array("user_id"=>$user_id))->get();
			if($query && $query->num_rows()==1){
				
				$CI->load->model("user_model");
				$userinfo = new User_Model();

				$rw = $query->row();
				$userinfo->setUsername($rw->username);
				$userinfo->setUserid($rw->user_id);
				$userinfo->setPassword($rw->password);
				$userinfo->setStatus($rw->status);
				$userinfo->setLevel($rw->level);
				$userinfo->setType($rw->type);
				$userinfo->setCreatedon($rw->created_on);
				$userinfo->setLastupdate($rw->last_update);

			}
		}
		return $userinfo;
	}

}

if(!function_exists("isLogin")){
	function isLogin()
	{
		
			$OBJ =& get_authenticate_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			
			return $OBJ->isLogin();
	}
}
if(!function_exists("get_authenticate_lib_obj")){
	function &get_authenticate_lib_obj()
	{

		$CI =& get_instance();

		// We set this as a variable since we're returning by reference.
		$return = FALSE;
		
		if (FALSE !== ($object = $CI->load->is_loaded('authenticate')))
		{	

			if ( ! isset($CI->$object) OR ! is_object($CI->$object))
			{
				return $return;
			}
			
			return $CI->$object;
		}else{

			$CI->load->library("authenticate");
			if (FALSE !== ($object = $CI->load->is_loaded('authenticate')))
			{
				if ( ! isset($CI->$object) OR ! is_object($CI->$object))
				{
					return $return;
				}
				return $CI->$object;
			}	
		}
		
		return $return;
	}
}