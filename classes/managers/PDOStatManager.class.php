<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 24/02/13
 * Time: 23:17
 * To change this template use File | Settings | File Templates.
 */

require_once("PDOManager.class.php");



class PDOStatManager
{
    public function recordStat($urlId, $date, $url, $ip, $host, $referer){

        $PDOManager = new PDOManager;
        $pdo = $PDOManager->newPdo();


        $query = $pdo->prepare('INSERT INTO stat(urlId, date,url,ip,host,referer) VALUES(:urlId, :date,:url,:ip,:host,:referer) ');
        $query->execute(array(
            'urlId' => $urlId,
            'date' => $date,
            'url' => $url,
            'ip' => $ip,
            'host' => $host,
            'referer' => $referer
        ));

    }

    public function showStat($urlId){
        $PDOManager = new PDOManager;
        $pdo = $PDOManager->newPdo();

        $query = $pdo->prepare('SELECT count(id) AS clicksNumber, date FROM stat WHERE urlId = :urlId GROUP BY(date)');
        $query->execute(array(
            'urlId' => $urlId
        ));

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            $day[] =  $row['date'];
            $clicksNumber[] = $row['clicksNumber'];
        }




    }
}
