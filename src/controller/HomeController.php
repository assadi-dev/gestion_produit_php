<?php

class Home extends Controller {

    

    public function index() {

        $this->loadModel("ProductModel");
        echo "accueil";
    }
}