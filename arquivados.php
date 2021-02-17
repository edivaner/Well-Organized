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
    <nav class="navegacao">
        <div class="logo">
            <img src="public/assets/well-organized-logo.png" alt="Logo Organized">
        </div>

        <div class="links">
            <a href="afazer.php">A fazer</a> 
            <span class="divisor">|</span>
            <a href="arquivados.php">Arquivadas</a>
        </div>
    </nav>

    <form method="post" action="tarefa_controle.php?acao=inserir">
        <div>
            <label for="descricao" class="descricaoTexto">Descrição:</label>
            <input type="text" id="descricao" name="descricao" class="descricaoInput">

            <label for="cor" class="labelcor">Cor:</label>
            <input type="checkbox" class="checkzinho azul" value="#daf5fa" name="cor">
            <input type="checkbox" class="checkzinho verde" value="#d1fecb" name="cor">
            <input type="checkbox" class="checkzinho rosa" value="#f6d0f6" name="cor">
            <input type="checkbox" class="checkzinho roxo" value="#dcd0f3" name="cor">
            <input type="checkbox" class="checkzinho amarelo" value="#fcfccb" name="cor">
            <input type="checkbox" class="checkzinho laranja" value="#fbd4b4" name="cor">
            <input type="checkbox" class="checkzinho branco" value="#fff" name="cor">

            <button class="buttonAdd">Adicionar</button>
        </div>
    </form>

    <article class="conteudo">
        <? foreach($tarefas as $indice => $tarefa){?>
            <div class="cartaoConcluido">

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
                 <!-- Cores de fundo e de texto -->
                <? if($tarefa->cor_fundo == '#daf5fa'){?>
                    <div class="textoDescricao azul">
                <?}else if($tarefa->cor_fundo == '#d1fecb'){?>
                    <div class="textoDescricao verde">
                <?}else if($tarefa->cor_fundo == '#f6d0f6'){?>
                    <div class="textoDescricao rosa">
                <?}else if($tarefa->cor_fundo == '#dcd0f3'){?>
                    <div class="textoDescricao roxo">
                <?}else if($tarefa->cor_fundo == '#fcfccb'){?>
                    <div class="textoDescricao amarelo">
                <?}else if($tarefa->cor_fundo == '#fbd4b4'){?>
                    <div class="textoDescricao laranja">
                <?}else if($tarefa->cor_fundo == '#fff'){?>
                    <div class="textoDescricao branco">
                <?}?>
                    <?= $tarefa->tarefa?>
                </div>
                    <!-- Cores do rodapé e de texto -->
                <? if($tarefa->cor_fundo == '#daf5fa'){?>
                    <div class="rodapeCartao azul">
                <?}else if($tarefa->cor_fundo == '#d1fecb'){?>
                    <div class="rodapeCartao verde">
                <?}else if($tarefa->cor_fundo == '#f6d0f6'){?>
                    <div class="rodapeCartao rosa">
                <?}else if($tarefa->cor_fundo == '#dcd0f3'){?>
                    <div class="rodapeCartao roxo">
                <?}else if($tarefa->cor_fundo == '#fcfccb'){?>
                    <div class="rodapeCartao amarelo">
                <?}else if($tarefa->cor_fundo == '#fbd4b4'){?>
                    <div class="rodapeCartao laranja">
                <?}else if($tarefa->cor_fundo == '#fff'){?>
                    <div class="rodapeCartao branco">
                <?}?>

                    <img src="public/assets/archive-color.png" alt="arquivar" onclick="arquivar()">
                    <img src="public/assets/trash-gray-scale.png" alt="lixo" onclick="excluir()">
                </div>
            </div>
        <?}?>
    </article>

    <script src="public/js/script.js"></script>

</body>