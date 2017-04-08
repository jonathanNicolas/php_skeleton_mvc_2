<?php

require_once '../Controllers/AppController.php';
require_once '../Controllers/ArticlesController.php';
require_once '../Controllers/UsersController.php';
require_once 'db.php';
require_once '../dispatcher.php';
require_once '../Src/router.php';

class Core {

    public $appController;
    public $articlesController;
    public $usersController;
    public $database;
    public $router;
    public $dispatcher;

    public function __construct()
    {
        $this->appController = AppController::getInstance();
        $this->articlesController = ArticlesController::getInstance();
        $this->usersController = UsersController::getInstance();
        $this->database = Database::getInstance();
        $this->router = new Router();
        $this->dispatcher = new Dispatcher();
    }
}