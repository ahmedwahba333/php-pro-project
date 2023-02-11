<?php
session_start();
require 'function.php';
if (isset($_SESSION["id"])) {
    header("location: home.php");
}
$COOKIES = new cookiee();
$login = new Login();
if (isset($_POST["submit"])) {
    $result = $login->login($_POST["usernameemail"], sha1($_POST["password"]));
    if ($result == 15) {
        $COOKIESs = $COOKIES->setcookies($_POST["usernameemail"], $_POST["password"]);
        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        header("location: home.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                <p class="text-center">
                    <?php if (isset($_POST["submit"])) {
                        if ($result == 10) {
                            echo "Wrong Password";
                        } else if ($result == 100) {
                            echo "Not Registred..SignUp now";
                        }
                    } ?>
                </p>
                <div class="card-body">
                    <form method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="usernameemail" class="form-control" id="usernameemail" placeholder="Email or Username" value="<?php
                                                                                                                                                    if (isset($_POST["submit"])) {
                                                                                                                                                        if ($result == 10) {
                                                                                                                                                            echo $_POST["usernameemail"];
                                                                                                                                                        }
                                                                                                                                                    }
                                                                                                                                                    if (isset($_COOKIE["usernameemail"])) {
                                                                                                                                                        echo $_COOKIE["usernameemail"];
                                                                                                                                                    }
                                                                                                                                                    ?>">
                        </div>
                        <p style="color:red;" class="mb-0"></p>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" id="password" placeholder="password" value="<?php if (isset($_COOKIE["password"])) {
                                                                                                                                        echo $_COOKIE["password"];
                                                                                                                                    } ?>">
                        </div>
                        <p style="color:red;" class="mb-0"></p>
                        <div class="row align-items-center remember">
                            <input type="checkbox" name="remember">Remember Me
                        </div>
                        <a href="form.php" class="signUpMsg">Don't have an Account? Sign up</a>
                        <div class="form-group">
                            <input type="submit" value="sign in" name="submit" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>