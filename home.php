<?php
session_start();
require "function.php";
$select = new Select();
if (isset($_SESSION["id"])) {
  $user = $select->selectUserById($_SESSION["id"]);
} else {
  header("location: login.php");
}

require_once("vendor/autoload.php");
$payCheck = new handelar("product");
$result = $payCheck->select_records();
foreach ($result as $res) {
  $file = $res;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/home.css">
  <title>Document</title>
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
  <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="./assets/imgs/modern-flat-design-zip-archive-file-icon-web_599062-4480.avif" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
          content.</p>
    
    <!-- href="./payment.php" -->
    <a class="btn btn-primary" href="<?php if ($file['downloads'] == 7) {
      echo "payment.php";
}else{
  echo "download.php";
} ?>">Buy Now</a>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>