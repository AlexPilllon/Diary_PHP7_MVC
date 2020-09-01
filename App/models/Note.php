<?php

use App\core\Model;

class Note extends Model {

    public $title;
    public $text;
    public $image;

    public function getAll(){
        $sql='SELECT * from notes';
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
        $sql='SELECT * from notes where id= ?';
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
        $sql = "INSERT INTO notes (title, text, image) VALUES (?, ?, ?)";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->title);
        $stmt->bindValue(2, $this->text);
        $stmt->bindValue(3, $this->image);
        if ($stmt->execute()) {
            return "Register Sucess!";
        }
        else{
            return "Register Failed!";
        }

    }

    public function update($id){
        $sql = "UPDATE notes SET title = ?, text = ? where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->title);
        $stmt->bindValue(2, $this->text);
        $stmt->bindValue(3, $id);
        if ($stmt->execute()) {
            return "Update Sucess!";
        }
        else{
            return "Update Failed!";
        }
    }

    public function updateImage($id){
        $sql = "UPDATE notes SET title = ?, text = ?, image = ? where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $this->title);
        $stmt->bindValue(2, $this->text);
        $stmt->bindValue(3, $this->image);
        $stmt->bindValue(4, $id);
        if ($stmt->execute()) {
            return "Update with image Sucess!";
        }
        else{
            return "Update with image Failed!";
        }
    }

    public function deleteImage($id){
        $sql = "UPDATE notes SET image = ? where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, "");
        $stmt->bindValue(2, $id);
        if ($stmt->execute()) {
            return "Image has been deleted!";
        }
        else{
            return "Error, image not deleted";
        }
    }

    public function delete($id){

        $res = $this->findId($id);

        if(!empty($res['image'])):
            unlink("uploads/".$res['image']);
            endif;


        $sql = "DELETE from notes where id = ?";
        $stmt = Model::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        if ($stmt->execute()) {
            return "Deleted!";
        }
        else{
            return "Delete Failed!";
        }
    }

    public function search($search){
        $sql='SELECT * from notes where title like ? COLLATE utf8_general_ci';
        $stmt= Model::getConn()->prepare($sql);
        $stmt->bindValue(1, "%{$search}%");
        $stmt->execute();

        if($stmt->rowCount()>0):
            $res = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $res;
        else:
            return [];
        endif;
    }

}
