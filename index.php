<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 18/02/13
 * Time: 17:12
 * To change this template use File | Settings | File Templates.
 */
require_once(__DIR__."/classes/managers/PDOUserManager.class.php");
require_once(__DIR__."/classes/managers/PDOUrlManager.class.php");
     session_start();

     if(!isset($_SESSION["user"])){
         header("location: login.php");
     }

    $urlManager = new PDOUrlManager();
    $userId = $_SESSION["user"]->getId();

    if(isset($_REQUEST["name"]) && isset($_REQUEST["url"])){

        $name = $_REQUEST["name"];
        $url = $_REQUEST["url"];





        $urlId =$urlManager->generateUrl($name, $url, $userId);

    }


?>

<!DOCTYPE HTML>


    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="css/suplink.css" type="text/css" />
    </head>


    <body>
    <div id="header">

        <div id="profile">
                <img src="css/img/profile.png">
                <?php
                    $profilename = substr( $_SESSION["user"]->getEmail(), 0, strpos( $_SESSION["user"]->getEmail(), '@' ) );
                    echo $profilename;
                ?>
        </div>

        <ul>
            <li>
                <a href="logout.php">Logout</a>
            </li>

        </ul>
    </div>



    <div id="container" class="body2">



        <h1>Url Shortener</h1>

        <div id="newUrl">

            <form method="POST" class="form-inline" accept-charset="">

                <input type="text" class="input-small" placeholder="Name" name="name">
                <input type="text"  placeholder="URL" name="url">
                <input type="submit" class="btn btn-default"  value="Generate" name="create">

            </form>

        </div>

        <div id="urlShow">

            <?php

                    $urlManager->showUrl($userId);

            ?>

        </div>

    </div>


    </body>



   