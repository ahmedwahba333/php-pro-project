<?php
require "./models/form_valedation.php";
$error = new vald();
$error->default_namecard();
$error->default_email();
$error->default_password();
$error->default_confpassword();
$error->default_cardNumber();
$error->default_cvv();
$error->default_exdate();
$error->card();
$error->errorsArray();


session_start();
require "function.php";
$select = new Select();
if (isset($_SESSION["id"])) {
  $user = $select->selectUserById($_SESSION["id"]);
} else {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <link rel="stylesheet" href="./assets/css/payment.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
     <!-- As a link -->
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="./logout.php">logout</a>

    </div>
  </nav>

  <!-- As a heading -->
  <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
      <h1 class="navbar-brand mb-0">welcom <?php echo $user["name"]; ?>
        in our world</h1>
    </div>
  </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-lg-0 mb-3">
                <div class="card p-3">
                    <div class="img-box">
                        <img src="https://www.freepnglogos.com/uploads/visa-logo-download-png-21.png" alt="">
                    </div>
                    <div class="number">
                        <label class="fw-bold" for="">**** **** **** 1060</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small><span class="fw-bold">Expiry date:</span><span>10/16</span></small>
                        <small><span class="fw-bold">Name:</span><span>Kumar</span></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-3">
                <div class="card p-3">
                    <div class="img-box">
                        <img src="https://www.freepnglogos.com/uploads/mastercard-png/file-mastercard-logo-svg-wikimedia-commons-4.png" alt="">
                    </div>
                    <div class="number">
                        <label class="fw-bold">**** **** **** 1060</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small><span class="fw-bold">Expiry date:</span><span>10/16</span></small>
                        <small><span class="fw-bold">Name:</span><span>Kumar</span></small>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-lg-0 mb-3">
                <div class="card p-3">
                    <div class="img-box">
                        <img src="https://www.freepnglogos.com/uploads/discover-png-logo/credit-cards-discover-png-logo-4.png" alt="">
                    </div>
                    <div class="number">
                        <label class="fw-bold">**** **** **** 1060</label>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <small><span class="fw-bold">Expiry date:</span><span>10/16</span></small>
                        <small><span class="fw-bold">Name:</span><span>Kumar</span></small>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-4">
                <div class="card p-3">
                    <p class="mb-0 fw-bold h4">Payment Methods</p>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                <span class="fw-bold">PayPal</span>
                                <span class="fab fa-cc-paypal">
                                </span>
                            </a>
                        </p>
                        <div class="collapse p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-8">
                                    <p class="h4 mb-0">Summary</p>
                                    <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: Name of
                                            product</span></p>
                                    <p class="mb-0"><span class="fw-bold">Price:</span><span class="c-green">:$452.90</span></p>
                                    <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque
                                        nihil neque
                                        quisquam aut
                                        repellendus, dicta vero? Animi dicta cupiditate, facilis provident quibusdam ab
                                        quis,
                                        iste harum ipsum hic, nemo qui!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true" aria-controls="collapseExample">
                                <span class="fw-bold">Credit Card</span>
                                <span class="">
                                    <span class="fab fa-cc-amex"></span>
                                    <span class="fab fa-cc-mastercard"></span>
                                    <span class="fab fa-cc-discover"></span>
                                </span>
                            </a>
                        </p>
                        <div class="collapse show p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-lg-5 mb-lg-0 mb-3">
                                    <p class="h4 mb-0">Summary</p>
                                    <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: Name of
                                            product</span>
                                    </p>
                                    <p class="mb-0">
                                        <span class="fw-bold">Price:</span>
                                        <span class="c-green">:$452.90</span>
                                    </p>
                                    <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque
                                        nihil neque
                                        quisquam aut
                                        repellendus, dicta vero? Animi dicta cupiditate, facilis provident quibusdam ab
                                        quis,
                                        iste harum ipsum hic, nemo qui!</p>
                                </div>
                                <!-- action="<?php // echo $_SERVER["php_serve"] 
                                                ?>" -->
                                <div class="col-lg-7">
                                    <form method="POST" class="form" enctype="multipart/form-data">
                                        <!-- <?php /*
                                                foreach ($error->errors as $error) {
                                                    echo "<p >** $error</p>";
                                                }
                                                */ ?>  -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form__div">
                                                    <p style="color:red;" class="mb-0 float-end"><?php if (in_array("email", $error->errors)) {
                                                                                                        echo "please enter your email";
                                                                                                    } ?></p>
                                                    <input type="text" name="email" class="form-control" placeholder=" " value="<?php echo $error->default_email; ?>">
                                                    <label for="" class="form__label">email</label>

                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form__div">
                                                        <p style="color:red;" class="mb-0 float-end"><?php if (in_array("password", $error->errors)) {
                                                                                                            echo "please enter your password";
                                                                                                        } ?></p>
                                                        <input type="password" name="password" class="form-control" placeholder=" " value="<?php echo $error->default_password; ?>">
                                                        <label for="" class="form__label">password</label>
                                                    </div>
                                                </div>
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="form__div">
                                                            <p style="color:red;" class="mb-0 float-end"><?php if (in_array("confpassword", $error->errors)) {
                                                                                                                echo "please enter your confirm password";
                                                                                                            } ?></p>
                                                            <input type="password" name="confpassword" class="form-control" placeholder=" " value="<?php echo $error->default_confpassword; ?>">
                                                            <label for="" class="form__label"> confirm password</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 mb-3">
                                                        <div class="form__div">
                                                            <p style="color:red;" class="mb-0 float-end"><?php if (in_array("cardNumber", $error->errors)) {
                                                                                                                echo "please enter your Card Number";
                                                                                                            } ?></p>
                                                            <input type="text" name="cardNumber" class="form-control" placeholder="card number" value="<?php echo $error->default_cardNumber; ?>">
                                                            <label for="" class="form__label">Card Number</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form__div">

                                                            <input type="text" name="exdate" class="form-control" placeholder=" " value="<?php echo $error->default_exdate ?>">
                                                            <label for="" class="form__label">MM / yy</label>
                                                            <p style="color:red;" class="mb-0 "><?php if (in_array("exdate", $error->errors)) {
                                                                                                    echo "please enter your expire date";
                                                                                                } ?></p>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form__div">
                                                            <input type="password" name="cvv" class="form-control" placeholder=" " value="<?php echo $error->default_cvv ?>">
                                                            <label for="" class="form__label">cvv code</label>
                                                            <p style="color:red;" class="mb-0 float-end"><?php if (in_array("cvv", $error->errors)) {
                                                                                                                echo "please enter your CVV";
                                                                                                            } ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form__div">
                                                            <input type="text" name="namecard" class="form-control" placeholder=" " value="<?php echo $error->default_namecard ?>">
                                                            <label for="" class="form__label">name on the card</label>
                                                            <p style="color:red;" class="mb-0 float-end"><?php if (in_array("namecard", $error->errors)) {
                                                                                                                echo "please enter your name on the card";
                                                                                                            } ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="btn btn-primary payment">
                                                            <input class="btn btn-primary bg-primary" type="submit" name='submit' value='submit'>
                                                        </div>
                                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="btn btn-primary payment">
                    Make Payment
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>