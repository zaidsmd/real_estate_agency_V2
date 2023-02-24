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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
              crossorigin="anonymous">
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
                    <button class="add-announcement" type="button" data-bs-toggle="modal"
                            data-bs-target="#add_announcement">Ajouter une announce
                    </button>
                </div>
                <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
                        class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-4 profile">
                    <img src='files/profiles/<?= $profile_pic ?>' alt="">
                    <span><?= $name . ' ' . $last_name ?> </span>
                </button>
                <div id="dropdownAvatar"
                     class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <p class="text-center"><?= $name . ' ' . $last_name ?></p>
                        <div class="font-medium truncate"><?= $email ?></div>
                    </div>
                    <a href="php/profil.php"
                       class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paramètres</a>
                    <div class="py-2">
                        <a href="php/logout.php"
                           class=" logout px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <span>Se déconnecter </span>
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </a>
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
            <div class="cards d-flex flex-wrap justify-content-lg-around justify-content-md-around">
                <?php
                $statement = $conn->prepare("SELECT * FROM `announcements`");
                $statement->execute();
                $result = $statement->fetchAll();
                createCard($result);
                ?>
            </div>
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
                    <form action="php/add.php" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="all d-flex flex-row gap-4">
                                <div class="left d-flex flex-col gap-4 w-100">
                                    <div class="input">
                                        <div class="relative">
                                            <input type="text" id="title"
                                                   name="title"
                                                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                   placeholder=" " required/>
                                            <label for="title"
                                                   class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Titre</label>
                                        </div>
                                        <p class="error">le nom ne peut pas contenir de chiffres ni de caractères
                                            spéciaux</p>
                                    </div>
                                    <div class="input">
                                        <div class="relative">
                                            <input type="number" id="price_modal"
                                                   name="price"
                                                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                   placeholder=" " required/>
                                            <label for="price_modal"
                                                   class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Price</label>
                                        </div>
                                        <p class="error">le nom ne peut pas contenir de chiffres ni de caractères
                                            spéciaux</p>
                                    </div>
                                    <div class="input">
                                        <div class="relative">
                                            <input type="text" id="area"
                                                   name="area"
                                                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                   placeholder=" " required/>
                                            <label for="area"
                                                   class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Area (m²)</label>
                                        </div>
                                        <p class="error">le nom ne peut pas contenir de chiffres ni de caractères
                                            spéciaux</p>
                                    </div>
                                    <div class="input">
                                        <div class="relative">
                                            <input type="text" id="adresse"
                                                   name="adresse"
                                                   class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                                   placeholder=" " required/>
                                            <label for="adresse"
                                                   class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Adresse</label>
                                        </div>
                                        <p class="error">le nom ne peut pas contenir de chiffres ni de caractères
                                            spéciaux</p>
                                    </div>
                                </div>
                                <div class="right d-flex flex-col gap-4 w-100">
                                    <div class="input-group">
                                        <label for="country" class="hide"></label>
                                        <select name="country" id="country" required>
                                            <option selected disabled>Country</option>
                                          <?php
                                          include "php/api.php"
                                          ?>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="city_modal" class="hide"></label>
                                        <select name="city" id="city_modal" required>
                                            <option value="0" selected disabled>Ville</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="category_select" class="hide"></label>
                                        <select name="category" id="category_select" required>
                                            <option value="0">Category</option>
                                            <option value="Vente">vente</option>
                                            <option value="location">Location</option>
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <label for="type_modal" class="hide"></label>
                                        <select name="type" id="type_modal" required>
                                            <option value="0">Type</option>
                                            <option value="appartement">Appartement</option>
                                            <option value="maison">Maison</option>
                                            <option value="villa">Villa</option>
                                            <option value="bureau">Bureau</option>
                                            <option value="terrain">Terrain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                       for="file_input">Image principale</label>
                                <input required
                                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                       name="primary"
                                       id="file_input" type="file">
                            </div>
                            <div class="input">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                       for="pictures">Images</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                       name="pictures[]"
                                       id="pictures" type="file" multiple>
                            </div>
                            <div class="input">
                                <label for="description"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea required id="description" rows="4"
                                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                          name="description" placeholder="Write your description here..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="javascript/script.js" ></script>
    <script src="https://kit.fontawesome.com/a5fdcae6a3.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
    </body>
    </html>
<?php
function createCard($data)
{
// I had to check if there is data bcs we have search data too,
// if there is no matching data requested the user should know, so he doesn't think that the website is broken;
    if ($data != null) {
        foreach ($data as $row) {
                //you can notice that there is onclick function that takes the all data of the card and pass it to the js to be used onclick to affiche all data
            ?>
            <div class="card-container">
                <div class="card">
                    <div class="card-img">
                        <img src="files/6/placeholder-4.png"
                             class="card-img-top" alt="">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><?= $row["title"]?></h4>
                        <div class="tags">
                            <div class="tag"><?=$row["category"]?></div>
                            <div class="tag"><?=$row["area"]?>m²</div>
                        </div>
                        <div class="adresse"><?=$row["adresse"]?></div>
                        <div class="price-date d-flex flex-row align-items-center justify-between">
                            <p class="price"><?=number_format($row["price"],2)?> </p> <span><?=$row["update"]?></span>
                        </div>
                        <div class="footer d-flex flex-row justify-between align-items-center">
                            <div class="city">
                                <i class="fa-sharp fa-solid fa-location-dot"></i><span<?=$row["city"]?></span>
                            </div>
                            <a href="php/details.php?id=<?=$row["id"]?>" class="btn btn-primary">Voir Plus</a>
                        </div>
                    </div>
                </div>
            </div> <?php
        }
    } else {
        echo "<div class='notFound d-flex flex-column gap-2'>
    <i class='fa-solid fa-house-circle-xmark'></i>
    <h2>Sorry there is no matching article at the moment</h2>
</div>";
    }
}

