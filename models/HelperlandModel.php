<?php
class HelperlandModel{

    // Creates database connection

    public function __construct(){
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
    public function insert_contactus($table, $array){
        $sql_qry = "INSERT INTO $table(Name, Email, Subject, PhoneNumber, Message, CreatedOn) VALUES (:Name, :Email, :Subject, :PhoneNumber, :Message, :CreatedOn)";
        $statement = $this->conn->prepare($sql_qry);
        $statement->execute($array);
    }
}
?>