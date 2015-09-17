<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_info {

	private $CI;
	private $page_info;
	private $page_content;
	private $page_script;
	private $unique_page_script;
	private $flash_page_script;
	private $flash_unique_page_script;

	public $disabled_states;
	public $hide_this;
	public $form_values;
	public $link_urls;
	public $element_titles;
	public $icon_classes;
	public $page_links;
	public $is_checked;
	function __construct(){
	
		$this->CI =& get_instance();

		$flash_unique_page_script = $this->CI->session->flashdata("flashuniquepagescripts");
		$flash_page_script = $this->CI->session->flashdata("flashpagescripts");
		$flash_page_info = $this->CI->session->flashdata("flashpageinfos");
		$flash_unique_page_info = $this->CI->session->flashdata("flashuniquepageinfos");
		$flash_page_content = $this->CI->session->flashdata("flashpagecontents");
		
		$flash_disabled_states = $this->CI->session->flashdata("flashdisabledstates");
		$flash_hide_this = $this->CI->session->flashdata("flashhidethis");
		$flash_form_values = $this->CI->session->flashdata("flashformvalues");
		$flash_link_urls = $this->CI->session->flashdata("flashlinkurls");
		$flash_element_titles = $this->CI->session->flashdata("flashelementtitles");
		$flash_icon_classes = $this->CI->session->flashdata("flashiconclasses");
		$flash_page_links = $this->CI->session->flashdata("flashpagelinks");
		$flash_is_checkeds = $this->CI->session->flashdata("flashischeckeds");


		$this->page_content = $flash_page_content;
		$this->page_info = $flash_page_info;
		$this->page_script = $flash_page_script;
		$this->unique_page_script = $flash_unique_page_script;
		$this->unique_page_info = $flash_unique_page_info;
		
		$this->disabled_states = is_array($flash_disabled_states)?$flash_disabled_states:array();
		$this->hide_this = is_array($flash_hide_this)?$flash_hide_this:array();
		$this->form_values = is_array($flash_form_values)?$flash_form_values:array();
		$this->link_urls = is_array($flash_link_urls)?$flash_link_urls:array();
		$this->element_titles = is_array($flash_element_titles)?$flash_element_titles:array();
		$this->icon_classes = is_array($flash_icon_classes)?$flash_icon_classes:array();
		$this->page_links = is_array($flash_page_links)?$flash_page_links:array();
		$this->is_checked = is_array($flash_is_checkeds)?$flash_is_checkeds:array();
		

		$this->page_info["doctype"] = 'html5';
	
		
		
		$this->page_info["meta"][0] = array(
		
							"viewport"=>array('name'=>'viewport','content'=> 'width=device-width, initial-scale=1.0'),
							"description"=>array('name'=>'description','content'=> 'Wmsu Mvts Esu Class Schedule'),
							"author"=>array('name'=>'author','content'=> 'Shem Deluna Lague'),
							"content_type"=>array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')

							);
		
		$this->page_info["title"] = '';
		
		
		
		
		$this->page_info["stylesheet"] = array(
									
									'font-awesome'=>'font-awesome/css/font-awesome.min',
									'style-helper'=>'css-helper'
								);
		
		
		$this->page_info["javascript"] = array();
	}

	function add_page_content($name,$view){
		$this->page_content[$name] = $view;
	}
	function get_page_content($name){
		if(isset($this->page_content[$name])){
			return $this->page_content[$name];
		}
		return false;
	}
	function add_page_info($name,$info,$unique_key=false){
		switch(strtolower($name)){
			case "doctype":
				$this->page_info["doctype"] = $info;
				break;
			case "meta":
				if(is_array($info)){
					$this->page_info["meta"][] = $infov;
				}else if($unique_key){ 
					$this->page_info["meta"][] = array("name"=>$unique_key,"content"=>$infov);
				}
				break;
			case "title":
				$this->page_info["title"] = $info;
				break;
			case "stylesheet":
				if(is_array($info)){
					foreach($info as $infoi => $infov){
						$this->page_info["stylesheet"][$infoi] = $infov;
					}
				}else{
					$this->page_info["stylesheet"][(($unique_key && $unique_key!==false)?$unique_key:random_string("alnum",5))] = $info;
				}
				break;
			case "media":
				if(is_array($info)){
					foreach($info as $infoi => $infov){
						$this->page_info["media"][$infoi] = $infov;
					}
				}else{
					$this->page_info["media"][(($unique_key && $unique_key!==false)?$unique_key:random_string("alnum",5))] = $info;
				}
				break;
			case "javascript":
				if(is_array($info)){
					foreach($info as $infoi => $infov){
						$this->page_info["javascript"][$infoi] = $infov;
					}
				}else{
					$this->page_info["javascript"][(($unique_key && $unique_key!==false)?$unique_key:random_string("alnum",5))] = $info;
				}
				break;
			default:
				return false;
				break;
		
		}
		return true;
	}
	function get_page_info($name,$subname=false){
		if($subname!==false){
			
			if(isset($this->page_info[$name][$subname])){
				
				return $this->page_info[$name][$subname];
			}
		}else{
			if(isset($this->page_info[$name])){
				return $this->page_info[$name];
			}
		}
		return false;
	}

	function add_page_script($name,$script,$uniquename=false){
		switch(strtolower($name)){
		
			case "jalert":
				$this->page_script["jalert"] = $script;
				break;
			case "jshowmodal":
				$this->page_script["jshowmodal"] = $script;
				break;
			case "jautoscript":
				if($uniquename){
					if(!isset($this->unique_page_script["jautoscript"][$uniquename])){
						$this->unique_page_script["jautoscript"][$uniquename] = true;
						$this->page_script["jautoscript"][] = $script;
					}
				}else{
					$this->page_script["jautoscript"][] = $script;
				}
				
				break;
			case "jscriptfunction":
				if($uniquename){
					if(!isset($this->unique_page_script["jscriptfunction"][$uniquename])){
						$this->unique_page_script["jscriptfunction"][$uniquename] = true;
						$this->page_script["jscriptfunction"][] = $script;
					}
				}else{
					$this->page_script["jscriptfunction"][] = $script;
				}
				
				break;
			case "style":
				$this->page_script["style"][] = $script;
				break;
			default:
				return false;
				break;
			
		}
	}
	function get_page_script($name){
		if(isset($this->page_script[$name])){
			return $this->page_script[$name];
		}
		return false;
	}
	function add_flash_page_script($name,$script,$uniquename=false){
		switch(strtolower($name)){
		
			case "jalert":
				$this->flash_page_script["jalert"] = $script;
				$this->CI->session->set_flashdata("flashpagescripts",$this->flash_page_script);
				break;
			case "jshowmodal":
				$this->flash_page_script["jshowmodal"] = $script;
				$this->CI->session->set_flashdata("flashpagescripts",$this->flash_page_script);
				break;
			case "jautoscript":
				if($uniquename){
					if(!isset($this->flash_unique_page_script["jautoscript"][$uniquename])){
						$this->flash_unique_page_script["jautoscript"][$uniquename] = true;
						$this->flash_page_script["jautoscript"][] = $script;
						$this->CI->session->set_flashdata("flashpagescripts",$this->flash_page_script);
						$this->CI->session->set_flashdata("flashuniquepagescripts",$this->flash_unique_page_script);
					}
				}else{
					$this->flash_page_script["jautoscript"][] = $script;
					$this->CI->session->set_flashdata("flashpagescripts",$this->flash_page_script);
						
				}
				
				break;
			case "jscriptfunction":
				if($uniquename){
					if(!isset($this->flash_unique_page_script["jscriptfunction"][$uniquename])){
						$this->flash_unique_page_script["jscriptfunction"][$uniquename] = true;
						$this->flash_page_script["jscriptfunction"][] = $script;
						$this->CI->session->set_flashdata("flashpagescripts",$this->flash_page_script);
						$this->CI->session->set_flashdata("flashuniquepagescripts",$this->flash_unique_page_script);
					
					}
				}else{
					$this->flash_page_script["jscriptfunction"][] = $script;
					$this->CI->session->set_flashdata("flashpagescripts",$this->flash_page_script);
						
				}
				
				break;
			case "style":
				$this->flash_page_script["style"][] = $script;
				$this->CI->session->set_flashdata("flashpagescripts",$this->flash_page_script);
						
				break;
			default:
				return false;
				break;
			
		}
		
	}
	
}