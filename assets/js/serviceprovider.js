$(document).ready(function () {

    var selectedrequestid;
    var selectedcustomerid;
    var selectedaddressid = "";
    selectedavatar = [];

    fill_sp_newservicerequest_table();
    fill_sp_upcomingservice_table();

    $(document).on ('click', '.tr-newservice', function (e) {
        selectedrequestid = this.id;
        fill_selected_request(); 
        $("#request_detail_modal").modal("toggle"); 
    });

    $(document).on ('click', '.btn-accept', function (e) {
        e.stopPropagation();
        selectedrequestid = this.id;
        acceptrequest();
    });

    $(document).on ('click', '.btn-cancel', function (e) {
        e.stopPropagation();
        selectedrequestid = this.id;
        cancelrequest();
    });

    $(document).on ('click', '.btn-complete', function (e) {
        e.stopPropagation();
        selectedrequestid = this.id;
        completerequest();
    });

    $(document).on ('click', '.block-button', function (e) {
        selectedcustomerid = this.id;
        block_customer();
    });

    $(document).on ('click', '.unblock-button', function (e) {
        selectedcustomerid = this.id;
        unblock_customer();
    });

    $(document).on ('click', '.sp-details-save', function (e) {
        selectedaddressid = this.id;
        save_sp_details();
    });

    $(".sp-dashboard").click(function (e) { 
        $(".sp-dashboard").addClass("active");
        $(".sp-dashboard-body").show();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").hide();
    });
    $(".sp-newservice-request").click(function (e) { 
        $(".sp-dashboard").removeClass("active");
        $(".sp-dashboard-body").hide();
        $(".sp-newservice-request").addClass("active");
        $(".sp-newservice-request-body").show();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").hide();

        fill_sp_newservicerequest_table();
    });
    $(".sp-upcoming-service").click(function (e) { 
        $(".sp-dashboard").removeClass("active");
        $(".sp-dashboard-body").hide();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").addClass("active");
        $(".sp-upcoming-service-body").show();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").hide();

        fill_sp_upcomingservice_table();
    });
    $(".sp-service-schedule").click(function (e) { 
        $(".sp-dashboard").removeClass("active");
        $(".sp-dashboard-body").hide();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").addClass("active");
        $(".sp-service-schedule-body").show();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").hide();
    });
    $(".sp-service-history").click(function (e) { 
        $(".sp-dashboard").removeClass("active");
        $(".sp-dashboard-body").hide();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").addClass("active");
        $(".sp-service-history-body").show();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").hide();

        fill_sp_servicehistory_table();
    });
    $(".sp-ratings").click(function (e) { 
        $(".sp-dashboard").removeClass("active");
        $(".sp-dashboard-body").hide();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").addClass("active");
        $(".sp-ratings-body").show();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").hide();

        fill_sp_rating_table();
    });
    $(".sp-block-customer").click(function (e) { 
        $(".sp-dashboard").removeClass("active");
        $(".sp-dashboard-body").hide();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").addClass("active");
        $(".sp-block-customer-body").show();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").hide();

        fill_customer_card();
    });
    $(".sp-notifications").click(function (e) { 
        $(".sp-dashboard").removeClass("active");
        $(".sp-dashboard-body").hide();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").addClass("active");
        $(".sp-notifications-body").show();
        $(".sp_mysetting").hide();
    });
    $(".sp-dashboard-dropdown").click(function (e) { 
        $(".sp-dashboard").addClass("active");
        $(".sp-dashboard-body").show();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").hide();
    });
    $(".sp-setting-dropdown").click(function (e) { 
        $(".sp-dashboard").removeClass("active");
        $(".sp-dashboard-body").hide();
        $(".sp-newservice-request").removeClass("active");
        $(".sp-newservice-request-body").hide();
        $(".sp-upcoming-service").removeClass("active");
        $(".sp-upcoming-service-body").hide();
        $(".sp-service-schedule").removeClass("active");
        $(".sp-service-schedule-body").hide();
        $(".sp-service-history").removeClass("active");
        $(".sp-service-history-body").hide();
        $(".sp-ratings").removeClass("active");
        $(".sp-ratings-body").hide();
        $(".sp-block-customer").removeClass("active");
        $(".sp-block-customer-body").hide();
        $(".sp-notifications").removeClass("active");
        $(".sp-notifications-body").hide();
        $(".sp_mysetting").show();
        $(".sp-details").addClass("active");
        $(".sp-details-body").show();
        $(".sp-password").removeClass("active");
        $(".sp-password-body").hide();

        $(".sp-error-message").html("");
        fill_sp_details();
    });
    $(".sp-details").click(function () { 
        $(".sp-details").addClass("active");
        $(".sp-details-body").show();
        $(".sp-password").removeClass("active");
        $(".sp-password-body").hide();
    });
    $(".sp-password").click(function () { 
        $(".sp-details").removeClass("active");
        $(".sp-details-body").hide();
        $(".sp-password").addClass("active");
        $(".sp-password-body").show();
        document.querySelector(".sp-password_error").innerHTML = "";
    });

    function fill_sp_newservicerequest_table () 
    {  
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=fill_sp_newservicerequest_table",
            data: "data",
            success: function (response) {
                $(".sp-newservice-table").html(response);
                $('#tablenewservicerequest').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "columnDefs": [
                        { "orderable": false, "targets": 4 },
                        { "orderable": false, "targets": 5 }
                    ],
                    "oLanguage": {
                        "sLengthMenu": "Display _MENU_ records per page",
                        "sZeroRecords": "Nothing found - sorry",
                        "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                        "sInfoEmpty": "Showing 0 to 0 of 0 records",
                        "sInfoFiltered": "(filtered from _MAX_ total records)"
                    },
                    "dom": '<"top">rt<"bottom"lip><"clear">',
                    responsive: true,
                    "order": []
                });
            }
        });
    }

    function fill_selected_request()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=fill_selected_pending_request",
            data: {
                    "selectedrequestid" : selectedrequestid,
                  },
            success: function (response) {
                $(".fill-selected-request").html(response);
            }
        });
    }

    function acceptrequest()
    { 
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=acceptrequest",
            data: {
                    "selectedrequestid" : selectedrequestid,
                  },
            success: function (response) {
                if(response == 'not-avail')
                {
                    swal({
                        position: 'center',
                        icon: 'error',
                        text: 'You have accepted another request in this time..',
                        buttons: false,
                        timer: 2500,
                    })
                    .then((result) => {
                        fill_sp_newservicerequest_table();
                    }); 
                }
                else
                {
                    swal({
                        position: 'center',
                        icon: 'success',
                        text: 'Service request '+selectedrequestid+' assigned to you..',
                        buttons: false,
                        timer: 2500,
                    })
                    .then((result) => {
                        fill_sp_newservicerequest_table();
                        fill_sp_upcomingservice_table();
                    }); 
                }
            }
        });
    }

    function fill_sp_upcomingservice_table() 
    {  
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=fill_sp_upcomingservice_table",
            data: "data",
            success: function (response) {
                $(".sp-upcomingservice-table").html(response);
                $('#tableupcomingservice').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "columnDefs": [
                        { "orderable": false, "targets": 4 },
                        { "orderable": false, "targets": 5 }
                    ],
                    "oLanguage": {
                        "sLengthMenu": "Display _MENU_ records per page",
                        "sZeroRecords": "Nothing found - sorry",
                        "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                        "sInfoEmpty": "Showing 0 to 0 of 0 records",
                        "sInfoFiltered": "(filtered from _MAX_ total records)"
                    },
                    "dom": '<"top">rt<"bottom"lip><"clear">',
                    responsive: true,
                    "order": []
                });
            }
        });
    }
    function cancelrequest()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=cancelrequest",
            data: {
                    "selectedrequestid" : selectedrequestid,
                  },
            success: function (response) {
                if(response == 'not-cancel')
                {
                    swal({
                        position: 'center',
                        icon: 'error',
                        text: 'Now it is less than 1 day to start this service.',
                        buttons: false,
                        timer: 2500,
                    })
                    .then((result) => {
                        fill_sp_upcomingservice_table();
                    }); 
                }
                else
                {
                    swal({
                        position: 'center',
                        icon: 'success',
                        text: 'Service request '+selectedrequestid+' cancelled successfully..',
                        buttons: false,
                        timer: 2500,
                    })
                    .then((result) => {
                        fill_sp_upcomingservice_table();
                    }); 
                }
            }
        });
    }
    function completerequest()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=completerequest",
            data: {
                    "selectedrequestid" : selectedrequestid,
                  },
            success: function (response) {
                swal({
                    position: 'center',
                    icon: 'success',
                    text: 'Service request '+selectedrequestid+' completed successfully..',
                    buttons: false,
                    timer: 2500,
                })
                .then((result) => {
                    fill_sp_upcomingservice_table();
                    fill_sp_servicehistory_table();
                }); 
            }
        });
    }
    function fill_sp_servicehistory_table()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=fill_sp_servicehistory_table",
            data: "data",
            success: function (response) {
                $(".sp-servicehistory-table").html(response);
                $('#tableservicehistory').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "oLanguage": {
                        "sLengthMenu": "Display _MENU_ records per page",
                        "sZeroRecords": "Nothing found - sorry",
                        "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                        "sInfoEmpty": "Showing 0 to 0 of 0 records",
                        "sInfoFiltered": "(filtered from _MAX_ total records)"
                    },
                    "dom": '<"top">rt<"bottom"lip><"clear">',
                    responsive: true,
                    "order": []
                });
            }
        });
    }
    function fill_customer_card()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=fill_customer_card",
            data: "data",
            success: function (response) {
                $(".fill-card").html(response);
            }
        });
    }
    function block_customer()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=block_customer",
            data: {
                "selectedcustomerid" : selectedcustomerid,
            },
            success: function (response) {
                fill_customer_card();
            }
        });
    }
    function unblock_customer()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=unblock_customer",
            data: {
                "selectedcustomerid" : selectedcustomerid,
            },
            success: function (response) {
                fill_customer_card();
            }
        });
    }
    function fill_sp_rating_table()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=fill_sp_rating_table",
            data: "data",
            success: function (response) {
                $(".sp-rating-table").html(response);
                $(".rateyo").rateYo({
                    starWidth: "16px",
                    ratedFill: "#FFD600",
                    readOnly: true,
                });
                $('#tablerating').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "oLanguage": {
                        "sLengthMenu": "Display _MENU_ records per page",
                        "sZeroRecords": "Nothing found - sorry",
                        "sInfo": "Showing _START_ to _END_ of _TOTAL_ records",
                        "sInfoEmpty": "Showing 0 to 0 of 0 records",
                        "sInfoFiltered": "(filtered from _MAX_ total records)"
                    },
                    "dom": '<"top">rt<"bottom"lip><"clear">',
                    responsive: true,
                    "order": []
                });
            }
        });
    }

    function fill_sp_details()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=ServiceProvider&function=fill_sp_details",
            data: "data",
            success: function (response) {
                $(".sp_details").html(response);

                let avatars = document.querySelectorAll(".avatar-image");

                for (let i = 1; i <= avatars.length; i++) {
                    $("#avatar"+i).click(function (e) { 
                        for (let j = 1; j <= avatars.length; j++){
                            if(i == j){
                                activateAvatar("avatar" + j);
                                selectedavatar = [];
                                selectedavatar.push(j);
                            }
                            else{
                                deactiveAvatar("avatar" + j);
                            }
                        }
                    });
                }
                function activateAvatar(avatarid) {
                    $("#"+avatarid).addClass("active");
                }

                function deactiveAvatar(avatarid) {
                    $("#"+avatarid).removeClass("active");
                }
            }
        });
    }

    function save_sp_details()
    { 
        var spfname = $("input[name='spfname']").val();
        var splname = $("input[name='splname']").val();
        var spmobile = $("input[name='spmobile']").val();
        var spemail = $("input[name='spemail']").val();
        var spdob = $("input[name='spdob']").val();
        var spnationality = $("[name='spnationality'] option:selected").val();
        var splanguage = $("[name='splanguage'] option:selected").val();
        var spgender = document.querySelector('input[name="spgender"]:checked').value;
        var spstreetname = $("input[name='spstreetname']").val();
        var sphousenumber = $("input[name='sphousenumber']").val();
        var sppostalcode = $("input[name='sppostalcode']").val();
        var spcity = $("input[name='spcity']").val();

        if(selectedaddressid == "")
        {
            if(spfname == "" || splname == "" || spmobile == "" || spdob == "" || spnationality == "" || splanguage == "" || spgender == "" || selectedavatar == "" || spstreetname == "" || sphousenumber == "" || sppostalcode == "" || spcity == "")
            {
                $(".error-line").css("display", "flex");
                $(".sp-error-message").html("Please fill all the details...");
            }
            else
            {
                $(".sp-error-message").html("");
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=ServiceProvider&function=save_sp_details",
                    data: {
                        "spfname" : spfname,
                        "splname" : splname,
                        "spmobile" : spmobile,
                        "spemail" : spemail,
                        "spdob" : spdob,
                        "spnationality" : spnationality,
                        "splanguage" : splanguage,
                        "spgender" : spgender,
                        "selectedavatar" : selectedavatar,
                        "spstreetname" : spstreetname,
                        "sphousenumber" : sphousenumber,
                        "sppostalcode" : sppostalcode,
                        "spcity" : spcity,
                    },
                    success: function (response) {
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'Your details updated and address insereted successfully..',
                            buttons: false,
                            timer: 2500,
                        })
                        .then((result) => {
                            fill_sp_upcomingservice_table();
                        }); 
                    }
                });
            }
        }
        else
        {
            if(spfname == "" || splname == "" || spmobile == "" || spdob == "" || spnationality == "" || splanguage == "" || spgender == "" || selectedavatar == "" || spstreetname == "" || sphousenumber == "" || sppostalcode == "" || spcity == "")
            {
                $(".error-line").css("display", "flex");
                $(".sp-error-message").html("Please fill all the details...");
            }
            else
            {
                $(".sp-error-message").html("");
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=ServiceProvider&function=save_sp_details",
                    data: {
                        "selectedaddressid" : selectedaddressid,
                        "spfname" : spfname,
                        "splname" : splname,
                        "spmobile" : spmobile,
                        "spemail" : spemail,
                        "spdob" : spdob,
                        "spnationality" : spnationality,
                        "splanguage" : splanguage,
                        "spgender" : spgender,
                        "selectedavatar" : selectedavatar,
                        "spstreetname" : spstreetname,
                        "sphousenumber" : sphousenumber,
                        "sppostalcode" : sppostalcode,
                        "spcity" : spcity,
                    },
                    success: function (response) {
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'your details updated successfully.',
                            buttons: false,
                            timer: 2500,
                        })
                        .then((result) => {
                            fill_sp_upcomingservice_table();
                        }); 
                    }
                });
            }
        }
    }

    $(".sp-password-save").click(function () { 
        var spoldpassword = $("input[name='sp-oldpassword']").val();
        var spnewpassword = $("input[name='sp-newpassword']").val();
        var spconfirmpassword = $("input[name='sp-confirmpassword']").val();

        if(spoldpassword == "" || spnewpassword == "" || spconfirmpassword == "")
        {
            $(".sp-password_error").css("display", "block");
            document.querySelector(".sp-password_error").innerHTML = "fill all details.";
        }
        else
        {
            document.querySelector(".sp-password_error").innerHTML = "";
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=ServiceProvider&function=sp_update_password",
                data: {
                        "spoldpassword" : spoldpassword,
                        "spnewpassword" : spnewpassword,
                        "spconfirmpassword" : spconfirmpassword,
                      },
                success: function (response) {
                    if (response == "0") {
                        swal({
                            position: 'center',
                            icon: 'warning',
                            text: 'Password and Confirm Password must be same.',
                            buttons: false,
                            timer: 2000,
                        });
                    }
                    else if (response == "1") {
                        swal({
                            position: 'center',
                            icon: 'warning',
                            text: 'You entered wrong Old Password',
                            buttons: false,
                            timer: 2000,
                        });
                    }
                    else {
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'Your password is updated successfully.',
                            buttons: false,
                            timer: 2000,
                        });
                        $("input[name='sp-oldpassword']").val("");
                        $("input[name='sp-newpassword']").val("");
                        $("input[name='sp-confirmpassword']").val("");
                    }
                }
            });
        }
    });
});