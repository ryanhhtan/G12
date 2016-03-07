    var currentPath;
    var lastSlash;
    var fileName;
    var baseDir;
    var xhttpHeader;
    var xhttpFooter;

    $(document).ready(function () {
        initXhttp();
        regulatePath();
        loadHeader();
        loadFooter();
    });

function initXhttp() { 
    xhttpHeader = new XMLHttpRequest();
    xhttpFooter = new XMLHttpRequest();
}

function regulatePath() { 
    currentPath = location.pathname;
    lastSlash = currentPath.lastIndexOf("/");
    fileName = currentPath.substring(lastSlash + 1, currentPath.length);
    if (fileName == "index.html" || fileName == "") {
        baseDir = "";
    } else {
        baseDir = "../";
    }
}

function loadHeader() { 

    xhttpHeader.onreadystatechange = function () {
        var loadedContent="";
        if (xhttpHeader.readyState == 4 && xhttpHeader.status == 200) {
            loadedContent = xhttpHeader.responseText;
        if (loadedContent.length == 0) {
            loadedContent = "<p>Network error occured, please reload the page.</p>";
        } else if (baseDir == "") {
            loadedContent = loadedContent.replace(/[.]{2}\//g, "");
        }
        $("#header").empty();
        $("#header").append(loadedContent);
        }

    };
    xhttpHeader.open("GET", baseDir + "html/header.html", true);
    xhttpHeader.send();
}

function loadFooter() {
    xhttpFooter.onreadystatechange = function () {
        var loadedContent = "";
        var htmlValidatorURL;
        var cssValidatorURL;
        if (xhttpFooter.readyState == 4 && xhttpFooter.status == 200) {
            loadedContent = xhttpFooter.responseText;
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

    };
    xhttpFooter.open("GET", baseDir + "html/footer.html", true);
    xhttpFooter.send();
}