/*bind the validation with elements*/
$(document).ready(function () {
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
    if (str.length == 0) {
        $("#hintEmail").text("Email can not be blank.");
        return false;
    } else if (! (/^[a-zA-Z0-9]/.test(str))) {
        $("#hintEmail").text("Email should begin with letters or number.");
        return false;
    } else if (! (/^[a-zA-Z0-9]+@/.test(str))) {
        $("#hintEmail").text("Email should contain a \"@\" sign.");
        return false;
    } else if (! (/[.](com|net|org|ca)$/i.test(str))) {
        $("#hintEmail").text("Email should end with \".com\",  \".net\",  \".org\" or  \".ca\".");
        return false;
    } else {
        return true;
    }
    //return (/[a-zA-Z0-9]+@[a-zA-Z0-9]+[.](com|net|org|ca)$/i.test(str));
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