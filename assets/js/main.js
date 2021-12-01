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
            $("home.navbar").addClass("navbar-bg-color");
            // $(".navbar").css("background" , "#272727B3");
            // $(".navbar").css("height" , "64px");
            // $(".navbar").css("margin-top" , "0px");
            // $(".navbar-brand img").css("width" , "72.69px");
            // $(".navbar-brand img").css("height" , "54px");
            // $(".navbar .navbar-nav .rounded-link").css("background" , "#005F7199");
        }
  
        else{
            $("home.navbar").removeClass("navbar-bg-color");
            // $(".navbar").css("background" , "transparent");
            // $(".navbar").css("height" , "130px");
            // $(".navbar").css("margin-top" , "10px");
            // $(".navbar-brand img").css("width" , "175px");
            // $(".navbar-brand img").css("height" , "130px");
            // $(".navbar .navbar-nav .rounded-link").css("background" , "transparent");
        }
    })
})