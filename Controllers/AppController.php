<?php
class AppController {
    public function coucou($id)
    {
        include_once '../Config/db.php';
        $query = 'SELECT * FROM articles WHERE id = '.$id;
        $sql = Database::getInstance()->query($query);
        print_r($sql->fetchAll());
    }
}