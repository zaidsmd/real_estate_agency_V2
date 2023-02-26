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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://kit.fontawesome.com/6011b958cb.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    


<!-- Main modal -->
<div id="crypto-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="crypto-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
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
                <ul class="my-4 space-y-3">
                    <li>
                        <a href="#" class="flex items-center p-1 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                        <i class="fa-solid fa-square-phone"></i>                            
                        <span class="flex-1 ml-3 whitespace-nowrap"><?= $phone_number ?></span>
                            
                        <span class="inline-flex items-center justify-center px-2 py-0.5 ml-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400">Appel</span>
                        </a>
                    </li>
            </div>
        </div>
    </div>
</div>

    <style>
        @media (min-width: 768px){
        .md\:h-96 {
            height: 37rem;
            
            
        }

        .relative {
            width: 100%;
            margin-right: auto; 
            margin-left: auto;
            
        }
        }
        @media (min-width: 992px){
            .container, .container-lg, .container-md, .container-sm {
                max-width: 737px;
        }
        }
        .details {
            max-width: 737px;
            height: 95vh;
            background-color :#F7FAFF;
        }
        h6 , h4 {
            color : #6271DD!important; 
            
        }
        blockquote {
            font-size :1rem!important;
        }
        #Description {
            margin-top :35px!important;
        }
        hr  {
            background-color : #6271DD!important; 
        }
        .divide-y {
            margin-top : 30px!important;
        }
        .text-base {
            font-size: 1.5rem;
            line-height: -0.5rem;
        }
        .p-4 {
            padding: 0.5rem!important;
        }
        

    </style>
    <div class="container  ">
        

    <!-- Carousel wrapper -->
   
        <!-- Item 1 -->
        <?php
            $statement_pic = $conn->query("SELECT * FROM pictures WHERE announcement_id = '$id_annonce'")->fetchAll(PDO::FETCH_ASSOC);
           ?>

           <?php

            foreach ($statement_pic as $statement_p) {

       
            echo "
            <div id='indicators-carousel' class='relative ' data-carousel='static'>
            <div class='hidden duration-700 ease-in-out' data-carousel-item='active'>
             <div class='relative h-56  overflow-hidden rounded-lg md:h-96'>

            <img src=".$statement_p['path']."
            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" >
                 

            </div>
            </div>
            </div>";
        
        }
        ?>
         
        <!-- <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src=""
                 class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>

        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://ghost.playplay.com/content/images/2020/10/video-immobilier.jpg"
                 class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>

        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://ghost.playplay.com/content/images/2020/10/video-immobilier.jpg"
                 class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>

        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://ghost.playplay.com/content/images/2020/10/video-immobilier.jpg"
                 class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div> -->
  

    </div>
            
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
    <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


<div class="details pl-5 mb-5 pt-2  rounded mt-3">
    <div class="container mt-4 ">
        <h4><i class='fa-brands fa-battle-net'></i><span class='ms-1 '><?php echo $row['title'] ?></span></h4>
        
   
        
<ul class="space-y-4 text-gray-500 list-disc list-inside dark:text-gray-400 mt-4">
  
    <h6><li id="Description">Description</li></h6></li>

    <ol class="pl-5 mt-2 space-y-1 list-decimal list-inside">
            
        <blockquote class="text-xl italic font-semibold text-gray-500 dark:text-white">
            <p>"<?php echo $row['Description'] ?>"</p>
        </blockquote>

    </ol>
<hr class="w-48 h-10 mx-auto my-4 bg-gray-500 border-0 rounded md:my-10 dark:bg-gray-700">

    <h6><li class="mt-4">Adresse</li></h6></li>

    
        <ul class="pl-5 mt-2 space-y-1 list-decimal list-inside">
            <span><i class="fa-solid fa-location-dot"></i> <?php echo $row['country'] ?> <?php echo $row['adresse'] ?> ,<?php echo $row['city'] ?></span>
           
        </ul>
        <hr class="w-48 h-10 mx-auto my-4 bg-gray-500 border-0 rounded md:my-10 dark:bg-gray-700">

    <h6><li class="mt-4">Contact</li></h6></li>
     
    <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700 ">
        <li class="pb-3 sm:pb-4 ">
            <div class="flex items-center space-x-4 ">
                <div class="flex-shrink-0">
                    <img class="w-8 h-8 rounded-full" src="<?=$profile_pic ?>" alt="Neil image">
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-medium text-gray-900 truncate dark:text-white">
                    <?= $name . ' ' . $last_name ?>
                    </p>
                    <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                    <?= $email ?>
                    </p>
                </div>
            </div>
        </li>
    </ul>
    <hr class="w-48 h-10 mx-auto my-4 bg-gray-500 border-0 rounded md:my-10 dark:bg-gray-700">

    <h6><li>Price</li></h6></li>
    <ul class="pl-5 mt-2 text-xl italic font-semibold text-gray-700 dark:text-black">
        <span>$ <?php echo $row['price'] ?></span>
    </ul>
 
</ul>
</div>
</div>
</div>

<!-- phone -->
<div data-dial-init class="fixed right-6 bottom-6 group">    
    <button type="button" data-modal-target="crypto-modal" data-modal-toggle="crypto-modal" data-dial-toggle="speed-dial-menu-default" aria-controls="speed-dial-menu-default" aria-expanded="false" class="flex items-center justify-center text-white bg-blue-700 rounded-full w-14 h-14 hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 focus:outline-none dark:focus:ring-blue-800">
    <i class="fa-solid fa-phone"></i>
        <span class="sr-only">Open actions menu</span>
    </button>
</div>

</body>
<?php
include 'js_cdns.php';
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</html>