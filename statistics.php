<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 25/02/13
 * Time: 01:17
 * To change this template use File | Settings | File Templates.
 */

    require_once(__DIR__."/classes/managers/PDOUserManager.class.php");
    require_once(__DIR__."/classes/managers/PDOUrlManager.class.php");
    require_once(__DIR__."/classes/managers/PDOStatManager.class.php");
    session_start();





?>

<!DOCTYPE HTML>


<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/suplink.css" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    <script type="text/javascript" src="/Highcharts/js/highcharts.js"></script>
    <script type="text/javascript" src="JS/statistics.js.js"></script>
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
            <a href="index.php">Index</a>
        </li>

        <li>
            <a href="logout.php">Logout</a>
        </li>

    </ul>
</div>



<div id="body2">
    <div id="title"> Suplink - Another Url Shortener</div>





    <div id="urlShow">
       <?php
        if(!isset($_SESSION["user"])){
        header("location: login.php");
        }else{
        $urlId = $_GET["id"];
        $statManager = new PDOStatManager();
        $statManager->showStat($urlId);
        }
        ?>

    </div>

</div>


</body>
