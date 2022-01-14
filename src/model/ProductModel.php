<?php

class ProductModel extends Model{
    public function __construct() {
        $this->table = "products";
        $this->dbConnect();
    }

    
}