<?php
class HelperlandModel
{

    // Creates database connection

    public function __construct()
    {
        try{
            $servername = "localhost:3306";
            $dbname = "helperland";
            $username = "root";
            $password = "";

            // Create Connection

            $this->conn = new PDO(
                "mysql:host=$servername; dbname=helperland",
                $username, $password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION);
        }

        // Checking Connection

        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function insert_contactus($table, $array)
    {
        $sql_qry = "INSERT INTO $table (Name, Email, Subject, PhoneNumber, Message, CreatedOn) 
                    VALUES (:Name, :Email, :Subject, :PhoneNumber, :Message, :CreatedOn)";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array);
    }

    public function check_email_existance($table, $email)
    {
        $sql_qry = "SELECT * FROM $table where Email = '$email'";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $count = $statement->rowCount();
        return $count;
    }

    public function insert_user($table, $array)
    {
        $sql_qry = "INSERT INTO $table (FirstName, LastName, Email, Password, Mobile, UserTypeId, CreatedDate) 
                    VALUES (:fname, :lname, :email, :password, :mobile, :usertypeid, now())";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array);
    }
    
    public function check_usertype($table, $email)
    {
        $sql_qry = "SELECT UserTypeId FROM $table where Email = '$email'";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $usertypeid = $row['UserTypeId'];
        return $usertypeid;
    }

    public function login_user($table, $email, $password)
    {
        $sql_qry = "SELECT * FROM $table WHERE Email = '$email' AND Password = '$password'";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function reset_password($table, $email, $password)
    {
        $sql_qry = "UPDATE $table SET Password = '$password' WHERE Email = '$email'";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
    }

    public function check_sp_availability($table, $postalcode)
    {
        $sql_qry = "SELECT * FROM $table WHERE ZipCode = '$postalcode' AND UserTypeId = 1";
        $statement =  $this->conn->prepare($sql_qry);
        $statement->execute();
        $number_of_rows = $statement->fetchColumn();
        return $number_of_rows;
    }

    public function fill_radio_button_address($table, $postalcode, $userid)
    {
        $sql_qry = "SELECT * FROM $table WHERE PostalCode = '$postalcode' AND UserId = '$userid'";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    // public function get_State_from_zipcode($postalcode)
    // {
    //     $sql_qry = "SELECT zipcode.ZipcodeValue, city.CityName, state.StateName  FROM zipcode RIGHT OUTER JOIN city ON zipcode.CityId = city.Id AND ZipcodeValue = $postalcode LEFT OUTER JOIN state ON state.Id = city.StateId";
    //     $statement = $this->conn->prepare($sql_qry);
    //     $statement->execute();
    //     $row  = $statement->fetch(PDO::FETCH_ASSOC);
    //     return $row;
    // }

    public function insert_address($table, $array)
    {
        $sql_qry = "INSERT INTO $table (UserId, AddressLine1, AddressLine2, City, PostalCode, Mobile) 
                    VALUES (:userid, :streetname, :housenumber, :city, :postalcode, :phonenumber)";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array);
    }

    public function add_service_request($table, $array)
    {
        $sql_qry = "INSERT INTO $table(UserId, ServiceStartDate, ZipCode, ServiceHourlyRate, ServiceHours, ExtraHours, HasPets, SubTotal, TotalCost, Comments) 
                    VALUES (:userid, :servicedatetime, :postalcode, :servicehourlyrate, :servicehours, :extrahours, :haspet, :subtotal, :totalpayment, :comment)";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array);
        $requestid = $this->conn->lastInsertId();
        return $requestid;
    }

    function add_booking_service_address($table, $bookrequestid_selectedaddressid_array)
    {
        $sql_qry = "INSERT INTO $table (ServiceRequestId, AddressLine1, AddressLine2, City, PostalCode)
                    SELECT servicerequest.ServiceRequestId, useraddress.AddressLine1, useraddress.AddressLine2, useraddress.City, useraddress.PostalCode FROM servicerequest, useraddress
                    WHERE servicerequest.ServiceRequestId = :requestid AND useraddress.AddressId = :selectedaddressid";
        $statement= $this->conn->prepare($sql_qry);
        $statement->execute($bookrequestid_selectedaddressid_array);
    }

    // function add_extraservice($array)
    // {
    //     $sql_qry = "INSERT INTO servicerequestextra (ServiceRequestId, ServiceExtraId)
    //                 VALUES (:requestid, :selectextraserviceid)";
    //     $statement = $this->conn->prepare($sql_qry);
    //     $statement->execute($array);
    // }

    function add_extraservice($table, $requestid, $array2)
    {
        $sql_qry = "INSERT INTO $table (ServiceRequestId, ServiceExtraId)
                    VALUES ($requestid, :selectextraserviceid)";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array2);
    }

    public function send_service_request_mail_to_sp($table, $postalcode)
    {
        $sql_qry = "SELECT * FROM $table WHERE ZipCode = $postalcode AND UserTypeId = 1";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function fill_dashboard($table, $userid)
    {
        $sql_qry = "SELECT * FROM $table WHERE Status = 0 AND UserId = $userid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function get_sp_byid($table, $serviceproviderid)
    {
        $sql_qry = "SELECT * FROM $table WHERE UserId = $serviceproviderid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row  = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function fill_selected_pending_request($table, $selectedrequestid)
    {
        $sql_qry = "SELECT * FROM $table WHERE ServiceRequestId = $selectedrequestid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row  = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function fill_selected_pending_request_extraservice($table, $selectedrequestid)
    {
        $sql_qry = "SELECT * FROM $table WHERE ServiceRequestId = $selectedrequestid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row  = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }

    public function fill_selected_pending_request_useraddress($table, $selectedrequestid)
    {
        $sql_qry = "SELECT * FROM $table WHERE ServiceRequestId = $selectedrequestid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row  = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function fill_average_rating_of_sp($table, $serviceproviderid)
    {
        $sql_qry = "SELECT * FROM $table WHERE RatingTo = $serviceproviderid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row  = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }

    public function fill_data_reschedule_modal($table, $selectedrequestid)
    {
        $sql_qry = "SELECT * FROM $table WHERE ServiceRequestId = $selectedrequestid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function reschedule_servicerequest($table, $datetime, $selectedrequestid)
    {
        $sql_query = "UPDATE $table SET ServiceStartDate = '$datetime' WHERE  ServiceRequestId = '$selectedrequestid'";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();
    }

    function cancel_servicerequest($table, $selectedrequestid)
    {
        $sql_query = "UPDATE $table SET Status = -1 WHERE  ServiceRequestId = '$selectedrequestid'";
        $statement= $this->conn->prepare($sql_query);
        $statement->execute();  
    }

    function get_ratings_of_sp($table, $selectedrequestid)
    {
        $sql_qry = "SELECT * FROM $table WHERE ServiceRequestId = $selectedrequestid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function submit_rating($table, $array, $israted)
    {
        if($israted == "")
        {
            $sql_query = "INSERT INTO $table (ServiceRequestId, RatingFrom, RatingTo, Ratings, Comments, RatingDate, OnTimeArrival, Friendly, QualityOfService)
            VALUES (:ServiceRequestId, :RatingFrom, :RatingTo, :Ratings, :Comments, now(), :OnTimeArrival, :Friendly, :QualityOfService)";
            $statement= $this->conn->prepare($sql_query);
            $statement->execute($array);
        }
        else
        {
            $sql_query = "UPDATE $table SET Ratings = '".$array['Ratings']."', Comments = '".$array['Comments']."', RatingDate = now(), OnTimeArrival = '".$array['OnTimeArrival']."', Friendly = '".$array['Friendly']."', QualityOfService = '".$array['QualityOfService']."'  WHERE  ServiceRequestId = '".$array['ServiceRequestId']."' ";
            $statement= $this->conn->prepare($sql_query);
            $statement->execute();
        }
        
    }

    public function fill_service_history($table, $userid)
    {
        $sql_qry = "SELECT * FROM $table WHERE Status IN (-1,1) AND UserId = $userid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row  = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function fill_details_user($table, $userid)
    {
        $sql_qry = "SELECT FirstName, LastName, Email, Mobile, DateOfBirth FROM $table WHERE UserId = $userid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function update_user_details($table, $userid, $array)
    {
        $sql_qry = "UPDATE $table
                    SET FirstName = :fname, LastName = :lname , Mobile = :mobile, DateOfBirth = :dob
                    WHERE UserId = $userid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array);
    }

    public function fill_addresses_user($table, $userid)
    {
        $sql_qry = "SELECT AddressId, AddressLine1, AddressLine2, City, State, PostalCode, Mobile FROM $table WHERE UserId = $userid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row = $statement->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }

    public function fill_selected_useraddress($table, $selectedaddid)
    {
        $sql_qry = "SELECT AddressId, AddressLine1, AddressLine2, City, State, PostalCode, Mobile FROM $table WHERE AddressId = $selectedaddid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function update_selected_address($table, $selectedaddid, $array2)
    {
        $sql_qry = "UPDATE $table
                    SET AddressLine1 = :streetname, AddressLine1 = :housenumber, City :city, PostalCode :postalcode, Mobile = :phonenumber
                    WHERE AddressId = $selectedaddid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array2);
    }

    public function delete_selected_useraddress($table, $selectedaddid)
    {
        $sql_qry = "DELETE FROM $table WHERE AddressId = $selectedaddid";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
    }

    public function check_password($table, $email, $oldpassword)
    {
        $sql_qry = "SELECT * FROM $table where Email = '$email' AND Password = '$oldpassword'";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
        $count = $statement->rowCount();
        return $count;
    }

    public function update_password($table, $email, $newpassword)
    {
        $sql_qry = "UPDATE $table
                    SET Password = '$newpassword'
                    WHERE Email = '$email'";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute();
    }
}
?>