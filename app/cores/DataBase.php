<?php 

class DataBase {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;

    private $pdo;
    private $stmt;

    // Créer la connexion à la bdd dans le constructeur
    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname. ';charset=utf8';
        try{
            $this->pdo = new PDO($dsn, $this->user, $this->password);
         
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // Méthoes perso pour la BDD
    public function query($sql){
        $this->stmt = $this->pdo->prepare($sql);
    }

    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
                break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    
    public function execute(){
        return $this->stmt->execute();
    }

    public function findAll(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public function findOne(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
    public function checkIfExist(){
        $this->execute();
        return $this->stmt->rowCount() > 0;
    }
}