<?php

class Router {

    private $routes = array();

    /**
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    function __construct()
    {
        $this->addRoute("/(articles)/(get)/([0-9]{1,6})", array("controller", "method", "id"));
        $this->addRoute("/(users)/(.*)/([0-9]{1,6})", array("controller", "method", "id"));
        $this->addRoute("/(.*)", array("catchall"));
    }

    public function addRoute($pattern, $tokens = array()) {
        $this->routes[] = array(
            "pattern" => $pattern,
            "tokens" => $tokens
        );
    }

}