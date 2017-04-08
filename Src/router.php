<?php

class Router {

    private $routes = array();

    function __construct()
    {
        $this->addRoute("/(articles)/(.*)/([0-9]{1,6})", array("controller", "method", "id"));
        $this->addRoute("/(users)/(.*)/([0-9]{1,6})", array("controller", "method", "id"));
        $this->addRoute("/(.*)", array("catchall"));
        $tmp2 = $this->parse($_SERVER['REQUEST_URI']);
        Dispatcher::getInstance()->redirect($tmp2);
    }

    public function addRoute($pattern, $tokens = array()) {
        $this->routes[] = array(
            "pattern" => $pattern,
            "tokens" => $tokens
        );
    }

    public function parse($url) {
        $tokens = array();
        foreach ($this->routes as $route) {
            preg_match("@^" . $route['pattern'] . "$@", $url, $matches);
            if ($matches) {
                foreach ($matches as $key=>$match) {
                    // Not interested in the complete match, just the tokens
                    if ($key == 0) {
                        continue;
                    }
                    // Save the token
                    $tokens[$route['tokens'][$key-1]] = $match;
                }
                return $tokens;
            }
        }
        return $tokens;
    }
}