<?php
    $acao = 'arquivados';
    require 'backend/tarefa_controle.php';
    // require 'public/php/tarefa_controle.php';

    // echo '<pre>';
    //     print_r($tarefas);
    // echo '</pre>';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Well Organized</title>
    <meta charset="UTF-8">        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/css/estilo.css" media="screen" />
    <link rel="icon" href="./public/assets/favicon.ico"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 

 
</head>
<body>
<div class="logoResponsivel">
        <img src="public/assets/well-organized-logo.png" alt="Logo Organized">
    </div>

    <!-- Nav boostrap funciona a partir de 575px -->
    <div class="menuResponsivel">
        <div class="navbar navbar-expand-sm navbar-dark bg-secondary">
            <!-- Logo -->
            <a href="" class="navbar-brand"></a>
            <!-- Menu Hamburguer -->
            <button class="navbar-toggler" data-toggle="collapse" 
            data-target="#navegacao">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- navegacao -->
            <div class="collapse navbar-collapse" id="navegacao">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="afazer.php" class="nav-link">A fazer</a>
                    </li>
                    <li class="nav-item">
                        <a href="arquivados.php" class="nav-link">Arquivados</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>


    <nav>
        <div class="navegacao">
            <div class="logo">
                <img src="public/assets/well-organized-logo.png" alt="Logo Organized">
            </div>

            <div class="links">
                <a href="afazer.php">A fazer</a> 
                <span class="divisor">|</span>
                <a href="arquivados.php">Arquivadas</a>
            </div>
        </div>
    </nav>


    <form method="post" action="tarefa_controle.php?acao=inserir">
        <div class="formularioResponsivel" id="formulario">
            <label for="descricao" class="descricaoTexto">Descrição:</label>
            <input type="text" id="descricao" name="descricao" class="descricaoInput">

            <label for="cor" class="labelcor">Cor:</label>
            <div class="checkboxing">
                <input type="checkbox" class="checkzinho azul" value="#daf5fa" name="cor">
                <input type="checkbox" class="checkzinho verde" value="#d1fecb" name="cor">
                <input type="checkbox" class="checkzinho rosa" value="#f6d0f6" name="cor">
                <input type="checkbox" class="checkzinho roxo" value="#dcd0f3" name="cor">
                <input type="checkbox" class="checkzinho amarelo" value="#fcfccb" name="cor">
                <input type="checkbox" class="checkzinho laranja" value="#fbd4b4" name="cor">
                <input type="checkbox" class="checkzinho branco" value="#fff" name="cor">
            </div>
            

            <button class="buttonAdd">Adicionar</button>
        </div>
    </form>


    <article class="conteudo">
        <? foreach($tarefas as $indice => $tarefa){?>

            <!-- Cor do cartão inteiro -->
            <?if($tarefa->cor_fundo == '#daf5fa'){?>
                <div class="cartaoConcluido azul">
            <?}else if($tarefa->cor_fundo == '#d1fecb'){?>
                <div class="cartaoConcluido verde">
            <?}else if($tarefa->cor_fundo == '#f6d0f6'){?>
                <div class="cartaoConcluido rosa">
            <?}else if($tarefa->cor_fundo == '#dcd0f3'){?>
                <div class="cartaoConcluido roxo">
            <?}else if($tarefa->cor_fundo == '#fcfccb'){?>
                <div class="cartaoConcluido amarelo">
            <?}else if($tarefa->cor_fundo == '#fbd4b4'){?>
                <div class="cartaoConcluido laranja">
            <?}else if($tarefa->cor_fundo == '#fff'){?>
                <div class="cartaoConcluido branco">
            <?}?>
                    <!-- Cor do cabeçalho -->
                    <? if($tarefa->id_status == 1){?>
                        <div class="cabCartaoNaoConcluido">
                    <?}else if($tarefa->id_status == 2){?>
                        <div class="cabCartaoConcluido">
                    <?}?>
                    <? if($tarefa->id_status == 1){?>
                        <img src="public/assets/unchecked.png" alt="checked não concluido">
                    <?}else if($tarefa->id_status == 2){?>
                        <img src="public/assets/checked.png" alt="checked concluido">
                    <?}?>
                        <?= $tarefa->status?>
                    </div>

                        <div class="textoDescricao">
                            <?= $tarefa->tarefa?>
                        </div>
                        <div class="rodapeCartao">
                            <img src="public/assets/archive-color.png" alt="arquivar" onclick="arquivar()">
                            <img src="public/assets/trash-gray-scale.png" alt="lixo" onclick="excluir()">
                        </div>
                </div>
        <?}?>
    </article>

    <script src="public/js/script.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>