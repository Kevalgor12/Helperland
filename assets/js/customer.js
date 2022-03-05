$(document).ready(function () {

    var selectedaddid;
    fill_dashboard();

    function fill_dashboard() 
    {  
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_dashboard",            
            data: "data",
            success: function (response) {
                $(".fill_dashboard").html(response);
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
                        "sInfo": "Total Records: TOTAL"
                    },
                    "dom": '<"top">rt<"bottom"lip><"clear">',
                    responsive: true,
                    "order": []
                });
            }
        });
    }

    $(".servicehistory").click(function (e) { 
        $(".dashboard").removeClass("active");
        $(".servicehistory").addClass("active");
        $(".mysetting").hide();
        $(".tabledashboard").hide();
        $(".history").show();
    });

    $(".dashboard").click(function (e) { 
        $(".dashboard").addClass("active");
        $(".servicehistory").removeClass("active");
        $(".mysetting").hide();
        $(".tabledashboard").show();
        $(".history").hide();
    });

    $(".dashboard-dropdown").click(function (e) { 
        $(".dashboard").addClass("active");
        $(".servicehistory").removeClass("active");
        $(".mysetting").hide();
        $(".tabledashboard").show();
        $(".history").hide();
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

        fill_details_user();
    });

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
                // $(".btn-addresssave").click();
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
                    swal({
                        icon: "success",
                        text: "Your password is updated successfully.",
                    }).then(function() {
                        swal({
                            text: "Oops!!! you are looged out.. please login again.",
                        }).then(function() {
                            window.location = "http://localhost/Helperland/?controller=Helperland&function=logout";
                        });
                    });
                }
            });
        }
    });
    
    $(".addnewaddress").click(function () {
        $("#addedit_address_modal").modal("toggle");
        $(".add_edit_address").text("Add Address");
        $(".error-message").text("");
    });

    $(".btn-addresssave").click(function () { 

        var streetname = $("input[name='streetname']").val();
        var housenumber = $("input[name='housenumber']").val();
        var postal_code = $("input[name='postal_code']").val();
        var city = $("input[name='city']").val();
        var phonenumber = $("input[name='phonenumber']").val();

        if(streetname == "" || housenumber == "" || postal_code == "" || city == "" || phonenumber == "")
        {
            document.querySelector(".error-message").innerHTML="please fill all the details.";
        }
        else
        {
            document.querySelector(".error-message").innerHTML="";
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=insert_address",
                data: {
                        "selectedaddid" : selectedaddid,
                        "housenumber" : housenumber,
                        "streetname" : streetname,
                        "city" : city,
                        "postalcode" : postal_code,
                        "phonenumber" : phonenumber
                       },
                success: function (response) {
                    $(".addresses").click();
                    $("#addedit_address_modal").modal("hide");
                }
            });
        }     
    });

    function selected_useraddress_edit()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=fill_selected_useraddress",
            data: {
                    "selectedaddid" : selectedaddid,
                   },
            success: function (response) {
                $(".addedit_selected_useraddress").html(response);
            }
        });
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
                    icon: 'success',
                    text: 'address deletion has been cancelled.',
                    buttons: false,
                    timer: 2000,
                  })
                $(".addresses").click();
            }
        });  
    }
})