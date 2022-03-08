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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>

<body>

    <?php
    include("header_3.php");
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

    <!-- rowclick servicedetail modal -->

    <div class="modal fade" id="request_detail_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs fill-selected-request me-0 ms-0">
                        
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
                        <div class="row fill-reschedule">
                            <div class="col-sm-6">
                                <input class="input-element servicedate" type="date" id="formdate" name="formdate" data placeholder="From Date">
                            </div>
                            <div class="col-sm-6">
                                <select name="booktime" id="booktime" class="servicetime">
                                    <option value="3:00 PM">3:00 PM</option>
                                    <option value="4:00 PM">4:00 PM</option>
                                    <option value="5:00 PM">5:00 PM</option>
                                    <option value="6:00 PM">6:00 PM</option>
                                </select>
                            </div>
                            <div class="text-danger error-reschdule">

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
                        <div class="text-danger error-cancelrequest">

                        </div>

                        <button name="submit" class="btn-cancelnow">Cancel Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ratesp modal -->

    <div class="modal fade" id="ratesp_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content fill-sp-rating">
                
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
                    <span>Welcome, <b><?php echo $_SESSION['username'] ?></b></span>
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
                <div class="customer-table tabledashboard fill_dashboard">                            
                    
                </div>
                <div class="customer-table history fill_history">
                                            
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