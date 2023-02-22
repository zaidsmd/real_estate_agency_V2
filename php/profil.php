<?php
include_once "dbconfig.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://kit.fontawesome.com/6011b958cb.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .break {
        height: 100vh!important;
    }
    .dashbord {
        background-color: #F7FAFF;
    }
    img {
        width: 50%;
    }
    h6 , h3{
        color: #6271DD;
        margin-top: 1em;
        margin-left:-25PX;
    }
    .btn-danger {
        margin-bottom: -55rem;
        margin-left: 3rem;
    }
    .btn-outline-secondary {
        border: solid 1.5px #6271DD;
        border-left:none ;
        
    }
    #btn {
        border: solid 1.5px #6271DD;
        border-right:#ffff ;
    }
    
    .profil {
        margin-left: 4.2em;
    }
    #fishier {
        border: solid 1.5px #6271DD;
        
    }
    label {
        color: #6271DD;
    }
    .btn-primary {
        background-color: #6271DD;
        padding: 0.5em 2em 0.5em 2em ;
    } 
    .btn-outline-danger , .btn-outline-primary {
        padding: 0.5em 2em 0.5em 2em ;
    }
    
</style>
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
    

    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    

    do {
        if(empty($email) || empty($phone_number) ) {
            $errorMessage = "All the fields are required";
            break ;
        }
        
        $sql = "UPDATE users " .
                "SET email = '$email' , phone_number = '$phone_number'" .
                "WHERE id = $id";

        $result = $conn->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query : " . $conn->error;
            break;
        }

        $successMessage = "Client updated correctly" ;

        
} while (false);


    ?>


<form method="POST" enctype="multipart/form-data">
    
        <div class="row break bg-blend-multiply  w-100 ">
            <div class="col-sm-2 p-3 mb-2 dashbord  text-white  h-100 ">
                <div class=" mt-8 profil">
                    <img src="<?= $profile_pic ?>"  alt="">
                    <h6 class=""><?= $name . ' ' . $last_name ?></h6>
                </div>
                <div class="ml-3 p-2 ">
                    <a type="button" href="index.php" class="btn btn-danger"><i class="fa-solid fa-arrow-right-from-bracket"></i> log out </a>

                </div>
            </div>
            
            <div class="col-sm-8 mt-5 bg-\[\#1da1f2\] mx-auto ">
            <h3>Modifie ton profil d'utilisateur</h3>
                <div class="mb-4 mt-5">
                    <label for="btn" class="mb-2">Email</label>
                    <div class="input-group mb-3 ">
                        <input type="text" id="btn" name="email" class="form-control mx-auto" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2" value="<?= $email ?>">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="btn" class="mb-2">numbre phone</label>
                    <div class="input-group mb-3 ">
                        <input type="text" id="btn" name="phone_number" class="form-control" placeholder="numbre phone" value="<?= $phone_number ?>" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="btn" class="mb-2">Annonce image(jpg-png-jpeg-webp)</label>
                    <div class="input-group mb-3 ">
                        <input type="file" id="fishier" class="form-control" placeholder="CONFIRMER LE NOUVEAU MOT DE PASSE" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                </div>
                <div class="d-grid gap-2 d-flex justify-content-end ">
                    <button class="btn btn-primary " type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Enregistrer <i class="fa-solid fa-inbox"></i></button> 
                </div>
        </form>

            <div class="d-grid gap-2 d-flex justify-content-end mt-3">
                <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#Modezddal">Changer le mot de passe  </button> 
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" placeholder=" MOT DE PASSE ACTUEL" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                    <hr>
                    <div class="d-grid gap-2 d-flex justify-content-end mt-3 mb-3">
                    <button class="btn btn-outline-primary" type="button" >Annuler</button> 
                <button class="btn btn-primary" type="button" >Terminé</button> 
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modezddal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" placeholder=" MOT DE PASSE ACTUEL" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>

                </div>
                <div class="mb-4 mt-3">
                    <label for="btn" class="mb-2"> Mot de passe actuel</label>
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder=" MOT DE PASSE ACTUEL" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>

                </div>
                <div class="mb-4 mt-3">
                    <label for="btn" class="mb-2"> Mot de passe actuel</label>
                    <div class="input-group mb-3 ">
                        <input type="text" class="form-control" placeholder=" MOT DE PASSE ACTUEL" aria-label="Recipient's username" aria-describedby="button-addon2">
                    </div>
                <hr>
                </div>
                <div class="d-grid gap-2 d-flex justify-content-end mt-3 mb-3">
                    <button class="btn btn-outline-primary" type="button" >Annuler</button> 
                <button class="btn btn-primary" type="button" >Terminé</button> 
                </div>
            </div>
            </div>
        </div>
    </div>
    

    <style>
    .contenedor-modal {
        position: absolute;
        width: 100%;
        height: 100%;
        text-align: center;
    }
    
    .contenedor-modal button {
        position: relative;
        top: 40%;
    }
    </style>

    <!-- Link to Bootstrap JavaScript file -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/a5fdcae6a3.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>