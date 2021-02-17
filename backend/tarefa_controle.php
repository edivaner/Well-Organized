<?php
    // echo 'aqui1';
    require "backend/conexao.php";
    require "backend/tarefa.model.php";
    require "backend/tarefa.service.php";
    // echo 'aqui2';

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

    if($acao == 'inserir'){ 
        $tarefa = new Tarefa();
        $tarefa->__set('tarefa', $_POST['descricao']);
        $tarefa->__set('cor_fundo', $_POST['cor']);

        $corFundo = "";
        if($_POST['cor'] == '#daf5fa'){
            $corFundo = '#19b5dc'; //Para o fundo azul
        } else if($_POST['cor'] == '#d1fecb'){
            $corFundo = '#58a51d'; //Para o fundo verde
        } else if($_POST['cor'] == '#f6d0f6'){
            $corFundo = '#cb65cb'; //Para o fundo rosa
        } else if($_POST['cor'] == '#dcd0f3'){
            $corFundo = '#9763f9'; //Para o fundo roxo
        } else if($_POST['cor'] == '#fcfccb'){
            $corFundo = '#8f8f69'; //Para o fundo amarelo
        } else if($_POST['cor'] == '#fbd4b4'){
            $corFundo = '#ec842e'; //Para o fundo laranja
        } else if($_POST['cor'] == '#ffffff'){
            $corFundo = '#727272'; //Para o fundo branco
        } 

        $tarefa->__set('cor_tarefa', $corFundo);

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

    } else if($acao == 'arquivar'){
        echo 'bboy';
    } else if($acao == "excluir"){

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
    }

    // echo '<pre>';
    //     print_r($tarefa);
    // echo '</pre>';

?>