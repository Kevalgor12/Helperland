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
<body onload="filltabcolor()">
    
    <?php
        include("header_2.php");
    ?>
    <div id="loader" class="d-none">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>

    <div class="modal fade" id="request-success" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>
                <div class="modal-body">
                    <div class="content">
                        Your request submitted successfully. 
                    </div>
                    <div class="modal-footer-text">
                        <button name="submit" class="ok" ><a href="ServiceHistory.php" class="text-color style-none">Ok</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                    <button class="nav-link active fill" id="pills-SetupService-tab" data-bs-toggle="pill" 
                                    data-bs-target="#pills-SetupService" type="button" role="tab" aria-controls="pills-SetupService" 
                                    aria aria-selected="true" onclick="filltabcolor()">
                                        <img class="black" src="http://localhost/Helperland/assets/images/setup-service.png" alt="">
                                        <img class="white" src="http://localhost/Helperland/assets/images/setup-service-white.png" alt="">
                                        Setup Service
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-SchedulePlan-tab" data-bs-toggle="pill" 
                                    data-bs-target="#pills-SchedulePlan" type="button" role="tab" aria-controls="pills-SchedulePlan" 
                                    aria aria-selected="false" onclick="filltabcolor()">
                                        <img class="black" src="http://localhost/Helperland/assets/images/schedule.png" alt="">
                                        <img class="white" src="http://localhost/Helperland/assets/images/schedule-white.png" alt="">
                                        Schedule & Plan
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-YourDetails-tab" data-bs-toggle="pill" 
                                    data-bs-target="#pills-YourDetails" type="button" role="tab" aria-controls="pills-YourDetails" 
                                    aria aria-selected="false" onclick="filltabcolor()">
                                        <img class="black" src="http://localhost/Helperland/assets/images/details.png" alt="">
                                        <img class="white" src="http://localhost/Helperland/assets/images/details-white.png" alt="">
                                        Your Details
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-MakePayment-tab" data-bs-toggle="pill" 
                                    data-bs-target="#pills-MakePayment" type="button" role="tab" aria-controls="pills-MakePayment" 
                                    aria aria-selected="false" onclick="filltabcolor()">
                                        <img class="black" src="http://localhost/Helperland/assets/images/payment.png" alt="">
                                        <img class="white" src="http://localhost/Helperland/assets/images/payment-white.png" alt="">
                                        Make Payment
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade active show" id="pills-SetupService" role="tabpanel" aria-labelledby="pills-SetupService-tab">
                                    <span class="text-1">Enter your Postal Code</span>
                                    <div class="postalcode-check">
                                        <input type="text" class="postalcode" name="postalcode" placeholder="Postal code">
                                        <button name="submit" class="check-avail">check availability</button><br>
                                        <label class="text-danger error-msg"></label>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-SchedulePlan" role="tabpanel" aria-labelledby="pills-SchedulePlan-tab">
                                    <div class="row">
                                        <div class="col-md-5 pe-0 ps-0">
                                            <span class="text-1"><b>When do you need the cleaner?</b></span>
                                            <div>
                                                <input class="input-element" type="date" id="formdate" name="formdate" data placeholder="From Date">
                                                <select name="booktime" id="booktime">
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
                                                    <option value="3.0">3.0 Hrs</option>
                                                    <option value="4.0">4.0 Hrs</option>
                                                    <option value="5.0">5.0 Hrs</option>
                                                    <option value="6.0">6.0 Hrs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <span class="text-1"><b>Extra Services</b></span>
                                        <div class="extra-service">
                                            <div class="extra-content">
                                                <div class="extra-image" id="img1" onclick="img(1)">
                                                    <img src="http://localhost/Helperland/assets/images/3.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Inside cabinets</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                            <div class="extra-content">
                                                <div class="extra-image" id="img2" onclick="img(2)">
                                                  <img src="http://localhost/Helperland/assets/images/5.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Inside fridge</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                            <div class="extra-content">
                                                <div class="extra-image" id="img3" onclick="img(3)">
                                                    <img src="http://localhost/Helperland/assets/images/4.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Inside oven</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                            <div class="extra-content">
                                                <div class="extra-image" id="img4" onclick="img(4)">
                                                    <img src="http://localhost/Helperland/assets/images/2.png">
                                                </div>
                                                <br>
                                                <div class="extra-text">
                                                    <span class="extra-text-1">Laundry wash & dry</span><br>
                                                    <span class="extra-text-2">30 minutes</span>
                                                </div>
                                            </div>
                                            <div class="extra-content">
                                                <div class="extra-image" id="img5" onclick="img(5)">
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
                                        <div class="pe-0 ps-0">
                                            <textarea name="comments" class="service-comment" cols="50" rows="5"></textarea>
                                        </div>
                                        <div class="checkbox-content">
                                            <input type="checkbox" class="checkbox" id="terms-conditions" name="terms-conditions">
                                            <label class="checkbox-text" for="terms-conditions"> I have pets at home</label><br>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="continue-right">
                                            <button type="submit" class="continue continue1 disabled"><b>Continue</b></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-YourDetails" role="tabpanel" aria-labelledby="pills-YourDetails-tab">
                                    <span class="text-1"><b>Please enter your address so that your helper can find you.</b></span>
                                    <div class="row address-radio-button">
                                        
                                    </div>
                                    <div class="row">
                                        <div class="address-left">
                                            <button type="submit" class="add-new-address" onclick="showAddAddress()">+ Add new address</button>
                                        </div>
                                    </div>
                                    <div class="add-address row">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="text-danger error-message"></label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="streetname">Street name</label><br>
                                                <input class="input" type="text" name="streetname" placeholder="Street name">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="housenumber">House number</label><br>
                                                <input class="input" type="text" name="housenumber" placeholder="House number">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="postalcode">Postal code</label><br>
                                                <input class="input" type="text" name="postal_code" placeholder="360005">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="city">City</label><br>
                                                <input class="input" type="text" name="city" placeholder="Bonn">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="phonenumber">Phone number</label><br>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">+49</span>
                                                    <input type="text" id="phonenumber" name="phonenumber" placeholder="9745643546">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="address-save">Save</button>
                                            <button type="submit" class="address-cancel" onclick="hideAddAddress()">Cancel</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="continue-right">
                                            <button type="submit" class="continue continue2 disabled">Continue</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-MakePayment" role="tabpanel" aria-labelledby="pills-MakePayment-tab">
                                    <span class="text-1 temp"><b>Choose one of the following payment methods.</b></span>
                                    <div>
                                        <label for="promocode">Promo code (optional)</label><br>
                                        <div class="promocode-check">
                                            <input type="text" class="promocode" name="promocode" placeholder="Promo code (optional)">
                                            <button name="submit" class="apply">Apply</button><br>
                                            <label class="text-danger error-msg"></label>
                                        </div>
                                        <hr>
                                        <div class="checkbox-content">
                                            <input type="checkbox" class="checkbox" id="terms-conditions" name="terms-conditions">
                                            <label class="checkbox-text" for="terms-conditions"> I accepted <span>terms and conditions</span>, the <span>cancellation policy</span> and the <span>privacy policy</span>. I confirm that Helperland starts to execute the contract before the expiry of the withdrawal period and I lose my right of withdrawal as a consumer with full performance of the contract.</label><br>
                                        </div>
                                        <div>
                                            <div class="continue-right">
                                                <button type="submit" class="complete-booking"><b>Complete Booking</b></button>
                                            </div>
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
                                        <p class="text-1 datetime"></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="textline-2">
                                        <p class="text-2"><b>Duration</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 text-1">Basic</div>
                                    <div class="col-6 text-1 basic text-right">3 Hrs</div>
                                </div>
                                <div class="row extra img1-text">
                                    <div class="col-6 text-1">Inside cabinets</div>
                                    <div class="col-6 text-1 text-right">30 Mins</div>
                                </div>
                                <div class="row extra img2-text">
                                    <div class="col-6 text-1">Inside fridge</div>
                                    <div class="col-6 text-1 text-right">30 Mins</div>
                                </div>
                                <div class="row extra img3-text">
                                    <div class="col-6 text-1">Inside oven</div>
                                    <div class="col-6 text-1 text-right">30 Mins</div>
                                </div>
                                <div class="row extra img4-text">
                                    <div class="col-6 text-1">Inside wash & dry</div>
                                    <div class="col-6 text-1 text-right">30 Mins</div>
                                </div>
                                <div class="row extra img5-text">
                                    <div class="col-6 text-1">Interior windows</div>
                                    <div class="col-6 text-1 text-right">30 Mins</div>
                                </div>
                                <hr class="underline mt-2 mb-2">
                                <div class="row">
                                    <div class="col-6 text-1"><b>Total Service Time</b></div>
                                    <div class="col-6 text-3 text-right totaltime"></div>
                                </div>
                            </div>
                            <div class="payment-text2">
                                <div class="row">
                                    <div class="col-6 text-1">Per cleaning</div>
                                    <div class="col-6 text-1 text-right total-charge"></div>
                                </div>
                            </div>
                            <div class="payment-text3">
                                <div class="row align-items-center">
                                    <div class="text-4 col-6">Total Payment</div>
                                    <div class="text-5 col-6 text-right total-payment"></div>
                                </div>
                            </div>
                            <div class="payment-text4">
                                <img src="http://localhost/Helperland/assets/images/smiley.png" alt="smiley"> 
                                <span class="text-6">
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
                                            What is included in the basic cleaning?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            Living room, bedroom and bathroom, kitchen and common areas
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Can I skip or move bookings?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                        You can change a booking free of charge 48 hours before an assignment. If you want to skip an already booked assignment, we will credit the value of the booking to your account. You can use the credit for a future booking.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                            Do I have to be at home during the cleaning?
                                        </button>
                                    </h2>
                                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">
                                            We recommend that you be at home for the first cleaning. This way you get to know your helper personally. You can also show him the rooms and respond to your wishes. Of course you can arrange an appointment or place for the key handover with your helper. With frequent bookings, some customers choose to leave a spare key to their cleaner.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="for-more-help">
                                <a href="FAQ.php"><b>For more help</b></a>
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