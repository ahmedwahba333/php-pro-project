<?php
$error_arr = array();
if (isset($_GET['error_fields'])) {
    $error_arr = explode(",", $_GET['error_fields']);
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
            <div class="card">
                <div class="card-header text-center">
                    <h3>Register In <span>Be one of us <i class="mt-2 fa fa-heart"></i></span></h3>
                </div>
                <div class="card-body">
                    <form action="process_db.php" method="POST">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" class="form-control" name="username" placeholder="username">
                        </div>
                        <p style="color:red;" class="mb-0"> <?php if (in_array("username", $error_arr)) {
                                                                    echo "please enter your name";
                                                                } ?></p>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" id="email" placeholder="email">                        </div>
                        <p style="color:red;" class="mb-0"><?php if (in_array("email", $error_arr)) {
                                                                    echo "please enter your email";
                                                                } ?></p>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" id="password" placeholder="password">
                        </div>
                        <p style="color:red;" class="mb-0"><?php if (in_array("password", $error_arr)) {
                                                                    echo "please enter your password";
                                                                } ?> </p>
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