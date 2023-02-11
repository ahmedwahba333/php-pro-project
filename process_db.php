<?php
/*
$error_fields = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    if (!(isset($_POST['username'])) || empty($_POST['username'])) {
        $error_fields[] = 'username';
    }
    if (!(isset($_POST['email']) && filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL))) {
        $error_fields[] = 'email';
    }
    if (!(isset($_POST['password'])) || strlen($_POST['password']) < 5) {
        $error_fields[] = 'password';
    }
    if ($error_fields) {
        header("location: form.php?error_fields=" . implode(",", $error_fields));
        exit;
    }


    $conn = mysqli_connect("localhost", "root", "", "finalphp");
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    }

    $username = mysqli_escape_string($conn, $_POST['username']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = sha1(mysqli_escape_string($conn, $_POST['password']));

    $query = "INSERT INTO `user` (`username`,`email`,`password`) VALUES ('" . $username . "','" . $email . "','" . $password . "')";
    if (mysqli_query($conn, $query)) {
        header("location: login.php");
    } else {
        echo $query;
        echo mysqli_error($conn);
    }

    mysqli_close($conn);
}
*/