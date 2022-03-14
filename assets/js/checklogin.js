$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "http://localhost/Helperland/CheckLogin",
        success: function (response) {
            if(response == 0)
            swal({
                position: 'center',
                icon: 'warning',
                text: 'You are not logged in anymore.',
                buttons: false,
                timer: 2500,
            })
            .then((result) => {
                window.location.href = "http://localhost/Helperland/#login_modal";
            });  
        }
    });
});