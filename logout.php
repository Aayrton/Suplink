<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 20/02/13
 * Time: 01:15
 * To change this template use File | Settings | File Templates.
 */


	session_start();
	if (!isset($_SESSION["user"]->getId)){
        header("location: login.php");
    }
    else{
        session_destroy();
        header("location: login.php");

    }
