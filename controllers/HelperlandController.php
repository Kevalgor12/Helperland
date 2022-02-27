<?php
class HelperlandController{
    public function __construct(){
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
        if(isset($_POST)){
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
        }
        else{
            echo 'Error Occurring in Data Insertion.';
        }
    }

    public function insert_customer()
    {
        if(isset($_POST['submit']))
        {
            if(($_POST['fname'] == "") || ($_POST['lname'] == "") || ($_POST['mobile'] == "") || ($_POST['email'] == "") || ($_POST['password'] == "") || ($_POST['confirm-password'] == ""))
            { 
                echo 'error';
            }
            else
            {
                $base_url = "http://localhost/Helperland/CreateNewAccount.php";
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $usertypeid = 2;
                $count = $this->model->check_email_existance('user', $email);
                if($count == 0)
                {
                    if($_POST['password'] == $_POST['confirm-password'])
                    {
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
                        header('Location:' . $base_url);
                    }
                    else
                    {
                        echo 'password not match.';
                    }
                }
                else{
                    echo 'Error Occurring in Data Insertion.';
                }
            }   
        }
    }

    public function insert_serviceprovider()
    {
        if(isset($_POST['submit']))
        {
            if(($_POST['fname'] == "") || ($_POST['lname'] == "") || ($_POST['mobile'] == "") || ($_POST['email'] == "") || ($_POST['password'] == "") || ($_POST['confirm-password'] == ""))
            { 
                echo 'error';
            }
            else
            {
                $base_url = "http://localhost/Helperland/ServiceProvider.php";
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $mobile = $_POST['mobile'];
                $email = $_POST['email'];
                $usertypeid = 1;
                $count = $this->model->check_email_existance('user', $email);
                if($count == 0)
                {
                    if($_POST['password'] == $_POST['confirm-password'])
                    {
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
                        header('Location:' . $base_url);
                    }
                    else
                    {
                        echo 'password not match.';
                    }
                }
                else{
                    echo 'Error Occurring in Data Insertion.';
                }
            }   
        }
    }

    public function login_user() 
    {
        if(isset($_POST['submit']))
        {
            if(($_POST['email'] == "") || ($_POST['password'] == ""))
            { 
                echo 'error';
            }
            else
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $count = $this->model->check_email_existance('user', $email);

                if($count == 0)
                {
                    echo 'not found.';
                }
                else
                {
                    $serviceprovider = "http://localhost/Helperland/UpcomingService.php";
                    $customer = "http://localhost/Helperland/ServiceHistory.php";
                    $usertypeid = $this->model->check_usertype('user', $email);
                    $row = $this->model->login_user('user', $email, $password);
                    
                    if($row != "")
                    {
                        $_SESSION['userid'] = $row['UserId'];
                        $_SESSION['username'] = $row['FirstName'];
                        $_SESSION['email'] = $row['Email'];

                        if($usertypeid == 1)
                        {
                            header('Location:' . $serviceprovider);
                        }
                        else if($usertypeid == 2)
                        {
                            header('Location:' . $customer);
                        }
                        else
                        {
                            echo "Admin is here.";
                        }
                    }
                    else
                    {
                        echo 'password is incorrect.';
                    }
                }
            }
        }
    }

    public function forgot_password()
    {
        if(isset($_POST['submit']))
        {
            if($_POST['email'] == "")
            {
                echo 'enter email.';
            }
            else
            {
                $email = $_POST['email'];
                $count = $this->model->check_email_existance('user', $email);

                if($count == 1)
                {
                    $to_email = $email;
                    $subject = "Reset Password";
                    $body = "Hi, User!!! </br> This is your reset password link. http://localhost/Helperland/ResetPassword.php";
                    $headers = "From: kp916777@gmail.com";
                    $_SESSION['email'] = $_POST['email'];

                    if (mail($to_email, $subject, $body, $headers))
                    {
                        echo "Email successfully sent to $to_email...";
                    }
                    else
                    {
                        echo "Msg Not Sent";
                    }
                    // $success = mail($to_email, $subject, $body, $headers);
                    // if (!$success) {
                    //     echo error_get_last();
                    // }
                    // else{
                    //     echo("No Error");
                    // }
                }
                else
                {
                    echo    '<script>
                                alert("Email not found.");
                                location. href="http://localhost/Helperland/";
                            </script>';
                }
            }
        }
    }

    public function reset_password()
    {
        if(isset($_POST['submit']))
        {
            if(($_POST['password'] == "") || ($_POST['confirm-password'] == ""))
            {
                echo 'fill the details';
            }
            else
            {
                $base_url = "http://localhost/Helperland/";
                $email = $_SESSION['email'];

                if($_POST['password'] == $_POST['confirm-password'])
                {
                    $password = $_POST['password'];
                    $this->model->reset_password('user', $email, $password);
                    header('location:' . $base_url);
                }
                else
                {
                    echo 'password not match.';
                }
            }
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
        $count = $this->model->check_sp_availability('zipcode', $postalcode);

        if($count != 0)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

    public function fill_radio_button_address()
    {
        $postalcode = $_POST['zipcode'];
        $userid = $_SESSION['userid'];
        $list = $this->model->fill_radio_button_address('useraddress', $postalcode, $userid);
        $i=0;
        foreach($list as $address)
        {
            ?>
            <label class="area-label">
                <input type="radio" class="area-radio" id="address<?php echo $i?>" name="address" value="<?php echo $address['AddressId'] ?>">
                <span><b>Address:</b></span><?php echo " ".$address['AddressLine1']."  ".$address['AddressLine2'].", ".$address['City']."  ".$address['State']." - ".$address['PostalCode']." ";  ?><br>
                <span><b>Telephone number:</b></span><?php echo " ".$address['Mobile']." "; ?>
                </label>
            <?php
            $i++; 
        }
    }

    public function insert_address()
    {
        $streetname = $_POST['streetname'];
        $housenumber = $_POST['housenumber'];
        $postalcode = $_POST['postalcode'];
        $city = $_POST['city'];
        $phonenumber = $_POST['phonenumber'];

        $array = [
            'userid' => $_SESSION['userid'],
            'streetname' => $streetname,
            'housenumber' => $housenumber,
            'postalcode' => $postalcode,
            'city' => $city,
            'phonenumber' => $phonenumber,
        ];
        $this->model->insert_address('useraddress', $array);
    }

    public function add_service_request()
    {
        $postalcode = $_POST['postalcode'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $servicehours = $_POST['servicehours'];
        $extrahours = $_POST['extrahours'];
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
        if($selectextraserviceid != null)
        {
            for($i=0; $i<sizeof($selectextraserviceid) ; $i++)
            {
                $array2 = [
                    'selectextraserviceid' => $selectextraserviceid[$i],
                ];
                $this->model->add_extraservice('servicerequestextra', $requestid, $array2);
            }
        }
        
        $row = $this->model->send_service_request_mail_to_sp('user', $postalcode);
        
        if($row != null)
        {
            foreach($row as $emaildata)
            {
                $to_email = $emaildata['Email'];
                $subject = "New service request";
                $body = "Hi, Service Provider!!! One service request is available in your area. Kindly check by login. http://localhost/Helperland/Home.php";
                $headers = "From: kp916777@gmail.com";
                mail($to_email, $subject, $body, $headers);
            }
        }
    }
}
