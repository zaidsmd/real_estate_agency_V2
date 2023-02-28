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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "css_cdns.php" ?>
    <link rel="stylesheet" href="../css/profile.css">
    <title>Settings</title>
</head>
<body>
<nav>
    <div id="logo">
        <i class="fa-solid fa-house-chimney"></i>
        <span>House Miner</span>
    </div>
    <?php
    include "navbar.php";
    ?>
</nav>
<?php
if (isset($_GET["response"])) {
    if ($_GET["response"] == "true") {
        echo "<p class='response true'>Vos informations ont été mises à jour avec succès</p>";
    } else {
        echo "<p class='response false'>Mot de pass incorrect</p>";
    }
}
?>
<main>


    <style media="screen">
        .upload{
            width: 140px;
            position: relative;
            margin: auto;
            text-align: center;
        }
        .upload img{
            border-radius: 50%;
            border: 8px solid #DCDCDC;
            width: 125px;
            height: 125px;
        }
        .upload .rightRound{
            position: absolute;
            bottom: 0;
            right: 0;
            background: #00B4FF;
            width: 32px;
            height: 32px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }
        .upload .leftRound{
            position: absolute;
            bottom: 0;
            left: 0;
            background: red;
            width: 32px;
            height: 32px;
            line-height: 33px;
            text-align: center;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }
        .upload .fa{
            color: white;
        }
        .upload input{
            position: absolute;
            transform: scale(2);
            opacity: 0;
        }
        .upload input::-webkit-file-upload-button, .upload input[type=submit]{
            cursor: pointer;
        }

        #upload{
            margin-right: 1.1rem;
        }

        .fa-regular {
            color: #F6F6F6;
        }
        main form {
            padding: 0rem 0rem!important;
            gap: 1.5rem;
        }

        #information {
            padding: 3rem 3rem!important;
        }

        #upload {
            background-color: #6271DD;
        }

        .left div h6 {
            text-align: center;

        }
    </style>





    <div class="left">
        <div>
            <form  action="update_img_profil.php" enctype="multipart/form-data" method="post">
                <div class="upload">
                    <div id="affishier-img">
                        <img src="../files/profiles/<?= $profile_pic ?>" id="image">
                    </div>

                    <div class="rightRound" id="upload">
                        <input type="file" name="primary" id="primary" accept=".jpg, .jpeg, .png">
                        <i class="fa-regular fa-pen-to-square"></i>
                    </div>

                    <div class="leftRound" id="cancel" style="display: none;">
                        <i class="fa-regular fa-trash-can"></i>
                    </div>
                    <div class="rightRound" id="confirm" style="display: none;">
                        <input type="submit" name="update">
                        <i class="fa fa-check"></i>
                    </div>
            </div>
            </form>

            <script type="text/javascript">
                document.getElementById("primary").onchange = function () {
                    document.getElementById("image").src = URL.createObjectURL(primary.files[0]); // Preview new image

                    document.getElementById("cancel").style.display = "block";
                    document.getElementById("confirm").style.display = "block";

                    document.getElementById("upload").style.display = "none";
                }

                var userImage = document.getElementById('image').src;
                document.getElementById("cancel").onclick = function () {
                    document.getElementById("image").src = userImage; // Back to previous image

                    document.getElementById("cancel").style.display = "none";
                    document.getElementById("confirm").style.display = "none";

                    document.getElementById("upload").style.display = "block";
                }


            </script>

            <h6 class="text-align-center"><?= $name . ' ' . $last_name ?></h6>
        </div>
        <div>
            <button class="btn btn-outline-danger w-100" type="button" data-bs-toggle="modal"
                    data-bs-target="#password_change">Changer le mot de passe
            </button>
            <a type="button" href="logout.php" class="btn btn-danger"><i
                        class="fa-solid fa-arrow-right-from-bracket"></i> Se
                déconnecter</a>
        </div>
    </div>
    <form method="POST" id="information" enctype="multipart/form-data">
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
            <label for="tel">Telephone</label>
            <div class="input-group">
                <input disabled type="text" id="tel" name="phone_number" class="form-control"
                       value="<?= $phone_number ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary"
                        onclick="this.previousElementSibling.toggleAttribute('disabled'); this.classList.toggle('clicked')"
                        type="button"><i class="fa-regular fa-pen-to-square"></i></button>
            </div>
        </div>
        <div class="d-flex justify-content-end ">
            <button class="btn btn-primary " type="button" data-bs-toggle="modal"
                    data-bs-target="#password_confirmation" id="save-changes">
                Enregistrer <i class="fa-solid fa-inbox"></i></button>
        </div>

    </form>
</main>
<div class="modal fade" id="password_confirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmer votre identité</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update_user.php" method="get">
                <div class="modal-body">
                    <div class="error">
                        <p>Veuillez saisir un mot de pass</p>
                        <p>Veuillez saisir une adresse e-mail valide</p>
                        <p>Veuillez saisir un numéro de téléphone valide</p>
                    </div>
                    <div class="relative">
                        <input type="password" id="password"
                               name="pwd"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" "/>
                        <label for="password"
                               class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Mot
                            de pass</label>
                    </div>
                    <input type="text" name="email" id="email_modal" class="hidden">
                    <input type="text" name="tel" id="tel_modal" class="hidden">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="password_change" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmer votre identité</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update_user.php" method="get">
                <div class="modal-body">
                    <div class="error">
                        <p>Veuillez remplir tous les champs</p>
                        <p>veuillez entrer un mot de passe plus fort</p>
                        <p>les nouveaux mots de passe ne correspondent pas</p>
                    </div>
                    <div class="relative">
                        <input type="password" id="old_password"
                               name="old_pwd"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1
                               border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                                focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" "/>
                        <label for="old_password"
                               class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0]
                               px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2
                               peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                            Mot de passe actuel
                        </label>
                    </div>
                    <div class="relative">
                        <input type="password" id="new_password"
                               name="new_pwd"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" "/>
                        <label for="new_password"
                               class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2
                               peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2
                               peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">
                            Nouveau mot de passe
                        </label>
                    </div>
                    <div class="relative">
                        <input type="password" id="new_password_confirm"
                               name="new_pwd_confirm"
                               class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                               placeholder=" "/>
                        <label for="new_password_confirm"
                               class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0]
                               px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2
                               peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4
                               left-1">
                            Confirmez le nouveau mot de passe
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "js_cdns.php" ?>
<script src="../javascript/profile.js"></script>
<script src="../javascript/dropdrown.js"></script>
</body>
</html>