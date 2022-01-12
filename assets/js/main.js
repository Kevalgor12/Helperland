$(document).ready(function(){
    $(window).scroll(function(){
        
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

    $('.top-arrow').click(function(){
        $('html').animate({scrollTop: 0})
    });

    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 50) {
            $(".homepage").addClass("navbar-bg-color");
        }
  
        else{
            $(".homepage").removeClass("navbar-bg-color");
        }
    });

    $(".sub-menu ul").hide();
    $(".sub-menu a").click(function () {
        $(this).parent(".sab-menu").children("ul").slideToggle("100");
        $(this).find(".arrow-icon").parent("a").parent("li").toggleClass("open");
    });

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

    $('#tableservice').DataTable({
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