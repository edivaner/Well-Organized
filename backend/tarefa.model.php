<?php

class Tarefa{
    private $id;
    private $descricao;
    private $cor;
    private $concluida;
    private $arquivada;

    // public function __construct($pDescricao, $pCor){
    //     $this->descricao = $pDescricao;
    //     $this->cor = $pCor;
    //     $this->concluida = 0;
    //     $this->arquivada = 0;
    // }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }
}


?>