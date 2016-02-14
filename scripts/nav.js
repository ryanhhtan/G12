document.getElementById("studyinformenu").onmouseover = function(){showStudentInfo()};
document.getElementById("livinginformenu").onmouseover = function(){showLivingInfo()};
document.getElementById("interactingmenu").onmouseover = function(){showInteractingInfo()};
document.getElementById("studyinfo").addEventListener('mouseout',hideStudentInfo,true);
document.getElementById("livinginfo").onmouseout = function(){hideLivingInfo()};
document.getElementById("interaction").onmouseout = function(){hideInteractingInfo()};


									
function showStudentInfo() {
document.getElementById("studyinfo").style.visibility = "visible";
}

function showLivingInfo() {	
document.getElementById("livinginfo").style.visibility = "visible";
}

function showInteractingInfo() {
document.getElementById("interaction").style.visibility = "visible";
}


function hideStudentInfo(event) {
var e = event.toElement || event.relatedTarget;
if (e.parentNode == this || e == this){
	return;
}
document.getElementById("studyinfo").style.visibility = "hidden";
}

function hideLivingInfo() {	
document.getElementById("livinginfo").style.visibility = "hidden";
}

function hideInteractingInfo() {
document.getElementById("interaction").style.visibility = "hidden";
}
