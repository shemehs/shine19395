function initializeAllcheck(checkname,cstatus=false,defaultschecked){
	
	var checkAlllink = $(".check-all-"+checkname+"-link");
	var returnValue = false;
	if(checkAlllink){
		var targetId = checkAlllink.attr("target-id");
		var targetName = checkAlllink.attr("target-name");
		var targetsName = checkAlllink.attr("targets-name");
		
				
				
				if(defaultschecked && defaultschecked.length > 0){
					
					var targetsObj = $("input[type = 'checkbox']."+targetsName);
					if(targetsObj){
						targetsObj.each(function(){
							var defaultchecked = false;
							var targetValue = $(this).val();
							for(i in defaultschecked){
								if(defaultschecked[i] == targetValue){
									defaultchecked = true;
								}
								if(cstatus || defaultchecked){
									$(this).prop("checked",true);
									$(this).change();
								}else{
									$(this).prop("checked",false);
									$(this).change();
								}
							}
						});
						
					}
					

				}else{
					if(targetId){
						var targetObj = $("input[type = 'checkbox']#"+targetId);
						if(targetObj){
							if(cstatus){
								targetObj.prop("checked",true);
								targetObj.change();
							}else{
								targetObj.prop("checked",false);
								targetObj.change();
							}
						}
					}	
				}
				
				returnValue = true;
	}
	return returnValue;
}
function checkAllcheck(name){
	var checkAlllink = $(".check-all-"+name+"-link");
	var returnValue = false;
	if(checkAlllink){
		var checkAlllinkicon = checkAlllink.find(".glyphicon");
		var targetsName = checkAlllink.attr("targets-name");
		var targetId = checkAlllink.attr("target-id");
	
		var checkAllinputobj = (targetId)?$("input[type = 'checkbox']#"+targetId):false;
		
		if(targetsName){
			var targetsObj =$("input[type = 'checkbox']."+targetsName);
			if(targetsObj){
				var targetsSize = targetsObj.length;
				var checkedTargetsobj =$("input[type = 'checkbox']."+targetsName+":checked");
				var checkedTargetsSize = checkedTargetsobj.length;
				
				var notCheckedsize = targetsSize - checkedTargetsSize;
				if(checkAlllinkicon){
					if(notCheckedsize > 0){
						checkAlllinkicon.removeClass("glyphicon-check");
						checkAlllinkicon.addClass("glyphicon-unchecked");
						if(checkAllinputobj){
							checkAllinputobj.prop("checked",false);
						}
						returnValue = false; 
					}else{
						checkAlllinkicon.removeClass("glyphicon-unchecked");
						checkAlllinkicon.addClass("glyphicon-check");
						if(checkAllinputobj){
							checkAllinputobj.prop("checked",true);
						}
						returnValue = true;
					}
				}
				


			}
		}
	}
	return returnValue;
}
function checkAll(name){
	var checkAlllink = $(".check-all-"+name+"-link");
	var returnValue = false;
	if(checkAlllink){
		var targetId = checkAlllink.attr("target-id");
		var targetName = checkAlllink.attr("target-name");
		var targetsName = checkAlllink.attr("targets-name");
		if(targetId){
			var targetObj = $("input[type = 'checkbox']#"+targetId);
			if(targetObj){
				if(targetObj.prop("checked")){
					targetObj.prop("checked",false);
					targetObj.change();
				}else{
					targetObj.prop("checked",true);
					targetObj.change();
				}
				returnValue = true;
			}
		}	
	}
	return returnValue;
}
function countAllchecked(name){
	var checkAlllink = $(".check-all-"+name+"-link");
	var returnValue = false;
	if(checkAlllink){
		var checkAlllinkicon = checkAlllink.find(".glyphicon");
		var targetsName = checkAlllink.attr("targets-name");
		var targetId = checkAlllink.attr("target-id");
	
		if(targetsName){
			var checkedTargetsobj =$("input[type = 'checkbox']."+targetsName+":checked");
			if(checkedTargetsobj){
				returnValue = checkedTargetsobj.length;
			}
		}
	}
	return returnValue;
}
function countAllcheckinput(name){
	var checkAlllink = $(".check-all-"+name+"-link");
	var returnValue = false;
	if(checkAlllink){
		var checkAlllinkicon = checkAlllink.find(".glyphicon");
		var targetsName = checkAlllink.attr("targets-name");
		var targetId = checkAlllink.attr("target-id");
	
		if(targetsName){
			var targetsObj =$("input[type = 'checkbox']."+targetsName);
			if(targetsObj){
				returnValue = targetsObj.length;
			}
		}
	}
	return returnValue;
}
$(document).ready(function(){

	$("input[type = 'checkbox'].check").on("change",function(){
		var inputchecked = $(this).prop("checked");
		var inputcheckid =  $(this).attr("id");
		var inputcheckname =  $(this).attr("input-name");
		var inputchecklink = $("."+inputcheckid+"-link");
		
		var inputchecklinkiconobj = (inputchecklink)?inputchecklink.find(".glyphicon"):false;
		if(inputchecklinkiconobj != false){
			if(inputchecked){
				inputchecklinkiconobj.removeClass("glyphicon-unchecked");
				inputchecklinkiconobj.addClass("glyphicon-check");
				checkAllcheck(inputcheckname);
			}else{
				inputchecklinkiconobj.removeClass("glyphicon-check");
				inputchecklinkiconobj.addClass("glyphicon-unchecked");
				checkAllcheck(inputcheckname);
			}
		}

		
	});
	$(".check-link").on("click",function(){

		var targetId = $(this).attr("target-id");
		var targetName = $(this).attr("target-name");
		if(targetId){
			var targetObj = $("input[type = 'checkbox']#"+targetId);
			if(targetObj){
				if(targetObj.prop("checked")){
					targetObj.prop("checked",false);
					targetObj.change();
				}else{
					targetObj.prop("checked",true);
					targetObj.change();
				}
			}
		}
		return false;

	});
	$(".check-all-link").on("click",function(){
		var targetId = $(this).attr("target-id");
		var targetName = $(this).attr("target-name");
		var targetsName = $(this).attr("targets-name");
		if(targetId){
			var targetObj = $("input[type = 'checkbox']#"+targetId);
			if(targetObj){
				if(targetObj.prop("checked")){
					targetObj.prop("checked",false);
					targetObj.change();
				}else{
					targetObj.prop("checked",true);
					targetObj.change();
				}
			}
		}
		return false;

	});
	$("input[type = 'checkbox'].check-all").on("change",function(){
		var checkallinputchecked = $(this).prop("checked");
		var checkallinputid =  $(this).attr("id");
		var checkallinputcheckname =  $(this).attr("input-name");
		var checkalllink = $("#"+checkallinputcheckname+"-link");

		var checkAlllinkicon = checkalllink.find(".glyphicon");
		var checkAlllinktargetsName = checkalllink.attr("targets-name");
		var checkAlllinktargetId = checkalllink.attr("target-id");
		
		if(checkAlllinktargetsName){
			var targetsObj = $("input[type = 'checkbox']."+checkAlllinktargetsName);
			if(targetsObj && targetsObj.length > 0){
				targetsObj.each(function(targetx,targety){
					var inputcheckid =  $(this).attr("id");
					var inputcheckname =  $(this).attr("name");
					var inputchecklink = $("."+inputcheckid+"-link");
					var inputchecklinkiconobj = (inputchecklink)?inputchecklink.find(".glyphicon"):false;
					if(checkallinputchecked){
						$(this).prop("checked",true);
						if(inputchecklinkiconobj){
							inputchecklinkiconobj.removeClass("glyphicon-unchecked");
							inputchecklinkiconobj.addClass("glyphicon-check");
						}
					}else{
						
						$(this).prop("checked",false);
						if(inputchecklinkiconobj){
							inputchecklinkiconobj.removeClass("glyphicon-check");
							inputchecklinkiconobj.addClass("glyphicon-unchecked");
						}
					}
				});
			}
		}
		if(checkallinputchecked){
			checkAlllinkicon.removeClass("glyphicon-unchecked");
			checkAlllinkicon.addClass("glyphicon-check");
		}else{
			checkAlllinkicon.removeClass("glyphicon-check");
			checkAlllinkicon.addClass("glyphicon-unchecked");
		}
	});

});