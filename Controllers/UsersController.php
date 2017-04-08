<?php

class UsersController {

    private static $instance=null;

    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new UsersController();
        }
        return self::$instance;
    }

}