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
        $sql_qry = "INSERT INTO $table (FirstName, LastName, Email, Password, Mobile, CreatedDate) 
                    VALUES (:FirstName, :LastName, :Email, :Password, :Mobile, :CreatedDate)";
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
        $sql_qry = "SELECT * FROM $table WHERE ZipcodeValue = '$postalcode'";
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

    public function add_service_request($table,$array)
    {
        $sql_qry = "INSERT INTO $table(UserId, ZipCode, ServiceHourlyRate, ServiceHours, ExtraHours, SubTotal, TotalCost, Comments, CreatedDate, ModifiedDate) 
                    VALUES (:userid, :postalcode, :servicehourlyrate, :servicehours, :extrahours, :totalpayment, :totalpayment, :comment, now(), now())";

        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array);
    }
}
?>