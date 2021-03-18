<?php

class Tarefa{
    private $idTarefa;
    private $descricao;
    private $cor;
    private $concluida;
    private $arquivada;

    public function __construct($pIdTarefa, $pDescricao, $pCor){
        $this->idTarefa = $pIdTarefa;
        $this->descricao = $pDescricao;
        $this->cor = $pCor;
        $this->concluida = 0;
        $this->arquivada = 0;
    }

    /*public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }*/

    public function get($atributo){
        switch($atributo){
            case "idTarefa":
                return $this->idTarefa;
            break;
            case "descricao":
                return $this->descricao;
            break;
            case "cor":
                return $this->cor;
            break;
            case "concluida":
                return $this->concluida;
            break;
            case "arquivada":
                return $this->arquivada;
            break;
        }
    }

    public function set($atributo, $valor){
        switch($atributo){
            case "idTarefa":
                return $this->idTarefa = $valor;
            break;
            case "descricao":
                return $this->descricao = $valor;
            break;
            case "cor":
                return $this->cor = $valor;
            break;
            case "concluida":
                return $this->concluida = $valor;
            break;
            case "arquivada":
                return $this->arquivada = $valor;
            break;
        }
    }

    public function __toString(){
        return "<b> Id: </b>". $this->idTarefa."<br>".
        "<b> Descricão: </b>". $this->descricao."<br>".
        "<b> Cor: </b>". $this->cor."<br>". 
        "<b> Concluida: </b>". $this->concluida."<br>". 
        "<b> Arquivada: </b>". $this->arquivada."<br>";
    }
}


?>