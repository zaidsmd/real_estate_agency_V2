<?php
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
include_once "dbconfig.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
    $id = $_SESSION["id"];
    $statement = $conn->prepare("SELECT * FROM `users` WHERE `id` = '$id'");
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
                <a href="../index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
                <a href="php/listings.php" class="active nav-link">Listings</a>
            </li>
        </ul>
        <button class="add-announcement" type="button" data-bs-toggle="modal"
                data-bs-target="#add_announcement">Ajouter une announce
        </button>
    </div>
    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
            class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-4 profile">
        <img src='<?= $profile_pic ?>' alt="">
        <span><?= $name . ' ' . $last_name ?> </span>
    </button>
    <div id="dropdownAvatar"
         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <p class="text-center"><?= $name . ' ' . $last_name ?></p>
            <div class="font-medium truncate"><?= $email ?></div>
        </div>
        <a href="#"
           class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paramètres</a>
        <div class="py-2">
            <a href=""
               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Se
                déconnecter</a>
        </div>
    </div>
</nav>
<main>
    <aside>
        <form action="listings.php" method="get">
            <div class="input-group">
                <h6>Ville</h6>
                <label for="city" class="hide"></label>
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
                    <label for="min" class="hide"></label>
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
    <!-- Modal -->
    <div class="modal fade" id="add_announcement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajouter une annonce</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="php/add.php" method="get" enctype="multipart/form-data">
                        <div class="input">
                            <div class="relative">
                                <input type="text" id="title"
                                       name="title"
                                       class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                       placeholder=" "/>
                                <label for="title"
                                       class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Titre</label>
                            </div>
                            <p class="error">le nom ne peut pas contenir de chiffres ni de caractères spéciaux</p>
                        </div>
                        <div class="input-group">
                            <label for="city_modal" class="hide"></label>
                            <select name="city" id="city_modal">
                                <option value="0">Ville</option>
                            </select>
                        </div>
                        <div class="input">
                            <div class="relative">
                                <input type="text" id="adresse"
                                       name="adresse"
                                       class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                       placeholder=" "/>
                                <label for="adresse"
                                       class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Adresse</label>
                            </div>
                            <p class="error">le nom ne peut pas contenir de chiffres ni de caractères spéciaux</p>
                        </div>
                        <div class="input-group">
                            <label for="category_select" class="hide"></label>
                            <select name="category" id="category_select">
                                <option value="0">Category</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="type_modal" class="hide"></label>
                            <select name="type" id="type_modal">
                                <option value="0">Type</option>
                            </select>
                        </div>
                        <div class="input">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                   for="file_input">Image principale</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                   id="file_input" type="file">
                        </div>
                        <div class="input">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                   for="file_input">Images</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                   id="file_input" type="file" multiple>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://kit.fontawesome.com/a5fdcae6a3.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>
