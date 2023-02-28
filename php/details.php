<?php
session_start();
require_once 'dbconfig.php';
$id_annonce = $_GET['id'];
$sqlState = $conn->prepare("SELECT * FROM announcements WHERE id=?");
$sqlState->execute([$id_annonce]);
$row = $sqlState->fetch(PDO::FETCH_ASSOC);


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
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include "css_cdns.php" ?>
    <link rel="stylesheet" href="../css/details.css">
    <title>
        <?= $row["title"] ?>
    </title>
</head>

<body>
    <style>


        .upload {
            width: 519px;
            position: relative;
            margin: auto;
            text-align: center;
        }

        .uploads {
            width: 209px;
            position: relative;
            margin: auto;
            text-align: center;
        }

        .container-image {
            display: flex;
            flex-direction: inherit;
        }
        .upload img {
            /* border-radius: 50%; */
            border: 8px solid #DCDCDC;
            width: 506px;
            height: 270px;
        }
        .upload img {
            /* border-radius: 50%; */
            border: 8px solid #DCDCDC;
            width: 506px;
            height: 270px;
        }

        .upload .rightRound {
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

        .uploads .rightRound {
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

        .uploads img {
            /* border-radius: 50%; */
            border: 8px solid #DCDCDC;
            width: 243px;
            height: 156px;
        }

        .fa-regular {
            color: #ffff;
        }

        .upload .leftRound {
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
        .uploads .leftRound {
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

        .upload .fa {
            color: white;
        }


        .uploads .fa {
            color: white;
        }

        .uploads input {
            position: absolute;
            transform: scale(2);
            opacity: 0;
        }
        .upload input {
            position: absolute;
            transform: scale(2);
            opacity: 0;
        }

        .uploads input::-webkit-file-upload-button,
        .uploads input[type=submit] {
            cursor: pointer;
        }
        .upload input::-webkit-file-upload-button,
        .upload input[type=submit] {
            cursor: pointer;
        }
    </style>
    <nav>
        <div id="logo">
            <i class="fa-solid fa-house-chimney"></i>
            <span>House Miner</span>
        </div>
        <?php include "navbar.php"; ?>
    </nav>
    <!-- Main modal -->
    <div id="crypto-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    data-modal-hide="crypto-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <!-- Modal header -->
                <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">

                    <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                        Number phone
                    </h3>
                </div>
                <!-- Modal body -->
                <div class="p-4">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class=" w-10 h-10 flex-shrink-0">
                            <img class=" rounded-full" src="../files/profiles/<?= $profile_pic ?>" alt="Neil image">
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                                <?= $name . ' ' . $last_name ?>
                            </p>

                        </div>
                    </div>
                    <a href="#"
                        class="flex items-center p-1 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">

                        <i class="fa-solid fa-square-phone"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap" id="text-to-copy">
                            <?= $phone_number ?>
                        </span>
                        <span onclick="copyToClipboard()"
                            class="inline-flex items-center justify-center  ml-3 font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400 apple"><i
                                class="fa-solid fa-copy"></i></span>
                    </a>
                    <span id="output"
                        class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="carouselExampleControlsNoTouching" class="carousel slide carousel-fade mt-4 rounded"
            data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php
                $statement_pic = $conn->query("SELECT * FROM pictures WHERE announcement_id = '$id_annonce'")->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <?php
                foreach ($statement_pic as $index => $statement_p) {
                    if ($index == 0) {
                        echo '<div class="carousel-item w-100 active">';
                    } else {
                        echo '<div class="carousel-item w-100">';
                    }

                    echo '<img src="' . $statement_p['path'] . '" class="d-block rounded" >';
                    echo '</div>';
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Carousel wrapper -->
        <div class="details">
            <div class="head">
                <h4>
                    <?php echo $row['title'] ?>
                </h4>
                <div class=" adresse">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>
                        <?php echo $row['adresse'] ?> ,
                        <?php echo $row['city'] ?>
                    </p>
                </div>
            </div>
            <div class="section" id="description">
                <h6>Description</h6>
                <div>
                    <p><span>Catégorie d'annonce:</span><span>
                            <?= $row["category"] ?>
                        </span></p>
                    <p><span>Type d'annonce:</span><span>
                            <?= $row["type"] ?>
                        </span></p>
                    <p><span>Superficie totale:</span><span>
                            <?= $row["area"] ?>m²
                        </span></p>
                </div>
                <p>
                    <?php echo $row['description'] ?>
                </p>
            </div>
            <div class="section">
                <h6>Map</h6>
                <div class="map">
                    <iframe
                        src="https://maps.google.com/maps?q=<?= $row["adresse"] ?>&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                </div>
            </div>
            <div class="section" id="price">
                <h6>Price</h6>
                <p>$
                    <?php echo number_format($row['price'], 2) ?>
                </p>
            </div>
        </div>
        <!-- phone -->
        <div class="fixed-div fixed right-6 bottom-6">
            <div data-dial-init class=" group">
                <button type="button" data-modal-target="crypto-modal" data-modal-toggle="crypto-modal"
                    data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default"
                    aria-expanded="false"
                    class="flex items-center justify-center phone-button text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
                    <i class="fa-solid fa-phone"></i>
                    <span class="sr-only">Open actions menu</span>
                </button>
            </div>
            <div class="settings">
                <button class="type='button'" data-bs-toggle='modal' data-bs-target='#edit_announcement'>
                    <i class="fa-solid fa-gear"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit_announcement" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modifier une annonce</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="update.php?id=<?= $row["id"] ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="all d-flex flex-row gap-4">
                            <div class="left d-flex flex-col gap-4 w-100">
                                <div class="input">
                                    <div class="relative">
                                        <input type="text" id="title" name="title"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="title"
                                            class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Titre</label>
                                    </div>
                                    <p class="error">le nom ne peut pas contenir de chiffres ni de caractères
                                        spéciaux</p>
                                </div>
                                <div class="input">
                                    <div class="relative">
                                        <input type="number" id="price_modal" name="price"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="price_modal"
                                            class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Price</label>
                                    </div>
                                    <p class="error">le nom ne peut pas contenir de chiffres ni de caractères
                                        spéciaux</p>
                                </div>
                                <div class="input">
                                    <div class="relative">
                                        <input type="text" id="area" name="area"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
                                        <label for="area"
                                            class="absolute text-sm  duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] px-2 peer-focus:px-2 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Area
                                            (m²)</label>
                                    </div>
                                    <p class="error">le nom ne peut pas contenir de chiffres ni de caractères
                                        spéciaux</p>
                                </div>
                                <div class="input">
                                    <div class="relative">
                                        <input type="text" id="adresse" name="adresse"
                                            class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " required />
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
                                        include "api.php"
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
                                        <option value="vente">Vente</option>
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
                            <?php
                            $primary_pic = $conn->query("SELECT * FROM pictures WHERE announcement_id = '$id_annonce' AND `primary` = 1")->fetchAll(PDO::FETCH_ASSOC);
                            $image_primary = $primary_pic[0]["path"];
                            ?>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                   for="file_input">Image principale</label>
                            <div class="upload">

                                <div id="affishier-img">
                                    <img src="<?= $image_primary ?>" id="image">
                                </div>

                                <div class="rightRound" id="upload">
                                    <input type="file" name="primary" id="primary" accept=".jpg, .jpeg, .png">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </div>

                                <div class="leftRound" id="cancel" style="display: none;">
                                    <i class="fa-regular fa-trash-can"></i>
                                </div>
                                <div class="rightRound" id="confirm" style="display: none;">
                                    <input type="submit">
                                    <i class="fa fa-check"></i>
                                </div>
                            </div>

                            <!-- secondaire_pic -->

                            <label class=' mt-4  block mb-2 text-sm font-medium text-gray-900 dark:text-white'
                                    for='file_input'>Image secondaire</label>
                            <div class="container-image  mb-4 ">

                            <?php
                            $secondaire_pic = $conn->query("SELECT * FROM pictures WHERE announcement_id = '$id_annonce' AND `primary` = 0")->fetchAll(PDO::FETCH_ASSOC);

                            for ($i = 0; $i < count($secondaire_pic); $i++) {
                                $image_secondaire = $secondaire_pic[$i]["path"];

                                echo "
                                <div class='uploads d-flex'>
                               
                                <div id='affishier-img' >
                                    <img src='$image_secondaire' id='images'>
                                </div>

                                <div class='rightRound' id='uploads'>
                                    <input type='file' name='pictures' id='pictures' accept='.jpg, .jpeg, .png'>                                    <i class='fa-regular fa-pen-to-square'></i>
                                    <i class='fa-regular fa-pen-to-square'></i> 
                                </div>

                                <div class='leftRound' id='cancels' style='display: none;'>
                                    <i class='fa fa-times'></i>
                                </div>
                                <div class='rightRound' id='confirms' style='display: none;'>

                                    <i class='fa fa-check'></i>
                                </div>
                            </div>
                                ";
                            }

                            ?>

                            </div>

                            <div class="input">
                                <label for="description_modal"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea required id="description_modal" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="description" placeholder="Write your description here..."></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button name="update" value="updatBtn" type="submit"
                                class="btn bg-dark text-white">Modifier</button>
                        </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    include 'js_cdns.php';
    ?>
    <script>

        function copyToClipboard() {
            // Get the text to copy
            let textToCopy = document.getElementById("text-to-copy").innerText;

            // Copy the text to the clipboard
            navigator.clipboard.writeText(textToCopy);

            // Display the copied text in the output element
            let outputElement = document.getElementById("output");
            outputElement.innerText = "Copied  Number phone: " + textToCopy;
        }
    </script>
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

<script type="text/javascript">
        document.getElementById("pictures").onchange = function () {
            document.getElementById("images").src = URL.createObjectURL(pictures.files[0]); // Preview new image

            document.getElementById("cancels").style.display = "block";
            document.getElementById("confirms").style.display = "block";

            document.getElementById("uploads").style.display = "none";
        }

        var userImage = document.getElementById('images').src;
        document.getElementById("cancels").onclick = function () {
            document.getElementById("images").src = userImage; // Back to previous image

            document.getElementById("cancels").style.display = "none";
            document.getElementById("confirms").style.display = "none";

            document.getElementById("uploads").style.display = "block";
        }


    </script>
    <script src="../javascript/dropdrown.js"></script>
    <script src="../javascript/details.js"></script>
</body>

</html>