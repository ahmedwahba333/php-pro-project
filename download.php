<?php

ini_set('display_errors', '0');

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
<!-- -->

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Download files</title>
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

  <table class="table">
    <thead>
      <th scope="col">ID</th>
      <th scope="col">Filename</th>
      <th scope="col">Downloads</th>
      <th scope="col">Action</th>
    </thead>
    <tbody>


      <?php foreach ($files as $file) : ?>
        <form action="download.php?file_id= <?php echo  $file['id']; ?>" method="POST">
          <tr>
            <th scope="row"><?php echo $file['id']; ?></th>
            <td><?php echo $file['name']; ?></td>
            <td><?php echo $file['downloads']; ?></td>
            <td><button class="btn btn-primary" type="submit" name="submit"> Download</button></td>
          </tr>


        </form>
      <?php endforeach; ?>
    </tbody>
  </table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>