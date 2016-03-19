$(document).ready(function () {
    $("#topic").blur(function () {
        warnTopic("#topic");
    });

    $("#newComment").blur(function () {
        warnNewComment("#newComment");
    });

    $("#replyComment").blur(function () {
        warnReplyComment("#replyComment");
    });

    $("#newPostForm").on("submit",checkNewPostForm);
    $("#replyPostForm").on("submit",checkReplyPostForm);

});

function testTopic(id) {
    if($(id).val().length == 0) {
        $("#hintTopic").text("*Topic cannot be empty");
        return false;
    }
    return true;
} 

function warnTopic(id) {
    if (!testTopic(id)) {
        $("#hintTopic").css("visibility", "visible");
    } else { 
        $("#hintTopic").css("visibility", "hidden");
    }
}

function testNewComment(id) {
    if($(id).val().length == 0) {
        $("#hintNewComment").text("*Comment cannot be empty");
        return false;
         }
    return true;
     }


function testReplyComment(id) {
    if($(id).val().length == 0) {
        $("#hintReplyComment").text("*Comment cannot be empty");
        return false;
         }
    return true;
     }

function warnNewComment(id) { 
    if (!testNewComment(id)) {
        $("#hintNewComment").css("visibility", "visible");
    } else { 
        $("#hintNewComment").css("visibility", "hidden");
    }
}

function warnReplyComment(id) { 
    if (!testReplyComment(id)) {
        $("#hintReplyComment").css("visibility", "visible");
    } else { 
        $("#hintReplyComment").css("visibility", "hidden");
    }
}


function checkNewPostForm() {
    var newPostComplete = true;
    if (!testTopic("#topic")) {
        newPostComplete = false;
        $("#hintTopic").css("visibility", "visible");
    }
    if (!testNewComment("#newComment")) {
        newPostComplete = false;
        $("#hintNewComment").css("visibility", "visible");
    }
    return newPostComplete;
}

function checkReplyPostForm() { 
    var replyPostComplete = true;

    if (!testReplyComment("#replyComment")) {
        replyPostComplete = false;
        $("#hintReplyComment").css("visibility", "visible");
    }
    return replyPostComplete;
}