<?php
require_once '../config/config.php';
class DataBase{
    private $host = HOST;
    private $user = USER;
    private $pass = PASS;
    private $dbname = DB_NAME;


    private $pdo;
    private $stmt;

    public function __construct()
    {
        try{
            $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            // $this->pdo->query('use db_hotel;');
            
        } catch(PDOException $e){
            die('FARES : connexion fails : ' . $e->getMessage());
        }
    }

    public function __destruct()
    {
        if($this->stmt !== null){
            $this->stmt = null;
        }
        
        if($this->pdo !== null){
            $this->pdo = null;
        }

    }

    public function sql_prepare($sql)
    {
        $this->stmt = $this->pdo->prepare($sql);
    }
    
    public function bind($param,$value,$type = null)
    {
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
            }
        }
        $this->stmt->bindValue($param,$value,$type);
    }

    public function exct(){
        $this->stmt->execute();
    }

    public function getAll()
    {
        $this->exct();
        $data = $this->stmt->fetchAll();
        return $data;
    }

    public function getOne()
    {
        $this->exct();
        $data = $this->stmt->fetch();
        return $data;
    }

    public function dataCount()
    {
        return $this->stmt->rowCount();
    }


}