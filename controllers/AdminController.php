<?php

class AdminController
{
    public function __construct()
    {
        include('models/HelperlandModel.php');
        $this->model = new HelperlandModel();
        session_start();
    }

    public function HourMinuteToDecimal($time)
    {
        $starttime = explode(':', $time);
        return $starttime[0] * 60 + $starttime[1];
    }

    public function DecimalToHoursMins($totalminutes)
    {
        $hour = (int)($totalminutes / 60);
        $minute = round($totalminutes % 60);
        if ($hour < 10) {
            $hour = "0" . $hour;
        }
        if ($minute < 10) {
            $minute = "0" . $minute;
        }
        return $hour . ":" . $minute;
    }

    public function fill_service_requests_admin()
    {
        $list = $this->model->fill_service_requests_admin('servicerequest');

?>
        <table id="tableservicerequests" class="table display">
            <thead>
                <tr>
                    <th>Service ID <img class="sort-img" alt=""></th>
                    <th>Service date <img class="sort-img" alt=""></th>
                    <th>Customer details <img class="sort-img" alt=""></th>
                    <th>Service Provider <img class="sort-img" alt=""></th>
                    <!-- <th>Gross Amount <img class="sort-img" alt=""></th> -->
                    <th>Net Amount <img class="sort-img" alt=""></th>
                    <!-- <th>Discount <img class="sort-img" alt=""></th> -->
                    <th>Status <img class="sort-img" alt=""></th>
                    <!-- <th>Payment Status <img class="sort-img" alt=""></th> -->
                    <th>Actions </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($list != null) {
                    foreach ($list as $data) {
                        if ($data['ServiceProviderId'] != null) {
                            $serviceproviderdetails = $this->model->get_sp_or_customer_byid('user', $data['ServiceProviderId']);
                            $customerdetails = $this->model->get_sp_or_customer_byid('user', $data['UserId']);
                        }
                        $customeraddress = $this->model->fill_selected_pending_request_useraddress('servicerequestaddress', $data['ServiceRequestId']);
                        $date = substr($data['ServiceStartDate'], 0, 10);
                        $time = substr($data['ServiceStartDate'], 11, 5);
                        $totalminutes = $this->HourMinuteToDecimal($time) + (($data['ServiceHours'] + $data['ExtraHours']) * 60);
                        $totaltime = $this->DecimalToHoursMins($totalminutes);
                ?>
                        <tr>
                            <td><?php echo $data['ServiceRequestId']; ?></td>
                            <td>
                                <div>
                                    <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> <?php echo $date; ?> <br>
                                    <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> <?php echo $time . "-" . $totaltime ?>
                                </div>
                            </td>
                            <td>
                                <div class="ps-4">
                                    <?php echo $customerdetails['FirstName'] . ' ' . $customerdetails['LastName']; ?>
                                </div>
                                <div class="serviceaddress d-flex">
                                    <div><img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home">&nbsp;</div>
                                    <div><?php echo $customeraddress['AddressLine1'] . " " . $customeraddress['AddressLine2'] . ", " ?> <br> <?php echo $customeraddress['City'] . " - " . $customeraddress['PostalCode']; ?></div>
                                </div>
                            </td>
                            <td>
                                <?php
                                if ($data['ServiceProviderId'] != "") {
                                    echo $serviceproviderdetails['FirstName'] . ' ' . $serviceproviderdetails['LastName'];
                                } else {
                                    echo '';
                                }
                                ?>
                            </td>
                            <td><?php echo $data['TotalCost']; ?></td>
                            <td>
                                <?php
                                if ($data['SPAcceptedDate'] == "" && $data['Status'] == 0) {
                                ?>
                                    <button class="btn-new" disabled>New</button>
                                <?php
                                } else if ($data['Status'] == 0) {
                                ?>
                                    <button class="btn-pending" disabled>Pending</button>
                                <?php
                                } else if ($data['Status'] == 1) {
                                ?>
                                    <button class="btn-completed" disabled>Completed</button>
                                <?php
                                } else if ($data['Status'] == -1) {
                                ?>
                                    <button class="btn-cancelled" disabled>Cancelled</button>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($data['SPAcceptedDate'] == "" || $data['Status'] == 0) {
                                ?>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item reschedule_by_admin" id="<?php echo $data['ServiceRequestId']; ?>">Edit & Reschedule</a></li>
                                            <li><a class="dropdown-item cancel_by_admin" id="<?php echo $data['ServiceRequestId']; ?>">Cancel SR by Customer</a></li>
                                            <li><a class="dropdown-item" href="#">Inquiry</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Other Transactions</a></li>
                                        </ul>
                                    </div>
                                <?php
                                } else if ($data['Status'] == 1 || $data['Status'] == -1) {
                                ?>
                                    <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <li><a class="dropdown-item" href="#">Refund</a></li>
                                            <li><a class="dropdown-item" href="#">Inquiry</a></li>
                                            <li><a class="dropdown-item" href="#">History Log</a></li>
                                            <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                            <li><a class="dropdown-item" href="#">Has Issue</a></li>
                                            <li><a class="dropdown-item" href="#">Other Transactions</a></li>
                                        </ul>
                                    </div>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="rights-content">
            <span class="rights">©2018 Helperland. All rights reserved.</span>
        </div>
    <?php
    }

    public function fill_user_management_admin()
    {
        $list = $this->model->fill_user_management_admin('user');

    ?>
        <table id="tableusermanagement" class="table display">
            <thead>
                <tr>
                    <th>User Name <img class="sort-img" alt=""></th>
                    <th>Role <img class="sort-img" alt=""></th>
                    <th>Date of Registration <img class="sort-img" alt=""></th>
                    <th>User Type <img class="sort-img" alt=""></th>
                    <th>Phone </th>
                    <th>Postal code <img class="sort-img" alt=""></th>
                    <th>Status <img class="sort-img" alt=""></th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($list != null) {
                    foreach ($list as $data) {
                        $date = substr($data['CreatedDate'], 0, 10);
                ?>
                        <tr>
                            <td><?php echo $data['FirstName'] . ' ' . $data['LastName']; ?></td>
                            <td></td>
                            <td>
                                <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> <?php echo $date; ?> <br>
                            </td>
                            <td>
                                <?php if ($data['UserTypeId'] == 1) {
                                    echo 'Service Provider';
                                } else if ($data['UserTypeId'] == 2) {
                                    echo 'Customer';
                                } else if ($data['UserTypeId'] == 3) {
                                    echo 'Admin';
                                } ?>
                            </td>
                            <td><?php echo $data['Mobile']; ?></td>
                            <td><?php echo $data['ZipCode']; ?></td>
                            <td>
                                <?php
                                if ($data['IsApproved'] == 0) {
                                ?>
                                    <button class="btn-notapprove" disabled>Not Approve</button>
                                <?php
                                } else if ($data['IsApproved'] == 1 && $data['IsActive'] == 0) {
                                ?>
                                    <button class="btn-inactive" disabled>Inactive</button>
                                <?php
                                } else if ($data['IsApproved'] == 1 && $data['IsActive'] == 1) {
                                ?>
                                    <button class="btn-active" disabled>Active</button>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <?php
                                        if ($data['IsApproved'] == 0) {
                                        ?>
                                            <li><a class="dropdown-item user-approve" id="<?php echo $data['UserId']; ?>">Approve</a></li>
                                        <?php
                                        } else if ($data['IsApproved'] == 1) {
                                        ?>
                                            <?php
                                            if ($data['IsActive'] == 0) {
                                            ?>
                                                <li><a class="dropdown-item user-active" id="<?php echo $data['UserId']; ?>">Activate</a></li>
                                            <?php
                                            } else if ($data['IsApproved'] == 1) {
                                            ?>
                                                <li><a class="dropdown-item user-deactive" id="<?php echo $data['UserId']; ?>">Deactivate</a></li>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <div class="rights-content">
            <span class="rights">©2018 Helperland. All rights reserved.</span>
        </div>
    <?php
    }
    public function fill_reschedule_servicerequest_detail()
    {
        $selectedrequestid = $_POST['selectedrequestid'];
        $row = $this->model->fill_selected_pending_request('servicerequest', $selectedrequestid);
        $date = substr($row['ServiceStartDate'], 0, 10);
        $time = substr($row['ServiceStartDate'], 11, 5);
        $address = $this->model->fill_selected_pending_request_useraddress('servicerequestaddress', $selectedrequestid);

    ?>
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Edit Service Request</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="reschedule-inputs fill-selected-request me-0 ms-0">
                <div>
                    <label class="admin-error" for="admin-error"></label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="srdate"><b>Date</b></label>
                        <div class="date-group position-relative">
                            <input class="input" type="date" id="srdate" name="srdate" value="<?php echo $date; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="srtime"><b>Time</b></label><br>
                        <select class="input" name="srtime" id="srtime">
                            <option value="8:00" <?php echo ($time == '08:00') ? 'selected="selected"' : '' ?>>8:00</option>
                            <option value="8:30" <?php echo ($time == '08:30') ? 'selected="selected"' : '' ?>>8:30</option>
                            <option value="9:00" <?php echo ($time == '09:00') ? 'selected="selected"' : '' ?>>9:00</option>
                            <option value="9:30" <?php echo ($time == '09:30') ? 'selected="selected"' : '' ?>>9:30</option>
                            <option value="10:00" <?php echo ($time == '10:00') ? 'selected="selected"' : '' ?>>10:00</option>
                            <option value="10:30" <?php echo ($time == '10:30') ? 'selected="selected"' : '' ?>>10:30</option>
                            <option value="11:00" <?php echo ($time == '11:00') ? 'selected="selected"' : '' ?>>11:00</option>
                            <option value="11:30" <?php echo ($time == '11:30') ? 'selected="selected"' : '' ?>>11:30</option>
                            <option value="12:00" <?php echo ($time == '12:00') ? 'selected="selected"' : '' ?>>12:00</option>
                            <option value="12:30" <?php echo ($time == '12:30') ? 'selected="selected"' : '' ?>>12:30</option>
                            <option value="13:00" <?php echo ($time == '13:00') ? 'selected="selected"' : '' ?>>13:00</option>
                            <option value="13:30" <?php echo ($time == '13:30') ? 'selected="selected"' : '' ?>>13:30</option>
                            <option value="14:00" <?php echo ($time == '14:00') ? 'selected="selected"' : '' ?>>14:00</option>
                            <option value="14:30" <?php echo ($time == '14:30') ? 'selected="selected"' : '' ?>>14:30</option>
                            <option value="15:00" <?php echo ($time == '15:00') ? 'selected="selected"' : '' ?>>15:00</option>
                            <option value="15:30" <?php echo ($time == '15:30') ? 'selected="selected"' : '' ?>>15:30</option>
                            <option value="16:00" <?php echo ($time == '16:00') ? 'selected="selected"' : '' ?>>16:00</option>
                            <option value="16:30" <?php echo ($time == '16:30') ? 'selected="selected"' : '' ?>>16:30</option>
                            <option value="17:00" <?php echo ($time == '17:00') ? 'selected="selected"' : '' ?>>17:00</option>
                            <option value="17:30" <?php echo ($time == '17:30') ? 'selected="selected"' : '' ?>>17:30</option>
                            <option value="18:00" <?php echo ($time == '18:00') ? 'selected="selected"' : '' ?>>18:00</option>
                        </select>
                    </div>
                </div>
                <div class="row address-heading">
                    <span class="pe-0 ps-0"><b>Service Address</b></span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="streetname">Street name</label><br>
                        <input class="input" type="text" name="streetname" placeholder="Street name" value="<?php echo $address['AddressLine1']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="housenumber">House number</label><br>
                        <input class="input" type="text" name="housenumber" placeholder="House number" value="<?php echo $address['AddressLine2']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="postalcode">Postal code</label><br>
                        <input class="input" type="text" name="postalcode" placeholder="360005" value="<?php echo $address['PostalCode']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="city">City</label><br>
                        <input class="input" type="text" name="city" placeholder="Bonn" value="<?php if (isset($_POST['selectedrequestid'])) {
                                                                                                    echo $address['City'];
                                                                                                } ?>">
                    </div>
                </div>
                <div class="row address-heading">
                    <span class="pe-0 ps-0"><b>Invoice Address</b></span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="streetname">Street name</label><br>
                        <input class="input" type="text" placeholder="Street name" value="<?php echo $address['AddressLine1']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="housenumber">House number</label><br>
                        <input class="input" type="text" placeholder="House number" value="<?php echo $address['AddressLine2']; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="postalcode">Postal code</label><br>
                        <input class="input" type="text" placeholder="360005" value="<?php echo $address['PostalCode']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="city">City</label><br>
                        <input class="input" type="text" placeholder="Bonn" value="<?php if (isset($_POST['selectedrequestid'])) {
                                                                                        echo $address['City'];
                                                                                    } ?>">
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
                        <button type="button" class="button-update admin-sr-update" id="<?php echo $selectedrequestid; ?>">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    public function reschedule_selected_service_request()
    {
        $selectedrequestid = $_POST['selectedrequestid'];
        $row = $this->model->fill_selected_pending_request('servicerequest', $selectedrequestid);
        $previousdate = date('Y-m-d H-i-s', strtotime($row['ServiceStartDate'] . '-1 day'));

        $streetname = $_POST['streetname'];
        $housenumber = $_POST['housenumber'];
        $postalcode = $_POST['postalcode'];
        $city = $_POST['city'];
        $srdate = $_POST['srdate'];
        $srtime = $_POST['srtime'];
        $comment = $_POST['comment'];

        if ($previousdate > date('Y-m-d H-i-s')) {

            $array = [
                "ServiceRequestId" => $selectedrequestid,
                "ServiceStartDate" => $srdate . ' ' . $srtime,
                "Comments" => $comment
            ];

            $array2 = [
                "ServiceRequestId" => $selectedrequestid,
                "AddressLine1" => $streetname,
                "AddressLine2" => $housenumber,
                "PostalCode" => $postalcode,
                "City" => $city
            ];

            $this->model->reschedule_selected_service_request($array, $array2);
        } else {
            echo 'not-reschedule';
        }

        // $serviceprovider = $this->model->fill_data_reschedule_modal('servicerequest', $selectedrequestid);

        // if ($serviceprovider['ServiceProviderId'] != "") {

        //     $serviceproviderdetails = $this->model->get_sp_or_customer_byid('user', $serviceprovider['ServiceProviderId']);

        //     $to_email = $serviceproviderdetails['Email'];
        //     $subject = "Reschedule request";
        //     $body = "Hi, " . $serviceproviderdetails['FirstName'] . " " . $serviceproviderdetails['LastName'] . "!!! servicerequestid" . " " . $selectedrequestid . " " . "is rescheduled.";
        //     $headers = "From: kp916777@gmail.com";
        //     $_SESSION['email'] = $_POST['email'];

        //     mail($to_email, $subject, $body, $headers);
        // }
        // else {

        //     $list = $this->model->send_service_request_mail_to_sp('user', $row['ZipCode']);

        //     foreach ($list as $emaildata) {

        //         $checkblock = $this->model->check_block_unblock('favoriteandblocked', $_SESSION['userid'], $emaildata['UserId']);

        //         if ($checkblock == null) {

        //             $serviceproviderdetails = $this->model->get_sp_or_customer_byid('user', $serviceprovider['ServiceProviderId']);

        //             $to_email = $serviceproviderdetails['Email'];
        //             $subject = "Reschedule request";
        //             $body = "Hi, " . $serviceproviderdetails['FirstName'] . " " . $serviceproviderdetails['LastName'] . "!!! servicerequestid" . " " . $selectedrequestid . " " . "is rescheduled.";
        //             $headers = "From: kp916777@gmail.com";
        //             $_SESSION['email'] = $_POST['email'];

        //             mail($to_email, $subject, $body, $headers);
        //         }
        //     }
        // }
    }
    public function cancel_servicerequest()
    {
        $selectedrequestid = $_POST['selectedrequestid'];
        $row = $this->model->fill_selected_pending_request('servicerequest', $selectedrequestid);
        $previousdate = date('Y-m-d H-i-s', strtotime($row['ServiceStartDate'] . '-1 day'));

        if ($previousdate > date('Y-m-d H-i-s')) {
            $this->model->cancel_servicerequest('servicerequest', $selectedrequestid);

            $serviceprovider = $this->model->fill_data_reschedule_modal('servicerequest', $selectedrequestid);

            if ($serviceprovider['ServiceProviderId'] != "") {

                $serviceproviderdetails = $this->model->get_sp_or_customer_byid('user', $serviceprovider['ServiceProviderId']);

                $to_email = $serviceproviderdetails['Email'];
                $subject = "Cancel request";
                $body = "Hi, " . $serviceproviderdetails['FirstName'] . " " . $serviceproviderdetails['LastName'] . "!!! servicerequestid" . " " . $selectedrequestid . " " . "is cancelled.";
                $headers = "From: kp916777@gmail.com";
                $_SESSION['email'] = $_POST['email'];

                mail($to_email, $subject, $body, $headers);
            } 
            // else {
            //     $list = $this->model->send_service_request_mail_to_sp('user', $row['ZipCode']);
            //     foreach ($list as $emaildata) {

            //         $checkblock = $this->model->check_block_unblock('favoriteandblocked', $_SESSION['userid'], $emaildata['ServiceProviderId']);

            //         if ($checkblock == null) {

            //             $serviceproviderdetails = $this->model->get_sp_or_customer_byid('user', $serviceprovider['ServiceProviderId']);

            //             $to_email = $serviceproviderdetails['Email'];
            //             $subject = "Cancel request";
            //             $body = "Hi, " . $serviceproviderdetails['FirstName'] . " " . $serviceproviderdetails['LastName'] . "!!! servicerequestid" . " " . $selectedrequestid . " " . "is cancelled.";
            //             $headers = "From: kp916777@gmail.com";
            //             $_SESSION['email'] = $_POST['email'];

            //             mail($to_email, $subject, $body, $headers);
            //         }
            //     }
            // }
        } else {
            echo 'not-cancel';
        }
    }

    public function approve_serviceprovider()
    {
        $selecteduserid = $_POST['selecteduserid'];
        $this->model->approve_serviceprovider('user', $selecteduserid);
    }

    public function activate_user()
    {
        $selecteduserid = $_POST['selecteduserid'];
        $this->model->activate_user('user', $selecteduserid);
    }

    public function deactivate_user()
    {
        $selecteduserid = $_POST['selecteduserid'];
        $this->model->deactivate_user('user', $selecteduserid);
    }

    public function fill_option_for_Select()
    {
        $typeid1 = $_POST['typeid1'];
        $typeid2 = $_POST['typeid2'];
        $list = $this->model->fill_option_for_Select($typeid1, $typeid2);
        foreach ($list as $data) {
        ?>
            <option value="<?php echo $data['FirstName'] . ' ' . $data['LastName'] ?>"><?php echo $data['FirstName'] . ' ' . $data['LastName'] ?></option>
        <?php
        }
    }

    public function service_request_search()
    {
        $servicerequestid = $_POST['serviceid'];
        $postalcode = $_POST['postalcode'];
        $customer = $_POST['customer'];
        $sprovider = $_POST['sprovider'];
        $status = $_POST['servicestatus'];
        $fromdate = $_POST['fromdate'];
        $todate = $_POST['todate'];

        $array = [
            "ServiceRequestId" => $servicerequestid,
            "ZipCode" => $postalcode,
            "Customer" => $customer,
            "Sprovider" => $sprovider,
            "Status" => $status,
            "fromdate" => $fromdate,
            "todate" => $todate
        ];

        $rows = $this->model->service_request_search($array);

        ?>
        <table id="tableservicerequests" class="table display">
            <thead>
                <tr>
                    <th>Service ID <img class="sort-img" alt=""></th>
                    <th>Service date <img class="sort-img" alt=""></th>
                    <th>Customer details <img class="sort-img" alt=""></th>
                    <th>Service Provider <img class="sort-img" alt=""></th>
                    <!-- <th>Gross Amount <img class="sort-img" alt=""></th> -->
                    <th>Net Amount <img class="sort-img" alt=""></th>
                    <!-- <th>Discount <img class="sort-img" alt=""></th> -->
                    <th>Status <img class="sort-img" alt=""></th>
                    <!-- <th>Payment Status <img class="sort-img" alt=""></th> -->
                    <th>Actions </th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                foreach ($rows as $data) {
                    if ($data['ServiceProviderId'] != null) {
                        $serviceproviderdetails = $this->model->get_sp_or_customer_byid('user', $data['ServiceProviderId']);
                        $customerdetails = $this->model->get_sp_or_customer_byid('user', $data['UserId']);
                    }
                    $customeraddress = $this->model->fill_selected_pending_request_useraddress('servicerequestaddress', $data['ServiceRequestId']);
                    $date = substr($data['ServiceStartDate'], 0, 10);
                    $time = substr($data['ServiceStartDate'], 11, 5);
                    $totalminutes = $this->HourMinuteToDecimal($time) + (($data['ServiceHours'] + $data['ExtraHours']) * 60);
                    $totaltime = $this->DecimalToHoursMins($totalminutes);
                ?>
                    <tr>
                        <td><?php echo $data['ServiceRequestId']; ?></td>
                        <td>
                            <div>
                                <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> <?php echo $date; ?> <br>
                                <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> <?php echo $time . "-" . $totaltime ?>
                            </div>
                        </td>
                        <td>
                            <div class="ps-4">
                                <?php echo $customerdetails['FirstName'] . ' ' . $customerdetails['LastName']; ?>
                            </div>
                            <div class="serviceaddress d-flex">
                                <div><img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home">&nbsp;</div>
                                <div><?php echo $customeraddress['AddressLine1'] . " " . $customeraddress['AddressLine2'] . ", " ?> <br> <?php echo $customeraddress['City'] . " - " . $customeraddress['PostalCode']; ?></div>
                            </div>
                        </td>
                        <td>
                            <?php
                            if ($data['ServiceProviderId'] != "") {
                                echo $serviceproviderdetails['FirstName'] . ' ' . $serviceproviderdetails['LastName'];
                            } else {
                                echo '';
                            }
                            ?>
                        </td>
                        <td><?php echo $data['TotalCost']; ?></td>
                        <td>
                            <?php
                            if ($data['SPAcceptedDate'] == "" && $data['Status'] == 0) {
                            ?>
                                <button class="btn-new" disabled>New</button>
                            <?php
                            } else if ($data['Status'] == 0) {
                            ?>
                                <button class="btn-pending" disabled>Pending</button>
                            <?php
                            } else if ($data['Status'] == 1) {
                            ?>
                                <button class="btn-completed" disabled>Completed</button>
                            <?php
                            } else if ($data['Status'] == -1) {
                            ?>
                                <button class="btn-cancelled" disabled>Cancelled</button>
                            <?php
                            }
                            ?>
                        </td>
                        <td>
                            <?php
                            if ($data['SPAcceptedDate'] == "" || $data['Status'] == 0) {
                            ?>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item reschedule_by_admin" id="<?php echo $data['ServiceRequestId']; ?>">Edit & Reschedule</a></li>
                                        <li><a class="dropdown-item cancel_by_admin" id="<?php echo $data['ServiceRequestId']; ?>">Cancel SR by Customer</a></li>
                                        <li><a class="dropdown-item" href="#">Inquiry</a></li>
                                        <li><a class="dropdown-item" href="#">History Log</a></li>
                                        <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        <li><a class="dropdown-item" href="#">Other Transactions</a></li>
                                    </ul>
                                </div>
                            <?php
                            } else if ($data['Status'] == 1 || $data['Status'] == -1) {
                            ?>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="#">Refund</a></li>
                                        <li><a class="dropdown-item" href="#">Inquiry</a></li>
                                        <li><a class="dropdown-item" href="#">History Log</a></li>
                                        <li><a class="dropdown-item" href="#">Download Invoice</a></li>
                                        <li><a class="dropdown-item" href="#">Has Issue</a></li>
                                        <li><a class="dropdown-item" href="#">Other Transactions</a></li>
                                    </ul>
                                </div>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                <?php

                }
                ?>
            </tbody>
        </table>
        <div class="rights-content">
            <span class="rights">©2018 Helperland. All rights reserved.</span>
        </div>
    <?php
    }

    public function user_management_search()
    {
        $username = $_POST['username'];
        $usertype = $_POST['usertype'];
        $mobile = $_POST['phonenumber'];
        $postalcode = $_POST['postalcode'];
        $fromdate = $_POST['fromdate'];
        $todate = $_POST['todate'];

        $array = [
            "Username" => $username,
            "UserTypeId" => $usertype,
            "Mobile" => $mobile,
            "ZipCode" => $postalcode,
            "fromdate" => $fromdate,
            "todate" => $todate
        ];

        $rows = $this->model->user_management_search($array);

        ?>
        <table id="tableusermanagement" class="table display">
            <thead>
                <tr>
                    <th>User Name <img class="sort-img" alt=""></th>
                    <th>Role <img class="sort-img" alt=""></th>
                    <th>Date of Registration <img class="sort-img" alt=""></th>
                    <th>User Type <img class="sort-img" alt=""></th>
                    <th>Phone </th>
                    <th>Postal code <img class="sort-img" alt=""></th>
                    <th>Status <img class="sort-img" alt=""></th>
                    <th>Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $data) {
                    $date = substr($data['CreatedDate'], 0, 10);
                ?>
                    <tr>
                        <td><?php echo $data['FirstName'] . ' ' . $data['LastName']; ?></td>
                        <td></td>
                        <td>
                            <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock"> <?php echo $date; ?> <br>
                        </td>
                        <td>
                            <?php if ($data['UserTypeId'] == 1) {
                                echo 'Service Provider';
                            } else if ($data['UserTypeId'] == 2) {
                                echo 'Customer';
                            } else if ($data['UserTypeId'] == 3) {
                                echo 'Admin';
                            } ?>
                        </td>
                        <td><?php echo $data['Mobile']; ?></td>
                        <td><?php echo $data['ZipCode']; ?></td>
                        <td>
                            <div>
                                <?php
                                if ($data['IsApproved'] == 0) {
                                ?>
                                    <button class="btn-notapprove" disabled>Not Approve</button>
                                <?php
                                } else if ($data['IsApproved'] == 1 && $data['IsActive'] == 0) {
                                ?>
                                    <button class="btn-inactive" disabled>Inactive</button>
                                <?php
                                } else if ($data['IsApproved'] == 1 && $data['IsActive'] == 1) {
                                ?>
                                    <button class="btn-active" disabled>Active</button>
                                <?php
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="http://localhost/Helperland/assets/images/group-38.png" alt="">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <?php
                                    if ($data['IsApproved'] == 0) {
                                    ?>
                                        <li><a class="dropdown-item user-approve" id="<?php echo $data['UserId']; ?>">Approve</a></li>
                                    <?php
                                    } else if ($data['IsApproved'] == 1) {
                                    ?>
                                        <?php
                                        if ($data['IsActive'] == 0) {
                                        ?>
                                            <li><a class="dropdown-item user-active" id="<?php echo $data['UserId']; ?>">Activate</a></li>
                                        <?php
                                        } else if ($data['IsApproved'] == 1) {
                                        ?>
                                            <li><a class="dropdown-item user-deactive" id="<?php echo $data['UserId']; ?>">Deactivate</a></li>
                                        <?php
                                        }
                                        ?>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php

                }
                ?>
            </tbody>
        </table>
        <div class="rights-content">
            <span class="rights">©2018 Helperland. All rights reserved.</span>
        </div>
        <?php
    }
}

?>