<?php

require 'Conn.php';

class Get extends Conn {
    
    private $connection;
    private $method;
    
    private $sql;
    
    private $data;
    
    private $array;
    
    
    
    
    public function getAll(){
        $this->connection = $this->connect(); //conecta com o banco de dados
        
        $this->method = strtolower($_SERVER['REQUEST_METHOD']); 
        
        if($this->method === 'get') { // se o metodo for get
            $this->sql = $this->connection->query("SELECT * FROM notes"); // seleciona todos os dados da tabela notes
            if($this->sql->rowCount() > 0) { // se a quantidade de linhas for maior que 0
                $this->data = $this->sql->fetchAll(PDO::FETCH_ASSOC); // vai retornar todos os dados em um array associativo
                
                
                
                return json_encode($this->data); // vai retornar o array
                
                
            } else {
                return $this->array['error'] = 'Nenhum dado encontrado'; // se não, vai retornar uma mensagem de erro
            }
        } else {
           return $this->array['error'] = 'Método não permitido (apenas GET)'; // se o metodo não for get, vai retornar uma mensagem de erro
        }
        
        
        
        
        
        
    }
    
    
    
    
    
    
    
    
    
    
}


$create = new Get(); // instanciando a classe insert.

$render = $create->getAll(); // chamando o metodo get.

echo $render; // imprimindo o metodo get.



require 'return.php';


















?>