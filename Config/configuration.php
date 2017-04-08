<?php

class Configuration {

    private $_bdd;

    /**
     * @return array
     */
    public function getBdd()
    {
        return $this->_bdd;
    }

    public function __construct()
    {
        $this->_bdd = $this->initdb();
    }

    private function initdb() {
        $tmp = array(
            'host' => 'localhost',
            'login' => 'mvc',
            'password' => 'toto',
            'port' => 3306,
            'name' => 'rush_mvc'
        );
        return $tmp;
    }

}