<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Requests</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <link rel="stylesheet" href="http://localhost/Helperland/assets/css/style.css">
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
                <div class="customer-table admin-service-requests-body fill-all-service">

                </div>
                <div class="customer-table admin-user-management-body fill-user-management">

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
</body>

</html>