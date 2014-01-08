<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 18/02/13
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */
    session_start();
    require_once(__DIR__."/classes/managers/PDOUserManager.class.php");
    
    if(isset($_REQUEST["email"]) && isset($_REQUEST["password"]) && isset($_REQUEST["confirmation"])){
        $email = $_REQUEST["email"];
        $password = $_REQUEST["password"];
        $confirmation = $_REQUEST["confirmation"];

        $userManager = new PDOUserManager();
        $userManager->registration($email,$password,$confirmation);

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

        <div id="bod">
            <form  id="form-register" method="POST" >

                <input type="text" name="email" placeholder="Adresse Email"  /> <br />
                <input type="password" name="password" class="inputPassword" placeholder="Mot de passe" /> <br />
                <input type="password" class="inputPassword" name="confirmation" placeholder="Confirmation" /> <br />
                <input type="submit"  class="btn btn-primary" value="Inscription" name="inscription" /> <br /> <br />

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



   