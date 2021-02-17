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
        $query = '
                select 
                    t.id, s.status, t.id_status, t.tarefa, t.cor_fundo, t.cor_tarefa 
                from 
                    tb_tarefas  as t 
                    left join tb_status as s on (t.id_status = s.id)   
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizar(){

    }

    public function remover(){

    }

    public function afazer(){
        $query = '
                select 
                    t.id, s.status, t.id_status, t.tarefa, t.cor_fundo, t.cor_tarefa 
                from 
                    tb_tarefas  as t 
                    left join tb_status as s on (t.id_status = s.id)
                where 
                	t.id_status = 1  
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function arquivados(){
        $query = '
                select 
                    t.id, s.status, t.id_status, t.tarefa, t.cor_fundo, t.cor_tarefa 
                from 
                    tb_tarefas  as t 
                    left join tb_status as s on (t.id_status = s.id)
                where 
                	t.id_status = 2  
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}


?>