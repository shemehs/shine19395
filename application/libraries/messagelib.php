<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class MessageLib{

	private $CI;
	public $message;
	public $message_title;
	public $message_type;
	public $flashmessage;
	public $flashmessagetitle;
	public $flashmessagetype;
	
	public $has_error;
	public $has_error_message;
	public $has_success;
	public $flash_has_error;
	public $flash_has_error_message;
	public $flash_has_success;
	
	public $logs;
	
	public $is_active;
	public $flash_is_active;
	function __construct(){
	
		$this->CI =& get_instance();
		
		$message = array();
		$message_title = array();
		$flashmessage = array();
		$flashmessagetitle = array();
		
		$this->message = $this->CI->session->flashdata("flashmessagelibmessages");
		$this->message_title = $this->CI->session->flashdata("flashmessagelibmessagetitles");
		$this->message_type = $this->CI->session->flashdata("flashmessagelibmessagetypes");
		$this->has_error = $this->CI->session->flashdata("flashmessagelibhaserror");
		$this->has_error_message = $this->CI->session->flashdata("flashmessagelibhaserrormessage");
		$this->has_success = $this->CI->session->flashdata("flashmessagelibhassuccess");
		$this->is_active = $this->CI->session->flashdata("flashmessagelibisactive");
	}
	
	function makeAlertmessage($messagetitle,$messagetype,$newmessage,$closable=false){
		$alertmessage = '
			<div class="alert alert-'.$messagetype.' rounded-corners '.(($closable)?"alert-dismissible":"").'"  role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				<i class="fa fa-check-circle fa-3x pull-left"></i>
				<p class=" margin-left-50">
					<strong>
						'.$messagetitle.'
					</strong>
				</p>';
			$alertmessage .= '<div class=" margin-left-50">';
			if(is_array($newmessage)){
				foreach($newmessage as $ni => $nm){
					$alertmessage .= '<p class="margin-0 padding-0" >'.$nm.'</p>';
				}
			}else{
				$alertmessage .= '<p class="margin-0 padding-0" >'.$newmessage.'</p>';
			}
			$alertmessage .= '</div>';	
		$alertmessage .= '</div>';
			return $alertmessage ;
	}
	function get_simple_alert_message($ind = false,$array_alerts=false,$closable=false){
	
			$ret = false;
			$newmessage = ($this->get_message($ind))?$this->view_message($ind):false;
			$newmessagetype = ($this->get_message($ind))?$this->get_message_type($ind):false;
			$newmessagetitle = ($this->get_message($ind))?$this->get_message_title($ind):false;
			if($newmessage){
				 if(is_array($newmessage)){
					if(count($newmessage)>0){
						
						if($array_alerts){
							$ret = array();
							$messagetype = ($newmessagetype)?(is_array($newmessagetype)?((count($newmessagetype)>0)?$newmessagetype:array("info")):array($newmessagetype)):array("info");
							$messagetitle = ($newmessagetitle)?(is_array($newmessagetitle)?((count($newmessagetitle)>0)?$newmessagetitle:array("Alert!")):array($newmessagetitle)):array("Alert!");
							
							foreach($newmessage as $ni => $nm){
								$messageti =  isset($messagetitle[$ni])?($messagetitle[$ni]):(isset($messagetitle[0])?$messagetitle[0]:"Alert!");
								$messagety = isset($messagetype[$ni])?checkAlerttype($messagetype[$ni]):(isset($messagetype[0])?checkAlerttype($messagetype[0]):"info!");
								$ret[] = $this->makeSimplelertmessage($messageti,$messagety,$nm,$closable);
							}
						
						}else{
							$messagetype = ($newmessagetype)?(is_array($newmessagetype)?((count($newmessagetype)>0)?checkAlerttype($newmessagetype[0]):"info"):checkAlerttype($newmessagetype)):"info";
							$messagetitle = ($newmessagetitle)?(is_array($newmessagetitle)?((count($newmessagetitle)>0)?$newmessagetitle[0]:"Alert!"):$newmessagetitle):"Alert!";
							$ret = $this->makeSimplelertmessage($messagetitle,$messagetype,$newmessage,$closable);
						
						}
					}
				 }else{
					$messagetype = ($newmessagetype)?(is_array($newmessagetype)?"info":checkAlerttype($newmessagetype)):"info";
					$messagetitle = ($newmessagetitle)?(is_array($newmessagetitle)?"Alet!":$newmessagetitle):"Alert!";
					$ret = $this->makeSimplelertmessage($messagetitle,$messagetype,$newmessage,$closable);
				}
			}
		return $ret;
	}
	function makeSimplelertmessage($messagetitle,$messagetype,$newmessage,$closable=false){
		$alertmessage = '
					<div class="alert alert-warning '.(($closable)?"alert-dismissible":"").'   rounded-corners" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>'.(($messagetitle)?$messagetitle:"").'</strong> 
					 ';
		if(is_array($newmessage)){
			foreach($newmessage as $ni => $nm){
				if($ni>1){
					$alertmessage .= $nm;
				}else{
					$alertmessage .= '<p class="margin-0 padding-0" >'.$nm.'</p>';

				}
			}
		}else{
			$alertmessage .= '<p class="margin-0 padding-0" >'.$newmessage.'</p>';
		}
		$alertmessage = '</div>';
		
			return $alertmessage ;
	}
}