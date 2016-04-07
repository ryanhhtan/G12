$(document).ready(function(){

   // jQuery methods go here...
   
   
   
   	 $("#studyinfomenu").mouseenter(function(){
		hideAllMenu();
		$("#studyinfo").css("visibility", "visible");
	});
	
	 $("#livinginfomenu").mouseenter(function(){
		 hideAllMenu();
		$("#livinginfo").css("visibility", "visible");
	});
	
	$("#interactingmenu").mouseenter(function(){
		hideAllMenu();
		$("#interaction").css("visibility", "visible");
	});
	
	$("#aboutmenu").mouseenter(function(){
		hideAllMenu();
	});
	
	$("#sitemapmenu").mouseenter(function(){
		hideAllMenu();
	});
	
	$("#navigation").mouseenter(function(){
		hideAllMenu();
	});
	
	$("#homepage").mouseenter(function(){
		hideAllMenu();
	});
	
	$("#studyinfoUl").mouseleave(function(){
		$("#studyinfo").css("visibility", "hidden");
	});
	
	$("#livinginfoUl").mouseleave(function(){
		$("#livinginfo").css("visibility", "hidden");
	});
	
	$("#interactionUl").mouseleave(function(){
		$("#interaction").css("visibility", "hidden");
	});
	

});

function hideAllMenu(){
	$("#studyinfo").css("visibility", "hidden");
	$("#livinginfo").css("visibility", "hidden");
	$("#interaction").css("visibility", "hidden");
}