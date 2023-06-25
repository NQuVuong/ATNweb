<?php

class connect{
    public $server;
    public $user;
    public $password;
    public $dbName;

    public function __construct(){
        $this->server ="i0rgccmrx3at3wv3.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "qjlmwzq7gef4yelg";
        $this->password = "tde75l3e1r83uld6";
        $this->dbName = "fdek0fd8ahnuvwm0";
    }

    function connectToMySQL():mysqli{
        $conn_my = new mysqli($this->server,$this->user,$this->password,$this->dbName);
        if($conn_my->connect_error) {
            die("Fail!".$conn_my->connect_error);
        }
        else{

        }
        return $conn_my;
    }
    function connectToPDO():PDO{
        try{
            $conn_pdo = new PDO("mysql:host=$this->server;dbname=$this->dbName",$this->user,$this->password);
            $conn_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            die("Failed $e");
        }
        return $conn_pdo;
    }
}


?>
