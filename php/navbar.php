<nav>
    <div id="logo">
        <i class="fa-solid fa-house-chimney"></i>
        <span>House Miner</span>
    </div>
<?php
include_once "php/dbconfig.php";
   if (isset($_COOKIE["user"])){
       $id = $_COOKIE["user"]["id"];
       $statement = $conn->prepare("SELECT * FROM `users` WHERE id = '$id'");
       $statement->execute();
       $result = $statement->fetchAll();
       if (count($result)>0){
           if ($_COOKIE["user"]["email"] == $result[0]["email"] && $_COOKIE["user"]["pwd"] == $result[0]["password"]){
           ?>
           <div class="navbar">
               <ul class="nav-list">
                   <li class="nav-item">
                       <a href="index.php" class=" active nav-link">Home</a>
                   </li>
                   <li class="nav-item">
                       <a href="" class="nav-link">Listings</a>
                   </li>
               </ul>
               <button class="add-announcement"></button>
           </div>
           <a href="php/profile.php">
               <div class="profile">
                   <img src="<?= $result[0]["profile_pic"]?>" alt="">
               </div>
           </a>
       <?php }else {
           echo"<a id='login-home' href='php/login.php'>Se connecter</a>";
       }
   } else {
       echo "<a id='login-home' href='php/login.php'>Se connecter</a>";
   }}else {
       echo "<a id='login-home' href='php/login.php'>Se connecter</a>";
   }
   ?>
</nav>
