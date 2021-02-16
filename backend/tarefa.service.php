<?php

class TarefaService{
    private $conexao;
    private $tarefa;

    public function __construct(Conexao $conexao, Tarefa $tarefa){
        $this->conexao = $conexao->conectar();
        $this->tarefa = $tarefa;
    }


    public function inserir(){
        // echo 'olá';
        $query = 'insert into tb_tarefas(tarefa, cor_fundo, cor_tarefa) values(:tarefa, :cor_fundo, :cor_tarefa)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
        $stmt->bindValue(':cor_fundo', $this->tarefa->__get('cor_fundo'));
        $stmt->bindValue(':cor_tarefa', $this->tarefa->__get('cor_tarefa'));
        $stmt->execute();
    }


    public function recuperar(){

    }

    public function atualizar(){

    }

    public function remover(){

    }
}


?>