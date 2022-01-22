<?php


use Twig\Loader\FilesystemLoader;

abstract class Controller{
    
    private $loader;
    protected $twig;

    public function __construct(){
       // $this->loader = new FilesystemLoader();
    }
    
    public function loadModel(string $model){
        require_once(ROOT."src/Models/".$model.".php");
        $this->$model = new $model();
    }
}