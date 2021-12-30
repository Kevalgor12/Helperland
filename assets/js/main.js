$(document).ready(function(){
    $(window).scroll(function(){
        
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    })

    $('.top-arrow').click(function(){
        $('html').animate({scrollTop: 0})
    });
})

$(document).ready(function(){
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 50) {
            $(".homepage").addClass("navbar-bg-color");
        }
  
        else{
            $(".homepage").removeClass("navbar-bg-color");
        }
    })
})