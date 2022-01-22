<?php

class Main extends Controller {

    public function index()  {
        
        $this->loadModel("ProductModel");
       $products = $this->ProductModel->findAll();
       $this->view->display("main/index.html.twig");
      
    }
}