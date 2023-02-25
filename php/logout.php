<?php
session_start();
if (!isset($_SESSION["sign"])) {
    header('Location: login.php');
    exit();
}else {
    session_unset();
    session_destroy();
    header('Location: home');
    exit();
}
