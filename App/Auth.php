<?php

namespace App;
use App\core\Model;

class Auth{

    public static function Login($email, $pass){
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->execute();

        if($stmt->rowCount()>=1){

            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            if(password_verify($pass, $res['pass'])){
                $_SESSION['logged'] = true;
                $_SESSION['userId'] = $res['id'];
                $_SESSION['userName'] = $res['name'];
                header('Location: /home/index');
            }else{
                return "Invalid Password!";
            }
        }else{
            return "Email Not Found!";
        }
    }
    public static function Logout(){
        session_destroy();
        header('Location: /home/login');
    }
    public static function checkLogin(){
        if(!isset($_SESSION['logged'])){
            header('Location: /home/login');
            die;
        }
    }
}
