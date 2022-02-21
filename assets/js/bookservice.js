$(document).ready(function(){

    totaltime();

    $(".check-avail").click(function(){ 

        var postalcode = $(".postalcode").val();

        if(postalcode == "")
        {
            document.querySelector(".error-msg").innerHTML="Please enter the postalcode";
        }
        else
        {
            document.querySelector(".error-msg").innerHTML="";
            $.ajax({
                type: "POST",
                url: "http://localhost/Helperland/?controller=Helperland&function=check_sp_availability",
                data: { "zipcode" : postalcode},
                success: function (response) 
                {
                    if(response == 0)
                    {
                        document.querySelector(".error-msg").innerHTML="Service is not available in your area.";
                    }
                    else
                    {
                        document.querySelector(".error-msg").innerHTML="";
                        switchtab("SetupService","SchedulePlan");
                    }
                }
            })
            radio_button_addresslist();
        }
    });

    $(".address-save").click(function(){ 

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
                        "housenumber" : housenumber,
                        "streetname" : streetname,
                        "city" : city,
                        "postalcode" : postal_code,
                        "phonenumber" : phonenumber
                       },
                success: function (response) {
                    radio_button_addresslist(); 
                    document.querySelector("#phonenumber").innerHTML = "";
                }
            });
            $("input[name='streetname']").val('');
            $("input[name='housenumber']").val('');
            $("input[name='postal_code']").val('');
            $("input[name='city']").val('');
            $("input[name='phonenumber']").val('');
            showAddAddress();
            hideAddAddress();
        }
    })

    function radio_button_addresslist()
    {
        var postalcode = $(".postalcode").val();
        $.ajax({
            type: "POST",
            url:  "http://localhost/Helperland/?controller=Helperland&function=fill_radio_button_address",
            data: { "zipcode" : postalcode},
            success: function (response) {
                document.querySelector(".address-radio-button").innerHTML=response;
            }
        });
    }

    $(".continue1").click(function(){ 
        switchtab("SchedulePlan","YourDetails");
    });

    $(".continue2").click(function(){ 
        switchtab("YourDetails","MakePayment");
    });

    $(".complete-booking").click(function(){ 

        var postalcode = $(".postalcode").val();
        var servicehours = parseFloat($(".basic").text());
        var extrahours = parseFloat($(".totaltime").text()) - servicehours;
        var servicehourlyrate = "25";
        var totalpayment = parseFloat($(".total-payment").text());
        var comment = $(".service-comment").text();

        document.querySelector(".error-message").innerHTML="";
        $.ajax({
            type: "POST",
            url: "http://localhost/Helperland/?controller=Helperland&function=add_service_request",
            data: {
                    "postalcode" : postalcode,
                    "servicehours" : servicehours,
                    "extrahours" : extrahours,
                    "servicehourlyrate" : servicehourlyrate,
                    "totalpayment" : totalpayment,
                    "comment" : comment,
                   },
            success: function (response) {
                alert("Request submitted succefully.")
            }
        });
    })

    document.querySelector(".basic").innerHTML=$("#servicetime option:selected").val() +" "+ "Hrs";

    $("#servicetime").click(function () { 
        document.querySelector(".basic").innerHTML=$("#servicetime option:selected").val() +" "+ "Hrs";
    });

    $("#servicetime").on("change", function () {
        totaltime();
    });

    $("#formdate").click(function () { 
        document.querySelector(".datetime").innerHTML=$("#formdate").val() + " " + $("#booktime option:selected").val();
    });

    $("#booktime").click(function () { 
        document.querySelector(".datetime").innerHTML=$("#formdate").val() + " " + $("#booktime option:selected").val();
    });
})

function switchtab(from, to)
{
    $("#pills-"+from+"-tab").removeClass("active");
    $("#pills-"+from).removeClass("show active");
    $("#pills-"+to+"-tab").addClass("active");
    filltabcolor();
    $("#pills-"+to).addClass("show active");
}

function filltabcolor()
{
    let tags = document.querySelectorAll("button.nav-link");
    let flag = false;
    
    for(let i = 0; i < tags.length; i++)
    {
        if(tags[i].classList.contains('active'))
        {
            tags[i].classList.add('fill');
            flag = true;
        }
        else if(flag == false)
        {
            tags[i].classList.add('fill');
            tags[i].classList.remove('disabled');
        }
        else if(flag == true)
        {
            tags[i].classList.add('disabled');
            tags[i].classList.remove('fill');
        }
    }
}

function img1()
{
    if(!(document.getElementById("img1").classList.contains("active")))
    {
        activateExtraImage("img1");
    }
    else
    {
        deactiveExtraImage("img1");
    }
    totaltime();
}

function img2()
{
    if(!(document.getElementById("img2").classList.contains("active")))
    {
        activateExtraImage("img2");
    }
    else
    {
        deactiveExtraImage("img2");
    }
    totaltime();
}

function img3()
{
    if(!(document.getElementById("img3").classList.contains("active")))
    {
        activateExtraImage("img3");
    }
    else
    {
        deactiveExtraImage("img3");
    }
    totaltime();
}

function img4()
{
    if(!(document.getElementById("img4").classList.contains("active")))
    {
        activateExtraImage("img4");
    }
    else
    {
        deactiveExtraImage("img4");
    }
    totaltime();
}

function img5()
{
    if(!(document.getElementById("img5").classList.contains("active")))
    {
        activateExtraImage("img5");
    }
    else
    {
        deactiveExtraImage("img5");
    }
    totaltime();
}

function activateExtraImage(imageid)
{
    document.getElementById(imageid).classList.add("active");
    document.getElementById(imageid).style.border = "3px solid #1D7A8C";
    document.querySelector("#"+imageid+" img").src=document.querySelector("#"+imageid+" img").src.replace(".png","-green.png");
    document.querySelector("."+imageid+"-text").style.display = "flex";
}

function deactiveExtraImage(imageid)
{
    document.getElementById(imageid).classList.remove("active");
    document.getElementById(imageid).style.border = "1px solid #C8C8C8";
    document.querySelector("#"+imageid+" img").src=document.querySelector("#"+imageid+" img").src.replace("-green.png",".png");
    document.querySelector("."+imageid+"-text").style.display = "none";
}

    
    document.querySelector(".totaltime").innerHTML=$("#servicetime  option:selected").val()+" "+"Hrs";

    function totaltime()
    {
        var totalhours = parseFloat($("#servicetime  option:selected").val());

        if(document.querySelector(".extra-content #img1").classList.contains("active"))
        {
            var ex1 = 0.5;
        }
        else
        {
            var ex1 = 0;
        }
        if(document.querySelector(".extra-content #img2").classList.contains("active"))
        {
            var ex2 = 0.5;
        }
        else
        {
            var ex2 = 0;
        }
        if(document.querySelector(".extra-content #img3").classList.contains("active"))
        {
            var ex3 = 0.5;
        }
        else
        {
            var ex3 = 0;
        }
        if(document.querySelector(".extra-content #img4").classList.contains("active"))
        {
            var ex4 = 0.5;
        }
        else
        {
            var ex4 = 0;
        }
        if(document.querySelector(".extra-content #img5").classList.contains("active"))
        {
            var ex5 = 0.5;
        }
        else
        {
            var ex5 = 0;
        }
        totalhours = totalhours + ex1 + ex2 + ex3 + ex4 + ex5;
        extraservicehours = ex1 + ex2 + ex3 + ex4 + ex5;
        document.querySelector(".totaltime").innerHTML=totalhours +" "+ "Hrs";
        totalcharge = totalhours * 25;
        document.querySelector(".total-charge").innerHTML= "$" + totalcharge;
        totalpay =totalhours * 25;
        document.querySelector(".total-payment").innerHTML= "$" + totalpay;
    }

function showAddAddress()
{
    let address = document.getElementsByClassName("add-address")[0];
    let button = document.getElementsByClassName("add-new-address")[0];

    document.querySelector(".error-message").innerHTML="";
    address.style.display = "block";
    button.style.display = "none";
}

function hideAddAddress()
{
    let address = document.getElementsByClassName("add-address")[0];
    let button = document.getElementsByClassName("add-new-address")[0];

    address.style.display = "none";
    button.style.display = "block";
}