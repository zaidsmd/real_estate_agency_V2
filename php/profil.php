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
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://kit.fontawesome.com/6011b958cb.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <title>Settings</title>
</head>
<body>
<?php
$id = $_SESSION["id"];
$statement = $conn->prepare("SELECT * FROM `users` WHERE `id` = '$id'");
$statement->execute();
$result = $statement->fetchAll();
$profile_pic = $result[0]["profile_pic"];
$name = $result[0]["name"];
$last_name = $result[0]["last_name"];
$email = $result[0]["email"];
$phone_number = $result[0]["phone_number"];
?>
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
                <a href="listings.php" class="nav-link">Listings</a>
            </li>
        </ul>
    </div>
    <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar"
            class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-4 profile">
        <img src='../files/profiles/<?= $profile_pic ?>' alt="">
        <span><?= $name . ' ' . $last_name ?> </span>
    </button>
    <div id="dropdownAvatar"
         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <p class="text-center"><?= $name . ' ' . $last_name ?></p>
            <div class="font-medium truncate"><?= $email ?></div>
        </div>
        <a href="profil.php"
           class=" px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paramètres</a>
        <div class="py-2">
            <a href="logout.php"
               class="logout px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                <span>Se déconnecter </span>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </div>
</nav>
<main>
    <div class="left">
        <div>
            <div class="img">
                <img src="../files/profiles/<?= $profile_pic ?>" alt="">
            </div>
            <h6 class=""><?= $name . ' ' . $last_name ?></h6>
        </div>
        <div>
            <button class="btn btn-outline-danger w-100" type="button" data-bs-toggle="modal"
                    data-bs-target="#Modezddal">Changer le mot de passe
            </button>
            <a type="button" href="logout.php" class="btn btn-danger"><i
                        class="fa-solid fa-arrow-right-from-bracket"></i> Se
                déconnecter</a>
        </div>
    </div>
    <form method="POST" enctype="multipart/form-data">
        <h3>Information personnels</h3>
        <div>
            <label for="email" class="">Email</label>
            <div class="input-group">
                <input disabled type="text" id="email" name="email" class="form-control mx-auto"
                       placeholder="Recipient's username" aria-label="Recipient's username"
                       aria-describedby="button-addon2" value="<?= $email ?>">
                <button class="btn btn-outline-secondary"
                        onclick="this.previousElementSibling.toggleAttribute('disabled'); this.classList.toggle('clicked')"
                        type="button"><i class="fa-regular fa-pen-to-square"></i></button>
            </div>
        </div>
        <div>
            <label for="btn">Telephone</label>
            <div class="input-group">
                <input disabled type="text" id="btn" name="phone_number" class="form-control" placeholder="numbre phone"
                       value="<?= $phone_number ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary"
                        onclick="this.previousElementSibling.toggleAttribute('disabled'); this.classList.toggle('clicked')"
                        type="button"><i class="fa-regular fa-pen-to-square"></i></button>
            </div>
        </div>
        <div class="d-flex justify-content-end ">
            <button class="btn btn-primary " type="button" data-bs-toggle="modal"
                    data-bs-target="#password_confirmation">
                Enregistrer <i class="fa-solid fa-inbox"></i></button>
        </div>

    </form>
</main>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit profile</h4>
            </div>
            <div class="container">
                <div class="mb-4 mt-3">
                    <label for="btn" class="mb-2"> Mot de passe actuel</label>
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder=" MOT DE PASSE ACTUEL"
                               aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                    <hr>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3 mb-3">
                        <button class="btn btn-outline-primary" type="button">Annuler</button>
                        <button class="btn btn-primary" type="button">Terminé</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="Modezddal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Changer le mot de passe </h4>
            </div>
            <div class="container">
                <div class="mb-4 mt-3">
                    <label for="btn" class="mb-2"> Mot de passe actuel</label>
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder=" MOT DE PASSE ACTUEL"
                               aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>

                </div>
                <div class="mb-4 mt-3">
                    <label for="btn" class="mb-2"> Mot de passe actuel</label>
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder=" MOT DE PASSE ACTUEL"
                               aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>

                </div>
                <div class="mb-4 mt-3">
                    <label for="btn" class="mb-2"> Mot de passe actuel</label>
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder=" MOT DE PASSE ACTUEL"
                               aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                    <hr>
                </div>
                <div class="d-grid gap-2 d-flex justify-content-end mt-3 mb-3">
                    <button class="btn btn-outline-primary" type="button">Annuler</button>
                    <button class="btn btn-primary" type="button">Terminé</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="password_confirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmer votre identité</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="relative">
                    <input type="password" id="password"
                           name="pwd"
                           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" "/>
                    <label for="password"
                           class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Mot
                        de pass</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Sauvegarder</button>
            </div>
        </div>
    </div>
</div>
<!-- Link to Bootstrap JavaScript file -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a5fdcae6a3.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>