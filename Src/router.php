<?php

include_once '../Controllers/AppController.php';

class Router {

    function __construct()
    {
        $tmp = new AppController();
        $this->addRoute("/PHP_Rush_MVC_Bis/toto/(articles)/([0-9]{1,6})", array("profile", "id"));
        $this->addRoute("/PHP_Rush_MVC_Bis/toto/(chloe)/(.*)", array("chloe", "id"));
        $this->addRoute("/PHP_Rush_MVC_Bis/toto/(.*)", array("catchall"));
        $tmp2 = $this->parse($_SERVER['REQUEST_URI']);
        if (isset($tmp2["catchall"]))
            $tmp->coucou(1);
        else
            print_r($_SERVER['REQUEST_URI']);
    }
    private $routes = array(); 

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