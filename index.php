<?php
include_once "php/dbconfig.php";
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">
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
            $statement = $conn->prepare("SELECT * FROM `users` WHERE `id` ='$id' ");
            $statement->execute();
            $result = $statement->fetchAll();
            $profile_pic = $result[0]["profile_pic"];
            $name = $result[0]["name"];
            $last_name = $result[0]["last_name"];
            $email = $result[0]["email"];
            ?>
            <div class="navbar">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="index.php" class=" active nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="php/listings.php" class="nav-link">Listings</a>
                    </li>
                </ul>
                <button class="add-announcement">Ajouter une announce</button>
            </div>
            <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                    class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 profile">
                <img src='<?= $profile_pic ?>' alt="">
            </button>
            <div id="dropdownAvatar"
                 class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                    <p class="text-center" ><?= $name.' '.$last_name ?></p>
                    <div class="font-medium truncate"><?=$email?></div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownUserAvatarButton">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paramètres</a>
                    </li>
                </ul>
                <div class="py-2">
                    <a href=""
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Se déconnecter</a>
                </div>
            </div>
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
        <form action="">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>
