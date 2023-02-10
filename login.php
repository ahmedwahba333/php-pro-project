<?php
// session start
session_start();
$error_fields = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = mysqli_connect("localhost", "root", "", "finalphp");
    if (!$conn) {
        echo mysqli_connect_error();
        exit;
    }

    $email = mysqli_escape_string($conn, $_POST['email']);
    $password = sha1(mysqli_escape_string($conn, $_POST['password']));

    $query = "select * from `user` where `email` = '".$email."' and `password` = '".$password."' limit 1";
    $result = mysqli_query($conn,$query);
    if($row = mysqli_fetch_assoc($result)){
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username'];
        
        header("location: home.php");
        exit;
    }else{
        $error= "invalid email or password";
    }
    mysqli_free_result(($result));
    mysqli_close($conn);
}






?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!--Custom styles-->
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-center h-100">
            <div class="card pt-4 pb-4">
                <div class="card-header text-center">
                    <h3>Log in</h3>
                </div>
                <p class="text-center"><?php if(isset($error)){echo $error;}?></p>
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" id="email" placeholder="email">
                        </div>
                        <p style="color:red;" class="mb-0"></p>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                        </div>
                        <p style="color:red;" class="mb-0"></p>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" value="sign in" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>