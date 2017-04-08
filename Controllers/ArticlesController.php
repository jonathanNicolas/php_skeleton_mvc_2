<?php

class ArticlesController {

    private static $instance=null;

    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new ArticlesController();
        }
        return self::$instance;
    }

}