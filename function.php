<?php
// session_start();

class Connection
{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "finalphp";
    public $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
        if (!$this->conn) {
            echo mysqli_connect_error();
            exit;
        }
    }
}




class Register extends Connection
{
    public $email;
    public $username;
    public $error_fields = array();

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
    public function checkEmail()
    {
        $this->email = mysqli_escape_string($this->conn, $_POST['email']);
        $query = "SELECT * FROM USER WHERE email = '$this->email' ";
        $duplicate_email = mysqli_query($this->conn, $query);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (mysqli_num_rows($duplicate_email) > 0) {         // check email duplicated

                return 20;
            }
        }
    }
    public function checkUserName()
    {
        $query = "SELECT * FROM USER WHERE username = '$this->username'";
        $this->username = mysqli_escape_string($this->conn, $_POST['username']);
        $duplicate_username = mysqli_query($this->conn, $query);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (mysqli_num_rows($duplicate_username) > 0) {      // check username duplicated

                return 10;
            }
        }
    }
    public function registeration($name, $username, $email, $password, $confirmpassword)
    {
        $name = mysqli_escape_string($this->conn, $_POST['name']);
        $password = sha1(mysqli_escape_string($this->conn, $_POST['password']));
        $confirmpassword = sha1(mysqli_escape_string($this->conn, $_POST['confirmpassword']));
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->checkEmail() != 20 && $this->checkUserName() != 10) {
                if ($password == $confirmpassword) {   // registeration successful
                    $query = "INSERT INTO USER VALUES('','$name','$username','$email','$password')";
                    mysqli_query($this->conn, $query);
                    header("location: login.php");
                    mysqli_free_result(mysqli_query($this->conn, $query));
                    mysqli_close($this->conn);
                    return 1;
                } else {
                    return 100;                      // password doesn't match
                }
            }
        }
    }
}

class Login extends Connection
{
    public $id;
    public function login($usernameemail, $password)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$usernameemail' OR email = '$usernameemail'");
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            if ($password == $row["password"]) {
                $this->id = $row["id"];
                mysqli_free_result($result);
                mysqli_close($this->conn);
                return 15; //login successful
            } else {
                return 10; //wrong password
            }
        } else {
            return 100; //user not registred
        }
    }
    public function idUser()
    {
        return $this->id;
    }
}



class Select extends Connection
{
    public function selectUserById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM user WHERE id = '$id'");
        return mysqli_fetch_assoc($result);
    }
}

class cookiee
{
    public function setcookies($usernameemail,$password)
    {
        if (isset($_POST["remember"])) {
            setcookie("usernameemail", $usernameemail, time() + 7200);
            setcookie("password", $password, time() + 7200);
            header("location: home.php");
        }else{
            setcookie("usernameemail", $usernameemail, time() -1);
            setcookie("password", $password, time() -1);
        }
    }
}
