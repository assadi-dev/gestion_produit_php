<?php



use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controller{
    
    private $loader;
    protected $view;

    public function __construct(){
        $this->loader = new FilesystemLoader(ROOT.'src/Views');
        $this->view = new Environment($this->loader);
    }
    
    public function loadModel(string $model){
        require_once(ROOT."src/Models/".$model.".php");
        $this->$model = new $model();
    }
}