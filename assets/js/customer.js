$(document).ready(function () {

    var selectedrequestid;
    var selectedaddid = "";
    var selectedserviceproviderid = "";

    $(document).on ('click', '.tr', function (e) {
        selectedrequestid = this.id;
        fill_selected_pending_request(); 
        $("#request_detail_modal").modal("toggle"); 
    });

    $(document).on ('click', '.button-reschedule', function (e) {
        e.stopPropagation();
        $("#request_detail_modal").modal("hide"); 
        $(".error-reschdule").html("");
        selectedrequestid = e.target.id;
        $("#reschedule_modal").modal("toggle");
    });

    $(document).on ('click', '.button-cancel', function (e) {
        e.stopPropagation();
        $("#request_detail_modal").modal("hide"); 
        $(".error-cancelrequest").html("");
        $(".why-cancel").val("");
        selectedrequestid = e.target.id;
        $("#cancel_bookingrequest_modal").modal("toggle");
    });

    $(document).on ('click', '.service-provider-block-button', function (e) {
        selectedserviceproviderid = this.id;
        block_serviceprovider();
        remove_favourite_serviceprovider();
    });

    $(document).on ('click', '.service-provider-unblock-button', function (e) {
        selectedserviceproviderid = this.id;
        unblock_serviceprovider();
    });

    $(document).on ('click', '.service-provider-add-button', function (e) {
        selectedserviceproviderid = this.id;
        add_favourite_serviceprovider();
        unblock_serviceprovider();
    });

    $(document).on ('click', '.service-provider-remove-button', function (e) {
        selectedserviceproviderid = this.id;
        remove_favourite_serviceprovider();
    });
    
    fill_dashboard();
    fill_history();

    function fill_dashboard() 
    {  
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_dashboard",            
            data: "data",
            success: function (response) {
                $(".fill_dashboard").html(response);
                $(".rateyo").rateYo({
                    starWidth: "16px",
                    ratedFill: "#FFD600",
                    readOnly: true,
                });
                $('#dashtable').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "columnDefs": [
                        { "orderable": false, "targets": 4 }
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

    function fill_selected_pending_request()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_selected_pending_request",
            data: {
                    "selectedrequestid" : selectedrequestid,
                  },
            success: function (response) {
                $(".fill-selected-request").html(response);
            }
        });
    }

    function fill_data_reschedule_modal()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_data_reschedule_modal",
            data: "data",
            success: function (response) {
                $(".fill-reschedule").html(response);
            }
        });
    }

    function fill_history() 
    {  
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_service_history",            
            data: "data",
            success: function (response) {
                $(".fill_history").html(response);
                $(".rateyo").rateYo({
                    starWidth: "16px",
                    ratedFill: "#FFD600",
                    readOnly: true
                });
                $(".btn-ratesp").click(function (e) { 
                    selectedrequestid = e.target.id;
                    fill_sp_ratings();
                    $("#ratesp_modal").modal("toggle");
                });
                $('#tableservice').DataTable({
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
                    "order": [],
                });
            }
        });
    }

    function fill_sp_ratings()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_sp_ratings",
            data: {
                    "selectedrequestid" : selectedrequestid,
                  },
            success: function (response) {
                var ontimearrival = 0;
                var friendly = 0;
                var quality = 0;
                $(".fill-sp-rating").html(response);
                $(".customstar").rateYo({
                    starWidth: "20px",
                    ratedFill: "#FFD600",
                    readOnly: true,
                });
                $(".ontime-arrival").rateYo({ starWidth: "18px", ratedFill: "#FFD600" }).on("rateyo.change", function (e, data) { 
                    ontimearrival = data.rating;
                });
                $(".friendly").rateYo({ starWidth: "18px", ratedFill: "#FFD600" }).on("rateyo.change", function (e, data) {
                    friendly = data.rating;
                });
                $(".quality").rateYo({ starWidth: "18px", ratedFill: "#FFD600" }).on("rateyo.change", function (e, data) {
                    quality = data.rating;
                });
                $(".btn-ratesp-submit").click(function (e) { 
                    selectedrequestid = e.target.id;
                    var feedback = $(".rate-feedback").val();

                    $.ajax({
                        type: "POST",
                        url: "http://localhost/Helperland/?controller=Helperland&function=submit_rating",
                        data: {
                            "selectedrequestid": selectedrequestid,
                            "ontimearrival": ontimearrival,
                            "friendly": friendly,
                            "quality": quality,
                            "feedback": feedback
                        },
                        success: function (response) {
                            $("#ratesp_modal").modal("hide");
                            fill_history();
                        }
                    });
                });
            }
        });
    }

    $(".btn-update").click(function (e) { 

        var servicedate = $(".servicedate").val();
        var servicetime = $(".servicetime").val();

        if(servicedate == "" || servicetime == "")
        {
            $(".error-reschdule").html("fill all details.");
        }
        else
        {
            $(".error-reschdule").html("");
            $.ajax({
                type: "POST",
                url:  "http://localhost/Helperland/?controller=Helperland&function=reschedule_servicerequest",
                data: {
                    "selectedrequestid" : selectedrequestid,
                    "servicedate" :servicedate,
                    "servicetime" :servicetime,
                },
                
                success: function (response) {
                    $("#reschedule_modal").modal("hide");
                    swal({
                        position: 'center',
                        icon: 'success',
                        text: 'request rescheduled successfully.',
                        buttons: false,
                        timer: 2000,
                    })
                    fill_dashboard();
                }
            }); 
        }
    });

    $(".btn-cancelnow").click(function () { 

        var cancelreason = $(".why-cancel").val();

        if (cancelreason == "") {
            $(".error-cancelrequest").html("kindly tell us reason for cancellation.");
        }
        else {
            swal({
                title: "Are you sure?",
                text: "Once cancelled, You won't be able to revert this!!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $("#loader").removeClass("d-none");
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/Helperland/?controller=Helperland&function=cancel_servicerequest",
                        data: {
                            "selectedrequestid": selectedrequestid,
                            "cancelreason": cancelreason,
                        },
                        success: function (response) {
                            $("#loader").addClass("d-none");
                            $("#cancel_bookingrequest_modal").modal("hide");
                            swal({
                                position: 'center',
                                icon: 'success',
                                text: 'service request cancelled successfully.',
                                buttons: false,
                                timer: 2000,
                            });
                            fill_dashboard();
                            fill_history();
                        }
                    });
                } else {
                    $("#cancel_bookingrequest_modal").modal("hide");
                    swal({
                        position: 'center',
                        icon: 'error',
                        text: 'service request cancelation has been cancelled.',
                        buttons: false,
                        timer: 2000,
                    })
                }
            });
        }
    });

    $(".servicehistory").click(function (e) { 
        fill_history();
        $(".dashboard").removeClass("active");
        $(".servicehistory").addClass("active");
        $(".mysetting").hide();
        $(".tabledashboard").hide();
        $(".history").show();
        $(".favouritepros").removeClass("active");
        $(".customer-favourite-pros").hide();
    });

    $(".dashboard").click(function (e) { 
        fill_dashboard();
        $(".dashboard").addClass("active");
        $(".servicehistory").removeClass("active");
        $(".mysetting").hide();
        $(".tabledashboard").show();
        $(".history").hide();
        $(".favouritepros").removeClass("active");
        $(".customer-favourite-pros").hide();
    });

    $(".dashboard-dropdown").click(function (e) { 
        $(".dashboard").addClass("active");
        $(".servicehistory").removeClass("active");
        $(".mysetting").hide();
        $(".tabledashboard").show();
        $(".history").hide();
        $(".favouritepros").removeClass("active");
        $(".customer-favourite-pros").hide();
    });

    $(".setting-dropdown").click(function () { 
        $(".dashboard").removeClass("active");
        $(".servicehistory").removeClass("active");
        $(".mysetting").show();
        $(".tabledashboard").hide();
        $(".history").hide();
        $(".details").addClass("active");
        $(".details-body").show();
        $(".addresses").removeClass("active");
        $(".address-body").hide();
        $(".password").removeClass("active");
        $(".password-body").hide();
        $(".favouritepros").removeClass("active");
        $(".customer-favourite-pros").hide();

        fill_details_user();
    });

    $(".favouritepros").click(function (e) { 
        $(".dashboard").removeClass("active");
        $(".tabledashboard").hide();
        $(".servicehistory").removeClass("active");
        $(".history").hide();
        $(".mysetting").hide();
        $(".details").removeClass("active");
        $(".details-body").hide();
        $(".addresses").removeClass("active");
        $(".address-body").hide();
        $(".password").removeClass("active");
        $(".password-body").hide();
        $(".favouritepros").addClass("active");
        $(".customer-favourite-pros").show();

        fill_serviceprovider_card();
    });

    function fill_serviceprovider_card()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_serviceprovider_card",
            success: function (response) {
                $(".fill-sp-card").html(response);
                $(".favorite").rateYo({
                    starWidth: "16px",
                    ratedFill: "#FFD600",
                    readOnly: true
                });
            }
        });
    }

    function add_favourite_serviceprovider()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=add_favourite_serviceprovider",
            data: {
                "selectedserviceproviderid" : selectedserviceproviderid,
            },
            success: function (response) {
                fill_serviceprovider_card();
            }
        });
    }

    function remove_favourite_serviceprovider()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=remove_favourite_serviceprovider",
            data: {
                "selectedserviceproviderid" : selectedserviceproviderid,
            },
            success: function (response) {
                fill_serviceprovider_card();
            }
        });
    }

    function block_serviceprovider()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=block_serviceprovider",
            data: {
                "selectedserviceproviderid" : selectedserviceproviderid,
            },
            success: function (response) {
                fill_serviceprovider_card();
            }
        });
    }

    function unblock_serviceprovider()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=unblock_serviceprovider",
            data: {
                "selectedserviceproviderid" : selectedserviceproviderid,
            },
            success: function (response) {
                fill_serviceprovider_card();
            }
        });
    }

    function fill_details_user()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_details_user",
            data: "data",
            success: function (response) {
                $(".user_details").html(response);
                update_user_details();
            }
        });
    }

    $(".details").click(function () { 
        $(".details").addClass("active");
        $(".addresses").removeClass("active");
        $(".password").removeClass("active");
        $(".details-body").show();
        $(".address-body").hide();
        $(".password-body").hide();
    });

    function update_user_details()
    {
        $(".details-save").click(function () { 
    
            var fname = $("input[name='fname']").val();
            var lname = $("input[name='lname']").val();
            var mobile = $("input[name='mobile']").val();
            var dob = $("input[name='dob']").val();
    
            if(fname == "" || lname == "" || mobile == "" || dob == "")
            {
                $(".user_details .error-message").text("please fill all the details.");
            }
            else
            {
                $(".user_details .error-message").text("");
    
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Helperland&function=update_user_details",
                    data: {
                            "fname" : fname,
                            "lname" : lname,
                            "mobile" : mobile,
                            "dob" : dob,
                           },
                    success: function (response) {
                        swal({
                            icon: "success",
                            text: "Your profile is updated successfully.!",
                        }).then(function() {
                            window.location = "ServiceHistory";
                        });
                    }
                });
            }
        });
    }

    $(".addresses").click(function () { 
        $(".details").removeClass("active");
        $(".addresses").addClass("active");
        $(".password").removeClass("active");
        $(".details-body").hide();
        $(".address-body").show();
        $(".password-body").hide();

        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_addresses_user",
            data: "data",
            success: function (response) {
                $(".user_addresses").html(response);
                $(".address-edit").click(function (e) {
                    selectedaddid = e.target.id;
                    $("#addedit_address_modal").modal("toggle");
                    $(".add_edit_address").text("Edit Address");
                    selected_useraddress_edit();
                    $(".error-message").text("");
                });
                $(".address-delete").click(function (e) { 
                    selectedaddid = e.target.id;
                    selected_useraddress_delete();
                });
            }
        });
    });
    
    $(".addnewaddress").click(function () {
        selectedaddid = "";
        $("#addedit_address_modal").modal("toggle");
        $(".add_edit_address").text("Add Address");
        $(".error-message").text("");
        selected_useraddress_edit();
    });

    function selected_useraddress_edit()
    {
        if (selectedaddid != "") {
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=fill_selected_useraddress",
                data: {
                    "selectedaddid": selectedaddid,
                },
                success: function (response) {
                    $(".addedit_selected_useraddress").html(response);
                    $(".btn-addresssave").click(function () { 
                        selectedaddid = this.id;
                        insert_update_useraddress();
                    });
                }
            });
        }
        else {
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=fill_selected_useraddress",
                success: function (response) {
                    $(".addedit_selected_useraddress").html(response);
                    $(".btn-addresssave").click(function () { 
                        insert_update_useraddress();
                    });
                }
            });
        }
    }

    function insert_update_useraddress() {
        if (selectedaddid != "") {

            var streetname = $("input[name='streetname']").val();
            var housenumber = $("input[name='housenumber']").val();
            var postal_code = $("input[name='postal_code']").val();
            var city = $("input[name='city']").val();
            var phonenumber = $("input[name='phonenumber']").val();

            if (streetname == "" || housenumber == "" || postal_code == "" || city == "" || phonenumber == "") {
                document.querySelector(".error-message").innerHTML = "please fill all the details.";
            }

            else {
                document.querySelector(".error-message").innerHTML = "";

                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Helperland&function=insert_update_useraddress",
                    data: {
                        "selectedaddid": selectedaddid,
                        "housenumber": housenumber,
                        "streetname": streetname,
                        "city": city,
                        "postalcode": postal_code,
                        "phonenumber": phonenumber
                    },
                    success: function (response) {
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'address updated successfully.',
                            buttons: false,
                            timer: 2000,
                        });
                        $(".addresses").click();
                        $("#addedit_address_modal").modal("hide");
                    }
                });
            }
        }
        else {

            var streetname = $("input[name='streetname']").val();
            var housenumber = $("input[name='housenumber']").val();
            var postal_code = $("input[name='postal_code']").val();
            var city = $("input[name='city']").val();
            var phonenumber = $("input[name='phonenumber']").val();

            if (streetname == "" || housenumber == "" || postal_code == "" || city == "" || phonenumber == "") {
                document.querySelector(".error-message").innerHTML = "please fill all the details.";
            }

            else {
                document.querySelector(".error-message").innerHTML = "";
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Helperland&function=insert_update_useraddress",
                    data: {
                        "housenumber": housenumber,
                        "streetname": streetname,
                        "city": city,
                        "postalcode": postal_code,
                        "phonenumber": phonenumber
                    },
                    success: function (response) {
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'address inserted successfully.',
                            buttons: false,
                            timer: 2000,
                        });
                        $(".addresses").click();
                        $("#addedit_address_modal").modal("hide");
                    }
                });
            }
        }
    }

    function selected_useraddress_delete()
    {
        swal({
            title: "Are you sure?",
            text: "Once deleted, You won't be able to revert this!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Helperland&function=delete_selected_useraddress",
                    data: {
                        "selectedaddid": selectedaddid,
                    },
                    success: function (response) {
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'address deleted successfully.',
                            buttons: false,
                            timer: 2000,
                          })
                        $(".addresses").click();
                    }
                });
            } else {
                swal({
                    position: 'center',
                    icon: 'error',
                    text: 'address deletion has been cancelled.',
                    buttons: false,
                    timer: 2000,
                  })
                $(".addresses").click();
            }
        });  
    }

    $(".password").click(function () { 
        $(".details").removeClass("active");
        $(".addresses").removeClass("active");
        $(".password").addClass("active");
        $(".details-body").hide();
        $(".address-body").hide();
        $(".password-body").show();
        document.querySelector(".password_error").innerHTML = "";
    });

    $(".password-save").click(function () { 
        var oldpassword = $("input[name='oldpassword']").val();
        var newpassword = $("input[name='newpassword']").val();
        var confirmpassword = $("input[name='confirmpassword']").val();

        if(oldpassword == "" || newpassword == "" || confirmpassword == "")
        {
            document.querySelector(".password_error").innerHTML = "fill all details.";
        }
        else
        {
            document.querySelector(".password_error").innerHTML = "";
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=update_password",
                data: {
                        "oldpassword" : oldpassword,
                        "newpassword" : newpassword,
                        "confirmpassword" : confirmpassword,
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
                        $("input[name='oldpassword']").val("");
                        $("input[name='newpassword']").val("");
                        $("input[name='confirmpassword']").val("");
                    }
                }
            });
        }
    });
})