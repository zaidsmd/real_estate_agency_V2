<?php
session_start();
include_once "dbconfig.php";
$id = $_GET['id'];
$user_id = $_SESSION["id"];
if (isset($_POST['update'])) {
  $title = $_POST['title'];
  $price = $_POST['price'];
  $area = $_POST['area'];
  $adresse = $_POST['adresse'];
  $country = $_POST['country'];
  $city = $_POST['city'];
  $category = $_POST['category'];
  $type = $_POST['type'];
  $description = $_POST['description'];
$array = array_keys($_FILES);
if (count($array)>0){
  foreach ($array as $pic){
    if ($_FILES["$pic"]["name"] != '' ){
      $name= basename($_FILES["$pic"]["name"]);
      $directory = "../files/".$_SESSION["id"]."/";
      $path = $directory.$name;
      move_uploaded_file($_FILES["$pic"]["tmp_name"], $path);
      $sqlSat = $conn->prepare("UPDATE pictures SET `path` = '$path' WHERE id = '$pic'");
      $sqlSat->execute();
    }
  }
}
  $sqlStat = $conn->prepare("UPDATE announcements SET title = '$title' ,
    price = '$price' , area = '$area' ,
    adresse = '$adresse' , country = '$country' ,
    city = '$city' , category = '$category' ,
    type =  '$type' ,
    description = '$description'  WHERE id = '$id'");
$sqlStat->execute();
}

 header("Location: details.php?id=$id");
 exit();


