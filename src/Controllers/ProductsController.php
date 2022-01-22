<?php


class Products extends Controller {

    public function index() {

        $this->loadModel("ProductModel");
       $products = $this->ProductModel->findAll();
       $this->view->display("product/index.html.twig");
      
       
    }
}