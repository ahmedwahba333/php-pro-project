<?php 
require "DB.php";
class vald implements valdet {



    public $email;
    public $username;
    public $error_fields = array();



    public $errors = array();
    public $default_namecard;
    public $default_email ;
    public $default_password;
    public $default_confpassword;
    public $default_cardNumber;
    public $default_cvv;
    public $default_exdate;
    public $card;



    public function default_namecard(){
        $this->default_namecard = isset($_POST["namecard"]) ? $_POST["namecard"] : "";
    }
    public function default_email(){
        $this->default_email = isset($_POST["email"]) ? $_POST["email"] : "";
    }
    public function default_password(){
        $this->default_password = isset($_POST["password"]) ? $_POST["password"] : "";
    }
    public function default_confpassword(){
        $this->default_confpassword = isset($_POST["confpassword"]) ? $_POST["confpassword"] : "";
    }
    public function default_cardNumber(){
        $this->default_cardNumber = isset($_POST["cardNumber"]) ? $_POST["cardNumber"] : "";
    }
    public function default_cvv(){
        $this->default_cvv = isset($_POST["cvv"]) ? $_POST["cvv"] : "";
    }
    public function default_exdate(){
        $this->default_exdate = isset($_POST["exdate"]) ? $_POST["exdate"] : "";
    }
    public function card(){
        $this->card = strlen($this->default_cardNumber);
    }






public function errorsArray()
{
    if (isset($_POST['submit'])) {
        if (!isset($_POST["email"]) || empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            $this->errors[] = "email";
        if (!isset($_POST["namecard"]) || empty($_POST["namecard"]) || strlen($_POST["namecard"]) < 5)
            $this->errors[] = "namecard";
        if (!isset($_POST["password"]) || empty($_POST["password"]) || strlen($_POST["password"]) < 7)
            $this->errors[] = "password";
        if (!isset($_POST["confpassword"]) || empty($_POST["confpassword"]) || strlen($_POST["confpassword"]) < 7 || $_POST["password"] != $_POST["confpassword"])
            $this->errors[] = "confpassword";
        if (!isset($_POST["cardNumber"]) || empty($_POST["cardNumber"]) || strlen($_POST["cardNumber"]) != 14)
            $this->errors[] = "cardNumber";
        if (!isset($_POST["cvv"]) || empty($_POST["cvv"]) || strlen($_POST["cvv"]) != 3)
            $this->errors[] = "cvv";
            if (!isset($_POST["exdate"]) || empty($_POST["exdate"]) || strlen($_POST["exdate"]) != 4)
            $this->errors[] = "exdate";
        if (isset($_POST["$this->default_cvv"]));
        if (empty($this->errors)) {
            header("location: download.php");
            exit();
        }
    }

}

    





    public function errors()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!(isset($_POST['name'])) || empty($_POST['name'])) {
                $this->error_fields[] = 'name';
            }
            if (!(isset($_POST['username'])) || empty($_POST['username'])) {
                $this->error_fields[] = 'username';
            }
            if (!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
                $this->error_fields[] = 'email';
            }
            if (!(isset($_POST['password'])) || strlen($_POST['password']) < 5) {
                $this->error_fields[] = 'password';
            }
            if ($this->error_fields) {
                header("location: form.php?error_fields=" . implode(",", $this->error_fields));
                exit;
            }
        }
    }
}
