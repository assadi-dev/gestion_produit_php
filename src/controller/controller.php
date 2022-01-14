<?php

abstract class Controller{
    public function loadModel(string $model){
        require_once(ROOT."src/model/".$model.".php");
        $this->$model = new $model();
    }
}