<?php

class UsersController {

    private static $instance=null;
    public $name = "users";

    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new UsersController();
        }
        return self::$instance;
    }

}