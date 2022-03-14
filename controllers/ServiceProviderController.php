<?php

class ServiceProviderController
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

    public function fill_sp_newservicerequest_table()
    {
        $serviceproviderid = $_SESSION['userid'];
        $spzipcode = $this->model->get_sp_or_customer_byid('user', $serviceproviderid);
        $zipcode = $spzipcode['ZipCode'];
        $data = $this->model->fill_sp_newservicerequest_table('servicerequest', $serviceproviderid, $zipcode);

        if ($data != NULL) {

?>
            <table id="tablenewservicerequest" class="table display">
                <thead>
                    <tr>
                        <th>Service Id <img class="sort-img" alt=""></th>
                        <th>Service date <img class="sort-img" alt=""></th>
                        <th>Customer details <img class="sort-img" alt=""></th>
                        <th>Payment <img class="sort-img" alt=""></th>
                        <th>Time conflict</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $newservice) {
                        $customeraddress = $this->model->fill_selected_pending_request_useraddress('servicerequestaddress', $newservice['ServiceRequestId']);
                        $customerdetails = $this->model->get_sp_or_customer_byid('user', $newservice['UserId']);
                        $date = substr($newservice['ServiceStartDate'], 0, 10);
                        $time = substr($newservice['ServiceStartDate'], 11, 5);
                        $totalminutes = $this->HourMinuteToDecimal($time) + (($newservice['ServiceHours'] + $newservice['ExtraHours']) * 60);
                        $totaltime = $this->DecimalToHoursMins($totalminutes);
                    ?>
                        <tr class="tr-newservice" id="<?php echo $newservice['ServiceRequestId']; ?>">
                            <td><?php echo $newservice['ServiceRequestId']; ?> </td>
                            <td>
                                <div>
                                    <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock">&nbsp; <span><b> <?php echo $date; ?> </b></span><br>
                                    <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar">&nbsp; <span> <?php echo $time . " - " . $totaltime; ?> </span>
                                </div>
                            </td>
                            <td>
                                <div class="ps-4">
                                    <?php echo $customerdetails['FirstName'] . " " . $customerdetails['LastName']; ?>
                                </div>
                                <div class="serviceaddress d-flex">
                                    <div><img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home">&nbsp;</div>
                                    <div><?php echo $customeraddress['AddressLine1'] . " " . $customeraddress['AddressLine2'] . ", " ?> <br> <?php echo $customeraddress['City'] . " - " . $customeraddress['PostalCode']; ?></div>
                                </div>
                            </td>
                            <td>
                                <?php echo $newservice['TotalCost'] ?> €
                            </td>
                            <td></td>
                            <td>
                                <button class="btn-accept" id="<?php echo $newservice['ServiceRequestId'] ?>">Accept</button>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="text-center">
                <h4>No history Found</h4>
            </div>
        <?php
        }
    }

    public function fill_selected_pending_request()
    {
        $selectedrequestid = $_POST['selectedrequestid'];

        $row = $this->model->fill_selected_pending_request('servicerequest', $selectedrequestid);
        $extraservice = $this->model->fill_selected_pending_request_extraservice('servicerequestextra', $selectedrequestid);
        $address = $this->model->fill_selected_pending_request_useraddress('servicerequestaddress', $selectedrequestid);

        if ($row != "") {

            $startdate = substr($row['ServiceStartDate'], 0, 10);
            $starttime = substr($row['ServiceStartDate'], 11, 5);
            $duration = $row['ServiceHours'] + $row['ExtraHours'];

        ?>
            <div class="row">
                <div class="col-sm-12">
                    <span class="service-datetime"><?php echo $startdate ?> &nbsp; <?php echo $starttime ?> </span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Duration: </span>
                </div>
                <div class="ps-2 service-detail-text">
                    <span> <?php echo $duration ?> Hrs</span>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Service Id: </span>
                </div>
                <div class="service-detail-text ps-2">
                    <span> <?php echo $row['ServiceRequestId'] ?></span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Extras: </span>
                </div>
                <div class="service-detail-text ps-2">
                    <span>
                        <?php
                        if ($extraservice != "") {
                            foreach ($extraservice as $extra) {
                                if ($extra['ServiceExtraId'] == 1) {
                                    $extraservicename[] = 'Inside cabinets';
                                }
                                if ($extra['ServiceExtraId'] == 2) {
                                    $extraservicename[] = 'Inside fridge';
                                }
                                if ($extra['ServiceExtraId'] == 3) {
                                    $extraservicename[] = 'Inside oven';
                                }
                                if ($extra['ServiceExtraId'] == 4) {
                                    $extraservicename[] = 'Laundry wash & dry';
                                }
                                if ($extra['ServiceExtraId'] == 5) {
                                    $extraservicename[] = 'Interior windows';
                                }
                            }
                            echo implode(', ', $extraservicename);
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Net Amount: </span>
                </div>
                <div class="service-detail-euro ps-2">
                    <span> &euro; <?php echo $row['TotalCost'] ?> </span>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Service Address: </span>
                </div>
                <div class="service-detail-text ps-2">
                    <span>
                        <?php
                        if ($address != "") {
                            echo $address['AddressLine1'] . " " . $address['AddressLine2'] . ", " . $address['City'] . " - " . $address['PostalCode'];
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Billing Address: </span>
                </div>
                <div class="service-detail-text ps-2">
                    <span>
                        <?php
                        if ($address != "") {
                            echo $address['AddressLine1'] . " " . $address['AddressLine2'] . ", " . $address['City'] . " - " . $address['PostalCode'];
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Phone: </span>
                </div>
                <div class="service-detail-text ps-2">
                    <span>
                        <?php
                        if ($address != "") {
                            echo $address['Mobile'];
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Email: </span>
                </div>
                <div class="service-detail-text ps-2">
                    <span>
                        <?php
                        if ($address != "") {
                            echo $address['Email'];
                        }
                        ?>
                    </span>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center">
                <div>
                    <span class="service-detail">Comments: </span>
                </div>
                <div class="service-detail-text ps-2">
                    <span> <?php echo $row['Comments'] ?> </span>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div>
                    <?php
                    if ($row['HasPets'] == 1) {
                    ?>
                        <span><i class="fas fa-check-circle"></i> </span>
                    <?php
                    } else {
                    ?>
                        <span><i class="fas fa-times-circle"></i> </span>
                    <?php
                    }
                    ?>
                </div>
                <div class="service-detail-text ps-2">
                    <span> I don't have pets at home</span>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center">
                <div>
                    <button name="submit" id="<?php echo $row['ServiceRequestId']; ?>" class="btn-reschedule"><i class="fas fa-history"></i>&nbsp; Reschedule</button>
                </div>
                <div class="ps-2">
                    <button name="submit" id="<?php echo $row['ServiceRequestId']; ?>" class="btn-cancel"><i class="fas fa-times"></i>&nbsp; Cancel</button>
                </div>
            </div>
        <?php
        }
    }

    public function acceptrequest()
    {
        $serviceproviderid = $_SESSION['userid'];
        $selectedrequestid = $_POST['selectedrequestid'];
        $row = $this->model->fill_selected_pending_request('servicerequest', $selectedrequestid);

        $date = substr($row['ServiceStartDate'], 0, 10);
        $nextdate = date("Y-m-d H-i-s", strtotime($date . '+1 day'));

        $timecomplete = "+" . ($row['ServiceHours'] + $row['ExtraHours']) . " " . "hours";
        $newserviceenddate = date("Y-m-d H-i-s", strtotime($row['ServiceStartDate'] . $timecomplete));

        $allrequests = $this->model->get_requests_for_that_date('servicerequest', $serviceproviderid, $date, $nextdate);
        $count = true;

        foreach ($allrequests as $request) {
            // for old request

            $oldstartdate = date("Y-m-d H-i-s", strtotime($request['ServiceStartDate'] . '-1 hour'));
            $totaltimeforcompletion = "+" . ($request['ServiceHours'] + $request['ExtraHours'] + 1) . " " . "hours";
            $oldenddate = date("Y-m-d H-i-s", strtotime($request['ServiceStartDate'] . $totaltimeforcompletion));

            if ($oldstartdate >= $row['ServiceStartDate'] && $newserviceenddate <= $oldenddate) {
                global $count;
                $count = false;
                break;
            }
        }
        if ($count == false) {
            echo 'not-avail';
        } else {
            $this->model->acceptrequest('servicerequest', $serviceproviderid, $selectedrequestid);
        }

        // $servicestartdate = date("Y-m-d H-i-s", strtotime($row['ServiceStartDate'] . '-1 hours'));
        // $timecomplete = "+" . ($row['ServiceHours'] + $row['ExtraHours'] + 1) . " " . "hours";
        // $serviceenddate = date("Y-m-d H-i-s", strtotime($row['ServiceStartDate'] . $timecomplete));

        // $spavail = $this->model->check_spavail_for_approverequest('servicerequest', $selectedrequestid, $serviceproviderid, $servicestartdate, $serviceenddate);

        // print_r($spavail);
        // echo $servicestartdate;
        // if($spavail == null)
        // {
        //     $this->model->acceptrequest('servicerequest', $serviceproviderid, $selectedrequestid);
        // }
        // else
        // {
        //     echo 'not-avail';
        // }
    }

    public function fill_sp_upcomingservice_table()
    {
        $serviceproviderid = $_SESSION['userid'];
        $spzipcode = $this->model->get_sp_or_customer_byid('user', $serviceproviderid);
        $zipcode = $spzipcode['ZipCode'];
        $data = $this->model->fill_sp_upcomingservice_table('servicerequest', $serviceproviderid, $zipcode);

        if ($data != NULL) {

        ?>
            <table id="tableupcomingservice" class="table display">
                <thead>
                    <tr>
                        <th>Service Id <img class="sort-img" alt=""></th>
                        <th>Service date <img class="sort-img" alt=""></th>
                        <th>Customer details <img class="sort-img" alt=""></th>
                        <th>Payment <img class="sort-img" alt=""></th>
                        <th>Distance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $upservice) {
                        $customeraddress = $this->model->fill_selected_pending_request_useraddress('servicerequestaddress', $upservice['ServiceRequestId']);
                        $customerdetails = $this->model->get_sp_or_customer_byid('user', $upservice['UserId']);
                        $date = substr($upservice['ServiceStartDate'], 0, 10);
                        $timecomplete = "+" . ($upservice['ServiceHours'] + $upservice['ExtraHours']) . " " . "hours";
                        $previousdate = date('Y-m-d H-i-s', strtotime($upservice['ServiceStartDate'] . '-1 day'));
                        $serviceenddate = date("Y-m-d H-i-s", strtotime($upservice['ServiceStartDate'] . $timecomplete));
                        $time = substr($upservice['ServiceStartDate'], 11, 5);
                        $totalminutes = $this->HourMinuteToDecimal($time) + (($upservice['ServiceHours'] + $upservice['ExtraHours']) * 60);
                        $totaltime = $this->DecimalToHoursMins($totalminutes);
                    ?>
                        <tr class="tr-upservice">
                            <td><?php echo $upservice['ServiceRequestId']; ?> </td>
                            <td>
                                <div>
                                    <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock">&nbsp; <span><b> <?php echo $date . " " . date('Y-m-d H-i-s'); ?> </b></span><br>
                                    <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar">&nbsp; <span> <?php echo $time . " - " . $totaltime; ?> </span>
                                </div>
                            </td>
                            <td>
                                <div class="ps-4">
                                    <?php echo $customerdetails['FirstName'] . " " . $customerdetails['LastName']; ?>
                                </div>
                                <div class="serviceaddress d-flex">
                                    <div><img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home">&nbsp;</div>
                                    <div><?php echo $customeraddress['AddressLine1'] . " " . $customeraddress['AddressLine2'] . ", " ?> <br> <?php echo $customeraddress['City'] . " - " . $customeraddress['PostalCode']; ?></div>
                                </div>
                            </td>
                            <td>
                                <?php echo $upservice['TotalCost'] ?> €
                            </td>
                            <td> <?php echo $upservice['Distance']; ?> </td>
                            <td>
                                <?php
                                if ($serviceenddate < date('Y-m-d H-i-s')) {
                                ?>
                                    <div><button class="btn-complete" id="<?php echo $upservice['ServiceRequestId']; ?>">Complete</button></div>
                                <?php
                                }
                                if ($previousdate > date('Y-m-d H-i-s')) {
                                ?>
                                    <button class="btn-cancel" id="<?php echo $upservice['ServiceRequestId'] ?>">Cancel</button>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="text-center">
                <h4>No history Found</h4>
            </div>
        <?php
        }
    }

    public function cancelrequest()
    {
        $selectedrequestid = $_POST['selectedrequestid'];
        $row = $this->model->fill_selected_pending_request('servicerequest', $selectedrequestid);
        $previousdate = date('Y-m-d H-i-s', strtotime($row['ServiceStartDate'] . '-1 day'));

        if ($previousdate > date('Y-m-d H-i-s')) {
            $this->model->cancel_servicerequest('servicerequest', $selectedrequestid);
        } else {
            echo 'not-cancel';
        }
    }

    public function completerequest()
    {
        $selectedrequestid = $_POST['selectedrequestid'];
        $row = $this->model->fill_selected_pending_request('servicerequest', $selectedrequestid);
        $timecomplete = "+" . ($row['ServiceHours'] + $row['ExtraHours']) . " " . "hours";
        $serviceenddate = date("Y-m-d H-i-s", strtotime($row['ServiceStartDate'] . $timecomplete));

        if ($serviceenddate < date('Y-m-d H-i-s')) {
            $this->model->completerequest('servicerequest', $selectedrequestid);
        }
    }

    public function fill_sp_servicehistory_table()
    {
        $serviceproviderid = $_SESSION['userid'];
        $spzipcode = $this->model->get_sp_or_customer_byid('user', $serviceproviderid);
        $zipcode = $spzipcode['ZipCode'];
        $data = $this->model->fill_sp_servicehistory_table('servicerequest', $serviceproviderid, $zipcode);

        if ($data != NULL) {

        ?>
            <div class="row">
                <div class="col-md-8 payment-filter">
                    <label for="paymentstatus">Payment Status</label>
                    <select name="paymentstatus" id="paymentstatus">
                        <option value="all">All</option>
                        <option value="completed">Cancelled</option>
                        <option value="cancelled">Completed</option>
                    </select>
                </div>
                <div class="col-md-4 export-btn-text"><button class="button-export">Export</button></div>
            </div>
            <table id="tableservicehistory" class="table display">
                <thead>
                    <tr>
                        <th>Service Id <img class="sort-img" alt=""></th>
                        <th>Service Date <img class="sort-img" alt=""></th>
                        <th>Customer Details <img class="sort-img" alt=""></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $servicehistory) {
                        $customeraddress = $this->model->fill_selected_pending_request_useraddress('servicerequestaddress', $servicehistory['ServiceRequestId']);
                        $customerdetails = $this->model->get_sp_or_customer_byid('user', $servicehistory['UserId']);
                        $date = substr($servicehistory['ServiceStartDate'], 0, 10);
                        $timecomplete = "+" . ($servicehistory['ServiceHours'] + $servicehistory['ExtraHours']) . " " . "hours";
                        $previousdate = date('Y-m-d H-i-s', strtotime($servicehistory['ServiceStartDate'] . '-1 day'));
                        $serviceenddate = date("Y-m-d H-i-s", strtotime($servicehistory['ServiceStartDate'] . $timecomplete));
                        $time = substr($servicehistory['ServiceStartDate'], 11, 5);
                        $totalminutes = $this->HourMinuteToDecimal($time) + (($servicehistory['ServiceHours'] + $servicehistory['ExtraHours']) * 60);
                        $totaltime = $this->DecimalToHoursMins($totalminutes);
                    ?>
                        <tr class="tr-upservice">
                            <td><?php echo $servicehistory['ServiceRequestId']; ?> </td>
                            <td>
                                <div>
                                    <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock">&nbsp; <span><b> <?php echo $date . " " . date('Y-m-d H-i-s'); ?> </b></span><br>
                                    <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar">&nbsp; <span> <?php echo $time . " - " . $totaltime; ?> </span>
                                </div>
                            </td>
                            <td>
                                <div class="ps-4">
                                    <?php echo $customerdetails['FirstName'] . " " . $customerdetails['LastName']; ?>
                                </div>
                                <div class="serviceaddress d-flex">
                                    <div><img src="http://localhost/Helperland/assets/images/layer-15.png" alt="home">&nbsp;</div>
                                    <div><?php echo $customeraddress['AddressLine1'] . " " . $customeraddress['AddressLine2'] . ", " ?> <br> <?php echo $customeraddress['City'] . " - " . $customeraddress['PostalCode']; ?></div>
                                </div>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        <?php
        } else {
        ?>
            <div class="text-center">
                <h4>No history Found</h4>
            </div>
        <?php
        }
    }

    public function fill_customer_card()
    {
        $serviceproviderid = $_SESSION['userid'];
        $data = $this->model->fill_customer_card('servicerequest', $serviceproviderid);

        if ($data != null) {
            ?>
            <div class="card-customer">
                <?php
                foreach($data as $request)
                {
                    $customerdetails = $this->model->get_sp_or_customer_byid('user', $request['UserId']);
                ?>
                    <div class="card">
                        <div class="customer-image"><img src="http://localhost/Helperland/assets/images/cap.png" alt=""></div>
                        <div class="customer-name"><b> <?php echo $customerdetails['FirstName']." ".$customerdetails['LastName']; ?> </b></div>
                        <div class="block-unblock-button">
                            <button class="block-button" id="<?php echo $request['UserId']; ?>">Block</button>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <?php
        }
    }

    public function block_customer()
    {
        $serviceproviderid = $_SESSION['userid'];
        $selectedcustomerid = $_POST['selectedcustomerid'];
        $this->model->block_customer('favoriteandblocked', $selectedcustomerid, $serviceproviderid);
    }
}

?>