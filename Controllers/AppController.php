<?php
class AppController {

    private static $instance=null;

    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new AppController();
        }
        return self::$instance;
    }

    public function coucou($id)
    {
        $query = 'SELECT * FROM articles WHERE id = '.$id;
        $sql = Database::getInstance()->query($query);
        print_r($sql->fetchAll());
    }
}