function selectNewcurriculum(){
	console.log("You had selected the new Curriculum! Right?");
	
}
function selectRealignedform(){
	console.log("You had selected the realigned Curriculum! Right?");
}
function resetCreatecurriculumform(){
	var createCurriculumformobj = $("form#createCurriculumform");
	if(createCurriculumformobj){

		createCurriculumformobj.find(".create-curriculum-form-group").each(function(){
			$(this).removeClass("has-error");
			$(this).removeClass("has-success");
			$(this).find(".help-block").remove();
		});
		
		var inputCurriculumcourseobj = createCurriculumformobj.find("select#inputCurriculumcourse");
		var inputCurriculummajorobj = createCurriculumformobj.find("select#inputCurriculummajor");
		var inputCurriculumdescriptionobj = createCurriculumformobj.find("input#inputCurriculumdescription");
		var inputCurriculumyearobj = createCurriculumformobj.find("select#inputCurriculumyear");
		var createTypeobj = createCurriculumformobj.find("input[type='radio'][name='curriculumType'][value='newcurriculum']");
		
		var curriculumformerrorconatinerobj = createCurriculumformobj.find("#curriculumformerrorcontainer");
		
		
		if(inputCurriculumcourseobj){
			inputCurriculumcourseobj.val("");
		}
		if(inputCurriculummajorobj){
			inputCurriculummajorobj.val("");
		}
		if(inputCurriculumdescriptionobj){
			inputCurriculumdescriptionobj.val("");
		}
		if(inputCurriculumyearobj){
			inputCurriculumyearobj.val("");
		}

		if(createTypeobj){
			createTypeobj.prop("checked",true);
			
		}

		if(curriculumformerrorconatinerobj){
			curriculumformerrorconatinerobj.slideUp("slow",function(){
				$(this).find(".alert").fadeOut("fast");
				$(this).html(" ");
				
			});
			
		}
		
	}
}

$(document).ready(function(){

	
	$("button#resetCurriculumbtn").on("click",function(){
		resetCreatecurriculumform();
		return false;
	});

	$("button#cancelCurriculumbtn").on("click",function(){
		
	});
	$("select#inputCurriculumselectinfo").on("change",function(){
		
			var selectCurriculuminfoformobj = $("form#selectCurriculuminformationform");
			if(selectCurriculuminfoformobj){
				selectCurriculuminfoformobj.submit();
			}else{
				alert("Error! Please Try again! ^_^ ");
			}
			
	});
	
	
	$("input[type='text'].curriculumSubjecttypeunitinput").on("change",function(){
	
		var targetId = $(this).attr("target-id");
		var curValue = $(this).val();
		if(targetId){
			var targetObj = $("input[type='checkbox']#"+targetId);
			if(targetObj){
				if(curValue > 0){
					targetObj.prop("checked",true);
					targetObj.change();
				}else{
					targetObj.prop("checked",false);
					targetObj.change();
				}
			}
		}
	});
	$("a.curriculumSubjecttypeunitup").on("click",function(){
		var targetId = $(this).attr("target-id");
		if(targetId){
			var targetObj = $("input[type='text']#"+targetId);
			if(targetObj){
				var curValue = targetObj.val();
				var nextValue = curValue+1;
				var targetId2 = targetObj.attr("target-id");
				var targetObj2 = $("input[type='checkbox']#"+targetId2);
				if(targetObj2){
					if(nextValue > 0){
						targetObj2.prop("checked",true);
						targetObj2.change();
					}else{
						targetObj2.prop("checked",false);
						targetObj2.change();
					}
				}
			}
		}
	});

	$("a.curriculumSubjecttypeunitdown").on("click",function(){
		var targetId = $(this).attr("target-id");
		if(targetId){
			var targetObj = $("input[type='text']#"+targetId);
			if(targetObj){
				var curValue = targetObj.val();
				var nextValue = curValue-1;
				var targetId2 = targetObj.attr("target-id");
				var targetObj2 = $("input[type='checkbox']#"+targetId2);
				if(targetObj2){
					if(nextValue > 0){
						targetObj2.prop("checked",true);
						targetObj2.change();
					}else{
						targetObj2.prop("checked",false);
						targetObj2.change();
					}
				}
			}
		}
	});
})