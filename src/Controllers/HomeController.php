<?php


class Home extends Controller {

    

    public function index() {

        $this->loadModel("ProductModel");
       $products = $this->ProductModel->findAll();
       var_dump($products);
        echo "Produits";
    }
}