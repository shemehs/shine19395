<?php if( ! defined('BASEPATH')) exit('No direct script access allowed.');
if(!function_exists("set_hide_this")){
	function set_hide_this($ind,$disabled=false){
		$OBJ =& get_page_info_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if($ind){
		
			$OBJ->hide_this[strtolower(trim($ind))] = ($disabled)?true:false;

		}
	}
}
if(!function_exists("hide_this")){
	function hide_this($ind,$default = false){
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->hide_this[strtolower(trim($ind))])){
				if($OBJ->hide_this[strtolower(trim($ind))]){
					return "sr-only";
				}else{
					return false;
				}
			}
		}

		if($default){
			return "sr-only";
		}
		
		return false;
	}
}
if(!function_exists("set_element_title")){
	function set_element_title($ind,$titlecontent=""){
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			$OBJ->element_titles[strtolower(trim($ind))] = $titlecontent;
		}
		return false;
	}
}
if(!function_exists("set_flash_element_title")){
	function set_flash_element_title($ind,$titlecontent=""){
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){

			$OBJ->flash_element_titles[strtolower(trim($ind))] = $titlecontent;
				
			$CI =& get_instance();

			$CI->session->set_flashdata("flashelementtitles",$OBJ->flash_element_titles);
			
		}
		return false;
	}
}
if(!function_exists("get_element_title")){
	function get_element_title($ind,$default=""){
		
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->element_titles[strtolower(trim($ind))])){
				return $OBJ->element_titles[strtolower(trim($ind))];
			}
		}
		return $default;
		
	}
}

if(!function_exists("set_icon_class")){
	function set_icon_class($ind,$iconclass=""){
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			$OBJ->icon_classes[strtolower(trim($ind))] = $iconclass;
		}
		return false;
	}
}
if(!function_exists("set_flash_icon_class")){
	function set_flash_icon_class($ind,$iconclass=""){
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){

			$OBJ->flash_icon_classes[strtolower(trim($ind))] = $iconclass;
				
			$CI =& get_instance();

			$CI->session->set_flashdata("flashiconclasses",$OBJ->flash_icon_classes);
			
		}
		return false;
	}
}
if(!function_exists("get_icon_class")){
	function get_icon_class($ind,$default=""){
		
		$OBJ =& get_page_info_obj();
		if ($OBJ === false){
			return false;
		}
		if($ind){
			if(isset($OBJ->icon_classes[strtolower(trim($ind))])){
				return $OBJ->icon_classes[strtolower(trim($ind))];
			}
		}
		return $default;
		
	}
}