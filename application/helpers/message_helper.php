<?php if( ! defined('BASEPATH')) exit('No direct script access allowed.');
if(!function_exists("set_message")){
	function set_message($ind,$mess){
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		$OBJ->message[strtolower(trim($ind))] = $mess;
	}
}
if(!function_exists("set_message_title")){
	function set_message_title($ind,$mess=''){
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		$OBJ->message_title[strtolower(trim($ind))] = $mess;
	}
}
if(!function_exists("set_message_type")){
	function set_message_type($ind,$mess=''){
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		$OBJ->message_type[strtolower(trim($ind))] = $mess;
	}
}
if(!function_exists("set_flash_message_type")){
	function set_flash_message_type($ind,$mess=''){
		$CI =& get_instance();
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		$OBJ->flashmessagetype[strtolower(trim($ind))] = $mess;
			
		
		$CI->session->set_flashdata("flashmessagelibmessagetypes",$OBJ->flashmessagetype);
		
	}
}
if(!function_exists("set_flash_message")){
	function set_flash_message($ind,$mess=''){
		$CI =& get_instance();
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		$OBJ->flashmessage[strtolower(trim($ind))] = $mess;
			
		
		$CI->session->set_flashdata("flashmessagelibmessages",$OBJ->flashmessage);
		
	}
}
if(!function_exists("set_flash_message_title")){
	function set_flash_message_title($ind,$mess=''){
		$CI =& get_instance();
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		$OBJ->flashmessagetitle[strtolower(trim($ind))] = $mess;
			
		
		$CI->session->set_flashdata("flashmessagelibmessagetitles",$OBJ->flashmessagetitle);
		
	}
}
if(!function_exists("view_message")){
	
	function view_message($ind = false,$ot=false,$ct=false,$concat_array=false){
	 
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		
		if($OBJ->message && is_array($OBJ->message) && count($OBJ->message)>0){
			$ot = ($ot!==false)?$ot:(($ct!==false)?"":false);
			$ct = ($ct!==false)?$ct:(($ot!==false)?"":"");
			$ot = ($ot===false)?"":$ot;
			
			$newmessage = array();
			$stringmessage = '';
			if($ind){
				$ind = strtolower(trim($ind));
				if($ind !== ''){
					$message = element($ind,$OBJ->message);
					if(is_array($message)){
						
						foreach($message as $mes => $mesa){
							if($concat_array){
							
								$stringmessage .= $ot.$mesa.$ct;
							
							}else{
								
								$newmessage[$mes] = $ot.$mesa.$ct;
							
							}
						
						}
						if($concat_array){
							
							return $stringmessage;
						
						}else{
							
							return $newmessage;
						
						}
					
					}else{
						
						$stringmessage .= $ot.$message.$ct;
						return $stringmessage;
					}
					
				
				}else{
				
					return false;
				
				}
			}else{
				
				foreach($OBJ->message as $qwe => $ert){
					if($concat_array){
							
						$stringmessage .= $ot.$mesa.$ct;
					
					}else{
						
						$newmessage[$mes] = $ot.$mesa.$ct;
					
					}
				
				}
				if($concat_array){
							
					return $stringmessage;
				
				}else{
					
					return $newmessage;
				
				}
			}
		}
		return false;
	 }
}
if(!function_exists("get_message_title")){
	
	function get_message_title($ind = false){
	 
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if(isset($OBJ->message_title) && $OBJ->message_title && is_array($OBJ->message_title) && count($OBJ->message_title)>0){
			if($ind){
				$ind = strtolower(trim($ind));
				if($ind !== ''){
					if(isset($OBJ->message_title[$ind])){
						return $OBJ->message_title[$ind];
					}
				}
			}else{
				return false;
			}
		}
		return false;
	 }
}
if(!function_exists("get_message_type")){
	
	function get_message_type($ind = false){
	 
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if(isset($OBJ->message_type) && $OBJ->message_type && is_array($OBJ->message_type) && count($OBJ->message_type)>0){
			if($ind){
				$ind = strtolower(trim($ind));
				if($ind !== ''){
					if(isset($OBJ->message_type[$ind])){
						return $OBJ->message_type[$ind];
					}
				}
			}else{
				return false;
			}
		}
		return false;
	 }
}
if(!function_exists("get_message")){
	function get_message($ind = false){
		
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if(isset($OBJ->message) && $OBJ->message && is_array($OBJ->message) && count($OBJ->message)>0){
			if($ind){
				$ind = strtolower(trim($ind));
				if($ind !== ''){
					if(isset($OBJ->message[$ind])){
						return $OBJ->message[$ind];
					}
				}
			}else{
				return false;
			}
		}
		return false;
		
	}
}

if(!function_exists("has_message")){
	function has_message($ind = false){
		
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if($OBJ->message && is_array($OBJ->message) && count($OBJ->message)>0){
			if($ind){
				$ind = strtolower(trim($ind));
				if($ind !== ''){
					if(isset($OBJ->message[$ind])){
						return true;
					}
				}
			}else{
				return true;
			}
		}
		return false;
		
	}
}

if(!function_exists("has_message_title")){
	function has_message_title($ind = false){
	
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if($OBJ->message_title && is_array($OBJ->message_title) && count($OBJ->message_title)>0){
			if($ind){
				$ind = strtolower(trim($ind));
				if($ind !== ''){
					if(isset($OBJ->message_title[$ind])){
						return true;
					}
				}
			}else{
				return true;
			}
		}
		return false;
		
	}
}	

if(!function_exists("has_message_type")){
	function has_message_type($ind = false){
	
		$OBJ =& get_message_lib_obj();

		if ($OBJ === FALSE){
			return false;
		}
		if($OBJ->message_type && is_array($OBJ->message_type) && count($OBJ->message_type)>0){
			if($ind){
				$ind = strtolower(trim($ind));
				if($ind !== ''){
					if(isset($OBJ->message_type[$ind])){
						return true;
					}
				}
			}else{
				return true;
			}
		}
		return false;
		
	}
}
if(!function_exists("get_alert_message")){
	function get_alert_message($ind = false,$closable=true,$withicon=true){
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			
			$ret = false;
			$message = (has_message($ind))?get_message($ind):false;
			$messagetype = (has_message_type($ind))?get_message_type($ind):false;
			$messagetitle = (has_message_title($ind))?get_message_title($ind):false;
			if($message){
			 	$messagetype = checkAlerttype($messagetype);
			 	$messagetitle = checkMessagetitle($messagetitle);
				$ret = makeAlertmessage($messagetitle,$messagetype,$message,$closable,$withicon);
			}
		return $ret;
	}
}
if(!function_exists("checkMessagetitle")){
	function checkMessagetitle($messagetitle){
		if($messagetitle){
			if(is_array($messagetitle)){
				if(count($messagetitle)>0){
					$firstmessagetitle = false;
					foreach($messagetitle as $messagetitlei => $messagetitleinfo){
						$firstmessagetitle = $messagetitleinfo;
						break;
					}
					return checkMessagetitle($firstmessagetitle);
				}
			}else{
				return trim($messagetitle);
			}
			return false;
		}
	}
}
if(!function_exists("checkAlerttype")){
	function checkAlerttype($type){
		if($type){
			if(is_array($type)){
				if(count($type)>0){
					$firsttype = false;
					foreach($type as $typei => $typeinfo){
						$firsttype = $typeinfo;
						break;
					}
					return checkAlerttype($firsttype);
				}
			}else{
				switch(strtolower(trim($type))){
					case "danger":
						return "danger";
						break;
					case "warning":
						return "warning";
						break;
					case "info":
						return "info";
						break;
					case "success":
						return "success";
						break;
					default:
						return "info";
						break;
				}
			}
		}
		
		return "info";
	}
}
if(!function_exists("getAlerticon")){
	function getAlerticon($type){
		if($type && (!is_array($type))){
			
				switch(strtolower(trim($type))){
					case "danger":
						return "glyphicon glyphicon-alert";
						break;
					case "warning":
						return "glyphicon glyphicon-exclamation-sign";
						break;
					case "info":
						return " glyphicon glyphicon-info-sign";
						break;
					case "success":
						return "glyphicon glyphicon-ok-sign";
						break;
					default:
						return false;
						break;
				}
			
		}
		return false;
	}
}
if(!function_exists("makeAlertmessage")){
	function makeAlertmessage($messagetitle,$messagetype,$newmessage,$closable=false,$withicon=false){
		$alertmessage = '
			<div class="alert alert-'.$messagetype.' rounded-corners '.(($closable)?"alert-dismissible":"").'"  role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				';
		$alerticon = ($withicon)?getAlerticon($messagetype):false;
		
			if(is_array($newmessage)){
				if($alerticon){
					$alertmessage .= '<span class="fa '.$alerticon.' fa-3x pull-left"></span>';
				}
				$alertmessage .= '
					<p class=" '.(($alerticon)?"margin-left-50":"").'">
						<strong>
							'.$messagetitle.'
						</strong>
					</p>';
				$alertmessage .= '<div class=" '.(($alerticon)?"margin-left-50":"").'">';
				
					foreach($newmessage as $ni => $nm){
						$alertmessage .= '<p class="margin-0 padding-0" >'.$nm.'</p>';
					}
				
				$alertmessage .= '</div>';	
			}else{
				if($alerticon){
					$alertmessage .= '<span class="'.$alerticon.' "></span> ';
				}
				 $alertmessage .= '<strong>'.$messagetitle.'</strong> ';
				 $alertmessage .= $newmessage;
			}
		$alertmessage .= '</div>';
		return $alertmessage ;
	}
}
if(!function_exists("has_error")){
	function has_error($ind,$returniftrue=true,$returniffalse=false){
		
		if($ind){
		
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			if(isset($OBJ->has_error[strtolower(trim($ind))])){
				if($OBJ->has_error[strtolower(trim($ind))]){
					return $returniftrue;
				}else{
					return $returniffalse;
				}
			}
			
		}
		return $returniffalse;
	}
}
if(!function_exists("has_success")){
	function has_success($ind,$returniftrue=true,$returniffalse=false){
		if($ind){
		
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			if(isset($OBJ->has_success[strtolower(trim($ind))])){
				if($OBJ->has_success[strtolower(trim($ind))]){
					return $returniftrue;
				}else{
					return $returniffalse;
				}
			}
			
		}
		return false;
	}
}
if(!function_exists("set_has_error")){
	function set_has_error($ind,$error){
		
		if($ind){
		
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			$OBJ->has_error[strtolower(trim($ind))] = ($error)?$error:false;
			
		}
	}
}

if(!function_exists("set_has_success")){
	function set_has_success($ind,$success){
		if($ind){
		
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			$OBJ->has_success[strtolower(trim($ind))] = ($success)?$success:false;
			
		}
	}
}
if(!function_exists("set_flash_has_error")){
	function set_flash_has_error($ind,$flasherror){
		
		if($ind){
		
			$CI =& get_instance();
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			$OBJ->flash_has_error[strtolower(trim($ind))] = ($flasherror)?$flasherror:false;
			$CI->session->set_flashdata("flashmessagelibhaserror",$OBJ->flash_has_error);
		}
	}
}

if(!function_exists("set_flash_has_success")){
	function set_flash_has_success($ind,$flashsuccess){
		if($ind){
		
			$CI =& get_instance();
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			$OBJ->flash_has_success[strtolower(trim($ind))] = ($flashsuccess)?$flashsuccess:false;
			$CI->session->set_flashdata("flashmessagelibhassuccess",$OBJ->flash_has_success);
		}
	}
}
if(!function_exists("add_logs")){
	function add_logs($log){
		if($log){
		
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			$index = now();
			$log_string = mdate("%Y-%m-%d %H:%i:%s %A",now()).'<p class="padding-0 margin-0 text-left"> - '.$log.'</p>';
			if(isset($OBJ->logs[$index])){
				if(is_array($OBJ->logs[$index])){
					$OBJ->logs[$index][] = $log_string;
				}else{
					$value = $OBJ->logs[$index];
					$OBJ->logs[$index] = array($value);
					$OBJ->logs[$index][] = $log_string;
				}
			}else{
				$OBJ->logs[$index] = $log_string;
			}
		}
	}
}
if(!function_exists("get_logs")){
	function get_logs($index=false){
		
			$OBJ =& get_message_lib_obj();

			if ($OBJ === FALSE){
				return false;
			}
			if($index){
				if(isset($OBJ->logs[$index])){
					return $OBJ->logs[$index];
				}else{
					return false;
				}
			}else{
				return $OBJ->logs;
			}
			
			
	}
}

if(!function_exists("get_message_lib_obj")){
	function &get_message_lib_obj()
	{

		$CI =& get_instance();

		// We set this as a variable since we're returning by reference.
		$return = FALSE;
		
		if (FALSE !== ($object = $CI->load->is_loaded('messagelib')))
		{	

			if ( ! isset($CI->$object) OR ! is_object($CI->$object))
			{
				return $return;
			}
			
			return $CI->$object;
		}else{

			$CI->load->library("messagelib");
			if (FALSE !== ($object = $CI->load->is_loaded('messagelib')))
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