$(document).ready(function(){
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
            document.querySelector(".error-msg").innerHTML="";
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
                }
            });

            showAddAddress();
            hideAddAddress();

            document.getElementsByName('streetname').values = "";
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

    $(".continue").click(function(){ 
        switchtab("SchedulePlan","YourDetails");
    });

    document.querySelector(".basic").innerHTML=$("#servicetime option:selected").val() +" "+ "Hrs";

    $("#servicetime").click(function () { 
        document.querySelector(".basic").innerHTML=$("#servicetime option:selected").val() +" "+ "Hrs";
    });

    $("#servicetime").on("change", function () {
        totaltime();
        totalpayment();
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

    

    //total service time
    document.querySelector(".totaltime").innerHTML=$("#servicetime  option:selected").val()+" " +"Hrs";
           // document.querySelector(".totalpayment").innerHTML= "$0";
           // totaltime();
    function totaltime()
    {
        var total =parseFloat($("#servicetime  option:selected").val());

        if(document.querySelector(".extra-image-1").classList.contains("active"))
        {
            var ex1 = 0.5;
        }
        else
        {
            var ex1 = 0;
        }
        if(document.querySelector(".extra-image-2").classList.contains("active"))
        {
            var ex2 = 0.5;
        }
        else
        {
            var ex2 = 0;
        }
        if(document.querySelector(".extra-image-3").classList.contains("active"))
        {
            var ex3 = 0.5;
        }
        else
        {
            var ex3 = 0;
        }
        if(document.querySelector(".extra-image-4").classList.contains("active"))
        {
            var ex4 = 0.5;
        }
        else
        {
            var ex4 = 0;
        }
        if(document.querySelector(".extra-image-5").classList.contains("active"))
        {
            var ex5 = 0.5;
        }
        else
        {
            var ex5 = 0;
        }
        total = total + ex1 + ex2 + ex3 + ex4 + ex5;
        document.querySelector(".totaltime").innerHTML=total +" "+ "Hrs";
        tatpay = total*25;
        document.querySelector(".totalpayment b").innerHTML= "$"+tatpay ;
        charge =total*25;
        document.querySelector(".charge").innerHTML= "$"+charge ;
    
    }

function showAddAddress()
{
    let address = document.getElementsByClassName("add-address")[0];
    let button = document.getElementsByClassName("add-new-address")[0];

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