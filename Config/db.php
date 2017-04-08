<?php
include_once 'configuration.php';
class Database{

    private static $instance=null;
    private $pdo;
    public function __construct() {
        $config = new Configuration();
        $bdd = $config->getBdd();
        $host=$bdd['host'];
        $username=$bdd['login'];
        $db=$bdd['name'];
        $port=$bdd['port'];
        $password=$bdd['password'];

        try {
            $dsn = "mysql:host=" .$host. ";"."port=".$port.";"."dbname=" .$db;
            $this->pdo= new PDO($dsn, $username, $password);
            $this->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $this->pdo->exec("SET CHARACTER SET utf8");
            return $this->pdo;
        } catch (Exception $e) {
            echo $e;
            return FALSE;
        }

    }
    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new Database();
        }
        return self::$instance;
    }

    public function query($query)
    {
        return $this->pdo->query($query);
    }
}

?>