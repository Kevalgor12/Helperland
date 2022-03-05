$(document).ready(function(){
    $('#table').DataTable({
        paging: false,
        bFilter: false,
        ordering: true,
        searching: false,
        info: false,
        "columnDefs": [
            { "orderable": false, "targets": 4 }
        ],
        responsive: true,
        "order": []
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
            "sInfo": "Total Records: TOTAL"
        },
        "dom": '<"top">rt<"bottom"lip><"clear">',
        responsive: true,
        "order": []
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
            "sInfo": "Total Records: TOTAL"
        },
        "dom": '<"top">rt<"bottom"lip><"clear">',
        responsive: true,
        "order": []
    });

    $('#tableusermanagement').DataTable({
        paging: true,
        "pagingType": "full_numbers",
        // bFilter: false,
        ordering: true,
        searching: false,
        info: false,
        "columnDefs": [
            { "orderable": false, "targets": 1 },
            { "orderable": false, "targets": 2 },
            { "orderable": false, "targets": 4 },
            { "orderable": false, "targets": 7 }
        ],
        "oLanguage": {
            "sInfo": "Total Records: TOTAL"
        },
        "dom": '<"top">rt<"bottom"lip><"clear">',
        responsive: true,
        "order": []
    });

    $('#tableservicerequests').DataTable({
        paging: true,
        "pagingType": "full_numbers",
        // bFilter: false,
        ordering: true,
        searching: false,
        info: false,
        "columnDefs": [
            { "orderable": false, "targets": 5 }
        ],
        "oLanguage": {
            "sInfo": "Total Records: TOTAL"
        },
        "dom": '<"top">rt<"bottom"lip><"clear">',
        responsive: true,
        "order": []
    });
})