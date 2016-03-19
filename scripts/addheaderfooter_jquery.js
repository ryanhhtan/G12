    var currentPath;
    var lastSlash;
    var fileName;
    var baseDir;
    var xhttpHeader;
    var xhttpFooter;

    $(document).ready(function () {
        regulatePath();
        loadDoc(baseDir + "php/header.php", loadHeader);
        loadDoc(baseDir + "php/footer.php", loadFooter);
    });

    function loadDoc(url, callbackFunc) { 
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            callbackFunc(xhttp);
        }
    };
      xhttp.open("POST", url, true);
      xhttp.send();
    }


function regulatePath() { 
    currentPath = location.pathname;
    lastSlash = currentPath.lastIndexOf("/");
    fileName = currentPath.substring(lastSlash + 1, currentPath.length);
    if (fileName == "index.php" || fileName == "") {
        baseDir = "";
    } else {
        baseDir = "../";
    }
}

function loadHeader(xhttp) { 
    var loadedContent = xhttp.responseText;
    if (loadedContent.length == 0) {
        loadedContent = "<p>Network error occured, please reload the page.</p>";
    } else if (baseDir == "") {
        loadedContent = loadedContent.replace(/[.]{2}\//g, "");
    }
    $("#header").empty();
    $("#header").append(loadedContent);
    $("#loginLink").click(function () {
        showLoginForm();
        return false;
        });

}

function loadFooter(xhttp) {
    var loadedContent = xhttp.responseText;
    var htmlValidatorURL;
    var cssValidatorURL;
    if (loadedContent.length == 0) {
        loadedContent = "<p>Network error occured, please reload the page.</p>";
    } else if (baseDir == "") {
        loadedContent = loadedContent.replace(/[.]{2}\//g, "");
        htmlValidatorURL = "https://validator.w3.org/nu/?doc=http%3A%2F%2Fstudents.bcitdev.com%2FA00950721%2FG12%2F" + fileName;
    } else {
        if (fileName.substring(fileName.length - 3) == "php") {
            htmlValidatorURL = "https://validator.w3.org/nu/?doc=http%3A%2F%2Fstudents.bcitdev.com%2FA00950721%2FG12%2Fphp%2F" + fileName;
        } else {
            htmlValidatorURL = "https://validator.w3.org/nu/?doc=http%3A%2F%2Fstudents.bcitdev.com%2FA00950721%2FG12%2Fhtml%2F" + fileName;
        }
    }
    cssValidatorURL = "https://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Fstudents.bcitdev.com%2FA00950721%2FG12%2Fstyle%2Fbase.css&profile=css3&usermedium=all&warning=1&vextwarning=&lang=en";
    loadedContent = loadedContent.replace("https://validator.w3.org", htmlValidatorURL);
    loadedContent = loadedContent.replace("https://jigsaw.w3.org/css-validator/", cssValidatorURL);
    $("#footer").empty();
    $("#footer").append(loadedContent);
    
}
