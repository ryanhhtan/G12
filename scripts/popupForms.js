$(document).ready(function () {

    $("#loginLink").click(function () {
        showLoginForm();
        return false;            
    });

    $("#btnNewPost").click(function () {
        if ($("#newPostPane").length) {
            showNewPostPane();
        } else {
            showLoginForm();
        }
    });

    $("#btnReplyPost").click(function () {
        if ($("#replyPostPane").length) {
            showReplyPostPane();
        } else {
            showLoginForm();
        }
    });

    $("#btnCloseReplyPostPane").click(function () {
        hideReplyPostPane();
    });

    $("#btnCloseNewPostPane").click(function () {
        hideNewPostPane();
    });

    $("#btnCloseLoginPane").click(function () {
        hideLoginForm();
    });
});

function showLoginForm() {
    setCenter("#loginPane");
    $("#loginPane").css("visibility", "visible");
}

function hideLoginForm() {
    $("#loginPane").css("visibility", "hidden");
    $(".hintInfo").css("visibility", "hidden");
}

function showNewPostPane() {
    setCenter("#newPostPane");
    $("#newPostPane").css("visibility", "visible");
}

function hideNewPostPane() {
    $("#newPostPane").css("visibility", "hidden");
    $(".hintInfo").css("visibility", "hidden");
}

function showReplyPostPane() {
    setCenter("#replyPostPane");
    $("#replyPostPane").css("visibility", "visible");
}
function hideReplyPostPane() {
    $("#replyPostPane").css("visibility", "hidden");
    $(".hintInfo").css("visibility", "hidden");
}

function setCenter(id) { 
    var top = ($(window).height() - $(id).height())/2;   
    var left = ($(window).width() - $(id).width())/2;   
    var scrollTop = $(document).scrollTop();   
    var scrollLeft = $(document).scrollLeft();
    $(id).css({ position: 'absolute', 'top': top + scrollTop, left: left + scrollLeft });
}
