<?php
  $base_url = "http://localhost/Helperland/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>
<body>
    
    <?php
        include("header_2.php");
    ?>

    <section class="titleimage">
        <img src="http://localhost/Helperland/assets/images/group-16_2.png" alt="contact-image">
    </section>

    <section class="contact-us" id="contact-us">
        <div class="max-width">
            <div>
                <div class="text-center position-relative mb-75">
                    <h1 class="star-title">Contact us</h1>
                </div>
            </div>
            <div class="contact-body">
                <div class="contact-service">
                    <div class="contact-image">
                        <img class="img-fluid" src="http://localhost/Helperland/assets/images/forma-1_2.png">
                    </div>
                    <br>
                    <div class="contact-text">
                        <span class="contact-text-1">1111 Lorem ipsum text 100,</span><br>
                        <span class="contact-text-1">Lorem ipsum AB</span>
                    </div>
                </div>
                <div class="contact-service">
                    <div class="contact-image">
                        <img class="img-fluid" src="http://localhost/Helperland/assets/images/phone-call.png">
                    </div>
                    <br>
                    <div class="contact-text">
                        <span class="contact-text-1">+49 (40) 123 56 7890</span><br>
                        <span class="contact-text-1">+49 (40) 987 56 0000</span>
                    </div>
                </div>
                <div class="contact-service">
                    <div class="contact-image">
                        <img class="img-fluid" src="http://localhost/Helperland/assets/images/vector-smart-object.png">
                    </div>
                    <br>
                    <div class="contact-text">
                        <span class="contact-text-1">info@helperland.com</span>
                    </div>
                </div>
            </div>
            <hr class="breaking-line mx-auto">
            <div class="contact-content">
                <div class="getin_touch">
                    <span><b>Get in touch with us</b></span>
                </div>
            </div>
            <div class="message mx-auto">
                <form method="POST" autocomplete="off" action="http://localhost/Helperland/?controller=Helperland&function=insert_contactus">
                    <div class="row me-0 ms-0">
                        <div class="col-md-6">
                            <input type="text" class="input form-control" id="fname" name="FirstName" placeholder="First name" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="input form-control" id="lname" name="LastName" placeholder="Last name" required>
                        </div>
                    </div>
                    <div class="row me-0 ms-0">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+49</span>
                                <input type="text" class="form-control" id="number" name="PhoneNumber" placeholder="Mobile number" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="input form-control" id="email" name="Email" placeholder="Email address" required>
                        </div>
                    </div>
                    <div class="row me-0 ms-0">
                        <div class="col-md-12">
                            <select name="Subject" id="subject" required>
                                <option value="" disabled selected hidden>Subject</option>
                                <option value="Gujarati">Gujarati</option>
                                <option value="Maths">Maths</option>
                                <option value="Science">Science</option>
                            </select>
                        </div>
                    </div>
                    <div class="row me-0 ms-0">
                        <div class="col-md-12">
                            <textarea class="form-control" id="sendmessage" name="Message" rows="4" placeholder="Message" required></textarea>
                        </div>
                    </div>
                    <div class="row me-0 ms-0">
                        <button class="submit mx-auto"><b>Submit</b></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="mapimage">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2525.2744996558567!2d7.1303344149425065!3d50.73339747481875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47bee13f0afebfb1%3A0x7caeb94f4c1042fc!2sK%C3%B6nigswinterer%20Str.%20116%2C%2053227%20Bonn%2C%20Germany!5e0!3m2!1sen!2sin!4v1643117062331!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div>
            <p class="newsletter">GET OUR NEWSLETTER</p>
        </div>
        <div class="text-center">
            <input type="text" name="email" placeholder="YOUR EMAIL" class="your-email mb-3">
            <button type="submit" class="get-news-submit">Submit</button>
        </div>
    </section>

<?php
    include("footer_2.php");
?>