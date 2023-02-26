<?php
include "dbconfig.php";
session_start();
//---------*check if the user is allowed to access this page*--------
if (isset($_SESSION["sign"])){
    if (!$_SESSION["sign"]){
        header('Location: login.php');
        exit();
    }
}else{
    header('Location: login.php');
    exit();
}//---------*check if the user is allowed to access this page end*--------
//---------*get all data from post *----------------
$id = $_SESSION["id"];
$title = $_POST["title"];
$city = $_POST["city"];
$country = $_POST["country"];
$adresse = $_POST["adresse"];
$category = $_POST["category"];
$type= $_POST["type"];
$price = $_POST["price"];
$area = $_POST["area"];
$description = $_POST["description"];
$primary= basename($_FILES["primary"]["name"]);
$directory = "../files/".$_SESSION["id"]."/";
$primary_path = $directory.$primary;
//---------*get all data from post end*----------------
//---------*insert data announcement to announcement table*----------------
$statement1 = $conn->prepare("INSERT INTO `announcements` (`title`,`city`,`adresse`,`category`,`type`,`price`,`area`,`country`,`description` ,`user_id`) VALUES ('$title','$city','$adresse','$category','$type','$price','$area','$country','$description','$id')");
$statement1->execute();
//---------*insert data announcement to announcement table end*----------------
//---------*get the id of this announcement*----------------
$statement3 = $conn->prepare("SELECT `id` FROM `announcements` WHERE `user_id` = '$id' ORDER BY `id` DESC LIMIT 1");
$statement3->execute();
$result = $statement3->fetchAll();
$announcement_id = $result[0]["id"];
//---------*get the id of this announcement end*----------------
//---------*check if the user have his own folder or not *----------------
if(!is_dir($directory)) {
    mkdir($directory);
}
//---------*check if the user have his own folder or not end*----------------
//---------*insert the primary image*----------------
if (move_uploaded_file($_FILES["primary"]["tmp_name"], $primary_path)){
    $statement2 = $conn->prepare("INSERT INTO `pictures` (`path`,`primary`,`announcement_id`) VALUES ('$primary_path',1,'$announcement_id')");
    $statement2->execute();
}
//---------*insert the primary image end*----------------
//---------*insert the secondary images*----------------
for ($i=0;$i<count($_FILES["pictures"]["name"]);$i++ ){
    $pic_name = basename($_FILES["pictures"]["name"][$i]);
    $path = $directory.$pic_name;
    move_uploaded_file($_FILES["pictures"]["tmp_name"][$i], $path);
    $statement = $conn->prepare("INSERT INTO `pictures` (`path`,`primary`,`announcement_id`) VALUES ('$path',0,$announcement_id)");
    $statement->execute();
}
//---------*insert the secondary images end*----------------
header('Location: listings.php');
exit();


