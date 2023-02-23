<?php
include_once "dbconfig.php";
session_start();
if (isset($_SESSION["sign"])) {
    if (!$_SESSION["sign"]) {
        header('Location: ../');
        exit();
    }
} else {
    header('Location: ../');
    exit();
}
if (isset($_GET["pwd"])) {
    $id = $_SESSION["id"];
    $email  = $_GET["email"];
    $tel  = $_GET["tel"];
    $statement = $conn->prepare("SELECT `password` FROM users WHERE id ='$id'");
    $statement->execute();
    $result = $statement->fetchAll();
    print_r($result);
    if (md5($_GET["pwd"]) != $result[0]["password"]){
        header('Location: profil.php?response=false');
        exit();
    }else {
        $statement = $conn->prepare("UPDATE `users` SET `email` = '$email' ,`phone_number`='$tel' ");
        $statement->execute();
        header('Location: profil.php?response=true');
        exit();
    }
}
if (isset($_GET["old_pwd"])) {
    $id = $_SESSION["id"];
    $password  = md5($_GET["new_pwd"]);
    $statement = $conn->prepare("SELECT `password` FROM users WHERE id ='$id'");
    $statement->execute();
    $result = $statement->fetchAll();
    if (md5($_GET["old_pwd"]) != $result[0]["password"]){
        header('Location: profil.php?response=false');
        exit();
    }else {
        $statement = $conn->prepare("UPDATE `users` SET `password` = '$password' ");
        $statement->execute();
        header('Location: profil.php?response=true');
        exit();
    }
}