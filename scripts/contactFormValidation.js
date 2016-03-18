/*bind the validation with elements*/
$(document).ready(function () {
    resetAll();
    $("#email").blur(function () {
        warnInvalidEmail("#email");
    });

    $("#name").blur(function () {
        warnInvalidName("#name");
    });

    $("#suggestion").blur(function () {
        warnInvalidSuggestion("#suggestion");
    });

    $("#anonymous").click(function () {
        if ($("#anonymous").prop("checked")) {
            $("#name").val("anonymous");
            $("#name").prop("disabled", true);
            $("#nameAsterisk").css("visibility", "collapse");
            $("#hintName").css("visibility", "collapse");

        } else {
            $("#name").val("");
            $("#name").prop("disabled", false);
            $("#name").focus();
            $("#nameAsterisk").css("visibility", "visible");
            $("#hintName").css("visibility", "visible");
        }
    });

    $(":reset").click(function () {
        resetAll();
    });
    $("#contactform").on("submit", checkAll);
});


/*email validation*/
//test function
function testEmail(id) {
    var str = $(id).val();
	//empty email address
    if (str.length == 0){
        $("#hintEmail").text("*Email cannot be empty.");
        return false;
    }
	
	//Not begin with letters or digits.
	if (!/^\w/.test(str)) {
	    $("#hintEmail").text("*Email should begin with letters or digits.");
        return false;
	}
	
	//Not containing "@"
	if(!/@/.test(str)) {
		$("#hintEmail").text("*Email should contain an \"@\" sign.");
        return false;
	}	
	
	//Containing space
	if (/\s/.test(str)){
		$("#hintEmail").text("*Email should not contain space.");
        return false;

	}
	
	//Containing more than one "@"
	if(/[@][\w\W]*[@]/.test(str)) {
		$("#hintEmail").text("*Email should contain only one \"@\" sign.");
        return false;
	}
	
	//"@"bfollowed by ".", no domain name 
	if(/@[.]/.test(str)) {
		$("#hintEmail").text("\"@\" should not immediately followed by \".\"");
        return false;
	}
		
	//Containing special characters
	if(/[^\w@.]/.test(str)) {
		$("#hintEmail").text("*Email should contain only characters and digits.");
        return false;
	}
	
	if(/[.][.]/.test(str)) {
		$("#hintEmail").text("*Email should not contain \"..\"");
        return false;
	}
	
	//End with invalid domain name
	if(!/[.][\w]{2,}$/.test(str)) {
		$("#hintEmail").text("*Email should end with a top level domain name.");
        return false;		
	}	
	return true;
}

function warnInvalidEmail(id) {
    if (!testEmail(id)) {
        $("#emailAsterisk").css("visibility", "visible");
        $("#hintEmail").css("visibility", "visible");
        return true;
    } else { 
        $("#emailAsterisk").css("visibility","collapse");
        $("#hintEmail").css("visibility","collapse");
        return false;
    }

}

/*name validation*/
//test function
function testName(id) {
    return ($(id).val().length != 0);
}

//warn function
function warnInvalidName(id) {
    if (!testName(id)) {
        //alert("Invalid name, please input again or check the \"Keep me anonymous box\".");
        $("#nameAsterisk").css("visibility", "visible");
        $("#hintName").css("visibility", "visible");
        return true;
    } else { 
    $("#nameAsterisk").css("visibility","collapse");
    $("#hintName").css("visibility","collapse");
    return false;
    }

}

/*suggestion validation*/
//test function
function testSuggestion(id) {
    return ($(id).val().length != 0);
}

//warn function
function warnInvalidSuggestion(id) {
    if (!testSuggestion(id)) {
        //alert("Invalid name, please input again or check the \"Keep me anonymous box\".");
        $("#suggestionAsterisk").css("visibility", "visible");
        $("#hintSuggestion").css("visibility", "visible");
        return true;
    } else { 
        $("#suggestionAsterisk").css("visibility","collapse");
        $("#hintSuggestion").css("visibility","collapse");
        return false;
    }
}

function checkAll() {
    var formComplete = true;

    if (warnInvalidName($("#name"))) 
        formComplete = false;

    if (warnInvalidEmail($("#email"))) 
        formComplete = false;

    if (warnInvalidSuggestion($("#suggestion"))) 
        formComplete = false;

    if (formComplete) {
        $("#name").prop("disabled", false);
        $("#anonymous").prop("checked", false);
         }

    return formComplete;
}

function resetAll(){
    $("#name").val("");
    $("#email").val("");
    $("#suggestion").val("");
    $("#name").prop("disabled", false);
    $("#hintName").css("visibility", "collapse");
    $("#hintEmail").css("visibility", "collapse");
    $("#hintSuggestion").css("visibility", "collapse");
}