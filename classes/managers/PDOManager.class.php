<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 18/02/13
 * Time: 16:04
 * To change this template use File | Settings | File Templates.
 */
class PDOManager
{
    private $pdo_usr = "root";
    private $pdo_pwd = "";
    private $pdo_db = "144346Suplink";

    public function newPdo(){
        try
        {
            $pdo = new PDO('mysql:host=localhost;dbname=' . $this->pdo_db, $this->pdo_usr, $this->pdo_pwd);
            return $pdo;
        }
        catch (Exception $e)
        {

            die('Error : ' . $e->getMessage());
        }
    }
}

