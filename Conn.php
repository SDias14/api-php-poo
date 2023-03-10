<?php

class Conn {
    
    public $host = 'localhost';
    public $dbname = 'devsnotes';
    public  $user = 'root';
    public $pass = '';

  

    public object $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

       //array

       $array = [
        'error' => '',
        'result' => []
    ];
    
    }

   


}



?>
