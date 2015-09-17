function resizeContainer(itsonresize=false){
	var currentHeight = $(this).height();
	var currentWidth = $(this).width();
	var pagebodyobj = $("body");
	var pagebodywrapperobj = $("#page-body-content-wrapper");
	var pagecontentwrapperobj = $("#page-content-wrapper");
	var pagecontentcontainerobj = $("#page-content-container");
	var deduction = 0;
	var oldMinimumheight = (pagecontentwrapperobj)?pagecontentwrapperobj.height():0
	var minimumHeight = (pagecontentcontainerobj)?(pagecontentcontainerobj.height()+10):0;
	var pagetopnavdivobj = $("#page-top-nav");
	if(pagebodyobj && pagebodyobj.hasClass("with-top-nav")){
		if(pagetopnavdivobj){
			deduction += (pagetopnavdivobj.height() + 20);
		}else{
			deduction += 70;
		}
	}
	if(pagebodywrapperobj && pagebodywrapperobj.hasClass("with-page-header")){
		var pageheaderdivobj = $("#page-header");
		if(pageheaderdivobj){
			deduction += (pageheaderdivobj.height() + 20);
		}else{
			deduction += 20;
		}
	}
	if(pagebodywrapperobj && pagebodywrapperobj.hasClass("with-page-top-menu")){
		var pagetopmenuobj = $("#page-top-menu");
		if(pagetopmenuobj){
			deduction += (pagetopmenuobj.height() + 20);
		}else{
			deduction += 20;
		}
	}
	if(pagebodywrapperobj && pagebodywrapperobj.hasClass("with-page-footer")){
		var pagefooterdivobj = $("#page-footer");
		if(pagefooterdivobj){
			deduction += (pagefooterdivobj.height() + 20);
		}else{
			deduction += 20;
		}
		
	}
	var newMinimumheight = (currentHeight-deduction);
	if(pagecontentwrapperobj){
		if(minimumHeight < newMinimumheight){
			pagecontentwrapperobj.css("minHeight",currentHeight-deduction);	
		}else{
			pagecontentwrapperobj.css("minHeight",minimumHeight);
		}
	}
	
}
function resizeCollapsesidenav(itsonresize=false){
	console.log("REsizing Collpapse side nav start!!!");
	var currentHeight = $(this).height();
	var currentWidth = $(this).width();
	var pagebodyobj = $("body");
	var pagetopnavdivobj = $("#page-top-nav");
	var collapseSidenavobj = $("#my-side-nav");
	var collapseSidenavheight = 0;
	var deduction = 0;
	if(pagetopnavdivobj){
		deduction = pagetopnavdivobj.height() + 1;
	}
	 
	collapseSidenavheight = currentHeight - deduction;
	

	if(collapseSidenavobj){
		collapseSidenavobj.css("height",collapseSidenavheight);
	}
	console.log("REsizing Collpapse side nav done!!!");

}
function togglethis(toggleId){

	$("#"+toggleId).toggle();

}
function changeIcon(containerId,tagId,defaultIc,newIc){
	
	$("#"+containerId).find("."+defaultIc).fadeOut(function(){
		
		$("#"+tagId).removeClass(defaultIc);
		$("#"+tagId).addClass(newIc);
		$("#"+containerId).find("."+newIc).fadeIn();
	});
	$("#"+containerId).find("."+newIc).fadeOut(function(){
		
		$("#"+tagId).removeClass(newIc);
		$("#"+tagId).addClass(defaultIc);
		$("#"+containerId).find("."+defaultIc).fadeIn();
	});
}
function hideThis(elemId){
	$('#'+elemId).slideUp(function(){
			this.remove();
	});
}
function scrollTo(selectorId, time, verticalOffset) {
	
	time = typeof(time) != 'undefined' ? time : 1000;
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('#'+selectorId);
	offset = element.offset();
	offsetTop = offset.top + verticalOffset;
	$('html, body').animate({
		scrollTop: offsetTop
	}, time);
}
$(document).ready(function() {
	resizeContainer(); 
	resizeCollapsesidenav();
	$(window).on("resize",function(){
		resizeContainer(true); 
		resizeCollapsesidenav(true);
	});
	$("button.my-navbar-toggle").on("click",function(){
		console.log("hi");
		var wrapperobj = $("#page-body-content-wrapper");
		var targetobj = $($(this).attr("data-target"));
		if(wrapperobj){
			console.log("1");
			if(wrapperobj.hasClass("with-collapse-side-nav")){
				wrapperobj.removeClass("with-collapse-side-nav").addClass("without-collapse-side-nav");
				if(targetobj){
					if(targetobj.hasClass("my-navbar-collapse-show")){
						targetobj.removeClass("my-navbar-collapse-show");
					}
					targetobj.addClass("my-navbar-collapse-hide");
					targetobj.find("#my-side-nav").addClass("hide-side-nav");
				}
			}else if(wrapperobj.hasClass("without-collapse-side-nav")){
				wrapperobj.removeClass("without-collapse-side-nav").addClass("with-collapse-side-nav");
				if(targetobj){
					if(targetobj.hasClass("my-navbar-collapse-hide")){
						targetobj.removeClass("my-navbar-collapse-hide");
					}
					targetobj.addClass("my-navbar-collapse-show");
					targetobj.find("#my-side-nav").removeClass("hide-side-nav");
				}
			}else{
				wrapperobj.removeClass("with-collapse-side-nav").addClass("without-collapse-side-nav");
				if(targetobj){
					if(targetobj.hasClass("my-navbar-collapse-show")){
						q.removeClass("my-navbar-collapse-show");
					}
					targetobj.addClass("my-navbar-collapse-hide");
					targetobj.find("#my-side-nav").addClass("hidethis");
				}
			}
			
		}
		console.log("2");
		return false;
	});
	$(".side-nav").on("scroll",function(){

		console.log("Scrolling ME!");

	});
	$("button.button-link").on("click",function(){
		window.location.href = $(this).attr("link-url");
	});
});