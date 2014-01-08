<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 22/02/13
 * Time: 16:48
 * To change this template use File | Settings | File Templates.
 */

require_once(__DIR__."/classes/managers/PDOStatManager.class.php");
require_once(__DIR__."/classes/managers/PDOManager.class.php");


        echo '<div style="background-color:#00b7ea;height: 100%;width: 100%">';
    $PDOManager = new PDOManager;
    $pdo = $PDOManager->newPdo();




    $de= $_GET["decode"];
    $date = date("Y-m-d");

    $query=$pdo->prepare('SELECT clicks, id FROM url WHERE shortened_url = :shortened_url');
    $query->execute(array(
        'shortened_url' => $de
    ));

    $data = $query->fetch(PDO::FETCH_ASSOC);
    $count = $data["clicks"];
    $urlId = $data["id"];
    if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif(isset($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }



    $host = gethostbyaddr($ip);

    if (isset($_SERVER['HTTP_REFERER'])) {
        if (preg_match($_SERVER['HTTP_HOST'], $_SERVER['HTTP_REFERER'])) {
            $referer ='Direct';
        }
        else {

            $referer = $_SERVER['HTTP_REFERER'];
        }
    }
    else {
        $referer ='Direct';
    }

    if ($_SERVER['QUERY_STRING'] == "") {
        $url = $_SERVER['PHP_SELF'];
    }
    else {
        $url = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
    }

    $statManager = new PDOStatManager();
    $statManager->recordStat($urlId, $date,$url,$ip,$host,$referer);




    $query1=$pdo->prepare('SELECT * FROM url WHERE shortened_url = :shortened_url && state = 1 ');
    $query1->execute(array(
        'shortened_url' => $de
    ));



    while($row = $query1->fetch(PDO::FETCH_ASSOC))
    {
        $count++;
        $res=$row['url'];
        $query2=$pdo->prepare('UPDATE url SET clicks= :clicks WHERE shortened_url = :shortened_url');
        $query2->execute(array(
            'clicks' => $count,
            'shortened_url' => $de
        ));

        header("location:".$res);

    }
    $lol = 0;
    echo '<p style="text-align: center;font-size: 100px;margin-bottom:10px;color:#258dc8;">' . 'THIS URL IS DISABLE' . '</p>';

    while($lol < 25){
        echo '<img src="css/img/duck.png" width="60px"/>' ;
        echo '<img src="css/img/duck.png" width="60px"/>' ;
        echo '<img src="css/img/weed.png" width="60px"/>' ;
        echo '<img src="css/img/duck.png" width="60px"/>' ;
        echo '<img src="css/img/duck.png" width="60px"/>' ;
        echo '<img src="css/img/pig.png" width="60px"/>' ;
        echo '<img src="css/img/duck.png" width="60px"/>' ;
        echo '<img src="css/img/duck.png" width="60px"/>' ;
        echo '<img src="css/img/dog.png" width="60px"/>' ;
        echo '<img src="css/img/duck.png" width="60px"/>' ;

        $lol++;
    }

    echo '</div>';