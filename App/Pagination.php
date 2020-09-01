<?php

namespace App;

class Pagination extends Core\App {

    public $data;
    public $current;
    public $quantity;
    public $numbersPerPage;
    public $count;
    public $result;


    public function __construct($data, $current, $quantity){
        $this->data = $data;
        $this->current = $current;
        $this->quantity = $quantity;
    }

    public function result(){
        $this->numbersPerPage = array_chunk($this->data, $this->quantity);
        $this->count = count($this->numbersPerPage);

        if($this->count > 0):
            $this->result = $this->numbersPerPage[$this->current-1];
            return $this->result;
        else:
            return [];
        endif;
    }


    public function navigator(){
        echo "<ul class='pagination'>";
            for($i = 1; $i <= $this->count; $i++):
                if($i == $this->current):
                    echo "<li class='active'><a href='#'>".$i."</a></li>";

                else:
                    echo "<li><a href='".$this->currentURL()."?page=".$i."'>".$i."</a></li>";
                endif;
            endfor;
        echo "</ul>";
    }
}
