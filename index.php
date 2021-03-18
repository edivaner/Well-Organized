<?php
    /*$acao = 'recuperar';
    require 'controller/tarefa_controle.php';*/
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Well Organized</title>
    <meta charset="UTF-8">        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="./public/assets/favicon.ico"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> 
    
    <link rel="stylesheet" type="text/css" href="./public/css/estilo.css" media="screen"/>
    
</head>
<body>

    <div class="logoResponsivel">
        <img src="public/assets/well-organized-logo.png" alt="Logo Organized">
        <a href="index.php"></a>
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
                <a href="index.php"></a>
            </div>

            <div class="links">
                <a href="afazer.php">A fazer</a> 
                <span class="divisor">|</span>
                <a href="arquivados.php">Arquivadas</a>
            </div>
        </div>
    </nav>

    <section>
        <button class="botaoAdicionar" id="botaoPlus" onclick="mostrarForm()">
            <img src="public/assets/task-add-icon.png" alt="botão adicionar formulario">
            <span>Adicionar Tarefa</span>
        </button>

            <!-- action="tarefa_controle.php?acao=inserir" -->
        <form id="form-tarefa" method="post">
            <div class="esconder formularioResponsivel" id="formulario">
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
                

                <button type="submit" class="buttonAdd">Adicionar</button>
                <input hidden type="text" name="_acao" value="cadastrar">
            </div>
        </form>
    </section>

    <article class="conteudo">
        
    </article>

    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="public/js/script.js"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="public/js/cadastro-tarefas.js"></script>
    <script src="public/js/listagem-tarefas.js"></script>
</body>
</html>