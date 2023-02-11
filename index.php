<?php
session_start();

require_once("vendor/autoload.php");

// ini_set('display_errors', 1);


// $pages=array("all","details");
// $page=(isset($_GET["view"]) && in_array($_GET["view"],$pages)) ?$_GET["view"]:"details";

 $id= isset($_GET["id"]) && is_numeric($_GET["id"])? $_GET["id"] : 2;

 ;

$glass= new handelar("product");
$files= $glass->select_records($id);
  


// $upload=[isset($_FILES)?$_FILES:"the file dosent upload"];



$upload_file=$glass-> Uploads_files($_FILES);

$download=$glass->download_files($_GET);






// if($page==="details")
// {
//     require_once("views/details.php");
// }else
// {
//     require_once("views/all.php");
// }


?>