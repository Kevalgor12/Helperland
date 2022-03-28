<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
</head>

<body>

    <?php
    include("header_4.php");
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

    <div class="modal fade" id="reschedule_admin_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog sp-modal modal-dialog-centered">
            <div class="modal-content fill_selected_service_request_data">
                <!-- <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Service Request</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="reschedule-inputs fill-selected-request me-0 ms-0">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="srdate"><b>Date</b></label>
                                <div class="date-group position-relative">
                                    <input class="input" type="date" id="srdate" name="srdate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="srtime"><b>Time</b></label><br>
                                <select class="input" name="srtime" id="srtime">
                                    <option value="8:00">8:00</option>
                                    <option value="8:30">8:30</option>
                                    <option value="9:00">9:00</option>
                                    <option value="9:30">9:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                </select>
                            </div>
                        </div>
                        <div class="row address-heading">
                            <span class="pe-0 ps-0"><b>Service Address</b></span>
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
                                <select class="input" name="city" id="city">
                                    <option value="Rajkot">Rajkot</option>
                                    <option value="Ahmedabad">Ahmedabad</option>
                                </select>
                            </div>
                        </div>
                        <div class="row address-heading">
                            <span class="pe-0 ps-0"><b>Invoice Address</b></span>
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
                                <select class="input" name="city" id="city">
                                    <option value="Rajkot">Rajkot</option>
                                    <option value="Ahmedabad">Ahmedabad</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="reschedulereason"><b>Why do you want to reschedule service request?</b></label><br>
                                <textarea class="reschedulereason" name="reschedulereason" placeholder="Why do you want to reschedule service request?"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="emp-notes"><b>Call Center EMP Notes</b></label><br>
                                <textarea class="reschedulereason" name="emp-notes" placeholder="Enter Notes"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="button-update admin-sr-update">Update</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <!-- main content -->

    <section class="admin" id="admin">
        <div class="max-width">
            <div class="sidebar-table">
                <div class="sidebar" id="sidebar">
                    <a class="menu admin-service-requests active">Service Requests</a>
                    <a class="menu admin-user-management">User Management</a>
                </div>
                <div class="customer-table admin-service-requests-body">
                    <div class="row">
                        <div class="col-md-12 admin-text"><b>Service Requests</b></div>
                    </div>
                    <div class="row user-inputs">
                        <ul class="nav">
                            <li class="nav-item">
                                <input type="text" id="serviceid" name="serviceid" placeholder="Service ID">
                            </li>
                            <li class="nav-item">
                                <input type="text" id="postalcode" name="postalcode" placeholder="Postal Code">
                            </li>
                            <li class="nav-item d-none">
                                <input type="email" id="email" name="email" placeholder="Email">
                            </li>
                            <li class="nav-item">
                                <select class="customer" name="customer" id="customer">
                                    <option disabled selected hidden value="disable">Select Customer</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <select class="serviceprovider" name="sprovider" id="sprovider">
                                    <option disabled selected hidden value="disable">Select Service Provider</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <select name="service-status" id="service-status">
                                    <option disabled selected hidden value="disable">Status</option>
                                    <option value="0">New</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Completed</option>
                                    <option value="-1">Cancelled</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <select name="sp-payment-status" id="sp-payment-status" disabled>
                                    <option disabled selected hidden value="disable">SP payment Status</option>
                                    <option value="pending">Pending</option>
                                    <option value="completed">Completed</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <select name="status" id="status" disabled>
                                    <option disabled selected hidden value="disable">Status</option>
                                    <option value="0">New</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Completed</option>
                                    <option value="-1">Cancelled</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <div class="input-group">
                                    <input type="checkbox" id="issue" name="issue" value="issue">
                                    <label for="issue"> Has Issue</label>
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="input-group position-relative">
                                    <input type="text" id="fromdate" name="fromdate" placeholder="From Date">
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="input-group position-relative">
                                    <input type="text" id="todate" name="todate" placeholder="To Date">
                                </div>
                            </li>
                            <li class="nav-item">
                                <div>
                                    <button class="btn-search request-search">Search</button>
                                    <button class="btn-clear request-clear">Clear</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="fill-all-service">

                    </div>
                </div>
                <div class="customer-table admin-user-management-body">
                    <div class="row">
                        <div class="col-md-6 admin-text"><b>User Management</b></div>
                        <div class="col-md-6 addnew-btn-text"><button class="button-addnew"><img src="http://localhost/Helperland/assets/images/add.png" alt=""> Add New User</button></div>
                    </div>
                    <div class="row user-inputs">
                        <ul class="nav">
                            <li class="nav-item">
                                <select class="username" name="usermanagementusername" id="username">
                                    <option disabled selected hidden value="disable">Select User name</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <select name="usermanagementusertype" id="usertype">
                                    <option disabled selected hidden value="disable">User Type</option>
                                    <option value="2">Customer</option>
                                    <option value="1">Service Provider</option>
                                </select>
                            </li>
                            <li class="nav-item">
                                <div class="input-group">
                                    <span class="input-group-text">+49</span>
                                    <input type="text" id="phonenumber" name="usermanagementphonenumber" placeholder="Phone number">
                                </div>
                            </li>
                            <li class="nav-item">
                                <input type="text" id="postalcode" name="usermanagementpostalcode" placeholder="Postal Code">
                            </li>
                            <li class="nav-item d-none">
                                <input type="email" id="email" name="usermanagementemail" placeholder="Email">
                            </li>
                            <li class="nav-item">
                                <div class="input-group position-relative">
                                    <input type="text" id="usermanagementfromdate" name="usermanagementfromdate" placeholder="From Date">
                                </div>
                            </li>
                            <li class="nav-item">
                                <div class="input-group position-relative">
                                    <input type="text" id="usermanagementtodate" name="usermanagementtodate" placeholder="To Date">
                                </div>
                            </li>
                            <li class="nav-item">
                                <div>
                                    <button class="btn-search user-management-search">Search</button>
                                    <button class="btn-clear user-management-clear">Clear</button>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="fill-user-management">

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="http://localhost/Helperland/assets/js/main.js"></script>
    <script src="http://localhost/Helperland/assets/js/datatable.js"></script>
    <script src="http://localhost/Helperland/assets/js/admin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.4/dist/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
</body>

</html>