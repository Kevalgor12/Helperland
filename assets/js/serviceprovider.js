$(document).ready(function () {

    var selectedrequestid;
    var selectedcustomerid;

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
});