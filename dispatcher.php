<?php

class Dispatcher {

    private static $instance=null;

    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new Dispatcher();
        }
        return self::$instance;
    }

    public function redirect($url) {
        if ($url['controller'] == 'articles')
            print_r(AppController::getInstance()->coucou($url['id']));
    }

}