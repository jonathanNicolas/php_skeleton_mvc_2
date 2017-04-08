<?php
class AppController {

    private $model;

    private static $instance=null;

    public static function getInstance() {
        if(self::$instance===null){
            self::$instance=new AppController();
        }
        return self::$instance;
    }

    public function loadModel($model) {
        $this->model = $model;
    }

    public function render($file = null) {
        //ob_start();
        if ($file == null)
            var_dump("Views/".$this->getName()."/".$this->getMethod().".html.twig");
        else
            var_dump("Views/".$this->getName()."/".$file);
        //$var = ob_get_contents();
        //ob_end_clean();
        //return $var;
    }

    public function beforeRender() {

    }

    protected function redirect($param) {

    }

}