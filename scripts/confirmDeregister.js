$(document).ready(function () {
    $("#deregisterForm").on("submit", confirmDeregister);
});

function confirmDeregister() {
    return confirm("Are you sure to deregister?");
}