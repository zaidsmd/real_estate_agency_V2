<?php
include "dbconfig.php";
$id = $_GET["id"];
$statement =$conn->prepare("SELECT * FROM `announcements` WHERE `id` = '$id'") ;
$statement->execute();
$result = $statement->fetchAll();
$country_id = $result[0]["country"];
//---------------------------------------------------------
$servername = "localhost";
$user = "root";
$password = '';
$dbname = "world";

try {
    $conn1 = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
    $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
};
$statement1= $conn1->prepare("SELECT `name` FROM `countries` WHERE `id` = '$country_id'");
$statement1->execute();
$result1 = $statement1->fetchAll();
$country = $result1[0]["name"];
//----------------------------------------------------------
$result[0]["country_name"] = $country;
echo json_encode($result);

