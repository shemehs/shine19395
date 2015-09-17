<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Curriculums extends CI_Controller {
	private $data;
	function __construct(){

		parent::__construct();

		$this->load->helper("curriculum");
		$this->output->enable_profiler(true);
		$this->load->model("Curriculum_Model");
		$this->load->model("Semester_Model");
		$this->load->model("Yearlevel_Model");
		$this->load->model("Class_Type_Model");

		$this->load->model("Subject_Model");

		if($this->authenticate->isLogin()){
			if($this->authenticate->isAdmin()){
				if($this->authenticate->isSuperadmin()){

				}else{
					show_404();
				}
			}else{
				show_404();
			}
		}else{
			redirect("login/management");
		}
		
		$this->data["common_views_source_folder"] = "management/dashboard/curriculums";
		
	}
	public function index()
	{
		$this->load->view("management/dashboard/curriculums/pre_view",$this->data);
	}
	public function delete_curriculum_info($curriculum_id = false){
		if($curriculum_id && is_curriculum_exist($curriculum_id)){

			$curriculuminfo = get_curriculum($curriculum_id);
			
			if($curriculuminfo){
				$curriculuminfo->delete();
				if(!is_curriculum_exist($curriculum_id)){
					redirect("dashboard/curriculums");
				}else{
					redirect("dashboard/curriculums/".$curriculuminfo->getCurriculumid());
				}
					
			}
			
			
		}
		show_404();
		
	}
	public function edit_curriculum_info($curriculum_id = false){
		if($curriculum_id && is_curriculum_exist($curriculum_id)){

			$curriculuminfo = get_curriculum($curriculum_id);
			$this->data["curriculuminfo"] = $curriculuminfo;
			if($curriculuminfo && $this->input->post(sha1("updatecurriculum"))){
				if($this->updateCurriculum($curriculuminfo)){
					redirect("dashboard/curriculums/".$curriculuminfo->getCurriculumid());
				}
			}
			$this->load->view("management/dashboard/curriculums/info/edit/view",$this->data);
		}else{
			show_404();
		}
		
	}
	private function updateCurriculum($curriculuminfo){
		$return = false;
		$this->form_validation->set_rules("curriculumType","New curriculum type","required|xss_clean");
		$this->form_validation->set_rules("curriculumCourse","New curriculum course","required|xss_clean");
		$this->form_validation->set_rules("curriculumMajor","New curriculum major","xss_clean");
		$this->form_validation->set_rules("curriculumDescription","New curriculum description","xss_clean");
		$this->form_validation->set_rules("curriculumYear","New curriculum year","xss_clean");
		if($this->form_validation->run() == FALSE){
			if((form_error("curriculumType"))){
				set_has_error("curriculumType",true);
				set_message("curriculumType",form_error("curriculumType"," "," "));
			}
			if((form_error("curriculumCourse"))){
				set_has_error("curriculumCourse",true);
				set_message("curriculumCourse",form_error("curriculumCourse"," "," "));
			}
			if((form_error("curriculumMajor"))){
				set_has_error("curriculumMajor",true);
				set_message("curriculumMajor",form_error("curriculumMajor"," "," "));
			}
			if((form_error("curriculumDescription"))){
				set_has_error("curriculumDescription",true);
				set_message("curriculumDescription",form_error("curriculumDescription"," "," "));
			}

			if((form_error("curriculumYear"))){
				set_has_error("curriculumYear",true);
				set_message("curriculumYear",form_error("curriculumYear"," "," "));
			}
		}else{
			
			
			$ctype = $this->input->post("curriculumType");
			$ccourse = $this->input->post("curriculumCourse");
			$cmajor = $this->input->post("curriculumMajor");
			$cdesc = $this->input->post("curriculumDescription");
			$cyear = $this->input->post("curriculumYear");

			
			if($ctype && is_curriculum_type_exist($ctype)){
				$curriculuminfo->setCurriculumtypeid($ctype);
				if($ccourse && (int)$ccourse > 0 && is_course_exist($ccourse)){
					$errorz = 0;
					$curriculuminfo->setCourseid($ccourse);
					if($cmajor){
						if((int)$cmajor > 0 && is_major_exist($cmajor)){
							$curriculuminfo->setMajorid($cmajor);
						}else{
							$errorz++;
							set_has_error("curriculumMajor",true);
							set_message("curriculumMajor","Invalid Major selected.");
						}
					}else{
						if($curriculuminfo->major_id){
							$curriculuminfo->major_id = false;
						}
					}
					if($cdesc){
						$curriculuminfo->setDescription($cdesc);
					}else{
						if($curriculuminfo->description){
							$curriculuminfo->description = false;
						}
					}
					if($cyear){
						$ystart = 1970;
		    			$now 	= mdate("%Y",now());
		    			$yend		= $now+10;
						if((int)$cyear >= $ystart && (int)$cyear <= $yend){
							$curriculuminfo->setYear($cyear);
						}else{
							$errorz++;
							set_has_error("curriculumYear",true);
							set_message("curriculumYear","Invalid Year.");
						}
						
					}else{
						$curriculuminfo->year = false;
					}
					
					if($errorz == 0){
						if($curriculuminfo->update()){
							//some changes has been successfully saved.
						}else{
							//No changes has been made.
						}
						$return = true;
					}
					
					
				}else{
					set_has_error("curriculumCourse",true);
					set_message("curriculumCourse","Invalid Course selected");
				}
			}else{
				set_has_error("curriculumType",true);
				set_message("curriculumType","Invalid type selected.");
			}
		}
		return $return;
	}

	public function curriculum_list(){
		$this->load->view("management/dashboard/curriculums/list/pre_view",$this->data);
	}
	public function curriculum_create(){
		if($this->input->post(sha1("createcurriculum"))){
			if($curriculum_id = $this->createCurriculum()){
				redirect("dashboard/curriculums/".$curriculum_id."/subjects");
			}
		}
		$this->load->view("management/dashboard/curriculums/create/pre_view",$this->data);
	}
	private function createCurriculum(){
		$return = false;
		$this->form_validation->set_rules("curriculumType","Curriculum type","trim|required|xss_clean");
		$this->form_validation->set_rules("curriculumCourse","Curriculum course","trim|required|xss_clean");
		$this->form_validation->set_rules("curriculumMajor","Curriculum major","trim|xss_clean");
		$this->form_validation->set_rules("curriculumDescription","Curriculum description","trim|xss_clean");
		$this->form_validation->set_rules("curriculumYear","Curriculum year","trim|xss_clean");
		if($this->form_validation->run() == FALSE){
			if((form_error("curriculumType"))){
				set_has_error("curriculumType",true);
				set_message("curriculumType",form_error("curriculumType"," "," "));
			}
			if((form_error("curriculumCourse"))){
				set_has_error("curriculumCourse",true);
				set_message("curriculumCourse",form_error("curriculumCourse"," "," "));
			}
			if((form_error("curriculumMajor"))){
				set_has_error("curriculumMajor",true);
				set_message("curriculumMajor",form_error("curriculumMajor"," "," "));
			}
			if((form_error("curriculumDescription"))){
				set_has_error("curriculumDescription",true);
				set_message("curriculumDescription",form_error("curriculumDescription"," "," "));
			}

			if((form_error("curriculumYear"))){
				set_has_error("curriculumYear",true);
				set_message("curriculumYear",form_error("curriculumYear"," "," "));
			}
		}else{
			
			$newcurriculuminfo = new Curriculum_Model();
			$ctype = $this->input->post("curriculumType");
			$ccourse = $this->input->post("curriculumCourse");
			$cmajor = $this->input->post("curriculumMajor");
			$cdesc = $this->input->post("curriculumDescription");
			$cyear = $this->input->post("curriculumYear");
			
			if($ctype && is_curriculum_type_exist($ctype)){
				$newcurriculuminfo->setCurriculumtypeid($ctype);
				if($ccourse && (int)$ccourse > 0 && is_course_exist($ccourse)){
					$errorz = 0;
					$newcurriculuminfo->setCourseid($ccourse);
					if($cmajor){
						if((int)$cmajor > 0 && is_major_exist($cmajor)){
							$newcurriculuminfo->setMajorid($cmajor);
						}else{
							set_has_error("curriculumMajor",true);
							set_message("curriculumMajor","Invalid major selected.");
						}
					}
					if($cdesc){
						$newcurriculuminfo->setDescription($cdesc);
					}
					
					if($cyear){
						$ystart = 1970;
		    			$now 	= mdate("%Y",now());
		    			$yend		= $now+10;
						if((int)$cyear >= $ystart && (int)$cyear <= $yend){
							$newcurriculuminfo->setYear($cyear);
						}else{
							$errorz++;
							set_has_error("curriculumYear",true);
							set_message("curriculumYear","Invalid Year.");
						}
						
					}
					if($errorz == 0){
						$return  = $newcurriculuminfo->saveasnew();
					}
				}else{
					set_has_error("curriculumCourse",true);
					set_message("curriculumCourse","Invalid course selected.");
				}
			}else{
				set_has_error("curriculumType",true);
				set_message("curriculumType","Invalid type selected.");
			}
			
		}
		return $return;
	}
	
	public function curriculum_info($currid=false){
		if($currid){
			$curriculuminfo = get_curriculum($currid);
			if($curriculuminfo){
				$this->data["curriculuminfo"] = $curriculuminfo;
				$this->load->view("management/dashboard/curriculums/info/pre_view",$this->data);
			}else{
				show_404();
			}
		}else{
			if($this->input->post(sha1("selectcurriculuminfo"))){
				$this->form_validation->set_rules("curriculumSelectinfo","Curriculum","trim|required|xss_clean");
				if($this->form_validation->run() == false){
					redirect("dashboard/curriculums");
				}else{
					$selectcurrid = $this->input->post("curriculumSelectinfo");
					$curriculuminfo = get_curriculum($selectcurrid);
					if($curriculum_info){
						$this->data["curriculuminfo"] = $curriculuminfo;
						$this->load->view("management/dashboard/curriculums/info/pre_view",$this->data);
					}else{
						redirect("dashboard/curriculums");
					}
				}				
			}else{
				show_404();
			}

		}
	}
	public function curriculum_subjects($curriculum_id=false){
		if($curriculum_id && is_curriculum_exist($curriculum_id)){
			$curriculuminfo = get_curriculum($curriculum_id);
			if($curriculuminfo){

				$this->data["curriculuminfo"] = $curriculuminfo;
				$this->filtercurriculumsubjects($curriculuminfo);
				$this->searchcurriculumsubjects($curriculuminfo);
				if($this->input->post(sha1("customizecurriculumsubjects"))){
					$action = $this->input->post("customizeCurriculumsubjectsaction");
					if($action){
						switch(strtolower(trim($action))){
							case "deleteallselected":
								$this->delete_all_selected_curriculum_subjects();
								break;
						}
					}
				}
				
				$this->load->view("management/dashboard/curriculums/info/subjects/pre_view",$this->data);
			
			}else{
				show_404();
			}
		}else{
			show_404();
		}
		
	}
	private function delete_all_selected_curriculum_subjects(){
		$this->form_validation->set_rules("curriclumSubject[]","Curriculum Subject",'trim|required|xss_clean');
		if($this->form_validation->run() == false){

		}else{
			$curriculum_subjects = $this->input->post("curriclumSubject");
			if($curriculum_subjects && is_array($curriculum_subjects) && count($curriculum_subjects)>0){
				foreach($curriculum_subjects as $csi => $csid){
					if($this->is_valid_curriculum_subject($csid)){
						$csinfo = get_curriculum_subject($csid);
						if($csinfo){
							$csinfo->delete();
						}
					}
					
				}
			}
		}
	} 

	private function is_valid_curriculum_subject($cs_id=false){
		if($cs_id && isset($this->data["curriculuminfo"]) && $this->data["curriculuminfo"]){
			if($this->data["curriculuminfo"]->hasCurriculumsubject($cs_id)){
				return $cs_id;
			}
		}
		return false;

	}
	private function filtercurriculumsubjects(){
		$fsemester = false;
		$fyearlevel = false;
		if($this->input->post(sha1("filtercurriculumsubjects"))){

			$this->form_validation->set_rules("fcurriculumsubjectssemester","Semester","trim|xss_clean|integer");
			$this->form_validation->set_rules("fcurriculumsubjectsyearlevel","Yearlevel","trim|xss_clean|integer");
			
			if($this->form_validation->run() == false){
				
				if(form_error("fcurriculumsubjectssemester")){
					$fsemester = false;
				}else{
					$fsemester = $this->input->post("fcurriculumsubjectssemester");
				}
				if(form_error("fcurriculumsubjectsyearlevel")){
					$fyearlevel = false;
				}else{
					$fyearlevel = $this->input->post("fcurriculumsubjectsyearlevel");
				}

			}else{

				$fsemester = $this->input->post("fcurriculumsubjectssemester");
				$fyearlevel = $this->input->post("fcurriculumsubjectsyearlevel");
				
			}	
			
			$fsemester = $this->is_invalid_cssemester($fsemester);
			$fyearlevel = $this->is_invalid_csyearlevel($fyearlevel);
			
		}else{
			if($this->input->get("filter")){
				$fsemester = $this->input->get("fsemester");
				$fyearlevel = $this->input->get("fyearlevel");
				if($fsemester && ($fsemester=(int)$fsemester) > 0 && $this->is_invalid_cssemester($fsemester)){
					$fsemester = $fsemester;
				}else{
					$fsemester = false;
				}
				if($fyearlevel && ($fyearlevel=(int)$fyearlevel) > 0 && $this->is_invalid_csyearlevel($fyearlevel)){
					$fyearlevel = $fyearlevel;
				}else{
					$fyearlevel = false;
				}
			}
		}
		if($fsemester || $fyearlevel){

			set_has_value("filtercurriculumsubjects",random_string("alnum",5));
			if($fsemester){
				set_has_value("fcurriculumsubjectssemester",$fsemester);
			}
			if($fyearlevel){
				set_has_value("fcurriculumsubjectsyearlevel",$fyearlevel);
			}
		}
		
	}
	private function is_invalid_cssemester($sem_id=false){
		if($sem_id && isset($this->data["curriculuminfo"]) && $this->data["curriculuminfo"]){
			if($this->data["curriculuminfo"]->hasCurriculumsubjects($sem_id)){
				return $sem_id;
			}
		}
		return false;

	}
	private function is_invalid_csyearlevel($yearlevel_id = false){
		if($yearlevel_id && isset($this->data["curriculuminfo"]) && $this->data["curriculuminfo"]){
			if($this->data["curriculuminfo"]->hasCurriculumsubjects(false,$yearlevel_id)){
				return $yearlevel_id;
			}
		}
		return false;
	}
	private function searchcurriculumsubjects(){
		$searchkey = false;
		if($this->input->post(sha1("searchcurriculumsubjects"))){
			$this->form_validation->set_rules("searchcurriculumsubjectskey","Search key","trim|xss_clean");
			$this->form_validation->run();
			$searchkey = $this->input->post("searchcurriculumsubjectskey");
		}else{
			if($this->input->get("search")){
				$searchkey = $this->input->get("searchkey");
				$searchkey = ($searchkey)?trim($searchkey):false;
			}
		}
		if($searchkey){
			set_has_value("searchcurriculumsubjects",random_string("alnum",5));
			set_has_value("searchcurriculumsubjectskey",$searchkey);
		}
	
	}
	public function add_curriculum_subject($curriculum_id=false){
		if($curriculum_id && is_curriculum_exist($curriculum_id)){
			$curriculuminfo = get_curriculum($curriculum_id);
			if($curriculuminfo){

				$this->data["curriculuminfo"] = $curriculuminfo;

				if($this->input->post(sha1("addcurriculumsubject"))){
					if($new_curiculum_subbject_id = $this->add_curriculum_subject_proccess($curriculuminfo)){
						//$this->data["curriculuminfo"]->updateLastupdate();
						redirect("dashboard/curriculums/".(($curriculuminfo)?$curriculuminfo->getCurriculumid():0)."/subjects/".$new_curiculum_subbject_id);
					}
				}

				$this->load->view("management/dashboard/curriculums/info/subjects/add/view",$this->data);
			
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
	private function add_curriculum_subject_proccess($curriculuminfo=false){
		$return = false;
		if($curriculuminfo){
			$this->form_validation->set_rules("cssemesterId","Semester","required|xss_clean");
			$this->form_validation->set_rules("csyearlevelId","Year level","required|xss_clean");
			$this->form_validation->set_rules("cssubjectId","Subject","required|xss_clean");
			$this->form_validation->set_rules("cssubjectUnit","Unit","required|xss_clean");
			//$this->form_validation->set_rules("csclassType","Type","required|xss_clean");
			if($this->form_validation->run() == FALSE){
				if((form_error("cssemesterId"))){
					set_has_error("cssemesterId",true);
					set_message("cssemesterId",form_error("cssemesterId"," "," "));
				}
				if((form_error("csyearlevelId"))){
					set_has_error("csyearlevelId",true);
					set_message("csyearlevelId",form_error("csyearlevelId"," "," "));
				}
				if((form_error("cssubjectId"))){
					set_has_error("cssubjectId",true);
					set_message("cssubjectId",form_error("cssubjectId"," "," "));
				}
				if((form_error("cssubjectUnit"))){
					set_has_error("cssubjectUnit",true);
					set_message("cssubjectUnit",form_error("cssubjectUnit"," "," "));
				}

				//if((form_error("csclassType"))){
				//	set_has_error("csclassType",true);
				//	set_message("csclassType",form_error("csclassType"," "," "));
				//}
			}else{

				$semesterid = $this->input->post("cssemesterId");
				$yearlevelid = $this->input->post("csyearlevelId");
				$subjectid = $this->input->post("cssubjectId");
				$unit = $this->input->post("cssubjectUnit");
				if(!is_curriculum_subject_exist(false,$curriculuminfo->getCurriculumid(),$subjectid)){
					if($return = $curriculuminfo->add_subject($semesterid,$yearlevelid,$subjectid,$unit,true)){
						set_message_title("addcurriculumsubject","Success!");
						set_message_type("addcurriculumsubject","success");
						//set_message("addcurriculumsubject",array("Subject has been successfully added.","Very Good!"));
						set_message("addcurriculumsubject","Subject has been successfully added.");

						set_has_value("cssubjectId",0);
						set_has_value("cssubjectUnit",0);
					}
				}else{
					
					
						set_has_error("cssubjectId",true);
						set_message("cssubjectId","Subject already exists!");
					
				}

				
			}
		}
		return $return;
	}
	public function edit_curriculum_subject($curriculum_id,$curriculum_subject_id){
		if($curriculum_id && is_curriculum_exist($curriculum_id)){
			$curriculuminfo = get_curriculum($curriculum_id);
			if($curriculuminfo){
				$this->data["curriculuminfo"] = $curriculuminfo;
				if($curriculum_subject_id && is_curriculum_subject_exist($curriculum_subject_id)){
					$curriculumsubjectinfo =get_curriculum_subject($curriculum_subject_id);
					if($curriculumsubjectinfo){
						$this->data["curriculumsubjectinfo"] = $curriculumsubjectinfo;
						if($this->input->post(sha1("editcurriculumsubject"))){
							if($this->update_urriculuim_subject($curriculumsubjectinfo)){
								redirect("dashboard/curriculums/".$curriculuminfo->getCurriculumid()."/subjects/".(($curriculumsubjectinfo)?$curriculumsubjectinfo->getCurriculumsubjectid():0));
							}
						}
						$this->load->view("management/dashboard/curriculums/info/subjects/info/edit/view",$this->data);
					}else{
						show_404();
					}
				}else{
					show_404();
				}
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
	private function update_urriculuim_subject($curriculumsubjectinfo){
		$return = false;
		if($curriculumsubjectinfo){
			$this->form_validation->set_rules("cssemesterId","Semester","required|xss_clean");
			$this->form_validation->set_rules("csyearlevelId","Year level","required|xss_clean");
			$this->form_validation->set_rules("cssubjectId","Subject","required|xss_clean");
			$this->form_validation->set_rules("cssubjectUnit","Unit","required|xss_clean|integer|min_length[1]");
			//$this->form_validation->set_rules("csclassType","Type","required|xss_clean");
			if($this->form_validation->run() == FALSE){
				if((form_error("cssemesterId"))){
					set_has_error("cssemesterId",true);
					set_message("cssemesterId",form_error("cssemesterId"," "," "));
				}
				if((form_error("csyearlevelId"))){
					set_has_error("csyearlevelId",true);
					set_message("csyearlevelId",form_error("csyearlevelId"," "," "));
				}
				if((form_error("cssubjectId"))){
					set_has_error("cssubjectId",true);
					set_message("cssubjectId",form_error("cssubjectId"," "," "));
				}
				if((form_error("cssubjectUnit"))){
					set_has_error("cssubjectUnit",true);
					set_message("cssubjectUnit",form_error("cssubjectUnit"," "," "));
				}

				//if((form_error("csclassType"))){
				//	set_has_error("csclassType",true);
				//	set_message("csclassType",form_error("csclassType"," "," "));
				//}
			}else{

				$semesterid = $this->input->post("cssemesterId");
				$yearlevelid = $this->input->post("csyearlevelId");
				$subjectid = $this->input->post("cssubjectId");
				$unit = $this->input->post("cssubjectUnit");
				if(!is_curriculum_subject_exist($curriculumsubjectinfo->getCurriculumsubjectid(),$curriculumsubjectinfo->getCurriculumid(),$subjectid,true)){
					
					$curriculumsubjectinfo->setSemid($semesterid);
					$curriculumsubjectinfo->setYearlevelid($yearlevelid);
					$curriculumsubjectinfo->setSubjectid($subjectid);
					$curriculumsubjectinfo->setUnit($unit);

					if($curriculumsubjectinfo->update()){
						
						$return = true;
					}
				}else{
					set_has_error("cssubjectId",true);
					set_message("cssubjectId","Subject already exsts!");
				}
				
			}
		}
		return $return;
	}
	public function delete_curriculum_subject($curriculum_id,$curriculum_subject_id){
		if($curriculum_id && is_curriculum_exist($curriculum_id)){
			$curriculuminfo = get_curriculum($curriculum_id);
			if($curriculuminfo){
				$this->data["curriculuminfo"] = $curriculuminfo;
				if($curriculum_subject_id && is_curriculum_subject_exist($curriculum_subject_id)){
					$curriculumsubjectinfo =get_curriculum_subject($curriculum_subject_id);
					if($curriculumsubjectinfo){
						$this->data["curriculumsubjectinfo"] = $curriculumsubjectinfo;
						$curriculumsubjectinfo->delete();
						if(is_curriculum_exist($curriculum_id)){
							//fail...
						}else{
							//success..
						}
						redirect("dashboard/curriculums/".$curriculuminfo->getCurriculumid()."/subjects");	
					}else{
						show_404();
					}
				}else{
					show_404();
				}
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
	public function curriculum_subject_info($curriculum_id,$curriculum_subject_id){
		if($curriculum_id && is_curriculum_exist($curriculum_id)){
			$curriculuminfo = get_curriculum($curriculum_id);
			if($curriculuminfo){
				$this->data["curriculuminfo"] = $curriculuminfo;
				if($curriculum_subject_id && is_curriculum_subject_exist($curriculum_subject_id)){
					$curriculumsubjectinfo =get_curriculum_subject($curriculum_subject_id);
					if($curriculumsubjectinfo){
						$this->data["curriculumsubjectinfo"] = $curriculumsubjectinfo;
						if($this->input->post(sha1("updateCurriculumsubjectclasstypes"))){
							if($this->update_curriculum_subject_classtypes()){
								redirect("dashboard/curriculums/".(isset($this->data["curriculuminfo"])?$this->data["curriculuminfo"]->getCurriculumid():0)."/subjects/".(isset($this->data["curriculumsubjectinfo"])?$this->data["curriculumsubjectinfo"]->getCurriculumsubjectid():0));
							}
						}
						$this->load->view("management/dashboard/curriculums/info/subjects/info/pre_view",$this->data);
					}else{
						show_404();
					}
				}else{
					show_404();
				}
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
	private function update_curriculum_subject_classtypes(){
		$return = false;
		$this->form_validation->set_rules("curriculumsubjectclasstypes[]","Class type","trim|xss_clean|integer");
		$this->form_validation->set_rules("curriculumSubjecttypeunit[]","Unit","trim|xss_clean|integer");
		if($this->form_validation->run() == false){
			$return = false;
		}else{
			$curriculumsubjecttype = $this->input->post("curriculumsubjectclasstypes");
			$curriculumsubjecttypeunit = $this->input->post("curriculumSubjecttypeunit");
			if($curriculumsubjecttypeunit && is_array($curriculumsubjecttypeunit) && count($curriculumsubjecttypeunit)>0){
				foreach($curriculumsubjecttypeunit as $curriculumsubjecttypeunitin => $curriculumsubjecttypevalue){
					if($curriculumsubjecttypeunitin && (int)$curriculumsubjecttypeunitin>0 && is_class_type_exist($curriculumsubjecttypeunitin)){
						if(isset($this->data["curriculumsubjectinfo"])){
							if($this->data["curriculumsubjectinfo"]->hasCurriculumsubjecttype($curriculumsubjecttypeunitin)){
								$curriculumsubjecttypeinfo = $this->data["curriculumsubjectinfo"]->getCurriculumsubjecttype($curriculumsubjecttypeunitin);
								if($curriculumsubjecttypeinfo){
									if($curriculumsubjecttypevalue>0 && isset($curriculumsubjecttype[$curriculumsubjecttypeunitin]) && ($curriculumsubjecttype[$curriculumsubjecttypeunitin] == $curriculumsubjecttypeunitin)){
										$curriculumsubjecttypeinfo->setUnit($curriculumsubjecttypevalue);
										$return = $curriculumsubjecttypeinfo->update();
									}else{
										$curriculumsubjecttypeinfo->delete();
										if(!$this->data["curriculumsubjectinfo"]->hasCurriculumsubjecttype($curriculumsubjecttypeunitin)){
											$return = true;
										}
									}
									
								}
							}else{
								if($curriculumsubjecttypevalue>0 && isset($curriculumsubjecttype[$curriculumsubjecttypeunitin]) && ($curriculumsubjecttype[$curriculumsubjecttypeunitin] == $curriculumsubjecttypeunitin)){
									$return = $this->data["curriculumsubjectinfo"]->createCurriculumsubjecttype($curriculumsubjecttypeunitin,$curriculumsubjecttypevalue);
								}
							}
						}
					}
				}
			}
		}
		return $return;
	}
	public function curriculum_settings(){
		$this->load->view("management/dashboard/curriculums/settings/pre_view",$this->data);
	}
	public function curriculum_settings_classtypes(){
		$this->load->view("management/dashboard/curriculums/settings/classtypes/pre_view",$this->data);
	}
	public function curriculum_settings_add_classtype(){
		
		if($this->input->post(sha1("addclasstype"))){

			$this->form_validation->set_rules("classtypeCode","Class type Code","trim|required|xss_xlean");
			$this->form_validation->set_rules("classtypeAlias","Class type Alias","trim|required|xss_xlean");
			$this->form_validation->set_rules("classtypeDescription","Class type Description","trim|required|xss_xlean");
			
			if($this->form_validation->run() == false){

				if(form_error("classtypeCode")){
					set_has_error("classtypeCode",true);
					set_message("classtypeCode",form_error("classtypeCode"," "," "));
				}
				if(form_error("classtypeAlias")){
					set_has_error("classtypeAlias",true);
					set_message("classtypeAlias",form_error("classtypeAlias"," "," "));
				}
				if(form_error("classtypeDescription")){
					set_has_error("classtypeDescription",true);
					set_message("classtypeDescription",form_error("classtypeDescription"," "," "));
				}

			}else{
				$new_classtype_code = $this->input->post("classtypeCode"); 
				$new_classtype_alias = $this->input->post("classtypeAlias");
				$new_classtype_description = $this->input->post("classtypeDescription");
				
				if(is_class_type_exist(false,$new_classtype_code)){
					set_has_error("classtypeCode",true);
					set_message("classtypeCode","Class type code already exists.");
				}else{

					$newclasstypeinfo = new Class_Type_Model();
					$newclasstypeinfo->setClasstypecode($new_classtype_code);
					$newclasstypeinfo->setClasstypealias($new_classtype_alias);
					$newclasstypeinfo->setClasstypedescription($new_classtype_description);
					
					if($newclasstypeinfo->saveAsnew()){
						redirect("dashboard/curriculums/settings/classtypes");
					}
					
				}
				
			}
		}
		$this->load->view("management/dashboard/curriculums/settings/classtypes/add/view",$this->data);
		
	}
	public function curriculum_settings_edit_classtype($class_type_id){
		
		if($class_type_id && is_class_type_exist($class_type_id)){
			$classtypeinfo = get_class_type($class_type_id);
			$this->data["classtypeinfo"] = $classtypeinfo;
			
			if($this->input->post(sha1("editclasstype"))){

				$this->form_validation->set_rules("classtypeCode","Class type Code","trim|required|xss_xlean");
				$this->form_validation->set_rules("classtypeAlias","Class type Alias","trim|required|xss_xlean");
				$this->form_validation->set_rules("classtypeDescription","Class type Description","trim|required|xss_xlean");
				
				if($this->form_validation->run() == false){

					if(form_error("classtypeCode")){
						set_has_error("classtypeCode",true);
						set_message("classtypeCode",form_error("classtypeCode"," "," "));
					}
					if(form_error("classtypeAlias")){
						set_has_error("classtypeAlias",true);
						set_message("classtypeAlias",form_error("classtypeAlias"," "," "));
					}
					if(form_error("classtypeDescription")){
						set_has_error("classtypeDescription",true);
						set_message("classtypeDescription",form_error("classtypeDescription"," "," "));
					}

				}else{
					$new_classtype_code = $this->input->post("classtypeCode"); 
					$new_classtype_alias = $this->input->post("classtypeAlias");
					$new_classtype_description = $this->input->post("classtypeDescription");
					
					if(is_class_type_exist($classtypeinfo->getClasstypeid(),$new_classtype_code,true)){
						set_has_error("classtypeCode",true);
						set_message("classtypeCode","Class type code already exists.");
					}else{
						$classtypeinfo->setClasstypecode($new_classtype_code);
						$classtypeinfo->setClasstypealias($new_classtype_alias);
						$classtypeinfo->setClasstypedescription($new_classtype_description);
						
						if($classtypeinfo->update()){
							redirect("dashboard/curriculums/settings/classtypes");
						}
						
					}
					
				}
			}
			$this->load->view("management/dashboard/curriculums/settings/classtypes/info/edit/view",$this->data);
		}
	}
	public function curriculum_settings_delete_classtype($class_type_id){
		if($class_type_id && is_class_type_exist($class_type_id)){
			$classtypeinfo = get_class_type($class_type_id);
			if($classtypeinfo){
				$classtypeinfo->delete();
				if(is_class_type_exist($class_type_id)){
					//failed...
				}else{
					//success..
				}
				redirect("dashboard/curriculums/settings/classtypes");
			}else{
				show_404();
			}			
		}else{
			show_404();
		}	
	}
	public function curriculum_types_settings(){
		$this->load->view("management/dashboard/curriculums/settings/types/pre_view",$this->data);
	}
	public function add_curriculum_type(){
		
		if($this->input->post(sha1("addcurriculumtype"))){

			$this->form_validation->set_rules("curriculumType","Curriculum type","trim|required|xss_xlean");
			
			if($this->form_validation->run() == false){

				if(form_error("curriculumType")){
					set_has_error("curriculumType",true);
					set_message("curriculumType",form_error("curriculumType"," "," "));
				}

			}else{
				$new_curriculum_type = $this->input->post("curriculumType"); 
				
				if(is_curriculum_type_exist(false,$new_curriculum_type)){
					set_has_error("curriculumType",true);
					set_message("curriculumType","Curriculum type already exists.");
				}else{

					$newcurriculumtypeinfo = new Curriculum_Type_Model();
					$newcurriculumtypeinfo->setCurriculumtype($new_curriculum_type);
					
					if($newcurriculumtypeinfo->saveAsnew()){
						redirect("dashboard/curriculums/settings/types");
					}
					
				}
				
			}
		}
		$this->load->view("management/dashboard/curriculums/settings/types/add/view",$this->data);
		
	}
	public function edit_curriculum_type($curriculum_type_id){
		
		if($curriculum_type_id && is_curriculum_type_exist($curriculum_type_id)){
			$curriculumtypeinfo = get_curriculum_type($curriculum_type_id);
			$this->data["curriculumtypeinfo"] = $curriculumtypeinfo;
			
			if($this->input->post(sha1("editcurriculumtype"))){

				$this->form_validation->set_rules("curriculumType","Curriulum type","trim|required|xss_xlean");
				
				if($this->form_validation->run() == false){

					if(form_error("curriculumType")){
						set_has_error("curriculumType",true);
						set_message("curriculumType",form_error("curriculumType"," "," "));
					}

				}else{
					$new_curriculum_type= $this->input->post("curriculumType"); 
					
					if(is_curriculum_type_exist($curriculumtypeinfo->getCurriculumtypeid(),$new_curriculum_type,true)){
						set_has_error("curriculumType",true);
						set_message("curriculumType","Class type code already exists.");
					}else{
						$curriculumtypeinfo->setCurriculumtype($new_curriculum_type);
						
						if($curriculumtypeinfo->update()){

							redirect("dashboard/curriculums/settings/types");
						}
						
					}
					
				}
			}
			$this->load->view("management/dashboard/curriculums/settings/types/info/edit/view",$this->data);
		}
	}
	public function delete_curriculum_type($curriculum_type_id){
		if($curriculum_type_id && is_curriculum_type_exist($curriculum_type_id)){
			$curriculumtypeinfo = get_curriculum_type($curriculum_type_id);
			if($curriculumtypeinfo){
				$curriculumtypeinfo->delete();
				if(is_curriculum_type_exist($curriculum_type_id)){
					//failed...
				}else{
					//success..
				}
				redirect("dashboard/curriculums/settings/types");
			}else{
				show_404();
			}			
		}else{
			show_404();
		}	
	}
	public function curriculum_settings_subjects(){
		$this->load->view("management/dashboard/curriculums/settings/subjects/pre_view",$this->data);
	}
	public function curriculum_settings_add_subject(){
		if($this->input->post(sha1("addsubject"))){

			$this->form_validation->set_rules("subjectCode","Subject Code","trim|required|xss_xlean");
			$this->form_validation->set_rules("subjectDescription","Subject Description","trim|required|xss_xlean");
			if($this->form_validation->run() == false){
				if(form_error("subjectCode")){
					set_has_error("subjectCode",true);
					set_message("subjectCode",form_error("subjectCode"," "," "));
				}
				if(form_error("subjectDescription")){
					set_has_error("subjectDescription",true);
					set_message("subjectDescription",form_error("subjectDescription"," "," "));
				}

			}else{
				$new_subject_code = $this->input->post("subjectCode"); 
				$new_subject_description = $this->input->post("subjectDescription");
				if(is_subject_exist(false,$new_subject_code)){
					set_has_error("subjectCode",true);
					set_message("subjectCode","subject code already exists.");
				}else{

					$new_subjectinfo = new Subject_Model();
					$new_subjectinfo->setSubjectcode($new_subject_code);
					$new_subjectinfo->setSubjectdescription($new_subject_description);
					if($new_subjectinfo->saveAsnew()){
						redirect("dashboard/curriculums/settings/subjects");
					}
					
				}
				
			}
		}
		$this->load->view("management/dashboard/curriculums/settings/subjects/add/view",$this->data);
	}
	public function curriculum_settings_courses(){
		$this->load->view("management/dashboard/curriculums/settings/courses/pre_view",$this->data);
	}
	public function curriculum_settings_add_course(){
		if($this->input->post(sha1("addcourse"))){

			$this->form_validation->set_rules("courseCode","Course Code","trim|required|xss_xlean");
			$this->form_validation->set_rules("courseDescription","Course Description","trim|required|xss_xlean");
			if($this->form_validation->run() == false){
				if(form_error("courseCode")){
					set_has_error("courseCode",true);
					set_message("courseCode",form_error("courseCode"," "," "));
				}
				if(form_error("courseDescription")){
					set_has_error("courseDescription",true);
					set_message("courseDescription",form_error("courseDescription"," "," "));
				}

			}else{
				$newcourse_code = $this->input->post("courseCode"); 
				$newcourse_description = $this->input->post("courseDescription");
				if(is_course_exist(false,$newcourse_code)){
					set_has_error("courseCode",true);
					set_message("courseCode","Course code already exists.");
				}else{

					$newcourseinfo = new Course_Model();
					$newcourseinfo->setCoursecode($newcourse_code);
					$newcourseinfo->setCoursedescription($newcourse_description);
					if($newcourseinfo->saveAsnew()){
						redirect("dashboard/curriculums/settings/courses");
					}
					
				}
				
			}
		}
		$this->load->view("management/dashboard/curriculums/settings/courses/add/view",$this->data);
	}
	public function curriculum_settings_majors(){
		$this->load->view("management/dashboard/curriculums/settings/majors/pre_view",$this->data);
	}
	public function curriculum_settings_add_major(){
		if($this->input->post(sha1("addmajor"))){

			$this->form_validation->set_rules("majorCode","Major Code","trim|required|xss_xlean");
			$this->form_validation->set_rules("majorDescription","Major Description","trim|required|xss_xlean");
			
			if($this->form_validation->run() == false){
				if(form_error("majorCode")){
					set_has_error("majorCode",true);
					set_message("majorCode",form_error("majorCode"," "," "));
				}
				if(form_error("majorDescription")){
					set_has_error("majorDescription",true);
					set_message("majorDescription",form_error("majorDescription"," "," "));
				}

			}else{
				$newmajor_code = $this->input->post("majorCode"); 
				$newmajor_description = $this->input->post("majorDescription");
				if(is_major_exist(false,$newmajor_code)){
					set_has_error("majorCode",true);
					set_message("majorCode","Major code already exists.");
				}else{

					$newmajorinfo = new major_Model();
					$newmajorinfo->setMajorcode($newmajor_code);
					$newmajorinfo->setMajordescription($newmajor_description);
					if($newmajorinfo->saveAsnew()){
						redirect("dashboard/curriculums/settings/majors");
					}
					
				}
				
			}
		}
		$this->load->view("management/dashboard/curriculums/settings/majors/add/view",$this->data);
	}
	public function curriculum_settings_yearlevels(){
		$this->load->view("management/dashboard/curriculums/settings/yearlevels/pre_view",$this->data);
	}
	public function curriculum_settings_add_yearlevel(){
		if($this->input->post(sha1("addyearlevel"))){

			$this->form_validation->set_rules("yearlevelCode","Yearlevel Code","trim|required|xss_xlean");
			$this->form_validation->set_rules("yearlevelAlias","Yearlevel Alias","trim|required|xss_xlean");
			$this->form_validation->set_rules("yearlevelDescription","Yearlevel Description","trim|required|xss_xlean");
			
			if($this->form_validation->run() == false){

				if(form_error("yearlevelCode")){
					set_has_error("yearlevelCode",true);
					set_message("yearlevelCode",form_error("yearlevelCode"," "," "));
				}
				if(form_error("yearlevelAlias")){
					set_has_error("yearlevelAlias",true);
					set_message("yearlevelAlias",form_error("yearlevelAlias"," "," "));
				}
				if(form_error("yearlevelDescription")){
					set_has_error("yearlevelDescription",true);
					set_message("yearlevelDescription",form_error("yearlevelDescription"," "," "));
				}

			}else{
				$new_yearlevel_code = $this->input->post("yearlevelCode"); 
				$new_yearlevel_alias = $this->input->post("yearlevelAlias");
				$new_yearlevel_description = $this->input->post("yearlevelDescription");
				
				if(is_yearlevel_exist(false,$new_yearlevel_code)){
					set_has_error("yearlevelCode",true);
					set_message("yearlevelCode","Yearlevel code already exists.");
				}else{

					$newyearlevelinfo = new Yearlevel_Model();
					$newyearlevelinfo->setYearlevelcode($new_yearlevel_code);
					$newyearlevelinfo->setYearlevelalias($new_yearlevel_alias);
					$newyearlevelinfo->setYearleveldescription($new_yearlevel_description);
					
					if($newyearlevelinfo->saveAsnew()){
						redirect("dashboard/curriculums/settings/yearlevels");
					}
					
				}
				
			}
		}
		$this->load->view("management/dashboard/curriculums/settings/yearlevels/add/view",$this->data);
	}
	public function curriculum_settings_semesters(){
		$this->load->view("management/dashboard/curriculums/settings/semesters/pre_view",$this->data);
	}
	public function curriculum_settings_add_semester(){
		if($this->input->post(sha1("addsemester"))){

			$this->form_validation->set_rules("semesterCode","Semester Code","trim|required|xss_xlean");
			$this->form_validation->set_rules("semesterAlias","Semester Alias","trim|required|xss_xlean");
			$this->form_validation->set_rules("semesterDescription","Semester Description","trim|required|xss_xlean");
			
			if($this->form_validation->run() == false){

				if(form_error("semesterCode")){
					set_has_error("semesterCode",true);
					set_message("semesterCode",form_error("semesterCode"," "," "));
				}
				if(form_error("semesterAlias")){
					set_has_error("semesterAlias",true);
					set_message("semesterAlias",form_error("semesterAlias"," "," "));
				}
				if(form_error("semesterDescription")){
					set_has_error("semesterDescription",true);
					set_message("semesterDescription",form_error("semesterDescription"," "," "));
				}

			}else{
				$ne_semester_code = $this->input->post("semesterCode"); 
				$new_semester_alias = $this->input->post("semesterAlias");
				$new_semester_description = $this->input->post("semesterDescription");
				
				if(is_semester_exist(false,$ne_semester_code)){
					set_has_error("semesterCode",true);
					set_message("semesterCode","Semester code already exists.");
				}else{

					$newsemesterinfo = new Semester_Model();
					$newsemesterinfo->setSemestercode($ne_semester_code);
					$newsemesterinfo->setSemesteralias($new_semester_alias);
					$newsemesterinfo->setSemesterdescription($new_semester_description);
					
					if($newsemesterinfo->saveAsnew()){
						redirect("dashboard/curriculums/settings/semesters");
					}
					
				}
				
			}
		}
		$this->load->view("management/dashboard/curriculums/settings/semesters/add/view",$this->data);
	}

	public function curriculum_settings_semester($sem_id=false){
		if($sem_id && is_semester_exist($sem_id)){
			$this->load->view("management/dashboard/curriculums/settings/semesters/pre_view",$this->data);
		}else{
			show_404();
		}
	}
	public function curriculum_settings_edit_semester($sem_id=false){
		if($sem_id && is_semester_exist($sem_id)){
			$semesterinfo  = get_semester($sem_id);
			$this->data["semesterinfo"] = $semesterinfo;
			if($this->input->post(sha1("editsemester"))){

				$this->form_validation->set_rules("semesterCode","Semester Code","trim|required|xss_xlean");
				$this->form_validation->set_rules("semesterAlias","Semester Alias","trim|required|xss_xlean");
				$this->form_validation->set_rules("semesterDescription","Semester Description","trim|required|xss_xlean");
				
				if($this->form_validation->run() == false){

					if(form_error("semesterCode")){
						set_has_error("semesterCode",true);
						set_message("semesterCode",form_error("semesterCode"," "," "));
					}
					if(form_error("semesterAlias")){
						set_has_error("semesterAlias",true);
						set_message("semesterAlias",form_error("semesterAlias"," "," "));
					}
					if(form_error("semesterDescription")){
						set_has_error("semesterDescription",true);
						set_message("semesterDescription",form_error("semesterDescription"," "," "));
					}

				}else{
					$ne_semester_code = $this->input->post("semesterCode"); 
					$new_semester_alias = $this->input->post("semesterAlias");
					$new_semester_description = $this->input->post("semesterDescription");
					
					if(is_semester_exist($semesterinfo->getSemesterid(),$ne_semester_code,true)){
						set_has_error("semesterCode",true);
						set_message("semesterCode","Semester code already exists.");
					}else{

						//$newsemesterinfo = new Semester_Model();
						$semesterinfo->setSemestercode($ne_semester_code);
						$semesterinfo->setSemesteralias($new_semester_alias);
						$semesterinfo->setSemesterdescription($new_semester_description);
						
						if($semesterinfo->update()){
							redirect("dashboard/curriculums/settings/semesters");
						}
						
					}
					
				}
			}
			$this->load->view("management/dashboard/curriculums/settings/semesters/edit/view",$this->data);
		}else{
			show_404();
		}
	}
	public function curriculum_settings_delete_semester($sem_id=false){
		if($sem_id && is_semester_exist($sem_id)){
			$semesterinfo  = get_semester($sem_id);
			if($semesterinfo){
				$semesterinfo->delete();
				if(is_semester_exist($sem_id)){
					//failed..
				}else{
					//success..
				}
				
			}else{
				//failed..
			}
			redirect("dashboard/curriculums/settings/semesters");
			//$this->load->view("management/dashboard/curriculums/settings/semesters/pre_view",$this->data);
		}else{
			show_404();
		}
	}

	public function curriculum_settings_major($major_id=false){
		echo " Major Info ";
	}
	public function curriculum_settings_edit_major($major_id=false){
		if($major_id && is_major_exist($major_id)){
			$majorinfo = get_major($major_id);
			$this->data["majorinfo"] = $majorinfo;
			/*edit Major Proccess*/
			if($this->input->post(sha1("editmajor"))){

				$this->form_validation->set_rules("majorCode","Major Code","trim|required|xss_xlean");
				$this->form_validation->set_rules("majorDescription","Major Description","trim|required|xss_xlean");
				
				if($this->form_validation->run() == false){
					if(form_error("majorCode")){
						set_has_error("majorCode",true);
						set_message("majorCode",form_error("majorCode"," "," "));
					}
					if(form_error("majorDescription")){
						set_has_error("majorDescription",true);
						set_message("majorDescription",form_error("majorDescription"," "," "));
					}

				}else{
					$newmajor_code = $this->input->post("majorCode"); 
					$newmajor_description = $this->input->post("majorDescription");
					if(is_major_exist($majorinfo->getMajorid(),$newmajor_code,true)){
						set_has_error("majorCode",true);
						set_message("majorCode","Major code already exists.");
					}else{

					
						$majorinfo->setMajorcode($newmajor_code);
						$majorinfo->setMajordescription($newmajor_description);
						if($majorinfo->update()){
							redirect("dashboard/curriculums/settings/majors");
						}else{
							//failed..
						}
						
					}
					
				}
			}
			/*edit Major */
			$this->load->view("management/dashboard/curriculums/settings/majors/edit/view",$this->data);
		}else{
			show_404();
		}
	}
	public function curriculum_settings_delete_major($major_id=false){
		if($major_id && is_major_exist($major_id)){
			$majorinfo = get_major($major_id);
			if($majorinfo){
				$majorinfo->delete();
				if(is_major_exist($major_id)){
					//success..
				}else{
					//failed..
				}
				redirect("dashboard/curriculums/settings/majors");
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
	public function curriculum_settings_edit_course($course_id=fasle){
		if($course_id && is_course_exist($course_id)){
			$courseinfo = get_course($course_id);
			$this->data["courseinfo"] = $courseinfo;
			//process..
			if($this->input->post(sha1("editcourse"))){

				$this->form_validation->set_rules("courseCode","Course Code","trim|required|xss_xlean");
				$this->form_validation->set_rules("courseDescription","Course Description","trim|required|xss_xlean");
				if($this->form_validation->run() == false){
					if(form_error("courseCode")){
						set_has_error("courseCode",true);
						set_message("courseCode",form_error("courseCode"," "," "));
					}
					if(form_error("courseDescription")){
						set_has_error("courseDescription",true);
						set_message("courseDescription",form_error("courseDescription"," "," "));
					}

				}else{
					$newcourse_code = $this->input->post("courseCode"); 
					$newcourse_description = $this->input->post("courseDescription");
					if(is_course_exist($courseinfo->getCourseid(),$newcourse_code,true)){
						set_has_error("courseCode",true);
						set_message("courseCode","Course code already exists.");
					}else{
						$courseinfo->setCoursecode($newcourse_code);
						$courseinfo->setCoursedescription($newcourse_description);
						if($courseinfo->update()){
							redirect("dashboard/curriculums/settings/courses");
						}else{
							//failed..
						}
						
					}
					
				}
			}
			//process end..
			$this->load->view("management/dashboard/curriculums/settings/courses/edit/view",$this->data);

		}
	}
	public function curriculum_settings_course($course_id=fasle){
		$this->load->view("management/dashboard/curriculums/settings/courses/pre_view",$this->data);
	}
	public function curriculum_settings_delete_course($course_id=fasle){
		if($course_id && is_course_exist($course_id)){
			$courseinfo = get_course($course_id);
			$courseinfo->delete();
			if(is_course_exist($course_id)){
				//success..
			}else{
				//failed..
			}
			redirect("dashboard/curriculums/settings/courses");
		}
	}
	public function curriculum_settings_yearlevel($yearlevel_id=false){

	}
	public function curriculum_settings_edit_yearlevel($yearlevel_id=false){
		if($yearlevel_id && is_yearlevel_exist($yearlevel_id)){
			$yearlevelinfo = get_yearlevel($yearlevel_id);
			$this->data["yearlevelinfo"] = $yearlevelinfo;
			
			if($this->input->post(sha1("edityearlevel"))){

				$this->form_validation->set_rules("yearlevelCode","Yearlevel Code","trim|required|xss_xlean");
				$this->form_validation->set_rules("yearlevelAlias","Yearlevel Alias","trim|required|xss_xlean");
				$this->form_validation->set_rules("yearlevelDescription","Yearlevel Description","trim|required|xss_xlean");
				
				if($this->form_validation->run() == false){

					if(form_error("yearlevelCode")){
						set_has_error("yearlevelCode",true);
						set_message("yearlevelCode",form_error("yearlevelCode"," "," "));
					}
					if(form_error("yearlevelAlias")){
						set_has_error("yearlevelAlias",true);
						set_message("yearlevelAlias",form_error("yearlevelAlias"," "," "));
					}
					if(form_error("yearlevelDescription")){
						set_has_error("yearlevelDescription",true);
						set_message("yearlevelDescription",form_error("yearlevelDescription"," "," "));
					}

				}else{
					$new_yearlevel_code = $this->input->post("yearlevelCode"); 
					$new_yearlevel_alias = $this->input->post("yearlevelAlias");
					$new_yearlevel_description = $this->input->post("yearlevelDescription");
					
					if(is_yearlevel_exist($yearlevelinfo->getYearlevelid(),$new_yearlevel_code,true)){
						set_has_error("yearlevelCode",true);
						set_message("yearlevelCode","Yearlevel code already exists.");
					}else{

						
						$yearlevelinfo->setYearlevelcode($new_yearlevel_code);
						$yearlevelinfo->setYearlevelalias($new_yearlevel_alias);
						$yearlevelinfo->setYearleveldescription($new_yearlevel_description);
						
						if($yearlevelinfo->update()){
							redirect("dashboard/curriculums/settings/yearlevels");
						}
						
					}
					
				}
			}
			$this->load->view("management/dashboard/curriculums/settings/yearlevels/edit/view",$this->data);
		}
	}
	public function curriculum_settings_delete_yearlevel($yearlevel_id = false){
		if($yearlevel_id && is_yearlevel_exist($yearlevel_id)){
			$yearlevelinfo = get_yearlevel($yearlevel_id);
			if($yearlevelinfo){
				$yearlevelinfo->delete();
				if(is_yearlevel_exist($yearlevel_id)){
					//success..
				}else{
					//failed..
				}
				redirect("dashboard/curriculums/settings/yearlevels");
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
	public function curriculum_settings_subject($subject_id=false){

	}
	public function curriculum_settings_edit_subject($subject_id=false){
		if($subject_id && is_subject_exist($subject_id)){
			$subjectinfo = get_subject($subject_id);
			$this->data["subjectinfo"] = $subjectinfo;
			if($this->input->post(sha1("editsubject"))){

				$this->form_validation->set_rules("subjectCode","Subject Code","trim|required|xss_xlean");
				$this->form_validation->set_rules("subjectDescription","Subject Description","trim|required|xss_xlean");
				if($this->form_validation->run() == false){
					if(form_error("subjectCode")){
						set_has_error("subjectCode",true);
						set_message("subjectCode",form_error("subjectCode"," "," "));
					}
					if(form_error("subjectDescription")){
						set_has_error("subjectDescription",true);
						set_message("subjectDescription",form_error("subjectDescription"," "," "));
					}

				}else{
					$new_subject_code = $this->input->post("subjectCode"); 
					$new_subject_description = $this->input->post("subjectDescription");
					if(is_subject_exist($subjectinfo->getSubjectid(),$new_subject_code,true)){
						set_has_error("subjectCode",true);
						set_message("subjectCode","subject code already exists.");
					}else{

						
						$subjectinfo->setSubjectcode($new_subject_code);
						$subjectinfo->setSubjectdescription($new_subject_description);
						if($subjectinfo->update()){
							redirect("dashboard/curriculums/settings/subjects");
						}
						
					}
					
				}
			}
			$this->load->view("management/dashboard/curriculums/settings/subjects/edit/view",$this->data);

		}else{
			show__404();
		}
		
	}
	public function curriculum_settings_delete_subject($subject_id=false){
		if($subject_id && is_subject_exist($subject_id)){
			$subjectinfo = get_subject($subject_id);
			if($subjectinfo){
				$subjectinfo->delete();
				if(is_subject_exist($subject_id)){
					//success..
				}else{
					//failed..
				}
				redirect("dashboard/curriculums/settings/subjects");
			}else{
				show_404();
			}
		}else{
			show_404();
		}
	}
}