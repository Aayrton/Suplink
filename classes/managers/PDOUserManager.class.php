<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ayrton
 * Date: 18/02/13
 * Time: 16:17
 * To change this template use File | Settings | File Templates.
 */

require_once("PDOManager.class.php");
require_once(__DIR__."/../entities/User.class.php");



class PDOUserManager
{

    private $message;

    public function getMessage()
    {
        return $this->message;
    }

    public function authentication($email, $password){

            $PDOManager = new PDOManager;
            $pdo = $PDOManager->newPdo();

            $query = $pdo->prepare("SELECT * FROM user WHERE email = ? ");
            $query->execute(array($email));
            $data = $query->fetchAll();

            if(count($data) == 0){
                $this->message = "Adresse email incorrecte";
            }
            else{
                $row = $data[0];

                if(sha1($password) != $row["password"]){
                    $this->message = "Mot de passe incorrecte";

                }
                else{



                    $user = new User($row["id"], $row["email"], $row["password"], $row["date_registration"]);
                    header("location: index.php");
                    return $user;



                }
            }
    }





   public function registration($email, $password, $confirmation){



           $PDOManager = new PDOManager;
           $pdo = $PDOManager->newPdo();



           $query = $pdo->prepare('SELECT email FROM user WHERE  email = :email ');
           $query->execute(array(
               'email' => $email
           ));

           $result = $query->fetchAll();

           if(count($result) > 0){
               foreach($result as $row){

                   if($email == $row["email"]){

                       $this->message = "L'adresse e-mail est deja utilisee";


                   }
               }
           }
           elseif(!preg_match("/\A([^@\s]+)@((?:[-a-z0-9]+\.)+[a-z]{2,})\z/i", $email)){
                $this->message = "Votre adresse email n'est pas valide";
           }
           elseif(!preg_match("/^[a-zA-Z0-9_]{4,}$/", $password))
           {
               $this->message = "Votre mot de passe doit contenir au moins 4 caracteres";
           }
           elseif( $password != $confirmation){

               $this->message= "Les mots de passes sont différents";


           }
           else{

              $query1 = $pdo->prepare('INSERT INTO user(email, password, date_registration) VALUES(:email, :password, NOW())');
              $query1->execute(array(
                   'email' => $email,
                   'password' => sha1($password),

              ));





           }
    }
}
