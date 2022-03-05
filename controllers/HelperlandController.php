<?php
class HelperlandController
{
    public function __construct()
    {
        include('models/HelperlandModel.php');
        $this->model = new HelperlandModel();
        session_start();
    }

    public function Helperland()
    {
        $data = ['title' => 'Home'];
        include("./views/Home.php");
    }

    public function insert_contactus()
    {
        if (isset($_POST)) {
            $base_url = "http://localhost/Helperland/Contact.php";
            $FirstName = $_POST['FirstName'];
            $LastName = $_POST['LastName'];
            $Email = $_POST['Email'];
            $Subject = $_POST['Subject'];
            $PhoneNumber = $_POST['PhoneNumber'];
            $Message = $_POST['Message'];
            $array = [
                'Name' => $FirstName . " " . $LastName,
                'Email' => $Email,
                'Subject' => $Subject,
                'PhoneNumber' => $PhoneNumber,
                'Message' => $Message,
                'CreatedOn' => date('Y-m-d H:i:s'),
            ];
            $this->model->insert_contactus('contactus', $array);
            header('Location: ' . $base_url);
        } else {
            echo 'Error Occurring in Data Insertion.';
        }
    }

    public function insert_customer()
    {
        if (isset($_POST['submit'])) {
            if (($_POST['fname'] == "") || ($_POST['lname'] == "") || ($_POST['mobile'] == "") || ($_POST['email'] == "") || ($_POST['password'] == "") || ($_POST['confirm-password'] == "")) {
                echo 'error';
            } else {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $usertypeid = 2;
                $count = $this->model->check_email_existance('user', $email);
                if ($count == 0) {
                    if ($_POST['password'] == $_POST['confirm-password']) {
                        $password = $_POST['password'];
                        $array = [
                            'fname' => $fname,
                            'lname'  => $lname,
                            'email' => $email,
                            'mobile' => $mobile,
                            'password' => $password,
                            'usertypeid' => $usertypeid,
                        ];
                        $this->model->insert_user('user', $array);
                        echo    '<script>
                                alert("your account created successfully.");
                                location. href="http://localhost/Helperland/#login_modal";
                            </script>';
                    } else {
                        echo    '<script>
                                alert("password is not match.");
                                location. href="http://localhost/Helperland/CreateNewAccount";
                            </script>';
                    }
                } else {
                    echo    '<script>
                                alert("email is already in use.");
                                location. href="http://localhost/Helperland/CreateNewAccount";
                            </script>';
                }
            }
        }
    }

    public function insert_serviceprovider()
    {
        if (isset($_POST['submit'])) {
            if (($_POST['fname'] == "") || ($_POST['lname'] == "") || ($_POST['mobile'] == "") || ($_POST['email'] == "") || ($_POST['password'] == "") || ($_POST['confirm-password'] == "")) {
                echo 'error';
            } else {
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $usertypeid = 1;
                $count = $this->model->check_email_existance('user', $email);
                if ($count == 0) {
                    if ($_POST['password'] == $_POST['confirm-password']) {
                        $password = $_POST['password'];
                        $array = [
                            'fname' => $fname,
                            'lname'  => $lname,
                            'email' => $email,
                            'mobile' => $mobile,
                            'password' => $password,
                            'usertypeid' => $usertypeid,
                        ];
                        $this->model->insert_user('user', $array);
                        echo    '<script>
                                alert("your account created successfully.");
                                location. href="http://localhost/Helperland/#login_modal";
                            </script>';
                    } else {
                        echo 'password not match.';
                    }
                } else {
                    echo 'Error Occurring in Data Insertion.';
                }
            }
        }
    }

    public function login_user()
    {
        if (isset($_POST['submit'])) {
            if (($_POST['email'] == "") || ($_POST['password'] == "")) {
                echo 'error';
            } else {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $count = $this->model->check_email_existance('user', $email);

                if ($count == 0) {
                    echo    '<script>
                                alert("Email not found.");
                                location. href="http://localhost/Helperland/#login_modal";
                            </script>';
                } else {
                    $serviceprovider = "http://localhost/Helperland/UpcomingService.php";
                    $customer = "http://localhost/Helperland/ServiceHistory.php";
                    $usertypeid = $this->model->check_usertype('user', $email);
                    $row = $this->model->login_user('user', $email, $password);

                    if ($row != "") {
                        $_SESSION['userid'] = $row['UserId'];
                        $_SESSION['usertypeid'] = $row['UserTypeId'];
                        $_SESSION['username'] = $row['FirstName'];
                        $_SESSION['email'] = $row['Email'];

                        if ($usertypeid == 1) {
                            header('Location:' . $serviceprovider);
                        } else if ($usertypeid == 2) {
                            header('Location:' . $customer);
                        } else {
                            echo "Admin is here.";
                        }
                    } else {
                        echo    '<script>
                                alert("password is incorrect.");
                                location. href="http://localhost/Helperland/#login_modal";
                            </script>';
                    }
                }
            }
        }
    }

    public function forgot_password()
    {
        if (isset($_POST['submit'])) {
            if ($_POST['email'] == "") {
                echo 'enter email.';
            } else {
                $email = $_POST['email'];
                $count = $this->model->check_email_existance('user', $email);

                if ($count == 1) {
                    $to_email = $email;
                    $subject = "Reset Password";
                    $body = "Hi, User!!! </br> This is your reset password link. http://localhost/Helperland/ResetPassword.php";
                    $headers = "From: kp916777@gmail.com";
                    $_SESSION['email'] = $_POST['email'];

                    if (mail($to_email, $subject, $body, $headers)) {
                        echo    '<script>
                                alert("reser password link successfully sent to your email.");
                                location. href="http://localhost/Helperland/";
                            </script>';
                    } else {
                        echo "Msg Not Sent";
                    }
                } else {
                    echo    '<script>
                                alert("Email not found.");
                                location. href="http://localhost/Helperland/#forgotpassword_modal";
                            </script>';
                }
            }
        }
    }

    public function reset_password()
    {
        if (isset($_POST['submit'])) {
            if (($_POST['password'] == "") || ($_POST['confirm-password'] == "")) {
                echo 'fill the details';
            } else {
                $base_url = "http://localhost/Helperland/";
                $email = $_SESSION['email'];

                if ($_POST['password'] == $_POST['confirm-password']) {
                    $password = $_POST['password'];
                    $this->model->reset_password('user', $email, $password);
                    header('location:' . $base_url);
                } else {
                    echo 'password not match.';
                }
            }
        }
    }

    public function gotobookservicepage()
    {
        if (isset($_SESSION['usertypeid'])) {
            if ($_SESSION['usertypeid'] == 2) {
                $base_url = "http://localhost/Helperland/bookservice";
                header('Location:' . $base_url);
            } else {
                $_SESSION['login_alert'] = "0";
                $base_url = "http://localhost/Helperland/";
                header('Location:' . $base_url);
            }
        } else {
            $_SESSION['login_alert'] = "1";
            $base_url = "http://localhost/Helperland/";
            header('Location:' . $base_url);
        }
    }

    public function logout()
    {
        $base_url = "http://localhost/Helperland/";
        session_destroy();
        header('Location:' . $base_url);
    }

    public function check_sp_availability()
    {
        $postalcode = $_POST['zipcode'];
        $count = $this->model->check_sp_availability('user', $postalcode);

        if ($count != 0) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function fill_radio_button_address()
    {
        $postalcode = $_POST['zipcode'];
        $userid = $_SESSION['userid'];
        $list = $this->model->fill_radio_button_address('useraddress', $postalcode, $userid);
        foreach ($list as $address) {
?>
            <label class="area-label">
                <input type="radio" class="area-radio" id="<?php echo $address['AddressId'] ?>" name="address" value="<?php echo $address['AddressId'] ?>">
                <span><b>Address:</b></span><?php echo " " . $address['AddressLine1'] . "  " . $address['AddressLine2'] . ", " . $address['City'] . "  " . $address['State'] . " - " . $address['PostalCode'] . " ";  ?><br>
                <span><b>Telephone number:</b></span><?php echo " " . $address['Mobile'] . " "; ?>
            </label>
        <?php
        }
    }

    public function insert_address()
    {
        // this is for update selected address
        $selectedaddid = $_POST['selectedaddid'];

        $streetname = $_POST['streetname'];
        $housenumber = $_POST['housenumber'];
        $postalcode = $_POST['postalcode'];
        $city = $_POST['city'];
        $phonenumber = $_POST['phonenumber'];

        if ($selectedaddid == "") {
            $array = [
                'userid' => $_SESSION['userid'],
                'streetname' => $streetname,
                'housenumber' => $housenumber,
                'postalcode' => $postalcode,
                'city' => $city,
                'phonenumber' => $phonenumber,
            ];
            $this->model->insert_address('useraddress', $array);
        } else {
            $array2 = [
                'selectedaddid' => $selectedaddid,
                'userid' => $_SESSION['userid'],
                'streetname' => $streetname,
                'housenumber' => $housenumber,
                'postalcode' => $postalcode,
                'city' => $city,
                'phonenumber' => $phonenumber,
            ];
            $this->model->update_selected_address('useraddress', $selectedaddid, $array2);
        }
    }

    public function add_service_request()
    {
        $postalcode = $_POST['postalcode'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $servicehours = $_POST['servicehours'];
        $extrahours = $_POST['extrahours'];
        $haspet = $_POST['haspet'];
        $selectextraserviceid = $_POST['selectextraserviceid'];
        $servicehourlyrate = $_POST['servicehourlyrate'];
        $subtotal = $_POST['subtotal'];
        $totalpayment = $_POST['totalpay'];
        $comment = $_POST['comment'];

        $array = [
            'userid' => $_SESSION['userid'],
            'postalcode' => $postalcode,
            'servicedatetime' => $date . " " . $time,
            'servicehours' => $servicehours,
            'extrahours' => $extrahours,
            'haspet' => $haspet,
            'servicehourlyrate' => $servicehourlyrate,
            'subtotal' => $subtotal,
            'totalpayment' => $totalpayment,
            'comment' => $comment,
        ];
        $requestid = $this->model->add_service_request('servicerequest', $array);
        $selectedaddressid = $_POST['selectedaddressid'];
        $bookrequestid_selectedaddressid_array = [
            'requestid' => $requestid,
            'selectedaddressid' => $selectedaddressid,
        ];

        $this->model->add_booking_service_address('servicerequestaddress', $bookrequestid_selectedaddressid_array);
        if ($selectextraserviceid != null) {
            for ($i = 0; $i < sizeof($selectextraserviceid); $i++) {
                $array2 = [
                    'selectextraserviceid' => $selectextraserviceid[$i],
                ];
                $this->model->add_extraservice('servicerequestextra', $requestid, $array2);
            }
        }

        $row = $this->model->send_service_request_mail_to_sp('user', $postalcode);

        if ($row != null) {
            foreach ($row as $emaildata) {
                $to_email = $emaildata['Email'];
                $subject = "New service request";
                $body = "Hi, Service Provider!!! One service request is available in your area. Kindly check by login. http://localhost/Helperland/Home.php";
                $headers = "From: kp916777@gmail.com";
                mail($to_email, $subject, $body, $headers);
            }
        }
    }

    public function fill_dashboard()
    {
        $userid = $_SESSION['userid'];
        $row = $this->model->fill_dashboard('servicerequest', $userid);

        function HourMinuteToDecimal($time)
        {
            $starttime = explode(':', $time);
            return $starttime[0] * 60 + $starttime[1];
        }
        function DecimalToHoursMins($totalminutes)
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
        if ($row != "") {
        ?>
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
                <tbody>
        <?php
                    foreach ($row as $dashboard) {
                        $serviceprovider = $this->model->get_sp_byid('user', $dashboard['ServiceProviderId']);
                        $date = substr($dashboard['ServiceStartDate'], 0, 10);
                        $time = substr($dashboard['ServiceStartDate'], 11, 5);
                        $totalminutes = HourMinuteToDecimal($time) + (($dashboard['ServiceHours'] + $dashboard['ExtraHours']) * 60);
                        $totaltime = DecimalToHoursMins($totalminutes);
                        
                        ?>
                        <tr id="<?php echo $dashboard['ServiceRequestId']; ?>" data-bs-toggle="modal" data-bs-target="#request_detail_modal">
                            <td>
                                <span><?php echo $dashboard['ServiceRequestId']; ?></span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="http://localhost/Helperland/assets/images/calendar2.png" alt="calendar"> &nbsp; <span><b><?php echo $date; ?></b></span> <br>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="http://localhost/Helperland/assets/images/layer-14.png" alt="clock"> &nbsp; <span><?php echo $time . "-" . $totaltime ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center justify-content-left">
                                    <?php
                                    if (isset($serviceprovider['FirstName'])) {
                                    ?>
                                        <div>
                                            <img class="round-border" src="http://localhost/Helperland/assets/images/cap.png" alt="cap">
                                        </div>
                                        <div class="ps-2">
                                            <?php
                                            if (isset($serviceprovider['FirstName'])) {
                                                echo $serviceprovider['FirstName'];
                                            }
                                            ?>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </td>
                            <td>
                                <div class="txt-color">
                                    €<b><?php echo $dashboard['TotalCost']; ?></b>
                                </div>
                            </td>
                            <td>
                                <button id="<?php echo $dashboard['ServiceRequestId']; ?>" class="btn-reschedule" data-bs-toggle="modal" data-bs-target="#reschedule_modal">reschedule</button>
                                <button id="<?php echo $dashboard['ServiceRequestId']; ?>" class="btn-cancel" data-bs-toggle="modal" data-bs-target="#cancel_bookingrequest_modal">Cancel</button>
                            </td>
                        </tr>
                        <?php
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

    public function service_history()
    {
        $userid = $_SESSION['userid'];
        $row = $this->model->service_history($userid);
        function HourMinuteToDecimal($time) {
            $t = explode(':', $hour_minute);
            return $t[0] * 60 + $t[1];
        }
        function DecimalToHoursMins($mins)
        {
            $h=(int)($mins/60);
            $m=round($mins%60);
            if($h<10){$h="0".$h;}
            if($m<10){$m="0".$m;}
            return $h.":".$m;
        }
        if($row != NULL)
        {
            
            foreach($row as $history)
           {
            $SP = $this->model->getUserbyId($history['ServiceProviderId']);
            $dt=substr($history['ServiceStartDate'],0,10);
            $tm=substr($history['ServiceStartDate'],11,5);
            $totalmins=HourMinuteToDecimal($tm)+ (($history['ServiceHours']+$history['ExtraHours'])*60);
            $totime=DecimalToHoursMins($totalmins);
            $rates=$this->model->rateByreqId($history['ServiceRequestId']);
            if($rates == NULL)
            {
                $rates['Ratings']=0;
            }    
             ?>
            <tr class="t-row" >
                <td><p><?php echo $history['ServiceRequestId']; ?></p></td>
                <td>
                    <p class="date"><img src="./assets/Image/calendar.png"> <?php echo $dt; ?></p>
                    <p><?php echo $tm."-".$totime ?></p>
                </td>
                <td> 
                    <div class="a flex-wrap row"> 
                        <?php
                        if(isset($SP['FirstName']))
                        {
                        ?>
                            <div class=""><img src="./assets/Image/forma-1-copy-19.png"></div>
                            <div>
                                <p class="lum-watson"><?php if(isset($SP['FirstName'])){echo $SP['FirstName'];} ?> </p>
                                <div class="row">
                                    <div class="rateyo" id= "rating"  data-rateyo-rating=" <?php echo $rates['Ratings']; ?>"></div>
                                    <div><?php echo $rates['Ratings']; ?></div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </td>
                <td>
                    <p class="euro d-flex justify-content-center">&euro; <?php echo $history['TotalCost']; ?></p>
                </td>
                <td><?php 
                if(isset($history['Status']))
                {
                    if($history['Status']==2)
                    {?>
                        <div class="status-completed text-center" >Completed</div> <?php
                    }
                    else
                    {?>
                        <div class="status-cancelled text-center" >Cancelled</div>
                    <?php

                    }
                }
                ?>
                </td>
                <td><button type="button" id="<?php echo $history['ServiceRequestId']; ?>"  class="btn rate-sp" data-toggle="modal" data-target="#ratesp_modal" <?php if($history['Status']==3){ echo "disabled";} ?> >Rate SP</button></td>
            </tr>
            
            <?php
             
           }
        }
        else
        { ?>
          <div class="text-center"><h4>No history Found</h4></div>
        <?php
        }
        
    }

    public function fill_details_user()
    {
        $userid = $_SESSION['userid'];
        $list = $this->model->fill_details_user("user", $userid);

        if ($list != "") {
        ?>
            <div class="details-body user_details">
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-danger error-message"></label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="fname">First name</label><br>
                        <input type="text" class="input" name="fname" placeholder="First name" required value="<?php echo $list['FirstName'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="lname">Last name</label><br>
                        <input type="text" class="input" name="lname" placeholder="Last name" required value="<?php echo $list['LastName'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="email">E-mail address</label><br>
                        <input type="email" class="input" name="email" disabled placeholder="E-mail address" required value="<?php echo $list['Email'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="mobile">Mobile number</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">+49</span>
                            <input type="text" name="mobile" placeholder="Mobile number" value="<?php echo $list['Mobile'] ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="birthdate">Date of Birth</label><br>
                        <input type="date" class="input" name="dob" required value="<?php echo $list['DateOfBirth'] ?>">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <label for="language">E-mail address</label><br>
                        <select name="language" id="language" required>
                            <option value="Gujarati">English</option>
                            <option value="Maths">Hindi</option>
                            <option value="Science">Gujarati</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="details-save">Save</button>
                </div>
            </div>
            <?php
        }
    }

    public function update_user_details()
    {
        $userid = $_SESSION['userid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];
        $dob = $_POST['dob'];

        $array = [
            'fname' => $fname,
            'lname' => $lname,
            'mobile' => $mobile,
            'dob' => $dob,
        ];
        $this->model->update_user_details('user', $userid, $array);
    }

    public function fill_addresses_user()
    {
        $userid = $_SESSION['userid'];
        $list = $this->model->fill_addresses_user("useraddress", $userid);

        if ($list != "") {
            foreach ($list as $address) {
            ?>
                <tr>
                    <td>
                        <div class="addressline">
                            <div><b>Address:</b></div>&nbsp;
                            <div><?php echo " " . $address['AddressLine1'] . "  " . $address['AddressLine2'] . ", " . $address['City'] . "  " . $address['State'] . " - " . $address['PostalCode'] . " ";  ?></div>
                        </div>
                        <div class="addressline">
                            <div><b>Phone Number:</b></div>&nbsp;
                            <div><?php echo " " . $address['Mobile'] ?></div>
                        </div>
                    </td>
                    <td class="text-right">
                        <div>
                            <i class="address-edit fas fa-edit" id="<?php echo $address['AddressId'] ?>"></i>&nbsp;
                            <i class="address-delete fas fa-trash-alt" id="<?php echo $address['AddressId'] ?>"></i>
                        </div>
                    </td>
                </tr>
            <?php
            }
        }
    }

    public function fill_selected_useraddress()
    {
        $selectedaddid = $_POST['selectedaddid'];
        $list = $this->model->fill_selected_useraddress("useraddress", $selectedaddid);

        if ($list != "") {
            ?>
            <div class="row">
                <div class="col-md-6">
                    <label class="text-danger error-message"></label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="addresslable" for="streetname">Street name</label><br>
                    <input class="input" type="text" name="streetname" placeholder="Street name" value="<?php echo $list['AddressLine1'] ?>">
                </div>
                <div class="col-md-6">
                    <label class="addresslable" for="housenumber">House number</label><br>
                    <input class="input" type="text" name="housenumber" placeholder="House number" value="<?php echo $list['AddressLine2'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="addresslable" for="postalcode">Postal code</label><br>
                    <input class="input" type="text" name="postal_code" placeholder="360005" value="<?php echo $list['PostalCode'] ?>">
                </div>
                <div class="col-md-6">
                    <label class="addresslable" for="city">City</label><br>
                    <input class="input" type="text" name="city" placeholder="Bonn" value="<?php echo $list['City'] ?>">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="addresslable" for="phonenumber">Phone number</label><br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">+49</span>
                        <input class="input" type="text" name="phonenumber" placeholder="9745643546" value="<?php echo $list['Mobile'] ?>">
                    </div>
                </div>
            </div>
            <div>
                <button name="submit" class="btn-addresssave">save</button>
            </div>
<?php
        }
    }

    public function delete_selected_useraddress()
    {
        $selectedaddid = $_POST['selectedaddid'];
        $this->model->delete_selected_useraddress('useraddress', $selectedaddid);
    }

    public function update_password()
    {
        $email = $_SESSION['email'];
        $oldpassword = $_POST['oldpassword'];
        $newpassword = $_POST['newpassword'];
        $confirmpassword = $_POST['confirmpassword'];

        $count = $this->model->check_password('user', $email, $oldpassword);

        echo $email . " " . $oldpassword . " " . $newpassword . " " . $confirmpassword . " " . $count;

        if ($count == 1) {
            if ($newpassword == $confirmpassword) {
                $this->model->update_password('user', $email, $newpassword);
            } else {
                echo    '<script>
                                alert("password is not same.");
                            </script>';
            }
        } else {
            echo    '<script>
                                alert("old password is incorrect.");
                            </script>';
        }
    }
}
