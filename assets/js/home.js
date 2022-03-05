function loginmodal() {
    window.location.href = "#login_modal";

    $('#login_modal .btn-close').click(function() {
        window.location.href = "";
    });
}

$(document).ready(function() {

    if (window.location.href.indexOf('#login_modal') != -1) {

        $('#login_modal').modal('show');

        $('#login_modal .btn-close').click(function() {
            window.location.href = "";
        });
    }
});

function forgotpasswordmodal() {
    window.location.href = "#forgotpassword_modal";

    $('#forgotpassword_modal .btn-close').click(function() {
        window.location.href = "";
    });
}

$(document).ready(function() {

    if (window.location.href.indexOf('#forgotpassword_modal') != -1) {

        $('#forgotpassword_modal').modal('show');

        $('#forgotpassword_modal .btn-close').click(function() {
            window.location.href = "";
        });
    }
});