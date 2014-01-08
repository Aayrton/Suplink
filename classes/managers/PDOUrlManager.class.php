<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 21/02/13
 * Time: 00:47
 * To change this template use File | Settings | File Templates.
 */

require_once("PDOManager.class.php");
class PDOUrlManager
{


    public function generateUrl($name, $url, $userId){
        $PDOManager = new PDOManager;
        $pdo = $PDOManager->newPdo();

        $state = 1;

        $id = rand(10000,99999);
        $shortened_url=base_convert($id,20,36);

        $query = $pdo->prepare("SELECT shortened_url FROM url WHERE shortened_url = :shortened_url");
        $query->execute(array(
            'shortened_url' => $shortened_url
        ));

        $result = $query->fetchAll();

        while(count($result) > 0){
            $id = rand(10000,99999);
            $shortened_url = base_convert($id,20,36);

            $query = $pdo->prepare("SELECT shortened_url FROM url WHERE shortened_url = :shortened_url");
            $query->execute(array(
                'shortened_url' => $shortened_url
            ));

            $result = $query->fetchAll();

        }


            if(empty($name)){

            }
            elseif(empty($url)){

            }
            else{
            $query2 = $pdo->prepare("INSERT INTO url(userId, name, url, shortened_url,date_created, state) VALUES(:userId, :name, :url, :shortened_url, NOW(), :state)");
            $query2->execute(array(
                'userId' => $userId,
                'name' => $name,
                'url' => $url,
                'shortened_url' => $shortened_url,
                'state' => $state
            ));
            }


    }

    public function showUrl($userId){
        $PDOManager = new PDOManager;
        $pdo = $PDOManager->newPdo();

        $query = $pdo->prepare("SELECT * FROM url WHERE userId = :userId");
        $query->execute(array(
            'userId' => $userId
        ));

        $data = $query->fetchAll();








        echo '<table class="table table-striped"> <tr>' . '<td>' . 'Name' . '</td>';
        echo '<td>' . 'Original URL' . '</td>';
        echo '<td>' . 'Shortened URL' . '</td>';
        echo '<td>' . 'Clicks' . '</td>';
        echo '<td>' . 'Date created' . '</td>' ;
        echo '<td>' . 'Delete' . '</td>' ;
        echo '<td>' . 'Enable / Disable' . '</td>';
        echo '<td>' . 'Statistics' . '</td>' . '</tr>';


        foreach($data as $row){
            $concas = $row["shortened_url"];
            $conca = "http://localhost/Suplink/" . $concas;

           if($row["state"]){
               $stateimg = "enable.png";
           }
           elseif(!$row["state"]){
               $stateimg = "disable.png";
           }


            echo '<tr>' . '<td>' . $row["name"] . '</td>';
            echo '<td>' . $row["url"] . '</td>';
            echo '<td>' . $conca. '</td>';
            echo '<td>' . $row["clicks"] . '</td>';
            echo '<td>' . $row["date_created"] . '</td>' ;
            echo '<td> <a href=delete.php?id=' . $row["id"] . '> <img src="css/img/delete2.png" width="25px"/>' . '</td> </a>';
            echo '<td> <a href=state.php?id=' . $row["id"] . '> <img src="css/img/' . $stateimg . '" width="18px"/>' . '</td> </a>';
            echo '<td> <a href=statistics.php?id=' . $row["id"] . '> <img src="css/img/stat.png" width="30px"/>' . '</td> </a> </tr>';
        }

        echo '</table>';



    }

    public function delete($urlId){
        $PDOManager = new PDOManager;
        $pdo = $PDOManager->newPdo();

        $query = $pdo->prepare('DELETE FROM url WHERE id = :id');
        $query->execute(array(
            'id' => $urlId
        ));
    }

    public function changeState($urlId){
        $PDOManager = new PDOManager;
        $pdo = $PDOManager->newPdo();

        $state = 0;
        $state1 = 1;

        $query = $pdo->prepare('SELECT state FROM url WHERE id = :id ');
        $query->execute(array(
            'id' => $urlId
        ));

        $data = $query->fetch(PDO::FETCH_ASSOC);

        if($data["state"] == 1){
            $query2 = $pdo->prepare('UPDATE url SET state= :state WHERE id = :id');
            $query2->execute(array(
                'state'=> $state,
                'id' => $urlId
            ));
        }
        elseif($data["state"] == 0){
            $query2 = $pdo->prepare('UPDATE url SET state= :state WHERE id = :id');
            $query2->execute(array(
                'state'=> $state1,
                'id' => $urlId
            ));
        }



    }
}
