<?php
require_once(__DIR__."/classes/managers/PDOUserManager.class.php");

    session_start();
    if(isset($_REQUEST["email"]) && isset($_REQUEST["password"])){

    $email = $_REQUEST["email"];
    $password = $_REQUEST["password"];

    $userManager = new PDOUserManager();
    $user = $userManager->authentication($email,$password);

    $_SESSION["user"] = $user;

    $message = $userManager->getMessage();



    }


?>

<!DOCTYPE HTML>


    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/suplink.css" type="text/css" />
    </head>


    <body>
            <?php include "header.php"; ?>
        <div id="bod2">
            <form  id="form-login" method="POST" >

                <input type="text" name="email" placeholder="Adresse Email"  /> <br />
                <input type="password" name="password" class="inputPassword" placeholder="Mot de passe" /> <br />
                <input type="submit"  class="btn btn-primary" value="Connexion" name="login" />

                <div class="message">
                    <?php
                        if(isset($message)){
                        echo $message;
                        }
                    ?>
                </div>

            </form>
        </div>
    </body>