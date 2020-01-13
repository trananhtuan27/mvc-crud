<?php

class DBconnect
{
    private $dsn;
    private $username;
    private $password;
    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=demo_crud";
        $this->username = "root";
        $this->password = "@Tuan1234";
    }
    public function connect(){
        $conn = null;
        try {
            $conn = new PDO($this->dsn,$this->username,$this->password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        return $conn;
    }

}
