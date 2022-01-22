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
          
            $this->_connexion = new PDO('sqlite:'.dirname(__FILE__).'/database.sqlite');
             $this->_connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
             $this->_connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
             $this->_connexion->query("CREATE TABLE IF NOT EXISTS ".$this->table."(   
                reference VARCHAR(255) PRIMARY KEY NOT NULL,
                produit VARCHAR(255) NOT NULL,
                categorie VARCHAR(255) NOT NULL,
                description TEXT NULL,
                prix INTEGER NOT NULL,
                stock INTEGER NOT NULL
            )");
             
        } catch (Exception $e) {
            echo "Impossible d'accéder à la base de données SQLite : ".$e->getMessage();
            die();
        }
    }

    public function findAll(){

        $sql = "SELECT * FROM ".$this->table;
        $stmt = $this->_connexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function findByID(){
        $sql = "SELECT * FROM".$this->table." id = :id";
        $stmt = $this->_connexion->prepare($sql);
        $stmt->execute(array('id' => $this->id));
        $result = $stmt->fetch();
        return $result;
    }

    public function findByRef(){
        $sql = "SELECT * FROM".$this->table." reference = :id";
        $stmt = $this->_connexion->prepare($sql);
        $stmt->execute(array('id' => $this->id));
        $result = $stmt->fetch();
        return $result;
    }


}