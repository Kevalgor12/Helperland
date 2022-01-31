<?php
class HelperlandController{
    public function __construct(){
        include('models/HelperlandModel.php');
        $this->model = new HelperlandModel();
    }

    public function Helperland()
    {
        include("views/home.php");
    }

    public function insert_contactus()
    {
        if(isset($_POST)){
            $base_url = "http://localhost/Helperland/views/Contact.php";
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
}
?>