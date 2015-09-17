<?php if( ! defined('BASEPATH')) exit('No direct script access allowed.');

if(!function_exists("add_page_content")){
	function add_page_content($name,$view){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		return $OBJ->add_page_content($name,$view);
	}
}
if(!function_exists("get_page_content")){
	function get_page_content($name){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		return $OBJ->get_page_content($name);
	}
}
if(!function_exists("add_page_info")){
	function add_page_info($name,$info,$uniquekey=false){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		return $OBJ->add_page_info($name,$info,$uniquekey);
	}
}
if(!function_exists("get_page_info")){
	function get_page_info($name,$subname=false){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		return $OBJ->get_page_info($name,$subname);
	}
}
if(!function_exists("get_page_script")){
	function get_page_script($name){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		return $OBJ->get_page_script($name);
	}
}
if(!function_exists("add_page_script")){
	function add_page_script($name,$script,$uniquename=false){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		return $OBJ->add_page_script($name,$script,$uniquename);
	}
}
if(!function_exists("add_flash_page_script")){
	function add_flash_page_script($name,$script,$uniquename=false){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		return $OBJ->add_flash_page_script($name,$script,$uniquename);
	}
}
if(!function_exists("get_page_info_obj")){
	function &get_page_info_obj()
	{
		$CI =& get_instance();

		// We set this as a variable since we're returning by reference.
		$return = FALSE;
		
		if (FALSE !== ($object = $CI->load->is_loaded('page_info')))
		{
			if ( ! isset($CI->$object) OR ! is_object($CI->$object))
			{
				return $return;
			}
			
			return $CI->$object;
		}
		
		return $return;
	}
}