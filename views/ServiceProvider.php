<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Provider>Become-a-pro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>
<body>
    
    <?php
        include("header_1.php");
    ?>

    <section class="service-provider" id="service-provider">
        <div class="max-width">
            <div class="service-content mx-auto">
                <div class="register-text me-0 ms-0">
                    <h4>Register Now!</h4>
                </div>
                <div class="register-inputs me-0 ms-0">
                    <form method="POST" autocomplete="off" action="http://localhost/Helperland/?controller=Helperland&function=insert_serviceprovider">
                        <input type="text" id="fname" name="fname" placeholder="First name" required>
                        <input type="text" id="lname" name="lname" placeholder="Last name" required>
                        <input type="email" id="email" name="email" placeholder="Email Address" required>
                        <input type="text" id="number" name="mobile" placeholder="Phone Number" required>
                        <input type="password" id="password" name="password" placeholder="Password" required>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" required>
                        <div class="checkbox-content">
                            <div>
                                <input type="checkbox" id="sendnewsletter" name="sendnewsletter" class="checkbox">
                            </div>
                            <div>
                                <label for="sendnewsletter"> Send me newsletters from Helperland</label><br>
                            </div>
                        </div>
                        <div class="checkbox-content">
                            <div>
                                <input type="checkbox" id="terms-conditions" name="terms-conditions" class="checkbox" required>
                            </div>
                            <div>
                                <label for="terms-conditions"> I accept <span class="terms"> terms and conditions </span> & <span class="terms"> privacy policy </span> </label><br>
                            </div>
                        </div>
                        <button name="submit">Get Started <img src="http://localhost/Helperland/assets/images/arrow-white.png" alt="arrow"> </button>
                    </form>
                </div>
            </div>
            <div class="arrow">
                <img src="http://localhost/Helperland/assets/images/group-18_5.png">
            </div>
        </div>
    </section>

    <section class="howitworks" id="howitworks">
        <div class="max-width">
            <div class="howitworks-header">
                <h2>How it works</h2>
            </div>
            <div class="howitworks-content">
                <div class="img-text-set">
                    <div class="text-set">
                        <h3>Register yourself</h3>
                        <p class="register-text">
                            Provide your basic information to register 
                            yourself as a service provider.
                        </p>
                        <p class="register-text">
                            Read more <img src="http://localhost/Helperland/assets/images/shape-2-copy-3.png" alt="">
                        </p>
                    </div>
                    <div class="text-set">
                        <img class="img-fluid" src="http://localhost/Helperland/assets/images/how_it_works1.png" alt="img1">
                    </div>
                </div>
                <div class="img-text-set row-reverse">
                    <div class="text-set">
                        <h3>Get service requests</h3>
                        <p class="register-text">
                            You will get service requests from 
                            customes depend on service area and profile.
                        </p>
                        <p class="register-text">
                            Read more <img src="http://localhost/Helperland/assets/images/shape-2-copy-3.png" alt="">
                        </p>
                    </div>
                    <div class="text-set">
                        <img class="img-fluid" src="http://localhost/Helperland/assets/images/how_it_works2.png" alt="">
                    </div>
                </div>
                <div class="img-text-set">
                    <div class="text-set">
                        <h3>Complete service</h3>
                        <p class="register-text">
                            Accept service requests from your customers 
                            and complete your work.
                        </p>
                        <p class="register-text">
                            Read more <img src="http://localhost/Helperland/assets/images/shape-2-copy-3.png" alt="">
                        </p>
                    </div>
                    <div class="text-set">
                        <img class="img-fluid" src="http://localhost/Helperland/assets/images/how_it_works3.png" alt="">
                    </div>
                </div>
            </div>
            <div>
                <p class="newsletter"><b>GET OUR NEWSLETTER</b></p>
            </div>
            <div class="text-center">
                <input type="text" name="email" placeholder="YOUR EMAIL" class="your-email mb-3">
                <button type="submit" class="get-news-submit ms-2">Submit</button>
            </div>
        </div>
    </section>

<?php
    include("footer_2.php");
?>