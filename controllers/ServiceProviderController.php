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

                        $checkblock = $this->model->check_block_unblock('favoriteandblocked', $newservice['UserId'], $serviceproviderid);

                        if ($checkblock == null) {

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
                    <?php
                        }
                    }
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
                        <tr>
                            <td><?php echo $servicehistory['ServiceRequestId']; ?> </td>
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
                foreach ($data as $request) {
                    $customerdetails = $this->model->get_sp_or_customer_byid('user', $request['UserId']);
                ?>
                    <div class="card">
                        <div class="customer-image"><img src="http://localhost/Helperland/assets/images/cap.png" alt=""></div>
                        <div class="customer-name"><b> <?php echo $customerdetails['FirstName'] . " " . $customerdetails['LastName']; ?> </b></div>
                        <div class="block-unblock-button">
                            <?php
                            $checkblockunblock = $this->model->check_block_unblock('favoriteandblocked', $request['UserId'], $serviceproviderid);
                            if ($checkblockunblock == null) {
                            ?>
                                <button class="block-button" id="<?php echo $request['UserId']; ?>">Block</button>
                            <?php
                            } else {
                            ?>
                                <button class="unblock-button" id="<?php echo $request['UserId']; ?>">Unblock</button>
                            <?php
                            }
                            ?>
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

    public function unblock_customer()
    {
        $serviceproviderid = $_SESSION['userid'];
        $selectedcustomerid = $_POST['selectedcustomerid'];
        $this->model->unblock_customer('favoriteandblocked', $selectedcustomerid, $serviceproviderid);
    }

    public function fill_sp_rating_table()
    {
        $serviceproviderid = $_SESSION['userid'];
        $data = $this->model->fill_sp_rating_table('rating', $serviceproviderid);

        if ($data != null) {
        ?>
            <table id="tablerating" class="table display">
                <thead class="d-none">
                    <th>details</th>
                </thead>
                <tbody>
                    <?php
                    foreach ($data as $sprate) {
                        $customerdetails = $this->model->get_sp_or_customer_byid('user', $sprate['RatingFrom']);
                        $servicerequest = $this->model->fill_selected_pending_request('servicerequest', $sprate['ServiceRequestId']);
                        $date = substr($servicerequest['ServiceStartDate'], 0, 10);
                        $time = substr($servicerequest['ServiceStartDate'], 11, 5);
                        $totalminutes = $this->HourMinuteToDecimal($time) + (($servicerequest['ServiceHours'] + $servicerequest['ExtraHours']) * 60);
                        $totaltime = $this->DecimalToHoursMins($totalminutes);
                    ?>
                        <tr class="mt-20 pt-20">
                            <td>
                                <div class="rate-detail">
                                    <div class="rate-content">
                                        <div><?php echo $sprate['ServiceRequestId']; ?></div>
                                        <div><b><?php echo $customerdetails['FirstName'] . " " . $customerdetails['LastName']; ?></b></div>
                                    </div>
                                    <div class="rate-content">
                                        <div>
                                            <img src="http://localhost/Helperland/assets/images/layer-712.png" alt="clock">&nbsp; <span><b> <?php echo $date; ?> </b></span><br>
                                            <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar">&nbsp; <span> <?php echo $time . " - " . $totaltime; ?> </span>
                                        </div>
                                    </div>
                                    <div class="rate-content">
                                        <div><b>ratings</b></div>
                                        <div class="rate-detail">
                                            <div class="rateyo pe-0 ps-0" id="rating" data-rateyo-rating="<?php echo $sprate['Ratings']; ?>"></div>
                                            <div>
                                                <?php
                                                if(0 < $sprate['Ratings'] && $sprate['Ratings'] <= 1)
                                                {
                                                    echo 'bad';
                                                }
                                                else if(1 < $sprate['Ratings'] && $sprate['Ratings'] <= 2)
                                                {
                                                    echo 'not bad';
                                                }
                                                else if(2 < $sprate['Ratings'] && $sprate['Ratings'] <= 3)
                                                {
                                                    echo 'good';
                                                }
                                                else if(3 < $sprate['Ratings'] && $sprate['Ratings'] <= 4)
                                                {
                                                    echo 'very good';
                                                }
                                                else if(4 < $sprate['Ratings'] && $sprate['Ratings'] <= 5)
                                                {
                                                    echo 'excellent';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    <div><b>Customer Comment</b></div>
                                    <div><?php echo $sprate['Comments']; ?></div>
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

    public function fill_sp_details()
    {
        $userid = $_SESSION['userid'];
        $list = $this->model->fill_details_user("user", $userid);
        $data = $this->model->fill_sp_address('useraddress', $userid);

        if ($list != "") {
        ?>
            <div class="sp-details-body">
                <div class="d-flex align-items-center pb-2">
                    <div><b>Account Status:</b></div>
                    <div class="ps-2 <?php if($list['IsActive'] == 1) { echo 'active'; } else { echo ' notactive'; } ?>"><?php if($list['IsActive'] == 1) { echo 'Active'; } else { echo 'Not Active'; } ?></div>
                </div>
                <div class="row">
                    <div class="sp-basic col-md-12">
                        <b>Basic details</b>
                        <hr class="sp-breakline">
                        <div class="sp-avatar">
                            <img src="<?php if($list['UserProfilePicture'] != null) { echo $list['UserProfilePicture']; } ?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="error-line row">
                    <div class="col-md-12">
                        <label class="label text-danger sp-error-message"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label" for="spfname">First name</label><br>
                        <input type="text" class="input" name="spfname" placeholder="First name" required value="<?php echo $list['FirstName'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="label" for="splname">Last name</label><br>
                        <input type="text" class="input" name="splname" placeholder="Last name" required value="<?php echo $list['LastName'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="label" for="spemail">E-mail address</label><br>
                        <input type="email" class="input" name="spemail" disabled placeholder="E-mail address" required value="<?php echo $list['Email'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label" for="spmobile">Mobile number</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">+49</span>
                            <input type="text" name="spmobile" placeholder="Mobile number" value="<?php echo $list['Mobile'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="label" for="spdob">Date of Birth</label><br>
                        <input type="date" class="input" name="spdob" required value="<?php echo $list['DateOfBirth'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="label" for="spnationality">Nationality</label><br>
                        <select name="spnationality" id="spnationality">
                            <option disabled selected value> -- select an option -- </option>
                            <option value="1" <?php echo ($list['NationalityId']==1)?'selected="selected"':'' ?>>German</option>
                            <option value="2" <?php echo ($list['NationalityId']==2)?'selected="selected"':'' ?>>Italian</option>
                            <option value="3" <?php echo ($list['NationalityId']==3)?'selected="selected"':'' ?>>British</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label" for="splanguage">Language</label><br>
                        <select name="splanguage" id="splanguage" required>
                            <option disabled selected value> -- select an option -- </option>
                            <option value="1" <?php echo ($list['LanguageId']==1)?'selected="selected"':'' ?>>German</option>
                            <option value="2" <?php echo ($list['LanguageId']==2)?'selected="selected"':'' ?>>English</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label class="label" for="spgender">Gender</label><br>
                    <div class="gender col-md-6">
                        <div>
                            <input type="radio" id="male" name="spgender" value="1" <?php echo ($list['Gender']==1)?'checked':'' ?>>
                            <label for="male">Male</label>
                        </div>
                        <div>
                            <input type="radio" id="female" name="spgender" value="2" <?php echo ($list['Gender']==2)?'checked':'' ?>>
                            <label for="female">Female</label>
                        </div>
                        <div>
                            <input type="radio" id="notsay" name="spgender" value="0" <?php echo ($list['Gender']==null)?'checked':'' ?>>
                            <label for="notsay">Rather not to say</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="label" for="avatar">Select Avatar</label><br>
                        <div class="choose-avatar">
                            <div class="avatar-image">
                                <img id="avatar1" <?php if($list['UserProfilePicture'] == "http://localhost/Helperland/assets/images/avatar-car.png") { echo 'class="active"'; } ?> src="http://localhost/Helperland/assets/images/avatar-car.png" alt="">
                            </div>
                            <div class="avatar-image">
                                <img id="avatar2" <?php if($list['UserProfilePicture'] == "http://localhost/Helperland/assets/images/avatar-female.png") { echo 'class="active"'; } ?> src="http://localhost/Helperland/assets/images/avatar-female.png" alt="">
                            </div>
                            <div class="avatar-image">
                                <img id="avatar3" <?php if($list['UserProfilePicture'] == "http://localhost/Helperland/assets/images/avatar-hat.png") { echo 'class="active"'; } ?> src="http://localhost/Helperland/assets/images/avatar-hat.png" alt="">
                            </div>
                            <div class="avatar-image">
                                <img id="avatar4" <?php if($list['UserProfilePicture'] == "http://localhost/Helperland/assets/images/avatar-iron.png") { echo 'class="active"'; } ?> src="http://localhost/Helperland/assets/images/avatar-iron.png" alt="">
                            </div>
                            <div class="avatar-image">
                                <img id="avatar5" <?php if($list['UserProfilePicture'] == "http://localhost/Helperland/assets/images/avatar-male.png") { echo 'class="active"'; } ?> src="http://localhost/Helperland/assets/images/avatar-male.png" alt="">
                            </div>
                            <div class="avatar-image">
                                <img id="avatar6" <?php if($list['UserProfilePicture'] == "http://localhost/Helperland/assets/images/avatar-ship.png") { echo 'class="active"'; } ?> src="http://localhost/Helperland/assets/images/avatar-ship.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <b>My address</b>
                        <hr class="sp-breakline">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label" for="spstreetname">Street name</label><br>
                        <input type="text" class="input" name="spstreetname" placeholder="street name" required value="<?php if($data == null) { echo ''; } else { echo $data['AddressLine1']; } ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="label" for="sphousenumber">House number</label><br>
                        <input type="text" class="input" name="sphousenumber" placeholder="house number" required value="<?php if($data == null) { echo ''; } else { echo $data['AddressLine2']; } ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="label" for="sppostalcode">Postal code</label><br>
                        <input type="email" class="input" name="sppostalcode" placeholder="postalcode" required value="<?php if($data == null) { echo ''; } else { echo $data['PostalCode']; } ?>" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label class="label" for="spcity">City</label><br>
                        <input type="text" class="input" name="spcity" placeholder="city" required value="<?php if($data == null) { echo ''; } else { echo $data['City']; } ?>">
                    </div>
                </div>
                <div>
                    <button type="submit" id="<?php if($data == null) { echo ''; } else { echo $data['AddressId']; } ?>" class="sp-details-save">Save</button>
                </div>
            </div>
            <?php
        }
    }

    public function save_sp_details()
    {
        $userid = $_SESSION['userid'];
        $spfname = $_POST['spfname'];
        $splname = $_POST['splname'];
        $spmobile = $_POST['spmobile'];
        $spemail = $_POST['spemail'];
        $spdob = $_POST['spdob'];
        $spnationality = $_POST['spnationality'];
        $splanguage = $_POST['splanguage'];
        $spgender = $_POST['spgender'];
        $spstreetname = $_POST['spstreetname'];
        $sphousenumber = $_POST['sphousenumber'];
        $sppostalcode = $_POST['sppostalcode'];
        $spcity = $_POST['spcity'];

        if($_POST['selectedavatar'][0] == 1)
        {
            $selectedavatar = "http://localhost/Helperland/assets/images/avatar-car.png";
        }
        else if($_POST['selectedavatar'][0] == 2)
        {
            $selectedavatar = "http://localhost/Helperland/assets/images/avatar-female.png";
        }
        else if($_POST['selectedavatar'][0] == 3)
        {
            $selectedavatar = "http://localhost/Helperland/assets/images/avatar-hat.png";
        }
        else if($_POST['selectedavatar'][0] == 4)
        {
            $selectedavatar = "http://localhost/Helperland/assets/images/avatar-iron.png";
        }
        else if($_POST['selectedavatar'][0] == 5)
        {
            $selectedavatar = "http://localhost/Helperland/assets/images/avatar-male.png";
        }
        else if($_POST['selectedavatar'][0] == 6)
        {
            $selectedavatar = "http://localhost/Helperland/assets/images/avatar-ship.png";
        }

        $array = [
            'spfname' => $spfname,
            'splname' => $splname,
            'spmobile' => $spmobile,
            'spdob' => $spdob,
            'spnationality' => $spnationality,
            'splanguage' => $splanguage,
            'spgender' => $spgender,
            'selectedavatar' => $selectedavatar,
        ];
        $this->model->update_sp_details('user', $userid, $array);

        if(isset($_POST['selectedaddressid']))
        {
            $edit = 1;
            $array2 = [
                'AddressId' => $_POST['selectedaddressid'],
                'AddressLine1' => $spstreetname,
                'AddressLine2' => $sphousenumber,
                'PostalCode' => $sppostalcode,
                'City' => $spcity,
            ];
        }
        else
        {
            $edit = 0;
            $array2 = [
                'UserId' => $userid,
                'AddressLine1' => $spstreetname,
                'AddressLine2' => $sphousenumber,
                'PostalCode' => $sppostalcode,
                'City' => $spcity,
                'Mobile' => $spmobile,
                'Email' => $spemail,
            ];
        }
        $this->model->insert_update_spaddress('useraddress', $array2, $edit);
    }

    public function sp_update_password()
    {
        $email = $_SESSION['email'];
        $oldpassword = $_POST['spoldpassword'];
        $newpassword = $_POST['spnewpassword'];
        $confirmpassword = $_POST['spconfirmpassword'];

        $count = $this->model->check_password('user', $email, $oldpassword);

        if ($count == 1) {
            if ($newpassword == $confirmpassword) {
                $this->model->update_password('user', $email, $newpassword);
            } else {
                echo '0';
            }
        } else {
            echo '1';
        }
    }
}

?>