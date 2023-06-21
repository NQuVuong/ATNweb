<?php

class connect{
    public $server;
    public $user;
    public $password;
    public $dbName;

    public function __construct(){
        $this->server ="vkh7buea61avxg07.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->user = "rya5zh8a5cmnk8rk";
        $this->password = "htlp2qgr4ld9ylpd";
        $this->dbName = "rqd3pifcb25mlgmk";
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
