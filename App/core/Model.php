<?php

namespace App\core;

class Model {
        private static $instance;

        public static function getConn(){
            if(!isset(self::$instance)):
                    self::$instance = new \PDO('mysql:host=localhost; dbname=course_mvc; charset=utf8', 'root', "");
                endif;
            return self::$instance;
        }
}
