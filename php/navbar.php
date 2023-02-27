<?php
$thisFile = explode("/", $_SERVER["PHP_SELF"])[count(explode("/", $_SERVER["PHP_SELF"])) - 1];
if ($thisFile == "index.php") {
    $profilePHPDirectory = "php/profile.php";
    $listingsPHPDirectory = "php/listings.php";
    $logoutPHPDirectory = "php/logout.php";
    $profileDirectory = "files/profiles/";
    $rootDirectory = "";
} else {
    $profilePHPDirectory = "profile.php";
    $listingsPHPDirectory = "listings.php";
    $logoutPHPDirectory = "logout";
    $profileDirectory = "../files/profiles/";
    $rootDirectory = "../";
}
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
<div class="navbar">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="<?= $rootDirectory ?>" class=" <?php echo ($thisFile == "index.php") ? "active" : "" ?> nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="<?= $listingsPHPDirectory ?>"
               class="<?php echo ($thisFile == "listings.php") ? "active" : "" ?> nav-link">Listings</a>
        </li>
    </ul>
    <?php echo ($thisFile == "profile.php" || $thisFile == "details.php") ? "" : "<button class='add-announcement' type='button' data-bs-toggle='modal'data-bs-target='#add_announcement'>Ajouter une announce</button>" ?>
</div>
<div class="position-relative">
    <button id="dropdownUserAvatarButton"
            class="flex mx-3 text-sm rounded-full md:mr-0 focus:ring-4 profile">
        <img src='<?= $profileDirectory . $profile_pic ?>' alt="">
        <span><?= $name . ' ' . $last_name ?> </span>
    </button>
    <div id="dropdownAvatar"
         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <p class="text-center"><?= $name . ' ' . $last_name ?></p>
            <div class="font-medium truncate"><?= $email ?></div>
        </div>
        <a href="<?= $profilePHPDirectory ?>"
           class=" px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Paramètres</a>
        <div class="py-2">
            <a href="<?= $logoutPHPDirectory ?>"
               class="logout px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                <span>Se déconnecter </span>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </div>
</div>
