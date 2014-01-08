<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 22/02/13
 * Time: 18:43
 * To change this template use File | Settings | File Templates.
 */

require_once(__DIR__."/classes/managers/PDOUserManager.class.php");
require_once(__DIR__."/classes/managers/PDOUrlManager.class.php");

session_start();
if(isset($_GET["id"])&&isset($_SESSION["user"])){
    $urlId = $_GET["id"];
    $urlManager = new PDOUrlManager();

    $urlManager->changeState($urlId);
    header("location: index.php");
}
else{
    header("location: index.php");
}