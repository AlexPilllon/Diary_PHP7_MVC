<?php

use App\Auth;
use App\core\controller;


class Home extends Controller {
    public function index($nome = ''){

        $note = $this->model('Note');
        $data = $note->getAll();

        $this->view('home/index', $data = ['register' => $data]);
    }

    public function search (){

        $search = isset($_POST['search']) ? $_POST['search'] : $_SESSION['search'];
        $_SESSION['search'] = $search;

        $note = $this->model('Note');
        $data = $note->search($search);

        $this->view('home/index', $data = ['register' => $data]);
    }


    public function login(){
        $mesage = array();
        if(isset($_POST['login'])){
            if((empty($_POST['email'])) or (empty($_POST['pass']))){
                $mesage[] = "email and password is required!";
            }else{
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $mesage[] = Auth::Login($email, $pass);

            }
        }

        $this->view('home/login', $data = ['mesage' => $mesage]);
    }

    public function logout(){
        Auth::Logout();
    }
}
