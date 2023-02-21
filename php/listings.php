<?php
session_start();
include_once "dbconfig.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/style.css">
    <title>House Miner</title>
</head>
<body>
<nav>
    <div id="logo">
        <i class="fa-solid fa-house-chimney"></i>
        <span>House Miner</span>
    </div>
    <?php
    if (isset($_SESSION["sign"])) {
        if ($_SESSION["sign"]) {
            $id = $_SESSION["id"];
            $statement = $conn->prepare("SELECT `profile_pic` FROM `users` WHERE `id` ='$id' ");
            $statement->execute();
            $result = $statement->fetchAll();
            $profile_pic = $result[0]["profile_pic"]?>
            <div class="navbar">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="php/listings.php" class="active nav-link">Listings</a>
                    </li>
                </ul>
                <button class="add-announcement"></button>
            </div>
            <a href="php/profile.php">
                <div class="profile">
                    <img src='<?= $profile_pic?>' alt="">
                </div>
            </a>
        <?php } else {
            echo "<a id='login-home' href='php/login.php'>Se connecter</a>";
        }
    } else {
        echo "<a id='login-home' href='php/login.php'>Se connecter</a>";
    }
    ?>
</nav>
<main>
    <aside>
        <form action="listings.php" method="get">
            <div class="input-group">
                <h6>Ville</h6>
                <label for="city"  class="hide" ></label>
                <select name="city" id="city">
                    <option value="0">Ville</option>
                </select>
            </div>
            <div class="input-group">
                <h6>Catégories</h6>
                <div class="checkbox">
                    <label for="sale">Vente</label>
                    <input type="checkbox" name="sale" id="sale">
                </div>
                <div class="checkbox">
                    <label for="rent">Location</label>
                    <input type="checkbox" name="rent" id="rent">
                </div>
            </div>
            <div class="input-group">
                <h6>Prix</h6>
                <div class="row">
                    <label for="min" class="hide" ></label>
                    <input type="number" name="min" id="min" placeholder="min">
                    <span>à</span>
                    <label for="max" class="hide"></label>
                    <input type="number" name="max" id="max" placeholder="max">
                </div>
            </div>
            <div class="input-group">
                <h6>Types</h6>
                <div class="checkbox">
                    <label for="appartement">Appartement</label>
                    <input type="checkbox" name="appartement" id="appartement">
                </div>
                <div class="checkbox">
                    <label for="house">Maison</label>
                    <input type="checkbox" name="house" id="house">
                </div>
                <div class="checkbox">
                    <label for="villa">Villa</label>
                    <input type="checkbox" name="villa" id="villa">
                </div>
                <div class="checkbox">
                    <label for="desk">Bureau</label>
                    <input type="checkbox" name="desk" id="desk">
                </div>
                <div class="checkbox">
                    <label for="field">Terrain</label>
                    <input type="checkbox" name="field" id="field">
                </div>
            </div>
            <input type="submit" value="Rechercher">
        </form>
    </aside>
    <section>
    </section>
</main>
<script src="https://kit.fontawesome.com/a5fdcae6a3.js" crossorigin="anonymous"></script>
</body>
</html>
