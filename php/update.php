<?php
session_start();
include_once "dbconfig.php";
$id = $_GET['id'];
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

  var_dump($description);
  $directory = "../imgUpdate/";


  $pic_name = basename($_FILES["primary"]["name"]);
  $path = $directory.$pic_name;
  move_uploaded_file($_FILES["primary"]["tmp_name"], $path);

  $sqlSat = $conn->prepare("UPDATE pictures SET `path` = ? WHERE announcement_id = '$id' AND `primary` = 1");
  $sqlSat->execute([$path]);

  $sqlStat = $conn->prepare("UPDATE announcements SET title = ? , 
    price = ? , area = ? ,
    adresse = ? , country = ? ,
    city = ? , category = ? ,
    type = ? ,
    description = ?  WHERE id = ?");
  $sqlStat->execute([$title, $price, $area, $adresse, $country, $city, $category , $type , $description , $id]);

  //pictures

  //$pictures = basename($_FILES["pictures"]["name"]);
  //$pic_pictures = $directory.$pictures;
  //$sqlSat_pic = $conn->prepare("UPDATE pictures SET `path` = ? WHERE announcement_id = '$id' AND `primary` = 0");
  //$sqlSat_pic->execute([$pic_pictures]);
































  // move_uploaded_file($_FILES["primary"]["tmp_name"], $path);

  //   $sqlSat = $conn->prepare("UPDATE pictures SET `path` = ? WHERE announcement_id = '$id' AND `primary` = 1");
  //   $sqlSat->execute([$path]);

  // $secondaire_pic = $conn->prepare("UPDATE pictures SET `path` = ? WHERE announcement_id = '$id' AND `primary` = 0")->fetchAll(PDO::FETCH_ASSOC);
  // $secondaire_pic->execute([$pic]);

}


 header("Location:http://localhost/rael_v2-20230228T081608Z-001/rael_v2/real_estate_agency_V2/php/details.php?id=$id");
 exit();
?>


