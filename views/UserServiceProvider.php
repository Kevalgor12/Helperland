<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Service</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
</head>

<body>

    <?php
    include("header_3.php");
    ?>

    <!-- rowclick servicedetail modal -->

    <div class="modal fade" id="request_detail_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog sp-modal modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Service Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="register-inputs details_map fill-selected-request me-0 ms-0">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main content -->

    <section class="upcoming-service" id="upcoming-service">
        <div class="max-width">
            <div class="upcoming-service-content">
                <div class="user-name">
                    Welcome, <b><?php echo $_SESSION['username'] ?></b>
                </div>
            </div>
            <div class="sidebar-table mx-auto">
                <div class="sidebar">
                    <a class="sp-dashboard">Dashboard</a>
                    <a class="sp-newservice-request active">New Service Requests</a>
                    <a class="sp-upcoming-service">Upcoming Services</a>
                    <a class="sp-service-schedule">Service Schedule</a>
                    <a class="sp-service-history">Service History</a>
                    <a class="sp-ratings">My Ratings</a>
                    <a class="sp-block-customer">Block Customer</a>
                    <a class="sp-notifications">Notifications</a>
                </div>
                <div class="customer-table sp-dashboard-body">
                    dashboard
                </div>
                <div class="customer-table sp-newservice-table sp-newservice-request-body">

                </div>
                <div class="customer-table sp-upcomingservice-table sp-upcoming-service-body">

                </div>
                <div class="customer-table sp-service-schedule-body">
                    service-schedule
                </div>
                <div class="customer-table sp-servicehistory-table sp-service-history-body">
                    
                </div>
                <div class="customer-table sp-rating-table sp-ratings-body">
                    
                </div>
                <div class="customer-table fill-card sp-block-customer-body">
                    
                </div>
                <div class="customer-table sp-notifications-body">
                    notifications
                </div>
                <div class="customer-table sp_mysetting">
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="sp-btn-setting sp-details active">My Details</button>
                        <button class="sp-btn-setting sp-password">Change Password</button>
                    </div>
                    <div class="sp-button-body">
                        <div class="sp-details-body sp_details">
                            
                        </div>
                        <div class="sp-password-body">
                            <div>
                                <label class="password-label text-danger sp-password_error"></label>
                            </div>
                            <div>
                                <label class="password-label temp33" for="oldpassword">Old Password</label> <br>
                                <input class="password-input" type="password" name="sp-oldpassword" placeholder="Current Pasword">
                            </div>
                            <div>
                                <label class="password-label" for="newpassword">New Password</label> <br>
                                <input class="password-input" type="password" name="sp-newpassword" placeholder="Password">
                            </div>
                            <div>
                                <label class="password-label" for="confirmpassword">Confirm Password</label> <br>
                                <input class="password-input" type="password" name="sp-confirmpassword" placeholder="Confirm Password">
                            </div>
                            <div>
                                <button class="sp-password-save">Save</button>
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