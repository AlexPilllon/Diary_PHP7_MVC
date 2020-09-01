<?php

use App\core\Model;

class User extends Model {

    public $name;
    public $email;
    public $pass;


    public function getAll(){
        $sql='SELECT * from users';
        $stmt= Model::getConn()->prepare($sql);
        $stmt->execute();

        if($stmt->rowCount()>0):
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        else:
            return [];
        endif;
    }


    public function findId($id){
        $sql='SELECT * from users where id= ?';
        $stmt= Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        if($stmt->rowCount()>0):
            $res = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $res;
        else:
            return [];
        endif;
    }

    public function save(){
        $sql = "INSERT INTO users (name, email, pass) VALUES (?, ?, ?)";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->name);
        $stmt->bindValue(2, $this->email);
        $stmt->bindValue(3, $this->pass);
        if ($stmt->execute()) {
            return "Register Sucess!";
        }
        else{
            return "Register Failed!";
        }

    }

    public function update($id){
        $sql = "UPDATE users SET name = ?, email = ?, pass = ? where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->name);
        $stmt->bindValue(2, $this->email);
        $stmt->bindValue(3, $this->pass);
        $stmt->bindValue(4, $id);
        if ($stmt->execute()) {
            return "Update Sucess!";
        }
        else{
            return "Update Failed!";
        }

    }

    public function delete($id){
        $sql = "DELETE from users where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        if ($stmt->execute()) {
            return "Deleted!";
        }
        else{
            return "Delete Failed!";
        }
    }


}
