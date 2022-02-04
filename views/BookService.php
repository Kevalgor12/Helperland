<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Service </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>
<body>
    
    <?php
        include("header_2.php");
    ?>

    <section class="titleimage">
        <img src="http://localhost/Helperland/assets/images/book-service-banner.jpg" alt="bookservice-banner">
    </section>

    <section class="book-service" id="book-service">
        <div class="max-width">
            <div class="bookservice-content container">
                <div class="bookservice-header text-center position-relative mb-75">
                    <h1 class="star-title">Set up your cleaning service</h1>
                </div>
                <div class="bookservice-area row">
                    <div class="bookservice-details col-md-8 col-sm-12">
                        <div class="faq-tab mb-60">
                            <ul class="nav nav-pills nav-fill mb-3 justify-content-center" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-SetupService-tab" data-bs-toggle="pill" 
                                    data-bs-target="#pills-SetupService" type="button" role="tab" aria-controls="pills-SetupService" 
                                    aria aria-selected="true">
                                        <img class="black" src="http://localhost/Helperland/assets/images/setup-service.png" alt="">
                                        <img class="white" src="http://localhost/Helperland/assets/images/setup-service-white.png" alt="">
                                        Setup Service
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-SchedulePlan-tab" data-bs-toggle="pill" 
                                    data-bs-target="#pills-SchedulePlan" type="button" role="tab" aria-controls="pills-SchedulePlan" 
                                    aria aria-selected="false">
                                        <img class="black" src="http://localhost/Helperland/assets/images/schedule.png" alt="">
                                        <img class="white" src="http://localhost/Helperland/assets/images/schedule-white.png" alt="">
                                        Schedule & Plan
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-YourDetails-tab" data-bs-toggle="pill" 
                                    data-bs-target="#pills-YourDetails" type="button" role="tab" aria-controls="pills-YourDetails" 
                                    aria aria-selected="false">
                                        <img class="black" src="http://localhost/Helperland/assets/images/details.png" alt="">
                                        <img class="white" src="http://localhost/Helperland/assets/images/details-white.png" alt="">
                                        Your Details
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-MakePayment-tab" data-bs-toggle="pill" 
                                    data-bs-target="#pills-MakePayment" type="button" role="tab" aria-controls="pills-MakePayment" 
                                    aria aria-selected="false">
                                        <img class="black" src="http://localhost/Helperland/assets/images/payment.png" alt="">
                                        <img class="white" src="http://localhost/Helperland/assets/images/payment-white.png" alt="">
                                        Make Payment
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-SetupService" role="tabpanel" aria-labelledby="pills-SetupService-tab">
                                    <span class="text-1"><b>Enter your Postal Code</b></span>
                                    <div class="postalcode-check">
                                        <input type="text" class="postalcode mt-3" name="postalcode" placeholder="Postal code">
                                        <button type="submit" class="check-avail mt-3">Check Availability</button>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-SchedulePlan" role="tabpanel" aria-labelledby="pills-SchedulePlan-tab">
                                    <span class="text-1"><b>Select number of rooms and bath</b></span>
                                    <div>
                                        <select name="bed" id="bed">
                                            <option disabled selected hidden value="">0 bed</option>
                                            <option value="1 bed">1 bed</option>
                                            <option value="2 bed">2 bed</option>
                                            <option value="3 bed">3 bed</option>
                                            <option value="4 bed">4 bed</option>
                                        </select>
                                        <select name="bath" id="bath">
                                            <option disabled selected hidden value="">0 bath</option>
                                            <option value="1 bath">1 bath</option>
                                            <option value="2 bath">2 bath</option>
                                            <option value="3 bath">3 bath</option>
                                            <option value="4 bath">4 bath</option>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <span class="text-1"><b>When do you need the cleaner?</b></span>
                                            <div>
                                                <input class="input-element" type="date" id="formdate" name="formdate" data placeholder="From Date">
                                                <select name="booktime" id="booktime">
                                                    <option disabled selected hidden value="">2:00 PM</option>
                                                    <option value="3:00 PM">3:00 PM</option>
                                                    <option value="4:00 PM">4:00 PM</option>
                                                    <option value="5:00 PM">5:00 PM</option>
                                                    <option value="6:00 PM">6:00 PM</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <span class="text-1"><b>How long do you need your cleaner to stay?</b></span>
                                            <div>
                                                <select name="servicetime" id="servicetime">
                                                    <option disabled selected hidden value="">3.0 Hrs</option>
                                                    <option value="3.0 Hrs">3.0 Hrs</option>
                                                    <option value="4.0 Hrs">4.0 Hrs</option>
                                                    <option value="5.0 Hrs">5.0 Hrs</option>
                                                    <option value="6.0 Hrs">6.0 Hrs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <span class="text-1"><b>Extra Services</b></span>
                                        <div class="extra-service">
                                            <div class="extra-content">
                                                <div class="extra-image">
                                                    <img src="http://localhost/Helperland/assets/images/3.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Inside cabinets</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                            <div class="extra-content">
                                                <div class="extra-image">
                                                  <img src="http://localhost/Helperland/assets/images/5.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Inside fridge</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                            <div class="extra-content">
                                                <div class="extra-image">
                                                    <img src="http://localhost/Helperland/assets/images/4.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Inside oven</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                            <div class="extra-content">
                                                <div class="extra-image">
                                                    <img src="http://localhost/Helperland/assets/images/2.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Laundry wash & dry</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                            <div class="extra-content">
                                                <div class="extra-image">
                                                    <img src="http://localhost/Helperland/assets/images/1.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Interior windows</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <span class="text-1"><b>Comments</b></span>
                                        <div>
                                            <textarea name="comments" class="service-comment" cols="50" rows="5"></textarea>
                                        </div>
                                        <div>
                                            <input type="checkbox" id="terms-conditions" name="terms-conditions" class="checkbox">
                                            <label class="checkbox-text" for="terms-conditions"> I have pets at home</label><br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="continue-right">
                                            <button type="submit" class="continue mt-3"><b>Continue</b></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="payment-summary col-md-4 col-sm-12">
                        <div class="payment-card">
                            <div class="payment-header">
                                Payment Summary
                            </div>
                            <div class="payment-text1">
                                <div class="row">
                                    <div class="textline-1">
                                        <p class="text-1">01/01/2018 @ 4:00 pm</p>
                                        <p class="text-1">1 bed, 1 bath.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="textline-2">
                                        <p class="text-2"><b>Duration</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8 text-1">Basic</div>
                                    <div class="col-4 text-1">3 Hrs</div>
                                </div>
                                <div class="row">
                                    <div class="col-8 text-1">Inside cabinets(extra)</div>
                                    <div class="col-4 text-1">30 Mins</div>
                                </div>
                                <hr class="underline mt-2 mb-2">
                                <div class="row">
                                    <div class="col-8 text-1"><b>Total Service Time</b></div>
                                    <div class="col-4 text-3"><b>3.5 Hrs</b></div>
                                </div>
                            </div>
                            <div class="payment-text2">
                                <div class="row">
                                    <div class="col-8 text-1">Per cleaning</div>
                                    <div class="col-4 text-1">$87</div>
                                </div>
                                <div class="row">
                                    <div class="col-8 text-1">Discount</div>
                                    <div class="col-4 text-1">- $27</div>
                                </div>
                            </div>
                            <div class="payment-text3">
                                <div class="row">
                                    <div class="text-4 col-8">Total Payment</div>
                                    <div class="text-5 col-4"><b>$63</b></div>
                                </div>
                                <div class="row">
                                    <div class="text-1 col-8 pt-1 pb-1">Effective Price</div>
                                    <div class="text-6 col-4"><b>$50.4</b></div>
                                </div>
                                <div class="row">
                                    <span class="text-7"><span class="text-danger"><b>*</b></span>You will save 20% according to §35a EStG.</span>
                                </div>
                            </div>
                            <div class="payment-text4">
                                <img src="http://localhost/Helperland/assets/images/smiley.png" alt="smiley"> 
                                <span class="text-8">
                                    See what is always included
                                </span>
                            </div>
                        </div>
                        <div class="questions">
                            <div class="questions-header">
                                <b>Questions?</b>
                            </div>
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                            Which Helperland professional will come to my place?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Which Helperland professional will come to my place?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Which Helperland professional will come to my place?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                            Which Helperland professional will come to my place?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                                            Which Helperland professional will come to my place?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix">
                                            Which Helperland professional will come to my place?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingSeven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven">
                                            Which Helperland professional will come to my place?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="for-more-help">
                                <b>For more help</b>
                            </div>
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
        </div>
    </section>

<?php
    include("footer_2.php");
?>