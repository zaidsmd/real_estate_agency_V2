<nav>
    <div id="logo">
        <i class="fa-solid fa-house-chimney"></i>
        <span>House Miner</span>
    </div>
    <?php
    include "dbconfig.php";
    session_start();
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
                        <a href="index.php" class=" active nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="listings.php" class="nav-link">Listings</a>
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


