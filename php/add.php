<?php
include "dbconfig.php";
session_start();
if (isset($_SESSION["sign"])){
    if (!$_SESSION["sign"]){
        header('Location: login.php');
        exit();
    }
}else{
    header('Location: login.php');
    exit();
}
$id = $_SESSION["id"];
$title = $_POST["title"];
$city = $_POST["city"];
$adresse = $_POST["adresse"];
$category = $_POST["category"];
$type= $_POST["type"];
$price = $_POST["price"];
$area = $_POST["area"];
$primary= basename($_FILES["primary"]["name"]);
$directory = "../files/".$_SESSION["id"]."/";
$primary_path = $directory.$primary;
$statement1 = $conn->prepare("INSERT INTO `announcements` (`title`,`city`,`adresse`,`category`,`type`,`price`,`area` ,`user_id`) VALUES ('$title','$city','$adresse','$category','$type','$price','$area','$id')");
$statement1->execute();
$statement3 = $conn->prepare("SELECT `id` FROM `announcements` WHERE `user_id` = '$id' ORDER BY `id` DESC LIMIT 1");
$statement3->execute();
$result = $statement3->fetchAll();
$announcement_id = $result[0]["id"];
if(!is_dir($directory)) {
    mkdir($directory);
}
if (move_uploaded_file($_FILES["primary"]["tmp_name"], $primary_path)){
    $statement2 = $conn->prepare("INSERT INTO `pictures` (`path`,`primary`,`announcement_id`) VALUES ('$primary_path',1,'$announcement_id')");
    $statement2->execute();
}
for ($i=0;$i<count($_FILES["pictures"]["name"]);$i++ ){
    $pic_name = basename($_FILES["pictures"]["name"][$i]);
    $path = $directory.$pic_name;
    move_uploaded_file($_FILES["pictures"]["tmp_name"][$i], $path);
    $statement = $conn->prepare("INSERT INTO `pictures` (`path`,`primary`,`announcement_id`) VALUES ('$path',0,$announcement_id)");
    $statement->execute();
}
header('Location: listings.php');
exit();


