<?php
include "dbconfig.php";
session_start();
if (isset($_SESSION["sign"])){
    if ($_SESSION["sign"]){
        header('Location: ../');
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "css_cdns.php"?>
    <link rel="stylesheet" href="../css/register.css">
    <title>Se connecter</title>
</head>
<body>
<main>
    <div class="right">
        <div id="logo">
            <i class="fa-solid fa-house-chimney"></i>
            <span>House Miner</span>
        </div>
        <form action="" method="get">
            <?php
            if (isset($_GET['email'])){
                $email = $_GET['email'];
                $pwd = md5($_GET['pwd']);
                //---------*because I have md5 encryption it only takes me to compare the pwd given with the one I have in db with one single request*--------
                $statement = $conn->prepare("SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pwd'");
                $statement->execute();
                $result= $statement->fetchAll();
                //---------*if the email and pwd matches that successful login else the user has typed wrong informations*--------
                if (count($result)==1){
                    $_SESSION['sign'] = true;
                    $_SESSION['name'] = $result[0]["name"];
                    $_SESSION['lastname']= $result[0]["last_name"];
                    $_SESSION['id']= $result[0]["id"];
                    header("Location: ../");
                    exit();
                }else {
                    echo "<p class='response'>Le mot de pass ou email est incorrect</p>";
                }
            }
            //---------*end of script*--------
            ?>
            <div class="input">
                <div class="relative">
                    <input type="email" id="email"
                           name="email"
                           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" "/>
                    <label for="email"
                           class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
                </div>
                <p class="error">veuillez entrer un email valide </p>
            </div>
                <div class="input">
                    <div class="relative">
                        <input type="password" id="password"
                               name="pwd"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" "/>
                        <label for="password"
                               class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Mot
                            de pass</label>
                    </div>
                    <p class="error">veuillez entrer un mot de passe plus fort</p>
                </div>
            <input type="submit" value="Se connecter">
            <a href="register.php">Vous n'avez pas un compte?</a>
        </form>
    </div>
    <div class="left">
        <img src="../pic/screenshot.png" alt="">
    </div>
</main>
<?php include "js_cdns.php"?>
<script src="../javascript/register.js"></script>
</body>
</html>
