$(document).ready(function () {
    $("#userName").blur(function () {
        warnUserName("#userName");
    });

    $("#password").blur(function () {
        warnPassword("#password");
    });
    $("#confirmPassword").blur(function () {
        warnConfirmPassword("#confirmPassword");
    });

    $("#email").blur(function () {
        warnEmail("#email");
    });

    $("#registerForm").on("submit", checkAll);

});

function testUserName(id) {
    var str = $(id).val();
    if (str.length == 0) {
        $("#hintUserName").text("*User name cannot be empty");
        return false;
    }

    if (/\W/.test(str)) { 
        $("#hintUserName").text("*User name should use only characters and digits and underscore");
        return false;
    }

    return true;
}

function warnUserName(id) {
    if (!testUserName(id)) {
        $("#hintUserName").css("visibility", "visible");
        return true;
    } else { 
        $("#hintUserName").css("visibility", "hidden");
        return false;
    }
}

function testPassword(id) {
    var str = $(id).val();
    if (str.length == 0){
        $("#hintPassword").text("*Password cannot be empty.");
        return false;
    }

    if (str.length < 8){
        $("#hintPassword").text("*Password should be at least 8 characters.");
        return false;
    }

    if (!/\W/.test(str)){
        $("#hintPassword").text("*Password should contain at least 1 symble.");
        return false;
    }

    if (!(/[A-Z]/.test(str) && /[a-z]/.test(str))){
        $("#hintPassword").text("*Password should contain upper and lower case.");
        return false;
    }

    if (!/\d/.test(str)){
        $("#hintPassword").text("*Password should contain at least 1 number.");
        return false;
    }
    return true;
}

function warnPassword(id) { 
    if (!testPassword(id)) {
        $("#hintPassword").css("visibility", "visible");
        return true;
    } else { 
        $("#hintPassword").css("visibility", "hidden");
        return false;
    }
}

function testConfirmPassword(id) {
    var str = $(id).val();
    if (str.length == 0) { 
        $("#hintConfirmPassword").text("*Password cannot be empty.");
        return false;
    }

        if (str != $("#password").val()) { 
        $("#hintConfirmPassword").text("*Two password are not the same, please enter again.");
        return false;
    }
    return true;
}

function warnConfirmPassword(id) { 
    if (!testConfirmPassword(id)) {
        $("#hintConfirmPassword").css("visibility", "visible");
        return true;
    } else { 
        $("#hintConfirmPassword").css("visibility", "hidden");
        return false;
    }
}

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

function warnEmail(id) {
    if (!testEmail(id)) {
        $("#hintEmail").css("visibility", "visible");
        return true;
    } else { 
        $("#hintEmail").css("visibility","hidden");
        return false;
    }

}

function checkAll() {
    var formValid = true;
    if (warnUserName("#userName")) { 
        formValid = false;
    }

    if (warnPassword("#password")) { 
        formValid = false;
    }

    if (warnConfirmPassword("#confirmPassword")) { 
        formValid = false;
    }

    if (warnEmail("#email")) { 
        formValid = false;
    }

    return formValid;

}