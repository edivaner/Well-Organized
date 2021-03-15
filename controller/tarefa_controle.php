<?php
    // echo 'aqui1';
    require "dao/conexao.php";
    require "model/tarefa.model.php";
    require "dao/tarefa.service.php";
    // echo 'aqui2';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){ 
        $tarefa = new Tarefa();
        $tarefa->__set('descricao', $_POST['descricao']);
        $tarefa->__set('cor', $_POST['cor']);

        $tarefa->__set('concluida', 0);
        $tarefa->__set('arquivada', 0);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->inserir();
        header('Location: index.php?inclusao=1');

    }else if($acao == 'recuperar'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->recuperar();
        // echo'bem';

    } else if($acao == 'afazer'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->afazer();

    } else if($acao == 'arquivados'){
        $tarefa = new Tarefa();
        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefas = $tarefaService->arquivados();
    } else if($acao == 'arquivar'){
        // echo '<pre>';
        //     print_r($_GET);
        // echo '</pre>';

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        if($tarefaService->arquivar()){
            header('location: arquivados.php');
        }


    } else if($acao == "excluir"){
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->remover();
        header('location: index.php');

    } else if($acao == "concluir"){
        // echo '<pre>';
        //     print_r($_GET);
        // echo '</pre>';

        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);

        $conexao = new Conexao();

        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService->concluir();
        header('location: index.php');
    }

    

?>