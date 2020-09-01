<?php

use App\core\Controller;
use App\Auth;

class users extends Controller {

    public function create(){

        Auth::checkLogin();
        $mesage = array();

        if(isset($_POST['register'])){

            if(empty($_POST['name']) or empty($_POST['email']) or empty($_POST['pass'])){
                $mesage[] = "Please Fill All Fields!";
            }
            else{

                $name = $_POST['name'];
                $email = $_POST['email'];
                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

                $user = $this->model('User');
                $user->name = $name;
                $user->email = $email;
                $user->pass = $pass;

                $mesage[] = $user->save();
            }
        }

        $this->view('users/create', $data = ['mesage'=>$mesage]);

    }

    public function update($id){
        Auth::checkLogin();
        $mesage = array();
        $user = $this->model('User');

        if(isset($_POST['update'])){

            if(empty($_POST['name'])){
                $mesage[] = "Please Fill In The Name Field!";
            }elseif(empty($_POST['email'])){
                $mesage[] = "Please Fill In The Email Field!";
            }
            elseif(empty($_POST['pass'])){
                $mesage[] = "Please Fill In The Pass Field!";
            }
            else{

                $user->name = $_POST['name'];
                $user->email = $_POST['email'];
                $user->pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);


                $mesage[]= $user->update($id);
            }
        }
        $data = $user->findId($id);
        $this->view('users/update', $data = ['mesage'=>$mesage, 'update' => $data]);
    }

}
