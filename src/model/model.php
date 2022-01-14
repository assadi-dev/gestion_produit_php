<?php

abstract class Model{
    private $host= "127.0.0.1";
    private $user="root";
    private $password= "";
    private $dbName="product-database";

    // contient la connexion
    protected $_connexion;

    // propriétés contenant les informations de requetes
    public $table;
    public $id;


    public function dbConnect(){
        try {
            $this->_connexion = null;
            $this->connexion = new PDO('sqlite:'.dirname(__FILE__).'/database.sqlite');
             $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
             $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (Exception $e) {
            echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
            die();
        }
    }
}