<?php

class Dispatcher {

    private static $instance=null;

    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new Dispatcher();
        }
        return self::$instance;
    }

    public function parse($url) {
        $tokens = array();
        $router = new Router();
        foreach ($router->getRoutes() as $route) {
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