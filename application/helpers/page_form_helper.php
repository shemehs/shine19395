<?php if( ! defined('BASEPATH')) exit('No direct script access allowed.');
if(!function_exists("set_disable_this")){
	function set_disable_this($ind,$disabled=false){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if($ind){
		
			$OBJ->disabled_states[strtolower(trim($ind))] = ($disabled)?true:false;

		}
	}
}
if(!function_exists("disable_this")){
	function disable_this($ind,$default = false){
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->disabled_states[strtolower(trim($ind))])){
				if($OBJ->disabled_states[strtolower(trim($ind))]){
					return 'disabled = "disabled"';
				}else{
					return '';
				}
			}
		}

		if($default){
			return 'disabled = "disabled"';
		}
		return false;
	}
}
if(!function_exists("set_has_value")){
	function set_has_value($ind,$value=''){

		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if($ind){
			
			$OBJ->form_values[strtolower(trim($ind))] = $value;


		}
		
	}
}
if(!function_exists("has_value")){
	function has_value($ind){
		
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->form_values[strtolower(trim($ind))])){
				
				return true;
			}
		}
		return false;
		
	}
}

if(!function_exists("get_value")){
	function get_value($ind){
		
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->form_values[strtolower(trim($ind))])){
				return $OBJ->form_values[strtolower(trim($ind))];
			}
		}
		return false;
		
	}
}

if(!function_exists("set_is_checked")){
	function set_is_checked($ind,$value='',$status=false){

		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if($ind){
			
			$OBJ->is_checked[strtolower(trim($ind))][$value] = $status;


		}
		
	}
}
if(!function_exists("is_checked")){
	function is_checked($ind,$value){
		
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->is_checked[strtolower(trim($ind))][$value]) && ($OBJ->is_checked[strtolower(trim($ind))][$value])){
				
				return true;
			}
		}
		return false;
		
	}
}

if(!function_exists("check_it")){
	function check_it($ind,$value,$default_check = false){
		
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->is_checked[strtolower(trim($ind))][$value]) && ($OBJ->is_checked[strtolower(trim($ind))][$value])){
				
				return ' checked = "checked " ';
			}
		}
		if($default_check){
			return ' checked = "checked " ';
		}else{
			return "";
		}
		
	}
}

if(!function_exists("count_is_checked")){
	function count_is_checked($ind){
		$is_checked = 0;
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->is_checked[strtolower(trim($ind))])){
				$check_array = $OBJ->is_checked[strtolower(trim($ind))];
				if($check_array && is_array($check_array) && count($check_array)>0){
					foreach($check_array as $checki => $checkinfo){
						if($checkinfo){
							$is_checked++;
						}
					}
				}
			}
		}
		return $is_checked;
		
	}
}