<?php

class Conexao{
    private $host = 'localhost';
    private $dbname = 'taskmanager';
    private $user = 'taskmanageruser';
    private $pass = '#taskmgr2020-2';   
    
    public function conectar(){
        try{

            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            return $conexao;

        }catch(PDOException $e){
            echo '<p> f::::'.$e->getMessage().'</p>';
        }
    }
}

?>