$(document).ready(function ()
{
	$("button.form-field-clear-btn").on("mouseover",function(){
		datatarget = $(this).attr("data-target");
		loginformobj = $("form[name='loginform']");
		selectLoginFormField(loginformobj,datatarget);
		
		return false;
	}).on("click",function(){
		datatarget = $(this).attr("data-target");
		loginformobj = $("form[name='loginform']");
		clearLoginFormField(loginformobj,datatarget);
		
		return false;
	});

	$("button#loginformsubmitbtn").on("click",function(){


			$(this).prop("disabled",true);
			
		
	}).on("mouseover",function(){
		
	}).on("mouseout",function(){
		
	
	});
	
	$("button.form-field-btn").on("mouseover",function(){
		//$(this).find(".form-field-btn-text").removeClass("hidethis");
	}).on("mouseout",function(){
		//$(this).find(".form-field-btn-text").addClass("hidethis");
	});

	$("#loginformresetbtn").on("click",function(){
		loginformobj = $("form[name='loginform']");
		resetLoginForm(loginformobj);
		updateloginformclearbtn(loginformobj);
		updateloginformsubmitbtn(loginformobj);
		
		return false;
		
	});

	$("form[name='loginform']").on("submit",function(){
		
		loadingLogin();
		//scrollTo("login-error-container",1000,-100);
		if(submitLoginform($(this))){

			return true;

		}else{

			
			return false;
		}
		
		
	}).on("load",function(){
		
	
	});

	$("form[name='loginform'] input").on("focus",function(){
		loginformobj = $("form[name='loginform']");
		switch($(this).attr("name")){
			
			case "usernamefield":
				loginforminputfieldfocus(loginformobj,"username");
				break;
			case "passwordfield":
				loginforminputfieldfocus(loginformobj,"password");
				break;
		
		}
		
	}).on("blur",function(){
		loginformobj = $("form[name='loginform']");
		switch($(this).attr("name")){
			
			case "usernamefield":
				if(checkFormfieldstatus(loginformobj,"username")){
					hideFieldmessage("usernamefield");
				}
				break;
			case "passwordfield":
				if(checkFormfieldstatus(loginformobj,"password")){
					hideFieldmessage("passwordfield");
				}
				break;
		
		}
		
	}).on("keyup",function(){
		loginformobj = $("form[name='loginform']");
		updateloginformclearbtn(loginformobj);
		updateloginformsubmitbtn(loginformobj);
		switch($(this).attr("name")){
			
			case "usernamefield":
				checkLoginFormFieldClearbtn(loginformobj,"username");
				break;
			case "passwordfield":
				checkLoginFormFieldClearbtn(loginformobj,"password");
				break;
		
		}
	}).on("mouseout",function(){
	
		loginformobj = $("form[name='loginform']");
		updateloginformclearbtn(loginformobj);
		updateloginformsubmitbtn(loginformobj);
	
	}).on("mouseover",function(){
	
		loginformobj = $("form[name='loginform']");
		
		updateloginformclearbtn(loginformobj);
		updateloginformsubmitbtn(loginformobj);
		switch($(this).attr("name")){
			
			case "usernamefield":
				checkLoginFormFieldClearbtn(loginformobj,"username");
				break;
			case "passwordfield":
				checkLoginFormFieldClearbtn(loginformobj,"password");
				break;
		
		}
	
	});
});

var globalz = 0;
									function loadingLogin(){

										var whereobj = $("#login-error-container");
										whereobj.html("<div class=\"alert alert-success rounded-corners\"><p class=\"text-left text-info margin-0 padding-top-10 padding-bottom-10\"><strong> <span id=\"loginloadingtext\" class=\" margin-left-10\"> Logging in </span></strong><i class=\"margin-top-n10 fa fa-sign-in fa-3x pull-left\"></i></p></div>");
										
										setInterval(showLoginLoading,1000);
									}
									function showLoginLoading(){
										var logintextobj = $("#loginloadingtext");
										var loadtext = [" Logging in . "," Logging in . . "," Logging in . . ."," Logging in . . . . "," Logging in . . . . . "];
										if(loadtext[globalz]=="undefined"||!loadtext[globalz]){
											globalz = 0;
										}	
										logintextobj.text(loadtext[globalz]);
										globalz++;
										return true;
									}
									function selectLoginFormField(loginformobj,datafield){
										if(loginformobj){
											fieldobj = false;
											switch(datafield){
												case "username":
													fieldobj = loginformobj.find("input[name='usernamefield']");
													break;
												case "password":
													fieldobj = loginformobj.find("input[name='passwordfield']");
													break;
											}
											if(fieldobj){
												fieldobj.select();
											}
										}
									}
									function checkLoginFormFieldClearbtn(loginformobj,datafield){
										if(loginformobj){
											fieldobj = false;
											clearobj = false;
											if(datafield){
												switch(datafield){
													case "username":
														fieldobj = loginformobj.find("input[name='usernamefield']");
														clearobj = loginformobj.find("button#username-field-clear-btn");
														break;
													case "password":
														fieldobj = loginformobj.find("input[name='passwordfield']");
														clearobj = loginformobj.find("button#password-field-clear-btn");
														break;
												}
												if(fieldobj){
													if(fieldobj.val().length > 0){
														if(clearobj){
															clearobj.prop("disabled",false);
														}
													}else{
														if(clearobj){
															clearobj.prop("disabled",true);
														}
														
													}
												}
											}
										}
									}
									function clearLoginFormField(loginformobj,datafield){
										if(loginformobj){
											fieldobj = false;
											if(datafield){
												switch(datafield){
													case "username":
														fieldobj = loginformobj.find("input[name='usernamefield']");
														break;
													case "password":
														fieldobj = loginformobj.find("input[name='passwordfield']");
														break;
												}
												if(fieldobj){
													fieldobj.val("");
													fieldobj.select();
													checkLoginFormFieldClearbtn(loginformobj,datafield);
													
												}
											}else{
												usernamefieldobj = loginformobj.find("input[name='usernamefield']");
												if(usernamefieldobj){
													usernamefieldobj.val("");
													checkLoginFormFieldClearbtn(loginformobj,"username");
												}
												passwordfieldobj = loginformobj.find("input[name='passwordfield']");
												if(passwordfieldobj){
													passwordfieldobj.val("");
													checkLoginFormFieldClearbtn(loginformobj,"password");
												}
											}
										}
									}
									
									
									function checkFormfieldstatus(loginformobj,fieldname){
										ret = false;
										if(loginformobj){
											formfieldinputobj = false;
											if(fieldname){
												switch(fieldname){
													case "username":
														formfieldinputobj = loginformobj.find("input[name='usernamefield']");
														break;
													case "password":
														formfieldinputobj = loginformobj.find("input[name='passwordfield']");
														break;
												}
												if(formfieldinputobj){
													if(formfieldinputobj.val().trim().length > 0){
														update_error(loginformobj,fieldname,false);
														ret = true;
													}else{
														update_error(loginformobj,fieldname,true);
														
													}
												
												}
											}else{
												formfieldinputobj = loginformobj.find("input[name='usernamefield']");
												if(formfieldinputobj.val().trim().length <= 0){
													
													update_error(loginformobj,"username",true);
													
												}else{
													ret = true;
												}
												formfieldinputobj = loginformobj.find("input[name='passwordfield']");
												if(formfieldinputobj.val().trim().length <= 0){
													update_error(loginformobj,"password",true);
												}else{
													ret = true;
												}
											}
										}
										return ret;
									}
									function resetLoginForm(loginformobj){
										if(loginformobj){
											clearLoginFormField(loginformobj);
											setTodefaultstatus(loginformobj);
											showAlertmessage("Hello Sir/Maam!","info","Please login first so that we will know you.");
											//$("#login-error-container").html("");
											var submitbtnobj = loginformobj.find("button#loginformsubmitbtn");
												if(submitbtnobj){

													submitbtnobj.prop("disabled",false);
													
												}
										}
										return false;
									}
									function submitLoginform(loginformobj){
										if(loginformobj){
											usernameobj = loginformobj.find("input[name='usernamefield']");
											passwordobj = loginformobj.find("input[name='passwordfield']");
											if(usernameobj && passwordobj){
												haserror = false;
												errorz =  new Array();
												i = 0;
												if(usernameobj.val().trim().length <=0){
												
													usernameobj.select();
													errorz[i] = "Username is required.";
													i++;
													showFieldmessage("usernamefield","Username is required.");
													update_error(loginformobj,"username",true);
													haserror =  true;
												
												}else{
													update_error(loginformobj,"username",false);
													haserror =  false;
												}
												if(passwordobj.val().trim().length <=0){
													if(!haserror){
														passwordobj.select();
													}
													errorz[i] = "Password is required.";
													i++;
													showFieldmessage("passwordfield","Password is required.");
													update_error(loginformobj,"password",true);
													haserror =  true;
												
												}else{
													update_error(loginformobj,"password",false);
												}
												if(!haserror){
													
													return true;

												}else{
													
													showAlertmessage("Alert!","danger","Login Failed.")
													
													var submitbtnobj = loginformobj.find("button#loginformsubmitbtn");
													if(submitbtnobj){

														submitbtnobj.prop("disabled",false);
														
													}
												}
											}
										}
										return false;
									}
									function showFieldmessage(fieldname,fieldmessage){
										var fieldhelpblockobj = $("#"+fieldname+"-help-block");
										if(fieldhelpblockobj){
											var fieldmessageobj = fieldhelpblockobj.find("span#"+fieldname+"-message");
											if(fieldmessageobj){
												fieldmessageobj.html(fieldmessage);
												fieldhelpblockobj.removeClass("sr-only");
											}
										}
										return false;
									}
									function hideFieldmessage(fieldname){
										var fieldhelpblockobj = $("#"+fieldname+"-help-block");
										if(fieldhelpblockobj){
											var fieldmessageobj = fieldhelpblockobj.find("span#"+fieldname+"-message");
											if(fieldmessageobj){
												fieldmessageobj.html("");
												fieldhelpblockobj.addClass("sr-only");
											}
										}
										return false;
									}
									function showAlertmessage(amTitle,amType,am){
										var myalert = makeAlertmessage(amTitle,amType,am);
										
										var alertContainer = $("#login-error-container");
										if(alertContainer){
												alertContainer.delay(0).fadeOut("slow",function(){
											
													
													$(this).html(myalert);
											
												});

											alertContainer.fadeIn("slow",function(){
											
											
											});
										}	
										
										return false;
									}
									function update_error(loginformobj,fielder,status){
										if(loginformobj){
											formfieldgroup = false;
											formfieldbtn = false;
											switch(fielder){
													case "username":
														formfieldgroup = loginformobj.find("#username-field-form-group");
														formfieldbtn = loginformobj.find("#username-field-btn");
														break;
													case "password":
														formfieldgroup = loginformobj.find("#password-field-form-group");
														formfieldbtn = loginformobj.find("#password-field-btn");
														break;
													default:
														formfieldgroup = loginformobj.find(".form-field-form-group");
														formfieldbtn = loginformobj.find(".form-field-btn");
														break;
												}
											if(formfieldgroup && formfieldbtn){
												if(status){
												
													formfieldgroup.removeClass("has-success").addClass("has-error");
													formfieldbtn.removeClass("btn-default").removeClass("btn-primary").removeClass("btn-success").addClass("btn-danger");
												
												}else{
													formfieldgroup.removeClass("has-error").addClass("has-success");
													formfieldbtn.removeClass("btn-default").removeClass("btn-danger").removeClass("btn-primary").addClass("btn-success");
												
												}
											}
										}
										return false;
									}
									function setTodefaultstatus(loginformobj,fielder){
										if(loginformobj){
											formfieldgroup = false;
											formfieldbtn = false;
											if(fielder){
												switch(fielder){
														case "username":
															formfieldgroup = loginformobj.find("#username-field-form-group");
															formfieldbtn = loginformobj.find("#username-field-btn");
															hideFieldmessage("usernamefield");
															break;
														case "password":
															formfieldgroup = loginformobj.find("#password-field-form-group");
															formfieldbtn = loginformobj.find("#password-field-btn");
															hideFieldmessage("passwordfield");
															break;
													}
												
											}else{
												formfieldgroup = loginformobj.find(".form-field-form-group");
												formfieldbtn = loginformobj.find(".form-field-btn");
												hideFieldmessage("usernamefield");
												hideFieldmessage("passwordfield");
											}
											if(formfieldgroup && formfieldbtn){
													
												formfieldgroup.removeClass("has-error").removeClass("has-success");
												formfieldbtn.removeClass("btn-danger").removeClass("btn-primary").removeClass("btn-success").addClass("btn-default");
												
											}
										}
										return false;
									}
									function loginforminputfieldfocus(loginformobj,fielder){
										if(loginformobj){
											formfieldgroup = false;
											formfieldbtn = false;
											switch(fielder){
													case "username":
														formfieldgroup = loginformobj.find("#username-field-form-group");
														formfieldbtn = loginformobj.find("#username-field-btn");
														break;
													case "password":
														formfieldgroup = loginformobj.find("#password-field-form-group");
														formfieldbtn = loginformobj.find("#password-field-btn");
														break;
													default:
														formfieldgroup = loginformobj.find(".form-field-form-group");
														formfieldbtn = loginformobj.find(".form-field-btn");
														break;
												}
											if(formfieldgroup && formfieldbtn){
												
												formfieldgroup.removeClass("has-error").removeClass("has-success");
												formfieldbtn.removeClass("btn-danger").removeClass("btn-default").removeClass("btn-success").addClass("btn-primary");
												
											}
										}
										return false;
									}
									function makeAlertmessage(messagetitle,messagetype,newmessage){
												alertmessage = "<div class=\"alert alert-"+messagetype+" rounded-corners\">";
														alertmessage += "<a class=\"close sr-only\" data-dismiss=\"alert\" href=\"#\" aria-hidden=\"true\">&times;</a>";
														alertmessage += "<i class=\"fa fa-exclamation-circle fa-3x pull-left\"></i>";
														alertmessage += "<p class=\" margin-left-50\">";
															alertmessage += "<strong>";
																alertmessage += messagetitle;
															alertmessage += "</strong>";
														alertmessage += "</p>";
														alertmessage += "<div class=\" margin-left-50\">";
													if(isArray(newmessage)){
														for(i in newmessage){
															alertmessage += newmessage[i];
														}
													}else{
														alertmessage += newmessage;
													}
													alertmessage += "</div>";	
												alertmessage += "</div>";
												return alertmessage ;
											}
											function isArray(varia){
											
												if(typeof(varia)=="object" && varia.length > 0){
													return true;
												}
												return false;
											}
											
											function updateloginformclearbtn(loginformobj){
												if(loginformobj){
													usernameobj = loginformobj.find("input[name='usernamefield']");
													passwordobj = loginformobj.find("input[name='passwordfield']");
													resetbtnobj = loginformobj.find("button#loginformresetbtn");
													if(usernameobj && passwordobj){
														
														if(usernameobj.val().length > 0 || passwordobj.val().length > 0){
															if(resetbtnobj){
																resetbtnobj.removeClass("btn-default").addClass("btn-warning");
																// resetbtnobj.prop("disabled",false);
															}
														}else{
															if(resetbtnobj){
																resetbtnobj.removeClass("btn-warning").addClass("btn-default");
																// resetbtnobj.prop("disabled",true);
															}
														}
													}
												}
												return false;
											}
											function updateloginformsubmitbtn(loginformobj){
												if(loginformobj){
													usernameobj = loginformobj.find("input[name='usernamefield']");
													passwordobj = loginformobj.find("input[name='passwordfield']");
													submitbtnobj = loginformobj.find("button#loginformsubmitbtn");
													if(usernameobj && passwordobj){
														
														if(usernameobj.val().trim().length > 0 && passwordobj.val().trim().length > 0){
															if(submitbtnobj){
																submitbtnobj.removeClass("btn-primary").removeClass("btn-default").addClass("btn-success");
															}
														}else{
															if(usernameobj.val().trim().length > 0 || passwordobj.val().trim().length > 0){
																if(submitbtnobj){
																	submitbtnobj.addClass("btn-primary").removeClass("btn-default").removeClass("btn-success");
																}
															}else{
																if(submitbtnobj){
																	submitbtnobj.removeClass("btn-primary").addClass("btn-default").removeClass("btn-success");
																}
															}
														}
													}
												}
												return false;
											}