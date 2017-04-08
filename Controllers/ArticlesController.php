<?php

class ArticlesController extends AppController {

    private static $instance=null;
    private $name = "articles";
    private $method;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }



    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new ArticlesController();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->loadModel("Articles");
    }

    public function tmp() {
        $this->setMethod("tmp");
        $this->render();
        $this->render("coucou.html.twig");
    }
}