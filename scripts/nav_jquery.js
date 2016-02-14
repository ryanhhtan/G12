$(document).ready(function(){

   // jQuery methods go here...
   
   
   
   	 $("#studyinfomenu").mouseenter(function(){
		hideAllMenu();
		$("#studyinfo").css("visibility", "visible");
	});
	
	 $("#livinginfomenu").mouseenter(function(e){
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
	
	$("#studyinfo").mouseleave(function(){
		$("#studyinfo").css("visibility", "hidden");
	});
	
	$("#livinginfo").mouseleave(function(){
		$("#livinginfo").css("visibility", "hidden");
	});
	
	$("#interaction").mouseleave(function(){
		$("#interaction").css("visibility", "hidden");
	});
	

});

function hideAllMenu(){
	$("#studyinfo").css("visibility", "hidden");
	$("#livinginfo").css("visibility", "hidden");
	$("#interaction").css("visibility", "hidden");
}