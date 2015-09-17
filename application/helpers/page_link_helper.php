<?php if( ! defined('BASEPATH')) exit('No direct script access allowed.');

if(!function_exists("is_active")){
	function is_active($ind){
		if($ind){
		
			$OBJ =& get_page_info_obj();

			if ($OBJ === FALSE){
				
				return false;
			}
			if(isset($OBJ->is_active[strtolower(trim($ind))])){
				
				return $OBJ->is_active[strtolower(trim($ind))];	
			}
			
		}
	
		return false;
	}
}
if(!function_exists("set_active")){
	function set_active($ind,$isactive){
		
		if($ind){
		
			
			$OBJ =& get_page_info_obj();

			if ($OBJ === FALSE){
			
				return false;
			}
		
			$OBJ->is_active[strtolower(trim($ind))] = ($isactive)?$isactive:false;
			
		}
	}
}
if(!function_exists("set_flash_active")){
	function set_flash_active($ind,$isactive){
		
		if($ind){
			$OBJ =& get_page_info_obj();

			if ($OBJ === FALSE){
				return false;
			}
			$CI =& get_intsance();
			$OBJ->flash_is_active[strtolower(trim($ind))] = ($isactive)?$isactive:false;
			$CI->session->set_flashdata("flashmessagelibisactive",$OBJ->flash_is_active);
		
		}
	}
}

if(!function_exists("set_link_url")){
	function set_link_url($ind,$url){
		
		if($ind){
		
			
			$OBJ =& get_page_info_obj();

			if ($OBJ === FALSE){
			
				return false;
			}
		
			$OBJ->link_urls[strtolower(trim($ind))] = ($url)?$url:"#";
			
		}
		return false;
	}
}
if(!function_exists("set_flash_link_url")){
	function set_flash_link_url($ind,$url){
		
		if($ind){
			$OBJ =& get_page_info_obj();

			if ($OBJ === FALSE){
				return false;
			}
			$CI =& get_intsance();
			$OBJ->flash_link_urls[strtolower(trim($ind))] = ($isactive)?$isactive:"#";
			$CI->session->set_flashdata("flashmessageliblinkurls",$OBJ->flash_link_urls);
		
		}
	}
}
if(!function_exists("get_link_url")){
	function get_link_url($ind){
		if($ind){
		
			$OBJ =& get_page_info_obj();

			if ($OBJ === FALSE){
				
				return false;
			}
			if(isset($OBJ->link_urls[strtolower(trim($ind))])){
				
				return $OBJ->link_urls[strtolower(trim($ind))];
			}
			
		}
	
		return false;
	}
}
if(!function_exists("add_breadcrumb")){
	function add_breadcrumb($name,$url=false,$status = false,$automatic_index=false){
		if($name){
			$OBJ =& get_page_info_obj();
			if ($OBJ === FALSE){
				
				return false;
			}
			if(is_array($name)){
				if($automatic_index && (int)$automatic_index > 0){
					$OBJ->breadcrumbs[(int)$automatic_index] = $name;
				}else{
					$OBJ->breadcrumbs[] = $name;
				}
					
			}else{
				if($automatic_index && (int)$automatic_index > 0){
					$OBJ->breadcrumbs[(int)$automatic_index] = array("name"=>$name,"url"=>(($url)?$url:"#"),"status"=>(($status)?true:false));
				}else{
					$OBJ->breadcrumbs[] = array("name"=>$name,"url"=>(($url)?$url:"#"),"status"=>(($status)?true:false));
				}
			}
			
			return true;
		}
		return false;
		
	}
}
if(!function_exists("set_breadcrumbs")){
	function set_breadcrumbs($breadcrumb=false){
		if($breadcrumb && is_array($breadcrumb) && count($breadcrumb)>0){
			$OBJ =& get_page_info_obj();
			if ($OBJ === FALSE){
				
				return false;
			}
			$OBJ->breadcrumbs = $breadcrumb;
			return true;
		}
		return false;
	}
}
if(!function_exists("get_breadcrumbs")){
	function get_breadcrumbs(){
		$OBJ =& get_page_info_obj();
		if ($OBJ === FALSE){
			return false;
		}
		if(isset($OBJ->breadcrumbs)){
			return $OBJ->breadcrumbs;
		}
		return false;
	}
}
if(!function_exists("get_breadcrumb")){
	 function get_breadcrumb($ind){
		$OBJ =& get_page_info_obj();
		if ($OBJ === FALSE){
			return false;
		}
		if(isset($OBJ->breadcrumbs[(int)$ind])){
			return $OBJ->breadcrumbs[(int)$ind];
		}
		return false;
	}
}
if(!function_exists("set_page_links")){
	function set_page_links($ind,$links=false){
		if($ind){
			$OBJ =& get_page_info_obj();
			if ($OBJ === FALSE){
				
				return false;
			}
			$OBJ->page_links[strtolower(trim($ind))] = $links;
			return true;
		}
		return false;
	}
}

if(!function_exists("get_page_links")){
	function get_page_links($ind){
		if($ind){
			$OBJ =& get_page_info_obj();
			if ($OBJ === FALSE){
				
				return false;
			}
			if(isset($OBJ->page_links[strtolower(trim($ind))])){
				return $OBJ->page_links[strtolower(trim($ind))];
			}
		}
		return false;
	}
}