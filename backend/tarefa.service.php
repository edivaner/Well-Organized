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
        //$query = 'insert into tb_tarefas(tarefa, cor_fundo, cor_tarefa) values(:tarefa, :cor_fundo, :cor_tarefa)';
        $query = 'insert into tarefa (descricao, cor, concluida, arquivada) values(:descricao, :cor, :concluida, :arquivada)';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':descricao', $this->tarefa->__get('descricao'));
        $stmt->bindValue(':cor', $this->tarefa->__get('cor'));
        $stmt->bindValue(':concluida', $this->tarefa->__get('concluida'));
        $stmt->bindValue(':arquivada', $this->tarefa->__get('arquivada'));
        $stmt->execute();
    }


    public function recuperar(){
        $query = '
                select 
                    *
                from 
                   tarefa   
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function arquivar(){
        $query = 'update tarefa set arquivada = :arquivada where idTarefa = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':arquivada', 1);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
        
    }

    public function concluir(){
        $query = 'update tarefa set concluida = :concluida where idTarefa = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':concluida', 1);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        return $stmt->execute();
    }

    public function remover(){
        // echo '<pre>';
        //     print_r($this->tarefa);
        // echo '</pre>';
        $query = 'delete from tarefa where idTarefa = :id';
        $stmt = $this->conexao->prepare($query);
        $stmt->bindValue(':id', $this->tarefa->__get('id'));
        $stmt->execute();
    }

    public function afazer(){
        $query = '
                select 
                    *
                from 
                    tarefa
                where 
                	concluida = 0 and arquivada = 0  
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function arquivados(){
        $query = '
        select 
            *
        from 
            tarefa
        where 
           concluida = 1 and arquivada = 1    
        ';
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
?>