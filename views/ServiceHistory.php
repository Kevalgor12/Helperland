<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service History</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>

<body>

    <?php
    include("header_3.php");
    ?>

    <!-- rowclick servicedetail modal -->

    <div class="modal fade" id="request_detail_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs me-0 ms-0">
                        <div class="row">
                            <div class="col-sm-12">
                                <span class="service-datetime">05/10/2021&nbsp;8:00 - 11:30</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Duration: </span>
                            </div>
                            <div class="ps-2 service-detail-text">
                                <span> 3.5 Hrs</span>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Service Id: </span>
                            </div>
                            <div class="service-detail-text ps-2">
                                <span> 123</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Extras: </span>
                            </div>
                            <div class="service-detail-text ps-2">
                                <span> Inside cabinets</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Net Amount: </span>
                            </div>
                            <div class="service-detail-euro ps-2">
                                <span> &euro; 87.5</span>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Service Address: </span>
                            </div>
                            <div class="service-detail-text ps-2">
                                <span> rajnagar-5, 360003 Rajkot</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Billing Address: </span>
                            </div>
                            <div class="service-detail-text ps-2">
                                <span> rajnagar-5, 360003 Rajkot</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Phone: </span>
                            </div>
                            <div class="service-detail-text ps-2">
                                <span> 9849389349</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Email: </span>
                            </div>
                            <div class="service-detail-text ps-2">
                                <span> ksfds12@gmail.com</span>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div>
                                <span class="service-detail">Comments: </span>
                            </div>
                            <div class="service-detail-text ps-2">
                                <span> service is good.</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div>
                                <span><i class="fas fa-times-circle"></i> </span>
                            </div>
                            <div class="service-detail-text ps-2">
                                <span> I don't have pets at home</span>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div>
                                <button name="submit" class="btn-reschedule" data-bs-toggle="modal" data-bs-target="#reschedule_modal"><i class="fas fa-history"></i>&nbsp; Reschedule</button>
                            </div>
                            <div class="ps-2">
                                <button name="submit" class="btn-cancel" data-bs-toggle="modal" data-bs-target="#cancel_bookingrequest_modal"><i class="fas fa-times"></i>&nbsp; Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- reschedule modal -->

    <div class="modal fade" id="reschedule_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">Reschedule Service Request</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs me-0 ms-0">
                        <label class="cancel-question">Select New Date and Time</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="input-element" type="date" id="formdate" name="formdate" data placeholder="From Date">
                            </div>
                            <div class="col-sm-6">
                                <select name="booktime" id="booktime">
                                    <option value="3:00 PM">3:00 PM</option>
                                    <option value="4:00 PM">4:00 PM</option>
                                    <option value="5:00 PM">5:00 PM</option>
                                    <option value="6:00 PM">6:00 PM</option>
                                </select>
                            </div>
                        </div>
                        <button name="submit" class="btn-update">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cancel booking request modal -->

    <div class="modal fade" id="cancel_bookingrequest_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">Cancel Service Request</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs me-0 ms-0">
                        <label class="cancel-question">Why you want to cancel the service request?</label>
                        <textarea class="why-cancel" name="whycancel"></textarea>

                        <button name="submit" class="btn-cancelnow">Cancel Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ratesp modal -->

    <div class="modal fade" id="ratesp_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="staticBackdropLabel">
                        <div class="d-flex align-items-center justify-content-left">
                            <div>
                                <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                            </div>
                            <div class="ps-2">
                                <p class="sp-details">Lyum Watson</p>
                                <p class="sp-details">
                                    <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                    <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                    <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                    <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                    <img src="http://localhost/Helperland/assets/images/star2.png" alt="star">
                                    <span>3.67</span>
                                </p>
                            </div>
                        </div>
                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs me-0 ms-0">
                        <label class="rate-service-text">Rate your service provider</label>
                        <div class="row">
                            <div class="col-sm-5">
                                <label class="subtext">On time arrival</label>
                            </div>
                            <div class="col-sm-7">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star2.png" alt="star">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label class="subtext">Friendly</label>
                            </div>
                            <div class="col-sm-7">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star2.png" alt="star">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <label class="subtext">Quality of service</label>
                            </div>
                            <div class="col-sm-7">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star1.png" alt="star">
                                <img src="http://localhost/Helperland/assets/images/star2.png" alt="star">
                            </div>
                        </div>
                        <div class="row">
                            <label class="subtext">Feedback on service provider</label>
                        </div>
                        <div class="row me-0 ms-0">
                            <textarea class="rate-feedback" name="feedback"></textarea>
                        </div>
                        <button name="submit" class="btn-ratesp-submit">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- add or edit address modal -->

    <div class="modal fade" id="addedit_address_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog address modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title add_edit_address" id="staticBackdropLabel"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body addedit_selected_useraddress">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="text-danger error-message"></label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="addresslable" for="streetname">Street name</label><br>
                            <input class="input" type="text" name="streetname" placeholder="Street name">
                        </div>
                        <div class="col-md-6">
                            <label class="addresslable" for="housenumber">House number</label><br>
                            <input class="input" type="text" name="housenumber" placeholder="House number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="addresslable" for="postalcode">Postal code</label><br>
                            <input class="input" type="text" name="postal_code" placeholder="360005">
                        </div>
                        <div class="col-md-6">
                            <label class="addresslable" for="city">City</label><br>
                            <input class="input" type="text" name="city" placeholder="Bonn">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="addresslable" for="phonenumber">Phone number</label><br>
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1">+49</span>
                                <input class="input" type="text" name="phonenumber" placeholder="9745643546">
                            </div>
                        </div>
                    </div>
                    <div>
                        <button name="submit" class="btn-addresssave">save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- service history main content -->

    <section class="service-history" id="service-history">
        <div class="max-width">
            <div class="service-history-content">
                <div class="user-name">
                    <span>Welcome, <b></b></span>
                </div>
            </div>
            <div class="sidebar-table">
                <div class="sidebar">
                    <a class="dashboard active">Dashboard</a>
                    <a class="servicehistory">Service History</a>
                    <a href="#service-schedule">Service Schedule</a>
                    <a href="#service-history">Favourite Pros</a>
                    <a href="#my-ratings">Invoices</a>
                    <a href="#block-customer">Notifications</a>
                </div>
                <div class="customer-table tabledashboard">
                    <div class="row">
                        <div class="col-8 service-history-text"><b>Current Service request</b></div>
                        <div class="col-4 export-btn-text"><a href="http://localhost/Helperland/?controller=Helperland&function=gotobookservicepage"><button class="button-add-new-request">Add New Service Request</button></a></div>
                    </div>
                    <table id="dashtable" class="table display dataTable">
                        <thead>
                            <tr>
                                <th>Service Id <img class="sort-img" alt=""></th>
                                <th>Service Date <img class="sort-img" alt=""></th>
                                <th>Service Provider <img class="sort-img" alt=""></th>
                                <th>Payment <img class="sort-img" alt=""></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="fill_dashboard">
                            <tr data-bs-toggle="modal" data-bs-target="#request_detail_modal">
                                <td>
                                    <span>123</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> &nbsp; <span><b>11/02/2018</b></span> <br>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="http://localhost/Helperland/assets/images/layer-14.png" alt="clock"> &nbsp; <span>12:00 - 18:00</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-left">
                                        <div>
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="ps-2">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-reschedule" data-bs-toggle="modal" data-bs-target="#reschedule_modal">reschedule</button>
                                    <button class="btn-cancel" data-bs-toggle="modal" data-bs-target="#cancel_bookingrequest_modal">Cancel</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="customer-table history">
                    <div class="row">
                        <div class="col-8 service-history-text"><b>Service History</b></div>
                        <div class="col-4 export-btn-text"><button class="button-export">Export</button></div>
                    </div>
                    <table id="tableservice" class="table display dataTable">
                        <thead>
                            <tr>
                                <th>Service Id <img class="sort-img" alt=""></th>
                                <th>Service Date <img class="sort-img" alt=""></th>
                                <th>Service Provider <img class="sort-img" alt=""></th>
                                <th>Payment <img class="sort-img" alt=""></th>
                                <th>Status</th>
                                <th>Rate SP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <span>123</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> &nbsp; <span><b>11/02/2018</b></span> <br>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="http://localhost/Helperland/assets/images/layer-14.png" alt="clock"> &nbsp; <span>12:00 - 18:00</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-left">
                                        <div>
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="ps-2">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-completed">Completed</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp" data-bs-toggle="modal" data-bs-target="#ratesp_modal">Rate SP</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>123</span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> &nbsp; <span><b>11/02/2018</b></span> <br>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <img src="http://localhost/Helperland/assets/images/layer-14.png" alt="clock"> &nbsp; <span>12:00 - 18:00</span>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center justify-content-left">
                                        <div>
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="ps-2">
                                            Lyum Watson
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="txt-color">
                                        €<b>63</b>
                                    </div>
                                </td>
                                <td>
                                    <button class="btn-cancelled">Cancelled</button>
                                </td>
                                <td>
                                    <button class="btn-ratesp" data-bs-toggle="modal" data-bs-target="#ratesp_modal">Rate SP</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="customer-table mysetting">
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="btn-setting details active">My Details</button>
                        <button class="btn-setting addresses">My Addresses</button>
                        <button class="btn-setting password">Change Password</button>
                    </div>
                    <div class="button-body">
                        <div class="details-body user_details">
                            
                        </div>
                        <div class="address-body">
                            <table class="address-table">
                                <thead>
                                    <tr>
                                        <th>Addresses</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="user_addresses">

                                </tbody>
                            </table>
                            <div>
                                <button class="addnewaddress">Add New Address</button>
                            </div>
                        </div>
                        <div class="password-body">
                            <div>
                                <label class="password-label text-danger password_error"></label>
                            </div>
                            <div>
                                <label class="password-label temp33" for="oldpassword">Old Password</label> <br>
                                <input class="password-input" type="password" name="oldpassword" placeholder="Current Pasword">
                            </div>
                            <div>
                                <label class="password-label" for="newpassword">New Password</label> <br>
                                <input class="password-input" type="password" name="newpassword" placeholder="Password">
                            </div>
                            <div>
                                <label class="password-label" for="confirmpassword">Confirm Password</label> <br>
                                <input class="password-input" type="password" name="confirmpassword" placeholder="Confirm Password">
                            </div>
                            <div>
                                <button class="password-save">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include("footer_3.php");
    ?>