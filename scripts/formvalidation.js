/*bind the validation with elements*/
$(document).ready(function () {
    $("#email").change(function () {
        warnInvalidEmail("#email");
    });

    $("#name").change(function () {
        warnInvalidName("#name");
    });


});


/*email validation*/
//test function
function testEmail(id) {
    var str = $(id).val();
    return (/[a-zA-Z0-9]+@[a-zA-Z0-9]+[.](com|net|org|ca)$/i.test(str));
}

function warnInvalidEmail(id) {
    if (!testEmail(id)) {
        alert("Invalid email address, please input again.\n"
        + "-Must contain \"@\"\n"
        + "-Must end with \".com\", \".net\", \".org\" or \".ca\"");
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
        alert("Invalid name, please input again or check the \"Keep me anonymous box\".");
    }
}

/*suggestion validation*/
//test function
function testSuggestion(id) {
    return ($(id).val().length != 0);
}

//warn function
function warnInvalidSuggestion(id) {
    if (!testName(id)) {
        alert("Invalid name, please input again or check the \"Keep me anonymous box\".");
    }
}