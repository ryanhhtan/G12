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
    $("#loginPane").css("visibility", "visible");
}

function hideLoginForm() {
    $("#loginPane").css("visibility", "hidden");
}

function showNewPostPane() {
    $("#newPostPane").css("visibility", "visible");
}

function hideNewPostPane() {
    $("#newPostPane").css("visibility", "hidden");
}

function showReplyPostPane() {
    $("#replyPostPane").css("visibility", "visible");
}
function hideReplyPostPane() {
    $("#replyPostPane").css("visibility", "hidden");
}

