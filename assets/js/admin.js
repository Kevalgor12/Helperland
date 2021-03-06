$(document).ready(function () {

    var selectedrequestid = "";
    var selecteduserid = "";
    fill_service_requests_admin();
    fill_user_management_admin();
    fill_option("username",1,2);
    fill_option("customer",2);
    fill_option("serviceprovider",1);

    $(".admin-service-requests").click(function (e) { 
        $(".admin-service-requests").addClass("active");
        $(".admin-service-requests-body").show();
        $(".admin-user-management").removeClass("active");
        $(".admin-user-management-body").hide();

        fill_service_requests_admin();
    });
    $(".admin-user-management").click(function (e) { 
        $(".admin-service-requests").removeClass("active");
        $(".admin-service-requests-body").hide();
        $(".admin-user-management").addClass("active");
        $(".admin-user-management-body").show();

        fill_user_management_admin();
    });

    $(document).on ('click', '.reschedule_by_admin', function (e) {
        selectedrequestid = this.id;
        $("#reschedule_admin_modal").modal('toggle');
        fill_reschedule_servicerequest_detail();
    });

    $(document).on ('click', '.admin-sr-update', function (e) {
        selectedrequestid = this.id;
        reschedule_selected_service_request();
    });

    $(document).on ('click', '.cancel_by_admin', function (e) {
        selectedrequestid = this.id;
        cancel_selected_service_request();
    });

    $(document).on ('click', '.user-approve', function (e) {
        selecteduserid = this.id;
        approve_serviceprovider();
    });

    $(document).on ('click', '.user-active', function (e) {
        selecteduserid = this.id;
        activate_user();
    });

    $(document).on ('click', '.user-deactive', function (e) {
        selecteduserid = this.id;
        deactivate_user();
    });

    $("input[name='fromdate']").datepicker({ dateFormat: 'yy-mm-dd' }); 
    $("input[name='todate']").datepicker({ dateFormat: 'yy-mm-dd' }); 
    // , minDate: 0
    $("select[name='service-status']").select2();
    
    $(document).on ('click', '.request-clear', function (e) {
        $("input[name='serviceid']").val("");
        $("input[name='postalcode']").val("");
        $("select[name='customer']").val("disable").change();
        $("select[name='sprovider']").val("disable").change();
        $("select[name='service-status']").val("disable").change();
        $("input[name='fromdate']").val("");
        $("input[name='todate']").val("");

        fill_service_requests_admin();
    });

    $(document).on ('click', '.request-search', function (e) {
        var serviceid = $("input[name='serviceid']").val();
        var postalcode = $("input[name='postalcode']").val();
        var customer = $("select[name='customer']").val();
        var sprovider = $("select[name='sprovider']").val();
        var servicestatus = $("select[name='service-status']").val();
        var fromdate = $("input[name='fromdate']").val();
        var todate = $("input[name='todate']").val();

        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Admin&function=service_request_search",
            data: {
                'serviceid' : serviceid,
                'postalcode' : postalcode,
                'customer' : customer,
                'sprovider' : sprovider,
                'servicestatus' : servicestatus,
                'fromdate' : fromdate,
                'todate' : todate
            },
            success: function (response) {
                $(".fill-all-service").html(response);
                $('#tableservicerequests').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "columnDefs": [
                        { "orderable": false, "targets": 6 }
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
        })
    });

    $("input[name='usermanagementfromdate']").datepicker({ dateFormat: 'yy/mm/dd' });
    $("input[name='usermanagementtodate']").datepicker({ dateFormat: 'yy/mm/dd' });
    // , minDate: 0
    $("select[name='usermanagementusertype']").select2();
    $(document).on ('click', '.user-management-clear', function (e) {
        $("select[name='usermanagementusername']").val("disable").change();
        $("select[name='usermanagementusertype']").val("disable").change();
        $("input[name='usermanagementphonenumber']").val("");
        $("input[name='usermanagementpostalcode']").val("");
        $("input[name='usermanagementfromdate']").val("");
        $("input[name='usermanagementtodate']").val("");

        fill_user_management_admin();
    });

    $(document).on ('click', '.user-management-search', function (e) {
        var username = $("select[name='usermanagementusername']").val();
        var usertype = $("select[name='usermanagementusertype']").val();
        var phonenumber = $("input[name='usermanagementphonenumber']").val();
        var postalcode = $("input[name='usermanagementpostalcode']").val();
        var fromdate = $("input[name='usermanagementfromdate']").val();
        var todate = $("input[name='usermanagementtodate']").val();

        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Admin&function=user_management_search",
            data: {
                'username' : username,
                'usertype' : usertype,
                'phonenumber' : phonenumber,
                'postalcode' : postalcode,
                'fromdate' : fromdate,
                'todate' : todate
            },
            success: function (response) {
                $(".fill-user-management").html(response);
                $('#tableusermanagement').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "columnDefs": [
                        { "orderable": false, "targets": 1 },
                        { "orderable": false, "targets": 4 },
                        { "orderable": false, "targets": 7 }
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
    });

    function fill_service_requests_admin() 
    { 
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Admin&function=fill_service_requests_admin",
            success: function (response) {
                $(".fill-all-service").html(response);
                $('#tableservicerequests').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "columnDefs": [
                        { "orderable": false, "targets": 6 }
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

    function fill_user_management_admin() 
    { 
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Admin&function=fill_user_management_admin",
            success: function (response) {
                $(".fill-user-management").html(response);
                $('#tableusermanagement').DataTable({
                    paging: true,
                    "pagingType": "full_numbers",
                    // bFilter: false,
                    ordering: true,
                    searching: false,
                    info: true,
                    "columnDefs": [
                        { "orderable": false, "targets": 1 },
                        { "orderable": false, "targets": 4 },
                        { "orderable": false, "targets": 7 }
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

    function fill_reschedule_servicerequest_detail()
    {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Admin&function=fill_reschedule_servicerequest_detail",
            data: {
                    'selectedrequestid' : selectedrequestid
            },
            success: function (response) {
                $(".fill_selected_service_request_data").html(response);
            }
        });
    }

    function reschedule_selected_service_request()
    {
        var srdate = $("input[name='srdate']").val();
        var srtime = $("select[name='srtime']").val();
        var streetname = $("input[name='streetname']").val();
        var housenumber = $("input[name='housenumber']").val();
        var postalcode = $("input[name='postalcode']").val();
        var city = $("input[name='city']").val();
        var comment = $("textarea[name='reschedulereason']").val();

        if(srdate == "" || srtime == "" || streetname == "" || housenumber == "" || postalcode == "" || city == "" || comment == "")
        {
            $(".admin-error").css('display', 'block');
            $(".admin-error").html("fill all the details.");
        }
        else
        {
            $(".admin-error").html("");
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Admin&function=reschedule_selected_service_request",
                data: {
                    'srdate' : srdate,
                    'srtime' : srtime,
                    'streetname' : streetname,
                    'housenumber' : housenumber,
                    'postalcode' : postalcode,
                    'city' : city,
                    'comment' : comment,
                    'selectedrequestid' : selectedrequestid
                },
                success: function (response) {
                    if(response == 'not-reschedule')
                    {
                        $("#reschedule_admin_modal").modal("hide");
                        swal({
                            position: 'center',
                            icon: 'error',
                            text: 'You can not reschedule service because only 1 day remains to start service.',
                            buttons: false,
                            timer: 2000,
                        })
                    }
                    else
                    {
                        $("#reschedule_admin_modal").modal("hide");
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'request rescheduled successfully.',
                            buttons: false,
                            timer: 2000,
                        })
                        fill_service_requests_admin();
                    }
                }
            });
        }
    }

    function cancel_selected_service_request()
    {
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
                    url: "http://localhost/Helperland/?controller=Admin&function=cancel_servicerequest",
                    data: {
                        "selectedrequestid": selectedrequestid,
                    },
                    success: function (response) {
                        if(response == 'not-cancel')
                        {
                            $("#loader").addClass("d-none");
                            swal({
                                position: 'center',
                                icon: 'error',
                                text: 'You can not cancel service because only 1 day remains to start service.',
                                buttons: false,
                                timer: 2000,
                            });
                        }
                        else
                        {
                            $("#loader").addClass("d-none");
                            swal({
                                position: 'center',
                                icon: 'success',
                                text: 'service request cancelled successfully.',
                                buttons: false,
                                timer: 2000,
                            });
                            fill_service_requests_admin();
                        }
                    }
                });
            } 
        });
    }

    function approve_serviceprovider() 
    {  
        swal({
            title: "Are you sure?",
            text: "Once approved, You won't be able to revert this!!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $("#loader").removeClass("d-none");
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Admin&function=approve_serviceprovider",
                    data: {
                        "selecteduserid": selecteduserid,
                    },
                    success: function (response) {
                        $("#loader").addClass("d-none");
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'Service Provider has been approved.',
                            buttons: false,
                            timer: 2000,
                        });
                        fill_user_management_admin();
                    }
                });
            }
        });
    }

    function activate_user()
    {
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Admin&function=activate_user",
                    data: {
                        "selecteduserid": selecteduserid,
                    },
                    success: function (response) {
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'User has been activated.',
                            buttons: false,
                            timer: 2000,
                        });
                        fill_user_management_admin();
                    }
                });
            }
        });
    }

    function deactivate_user()
    {
        swal({
            title: "Are you sure?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: "http://localhost/Helperland/?controller=Admin&function=deactivate_user",
                    data: {
                        "selecteduserid": selecteduserid,
                    },
                    success: function (response) {
                        swal({
                            position: 'center',
                            icon: 'success',
                            text: 'User has been deactivated.',
                            buttons: false,
                            timer: 2000,
                        });
                        fill_user_management_admin();
                    }
                });
            }
        });
    }

    function fill_option(classname, typeid1, typeid2 = null) {
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Admin&function=fill_option_for_Select",
            data: {
                'typeid1': typeid1,
                'typeid2': typeid2
            },
            success: function (response) {
                $("." + classname).append(response);
                $("." + classname).select2();
            }
        });
    }
});