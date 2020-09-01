<?php

use App\core\controller;


class Api extends Controller {

    public function notes(){

        $note = $this->model('Note');
        $data = $note->getAll();

        header('content-Type: application/json; charset:utf-8');
        echo json_encode($data);

    }

}
