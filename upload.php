<?php
// ini_set('display_errors', '1');
require_once("index.php");
session_start();
require "function.php";
$select = new Select();
if (isset($_SESSION["id"])) {
  $user = $select->selectUserById($_SESSION["id"]);
} else {
  header("location: login.php");
}


?>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Files Upload and Download</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <form action="index.php" method="POST" enctype="multipart/form-data" >
          <h3>Upload File</h3>
          <input type="file" name="myfile"> <br>
          <button type="submit" name="save">upload</button>

        </form>
      </div>
    </div>
  </body>
</html>