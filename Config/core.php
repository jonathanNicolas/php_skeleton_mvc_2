<?php

require_once '../Controllers/AppController.php';
require_once '../Controllers/ArticlesController.php';
require_once '../Controllers/UsersController.php';
require_once 'db.php';
require_once '../dispatcher.php';
require_once '../Src/router.php';

class Core {

	public function iniRouter() {
		$router = new Router();
	}


}